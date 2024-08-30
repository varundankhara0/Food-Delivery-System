<?php


//??
include "../../connection.php";
$query="UPDATE tbl_delivery_man SET onlinestatus='".$_POST["onlinestatus"]."',Licenseno='".$_POST["Licenseno"]."',Licenseimage='".$_POST["Licenseimage"]."', adharcardno='".$_POST["adharcardno"]."' , adharcardimage='".$_POST["adharcardimage"]."', status='".$_POST["status"]."', userid='".$_POST["userid"]."', currentareaid='".$_POST["currentareaid"]."' WHERE id=".$_POST["id"];
echo mysqli_query($conn,$query);
?>
