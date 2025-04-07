<?php
// Database connection details
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "fitness_center"; // Change this to your database name

// Create connection to MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);
$msg="";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate form fields
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the query
        if ($stmt->execute()) {
            $msg="Message Sent Successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please fill in all fields!";
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FitZone Fitness Center</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      
       /* CSS Variables and Global Styles */
 :root {
  --primary-color: #f36100;
  --secondary-color: #fb8122;

  --primary-text-color: white;
  --secondary-text-color: #fcffff;

  --bgcolor: #0e2761;
  --bgcolor2: #08155c;
}


body {
  background-color: var(--bgcolor);
  color: var(--primary-text-color);
}



body {
  width:100%;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.5) 50%), url(img/wall.jpg);
  background-position: center;
  background-size: cover;
  height: 150vh;
  
}

/* General Styles */
body {
    font-family: 'timesnew romen'; /* Use a clean, modern font */
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

/* Navbar Styles */
#navbar {
    background-color: #060a46; /* Dark blue background */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    z-index: 1000; /* Keep the navbar on top */
    font-weight: bold;
    font-size: 2rem;
    width: center;
}

.navbar-brand {
    font-size: 2rem;
    font-weight: bold;
    font-family: 'Times New Roman', Times, serif;
    color: #f47134; /* Primary brand color */
    transition: color 0.3s;

}

.navbar-brand:hover {
    color: #f47134; /* Keep the same hover color */
}

.navbar-nav .nav-link {
    font-size: 1.1rem;
    color: #ee7a1b; 
    margin: 0 10px; 
    transition: color 0.3s;
}

.navbar-nav .nav-link:hover {
    color: #f47134; 
}

/* Style for the logout button */
.btn-outline-primary {
    display: flex;
    align-items: center;
    padding: 8px 16px; 
    background-color: transparent; 
    border: 2px solid #007bff; 
    border-radius: 50px; 
    font-weight: 500; 
    color: #007bff; 
    transition: all 0.3s ease; 
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
}

.btn-outline-primary img {
    width: 24px; /* Adjust image size */
    height: 24px; /* Adjust image size */
    border-radius: 50%; /* Optional: makes the image circular */
    margin-right: 8px; /* Space between image and text */
}

/* Additional optional styling */
.btn-outline-primary:focus {
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Custom focus border */
}


/* Hero Section */
.hero {
    color: rgb(255, 255, 255);
    padding: 100px 0;
    text-align: center;
    width:100%;
    
}

/* Transparent box styling */
.transparent-box {
  background: linear-gradient( rgba(0, 0, 0, 0.905) 50%), url(img/wall.jpg);
    background-color: rgba(7, 4, 67, 0.455); /* Darker semi-transparent overlay */
    color: #ffffff; /* Light text for contrast */
    border-radius: 10px;
    padding: 30px;
    max-width: 800px;
    margin: auto;
    box-shadow: 0 4px 15px rgb(244, 85, 6); /* Subtle shadow effect */
}


/* Hero Content */
.hero-title {
    font-size: 5rem;
    font-family: 'Times New Roman', Times, serif;
    color: #f8824f; /* Dark text for readability */
    font-weight: bold;
    margin-bottom: 20px;
}

.hero-subtitle {
    font-family: 'Times New Roman', Times, serif;
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 30px;
    color: #aca6fb; /* Dark text for readability */
}
#h6{
  font-family: 'Times New Roman', Times, serif;
  color: #ee7a1b;
  font-size: medium;
  font-weight: bold;
  margin-bottom: 20px;
}


/* Button in Hero Section */
.btn-primary {
    background-color: #ffffff;
    color: rgb(248, 107, 26);
    padding: 12px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-primary:hover {
    background-color: #f76a24;
    transform: scale(1.05);
}


/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem; /* Reduce title size on small screens */
    }

    .hero-subtitle {
        font-size: 1.3rem; /* Reduce subtitle size on small screens */
    }

    .navbar-nav .nav-link {
        font-size: 1rem; /* Smaller nav link size on small screens */
    }
}

