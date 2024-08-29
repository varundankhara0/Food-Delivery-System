<?php
include "../../connection.php";

$status = $_POST['status'];  
$query = "SELECT * FROM tbl_complaint WHERE completionstatus=$status";
$result = mysqli_query($conn, $query);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['role'] = getRole($row['role']); 
        $data[] = $row;
    }
}

echo json_encode($data);

function getRole($roleCode) {
    switch($roleCode) {
        case 'c':
            return 'customer';
        case 'd':
            return 'delivery man';
        case 'r':
        case 'R':
            return 'restaurant';
        default:
            return 'unknown';
    }
}
?>
