<?php 
include('../include/db.php');

if(!empty($_POST["id"])) {
	
	$id = $_POST["id"];
	
	$sql ="SELECT * FROM product_type WHERE id=:id LIMIT 1";
	$query= $db->prepare($sql);
	$query-> bindParam(':id',$id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 
		foreach($results as $result){
	?> 

		<form action="" method="post">
			<input type="hidden" name="productType_id" value="<?php echo($result->id); ?>">
            <div class="col-12 col-md-12">
                <label for="pro_type" class=" form-control-label">Product Type:</label>
                <input type="text" id="pro_type" name="pro_type" placeholder="Type..." value="<?php echo($result->pro_type); ?>"  class="form-control" required>
            </div><br>
            <div class="modal-footer">
            <button type="submit" name="updateProTypeBtn" id="updateProTypeBtn" class="btn btn-primary">Submit</button>
          </div>
        </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this product type. Refresh the page and try again.</h4>
	<?php } 
}

?>