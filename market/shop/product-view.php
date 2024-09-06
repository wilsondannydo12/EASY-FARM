<?php include_once ("../realPathRoot.php"); ?>
<?php include '../include/head.php'; ?>
<?php session_start(); ?>
<?php 
$diff = "Qty_2";
?>
<body class="cart-page cart-style1-page">
	<!--Page Wrapper-->
    <div class="page-wrapper">
	
	<?php include '../include/header.php'; ?>
	<!-- Body Container -->
    <div id="page-content"> 
        <!--Page Header-->
        <div class="page-header text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                        <div class="page-title"><h1>Product View</h1></div>
                        <!--Breadcrumbs-->
                        <div class="breadcrumbs"><a href="<?php echo(BASE_LINK); ?>/home" title="Back to the home page">Home</a><span class="title"><i class="icon anm anm-angle-right-l"></i> Shop</span><span class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>Product View</span></div>
                        <!--End Breadcrumbs-->
                    </div>
                </div> 
            </div>
        </div>
        <!--End Page Header-->
        <!--Main Content-->
        <div class="container">     
            <!--Cart Content-->
            <?php 
            if (isset($_GET['pro_id']) && isset($_GET['pro_name'])) {

                $pro_id = $_GET['pro_id'];
                $pro_name = $_GET['pro_name'];
                $product_qry = $db->prepare("SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor WHERE  product_tbl.id='$pro_id'");
                $product_qry->execute();
                $product_results=$product_qry->fetchAll(PDO::FETCH_OBJ);
                foreach($product_results as $product_result){
            ?>
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 product-layout-img mb-4 mb-md-0">
                        <!-- Product Horizontal -->
                        <div class="product-details-img product-horizontal-style">
                            <!-- Product Main -->
                            <div class="zoompro-wrap">
                                <!-- Product Image -->
                                <div class="zoompro-span"><img id="zoompro" class="zoompro" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($product_result->image); ?>" data-zoom-image="<?php echo(BACK_BASE_LINK); ?>/<?php echo($product_result->image); ?>" alt="<?php echo($product_result->product_name); ?>" width="625" height="808" /></div>
                                <!-- End Product Image -->
                                <!-- Product Label -->
                                <div class="product-labels"><span class="lbl pr-label1">New</span><span class="lbl on-sale">Sale</span></div>
                                <!-- End Product Label -->
                                <!-- Product Buttons -->
                                
                                <!-- End Product Buttons -->
                            </div>
                            <!-- End Product Main -->
                        </div>
                        <!-- End Product Horizontal -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 product-layout-info">
                        <!-- Product Details -->
                        <div class="product-single-meta">
                            <h2 class="product-main-title"><?php echo htmlentities($product_result->product_name);?></h2>
                            <!-- Product Reviews -->
                            <div class="product-review d-flex-center mb-3">
                                <div class="reviewStar d-flex-center"><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><span class="caption ms-2">24 Reviews</span></div>
                                
                            </div>
                            <!-- End Product Reviews -->
                            <!-- Product Info -->
                            <div class="product-info">
                                <p class="product-stock d-flex">Availability:
                                    <span class="pro-stockLbl ps-0">
                                        <span class="d-flex-center stockLbl instock text-uppercase">In stock</span>
                                    </span>
                                </p>
                                <p class="product-vendor">Vendor:<span class="text"><a href="javascript:;"><?php echo htmlentities($product_result->firstname);?></a></span></p>  
                                <p class="product-type">Product Type:<span class="text"><?php echo htmlentities($product_result->pro_type);?></span></p> 
                                <p class="product-sku">SKU:<span class="text"><?php echo htmlentities($product_result->sku);?></span></p>
                            </div>
                            <!-- End Product Info -->
                            <!-- Product Price -->
                            <div class="product-price d-flex-center my-3">
                                <span class="price old-price">GH&#8373;<?php echo htmlentities(number_format($product_result->old_price,2));?></span><span class="price">GH&#8373;<?php echo htmlentities(number_format($product_result->new_price,2));?></span>
                            </div>
                            <!-- End Product Price -->
                        </div>
                        <!-- End Product Details -->

                        <!-- Product Form -->
                        <form method="post" action="#" class="product-form product-form-border hidedropdown">

                            <!-- Product Action -->
                            <div class="product-action w-100 d-flex-wrap my-3 my-md-4">
                                
                                <!-- Product Add -->
                                <div class="product-form-submit addcart fl-1 ms-3">
                                    <a href="javascript:;" name="add" onclick="quickShopProduct('<?php echo($product_result->id); ?>');" data-bs-toggle="modal" data-bs-target="#quickshop_modal" class="btn btn-secondary product-form-cart-submit">
                                        <span>Add to cart</span>
                                    </a>
                                    <!-- <button type="submit" name="add" class="btn btn-secondary product-form-sold-out d-none" disabled="disabled">
                                        <span>Out of stock</span>
                                    </button> -->
                                </div>
                                <!-- Product Add -->
                            </div>
                            <!-- End Product Action -->
                        </form>
                        <!-- End Product Form -->

                        <!-- Product Info -->
                        <div class="userViewMsg featureText" data-user="20" data-time="11000"><i class="icon anm anm-eye-r"></i><b class="uersView">21</b> People are Looking for this Product</div> 
                        <!-- End Product Info -->
                    </div>
                </div>
            </div>
            <!--Product Tabs-->
            <div class="tabs-listing section pb-0">
                <ul class="product-tabs style2 list-unstyled d-flex-wrap d-flex-justify-center d-none d-md-flex">
                    <li rel="description" class="active"><a class="tablink">Description</a></li>
                    <li rel="shipping-return"><a class="tablink">Shipping &amp; Return</a></li>
                </ul>

                <div class="tab-container">
                    <!--Description-->
                    <h3 class="tabs-ac-style d-md-none active" rel="description">Description</h3>
                    <div id="description" class="tab-content">
                        <div class="product-description">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                    <p><?php echo htmlentities($product_result->description);?></p>
                                    
                                </div>

                                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <img data-src="assets/images/content/product-detail-img.jpg" src="assets/images/content/product-detail-img.jpg" alt="image" width="600" height="600" />
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!--End Description-->
                     <!--Shipping &amp; Return-->
                    <h3 class="tabs-ac-style d-md-none" rel="shipping-return">Shipping &amp; Return</h3>
                    <div id="shipping-return" class="tab-content">
                        <h4>Shipping &amp; Return</h4>
                        <ul class="checkmark-info">
                            <li>Dispatch: Within 24 Hours</li>
                            <li>Free shipping across all products on a minimum purchase of GH&#8373;500.00.</li>
                            <li>Cash on delivery might be available</li>
                            <li>Easy 30 days returns and exchanges</li>
                        </ul>
                        <h4>Free and Easy Returns</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <h4>Special Financing</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
                    </div>
                    <!--End Shipping &amp; Return-->
                </div>
                <!--End tab container-->
            </div>
        <?php } } ?>
        </div>
    </div>
    <!-- Body Container -->
</div>
<!--Page Wrapper-->
            


		<?php include '../include/footer.php'; ?>

	</body>
</html>