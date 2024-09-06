<?php

if(isset($_POST['editUserBtn'])){
    
    $userId=$_POST['userId'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $type=$_POST['userType'];

    if (empty($_FILES['userProfile']['name'])) {

      if (strtolower($_SESSION['type']) == "superadmin") {
      $sql="UPDATE admin_tbl SET firstname=:firstname, lastname=:lastname, username=:username, phone=:contact, email=:email, type=:type WHERE id='$userId'";
    }else{
      $sql="UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username, phone=:contact, email=:email, type=:type WHERE id='$userId'";
    }
      $query = $db->prepare($sql);
      $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
      $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
      $query->bindParam(':username',$username,PDO::PARAM_STR);
      $query->bindParam(':contact',$contact,PDO::PARAM_STR);
      $query->bindParam(':email',$email,PDO::PARAM_STR);
      $query->bindParam(':type',$type,PDO::PARAM_STR);
      $query->execute();
    if($query){
        $msg="Account updated successfully.";
    }
    else {
      $error="Something went wrong. Try again";
    }

    }else{
       $uploaddir = 'uploads/profile/';
     $uploadfile = $uploaddir . basename($_FILES['userProfile']['name']);

    if (move_uploaded_file($_FILES['userProfile']['tmp_name'], $uploadfile)) {

          if (strtolower($_SESSION['type']) == "superadmin") {
          $sql="UPDATE admin_tbl SET firstname=:firstname, lastname=:lastname, username=:username, phone=:contact, email=:email, profileImg=:uploadfile, type=:type WHERE id='$userId'";
        }else{
          $sql="UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username, phone=:contact, email=:email, profileImg=:uploadfile, type=:type WHERE id='$userId'";
        }
            $query = $db->prepare($sql);
            $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
            $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
            $query->bindParam(':username',$username,PDO::PARAM_STR);
            $query->bindParam(':contact',$contact,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':uploadfile',$uploadfile,PDO::PARAM_STR);
            $query->bindParam(':type',$type,PDO::PARAM_STR);
            $query->execute();
          if($query){
              $msg="Account updated successfully.";
          }
          else {
            $error="Something went wrong. Try again";
          }
        }else{
          $error="File attack. Try again";
        }
    }
    
    
}
 ?>