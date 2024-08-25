<?php
include "../../connection.php";

$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE Tbl_complaint SET status = '$status' WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'success';
} else {
    echo mysqli_error($conn);
}
?>
