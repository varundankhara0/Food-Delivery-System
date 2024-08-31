<?php
session_start();
include "../../connection.php";
$userid = (int)$_SESSION["userid"];
$role = $_POST["role"];
$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
$targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
echo $_FILES["file"]["name"];
if ($_FILES["file"]["name"]!="") {
    $fileName = basename($_FILES["file"]["name"]);

    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);



    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO Tbl_complaint (orderid, description, role, image, userid, status) VALUES ('" . $_POST['orderid'] . "', '" . $_POST['description'] . "', '" . $role . "', '" . $fileName . "', '" . $userid . "', 1)";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo true;
            }
        } else {
            echo 'File upload failed';
        }
    } else {
        echo 'Invalid file type';
    }
} else {
    $query = "INSERT INTO Tbl_complaint (orderid, description, role, userid, completionstatus) VALUES ('" . $_POST['orderid'] . "', '" . $_POST['description'] . "', '" . $role . "', '" . $userid . "', 1)";
    echo mysqli_query($conn, $query);
}
