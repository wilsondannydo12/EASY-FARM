<?php include_once 'include/head.php'; ?>
<?php session_start(); ?>

<style type="text/css">
   .header {
       padding: 10px 5px 10px 5px;
       background-color: #5586ba;
       position: fixed;
       z-index: 999;
       margin-right: 130px;
   }
</style>
<body class="main-layout">
<?php include_once 'include/header.php'; ?>

<!-- banner -->
      <section class="banner_main">
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <!-- <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li> -->
            </ol>
            <div class="carousel-inner" style="margin-top: -140px;">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-7 col-lg-5">
                              <div class="text-bg">
                                 <h1>Easy-Farm Got You</h1>
                                 <span>We have over 100+ vehicles awaiting to render you service. You can contact any of them for smooth services.</span>
                                 <a class="read_more" href="<?php echo(BASE_LINK); ?>/vehicles">Our Vehicles</a>
                              </div>
                           </div>
                           <div class="col-md-12 col-lg-7">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="ban_track">
                                       <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/track.png" alt="img"/></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- about section -->
      <div id="about" class="about ">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="about_right">
                     <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc3.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2>About Us</h2>
                     <p> Grow your business by connecting with farmers in need of tractor services. Easily manage your bookings and keep your schedule full with our user-friendly platform.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section -->

      <!-- choose section -->
      <div class="choose">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Why Choose Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-5">
                  <div class="choose_box">
                     <i><img src="<?php echo(BASE_LINK); ?>/assets/images/why1.png" alt="#"/></i>
                     <h3>Our Vission</h3>
                     <p>Our vision is to revolutionize the agricultural industry by creating a unified digital ecosystem where all stakeholders—farmers, service providers, and suppliers—can thrive. We envision a future where technology bridges the gap between need and solution, enabling sustainable growth, improving livelihoods, and contributing to global food security.</p>
                     <a class="read_more" href="#">Read More</a>
                  </div>
               </div>
               <div class="col-md-5 offset-md-2">
                  <div class="choose_box">
                     <i><img src="<?php echo(BASE_LINK); ?>/assets/images/why2.png" alt="#"/></i>
                     <h3>Our Mission</h3>
                     <p>At EasyFarm, our mission is to empower the agricultural community by providing a seamless, integrated platform that connects farmers, tractor drivers, fertilizer sellers, and other essential service providers. We aim to simplify access to vital resources, enhance productivity, and foster collaboration, ensuring that every farmer can achieve their fullest potential.</p>
                     <a class="read_more" href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end choose section -->

      <!-- vehicles section -->
      <section id="vehicles" class="vehicles">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Vehicles</h2>
                     <p>We have over 100+ vehicles awaiting to render you service. You can contact any of them for smooth services.</p>
                  </div>
               </div>
            </div>
         </div>
         <div id="veh" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#veh" data-slide-to="0" class="active"></li>
               <li data-target="#veh" data-slide-to="1"></li>
               <li data-target="#veh" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc1.png" alt="#"/></figure>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc2.png" alt="#"/></figure>
                              </div>
                              <h3 class="blac_co">Truck</h3>
                           </div>
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc3.png" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc1.png" alt="#"/></figure>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc2.png" alt="#"/></figure>
                              </div>
                              <h3 class="blac_co">Truck</h3>
                           </div>
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc3.png" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc1.png" alt="#"/></figure>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc2.png" alt="#"/></figure>
                              </div>
                              <h3 class="blac_co">Truck</h3>
                           </div>
                           <div class="col-md-4">
                              <div class="vehicles_truck">
                                 <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/truc3.png" alt="#"/></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#veh" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#veh" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <a class="read_more" href="<?php echo(BASE_LINK); ?>/vehicles">Read More</a>
               </div>
            </div>
         </div>
      </section>
      <!-- end vehicles section -->


<?php include_once 'include/footer.php'; ?>

</body>
</html>