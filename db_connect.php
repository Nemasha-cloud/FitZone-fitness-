<?php
$servername = "127.0.0.1";
$username = "root"; // Adjust based on your MySQL username
$password = ""; // Adjust based on your MySQL password
$database = "fitness_center";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
