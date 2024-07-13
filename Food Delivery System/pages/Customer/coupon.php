<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Coupon Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url('');
            background-repeat: no-repeat;
            background-size: 1500px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-image: url('your-image-url.jpg');
            background-size: cover;
            background-position: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        #message {
            margin-top: 15px;
            font-size: 1em;
        }
        #discount-details {
            margin-top: 10px;
            font-size: 1em;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Apply Coupon Code</h1>
        <form id="coupon-form">
            <div class="form-group">
                <label for="coupon-code">Coupon Code</label>
                <input type="text" id="coupon-code" name="coupon-code" required>
            </div>
            <button type="submit" class="btn-primary">Apply</button>
            <button type="reset" class="btn-secondary">Cancel</button>
            <div id="message"></div>
            <div id="discount-details"></div>
        </form>
    </div>
    <script>
        document.getElementById('coupon-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var couponCode = document.getElementById('coupon-code').value;
            var message = document.getElementById('message');
            var discountDetails = document.getElementById('discount-details');

            // Simulate coupon validation
            if (couponCode === 'SAVE10') {
                message.textContent = 'Coupon applied successfully!';
                discountDetails.textContent = 'You have received a 10% discount.';
            } else {
                message.textContent = 'Invalid coupon code.';
                discountDetails.textContent = '';
            }
        });
    </script>
</body>
</html>