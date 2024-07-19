<?php
session_start();
    include "../../connection.php";

       
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
                    $query="INSERT INTO Tbl_user(fullname,password,email,PhoneNo,status,image,dob) VALUES( '".$_POST['name']."','" .md5($_POST['password'])."','" .$_POST['email']."','" .$_POST['phone']."','0','".$targetFilePath."','".$_POST["dob"]."');";
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
                      $_SESSION["user"]=$_POST["name"];
                      echo true;
                  }                          
                  }
                              
              }
               else
                  {
                      echo 'image error';
                  }
            
             
        
    ?>