<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $province = $_POST['province'];
   $city = $_POST['city'];
   $barangay = $_POST['barangay'];
   $house_no = $_POST['house_no'];
   $contact = $_POST['contact'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = "user";

   $select = " SELECT * FROM customer WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO customer(name, email, password, province, city, barangay, house_street, contact) VALUES('$name','$email',
               '$pass', '$province', '$city', '$barangay', '$house_no', '$contact')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>    
   <link rel="stylesheet" href="reg.css">

</head>
<body> 
<div class="form-container">

   <form action="" method="post">
      <h3>Register Form</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your name" >
      <input type="email" name="email" required placeholder="Enter your email">
      <select name="province" id="province" class="form-control mb-3"  onchange="changeProvince(this)">
				<option value="">Choose Province</option>
		</select>
      <select name="city" id="city" class="form-control mb-3" onclick="changeCity(this)">
				<option value="">Choose City</option>
		</select>
      <select name="barangay" id="barangay" class="form-control">
				<option value="">Choose Barangay</option>
		</select>

      <input type="house_no" name="house_no" required placeholder="Enter your House Street">
      
      <input type="contact" name="contact" required placeholder="Enter your Contact Number">

      <input type="password" name="password" required placeholder="Enter your Password">
    

      <div class="txt_field">
         <input type="password" name="cpassword" required placeholder="Confirm your password"  id="Myinput">
         <div class="eye">
               <span class="Eye" onclick="myFunction()">
                         <i id="hide1"  style="display: none" class="fa fa-eye" ></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
         </div>
      </div>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login.php">Login now!</a></p>
   </form>
  
</div>
<script>

    $.getJSON("./phil_loc/provinces.json", function(json) {
			var province = json; 
         console.log(province)
			for(const index in province)
			$("#province").append(`<option value='${JSON.stringify({
          code: province[index].prov_code,
          value: province[index].name
      })}'>${province[index].name}</option>`);
	});

   function changeProvince(event)
	{
			$("#city").html("");
			var prov_code = JSON.parse($(event).val()).code
			$.getJSON("./phil_loc/city-mun.json", function(json) {
					var city = json; 
					$("#city").append(`<option value=''>Choose City</option>`);
					for(const index in city)
					{
						if(prov_code == city[index].prov_code)
							$("#city").append(`<option value='${JSON.stringify({
                code: city[index].mun_code,
                value: city[index].name
              })}'>${city[index].name}</option>`);
					}
			});
	}

   function changeCity(event)
	{
			$("#barangay").html("");
			var mun_code = JSON.parse($(event).val()).code
			$.getJSON("../phil_loc/barangays.json", function(json) {
					var barangays = json; 
					$("#barangay").append(`<option value=''>Choose Barangay</option>`);
					for(const index in barangays)
					{
						if(mun_code == barangays[index].mun_code)
							$("#barangay").append(`<option value='${barangays[index].name}'>${barangays[index].name}</option>`);
					}
			});
	}
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