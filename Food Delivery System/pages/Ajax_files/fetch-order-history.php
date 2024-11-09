<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include "../../connection.php";

$customerId = $_SESSION['userid']; // Default for testing

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
            o.id AS order_id,
            r.Name AS restaurant_name,
            a.name AS area_name,
            fi.name AS food_name,
            fi.image AS food_image,  -- Adding food item image field
            oc.quantity AS food_quantity,
            fi.price AS item_price,
            o.date AS order_date,
            o.amount AS total_amount,
            o.status AS order_status
        FROM 
            tbl_order o
        JOIN 
            tbl_cart c ON o.cartid = c.id
        JOIN 
            tbl_user u ON c.userid = u.id
        JOIN 
            tbl_order_cart oc ON o.cartid = oc.cartid
        JOIN 
            tbl_fooditem fi ON oc.fooditemid = fi.id
        JOIN 
            tbl_restaurant r ON fi.restaurantID = r.id
        JOIN 
            tbl_area a ON r.areaid = a.id
        WHERE 
            u.id = ?
        ORDER BY 
            o.date DESC";

function convertToWebPath($filesystemPath) {
    $webPath = str_replace('\\', '/', $filesystemPath);
    $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);
    return $webPath;
}

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $conn->error);
}

$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

$currentOrderId = null;
$order_date = null;
$total_amount = null;
$order_status = null;
$delivery_charge = 40; // Set delivery charge

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orderTimestamp = strtotime($row['order_date']);
        $currentTimestamp = time(); // Get current time as a timestamp
         // Calculate the difference in seconds
         $timeDifferenceInSeconds = $currentTimestamp - $orderTimestamp;

         // Convert the difference into minutes
         $minutesDifference = $timeDifferenceInSeconds / 60;
        if ($row['order_id'] !== $currentOrderId) {
            if ($currentOrderId !== null) {
                echo "</div>";
                echo "<p>Order Date: " . date("d M, h:i A", strtotime($order_date)) . "</p>";
                
                // Display delivery charge
                echo "<p>Delivery Charge: ₹" . number_format($delivery_charge, 2) . "</p>";
                
                // Calculate and display total with delivery charge
                $total_with_delivery = $total_amount;
                echo "<p>Total (including Delivery): ₹" . number_format($total_with_delivery, 2) . "</p>";
                if ($minutesDifference < 2 && $minutesDifference >= 0 && in_array($order_status, ['o', 'a'])) {
                    echo "<button class='cancelOrderBtn' onclick=cancelorder(".$row['order_id'].",'".$row['order_status']."')  data-id='{$row['order_id']}'>Cancel Order</button>";
                }
                // Display order status
                $statusText = getOrderStatusText($order_status);
                echo "<p>Status: " . htmlspecialchars($statusText) . "</p>";
                echo "<a href='order-detail.php?order_id=" . htmlspecialchars($currentOrderId) . "'>View Order Details</a>";
  // Check if the order is within 2 minutes for cancellation
//   if ($minutesDifference < 2 && $minutesDifference >= 0 && in_array($row['status'], ['o', 'a'])) {
//     echo "<button class='cancelOrderBtn' onclick=cancelorder(".$row['order_id'].",'".$row['order_status']."')  data-id='{$row['id']}'>Cancel Order</button>";
// }   
// Debugging info
       
                echo "</div>";
                
            }

            $currentOrderId = $row['order_id'];
            echo "<div class='order-card'>";
            echo "<h1><strong>Order Number: #" . htmlspecialchars($currentOrderId) . "</strong></h1>";
              // Display food image for the order (using only the first food item image per order)
              if (!empty($row['food_image'])) {
                echo "<img src='" . htmlspecialchars(convertToWebPath($row['food_image'])) . "' alt='Food Image' style='width:100px; height:auto;'>";
            }

            
            // Display restaurant and area information
            echo "<h3>" . htmlspecialchars($row['restaurant_name']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['area_name']) . "</p>";

            echo "<div class='items-section'>";
        }

        
        // Check if the order is within 2 minutes for cancellation
        if ($minutesDifference < 2 && $minutesDifference >= 0 && in_array($row['order_status'], ['o', 'a'])) {
            echo "<button class='cancelOrderBtn' onclick=cancelorder(".$row['order_id'].",'".$row['order_status']."')  data-id='{$row['order_id']}'>Cancel Order</button>";
        }
        

        // Display each food item in the order
        echo "<p>" . htmlspecialchars($row['food_quantity']) . " x " . htmlspecialchars($row['food_name']) . " - ₹" . htmlspecialchars($row['item_price']) . "</p>";
        $order_date = $row['order_date'];
        $total_amount = $row['total_amount'];
        $order_status = $row['order_status']; // Store the last order status
    }
    if ($minutesDifference < 2 && $minutesDifference >= 0 && in_array($order_status, ['o', 'a'])) {
        echo "<button class='cancelOrderBtn' onclick=cancelorder(".$row['order_id'].",'".$row['order_status']."')  data-id='{$row['order_id']}'>Cancel Order</button>";
    }
    echo "</div>";
    echo "<p>Order Date: " . date("d M, h:i A", strtotime($order_date)) . "</p>";
    
    // Display delivery charge for the last order
    echo "<p>Delivery Charge: ₹" . number_format($delivery_charge, 2) . "</p>";
    
    // Calculate and display total with delivery charge for the last order
    $total_with_delivery = $total_amount;
    echo "<p>Total (including Delivery): ₹" . number_format($total_with_delivery, 2) . "</p>";

    // Final status for the last order
    $statusText = getOrderStatusText($order_status);
    echo "<p>Status: " . htmlspecialchars($statusText) . "</p>";
    echo "<a href='order-detail.php?order_id=" . htmlspecialchars($currentOrderId) . "'>View Order Details</a>";
//     if ($minutesDifference < 2 && $minutesDifference >= 0 && in_array($row['order_status'], ['o', 'a'])) {
//     echo "<button class='cancelOrderBtn' onclick=cancelorder(".$row['order_id'].",'".$row['order_status']."')  data-id='{$row['id']}'>Cancel Order</button>";
// }   
    echo "</div>";
} else {
    echo "<p>No orders found.</p>";
}

$stmt->close();
$conn->close();

function getOrderStatusText($status) {
    switch ($status) {
        case 'dn': return "Did Not Attend";
        case 'o': return "Ordered";
        case 'rc': return "Restaurant Canceled";
        case 'da': return "Deliveryman Assigned";
        case 'cc': return "Customer Canceled";
        case 'dc': return "Deliveryman Canceled";
        case 'a': return "Order Accepted by Restaurant";
        case 'oc': return "Ready to Collect";
        case 'dw': return "Deliveryman Collected and On the Way";
        case 'od': return "Order Delivered";
        default: return "Unknown Status";
    }
}
?>
