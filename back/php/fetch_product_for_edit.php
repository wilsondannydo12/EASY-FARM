<?php 
include('../include/db.php');

if(!empty($_POST["id"])) {
	
	$id = $_POST["id"];
	
	$sql ="SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor WHERE product_tbl.id=:id LIMIT 1";
	$query= $db->prepare($sql);
	$query-> bindParam(':id',$id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0){ 
		foreach($results as $result){
	?> 

		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="product_id" value="<?php echo($result->id); ?>">
	          <div class="row">
	            <div class="mb-3 col-md-9 mb-3">
	              <label for="firstname" class="form-label">Product Image</label>
	              <input type="file" class="form-control" name="productImage" id="productImage" onchange="document.getElementById('previewProductImage').src = window.URL.createObjectURL(this.files[0]); check_profileImg_ext(this.value);">
	            </div>
	            <div class="col-md-3">
	                <img id="previewProductImage" class="profile-preview-img" src="<?php echo(BASE_LINK); ?>/<?php echo($result->image); ?>" alt="Preview Will Show Here" style="" />
	            </div>
	          
	            <div class="col-12 col-md-12 mb-3">
	                <label for="product_name" class=" form-control-label">Product Name:</label>
	                <input type="text" id="product_name" name="product_name" placeholder="product name..."  class="form-control" value="<?php echo($result->product_name); ?>" required>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	                <label for="sku" class=" form-control-label">SKU:</label>
	                <input type="text" id="sku" name="sku" placeholder="SKU..."  class="form-control" value="<?php echo($result->sku); ?>" required>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	                <label for="product_type" class=" form-control-label">Product Type:</label>
	                <select class="form-control" name="product_type" id="product_type" required>
	                	<option value="<?php echo $result->product_type;?>"><?php echo  $result->pro_type;?></option>
	                    <?php 
	                        $product_type_sql=$db->query("SELECT * FROM product_type WHERE status='active'");
	                        $pro_row_data = $product_type_sql->fetchAll(PDO::FETCH_OBJ);
	                         foreach($pro_row_data as $pro_data){
	                         	if ($result->product_type == $pro_data->id) {
	                         		continue;
	                         	}else{ ?>
	                         		<option value="<?php echo $pro_data->id;?>"><?php echo  $pro_data->pro_type;?></option>
	                         	<?php } } ?>
	                </select>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	                <label for="shop" class=" form-control-label">Shop:</label>
	                <select class="form-control" name="shop" id="shop" required>
	                	<option value="<?php echo $result->shop;?>"><?php echo  $result->shop_name;?></option>
	                    <?php 
	                        $shop_sql=$db->query("SELECT * FROM shop WHERE status='active'");
	                        $shop_row_data = $shop_sql->fetchAll(PDO::FETCH_OBJ);
	                         foreach($shop_row_data as $shop_data){
	                         	if ($shop_data->id == $result->shop) {
	                         		continue;
	                         	}else{ ?>
	                         		<option value="<?php echo $shop_data->id;?>"><?php echo  $shop_data->shop_name;?></option>
	                         	<?php } } ?>
	                </select>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	                <label for="old_price" class=" form-control-label">Old Price:</label>
	                <input type="text" id="old_price" name="old_price" placeholder="Old Price..."  class="form-control" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo(number_format($result->old_price, 2)); ?>" required>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	                <label for="new_price" class=" form-control-label">New Price:</label>
	                <input type="text" id="new_price" name="new_price" placeholder="New Price..."  class="form-control" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo(number_format($result->new_price, 2)); ?>" required>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	              <label for="availability" class=" form-control-label">Availability:</label>
	              <select class="form-control" name="availability" id="availability" required>
	                <option value="available" <?php echo isset($result->availability) && $result->availability == "available" ? 'selected' : '' ?>>In Stock</option>
	                <option value="not available" <?php echo isset($result->availability) && $result->availability == "not available" ? 'selected' : '' ?>>Out of Stock</option>
	              </select>
	            </div>
	            <div class="col-12 col-md-12 mb-3">
	              <label for="description" class=" form-control-label">Description:</label>
	              <textarea class="form-control" name="description" id="description" required><?php echo($result->description); ?></textarea>
	            </div>
	          </div>
	        </div>
	        <div class="modal-footer">
	        <button type="submit" name="updateProductBtn" id="updateProductBtn" class="btn btn-primary">Submit</button>
	      </div>
	    </form>

	<?php } } else{  ?>
		<h4 style="color: red; text-align: center;">Oops! No detail found for this product type. Refresh the page and try again.</h4>
	<?php } 
}

?>