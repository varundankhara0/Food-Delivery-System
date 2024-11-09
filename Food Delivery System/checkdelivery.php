<?php
session_start();
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != "d") {
        echo "<script>alert('role differed error:please login again');window.location='../Landing/login.php'</script>";
        
    }
} else {

    echo "<script>alert('role differed error:please login again');window.location='../Landing/login.php'</script>";
}