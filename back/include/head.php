 <?php include 'db.php'; ?>
 <?php include 'function_call.php'; ?>
 <?php 
 if (!empty($_SESSION['type']) AND strtolower($_SESSION['type']) == "superadmin") {
     $query = $db->query("SELECT * FROM admin_tbl WHERE id = '".$_SESSION['id']."'");

      if($query->rowCount() > 0){
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $data){
            $myImage = $data->profileImg;
            $firstname = $data->firstname;
        }
    }
 }else{
    $query = $db->query("SELECT * FROM users WHERE id = '".$_SESSION['id']."'");

      if($query->rowCount() > 0){
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $data){
            $myImage = $data->profileImg;
            $firstname = $data->firstname;
        }
    }
 }


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>EASY-FARM || ADMINISTRATION</title>
    <link href="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png" type="images/x-icon" rel="shortcut icon">

    <!-- Fontfaces CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
 
    <!-- Bootstrap CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo(BASE_LINK); ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  

    <!-- Main CSS-->
    <link href="<?php echo(BASE_LINK); ?>/assets/css/theme.css" rel="stylesheet" media="all"> 

    <style type="text/css">
        .profile-preview-img{
                height: 80px; 
                width: 60%;
                border-radius: 100px;
            }

            @media only screen and (max-width: 1200px) {
                .profile-preview-img{
                    height: 90px; 
                    width: 30%;
                    margin-right: auto;
                    margin-left: auto;
                    display: block;
                }
            }
    </style>

</head>