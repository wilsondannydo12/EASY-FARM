<!-- Address Book -->
<div class="tab-pane fade h-100" id="address">
    <div class="address-card mt-0 h-100">                                   
        <div class="top-sec d-flex-justify-center justify-content-between mb-4">
            <h2 class="mb-0">Address Book</h2>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNewModal"><i class="icon anm anm-plus-r me-1"></i> Add New</button>
            <!-- New Address Modal -->
            <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="addNewModalLabel">Address details</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="" method="post" action="">  
                                <div class="form-row row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1">
                                    <div class="form-group">
                                        <label for="new-name" class="d-none">First Name</label>
                                        <input name="firstname" placeholder="First Name" value="" id="new-name" type="text" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-name" class="d-none">Last Name</label>
                                        <input name="lastname" placeholder="Last Name" value="" id="new-name" type="text" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-company" class="d-none">Company</label>
                                        <input name="company" placeholder="Company" value="" id="new-company" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label for="new-apartment" class="d-none">Apartment <span class="required">*</span></label>
                                        <input name="apartment" placeholder="Apartment" value="" id="new-apartment" type="text" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-street-address" class="d-none">Street Address <span class="required">*</span></label>
                                        <input name="street_address" placeholder="Street Address" value="" id="new-street-address" type="text" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="town-city" class="d-none">City/Town <span class="required">*</span></label>
                                        <input name="town" placeholder="Town" value="" id="town-city" type="text" required/>
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <label for="new-postcode" class="d-none">Post Code <span class="required">*</span></label>
                                    <input name="postCode" placeholder="Post Code" value="" id="new-postcode" type="text" required/>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" name="addAddressBtn" class="btn btn-primary m-0"><span>Add Address</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End New Address Modal -->
        </div>

        <div class="address-book-section">
            <div class="row g-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                <div class="address-select-box active">
                    <?php 
                    $cus_adre_qry = $db->prepare("SELECT shipping_address.*, customers.phone FROM shipping_address INNER JOIN customers ON customers.id=shipping_address.customer WHERE customers.id='$cur_customer'");
                    $cus_adre_qry->execute();
                    $cus_adre_results=$cus_adre_qry->fetchAll(PDO::FETCH_OBJ);
                    foreach($cus_adre_results as $cus_adre_result){
                        if (strtolower($cus_adre_result->status) == "active") {
                            $color = "";
                        }else{
                            $color = "red";
                        }
                            
                    ?>
                    <div class="address-box bg-block">
                        <div class="top d-flex-justify-center justify-content-between mb-3">
                            <h5 class="m-0"><?php echo $cus_adre_result->firstname; ?> <?php echo $cus_adre_result->lastname; ?></h5>
                            <span class="product-labels start-auto end-0"><span class="lbl pr-label1" style="color: <?php echo $color; ?>;"><?php echo ucfirst($cus_adre_result->status); ?></span></span>
                        </div>
                        <div class="middle">
                            <div class="address mb-2 text-muted">
                                <address class="m-0">123, <?php echo $cus_adre_result->company; ?>, <br/><?php echo $cus_adre_result->address; ?> <?php echo $cus_adre_result->town; ?>, <br/><?php echo $cus_adre_result->postCode; ?>.</address>
                            </div>
                            <div class="number">
                                <p>Mobile: +233<?php echo $cus_adre_result->phone; ?></p>
                            </div>
                        </div>
                        <div class="bottom d-flex-justify-center justify-content-between">
                            <button type="button" onclick="fetch_address('<?php echo $cus_adre_result->customer; ?>');" class="bottom-btn btn btn-gray btn-sm" data-bs-toggle="modal" data-bs-target="#addEditModal">Edit</button>
                            <button type="button" onclick="getAddressID('<?php echo $cus_adre_result->id; ?>');" data-bs-toggle="modal" data-bs-target="#statusModal" class="bottom-btn btn btn-gray btn-sm">Status</button>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>

            <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="addEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="addEditModalLabel">Update Address Status</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <input type="hidden" name="addressStatus_id" id="addressStatus_id">
                                <label for="addressStatus">Status</label>
                                <select class="form-control" name="addressStatus" id="addressStatus" required>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select><br>
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" name="updateAddressStatusBtn" class="btn btn-primary m-0"><span>Save Changes</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Address Modal -->
            <div class="modal fade" id="addEditModal" tabindex="-1" aria-labelledby="addEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="addEditModalLabel">Update Address Details</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="address_for_update"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Edit Address Modal -->
        </div>                                     
    </div>
</div>
<!-- End Address Book -->