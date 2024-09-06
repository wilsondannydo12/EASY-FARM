<?php 
function secure_page(){
	if(empty($_SESSION['customer_id'])) {
    	echo "<script> location.href='logout';</script>";
	}
}
?>