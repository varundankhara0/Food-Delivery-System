<?php   
session_start();
if(isset($_SESSION["user"]))
{
   echo "<script>window.location='home.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminor Delivery</title>
    <link rel="stylesheet" href="../../css/loginstyle.css">
</head>

<body>
    <div class="main">

        <header>
            <nav>
                <div class="logo">Luminor Delivery</div>
                <ul class="nav-links">
                    <li><a href="#">Search For Restaurants</a></li>
                    <li><a href="#">Choose by Category</a></li>
                    <li><a href="#">About us</a></li>
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
            </nav>
        </header>

        <main>
            <div class="login-container">
                <form class="login-form" method="post" action="#">
                    <label for="userid">UserID</label>
                    <input type="text" id="userid" name="userid" placeholder="Placeholder">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="Password" placeholder="Placeholder">

                    <a href="#" class="forgot-password">Forgot Password?</a>

                    <div class="buttons">
                        <button type="submit" name="submit" class="login-btn">Login</button>
                        <button type="button" class="signup-btn" onclick="register()">Sign-up</button>
                    </div>
                </form>
                <script>
                    function register()
                    {
                        window.location='Registration.php';
                    }
                </script>
                <?php
    include "../../connection.php";
    
        if(isset($_POST["submit"]))
        {

            $tries=0;
            $query="select id,email,password,fullname from Tbl_user where email='".$_POST["userid"]."' and password='".md5($_POST["Password"])."' and status=1 limit 1";
            $result=mysqli_query($conn,$query);
            if($result->num_rows>0)
            {
                while($row=$result->fetch_array())
                {
                    $_SESSION["userid"]=$row[0];
                    $_SESSION["user"]=$row[3];
                    
                }
                $_SESSION["role"]="c";
                echo "<script>
                alert('Login Successfull');
                window.location='home.php';</script>";
            }
            else
            {
                $tries=$tries+1;
                echo "<script>
                
                alert('Wrong crendentials entered')</script>";
            }
            if($tries==3){
                echo "<script>
                alert('please try again later');
                window.location='home.php';</script>";
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
            <hr>
            <div class="footer-content">
                <div class="footer-left">
                    <h3>Luminor's delivery</h3>
                    <div class="social-icons">
                        <a href="#"><img src="../../images/facebook-icon.png" alt="Facebook"></a>
                        <a href="#"><img src="../../images/twitter-icon.png" alt="Twitter"></a>
                        <a href="https://www.instagram.com/vd__2004/"><img src="../../images/instagram-icon.png" alt="Instagram"></a>
                    </div>
                </div>
                <div class="footer-right">
                    <ul class="footer-links">
                        <li>
                            <h4>Topic</h4>
                        </li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                    <ul class="footer-links">
                        <li>
                            <h4>Topic</h4>
                        </li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                    <ul class="footer-links">
                        <li>
                            <h4>Topic</h4>
                        </li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>


