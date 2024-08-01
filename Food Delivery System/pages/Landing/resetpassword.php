<?php 
$token=$_GET["token"];
$token_hash=hash("sha256",$token);
require "../../connection.php";
$query="Select * from tbl_user where reset_token=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("s",$token);
$stmt->execute();
$result=$stmt->get_result();
$user=$result->fetch_assoc();
if($user==null)
{
    die("no reset token was found for your account");
}
if(strtotime($user["reset_token_expires_at"])<=time())
{
    die("token expired please try again");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Reset password</title>
    <script src="../../js/disable.js"></script>
</head>
<body>
    <form id="dummyform" method="post">
        <label for="">New password</label>
        <input type="password" name="password" id="newpassword">
        <label for="">Confirm password</label>
        <input type="password" name="password" id="confirmpassword">
        <input type="submit" value="Reset password">
    </form>
    <script>
        $(document).ready(function(){
           $("#dummyform").submit(function(event){
            event.preventDefault();  
            var pass=document.getElementById("newpassword").value;
            var confirmpass=document.getElementById("confirmpassword").value;
            if(pass==confirmpass)
            {
                $.ajax({
                    type: 'POST',
                    url: '../Ajax_files/passreset.php',
                    data: { pass: pass,id:`<?php 
                    echo $user["id"];
                    ?>` },
                    success: function(response) {
                        if(response!=false)
                        {
                            alert("password reset completed");
                            window.location="home.php";
                        }
                        else
                        {
                            alert("password reset could not be completed");
                            window.location="home.php";
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                });
            }
            else{
                alert("password did not match")
            }
           });
        });
    </script>
</body>
</html>