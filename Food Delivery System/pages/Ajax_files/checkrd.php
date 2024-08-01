<?php
session_start();
include "../../connection.php";

$password = md5($_POST["password"]);
$email = $_POST["email"];
$query = "select id from tbl_user where email='".$email."' and password='".$password."' limit 1";
$result=mysqli_query($conn,$query);
// echo $stmt->num_rows();
$id=0;

if ($result->num_rows>0) 
{
    while($row=$result->fetch_array())
    {
        $id=$row[0];
    }
    $query = "select id,name from tbl_restaurant where userid=" . $id . " limit 1";
    $result2 = mysqli_query($conn, $query);
    if ($result2->num_rows > 0) 
    {   
        while($row=$result2->fetch_array())
        {
            $_SESSION["userid"]=$id;
            $_SESSION["restaurantname"]=$row[1];
            $_SESSION["restaurantid"]=$row[0];
        }
        echo "Restaurant Owner";
        $_SESSION["role"]="r";
    } 
    else 
    {
        $query = "select id from tbl_delivery_man where userid=" . $id . " limit 1";
        $result1 = mysqli_query($conn, $query);
        if ($result1->num_rows > 0) 
        {
            echo "Delivery Man";
            $_SESSION["role"]="d";
        }
        else
        {
            $_SESSION["userid"]=$id;
            $_SESSION["role"]="entity";
            echo "entity";

        }
    }
} 
else 
{
    echo "invalid user";
}
