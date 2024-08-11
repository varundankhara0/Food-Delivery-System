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
            cart.UserID =".$_SESSION['userid']."  
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
  <title>Payment Summary</title>
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h2>Payment Summary</h2>
  <p>Total Quantity: <?php echo $totalQuantity; ?></p>
  <p>Total Price: ₹<?php echo $totalPrice; ?></p>


</div>

</body>
</html>
