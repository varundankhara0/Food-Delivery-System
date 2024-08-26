<?php 
include "checkowner.php";
function encrypt($plaintext, $key, $iv) {
    return openssl_encrypt($plaintext, 'AES-128-CBC', $key, 0, $iv);
}
$key = 'mysecretkey12345';
$iv = '1234567890123456';
$query="SELECT od.id AS orderid, area.name AS address, SUM(oc.quantity) AS total_quantity FROM tbl_order AS od JOIN tbl_cart AS cart ON cart.id = od.cartid JOIN tbl_order_cart AS oc ON oc.cartid = od.cartid JOIN tbl_fooditem AS fd ON fd.id = oc.fooditemid JOIN tbl_restaurant AS rt ON rt.id = fd.restaurantID JOIN tbl_user AS user ON user.id = cart.userid JOIN tbl_customer_address AS ca ON ca.id = od.addressid JOIN tbl_area as area on area.id=ca.areaid WHERE od.status = 'o' AND rt.id = ".$_SESSION["restaurantid"]." AND rt.status = 1 GROUP BY od.id, ca.address;";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminor Delivery</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
</head>
<body>
    <table>
        <tr>
            <th>order id</th>
            <th>total quantity</th>
            <th>address of delivery</th>
            <th>action</th>
        </tr>
        
            <?php 
            include "../../connection.php";
            $result=mysqli_query($conn,$query);
            while($row=$result->fetch_assoc())
            {
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
    <script>
        function view(id){
            window.location='vieworder.php?oi='+id;
        }
    </script>
</body>
</html>