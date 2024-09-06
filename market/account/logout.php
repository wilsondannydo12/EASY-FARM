<?php 
session_start();
if (isset($_SESSION['customer_id'])) {
	unset($_SESSION['customer_id']);
	unset($_SESSION['customer_username']);
	unset($_SESSION['customer_email']);
	header("Location: http://localhost/agroBusiness/market/home");
}else{
	header("Location: http://localhost/agroBusiness/market/home");
}
?>