<?php 
$token=$_GET["token"];
$token_hash=hash("sha256",$token);
require "../../connection.php";
$query="Select * from tbl_user where accounthash=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("s",$token);
$stmt->execute();
$result=$stmt->get_result();
$user=$result->fetch_assoc();
if($user==null)
{
    die("no Activation token was found for your account");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <title>Reset password</title>
</head>
<body>
    <p id="verification"></p>
    <script>
        $(document).ready(function(){
                $.ajax({
                    type: 'POST',
                    url: '../Ajax_files/verifyuser.php',
                    data: { id:`<?php 
                    echo $user["id"];
                    ?>` },
                    success: function(response) {
                        if(response!=false)
                        {
                            $("#verification").text("User Verification is successfull");
                            window.location="home.php";
                        }
                        else
                        {
                            $("#verification").text("User Verification is unsuccessfull");
                            window.location="home.php";
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                });
            
           
        });
    </script>
</body>
</html>