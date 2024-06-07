<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gym Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['workout_name']) && !empty($_POST['description']) && isset($_FILES['image'])) {
        // Connect to the database
        $servername = "localhost";
        $username = "root"; // Your MySQL username
        $password = ""; // Your MySQL password
        $dbname = "gym_database"; // Your database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare data for insertion
        $workout_name = $_POST['workout_name'];
        $description = $_POST['description'];
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];

        // Check if file is an image
        $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
        if (in_array($image_type, $allowed_types)) {
            // Move uploaded file to desired directory
            $upload_path = "uploads/" . $image_name;
            move_uploaded_file($image_tmp, $upload_path);

            // Insert data into database
            $sql = "INSERT INTO workout (Workout_Name, image_url, Description) VALUES ('$workout_name', '$upload_path', '$description')";
            if ($conn->query($sql) === TRUE) {
                echo "Workout added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid file type. Please upload an image file.";
        }

        // Close connection
        $conn->close();
    } else {
        echo "Please fill in all fields.";
    }
}
?>
</body>
  <footer>
        <p>&copy; 2024 Gym Website</p>
    </footer>
</body>
</html>