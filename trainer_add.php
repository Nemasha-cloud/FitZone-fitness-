<?php
// Database credentials
$host = "localhost";
$dbname = "fitness_center"; // Your database name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
include('db_connect.php');

// Handling the add trainer form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_trainer'])) {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $experience = $_POST['experience'];
    $bio = $_POST['bio'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    // Move the uploaded photo to the 'uploads' folder
    $photo_path = 'uploads/' . basename($photo);
    move_uploaded_file($photo_tmp, $photo_path);

    // Insert the trainer's information into the database
    $sql = "INSERT INTO trainers (name, specialty, experience, bio, photo) VALUES ('$name', '$specialty', '$experience', '$bio', '$photo_path')";

    if ($conn->query($sql) === TRUE) {
        echo "New trainer added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handling the edit trainer form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_trainer'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $experience = $_POST['experience'];
    $bio = $_POST['bio'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    // If a new photo is uploaded, move it and update the photo path
    if (!empty($photo)) {
        $photo_path = 'uploads/' . basename($photo);
        move_uploaded_file($photo_tmp, $photo_path);
    } else {
        $photo_path = $_POST['existing_photo']; // Keep the existing photo if no new one is uploaded
    }

    // Update the trainer's information
    $sql = "UPDATE trainers SET name='$name', specialty='$specialty', experience='$experience', bio='$bio', photo='$photo_path' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Trainer updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handling the delete trainer action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Delete the trainer from the database
    $sql = "DELETE FROM trainers WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Trainer deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch trainers from the database
$sql = "SELECT * FROM trainers";
$result = $conn->query($sql);
?>

<!-- HTML Part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trainers - FitZone</title>
</head>
<style>
/* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    background-color: #1a1a2e; /* Dark blue background */
    padding: 20px;
}

/* Container for the whole page */
.container {
    max-width: 1200px;
    width: 100%;
}

/* Title */
h1 {
    color: #f9a826; /* Yellow color for title */
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5em;
}

/* Add Trainer Section */
h2 {
    color: #fff; /* White text for section heading */
    margin-top: 20px;
    font-size: 1.8em;
    text-align: center;
}

/* Form styling */
form {
    background: #2e3a59; /* Dark background with blue tint */
    color: white;
    padding: 30px;
    border-radius: 8px;
    max-width: 600px;
    margin-bottom: 50px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
    font-size: 14px;
    color: #ddd;
    margin-bottom: 8px;
    display: block;
}

form input[type="text"],
form input[type="file"],
form textarea {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    margin-bottom: 16px;
    border-radius: 5px;
    border: 1px solid #333366; /* Darker blue border */
    background-color: #f3f5f7; /* Light gray background for inputs */
    font-size: 16px;
    color: #333;
}

form input[type="submit"] {
    background-color: #f9a826; /* Yellow for button */
    color: #1a1a2e; /* Dark blue text for contrast */
    border: none;
    padding: 14px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

form input[type="submit"]:hover {
    background-color: #e6891d; /* Darker yellow on hover */
}

/* Trainer list */
h2 + hr {
    width: 100%;
    border: 1px solid #ddd;
}

div {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: left;
    width: 100%;
    max-width: 800px;
}

div img {
    max-width: 100px;
    max-height: 100px;
    border-radius: 50%;
    margin-right: 20px;
    vertical-align: middle;
}

div span {
    display: block;
    margin-top: 10px;
}

div a {
    color: #f9a826; /* Yellow color for links */
    text-decoration: none;
    margin-right: 10px;
}

div a:hover {
    text-decoration: underline;
}

/* Success/Error messages */
.success,
.error {
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.success {
    color: #28a745; /* Green for success */
}

.error {
    color: #f9a826; /* Yellow for error */
}

</style>
<body>

    <h1>Trainer Management</h1>

    <!-- Add Trainer Form -->
    <h2>Add New Trainer</h2>
    <form action="trainer_add.php" method="POST" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Specialty:</label><br>
        <input type="text" name="specialty" required><br><br>

        <label>Experience:</label><br>
        <input type="text" name="experience" required><br><br>

        <label>Bio:</label><br>
        <textarea name="bio" required></textarea><br><br>

        <label>Photo:</label><br>
        <input type="file" name="photo" required><br><br>

        <input type="submit" name="add_trainer" value="Add Trainer">
    </form>

    <hr>

    <!-- List of Trainers -->
    <h2>Existing Trainers</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<img src='{$row['photo']}' alt='{$row['name']}' style='width: 100px; height: 100px;'><br>";
            echo "<strong>Name:</strong> {$row['name']}<br>";
            echo "<strong>Specialty:</strong> {$row['specialty']}<br>";
            echo "<strong>Experience:</strong> {$row['experience']}<br>";
            echo "<strong>Bio:</strong> {$row['bio']}<br>";
            echo "<a href='trainers.php?edit={$row['id']}'>Edit</a> | ";
            echo "<a href='trainers.php?delete={$row['id']}'>Delete</a>";
            echo "</div><hr>";
        }
    } else {
        echo "No trainers found!";
    }

    $conn->close();
    ?>

</body>
</html>
