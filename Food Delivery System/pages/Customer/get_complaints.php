<?php
include "../../connection.php";

$query = "SELECT * FROM Tbl_complaint";
$result = mysqli_query($conn, $query);

$complaints = [];
while ($row = mysqli_fetch_assoc($result)) {
    $complaints[] = $row;
}

echo json_encode($complaints);
?>