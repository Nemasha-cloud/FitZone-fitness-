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
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #1a1a2e; 
      color:#f9a826;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.6) 50%), url(img/1.jpg) no-repeat center center;
      background-size: cover;

    }
    .container {
      max-width: 900px;
      margin: 30px auto;
      padding: 15px;
    }

    /* Navbar */
    nav {
      background-color: #000000;
      padding: 1em 0;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
    }
    nav ul li {
      margin-left: 50px;
    }
    nav ul li a {
      color: #ffffff;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.4s;
    }
    nav ul li a:hover {
      color: #fb8122;
    }

    /* Form Styling */
    .form-container {
      background-color: #1a3d82;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .form-container h3 {
      color: #fb8122;
      margin-bottom: 15px;
    }
    .btn-primary {
      background-color: #f36100;
      border-color: #f36100;
    }
    .btn-primary:hover {
      background-color: #fb8122;
      border-color: #fb8122;
    }

    /* Reviews Section */
    .review-box {
      background-color: rgba(8, 21, 92, 0.9);
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }
    .review-box h5 {
      color: #fb8122;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .review-box .rating {
      color: #f36100;
    }
    .review-box img {
      max-width: 50%;
      height: 20vh;
      margin-top: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 10px 0;
      background: #35424a;
      color: #ffffff;
      margin-top: 20px;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="index.html#about">About Us</a></li>
      <li><a href="home.php#contact">Contact</a></li>
    </ul>
  </nav>

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
    <p>&copy; 2024 FitZone Fitness Center</p>
  </footer>

</body>
</html>
