<?php 
    session_start();
    $address=$_POST["flatno"]." ".$_POST["address"]." ".$_POST["landmark"];
    $type=$_POST["type"];
    echo $address." ".$type." ".$_SESSION["userid"];

?>