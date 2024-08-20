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

<?php 
require('../../razorpay-php-2.9.0/Razorpay.php');
use Razorpay\Api\Api;


$api = new Api('rzp_test_qxeuAYL6jOqDSW', 'IxoRKz8mHWNvDpWmN5n74wpI');
$orderData = [
    'receipt'         => 'order_rcptid_'.rand(10000,99999).'',
    'amount'          => $totalPrice*100, // amount in the smallest currency unit (e.g., 50000 paise = ₹500)
    'currency'        => 'INR',
    'payment_capture' => 1 // auto-capture payment after authorization
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];

?>

<form action="verifypayment.php" method="POST">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_test_qxeuAYL6jOqDSW"
        data-amount="<?php echo ($totalPrice*100)?>" // amount in the smallest currency unit
        data-currency="INR"
        data-order_id="<?php echo $razorpayOrderId; ?>"
        data-buttontext="Pay with Razorpay"
        data-name="Luminor Delivery"
        data-description="Test Transaction"
        data-image="../../images/logo.png"
        data-prefill.name="Gaurav Kumar"
        data-prefill.email="gaurav.kumar@example.com"
        data-prefill.contact="9999999999"
        data-theme.color="#f44336"
    ></script>
    <input type="hidden" name="hidden">
</form>
