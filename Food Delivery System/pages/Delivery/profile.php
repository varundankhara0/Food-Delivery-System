<?php
include "../../checkdelivery.php";
include "../../connection.php";

// Function to convert file system path to web path
function convertToWebPath($filesystemPath) {
    $webPath = str_replace('\\', '/', $filesystemPath);
    $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);
    return $webPath;
}

// Fetch delivery man data
$query = "SELECT * FROM tbl_delivery_man WHERE id=" . $_SESSION["deliverymanid"] . " LIMIT 1";
$result = mysqli_query($conn, $query);
if ($row = $result->fetch_assoc()) {
    $name = isset($row['fullname']) ? $row['fullname'] : 'No Name Available';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile Settings</title>
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: rgb(99, 39, 120); }
    .profile-button { background: rgb(99, 39, 120); border: none; }
    .form-control:focus { border-color: #BA68C8; box-shadow: none; }
    .profile-pic { width: 200px; height: 200px; object-fit: cover; }
  </style>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="profile-pic rounded-circle mt-5" src="<?php echo convertToWebPath($row['image']); ?>">
                    <button class="btn btn-primary profile-button" id="editpic">Edit Picture</button>
                    <button id="home" class="btn btn-primary profile-button mt-2">Home</button>
                    <button id="logout" class="btn btn-primary profile-button mt-2">Logout</button>
                </div>
            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <h4 class="text-right">Profile Settings</h4>
                    <form id="user-form">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">License No</label>
                                <input type="text" name="licenseno" class="form-control" value="<?php echo $row['Licenseno']; ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">License Image</label>
                                <img src="<?php echo convertToWebPath($row['Licenseimage']); ?>" alt="License Image" class="profile-pic">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Aadhar Card No</label>
                                <input type="text" name="adharcardno" class="form-control" value="<?php echo $row['adharcardno']; ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Aadhar Card Image</label>
                                <img src="<?php echo convertToWebPath($row['adharcardimage']); ?>" alt="Aadhar Card Image" class="profile-pic">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" id="editProfileButton">Edit Profile</button>
                            <button class="btn btn-primary profile-button" type="submit" id="saveProfileButton">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let imageChanged = false;

            $("#editpic").click(function() {
                $("#pic").removeAttr("hidden");
                imageChanged = true;
                $("#editProfileButton").hide();
                $("#saveProfileButton").show();
            });

            $("#editProfileButton").click(function() {
                $("input").removeAttr("readonly");
                $(this).hide();
                $("#saveProfileButton").show();
            });

            $('#user-form').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (imageChanged) {
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
                            alert("Profile updated successfully");
                        } else {
                            alert("Error updating profile: " + response);
                        }
                    },
                    error: function(error) {
                        alert('Form submission error.');
                    }
                });
            });

            $("#home").click(function() {
                window.location = 'index.php';
            });
            $("#logout").click(function() {
                window.location = '../Landing/logout.php';
            });
        });
    </script>
</body>
</html>

<?php
} else {
    echo "No data found!";
}
?>
