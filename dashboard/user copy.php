<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
   <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">	
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />	
	
   <link rel="stylesheet" href="user.css">

</head>
<body>
<h1>Welcome To Online Appointment <span><?php echo $_SESSION['user_name'] ?></span></h1>
<div class="container">

</div>
<header>
	    <div class="container">
		    <nav class="navbar navbar-expand-lg navbar-black bg-black">
  <a class="navbar-brand" href="#">
				<img src="images/logo.png" alt="company name">
				</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Book Appointment</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link" href="#">Service</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
       
</body>
</html>