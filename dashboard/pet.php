<?php
  @include 'config.php';
  session_start(); 
    if($_POST)
    {

      $target_dir = "../uploads/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

      $sql = "INSERT INTO pet values (null, ".$_SESSION["id"].", '".$_POST["name"]."', '".$_POST["bdate"]."',
       '".$_POST["breed"]."', '".$_POST["weight"]."', '".$_POST["height"]."', '".$_POST["type"]."', '".$_FILES["file"]["name"]."')";
       $conn->query($sql);
       header('Location: petlist.php');
    }
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
   <link rel="stylesheet" href="pet.css">
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

    <div class="row gx-5 mt-5">
      <div class="col image"></div>
      <div class="col">
          <div class="container">
            <h1> Pet Information</h1>
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
              <label for="inputname" class="form-label">Pet name:</label>
              <input type="nam4" class="form-control" name="name" id="inputname4">
              </div> 
              <div class="mb-3">
              <label for="inputDate4" class="form-label">Birth Date:</label>
              <input type="date" class="form-control" name="bdate" id="inputDate4">
              </div>
              <div class="mb-3">
              <label for="inputAddress" class="form-label">Breed</label>
              <input type="text" class="form-control" name="breed" id="inputBreed" >
              </div>
              <div class="mb-3">
              <label for="inputAddress2" class="form-label">Weight</label>
              <input type="text" class="form-control" name="weight"  id="inputWeight">
              </div>
              <div class="mb-3">
              <label for="inputCity" class="form-label">Height</label>
              <input type="text" class="form-control" name="height"  id="inputHeight">
              </div>
              <div class="mb-3">
              <label for="inputPet" class="form-label">Kind Of Pet</label>
              <select id="inputPet" class="form-select" name="type">
                  <option selected value="">Choose...</option>
                  <?php
                    $select = " SELECT * FROM category_list where delete_flag = 0";
                    $result = $conn->query($select);

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                    <?php } ?>
              </select>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Select Profile For Your Petx</label>
                <input class="form-control" type="file"  name="file" id="formFile">
              </div>
              <div class="mb-3">
                  <button type="submit" class="btn btn-dark">Add Pet</button>
              </div>
            </form>
          </div>
      </div>
    </div>
</body>
</html>