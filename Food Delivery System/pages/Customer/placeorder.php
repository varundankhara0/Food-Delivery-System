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
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

    footer {


      max-height: 30%;
      background-color: #d30d0d;
      padding: 50px 20px;
      text-align: center;
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

    .addtocart {
      height: 16px;
      width: 20px;
    }

    /* -------------- */
    .trending ul.pagination li a {

      margin-top: 1000px;
      display: inline-block;
      width: 40px;
      height: 40px;
      line-height: 40px;
      text-align: center;
      background-color: #eee;
      color: #1e1e1e;
      font-size: 15px;
      font-weight: 600;
      border-radius: 50%;
      transition: all .3s;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>Payment Summary</h2>
    <p>Total Quantity: <?php echo $totalQuantity; ?></p>
    <p>Total Price: ₹<?php echo $totalPrice; ?></p>
    <p>Payment Mode <select name="paymentmode" id="pm">
        <option value="online">Online Mode</option>
        <option value="cashpayment">Cash Payment</option>
      </select></p>

    <button id="pc">Place Order</button>

  </div>
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
        if (mode == "cashpayment") {
     $.ajax({

          url: '../Ajax_files/placeorder.php',
          method: 'POST',
          data: {
            'mode': 'cash',
            'amount':<?php echo $totalPrice; ?>
          },
          success: function(response) {
              if(response==true)
              {
                alert("order has been placed successfully");
                window.location='index.php';
              }
              else
              {
                if(response=="nocart")
              {
                alert("there was an error while retriving you\'re cart details")
                window.location="index.php";
              }
              else
              {
                alert(response);
              }
              }
          }
        });
        }
        else
        {
          window.location="payment.php";
        }
      });
    });
  </script>
  <div class="modal fade" id="replaceCartModal" tabindex="-1" role="dialog" aria-labelledby="replaceCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="replaceCartModalLabel">Replace Cart Items?</h5>
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