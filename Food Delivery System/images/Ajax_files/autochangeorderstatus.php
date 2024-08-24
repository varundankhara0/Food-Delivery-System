<?php
include "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/connection.php";
// Include your database connection

// Set the time limit for unattended orders (in seconds)
$time_limit = 10 * 60; // 10 minutes

// Log file path
$log_file = 'order_status_log.txt';

// Function to write messages to the log file
function writeLog($message, $log_file) {
    $time = date('Y-m-d H:i:s');
    $log_message = "[$time] - $message" . PHP_EOL;
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

try {
    // Query to update orders with status 'o' that haven't been updated in the last 10 minutes
    $query = "
        UPDATE tbl_order 
        SET status = 'dn' 
        WHERE status = 'o' 
        AND UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(date) > $time_limit
    ";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        $affected_rows = mysqli_affected_rows($conn);
        if ($affected_rows > 0) {
            writeLog("Successfully updated $affected_rows order(s) to status 'dn'.", $log_file);
        } else {
            writeLog("No orders needed updating.", $log_file);
        }
    } else {
        throw new Exception("Error updating order statuses: " . mysqli_error($conn));
    }

} catch (Exception $e) {
    writeLog($e->getMessage(), $log_file);
} finally {
    // Close the database connection
    mysqli_close($conn);
}
?>
