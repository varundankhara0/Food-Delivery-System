<?php 
session_start();
require 'smtp.php';
include "../connection.php";
$query="select orders.id as orderid,user.fullname as name,user.Email as email from tbl_order as orders JOIN tbl_cart as cart on cart.id=orders.cartid JOIN tbl_user as user on user.id=cart.userid where orders.id=".$_POST["orderid"];
$result=mysqli_query($conn,$query);
$orderid=0;
$name="";
$email="";
while($row=$result->fetch_assoc())
{
    $email=$row["email"];
    $name=$row["name"];
    $orderid=$row["orderid"];
}
// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com";    // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "luminordelivery11@gmail.com";            // SMTP account username example
$mail->Password   = "nrkcvbkinarbdmrp";            // SMTP account password example

$mail->setFrom('luminorno-reply@gmail.com');    
$mail->addAddress($email);
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Complain Recieved';
$mail->AltBody = 'The login otp is for clients registering on system';

$mail->Body='<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
    .form {
        background:rgb(243,243,243);
        padding: 40px;
        max-width:600px;
        margin:30px auto;
    }

    .form-small {
        background:linear-gradient(to right, #93A5CF,#E4EfE9);
        padding: 40px;
        max-width:600px;
        margin:10px auto;
    }

    .h1-font {
        font-family: Lobster;
        text-align: center;
        background: linear-gradient(to left,rgb(255, 97, 210),rgb(254, 144, 144));
        -webkit-background-clip: text;
        color: transparent;
        background-clip: text;
    }

    .contact-font {
        font-family: Indie Flower;
        font-style: italic;
        text-align: center;
        color: rgb(111,111,111);
    }

    .p-font {
        margin: 20px 10px 20px;
        font-size: 20px;  
        font-family: "Times New Roman", Times, serif;
        text-align: center;
    }

    .p-footer {
        margin: 20px 10px 20px;
        padding: 10px 50px 0px;
        font-size: 11px;  
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    :root {
        --bg: rgb(243,243,243);
        --color: rgb(0, 0, 0);
        --font: Montserrat, Roboto, Helvetica, Arial, sans-serif;
    }

    .wrapper {
        padding: 20px 150px 40px;
        filter: url("#goo");
    }

    .button {
        display: inline-block;
        text-align: center;
        background: var(--color);
        color: var(--bg);
        font-weight: bold;
        padding: 1.18em 1.32em 1.03em;
        line-height: 1;
        border-radius: 1em;
        position: relative;
        min-width: 8.23em;
        text-decoration: none;
        font-family: var(--font);
        font-size: 1.75rem;
    }

    .button:before,
    .button:after {
        width: 4.4em;
        height: 2.95em;
        position: absolute;
        content: "";
        display: inline-block;
        background: var(--color);
        border-radius: 50%;
        transition: transform 0.3s ease;
        transform: scale(0);
        z-index: -1;
    }

    .button:before {
        top: -25%;
        left: 20%;
    }

    .button:after {
        bottom: -25%;
        right: 20%;
    }

    .button:hover:before,
    .button:hover:after {
        transform: none;
    }

    body {
        width: 100%;
        height: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: var(--bg)
    }

    .social-buttons {
        margin: auto;
        font-size: 0;
        text-align: center;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .social-button {
        display: inline-block;
        background-color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        margin: 0 10px;
        text-align: center;
        position: relative;
        overflow: hidden;
        opacity: .99;
        border-radius: 50%;
        box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.05);
        -webkit-transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
        transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
    }
    .social-button:before {
        content: "";
        background-color: #000;
        width: 120%;
        height: 120%;
        position: absolute;
        top: 90%;
        left: -110%;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
        transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
    }
    .social-button .fa {
        font-size: 38px;
        vertical-align: middle;
        -webkit-transform: scale(0.8);
        transform: scale(0.8);
        -webkit-transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
        transition: all 0.35s cubic-bezier(0.31, -0.105, 0.43, 1.59);
    }

    .social-button.facebook:before {
        background-color: #3B5998;
    }
    .social-button.facebook .fa {
        color: #3B5998;
    }

    .social-button.twitter:before {
        background-color: #55acee;
    }
    .social-button.twitter .fa {
        color: #55acee;
    }

    .social-button.google:before {
        background-color: #dd4b39;
    }
    .social-button.google .fa {
        color: #dd4b39;
    }

    .social-button:focus:before, .social-button:hover:before {
        top: -10%;
        left: -10%;
    }
    .social-button:focus .fa, .social-button:hover .fa {
        color: #fff;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .logo {
        font-family: "Lobster", cursive;
        font-size: 4em;
        font-weight: 400;
        float: left;
        padding: 5px;
        margin-top: 25px;
    }

    header, .logo {
        -webkit-transition: all 1s;
        transition: all 1s; 
    }

    @font-face {
        font-family: "Lobster";
        font-style: normal;
        font-weight: 400;
        src: local("Lobster"), local("Lobster-Regular"), url(https://fonts.gstatic.com/s/lobster/v18/c28rH3kclCLEuIsGhOg7evY6323mHUZFJMgTvxaG2iE.woff2) format("woff2");
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }

    @font-face {
        font-family: "Lobster";
        font-style: normal;
        font-weight: 400;
        src: local("Lobster"), local("Lobster-Regular"), url(https://fonts.gstatic.com/s/lobster/v18/RdfS2KomDWXvet4_dZQehvY6323mHUZFJMgTvxaG2iE.woff2) format("woff2");
        unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
    }

    @font-face {
        font-family: "Lobster";
        font-style: normal;
        font-weight: 400;
        src: local("Lobster"), local("Lobster-Regular"), url(https://fonts.gstatic.com/s/lobster/v18/9NqNYV_LP7zlAF8jHr7f1vY6323mHUZFJMgTvxaG2iE.woff2) format("woff2");
        unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
    }

    @font-face {
        font-family: "Lobster";
        font-style: normal;
        font-weight: 400;
        src: local("Lobster"), local("Lobster-Regular"), url(https://fonts.gstatic.com/s/lobster/v18/cycBf3mfbGkh66G5NhszPQ.woff2) format("woff2");
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
    }

    @font-face {
        font-family: "Indie Flower";
        font-style: normal;
        font-weight: 400;
        src: local("Indie Flower"), local("IndieFlower"),  url(https://fonts.gstatic.com/s/indieflower/v8/10JVD_humAd5zP2yrFqw6ugdm0LZdjqr5-oayXSOefg.woff2) format("woff2");
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}
/* --------------------- */
        </style>
        <title>Email Sample</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    </head>

    <body style="background-color: rgb(136,189,191)">
        <div class="form">
            <div>
                <img class="" alt="logo" src="https://i.imgur.com/vzLpauk.png" width="10%">           
            </div>
        
            <div class="form-small" style="padding: 0px">
                <div>
                   <a href="https://ibb.co/C2PgtQ4"><img src="https://i.ibb.co/cLY0vQR/food-plate.jpg" alt="food-plate" border="0"></a><br /><br />
                </div>
                <h1 class="h1-font">Complain Received<h1>
                <p class="p-font">Hey '.$name.', We have received you\'re complain  on order id '.$orderid.' and we asure that our team is working on it.<br>if any help is required during the investigation our team will contact you.</b>.  
                Thank you for showing patience and believe in us.</p>
                <div class="wrapper">
               
                </div>
                <!-- Filter: https://css-tricks.com/gooey-effect/ -->
                <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />    
                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                            <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                        </filter>
                    </defs>
                </svg>               
            </div>

            <div>
                <h3 class="contact-font">Stay in touch<h3>


                
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>';

echo $mail->send()
   
?>
