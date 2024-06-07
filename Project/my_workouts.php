<?php
require 'layout/init.inc';
$link_text = '';
if (isset($_REQUEST['kid'])) {
$kid =  (int)$_REQUEST['kid']; 
}// защита - преобразуване до цяло число
if(isset($kid)) { // ако е зададен параметър
	$query = "SELECT * FROM exercise_type WHERE Ex_type_ID=".$kid; 
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$link_text = htmlspecialchars(stripcslashes($row['Name']));
}
if ($_POST) {
  $exerciseID = (int)$_POST['ExID'];
  $userID = $_SESSION['Account_Id'];
  $query = "DELETE FROM myworkouts 
            WHERE Account_ID = $userID and Workout_ID = $exerciseID";	
 $mysqli->query($query);
 print('
 <script type="text/javascript">
 // JavaScript code to show the alert
 var message = "Workout removed from my library";
 alert(message);
</script>');
}

$query   = "SELECT * 
FROM  exercise_type ";
  $result = $mysqli->query($query);


require 'layout/nav.inc';

print ('

<div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 bg-light sidebar">
        <h4>Muscle Groups</h4>
        <ul class="list-group">
        ');
        while($row = $result->fetch_assoc()){
        print'
          <a id="aBlack" class="list-group-item" href="my_workouts.php?kid='.$row['Ex_type_ID'].'">
        '.htmlspecialchars(stripslashes($row['Name'])).'
          </a>
          </ul>
          ';
        }
        
        // SELECT workouts.Name as WName,exercise_type.Name as TName, exercise_type.Description as TDescription,workouts.Description as WDescriptionm,workouts.Image_Url,workouts.Workout_ID,exercise_type.Ex_type_ID
        // FROM workouts RIGHT JOIN exercise_type ON workouts.Type_ID = exercise_type.Ex_type_ID
        if(isset($kid)) { 
            $user =$_SESSION['Account_Id'];
        $query   = "SELECT workouts.Name as WName,exercise_type.Name as TName, exercise_type.Description as TDescription,workouts.Description as WDescription,workouts.Image_Url,workouts.Workout_ID,Type_ID,myworkouts.Account_ID
        FROM workouts RIGHT JOIN exercise_type ON workouts.Type_ID = exercise_type.Ex_type_ID
        RIGHT JOIN myworkouts on myworkouts.Workout_ID = workouts.Workout_ID
        WHERE exercise_type.Ex_type_ID = $kid and workouts.Workout_ID is not null and myworkouts.Account_ID = $user";
          $result = $mysqli->query($query);
        print ('
       
        
      </div>
      <!-- Exercise Content -->
      <div class="container mt-4">
        <h2>Choose Exercises</h2>
        <div class="row">
          <!-- Example Exercise Cards -->
          ');
          if(isset($_SESSION['Person_Type'])){
          while($row = $result->fetch_assoc())
          print'
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="uploads/'.$row['Image_Url'].'" class="card-img-top" alt="Exercise Image">
              <div class="card-body">
                <h5 class="card-title">'.$row['WName'].'</h5>
                <p class="card-text">'.$row['WDescription'].'</p>
                <form method="post" name="f" action="'.$_SERVER['PHP_SELF'].'" class="form">
                <input type="hidden" name="ExID" value="'.$row['Workout_ID'].'">
                <button type="submit" class="btn btn-danger">Remove</button>
                </form>
           
              </div>
            </div>
          </div>
';}
          }

print'

        </div>
      </div>
    </div>
    <br><br>
';
    
require 'layout/footer.inc';
?>