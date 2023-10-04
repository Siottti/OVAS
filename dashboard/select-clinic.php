<?php
@include 'config.php';
if (!isset($_POST)) {
    header("location: appointment.php");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,400;1,500;1,600;1,800;1,900&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6kUlUOsVU-KdmfGHZX1PSc0XJJIEzd9k&libraries=places"></script>
        <link rel="stylesheet" href="App.css">
    </head>
    <header>

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
                            <a class="nav-link" href="petlist.php">Pet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="applist.php">My Appointment</a>
                        </li>


    </header>

<body>

<h1 class="mt-5">Choose Clinic</h1>
<div class="container mt-5">
    <div class="row row-map">
        <?php
        $select = " SELECT * FROM clinic";
        $result = $conn->query($select);

        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-6 mb-3 card-map" data-lat="<?= $_POST["lat"] ?>" data-long="<?= $_POST["long"] ?>"
                 data-lat2="<?= $row["Latitude"] ?>" data-long2="<?= $row["Longitude"] ?>" data-index="0">
                <div class="card">
                    <div class="card-img-top" style="height: 400px; width: 100%">
                        <iframe src="http://localhost/ovas/dashboard/map.php?lat=<?= $_POST["lat"] ?>&long=<?= $_POST["long"] ?>&lat2=<?= $row["Latitude"] ?>&long2=<?= $row["Longitude"] ?>"
                                height="100%" width="100%" title="description"></iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["clinicname"] ?></h5>
                        <div class="card-text mb-3 mt-3">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 30%; font-weight: bold">Address</td>
                                    <td style="width: 70%; text-align: right"><?= $row["address"] ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%; font-weight: bold">Distance</td>
                                    <td style="width: 70%; text-align: right" class="distance-km"></td>
                                </tr>
                            </table>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary" data-pet="<?= $_POST["pet"] ?>" data-date="<?= $_POST["date"] ?>" 
                        data-time="<?= $_POST["time"] ?>" data-reason="<?= $_POST["reason"] ?>" data-clinic="<?= $row["id"] ?>" data-service="<?= $_POST["service"] ?>" 
                        onclick="appointment(this)">Book</a>
                    </div>
                </div>
            </div>
        <?php } ?>
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
                        <li><a href="">How to Order</a></li>
                        <li><a href="">Our Product</a></li>
                        <li><a href="">Order Status</a></li>
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
<script>
    $(() => {
        let cardMap = [];
        $(".card-map").each(function (i, item) {
            const lat = $(item).attr("data-lat")
            const long = $(item).attr("data-long")
            const lat2 = $(item).attr("data-lat2")
            const long2 = $(item).attr("data-long2")
            calculateDistance(lat, long, lat2, long2).then(function (value) {
                $(item).find(".distance-km").html(value + " km")
                cardMap.push({km: value, html: item})
                $(item).remove();

                cardMap.sort(function(a, b) {
                    return a.km - b.km;
                });

                generateMap();
            })
        })

        function generateMap()
        {
            for (const map of cardMap) {
                //map.html = map.html.css("display", "block")
                console.log(map)
                $(".row-map").append(map.html)
            }
        }
    })

    function appointment(event)
    {
        const pet = $(event).attr("data-pet");
        const date = $(event).attr("data-date");
        const time = $(event).attr("data-time");
        const reason = $(event).attr("data-reason");
        const clinic = $(event).attr("data-clinic");
        const service = $(event).attr("data-service");

        $.ajax({
                url: "appoint_function.php",
				data: {
                    pet,
                    date,
                    time,
                    reason,
                    clinic,
                    service
                },
                method: 'POST',
                success:function(resp){
                    swal("Good job!", "You clicked the button!", "success").then(() => {
                        window.location.href = "applist.php"
                    });
                }
        })
    }

    async function calculateDistance(lat, long, lat2, long2) {
        var start = new google.maps.LatLng(lat, long);
        var end = new google.maps.LatLng(lat2, long2);

        var service = new google.maps.DistanceMatrixService();
        var distanceInKilometers = 0;

        await service.getDistanceMatrix(
            {
                origins: [start],
                destinations: [end],
                travelMode: google.maps.TravelMode.DRIVING,
            },
            function (response, status) {
                if (status === "OK") {
                    var distanceElement = response.rows[0].elements[0];
                    if (distanceElement.status === "OK") {
                        distanceInKilometers = distanceElement.distance.value / 1000;
                        console.log("Distance:", distanceInKilometers, "km");
                    } else {
                        console.log("Error:", distanceElement.status);
                    }
                } else {
                    console.log("Error:", status);
                }
            }
        );
        return distanceInKilometers;
    }
</script>

</body>