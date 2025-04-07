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
    <title>FitZone Fitness Center - Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
  
 /* Reset styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.5) 50%), url('img/weights-yellow-background-with-copy-space_23-2148343793.jpg') center/cover no-repeat;
    color: #333;
    height: 360vh;
    display: flex;
    flex-direction: column;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Header */
header {
    background: #000;
    color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    position: relative;
}

header h1 {
    font-size: 2.5em;
    color: #ff6b6b;
}

.icon {
    position: absolute;
    top: 10px;
    left: 10px;
}

.icon .logo {
    width: 80px;
    height: auto;
}

/* Navigation */
nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 20px;
    padding-top: 10px;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #ffd700;
}

header {
  background-color: #000000;
  color: #000000;
  padding: 1em 0;
  text-align: center;
}


header nav a {
  color: #fff;
  text-decoration: none;
  margin: 0 1em;
}
nav a.active {
  font-weight: bold;
  text-decoration: underline;
}


/* Main Content */
main {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.blog-posts {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Blog Post Card */
.post {
    padding: 15px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.post:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.post h2 {
    color: #ff6b6b;
    font-size: 1.8em;
    margin-bottom: 8px;
}

.post-meta {
    color: #777;
    font-size: 0.9em;
    margin-bottom: 10px;
    font-style: italic;
}

.post-image {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
    transition: transform 0.3s ease;
}

.post-image:hover {
    transform: scale(1.03);
}

.read-more {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background: #6c5ce7;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s ease;
}

.read-more:hover {
    background: #a29bfe;
}

/* Footer */
footer {
    text-align: center;
    padding: 15px;
    background: #2c3e50;
    color: #ecf0f1;
    font-size: 0.9em;
    position: relative;
    bottom: 0;
    width: 100%;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.3);
}

footer p {
    margin: 5px 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    .post h2 {
        font-size: 1.5em;
    }
}


  </style>
<body>
    <!-- Header -->
    <div class="main">
            <div class="menu">
                
            </div>
    <header>
        <h1>Our Blogs</h1>
        <nav>
        <a href="home.php">Home</a>
      <a href="blog.php" class="active">Latest Blogs</a>
      <a href="mealplans.php">Meal Plans</a>
      <a href="home.php#contact">Contact</a>
        </nav>
    </header>
    <main>
        <section class="blog-posts">
            <article class="post">
                <h2>5 Tips for Effective Weight Training</h2>
                <p class="post-meta">By Jane Doe | November 1, 2024</p>
                <img src="img/main_image_14896800-5145-47d8-ac24-bdf3c1e5ca80_3500x.jpg" alt="Weight Training" class="post-image">
                <p>Weight training is essential for building muscle and strength. Here are five tips to help you maximize your results...</p>
                <a href="blog-post.html" class="read-more">Read More</a>
            </article>

            <article class="post">
                <h2>Nutrition Essentials for Fitness Enthusiasts</h2>
                <p class="post-meta">By John Smith | October 28, 2024</p>
                <img src="img/p1bm5844cb6oacnd1std183s12gt6.jpg" alt="Nutrition" class="post-image">
                <p>A well-balanced diet is crucial for optimal performance. Learn about the essential nutrients you need for your fitness journey...</p>
                <a href="blog-post.html" class="read-more">Read More</a>
            </article>

            <article class="post">
                <h2>The Importance of Stretching Before and After Workouts</h2>
                <p class="post-meta">By Mary Johnson | October 25, 2024</p>
                <img src="img/AdobeStock_132111328-1024x683.jpeg" alt="Stretching" class="post-image">
                <p>Stretching helps improve flexibility and prevent injuries. Here’s how to properly incorporate stretching into your routine...</p>
                <a href="blog-post.html" class="read-more">Read More</a>
            </article>

            <!-- Add more blog posts as needed -->
        </section>
    </main>
    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>
</body>
</html>
