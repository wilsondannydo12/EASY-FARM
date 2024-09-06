<?php 

/*add----------------------------------*/
if (isset($_POST['registerVehicleBtn'])) {
  
  $vehicle_name = $_POST['vehicle_name'];       
  $number_plate = $_POST['number_plate'];
  $vehicle_type = $_POST['vehicle_type'];
  $community = $_POST['community'];
  $availability = $_POST['availability'];
  $description = $_POST['description'];
  $user = $_SESSION['id'];


  $uploaddir = 'uploads/vehicle/';
  $uploadfile = $uploaddir . basename($_FILES['vehicleImg']['name']);
  if (move_uploaded_file($_FILES['vehicleImg']['tmp_name'], $uploadfile)) {

    $sql="INSERT INTO vehicles(user_id, vehicle_name, number_plate, vehicle_type, community, availability, vehicle_img, description) VALUES(:user, :vehicle_name, :number_plate, :vehicle_type, :community, :availability, :uploadfile, :description)";
    $query = $db->prepare($sql);
    $query->bindParam(':user',$user,PDO::PARAM_STR);
    $query->bindParam(':vehicle_name',$vehicle_name,PDO::PARAM_STR);
    $query->bindParam(':number_plate',$number_plate,PDO::PARAM_STR);
    $query->bindParam(':vehicle_type',$vehicle_type,PDO::PARAM_STR);
    $query->bindParam(':community',$community,PDO::PARAM_STR);
    $query->bindParam(':availability',$availability,PDO::PARAM_STR);
    $query->bindParam(':uploadfile',$uploadfile,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    
    $query->execute();
    if($query){
      $success = "Vehicle registration successful";
    }else {
    	$error = "Oops..., Something went wrong. Try again";
    }
  }else{
  	$error = 'ERROR_FILE_ATTACK. Try again';
  }
}

/*update------------------------------------------------------*/
if (isset($_POST['updateVehicleBtn'])) {
  
  $vehicle_name = $_POST['vehicle_name'];       
  $number_plate = $_POST['number_plate'];
  $vehicle_type = $_POST['vehicle_type'];
  $community = $_POST['community'];
  $availability = $_POST['availability'];
  $description = $_POST['description'];
  $vehicle_id = $_POST['vehicle_id'];

  if (empty($_FILES['vehicleImg']['name'])) {
    $sql="UPDATE vehicles SET vehicle_name=:vehicle_name, number_plate=:number_plate, vehicle_type=:vehicle_type, community=:community, availability=:availability, description=:description WHERE id=:vehicle_id";
    $query = $db->prepare($sql);
    $query->bindParam(':vehicle_name',$vehicle_name,PDO::PARAM_STR);
    $query->bindParam(':number_plate',$number_plate,PDO::PARAM_STR);
    $query->bindParam(':vehicle_type',$vehicle_type,PDO::PARAM_STR);
    $query->bindParam(':community',$community,PDO::PARAM_STR);
    $query->bindParam(':availability',$availability,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_STR);
    $query->execute();
    if($query){
      $success = "Vehicle updated successfully";
    }else {
      $error = "Oops..., Something went wrong. Try again";
    }
  }else{

    $uploaddir = 'uploads/vehicle/';
    $uploadfile = $uploaddir . basename($_FILES['vehicleImg']['name']);
    if (move_uploaded_file($_FILES['vehicleImg']['tmp_name'], $uploadfile)) {

      $sql="UPDATE vehicles SET vehicle_name=:vehicle_name, number_plate=:number_plate, vehicle_type=:vehicle_type, community=:community, availability=:availability, description=:description, vehicle_img=:uploadfile WHERE id=:vehicle_id";
      $query = $db->prepare($sql);
      $query->bindParam(':vehicle_name',$vehicle_name,PDO::PARAM_STR);
      $query->bindParam(':number_plate',$number_plate,PDO::PARAM_STR);
      $query->bindParam(':vehicle_type',$vehicle_type,PDO::PARAM_STR);
      $query->bindParam(':community',$community,PDO::PARAM_STR);
      $query->bindParam(':availability',$availability,PDO::PARAM_STR);
      $query->bindParam(':description',$description,PDO::PARAM_STR);
      $query->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_STR);
      $query->bindParam(':uploadfile',$uploadfile,PDO::PARAM_STR);
      $query->execute();
      if($query){
        $success = "Vehicle updated successfully";
      }else {
        $error = "Oops..., Something went wrong. Try again";
      }
    }else{
      $error = 'ERROR_FILE_ATTACK. Try again';
    }

  }
}


/*update status-----------------------------------------------*/
if (isset($_POST['updateStatusBtn'])) {

  $status_id = $_POST['status_id'];
  if(isset($_POST['status'])){
    $status = "active";
  }else{ 
     $status = "inactive";
  }

  $sql="UPDATE vehicles SET status=:status WHERE id=:status_id";
  $query = $db->prepare($sql);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->bindParam(':status_id',$status_id,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Status updated successfully";
  }else {
    $error = "Oops..., Something went wrong. Try again";
  }
}
?>