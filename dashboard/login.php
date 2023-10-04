<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM customer WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['user_details'] = $row;
      header('location: user.php');
     
   }else{
      $error[] = 'Incorrect email or password!';
   }

};
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>    
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="reg.css">
</head>
<body>

   

<header>
	    <div class="container">
		    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html">
				<img src="images/logo.png" alt="company name">
				</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link" href="#">Service</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link" href="">Contact</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
	  
     
    </ul>
    
  </div>
</nav>
		</div>
	</header>


<div class="form-container">


<div class="form-container">
   
   </div>
   <form action="" method="post">
      <h3>Login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <div class="col">
    </div>
      <input type="email" name="email" required placeholder="Enter your email">
   
     
      <div class="txt_field">
         <input type="password" name="password" required placeholder="Enter your password"  id="Myinput">
         <div class="eye">
               <span class="Eye" onclick="myFunction()">
                         <i id="hide1"  style="display: none" class="fa fa-eye" ></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
         </div>
      </div>
                
      <input type="submit" name="submit" value="Login now" onclick="submitClick()" class="form-btn">
      <p><a href="../admin/login.php">Login as Admin</a></p>
      <p>Don't have an account? <a href="register.php">Register now</a></p>
     

   </form>
   </div>
</div>
<script>


       function myFunction()
{
        var x = document.getElementById("Myinput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type === 'password'){
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        }
        else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
  
    </script>   


</body>
</html>
