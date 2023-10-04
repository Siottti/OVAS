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
<div class="container">

</div>
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
        <a class="nav-link" href="#">Home </a>
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
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
      </header>




        
           <section class="banner-section">
	     <div class="container">
		     <div class="row align-items-center">
			      <div class="col-md-6">
				  <h1 style="color:#DE5382; margin-bottom:50px;">WELCOME TO CSJDM ONLINE VETERINARY APPOINTMENT</h1>
				      <div class="banner-text">
					  <p class="fs-3"  >"Secure your pet's virtual appointment today and ensure their health and happiness from the comfort of your home in CSJDM, Bulacan!" </p>

						
						  
						  <div class="btn-main" style="mt-10">
						     
						      <a href="appointment.php" class="btn btn-outline-dark">Book Appointment</a>
						  </div>
					   </div>
				 </div>
				 
				 <div class="col-md-6">
				      <div class="banner-img">
					     <img src="images/vety.jpg" class="vety" width="800" height="600">
					 </div>
				 </div>
				 
			 </div>
		</div>
	</section>

	<footer>
	    <div class="container">
		     <div class="row">
			    <div class="col-md-3">
				    <div class="footer-col footer-menu">
					     <h3>About</h3>
						  <ul>
						    <li> <a href="">History</a> </li>
						    <li> <a href="">Our Team</a> </li>
						    <li> <a href="">Brand Guidelines</a> </li>
						    <li> <a href="">Terms & Condition</a> </li>
						    <li> <a href="">Privacy Policy</a> </li>
						</ul>
						 
					</div>
				 </div>
				 
				 
				 <div class="col-md-3">
				    <div class="footer-col footer-menu">
					     <h3>Services</h3>
						  <ul>
						    <li> <a href="">How to Order</a> </li>
						    <li> <a href="">Our Product</a> </li>
						    <li> <a href="">Order Status</a> </li>
						    <li> <a href="">Promo</a> </li>
						    <li> <a href="">Payment Method</a> </li>
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
						  <li> <a href=""> <i class="fa fa-instagram" aria-hidden="true"></i></a>  </li>
							   <li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i></a>  </li>
							   <li> <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>  </li>
						 </ul>
					 </div>
				 </div>

 
				 
			</div>
		</div>
	</footer>
</body>
</html>