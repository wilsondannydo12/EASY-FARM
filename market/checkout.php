<?php include_once ("realPathRoot.php"); ?>
<?php include 'include/head.php'; ?>
<?php session_start(); ?>
<?php include 'include/function.php'; ?>
<body class="cart-page cart-style1-page">
	<!--Page Wrapper-->
    <div class="page-wrapper">
	
    	<?php include 'include/header.php'; ?>
        <?php include 'php/final_order_server.php'; ?>
    	<!-- Body Container -->
        <div id="page-content"> 
            <!--Page Header-->
            <div class="page-header text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                            <div class="page-title"><h1>Checkout</h1></div>
                            <!--Breadcrumbs-->
                            <div class="breadcrumbs"><a href="<?php echo(BASE_LINK); ?>/home" title="Back to the home page">Home</a><span class="main-title"><i class="icon anm anm-angle-right-l"></i>Checkout</span></div>
                            <!--End Breadcrumbs-->
                        </div>
                    </div> 
                </div>
            </div>
            <!--End Page Header-->
            <!--Main Content-->
            <div class="container">      
                <!--Checkout Content-->
                <div id="checkout_page_content"></div>
            </div>
        </div>
        <!-- Body Container -->
    </div>
    <!--Page Wrapper-->
            
	<?php include 'include/footer.php'; ?>

    <script type="text/javascript">
        function fillBillingSpace(){
            if (document.getElementById('add_tearm').checked) {
                var address = document.getElementById('ship_address').value;
                var apartment = document.getElementById('ship_apartment').value;
                var postCode = document.getElementById('ship_postCode').value;
                var town = document.getElementById('ship_town').value;

                document.getElementById('bill_address').value = address;
                document.getElementById('bill_apartment').value = apartment;
                document.getElementById('bill_postCode').value = postCode;
                document.getElementById('bill_town').value = town;
            }else{
                document.getElementById('bill_address').value = "";
                document.getElementById('bill_apartment').value = "";
                document.getElementById('bill_postCode').value = "";
                document.getElementById('bill_town').value = "";
            }
        }
    </script>

	</body>
</html>