<?php
  @include 'config.php';

  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">	
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />	
   <link rel="stylesheet" href="petlist.css">
</head>
<body>
<header>
	    <div class="container1">
		    <nav class="navbar navbar-expand-lg #783201">
  <a class="navbar-brand" href="#">
  <img src="images/logo.png" class="img-circle" style=" width: 100px; left: 20px; margin-left:30px;" > 
				</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link" href="petlist.php">My Pet</a>
      </li>
		
      <li class="nav-item">
        <a class="nav-link" href="applist.php">My Appointment</a>
      </li>
      
      </header>

<div class="container mt-5">
    <a href="pet.php" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>ADD PET</a>
   
    <table class="table mt-50" >
    <thead>
        <tr>
        <th scope="col">Image:</th>
        <th scope="col">Pet Name:</th>
        <th scope="col">Birt Date:</th>
        <th scope="col">Height</th>
        <th scope="col">Weight</th>
        <th scope="col">Kind Of Pet</th>
        <th scope="col">Breed</th>
        
        </tr>
    </thead>
    <tbody>
      <?php 
          $select = " SELECT * FROM pet where customer_id = ".$_SESSION['id'];
          $result = $conn->query($select);

          while($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><img src="../uploads/<?= $row["image"] ?>" height="100px" width="100px"></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["bdate"] ?></td>
            <td><?= $row["height"] ?></td>
            <td><?= $row["weight"] ?></td>
            <td><?= $row["type"] ?></td>
            <td><?= $row["breed"] ?></td>
          </tr>
      <?php } ?>
    </tbody>
    </table>
</div>
</body>
</html>