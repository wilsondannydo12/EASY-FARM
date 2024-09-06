<?php
include('../include/db.php');
session_start();
$diff = "Qty_2";
// show cart------
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8 main-col">
            <!-- <div class="alert alert-success py-2 alert-dismissible fade show cart-alert" role="alert">
                <i class="align-middle icon anm anm-truck icon-large me-2"></i><strong class="text-uppercase">Congratulations!</strong> You've got free shipping!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->
            <!--End Alert msg-->
            <!--Cart Form-->
            <form action="" method="post" class="cart-table table-bottom-brd" onsubmit="return false;">
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
                            <td class="cart-delete text-center small-hide"><a href="javascript:;" onclick="removeItemFromCart('<?php echo($cart["id"]) ?>');" class="cart-remove remove-icon position-static" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove from Cart"><i class="icon anm anm-times-r"></i></a></td>
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
                                    <div class="qtyField">
                                        <a class="qtyBtn minus" onclick="cartQtyMinus('<?php echo($diff) ?>','<?php echo($cart["id"]) ?>');" href="javascript:;"><i class="icon anm anm-minus-r"></i></a>

                                        <input class="cart-qty-input qty" type="text" id="quantity<?php echo($diff) ?><?php echo($cart["id"]) ?>" name="updates[]" value="<?php echo htmlentities($cart["quantity"]);?>" pattern="[0-9]*" / readonly>

                                        <a class="qtyBtn plus"  onclick="cartQtyPlus('<?php echo($diff) ?>','<?php echo($cart["id"]) ?>');" href="javascript:;"><i class="icon anm anm-plus-r"></i></a>
                                    </div>
                                </div>
                                <a href="javascript:;" onclick="removeItemFromCart('<?php echo($cart["id"]) ?>');" class="removeMb d-md-none d-inline-block text-decoration-underline mt-2 me-3">Remove</a>
                            </td>
                            <td class="cart-price cart-flex-item text-center small-hide">
                                <span class="money fw-500">GH&#8373;<?php echo htmlentities(number_format($itemPrice,2));?></span>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-start"><a href="<?php echo(BASE_LINK); ?>/home" class="btn btn-outline-secondary btn-sm cart-continue"><i class="icon anm anm-angle-left-r me-2 d-none"></i> Continue shopping</a></td>
                            <td colspan="3" class="text-end">
                                <button type="submit" name="clear" onclick="clearItemFromCart();" class="btn btn-outline-secondary btn-sm small-hide"><i class="icon anm anm-times-r me-2 d-none"></i> Clear Shopping Cart</button>
                            </td>
                        </tr>
                    </tfoot>
                </table> 
            </form>    

            <!--End Cart Form-->
        </div>
        <!--Cart Sidebar-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 cart-footer">
            <div class="cart-info sidebar-sticky">
                <div class="cart-order-detail cart-col">
                    <div class="row g-0 border-bottom pb-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span class="money">GH&#8373;<?php echo number_format($totalCartPrice,2); ?></span></span>
                    </div>
                    <div class="row g-0 border-bottom py-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Tax</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span class="money">GH&#8373;0.00</span></span>
                    </div>
                    <div class="row g-0 pt-2">
                        <span class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total</strong></span>
                        <span class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b class="money">GH&#8373;<?php echo number_format($totalCartPrice,2); ?></b></span>
                    </div>

                    <p class="cart-shipping mt-3">Shipping is calculated at checkout</p>
                    <!-- <p class="cart-shipping fst-normal freeShipclaim"><i class="me-2 align-middle icon anm anm-truck-l"></i><b>FREE SHIPPING</b> ELIGIBLE</p> -->
                    <div class="customCheckbox cart-tearm">
                        <!-- <input type="checkbox" value="allen-vela" id="cart-tearm" checked> -->
                        <label for="cart-tearm">By clicking the proceed button, you agree with the terms and conditions</label>
                    </div>
                    <a href="<?php echo(BASE_LINK); ?>/checkout" id="cartCheckout" class="btn btn-lg my-4 checkout w-100">Proceed To Checkout</a>
                    <div class="paymnet-img text-center"><img src="assets/images/icons/safepayment.png" alt="Payment" width="299" height="28" /></div>
                </div>                               
            </div>
        </div>
    <?php }else{ ?>
        <div class="alert alert-danger py-2 alert-dismissible fade show cart-alert" role="alert" style="text-align: center;">
            <i class="align-middle text-center icon anm anm-times-r icon-large me-2"></i><strong class="text-uppercase">Oops!</strong> You've no product in your cart.
            <button type="button" class="btn-close" onclick="loadHome();" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <a style="text-align: center;" href="<?php echo(BASE_LINK); ?>/home" id="cartCheckout" class="btn btn-lg my-4 checkout w-100"><i class="hdr-icon icon anm anm-basket-l"></i> &nbsp;&nbsp;Go Shopping</a>
    </div>
<?php } ?>
<!--End Cart Sidebar-->