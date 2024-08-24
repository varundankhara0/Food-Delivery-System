<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Luminar Food</title>
  <script src="../../js/disable.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/rd_index.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming


-->
  <style>
    ul {
      display: flex;
      padding-left: 50px;
    }

    nav {
      display: flex;
      justify-content: space-evenly;
    }
    
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
    
footer {
    max-height: 30%;
    
    background-color: #d30d0d;
    padding: 50px 20px;
    text-align: center;
    /* box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1); */
}
footer hr {
    border: none;
    border-top: 1px solid #DDD;
    margin: 20px 0;
}
.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}

.footer-left {
    flex: 1;
}

.footer-left h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

.social-icons a img {
    width: 30px;
    height: 30px;
    margin: 0 10px;
}

.footer-right {
    flex: 2;
    display: flex;
    justify-content: space-around;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links h4 {
    font-size: 18px;
    color: #DDD;
    margin-bottom: 10px;
}

.footer-links a {
    text-decoration: none;
    color: #000;
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
}
  </style>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="../../images/logo.png" alt="" style="width: 100px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="#">View Food</a></li>
              <li><a href="product-details.php">View Cart</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <?php
              if (isset($_SESSION["user"])) {
              ?>
                <li><a href="../Landing/logout.php" class="login-btn"><?php echo $_SESSION["user"]; ?></a></li>

              <?php
              } else {
              ?>
                <li><a href="login.php" class="login-btn">Sign In</a></li>
              <?php
              }
              ?>
            </ul>

          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Contact Us</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Contact Us</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-text">
            <div class="section-heading">

            </div>
            <div>
              <div class="right-content">
                <div class="row">
                  <div class="col-lg-12">

                  </div>
                  <div class="col-lg-12">
                    <form id="contact-form" action="" method="post" style=" width: 100;">
                      <div>
                        <div>
                          <fieldset>
                            <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                          </fieldset>
                        </div>
                        <div>
                          <fieldset>
                            <input type="surname" name="surname" id="surname" placeholder="Your Surname..." autocomplete="on" required>
                          </fieldset>
                        </div>
                        <div>
                          <fieldset>
                            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                          </fieldset>
                        </div>
                        <div>
                          <fieldset>
                            <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on">
                          </fieldset>
                        </div>
                        <div>
                          <fieldset>
                            <textarea name="message" id="message" placeholder="Your Message"></textarea>
                          </fieldset>
                        </div>
                        <div>
                          <fieldset>
                            <button type="submit" id="form-submit" class="orange-button">Send Message Now</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            </label>
          </div>
        </div>

      </div>
    </div>
  </div>

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

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../../js/jquery/jquery.min.js"></script>
  <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/counter.js"></script>
  <script src="../../js/custom.js"></script>

</body>

</html>