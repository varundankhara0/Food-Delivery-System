<?php
include "checkowner.php";
function convertToWebPath($filesystemPath)
{

  // Replace backslashes with forward slashes
  $webPath = str_replace('\\', '/', $filesystemPath);

  // Remove the document root part of the path
  $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);

  return $webPath;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Luminor Delivery</title>
  <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/rd_index.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    .topimage
    {
      width: 304px;
      height: 204.35px;
      object-fit:fill;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: #2196F3;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    footer {
      max-height: 30%;
      border-radius: 110px 110px 0px 0px;
      background-color: #a120a1;
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
          <a href="index.php" class="logo">
            <img src="../../images/logo.png" alt="" style="width: 100px;">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="addFoodItem.php">Add Product</a></li>
            <li><a href="vieworderhistory.php">Order History</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li style="color: #fff;">online status
              <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
              </label>
            </li>
            <?php
            if (isset($_SESSION["restaurantid"])) {
            ?>
              <li><a href="../Landing/logout.php" class="login-btn"><?php echo $_SESSION["restaurantname"]; ?></a></li>

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

<div class="main-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="caption header-text">
          <h6>Welcome to luminar food</h6>
          <h2>Food that makes you're Customer happy</h2>
          <p>While Cooking is you're favorite job,Delivering is Our</p>
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
<div><?php

      function encrypt($plaintext, $key, $iv)
      {
        return openssl_encrypt($plaintext, 'AES-128-CBC', $key, 0, $iv);
      }
      $key = 'mysecretkey12345';
      $iv = '1234567890123456';
      $query = "SELECT od.id AS orderid, area.name AS address, SUM(oc.quantity) AS total_quantity FROM tbl_order AS od JOIN tbl_cart AS cart ON cart.id = od.cartid JOIN tbl_order_cart AS oc ON oc.cartid = od.cartid JOIN tbl_fooditem AS fd ON fd.id = oc.fooditemid JOIN tbl_restaurant AS rt ON rt.id = fd.restaurantID JOIN tbl_user AS user ON user.id = cart.userid JOIN tbl_customer_address AS ca ON ca.id = od.addressid JOIN tbl_area as area on area.id=ca.areaid WHERE od.status IN('o','a','dn','rc','da') AND rt.id = " . $_SESSION["restaurantid"] . " AND rt.status = 1 GROUP BY od.id, ca.address;";

      ?>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
      <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Quantity</th>
                    <th>Address of Delivery</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="orderTable">
               
            </tbody>

            <?php
            include "../../connection.php";
            $result = mysqli_query($conn, $query);
            while ($row = $result->fetch_assoc()) {
              $encryptedOrderId = urlencode(encrypt($row['orderid'], $key, $iv));
            ?>
              <tr>
                <td><?php echo $row["orderid"]; ?></td>
                <td><?php echo $row["total_quantity"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><button onclick="view('<?php echo $encryptedOrderId ?>')">View Order details</button></td>
              </tr>
            <?php
            }
            ?>

      </table>
      </div>
    </div>
  </div>
  <script>
    function view(id) {
      window.location = 'vieworder.php?oi=' + id;
    }
  </script>
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
          <a href="ViewFoodItems.php">View All</a>
        </div>
      </div>
      <?php
      $query = "SELECT fd.name AS food_name, fd.image AS food_image, SUM(oc.quantity) AS total_orders
FROM tbl_order_cart AS oc
JOIN tbl_fooditem AS fd ON fd.id = oc.fooditemid
JOIN tbl_order AS od ON od.cartid = oc.cartid
WHERE od.status IN ('o', 'a','da','dw','rc') 
GROUP BY fd.id
ORDER BY total_orders DESC
LIMIT 6"; 
    include "../../connection.php";
    $result=mysqli_query($conn,$query);
    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc())
      {

        ?>
          <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="item">
          <div class="thumb">
            <a href="product-details.html"><img class="topimage" src="<?php echo convertToWebPath($row["food_image"]);?>" alt=""></a>
          </div>
          <div class="down-content">
           
            <h4><?php echo $row["food_name"];?></h4>
            <span class="category">Quantity:<?php echo $row["total_orders"];?></span>
            <!-- <a href="product-details.html">ADD</a> -->
          </div>
        </div>
      </div>  
        <!-- new -->
        <?php 
      }
    }
?>
      
      
    </div>
  </div>
</div>

<footer>

  <div class="footer-content">
    <div class="footer-left">
      <h3 style="color: white;">Luminor's delivery</h3>
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