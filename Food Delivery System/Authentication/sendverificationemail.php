<?php 
session_start();
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
$mail->addAddress($_SESSION['email']);
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'OTP for Login';
$mail->Body    = '<html><head><title></title></head><body><h1 style="color:red;">Click <a href="http://localhost/Food-Delivery-System/Food%20Delivery%20System/pages/Landing/Activateuser.php?token='.$_SESSION["acchash"].'">here</a> to Verify your account</h1></body></html>';
$mail->AltBody = 'The login otp is for clients registering on system';

if($mail->send())
{
    echo true;
}
else
{
    false;
}



?>
