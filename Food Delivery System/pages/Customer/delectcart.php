<?php 
include "../../connection.php";
$id = $_POST["id"];
$sql = "DELETE FROM tbl_order_cart WHERE id = '$id'";
$result=mysqli_query($conn,$query);

    if ($stmt) {      
            header('Location: cart.php');

    } 

?>
