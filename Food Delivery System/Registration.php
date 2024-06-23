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
        <label>Fastname:</label>
        <input type="text" name="uname" required><br>
        <label>medalname:</label>
        <input type="text" name="mname" required><br>
        <label>lastname:</label>
        <input type="text" name="lname" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="pass" required><br>
        <button type="submit">Submit</button>
    </form>
    </div>
    <?php
    include "connection.php";
    
        if(isset($_POST["submit"]))
           {
              echo "success";
              $query="INSERT INTO Tbl_user(fname,mname,lname,password,Email)VALUES ".$_POST['unme']."," .$_POST['mname'].",".$_POST['lname']."," .$_POST['pass']."," .$_POST['email'].  "";
              $result=mysqli_query($conn,$query);
            if(!$result)
            {
                echo mysqli_error($conn);
            }
           }
    ?>
</body>
</html>