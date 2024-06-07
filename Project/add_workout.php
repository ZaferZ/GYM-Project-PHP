<?php
$message = "";
require 'layout/init.inc';

if ($_POST) {
    $name = $mysqli->escape_string(trim($_POST['workoutName']));
    $description = $mysqli->escape_string(trim($_POST['description']));
    $image = $mysqli->escape_string(trim(basename($_FILES["workoutImage"]["name"])));
    $typeID = $mysqli->escape_string(trim($_POST['ex_type_id']));


$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Get the file details
$fileName = basename($_FILES["workoutImage"]["name"]);
$targetFilePath = $targetDir . $fileName;
$imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

// Allow only certain file formats
$allowedTypes = array("jpg", "jpeg", "png", "gif");
if (in_array($imageFileType, $allowedTypes)) {
    // Upload file to server
    if (move_uploaded_file($_FILES["workoutImage"]["tmp_name"], $targetFilePath)) {
        $message ="The file " . htmlspecialchars($fileName) . " has been uploaded.";
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
} else {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
$query = "INSERT INTO workouts(Name, Description, Image_Url, Type_ID) VALUES ("
					.($name?"'".$name."'":"NULL").", "
					.($description?"'".$description."'":"NULL").", "
					.($image?"'".$image."'":"NULL").", "
					.($typeID?"'".$typeID."'":"NULL")
					.")";	
 $mysqli->query($query);

}
require 'layout/nav.inc';
$query = "SELECT * "
    . " FROM exercise_type  ";
$result = $mysqli->query($query);
print ('
<br>
<div class="col-md-6 mx-auto">
                <h2 class="text-center">Add New Workout</h2>
                <form id="workoutForm" action="' . $_SERVER['PHP_SELF'] . '" method = "post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="workoutName">Workout Name</label>
                        <input type="text" class="form-control" id="workoutName" name = "workoutName" placeholder="Enter workout name">
                    </div>
                    <div class="form-group">
                        <label for="workoutDescription">Description</label>
                        <textarea class="form-control" name = "description"id="workoutDescription" rows="3" placeholder="Enter workout description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exercises">Exercise Type</label>
                        <select name = "ex_type_id" multiple class="form-control" id="exercises">
                        ');
while ($row = $result->fetch_assoc()) {
    print '
                            <option value= ' . $row['Ex_type_ID'] . '>' . $row['Name'] . '</option>
                            ';
}
print ('
                        </select>
                    </div>
                    <label for="workoutImage">Upload Image</label>
                        <input type="file" class="form-control-file" id="workoutImage" name="workoutImage" accept="image/*">
                         <div class="form-group">
                        <img id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
            </div>
            <script>
            document.getElementById("workoutImage").addEventListener("change", function(event) {
                const file = event.target.files[0];
                const preview = document.getElementById("imagePreview");
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = "block";
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "#";
                    preview.style.display = "none";
                }
            });
        </script>
'
);


require 'layout/footer.inc';
?>