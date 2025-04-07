<?php
// Include the database connection
include('db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
    
    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $query = "SELECT * FROM admin_login WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already taken. Please choose another one.";
        exit;
    }

    // Insert the new admin user into the `admin_login` table
    $query = "INSERT INTO admin_login (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login page after successful registration
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FitZone</title>
    <link rel="stylesheet" href="styles.css">
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
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Container for the registration form */
.register-container {
    background-color: #1a1a2e; /* Dark blue background */
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    color: #fff;
}

/* Form Title */
.register-container h2 {
    text-align: center;
    color: #f9a826; /* Yellow color for title */
    font-size: 1.6em;
    font-weight: bold;
    margin-bottom: 30px;
}

/* Form labels */
label {
    font-size: 14px;
    color: #ddd; /* Light gray for labels */
    margin-bottom: 5px;
    display: block;
}

/* Input fields styling */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0 16px 0;
    border-radius: 5px;
    border: 1px solid #333366; /* Slightly darker blue border */
    background-color: #f3f5f7;
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s;
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #f9a826; /* Yellow on focus */
    outline: none;
}

/* Button styles */
button {
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

button:hover {
    background-color: #e6891d; /* Darker yellow on hover */
}

/* Link to switch between login and register */
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
    <div class="register-container">
        <h2>Admin Registration</h2>
        <form action="admin_register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" name="confirm-password" id="confirm-password" required>
            
            <button type="submit">Register here<a href="login.php"></a></button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
