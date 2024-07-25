<?php
session_start();
    include "../../connection.php";

       
            $allowTypes = array('jpg','png','jpeg','gif');
            //   echo "success";
              $targetDir = "C:/xampp/htdocs/Food-Delivery-System/Food Delivery System/images/";
              $fileName = basename($_FILES["file"]["name"]);
              $targetFilePath = $targetDir . $fileName;
              $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
              
             //-------------------------------------------------- 
              
              $query = "select * from  tbl_user where Email ='" .$_POST['email']."' limit 1";
              $result2 = mysqli_query($conn, $query);
              if ($result2->num_rows > 0) 
               {   
                echo "user exists";
                exit();
               } 
              if(in_array($fileType, $allowTypes))
                   {

                  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                  {
                    $query="INSERT INTO Tbl_user(fullname,password,email,PhoneNo,status,image,dob,Gender) VALUES( '".$_POST['name']."','" .md5($_POST['password'])."','" .$_POST['email']."','" .$_POST['phone']."','0','".$targetFilePath."','".$_POST["dob"]."',".$_POST["Gender"].");";
                    $result=mysqli_query($conn,$query);
      
                  if(!$result)
                  {
                      echo mysqli_error($conn);
      
                  }
                  else
                  {
                      
                      $query="select id,email from tbl_user where email='".$_POST["email"]."'";
                      $results=mysqli_query($conn,$query);
                      while($row=mysqli_fetch_row($results))
                      {
                          $_SESSION["userid"]=$row[0];
                          $_SESSION["email"]=$row[1];
                      }
                      $_SESSION["user"]=$_POST["name"];
                      $_SESSION["name"]=$_POST["name"];
                      echo true;
                  }                          
                  }
                              
              }
               else
                  {
                      echo 'image error';
                  }
            
             
        
    ?>