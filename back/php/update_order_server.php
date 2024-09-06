<?php 
/*update payment-----------------------------------------------*/
if (isset($_POST['updateOrderBtn'])) {

  $orderShipping_id = $_POST['orderShipping_id'];
  $order_status = $_POST['order_status'];
  $sql="UPDATE order_shipping SET status=:order_status WHERE id=:orderShipping_id";
  $query = $db->prepare($sql);
  $query->bindParam(':order_status',$order_status,PDO::PARAM_STR);
  $query->bindParam(':orderShipping_id',$orderShipping_id,PDO::PARAM_STR);
  $query->execute();
  if($query){
    $success = "Order updated successfully";
  }else {
    $error = "Oops..., Something went wrong. Try again";
  }
}
?>