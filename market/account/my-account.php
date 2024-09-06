<?php session_start(); ?>
<?php include_once('include/function.php'); ?>
<?php secure_page(); ?>
<?php include_once ("../realPathRoot.php"); ?>
<?php include_once('../include/head.php'); ?>
<body class="account-page login-page">
	<!--Page Wrapper-->
    <div class="page-wrapper">
	
    	<?php include_once '../include/header.php'; ?>
        <?php include_once '../php/account/shiping_address_server.php'; ?>
        <?php include_once '../php/account/change_password_server.php'; ?>
    	<!-- Body Container -->
        <div id="page-content"> 
            <!--Page Header-->
            <div class="page-header text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                            <div class="page-title"><h1>Dashboard</h1></div>
                            <!--Breadcrumbs-->
                            <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a><span class="title"><i class="icon anm anm-angle-right-l"></i>My Account</span><span class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>Dashboard</span></div>
                            <!--End Breadcrumbs-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Page Header-->
            <!--Main Content-->
            <?php 
            $cur_customer = $_SESSION['customer_id'];
            $cus_qry = $db->prepare("SELECT shipping_address.*, customers.phone, customers.email FROM shipping_address INNER JOIN customers ON customers.id=shipping_address.customer WHERE customers.id='$cur_customer' AND shipping_address.status='active'");
            $cus_qry->execute();
            $cus_results=$cus_qry->fetchAll(PDO::FETCH_OBJ);
            if ($cus_qry->rowCount() > 0) {
                foreach($cus_results as $cus_result){
                    $cus_name = $cus_result->firstname." ".$cus_result->lastname;
                    $cus_email = $cus_result->email;
                    $cus_phone = $cus_result->phone;
                }
                $hide_update_self = "";
            }else{
                $notif = "<i style='color:red;'>Update your address book</i>";
                $cus_name = "";
                $cus_email = "";
                $cus_phone = "";
                $hide_update_self = "hidden";
            }
                    
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mb-lg-0">
                        <!-- Dashboard sidebar -->
                        <div class="dashboard-sidebar bg-block">
                            <div class="profile-top text-center mb-4 px-3">
                                <div class="profile-image mb-3">
                                    <img class="rounded-circle blur-up lazyload" data-src="<?php echo(BASE_LINK); ?>/assets/images/photo_default.png" src="<?php echo(BASE_LINK); ?>/assets/images/photo_default.png" alt="user" width="130" />
                                </div>
                                <div class="profile-detail">
                                    <h3 class="mb-1">
                                        <?php
                                        if (empty($cus_name)) {
                                            echo $notif;
                                        }else{
                                            echo $cus_name;
                                        }
                                        ?>
                                     </h3>
                                    <p class="text-muted">
                                        <?php echo $cus_email;?>
                                    </p>
                                </div>
                            </div>
                            <div class="dashboard-tab">
                                <ul class="nav nav-tabs flex-lg-column border-bottom-0" id="top-tab" role="tablist">
                                    <li class="nav-item"><a href="#" data-bs-toggle="tab" data-bs-target="#info" class="nav-link active">Account Info</a></li>
                                    <li class="nav-item"><a href="#" data-bs-toggle="tab" data-bs-target="#address" class="nav-link">Address Book</a></li>
                                    <li class="nav-item"><a href="#" data-bs-toggle="tab" data-bs-target="#orders" class="nav-link">My Orders</a></li>
                                    <li class="nav-item"><a href="#" data-bs-toggle="tab" data-bs-target="#awaiting_payment" class="nav-link">Awaiting Payment</a></li>
                                    <li class="nav-item"><a href="<?php echo(BASE_LINK); ?>/account/logout" class="nav-link">Log Out</a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Dashboard sidebar -->
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                        <div class="dashboard-content tab-content h-100" id="top-tabContent">
                            <!-- Account Info -->
                            <div class="tab-pane fade h-100 show active" id="info">
                                <div class="account-info h-100">
                                    <div class="welcome-msg mb-4">
                                        <h2>Hello, <span class="text-primary">
                                            <?php
                                            if (empty($cus_name)) {
                                                echo $notif;
                                            }else{
                                                echo $cus_name;
                                            }
                                            ?>
                                        </span></h2>
                                    </div>

                                    <div class="row g-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 row-cols-1 mb-4">
                                        <div class="counter-box">
                                            <div class="bg-block d-flex-center flex-nowrap">
                                                <img class="blur-up lazyload" data-src="<?php echo(BASE_LINK); ?>/assets/images/icons/sale.png" src="<?php echo(BASE_LINK); ?>/assets/images/icons/sale.png" alt="icon" width="64" height="64" />
                                                <div class="content">
                                                    <h3 class="fs-5 mb-1 text-primary">
                                                        <?php 
                                                            $total_order_qry = $db->query("SELECT * FROM order_shipping WHERE status='delivered'");
                                                            $total_order_num = $total_order_qry->rowCount(); 
                                                            echo htmlentities($total_order_num);
                                                        ?>
                                                    </h3>
                                                    <p>Total Order</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="counter-box">
                                            <div class="bg-block d-flex-center flex-nowrap">
                                                <img class="blur-up lazyload" data-src="<?php echo(BASE_LINK); ?>/assets/images/icons/homework.png" src="<?php echo(BASE_LINK); ?>/assets/images/icons/homework.png" alt="icon" width="64" height="64" />
                                                <div class="content">
                                                    <h3 class="fs-5 mb-1 text-primary">
                                                        <?php 
                                                            $pending_order_qry = $db->query("SELECT * FROM order_shipping WHERE status='pending' || status='in process'");
                                                            $pending_order_num = $pending_order_qry->rowCount(); 
                                                            echo htmlentities($pending_order_num);
                                                        ?>
                                                    </h3>
                                                    <p>Pending Orders</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="counter-box">
                                            <div class="bg-block d-flex-center flex-nowrap">
                                                <img class="blur-up lazyload" data-src="<?php echo(BASE_LINK); ?>/assets/images/icons/order.png" src="<?php echo(BASE_LINK); ?>/assets/images/icons/order.png" alt="icon" width="64" height="64" />
                                                <div class="content">
                                                    <h3 class="fs-5 mb-1 text-primary">
                                                        <?php 
                                                            $awaiting_pay_qry = $db->query("SELECT * FROM order_shipping WHERE payment='awaiting' || payment='in process'");
                                                            $awaiting_pay_num = $awaiting_pay_qry->rowCount(); 
                                                            echo htmlentities($awaiting_pay_num);
                                                        ?>
                                                    </h3>
                                                    <p>Awaiting Payments</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="account-box">
                                        <h3 class="mb-3">Account Information</h3>
                                        <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1">
                                            <div class="box-info mb-4">
                                                <div class="box-title d-flex-center">
                                                    <h4>Contact Information</h4> <a href="#" <?php echo $hide_update_self; ?> data-bs-toggle="modal" data-bs-target="#emailModal" class="btn-link ms-auto">Edit</a>
                                                </div>
                                                <div class="box-content mt-3">
                                                    <p class="mb-2">
                                                        <?php
                                                        if (empty($cus_email)) {
                                                            echo $notif;
                                                        }else{
                                                            echo $cus_email;
                                                        }
                                                        ?>
                                                    </p>
                                                    <p><a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal" class="btn-link">Change Password</a></p>
                                                </div>
                                            </div>
                                            <div class="box-info mb-4">
                                                <div class="box-title d-flex-center">
                                                    <h4>Newsletters</h4> <a href="#" class="btn-link ms-auto">Edit</a>
                                                </div>
                                                <div class="box-content mt-3">
                                                    <p>You are currently not subscribed to any newsletter.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Account Info -->
                            <?php include_once('essentials/address_book.php'); ?>
                            <?php include_once('essentials/my_orders.php'); ?>
                            <?php include_once('essentials/awaiting_payment.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Main Content ends-->
        </div>
        <!-- Body Container -->
    </div>
    <!--Page Wrapper-->

    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addNewModalLabel">Update Account</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="">  
                        <div class="form-group">
                            <label for="email" class="d-none">Email</label>
                            <input name="email" placeholder="Email" value="<?php echo($cus_email); ?>" id="email" type="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="cus_phone" class="d-none">Phone</label>
                            <input name="cus_phone" placeholder="Phone" value="<?php echo($cus_phone); ?>" id="cus_phone" type="text" required/>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" name="changeEmailBtn" class="btn btn-primary m-0"><span>Save Changes</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addNewModalLabel">Change Password</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="">  
                        <div class="form-group">
                            <label for="current-password" class="d-none">Current Password</label>
                            <input name="cpass" placeholder="Current Password" value="" id="current-password" type="password" required/>
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="d-none">New Password</label>
                            <input name="npass" placeholder="New Password" value="" id="new-password" type="password" required/>
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="d-none">New Password</label>
                            <input name="cnpass" placeholder="Confirm New Password" value="" id="new-password" type="password" required/>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" name="changePassBtn" class="btn btn-primary m-0"><span>Save Changes</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="awaitingPaymentModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addNewModalLabel">Issue Payment</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action=""> 
                        <input type="hidden" name="curr_orderNo" id="curr_orderNo"> 
                        <div class="form-group">
                            <label for="order_number" class="d-none">Order Number</label>
                            <input name="order_number" onkeyup="checkOrderNo();" placeholder="Order Number" id="order_number" type="text" required/>
                            <span id="orderNo_msg" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div class="form-group">
                            <label for="transaction_no" class="d-none">Transaction Number</label>
                            <input name="transaction_no" placeholder="Transaction Number" id="transaction_no" type="text" required/>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" name="IssuePaymentBtn" id="IssuePaymentBtn" class="btn btn-primary m-0"><span>Save Changes</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            
	<?php include_once '../include/footer.php'; ?>
    <script type="text/javascript">
        function getAddressID(address_id){
            document.getElementById('addressStatus_id').value=address_id;
        }
        
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

        function fetch_address(cus_id) {
            document.getElementById('address_for_update').innerHTML="Working on it...";
            jQuery.ajax({
            url: "<?php echo(BASE_LINK); ?>/php/account/fetch_address_for_update.php",
            data:{
            cus_id : cus_id
            },
            type: "POST",
                success:function(data){
                    $("#address_for_update").html(data);
                },  
                error:function (){}
            });
        }

        function getOrderNo(orderNo){
            document.getElementById('curr_orderNo').value=orderNo;
        }

        function checkOrderNo() {
            var orderNo_input = document.getElementById('order_number').value;
            var curr_orderNo = document.getElementById('curr_orderNo').value;
            if (curr_orderNo == orderNo_input) {
                document.getElementById('orderNo_msg').innerHTML="";
                $('#IssuePaymentBtn').prop('disabled',false);
            }else{
                document.getElementById('orderNo_msg').innerHTML="Invalid order number";
                $('#IssuePaymentBtn').prop('disabled',true);
            }
        }
    </script>

	</body>
</html>