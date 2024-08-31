<?php 
include "../../connection.php";
$query="update tbl_restaurant set status=".$_POST["status"]." where id=".$_POST["id"];
echo mysqli_query($conn,$query);
?>