<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "gym_database"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch workouts
$sql = "SELECT * FROM workout";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workouts - Gym Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Workouts</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="workouts.php">Workouts</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>All Workouts</h2>
        <div class="carousel">
            <?php
            // Displaying images and headings in a carousel
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div'>";
                    echo "<h3>" . $row['Workout_Name'] . "</h3>";
                    echo "<img style='width: 300px;'" . $row['image_url'] . "' alt='" . $row['Workout_Name'] . "'>";
                    echo "<p>" . $row['Description'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No workouts found.";
            }
            ?>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Gym Website</p>
    </footer>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
