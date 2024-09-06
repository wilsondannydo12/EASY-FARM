<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>EASY-FARM || ADMINISTRATION</title>
    <link href="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png" type="images/x-icon" rel="shortcut icon">

    <!-- Fontfaces CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
 
    <!-- Bootstrap CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  

    <!-- Main CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/css/theme.css" rel="stylesheet" media="all"> 

</head>

<body class="animsition"> 
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <?php include 'php/logIn_server.php'; ?>
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="mb-5">
                            <img src="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png" alt="ckt_logo" style="width: 20%; margin-left: auto; margin-right: auto; display: block; margin-top: 5%;">
                            <span style="text-align: center;">
                              <h3 style="color:  green;">EASY-FARM</h3>
                              <!-- <h3 class="mt-3" style="color:  #c0392b;">FOOD BANK</h3> -->
                            </span>
                        </div>
                            <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group"> 
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="logInBtn" type="submit">sign in</button>
                            </form>
                            
                        
                          </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- Jquery JS-->
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="http://localhost/elearning/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo(BASE_LINK); ?>/assets/vendor/select2/select2.min.js">
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Main JS-->
    <script src="<?php echo(BASE_LINK); ?>/assets/js/main.js"></script>

</body>

</html>
<!-- end document-->