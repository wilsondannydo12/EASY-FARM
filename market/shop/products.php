<?php include_once ("../realPathRoot.php"); ?>
<?php include '../include/head.php'; ?>
<?php session_start(); ?>
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
                        <div class="page-title"><h1>Product</h1></div>
                        <!--Breadcrumbs-->
                        <div class="breadcrumbs"><a href="<?php echo(BASE_LINK); ?>/home" title="Back to the home page">Home</a><span class="title"><i class="icon anm anm-angle-right-l"></i> Shop</span><span class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>Product</span></div>
                        <!--End Breadcrumbs-->
                    </div>
                </div> 
            </div>
        </div>
        <!--End Page Header-->
        <!--Main Content-->
        <div class="container">              
                <?php 
                if (isset($_GET['shop_name'])) {
                    $shop_name = $_GET['shop_name'];
                    $products_qry = $db->prepare("SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor WHERE shop.shop_name='$shop_name'");
                    $products_qry->execute();
                    if ($products_qry->rowCount() > 0) {?>
                        <div class="collection-style1 row col-row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-2">
                       <?php 
                       $products_results=$products_qry->fetchAll(PDO::FETCH_OBJ);
                        foreach($products_results as $products_data){
                        ?>
                        <div class="category-item col-item zoomscal-hov">
                            <a href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($products_data->id);?>/<?php echo htmlentities($products_data->product_name);?>" class="category-link clr-none">
                                <div class="zoom-scal zoom-scal-nopb"><img class="blur-up lazyload w-100" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($products_data->image); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($products_data->image); ?>" alt="<?php echo htmlentities($products_data->product_name);?>" title="<?php echo htmlentities($products_data->product_name);?>" width="365" height="365" /></div>
                                <div class="details mt-3 d-flex justify-content-between align-items-center">
                                    <h4 class="category-title mb-0"><?php echo($products_data->product_name); ?></h4>
                                </div>
                            </a>
                        </div>
                <?php } ?>
                </div>
                   <?php }else{?>

                        <div class="alert alert-danger py-2 alert-dismissible fade show cart-alert" role="alert" style="text-align: center;">
                            <i class="align-middle text-center icon anm anm-times-r icon-large me-2"></i><strong class="text-uppercase">Oops!</strong> This shop is empty.
                            <button type="button" class="btn-close" onclick="loadHome();" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
           <?php
                    }
             }else{ ?>
                <div class="alert alert-danger py-2 alert-dismissible fade show cart-alert" role="alert" style="text-align: center;">
                    <i class="align-middle text-center icon anm anm-times-r icon-large me-2"></i><strong class="text-uppercase">Oops!</strong> This shop is empty.
                    <button type="button" class="btn-close" onclick="loadHome();" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
           <?php } ?>
        </div>
    </div>
    <!-- Body Container -->
</div>
<!--Page Wrapper-->
            


	<?php include '../include/footer.php'; ?>

	</body>
</html>