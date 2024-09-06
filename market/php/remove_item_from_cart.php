<?php 
include('../include/db.php');
session_start();
# Remove product 
if (!empty($_POST["proid"])) {
	if(isset($_POST["proid"]) && isset($_SESSION["products"])) {
		$productID  = $_POST["proid"];
		if(isset($_SESSION["products"][$productID]))	{
			unset($_SESSION["products"][$productID]); 
		}
	}
}

if (!empty($_POST["clear"]) AND strtolower($_POST["clear"]) == "all") {
	if(isset($_SESSION["products"]))	{
		unset($_SESSION["products"]); 
	}
}