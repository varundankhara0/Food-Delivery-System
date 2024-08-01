<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocomplete Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .autocomplete-suggestions {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
        }
        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
        }
        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>Autocomplete Form</h1>
    <input type="text" id="location-input" placeholder="Enter a location..." />
    <div id="suggestions" class="autocomplete-suggestions"></div>
    <script>
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        const fetchSuggestions = debounce(function(input) {
            if (input.length < 3) {
                document.getElementById('suggestions').innerHTML = '';
                return;
            }
            const location = '19.265980587014074,72.96698942923868';
            const apiKey = 'PEDy9RDQZovqNa0v5z43MovpPUOQNBeXE2RiVdAg';
            const url = `https://api.olamaps.io/places/v1/autocomplete?location=${location}&input=${input}&api_key=${apiKey}`;

            fetch(url, {
                headers: {
                    'X-Request-Id': 'your-request-id'  
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('API Response:', data);

                const suggestionsDiv = document.getElementById('suggestions');
                suggestionsDiv.innerHTML = '';

                if (data.predictions && data.predictions.length > 0) {
                    data.predictions.forEach(prediction => {
                        const suggestionDiv = document.createElement('div');
                        suggestionDiv.className = 'autocomplete-suggestion';
                        suggestionDiv.textContent = prediction.description;  // Use 'description' property
                        suggestionDiv.addEventListener('click', () => {
                            document.getElementById('location-input').value = prediction.description;  // Use 'description' property
                            suggestionsDiv.innerHTML = '';
                        });
                        suggestionsDiv.appendChild(suggestionDiv);
                    });
                } else {
                    console.error('No predictions found in the response');
                }
            })
            .catch(error => console.error('Error fetching autocomplete suggestions:', error));
        }, 300);

        document.getElementById('location-input').addEventListener('input', function() {
            fetchSuggestions(this.value);
        });
    </script>
</body>
</html>
