<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?=$data['city']['coord']['lat'];//دادن مختصات عرض ?> ,
            lng: <?=$data['city']['coord']['lon'] //دادن مختصات طول ?>},
            zoom: 12
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJDMDwyUHliYA1k17gnx8UOdarydc4WPk&callback=initMap"
        async defer></script>
<!--AIzaSyA6LLIyliC7hknzCu1U1Gm3skhmJsVNDD4-->
<!--AIzaSyAJDMDwyUHliYA1k17gnx8UOdarydc4WPk--   My API mahwaj>
</body>
</html>