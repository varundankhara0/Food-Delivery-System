<?php


//??
include "../../connection.php";
$query="UPDATE tbl_restaurant SET Name='".$_POST["Name"]."',status='".$_POST["status"]."',address='".$_POST["address"]."', Contact='".$_POST["Contact"]."' , gstno='".$_POST["gstno"]."', Licesnseno='".$_POST["Licesnseno"]."', OpeningTime='".$_POST["OpeningTime"]."', ClosingTime='".$_POST["ClosingTime"]."', areaid='".$_POST["areaid"]."' WHERE id=".$_POST["id"];
echo mysqli_query($conn,$query);
?>
