<?php 
/*add----------------------------------*/
if (isset($_POST['addShopBtn'])) {
            
  $shop = $_POST['shop'];

  $sql="INSERT INTO shop(shop_name) VALUES(:shop)";
  $query = $db->prepare($sql);
  $query->bindParam(':shop',$shop,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Shop registration successful";
  }
  else { 
    $error = "Oops..., something went wrong";
  }
}


/*update----------------------------------*/
if (isset($_POST['updateShopBtn'])) {
            
  $shop = $_POST['shop'];
  $shopId = $_POST['shopId'];

  $sql="UPDATE shop SET shop_name=:shop WHERE id=:shopId";
  $query = $db->prepare($sql);
  $query->bindParam(':shop',$shop,PDO::PARAM_STR);
  $query->bindParam(':shopId',$shopId,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Shop updated successfully";
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

  $sql="UPDATE shop SET status=:status WHERE id=:status_id";
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