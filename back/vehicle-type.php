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
                        <?php include 'php/vehicle_type_server.php'; ?>
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT--> 
                            <div class="page-content">
                                <div class="row">
                                    <!-- -------------------first row-------------------------- -->
                                    <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">VEHICLE TYPE LIST</h3>
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
                         
                           <div class="card">
                                    <div class="card-body">
                                      <div class="table-data__tool">
                                          <div class="table-data__tool-left">
                                              
                                          </div>
                                          <div class="table-data__tool-right">
                                              <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#add">
                                                  <i class="zmdi zmdi-plus"></i>Register Vehicle Type</button>
                                              
                                          </div>
                                      </div>
                                    <div style="overflow-x:auto;">
                                      <table class="table table-striped" id="_table" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>TYPES</th>
                                                  <th>STATUS</th>
                                                  <th>ACTION</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                                $i = 1;
                                                $qry = $db->prepare("SELECT * FROM vehicle_type");
                                                $qry->execute();
                                                $results=$qry->fetchAll(PDO::FETCH_OBJ);
                                                foreach($results as $result){
                                                    $status = $result->status;
                                                    if ($status == "active") {
                                                        $stShow = "Active";
                                                        $color = "green";
                                                    }else{
                                                        $stShow = "Inactive";
                                                        $color = "red";
                                                    }
                                                    
                                            ?>
                                                <tr class="">
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $result->types; ?></td>

                                                  <td>
                                                    <div style="color:<?php echo $color;?>"> <?php echo htmlentities($stShow);?></div>
                                                  </td>

                                                  <td align="center">
                                                   <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          Action
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">

                                                      <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#status" onclick="status('<?php echo $result->id; ?>');"><span class="fa fa-edit text-primary"></span> Status</a>

                                                      <div class="dropdown-divider"></div>

                                                      <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#update" onclick="edit('<?php echo $result->id; ?>');"><span class="fa fa-edit text-primary"></span> Update</a>

                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item delete_data" href="<?php echo(BASE_LINK); ?>/deletion/remove/<?php echo $result->id; ?>/vehicle_type/vehicle-type" onclick="return confirm('Are you sure you want to delete this type?')"><span class="fa fa-trash text-danger"></span> Delete</a>
                                                    </div>
                                                  </td>
                                                </tr>
                                                <?php $i++;  } ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- END DATA TABLE -->
                                  </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>

           

          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTER VEHICLE TYPE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                        <div class="col-12 col-md-12">
                            <label for="vehicle_type" class=" form-control-label">Type:</label>
                            <input type="text" id="vehicle_type" name="vehicle_type"  class="form-control" required>
                        </div><br>
                    <div class="modal-footer">
                    <button type="submit" name="registerTypesBtn" id="registerTypesBtn" class="btn btn-primary">Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE VEHICLE TYPE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="vehicle_type_details"></div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="status_id" id="vehicle_type_id">
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
      function status(id) {
        document.getElementById('vehicle_type_id').value=id;
      }
      
      function edit(id) {
          jQuery.ajax({
          url: "php/fetch_vehicle_type_for_edit.php",
          data:{
            id : id
          },
          type: "POST",
              success:function(data){
                $("#vehicle_type_details").html(data);

              },  
              error:function (){}
          });
      }
    </script>

</body>

</html>
<!-- end document-->

