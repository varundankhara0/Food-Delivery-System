<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <form id="login-form" method="post" action="#">
        <div id="container">
            <label for="">UserID</label>
            <input type="text" name="userid"><br>
            <label for="">Password</label>
            <input type="password" name="Password"><br>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
            echo "success";
        }
    ?>
</body>
</html>