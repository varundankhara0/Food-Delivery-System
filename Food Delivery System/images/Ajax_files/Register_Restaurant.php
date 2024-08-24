<?php
include "../../connection.php";
session_start();

$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
//   echo "success";
$targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
$fileName = basename($_FILES["License"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (in_array($fileType, $allowTypes)) {

  // Upload file to server
  if (move_uploaded_file($_FILES["License"]["tmp_name"], $targetFilePath)) {
    $name=$_POST["name"];
    $status=1;
    $address=$_POST["address"];
    $contact=$_POST["phoneno"];
    $gstno=$_POST["gstno"];
    $Licesnseno=$_POST["licenseno"];
    $OpeningTime=$_POST["opentime"];
    $ClosingTime=$_POST["closetime"];
    $area=(int)$_POST["areaid"];
    $userid=(int)$_SESSION["userid"];
   
    $query = "INSERT INTO tbl_restaurant (Name, status, address, Contact, gstno, Licesnseno, OpeningTime, ClosingTime, areaid, Licesnseimage, userid) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt= $conn->prepare($query);
    $stmt->bind_param("sissssssisi", $name, $status, $address, $contact, $gstno, $Licesnseno, $OpeningTime, $ClosingTime, $area, $targetFilePath,$userid);
$stmt->execute();
if($conn->affected_rows>0)
    {
      $_SESSION["restaurantname"]=$name;
        $_SESSION["role"]="r";
        $query="select * from tbl_restaurant where userid=".$userid;
        $result1=mysqli_query($conn,$query);
        while($row=$result1->fetch_assoc())
        {
          $_SESSION["restaurantid"]=$row["id"];
        }
        echo true;
    }
    else
    {
        echo false;
    }
?>
<?php
    
  }
} else {
  echo 'image error';
}
?>
