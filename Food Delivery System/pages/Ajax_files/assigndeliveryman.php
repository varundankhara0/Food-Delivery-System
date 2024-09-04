<?php
session_start();
if(!isset($_SESSION["deliverymanid"]))
{
    echo json_encode(array("status" => false,"message"=>"You\' re man id can\'t be fetched"));
    exit();
}
include "../../connection.php";

if(isset($_POST['orderid'])) {
    $orderid = $_POST['orderid'];

    // Check if the order ID exists
    $query = "SELECT * FROM tbl_delivery WHERE orderid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderid);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        // Order ID exists
        echo json_encode(array("status" => false,"message"=>"order already exists"));
    } else {
        $query="update tbl_order set status='da' where id=".$orderid;
        if(!mysqli_query($conn,$query))
        {
            echo json_encode(array("status" => false,"message"=>mysqli_error($conn)));
        }
        // Insert the order ID into the table
        $insert_query = "INSERT INTO tbl_delivery (orderid, deliverymanid, amount) VALUES (?, ".$_SESSION["deliverymanid"].", 40)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("i", $orderid);

        if($insert_stmt->execute()) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false, "message" => $insert_stmt->error));
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(array("status" => false, "message" => "No order ID provided"));
}
?>