<?php 
/*add----------------------------------*/
if (isset($_POST['submitBookingBtn'])) {
            
  $vehicle_id = $_POST['vehicle_id'];
  $ord_firstname = $_POST['ord_firstname'];
  $ord_lastname = $_POST['ord_lastname'];
  $ord_phone = $_POST['ord_phone'];
  $ord_location = $_POST['ord_location'];
  $from_location = $_POST['from_location'];
  $to_location = $_POST['to_location'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $order_date = date("Y-m-d");
  $order_time = date("H:i:s");
  $end_trip_date = date("Y-m-d H:i:s"); 
  $customer = $_SESSION['transp_customer_id'];
  $order_no = "TRP".orderCodeGen(4, "0123456789");

  $sql="INSERT INTO transport_order(vehicle_id, order_no, customer, ord_firstname, ord_lastname, ord_phone, ord_location, from_location, to_location, start_date, end_date, order_date, order_time, end_trip_date) VALUES(:vehicle_id, :order_no, :customer, :ord_firstname, :ord_lastname, :ord_phone, :ord_location, :from_location, :to_location, :start_date, :end_date, :order_date, :order_time, :end_trip_date)";
  $query = $db->prepare($sql);
  $query->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_STR);
  $query->bindParam(':order_no',$order_no,PDO::PARAM_STR);
  $query->bindParam(':customer',$customer,PDO::PARAM_STR);
  $query->bindParam(':ord_firstname',$ord_firstname,PDO::PARAM_STR);
  $query->bindParam(':ord_lastname',$ord_lastname,PDO::PARAM_STR);
  $query->bindParam(':ord_phone',$ord_phone,PDO::PARAM_STR);
  $query->bindParam(':ord_location',$ord_location,PDO::PARAM_STR);
  $query->bindParam(':from_location',$from_location,PDO::PARAM_STR);
  $query->bindParam(':to_location',$to_location,PDO::PARAM_STR);
  $query->bindParam(':start_date',$start_date,PDO::PARAM_STR);
  $query->bindParam(':end_date',$end_date,PDO::PARAM_STR);
  $query->bindParam(':order_date',$order_date,PDO::PARAM_STR);
  $query->bindParam(':order_time',$order_time,PDO::PARAM_STR);
  $query->bindParam(':end_trip_date',$end_trip_date,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $db->lastInsertId();
  if(!empty($lastInsertId)){
    echo "<script>
    alert('Order place successfully. Your order number is ".$order_no.". You will receive notification shortly.');
    </script>";
  }else { 
    echo "<script>
    alert('Oops..., something went wrong.');
    </script>";
  }
}
  