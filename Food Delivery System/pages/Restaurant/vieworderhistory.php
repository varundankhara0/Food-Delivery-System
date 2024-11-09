<?php 
include "checkowner.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          footer {
              max-height: 30%;
              background-color: #a120a1;
              padding: 50px 20px;
              text-align: center;
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
          .social-icons a img {
              width: 30px;
              height: 30px;
              margin: 0 10px;
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
            <a href="index.php" class="logo">
              <img src="../../images/logo.png" alt="" style="width: 100px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="addFoodItem.php">Add Food</a></li>
                <li><a href="vieworderhistory.php" class="active">Order History</a></li>
                <!-- <li><a href="contact.php">Contact Us</a></li> -->
                <li><a href="complaint.php">Complaint</a></li>
                <?php
                if(isset($_SESSION["restaurantid"])) {
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

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Food Orders</h3>
          <span class="breadcrumb"><a href="index.php">Home</a></span>
        </div>
      </div>
    </div>
  </div>

  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date of Order</th>
                    <th>Total Amount</th>
                    <th>Total Items</th>
                    <th>Area Name</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "../../connection.php";
                $query = "SELECT tbl_order.id AS OrderID, tbl_order.amount AS TotalAmount, tbl_order.date AS OrderDate, SUM(tbl_order_cart.quantity) AS TotalItems, tbl_area.name AS AreaName 
                          FROM tbl_order 
                          JOIN tbl_order_cart ON tbl_order.cartid = tbl_order_cart.cartid 
                          JOIN tbl_fooditem ON tbl_order_cart.fooditemid = tbl_fooditem.id 
                          JOIN tbl_restaurant ON tbl_fooditem.restaurantID = tbl_restaurant.id 
                          JOIN tbl_area ON tbl_restaurant.areaid = tbl_area.id 
                          WHERE tbl_restaurant.id =".$_SESSION['restaurantid']." 
                          GROUP BY tbl_order.id";
                $result = mysqli_query($conn, $query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["OrderID"]; ?></td>
                            <td><?php echo $row["OrderDate"]; ?></td>
                            <td><?php echo $row["TotalAmount"]; ?></td>
                            <td><?php echo $row["TotalItems"]; ?></td>
                            <td><?php echo $row["AreaName"]; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-content">
        <div class="footer-left">
            <h3 style="color: white;">Luminor's Delivery</h3>
            <div class="social-icons">
                <a href="#"><img src="../../images/facebook-icon.png" alt="Facebook"></a>
                <a href="#"><img src="../../images/twitter-icon.png" alt="Twitter"></a>
                <a href="https://www.instagram.com/vd__2004/"><img src="../../images/instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="../../js/jquery/jquery.min.js"></script>
  <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/counter.js"></script>
  <script src="../../js/custom.js"></script>

</body>
</html>
