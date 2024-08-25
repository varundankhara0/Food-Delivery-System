<?php
session_start();
include "../../connection.php";

$allowTypes = array('jpg','png','jpeg','gif');
$targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

$userid = (int)$_SESSION["userid"];
$role = $_SESSION["role"];

if (in_array($fileType, $allowTypes)) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        $query = "INSERT INTO Tbl_complaint (orderid, description, role, image, userid, status) VALUES ('".$_POST['order-id']."', '".$_POST['complaint']."', '".$role."', '".$fileName."', '".$userid."', 'Pending')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo 'success';
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo 'File upload failed';
    }
} else {
    echo 'Invalid file type';
}
?>
