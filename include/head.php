<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>EASY-FARM</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="<?php echo(BASE_LINK); ?>/assets/images/farm-logo3.png" type="icon" sizes="16x16" rel="shortcut icon">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="<?php echo(BASE_LINK); ?>/assets/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="<?php echo(BASE_LINK); ?>/assets/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo(BASE_LINK); ?>/assets/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo(BASE_LINK); ?>/assets/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo(BASE_LINK); ?>/assets/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo(BASE_LINK); ?>/assets/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="<?php echo(BASE_LINK); ?>/assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style type="text/css">
            .caro-food-middle img {
                  display: inline-block;
                  width: 40%;
                  transform-origin:top left;
                  margin-right: auto;
                  margin-left: auto;
                  display: block;
                  margin-top: 5px;
            }
            .caro-food-right img {
                  display: inline-block;
                  width: 25%;
                  /*transform: rotate(45deg) translateY(-100%);*/
                  transform-origin:top left;
                  float: right;
                  margin-top: -30%;

            }

            .input-box {
              width: 100%;
              padding: 5px 20px;
              margin: 8px 0;
              box-sizing: border-box;
              border: 1px solid #c4c4c3;
              margin-top: -20px;
              border-radius: 5px;
            }

            .logo-img{
                  width: 35%;
                  margin-left: 40px;
            }

            .innerDiv {
                 margin:0px;
                 height: 900px;
             }
             .floatingBtn {
                 background-color: #f1c40f;
                 color: #000000;
                 transform: rotate(-90deg);
                 width: 230px;
                 right: 1px; /* From JQuery we know scroll bar width is 17px but still reducing it 2px*/
                 top: 300px;
                 position: fixed;
                 padding: 13px 0px 13px 13px;
                 text-transform: uppercase;
                 font-weight: bold;
             }
             .floatingBtn a {
                text-align: center;
            }
             .floatingBtn:hover {
                background-color: green;
                color: #ffffff;
            }
            .floatingBtn a:hover {
                color: #ffffff;
            }

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