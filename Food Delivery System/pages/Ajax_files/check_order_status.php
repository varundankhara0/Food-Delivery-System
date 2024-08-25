<?php
include "../../connection.php";
header('Content-Type: application/json');
session_start();
// Get the excluded orders from the request
$excludedOrders = isset($_GET['excludedOrders']) ? $_GET['excludedOrders'] : [];

// Convert the excluded orders array to a comma-separated string for SQL
$excludedOrdersList = implode(',', array_map('intval', $excludedOrders));
$query="select * from tbl_delivery_man where id=".$_SESSION["deliverymanid"];
$addressid=0;
$result5=mysqli_query($conn,$query);
while($row=$result5->fetch_array())
{
    $addressid=$row["currentareaid"];
}
// Prepare the SQL query
$sql = "SELECT o.id,o.cartid,o.amount,o.couponid,o.addressid,o.status,o.date FROM tbl_order as o Join tbl_customer_address as ca on ca.id=o.addressid Join tbl_area as area on area.id=ca.areaid WHERE o.status = 'a' and area.id=14";
// $sql="select * from tbl_order where status='a'";
// If there are excluded orders, add a condition to the query
if (!empty($excludedOrdersList)) {
    $sql .= " AND o.id NOT IN ($excludedOrdersList)";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$response = ['newOrder' => false, 'orderStatusChanged' => false];

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
    
    // Check if the order is still available for acceptance
    if ($order['status'] == 'a') {
        $response['newOrder'] = true;
        $response['orderDetails'] = "Order ID: " . $order['id'] . " - Amount: " . $order['amount'];
        $response['orderid'] = $order['id'];
    } else {
        
        $response['newOrder'] = false;
        // If the status is no longer 'a', the status has changed (possibly accepted by someone else)
        $response['orderStatusChanged'] = true;
    }
}

echo json_encode($response);
?>
