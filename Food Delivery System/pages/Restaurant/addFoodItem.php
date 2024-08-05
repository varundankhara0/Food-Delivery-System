<?php
include "checkowner.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Add Food Item</title>
    <style>
        .error {
            color: red;
            display: none;
            margin-top: 5px;
        }
    </style>
</head>
<body>
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
