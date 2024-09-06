<?php 
session_start();
if (isset($_SESSION['transp_customer_id'])) {
	unset($_SESSION['transp_customer_id']);
	unset($_SESSION['transp_customer_username']);
	unset($_SESSION['transp_customer_phone']);
	header("Location: http://localhost/agroBusiness/transport/home");
}else{
	header("Location: http://localhost/agroBusiness/transport/home");
}
?>