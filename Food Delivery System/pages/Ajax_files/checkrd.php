<?php
session_start();
include "../../connection.php";

$password = md5($_POST["password"]);
$email = $_POST["email"];
$query = "select id from tbl_user where email='" . $email . "' and password='" . $password . "' limit 1";
$result = mysqli_query($conn, $query);
// echo $stmt->num_rows();
$id = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $id = $row[0];
    }
    $query = "select dm.id as id,dm.name as name from tbl_restaurant as dm JOIN tbl_user as user on user.id=dm.userid where dm.userid=" . $id . " and user.status=1 limit 1";
    $result2 = mysqli_query($conn, $query);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_array()) {
            $query = "select dm.id,user.fullname as name from tbl_restaurant as dm Join tbl_user as user on user.id=dm.userid where dm.userid=" . $id . " AND dm.status=0  limit 1";
            $result0=mysqli_query($conn,$query);
            if($result0->num_rows>0)
            {
                echo "You're role has been revoked please contact admin if possible";
            }
            else
            {
           
            $_SESSION["userid"] = $id;
            $_SESSION["restaurantname"] = $row[1];
            $_SESSION["restaurantid"] = $row[0];
            echo "Restaurant Owner";
            }
        }
        
        $_SESSION["role"] = "r";
    } else {
        $query = "select dm.id,user.fullname as name from tbl_delivery_man as dm Join tbl_user as user on user.id=dm.userid where dm.userid=" . $id . " and user.status=1 limit 1";
        $result1 = mysqli_query($conn, $query);
        if ($result1->num_rows > 0) {
            
            $query = "select dm.id,user.fullname as name from tbl_delivery_man as dm Join tbl_user as user on user.id=dm.userid where dm.userid=" . $id . " AND dm.status=0  limit 1";
            $result0=mysqli_query($conn,$query);
            if($result0->num_rows>0)
            {
                echo "You're role has been revoked please contact admin if possible";
            }
            else
            {
            $_SESSION["role"] = "d";
            while ($row = $result1->fetch_assoc()) {
                $_SESSION["userid"] = $id;
                $_SESSION["deliverymanid"] = $row["id"];
                $_SESSION["deliverymanname"]=$row["name"];
                echo "Delivery Man";
            }
        }
        } else {
            $_SESSION["userid"] = $id;
            $_SESSION["role"] = "entity";
            echo "entity";
        }
    }
} else {
    echo "invalid user";
}
