<?php 
$admin=true;
session_start();
if(isset($_SESSION["role"]))
{
    if($_SESSION["role"]!="admin")
    {
        $admin=false;
    }
}
else
{
    $admin=false;
}
?>