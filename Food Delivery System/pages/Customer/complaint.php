<?php 
include "../../chcekcustomer.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminar Food</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
       

     
    
footer {
    max-height: 30%;
    
    background-color: #d30d0d;
    padding: 50px 20px;
    text-align: center;
    /* box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1); */
}
footer hr {
    border: none;
    border-top: 1px solid #DDD;
    margin: 20px 0;
}
.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}

.footer-left {
    flex: 1;
}

.footer-left h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

.social-icons a img {
    width: 30px;
    height: 30px;
    margin: 0 10px;
}

.footer-right {
    flex: 2;
    display: flex;
    justify-content: space-around;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links h4 {
    font-size: 18px;
    color: #DDD;
    margin-bottom: 10px;
}

.footer-links a {
    text-decoration: none;
    color: #000;
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
}
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .complaint-form-container {
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            transition: box-shadow 0.3s ease;
        }
        
        .complaint-form-container:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
        }
        
        .form-section {
            margin-bottom: 20px;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #555;
        }
        
        input[type="text"],
        input[type="email"],
        textarea,
        input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
            transition: border-color 0.3s ease;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #007bff;
        }
        
        textarea {
            height: 100px;
            resize: vertical;
        }
        
        button {
            background-color: #ed2727;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        
        .error {
            color: red;
            display: none;
        }

        button:hover {
            background-color: #0056b3;
        }
        a{
            text-decoration: none !important;
            color:white;
        }
    </style>
</head>
<body>
    
    <div class="complaint-form-container">
        <h1>Food Complaint Form</h1>
        
        <form id="complaint-form">

            <div class="form-section">
                <label for="order-id">Order ID:</label>
                <select name="orderid" id="order-id" placeholder="Order ID" >
                    <?php 
                
                    include "../../connection.php";
                        $query="select orders.id as orderid,user.id as userid,user.fullname as username, user.Email as email from tbl_order as orders JOIN tbl_cart as cart on cart.id=orders.cartid JOIN tbl_user as user on user.id=cart.userid  where user.id=".$_SESSION["userid"];
                        $result=mysqli_query($conn,$query);
                        while($row=$result->fetch_assoc())
                        {
                            ?>
                            <option value=<?php echo $row["orderid"];?>><?php echo $row["orderid"];?></option>
                            <?php 
                        }
                    ?>
                </select>
                <div id="order-error" class="error">Invalid order ID.</div>
            </div>
           
            <div class="form-section">
                <label for="complaint">Complaint:</label>
                <input type="text" id="complaint" name="description" placeholder="Describe your complaint" required>
                <div id="complaint-error" class="error">Invalid complaint.</div>
                <input type="text" name="role" id="role" value="c" hidden>
            </div>

            <div class="form-section">
                
                <label for="file-upload">(Optional) Upload Image:</label>
                <input type="file" id="file" name="file">
            </div>

            <div class="form-section">
                <button onclick="window.location='index.php'">Back</button>
                <button type="submit" name="submit">Submit</button>

            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#complaint-form').on('submit', function(e){
                e.preventDefault();
                let valid = true;

                const complaintRegex = /^[a-zA-Z\s]{5,}$/;
                const orderidRegex = /^[0-9]+$/;

                const complaint = $('#complaint').val();
                const orderid = $('#order-id').val();

                if (!orderidRegex.test(orderid)) {
                    $('#order-error').show();
                    valid = false;
                } else {
                    $('#order-error').hide();
                }
                
                if (!complaintRegex.test(complaint)) {
                    $('#complaint-error').show();
                    valid = false;
                } else {
                    $('#complaint-error').hide();
                }

                if (valid) {
                    const formData = new FormData(this);
                    $.ajax({
                        url: '../Ajax_files/complaint_Customer.php',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if(response == true) {
                                
                                $.ajax({
                                    url:'../../Authentication/complaint_email_customer.php',
                                    method:'POST',
                                    data:{
                                        orderid:$("#order-id").val(),
                                        
                                    },
                                    success:function(response)
                                    {
                                        if(response==true)
                                        {
                                            alert("Complaint submitted successfully");
                                            window.location="index.php";
                                        }
                                        else
                                        {
                                            alert(response);
                                        }
                                    }
                                })
                            } else {
                                alert("Submission failed: " + response);
                            }
                        },
                        error: function(error) {
                            alert('There was an error submitting the form.');
                        }
                    });
                  
                }
            });
        });
    </script>
</body>
</html>
