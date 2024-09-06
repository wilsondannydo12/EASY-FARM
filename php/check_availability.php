<?php 
include('../include/db.php');

/*check for username availability-------------------------------*/
if(!empty($_POST["username"])) {
	
	$username = $_POST["username"];
	
	$sql ="SELECT username FROM admin_tbl WHERE username=:username";
	$query= $db->prepare($sql);
	$query-> bindParam(':username',$username, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){
		echo "<span style='color:red; font-size:12px;'> Username already exist.</span>";
		echo "<script>$('#registerBtn').prop('disabled',true);</script>";
	} else{
		$sql_2 ="SELECT username FROM users WHERE username=:username";
		$query_2= $db->prepare($sql_2);
		$query_2-> bindParam(':username',$username, PDO::PARAM_STR);
		$query_2-> execute();
		$results_2 = $query_2 -> fetchAll(PDO::FETCH_OBJ);
		if ($query_2->rowCount() > 0) {
			echo "<span style='color:red; font-size:12px;'> Username already exist.</span>";
			echo "<script>$('#registerBtn').prop('disabled',true);</script>";
		}else{
			echo "<script>$('#registerBtn').prop('disabled',false);</script>";
		}
	} 
}

?>