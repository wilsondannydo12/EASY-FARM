<!-- loader  -->
<div class="loader_bg">
   <div class="loader"><img src="<?php echo(BASE_LINK); ?>/assets/images/loading.gif" alt="#" /></div>
</div>
<!-- end loader -->
<div id="mySidepanel" class="sidepanel">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
   <a href="<?php echo(BASE_LINK); ?>/home">Home </a>
   <a href="<?php echo(BASE_LINK); ?>/home#about">About</a>
   <a href="<?php echo(BASE_LINK); ?>/services">Services  </a>
   <a href="<?php echo(BASE_LINK); ?>/vehicles">Our Vehicles</a>
   <a href="<?php echo(BASE_LINK); ?>/contact">Contact</a>
</div>

<!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-4 col-sm-4">
                     <div class="logo">
                        <a href="<?php echo(BASE_LINK); ?>/home"><img src="<?php echo(HOME_BASE_LINK); ?>/assets/images/farm-logo3.png" alt="logo" style="width: 10%;"/><sup style="font-size: 13px;">Easy-Farm</sup></a>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-8">
                     <div class="right_bottun">
                        <ul class="conat_info d_none ">
                           <?php if (!empty($_SESSION['transp_customer_id'])) { ?>
                               <li><a href="javascript:;" style="font-weight: bold; color: #ffffff; font-size: 12px;">My Account</a> / <a href="<?php echo(BASE_LINK); ?>/change-password" style="font-weight: bold; color: #ffffff; font-size: 12px;">Change Password</a> / <a href="<?php echo(BASE_LINK); ?>/logout" style="font-weight: bold; color: red; font-size: 12px;">Logout</a></li>  
                           <?php }else{?> 
                              <li><a href="<?php echo(BASE_LINK); ?>/login?utm=self&ht=route"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                           <?php } ?>
                           
                           <li><a href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                        <button class="openbtn" onclick="openNav()"><img src="<?php echo(BASE_LINK); ?>/assets/images/menu_icon.png" alt="#"/> </button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header --> 