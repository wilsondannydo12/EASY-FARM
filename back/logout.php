<?php
session_start(); 
$_SESSION = array();
unset($_SESSION['user']);
session_destroy(); // destroy session
header("location:https://localhost/agroBusiness/back/index"); 
?>

