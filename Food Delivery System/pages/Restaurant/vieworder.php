<?php
include "checkowner.php";
include "../../connection.php";

$key = 'mysecretkey12345'; // 16 bytes key (128-bit)
$iv = '1234567890123456';
function decrypt($ciphertext, $key, $iv)
{
    return openssl_decrypt($ciphertext, 'AES-128-CBC', $key, 0, $iv);
}
$orderid = decrypt($_GET["oi"], $key, $iv);


function convertToWebPath($filesystemPath)
{
    $webPath = str_replace('\\', '/', $filesystemPath);
    $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);
    return $webPath;
}
$totalAmount = 0;
$query = "SELECT 
            fi.Name, 
            fi.Image, 
            fi.CategoryID, 
            fi.Price, 
            c.CategoryName, 
            oc.quantity,
            od.id,od.status 
            FROM 
                tbl_order od
            JOIN
                tbl_cart cart on cart.id=od.cartid
            Join 
                tbl_order_cart oc on oc.cartid=cart.id
            JOIN 
                tbl_fooditem fi on fi.id=oc.fooditemid
            JOIN
                tbl_category c on c.id=fi.categoryid
            JOIN
                tbl_user user on user.id=cart.userid
            JOIN 
                tbl_customer_address ca on ca.id=od.addressid
            WHERE od.id=" . $orderid;


$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <title>Luminor Delivery</title>
    <script src="../../js/disable.js"></script>
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/fontawesome.css">

    <link rel="stylesheet" href="../../css/owl.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../css/rd_index.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h3 {
            color: white;
        }

        footer {
            max-height: 30%;

            background-color: #a120a1;
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
                            <?php
                            $status="";
                            if (isset($_SESSION["user"])) {
                            ?>
                                <li><a href="./profil.php" class="login-btn"><?php echo $_SESSION["user"]; ?></a></li>

                            <?php
                            } else {
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
                    <h3>Order Summary</h3>
                    <span class="breadcrumb"><a href="index.php">Home</a></span>
                </div>
            </div>
        </div>
    </div>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Orders</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>sr.no</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $index = 1;
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $index++; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><img src="<?php echo convertToWebPath($row['Image']); ?>" alt="Food Image" width="100px" height="100px"></td>
                                    <td><?php echo $row['CategoryName']; ?></td>
                                    <td><?php echo $row['Price']; ?></td>
                                    <td><?php echo $row['quantity']; 
                                    $status=$row["status"];
                                    ?></td>
                                    
                                </tr>
                                
                            <?php }
                            if($status=="o")
                            {
                                ?>
                                     <tr>
                            <td colspan="7" class="text-center"><button id="acceptorder">Accept Order</button></td>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-center"><button id="cancelorder">Cancel Order</button></td>
                        </tr>
                                <?php
                            }
                            ?>
                                
                            <?php 
                        } else { ?>
                            <tr>
                                <td colspan="7" class="text-center">No items found in your order.</td>
                            </tr>


                        <?php } ?>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../js/jquery/jquery.min.js"></script>
    <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/counter.js"></script>
    <script src="../../js/custom.js"></script>

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
    <script>
        $(document).ready(function() {
            $("#acceptorder").click(function() {
                $.ajax({

                    url: '../Ajax_files/updateorderstatus.php',
                    method: 'POST',
                    data: {
                        'status': 'a',
                        'orderid': <?php echo $orderid; ?>
                    },
                    success: function(response) {
                        if (response == true) {
                            alert("order status has been changed successfully");
                            window.location = 'index.php';
                        } else {

                            alert(response);

                        }
                    }
                });
            });
            $("#cancelorder").click(function() {
                $('#js-preloader').removeClass('loaded');
                $.ajax({
                    async:true,
                    url: '../Ajax_files/updateorderstatus.php',
                    method: 'POST',
                    data: {
                        'status': 'rc',
                        'orderid': <?php echo $orderid; ?>
                    },
                    success: function(response) {
                        if (response == true) {
                            $.ajax({
                                async:true,
                                url:'../../Authentication/restaurantcancle.php',
                                method:'POST',
                                data:{
                                    'orderid': <?php echo $orderid; ?>
                                },
                                success:function(response)
                                {
                                    if(response==true)
                                    {
                                        $('#js-preloader').addClass('loaded');
                                        alert("order was cancelled successfully");
                                        window.location = 'index.php';
                                    }
                                    else
                                    {
                                        alert(response);
                                    }   
                                }
                            })
                            
                        } else {
                            alert(response);
                        }
                    }
                });
            })
        })
    </script>

</body>

</html>