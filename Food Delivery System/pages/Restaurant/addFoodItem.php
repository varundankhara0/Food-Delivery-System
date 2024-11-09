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
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <style>
        .error {
            color: red;
            display: none;
            margin-top: 5px;
        }
        /* Reset some default styling for consistency */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* Body and form container styling */
body {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

form {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}

/* Headings */
h1 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: 600;
    color: #333;
}

/* Labels and input elements */
label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #555;
}

input[type="text"],
textarea,
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
}

input:focus,
textarea:focus,
select:focus {
    outline: none;
    border-color: #4CAF50;
}

/* Error messages */
.error {
    display: none;
    color: red;
    font-size: 12px;
    margin-top: -10px;
    margin-bottom: 10px;
}

/* Submit button */
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color:#842fc8;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Optional: style the file input */
input[type="file"] {
    padding: 5px;
    background-color: #fff;
    border: 1px solid #ddd;
    cursor: pointer;
}

select {
    cursor: pointer;
    background-color: #fff;
}

/* Responsive design */
@media (max-width: 768px) {
    form {
        padding: 20px;
    }
}

    </style>
</head>
<body>
    
    <form id="user-form" novalidate>
    <h1>Add Food</h1>
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
        <button type="submit" name="submit"><a href="index.php">Back</a></button>
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
