<?php
require 'layout/init.inc';
require 'layout/nav.inc';
print('
<div class="container my-5">
<h1 class="display-3">Welcome to Gym Exercises</h1>
<p class="lead">Your journey to fitness starts here</p>
<a href="workouts.php" class="btn btn-primary btn-lg">Join Us</a>
<br>
<br>
<img src="img\Home_image.jpg" class="img-fluid" alt="...">

      
        </div>
      

  <div class="container my-5">
    <h2 class="text-center mb-4">Why Choose Us?</h2>
    <p class="text-center mb-4">We offer a comprehensive range of exercises and training programs designed to help you achieve your fitness goals. Our state-of-the-art facilities and experienced trainers are here to support you every step of the way.</p>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <h5 class="card-title">Expert Trainers</h5>
            <p class="card-text">Learn from the best in the industry.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <h5 class="card-title">Modern Equipment</h5>
            <p class="card-text">Access to top-notch gym equipment.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <h5 class="card-title">Personalized Programs</h5>
            <p class="card-text">Tailored workouts just for you.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
');

$query   = "SELECT workouts.Name as WName,exercise_type.Name as TName, exercise_type.Description as TDescription,workouts.Description as WDescription,workouts.Image_Url,workouts.Workout_ID,Type_ID
        FROM workouts RIGHT JOIN exercise_type ON workouts.Type_ID = exercise_type.Ex_type_ID
        WHERE workouts.Workout_ID is not null
        order by Workout_ID desc limit 3";
          $result = $mysqli->query($query);
print '



  <div class="container my-5">
    <h2 class="text-center mb-4">Popular Exercises</h2>
    <div class="row">
    ';
    while($row = $result->fetch_assoc())
    print'
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="uploads/'.$row['Image_Url'].'" class="card-img-top" alt="Exercise 1">
          <div class="card-body">
             <h5 class="card-title">'.$row['WName'].'</h5>
             <p class="card-text">'.$row['WDescription'].'</p>
             <a href="workouts.php" class="btn btn-primary">Learn More</a>
            </div>
         </div>
        </div>
';
print'
    </div>  
  </div>
</div>
';

require 'layout/footer.inc';
?>