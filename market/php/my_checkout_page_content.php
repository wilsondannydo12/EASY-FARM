<?php
include('../include/db.php');
session_start();
$diff = "Qty_2";
// show cart------
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { ?>

<form class="checkout-form" method="post" action="">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <!--Shipping Address-->
            <div class="block mb-3 shipping-address mb-4">
                <div class="block-content">
                    <h3 class="title mb-3 text-uppercase">Delivery Address</h3> 
                    <p>
                        <?php
                        if (isset($_SESSION['customer_id'])) { 
                            $cur_customer = $_SESSION['customer_id'];
                            $hide_boxes = "";
                            $cus_adre_qry = $db->prepare("SELECT shipping_address.*, customers.phone FROM shipping_address INNER JOIN customers ON customers.id=shipping_address.customer WHERE customers.id='$cur_customer' AND shipping_address.status='active'");
                            $cus_adre_qry->execute();
                            if ($cus_adre_qry->rowCount() > 0) {
                                $cus_adre_results=$cus_adre_qry->fetchAll(PDO::FETCH_OBJ);
                                foreach($cus_adre_results as $cus_adre_result){
                                    $firstname = $cus_adre_result->firstname;
                                    $lastname = $cus_adre_result->lastname;
                                    $address = $cus_adre_result->address;
                                    $apartment = $cus_adre_result->apartment;
                                    $postCode = $cus_adre_result->postCode;
                                    $town = $cus_adre_result->town;
                                }
                            }else{
                                $firstname = "";
                                $lastname = "";
                                $address = "";
                                $apartment = "";
                                $postCode = "";
                                $town = "";
                            }
                        }else{
                            $firstname = "";
                            $lastname = "";
                            $address = "";
                            $apartment = "";
                            $postCode = "";
                            $town = "";
                            $hide_boxes = "hidden";
                        ?>
                        <a href="<?php echo(BASE_LINK); ?>/account/login?utm=checkout&ttp=route"><u>Login</u></a> or <a href="<?php echo(BASE_LINK); ?>/account/signup"><u>Register</u></a> for faster payment.
                         <?php } ?>
                         </p>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="ship_firstname" class="form-label">First Name <span class="required">*</span></label>
                                <input name="ship_firstname" value="<?php echo($firstname); ?>" id="ship_firstname" type="text" required="" class="form-control">
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="ship_lastname" class="form-label">Last Name <span class="required">*</span></label>
                                <input name="ship_lastname" value="<?php echo($lastname); ?>" id="ship_lastname" type="text" required="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="ship_address" class="form-label">Address <span class="required">*</span></label>
                                <input name="ship_address" value="<?php echo($address); ?>" id="ship_address" type="text" required="" placeholder="Street address" class="form-control">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <input name="ship_apartment" value="<?php echo($apartment); ?>" id="ship_apartment" type="text" placeholder="Apartment, suite, unit etc. (optional)" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="ship_postCode" class="form-label">Postcode / ZIP <span class="required">*</span></label>
                                <input name="ship_postCode" value="<?php echo($postCode); ?>" id="ship_postCode" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="ship_town" class="form-label">Community / Town / City <span class="required">*</span></label>
                                <input name="ship_town" value="<?php echo($town); ?>" id="ship_town" type="text" class="form-control" required>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!--End Shipping Address-->
            <!--Billing Address-->
            <div class="block mb-3 billing-address mb-4">
                <div class="block-content">
                    <h3 class="title mb-3 text-uppercase">Billing Address</h3>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12">
                                <div class="checkout-tearm customCheckbox">
                                    <input id="add_tearm" name="tearm" onchange="fillBillingSpace();" type="checkbox" value="checkout tearm" required />
                                    <label for="add_tearm"> The same as shipping address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="bill_address" class="form-label">Address <span class="required">*</span></label>
                                <input name="bill_address" value="" id="bill_address" type="text" required="" placeholder="Street address" class="form-control">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <input name="bill_apartment" value="" id="bill_apartment" type="text"  placeholder="Apartment, suite, unit etc. (optional)" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="bill_postCode" class="form-label">Postcode / ZIP <span class="required">*</span></label>
                                <input name="bill_postCode" value="" id="bill_postCode" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="bill_town" class="form-label">Town / City <span class="required">*</span></label>
                                <input name="bill_town" value="" id="bill_town" type="text" class="form-control" required>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!--End Billing Address-->
        </div>
        <!-- col-2 -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <!--Payment Methods-->
            <div class="block mb-3 payment-methods mb-4">
                <div class="block-content">
                    <h3 class="title mb-3 text-uppercase">Payment Methods</h3>                                     
                    <div class="payment-accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item card mb-2">
                                <div class="card-header" id="headingOne">
                                    <button class="card-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Mobile Money Payment</button>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Make your payment directly into our Mobile Money Account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                        <p>MTN: <span style="text-decoration: underline;">0244863660</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item card mb-2">
                                <div class="card-header" id="headingThree">
                                    <button class="card-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Direct Bank Transfer</button>
                                </div>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="accordion-item card mb-2">
                                <div class="card-header" id="headingTwo">
                                    <button class="card-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Cheque Payment</button>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Payment Methods-->
            <div class="block mb-3 order-comments mb-4">
                <div class="block-content">
                    <h3 class="title mb-3 text-uppercase">Order Comment</h3>
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-xl-12 mb-0">
                                <textarea class="resize-both form-control" name="orderComment" rows="4" placeholder="Place your comment here"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!--End Order Comment-->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-12 col-12 mb-4 mb-md-0">
            <!--Order Summary-->
            <div class="block order-summary">
                <div class="block-content">
                    <h3 class="title mb-3 text-uppercase">Order Summary</h3>
                    <div class="table-responsive-sm table-bottom-brd order-table"> 
                        <table class="table align-middle">
                            <thead class="cart-row cart-header small-hide position-relative">
                                <tr>
                                    <th class="action">&nbsp;</th>
                                    <th colspan="2" class="text-start">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalCartPrice = 0;
                                foreach($_SESSION["products"] as $cart){ 
                                    $totalCartPrice += $cart["price"] * $cart["quantity"];
                                    $itemPrice = $cart["price"] * $cart["quantity"];
                                ?>
                                <tr class="cart-row cart-flex position-relative">
                                    <td class="cart-delete text-center"><a href="javascript:;" onclick="removeItemFromCart('<?php echo($cart["id"]) ?>');" class="cart-remove remove-icon position-static" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove from Cart"><i class="icon anm anm-times-r"></i></a></td>
                                    <td class="cart-image cart-flex-item">
                                        <a href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($cart["id"]);?>/<?php echo htmlentities($cart["name"]);?>"><img class="cart-image rounded-0 blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($cart["image"]); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($cart["image"]); ?>" alt="Sunset Sleep Scarf Top" width="120" height="170" /></a>
                                    </td>
                                    <td class="cart-meta small-text-left cart-flex-item">
                                        <div class="list-view-item-title">
                                            <a href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($cart["id"]);?>/<?php echo htmlentities($cart["name"]);?>"><?php echo htmlentities($cart["name"]);?></a>
                                        </div>
                                        <div class="cart-meta-text">
                                            Qty: <?php echo htmlentities($cart["quantity"]);?>
                                        </div>
                                        <div class="cart-price d-md-none">
                                            <span class="money fw-500">GH&#8373;<?php echo htmlentities(number_format($cart["price"],2));?></span>
                                        </div>
                                    </td>
                                    <td class="cart-price cart-flex-item text-center small-hide">
                                        <span class="money">GH&#8373;<?php echo htmlentities(number_format($cart["price"],2));?></span>
                                    </td>
                                    <td class="cart-update-wrapper cart-flex-item text-end text-md-center">
                                        <div class="cart-qty d-flex justify-content-end justify-content-md-center">
                                            <div class="cart-meta-text small-hide">
                                                <?php echo htmlentities($cart["quantity"]);?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart-price cart-flex-item text-center small-hide">
                                        <span class="money fw-500">GH&#8373;<?php echo htmlentities(number_format($itemPrice,2));?></span>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Order Summary-->
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 col-12">
            <!--Cart Summary-->
            <div class="cart-info">
                <div class="cart-order-detail cart-col">
                    <div class="row g-0 border-bottom pb-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span class="money">GH&#8373;<?php echo number_format($totalCartPrice,2); ?></span></span>
                    </div>
                    <div class="row g-0 border-bottom py-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Tax</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span class="money">GH&#8373;0.00</span></span>
                    </div>
                    <div class="row g-0 border-bottom py-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Shipping</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span class="money">Free shipping</span></span>
                    </div>
                    <div class="row g-0 pt-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b class="money">GH&#8373;<?php echo number_format($totalCartPrice,2); ?></b></span>
                    </div>
                    <?php
                        if (isset($_SESSION['customer_id'])) { ?>
                    <button type="submit" name="finalOrderBtn" class="btn btn-lg my-4 checkout w-100">Submit Order</button>
                    <div class="paymnet-img text-center"><img src="assets/images/icons/safepayment.png" alt="Payment" width="299" height="28" /></div>
                <?php }else{ ?>
                    <br><br>
                    <p style="font-size: 20px; color: #488e3c;"><a href="<?php echo(BASE_LINK); ?>/account/login?utm=checkout&ttp=route"><u>Login</u></a> or <a href="<?php echo(BASE_LINK); ?>/account/signup"><u>Register</u></a> to place your order</p>
                <?php } ?>
                </div>                               
            </div>
            <!--Cart Summary-->
        </div>
    </div>
</form>

<?php }else{ ?>
<div class="alert alert-danger py-2 alert-dismissible fade show cart-alert" role="alert" style="text-align: center;">
            <i class="align-middle text-center icon anm anm-times-r icon-large me-2"></i><strong class="text-uppercase">Oops!</strong> You've no product in your cart.
            <button type="button" class="btn-close" onclick="loadHome();" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <a style="text-align: center;" href="<?php echo(BASE_LINK); ?>/home" id="cartCheckout" class="btn btn-lg my-4 checkout w-100"><i class="hdr-icon icon anm anm-basket-l"></i> &nbsp;&nbsp;Go Shopping</a>
<?php } ?>