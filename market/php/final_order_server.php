<?php
/*add----------------------------------*/
if (isset($_POST['finalOrderBtn'])) {
  
  $firstname = $_POST['ship_firstname'];       
  $lastname = $_POST['ship_lastname'];
  $ship_address = $_POST['ship_address'];
  $ship_postCode = $_POST['ship_postCode'];
  $ship_town = $_POST['ship_town'];
  $bill_address = $_POST['bill_address'];
  $bill_postCode = $_POST['bill_postCode'];
  $bill_town = $_POST['bill_town'];
  $orderComment = $_POST['orderComment'];
  $customer = $_SESSION['customer_id'];
  $order_no = "AGRO".orderCodeGen(4, "0123456789");
  if (empty($_POST['ship_apartment'])) {
    $ship_apartment = "";
  }else{
    $ship_apartment = $_POST['ship_apartment'];
  }
  if (empty($_POST['bill_apartment'])) {
    $bill_apartment = ""; 
  }else{
    $bill_apartment = $_POST['bill_apartment'];
  }
   

  $sql="INSERT INTO order_shipping(order_no, customer, firstname, lastname, ship_address, ship_apartment, ship_postCode, ship_town, bill_address, bill_apartment, bill_postCode, bill_town, orderComment) VALUES(:order_no, :customer, :firstname, :lastname, :ship_address, :ship_apartment, :ship_postCode, :ship_town, :bill_address, :bill_apartment, :bill_postCode, :bill_town, :orderComment)";
  $query = $db->prepare($sql);
  $query->bindParam(':order_no',$order_no,PDO::PARAM_STR);
  $query->bindParam(':customer',$customer,PDO::PARAM_STR);
  $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
  $query->bindParam(':ship_address',$ship_address,PDO::PARAM_STR);
  $query->bindParam(':ship_apartment',$ship_apartment,PDO::PARAM_STR);
  $query->bindParam(':ship_postCode',$ship_postCode,PDO::PARAM_STR);
  $query->bindParam(':ship_town',$ship_town,PDO::PARAM_STR);
  $query->bindParam(':bill_address',$bill_address,PDO::PARAM_STR);
  $query->bindParam(':bill_apartment',$bill_apartment,PDO::PARAM_STR);
  $query->bindParam(':bill_postCode',$bill_postCode,PDO::PARAM_STR);
  $query->bindParam(':bill_town',$bill_town,PDO::PARAM_STR);
  $query->bindParam(':orderComment',$orderComment,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $db->lastInsertId();
  if(isset($lastInsertId)){
    foreach($_SESSION["products"] as $cart){ 
      $product_id = $cart["id"];
      $quantity = $cart["quantity"];
      $price = $cart["price"];
      //$totalCartPrice += $cart["price"] * $cart["quantity"];
      //$itemPrice = $cart["price"] * $cart["quantity"];

      $sql="INSERT INTO order_tbl(order_id, order_no, customer, product_id, quantity, price) VALUES(:lastInsertId, :order_no, :customer, :product_id, :quantity, :price)";
      $query = $db->prepare($sql);
      $query->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
      $query->bindParam(':order_no',$order_no,PDO::PARAM_STR);
      $query->bindParam(':customer',$customer,PDO::PARAM_STR);
      $query->bindParam(':product_id',$product_id,PDO::PARAM_STR);
      $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
      $query->bindParam(':price',$price,PDO::PARAM_STR);
      $order_query = $query->execute();
    }
    if ($order_query == TRUE) {
      unset($_SESSION["products"]);
      echo "<script>
        alert('Order placed successfully. Kindly make all payments for your order to be processed. Thank you.');
        location.href='home';
        </script>";
        
    }else {
      echo "<script>
      alert('Oops..., Something went wrong. Try again')
      </script>";
    }
  }else {
    echo "<script>
    alert('Oops..., Something went wrong. Try again')
    </script>";
  }
}

?>