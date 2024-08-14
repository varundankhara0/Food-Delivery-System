<?php
include "../../chcekcustomer.php";
function convertToWebPath($filesystemPath)
{
  $webPath = str_replace('\\', '/', $filesystemPath);
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
  <script>
    $(document).ready(function() {
      loadFoodItems();

      $('.filter').on('change', function() {
        loadFoodItems();
      });

      function loadFoodItems(page = 1) {
        var type = $('#filter-type').val();
        var category = $('#filter-category').val();
        var priceRange = $('#filter-price-range').val();

        $.ajax({
          async:true,
          url: '../Ajax_files/fetch_food_items.php',
          type: 'POST',
          data: {
            type: type,
            category: category,
            priceRange: priceRange,
            page: page
          },
          success: function(response) {
            var data = JSON.parse(response);
            displayFoodItems(data.foodItems);
            setupPagination(data.totalItems, data.itemsPerPage, data.currentPage);
          }
        });
      }

      function displayFoodItems(foodItems) {
        var container = $('.trending-box');
        container.empty();
        $.each(foodItems, function(index, item) {
          var foodHtml = `
            <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6">
              <div class="item">
                <div class="thumb">
                  <a href="product-details.html"><img class="productphoto" src="${convertToWebPath(item.image)}" alt=""></a>
                  <span class="price">₹${item.price}</span>
                </div>
                <div class="down-content">
                <span class="category">${item.CategoryName}</span>
              
                   
                  <h4>${item.name}</h4>
                  <span class="category"> From ${item.RestaurantName}</span>
                  <a id="add" onclick='addtocart(${item.id})'><img src="../../images/add-to-basket.png" class="addtocart"></a>
                </div>
              </div>
            </div>`;
          container.append(foodHtml);
        });
      }

      function setupPagination(totalItems, itemsPerPage, currentPage) {
        var pagination = $('.pagination');
        pagination.empty();
        var totalPages = Math.ceil(totalItems / itemsPerPage);
        for (var i = 1; i <= totalPages; i++) {
          var pageItem = `<li><a href="#" class="page-link ${i == currentPage ? 'is_active' : ''}" data-page="${i}">${i}</a></li>`;
          pagination.append(pageItem);
        }
        $('.page-link').on('click', function(e) {
          e.preventDefault();
          var page = $(this).data('page');
          loadFoodItems(page);
        });
      }
    });

    function convertToWebPath(filesystemPath) {
      var webPath = filesystemPath.replace(/\\/g, '/');
      return webPath.replace('C:/xampp/htdocs/', '/');
    }
  </script>
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
              <li><a href="../Landing/index.php" class="active">Home</a></li>
              <li><a href="shop.php">View Food</a></li>
              <li><a href="cart.php">View Cart</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <?php
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
  <script>
 function addtocart(id) {
  $.ajax({
  
    url: '../Ajax_files/addtocart.php',
    method: 'POST',
    data: { 'fooditemid': id },
    success: function(response) {
      if (response == true) {
        alert("Food item added to cart");
      } else if (response === "New restaurant item detected.") {
        // Show the modal asking the user if they want to replace the cart items
        $('#replaceCartModal').modal('show');
        $('#confirmReplace').data('fooditemid', id); // Pass the food item ID to the confirm button
      } else {
        alert(response);
      }
    }
  });
}

// Function to replace items in the cart
function replaceCartItems(fooditemid) {
  $.ajax({
    url: '../Ajax_files/replace_cart_items.php', // A new PHP file to handle replacement
    method: 'POST',
    data: { 'fooditemid': fooditemid },
    success: function(response) {
      if (response === "true") {
        alert("Cart items replaced and new item added.");
      } else {
        alert("Failed to replace items in the cart. Please try again.");
      }
    }
  });
}

$(document).ready(function() {
  $('#confirmReplace').on('click', function() {
    var fooditemid = $(this).data('fooditemid');
    replaceCartItems(fooditemid);
    $('#replaceCartModal').modal('hide');
  });
  $('#canclemodal').on('click', function() {
    $('#replaceCartModal').modal('hide');
  });
});

  </script>
  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
      <!-- <div class="row"> -->
        <div class="col-lg-12">
          <select id="filter-type" class="filter">
            <option value="">All Types</option>
            <option>Veg</option>
            <option value=1>Non-Veg</option>
          </select>
        </div>
        <div class="col-lg-12">
          <select id="filter-category" class="filter">
            <option value="">All Categories</option>
            <?php
            include "../../connection.php";
            $query = "SELECT * FROM tbl_category WHERE status=1";
            $result1 = mysqli_query($conn, $query);
            while ($row1 = mysqli_fetch_array($result1)) {
              echo "<option value='{$row1["id"]}'>{$row1["CategoryName"]}</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-lg-12">
          <select id="filter-price-range" class="filter">
            <option value="">All Prices</option>
            <option value="0-100">₹0 - ₹100</option>
            <option value="101-500">₹101 - ₹500</option>
            <option value="501-1000">₹501 - ₹1000</option>
          </select>
        </div>
        </ul>
      <!-- </div> -->
      <div class="row trending-box">
        <!-- Food items will be dynamically loaded here -->
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <!-- Pagination will be dynamically generated here -->
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

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../../js/jquery/jquery.min.js"></script>
  <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/counter.js"></script>
  <script src="../../js/custom.js"></script>
<!-- Modal -->
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
        You can only order from one restaurant at a time. Do you want to replace the items in your cart with this new item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="canclemodal">Cancel</button>
        <button type="button" id="confirmReplace" class="btn btn-danger">Replace Items</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>