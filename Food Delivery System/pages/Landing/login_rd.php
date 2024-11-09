<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <!-- <title>Lugx Gaming - Shop Page</title> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Luminar Food</title>
    <script src="../../js/disable.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* <!-- .header-area .main-nav .logo {
            display: flex;
            justify-content:left;
        
        } --> */

        /* <!-- .header-area .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
        } --> */
        /* Popup container */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-button {
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
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
            margin: 80px 100px 0px 100px;
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


        .form-section input[type="email"] {
            width: 221%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-section input[type="file"] {
            width: 101%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;

        }

        .form-section input[type="password"] {
            width: 197%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;

        }

        .form-section input[type="text"],
        .form-section input[type="number"] {
            width: 217%;
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

        .form-group {
            display: flex;
            justify-content: space-between;
        }

        .form-group .form-control {
            width: 48%;
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
            border-radius: 25px;
        }

        /* footer {
            margin-top: 180px;
            background-color: #a120a1;
            background-repeat: no-repeat;
            background-size: cover;

            min-height: 200px;
            border-radius: 150px 150px 0px 0px;
        } */
        /* footer {
    margin-top: 150px;
    background-color:#d30d0d ;
    background-repeat: no-repeat;
    background-size: cover;
    color: white;
    min-height: 150px;
    border-radius: 150px 150px 0px 0px;
    } */
    /* footer {
    max-height: 30%;
    border-radius: 110px 110px 0px 0px;
    margin-top: auto;
    background-color: #a120a1;
    padding: 50px 20px;
    text-align: center;
    /* box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1); */
/* } */

footer {
    max-height: 30%;
    border-radius: 110px 110px 0px 0px;

    background-color: #a120a1;
    padding: 30px 20px;
    text-align: center;
    margin-top: 281px; 
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
    max-width: 1200px;
    margin: 0 auto;
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
    <nav>
        <div><img src="../../images/logo.png"></div>
        <div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Our Shop</a></li>
                <li><a href="#">Product Details</a></li>
                <li><a href="#">Contact US</a></li>
                <li><a href="login.php">SIGN IN</a></li>
            </ul>
        </div>
    </nav>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Do you want to register as Restaurant Owner or as Delivery Man?</h2>
            <button class="modal-button" onclick="registerAsOwner()">Restaurant Owner</button>
            <button class="modal-button" onclick="registerAsDeliveryMan()">Delivery Man</button>
        </div>
    </div>

    <div class="form-section">
        <h1>Enter You're User Registered Details</h1>
        <br>
        <form method="post" action="#" enctype="multipart/form-data" id="user-form">

            <div class="inline-inputs">
                <div class="form-group">
                    <label for="email">Email:
                        <input type="text" id="email" name="email" required></label>
                </div>
            </div>

            <div class="inline-inputs">
            </div>
            <div class="inline-inputs">
                <div class="form-group">
                    <label for="pass">Password:
                        <input type="password" id="pass" name="password" required></label>
                </div>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
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
            $('#user-form').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                $.ajax({
                    url: '../Ajax_files/checkrd.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == "invalid user") {
                            alert("please register as an customer and logout before entering this page");

                        } else if (response == "Restaurant Owner") {

                            window.location = '../Restaurant/index.php';
                        } else if (response == "Delivery Man") {

                            window.location = '../Delivery/index.php';
                        } else if (response == "entity") {
                            // alert("do want to register as Restaurant Owner or as Delivery Man");

                            showPopup();
                        } else {
                            alert(response);
                        }
                    },
                    error: function(error) {
                        alert('There was an error submitting the form.');

                    }
                });
            });
        });
    </script>

    <script>
        function showPopup() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        // Close the modal when the user clicks on <span> (x)
        document.querySelector('.close').onclick = function() {
            closeModal();
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                closeModal();
            }
        }

        function registerAsOwner() {
            window.location = '../Restaurant/registration.php';
            closeModal();
            // Add your registration logic here
        }

        function registerAsDeliveryMan() {
            window.location = '../Delivery/registration.php';
            closeModal();
            // Add your registration logic here
        }
    </script>
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="../../js/jquery/jquery.min.js"></script>
    <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/counter.js"></script>
    <script src="../../js/custom.js"></script>

</body>

</html>