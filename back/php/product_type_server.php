<?php 
/*add----------------------------------*/
if (isset($_POST['addProTypeBtn'])) {
            
  $pro_type = $_POST['pro_type'];

  $sql="INSERT INTO product_type(pro_type) VALUES(:pro_type)";
  $query = $db->prepare($sql);
  $query->bindParam(':pro_type',$pro_type,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Product Type registration successful";
  }
  else { 
    $error = "Oops..., something went wrong";
  }
}


/*update----------------------------------*/
if (isset($_POST['updateProTypeBtn'])) {
            
  $pro_type = $_POST['pro_type'];
  $productType_id = $_POST['productType_id'];

  $sql="UPDATE product_type SET pro_type=:pro_type WHERE id=:productType_id";
  $query = $db->prepare($sql);
  $query->bindParam(':pro_type',$pro_type,PDO::PARAM_STR);
  $query->bindParam(':productType_id',$productType_id,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Product Type updated successfully";
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

  $sql="UPDATE product_type SET status=:status WHERE id=:status_id";
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