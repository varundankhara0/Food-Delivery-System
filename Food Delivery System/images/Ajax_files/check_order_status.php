<?php
include "../../connection.php";

// Check if any order is ready
$sql = "SELECT * FROM tbl_order WHERE status = 'a' AND deliverymanid = ?"; // Adjust query as needed
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $deliverymanId);
$deliverymanId = $_SESSION['deliveryman_id']; // Assume the deliveryman ID is stored in session
$stmt->execute();
$result = $stmt->get_result();

$response = ['newOrder' => false];

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
    $response['newOrder'] = true;
    $response['orderDetails'] = "Order ID: " . $order['id'] . " - Amount: " . $order['amount'];
}

echo json_encode($response);
?>
