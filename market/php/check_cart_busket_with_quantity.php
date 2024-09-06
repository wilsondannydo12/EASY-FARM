<?php 
include('../include/db.php');
session_start();
$totalPrice = 0;
	// show cart------
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { ?>

<!--MiniCart Content-->
    <?php 
    	foreach($_SESSION["products"] as $products){ 
    		$totalPrice += $products["price"] * $products["quantity"];
    		$itemPrice = $products["price"] * $products["quantity"];
    	} 
    ?>
    <!--MiniCart Content-->
    
    <a href="#;" class="header-cart btn-minicart icon-link clr-none d-flex" data-bs-toggle="offcanvas" data-bs-target="#minicart-drawer">
        <span class="iconCot"><i class="hdr-icon icon anm anm-basket-l"></i><span class="cart-count"><?php echo count($_SESSION["products"]); ?></span></span>
        <span class="text d-none d-md-flex flex-column text-left">Basket <small class="price text-primary">GH&#8373;<?php echo number_format($totalPrice,2); ?></small></span>
    </a>

<?php }else{ // no item in cart. ?>
    <a href="#;" class="header-cart btn-minicart icon-link clr-none d-flex" data-bs-toggle="offcanvas" data-bs-target="#minicart-drawer">
        <span class="iconCot"><i class="hdr-icon icon anm anm-basket-l"></i><span class="cart-count">0</span></span>
        <span class="text d-none d-md-flex flex-column text-left">Basket <small class="price text-primary">GH&#8373; 0.00</small></span>
    </a>
    <!--End MiniCart Empty-->
<?php }
?>