<?php 
/*add----------------------------------*/
if (isset($_POST['signUpBtn'])) {
  
  $username = $_POST['username'];       
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $location = $_POST['location'];
  $phone = $_POST['phone']; 
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql="INSERT INTO transport_customers(username, firstname, lastname, phone, location, password) VALUES(:username, :firstname, :lastname, :phone, :location, :password)";
  $query = $db->prepare($sql);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':location',$location,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $db->lastInsertId();
  if(!empty($lastInsertId)){
    echo "<script>alert('Account registration successful');</script>";
  }else {
    echo "<script>alert('Oops..., Something went wrong. Try again');</script>";
  }
}
?>