<?php
    session_start();
    $query="update tbl_user set status=1,accounthash=null where id=".$_POST["id"];
    require "../../connection.php";
    $result=mysqli_query($conn,$query);
    if($conn->affected_rows>0)
    {
        echo true;
    }
    else
    {
        echo false;
    }
    
?>