<?php 
include('../../include/db.php');
session_start();
if(!empty($_POST["cus_id"])) {
	$id = $_POST["cus_id"];

	$sql ="SELECT shipping_address.*, customers.phone FROM shipping_address INNER JOIN customers ON customers.id=shipping_address.customer WHERE customers.id=:id";
	$query= $db->prepare($sql);
	$query-> bindParam(':id',$id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 
		foreach($results as $result){
	?> 

		<form class="" method="post" action="">  
            <input type="hidden" name="address_id" value="<?php echo $result->id; ?>">
            <div class="form-row row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1">
                <div class="form-group">
                    <label for="new-name" class="d-none">First Name</label>
                    <input name="firstname" placeholder="First Name" value="<?php echo $result->firstname; ?>" id="new-name" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="new-name" class="d-none">Last Name</label>
                    <input name="lastname" placeholder="Last Name" value="<?php echo $result->lastname; ?>" id="new-name" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="new-company" class="d-none">Company</label>
                    <input name="company" placeholder="Company" value="<?php echo $result->company; ?>" id="new-company" type="text" />
                </div>
                <div class="form-group">
                    <label for="new-apartment" class="d-none">Apartment <span class="required">*</span></label>
                    <input name="apartment" placeholder="Apartment" value="<?php echo $result->apartment; ?>" id="new-apartment" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="new-street-address" class="d-none">Street Address <span class="required">*</span></label>
                    <input name="street_address" placeholder="Street Address" value="<?php echo $result->address; ?>" id="new-street-address" type="text" required/>
                </div>
                <div class="form-group">
                    <label for="town-city" class="d-none">City/Town <span class="required">*</span></label>
                    <input name="town" placeholder="Town" value="<?php echo $result->town; ?>" id="town-city" type="text" required/>
                </div>  
            </div>
            <div class="form-group">
                <label for="new-postcode" class="d-none">Post Code <span class="required">*</span></label>
                <input name="postCode" placeholder="Post Code" value="<?php echo $result->postCode; ?>" id="new-postcode" type="text" required/>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" name="updateAddressBtn" class="btn btn-primary m-0"><span>Update Address</span></button>
            </div>
        </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this address. Refresh the page and try again.</h4>
	<?php } 
}

?>