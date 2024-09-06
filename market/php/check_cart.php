<?php 
include('../include/db.php');
session_start();
$totalPrice = 0;
$diff = "Qty_1";
	// show cart------
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { ?>

		<!--MiniCart Content-->
    <div id="cart-drawer" class="block block-cart">
        <div class="minicart-header">
            <button class="close-cart border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
            <h4 class="fs-6 body-font">Your cart (<?php echo count($_SESSION["products"]); ?> Item(s))</h4>
        </div>
        	<div class="minicart-content">
            <?php 
	            	foreach($_SESSION["products"] as $products){ 
	            		$totalPrice += $products["price"] * $products["quantity"];
	            		$itemPrice = $products["price"] * $products["quantity"];
	            	?>
	            	
	            	<ul class="m-0 clearfix">
		                <li class="item d-flex justify-content-center align-items-center">
		                    <a class="product-image rounded-4" href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($products["id"]);?>/<?php echo htmlentities($products["name"]);?>">
		                        <img class="rounded-4 blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($products["image"]); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($products["image"]); ?>" alt="product" title="Product" width="120" height="170" /> 
		                    </a>
		                    <div class="product-details">
		                        <a class="product-title" href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($products["id"]);?>/<?php echo htmlentities($products["name"]);?>"><?php echo htmlentities($products["name"]);?></a>
		                        <div class="priceRow">
		                            <div class="product-price">
		                                <span class="price">GH&#8373;<?php echo htmlentities(number_format($itemPrice,2));?></span>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="qtyDetail text-center"> 
		                        <div class="qtyField">
		                            <a class="qtyBtn minus" onclick="cartQtyMinus('<?php echo($diff) ?>','<?php echo($products["id"]) ?>');" href="javascript:;"><i class="icon anm anm-minus-r"></i></a>

		                            <input type="text" name="quantity" id="quantity<?php echo($diff) ?><?php echo($products["id"]) ?>" value="<?php echo($products["quantity"]) ?>" class="qty rounded-pill" readonly>
		                            
		                            <a class="qtyBtn plus" onclick="cartQtyPlus('<?php echo($diff) ?>','<?php echo($products["id"]) ?>');" href="javascript:;"><i class="icon anm anm-plus-r"></i></a>
		                        </div>
		                        <a href="javascript:;" onclick="removeItemFromCart('<?php echo($products["id"]); ?>');" class="remove"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"></i></a>
		                    </div>
		                </li>
	                </ul>
	                
	            <?php } ?>
        	</div>
        <div class="minicart-bottom">
            <div class="subtotal clearfix my-3">
                <div class="totalInfo clearfix"><span>Total:</span><span class="item product-price">GH&#8373;<?php echo number_format($totalPrice,2); ?></span></div>
            </div>
            <div class="minicart-action d-flex mt-3">
                <a href="<?php echo(BASE_LINK); ?>/checkout" class="proceed-to-checkout btn btn-outline-secondary rounded-pill w-50 me-1">Check Out</a>
		        <a href="<?php echo(BASE_LINK); ?>/cart" class="cart-btn btn btn-outline-primary rounded-pill w-50 ms-1">View Cart</a>
            </div>
        </div>
    </div>
    <!--MiniCart Content-->

<?php }else{ // no item in cart. ?>
	<!--MiniCart Empty-->
    <div id="cartEmpty" class="cartEmpty d-flex-justify-center flex-column text-center p-3 text-muted">
        <div class="minicart-header d-flex-center justify-content-between w-100">
            <h4 class="fs-6 body-font">Your cart (0 Item(s) )</h4>
            <button class="close-cart border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
        </div>
        <div class="cartEmpty-content mt-4">
            <i class="icon anm anm-basket-l fs-1 text-muted"></i> 
            <p class="my-3">No Product in the Cart</p>
            <a href="<?php echo(BASE_LINK); ?>/home" class="btn btn-primary cart-btn">Continue shopping</a>
        </div>
    </div>
    <!--End MiniCart Empty-->
<?php }
?>