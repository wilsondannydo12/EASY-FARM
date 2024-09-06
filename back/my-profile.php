<?php 
  session_start();
 ?>
<?php include 'include/head.php'; ?>
<?php include 'php/update_my_profile_server.php'; ?>

<style type="text/css">
    .myProfile-card{
        margin-left: 160px; 
        margin-right: 160px;
    }

    @media only screen and (max-width: 1200px) {
        .myProfile-card{
            width: 100%;
            margin-left: 5px; 
            margin-right: 5px;
        }
    }
</style>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include 'include/header.php'; ?>
        <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            
            <section>
                <div class="container"><br>
                    <div class="row">
                        
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT--> 
                            <div class="page-content">
                                <div class="row">
                                    <!-- -------------------first row-------------------------- -->
                                    <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">MY PROFILE</h3>
                        <?php
                        if (isset($msg)) { ?>
                             <section class="alert-wrap">
                                <div class="container">
                                    <!-- ALERT-->
                                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                                        <i class="zmdi zmdi-check-circle"></i>
                                        <span class="content"><?php echo $msg; ?></span>
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="zmdi zmdi-close-circle"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <!-- END ALERT-->
                                </div>
                            </section><br>
                         <?php } ?>

                         <?php
                        if (isset($error)) { ?>
                             <section class="alert-wrap" style="margin-left: 450px; margin-right: 450px;">
                                <div class="container">
                                    <!-- ALERT-->
                                    <div class="alert alert-danger" role="alert">
                                        <i class="zmdi zmdi-check-circle"></i>
                                        <span class="content"><?php echo $error; ?></span>
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="zmdi zmdi-close-circle"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <!-- END ALERT-->
                                </div>
                            </section><br>
                         <?php } ?>
                         
                    <?php 
                        $userId = $_SESSION['id'];
                        if (strtolower($_SESSION['type']) == "superadmin") {
                            $qry = $db->prepare("SELECT * FROM admin_tbl WHERE id =:userId");
                        }else{
                            $qry = $db->prepare("SELECT * FROM users WHERE id =:userId");
                        }
                        $qry->bindParam(':userId',$userId,PDO::PARAM_STR);
                        $qry->execute();
                        $results=$qry->fetchAll(PDO::FETCH_OBJ);
                        foreach($results as $result){ 
                            $img = '<img src="'.$result->profileImg.'" style="width:50px;">';

                                    if ($_SESSION['type'] == "superadmin") {
                                        $disabled="";
                                    }else{ $disabled="disabled"; }

                                    if ($_SESSION['type'] == "superadmin") {
                                        $readonly="";
                                    }else{ $readonly="readonly"; }
                                  
                    ?>
                        
                                <div class="card myProfile-card">
                                  <div class="card-body card-block">
                                    <form action="" method="POST" id="manage-user" enctype="multipart/form-data">
                                        <input type="hidden" name="userId" value="<?php echo($result->id) ?>">
                                    <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">   
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input type="text" name="firstname" id="firstname" class="au-input au-input--full"  value="<?php echo($result->firstname) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="name">Last Name</label>
                                            <input type="text" name="lastname" id="lastname" class="au-input au-input--full"  value="<?php echo($result->lastname) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="au-input au-input--full" onkeyup="checkUsername();" value="<?php echo($result->username) ?>" required  autocomplete="off">
                                            <span id="username-checker-message" style="color: red; font-size: 12px;"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="text" name="contact" id="contact" class="au-input au-input--full" value="<?php echo($result->phone) ?>" required  autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="au-input au-input--full" value="<?php echo($result->email) ?>" required  autocomplete="off">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="type" class="control-label">User Type</label>
                                            <select name="userType" <?php echo $readonly; ?> id="type" class="form-control" required>
                                            <?php 
                                            if (strtolower($_SESSION['type']) == "superadmin") { ?>
                                            <option value="superadmin" <?php echo isset($result->type) && $result->type == "superadmin" ? 'selected' : '' ?>>Administrator</option>
                                            <option value="farmer" <?php echo isset($result->type) && $result->type == "farmer" ? 'selected' : '' ?>>Farmer</option>
                                            <option value="transportOfficer" <?php echo isset($result->type) && $result->type == "transportOfficer" ? 'selected' : '' ?>>Transport Officer</option>
                                            <option value="chemist" <?php echo isset($result->type) && $result->type == "chemist" ? 'selected' : '' ?>>Chemist</option>
                                            
                                        <?php }elseif (strtolower($_SESSION['type']) == "farmer") { ?>
                                            <option value="farmer" <?php echo isset($result->type) && $result->type == "farmer" ? 'selected' : '' ?>>Farmer</option>
                                       <?php }elseif (strtolower($_SESSION['type']) == "transportofficer"){ ?>
                                            <option value="transportOfficer" <?php echo isset($result->type) && $result->type == "transportOfficer" ? 'selected' : '' ?>>Transport Officer</option>
                                      <?php  }else{ ?>
                                            <option value="chemist" <?php echo isset($result->type) && $result->type == "chemist" ? 'selected' : '' ?>>Chemist</option>
                                      <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    

                                
                                
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="" class="control-label">Image</label>
                                            <div class="custom-file">
                                              <input type="file" class="form-control-file" id="customFile1" name="userProfile" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label rounded-0" for="customFile1">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group d-flex justify-content-center">
                                            <img id="blah" src="<?php echo BASE_LINK; ?>/<?php echo($result->profileImg) ?>" alt="Preview Will Show Here" style="height: 150px; width: 60%;" />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="editUserBtn" id="addUserBtn" class="btn btn-primary btn-xl">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-xl">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            <?php } ?>
                                <!-- END DATA TABLE -->
                            </div>
                                </div>
                                
                                <!-- footer_note -->
                          
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>


            <!-- COPYRIGHT-->
            <?php include 'include/footer.php'; ?>

    <script>
        $(document).ready(function () {
           $('#_table').DataTable();
        });

     </script>
     <script type="text/javascript">
        function checkUsername() {
            var username = document.getElementById("username").value;
            $.ajax({
            url: "php/check_availability.php",
            data:{
              username : username
            },
            type: "POST",
                success:function(data){
                  $("#username-checker-message").html(data);
       
                },  
                error:function (){}
            });
        }
    </script>

</body>

</html>
<!-- end document-->

