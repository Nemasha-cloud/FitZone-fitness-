<?php
// Start the session at the beginning
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_center";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];

    // Sanitize input to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $name = $conn->real_escape_string($name);
    $age = (int)$age; // Ensure age is an integer
    $weight = (float)$weight; // Ensure weight is a float

    // Check if the email already exists
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);

    if ($result->num_rows > 0) {
        // If email exists, show an error message
        $error = "This email is already registered! Please use a different email.";
    } else {
        // Hash the password for secure storage
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query to insert new user
        $sql = "INSERT INTO users (email, password, name, age, weight) VALUES ('$email', '$hashed_password', '$name', $age, $weight)";
        
        if ($conn->query($sql)) {
            // User registered successfully
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("Location: index.php"); // Redirect to login page or home page
            exit;
        } else {
            // Error during registration
            $error = "Error: " . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Fitness Center - Sign Up</title>
    <link rel="stylesheet" href="log.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.5) 50%), url('img/1.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    height: 100vh;
}

.main {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
    height: 100vh;
}

.content {
    max-width: 50%;
}

.content h1 {
    font-family: 'Times New Roman', serif;
    font-size: 50px;
    margin-bottom: 20px;
    letter-spacing: 2px;
}

.content h1 span {
    color: #ff7200;
}

.form {
    width: 300px;
    padding: 30px;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    position: absolute;
    right: 50px;
    top: 50%;
    transform: translateY(-50%);
}

.form h2 {
    color: #ff7200;
    font-size: 24px;
    margin-bottom: 20px;
}

.form input {
    width: 100%;
    height: 40px;
    margin: 10px 0;
    padding: 0 10px;
    background: transparent;
    border: 1px solid #ff7200;
    border-radius: 5px;
    color: #fff;
    font-size: 14px;
}

.form input:focus {
    outline: none;
    border-color: #fff;
}

.form .btnn {
    width: 100%;
    height: 45px;
    background: #ff7200;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.form .btnn:hover {
    background: #ff9100;
}

.form .link {
    font-size: 14px;
    margin-top: 20px;
}

.form .link a {
    color: #ff7200;
    text-decoration: none;
    font-weight: bold;
}

.form .link a:hover {
    text-decoration: underline;
}

.liw {
    margin-top: 20px;
    font-size: 14px;
    color: #ccc;
}

.icons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
}

.icons a {
    color: #fff;
    font-size: 25px;
    transition: color 0.3s;
}

.icons a:hover {
    color: #ff7200;
}

</style>
<body>
    <div class="main">
        <div class="content">
            <h1>Welcome to the <br><span>FitZone</span> <br>Fitness Center</h1>
            <p class="par"><b>Join us today and start your fitness journey!</b></p>
        </div>

        <div class="form">
            <h2>Sign Up Here</h2>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="signup.php" method="post">
                <input type="email" name="email" placeholder="Enter Email Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required>
                <input type="text" name="name" placeholder="Enter Your Name" required>
                <input type="number" name="age" placeholder="Enter Your Age" required min="1">
                <input type="number" name="weight" placeholder="Enter Your Weight (kg)" required step="0.1" min="0">
                <button class="btnn" type="submit">Sign Up</button>
            </form>
            <p class="link">Already have an account?<br><a href="home.php">Login here</a></p>
            <p class="liw">Sign up with</p>
            <div class="icons">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
