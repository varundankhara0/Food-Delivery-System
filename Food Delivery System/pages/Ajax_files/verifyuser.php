<?php
    session_start();
    $query="update tbl_user set status=".$_POST["status"]." where id=".$_SESSION["userid"];
    require "../../connection.php";
    $result=mysqli_query($conn,$query);
?>