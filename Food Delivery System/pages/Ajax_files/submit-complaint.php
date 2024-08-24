<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $complaint = mysqli_real_escape_string($conn, $_POST['complaint']);

    // Insert complaint into the database
    $sql = "INSERT INTO complaints (order_id, complaint, status) VALUES ('$order_id', '$complaint', 'pending')";

    if (mysqli_query($conn, $sql)) {
        echo "Complaint submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>