<?php 
session_start();
include "../../connection.php";


$flatNo = $_POST["flatno"];
$address = $_POST["address"] . " " . $_POST["landmark"];
$type = $_POST["type"];
$area = (int)$_POST["areaid"];
$status = 1; 
$id = $_POST["id"];
$userid = $_SESSION["userid"];
$query = "UPDATE tbl_customer_address SET address=?, areaid=?, type=?, status=?, doorno=? WHERE userid=? AND id=?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sisisii", $address, $area, $type, $status, $flatNo, $userid, $id);
        

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo true;
} else {
    echo false;
}


$stmt->close();
$conn->close();
?>
