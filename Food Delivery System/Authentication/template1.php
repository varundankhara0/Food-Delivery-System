h<html lang="en">
    <head>
    <!-- If you delete this tag, the sky will fall on your head -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Email Sample</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap -->
        <!-- <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="../css/email.css" />
        <link rel="stylesheet" href="css/robotonewfont.css" />
        <!--Text-->
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body style="background-color: rgb(136,189,191)">
        <div class="form">
            <div>
                <img class="" alt="logo" src="http://imgur.com/VCdfPKq" width="10%">           
            </div>
        
            <div class="form-small"; style="padding: 0px">
                <div>
                    <img class="mail-image" alt="top image" src="../images/food-plate.jpeg" width="100%" height="35%">
                </div>
                <h1 class="h1-font">Email Confirmation<h1>
                <p class="p-font">Hey @user, you're almost ready to start enjoying <b>Luminar deliver</b>.  
                Simply click the BIG yellow button below to verify your email address.</p>
                <div class="wrapper">
                    <a class="button" href="#">Verify email address</a>
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

                <div class="social-buttons">
                    <a class="social-button facebook" href="#">
                        <i class="fa fa-facebook">
                        </i>
                    </a>
                    
                    <a class="social-button twitter" href="#">
                        <i class="fa fa-twitter">
                        </i>
                    </a>
                    
                    <a class="social-button google" href="#">
                        <i class="fa fa-google">
                        </i>
                    </a>
                </div>

                <p class="p-footer">Email sent by Elephantry.com <br>
                Copyright © 2017 Elephantry Inc. All rights reserved</p>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>