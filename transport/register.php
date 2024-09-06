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
<?php include_once 'php/register_account_server.php'; ?>

<!-- service section -->
      <div id="vehicles" class="vehicles">
         <div class="container" style="margin-top: 70px;">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Log In</h2>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, There </p>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="ban_track">
                     <figure><img src="<?php echo(BASE_LINK); ?>/assets/images/track.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <form class="" method="post">
                     <div class="col-md-12">
                        <h4 style="color: #000000; text-align: center; font-weight: bold;">Professional Services</h4>
                        <h5 style="color: #000000; text-align: center;">For fast booking, register account</h5>
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Username" type="text" name="username">
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Firstname" type="text" name="firstname">
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Lastname" type="text" name="lastname">
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Phone" type="text" name="phone">
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Location" type="text" name="location">
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Password" type="password" name="password">
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <button type="submit" name="signUpBtn" class="account_btn">Sign Up</button>
                        </div>
                        <div class="col-md-6">
                           I have account!
                           <a href="<?php echo(BASE_LINK); ?>/login?utm=self&ht=route">Sign In</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end service section -->

      


<?php include_once 'include/footer.php'; ?>

</body>
</html>