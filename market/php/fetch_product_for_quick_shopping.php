<?php 
include('../include/db.php');

if(!empty($_POST["pro_id"])) {
	
	$pro_id = $_POST["pro_id"];
	
	$sql ="SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor WHERE product_tbl.id=:pro_id LIMIT 1";
	$query= $db->prepare($sql);
	$query-> bindParam(':pro_id',$pro_id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 
		foreach($results as $result){
	?> 

		<form method="post" action="" id="product-form-quickshop" class="product-form align-items-center" onsubmit="return false;">
			<input type="hidden" name="quick_shop_cur_product" id="quick_shop_cur_product" value="<?php echo($result->id); ?>">
	        <!-- Product Info -->
	        <div class="row g-0 item mb-3">
	            <a class="col-4 product-image" href="<?php echo(BASE_LINK); ?>/product-view"><img class="rounded-4 blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($result->image); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($result->image); ?>" alt="Product" title="Product" width="400" height="400" /></a>
	            <div class="col-8 product-details">
	                <div class="product-variant ps-3">
	                    <div class="variant-cart mb-1"><?php echo($result->pro_type); ?></div>
	                    <a class="product-title" href="<?php echo(BASE_LINK); ?>/product-view"><?php echo($result->product_name); ?></a>
	                    <div class="priceRow mt-2 mb-3">
	                        <div class="product-price m-0"><span class="old-price">GH&#8373;<?php echo(number_format($result->old_price,2)); ?></span><span class="price">GH&#8373;<?php echo(number_format($result->new_price,2)); ?></span></div>
	                    </div>
	                    <div class="qtyField">
	                        <a class="qtyBtn minus" onclick="qtyMinus('<?php echo($result->id); ?>');" href="javascript:;"><i class="icon anm anm-minus-r"></i></a>

                            <input type="text" name="quantity" id="quantity<?php echo($result->id); ?>" value="1" class="qty rounded-pill">
                            
                            <a class="qtyBtn plus" onclick="qtyPlus('<?php echo($result->id); ?>');" href="javascript:;"><i class="icon anm anm-plus-r"></i></a>
	                    </div> 
	                </div>
	            </div>
	        </div>
	        <!-- End Product Info -->
	        <!-- Product Action -->
	        <div class="product-form-submit d-flex-justify-center">
	            <button type="submit" name="add" onclick="addToCart('<?php echo($result->id); ?>');" class="btn btn-primary rounded-pill product-cart-submit me-2"><span>Add to cart</span></button>
	        </div>
	    </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this product. Refresh the page and try again.</h4>
	<?php } 
}

?>