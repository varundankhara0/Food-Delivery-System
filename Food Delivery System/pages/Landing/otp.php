<?php 
session_start();
if(!isset($_SESSION['email']))
{
    echo "<script>alert('problem')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    <form method="post" id='dummyform'>
        <label>Enter otp:</label>
        <input type="number" name="otp" id="otp">
        <input type="number" name="getotp" id="getotp" hidden>
        <input type="submit" value="Submit" id="submit">
    </form>
    
    <script>
        $(document).ready(function(){   
        let tries = 3;

        $('#dummyform').submit(function(event) 
        {
            event.preventDefault(); // Prevent the form from submitting
            let writtenotp = document.getElementById('otp').value;
            let receivedotp = document.getElementById('getotp').value;
            if (writtenotp === receivedotp) {
                alert('Correct');
                $.ajax({
                        type: 'POST',
                        url: '../ajax_files/verifyuser.php',
                        data: { 
                            status:true
                        },
                        success: function(response) {
                            window.location='home.php';
                        }
                 });
            } else {
                tries--;
                if (tries === 0) {
                    alert('Please register again');
                    $.ajax({
                        type: 'POST',
                        url: '../ajax_files/destroy_session.php',
                        data: { },
                        success: function(response) {
                            window.location='home.php';
                        }
                 });
                    
                }
                else
                {
                    alert('Wrong otp entered please try again');
                }
            }
        });

            $.ajax({
                type: 'POST',
                url: '../../Authentication/otp.php',
                data: { email: `<?php 
                    echo $_SESSION["email"];
                ?>` },
                success: function(response) {
                    if(response!='fail')
                    {
                        document.getElementById('getotp').value=response;
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