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
   .veh-user-container {
      background: #5586ba;
      border-radius: 20px;
   }

   .veh-user-detial {
      padding: 20px;
   }
   .veh-user-detial h5 {
      color: #ffffff;
   }

   
</style>
<body class="main-layout">
<?php include_once 'include/header.php'; ?>
<?php include_once 'php/vehicle_booking_server.php'; ?>
<!-- vehicles section -->
      <section id="vehicles" class="vehicles">
         <div class="container" style="margin-top: 70px;">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Vehicles</h2>
                     <p>We have over 100+ vehicles awaiting to render you service. You can contact any of them for smooth services.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <?php 
                  $qry = $db->prepare("SELECT vehicles.*, vehicle_type.types, users.firstname, users.lastname, users.phone FROM vehicles INNER JOIN vehicle_type ON vehicle_type.id=vehicles.vehicle_type INNER JOIN users ON users.id=vehicles.user_id WHERE vehicles.status='active' AND users.status='active' ORDER BY RAND()");
                  $qry->execute();
                  if ($qry->rowCount() > 0) {
                    $results=$qry->fetchAll(PDO::FETCH_OBJ);
                    foreach($results as $result){
                      $vehicle_id = $result->id;
                      $order_status = "";
                      $order_qry = "SELECT * FROM transport_order WHERE vehicle_id=:vehicle_id";
                      $order_qry = $db->prepare($order_qry);
                      $order_qry->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_STR);
                      $order_qry->execute();
                      if($order_qry->rowCount() > 0){ 
                        $order_result = $order_qry->fetchAll(PDO::FETCH_OBJ);
                        foreach($order_result as $order_data){
                          $order_status = $order_data->status;
                        }
                      }
                      if (strtolower($result->availability) == "not available" OR ((!empty($order_status)) AND strtolower($order_status) == "in session")) {
                        $available = "Not Available";
                        $av_color = "#f50c0c";
                        $bookingBtn_disable = "disabled";
                      }else{
                        $available = "Available";
                        $av_color = "#58d68d ";
                        $bookingBtn_disable = "";
                      }
                    
                  ?>
               <div class="col-md-4 mb-4">
                  <div class="vehicles_truck">
                     <figure><img src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($result->vehicle_img); ?>" alt="#"/></figure>
                  </div>
                  <div class="veh-user-container">
                     <div class="veh-user-detial">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <h5><span style="font-weight: bold;" class="fa fa-user"></span>&nbsp;&nbsp;&nbsp; <?php echo(ucwords($result->firstname)); ?> <?php echo(ucwords($result->lastname)); ?></h5>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <h5><span style="font-weight: bold;" class="fa fa-phone"></span>&nbsp;&nbsp;&nbsp; <?php echo($result->phone); ?></h5>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <h5><span style="font-weight: bold;" class="fa fa-truck"></span>&nbsp;&nbsp;&nbsp; <?php echo($result->vehicle_name); ?></h5>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <h5><span style="font-weight: bold;" class="fa fa-truck"></span>&nbsp;&nbsp;&nbsp; <?php echo($result->number_plate); ?></h5>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <h5><span style="font-weight: bold;" class="fa fa-map-marker"></span>&nbsp;&nbsp;&nbsp; <?php echo($result->community); ?></h5>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <h5 style="font-weight: bold; color: <?php echo $av_color; ?>;"><span class="fa fa-eye"></span>&nbsp;&nbsp;&nbsp; <span style="" class="availabilityShow" id="availabilityShow"><?php echo $available; ?></span></h5>
                           </div>
                           <div class="col-md-12 col-sm-12">
                              <h5><span style="font-weight: bold;" class="fa fa-book"></span>&nbsp;&nbsp;&nbsp; <?php echo(substr($result->description, 0,36)); ?>...</h5>
                           </div>
                        </div>
                        <?php if (!empty($_SESSION['transp_customer_id'])) { ?>
                        <button class="book_now" <?php echo $bookingBtn_disable; ?> onclick="book_vehicle('<?php echo($result->id); ?>');" data-toggle="modal" data-target="#bookingModal">Book Now</button>
                      <?php }else{ ?>

                        <a href="<?php echo(BASE_LINK); ?>/login?utm=vehicles&ht=route">
                          <button class="book_now">Book Now</button>
                        </a>
                      <?php } ?>
                     </div>
                  </div> 
               </div>
            <?php } }else{ ?> <p style="color: red; text-align: center;">There is no vehicle yet.</p> <?php } ?>
            </div>
         </div>
      </section>
      <!-- end vehicles section -->

      <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">BOOKING VEHICLE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="vehicle-for-booking"></div>
            </div>
          </div>
        </div>
      </div>


<?php include_once 'include/footer.php'; ?>

<script type="text/javascript">
   window.onload = function() {
      setInterval(function() {
          $('.availabilityShow').fadeIn(300).fadeOut(500);
      }, 1000);
   }

   function book_vehicle(id) {
       jQuery.ajax({
       url: "php/fetch_vehicle_for_booking.php",
       data:{
         id : id
       },
       type: "POST",
           success:function(data){
             $("#vehicle-for-booking").html(data);

           },  
           error:function (){}
       });
   }
</script>

</body>
</html>