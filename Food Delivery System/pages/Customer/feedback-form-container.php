<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminar Food</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .feedback-form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            transition: box-shadow 0.3s ease;
        }
        
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        
        h2 {
            margin-bottom: 10px;
            color: #555;
            display: block;
            font-size: 26.5;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
            unicode-bidi: isolate;
        }
        .feedback-section {
            margin-bottom: 20px;
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
        
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
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
            <h2>How Would You Rate Our Food?</h2>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        
        <div class="feedback-section">
            <h2>How Would You Rate Our Service?</h2>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        
        <div class="feedback-section">
            <h2>Let us know in a few words</h2>
            <input type="text" placeholder="Your feedback here...">
        </div>
        
        <div class="feedback-section">
            <button type="submit">Submit Feedback</button>
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
 