<?php 
/*update payment-----------------------------------------------*/
if (isset($_POST['updateTripBtn'])) {

  $trip_id = $_POST['trip_id'];
  $trip_status = $_POST['trip_status'];
  $sql="UPDATE transport_order SET status=:trip_status WHERE transport_id=:trip_id";
  $query = $db->prepare($sql);
  $query->bindParam(':trip_status',$trip_status,PDO::PARAM_STR);
  $query->bindParam(':trip_id',$trip_id,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Trip updated successfully";
  }else {
    $error = "Oops..., Something went wrong. Try again";
  }
}
?>