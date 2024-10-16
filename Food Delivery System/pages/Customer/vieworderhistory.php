<?php 
include "../../chcekcustomer.php";
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
    <title>Luminor Delivery</title>
  <script src="../../js/disable.js"></script>
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

      background-color: #d30d0d;
      padding: 50px 20px;
      text-align: center;
      /* box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1); */
    }

    .productphoto {
      width: 304px;
      height: 204.35px;
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

    .addtocart {
      height: 16px;
      width: 20px;
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
                      <li><a href="shop.php">View Food</a></li>
                      <li><a href="cart.php">View Cart</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                      <li><a href="complaint.php">Complaint</a></li>
                      <?php
                    if(isset($_SESSION["user"]))
                    {
                        ?>
                            <li><a href="./profil.php" class="login-btn"><?php echo $_SESSION["user"]; ?></a></li>
                        
                        <?php
                    }
                    else
                    {
                        ?> 
                        <li><a href="../Landing/login.php" class="login-btn">Sign In</a></li>        
                        <?php
                    } 
                ?>
                  </ul>   
            <!-- <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    ***** Menu End ***** -->


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
          <h3>Food!!!!</h3>
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
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="orderTable">
               
            </tbody>
        </table>
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
  <script>
    $(document).ready(function(){
      
      setInterval(fetchOrders, 300);
      function fetchOrders() {
        $.ajax({
          async:true,
          url: '../Ajax_files/fetch_customer_orders.php',
          method: 'GET',
          success: function(response) {
            $('#orderTable').html(response);
            
          },
          error: function(xhr, status, error) {
            console.error("Error fetching orders:", error);
          }
        });
      }
      
      
    });
    function cancelorder(id,status)
      {
        $('#js-preloader').removeClass('loaded');
        
        $.ajax({
          async:true,
          url:"../Ajax_files/cancelordercustomer.php",
          method:"POST",
          data:{
            orderid:id
          },
          success:function(response)
          {
              if(status!="a")
              {
                $('#js-preloader').addClass('loaded');
                  alert("order cancelled successfully");
                  window.location="index.php";
              }
          }
        });
        if(status=="a")
        {
          $.ajax({
          async:true,
          url:"../../Authentication/customercancel.php",
          method:"POST",
          data:{
            orderid:id
          },
          success:function(response)
          {
              if(response==true)
              {

                $('#js-preloader').addClass('loaded');
                alert("order cancelled successfully");
                window.location="index.php";
              }
          }
        });
        }
      }
  </script>
</body>
</html>