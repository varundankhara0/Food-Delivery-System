<?php 
session_start();
if(isset($_SESSION["user"]))
{
   echo "<script>window.location='home.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <form id="login-form" method="post" action="#">
        <div id="container">
            <label for="">UserID</label>
            <input type="text" name="userid" required><br>
            <label for="">Password</label>
            <input type="password" name="Password" required><br>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <?php
    include "connection.php";
        if(isset($_POST["submit"]))
        {
            $query="select email,password from Tbl_user where email='".$_POST["userid"]."' and password='".md5($_POST["Password"])."'";
            $result=mysqli_query($conn,$query);
            if($result->num_rows>0)
            {
                $_SESSION["user"]=$_POST["userid"];
                echo "<script>
                alert('Login Successfull');
                window.location='home.php';</script>";
            }
        }
    ?>
</body>
</html>