/* FREE ACCESS CARDS SECTION STYLES */
.free-access {
    padding: 2rem 0; /* Padding for section */
    text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.32);
    font-weight: bold;
}

.free-access h2 {
    font-size: 2.5rem; /* Heading font size */
    margin-bottom: 1.5rem; /* Margin below heading */
    color: #f4f7fb; /* Dark color for heading */
}

.row {
    display: flex; /* Flexbox for card alignment */
    flex-wrap: wrap; /* Wrap cards to next line if needed */
    justify-content: center; /* Center cards in the row */
}

.card {
    border: none; /* No border on cards */
    border-radius: 0.5rem; /* Rounded corners */
    transition: transform 0.2s; /* Smooth hover effect */
    flex: 1 1 250px; /* Flex-grow and shrink for equal size cards */
    max-width: 300px; /* Set a maximum width for the cards */
    margin: 1rem; /* Margin around cards */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow for cards */
    padding: 1.5rem; /* Padding for card content */
    text-align: center; /* Center align text in cards */
}

.card:hover {
    transform: translateY(-5px); /* Lift effect on hover */
}

.card-title {
    font-size: 1.5rem; /* Title font size */
    font-weight: bold; /* Bold title */
    color: #343a40; /* Dark color for title */
    margin-top: 1rem; /* Margin above title */
}

.card-text {
    color: #f4f7f9; /* Gray color for card text */
}

/* ICON STYLES */
.card-icon {
    font-size: 3rem; /* Size of the icon */
    color: #007bff; /* Primary color for icons */
    margin-bottom: 1rem; /* Margin below the icon */
}

/* MEDIA QUERIES */
@media (max-width: 768px) {
    .free-access h2 {
        font-size: 2rem; /* Smaller heading on mobile */
    }

    .card-title {
        font-size: 1.25rem; /* Smaller card title on mobile */
    }

    .card-text {
        font-size: 0.9rem; /* Smaller card text on mobile */
    }
}



/* ABOUT US SECTION STYLES */
#about .display-3 {
    color: #fdfdfd; /* Bright blue color for the heading */
    margin-bottom: 2rem; /* Margin below the heading */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); /* Slight shadow for depth */
}

.description {
    background-color: rgba(6, 4, 46, 0.907); /* Dark, slightly transparent background for readability */
    font-weight: bold;
    border-radius: 1rem; /* Rounded corners */
    box-shadow: 0 8px 20px rgb(238, 93, 3); /* Subtle shadow for depth */
    opacity: 0.9; /* Transparency */
    padding: 2rem; /* Padding around the content */
    transition: transform 0.3s; /* Transition effect for hover or other animations */
}


.description:hover {
    transform: scale(1.02); /* Slight scale on hover */
}

.description p {
    font-size: 1.25rem; /* Slightly larger font for paragraph */
    color: #fcf8f8; /* Dark color for the text */
    line-height: 1.6; /* Increased line height for readability */
}

@media (max-width: 768px) {
    #about .display-3 {
        font-size: 2rem; /* Smaller heading on mobile */
    }

    .description p {
        font-size: 1rem; /* Smaller text on mobile */
    }
}


/* SERVICES SECTION STARTS */

#services a {
  color: var(--primary-text-color);
  text-decoration: none;
  transition: 0.5s all;
}

#services a:hover {
  color: var(--primary-color);
  text-decoration: none;
}
#services a:active {

  /* color: var(--secondary-color); */
  color: white;
  text-decoration: none;
}

#services li {
  margin: 20px;
  background-color: transparent;
}
#services img {
  width: 100%;
}
.images {
  padding: 0 !important;
  -webkit-box-shadow: 0px 0px 28px 0px rgba(251, 129, 34, 0.75);
  -moz-box-shadow: 0px 0px 28px 0px rgba(251, 129, 34, 0.75);
  box-shadow: 0px 0px 28px 0px rgba(251, 129, 34, 0.75);
}

