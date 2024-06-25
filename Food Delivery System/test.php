<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminor Delivery</title>
    <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
<header>
        <nav>
            <div class="logo">Luminor Delivery</div>
            <ul class="nav-links">
                <li><a href="#">Search For Restaurants</a></li>
                <li><a href="#">Choose by Category</a></li>
                <li><a href="#">About us</a></li>
                <?php
                    if(isset($_SESSION["user"]))
                    {
                        ?>
                            <li><a href="logout.php" class="login-btn"><?php echo $_SESSION["user"]; ?></a></li>
                        
                        <?php
                    }
                    else
                    {
                        ?> 
                        <li><a href="index.php" class="login-btn">Login</a></li>        
                        <?php
                    } 
                ?>
                
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="login-container">
            <form class="login-form">
                <label for="userid">UserID</label>
                <input type="text" id="userid" placeholder="Placeholder">
                
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Placeholder">
                
                <a href="#" class="forgot-password">Forgot Password?</a>
                
                <div class="buttons">
                    <button type="submit" class="login-btn">Login</button>
                    <button type="button" class="signup-btn">Sign-up</button>
                </div>
            </form>
            <div class="image-container">
                <img src="images/taco.gif" alt="Taco Image">
            </div>
        </div>
    </main>
    
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <p>Luminor's delivery</p>
                <div class="social-media">
                    <a href="#"><img src="images/facebook-icon.png" alt="Facebook"></a>
                    <!-- <a href="#"><img src="linkedin-icon.png" alt="LinkedIn"></a> -->
                    <!-- <a href="#"><img src="youtube-icon.png" alt="YouTube"></a> -->
                    <a href="#"><img src="images/instagram-icon.png" alt="Instagram"></a>
                </div>
            </div>
            <div class="footer-right">
                <div class="topic">Topic</div>
                <div class="page">Page</div>
                <div class="page">Page</div>
                <div class="page">Page</div>
                <div class="page">Page</div>
            </div>
        </div>
    </footer>
</body>
</html>
