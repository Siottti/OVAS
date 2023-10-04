<?php
@include 'config.php';

session_start();


if (isset($_SESSION["user_details"])) {
    $user = $_SESSION["user_details"];
    $province = json_decode($user["province"]);
    $city = json_decode($user["city"]);
    $barangay = $user["barangay"];
    $address = $province->value . " " . $city->value . " " . $barangay;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
   <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">	
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />	
   <link rel="stylesheet" href="App.css">

    </head>
    <header>
        <input class="form-control mt-5 mb-5" type="hidden" id="addressInput" value="<?= $address ?>">

        <div class="container1">
            <nav class="navbar navbar-expand-lg #783201">
                <a class="navbar-brand" href="#">
                <img src="images/logo.png" class="img-circle" style=" width: 100px; left: 20px; margin-left:30px;" > 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="user.php">Home </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="appointment.php">Book Appointment</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="petlist.php"> My Pet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="applist.php">My Appointment</a>
                        </li>


    </header>

<body>



        <div class="row gx-5 mt-5">
            <div class="col image"></div>

            <div class="col">
                
            <div class="container">
                    <form action="select-clinic.php" method="post">
                            <h1 class="pet">Patient Details:</h1>
                            <label for="name" class="control-label">Pet name:</label>
                            <select class="form-control" name="pet" onchange="selectPet(this)" required>
                                <option value="">Choose Pet....</option>
                                <?php
                                $select = " SELECT * FROM pet where customer_id = " . $_SESSION['id'];
                                $result = $conn->query($select);

                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                                <?php } ?>
                            </select><br>
                            <label for="name" class="control-label">Services:</label>
                            <select class="form-control" id="service" name="service" required>
                                <option value="">Choose Service....</option>
                            </select><br>
                            <label for="name" class="control-label">Schedule</label>
                            <input type="date" name="date" id="Schedule" class="form-control" placeholder="Enter Schedule"
                                required><br>
                            <label for="name" class="control-label">Appointment Time</label>
                            <input type="time" name="time" id="time" class="form-control" placeholder="Enter Appointment Time"
                                required><br>
                            <label for="name" class="control-label"> Reason for Appointment</label>
                            <textarea class="form-control" placeholder="Leave a Reason here" id="floatingTextarea2" name="reason"
                                    style="height: 100px" required></textarea>

                            <BR>
                            <label for="name" class="control-label">Pin Your Location</label>
                            <input id="pac-input" class="form-control" type="text" placeholder="Search Location">
                            <div id="map" style="height: 500px;"></div>

                            <p>Click on the map to get coordinates:</p>
                            <p id="coordinates"></p>
                            <input type="hidden" id="lat" name="lat" required>
                            <input type="hidden" id="long" name="long" required>
                            <button type="submit" class="btn btn-danger"> Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <footer style="color:black;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-col footer-menu">
                        <h3>About</h3>
                        <ul style="color:black;">

                            <li style="color:black;"><a href="">History</a></li>
                            <li style="color:black;"><a href="">Our Team</a></li>
                            <li style="color:black;"><a href="">Brand Guidelines</a></li>
                            <li style="color:black;"><a href="">Terms & Condition</a></li>
                            <li style="color:black;"><a href="">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div>


                <div class="col-md-3">
                    <div class="footer-col footer-menu">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="">How to Appointment</a></li>
                            <li><a href="">Our Service</a></li>
                            <li><a href="">Appointment Status</a></li>
                            <li><a href="">Promo</a></li>
                            <li><a href="">Payment Method</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="subscribe-form">
                        <h3>Subscribe </h3>

                        <form>
                            <div class="input-group">
                                <input type="email" class="form-control">
                                <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </div>
                        </form>
                        <ul class="footer-social">
                            <li><a href=""> <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href=""> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
</div>
</footer>
</table>
<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
<script>

    function mymap() {
        getLatLong().then(function (value) {
            initMap(value);
        })
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

    let map;
    function initMap(value) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: value.lat, lng: value.lng},
            zoom: 15
        });

        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);

        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];

        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length === 0) {
                return;
            }

            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            var bounds = new google.maps.LatLngBounds();

            if (marker) {
                marker.setMap(null); // Remove the previous marker
            }

            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log('Returned place contains no geometry');
                    return;
                }

                marker = new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                });

                markers.push(marker);

                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();

                document.getElementById('lat').value = latitude;
                document.getElementById('long').value = longitude;
            });



            map.fitBounds(bounds);
        });

        map.addListener('click', function(event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();

            placeMarker(event.latLng);

            document.getElementById('lat').value = latitude;
            document.getElementById('long').value = longitude;
        });

    }


    var marker;
    function placeMarker(location) {
        if (marker) {
            marker.setMap(null); // Remove the previous marker
        }

        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    function selectPet(event) {
        const id = $(event).val();
        $("#service").html("");
        $("#service").append(`<option value="">Select Service ....</option>`);
        $.ajax({
                url: "logic_function.php",
				data: {
                    id
                },
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                success:function(resp){
                    for (const service of resp)
                    {
                        console.log(service)
                        $("#service").append(`<option value="${service.id}">${service.name}</option>`);
                    }
                }
            })
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkW3yqIGNf8HPp5vG-WNfujmRmWEmQHpI&libraries=places&callback=mymap"
        async defer></script>
