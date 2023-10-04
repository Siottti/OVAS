 <?php @include 'config.php';
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
		
      </li>
		
		
		
		<li class="nav-item">
        <a class="nav-link" href="petlist.php">Pet</a>
      </li>
		
      <li class="nav-item">
        <a class="nav-link" href="#">My Appointment</a>
      </li>
     
      </header>
    <div class="container mt-5">
        <div class="row">
            <?php     
            
                $select = " SELECT a.*, p.image, p.name as pet, c.clinicname as clinic, s.name as service FROM appointment_list a left join service_list s on s.id = a.service_ids left join clinic c on c.id = a.clinic_id left join pet as p on p.id = a.pet_id where a.customer_id = ".$_SESSION['id'];
                $result = $conn->query($select);

                while($row = $result->fetch_assoc()) { ?>
                <div class="col-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../uploads/<?= $row["image"] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["pet"] ?></h5>
                            <div class="card-text mb-3 mt-3">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="width: 30%; font-weight: bold">Clinic</td>
                                        <td style="width: 70%; text-align: right"><?= $row["clinic"] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%; font-weight: bold">Schedule</td>
                                        <td style="width: 70%; text-align: right"><?= $row["schedule"] ?> <?= $row["time"] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%; font-weight: bold">Service</td>
                                        <td style="width: 70%; text-align: right"><?= $row["service"] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%; font-weight: bold">Status</td>
                                        <td style="width: 70%; text-align: right">	<?php 
                                            switch ($row['status']){
                                              case 0:
                                                echo '<span class="rounded-pill badge bg-secondary">Pending</span>';
                                                break;
                                              case 1:
                                                echo '<span class="rounded-pill badge bg-success">Confirmed</span>';
                                                break;
                                              case 2:
                                                echo '<span class="rounded-pill badge bg-danger">Cancelled</span>';
                                                break;
                                            }
                                          ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>