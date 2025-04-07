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
            background-color: #f3f5f7;
            color: #333;
            padding: 20px;
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

    /* Reviews Section */
    .review-box {
    background-color: rgba(173, 216, 230, 0.9); /* Light blue with transparency */
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}
    .review-box h5 {
      color: darkblue;
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

  
  </style>
</head>
<body>

  <!-- Navbar -->
  

  <!-- Page Content -->
  <div class="container">
    <h2 class="text-center mb-4"><b>What Our Members Say</b></h2>

    <!-- Display Recent Reviews -->
    <div class="mt-5">
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
