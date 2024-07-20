<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Lugx Gaming - Shop Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <!-- .header-area .main-nav .logo {
            display: flex;
            justify-content:left;
        
        } -->

        <!-- .header-area .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
        } -->

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
            background-color:#f900ff;
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

       
        .form-section input[type="email"]
         {
            width: 221%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-section input[type="file"]
        {
            width: 101%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        
        }
        .form-section input[type="password"]
        {
            width: 197%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        
        }
        .form-section input[type="text"]
        {
            width: 184%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        
        }
      
        .form-section button[type="submit"] {
            background-color:#a120a1;
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
        
        nav{
            background-color:#a120a1;
            display: flex;
            justify-content: space-around;
            border-radius: 0px 0px 50px 50px;
            align-items: center;
            
        }
        ul{
            list-style: none;
            text-decoration: none;
            display: flex;
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
            background-color:#a120a1 ;
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
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="inline-inputs">
                <div class="form-group">
                    <label for="licenseno">licenseno:
                    <input type="text" id="licenseno" name="licenseno" style="width: 199%;" required></label>
                </div>
            </div>
            <div>
                <label class="licensenoimage">addharcard:</label>
                <input type="file" name="licensenoimage" required><br>
            </div>
            <div class="inline-inputs">
                <div class="form-group">
                    <label for="addharcard">addharcard:
                    <input type="text" id="addharcard" name="addharcard" required></label>
                </div>
            </div>
            <div>
                <label class="addharcardimage">addharcard image upload:</label>
                <input type="file" name="addharcardimage" required><br>
            </div>
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