<?php
Session_start();
include "../../connection.php";

$id = intval($_GET['id']);

$qu = "SELECT * from tbl_fooditem WHERE id = $id";
$q = mysqli_query($conn, $qu);
$r = mysqli_fetch_assoc($q);

if (!$r) {
    die("Record not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Item Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

.header-area .main-nav .menu-trigger {
            position: absolute;
            right: 20px;
        }

        .col-lg-12 {
            flex: 0 0 auto;
            width: 7%;
        }

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
}

.header-area {
    background-color: #f900ff;
    position: relative;
}

.header-top {
    background-color: #ff0038;
    border-bottom-left-radius: 100px;
    border-bottom-right-radius: 100px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.header-bottom {
    background-color: #ff0038;
    border-top-left-radius: 100px;
    border-top-right-radius: 100px;
    height: 100px;
}

.header-area .logo img {
    width: 60px;
}

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

        .form-section input[type="time"] {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-section input[type="text"],
        .form-section input[type="date"],
        .form-section input[type="password"],
        .form-section input[type="number"],
        .form-section input[type="email"],
        .form-section input[type="file"],
        .form-section textarea,
        .form-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-section button[type="submit"] {
            background-color: #a120a1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .autocomplete-suggestions {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
        }

        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error {
            color: red;
            display: none;
        }

        .inline-inputs {
            display: flex;
            justify-content: space-between;
        }

        .inline-inputs .form-group {
            flex: 1;
            margin-right: 10px;
        }

        .inline-inputs .form-group:last-child {
            margin-right: 0;
        }

        .form-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container {
            display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 100px 20px 0px 40px;
}

nav {
    background-color: #a120a1;
    display: flex;
    justify-content: space-around;
    border-radius: 0px 0px 50px 50px;
    align-items: center;
}

ul {
    list-style: none;
    text-decoration: none;
    display: flex;
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
    border-radius: 20px;
}

footer {
    max-height: 30%;
    border-radius: 50px 50px 0px 0px;
    background-color: #a120a1 ;
    padding: 30px 740px;
    text-align: center;
    margin-top: 210px;
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
    font-size: 20px;
    margin-bottom: 10px;
    color: #fff;
}

.footer-left p {
    color: #ddd;
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
    color: #ddd;
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
        <div><img src="../../images/logo.png"></div>
        <div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="addFoodItem.php">Add Product</a></li>
                      <li><a href="product-details.html">Order History</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
                      <li style="color: #fff;">online status
                        <label class="switch">
                          <input type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </li>
            </ul>
        </div>
    </nav>

    <div class="form-container">
        <h2>Food Item Form</h2>
        <form id="update_food">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="number" name="id" id="" value="<?php echo $r['id']; ?>" hidden>
                <input type="text" id="name" name="name" value="<?php echo $r['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required><?php echo $r['Description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" id="price" name="price" value="<?php echo $r['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="">
                    <?php
                    if ($r["type"] == 0) {
                    ?>
                        <option value=0 selected>Veg</option>
                        <option value=1>Non-Veg</option>
                    <?php
                    } else {
                    ?>
                        <option value=0>Veg</option>
                        <option value=1 selected>Non-Veg</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="categoryid">Category ID</label>
                <select name="categoryid" id="">
                    <?php
                    $query = "select * from tbl_category where status=1";
                    $result1 = mysqli_query($conn, $query);
                    while ($row = $result1->fetch_assoc()) {
                    ?>
                        <option value=<?php echo $row["id"]; ?> <?php if ($r["categoryid"] == $row["id"]) {echo "selected";} ?>><?php echo $row["CategoryName"]; ?></option>

                    <?php
                    }
                    ?>

                </select>
            </div>
            <!-- <div class="form-group">
                <label for="restaurantID">Restaurant ID</label>
                <input type="number" id="restaurantID" name="restaurantID"  required>
            </div> -->
            <!-- <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" step="0.1" id="rating" name="rating" required>
            </div> -->
            <!-- <div class="form-group">
                <label for="totalratingdone">Total Rating Done</label>
                <input type="number" id="totalratingdone" name="totalratingdone" required>
            </div> -->
            <!-- <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div> -->
            <!-- <div class="form-group">
                <label for="dateadded">Date Added</label>
                <input type="date" id="dateadded" name="dateadded" required>
            </div> -->
            <div class="form-group">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <footer>
            
            <div class="footer-content">
                <div class="footer-left">
                    <h3 style="color: white;">Luminor's delivery</h3>
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
                $("#update_food").submit(function(event) {
                    event.preventDefault();
                    const form = new FormData(this);
                    $.ajax({
                        url: '../Ajax_files/update_fooditem.php',
                        method: 'POST',
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response == true) {
                                alert("food item updated successfully");
                                window.location = 'ViewFoodItems.php';
                            } else {
                                alert(response);
                            }

                        }
                    })
                })
            });
        </script>

    </div>
</body>

</html>