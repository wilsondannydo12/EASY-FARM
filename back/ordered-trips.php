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
                        <?php include 'php/update_trip_server.php'; ?>
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT--> 
                            <div class="page-content">
                                <div class="row">
                                    <!-- -------------------first row-------------------------- -->
                                    <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">ORDERED TRIPS</h3>
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
                                              
                                          </div>
                                      </div>
                                    <div style="overflow-x:auto;">
                                      <table class="table table-striped" id="_table" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>ORDER NO</th>
                                                  <th>CUSTOMER</th>
                                                  <th>PHONE</th>
                                                  <th>VEHICLE</th>
                                                  <th>FROM</th>
                                                  <th>TO</th>
                                                  <th>START</th>
                                                  <th>END</th>
                                                  <th>ORDER DATE</th>
                                                  <th>ORDER STATUS</th>
                                                  <th>ACTION</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                      <?php 
                      $cur_user_in = $_SESSION['id'];
                      $i = 1;
                      if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "superadmin") {
                      $cus_trip_qry = $db->prepare("SELECT transport_order.*, vehicles.vehicle_name, vehicles.vehicle_img, vehicles.number_plate FROM transport_order INNER JOIN vehicles ON vehicles.id=transport_order.vehicle_id WHERE transport_order.status='pending' || transport_order.status='accepted'");
                    }else{
                      $cus_trip_qry = $db->prepare("SELECT transport_order.*, vehicles.vehicle_name, vehicles.vehicle_img, vehicles.number_plate FROM transport_order INNER JOIN vehicles ON vehicles.id=transport_order.vehicle_id WHERE transport_order.status='pending' || transport_order.status='accepted' AND vehicles.user_id='$cur_user_in'");
                    }
                      $cus_trip_qry->execute();
                      $cus_trip_results=$cus_trip_qry->fetchAll(PDO::FETCH_OBJ);
                      foreach($cus_trip_results as $cus_trip_result){
                        $shipping_id = $cus_trip_result->transport_id;
                        $order_no = $cus_trip_result->order_no;
                        if (strtolower($cus_trip_result->status) == "pending" || strtolower($cus_trip_result->status) == "accepted" || strtolower($cus_trip_result->status) == "in session") {
                            $stShow = $cus_trip_result->status;
                            $badge = "bg-warning";
                        }elseif (strtolower($cus_trip_result->status) == "ended") {
                          $stShow = $cus_trip_result->status;
                            $badge = "bg-success";
                        }
                        else{
                            $stShow = $cus_trip_result->status;
                            $badge = "bg-danger";
                        }
  
                      ?>
                                                <tr class="">
                                                  <td><span class="id">#<?php echo $order_no; ?></span></td>

                                                  <td><span class="id"><?php echo $cus_trip_result->ord_firstname; ?> <?php echo $cus_trip_result->ord_lastname; ?></span></td>

                                                  <td><span class="id"><?php echo $cus_trip_result->ord_phone; ?></span></td>

                                                  <td><span class="id"><img style="width: 20%;" src="<?php echo(BASE_LINK); ?>/<?php echo($cus_trip_result->vehicle_img); ?>"><?php echo $cus_trip_result->vehicle_name; ?><br><?php echo $cus_trip_result->number_plate; ?></span></td>

                                                  <td><span class="id"><?php echo $cus_trip_result->from_location; ?></span></td>

                                                  <td><span class="id"><?php echo $cus_trip_result->to_location; ?></span></td>

                                                  <td><span class="id"><?php echo date("l d M Y", strtotime($cus_trip_result->start_date)); ?></span></td>

                                                  <td><span class="id"><?php echo date("l d M Y", strtotime($cus_trip_result->end_date)); ?></span></td>

                                                  <td><span class="id"><?php echo date("l d M Y", strtotime($cus_trip_result->order_date)); ?></span></td>

                                                  <td><span class="badge rounded-pill <?php echo($badge); ?> custom-badge" style="color: #ffffff;"><?php echo ucwords($stShow); ?></span></td>

                                                  <td align="center">
                                                   <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          Action
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">

                                                      <!-- <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#viewOrderModal" onclick="view_order('<?php echo $cus_trip_result->order_no; ?>');"><span class="fa fa-eye text-primary"></span> View Order</a> -->

                                                      <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#confirmPaymentModal" onclick="updateTrip('<?php echo $cus_trip_result->transport_id; ?>');"><span class="fa fa-edit text-primary"></span> Update  Trip</a>
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

            <div class="modal fade" id="confirmPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE TRIP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <input type="hidden" name="trip_id" id="trip_id">
                      <div class="col-12 col-md-12">
                          <select class="form-control" name="trip_status" required>
                            <option value="">Select an Option</option>
                            <option value="accepted">Accepted</option>
                            <option value="in session">Start Trip</option>
                            <option value="ended">End Trip</option>
                            <option value="cancelled">Cancelled</option>
                          </select>
                      </div><br>
                      <div class="modal-footer">
                        <button type="submit" name="updateTripBtn" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

                  <!-- edit-------------------- -->
            <div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document" style="min-width:90%;">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">ORDER DETAILS</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                             <div id="order_details"></div>
                      </div>
                  </div>
                </div>
            </div>
        <!-- modal end ------------------------------- -->

      <!-- COPYRIGHT-->
      <?php include 'include/footer.php'; ?>

    <script type="text/javascript">
      function updateTrip(id) {
        document.getElementById('trip_id').value=id;
      }
    </script>

</body>

</html>
<!-- end document-->

