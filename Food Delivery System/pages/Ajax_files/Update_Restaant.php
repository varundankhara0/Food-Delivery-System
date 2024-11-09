<?php
include "../../connection.php"; // Include the database connection

session_start(); // Start session

if (!isset($_SESSION['userid'])) {
    echo "Session expired. Please log in again.";
    exit;
}

$restaurant_id = $_SESSION['userid']; // Get restaurant ID from session

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form inputs
    $name = $_POST['name'];
    // Assuming this input exists
    $address = $_POST['address'];
    $contact = $_POST['phoneno'];
    // $gstno = $_POST['gstno'];
    $licenseno = $_POST['email'];
    $opening_time = $_POST['opening_time'];
    $closing_time = $_POST['closing_time'];
     // Assuming this input exists
     // Assuming this input exists

    // Initialize license image path as NULL
    

    // Handle license image upload if provided
    if (isset($_FILES['Licesnseimage']) && $_FILES['Licesnseimage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../uploads/';
        $fileName = basename($_FILES['Licesnseimage']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Check file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array(mime_content_type($_FILES['Licesnseimage']['tmp_name']), $allowedTypes)) {
            // Move uploaded file
            if (move_uploaded_file($_FILES['Licesnseimage']['tmp_name'], $targetFilePath)) {
                $licenseImagePath = str_replace('../../', '/', $targetFilePath); // Convert to web path
            } else {
                echo "Error uploading the license image.";
                exit;
            }
        } else {
            echo "Invalid file type for license image.";
            exit;
        }
    }

    // Prepare the SQL query
    $query = "
        UPDATE tbl_restaurant 
        SET 
            Name = '$name', 
            
            address =' $address', 
            Contact =' $contact', 
            Licesnseno=' $licenseno',
            
            OpeningTime = '$opening_time', 
            ClosingTime = '$closing_time' 
           
        WHERE id = ".$_SESSION['restaurantid']."
    ";

    // Create a prepared statement
    echo mysqli_query($conn,$query);
    // echo $query;
    // Bind parameters
    

    // Execute the statement and check for success
    

    // Close the statement and connection
    // $stmt->close();
    $conn->close();
}
?>
