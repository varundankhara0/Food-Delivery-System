<?php 
    include "../../connection.php";
    $id=$_POST["id"];
    $status=$_POST["status"];
    $query="update tbl_category set status='".$status."' where id=".$id;
    echo mysqli_query($conn,$query);
?>