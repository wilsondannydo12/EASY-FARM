<?php 
/*add----------------------------------*/
if (isset($_POST['registerTypesBtn'])) {
            
  $vehicle_type = $_POST['vehicle_type'];

  $sql="INSERT INTO vehicle_type(types) VALUES(:vehicle_type)";
  $query = $db->prepare($sql);
  $query->bindParam(':vehicle_type',$vehicle_type,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Registration successful";
  }
  else { 
    $error = "Oops..., something went wrong";
  }
}


/*update----------------------------------*/
if (isset($_POST['updateTypeBtn'])) {
            
  $vehicle_type = $_POST['vehicle_type'];
  $vehicleTypeId = $_POST['vehicleTypeId'];

  $sql="UPDATE vehicle_type SET types=:vehicle_type WHERE id=:vehicleTypeId";
  $query = $db->prepare($sql);
  $query->bindParam(':vehicle_type',$vehicle_type,PDO::PARAM_STR);
  $query->bindParam(':vehicleTypeId',$vehicleTypeId,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Updated successfully";
  }
  else { 
    $error = "Oops..., something went wrong";
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

  $sql="UPDATE vehicle_type SET status=:status WHERE id=:status_id";
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