<?php 
include "../../connection.php";
$query="update tbl_order set status='".$_POST["status"]."' where id=".$_POST["orderid"]."";
echo mysqli_query($conn,$query);
?>