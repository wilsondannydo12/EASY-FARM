<!-- My Orders -->
<div class="tab-pane fade h-100" id="orders">
    <div class="orders-card mt-0 h-100">    
        <div class="top-sec d-flex-justify-center justify-content-between mb-4">
            <h2 class="mb-0">My Orders</h2>
        </div>

        <div class="table-bottom-brd table-responsive">
            <table class="table align-middle text-center order-table">
                <thead>
                    <tr class="table-head text-nowrap">
                        <th scope="col">Image</th>
                        <th scope="col">Order No</th>
                        <th scope="col">Product Details</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $cur_customer = $_SESSION['customer_id'];
                    $cus_shipping_qry = $db->prepare("SELECT * FROM order_shipping WHERE customer='$cur_customer'");
                    $cus_shipping_qry->execute();
                    $cus_shipping_results=$cus_shipping_qry->fetchAll(PDO::FETCH_OBJ);
                    foreach($cus_shipping_results as $cus_shipping_result){
                        $shipping_id = $cus_shipping_result->id;
                        $order_no = $cus_shipping_result->order_no;
                        $order_status = $cus_shipping_result->status;


                    $cus_orders_qry = $db->prepare("SELECT order_tbl.*, product_tbl.id as pro_id, product_tbl.product_name, product_tbl.image FROM order_tbl INNER JOIN product_tbl ON product_tbl.id=order_tbl.product_id WHERE order_tbl.order_id='$shipping_id' AND order_tbl.order_no='$order_no'");
                    $cus_orders_qry->execute();
                    $cus_orders_results=$cus_orders_qry->fetchAll(PDO::FETCH_OBJ);
                    foreach($cus_orders_results as $cus_orders_result){
                        $totalPrice_per_product = $cus_orders_result->price * $cus_orders_result->quantity;
    
                    ?>
                    <tr>
                        <td><img class="blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo $cus_orders_result->image; ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo $cus_orders_result->image; ?>" width="50" alt="product" title="product" /></td>
                        <td><span class="id">#<?php echo $cus_orders_result->order_no; ?></span></td>
                        <td><span class="name"><?php echo $cus_orders_result->product_name; ?></span></td>
                        <td><span class="id"><?php echo $cus_orders_result->quantity; ?></span></td>
                        <td><span class="price fw-500">GH&#8373;<?php echo number_format($cus_orders_result->price,2); ?></span></td>
                        <td><span class="price fw-500">GH&#8373;<?php echo number_format($totalPrice_per_product,2); ?></span></td>
                        <td><span class="badge rounded-pill bg-success custom-badge"><?php echo ucwords($order_status); ?></span></td>
                        <td><a href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo $cus_orders_result->pro_id; ?>/<?php echo $cus_orders_result->product_name; ?>" class="view"><i class="icon anm anm-eye btn-link fs-6"></i></a></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>                                               
    </div>
</div>
<!-- End My Orders -->