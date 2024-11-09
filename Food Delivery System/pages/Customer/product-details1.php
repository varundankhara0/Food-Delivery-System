<?php
include "../../chcekcustomer.php";

// Function to convert the file system path to a web path
function convertToWebPath($filesystemPath)
{
    $webPath = str_replace('\\', '/', $filesystemPath);
    $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);
    return $webPath;
}
$key = 'mysecretkey12345';
      $iv = '1234567890123456';
function decrypt($ciphertext, $key, $iv)
{
    return openssl_decrypt($ciphertext, 'AES-128-CBC', $key, 0, $iv);
}
//$orderid = decrypt($_GET["oi"], $key, $iv);
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fds";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve food item ID from the GET parameter
if (isset($_GET['foodItemsid'])) {
    // $foodItemId = intval($_GET['foodItemsid']);
    $foodItemId =decrypt($_GET["foodItemsid"], $key, $iv);
} else {
    echo "No food item selected.";
    exit;
}

// SQL query to fetch food item details
$sql = "SELECT id, name, Description, price, image, type, categoryid, restaurantID, rating, totalratingdone, status, dateadded 
        FROM tbl_fooditem WHERE id=$foodItemId";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Details page</title>
        <link rel="stylesheet" href="styles.css">
        <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .product-container {
            display: flex;
            background-color: #ffffff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            gap: 24px;
        }
        
        .product-image img {
            width: 300px;
            height: auto;
            border-radius: 8px;
        }
        
        .product-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
        }
        
        h1 {
            font-size: 26px;
            color: #333;
            margin-bottom: 12px;
        }
        
        .price {
            display: flex;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 16px;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #888;
            font-size: 18px;
        }
        
        .new-price {
            color: #27ae60;
            font-size: 24px;
            font-weight: bold;
        }
        
        .description {
            margin-bottom: 20px;
            color: #555;
            line-height: 1.6;
        }
        
        .add-to-cart {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 20px;
            align-self: start;
        }
        
        .add-to-cart:hover {
            background-color: #c0392b;
        }
        
        .details {
            font-size: 15px;
            color: #555;
        }
        
        .details p {
            margin-top: 8px;
            line-height: 1.5;
        }
        
        strong {
            font-weight: bold;
        }
       
    </style>
    </head>
    <body>
        <div class="product-container">
            <div class="product-image">
                <img src="<?php echo htmlspecialchars(convertToWebPath($row['image'])); ?>" alt="Food Item Image">
            </div>
            <div class="product-info">
                <h1><?php echo htmlspecialchars($row['name']); ?></h1>
                <div class="price">
                    <span class="new-price">₹<?php echo htmlspecialchars($row['price']); ?></span>
                </div>
                <p class="description">
                    <?php echo htmlspecialchars($row['Description']); ?>
                </p>
                <button class="add-to-cart" onclick="addtocart(<?php echo $row['id']; ?>)">Add to Cart</button>
                <button class="add-to-cart" onclick="window.location='shop.php'">Back</button>
            </div>
        </div>

        <!-- jQuery library (required for AJAX) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function addtocart(id) {
                $.ajax({
                    url: '../Ajax_files/addtocart.php',
                    method: 'POST',
                    data: { 'fooditemid': id },
                    success: function(response) {
                        if (response == true) {
                            alert("Food item added to cart");
                            window.location='shop.php';
                        } else if (response == "New restaurant item detected.") {
                            $('#replaceCartModal').modal('show');
                            $('#confirmReplace').data('fooditemid', id);
                        } else {
                            alert(response);
                        }
                    }
                });
            }
        </script>
    </body>
    </html>
    <?php
} else {
    echo "<p>No food items found.</p>";
}

$conn->close();
?>
