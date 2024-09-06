<?php include_once ("../realPathRoot.php"); ?>
<?php include_once('../include/head.php'); ?>
<?php session_start(); ?>
<body class="account-page register-page">
	<!--Page Wrapper-->
    <div class="page-wrapper">
	
    	<?php include_once '../include/header.php'; ?>
        <?php //include_once '../php/account/customer_account_registration.php'; ?>
    	<!-- Body Container -->
        <div id="page-content"> 
            <!--Page Header-->
            <div class="page-header text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                            <div class="page-title"><h1>Create an Account</h1></div>
                            <!--Breadcrumbs-->
                            <div class="breadcrumbs"><a href="<?php echo(BASE_LINK); ?>/home" title="Back to the home page">Home</a><span class="title"><i class="icon anm anm-angle-right-l"></i>My Account</span><span class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>Create an Account</span></div>
                            <!--End Breadcrumbs-->
                        </div>
                    </div> 
                </div>
            </div>
            <!--End Page Header-->
            <!--Main Content-->
            <div class="container">   
                <div class="login-register pt-2">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                            <div class="inner h-100">
                                <form method="post" action="" id="customerRegistrationForm" class="customer-form" onsubmit="return false;">   
                                    <h2 class="text-center fs-4 mb-4">Register here if you are a new customer</h2>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="customer" class="d-none">Username <span class="required">*</span></label>
                                            <input type="text" name="username" placeholder="Username" id="username" value="" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="CustomerEmail" class="d-none">Email <span class="required">*</span></label>
                                            <input type="email" name="email" placeholder="Email" id="email" value="" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="CustomerPhone" class="d-none">Phone <span class="required">*</span></label>
                                            <input type="text" name="phone" placeholder="Phone" id="phone" value="" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="" class="d-none">Password <span class="required">*</span></label>
                                            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required />                          
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="CustomerConfirmPassword" class="d-none">Confirm Password <span class="required">*</span></label>
                                            <input id="CustomerConfirmPassword" type="Password" name="confirmPassword" autocomplete="off" placeholder="Confirm Password" required />                             
                                        </div>
                                        <div class="form-group col-12">
                                            <div class="login-remember-forgot d-flex justify-content-between align-items-center">
                                                <div class="agree-check customCheckbox">
                                                    <input id="agree" name="agree" type="checkbox" value="agree" required />
                                                    <label for="agree"> I agree to terms & Policy.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-0">
                                            <input type="submit" id="customerAccountBtn" name="customerAccountBtn" class="btn btn-primary btn-lg w-100" onclick="checkPassword();" value="Register" />
                                        </div>
                                    </div>

                                    <div class="login-signup-text mt-4 mb-2 fs-6 text-center text-muted">Already have an account? <a href="<?php echo(BASE_LINK); ?>/account/login?utm=self&ttp=route" class="btn-link">Login now</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Body Container -->
    </div>
    <!--Page Wrapper-->
            
	<?php include_once '../include/footer.php'; ?>
    <script type="text/javascript">
        function checkPassword() {
            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let mainPass = document.getElementById('password').value;
            let confirmPass = document.getElementById('CustomerConfirmPassword').value;
            if ((username == "" || username == null) || (email == "" || email == null) || (phone == "" || phone == null) || (mainPass == "" || mainPass == null) || (confirmPass == "" || confirmPass == null)) {
                alert("All fields are required.");
            }else{
                 if (mainPass == confirmPass) {
                    if (document.getElementById('agree').checked) {
                        submitRegistration(username, email, phone, mainPass);
                    }else{
                        alert("Please check the agreement checkbox");
                    }
                }else{
                    alert("Password mismatch");
                }
            }
        }

        function submitRegistration(username, email, phone, mainPass) {
            $('#customerAccountBtn').prop('disabled',true);
            jQuery.ajax({
            url: "<?php echo(BASE_LINK); ?>/php/account/customer_account_registration.php",
            data:{
            username : username,
            email : username,
            phone : phone,
            password : mainPass
            },
            type: "POST",
                success:function(data){
                alert(data);
                $('#customerAccountBtn').prop('disabled',false);
                $('#customerRegistrationForm')[0].reset();

                },  
                error:function (){}
            });
        }
    </script>

	</body>
</html>