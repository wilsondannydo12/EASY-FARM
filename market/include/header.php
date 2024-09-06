<!--Header-->
            <header class="header header-7"> 
                <!--Header inner-->
                <div class="header-main d-flex align-items-center">
                    <div class="container container-1330">        
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-4 col-md-5 col-lg-5 col-xl-6 align-self-center icons-col text-left d-xl-none">
                                <!--Mobile Toggle-->
                                <button type="button" class="iconset icon-link ps-0 menu-icon js-mobile-nav-toggle mobile-nav--open d-inline-flex flex-column d-lg-none">
                                    <span class="iconCot"><i class="hdr-icon icon anm anm-times-l"></i><i class="hdr-icon icon anm anm-bars-r"></i></span>
                                    <span class="text d-none">Menu</span>
                                </button>
                                <!--End Mobile Toggle-->
                                <!--Search Mobile-->
                                <div class="search-parent iconset d-xl-none">
                                    <div class="site-search">
                                        <a href="#;" class="search-icon icon-link clr-none d-flex" data-bs-toggle="offcanvas" data-bs-target="#search-drawer">
                                            <span class="iconCot"><i class="hdr-icon icon anm anm-search-l"></i></span>
                                            <span class="text d-none d-xl-flex flex-column text-left">Search</span>
                                        </a>
                                    </div>
                                    <div class="search-drawer offcanvas offcanvas-top" tabindex="-1" id="search-drawer">
                                        <div class="container">
                                            <div class="search-header d-flex-center justify-content-between mb-3">
                                                <h3 class="title m-0">What are you looking for?</h3>
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="search-body">
                                                <form class="form minisearch" id="header-search" action="#" method="get">
                                                    <!--Search Field-->
                                                    <div class="d-flex searchField">
                                                        <div class="search-category">
                                                            <?php 
                                                            $shop_qry_2 = $db->prepare("SELECT * FROM shop WHERE status='active'");
                                                            $shop_qry_2->execute();
                                                            $shop_results_2=$shop_qry_2->fetchAll(PDO::FETCH_OBJ);
                                                            ?>
                                                            <select class="rgsearch-category rounded-end-0" required>
                                                                <option value="">All Categories</option>
                                                                <option value="all">- All</option>
                                                                <?php 
                                                                foreach($shop_results_2 as $shop_result_2){
                                                                ?>
                                                                <option value="see<?php echo $shop_result_2->shop_name; ?>">d">- <?php echo $shop_result_2->shop_name; ?>"></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-box d-flex fl-1">
                                                            <input type="text" class="input-text rounded-0 border-start-0 border-end-0" placeholder="Search for products..." value="" />
                                                            <button type="submit" class="action search d-flex-justify-center btn btn-primary rounded-start-0"><i class="icon anm anm-search-l"></i></button>
                                                        </div>
                                                    </div>
                                                    <!--End Search Field-->
                                                    <!--Search popular-->
                                                    <!-- <div class="popular-searches d-flex-justify-center mt-3">
                                                        <span class="title fw-600">Trending Now:</span>
                                                        <div class="d-flex-wrap searches-items">
                                                            <a class="text-link ms-2" href="#">Apple,</a>
                                                            <a class="text-link ms-2" href="#">Potatos,</a>
                                                            <a class="text-link ms-2" href="#">Tomato</a>
                                                        </div>
                                                    </div> -->
                                                    <!--End Search popular-->
                                                    <!--Search products-->
                                                    <!--Search products ends-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Search Mobile--> 
                                <!--Account Mobile-->
                                <div class="account-parent iconset d-inline-block d-xl-none">
                                    <div class="account-link"><span class="iconCot"><i class="hdr-icon icon anm anm-user-al"></i></span></div>
                                    <div id="accountBox">
                                        <div class="customer-links">
                                            <ul class="m-0">
                                                
                                                <?php
                                                if (isset($_SESSION['customer_id'])) { ?>
                                                     <li><a href="<?php echo(BASE_LINK); ?>/account/my-account"><i class="icon anm anm-user-cil"></i>My Account</a></li>
                                                    <li><a href="<?php echo(BASE_LINK); ?>/account/logout"><i class="icon anm anm-sign-out-al"></i>Sign out</a></li>
                                                 <?php }else{ ?>
                                                    <li><a href="<?php echo(BASE_LINK); ?>/account/login?utm=self&ttp=route"><i class="icon anm anm-sign-in-al"></i>Sign In</a></li>
                                                    <li><a href="<?php echo(BASE_LINK); ?>/account/signup"><i class="icon anm anm-user-al"></i>Register</a></li>
                                                <?php } 
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--End Account Mobile--> 
                            </div>

                            <!--Logo-->
                            <div class="logo col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2 align-self-center">
                                <a class="logoImg" href="<?php echo(BASE_LINK); ?>/home"><img class="mx-auto mx-xl-0" src="<?php echo(HOME_BASE_LINK); ?>/assets/images/farm-logo3.png" alt="Agro Business" title="Agro Business" width="100" height="150" /><sup style="font-size: 13px;">EasyFarm</sup></a>
                            </div>
                            <!--End Logo-->
                            <!--Search Inline-->
                            <div class="col-1 col-sm-1 col-md-1 col-lg-4 col-xl-4 align-self-center d-none d-xl-block">
                                <div class="minisearch-inline">
                                    <form class="form minisearch" id="header-search0" action="#" method="get">
                                        <label class="label d-none"><span>Search</span></label>
                                        <!--Search Field-->
                                        <div class="d-flex searchField">
                                            <div class="search-category">
                                                <?php 
                                                $shop_qry_1 = $db->prepare("SELECT * FROM shop WHERE status='active'");
                                                $shop_qry_1->execute();
                                                $shop_results_1=$shop_qry_1->fetchAll(PDO::FETCH_OBJ);
                                                ?>
                                                <select class="rgsearch-category rounded-pill rounded-end-0 ps-3" required>
                                                    <option value="">All Categories</option>
                                                    <option value="all">- All</option>
                                                    <?php 
                                                    foreach($shop_results_1 as $shop_result_1){
                                                    ?>
                                                    <option value="<?php echo $shop_result_1->shop_name; ?>">- <?php echo $shop_result_1->shop_name; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="input-box d-flex fl-1 position-relative">
                                                <input type="text" class="input-group-field input-text rounded-pill rounded-start-0 border-start-0" placeholder="Search for products, brands..." value="" />
                                                <button type="submit" class="input-group-btn action search d-flex-justify-center text-link"><i class="hdr-icon icon anm anm-search-l me-2"></i></button>
                                            </div>
                                        </div>
                                        <!--End Search Field-->
                                    </form>
                                </div>
                            </div>
                            <!--End Search Inline-->
                            <!--Right Icon-->
                            <div class="col-4 col-sm-4 col-md-5 col-lg-5 col-xl-6 align-self-center icons-col text-right">
                                <!--Compare-->
                                
                                <!--End Wishlist-->
                                <!--Account desktop-->
                                <div class="account-link iconset d-none d-xl-inline-block">
                                    <div class="icon-link clr-none d-flex">
                                        <span class="iconCot"><i class="hdr-icon icon anm anm anm-user-al"></i></span>
                                        <span class="text d-flex flex-column text-left">My Account <small>
                                            <?php if (isset($_SESSION['customer_id'])) { ?>
                                                <a href="<?php echo(BASE_LINK); ?>/account/logout" >Logout</a> / <a href="<?php echo(BASE_LINK); ?>/account/my-account" >My Account</a> 
                                            <?php }else{ ?>
                                                <a href="<?php echo(BASE_LINK); ?>/account/login?utm=self&ttp=route" >Login</a> / <a href="<?php echo(BASE_LINK); ?>/account/signup">Register</a></small></span>
                                            <?php } ?>
                                            
                                    </div>
                                </div> 
                                <!--End Account desktop-->
                                <!--Minicart-->
                                <div class="header-cart iconset pe-0">
                                    <div id="cart_busket_with_quantity"></div>
                                </div>
                                <!--End Minicart-->
                            </div>
                            <!--End Right Icon-->
                        </div>                                                
                    </div>
                </div>
                <!--End Header inner-->
                <!--Navigation Desktop-->
                <div class="main-menu-outer d-none d-lg-block header-fixed">
                    <div class="container container-1330">
                        <div class="menu-outer rounded-4">
                            <div class="row g-0">  
                                <div class="col-1 col-sm-1 col-md-1 col-lg-3 align-self-center">                                   
                                    <div class="header-vertical-menu toggle">
                                        <h4 class="menu-title d-flex-center body-font"><i class="icon anm anm-bars-r"></i><span class="text">Browse Categories</span></h4>
                                        <div class="vertical-menu-content rounded-4 rounded-top-0">
                                            <ul class="menuList"> 
                                                <li>
                                                    <ul class="moreSlideOpen">
                                                        <?php 
                                                        $shop_qry_3 = $db->prepare("SELECT * FROM shop WHERE status='active'");
                                                        $shop_qry_3->execute();
                                                        $shop_results_3=$shop_qry_3->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($shop_results_3 as $shop_result_3){ 
                                                        ?>
                                                        <li><a href="<?php echo(BASE_LINK); ?>/shop/products/<?php echo $shop_result_3->shop_name; ?>" class="nav-link"><?php echo $shop_result_3->shop_name; ?></a></li>
                                                    <?php } ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="moreCategories border-0">View All Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-7 align-self-center d-menu-col hdr-menu-left menu-position-left">
                                    <nav class="navigation ps-lg-3" id="AccessibleNav">
                                        <ul id="siteNav" class="site-nav medium left">
                                            <li class="lvl1 parent dropdown"><a href="<?php echo(BASE_LINK); ?>/home">Home <i class="icon anm anm-angle-down-l"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="<?php echo(BASE_LINK); ?>/home" class="site-nav lvl-2">Home</a></li>
                                                    <li><a href="<?php echo(HOME_BASE_LINK); ?>/" class="site-nav lvl-2">Agro Business</a></li>
                                                </ul>
                                            </li>
                                            <li class="lvl1 parent dropdown"><a href="javascript:;">Shop <i class="icon anm anm-angle-down-l"></i></a>
                                                <ul class="dropdown">
                                                    <?php 
                                                    $shop_qry = $db->prepare("SELECT * FROM shop WHERE status='active'");
                                                    $shop_qry->execute();
                                                    $shop_results=$shop_qry->fetchAll(PDO::FETCH_OBJ);
                                                    foreach($shop_results as $shop_result){ ?>
                                                    <li><a href="<?php echo(BASE_LINK); ?>/shop/products/<?php echo $shop_result->shop_name; ?>" class="site-nav lvl-2"><?php echo $shop_result->shop_name; ?></a></li>
                                                <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- <div class="col-1 col-sm-1 col-md-1 col-lg-2 align-self-center text-right">
                                    <a href="shop-grid-view.html" class="store-link text-uppercase">Super Discount <img class="ms-1" src="assets/images/icons/go-shape.png" alt="icon" width="38" height="38" /></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Navigation Desktop-->
            </header>
            <!--End Header-->
            <?php include 'mobileHeader.php'; ?>