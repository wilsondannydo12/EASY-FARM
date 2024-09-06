<?php 
/*add----------------------------------*/
if (isset($_POST["customerLogInBtn"])) {
  
  $username = $_POST['username'];  
  $password = $_POST['password']; 
  $query = "SELECT password FROM customers WHERE username=:username || email=:username";
  $query = $db->prepare($query);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->execute();
  if($query->rowCount() > 0){ 
      $result = $query->fetchAll(PDO::FETCH_OBJ);
      foreach($result as $data){
          if(password_verify($password, $data->password)){ 

              $sql_check = "SELECT * FROM customers WHERE (username=:username || email=:username) AND status='active'";
              $check_query = $db->prepare($sql_check);
              $check_query->bindParam(':username',$username,PDO::PARAM_STR);
              $check_query->bindParam(':username',$username,PDO::PARAM_STR);
              $check_query->execute();

              if($check_query->rowCount() > 0){

                  $check_result = $check_query->fetchAll(PDO::FETCH_OBJ);
                  foreach($check_result as $check_data){
                      $_SESSION['customer_id'] = $check_data->id;
                      $_SESSION['customer_username'] = $check_data->username; 
                      $_SESSION['customer_email'] = $check_data->email;

                      if (!empty($_GET['utm']) AND strtolower($_GET['utm']) == "self") {
                        echo "<script>
                              location.href='".BASE_LINK."/account/my-account';
                          </script>";
                      }else{
                        echo "<script>
                              location.href='".BASE_LINK."/".strtolower($_GET['utm'])."';
                          </script>";
                      }
                      
                       
                  }
              }else{
                  echo "<script>
                      alert('Your account has been blocked. Contact the administrator.');
                      document.getElementsById('password').value='';
                  </script>";
              }
          }else{
              echo "<script>
                  alert('Invalid Password');
                  document.getElementsById('password').value='';
              </script>";
          }
      }
  }     
}
?>