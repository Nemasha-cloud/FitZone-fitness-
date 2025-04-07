<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - FitZone Fitness Center</title>
    
</head>
<body>
    <style>
           
/* Reset default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/1.jpg');
    background-size: cover;
    color: #fff;
}

/* Header Styling */
header {
    background: blac c                                                                                                              ;
    color: #fff;
    text-align: center;
    padding: 20px;
}

header h1 {
    font-size: 2.5em;
    color: #ffdd59;
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    color: #darkblue;
}

/* Booking Section */
.booking-section {
    display: flex;
    justify-content: space-between;
    margin: 40px auto;
    max-width: 1000px;
}

.booking-form {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 8px;
    width: 45%;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s;
}

.booking-form:hover {
    transform: scale(1.05);
}

.booking-form h2 {
    color: #ffdd59;
    font-size: 2em;
}

.booking-form label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.1em;
}

.booking-form input,
.booking-form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.booking-form button {
    background-color: #ff6347;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

.booking-form button:hover {
    background-color: #ff8264;
}

/* Footer Styling */
footer {
    text-align: center;
    padding: 10px 0;
    background: #2c3e50;
    color: #ecf0f1;
    position: relative;
    bottom: 0;
    width: 100%;
}

</style>

         

    <!-- Header -->
    <header>
        <h1>Book Your Course or Membership</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="membership.php">Membership</a></li>
                <li><a href="course.php">Courses</a></li>
                <li><a href="home.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Booking Form Section -->
    <main>
        <section class="booking-section">
            <!-- Course Booking -->
            <div class="booking-form">
                <h2>Book a Fitness Course</h2>
                <form action="submit_course.php" method="POST">
                    <label for="course">Select a Classes:</label>
                    <select id="course" name="course" required>
                        <option value="Yoga">Yoga</option>
                        <option value="HIIT">HIIT</option>
                        <option value="Zumba">Zumba</option>
                        <option value="Strength Training">Strength Training</option>
                        <option value="Cardio">Cardio</option>
                    </select>

                    <label for="course-date">Select Course Date:</label>
                    <input type="date" id="course-date" name="course_date" required>

                    <label for="course-time">Select Course Time:</label>
                    <input type="time" id="course-time" name="course_time" required>

                    <label for="course-name">Your Full Name:</label>
                    <input type="text" id="course-name" name="course_name" required>

                    <label for="course-email">Your Email:</label>
                    <input type="email" id="course-email" name="course_email" required>

                    <button type="submit" class="btn-primary">Book Course</button>
                </form>
            </div>

            <!-- Membership Booking -->
            <div class="booking-form">
                <h2>Choose Your Membership</h2>
                <form action="submit_membership.php" method="POST">
                    <label for="membership-plan">Select a Membership Plan:</label>
                    <select id="membership-plan" name="membership_plan" required>
                        <option value="Basic">Basic Membership - $20 / month</option>
                        <option value="Premium">Premium Membership - $50 / month</option>
                        <option value="Elite">Elite Membership - $80 / month</option>
                    </select>

                    <label for="membership-name">Your Full Name:</label>
                    <input type="text" id="membership-name" name="membership_name" required>

                    <label for="membership-email">Your Email:</label>
                    <input type="email" id="membership-email" name="membership_email" required>

                    <label for="membership-phone">Your Phone Number:</label>
                    <input type="tel" id="membership-phone" name="membership_phone" required>

                    <button type="submit" class="btn-primary">Join Now</button>
                </form>
            </div>
        </section>
    </main>

</body>
</html>
