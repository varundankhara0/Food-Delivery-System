<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminar Food</title>
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
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="complaint-form-container">
        <h1>Food Complaint Form</h1>
        
      
        <div class="form-section">
            <label for="order-id">Order ID:</label>
            <input type="text" id="order-id" name="order-id" placeholder="Your order ID" required>
        </div>
        
        <div class="form-section">
            <label for="complaint">Complaint:</label>
            <textarea id="complaint" name="complaint" placeholder="Describe your complaint" required></textarea>
        </div>

        <div class="form-section">
            <label for="file-upload">Upload Image:</label>
            <input type="file" id="file-upload" name="file-upload" accept="image/*">
        </div>
        
        <div class="form-section">
            <button type="submit">Submit Complaint</button>
        </div>
    </div>
</body>
</html>
