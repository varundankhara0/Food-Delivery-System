<?php
include "../../connection.php";
$id=$_POST["id"];
$status=$_POST["status"];
$query="update tbl_complaint set completionstatus='".$status."' where id=".$id;
echo mysqli_query($conn,$query);
?>