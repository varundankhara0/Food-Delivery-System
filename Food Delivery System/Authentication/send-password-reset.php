<?php 
$email=$_POST["email"];

$token=bin2hex(random_bytes(16));
$token_hash=hash("sha256",$token);
$expiry_time=date("Y-m-d H:i:s",time()+60*30);
require "../connection.php";
$query="UPDATE tbl_user set reset_token=?,reset_token_expires_at=? where email=?";
$stmt= $conn->prepare($query);
$stmt->bind_param("sss",$token_hash,$expiry_time,$email);
$stmt->execute();
if($conn->affected_rows)
{
   echo $token_hash;

}
else
{
    false;
}
?>