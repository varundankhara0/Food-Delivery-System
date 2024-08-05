<?php
session_start();

$item = $_POST["itemID"];
$query="select cartid from tbl_cart where userid=".$_SESSION["userid"]." and status=1 limit 1";
$result=mysqli_query($conn,$query);
$cartid=0;
if($result->num_rows > 0){  
    while($row=$result->fetch_assoc()){
        $cartid=$row["id"];
        $query="select * from tbl_order_cart";
    }
    
}else
{
    $query="insert into tbl_cart(userid,status)  values('".$_SESSION["userid"]."',1)";
    $result1=mysqli_query($conn,$query);
    $query="select cartid from tbl_cart where userid=".$_SESSION["userid"]." and status=1 limit 1"; 
    $result=mysqli_query($conn,$query); 
    if($result->num_rows > 0){  
        while($row=$result->fetch_assoc()){
            $cartid=$row["id"];
        }
    }
}
?>