.membership:hover,
.membership:active,
.membership:focus {
  background-color: var(--secondary-color);
  color: var(--secondary-text-color) !important;
  border-color: var(--secondary-color);
}

/* Cards */
.card {
  background-color: var(--bgcolor2);
  align-items: center;
}
#services i {
  font-size: 100px;
  padding: 30px 20px;
}
.card-title {
  color: var(--secondary-color);
}

/* Cards */

/* SERVICES SECTION ENDS */

/* TEAM SECTION STARTS */
#team .card {
  transition: transform 0.5s ease;
}

#team .card:hover {
  transform: scale(1.1);
}

#team .membership {
  transition: transform 0.5s ease;
}

#team .membership:hover,
.membership:active,
.membership:focus {
  background-color: var(--secondary-color);
  color: var(--secondary-text-color) !important;
  border-color: var(--secondary-color);
  transform: scale(1.1);
}
/* TEAM SECTION ENDS */

/* Packages Section Styling */
#packages {
  padding: 50px 0;
}

.pricing-contents {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 80px;
}

.pricing-card {
  background-color: rgba(243, 236, 245, 0.85);
  border-radius: 10px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: 300px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.pricing-card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.pricing-card-header {
  text-align: center;
  padding: 10px;
  border-radius: 8px 8px 0 0;
}

.pricing-card-title {
  font-size: 1.8em;
  font-weight: bold;
  color: #fb8122;
  padding: 5px 0;
}

/* Unique Background Colors for Each Package */
.pricing-card:nth-child(1) .pricing-card-header { background-color: #0b0756; } /* Silver */
.pricing-card:nth-child(2) .pricing-card-header { background-color: #0b0756; } /* Gold */
.pricing-card:nth-child(3) .pricing-card-header { background-color: #0b0756; } /* Platinum */
.pricing-card:nth-child(4) .pricing-card-header { background-color: #0b0756; } /* Diamond */
.pricing-card:nth-child(5) .pricing-card-header { background-color: #0b0756; } /* Basic */

.price-circle {
  background-color: #ffffff;
  color: #000;
  border-radius: 50%;
  padding: 15px;
  margin-top: 10px;
  font-size: 1.5em;
  display: inline-block;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
}

.price-circle .price {
  display: block;
  font-size: 1.8em;
  font-weight: bold;
}

.price-circle .desc {
  font-size: 0.9em;
  color: #333;
}

.pricing-card-body ul {
  list-style: none;
  padding: 0;
  margin: 0;
  margin-top: 15px;
}

.pricing-card-body li {
  margin: 10px 0;
  font-size: 1em;
  color: #555;
  display: flex;
  align-items: center;
  transition: color 0.3s;
}

.pricing-card-body li:hover {
  color: #333;
}

.pricing-card-body li i {
  color: #4caf50;
  position: center;
  margin-right: 10px;
}

.join-us-btn-wrapper {
  text-align: center;
  margin-top: 20px;
}

.btn.price-plan-btn {
  background-color: #4caf50;
  position: center;
  color: #fff;
  padding: 10px 25px;
  border: none;
  border-radius: 5px;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.3s;
}

.btn.price-plan-btn:hover {
  background-color: #388e3c;
  position: center;
  transform: scale(1.05);
}

/* Blog Section */
.blog-section {
    padding: 60px 20px;
    text-align: center;
}

.blog-section h2 {
    font-size: 4rem;
    color: #fdf9f9;
    margin-bottom: 40px;
}

/* Blog Card Container */
.blog-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Blog Card */
.blog-card {
    background-color: rgb(173, 188, 245);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    padding: 20px;
    text-align: left;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.blog-card:hover {
    transform: scale(1.05);
}

.blog-card img {
    width: 100%;
    height: 180px;
    border-radius: 8px;
    object-fit: cover;
    margin-bottom: 15px;
}

.blog-card h3 {
    font-size: 1.5em;
    color: #333;
    margin-bottom: 10px;
}

.blog-card p {
    font-size: 1em;
    color: #666;
    margin-bottom: 15px;
}

.read-more {
    font-size: 1em;
    color: #0e0c4d;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

.read-more:hover {
    color: #d45d28;
}

/* See More Button */
.see-more-button {
    display: inline-block;
    margin-top: 40px;
    padding: 12px 30px;
    font-size: 1em;
    color: white;
    background-color: #f47134;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
}

.see-more-button:hover {
    background-color: #d45d28;
    transform: scale(1.05);
}

/* Contact Section */
.contact-section {
    font-size: 1.25rem;
    padding: 60px 20px;
    text-align: center;
    position: relative;
    background-color: rgba(15, 6, 76, 0.711); 
    color: white;
    max-width: 800px; 
    margin: auto; 
    border-radius: 15px; 
    box-shadow: 0 8px 20px rgb(255, 115, 0); 
    padding: 40px; 
    backdrop-filter: blur(5px);
}

.contact-section h2 {
    font-size: 3.5rem;
    max-width: 700px;
    margin: 0 auto;
}

.contact-section p, .contact-container {
  max-width: 700px;
    margin: 0 auto;
}

.contact-section p {
    font-size: 1em;
    color: #ff870e;
    margin-bottom: 30px;
}

/* Contact Form and Details Container */
.contact-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    max-width: 900px;
    margin: auto;
}

/* Contact Form */
.contact-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
}

.contact-form textarea {
    height: 120px;
    resize: vertical;
}

.submit-button {
    padding: 12px;
    background-color: #f47134;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
}

.submit-button:hover {
    background-color: #d45d28;
}

/* Contact Details */
.contact-details {
    max-width: 400px;
    padding: 20px;
    text-align: left;
}

.contact-details p {
    font-size: 1em;
    color: #fffdfd;
    margin: 8px 0;
}

/* Social Media Icons */
.social-media {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-icon {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2em;
    border-radius: 50%;
    transition: background-color 0.3s;
}

/* Individual Social Media Colors */
.social-icon.facebook { background-color: #3b5998; }  /* Facebook */
.social-icon.whatsapp { background-color: #25D366; }  /* WhatsApp */
.social-icon.twitter { background-color: #1da1f2; }   /* Twitter */
.social-icon.instagram { background-color: #e4405f; } /* Instagram */
.social-icon.google { background-color: #db4437; }    /* Google */

.social-icon:hover {
    opacity: 0.8; /* Slight transparency on hover */
}


</style>


   <!-- NAVBAR STARTS -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="#home">FitZone</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#mynavbar"
      aria-controls="mynavbar"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span><i class="fa-solid fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#team">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#packages">Packages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="membership.php">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking.php">Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feedback.php">Feedbacks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
      <a href="index.php" class="btn btn-outline-primary ms-3">Login</a>
      <a href="logout.php" class="btn btn-outline-primary ms-3">Logout</a>
    </div>
  </div>
</nav>
<!-- NAVBAR ENDS -->

<!-- Hero Section -->
<section id="home" class="hero">
  <div class="transparent-box"> <!-- Transparent box wrapper -->
      <div class="hero-content">
          <h2 class="hero-title">Welcome to FitZone Fitness Center</h2>
          <p class="hero-subtitle"><b>Your journey to a healthier, fitter life starts here!</b></p>
          <p>FitZone is a high-energy fitness center in Kurunegala that supports members in achieving their health and wellness goals. 
            With a state-of-the-art facility, it caters to all fitness levels, from beginners to enthusiasts, fostering a supportive community environment.</p>
          <br>
          <h6 class="hero-subtitle">What We Offer</h6>
          <ul class="list-unstyled">
              <li><strong>Diverse Classes:</strong> From high-intensity cardio to calming yoga sessions,<br> we have a class for every interest.</li>
              <li><strong>Personalized Training:</strong> Expert trainers provide customized support tailored to your needs.</li>
              <li><strong>Modern Facilities:</strong> Train with top-of-the-line equipment in a welcoming space.</li>
              <li><strong>Flexible Memberships:</strong> Choose from a variety of plans that fit your budget and goals.</li>
          </ul>
          <br>
          <h6 class="hero-subtitle">Why Join FitZone?</h6>
          <p>When you join FitZone, you're not just signing up for a gym; you're joining a community. Enjoy exclusive events, workout routines, and nutritional guidance. Check out our blog for tips, recipes, success stories, and more.</p>
          <br>
          <h6 class="hero-subtitle">Get Started Today!</h6>
          <br>
          <a href="signup.php" class="btn-primary">Join Us Today</a>
      </div>
  </div>
</section>
<!-- Hero section ends -->  

<!-- FREE ACCESS CARDS SECTION STARTS -->
<section class="free-access">
  <div class="container py-5">
    <h2 class="text-center mb-4">Enjoy Our Free Access Benefits</h2>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body text-center">
            <i class="fas fa-bolt card-icon"></i> <!-- Free Trial Class Icon -->
            <h5 class="card-title">Free Trial Class</h5>
            <p class="card-text">Experience any class for free on your first visit to find what you love!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body text-center">
            <i class="fas fa-user-check card-icon"></i> <!-- Fitness Assessment Icon -->
            <h5 class="card-title">Complimentary Fitness Assessment</h5>
            <p class="card-text">Get a personalized fitness assessment to kickstart your journey.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body text-center">
            <i class="fas fa-apple-alt card-icon"></i> <!-- Nutrition Workshop Icon -->
            <h5 class="card-title">Free Nutrition Workshop</h5>
            <p class="card-text">Join our nutrition workshops to learn healthy eating habits and meal planning.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body text-center">
            <i class="fas fa-users card-icon"></i> <!-- Group Fitness Events Icon -->
            <h5 class="card-title">Group Fitness Events</h5>
            <p class="card-text">Participate in our community group events for motivation and fun!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FREE ACCESS CARDS SECTION ENDS -->

<!-- HERO SECTION ENDS -->

<!-- ABOUT US SECTION STARTS --> 
<section class="py-3 py-md-5" id="about">
  <div class="container">
    <div class="col-md-12">
      <div class="display-3 text-center"><b>About Us</b></div>
        <div class="col-md-10 offset-md-1 mt-5 mb-3 pt-0 pb-1 px-4 description">
            
            
            <p class="fs-3 mt-4 pt-4">
                At FitZone Fitness Center, we are dedicated to helping you achieve your fitness and well-being goals. Located in Kurunegala, 
                we offer a wide range of state-of-the-art equipment, personalized training sessions, 
                group classes, and expert nutrition counseling. Whether you're looking to build strength, 
                enhance flexibility, or improve overall health, our certified trainers and diverse programs like cardio, yoga, 
                and strength training are tailored to meet your needs. Explore our membership plans, register for classes, and 
                discover workout routines, healthy meal ideas, and success stories—all designed to support your fitness journey!
            </p>
        </div>
      </div>
  </div>
</section>
<!-- ABOUT US SECTION ENDS -->  


    <!-- SERVICES SECTION STARTS -->
    <section class="py-3 py-md-5" id="services">
      <div class="container">
        <div class="col-md-12">
          <div class="display-3 text-center"><b>Our Programs</b></div>
        


          <div class="row">

            <div class="col-md-5 mt-5 p-4 ">
              <ul class="list-group ">
            
                <li class="list-group-item list-group-item-light"><a href="#link" class="fs-4"><b>Strength Training</b></a></li>
                <li class="list-group-item list-group-item-light"><a href="#link" class="fs-4"><b>Cardio</b></a></li>
                <li class="list-group-item list-group-item-light"><a href="#link" class="fs-4"><b>Personal Training</b></a></li>
                <li class="list-group-item list-group-item-light"><a href="#link" class="fs-4"><b>Yoga</b></a></li>
                <li class="list-group-item list-group-item-light"><a href="#link" class="fs-4"><b>Martial Arts</b></a></li>
  
              </ul>
            
            </div>


            <div class="col-md-7 mt-5 p-4 images">
              <div>
                <img src="Assests/Yoga/pexels-pixabay-416778.jpg" class="rounded float-start mb-2" alt="...">

              </div>
              
              <div class="row">

                <div class="col">
                  <img src="Assests/Weights/pexels-victor-freitas-791763.jpg" class="rounded float-start pr-2" alt="...">

                </div>
                <div class="col">
                  <img src="Assests/Boxing/pexels-gleb-krasnoborov-2628206.jpg" class="rounded float-end ml-2" alt="...">

                </div>
              </div>
            </div>
          </div>



          <div class="col-md-12 mt-5 p-4 row">

            <div class="card col col-md-3 offset-md-1" style="width: 18rem;">
              <p>
                <i class="fa-solid fa-person-running"></i>

              </p>
              <div class="card-body">
                <h5 class="card-title text-center">
                  Quality Equipment
                </h5>
                <p class="card-text text-center">
                  Our gym boasts top-tier equipment, ensuring a high-quality fitness experience for our members.
                </p>
              </div>
            </div>


            <div class="card col col-md-3 offset-md-1" style="width: 18rem;">
              <p>
                <i class="fa-solid fa-heart"></i>

              </p>
              <div class="card-body">
                <h5 class="card-title text-center">
                  Health Caring
                </h5>
                <p class="card-text text-center">
                  With dedicated trainers and personalized programs, we ensure members receive caring and effective guidance for their well-being.
                </p>
              </div>
            </div>


            <div class="card col col-md-3 offset-md-1" style="width: 18rem;">
              <p>
                <i class="fa-solid fa-hands-holding-child"></i>
              </p>
              <div class="card-body">
                <h5 class="card-title text-center">
                  Gym Strategies
                </h5>
                <p class="card-text text-center">
                  Our gym employs effective
                  strategies, blending
                  diverse workouts and
                  expert guidance to
                  maximize fitness results for
                  every member.              
                </p>
              </div>
            </div>


          </div>

         

        

    
        </div>
      </div>
    </section>
    <!-- SERVICES SECTION ENDS -->



    <!-- TEAM SECTION STARTS -->
    <section class="py-3 py-md-5" id="team">
      <div class="container">
        <div class="col-md-12">
          <div class="display-3 text-center"><b>Our Team</b></div>
          <div class="fs-3 my-5 "><b>Train With Experts</b></div>

          <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">

            <div class="col">
              <div class="card h-100">
                <img src="Assests/Coach/pexels-ron-lach-8745172.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Jhone Doe</h5>                 
                </div>        
              </div>
            </div>


            <div class="col">
              <div class="card h-100">
                <img src="Assests/Coach/pexels-cliff-booth-4057069.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Margot Robbie</h5>                 
                </div>        
              </div>
            </div>


            <div class="col">
              <div class="card h-100">
                <img src="Assests/Coach/pexels-pixabay-416809.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Keiran Lee</h5>                 
                </div>        
              </div>
            </div>
            
          </div>

          <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">

            <div class="col">
              <div class="card h-100">
                <img src="Assests/Coach/pexels-annushka-ahuja-7991604.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Jhony Depp</h5>                 
                </div>        
              </div>
            </div>


            <div class="col">
              <div class="card h-100">
                <img src="Assests/Coach/pexels-annushka-ahuja-7991652.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Scarlot johanson</h5>                 
                </div>        
              </div>
            </div>


            <div class="col">
              <div class="card h-100">
                <img src="Assests/Coach/pexels-koolshooters-9944859.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Bella porch</h5>                 
                </div>        
              </div>
            </div>

            
          </div>
    

        </div>
      </div>
    </section>
    <!-- TEAM SECTION ENDS -->
  
    <!-- PACKAGES SECTION STARTS -->
<section class="py-3 py-md-5" id="packages">
  <div class="container">
    <div class="col-md-12">
      <div class="display-3 text-center"><b>Our Packages</b>
      <br>
   <p><h4><b> Select Suitable Packages<b></h4></p></div>
      

            <!--packages Contents start-->
            <div class="pricing-contents">

              <!--Packages card 1 start-->
              <div class="pricing-card">
                  <div class="pricing-card-header">
                      <span class="pricing-card-title">Silver</span>
                      <div class="price-circle">
                          <span class="price"><i>Rs.</i>10000</span>
                          <span class="desc">/ Month</span>
                      </div>
                  </div>

                  <div class="pricing-card-body">
                      <ul>
                          <li><i class="fa-solid fa-check"></i>5 Session Fitness Training</li>
                          <li><i class="fa-solid fa-check"></i>6 Session yoga class</li>
                          <li><i class="fa-solid fa-check"></i>8 Session Muscles Training</li>
                      </ul>
                      <a href="selectplane.php" class="join-us-btn-wrapper">
                      <button class="btn price-plan-btn">Select Plan</button>
                  </a>
                  </div>



              </div>
              <!--packages card 1 end-->


              <!--packages card 2 start-->
              <div class="pricing-card">
                  <div class="pricing-card-header">
                      <span class="pricing-card-title">Gold</span>
                      <div class="price-circle">
                          <span class="price"><i>Rs.</i>15000</span>
                          <span class="desc">/ Month</span>
                      </div>
                  </div>

                  <div class="pricing-card-body">
                      <ul>
                          <li><i class="fa-solid fa-check"></i>10 Session Fitness Training</li>
                          <li><i class="fa-solid fa-check"></i>12 Session yoga class</li>
                          <li><i class="fa-solid fa-check"></i>10 Session Muscles Training</li>
                      </ul>
                      <a href="selectplane.php" class="join-us-btn-wrapper">
                      <button class="btn price-plan-btn">Select Plan</button>
                  </a>
                  </div>



              </div>
              <!--packages card 2 end-->

              <!--packages card 3 start-->
              <div class="pricing-card">
                  <div class="pricing-card-header">
                      <span class="pricing-card-title">Platinum</span>
                      <div class="price-circle">
                          <span class="price"><i>Rs.</i>17000</span>
                          <span class="desc">/ Month</span>
                      </div>
                  </div>

                  <div class="pricing-card-body">
                      <ul>
                          <li><i class="fa-solid fa-check"></i>15 Session Fitness Training</li>
                          <li><i class="fa-solid fa-check"></i>16 Session yoga class</li>
                          <li><i class="fa-solid fa-check"></i>15 Session Muscles Training </li>
                          <li><i class="fa-solid fa-check"></i>10 Martial Art Sessions</li>
                      </ul>
                      <a href="selectplane.php" class="join-us-btn-wrapper">
                      <button class="btn price-plan-btn">Select Plan</button>
                  </a>
                  </div>



              </div>
              <!--packages card 3 end-->

              <!-- Packages card 4 (Diamond) start -->
        <div class="pricing-card">
          <div class="pricing-card-header">
            <span class="pricing-card-title">Diamond</span>
            <div class="price-circle">
              <span class="price"><i>Rs.</i>20000</span>
              <span class="desc">/ Month</span>
            </div>
          </div>
          <div class="pricing-card-body">
            <ul>
              <li><i class="fa-solid fa-check"></i>Unlimited Fitness Training Sessions</li>
              <li><i class="fa-solid fa-check"></i>Unlimited Yoga Classes</li>
              <li><i class="fa-solid fa-check"></i>Personalized Diet Plans</li>
              <li><i class="fa-solid fa-check"></i>Private Trainer Sessions</li>
              <li><i class="fa-solid fa-check"></i>Exclusive Wellness Services</li>
            </ul>
            <a href="selectplane.php" class="join-us-btn-wrapper">
              <button class="btn price-plan-btn">Select Plan</button>
            </a>
          </div>
        </div>
        <!-- Packages card 4 (Diamond) end -->

        <!-- Packages card 5 (Basic) start -->
        <div class="pricing-card">
          <div class="pricing-card-header">
            <span class="pricing-card-title">Basic</span>
            <div class="price-circle">
              <span class="price"><i>Rs.</i>5000</span>
              <span class="desc">/ Month</span>
            </div>
          </div>
          <div class="pricing-card-body">
            <ul>
              <li><i class="fa-solid fa-check"></i>Access to Gym Facilities</li>
              <li><i class="fa-solid fa-check"></i>1 Group Class per Week</li>
              <li><i class="fa-solid fa-check"></i>Locker Room Access</li>
            </ul>
            <a href="selectplane.php" class="join-us-btn-wrapper">
              <button class="btn price-plan-btn">Select Plan</button>
            </a>
          </div>
        </div>
        <!-- Packages card 5 (Basic) end -->
      </div>
    </div>
  </div>
</section>
<!-- PACKAGES SECTION ENDS -->



      </div>
    </div>
  </div>
</section>


<!--blog section starts-->
    <!-- Blog Section -->
<section id="blog" class="blog-section">
  <h2>Blog</h2>
  <div class="blog-container">
      <!-- Blog Post 1 -->
      <div class="blog-card">
          <img src="img/healthy-lifestyle-commitment-800x533.jpeg" alt="Blog Post 1">
          <h3>10 Tips for a Healthier Lifestyle</h3>
          <p>Explore essential tips to lead a healthier and more fulfilling life with practical advice on diet, exercise, and mental well-being...</p>
          <a href="blog-post1.html" class="read-more">Read More</a>
      </div>
      
      <!-- Blog Post 2 -->
      <div class="blog-card">
          <img src="img/training-word-cloud-collage-education-260nw-1307530153.jpg" alt="Blog Post 2">
          <h3>Guide to Effective Weight Training</h3>
          <p>Learn how to get the most out of your weight training sessions with these expert techniques and tips...</p>
          <a href="blog-post2.html" class="read-more">Read More</a>
      </div>

      <!-- Blog Post 3 -->
      <div class="blog-card">
          <img src="img/yoga-animated-word-cloudanimation-tag-footage-224946008_iconl.jpg" alt="Blog Post 3">
          <h3>Yoga for Relaxation and Flexibility</h3>
          <p>Discover the benefits of yoga for stress relief and improved flexibility with easy-to-follow poses...</p>
          <a href="blog-post3.html" class="read-more">Read More</a>
      </div>
  </div>

  <!-- See More Button -->
  <a href="blog.php" class="see-more-button">See More</a>
</section>


<!--blog section ends-->



 <!-- Contact Section -->
<section id="contact" class="contact-section">
  <h2>Contact Us</h2>
  <p>We'd love to hear from you! Whether you have questions, feedback, or just want to say hello, reach out to us.</p>
  
  <div class="contact-container">
      <!-- Contact Form -->
      <form class="contact-form" action="home.php" method="post">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" placeholder="Your Message" required></textarea>
          <button type="submit" class="submit-button">Send Message</button>
          <h2 style="text-align:center;color:white;"><?php echo $msg?>;</h2>
      </form>
      
      <!-- Contact Details -->
      <div class="contact-details">
          <p><strong>Email:</strong> info@fitzone.com</p>
          <p><strong>Phone:</strong> +94 123 456 789</p>
          <p><strong>Address:</strong> 123, Sun City, Kurunegala</p>
          
          <!-- Social Media Buttons -->
          <div class="social-media">
              <a href="#" class="social-icon facebook" title="Facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon whatsapp" title="WhatsApp" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
              <a href="#" class="social-icon twitter" title="Twitter" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon instagram" title="Instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
              <a href="#" class="social-icon google" title="Google" aria-label="Google"><i class="fab fa-google"></i></a>
          </div>
      </div>
  </div>
</section>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



    <!-- FOOTER STARTS -->
    <footer class="text-center text-white" style="background-color:#051622 ;">
      <div class="container p-4 pb-0">
        <section class="">
          <p class="d-flex justify-content-center align-items-center">
          </p>
        </section>
      </div>
    </footer>
    <!-- FOOTER ENDS -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-c1E0FwjrRaJhr8g7tuqqiG5+7Ytn4kqx9k4lJ5kRjZ9BvAN4rm8jGQ1OcMw78TJS" crossorigin="anonymous"></script>
  </body>
</html>
