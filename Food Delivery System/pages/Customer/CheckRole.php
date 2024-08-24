<?php 
if(isset($_SESSION["role"]))
{
    if($_SESSION["role"]=="d")
    {
        echo "<script>window.location='../Delivery/index.php'</script>";
    }
    else if($_SESSION["role"]=="r")
    {
        echo "<script>window.location='../Restaurant/index.php'</script>";
    }
    else if($_SESSION["role"]=="admin")
    {
        echo "<script>window.location='../../Admin/'</script>";
    }
    
}

?>