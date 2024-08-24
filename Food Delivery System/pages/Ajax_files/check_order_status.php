<?php
include "../../connection.php";
header('Content-Type: application/json');

// Get the excluded orders from the request
$excludedOrders = isset($_GET['excludedOrders']) ? $_GET['excludedOrders'] : [];

// Convert the excluded orders array to a comma-separated string for SQL
$excludedOrdersList = implode(',', array_map('intval', $excludedOrders));

// Prepare the SQL query
$sql = "SELECT * FROM tbl_order WHERE status = 'a'";

// If there are excluded orders, add a condition to the query
if (!empty($excludedOrdersList)) {
    $sql .= " AND id NOT IN ($excludedOrdersList)";
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
