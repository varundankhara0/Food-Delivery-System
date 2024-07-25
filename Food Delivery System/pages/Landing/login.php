<?php
session_start();
if (isset($_SESSION["role"])) {

    echo "<script>window.location='./index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Luminar Food</title>

    <link rel="stylesheet" href="../../css/loginstyle.css">
    <style>
        <!-- .header-area .main-nav .logo {
        display: flex;
        justify-content:left;

        }
        -->

    <!-- .header-area .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
        } -->

    .header-area .main-nav .menu-trigger {
    position: absolute;
    right: 20px;
    }
    .col-lg-12 {
    flex: 0 0 auto;
    width: 7%;
    }

    .error {
    color: red;
    display: none;
    }
    body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    }

    .header-area {
    background-color: #ff0038;
    position: relative;
    }

    .header-top {
    background-color: #d30d0d;
    border-bottom-left-radius: 100px;
    border-bottom-right-radius: 100px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    }

    .header-bottom {
    background-color: #d30d0d;
    border-top-left-radius: 100px;
    border-top-right-radius: 100px;
    height: 100px;
    }

    .header-area .logo img {
    width: 60px;
    }

    .form-section {
    text-align: center;
    padding: 40px 20px;
    }

    .form-section form {
    display: inline-block;
    text-align: left;
    width: 100%;
    max-width: 600px;
    }

    .form-section label {
    display: block;
    margin: 10px 0 5px;
    }


    .form-section input[type="email"]
    {
    width: 221%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    }
    .form-section input[type="file"]
    {
    width: 101%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;

    }
    .form-section input[type="password"]
    {
    width: 197%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;

    }
    .form-section input[type="text"],
    .form-section input[type="number"]
    {
    width: 217%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;

    }

    .form-section button[type="submit"] {
    background-color: #d30d0d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    .form-group {
    display: flex;
    justify-content: space-between;
    }

    .form-group .form-control {
    width: 48%;
    }

    .inline-inputs {
    display: flex;
    justify-content: space-between;
    }

    .inline-inputs .form-group {
    flex: 1;
    margin-right: 10px;
    }

    .inline-inputs .form-group:last-child {
    margin-right: 0;
    }

    .form-section select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    }

    nav{
    background-color: #d30d0d;
    display: flex;
    justify-content: space-around;
    border-radius: 0px 0px 50px 50px;
    align-items: center;

    }
    ul{
    display: flex;
    list-style: none;
    text-decoration: none;
    }
    img {
    width: 80px;
    }
    li{
    padding-left: 30px;
    padding-right: 30px;
    align-items: center;
    }
    a{
    text-decoration: none;
    color: #f8f9fa;
    }
    li:hover{
    background-color: rgb(7, 27, 21);
    border-radius: 25px;
    }
    footer {
    margin-top: 150px;
    background-color:#d30d0d ;
    background-repeat: no-repeat;
    background-size: cover;
    color: white;
    min-height: 150px;
    border-radius: 150px 150px 0px 0px;
    }
    /* -------------- */
    .form-section input[type="text"],
    .form-section input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    display: block;
    }


    </style>
</head>

<body>
    <div class="main">
        <nav>
            <div><img src="../../images/logo.png"></div>
            <div>
                <ul>
                    <ul class="nav-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Our Shop</a></li>
                        <li><a href="#" class="active">Product Details</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <?php
                        if (isset($_SESSION["user"])) {
                        ?>
                            <li><a href="logout.php" class="login-btn"><?php echo $_SESSION["user"]; ?></a></li>

                        <?php
                        } else {
                        ?>
                            <li><a href="login.php" class="login-btn">Login</a></li>
                        <?php
                        }
                        ?>

                    </ul>
                </ul>
            </div>
        </nav>


        <main>
            <div class="login-container">
                <form class="login-form" method="post" action="#">
                    <div> <label for="userid">Email:</label>
                        <div> <input type="text" id="userid" name="userid" placeholder="Placeholder"></div>
                        <div id="email-error" class="error">Invalid email address.</div>
                    </div>
                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="Password" placeholder="Placeholder">
                        <div id="password-error" class="error">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.</div>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>

                    <div class="buttons">
                        <button type="submit" name="submit" class="login-btn">Login</button>
                        <button type="button" class="signup-btn" onclick="register()">Sign-up</button>
                    </div>
                </form>
                <script>
                    function register() {
                        window.location = 'Registration.php';
                    }
                </script>
                <?php
                include "../../connection.php";

                if (isset($_POST["submit"])) {
                    if ($_POST["userid"] == "admin") {
                        if ($_POST["Password"] == "adminGG@123") {
                            $_SESSION["role"] = "admin";
                            echo "<script>alert('Welcome admin');window.location='../../Admin/'</script>";
                        }
                    }
                    $tries = 0;
                    $query = "select id,email,password,fullname from Tbl_user where email='" . $_POST["userid"] . "' and password='" . md5($_POST["Password"]) . "' and status=1 limit 1";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) 
                        {
                            $_SESSION["userid"] = $row[0];
                            $_SESSION["user"] = $row[3];
                        }
                        $_SESSION["role"] = "c";
                        echo "<script>
                alert('Login Successfull');
                window.location='../Customer/index.php';</script>";
                    } else {
                        $tries = $tries + 1;
                        echo "<script>
                
                alert('Wrong crendentials entered')</script>";
                    }
                    if ($tries == 3) {
                        echo "<script>
                alert('please try again later');
                window.location='../Customer/index.php';</script>";
                    }
                }
                ?>
                <img src="../../images/taco.gif" alt="Taco Image">
                <!-- <div class="image-container">
                    <img src="images/loginTest.gif" alt="Taco Image">
                </div> -->
            </div>
        </main>

        <footer>
            
            <div class="footer-content">
                <div class="footer-left">
                    <h3>Luminor's delivery</h3>
                    <div class="social-icons">
                        <a href="#"><img src="../../images/facebook-icon.png" alt="Facebook"></a>
                        <a href="#"><img src="../../images/twitter-icon.png" alt="Twitter"></a>
                        <a href="https://www.instagram.com/vd__2004/"><img src="../../images/instagram-icon.png" alt="Instagram"></a>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {


        $('#user-form').on('submit', function(e) {
            e.preventDefault();
            let valid = true;


            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            const email = $('#email').val();
            const password = $('#password').val();

            if (!passwordRegex.test(password)) {
                $('#password-error').show();
                valid = false;
            } else {
                $('#password-error').hide();
            }
            if (!emailRegex.test(email)) {
                $('#email-error').show();
                valid = false;
            } else {
                $('#email-error').hide();
            }
            const formData = new FormData(this);
        });
    });
</script>

</html>