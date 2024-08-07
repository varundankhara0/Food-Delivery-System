<?php
session_start();
include "../../connection.php";
$item = $_POST["fooditemid"];
$query="select id from tbl_cart where userid=".$_SESSION["userid"]." and status=1 limit 1";
$result=mysqli_query($conn,$query);
$quantity=1;
$cartid=0;
if($result->num_rows > 0){  
    while($row=$result->fetch_assoc()){
        $cartid=$row["id"];
        echo insert($cartid,$conn,$item);
    }
    
}
else
{
    $query="insert into tbl_cart(userid,status)  values('".$_SESSION["userid"]."',1)";
    $result1=mysqli_query($conn,$query);
    $query="select id from tbl_cart where userid=".$_SESSION["userid"]." and status=1 limit 1"; 
    $result2=mysqli_query($conn,$query); 
    if($result2->num_rows > 0){  
        while($row=$result2->fetch_assoc()){
            $cartid=$row["id"];
            echo insert($cartid,$conn,$item);
        }
    }
}
function insert($cartid,$conn,$itemid)
{
    $query="select odc.fooditemid,odc.quantity from tbl_order_cart as odc join tbl_cart as cart on cart.id=odc.cartid where odc.cartid=".$cartid." and odc.fooditemid=".$itemid." and cart.status=1";
    $result1=mysqli_query($conn,$query);
    if(!$result1->num_rows>0)
    {
        $query="insert into tbl_order_cart(fooditemid,quantity,cartid) values(".$itemid.",1,".$cartid.")";
        $result3=mysqli_query($conn,$query);
        if($result3==true)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    else
    {
        while($row1=$result1->fetch_assoc())
        {
            $quantity=intval($row1["quantity"]);
        }
        $query="update tbl_order_cart set quantity=".($quantity+1)." where cartid=".$cartid." and fooditemid=".$itemid;
        $result3=mysqli_query($conn,$query);
        if($result3==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>