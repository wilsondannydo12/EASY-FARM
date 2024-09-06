<?php 
if (isset($_POST['changePassBtn'])) {
       
    $cpass= $_POST['cpass'];
    $npass= password_hash($_POST['npass'], PASSWORD_DEFAULT);
    $cnpass= $_POST['cnpass'];
    $user_id = $_SESSION['transp_customer_id'];
          
    if (password_verify($cnpass, $npass)) {
    
      $sql ="SELECT password FROM transport_customers WHERE id=:user_id AND status = 'active'";
      $query= $db -> prepare($sql);
      $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
      $query-> execute();
      if($query -> rowCount() > 0){
          $results = $query -> fetchAll(PDO::FETCH_OBJ);
          foreach($results as $data){
              if(password_verify($cpass, $data->password)){

                  $sql_1="UPDATE transport_customers SET password=:npass WHERE id =:user_id";
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

?>