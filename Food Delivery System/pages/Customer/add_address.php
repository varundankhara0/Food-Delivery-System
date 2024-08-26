<?php
include "../../chcekcustomer.php";
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
    <title>Luminar Food</title>
    <script src="../../js/disable.js"></script>
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/fontawesome.css">
    <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../../css/owl.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
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
            background-color: #ff0038;
            position: relative;
        }

        .header-top {
            background-color: #d30d0d;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .header-bottom {
            background-color: #d30d0d;
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
            background-color: #d30d0d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error {
            color: red;
            display: none;
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

        nav {
            background-color: #d30d0d;
            display: flex;
            justify-content: space-around;
            border-radius: 0px 0px 50px 50px;
            align-items: center;
        }

        ul {
            display: flex;
            list-style: none;
            text-decoration: none;
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

        /* ------------------------ */
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
    <nav>
        <div><img src="../../images/logo.png"></div>
        <div>
            <ul>
                <li><a href="../Landing/index.php">Home</a></li>
                <li><a href="#">Our Shop</a></li>
                <li><a href="#">Product Details</a></li>
                <li><a href="#">Contact US</a></li>
                <li><a href="#">SIGN IN</a></li>
            </ul>
        </div>
    </nav>

    <div class="form-section">
        <h1>Customer's Address Registration</h1>
        <form method="post" action="#" enctype="multipart/form-data" id="user-form" novalidate>
            <div class="form-group">
                <label for="flatno">Door/Flat No.:</label>
                <input type="text" name="flatno" id="flatno" placeholder="Enter Your Flat No" required>
                <div id="flatno-error" class="error">Please enter your flat number.</div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" placeholder="Enter Your Address" required></textarea>
                <div id="address-error" class="error">Please enter your address.</div>
            </div>
            <div id="suggestions" class="autocomplete-suggestions"></div>
            <div class="form-group">
                <label for="landmark">Landmark:</label>
                <textarea name="landmark" id="landmark" placeholder="Enter Nearby Landmark [optional]"></textarea>
                <div id="landmark-error" class="error">Please enter a landmark.</div>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" id="type" required>
                    <option value="h">Home</option>
                    <option value="w">Work</option>
                </select>
                <div id="type-error" class="error">Please select an address type.</div>
            </div>
            <div class="form-group">
                <label for="type">area:</label>
                <select name="areaid" id="area" required>
                    <option>choose locality</option>
                    <?php
                    include "../../connection.php";
                    $query = "select * from tbl_area";
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_array()) {


                    ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>

                    <?php
                    } ?>
                </select>
                <div id="area-error" class="error">Please select area.</div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
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


    <script type="text/javascript">
        // Disable right-click
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        function ctrlShiftKey(e, keyCode) {
            return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
        }

        document.onkeydown = (e) => {
            if (
                e.keyCode === 123 ||
                ctrlShiftKey(e, 'I') ||
                ctrlShiftKey(e, 'J') ||
                ctrlShiftKey(e, 'C') ||
                (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
            )
                return false;
        };
    </script>


    <script>
        $(document).ready(function() {
            $('#user-form').on('submit', function(e) {
                e.preventDefault();
                let valid = true;

                const flatNo = $('#flatno').val().trim();
                const address = $('#address').val().trim();
                const landmark = $('#landmark').val().trim();
                const type = $('#type').val();
                const area = $('#area').val();

                if (!flatNo) {
                    $('#flatno-error').show();
                    valid = false;
                } else {
                    $('#flatno-error').hide();
                }

                if (!address) {
                    $('#address-error').show();
                    valid = false;
                } else {
                    $('#address-error').hide();
                }



                if (!type) {
                    $('#type-error').show();
                    valid = false;
                } else {
                    $('#type-error').hide();
                }
                if (!area) {
                    $('#area-error').show();
                    valid = false;
                } else {
                    $('#area-error').hide();
                }
                const formData = new FormData(this);

                if (valid) {
                    $.ajax({
                        url: '../Ajax_files/Register_Address.php',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == true) {
                                alert("User's Address was added succesfully");
                                window.location = '../Customer/index.php';
                            } else {
                                alert(response);
                                alert("User's Address was not added succesfully");
                                window.location = '../Customer/index.php';

                            }
                        },
                        error: function(error) {
                            alert('There was an error submitting the form.');
                        }
                    });
                }
            });
        });
    </script>
    <script>
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        const fetchSuggestions = debounce(function(input) {
            if (input.length < 3) {
                document.getElementById('suggestions').innerHTML = '';
                return;
            }
            const location = '21.174567814302158,72.83139430283721';
            const apiKey = 'PEDy9RDQZovqNa0v5z43MovpPUOQNBeXE2RiVdAg';
            const url = `https://api.olamaps.io/places/v1/autocomplete?location=${location}&input=${input}&api_key=${apiKey}`;

            fetch(url, {
                    headers: {
                        'X-Request-Id': 'your-request-id'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('API Response:', data);
                    const suggestionsDiv = document.getElementById('suggestions');
                    suggestionsDiv.innerHTML = '';
                    if (data.predictions && data.predictions.length > 0) {
                        data.predictions.forEach(prediction => {
                            const suggestionDiv = document.createElement('div');
                            suggestionDiv.className = 'autocomplete-suggestion';
                            suggestionDiv.textContent = prediction.description; // Use 'description' property
                            suggestionDiv.addEventListener('click', () => {
                                const {
                                    lat,
                                    lng
                                } = prediction.geometry.location;
                                callsublocality(lat, lng);
                                document.getElementById('address').value = prediction.description; // Use 'description' property
                                suggestionsDiv.innerHTML = '';
                            });
                            suggestionsDiv.appendChild(suggestionDiv);
                        });
                    } else {
                        console.error('No predictions found in the response');
                    }
                })
                .catch(error => console.error('Error fetching autocomplete suggestions:', error));
        }, 300);

        document.getElementById('address').addEventListener('input', function() {
            fetchSuggestions(this.value);
        });

        function callsublocality(lat, log) {
            var count = 0;
            // const location = '19.265980587014074,72.96698942923868';
            const apiKey = 'PEDy9RDQZovqNa0v5z43MovpPUOQNBeXE2RiVdAg';
            const url = `https://api.olamaps.io/places/v1/reverse-geocode?latlng=${lat}%2C${log}&api_key=${apiKey}`;

            fetch(url, {
                    headers: {
                        'X-Request-Id': 'your-request-id'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (getlocality(data) == false) {
                        alert("The address should belong to Surat only");
                        return;
                    }
                    getSublocality(data);
                    console.log(count++);
                });
        }

        function getSublocality(apiResponse) {
            var count = 0;
            var results = apiResponse.results;
            var sublocalities = new Set(); // Use a set to track unique sublocalities

            for (let i = 0; i < results.length; i++) {
                const addressComponents = results[i].address_components;
                for (let j = 0; j < addressComponents.length; j++) {
                    if (addressComponents[j].types.includes("sublocality")) {
                        const sublocality = addressComponents[j].long_name;
                        if (!sublocalities.has(sublocality)) {
                            sublocalities.add(sublocality);
                            console.log(sublocality);
                            if (matchAreaWithSublocality(sublocality) === "ok") {
                                console.log("done");
                                return;
                            } else {

                            }
                        }
                    }
                }
            }
            alert(`No match found for sub-locality please choose manually`);
            return null;
        }

        function getlocality(apiResponse) {
            var count = 0;
            var results = apiResponse.results;
            var sublocalities = new Set(); 

            for (let i = 0; i < results.length; i++) {
                const addressComponents = results[i].address_components;
                for (let j = 0; j < addressComponents.length; j++) {
                    if (addressComponents[j].types.includes("locality")) {
                        const locality = addressComponents[j].long_name;
                        if (locality === "Surat") {

                            return true;
                        } else {
                            document.getElementById('address').value = '';
                            return false;
                        }
                    }
                }
            }
            alert(`No match found for sub-locality please choose manually`);
            return null;
        }

        function matchAreaWithSublocality(sublocalityName) {
            const areaSelect = document.getElementById('area');
            const options = areaSelect.options;

            for (let i = 0; i < options.length; i++) {
                if (options[i].text.toLowerCase() === sublocalityName.toLowerCase()) {
                    areaSelect.value = options[i].value;
                    console.log(`Matched area: ${options[i].text} with sub-locality: ${sublocalityName}`);

                    return "ok";
                }
            }

            return null;
        }
    </script>
    <script src="../../js/jquery/jquery.min.js"></script>
    <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/counter.js"></script>
    <script src="../../js/custom.js"></script>

</body>

</html>