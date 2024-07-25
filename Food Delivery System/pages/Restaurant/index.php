<?php 
include "checkowner.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Luminor Delivery</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../../css/fontawesome.css">
    <link rel="stylesheet" href="../../css/rd_index.css">
    <link rel="stylesheet" href="../../css/owl.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
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
                      <li><a href="index.html" class="active">Home</a></li>
                      <li><a href="shop.html">Add Product</a></li>
                      <li><a href="product-details.html">Order History</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
                      <?php 
                      if(isset($_SESSION["restaurantid"]))
                    {
                        ?>
                            <li><a href="../Landing/logout.php" class="login-btn"><?php echo $_SESSION["restaurantname"]; ?></a></li>
                        
                        <?php
                    }
                    else
                    {
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

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to luminar food</h6>
            <h2>Food that makes you happy</h2>
            <p>While eating at a restaurant is an enjoyable and convenient occasional 
                treat,most individual and families prepare their meals at home.</p>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="../../images/flying-pan-isolated-fire-background-creative-chef-template_597582-71.avif" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="../../images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Fast Food</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="../../images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>User More</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="../../images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Reply Ready</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="../../images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Easy Layout</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Popular</h6>
            <h2>Trending Food</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">View All</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download.jpeg" alt=""></a>
              <span class="price"><em>₹280</em>₹200</span>
            </div>
            <div class="down-content">
              <span class="category">Order</span>
              <h4>South Indian</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download.jpeg" alt=""></a>
              <span class="price">₹440</span>
            </div>
            <div class="down-content">
              <span class="category">Order</span>
              <h4>Punjabi</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download.jpeg" alt=""></a>
              <span class="price"><em>₹240</em>₹200</span>
            </div>
            <div class="down-content">
              <span class="category">Order</span>
              <h4>Mughlai</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download.jpeg" alt=""></a>
              <span class="price">₹320</span>
            </div>
            <div class="down-content">
              <span class="category">Order</span>
              <h4>Chinese</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP Food</h6>
            <h2>Most Ordered Food</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">View All</a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download (1).jpeg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Order</span>
                <h4>Italian</h4>
                <a href="product-details.html">ADD</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download (1).jpeg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Order</span>
                <h4>Mexicon</h4>
                <a href="product-details.html">ADD</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download (1).jpeg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Order</span>
                <h4>South Indian</h4>
                <a href="product-details.html">ADD</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download (1).jpeg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Order</span>
                <h4>Punjabi</h4>
                <a href="product-details.html">ADD</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download (1).jpeg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Order</span>
                <h4>Chinese</h4>
                <a href="product-details.html">ADD</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/download (1).jpeg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Order</span>
                <h4>Thai</h4>
                <a href="product-details.html">ADD</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h2>Restaurant Special Food</h2>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Paneer Tikka</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/Pizza.jpeg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Manchurian</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/Pizza.jpeg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Hyderabadi Biryani</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/Pizza.jpeg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Pav Bhaji</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/Pizza.jpeg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Sandwich</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="../../images/Pizza.jpeg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 LUMINOR DELIVERY. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="#" target="_blank">Design:</a></p>
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