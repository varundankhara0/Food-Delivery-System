<?php
session_start();
include "../../connection.php";


$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
//   echo "success";
$targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
$fileName = basename($_FILES["foodimage"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

//-------------------------------------------------- 


if (in_array($fileType, $allowTypes)) {

    if (move_uploaded_file($_FILES["foodimage"]["tmp_name"], $targetFilePath)) {
        $query = "INSERT INTO Tbl_fooditem(name, Description, price,image,type,categoryid, restaurantID, status,dateadded) VALUES( '" . $_POST['name'] . "','" . $_POST['description'] . "','" . $_POST['price'] . "','" . $targetFilePath . "','" . $_POST['Type'] . "','" . $_POST['Category'] . "','" . $_SESSION["restaurantid"] . "',1,NOW());";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo mysqli_error($conn);
        } else {

            echo true;
        }
    }
} else {
    echo 'image error';
}
