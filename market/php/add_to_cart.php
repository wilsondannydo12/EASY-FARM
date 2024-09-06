<?php 
include('../include/db.php');
session_start();
$error="";
$totalPrice = 0;
$diff = "Qty_1";

if(!empty($_POST["quick_shop_cur_product"])) {
	 
	foreach($_POST as $key => $value){
		$product[$key] = $value;
	}
	$productID = $product['quick_shop_cur_product'];
	$quantity = $product['quantity'];

	$sql ="SELECT * FROM product_tbl WHERE id=:productID AND status='active'";
	$query= $db->prepare($sql);
	$query->bindParam(':productID',$productID,PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 

		foreach($results as $row){
	  		$product["id"] = $row->id;
	  		$product["name"] = $row->product_name;
	  		$product["price"] = $row->new_price;
	  		$product["image"] = $row->image;
	  		$product["quantity"] = $quantity;
		
			if(isset($_SESSION["products"])){  
	  			if(isset($_SESSION["products"][$product["id"]])) {
	  				// check product already added then increase the quantity
	  				if (in_array($product["id"], array_keys($_SESSION["products"]))) {
	  					foreach ($_SESSION["products"] as $k => $v) {
	  						if ($product["id"] == $k) {
	  							$totalQuantity = $_SESSION["products"][$k]["quantity"]+ $product["quantity"];
	  							if ($totalQuantity > 10) {
	  								$error = "1";
	  							}else{
	  								$_SESSION["products"][$k]["quantity"] += $product["quantity"];
	  							}
	  						}
	  					}
	  				}
				}else {
					$_SESSION["products"][$product["id"]] = $product;
				}			
	  		}else {
	  			// start adding product
	  			$_SESSION["products"][$product["id"]] = $product;
	  			$message = "";
	  		}
	  	} ?>


	  	<?php
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
		                    <a class="product-image rounded-4" href="<?php echo(BASE_LINK); ?>/product/product-view/<?php echo htmlentities($products["id"]);?>/<?php echo htmlentities($products["name"]);?>">
		                        <img class="rounded-4 blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($products["image"]); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($products["image"]); ?>" alt="product" title="Product" width="120" height="170" />
		                    </a>
		                    <div class="product-details">
		                        <a class="product-title" href="product-layout1.html"><?php echo htmlentities($products["name"]);?></a>
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
		                        <a href="javascript:;" onclick="removeItemFromCart('<?php echo($products["id"]) ?>');" class="remove"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"></i></a>
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
		    <div id="cartEmpty" class="cartEmpty d-flex-justify-center flex-column text-center p-3 text-muted d-none">
		        <div class="minicart-header d-flex-center justify-content-between w-100">
		            <h4 class="fs-6 body-font">Your cart (0 Items)</h4>
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

	} else{  ?>
		<h4 style="color: red; text-align: center; font-size: 12px; margin-top: 50px;">Oops! Product has not been added. Try again</h4>
	<?php } 
}

?>