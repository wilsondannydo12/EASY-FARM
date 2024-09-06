<?php 

/*add----------------------------------*/
if (isset($_POST['addProductBtn'])) {
  
  $product_name = $_POST['product_name'];       
  $sku = $_POST['sku'];
  $product_type = $_POST['product_type'];
  $shop = $_POST['shop'];
  $old_price = $_POST['old_price'];
  $new_price = $_POST['new_price'];
  $availability = $_POST['availability']; 
  $description = $_POST['description'];
  $vendor = $_SESSION['id'];


  $uploaddir = 'uploads/product/';
  $uploadfile = $uploaddir . basename($_FILES['productImage']['name']);
  if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadfile)) {

    $sql="INSERT INTO product_tbl(product_name, sku, vendor, product_type, shop, old_price, new_price, availability, description, image) VALUES(:product_name, :sku, :vendor, :product_type, :shop, :old_price, :new_price, :availability, :description, :uploadfile)";
    $query = $db->prepare($sql);
    $query->bindParam(':product_name',$product_name,PDO::PARAM_STR);
    $query->bindParam(':sku',$sku,PDO::PARAM_STR);
    $query->bindParam(':vendor',$vendor,PDO::PARAM_STR);
    $query->bindParam(':product_type',$product_type,PDO::PARAM_STR);
    $query->bindParam(':shop',$shop,PDO::PARAM_STR);
    $query->bindParam(':old_price',$old_price,PDO::PARAM_STR);
    $query->bindParam(':new_price',$new_price,PDO::PARAM_STR);
    $query->bindParam(':availability',$availability,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':uploadfile',$uploadfile,PDO::PARAM_STR);
    $query->execute();
    if($query){
      $success = "Product registration successful";
    }else {
    	$error = "Oops..., Something went wrong. Try again";
    }
  }else{
  	$error = 'Error 514 File attack. Try again';
  }
}

/*update------------------------------------------------------*/
if (isset($_POST['updateProductBtn'])) {
  
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];       
  $sku = $_POST['sku'];
  $product_type = $_POST['product_type'];
  $shop = $_POST['shop'];
  $old_price = $_POST['old_price'];
  $new_price = $_POST['new_price'];
  $availability = $_POST['availability']; 
  $description = $_POST['description'];

  if (empty($_FILES['productImage']['name'])) {
    $sql="UPDATE product_tbl SET product_name=:product_name, sku=:sku, product_type=:product_type, shop=:shop, old_price=:old_price, new_price=:new_price, availability=:availability, description=:description WHERE id=:product_id";
    $query = $db->prepare($sql);
    $query->bindParam(':product_name',$product_name,PDO::PARAM_STR);
    $query->bindParam(':sku',$sku,PDO::PARAM_STR);
    $query->bindParam(':product_type',$product_type,PDO::PARAM_STR);
    $query->bindParam(':shop',$shop,PDO::PARAM_STR);
    $query->bindParam(':old_price',$old_price,PDO::PARAM_STR);
    $query->bindParam(':new_price',$new_price,PDO::PARAM_STR);
    $query->bindParam(':availability',$availability,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':product_id',$product_id,PDO::PARAM_STR);
    $query->execute();
    if($query){
      $success = "Product updated successfully";
    }else {
      $error = "Oops..., Something went wrong. Try again";
    }
  }else{

    $uploaddir = 'uploads/product/';
    $uploadfile = $uploaddir . basename($_FILES['productImage']['name']);
    if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadfile)) {

      $sql="UPDATE product_tbl SET product_name=:product_name, sku=:sku, product_type=:product_type, shop=:shop, old_price=:old_price, new_price=:new_price, availability=:availability, description=:description, image=:uploadfile WHERE id=:product_id";
      $query = $db->prepare($sql);
      $query->bindParam(':product_name',$product_name,PDO::PARAM_STR);
      $query->bindParam(':sku',$sku,PDO::PARAM_STR);
      $query->bindParam(':product_type',$product_type,PDO::PARAM_STR);
      $query->bindParam(':shop',$shop,PDO::PARAM_STR);
      $query->bindParam(':old_price',$old_price,PDO::PARAM_STR);
      $query->bindParam(':new_price',$new_price,PDO::PARAM_STR);
      $query->bindParam(':availability',$availability,PDO::PARAM_STR);
      $query->bindParam(':description',$description,PDO::PARAM_STR);
      $query->bindParam(':product_id',$product_id,PDO::PARAM_STR);
      $query->bindParam(':uploadfile',$uploadfile,PDO::PARAM_STR);
      $query->execute();
      if($query){
        $success = "Product updated successfully";
      }else {
        $error = "Oops..., Something went wrong. Try again";
      }
    }else{
      $error = 'Error 514 File attack. Try again';
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

  $sql="UPDATE product_tbl SET status=:status WHERE id=:status_id";
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