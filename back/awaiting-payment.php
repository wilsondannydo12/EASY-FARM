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
                        <?php include 'php/confirm_payment_server.php'; ?>
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT--> 
                            <div class="page-content">
                                <div class="row">
                                    <!-- -------------------first row-------------------------- -->
                                    <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">AWAITING PAYMENT</h3>
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
                                                  <th>TOTAL</th>
                                                  <th>TRANSACTION ID</th>
                                                  <th>TRANSACTION STATUS</th>
                                                  <th>PAYMENT STATUS</th>
                                                  <th>ACTION</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                      <?php 
                      $i = 1;
                      $grossPayment = 0;
                      $cus_shipping_qry = $db->prepare("SELECT * FROM order_shipping WHERE payment='awaiting' || payment='in process'");
                      $cus_shipping_qry->execute();
                      $cus_shipping_results=$cus_shipping_qry->fetchAll(PDO::FETCH_OBJ);
                      foreach($cus_shipping_results as $cus_shipping_result){
                          $shipping_id = $cus_shipping_result->id;
                          $order_no = $cus_shipping_result->order_no;
                          $payment_status = $cus_shipping_result->payment;
                          if (empty($cus_shipping_result->transaction_id)) {
                              $transaction_id = "...";
                              $transaction_status = "Awaiting";
                              $badge = "bg-danger";
                              $hide_paymentBtn = "";
                          }else{
                              $transaction_id = $cus_shipping_result->transaction_id;
                              $transaction_status = "Received";
                              $badge = "bg-success";
                              $hide_paymentBtn = "hidden";
                          }
                          $cus_orders_qry = $db->prepare("SELECT order_tbl.*, product_tbl.product_name, product_tbl.image FROM order_tbl INNER JOIN product_tbl ON product_tbl.id=order_tbl.product_id WHERE order_tbl.order_id='$shipping_id' AND order_tbl.order_no='$order_no'");
                          $cus_orders_qry->execute();
                          $cus_orders_results=$cus_orders_qry->fetchAll(PDO::FETCH_OBJ);
                          foreach($cus_orders_results as $cus_orders_result){
                              $grossPayment += $cus_orders_result->price * $cus_orders_result->quantity;
                          }
                              
                      ?>
                                                <tr class="">
                                                  <td><span class="id">#<?php echo $order_no; ?></span></td>
                                                  <td><span class="price fw-500">GH&#8373;<?php echo number_format($grossPayment,2); ?></span></td>
                                                  <td><span class="id"><?php echo $transaction_id; ?></span></td>
                                                  <td><span class="badge rounded-pill <?php echo($badge); ?> custom-badge" style="color: #ffffff;"><?php echo ucfirst($transaction_status); ?></span></td>
                                                  <td><span class="badge rounded-pill bg-danger custom-badge" style="color: #ffffff;"><?php echo ucfirst($payment_status); ?></span></td>

                                                  <td align="center">
                                                   <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          Action
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">

                                                      <a class="dropdown-item edit-data" href="javascript:void(0)" data-toggle="modal" data-target="#confirmPaymentModal" onclick="confirm_payment('<?php echo $cus_shipping_result->id; ?>');"><span class="fa fa-edit text-primary"></span> Confirm Payment</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">CONFIRM PAYMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <input type="hidden" name="orderShipping_id" id="orderShipping_id">
                      <div class="col-12 col-md-12">
                          <label class="switch ">
                            <input type="checkbox" name="confirmPayment" class="switch-input" required> 
                            Check to confirm payment
                          </label>
                      </div><br>
                      <div class="modal-footer">
                        <button type="submit" name="confirmPaymentBtn" class="btn btn-primary">Save Changes</button>
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
      function confirm_payment(id) {
        document.getElementById('orderShipping_id').value=id;
      }
      
      function edit(id) {
          jQuery.ajax({
          url: "php/fetch_shop_for_edit.php",
          data:{
            id : id
          },
          type: "POST",
              success:function(data){
                $("#shop_details").html(data);

              },  
              error:function (){}
          });
      }
    </script>

</body>

</html>
<!-- end document-->

