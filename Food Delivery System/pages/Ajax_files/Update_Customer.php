<?php
session_start();
include "../../connection.php";

$query = "";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
//   echo "success";
if (isset($_FILES["image"]["name"])) {

    $targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $newemail=false;
    if (in_array($fileType, $allowTypes)) {

        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            if ($_POST["beforeemail"] === $_POST["email"]) {
                $query = "update Tbl_user set fullname='" . $_POST["name"] . "',email='" . $_POST["email"] . "',PhoneNo='" . $_POST["phoneno"] . "',dob='" . $_POST["dob"] . "',image ='" . $targetFilePath . "', Gender='" . $_POST["gender"] . "' where id=" . $_SESSION["userid"];
            } else {
                $newemail = true;
                $query = "update Tbl_user set fullname='" . $_POST["name"] . "',email='" . $_POST["email"] . "',PhoneNo='" . $_POST["phoneno"] . "',dob='" . $_POST["dob"] . "',image ='" . $targetFilePath . "', Gender='" . $_POST["gender"] . "',status=0 where id=" . $_SESSION["userid"];
            }
            $result = mysqli_query($conn, $query);

            if ($result > 0 &&$newemail == false) {
                echo true;
            } else if ($result > 0 && $newemail == true) {
                echo "newemail";
                $_SESSION["email"]=$_POST["email"];
            }
        }
    } else {
        echo 'image error';
    }
} else {

    $newemail = false;
    if ($_POST["beforeemail"] == $_POST["email"]) {
        $query = "update Tbl_user set fullname='" . $_POST["name"] . "',email='" . $_POST["email"] . "',PhoneNo='" . $_POST["phoneno"] . "',dob='" . $_POST["dob"] . "',Gender='" . $_POST["gender"] . "' where id=" . $_SESSION["userid"];
    } else {
        $newemail =true;
        $query = "update Tbl_user set fullname='" . $_POST["name"] . "',email='" . $_POST["email"] . "',PhoneNo='" . $_POST["phoneno"] . "',dob='" . $_POST["dob"] . "',Gender='" . $_POST["gender"] . "',status=0 where id=" . $_SESSION["userid"];
    }
    $result = mysqli_query($conn, $query);
    if ($result > 0 && $newemail === false) {
        echo true;
    } else if ($result > 0 && $newemail === true) {
        $_SESSION["email"]=$_POST["email"];
        echo "newemail";
    } else {
        echo false;
    }
}
