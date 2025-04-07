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
    <title>Membership Plans - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
/* Reset styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: Arial, sans-serif;
    background: url('img/AAA05902-1.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #333;
    line-height: 1.6;
}

/* Header Styling */
header {
    background: rgba(0, 0, 0, 0.7); /* Dark overlay for contrast */
    color: #fff;
    text-align: center;
    padding: 20px;
    position: relative;
}

header h1 {
    font-size: 2.5em;
    margin-top: 10px;
}

header nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    padding: 10px;
}

header nav ul li {
    margin: 0 15px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.1em;
}

header nav ul li a:hover {
    color: #ffd700;
}

/* Main Content */
main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.8); /* Semi-transparent background for content */
    border-radius: 10px;
}

/* Membership Plans Styling */
.membership-plans {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.plan {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    text-align: center;
    transition: transform 0.3s ease-in-out;
}

.plan:hover {
    transform: translateY(-10px);
}

.plan h2 {
    font-size: 1.8em;
    color: #ff6b6b;
}

.plan ul {
    list-style: none;
    text-align: left;
    padding: 0;
}

.plan ul li {
    margin: 10px 0;
    font-size: 1.1em;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background: #6c5ce7;
    color: #fff;
    text-decoration: none;
    font-size: 1.2em;
    border-radius: 5px;
    margin-top: 15px;
    transition: background 0.3s ease;
}

.btn:hover {
    background: #a29bfe;
}

/* Footer Styling */
footer {
    background: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    position: relative;
    bottom: 0;
    width: 100%;
}

/* Responsive Design */
@media (max-width: 768px) {
    .membership-plans {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<body>

    <!-- Header -->
    <header>
        <h1>FitZone Membership Plans</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="membership.php" class="active">Membership Plans</a></li>
                <li><a href="home.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <section class="membership-plans">
            <div class="plan">
                <h2>Basic Membership</h2>
                <ul>
                    <li>Access to gym facilities</li>
                    <li>1 Free fitness assessment</li>
                    <li>Group workout classes</li>
                    <li>24/7 gym access</li>
                </ul>
                <a href="index.php" class="btn">Join Now</a>
            </div>

            <div class="plan">
                <h2>Premium Membership</h2>
                <ul>
                    <li>All Basic Membership benefits</li>
                    <li>Unlimited personal training sessions</li>
                    <li>Access to premium workout areas</li>
                    <li>Free access to fitness workshops</li>
                </ul>
                <a href="index.php" class="btn">Join Now</a>
            </div>

            <div class="plan">
                <h2>Elite Membership</h2>
                <ul>
                    <li>All Premium Membership benefits</li>
                    <li>Exclusive VIP lounge access</li>
                    <li>Priority booking for personal trainers</li>
                    <li>Free nutrition consultation</li>
                </ul>
                <a href="index.php" class="btn">Join Now</a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>

</body>
</html>
