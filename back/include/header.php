<header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="javascript:;">
                            <!-- <img style="width: 4%;" src="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png" alt="AGRO-LOGO" /> -->
                            <span style="color: #fff; font-weight: bold;">EASY-FARM</span>
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?php echo(BASE_LINK); ?>/dashboard">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <?php include 'essentials/admin_header.php'; ?>
                            <?php include 'essentials/farmer_header.php'; ?>
                            <?php include 'essentials/transport_officer_header.php'; ?>
                            
                            
                        </ul>
                    </div>
                    <div class="header__tool">
                        <!-- notification---------- -->
                        <!-- notification---------- -->
                        <!-- setting -------------- -->
                        <!-- setting -------------- -->
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="<?php echo($myImage); ?>" alt="<?php echo($firstname); ?>" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="javascript:;"><?php echo($firstname); ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">

                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo(BASE_LINK); ?>/my-profile">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo(BASE_LINK); ?>/change-password">
                                                <i class="zmdi zmdi-key"></i>Change Password</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?php echo(BASE_LINK); ?>/logout">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- mobile header --------------------------->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="javascript:;">
                            <img style="width: 12%;" src="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png" alt="AGRO-LOGO" />
                            <span style="color: #fff; font-weight: bold;">AGRO BUSINESS</span>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-graduation-cap"></i>Academics</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="school.php">School / Faculty</a>
                                </li>
                                <li>
                                    <a href="department.php">Department</a>
                                </li>
                                <li>
                                    <a href="programme.php">Programme</a>
                                </li>
                                <li>
                                    <a href="course.php">Course</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="<?php echo($myImage); ?>" alt="<?php echo($firstname); ?>" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="javascript:;"><?php echo($firstname); ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">

                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="<?php echo(BASE_LINK); ?>/my-profile">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="<?php echo(BASE_LINK); ?>/change-password">
                                        <i class="zmdi zmdi-settings"></i>Change Password</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="<?php echo(BASE_LINK); ?>/logout">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>