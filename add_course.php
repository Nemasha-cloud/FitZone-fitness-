<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO courses (name, description, duration, start_date, end_date) VALUES ('$name', '$description', '$duration', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
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
    background-color: #1a1a2e;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

/* Form container */
.course-form {
    background: rgba(26, 26, 46, 0.9); /* Semi-transparent dark background */
    border-radius: 8px;
    width: 100%;
    max-width: 500px;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: white;
}

/* Title styling */
h2 {
    color: #f9a826; /* Yellow color */
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.8em;
}

/* Label styling */
label {
    font-size: 14px;
    color: #ddd; /* Light gray */
    margin-bottom: 8px;
    display: block;
}

/* Input field styling */
input[type="text"],
input[type="number"],
input[type="date"],
textarea {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    margin-bottom: 16px;
    border-radius: 5px;
    border: 1px solid #333366; /* Darker blue border */
    background-color: #f3f5f7; /* Light gray background for inputs */
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s;
}

/* Focus effect for input fields */
input[type="text"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
textarea:focus {
    border-color: #f9a826; /* Yellow color on focus */
    outline: none;
}

/* Textarea styling */
textarea {
    resize: vertical;
    height: 120px;
}

/* Button styling */
button {
    background-color: #f9a826; /* Yellow background */
    color: #1a1a2e; /* Dark blue text */
    border: none;
    padding: 14px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

/* Button hover effect */
button:hover {
    background-color: #e6891d; /* Darker yellow on hover */
}

/* Success and error message styling */
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

/* Link to switch between pages */
p {
    text-align: center;
    font-size: 14px;
    color: #ddd;
}

a {
    color: #f9a826; /* Yellow for links */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}


</style>
<body>
    <h2>Add New Course</h2>
    <form method="POST" action="">
        <label>Course Name:</label><input type="text" name="name" required><br>
        <label>Description:</label><textarea name="description" required></textarea><br>
        <label>Duration (weeks):</label><input type="number" name="duration" required><br>
        <label>Start Date:</label><input type="date" name="start_date" required><br>
        <label>End Date:</label><input type="date" name="end_date" required><br>
        <button type="submit">Add Course</button>
    </form>
</body>
</html>
