<?php
include "../../chcekcustomer.php";
include "../../connection.php";


$query = "SELECT 
            SUM(oc.quantity) as total_quantity,
            SUM(fi.Price * oc.quantity) as total_price
          FROM 
            Tbl_fooditem fi
          JOIN 
            Tbl_order_cart oc ON oc.fooditemid=fi.ID
          JOIN 
            Tbl_cart cart ON cart.ID=oc.cartid 
          JOIN
            tbl_restaurant as rs on rs.id=fi.restaurantID 
          WHERE 
            cart.UserID =" . $_SESSION['userid'] . "  
            AND cart.status = 1 
            AND rs.status=1";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$totalQuantity = $row['total_quantity'];
$totalPrice = $row['total_price'];
if (!$totalQuantity > 0 || empty($totalQuantity)) {
  echo "<script>alert('Please fill the cart before doing any purchase');window.location='shop.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Luminor Delivery</title>
  <script src="../../js/disable.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Container styling */
.container {
    width: 90%;
    max-width: 400px;
    padding: 20px;
    margin: 100px 50px 50px 750px;
}
/* Header area styling */
.header-area {
    background-color: #ff0038;
    position: relative;
}

.header-top {
    background-color: #d30d0d;
    border-bottom-left-radius: 100px;
    border-bottom-right-radius: 100px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.header-bottom {
    background-color: #d30d0d;
    border-top-left-radius: 100px;
    border-top-right-radius: 100px;
    height: 100px;
}

.header-area .logo img {
    width: 60px;
}

/* Form section styling */
.form-section {
    text-align: center;
    padding: 40px 20px;
}

.form-section form {
    display: inline-block;
    text-align: left;
    width: 100%;
    max-width: 600px;
}

.form-section label {
    display: block;
    margin: 10px 0 5px;
}

.form-section input[type="text"],
.form-section input[type="date"],
.form-section input[type="password"],
.form-section input[type="number"],
.form-section input[type="email"],
.form-section input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-section button[type="submit"] {
    background-color: #d30d0d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form-group {
    margin-bottom: 20px;
}

.error {
    color: red;
    display: none;
}

/* Navigation styling */
nav {
    background-color: #d30d0d;
    display: flex;
    justify-content: space-around;
    border-radius: 0px 0px 50px 50px;
    align-items: center;
}

ul {
    display: flex;
    list-style: none;
}

img {
    width: 80px;
}

li {
    padding-left: 30px;
    padding-right: 30px;
    align-items: center;
}

a {
    text-decoration: none;
    color: #f8f9fa;
}

li:hover {
    background-color: rgb(7, 27, 21);
    border-radius: 25px;
}

/* Footer styling */
footer {
    background-color: #d30d0d;
    padding: 60px 20px;
    text-align: center;
    margin-top: auto; /* Pushes the footer to the bottom */
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
    max-width: 1200px;
    margin: 0 auto;
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
<nav>
    <div><img src="../../images/logo.png"  ></div>
    <div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Our Shop</a></li>
            <li><a href="#">Product Details</a></li>
            <li><a href="#">Contact US</a></li>
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
                        <li><a href="login.php" class="login-btn">Sign In</a></li>        
                        <?php
                    } 
                ?>
                <li><a href="complaint.php">Complaint</a></li>
        </ul>
    </div>
   </nav>


  <div class="container" >
    <h2>Payment Summary</h2>
    <p>Total Quantity: <?php echo $totalQuantity; ?></p>
    <p>Total Price: ₹<?php echo $totalPrice; ?></p>
    <p>Payment Mode <select name="paymentmode" id="pm">
        <option value="online">Online Mode</option>
        <option value="cashpayment">Cash Payment</option>
      </select></p>
    <h3>Select Delivery Address</h3>



    <select name="address" id="address-select">

      <?php
      $query = "select * from tbl_customer_address where userid=" . $_SESSION["userid"] . " and status = 1";
      $result1 = mysqli_query($conn, $query);
      if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
      ?>
          <option value=<?php echo $row1["id"]; ?> title=""><?php echo $row1["doorno"]; ?><?php echo $row1["address"]; ?></option>
      <?php
        }
      }
      ?>
    </select><br>
    <br>
    <button id="pc">Place Order</button>

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

  <script>
    $(document).ready(function() {
      $("#pc").click(function() {
        $('#replaceCartModal').modal('show');
        $('#canclemodal').on('click', function() {
          $('#replaceCartModal').modal('hide');
        });


      });
      $("#confirmorder").click(function() {

        var mode = $("#pm").val();
        $.ajax({
          url: '../Ajax_files/abbressid.php',
          method: 'POST',
          data: {
            'address': $("#address-select").val()
          },
          success: function(response) {
            if (response == true) {
              
            }
          }
        })
        if (mode == "cashpayment") {
          $.ajax({

            url: '../Ajax_files/placeorder.php',
            method: 'POST',
            data: {
              'mode': 'cash',
              'amount': <?php echo $totalPrice; ?>,

            },
            success: function(response) {
              if (response == true) {
                alert("order has been placed successfully");
                window.location = 'index.php';
              } else {
                if (response == "nocart") {
                  alert("there was an error while retriving you\'re cart details")
                  window.location = "index.php";
                } else {
                  alert(response);
                }
              }
            }
          });
        } else {
          window.location = "payment.php";
        }
      });
    });
  </script>
  <div class="modal fade" id="replaceCartModal" tabindex="-1" role="dialog" aria-labelledby="replaceCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="replaceCartModalLabel">Sure this is it?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          Are sure You want to place this order?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="canclemodal">Cancel</button>
          <button type="button" id="confirmorder" class="btn btn-danger">Place Order</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>