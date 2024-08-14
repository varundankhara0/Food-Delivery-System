<?php
session_start();
include "../../connection.php";

$item = $_POST["fooditemid"];

// Fetch the restaurant ID of the new food item
$query = "SELECT restaurantID FROM tbl_fooditem WHERE id = ".$item;
$result = mysqli_query($conn, $query);
$newItemRestaurantId = 0;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newItemRestaurantId = $row["restaurantID"];
} else {
    echo "Invalid food item.";
    exit;
}

// Check if there is an active cart for the user
$query = "SELECT id FROM tbl_cart WHERE userid = ".$_SESSION["userid"]." AND status = 1 LIMIT 1";
$result = mysqli_query($conn, $query);
$cartid = 0;
$existingRestaurantId = null;

if ($result->num_rows > 0) {  
    while ($row = $result->fetch_assoc()) {
        $cartid = $row["id"];
        
        // Fetch the restaurant ID of the existing food items in the cart
        $query = "SELECT DISTINCT f.restaurantID
                  FROM tbl_order_cart AS odc 
                  JOIN tbl_fooditem AS f ON odc.fooditemid = f.id 
                  WHERE odc.cartid = ".$cartid;
        $result1 = mysqli_query($conn, $query);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $existingRestaurantId = $row1["restaurantID"];
        }

        // Check if the new item belongs to a different restaurant
        if ($existingRestaurantId != $newItemRestaurantId) {
            echo "New restaurant item detected.";
            exit;
        }

        echo insert($cartid, $conn, $item);
    }
} else {
    // Create a new cart if none exists
    $query = "INSERT INTO tbl_cart (userid, status) VALUES ('".$_SESSION["userid"]."', 1)";
    $result1 = mysqli_query($conn, $query);

    // Fetch the new cart ID
    $query = "SELECT id FROM tbl_cart WHERE userid = ".$_SESSION["userid"]." AND status = 1 LIMIT 1";
    $result2 = mysqli_query($conn, $query);
    if ($result2->num_rows > 0) {  
        while ($row = $result2->fetch_assoc()) {
            $cartid = $row["id"];
            echo insert($cartid, $conn, $item);
        }
    }
}

function insert($cartid, $conn, $itemid) {
    $query = "SELECT odc.fooditemid, odc.quantity 
              FROM tbl_order_cart AS odc 
              JOIN tbl_cart AS cart ON cart.id = odc.cartid 
              WHERE odc.cartid = ".$cartid." AND odc.fooditemid = ".$itemid." AND cart.status = 1";
    $result1 = mysqli_query($conn, $query);

    if (!$result1->num_rows > 0) {
        $query = "INSERT INTO tbl_order_cart (fooditemid, quantity, cartid) 
                  VALUES (".$itemid.", 1, ".$cartid.")";
        $result3 = mysqli_query($conn, $query);
        return $result3 ? true : false;
    } else {
        while ($row1 = $result1->fetch_assoc()) {
            $quantity = intval($row1["quantity"]);
        }
        $query = "UPDATE tbl_order_cart 
                  SET quantity = ".($quantity + 1)." 
                  WHERE cartid = ".$cartid." AND fooditemid = ".$itemid;
        $result3 = mysqli_query($conn, $query);
        return $result3 ? true : false;
    }
}
?>
