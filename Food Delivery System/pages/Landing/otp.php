<?php 
session_start();
if(!isset($_SESSION["email"]))
{
    die("no email was set");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <p></p>
    <script>
        $(document).ready(function(){
            $.ajax({
                    type: 'POST',
                    url: "../Ajax_files/sendveri.php",
                    data: { email:`<?php 
                    echo $_SESSION["email"];
                    ?>` },
                    success: function(response) {
                        if(response==false)
                        {
                            $("p").text("failure occured");
                            exit();   
                        }
                        
                        $.ajax({
                            type: 'POST',
                            url: '../../Authentication/sendverificationemail.php',
                            data: {  },
                            success: function(response) {
                                if(response!=false)
                                {
                                    alert("Email for verification has been sent");
                                    window.location="logout.php";
                                }
                                else
                                {
                                    alert("email verification failed");
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log('Error: ' + textStatus + ' - ' + errorThrown);
                            }
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                });
        });
    </script>
</body>
</html>