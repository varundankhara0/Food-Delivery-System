
    <?php
    include '../../connection.php';
   
   
        if ($_FILES["image"]["name"]!="") {

            $targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // $sql = "update tbl_fooditem SET name='$name', email='$email', city='$city', address='$address' WHERE id=$id";
        $sql="UPDATE `tbl_fooditem` SET `name`='".$_POST["name"]."',`Description`='".$_POST["description"]."',`price`='".$_POST["price"]."',`image`='".$targetFilePath."',`type`='".$_POST["type"]."',`categoryid`='".$_POST["categoryid"]."' WHERE id=".$_POST["id"];
        echo mysqli_query($conn, $sql);
        }
        else
        {
            $sql="UPDATE `tbl_fooditem` SET `name`='".$_POST["name"]."',`Description`='".$_POST["description"]."',`price`='".$_POST["price"]."',`type`='".$_POST["type"]."',`categoryid`='".$_POST["categoryid"]."' WHERE id=".$_POST["id"];
            echo mysqli_query($conn, $sql);
        }
    
    ?>
