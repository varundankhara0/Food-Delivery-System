<?php 
session_start();
$email=$_SESSION["email"];

$token=bin2hex(random_bytes(16));
$token_hash=hash("sha256",$token);
require "../../connection.php";
$query="UPDATE tbl_user set accounthash=? where email=?";
$stmt= $conn->prepare($query);
$stmt->bind_param("ss",$token_hash,$email);
$stmt->execute();
if($conn->affected_rows)
{
   $_SESSION["acchash"]= $token_hash;
    echo true;
}
else
{
    echo false;
}
?>