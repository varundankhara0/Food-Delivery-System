<?php
session_start();
$_SESSION["address"]=$_POST["address"];
echo true;
?>