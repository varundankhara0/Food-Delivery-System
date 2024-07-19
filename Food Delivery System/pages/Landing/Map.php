<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Guides</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<div id="map"></div>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibHVtaW5vcmQiLCJhIjoiY2x5cmo4djk5MDM5bzJpcXY1cnlhM2JmdyJ9.802ZAc2Vo2Vx6ESrHGTncw';
const map = new mapboxgl.Map({
  container: 'map', // container ID
  style: 'mapbox://styles/mapbox/streets-v12', // style URL
  center: [-76.54, 39.18], // starting position [lng, lat]2
  zoom: 9 // starting zoom
});
    // add to map


// update coordinates
// Add to an image source to the map with some initial URL and coordinates
map.addSource('image_source_id', {
    type: 'image',
    url: 'https://www.mapbox.com/images/foo.png',
    coordinates: [
        [-76.54, 39.18],
        [-76.52, 39.18],
        [-76.52, 39.17],
        [-76.54, 39.17]
    ]
});
// Then update the image URL and coordinates
imageSource.updateImage({
    url: 'https://www.mapbox.com/images/bar.png',
    coordinates: [
        [-76.5433, 39.1857],
        [-76.5280, 39.1838],
        [-76.5295, 39.1768],
        [-76.5452, 39.1787]
    ]
});

// map.removeSource('some id');  // remove
    map.addControl(new mapboxgl.NavigationControl());
    map.scrollZoom.disable();
    map.clickTolerance=0;
    map.on('style.load', () => {
        map.setFog({}); // Set the default atmosphere style
    });

    // The following values can be changed to control rotation speed:

    // At low zooms, complete a revolution every two minutes.
    const secondsPerRevolution = 240;
    // Above zoom level 5, do not rotate.
    const maxSpinZoom = 5;
    // Rotate at intermediate speeds between zoom levels 3 and 5.
    const slowSpinZoom = 3;

    let userInteracting = false;
    const spinEnabled = true;

    function spinGlobe() {
        const zoom = map.getZoom();
        if (spinEnabled && !userInteracting && zoom < maxSpinZoom) {
            let distancePerSecond = 360 / secondsPerRevolution;
            if (zoom > slowSpinZoom) {
                // Slow spinning at higher zooms
                const zoomDif =
                    (maxSpinZoom - zoom) / (maxSpinZoom - slowSpinZoom);
                distancePerSecond *= zoomDif;
            }
            const center = map.getCenter();
            center.lng -= distancePerSecond;
            // Smoothly animate the map over one second.
            // When this animation is complete, it calls a 'moveend' event.
            map.easeTo({ center, duration: 1000, easing: (n) => n });
        }
    }

    // Pause spinning on interaction
    map.on('mousedown', () => {
        userInteracting = true;
    });
    map.on('dragstart', () => {
        userInteracting = true;
    });

    // When animation is complete, start spinning if there is no ongoing interaction
    map.on('moveend', () => {
        spinGlobe();
    });

    spinGlobe();
</script>

</body>
</html>