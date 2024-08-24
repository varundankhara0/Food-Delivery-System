<?php
session_start();
include "../../connection.php";


$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
$targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";

$licenseFileName = basename($_FILES["license-image"]["name"]);
$aadharFileName = basename($_FILES["aadhar-image"]["name"]);

$licenseFilePath = $targetDir . $licenseFileName;
$aadharFilePath = $targetDir . $aadharFileName;

$licenseFileType = pathinfo($licenseFilePath, PATHINFO_EXTENSION);
$aadharFileType = pathinfo($aadharFilePath, PATHINFO_EXTENSION);



if (in_array($licenseFileType, $allowTypes) && in_array($aadharFileType, $allowTypes)) {
  if (move_uploaded_file($_FILES["license-image"]["tmp_name"], $licenseFilePath) && move_uploaded_file($_FILES["aadhar-image"]["tmp_name"], $aadharFilePath)) {

    $onlinestatus = 0;
    $Licenseno = $_POST["license"];
    $adharcardno = $_POST["aadhar"];
    $status = 1;
    $userid = (int)$_SESSION["userid"];


    $query = "INSERT INTO tbl_delivery_man(onlinestatus, Licenseno, Licenseimage, adharcardno, addharcardimage, status, userid) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $onlinestatus, $Licenseno, $licenseFilePath, $adharcardno, $aadharFilePath, $status, $userid);
    $stmt->execute();
    if ($conn->affected_rows > 0) {
      $_SESSION["role"] = "d";
      echo true;
    } else {
      echo false;
    }
  }
}
