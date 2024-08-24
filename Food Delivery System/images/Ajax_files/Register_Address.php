<?php 
    session_start();
    include "../../connection.php";
    $flatNo=$_POST["flatno"];
    $address=$_POST["address"]." ".$_POST["landmark"];
    $type=$_POST["type"];
    $area=(int)$_POST["areaid"];
    $status=1;
    $query="insert into tbl_Customer_address(userid,address,areaid,type,status,doorno) values(?,?,?,?,?,?)";
    $stmt= $conn->prepare($query);
$stmt->bind_param("isisis",$_SESSION["userid"],$address,$area,$type,$status,$flatNo);
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