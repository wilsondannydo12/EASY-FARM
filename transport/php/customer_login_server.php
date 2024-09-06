<?php 
/*add----------------------------------*/
if (isset($_POST["signInBtn"])) {
  
  $username = $_POST['username'];  
  $password = $_POST['password']; 
  $query = "SELECT password FROM transport_customers WHERE username=:username";
  $query = $db->prepare($query);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->execute();
  if($query->rowCount() > 0){ 
      $result = $query->fetchAll(PDO::FETCH_OBJ);
      foreach($result as $data){
          if(password_verify($password, $data->password)){ 

              $sql_check = "SELECT * FROM transport_customers WHERE username=:username AND status='active'";
              $check_query = $db->prepare($sql_check);
              $check_query->bindParam(':username',$username,PDO::PARAM_STR);
              $check_query->execute();

              if($check_query->rowCount() > 0){

                  $check_result = $check_query->fetchAll(PDO::FETCH_OBJ);
                  foreach($check_result as $check_data){
                      $_SESSION['transp_customer_id'] = $check_data->id;
                      $_SESSION['transp_customer_username'] = $check_data->username; 
                      $_SESSION['transp_customer_phone'] = $check_data->phone;

                      if (!empty($_GET['utm']) AND strtolower($_GET['utm']) == "self") {
                        echo "<script>
                              location.href='".BASE_LINK."/home';
                          </script>";
                      }else{
                        echo "<script>
                              location.href='".BASE_LINK."/".strtolower(trim($_GET['utm']))."';
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