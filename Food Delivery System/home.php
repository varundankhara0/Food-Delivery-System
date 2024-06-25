<!-- http://localhost/Food-Delivery-System/Food%20Delivery%20System/Registration.php -->
 <?php 
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminor Delivery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="scss/_carousel.scss">
    <link rel="stylesheet" href="scss/main.scss">
    <script src="https://cdn.jsdelivr.net/npm/scroll-carousel@1.2.7/dist/scroll.carousel.min.js"></script>
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
        <section class="banner">
            <h1>Welcome To Luminor</h1>
            <p>We Deliver Happiness😊</p>
            <?php
                    if(isset($_SESSION["user"]))
                    {
                        ?>
            <button class="signup-btn">Visit our page</button>
            <?php 
                    }
            ?>
            <div class="my-carousel">
                <div class="item"><img src="images/image.png" alt="" srcset=""></div>
                <div class="item"><img src="https://media.istockphoto.com/id/938742222/photo/cheesy-pepperoni-pizza.jpg?s=612x612&w=0&k=20&c=D1z4xPCs-qQIZyUqRcHrnsJSJy_YbUD9udOrXpilNpI=" alt="" srcset=""></div>
                <div class="item"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuCXcdf0VP2QBb1AArtLEKMZOb0cZDWk_cpQ&s" alt="" srcset=""></div>
            </div>
        </section>
        <section class="ratings">
            <h2>Ratings!!👍</h2>
            <p>What Customers have to say</p>
            <div class="reviews">
                <div class="review-card">
                    <p>"A terrific piece of praise"</p>
                    <div class="reviewer">
                        <img src="images/reviewer1.jpg" alt="Reviewer 1">
                        <div class="reviewer-info">
                            <p>Elle</p>
                            
                        </div>
                    </div>
                </div>
                <div class="review-card">
                    <p>"A fantastic bit of feedback"</p>
                    <div class="reviewer">
                        <img src="images/reviewer2.jpg" alt="Reviewer 2">
                        <div class="reviewer-info">
                            <p>Mike</p>
                        </div>
                    </div>
                </div>
                <div class="review-card">
                    <p class="review-title">"A genuinely glowing review"</p>
                    <div class="reviewer">
                        <img src="images/reviewer3.jpg" alt="Reviewer 3">
                        <div class="reviewer-info">
                            <p>Aliana</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
    <hr>
        <div class="footer-content">
            <div class="footer-left">
                <h3>Luminor's delivery</h3>
                <div class="social-icons">
                    <a href="#"><img src="images/facebook-icon.png" alt="Facebook"></a>
                    <a href="#"><img src="images/twitter-icon.png" alt="Twitter"></a>
                    <a href="https://www.instagram.com/vd__2004/"><img src="images/instagram-icon.png" alt="Instagram"></a>
                </div>
            </div>
            <div class="footer-right">
                <ul class="footer-links">
                    <li><h4>Topic</h4></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                </ul>
                <ul class="footer-links">
                    <li><h4>Topic</h4></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                </ul>
                <ul class="footer-links">
                    <li><h4>Topic</h4></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                </ul>
            </div>
        </div>
    </footer>
    
    <script>new ScrollCarousel(".my-carousel", {smartSpeed: true, direction: "ltr",autoplay: true});</script>
</body>
</html>
