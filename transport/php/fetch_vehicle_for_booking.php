<?php 
include('../include/db.php');
session_start();
if(!empty($_POST["id"])) {
	
	$id = $_POST["id"];

	$cur_user = $_SESSION['transp_customer_id'];

	$user_qry = "SELECT * FROM transport_customers WHERE id=:cur_user";
	$user_qry = $db->prepare($user_qry);
	$user_qry->bindParam(':cur_user',$cur_user,PDO::PARAM_STR);
	$user_qry->execute();
	if($user_qry->rowCount() > 0){ 
	    $user_result = $user_qry->fetchAll(PDO::FETCH_OBJ);
	    foreach($user_result as $user_date){
	    	$firstname = $user_date->firstname;
	    	$lastname = $user_date->lastname;
	    	$phone = $user_date->phone;
	    }
	}
	
	$sql ="SELECT vehicles.*, vehicle_type.types FROM vehicles INNER JOIN vehicle_type ON vehicle_type.id=vehicles.vehicle_type INNER JOIN users ON users.id=vehicles.user_id WHERE vehicles.id=:id LIMIT 1";
	$query= $db->prepare($sql);
	$query-> bindParam(':id',$id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 
		foreach($results as $result){
	?>  

		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="vehicle_id" value="<?php echo($result->id); ?>">
	        <div class="row">
	          <div class="col-md-12">
	              <div class="vehicles_truck">
	                <figure><img src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($result->vehicle_img); ?>" alt="vehicle"/></figure>
	             </div>
	          </div>

	          <div class="col-12 col-md-12 mb-3 mt-3">
	              <label for="ord_firstname" class="form-control-label">Firstname:</label>
	              <input type="text" id="ord_firstname" name="ord_firstname" value="<?php echo($firstname); ?>" class="my_inputboxes" required>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="ord_lastname" class="form-control-label">Lastname:</label>
	              <input type="text" id="ord_lastname" name="ord_lastname" value="<?php echo($lastname); ?>" class="my_inputboxes" required>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="ord_phone" class="form-control-label">Phone:</label>
	              <input type="text" id="ord_phone" name="ord_phone" value="<?php echo($phone); ?>" class="my_inputboxes" required>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="ord_location" class="form-control-label">Your Location:</label>
	              <select class="my_inputboxes" name="ord_location" id="ord_location" required>
	                    <option value=""></option>
	                    <?php 
	                        $location_sql=$db->query("SELECT * FROM location WHERE status='active'");
	                        $location_row_data = $location_sql->fetchAll(PDO::FETCH_OBJ);
	                         foreach($location_row_data as $location_data){?>
	                        <option value="<?php echo $location_data->locality;?>"><?php echo $location_data->locality;?></option>
	                    <?php }?>
	                </select>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="from_location" class="form-control-label">From:</label>
	              <input type="text" id="from_location" name="from_location"  class="my_inputboxes" required>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="to_location" class="form-control-label">To:</label>
	              <input type="text" id="to_location" name="to_location"  class="my_inputboxes" required>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="start_date" class="form-control-label">Start Date:</label>
	              <input type="date" id="start_date" name="start_date"  class="my_inputboxes" required>
	          </div>
	          <div class="col-12 col-md-12 mb-3">
	              <label for="end_date" class="form-control-label">End Date:</label>
	              <input type="date" id="end_date" name="end_date"  class="my_inputboxes" required>
	          </div>
	        </div>
	       </div>
	       <div class="modal-footer">
	         <button type="submit" name="submitBookingBtn" id="submitBookingBtn" class="btn btn-primary">Submit</button>
	       </div>
	      </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this vehicle. Refresh the page and try again.</h4>
	<?php } 
}

?>