<?php
session_start();
    include "../../connection.php";
    $query="INSERT INTO tbl_restaurant( Name, status, address,Contact, areaid, userid) VALUES( );";
    $result=mysqli_query($conn,$query);

  if(!$result)
  {
      echo mysqli_error($conn);

  }
  else
  { 
    //   $query="select id from tbl_restaurant where email='".$_POST["email"]."'";
    //   $results=mysqli_query($conn,$query);
    //   while($row=mysqli_fetch_row($results))
    //   {
    //       $_SESSION["userid"]=$row[0];
    //       $_SESSION["email"]=$row[1];
    //   }
    //   $_SESSION["user"]=$_POST["name"];
      
    //   echo true;
  }                          


    ?>