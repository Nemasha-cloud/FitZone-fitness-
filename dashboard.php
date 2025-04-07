<?php
session_start(); // Start the session

// Dummy assignment for testing
if (!isset($_SESSION['staff_username'])) {
    $_SESSION['staff_username'] = "Staff"; // Default name for testing
}

// Staff dashboard title
$title = "Staff Dashboard - FitZone Fitness Center";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style1.css">
</head>
<style>
    /* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #ffffff; /* White background */
    font-family: Arial, sans-serif;
    color: #333;
}

/* Sidebar styling */
.sidebar {
    width: 250px;
    background-color: #1a1a2e;
    color: #fff;
    position: fixed;
    height: 100vh;
    padding-top: 30px;
}

.sidebar h2 {
    text-align: center;
    color: #f9a826;
    font-size: 1.6em;
    margin-bottom: 30px;
}

.sidebar ul {
    list-style-type: none;
}

.sidebar ul li {
    padding: 15px 20px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

.sidebar ul li a:hover {
    color: #f9a826;
}

/* Main content styling */
.main-content {
    margin-left: 270px;
    padding: 20px;
}

.dashboard-header {
    text-align: center;
    padding: 10px 0;
}

.dashboard-header h1 {
    color: #1a1a2e;
}

.dashboard-header p {
    font-size: 1.2em;
    color: #555;
}

/* Dashboard card styling */
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-top: 20px;
}

.card {
    background-color: #fff;
    width: 45%;
    max-width: 400px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-10px);
}

.card h3 {
    color: #1a1a2e;
    margin-bottom: 15px;
    font-size: 1.4em;
}

.card p {
    color: #666;
    font-size: 1em;
}

.button {
    display: inline-block;
    background-color: #f9a826;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #e6891d;
}

/* Responsive design */
@media (max-width: 768px) {
    .sidebar {
        display: none;
    }

    .main-content {
        margin: 0;
        padding: 20px;
    }

    .card {
        width: 100%;
    }
}
</style>


<body>

<div class="sidebar">
    <h2>FitZone Staff</h2>
    <ul>
        <li><a href="http://localhost/FitZone_Fitness_Center/home.php">Home</a></li>
        <li><a href="courses_view.php">View Courses</a></li>
        <li><a href="view_trainer.php">View Trainers</a></li>
        <li><a href="view_members.php">View Members</a></li>
        <li><a href="view_booking.php">View Bookings</a></li>
        <li><a href="feedback_view.php">Submit Feedback</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>

<div class="main-content">
    <div class="dashboard-header">
        <h1>Welcome to the Staff Dashboard</h1>
        <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['staff_username']); ?></strong>! Here are your tools for managing tasks at FitZone Fitness Center.</p>
    </div>

    <div class="card-container">
        <div class="card">
            <h3>Member Overview</h3>
            <p><a href="view_members.php" class="button">View Members</a></p>
            <p>View and monitor member attendance, check-in records, and engagement.</p>
        </div>

        <div class="card">
            <h3>Course Overview</h3>
            <p><a href="courses_view.php" class="button">View Courses</a></p>
            <p>Stay updated on course schedules, track attendance, and support training sessions.</p>
        </div>

        <div class="card">
            <h3>Trainer Support</h3>
            <p><a href="view_trainer.php" class="button">View Trainers</a></p>
            <p>Assist trainers with schedules, session updates, and feedback collection.</p>
        </div>

        <div class="card">
            <h3>Bookings</h3>
            <p><a href="B=view_booking.php" class="button">View Bookings</a></p>
            <p>View and manage bookings for courses and memberships seamlessly online.</p>
        </div>

        <div class="card">
            <h3>Submit Feedback</h3>
            <p><a href="feedback_view.php" class="button">Submit Feedback</a></p>
            <p>Provide feedback on member interactions, courses, and any support needed.</p>
        </div>
    </div>
</div>

</body>
</html>
