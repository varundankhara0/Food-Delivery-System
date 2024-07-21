<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Luminar Food</title>
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/fontawesome.css">
    <link rel="stylesheet" href="../../css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../../css/owl.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>

        *{
            padding: 0;
            margin: 0;
            box-sizing:border-box ;
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
        .form-section input[type="file"] {
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

        nav{
            background-color: #d30d0d;
            display: flex;
            justify-content: space-around;
            border-radius: 0px 0px 50px 50px;
            align-items: center;
            
        }
        ul{
            display: flex;
                list-style: none;
                text-decoration: none;            
        }
     img {
            width: 80px;
        }
        li{
            padding-left: 30px;
            padding-right: 30px;
            align-items: center;
        }
        a{
            text-decoration: none;
            color: #f8f9fa;
        }
        li:hover{
            background-color: rgb(7, 27, 21);
            border-radius: 25px;
        }
        footer {
            margin-top: 150px;
            background-color:#d30d0d ;
            background-repeat: no-repeat;
            background-size: cover;
            
            min-height: 150px;
            border-radius: 150px 150px 0px 0px;
          }
        
          
    </style>
</head>

<body>
   <nav>
    <div><img src="../../images/logo.png"  ></div>
    <div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Our Shop</a></li>
            <li><a href="#">Product Details</a></li>
            <li><a href="#">Contact US</a></li>
            <li><a href="#">SIGN IN</a></li>
        </ul>
    </div>
   </nav>


    <div class="form-section">
        <h1>Customer Registeration</h1>
        <form method="post" action="#" enctype="multipart/form-data" id="user-form" novalidate>
           
            <div class="inline-inputs">
                <div class="form-group">
                    <label for="name">Name:
                    <input type="text" id="name" name="name" required></label>
                    <div id="name-error" class="error">Invalid name. Please use letters only. and give proper spaces[firstname,middlename,lastname]</div>
                    
                </div>
            </div>
            <div class="inline-inputs">
                
            </div>
            <div class="inline-inputs">
                <div class="form-group">
                    <label for="password">Password:
                    <input type="password" id="password" name="password" required></label>
                
                    <div id="password-error" class="error">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.</div>
                    
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone:
                <input type="number" id="phone" name="phone" required></label>
                <div id="phone-error" class="error">Invalid phone number. Please use 10 digits.</div>
            </div>
            <div class="form-group">
                <label for="email">Email:
                <input type="email" id="email" name="email" required></label>
                <div id="email-error" class="error">Invalid email address.</div>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth
                <input type="date" id="dob" name="dob" required></label>
                <div id="dob-error" class="error">Invalid date of birth.</div>
            </div>
            <div class="form-group">
            <label for="file" >File upload:</label>
            <input type="file" name="file" id="file" required><br></div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <footer class="filter">
        <div >
            <div >
                <p><a rel="nofollow" href="https://templatemo.com" target="_blank"></a></p>
            </div>
        </div>
    </footer>

     <script type="text/javascript">//for right click off
      document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
    </script> 
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
     <script>
    $(document).ready(function(){
       
    
    $('#user-form').on('submit', function(e){
        e.preventDefault();
        let valid = true;

        const nameRegex = /^[a-zA-Z]+(\s[a-zA-Z]+){1,2}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\d{10}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        
        
        const name = $('#name').val();
        const email = $('#email').val();
        const phone = $('#phone').val();
        const dob = $('#dob').val();
        const password = $('#password').val();
        const file = $('#file').val();
        const birthDate = new Date(dob);
                const today = new Date();
                var age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                if (age < 18) {
                    $('#dob-error').show();
                    valid = false;
                } else {
                    $('#dob-error').hide();
                }

        if (!nameRegex.test(name)) {
            $('#name-error').show();
            valid = false;
        } else {
            $('#name-error').hide();
        }
        if (!passwordRegex.test(password)) {
            $('#password-error').show();
            valid = false;
        } else {
            $('#password-error').hide();
        }
        if (!emailRegex.test(email)) {
            $('#email-error').show();
            valid = false;
        } else {
            $('#email-error').hide();
        }

        if (!phoneRegex.test(phone)) {
            $('#phone-error').show();
            valid = false;
        } else {
            $('#phone-error').hide();
        }
        const formData = new FormData(this);
        if (valid) {
            $.ajax({
                url: '../Ajax_files/Register_Customer.php',
                method: 'POST',
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if(response==true)
                    {
                        alert("User Registeration successfull");
                        window.location='../Landing/otp.php';
                    }
                    else
                    {
                        if(response=="user exists")
                        {
                            alert("User already exists");
                        }
                        else if(response=="image error")
                        {   
                            alert("Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.");
                        }
                        else{
                            alert("failed"+response);
                        }
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

    <script src="../../js/jquery/jquery.min.js"></script>
    <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/counter.js"></script>
    <script src="../../js/custom.js"></script>

</body>

</html>
