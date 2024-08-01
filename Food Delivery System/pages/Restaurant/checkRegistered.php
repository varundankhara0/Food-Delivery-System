<?php 
session_start();
if(isset($_SESSION["role"]))
{
    if($_SESSION["role"]!="entity")
    {
        echo "<script>alert('Unauthorized access:You don\'t have permission to visit the page');window.location='../Landing/login.php'</script>";    
    }
}
else
{
    echo "<script>alert('Unauthorized access:You don\'t have permission to visit the page');window.location='../Landing/login.php'</script>";
}
?>
