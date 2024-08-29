<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminar Food</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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
            background-color: #007bff;
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
    </style>
</head>
<body>
    <div class="complaint-form-container">
        <h1>Food Complaint Form</h1>
        
        <form id="complaint-form">

            <div class="form-section">
                <label for="order-id">Order ID:</label>
                <select name="orderid" id="" placeholder="Order ID" >
                    <option value="">aa</option>
                    <option value="">bb</option>
                </select>
                <div id="order-error" class="error">Invalid order ID.</div>
            </div>
            
            <div class="form-section">
                <label for="complaint">Complaint:</label>
                <input type="text" id="complaint" name="complaint" placeholder="Describe your complaint" required>
                <div id="complaint-error" class="error">Invalid complaint.</div>
            </div>

            <div class="form-section">
                <label for="file-upload">Upload Image:</label>
                <input type="file" id="file" name="file" required>
            </div>

            <div class="form-section">
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
                            if(response === true) {
                                alert("Complaint submitted successfully");
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
