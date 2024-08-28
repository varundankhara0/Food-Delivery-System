<?php
include "checkRegistered.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Lugx Gaming - Shop Page</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* .header-area .main-nav .logo {
            display: flex;
            justify-content: left;

        }

         .header-area .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
        } */

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
            margin-top: 150px;
            background-color: #a120a1;
            background-repeat: no-repeat;
            background-size: cover;

            min-height: 150px;
            border-radius: 150px 150px 0px 0px;
        } */
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
    
footer {
    max-height: 30%;
    border-radius: 110px 110px 0px 0px;
    background-color: #a120a1 ;
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


    <div class="form-section">
        <h1>Restaurant Registration</h1>

        <form method="post" action="#" enctype="multipart/form-data" id="user-form" novalidate>

            <div class="inline-inputs">
                <div class="form-group">
                    <label for="name"> Restaurant Name:
                        <input type="text" id="name" name="name" required></label>
                    <div id="name-error" class="error">Invalid name.</div>
                </div>
            </div>
            <div class="form-group">
                <label for="address"> Restaurant Address:</label>
                <textarea name="address" id="address" placeholder="Enter Your Address" required></textarea>
                <div id="address-error" class="error">Please enter your address.</div>
            </div>
            <div id="suggestions" class="autocomplete-suggestions"></div>
            <div class="form-group">
                <label for="phone">Restaurant ContactNo:
                    <input type="number" id="phone" name="phoneno" required></label>
                <div id="phone-error" class="error">Invalid phone number. Please use 10 digits.</div>
            </div>
            <div class="form-group">
                <label for="landmark">Opening Time:</label>
                <input type="time" name="opentime" id="opentime" title="Enter the Opening time">
                <div id="landmark-error" class="error">Please enter the Opening time</div>
            </div>
            <div class="form-group">
                <label for="landmark">Closing Time:</label>
                <input type="time" name="closetime" id="closetime" title="Enter the Closing time">
                <div id="landmark-error" class="error">Please enter the Closing time.</div>
            </div>
            <div class="form-group">
                    <label for="name"> GSTIN:
                        <input type="text" id="gstno" name="gstno" required></label>
                    <div id="gstno-error" class="error">Invalid gstno.</div>
                </div>
                <div class="form-group">
                    <label for="name"> LICENSE NO:
                        <input type="text" id="licenseno" name="licenseno" required></label>
                    <div id="licenseno-error" class="error">Invalid license Number.</div>
                </div>
            <div class="form-group">
                <label for="type">Area of Operation:</label>
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
            <div class="form-group">
                <label for="file">Fssai License image:</label>
                <input type="file" name="License" id="Licesnseimage" required><br>
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
    <!-- <script type="text/javascript">//for right click off
    
    document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
 
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
</script> -->
    <script>
        $(document).ready(function() {


            $('#user-form').on('submit', function(e) {
                    e.preventDefault();
                    let valid = true;

                    const nameRegex = /^[a-zA-Z]+(\s[a-zA-Z]+){1,2}$/;
                    const phoneRegex = /^\d{10}$/;
                    const LicenseNo=$("#licenseno").val();



                    const name = $('#name').val();
                    const phone = $('#phone').val();
                    const address = $('#address').val().trim();
                    const opentime = $('#opentime').val();
                    const closetime = $('#closetime').val();
                    const area = $('#area').val();
                    const gstno = $('#gstno').val();
                    if (!area) {
                        $('#area-error').show();
                        valid = false;
                    } else {
                        $('#area-error').hide();
                    }
                    if(!LicenseNo)
                    {
                        $('#licenseno-error').show();
                        valid = false;
                    } else {
                        $('#licenseno-error').hide();
                    }
                    if (!gstno) {
                        $('#gstno-error').show();
                        valid = false;
                    } else {
                        $('#gstno-error').hide();
                    }
                    if (!nameRegex.test(name)) {
                        $('#name-error').show();
                        valid = false;
                    } else {
                        $('#name-error').hide();
                    }
                    if (!phoneRegex.test(phone)) {
                        $('#phone-error').show();
                        valid = false;
                    } else {
                        $('#phone-error').hide();
                    }
                    if (!address) {
                        $('#address-error').show();
                        valid = false;
                    } else {
                        $('#address-error').hide();
                    }
                    if (!area) {
                        $('#area-error').show();
                        valid = false;
                    } else {
                        $('#area-error').hide();
                    }
                    const formData = new FormData(this);
                    if (valid) {
                        alert("valid");

                        $.ajax({
                            url: '../Ajax_files/Register_Restaurant.php',
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response == true) {
                                    alert("User Registeration successfull");
                                    window.location = '../Restaurant/index.php';
                                } else {
                                    alert(response);
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
            const url = `https://api.olamaps.io/places/v1/autocomplete?location=${location}&input=${input}&strictbounds=true&api_key=${apiKey}`;

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
            const location = '19.265980587014074,72.96698942923868';
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
            var sublocalities = new Set(); // Use a set to track unique sublocalities

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
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/counter.js"></script>
    <script src="../../js/custom.js"></script>

</body>

</html>