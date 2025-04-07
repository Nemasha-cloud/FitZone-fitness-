<?php
$servername = "localhost";  // Database host
$username = "root";         // Database username
$password = "";             // Database password (empty for localhost)
$dbname = "fitness_center";        // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
