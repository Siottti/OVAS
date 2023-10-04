<?php 
@include 'config.php';
session_start();

if(isset($_POST))
{
    $user_id = $_SESSION["user_details"]["id"];
    $pet = $_POST["pet"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $reason = $_POST["reason"];
    $clinic = $_POST["clinic"];
    $service = $_POST["service"];

    $insert = "insert into appointment_list values (null, '$date $time', 1, $service, 0, current_timestamp, current_timestamp, $clinic, '$time',$user_id, $pet)";
    $result = $conn->query($insert);

    echo "Success";
}