<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Luminor Delivery</title>
  <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>
<body>

<?php 
require('../../razorpay-php-2.9.0/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\Error;

$api = new Api('rzp_test_qxeuAYL6jOqDSW', 'IxoRKz8mHWNvDpWmN5n74wpI');

$attributes = array(
    'razorpay_order_id' => $_POST['razorpay_order_id'],
    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
    'razorpay_signature' => $_POST['razorpay_signature']
);

try {
    $api->utility->verifyPaymentSignature($attributes);
    
    $payment=$api->payment->fetch($_POST['razorpay_payment_id']);
    $paymentDetails = $payment->toArray();
    
    // Display the payment details
    $paymentid=$paymentDetails["id"];
    $paymentamount=$paymentDetails["amount"];
    ?>
    <script>
             $.ajax({

url: '../Ajax_files/placeorder.php',
method: 'POST',
data: {
  'mode': 'online',
  'amount':'<?php echo $paymentDetails["amount"] ?>',
  'transcationid':'<?php echo $_POST['razorpay_payment_id'];?>'
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
    </script>
    <?php
    // Payment successful, update your database
    echo "Payment successful!";
    
} catch(Error $e) {
    // Payment failed
    echo "Payment failed! ".$e;
}

?>
    
    </body>
</html>