<?php 

/*add----------------------------------*/
if (isset($_POST['registerBtn'])) {
  
  $username = $_POST['username'];       
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $gps = $_POST['gps'];
  $userType = $_POST['userType']; 
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $addDate = date("Y-m-d");

  $uploaddir = 'uploads/profile/';
  $move_path = 'back/uploads/profile/';
  $uploadfile = $uploaddir . basename($_FILES['profileImg']['name']);
  $file_real_path = $move_path . basename($_FILES['profileImg']['name']);
  if (move_uploaded_file($_FILES['profileImg']['tmp_name'], $file_real_path)) {

    $sql="INSERT INTO users(username, firstname, lastname, email, phone, city, gps, type, password, profileImg, addDate) VALUES(:username, :firstname, :lastname, :email, :phone, :city, :gps, :userType, :password, :uploadfile, :addDate)";
    $query = $db->prepare($sql);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
    $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':gps',$gps,PDO::PARAM_STR);
    $query->bindParam(':userType',$userType,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':uploadfile',$uploadfile,PDO::PARAM_STR);
    $query->bindParam(':addDate',$addDate,PDO::PARAM_STR);
    $query->execute();
    if($query){
      echo "<script>
      alert('Account registration successful');
      </script>";
    }else {
    	echo "<script>
	      alert('Oops..., Something went wrong. Try again');
	      </script>";
    }
  }else{
  	echo "<script>
      	alert('Error 514 File attack. Try again');
      </script>";
  }
}
?>