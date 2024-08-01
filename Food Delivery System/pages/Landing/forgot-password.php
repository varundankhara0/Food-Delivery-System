<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../js/disable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <form method="post" id="dummyform">
        <label for="">Enter Email</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Submit">
    </form>
    <p id="showmessage"></p>
    <button id="home">Home</button>
    <script>
        $(document).ready(function() {
            $("#home").hide();
            $("#dummyform").submit(function(event) {
                event.preventDefault();  
                var email=document.getElementById("email").value;
                
                $.ajax({
                    type: 'POST',
                    url: "../../Authentication/send-password-reset.php",
                    data: { email: email },
                    success: function(response) {
                        if (response == false) {
                            $("#dummyform").hide();
                            $("#showmessage").text("unSuccess");
                            $("#home").show();
                        } else {
                           
                            $.ajax({
                                url: '../../Authentication/resetpassword.php',
                                type: 'POST',
                                data: { token: response, email: email },
                                success: function(response2) {
                                    if (response2 == true) {
                                        $("#dummyform").hide();
                                        $("#showmessage").text("An Reset email has been sent please check your mail");
                                        $("#home").show();
                                    } else {
                                        alert(response2);
                                        $("#dummyform").hide();
                                        $("#showmessage").text("An Reset email was not sent");
                                        $("#home").show();
                                    }
                                },
                                error: function(error) {
                                    console.error('Error in second AJAX request:', error);
                                }
                            });
                        }
                    },
                    error: function(error) {
                        console.error("Error in AJAX request:", error);
                    }
                });
            });
            $('#home').click(function(){
                window.location("home.php");
            })
        });
    </script>
</body>
</html>
