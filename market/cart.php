<?php include_once ("realPathRoot.php"); ?>
<?php include 'include/head.php'; ?>
<?php session_start(); ?>
<body class="cart-page cart-style1-page">
	<!--Page Wrapper-->
    <div class="page-wrapper">
	
	<?php include 'include/header.php'; ?>
	<!-- Body Container -->
    <div id="page-content"> 
        <!--Page Header-->
        <div class="page-header text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                        <div class="page-title"><h1>Your Shopping Cart</h1></div>
                        <!--Breadcrumbs-->
                        <div class="breadcrumbs"><a href="<?php echo(BASE_LINK); ?>/home" title="Back to the home page">Home</a><span class="main-title"><i class="icon anm anm-angle-right-l"></i>Your Shopping Cart</span></div>
                        <!--End Breadcrumbs-->
                    </div>
                </div> 
            </div>
        </div>
        <!--End Page Header-->
        <!--Main Content-->
        <div class="container">     
            <!--Cart Content-->
            <div id="my_cart_page_content"></div>
        </div>
    </div>
    <!-- Body Container -->
</div>
<!--Page Wrapper-->
            


		<?php include 'include/footer.php'; ?>

	</body>
</html>