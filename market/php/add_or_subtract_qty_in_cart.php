<?php 
include('../include/db.php');
session_start();
if(!empty($_POST["quick_shop_cur_product"])) {
	foreach($_POST as $key => $value){
		$product[$key] = $value;
	}
	$productID = $product['quick_shop_cur_product'];
	$qtyType = $product['qtyType'];

	if (!empty($qtyType) AND strtolower($qtyType) == "add") {
		if(isset($_SESSION["products"])){  
			if(isset($_SESSION["products"][$productID])) {
				// check product already added then increase the quantity
				if (in_array($productID, array_keys($_SESSION["products"]))) {
					foreach ($_SESSION["products"] as $k => $v) {
						if ($productID == $k) {
							$totalQuantity = $_SESSION["products"][$k]["quantity"]+ 1;
							$_SESSION["products"][$k]["quantity"] += 1;
						}
					}
				}
			}			
		}
	}else{
		if(isset($_SESSION["products"])){  
			if(isset($_SESSION["products"][$productID])) {
				// check product already added then increase the quantity
				if (in_array($productID, array_keys($_SESSION["products"]))) {
					foreach ($_SESSION["products"] as $k => $v) {
						if ($productID == $k) {
							if ($_SESSION["products"][$k]["quantity"] == 1) {

							}else{
								$totalQuantity = $_SESSION["products"][$k]["quantity"] -  1;
								$_SESSION["products"][$k]["quantity"] = $totalQuantity;
							}
							
						}
					}
				}
			}			
		}
	}	
}
?>