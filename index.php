<?php
session_start(); // Start the session

// Dummy assignment for testing
// In production, ensure this variable is set on login, for example through a login form.
if (!isset($_SESSION['admin_username'])) {
    $_SESSION['admin_username'] = "Admin"; // Default name for testing
}

// Admin dashboard title
$title = "Admin Dashboard - FitZone Fitness Center";
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
    font-family: Arial, sans-serif;
    background-color: #f3f5f7;
    color: #333;
}

/* Sidebar styling */
.sidebar {
    width: 250px;
    background-color: #1a1a2e; /* Dark blue background */
    color: #fff;
    position: fixed;
    height: 100vh;
    padding-top: 30px;
}

.sidebar h2 {
    text-align: center;
    color: #f9a826; /* Yellow color for header */
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
    color: #f9a826; /* Yellow hover effect */
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
    color: #1a1a2e; /* Dark blue for header */
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
    color: #1a1a2e; /* Dark blue for card titles */
    margin-bottom: 15px;
    font-size: 1.4em;
}

.card p {
    color: #666;
    font-size: 1em;
}

/* Button styling */
.button {
    display: inline-block;
    background-color: #f9a826; /* Yellow for buttons */
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #e6891d; /* Darker yellow on hover */
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
    <h2>FitZone Dashboard</h2>
    <ul>
        <li><a href="http://localhost/FitZone_Fitness_Center/home.php">Home</a></li>
        <li><a href="add_course.php">Manage Courses</a></li>
        <li><a href="blog_add.php">Manage Blogs</a></li>
        <li><a href="trainer_add.php">Manage Trainers</a></li>
        <li><a href="view_contact.php">Manage Queries</a></li>
        <li><a href="add_feedback.php">Manage Feedback</a></li>
        <li><a href="add_member.php">Manage Members</a></li>
        <li><a href="admin/view_booking.php">Manage Booking</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>

<div class="main-content">
    <div class="dashboard-header">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['admin_username']); ?></strong>! Manage the FitZone Fitness Center using the options below.</p>
    </div>

    <div class="card-container">
        <div class="card">
            <h3>Member Management</h3>
            <p><a href="add_member.php" class="button">Add New Member</a> | <a href="remove_member.php" class="button">Remove Member</a></p>
            <p>View and manage member details, add new members, and remove inactive members.</p>
        </div>

        <div class="card">
            <h3>Course Management</h3>
            <p><a href="add_course.php" class="button">Add New Course</a></p>
            <p>Manage fitness courses, schedule classes, and view course details.</p>
        </div>

        <div class="card">
            <h3>Trainer Management</h3>
            <p><a href="trainer_add.php" class="button">Add New Trainer</a></p>
            <p>View and manage trainers, add new trainers, and manage trainer schedules.</p>
        </div>

        <div class="card">
            <h3>Blog Management</h3>
            <p><a href="blog_add.php" class="button">Add New Blog Post</a></p>
            <p>Share fitness tips, success stories, and updates. Manage existing blog posts.</p>

        </div>
        
        <div class="card">
            <h3>Feedback</h3>
            <p><a href="add_feedback.php" class="button">Add New Feedbacks</a></p>
            <p> add new feedbacks success stories, and updates.</p>

        </div>
    </div>
</div>

</body>
</html>
