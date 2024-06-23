<!-- http://localhost/Food-Delivery-System/Food%20Delivery%20System/Registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h1>Form Submission</h1>
    <form method="post" action="display.php">
        <label>Username:</label>
        <input type="text" name="uname" required><br>
        <label>Gender:</label>
        <input type="radio" name="gender" value="male" required> Male
        <input type="radio" name="gender" value="female" required> Female<br>
        <label>Address:</label>
        <input type="text" name="address" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Pincode:</label>
        <input type="number" name="pincode" required><br>
        <label>Password:</label>
        <input type="password" name="pass" required><br>
        <label>City:</label>
        <input type="text" name="city" required><br>
        <label>Remember me:</label>
        <input type="checkbox" name="remember" value="yes"><br>
        <label>Skills:</label>
        <input type="checkbox" name="skills[]" value="HTML"> HTML
        <input type="checkbox" name="skills[]" value="CSS"> CSS
        <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript<br>
        <button type="submit">Submit</button>
    </form>
    </div>
</body>
</html>