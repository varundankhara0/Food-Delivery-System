<?php
include "checkowner.php";
include "../../connection.php";

// Fetch existing data for restaurant and addresses.
$restaurant_id = $_SESSION["userid"];

// Fetch restaurant data
$stmt = $conn->prepare("SELECT * FROM tbl_restaurant WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $restaurant_id);
$stmt->execute();
$restaurant = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Update restaurant details upon form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gstno = $_POST['gstno'];
    $licenseno = $_POST['licenseno'];
    $openingtime = $_POST['openingtime'];
    $closingtime = $_POST['closingtime'];

    $update_stmt = $conn->prepare(
        "UPDATE tbl_restaurant 
         SET Name = ?, address = ?, Contact = ?, gstno = ?, Licesnseno = ?, OpeningTime = ?, ClosingTime = ? 
         WHERE id = ?"
    );
    $update_stmt->bind_param("sssssssi", $name, $address, $contact, $gstno, $licenseno, $openingtime, $closingtime, $restaurant_id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Profile updated successfully!'); window.location='update_profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile. Please try again.');</script>";
    }
    $update_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Profile - Luminor Delivery</title>

  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      background: rgb(99, 39, 120);
      font-family: 'Poppins', sans-serif;
    }
    .form-control:focus {
      border-color: #BA68C8;
      box-shadow: none;
    }
    .profile-button {
      background: rgb(99, 39, 120);
      border: none;
      transition: background 0.3s;
    }
    .profile-button:hover {
      background: #682773;
    }
  </style>
</head>

<body>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-6 offset-md-3 bg-white p-5 rounded">
        <h4 class="text-center mb-4">Update Profile</h4>
        <form method="POST" action="update_profile.php">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" 
                   value="<?= htmlspecialchars($restaurant['Name'] ?? '') ?>" required>
          </div>

          <div class="form-group mt-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" 
                   value="<?= htmlspecialchars($restaurant['address'] ?? '') ?>" required>
          </div>

          <div class="form-group mt-3">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" name="contact" id="contact" 
                   value="<?= htmlspecialchars($restaurant['Contact'] ?? '') ?>" required>
          </div>

          <div class="form-group mt-3">
            <label for="gstno">GST No</label>
            <input type="text" class="form-control" name="gstno" id="gstno" 
                   value="<?= htmlspecialchars($restaurant['gstno'] ?? '') ?>" required>
          </div>

          <div class="form-group mt-3">
            <label for="licenseno">License No</label>
            <input type="text" class="form-control" name="licenseno" id="licenseno" 
                   value="<?= htmlspecialchars($restaurant['Licesnseno'] ?? '') ?>" required>
          </div>

          <div class="form-group mt-3">
            <label for="openingtime">Opening Time</label>
            <input type="text" class="form-control" name="openingtime" id="openingtime" 
                   value="<?= htmlspecialchars($restaurant['OpeningTime'] ?? '') ?>" required>
          </div>

          <div class="form-group mt-3">
            <label for="closingtime">Closing Time</label>
            <input type="text" class="form-control" name="closingtime" id="closingtime" 
                   value="<?= htmlspecialchars($restaurant['ClosingTime'] ?? '') ?>" required>
          </div>

          <div class="mt-4 text-center">
            <button type="submit" class="btn profile-button">Save Changes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
