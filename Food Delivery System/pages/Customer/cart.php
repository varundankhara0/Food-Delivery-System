<?php
include "../../chcekcustomer.php";
include "../../connection.php";

function convertToWebPath($filesystemPath)
{
  // Replace backslashes with forward slashes
  $webPath = str_replace('\\', '/', $filesystemPath);

  // Remove the document root part of the path
  $webPath = str_replace('C:/xampp/htdocs/', '/', $webPath);

  return $webPath;
}

$query = "SELECT 
            fi.Name, 
            fi.Image, 
            fi.CategoryID, 
            fi.Price, 
            c.CategoryName, 
            oc.quantity,
            oc.id
          FROM 
            Tbl_fooditem fi
          JOIN 
            Tbl_category c ON  c.ID=fi.CategoryID 
          JOIN 
            Tbl_order_cart oc ON oc.fooditemid=fi.ID
          JOIN 
            Tbl_cart cart ON cart.ID=oc.cartid 
          WHERE 
            cart.UserID =".$_SESSION['userid']."  AND cart.status = 1";

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
</head>

<body>

  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Order Summary</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Image</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if ($result->num_rows > 0) {
                $index = 1;
                while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $index++; ?></td>
                      <td><?php echo $row['Name']; ?></td>
                      <td><img src="<?php echo convertToWebPath($row['Image']); ?>" alt="Food Image" width="100px" height="100px"></td>
                      <td><?php echo $row['CategoryName']; ?></td>
                      <td><?php echo $row['Price']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td> <a id="add"  onclick="deletefromcart(<?php echo $row['id']; ?>)">Delete</a></td>
                    </tr>
                <?php } 
            } else { ?>
                <tr>
                  <td colspan="7" class="text-center">No items found in your cart.</td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function deletefromcart(id) {
      
      $.ajax({
        url: '../Ajax_files/deletefoodfromcart.php',
        method: 'POST',
        data: {
          'id': id
        },
        success: function(response) {
          if (response == true) {
            alert("Item Removed from the cart");
          window.location='cart.php';
          } else {
            alert(response);
          }
        }
      });
    }
  </script>
</body>
</html>
