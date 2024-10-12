<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="OlaMapsWebSDK/style.css" rel="stylesheet" />
    <script src="OlaMapsWebSDK/olamaps-js-sdk.umd.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Map Div -->
    <div id="map"></div>

    <!-- Map Initialization Script -->
    <script>
        // Initialize OlaMaps with API key
        const olaMaps = new OlaMapsSDK.OlaMaps({
          apiKey: 'PEDy9RDQZovqNa0v5z43MovpPUOQNBeXE2RiVdAg', // Replace with your actual API key
        });

        // Initialize and load the map
        const myMap = olaMaps.init({
          style: "https://api.olamaps.io/tiles/vector/v1/styles/default-light-standard-mr/style.json",
          container: 'map',
          center: [72.81900845733023,21.24030953965684],
          zoom: 15,
        });
    </script>
</body>
</html>
