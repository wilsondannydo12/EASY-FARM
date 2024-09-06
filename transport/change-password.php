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
<?php include_once 'php/change_password_server.php'; ?>

<!-- service section -->
      <div id="service" class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Change Password</h2>
                    
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
                        <h4 style="color: #000000; text-align: center; font-weight: bold;">Change Password</h4>
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Current Password" type="password" name="cpass" required>
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="New Password" type="passwword" name="npass" required>
                     </div>
                     <div class="col-md-12">
                        <input class="my_inputboxes mb-3" placeholder="Confirm NewPassword" type="password" name="cnpass" required>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <button type="submit" name="changePassBtn" class="account_btn">Save Changes</button>
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