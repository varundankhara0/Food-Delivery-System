<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminar Food</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <script src="../../js/disable.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .feedback-form-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        
        .feedback-section {
            margin-bottom: 20px;
        }
        
        h2 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #666;
        }
        
        .stars i {
            font-size: 30px;
            margin: 0 5px;
            cursor: pointer;
            color: #ccc;
        }
        
        .stars i.selected:nth-child(1) {
            color: #ff0000;
        }
        
        .stars i.selected:nth-child(2) {
            color: #ff7f00;
        }
        
        .stars i.selected:nth-child(3) {
            color: #ffff00;
        }
        
        .stars i.selected:nth-child(4) {
            color: #7fff00;
        }
        
        .stars i.selected:nth-child(5) {
            color: #00ff00;
        }
        
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="feedback-form-container">
        <h1>We'd love some feedback</h1>
        
        <div class="feedback-section">
            <h2>How Would You Rate Our customer</h2>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        
       
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const starSections = document.querySelectorAll('.stars');

            starSections.forEach(section => {
                const stars = section.querySelectorAll('i');

                stars.forEach((star, index) => {
                    star.addEventListener('click', () => {
                        stars.forEach(s => s.classList.remove('selected'));
                        for(let i = 0; i <= index; i++) {
                            stars[i].classList.add('selected');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
