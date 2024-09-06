<?php 
include('../../include/db.php');
session_start();
/*add----------------------------------*/
if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['phone']) || !empty($_POST['password'])) {
  
  $username = $_POST['username'];       
  $email = $_POST['email'];
  $phone = $_POST['phone']; 
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $addDate = date("Y-m-d");

  $sql="INSERT INTO customers(username, email, phone, password, addDate) VALUES(:username, :email, :phone, :password, :addDate)";
  $query = $db->prepare($sql);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->bindParam(':addDate',$addDate,PDO::PARAM_STR);
  $query->execute();
  if($query){
    echo "Account registration successful";
  }else {
    echo "Oops..., Something went wrong. Try again";
  }
}
?>