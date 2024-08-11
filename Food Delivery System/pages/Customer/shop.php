<?php
include "../../chcekcustomer.php";
function convertToWebPath($filesystemPath)
{
  // Replace backslashes with forward slashes
  $webPath = str_replace('\\', '/', $filesystemPath);

  // Remove the document root part of the path
  $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);

  return $webPath;
}
// session_start();
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
  <!-- <script src="../../js/disable.js"></script> -->
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
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

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <?php include "../../connection.php";
        $query = "select * from tbl_category where status=1";
        $result1 = mysqli_query($conn, $query);
        while ($row1 = mysqli_fetch_array($result1)) {
        ?>
          <!-- <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li> -->
          <li>
            <a href="#!" data-filter=".<?php echo $row1["id"]; ?>"><?php echo $row1["CategoryName"]; ?></a>
          </li>
          <!-- <li>
          <a href="#!" data-filter=".str">Strategy</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Racing</a>
        </li> -->
        <?php
        }
        ?>
      </ul>
      <div class="row trending-box">
        <?php
        $query = "select fd.id,fd.name,fd.image,fd.price,fd.description,fd.categoryid,ca.CategoryName,rs.id as restaurantid from tbl_fooditem as fd join tbl_category as ca on ca.id=fd.categoryid join tbl_restaurant as rs on rs.id=fd.restaurantID where fd.status=1 and ca.status=1 and rs.status=1";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 <?php echo $row["categoryid"] ?>">
              <div class="item">
                <div class="thumb">
                  <a href="product-details.php?id=<?php echo $row["id"]; ?>"><img class="productphoto" src="<?php echo convertToWebPath($row["image"]); ?>" alt=""></a>
                  <span class="price">
                    <!-- <em>$36</em>$24 -->
                    ₹<?php echo $row["price"]; ?>
                  </span>
                </div>
                <div class="down-content">
                  <span class="category"><?php echo $row["CategoryName"]; ?></span>
                  <h4><?php echo $row["name"]; ?></h4>
                  <a id="add" onclick='addtocart(<?php echo $row["id"]; ?>,<?php echo $row["restaurantid"]; ?>)'><img src="../../images/add-to-basket.png" class="addtocart"></a>
                </div>
              </div>
            </div>

          <?php
          }
          ?>
          <script src="../../js/jquery/jquery.min.js"></script>
          <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
          <script src="../../js/isotope.min.js"></script>
          <script src="../../js/owl-carousel.js"></script>
          <script src="../../js/counter.js"></script>
          <script src="../../js/custom.js"></script>
        <?php
        }
        ?>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#"> &lt; </a></li>
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div>
    </div>
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
  <script>
    function addtocart(id,rsid) {

      $.ajax({
        url: '../Ajax_files/addtocart.php',
        method: 'POST',
        data: {
          'fooditemid': id
        },
        success: function(response) {
          if (response == true) 
          {
            alert("Food Item added to cart");
          }
          else if(response == "replace") 
          {
            alert("GG");
          }
          else 
          {
            alert(response);
          }
        }
      });
    }
  </script>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->

</body>

</html>