<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Workout - Gym Website</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body>
    <header>
        <h1>Add Workout</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="workouts.php">Workouts</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Add New Workout</h2>
        <form action="insert_workout.php" method="POST" enctype="multipart/form-data">
            <label for="workout_name">Workout Name:</label>
            <input type="text" id="workout_name" name="workout_name">

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" onchange="previewImage(event)">
            <br>
            <img id="image-preview" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
            <br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>

            <input type="submit" value="Submit">
        </form>
    </section>
    <footer>
        <p>&copy; 2024 Gym Website</p>
    </footer>
</body>
</html>
