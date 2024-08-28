<?php 
session_start();
if(isset($_SESSION["role"]))
{
  if($_SESSION["role"]=="d")
  {
    // Role-specific actions can be added here
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
  <title>Luminor Delivery</title>
  <script src="../../js/disable.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title>Luminor Delivery</title>
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/rd_index.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

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

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
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
      background-color: #a120a1;
      padding: 50px 20px;
      text-align: center;
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
      color: white;
    }

    .social-icons a img {
      width: 30px;
      height: 30px;
      margin: 0 10px;
    }

    .footer-links {
      list-style: none;
      padding: 0;
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

  <!-- Header Start -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <a href="index.html" class="logo">
              <img src="../../images/logo.png" alt="Logo" style="width: 100px;">
            </a>
            <ul class="nav">
              <li><a href="index.html" class="active">Home</a></li>
              <li><a href="shop.html">Check Delivery</a></li>
              <li><a href="product-details.html">View Past Delivery</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li style="color: #fff;">online status
    <label class="switch">
      <input type="checkbox" checked>
      <span class="slider round"></span>
    </label>
  </li>
              <?php 
              if(isset($_SESSION["deliverymanid"])) {
                echo '<li><a href="../Landing/logout.php" class="login-btn">' . $_SESSION["deliverymanname"] . '</a></li>';
              } else {
                echo '<li><a href="login.php" class="login-btn">Sign In</a></li>';
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header End -->
  <div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="replaceCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="replaceCartModalLabel">Sure this is it?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body" id="orderDetails">
          Are sure You want to place this order?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="canclemodal">Cancel</button>
          <button type="button" id="confirmorder" class="btn btn-danger">Place Order</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Banner Start -->
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to Luminar Food</h6>
            <h2>Our Fast Delivery For You</h2>
            <p>While eating at a restaurant is an enjoyable and convenient occasional treat, most individuals and families prepare their meals at home.</p>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="../../images/delivery-person-going-to-deliver-parcel-5335274-4460346.png" alt="Delivery Person" style="width: 700px;">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Banner End -->

 

  <!-- Footer Start -->
  <footer>
    <div class="footer-content">
      <div class="footer-left">
        <h3>Luminor's Delivery</h3>
        <div class="social-icons">
          <a href="#"><img src="../../images/facebook-icon.png" alt="Facebook"></a>
          <a href="#"><img src="../../images/twitter-icon.png" alt="Twitter"></a>
          <a href="https://www.instagram.com/vd__2004/"><img src="../../images/instagram-icon.png" alt="Instagram"></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Scripts -->
  <script src="../../js/jquery/jquery.min.js"></script>
  <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/counter.js"></script>
  <script src="../../js/custom.js"></script>
  <script>
const orderset = new Set();
setInterval(function() {
    $.ajax({
        url: '../Ajax_files/check_order_status.php',
        method: 'GET',
        dataType: 'json',
        data: { excludedOrders: Array.from(orderset) },  // Send excluded orders
        success: function(data) {
          console.log(data);
            if (data.newOrder) {
                // Show the modal only if the order is not already in the set of rejected orders
                if (!orderset.has(data.orderid)) {
                    $('#deliveryModal').modal('show');
                    $('#orderDetails').html(data.orderDetails);
                    console.log("GG");
                    $('#acceptOrder').off('click').on('click', function() {
                        // Accept order logic
                        $.post('../Ajax_files/accept_order.php', { orderid: data.orderid }, function(response) {
                            if (response.success) {
                                $('#deliveryModal').modal('hide');
                            }
                        }, 'json');
                    });

                    $('#canclemodal').off('click').on('click', function() {
                        $('#deliveryModal').modal('hide');
                        orderset.add(data.orderid);  // Add to rejected orders
                    });
                }
            } else {
              $('#deliveryModal').modal('hide');
              console.log("changed");
                // Don't hide the modal unless the status is actually changed to "accepted"
                if (data.orderStatusChanged) {

                    $('#deliveryModal').modal('hide');
                }
            }
        }
    });
}, 1000);  // Poll every second
  // Poll every second


</script>
</body>
</html>
