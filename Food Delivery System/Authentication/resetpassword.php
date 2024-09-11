<?php 
require 'smtp.php';

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com";    // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "luminordelivery11@gmail.com";            // SMTP account username example
$mail->Password   = "nrkcvbkinarbdmrp";            // SMTP account password example

// Content
$mail->setFrom('luminorno-reply@gmail.com');   
$mail->addAddress($_POST['email']);
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Reset password';
// $mail->Body    = '<html><head><title></title></head><body><h1 style="color:red;">Click <a href="http://localhost/Food-Delivery-System/Food%20Delivery%20System/pages/Landing/resetpassword.php?token='.$_POST["token"].'">here</a> to reset your password</h1></body></html>';
$mail->AltBody = 'The login otp is for clients registering on system';
$mail->Body='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: rgb(136,189,191);
            font-family: Arial, sans-serif;
        }

        .form {
            background: rgb(243,243,243);
            padding: 20px;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 10px;
        }

        .form-small {
            background: linear-gradient(to right, #93A5CF, #E4EfE9);
            padding: 20px;
            border-radius: 10px;
        }

        .h1-font {
            font-family: "Lobster", cursive;
            text-align: center;
            background: linear-gradient(to left,rgb(255, 97, 210),rgb(254, 144, 144));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 28px;
            margin: 20px 0;
        }

        .contact-font {
            font-family: "Indie Flower", cursive;
            font-style: italic;
            text-align: center;
            color: rgb(111, 111, 111);
        }

        .p-font {
            margin: 20px 10px;
            font-size: 16px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
        }

        .p-footer {
            margin: 20px 10px;
            padding: 10px 50px 0px;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .wrapper {
            text-align: center;
            margin: 20px;
        }

        .button {
            display: inline-block;
            background-color: #000;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #555;
        }

        .social-buttons {
            margin: 20px 0;
            text-align: center;
        }

        .social-button {
            display: inline-block;
            background-color: #fff;
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin: 0 10px;
            text-align: center;
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .social-button .fa {
            font-size: 18px;
            color: #000;
        }

        .social-button:hover {
            background-color: #ddd;
        }

        .logo img {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        @media screen and (max-width: 600px) {
            .form, .form-small {
                padding: 15px;
            }

            .h1-font {
                font-size: 24px;
            }

            .p-font {
                font-size: 14px;
            }

            .button {
                font-size: 16px;
            }
        }
    </style>
    <title>Email Sample</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Indie+Flower" rel="stylesheet">
</head>
<body>

    <div class="form">
        <!-- Logo -->
        <div class="logo">
            <img src="https://i.imgur.com/vzLpauk.png" title="source: imgur.com" />
        </div>

        <!-- Main Content -->
        <div class="form-small">
            <div>
                <img src="https://i.ibb.co/cLY0vQR/food-plate.jpg" alt="food-plate" width="100%" style="border-radius: 10px;">
            </div>

            <h1 class="h1-font">Reset Password</h1>
            <p class="p-font">
                Hey!!!,<br><br>
                Click the Below link to Reset Your Password  
                
            </p>

            <div class="wrapper">
                <a href="http://localhost/Food-Delivery-System/Food%20Delivery%20System/pages/Landing/resetpassword.php?token='.$_POST["token"].'" class="button">Reset password</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="social-buttons">
            <a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="social-button google"><i class="fa fa-google"></i></a>
        </div>

        <div>
            <h3 class="contact-font">Stay in touch</h3>
        </div>
    </div>

</body>
</html>';
if($mail->send())
{
    echo true;
}
else
{
    false;
}



?>
