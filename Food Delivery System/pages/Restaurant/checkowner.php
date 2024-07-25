<?php 
session_start();
if(isset($_SESSION["role"]))
{
    if($_SESSION["role"]!="r")
    {
        ?>
        <script>alert('Unauthorized access:You don\'t have permission to visit the page')</script>
        <script>window.location='../Landing/login.php'</script>
        
        <?php
    }
}
else
{
    echo "<script>alert('Unauthorized access:You don\'t have permission to visit the page')</script>
        <script>window.location='../Landing/login.php'</script>";
}
?>