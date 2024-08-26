<?php
include "../../chcekcustomer.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Luminor Delivery</title>
  <script src="../../js/disable.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <style>
    body {
      background: rgb(99, 39, 120)
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #BA68C8
    }

    .profile-button {
      background: rgb(99, 39, 120);
      box-shadow: none;
      border: none
    }

    .profile-button:hover {
      background: #682773
    }

    .profile-button:focus {
      background: #682773;
      box-shadow: none
    }

    .profile-button:active {
      background: #682773;
      box-shadow: none
    }

    .back:hover {
      color: #682773;
      cursor: pointer
    }

    .labels {
      font-size: 11px
    }

    .profile-pic {
      width: 200px;
      height: 200px;
      object-fit: cover;
    }

    .add-experience:hover {
      background: #BA68C8;
      color: #fff;
      cursor: pointer;
      border: solid 1px #BA68C8
    }
    </style>
    
    
  <?php
  include "../../connection.php";
  $webPath = "";
  function convertToWebPath($filesystemPath)
  {
    // Replace backslashes with forward slashes
    $webPath = str_replace('\\', '/', $filesystemPath);

    // Remove the document root part of the path
    $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);

    return $webPath;
  }

  $email="";
  function StoreEmail($mail)
  {
    $email=$mail;
  }
  $query = "select * from tbl_user where id=" . $_SESSION["userid"] . " limit 1";
  $result = mysqli_query($conn, $query);
  while ($row = $result->fetch_assoc()) {   
    
  ?>
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">

        <div class="col-md-3 border-right">

          <div class="d-flex flex-column align-items-center text-center p-3 py-5"> <img class="profile-pic rounded-circle mt-5" src="<?php echo convertToWebPath($row['image']); ?>"><br><button class="btn btn-primary profile-button" type="button" id="editpic">Edit Picture</button><br><button id="home" class="btn btn-primary profile-button">Home</button></div>
          
          <div class="d-flex flex-column align-items-center text-center p-3 py-5"><button class="btn btn-primary profile-button" type="button" id="logout">Logout</button></div>
          
        </div>
        
        <div class="col-md-5 border-right">

          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profile Settings</h4>
              
              <form id="user-form">
            </div>
            <div class="row mt-2">
              <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="first name" value='<?php echo $row["fullname"] ?>' readonly></div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12"><input type="file" class="form-control" id="pic" hidden></div>
              <input type="email" name="beforeemail" value="<?php echo $row["Email"]; ?>" hidden>
              <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phoneno" class="form-control" placeholder="enter phone number" value="<?php echo $row["PhoneNo"] ?>" readonly></div>
              <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $row["Email"]; ?>" readonly></div>
              <div class="col-md-12"><label class="labels">BirthDate</label><input type="date" class="form-control" name="dob" placeholder="enter birthdate" value="<?php echo $row["dob"] ?>" readonly></div>
              <div class="col-md-12"><label class="labels">Gender</label><select name="gender" class="form-control" id="gender" disabled>
                <?php 
                if($row["Gender"]==false)
                {
                  ?>
                  <option value=0 selected>Male</option>
                  <option value=1>Female</option>
                  <?php 
                }
                else
                {
                  ?>
                  <option value=0 >Male</option>
                  <option value=1 selected>Female</option>
                  <?php 
                }
                ?>
              </select></div></div>
              <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" id="editProfileButton">Edit Profile</button><button class="btn btn-primary profile-button" type="submit" id="saveProfileButton">Save Profile</button></div>
            <div class="mt-5 text-center"></div>
            </form>
           <?php
          }
          $query = "select address,id from tbl_customer_address where userid=" . $_SESSION["userid"] . " and status=1 limit 2";
          $result1 = mysqli_query($conn, $query);
          $count = 1;
          if(!$result1->num_rows>0||$result1->num_rows<2)
          {
            ?>
            <div class="mt-5 text-center"><Button class="btn btn-primary profile-button" id="addaddress">Add Address</Button></div>
            <?php
          }
          while ($row = $result1->fetch_assoc()) {
            ?>
               <div class="col-md-12">
                <label class="labels">Address Line: <?php echo $count;
                                                                        $count = $count + 1 ?></label>
                <input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $row["address"] ?>" readonly><button class="btn btn-primary profile-button" type="button" onclick="redirect(<?php echo $row['id'] ?>)" id="editAddress">Edit This Address</button>
                <!-- <div class="mt-5 text-center"></div> -->
              </div> 
           
</div>

            <?php } ?>
              
            </div>
            
          </div>
        </div>
        <br>
      </div>
    </div>
    </div>
    </div>
    <script>
      function redirect(id)
      {
        window.location='update_address.php?id='+id;
      }
      $(document).ready(function() {
        $("#home").click(function(){window.location='index.php'})
        $("#logout").click(function(){
          window.location='../Landing/logout.php';
        })
        $("#addaddress").click(function(){
          window.location="add_address.php";
        })
        let imagepro = false;
        $("#saveProfileButton").css("display", "none");
        $("#editpic").click(function() {
          imagepro = true;
          $("#pic").removeAttr("hidden");
          $("#gender").removeAttr("disabled");
          $(this).hide();
          $("#saveProfileButton").css("display", "inline-block");
          $("#editProfileButton").css("display", "none");

          inputFields.forEach(function(input) {
            input.removeAttribute('readonly');
            
          });
        });
        $('#user-form').on('submit', function(e) {
          e.preventDefault();
          const formData = new FormData(this);
          if (imagepro == true) 
          {
            
            const fileInput = document.getElementById('pic');
            if (fileInput.files.length > 0) {
              formData.append('image', fileInput.files[0]);
            }
          }
          $.ajax({
            url: '../Ajax_files/Update_Customer.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              if (response == true) {
                alert("Details were updated succesfully");
                window.location = '../Customer/profil.php';
              }
              else if(response=="newemail")
              {
                alert("Email Change detected please verify you're new Email till then you're login is disabled");
                window.location="../Landing/otp.php";
              } 
              else if(response=="image error")
              {
                alert("Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.");
                // window.location="../Landing/otp.php";
              } 
              else 
              {
                alert(response);
                alert("User's Address was not added succesfully");
                // window.location = '../Customer/index.php';

              }
            },
            error: function(error) {
              alert('There was an error submitting the form.');
            }
          })

        });
        $("#editAddress").click(function(){
          
        })
      });
    </script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        const editButton = document.getElementById('editProfileButton');
        const saveButton = document.getElementById('saveProfileButton');
        const inputFields = document.querySelectorAll('.form-control');

        editButton.addEventListener('click', function() {
          inputFields.forEach(function(input) {
            input.removeAttribute('readonly');
            
          });

          editButton.style.display = 'none';
          saveButton.style.display = 'inline-block';
          $("#gender").removeAttr("disabled");
        });


      });
    </script>

</body>

</html>