<?php 
include "../../connection.php";
$userQuery = "SELECT COUNT(*) as total_users FROM tbl_user";
$userResult = $conn->query($userQuery);
$totalUsers = $userResult->fetch_assoc()['total_users'];

// Fetch total number of delivery men
$deliveryManQuery = "SELECT COUNT(*) as total_delivery_men FROM tbl_delivery_man";
$deliveryManResult = $conn->query($deliveryManQuery);
$totalDeliveryMen = $deliveryManResult->fetch_assoc()['total_delivery_men'];

// Fetch total number of restaurants
$restaurantQuery = "SELECT COUNT(*) as total_restaurants FROM tbl_restaurant";
$restaurantResult = $conn->query($restaurantQuery);
$totalRestaurants = $restaurantResult->fetch_assoc()['total_restaurants'];

// Return data in JSON format
echo json_encode([
    'totalUsers' => $totalUsers,
    'totalDeliveryMen' => $totalDeliveryMen,
    'totalRestaurants' => $totalRestaurants
]);

?>