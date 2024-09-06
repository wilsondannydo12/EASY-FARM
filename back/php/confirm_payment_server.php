<?php 
/*update payment-----------------------------------------------*/
if (isset($_POST['confirmPaymentBtn'])) {

  $orderShipping_id = $_POST['orderShipping_id'];
  if(isset($_POST['confirmPayment'])){
    $confirmPayment = "received";
    $status = "in process";
    $sql="UPDATE order_shipping SET payment=:confirmPayment, status=:status WHERE id=:orderShipping_id";
    $query = $db->prepare($sql);
    $query->bindParam(':confirmPayment',$confirmPayment,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':orderShipping_id',$orderShipping_id,PDO::PARAM_STR);
    $query->execute();
    if($query){
      $success = "Payment updated successfully";
    }else {
      $error = "Oops..., Something went wrong. Try again";
    }
  }else{ 
     $error = "Please check the box if you want to confirm payment.";
  }
}
?>