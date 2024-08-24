<?php
session_start();
include "../../connection.php";

$item = $_POST["fooditemid"];

// Clear existing cart items
$query = "DELETE FROM tbl_order_cart WHERE cartid IN (SELECT id FROM tbl_cart WHERE userid=".$_SESSION["userid"]." AND status=1)";
mysqli_query($conn, $query);

// Update cart's restaurant ID to the new restaurant
$query = "SELECT RestaurantID FROM tbl_fooditem WHERE id = ".$item;
$result = mysqli_query($conn, $query);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $restaurantID = $row['RestaurantID'];
    
    
}

// Add the new item to the cart
$query = "SELECT id FROM tbl_cart WHERE userid=".$_SESSION["userid"]." AND status=1 LIMIT 1";
$result = mysqli_query($conn, $query);
$cartid = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cartid = $row["id"];
    echo insert($cartid, $conn, $item);
} else {
    echo "false";
}

function insert($cartid, $conn, $itemid) {
    $query = "INSERT INTO tbl_order_cart(fooditemid, quantity, cartid) VALUES(".$itemid.", 1, ".$cartid.")";
    $result = mysqli_query($conn, $query);
    
    return $result ? "true" : "false";
}
?>
