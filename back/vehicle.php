<?php 
  session_start();
 ?>
<?php include 'include/head.php'; ?>

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
                        <?php include 'php/vehicle_server.php'; ?>
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT--> 
                            <div class="page-content">
                                <div class="row">
                                    <!-- -------------------first row-------------------------- -->
                                    <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">MY VEHICLES</h3>
                        <?php
                        if (isset($success)) { ?>
                             <section class="alert-wrap">
                                <div class="container">
                                    <!-- ALERT-->
                                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                                        <i class="zmdi zmdi-check-circle"></i>
                                        <span class="content"><?php echo $success; ?></span>
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
                             <section class="alert-wrap">
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

                         <div class="table-data__tool">
                              <div class="table-data__tool-left">
                                  
                              </div>
                              <?php if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) != "superadmin") { ?>
                              <div class="table-data__tool-right">
                                  <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addModal">
                                      <i class="zmdi zmdi-plus"></i>Register Vehicle</button>
                              </div>
                            <?php } ?>
                          </div>
                          <div class="row">
                            <?php 
                              $cur_user = $_SESSION['id'];
                              if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "superadmin") {
                                $qry = $db->prepare("SELECT vehicles.*, vehicle_type.types, users.firstname, users.lastname FROM vehicles INNER JOIN vehicle_type ON vehicle_type.id=vehicles.vehicle_type INNER JOIN users ON users.id=vehicles.user_id");
                              }else{
                                $qry = $db->prepare("SELECT vehicles.*, vehicle_type.types, users.firstname, users.lastname FROM vehicles INNER JOIN vehicle_type ON vehicle_type.id=vehicles.vehicle_type INNER JOIN users ON users.id=vehicles.user_id WHERE users.id='$cur_user'");
                              }
                              $qry->execute();
                              if ($qry->rowCount() > 0) {
                                $results=$qry->fetchAll(PDO::FETCH_OBJ);
                                foreach($results as $result){
                                  $vehicle_id = $result->id;
                                  $booked = "";
                                  $book_color = "";
                                  $order_status = "";
                                  $order_qry = "SELECT * FROM transport_order WHERE vehicle_id=:vehicle_id";
                                  $order_qry = $db->prepare($order_qry);
                                  $order_qry->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_STR);
                                  $order_qry->execute();
                                  if($order_qry->rowCount() > 0){ 
                                    $order_result = $order_qry->fetchAll(PDO::FETCH_OBJ);
                                    foreach($order_result as $order_data){
                                      $order_status = $order_data->status;
                                      if (!empty($order_status) AND strtolower($order_status) == "in session") {
                                          $booked = "/ Booked";
                                          $book_color = "red";
                                        }else{
                                           $booked = "";
                                           $book_color = "";
                                        }
                                    }
                                  }
                                  if (strtolower($result->availability) == "not available" OR ((!empty($order_status)) AND strtolower($order_status) == "in session")) {
                                    $available = "Not Available";
                                    $av_color = "red";
                                    
                                  }else{
                                      $available = "Available";
                                      $av_color = "green";
                                  }

                                  
                                
                              ?>
                            <div class="col-md-4">
                              <div class="card">
                                <div class="card-body">
                                    <div class="mx-auto d-block">
                                        <img class="rounded-circle mx-auto d-block" src="<?php echo(BASE_LINK); ?>/<?php echo($result->vehicle_img); ?>" alt="Vehicle">
                                        <?php if (strtolower($result->status) == "inactive") { ?>
                                          <small style="color: red; text-align: center;">This vehicle is not visible for booking. Contact administrator.</small><hr>
                                        <?php } ?>
                                        <div class="row text-sm">
                                          <div class="col-md-6 mb-2">
                                            <div class="location"><i class="fa fa-user"></i> <small><?php echo(ucwords($result->firstname)); ?> <?php echo(ucwords($result->lastname)); ?></small></div>
                                          </div>
                                          <div class="col-md-6 mb-2">
                                            <div class="location">
                                              <i class="fa fa-sliders"></i> <small><?php echo($result->types); ?></small></div>
                                          </div>
                                          <div class="col-md-6 mb-2">
                                             <div class="location">
                                              <i class="fa fa-car"></i> <small><?php echo($result->vehicle_name); ?></small></div>
                                          </div>
                                          <div class="col-md-6 mb-2">
                                             <div class="location">
                                              <i class="fa fa-car"></i> <small><?php echo($result->number_plate); ?></small></div>
                                          </div>
                                          <div class="col-md-12 mb-2">
                                            <div class="location">
                                              <i class="fa fa-map-marker"></i> <small>Ghana, Upper East, <?php echo(ucwords($result->community)); ?></small></div>
                                          </div>
                                          <div class="col-md-12 mb-2">
                                            <div class="location">
                                              <i class="fa fa-book"></i> <small><?php echo(substr($result->description, 0,70)); ?></small></div>
                                          </div>
                                          
                                        </div>

                                        <hr>
                                        <div class="row">
                                          <div class="col-md-5 mb-2">
                                            <div class="card-text text-sm">
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#update" onclick="edit('<?php echo $result->id; ?>');" title="Update">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                &nbsp;&nbsp;&nbsp;
                                                <?php if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "superadmin") { ?>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#statusUpdate" onclick="statusUpdate('<?php echo $result->id; ?>');" title="Status">
                                                    <i class="fa fa-cog"></i>
                                                </a>&nbsp;&nbsp;&nbsp;
                                                <?php } ?>
                                                
                                                <a href="<?php echo(BASE_LINK); ?>/deletion/remove/<?php echo $result->id; ?>/vehicles/vehicle" onclick="return confirm('Are you sure you want to delete this vehicle?')" title="Remove">
                                                    <i class="fa fa-trash" style="color: red;"></i>
                                                </a>
                                            </div>
                                          </div>
                                          <div class="col-md-7 mb-2">
                                            <div class="location">
                                              <i class="fa fa-eye"></i> <span style="color: <?php echo $av_color; ?>; font-weight: bold;" class="availabilityShow"><small><?php echo $available; ?> <?php echo $booked; ?></small></span></div>
                                          </div>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                            </div>
                          <?php } }else{ ?> <p style="color: red; text-align: center;">You have not registered any vehicle yet.</p><br><br><br><br><br><br> <?php } ?>
                          </div>
                            </div>
                          </div>
                      </div>
                      <!-- END PAGE CONTENT-->
                  </div>
              </div>
          </div>
      </section>

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER VEHICLE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="mb-3 col-md-9 mb-3">
                          <label for="firstname" class="form-label">Vehicle Image</label>
                          <input type="file" class="form-control" name="vehicleImg" id="vehicleImg" onchange="document.getElementById('previewVehicleImg').src = window.URL.createObjectURL(this.files[0]); check_profileImg_ext(this.value);" required>
                        </div>
                        <div class="col-md-3">
                            <img id="previewVehicleImg" class="profile-preview-img" src="<?php echo(BASE_LINK); ?>/assets/images/photo_default.png" alt="Preview Will Show Here" style="" />
                        </div>
                      
                        <div class="col-12 col-md-12 mb-3">
                            <label for="vehicle_name" class=" form-control-label">Vehicle Name:</label>
                            <input type="text" id="vehicle_name" name="vehicle_name" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="number_plate" class=" form-control-label">Number Plate:</label>
                            <input type="text" id="number_plate" name="number_plate"  class="form-control" required>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="vehicle_type" class=" form-control-label">Vehicle Type:</label>
                            <select class="form-control" name="vehicle_type" id="vehicle_type" required>
                                <option value=""></option>
                                <?php 
                                    $vehicle_type_sql=$db->query("SELECT * FROM vehicle_type WHERE status='active'");
                                    $type_row_data = $vehicle_type_sql->fetchAll(PDO::FETCH_OBJ);
                                     foreach($type_row_data as $type_data){?>
                                    <option value="<?php echo $type_data->id;?>"><?php echo $type_data->types;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="community" class=" form-control-label">Community / Town:</label>
                            <input type="text" id="community" name="community"  class="form-control" required>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                          <label for="availability" class=" form-control-label">Availability:</label>
                          <select class="form-control" name="availability" id="availability" required>
                            <option value=""></option>
                            <option value="available">Available</option>
                            <option value="not available">Not Available</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                          <label for="description" class=" form-control-label">Description (Max Length: 70 words):</label>
                          <textarea class="form-control" maxlength="70" name="description" id="description" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="registerVehicleBtn" id="registerVehicleBtn" class="btn btn-primary">Submit</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE VEHICLE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="vehicle_detail"></div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="modal fade" id="statusUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE STATUS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   <form action="" method="post">
                        <input type="hidden" name="status_id" id="vehicle_id">
                        <div class="col-12 col-md-12">
                            <label class="switch switch-text switch-success">
                              <input type="checkbox" name="status" class="switch-input" checked="true">
                              <span data-on="On" data-off="Off" class="switch-label"></span>
                              <span class="switch-handle"></span>
                            </label>
                        </div><br>
                    <div class="modal-footer">
                    <button type="submit" name="updateStatusBtn" class="btn btn-primary">Save changes</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- modal end ------------------------------- -->

      <!-- COPYRIGHT-->
      <?php include 'include/footer.php'; ?>

    <script type="text/javascript">
      function statusUpdate(id) {
        document.getElementById('vehicle_id').value=id;
      }

      window.onload = function() {
        setInterval(function() {
            $('.availabilityShow').fadeIn(300).fadeOut(500);
        }, 1000);
      }
      
      function edit(id) {
          jQuery.ajax({
          url: "php/fetch_vehicle_for_edit.php",
          data:{
            id : id
          },
          type: "POST",
              success:function(data){
                $("#vehicle_detail").html(data);

              },  
              error:function (){}
          });
      }
    </script>

</body>

</html>
<!-- end document-->

