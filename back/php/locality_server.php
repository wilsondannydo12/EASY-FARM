<?php 
/*add----------------------------------*/
if (isset($_POST['registerLocalityBtn'])) {
            
  $locality = $_POST['locality'];

  $sql="INSERT INTO location(locality) VALUES(:locality)";
  $query = $db->prepare($sql);
  $query->bindParam(':locality',$locality,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Registration successful";
  }
  else { 
    $error = "Oops..., something went wrong";
  }
}


/*update----------------------------------*/
if (isset($_POST['updateLocalityBtn'])) {
            
  $locality = $_POST['locality'];
  $localityId = $_POST['localityId'];

  $sql="UPDATE location SET locality=:locality WHERE id=:localityId";
  $query = $db->prepare($sql);
  $query->bindParam(':locality',$locality,PDO::PARAM_STR);
  $query->bindParam(':localityId',$localityId,PDO::PARAM_STR);
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

  $sql="UPDATE location SET status=:status WHERE id=:status_id";
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