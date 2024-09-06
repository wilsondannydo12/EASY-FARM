<!-- My Orders -->
<div class="tab-pane fade h-100" id="awaiting_payment">
    <div class="orders-card mt-0 h-100">    
        <div class="top-sec d-flex-justify-center justify-content-between mb-4">
            <h2 class="mb-0">Awaiting Payment</h2>
        </div>

        <div class="table-bottom-brd table-responsive">
            <table class="table align-middle text-center order-table">
                <thead>
                    <tr class="table-head text-nowrap">
                        <th scope="col">Order No</th>
                        <th scope="col">Total</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Transaction Status</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Issue Pay</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $grossPayment = 0;
                    $cur_customer = $_SESSION['customer_id'];
                    $cus_shipping_qry = $db->prepare("SELECT * FROM order_shipping WHERE customer='$cur_customer' AND (payment='awaiting' || payment='in process')");
                    $cus_shipping_qry->execute();
                    
                    if ($cus_shipping_qry->rowCount() > 0) {
                        $cus_shipping_results=$cus_shipping_qry->fetchAll(PDO::FETCH_OBJ);
                        foreach($cus_shipping_results as $cus_shipping_result){
                            $shipping_id = $cus_shipping_result->id;
                            $order_no = $cus_shipping_result->order_no;
                            $payment_status = $cus_shipping_result->payment;
                            if (empty($cus_shipping_result->transaction_id)) {
                                $transaction_id = "...";
                                $transaction_status = "Awaiting";
                                $badge = "bg-danger";
                                $hide_paymentBtn = "";
                            }else{
                                $transaction_id = $cus_shipping_result->transaction_id;
                                $transaction_status = "Received";
                                $badge = "bg-success";
                                $hide_paymentBtn = "hidden";
                            }


                        $cus_orders_qry = $db->prepare("SELECT order_tbl.*, product_tbl.product_name, product_tbl.image FROM order_tbl INNER JOIN product_tbl ON product_tbl.id=order_tbl.product_id WHERE order_tbl.order_id='$shipping_id' AND order_tbl.order_no='$order_no'");
                        $cus_orders_qry->execute();
                        $cus_orders_results=$cus_orders_qry->fetchAll(PDO::FETCH_OBJ);
                        foreach($cus_orders_results as $cus_orders_result){
                            $grossPayment += $cus_orders_result->price * $cus_orders_result->quantity;
                        }
    
                    ?>
                    <tr>
                        <td><span class="id">#<?php echo $order_no; ?></span></td>
                        <td><span class="price fw-500">GH&#8373;<?php echo number_format($grossPayment,2); ?></span></td>
                        <td><span class="id"><?php echo $transaction_id; ?></span></td>
                        <td><span class="badge rounded-pill <?php echo($badge); ?> custom-badge"><?php echo ucfirst($transaction_status); ?></span></td>
                        <td><span class="badge rounded-pill bg-danger custom-badge"><?php echo ucfirst($payment_status); ?></span></td>
                        <td><a href="javascript:;" <?php echo $hide_paymentBtn; ?> onclick="getOrderNo('<?php echo $order_no; ?>');" class="view" data-bs-toggle="modal" data-bs-target="#awaitingPaymentModal"><i class="icon anm anm-money btn-link fs-6"></i></a></td>
                    </tr>
                <?php } }else{ ?>
                    <tr>
                        <td class="col">
                            <span style="color: red; font-size: 15px; text-align: center;">No data found.</span>
                        </td>
                    </tr>
               <?php } ?>
                </tbody>
            </table>
        </div>                                               
    </div>
</div>
<!-- End My Orders -->