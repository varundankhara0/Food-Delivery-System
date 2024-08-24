<?php
    require "../../connection.php";
    $query="update tbl_user set password=?,reset_token=null,reset_token_expires_at=null where id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("si",md5($_POST["pass"]),$_POST["id"]);
    $stmt->execute();
    if($conn->affected_rows>0)
    {
        echo true;
    }
    else
    {
        echo false;
    }
?>