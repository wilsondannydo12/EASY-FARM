<?php 
if (isset($_POST['changePassBtn'])) {
       
    $cpass= $_POST['cpass'];
    $npass= password_hash($_POST['npass'], PASSWORD_DEFAULT);
    $cnpass= $_POST['cnpass'];
    $user_id = $_SESSION['customer_id'];
          
    if (password_verify($cnpass, $npass)) {
    
      $sql ="SELECT password FROM customers WHERE id=:user_id AND status = 'active'";
      $query= $db -> prepare($sql);
      $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
      $query-> execute();
      if($query -> rowCount() > 0){
          $results = $query -> fetchAll(PDO::FETCH_OBJ);
          foreach($results as $data){
              if(password_verify($cpass, $data->password)){

                  $sql_1="UPDATE customers SET password=:npass WHERE id =:user_id";
                  $query_1 = $db->prepare($sql_1);
                  $query_1-> bindParam(':npass', $npass, PDO::PARAM_STR);
                  $query_1-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
                  $query_1->execute();
                  if($query_1){
                      echo "<script>
                        alert('Password updated successfully.');
                        </script>";
                  }else{
                      echo "<script>
                        alert('Oops..., Something went wrong. Try again')
                        </script>";
                  }
              }else{ 
                  echo "<script>
                        alert('Invalid Current Password');
                        </script>";
              }
          }
      }else{ 
          echo"<script>
            alert('Sorry, your account is inactive');
        </script>";
      }

  }else{ 
      echo "<script>
        alert('Oops..., Password mismatch')
        </script>";
  }   
}


if (isset($_POST['changeEmailBtn'])) {
  $user_id = $_SESSION['customer_id'];
  $email= $_POST['email'];
  $phone= $_POST['cus_phone'];
  $sql="UPDATE customers SET email=:email, phone=:phone WHERE id=:user_id";
  $query = $db->prepare($sql);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
  $query->execute();
  if($query){
    echo "<script>
        alert('Account updated successful')
        </script>";
  }else {
    echo "<script>
        alert('Oops..., Something went wrong. Try again')
        </script>";
  }
}
?>