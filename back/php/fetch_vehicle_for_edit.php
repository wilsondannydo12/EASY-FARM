<?php 
include('../include/db.php');

if(!empty($_POST["id"])) {
	
	$id = $_POST["id"];
	
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
	            <div class="mb-3 col-md-9 mb-3">
	              <label for="firstname" class="form-label">Vehicle Image</label>
	              <input type="file" class="form-control" name="vehicleImg" id="vehicleImg" onchange="document.getElementById('previewVehicleImage').src = window.URL.createObjectURL(this.files[0]); check_profileImg_ext(this.value);">
	            </div>
	            <div class="col-md-3">
	                <img id="previewVehicleImage" class="profile-preview-img" src="<?php echo(BASE_LINK); ?>/<?php echo($result->vehicle_img); ?>" alt="Preview Will Show Here" style="" />
	            </div>
	          
	            <div class="col-12 col-md-12 mb-3">
                    <label for="vehicle_name" class=" form-control-label">Vehicle Name:</label>
                    <input type="text" id="vehicle_name" name="vehicle_name" value="<?php echo $result->vehicle_name;?>" class="form-control" required>
                </div>
                <div class="col-12 col-md-12 mb-3">
                    <label for="number_plate" class=" form-control-label">Number Plate:</label>
                    <input type="text" id="number_plate" name="number_plate" value="<?php echo $result->number_plate;?>"  class="form-control" required>
                </div>
	            <div class="col-12 col-md-12 mb-3">
                    <label for="vehicle_type" class=" form-control-label">Vehicle Type:</label>
                    <select class="form-control" name="vehicle_type" id="vehicle_type" required>
                        <option value="<?php echo $result->vehicle_type;?>"><?php echo  $result->types;?></option>
                        <?php 
                            $vehicle_type_sql=$db->query("SELECT * FROM vehicle_type WHERE status='active'");
                            $type_row_data = $vehicle_type_sql->fetchAll(PDO::FETCH_OBJ);
                             foreach($type_row_data as $type_data){
                             if ($result->vehicle_type == $type_data->id) {
                              	continue;
                              } else{?> 
                              	<option value="<?php echo $type_data->id;?>"><?php echo $type_data->types;?></option>
                              <?php } } ?>
                    </select>
                </div>
	            <div class="col-12 col-md-12 mb-3">
                    <label for="community" class=" form-control-label">Community / Town:</label>
                    <input type="text" id="community" name="community" value="<?php echo $result->community;?>" class="form-control" required>
                </div>
                <div class="col-12 col-md-12 mb-3">
	              <label for="availability" class=" form-control-label">Availability:</label>
	              <select class="form-control" name="availability" id="availability" required>
	                <option value="available" <?php echo isset($result->availability) && $result->availability == "available" ? 'selected' : '' ?>>Available</option>
	                <option value="not available" <?php echo isset($result->availability) && $result->availability == "not available" ? 'selected' : '' ?>>Not Available</option>
	              </select>
	            </div>
                <div class="col-12 col-md-12 mb-3">
                  <label for="description" class=" form-control-label">Description (Max Length: 70 words):</label>
                  <textarea class="form-control" maxlength="70" name="description" id="description" required><?php echo $result->description;?></textarea>
                </div>
	          </div>
	        </div>
	        <div class="modal-footer">
	        <button type="submit" name="updateVehicleBtn" id="updateVehicleBtn" class="btn btn-primary">Submit</button>
	      </div>
	    </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this product type. Refresh the page and try again.</h4>
	<?php } 
}

?>