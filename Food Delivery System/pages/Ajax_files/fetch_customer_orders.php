<?php
include "../../connection.php";
session_start();
date_default_timezone_set('Asia/Kolkata');
$query = "SELECT o.id, o.date AS order_time, o.status, o.amount 
          FROM tbl_order AS o 
          JOIN tbl_cart AS cart ON cart.id = o.cartid 
          JOIN tbl_user AS user ON user.id = cart.userid 
          WHERE user.id = " . $_SESSION['userid'];

$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert order_time and current time to timestamps
        $orderTimestamp = strtotime($row['order_time']);
        $currentTimestamp = time(); // Get current time as a timestamp

        // Calculate the difference in seconds
        $timeDifferenceInSeconds = $currentTimestamp - $orderTimestamp;

        // Convert the difference into minutes
        $minutesDifference = $timeDifferenceInSeconds / 60;

        // Debugging info
        // echo "<pre>";
        // echo "Order Timestamp: " . date('Y-m-d H:i:s', $orderTimestamp) . "<br>";
        // echo "Current Timestamp: " . date('Y-m-d H:i:s', $currentTimestamp) . "<br>";
        // echo "Time Difference in Seconds: " . $timeDifferenceInSeconds . "<br>";
        // echo "Minutes Difference: " . $minutesDifference . "<br>";
        // echo "</pre>";

        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['order_time']}</td>
                <td>{$row['amount']}</td>
                <td>";

        // Display order status
        switch ($row['status']) {
            case 'o': echo "Ordered"; break;
            case 'a': echo "Preparing"; break;
            case 'da': echo "Almost Done"; break;
            case 'dn': echo "Cancelled"; break;
            case 'rc': echo "Cancelled"; break;
            case 'cc': echo "Cancelled"; break;
            case 'dc': echo "Cancelled"; break;
            case 'dw': echo "Out for Delivery"; break;
            case 'od': echo "Delivered"; break;
            default: echo "Unknown"; break;
        }

        echo "</td><td>";

        // Check if the order is within 2 minutes for cancellation
        if ($minutesDifference < 2 && $minutesDifference >= 0 && in_array($row['status'], ['o', 'a'])) {
            echo "<button class='cancelOrderBtn' onclick=cancelorder(".$row['id'].",'".$row['status']."')  data-id='{$row['id']}'>Cancel Order</button>";
        }

        echo "</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>No orders found</td></tr>";
}
?>
