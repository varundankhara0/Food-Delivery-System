<?php
include "checkowner.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Luminor Delivery</title>
  <script src="../../js/disable.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../css/fontawesome.css">
  <link rel="stylesheet" href="../../css/rd_index.css">
  <link rel="stylesheet" href="../../css/owl.css">
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
<style>

*{
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
.productphoto{
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

  

</style>
</head>
<body>
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
              <li><a href="#">View Food</a></li>
              <li><a href="#">View Cart</a></li>
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
           <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
            


          </nav>
        </div>
      </div>
    </div>
  </header>
    <h1>Add Food</h1>
    <form id="user-form" novalidate>
        <label for="name">Food Item Name</label>
        <input type="text" name="name" id="name" required>
        <div id="name-error" class="error">Invalid name. Please use alphabetic characters and spaces only.</div>
        
        <label for="description">Food Item Description</label>
        <textarea name="description" id="description" required></textarea>
        <div id="description-error" class="error">Description is required.</div>
       
        <label for="price">Food Item Price</label>
        <input type="text" name="price" id="price" required>
        <div id="price-error" class="error">Invalid price. Please enter a numeric value.</div>
        
        <label for="foodimage">Food Item Image</label>
        <input type="file" name="foodimage" id="foodimage" required>
        <div id="image-error" class="error">Image is required.</div>
        
        <label for="Type">Food Type</label>
        <select name="Type" id="Type">
            <option value="0">Veg</option>
            <option value="1">Non-Veg</option>
        </select>
        
        <label for="Category">Food Category</label>
        <select name="Category" id="Category">
            <option value="">Choose a category</option>
            <?php 
                include "../../connection.php";
                $query = "SELECT * FROM tbl_category WHERE status = 1";
                $result = mysqli_query($conn, $query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["CategoryName"] . '</option>';
                }
            ?>
        </select>
        <div id="category-error" class="error">Please select a category.</div>
        
        <input type="submit" name="submit" value="Submit">
    </form>
    
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
            $('#user-form').on('submit', function(e) {
                e.preventDefault();
                let valid = true;

                const nameRegex = /^[a-zA-Z\s]+$/;
                const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;

                const name = $('#name').val();
                const description = $('#description').val();
                const price = $('#price').val();
                const category = $('#Category').val();
                const foodimage = $('#foodimage').val();

                
                if (!nameRegex.test(name)) {
                    $('#name-error').show();
                    valid = false;
                } else {
                    $('#name-error').hide();
                }

                
                if (description.trim() === '') {
                    $('#description-error').show();
                    valid = false;
                } else {
                    $('#description-error').hide();
                }

               
                if (!priceRegex.test(price)) {
                    $('#price-error').show();
                    valid = false;
                } else {
                    $('#price-error').hide();
                }

                
                if (category === '') {
                    $('#category-error').show();
                    valid = false;
                } else {
                    $('#category-error').hide();
                }

                
                if (foodimage === '') {
                    $('#image-error').show();
                    valid = false;
                } else {
                    $('#image-error').hide();
                }

                if (valid) {
                    const formData = new FormData(this);
                    $.ajax({
                        url: '../Ajax_files/Register_Fooditem.php',
                        method: 'POST',
                        data: formData,
                        contentType: false, 
                        processData: false,
                        success: function(response) {
                            if (response == true) {
                                alert("Food Item Registration successful");
                                window.location = "index.php";
                            } else {
                                if (response === "image error") {
                                    alert("Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.");
                                } else {
                                    alert("Failed: " + response);
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
