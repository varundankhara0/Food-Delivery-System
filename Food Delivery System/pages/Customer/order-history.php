<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminor Delivery</title>

    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/fontawesome.css">
    <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../../css/owl.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
     /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f5f7;
    color: #444;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
    font-size: 2rem;
    margin-bottom: 25px;
}

#order-history-container {
    max-width: 850px;
    margin: 0 auto;
}

/* Order Card Styles */
.order-card {
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.order-card:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    
}

.order-card h3 {
    margin: 0;
    color: #444;
}

.order-summary {
    font-weight: bold;
    color: #222;
}

/* Order Item Styles */
.order-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #e1e1e1;
}

.order-item:last-child {
    border-bottom: none;
}

img {
    border-radius: 8px;
    margin-right: 15px;
    max-width: 80px;
    height: auto;
    transition: transform 0.3s;
}

img:hover {
    transform: scale(1.05);
}

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
    margin-top: 10px;
    transition: color 0.3s;
}

a:hover {
    color: #0056b3;
}

/* Order Total & Button Styles */
.order-total {
    font-weight: bold;
    color: #444;
    margin-top: 10px;
}

.order-action-button {
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
    font-size: 0.9em;
    margin-top: 15px;
    transition: background-color 0.3s, transform 0.2s;
}

.order-action-button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Status Label Styles */
.status-label {
    padding: 5px 12px;
    color: #fff;
    border-radius: 15px;
    font-size: 0.9em;
    text-transform: uppercase;
    display: inline-block;
    margin-top: 5px;
}

.status-delivered {
    background-color: #28a745;
}

.status-pending {
    background-color: #ffc107;
    color: #333;
}

.status-canceled {
    background-color: #dc3545;
}

/* Footer Styles */
footer {
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

footer .social-icons img {
    width: 30px;
    margin: 0 10px;
    transition: transform 0.3s;
}

footer .social-icons img:hover {
    transform: scale(1.1);
}

    </style>
</head>
<body>
    <!-- Preloader Start -->
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
    <!-- Preloader End -->

    <!-- Header Area Start -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.html" class="logo">
                            <img src="../../images/logo.png" alt="Logo" style="width: 100px;">
                        </a>
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="shop.php">View Food</a></li>
                            <li><a href="cart.php">View Cart</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="complaint.php">Complaint</a></li>
                            <?php if(isset($_SESSION["user"])): ?>
                                <li><a href="./profil.php" class="login-btn"><?php echo $_SESSION["user"]; ?></a></li>
                            <?php else: ?> 
                                <li><a href="../Landing/login.php" class="login-btn">Sign In</a></li>        
                            <?php endif; ?>
                        </ul>   
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

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

    <h1>Order History</h1>
    <div id="order-history-container">

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
    <script>
    $(document).ready(function(){
      
      setInterval(fetchOrders, 300);
     /* function fetchOrders() {
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
      
      
    });*/
    });
  </script>
    <script>
    $(document).ready(function () {
        loadOrderHistory();
        setInterval(loadOrderHistory, 800);
        function loadOrderHistory() {
            $.ajax({
                url: "../Ajax_files/fetch-order-history.php",
                method: "GET",
                success: function (data) {
                    $("#order-history-container").html(data);
                },
                error: function (xhr, status, error) {
                    $("#order-history-container").html("<p>Error loading order history.</p>");
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
