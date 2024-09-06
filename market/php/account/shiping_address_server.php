<?php 
/*add----------------------------------*/
if (isset($_POST['addAddressBtn'])) {
  
  $firstname = $_POST['firstname'];       
  $lastname = $_POST['lastname'];
  $apartment = $_POST['apartment'];
  $street_address = $_POST['street_address'];
  $town = $_POST['town'];
  $customer = $_SESSION['customer_id'];
  $postCode = $_POST['postCode'];
  if (empty($_POST['company'])) {
    $company = "";
  }else{
    $company = $_POST['company'];
  }
   
  $update = $db->query("UPDATE shipping_address SET status='inactive' WHERE customer='$customer'");

  $sql="INSERT INTO shipping_address(customer, firstname, lastname, address, company, apartment, postCode, town) VALUES(:customer, :firstname, :lastname, :street_address, :company, :apartment, :postCode, :town)";
  $query = $db->prepare($sql);
  $query->bindParam(':customer',$customer,PDO::PARAM_STR);
  $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
  $query->bindParam(':street_address',$street_address,PDO::PARAM_STR);
  $query->bindParam(':company',$company,PDO::PARAM_STR);
  $query->bindParam(':apartment',$apartment,PDO::PARAM_STR);
  $query->bindParam(':postCode',$postCode,PDO::PARAM_STR);
  $query->bindParam(':town',$town,PDO::PARAM_STR);
  $query->execute();
  if($query){
    echo "<script>
    alert('Address added successfully')
    </script>";
  }else {
    echo "<script>
    alert('Oops..., Something went wrong. Try again')
    </script>";
  }
}


/*update-----------------------------------------*/
if (isset($_POST['updateAddressBtn'])) {
  
  $address_id = $_POST['address_id']; 
  $firstname = $_POST['firstname'];       
  $lastname = $_POST['lastname'];
  $apartment = $_POST['apartment'];
  $street_address = $_POST['street_address'];
  $town = $_POST['town'];
  $postCode = $_POST['postCode'];
  if (empty($_POST['company'])) {
    $company = "";
  }else{
    $company = $_POST['company'];
  }
   

  $sql="UPDATE shipping_address SET firstname=:firstname, lastname=:lastname, address=:street_address, company=:company, apartment=:apartment, postCode=:postCode, town=:town WHERE id=:address_id";
  $query = $db->prepare($sql);
  $query->bindParam(':address_id',$address_id,PDO::PARAM_STR);
  $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
  $query->bindParam(':street_address',$street_address,PDO::PARAM_STR);
  $query->bindParam(':company',$company,PDO::PARAM_STR);
  $query->bindParam(':apartment',$apartment,PDO::PARAM_STR);
  $query->bindParam(':postCode',$postCode,PDO::PARAM_STR);
  $query->bindParam(':town',$town,PDO::PARAM_STR);
  $query->execute();
  if($query){
    echo "<script>
    alert('Address updated successfully')
    </script>";
  }else {
    echo "<script>
    alert('Oops..., Something went wrong. Try again')
    </script>";
  }
}

/*update status-----------------------------------------------*/
if (isset($_POST['updateAddressStatusBtn'])) {

  $addressStatus_id = $_POST['addressStatus_id'];
  $customer = $_SESSION['customer_id'];

  if(!empty($_POST['addressStatus']) && strtolower($_POST['addressStatus']) == "active"){
    $status = "active";
    $update = $db->query("UPDATE shipping_address SET status = 'inactive' WHERE customer='$customer'");
  }else{ 
    $status = "inactive";
  }

  $sql="UPDATE shipping_address SET status=:status WHERE id=:addressStatus_id";
  $query = $db->prepare($sql);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->bindParam(':addressStatus_id',$addressStatus_id,PDO::PARAM_STR);
  $query->execute();
  if($query){
     echo "<script>
    alert('Status updated successfully');
    </script>";
  }else {
     echo "<script>
    alert('Oops..., Something went wrong. Try again');
    </script>";
  }
}

/*update status-----------------------------------------------*/
if (isset($_POST['IssuePaymentBtn'])) {

  $curr_orderNo = $_POST['curr_orderNo'];
  $customer = $_SESSION['customer_id'];
  $transaction_no = $_POST['transaction_no'];
  $payment_status = "in process";

  $sql="UPDATE order_shipping SET transaction_id=:transaction_no, payment=:payment_status WHERE customer=:customer AND order_no=:curr_orderNo";
  $query = $db->prepare($sql);
  $query->bindParam(':transaction_no',$transaction_no,PDO::PARAM_STR);
  $query->bindParam(':payment_status',$payment_status,PDO::PARAM_STR);
  $query->bindParam(':curr_orderNo',$curr_orderNo,PDO::PARAM_STR);
  $query->bindParam(':customer',$customer,PDO::PARAM_STR);
  $query->execute();
  if($query){
     echo "<script>
    alert('Payment issued successfully, Kindly wait for approval message.');
    </script>";
  }else {
     echo "<script>
    alert('Oops..., Something went wrong. Try again');
    </script>";
  }
}
?>