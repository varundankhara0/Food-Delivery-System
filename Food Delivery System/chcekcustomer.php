<?php
session_start();
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != "c") {
        echo "<script>window.location='.localhost/Food-Delivery-System/Food Delivery System/pages/Landing/logout.php'</script>";
    }
} else {

    echo "<script>alert('role differed error:please login again');window.location='localhost/Food-Delivery-System/Food Delivery System/pages/Landing/logout.php'</script>";
}
