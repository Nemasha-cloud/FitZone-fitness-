<?php
// Database connection details
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "fitness_center"; 

// Create connection to MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reviews from the database
$sql = "SELECT id, name, rating, review, image_path, created_at FROM review ORDER BY created_at DESC";
$result = $conn->query($sql);



// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Sanitize input to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $rating = (int)$rating; // Ensure rating is an integer
    $review = $conn->real_escape_string($review);

    // Handle image upload
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    // Define upload directory
    $upload_dir = 'uploads/';
    $image_path = $upload_dir . basename($image_name);

    // Move uploaded image to the upload folder
    if (move_uploaded_file($image_tmp_name, $image_path)) {
        // Insert feedback into the database
        $sql = "INSERT INTO review (name, rating, review, image_path) 
                VALUES ('$name', $rating, '$review', '$image_path')";

        if ($conn->query($sql)) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}

// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews - FitZone Fitness Center</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* General Styling */
/* General Styling */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Arial', sans-serif;
  background-color: #1a1a2e; /* Dark blue background */
  color: #ffffff;
  line-height: 1.6;
}

.container {
  max-width: 900px;
  margin: 30px auto;
  padding: 0 15px;
}

/* Navbar */
nav {
  background-color: #0D1B2A; /* Darker blue */
  padding: 1em 0;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

nav ul {
  list-style: none;
  display: flex;
  justify-content: center;
}

nav ul li {
  margin-left: 20px;
}

nav ul li a {
  color: #ffffff;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s;
}

nav ul li a:hover {
  color: #f39c12; /* Golden color on hover */
}

/* Header */
h2 {
  font-size: 2em;
  color: #f9a826;
  text-align: center;
  margin-bottom: 30px;
}

h3 {
  font-size: 1.5em;
  color: #fff;
  margin-bottom: 20px;
}

/* Form Styling */
.form-container {
  background-color: #2C3E50; /* Slightly lighter blue */
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  margin-bottom: 40px;
}

.form-container h3 {
  color: #f39c12; /* Golden color */
  margin-bottom: 15px;
  font-size: 1.6em;
}

.form-container .form-label {
  font-size: 1em;
  color: #ccc;
}

.form-control {
  margin-bottom: 20px;
  padding: 10px;
  font-size: 1em;
  width: 100%;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.form-select {
  margin-bottom: 20px;
  padding: 10px;
  font-size: 1em;
  width: 100%;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.form-container button {
  background-color: #f39c12; /* Golden color */
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 1.2em;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.form-container button:hover {
  background-color: #e67e22;
}

/* Reviews Section */
.review-box {
  background-color: #34495e; /* Dark gray-blue */
  padding: 20px;
  margin-bottom: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.review-box h5 {
  font-size: 1.4em;
  color: #f39c12; /* Golden color */
  margin-bottom: 15px;
}

.review-box .rating {
  color: #f39c12; /* Golden color for stars */
  font-size: 1.2em;
}

.review-box p {
  font-size: 1.1em;
  color: #ccc; /* Light gray for text */
  margin-top: 10px;
}

.review-box img {
  max-width: 100%;
  height: auto;
  margin-top: 15px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Footer */
footer {
  text-align: center;
  padding: 20px 0;
  background-color: #0D1B2A; /* Same dark blue as navbar */
  color: #fff;
  margin-top: 40px;
  font-size: 1em;
}

footer a {
  color: #fff;
  text-decoration: none;
}

footer a:hover {
  color: #f39c12;
}

/* Media Queries for Mobile Responsiveness */
@media (max-width: 768px) {
  .container {
    padding: 0 10px;
  }

  .form-container {
    padding: 20px;
  }

  .form-container button {
    font-size: 1em;
    padding: 10px;
  }

  .review-box {
    padding: 15px;
  }
}

  </style>
</head>
<body>

  <!-- Navbar -->
  

  <!-- Page Content -->
  <div class="container">
    <h2 class="text-center mb-4"><b>Feedbacks</b></h2>

    <form method="post" action="feedback.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <select class="form-select" id="rating" name="rating" required>
            <option value="">Select a rating</option>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Your Feedbacks</label>
        <textarea class="form-control" id="review" name="review" rows="4" placeholder="Write your review here" required></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Feedback</button>
</form>

    <!-- Display Recent Reviews -->
    <div class="mt-5">
      <h3>What Our Members Say</h3>
      <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="review-box">';
                echo '<h5>' . htmlspecialchars($row['name']) . '</h5>';
                echo '<div class="rating">';
                for ($i = 0; $i < $row['rating']; $i++) {
                    echo '★';
                }
                for ($i = $row['rating']; $i < 5; $i++) {
                    echo '☆';
                }
                echo '</div>';
                echo '<p>' . htmlspecialchars($row['review']) . '</p>';
                echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="Review Image">';
                echo '</div>';
            }
        } else {
            echo '<p>No reviews yet.</p>';
        }
      ?>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    
  </footer>

</body>
</html>
