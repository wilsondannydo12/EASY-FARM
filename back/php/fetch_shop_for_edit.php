<?php 
include('../include/db.php');

if(!empty($_POST["id"])) {
	
	$id = $_POST["id"];
	
	$sql ="SELECT * FROM shop WHERE id=:id LIMIT 1";
	$query= $db->prepare($sql);
	$query-> bindParam(':id',$id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 
		foreach($results as $result){
	?> 

		<form action="" method="post">
			<input type="hidden" name="shopId" value="<?php echo($result->id); ?>">
            <div class="col-12 col-md-12">
                <label for="shop" class=" form-control-label">Shop</label>
                <input type="text" id="shop" name="shop" placeholder="shop..." value="<?php echo($result->shop_name); ?>"  class="form-control" required>
            </div><br>
            <div class="modal-footer">
            <button type="submit" name="updateShopBtn" id="updateShopBtn" class="btn btn-primary">Submit</button>
          </div>
        </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this shop. Refresh the page and try again.</h4>
	<?php } 
}

?>