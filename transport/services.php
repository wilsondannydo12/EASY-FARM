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

<!-- service section -->
      <div id="service" class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Our Services</h2>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, There </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <!-- <div class="col-md-12"> -->
                  <div class="service_main">
                     <div class="col-md-3">
                        <div class="service_box yell_colo">
                           <i><img src="<?php echo(BASE_LINK); ?>/assets/images/ser3.png" alt="#"/></i>
                           <h4 style=""> COURIER SERVICES</h4>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="service_box blu_colo">
                           <i><img src="<?php echo(BASE_LINK); ?>/assets/images/ser1.png" alt="#"/></i>
                           <h4 style="">PEDESTRIAN TRANSPORTATION</h4>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="service_box yelldark_colo">
                           <i><img src="<?php echo(BASE_LINK); ?>/assets/images/ser2.png" alt="#"/></i>
                           <h4 style="">ADMINISTRATION SERVICES</h4>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="service_box yell_colo" style="margin-left: 80px;">
                           <i><img src="<?php echo(BASE_LINK); ?>/assets/images/ser5.png" alt="#"/></i>
                           <h4 style="">100% safe</h4>
                        </div>
                     </div>
                  </div>
               <!-- </div> -->
               <!-- <div class="col-md-12">
                  <a class="read_more" href="#">Read More</a>
               </div> -->
            </div>
         </div>
      </div>
      <!-- end service section -->

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


<?php include_once 'include/footer.php'; ?>

</body>
</html>