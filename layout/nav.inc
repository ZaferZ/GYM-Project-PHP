<?php
print'
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gym Website</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="style.css">

</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column">
    <a class="navbar-brand" href="#">Gym Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="workouts.php">Exercises</a>
        </li>
        ';

        if(!isset($_SESSION['Person_Type'])){
							print '<a type="button" href="login.php" class="btn btn btn-secondary">Login</a>'; 				
						} else {
						if($_SESSION['Person_Type']==1){	
							print '
               <li class="nav-item">
                <a class="nav-link" href="add_workout.php">Add Workout</a>
               </li>
               ';						
						}
						print'
            <li class="nav-item">
               <a class="nav-link" href="my_workouts.php">My workouts</a>
            </li>
            <a type="button" href="logout.php" class="btn btn btn-secondary">Изход</a>';
						}		

            print'
        
      </ul>
      <ul class="navbar-nav">
    </div>
  </nav>
  ';
?>