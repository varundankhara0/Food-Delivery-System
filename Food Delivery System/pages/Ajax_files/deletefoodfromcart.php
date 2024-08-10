<?php 
session_start();

include "../../connection.php";
$id = $_POST["id"];
$sql = "DELETE FROM tbl_order_cart WHERE id = ".$id."";
echo mysqli_query($conn,$sql);
?>