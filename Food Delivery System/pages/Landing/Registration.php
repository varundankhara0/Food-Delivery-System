<!-- http://localhost/Food-Delivery-System/Food%20Delivery%20System/Registration.php -->
<?php 
session_start();
if(isset($_SESSION["user"]))
{
    echo "<script>window.location='home.php';</script>";
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <div>
    <h1>Form Submission</h1>
    <form method="post" action="#" enctype="multipart/form-data">
        <label>First name:</label>
        <input type="text" name="uname" required><br>
        <label>Middle name:</label>
        <input type="text" name="mname" required><br>
        <label>Last Name:</label>
        <input type="text" name="lname" required><br>
        <label>phone:</label>
        <input type="number" name="phoneno" required>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="pass" required><br>
        <label>file upload:</label>
        <input type="file" name="file" id="" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    </div>
    <?php
    include "../../connection.php";

        if(isset($_POST["submit"]))
           {
            $allowTypes = array('jpg','png','jpeg','gif');
            //   echo "success";
              $targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
              $fileName = basename($_FILES["file"]["name"]);
              $targetFilePath = $targetDir . $fileName;
              $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  
              if(in_array($fileType, $allowTypes))
                   {
                                                            
                                  // Upload file to server
                  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                  {
                    $query="INSERT INTO Tbl_user(fullname,password,email,PhoneNo,status,image) VALUES( '".$_POST['uname']." ".$_POST['mname']." ".$_POST['lname']."','" .md5($_POST['pass'])."','" .$_POST['email']."','" .$_POST['phoneno']."','0','".$fileName."');";
                    $result=mysqli_query($conn,$query);
      
                  if(!$result)
                  {
                      echo mysqli_error($conn);
      
                  }
                  else
                  {
                      
                      $query="select id from tbl_user where email='".$_POST["email"]."'";
                      $results=mysqli_query($conn,$query);
                      while($row=mysqli_fetch_row($results))
                      {
                          $_SESSION["userid"]=$row[0];
                      }
                      $_SESSION["email"]=$_POST["email"];
                      $_SESSION["user"]=$_POST["uname"];
                      echo "<script>window.location='otp.php';</script>";
                  }                          
                  }
                              
              }
               else
                  {
                      echo '<script>alert("Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.");</script>';
                  }
            
             
           }
    ?>
</body>
</html>