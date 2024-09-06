<?php 
session_start();
if (isset($_POST['logInBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT password FROM admin_tbl WHERE username=:username";
    $query = $db->prepare($query);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->execute();
    if($query->rowCount() > 0){ 
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $data){
            if(password_verify($password, $data->password)){ 

                $sql_check = "SELECT * FROM admin_tbl WHERE username=:username AND status='active'";
                $check_query = $db->prepare($sql_check);
                $check_query->bindParam(':username',$username,PDO::PARAM_STR);
                $check_query->execute();

                if($check_query->rowCount() > 0){

                    $check_result = $check_query->fetchAll(PDO::FETCH_OBJ);
                    foreach($check_result as $check_data){
                        $_SESSION['id'] = $check_data->id;
                        $_SESSION['username'] = $check_data->username;
                        $_SESSION['type'] = $check_data->type;
                        $_SESSION['staffname'] = $check_data->firstname; 
                        
                         echo "<script>
                                location.href='".BASE_LINK."/dashboard';
                            </script>";
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
    }else{ // else check user table----------
        $query = "SELECT password FROM users WHERE username=:username";
        $query = $db->prepare($query);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->execute();
        if($query->rowCount() > 0){ 
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($result as $data){
                if(password_verify($password, $data->password)){ 

                    $sql_check = "SELECT * FROM users WHERE username=:username AND status='active'";
                    $check_query = $db->prepare($sql_check);
                    $check_query->bindParam(':username',$username,PDO::PARAM_STR);
                    $check_query->execute();

                    if($check_query->rowCount() > 0){

                        $check_result = $check_query->fetchAll(PDO::FETCH_OBJ);
                        foreach($check_result as $check_data){
                            $_SESSION['id'] = $check_data->id;
                            $_SESSION['username'] = $check_data->username;
                            $_SESSION['type'] = $check_data->type;
                            $_SESSION['staffname'] = $check_data->firstname; 
                            
                             echo "<script>
                                    location.href='".BASE_LINK."/dashboard';
                                </script>";
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
}
?>