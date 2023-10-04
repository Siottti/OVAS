<?php
session_start();

if (isset($_SESSION["user_details"])) {
    $user = $_SESSION["user_details"];
    $province = json_decode($user["province"]);
    $city = json_decode($user["city"]);
    $barangay = $user["barangay"];
    $address = $province->value . " " . $city->value . " " . $barangay . ", " . $user["house_street"];
}

?>

<input class="form-control mt-5 mb-5" type="hidden" id="addressInput" value="<?= $address ?>">

<div id="googleMap" class="card-img-top" style="height: 400px; width: 100%"></div>
<script>
    let pathCoordinates = [];
    var map;

    function myMap() {
        var newLocation = {lat: <?= $_GET["lat"] ?>, lng: <?= $_GET["long"] ?>};
        pathCoordinates.push(newLocation);

        var mapProp = {
            center: new google.maps.LatLng(<?= $_GET["lat"] ?>, <?= $_GET["long"] ?>),
            zoom: 15,
        };

        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var marker = new google.maps.Marker({position: new google.maps.LatLng(<?= $_GET["lat"] ?>, <?= $_GET["long"] ?>)});

        marker.setMap(map);

        var newLocation2 = {lat: <?= $_GET["lat2"] ?>, lng: <?= $_GET["long2"] ?>};
        pathCoordinates.push(newLocation2);
        route();
    }

    function route() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer({
            map: map
        });

        var request = {
            origin: pathCoordinates[0],
            destination: pathCoordinates[1],
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function (result, status) {
            if (status === 'OK') {
                directionsRenderer.setDirections(result);
            } else {
                console.error('Directions request failed due to ' + status);
            }
        });
    }

    async function getLatLong() {
        var geocoder = new google.maps.Geocoder();
        var address = document.getElementById("addressInput").value;
        loc = {};
        await geocoder.geocode({'address': address}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                loc = {
                    lat: latitude, lng: longitude
                }
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        return loc;
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkW3yqIGNf8HPp5vG-WNfujmRmWEmQHpI&callback=myMap"></script>