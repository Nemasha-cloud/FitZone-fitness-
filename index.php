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

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid credentials, set session and redirect
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['login_message'] = "Login successful! Welcome to your dashboard."; // Add success message to session
        header("Location: home.php");
        exit;
    } else {
        // Invalid credentials message
        $error = "Invalid email or password.";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Fitness Center</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .main {
            width: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(img/1.jpg);
            background-position: center;
            background-size: cover;
            height: 100vh;
        }

        .navbar {
            width: 1200px;
            height: 75px;
            margin: auto;
        }

        .menu {
            width: 400px;
            float: left;
            height: 70px;
        }

        ul {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li {
            list-style: none;
            margin-left: 62px;
            margin-top: 27px;
            font-size: 14px;
        }

        ul li a {
            text-decoration: none;
            color: #fff;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        ul li a:hover {
            color: #ff7200;
        }

        .search {
            width: 330px;
            float: right;
            margin-left: 280px;
        }

        .srch {
            font-family: 'Times New Roman';
            width: 200px;
            height: 40px;
            background: transparent;
            border: 1px solid #ff7200;
            margin-top: 13px;
            color: #fff;
            border-right: none;
            font-size: 16px;
            float: left;
            padding: 10px;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }

        .btn {
            width: 100px;
            height: 40px;
            background: #ff7200;
            border: 2px solid #ff7200;
            margin-top: 13px;
            color: #fff;
            font-size: 15px;
            border-bottom-right-radius: 5px;
            border-bottom-right-radius: 5px;
            transition: 0.2s ease;
            cursor: pointer;
        }

        .btn:hover {
            color: #000;
        }

        .btn:focus {
            outline: none;
        }

        .srch:focus {
            outline: none;
        }

        .content {
            width: 1200px;
            height: auto;
            margin: auto;
            color: #fff;
            position: relative;
        }

        .content .par {
            padding-left: 20px;
            padding-bottom: 25px;
            font-family: Arial;
            letter-spacing: 1.2px;
            line-height: 30px;
        }

        .content h1 {
            font-family: 'Times New Roman';
            font-size: 50px;
            padding-left: 20px;
            margin-top: 9%;
            letter-spacing: 2px;
        }

        .content .cn {
            width: 160px;
            height: 40px;
            background: #ff7200;
            border: none;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: .4s ease;
        }

        .content .cn a {
            text-decoration: none;
            color: #000;
            transition: .3s ease;
        }

        .cn:hover {
            background-color: #fff;
        }

        .content span {
            color: #ff7200;
            font-size: 65px
        }

        .form {
            width: 250px;
            height: 380px;
            background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
            position: absolute;
            top: -20px;
            left: 870px;
            transform: translate(0%,-5%);
            border-radius: 10px;
            padding: 25px;
        }

        .form h2 {
            width: 220px;
            font-family: sans-serif;
            text-align: center;
            color: #ff7200;
            font-size: 22px;
            background-color: #fff;
            border-radius: 10px;
            margin: 2px;
            padding: 8px;
        }

        .form input {
            width: 240px;
            height: 35px;
            background: transparent;
            border-bottom: 1px solid #ff7200;
            border-top: none;
            border-right: none;
            border-left: none;
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 30px;
            font-family: sans-serif;
        }

        .form input:focus {
            outline: none;
        }

        ::placeholder {
            color: #fff;
            font-family: Arial;
        }

        .btnn {
            width: 240px;
            height: 40px;
            background: #ff7200;
            border: none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
        }

        .btnn:hover {
            background: #fff;
            color: #ff7200;
        }

        .btnn a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .form .link {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            padding-top: 20px;
            text-align: center;
        }

        .form .link a {
            text-decoration: none;
            color: #ff7200;
        }

        .liw {
            padding-top: 15px;
            padding-bottom: 10px;
            text-align: center;
        }

        .icons a {
            text-decoration: none;
            color: #fff;
        }

        .icons ion-icon {
            color: #fff;
            font-size: 30px;
            padding-left: 14px;
            padding-top: 5px;
            transition: 0.3s ease;
        }

        .icons ion-icon:hover {
            color: #ff7200;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="menu">
            </div>
        </div> 
        <div class="content">
            <h1>Welcome to the <br><span>FitZone</span> <br>Fitness Center</h1>
            <p class="par"><b>Achieve your fitness goals with us. Log in to access your personalized dashboard,<br>
                view class schedules, book training sessions, and manage your membership
                with ease. <br>At FitZone, we’re here to support your journey to
                a healthier, fitter you.<b></p>

            <div class="form">
                <h2>Login Here</h2>

                <!-- Display login success message -->
                <?php if (isset($_SESSION['login_message'])): ?>
                    <p style="color: green; text-align: center;"><?php echo $_SESSION['login_message']; ?></p>
                    <?php unset($_SESSION['login_message']); ?>
                <?php endif; ?>

                <!-- Display error message if any -->
                <?php if (isset($error)): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>


    <form action="" method="post">
        <input type="email" name="email" placeholder="Enter Email Here" required>
        <input type="password" name="password" placeholder="Enter Password Here" required>
        <button class="btnn" type="submit">Login</button>
    </form>
    <p class="link">Don't have an account?<br><a href="signup.php">Sign up here</a></p>
    <p class="liw">Log in with</p>
    <div class="icons">
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
    </div>
</div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
