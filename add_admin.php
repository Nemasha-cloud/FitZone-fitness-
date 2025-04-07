<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $name = $_POST['name'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];

    $sql = "INSERT INTO users (email, password, name, age, weight) VALUES ('$email', '$password', '$name', '$age', '$weight')";

    if ($conn->query($sql) === TRUE) {
        echo "New member added successfully";
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
    <title>Add Member</title>
</head>
<body>
    <h2>Add New Member</h2>
    <form method="POST" action="">
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Password:</label><input type="password" name="password" required><br>
        <label>Name:</label><input type="text" name="name" required><br>
        <label>Age:</label><input type="number" name="age" required><br>
        <label>Weight:</label><input type="number" step="0.01" name="weight" required><br>
        <button type="submit">Add Member</button>
    </form>
</body>
</html>
