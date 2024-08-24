<?php
include "../../connection.php";
session_start();
$query="select * from tbl_cart where userid=".$_SESSION["userid"]." and status=1";
$result=mysqli_query($conn,$query);
$amount=$_POST["amount"];
$cartid=0;
$orderid=0;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $cartid=$row["id"];
    }
}
else
{
    echo "nocart";
}
if($_POST["mode"]=="cash")
{
    $query="insert into tbl_order(cartid,amount,couponid,status,addressid) values(".$cartid.",'".$amount."',NULL,'o',".$_POST["address"].");";
    $result1=mysqli_query($conn,$query);
    $orderid=mysqli_insert_id($conn);
    $query="update tbl_cart set status=0 where id=".$cartid;
    $result2=mysqli_query($conn,$query);
    $query="insert into tbl_payment(orderid,payment_mode) values('".$orderid."','c')";
    echo mysqli_query($conn,$query);
}
else
{
    $query="insert into tbl_order(cartid,amount,couponid,status,addressid) values(".$cartid.",'".$amount."',NULL,'o',1);";
    $result1=mysqli_query($conn,$query);
    $orderid=mysqli_insert_id($conn);
    $query="update tbl_cart set status=0 where id=".$cartid;
    $result2=mysqli_query($conn,$query);
    $query="insert into tbl_payment(orderid,payment_mode,Transcationid) values('".$orderid."','o','".$_POST["transcationid"]."')";
    echo mysqli_query($conn,$query);
}
?>