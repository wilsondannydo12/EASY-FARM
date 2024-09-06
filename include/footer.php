
<div class="innerDiv">
  <a href="<?php echo(BASE_LINK); ?>/transport/home" target="_blank">
    <div class="btnContainer">
        <div class="floatingBtn">Request for Transport</div>
    </div>
    </a>
</div>



<div class="modal fade" id="checkStudentIdModal">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">CREATE ACCOUNT</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="map_form_container">
              <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="mb-3 col-md-9">
                      <label for="firstname" class="form-label">Profile Image</label>
                      <input type="file" class="form-control" name="profileImg" id="profileImg" onchange="document.getElementById('previewProfile').src = window.URL.createObjectURL(this.files[0]); check_profileImg_ext(this.value);" required>
                    </div>
                    <div class="col-md-3">
                        <img id="previewProfile" class="profile-preview-img" src="<?php echo(BASE_LINK); ?>/assets/images/photo_default.png" alt="Preview Will Show Here" style="" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Username</label>
                        <input type="text" class="input-box" onkeyup="checkUsername();" name="username" id="username" autocomplete="off" required>
                        <div id="signUp_username"></div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Firstname</label>
                        <input type="text" class="input-box" name="firstname" id="firstname" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Lastname</label>
                        <input type="text" class="input-box" name="lastname" id="lastname" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Phone</label>
                        <input type="text" class="input-box" name="phone" id="phone" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Email</label>
                        <input type="text" class="input-box" name="email" id="email" autocomplete="off">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Community / Town / City</label>
                        <input type="text" class="input-box" name="city" id="city" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">GPS(UX-0000-0000)</label>
                        <input type="text" class="input-box" name="gps" id="gps" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Password</label>
                        <input type="password" class="input-box" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-4">
                      <label class="form-label">Farmer</label>
                      <input type="radio" class="" name="userType" id="farmer" value="Farmer">
                    </div> 
                    <div class="mb-3 col-md-4">
                      <label class="form-label">Transport Officer</label>
                      <input type="radio" class="" name="userType" id="transportOfficer" value="TransportOfficer">
                    </div>
                    <div class="mb-3 col-md-4">
                      <label class="form-label">Agro Chemist</label>
                      <input type="radio" class="" name="userType" id="chemist" value="Chemist">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="registerBtn" id="registerBtn" class="btn btn-danger">Submit</button>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="signInModal">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">SIGN IN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="map_form_container">
              <form method="POST">
                <div class="row">
                    <div class="mb-3 col-md-12">
                      <label class="form-label">Username</label>
                        <input type="text" class="input-box" placeholder="Username..." name="username" id="usernameLogIn" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-md-12">
                      <label class="form-label">Password</label>
                        <input type="text" class="input-box" placeholder="Password..." name="password" id="password" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="SignInBtn" id="SignInBtn" class="btn btn-danger">Sign In</button>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>
<div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Contact Us</h2>
                     <div class="location_text"><a href="javascript:;"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15">Box 1112</span></a></div>
                     <div class="location_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15">(+233) 244863660 </span></a></div>
                     <div class="location_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15">contact@easyfarm.com</span></a></div>
                     <div class="social_icon">
                        <ul>
                           <li><a href="javascript:;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li><a href="javascript:;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Useful link </h2>
                     <div class="footer_menu">
                        <ul>
                           <li class="active"><a href="<?php echo(BASE_LINK) ?>">Home</a></li>
                           <li><a href="<?php echo(BASE_LINK) ?>/contact">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                     <h2 class="useful_text">About</h2>
                     <p class="lorem_text">Welcome to Easy-Farm, the all-in-one platform designed to connect farmers, tractor drivers, and fertilizer sellers seamlessly. Our mission is to empower farmers by providing easy access to essential resources and services, streamlining operations...
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <p class="copyright_text">EASYFARM @ 2024.</p>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <!-- Javascript files-->
      <script src="<?php echo(BASE_LINK); ?>/assets/js/jquery.min.js"></script>
      <script src="<?php echo(BASE_LINK); ?>/assets/js/popper.min.js"></script>
      <script src="<?php echo(BASE_LINK); ?>/assets/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo(BASE_LINK); ?>/assets/js/jquery-3.0.0.min.js"></script>
      <script src="<?php echo(BASE_LINK); ?>/assets/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="<?php echo(BASE_LINK); ?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="<?php echo(BASE_LINK); ?>/assets/js/custom.js"></script>
      <!-- javascript --> 
      <script src="<?php echo(BASE_LINK); ?>/assets/js/owl.carousel.js"></script>
      <script>
         $('.owl-carousel').owlCarousel({
            loop:true,
            margin:35,
            nav:true,
            center: true,
            responsive:{
             0:{
                 items:1,
                    margin:0
                  },
                575:{
                    items:1,
                    margin:0
                },
                768:{
                    items:3,
                    margin:0
                },
                1000:{
                    items:3
                }
            }
         }) 


         function checkUsername() {
            var username = document.getElementById('username').value;
            jQuery.ajax({
            url: "php/check_availability.php",
            data:{
              username : username
            },
            type: "POST",
                success:function(data){
                  $("#signUp_username").html(data);

                },  
                error:function (){}
            });
        }
      </script>