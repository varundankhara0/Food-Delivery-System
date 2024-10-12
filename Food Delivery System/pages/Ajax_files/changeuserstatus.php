<?php 
    include '../../connection.php';
    $query="update tbl_user set status='".$_POST["status"]."' where id=".$_POST["id"];
    echo mysqli_query($conn,$query);
?>