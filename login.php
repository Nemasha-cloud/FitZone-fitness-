<?php
// Start the session to store login messages
session_start();
// Include the database connection
include('db_connect.php');
$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // Query the database for the username
    $query = "SELECT * FROM admin_login WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Check if the username exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username; // Store session variable
            $message = "Login successful!";
            // Redirect to dashboard after successful login
            header("Location: dashboard.php");
            exit(); // Make sure the script ends after the redirect
        } else {
            $message = "Invalid password!";
        }
    } else {
        $message = "No such user found!";
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
    <title>Login - FitZone</title>
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
    background-color: #0f1a2b; /* Dark blue background */
    background-size: cover; /* Ensures the background image covers the entire screen */
    color: #fff; /* White text for contrast */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container for forms */
.login-container, .register-container {
    background: rgba(26, 26, 46, 0.9); /* Semi-transparent dark blue background */
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 400px;
    color: #fff;
}

/* Form Title */
.login-container h2, .register-container h2 {
    text-align: center;
    color: #f9a826; /* Vibrant yellow for title */
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
    background-color: #f3f5f7; /* Light background for inputs */
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s;
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #f9a826; /* Yellow border on focus */
    outline: none;
}

/* Button styling */
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

/* Message styling */
.message, .error {
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.message {
    color: #28a745; /* Green for success messages */
}

.error {
    color: #f9a826; /* Yellow for error messages */
}

/* Link to switch between login and register */
p {
    text-align: center;
    font-size: 14px;
    color: #ddd; /* Light gray for paragraph text */
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
    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Display message if set -->
        <?php if ($message): ?>
            <p class="<?php echo ($message === "Login successful!") ? 'message' : 'error'; ?>">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <a href="index.php" class="join-us-btn-wrapper">
            <button type="index.php">Login</button>
        </form>
        </a>
        <p>Don't have an account? <a href="admin_register.php">Register</a></p>   
    </div>  
</body>
</html>
