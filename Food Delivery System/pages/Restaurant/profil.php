<?php
// include "../../chcekcustomer.php";
include "../../connection.php";

// Function to convert filesystem path to web path
function convertToWebPath($filesystemPath)
{
    $webPath = str_replace('\\', '/', $filesystemPath);
    $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);
    return $webPath;
}

// Fetch restaurant details
$id = 1;
$query = "SELECT * FROM tbl_restaurant WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
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
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/fontawesome.css">
    <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../../css/owl.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        body {
            background: rgb(99, 39, 120);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8;
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none;
        }

        .profile-button:hover {
            background: #682773;
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none;
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none;
        }

        .back:hover {
            color: #682773;
            cursor: pointer;
        }

        .labels {
            font-size: 11px;
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
            border: solid 1px #BA68C8;
        }
    </style>
</head>

<body>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">

                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><button id="home" class="btn btn-primary profile-button">Home</button></div>

                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><button class="btn btn-primary profile-button" type="button" id="logout">Logout</button></div>

            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                        <form id="user-form">
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="first name" value='<?php echo htmlspecialchars($row["Name"]); ?>' readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($row["address"]); ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" name="phoneno" class="form-control" placeholder="enter phone number" value="<?php echo htmlspecialchars($row["Contact"]); ?>" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">License No</label>
                            <input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo htmlspecialchars($row["gstno"]); ?>" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Opening Time</label>
                            <input type="time" class="form-control" name="opening_time" placeholder="enter opening time" value="<?php echo htmlspecialchars($row["OpeningTime"]); ?>" readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels"> Closing Time</label>
                            <input type="time" class="form-control" name="closing_time" placeholder="enter closing time" value="<?php echo htmlspecialchars($row["ClosingTime"]); ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button" id="editProfileButton">Edit Profile</button>
                        <button class="btn btn-primary profile-button" type="submit" id="saveProfileButton">Save Profile</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function redirect(id) {
                window.location = 'update_address.php?id=' + id;
            }

            $(document).ready(function() {
                $("#home").click(function() {
                    window.location = 'index.php';
                });

                $("#logout").click(function() {
                    window.location = '../Landing/logout.php';
                });

                let imagepro = false;
                $("#saveProfileButton").css("display", "none");

                $("#editpic").click(function() {
                    imagepro = true;
                    $("#pic").removeAttr("hidden");
                    $(this).hide();
                    $("#saveProfileButton").css("display", "inline-block");
                    $("#editProfileButton").css("display", "none");

                    $(".form-control").removeAttr('readonly');
                });

                $('#user-form').on('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);

                    if (imagepro) {
                        const fileInput = document.getElementById('pic');
                        if (fileInput.files.length > 0) {
                            formData.append('image', fileInput.files[0]);
                        }
                    }

                    $.ajax({
                        url: '../Ajax_files/Update_Restaant.php',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == true) {
                                alert("Details were updated successfully");
                                window.location = 'profil.php';
                            } else if (response === "newemail") {
                                alert("Email change detected. Please verify your new email; your login is disabled until then.");
                                window.location = "../Landing/otp.php";
                            } else if (response === "image error") {
                                alert("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
                            } else {
                                alert(response);
                                alert("User's details were not updated successfully.");
                            }
                        },
                        error: function() {
                            alert('There was an error submitting the form.');
                        }
                    });
                });
            });

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