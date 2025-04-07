

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FitZone Fitness Center | Courses</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Reset some default styling */

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.navbar {
  font-family: 'Times New Roman', Times, serif;
  width: 1200px;
  height: 75px;
  margin: auto;
}

body {
  width:100%;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.5) 50%), url(img/photo-1434754205268-ad3b5f549b11.jpeg);
  background-position: center;
  background-size: cover;
  height: 100vh;
  
}


.icon {
    width: 100px; /* Adjust width as needed */
    position: absolute;
    top: 10px; /* Distance from the top */
    left: 10px; /* Distance from the left */
}

.logo {
    width: 80px; /* Adjust width as needed */
    height: auto; /* Maintain aspect ratio */
}


.menu{
    width: 400px;
    float: left;
    height: 70px;
}

nav {
    background-color: #000000; /* Dark blue background for the navbar */
    padding: 1em 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Subtle shadow for depth */
}

ul {
    list-style: none; /* Remove bullets from the list */
    display: flex; /* Use flexbox for horizontal layout */
    justify-content: center; /* Center the nav items */
    padding: 0; /* Remove padding */
}

ul li {
  list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;
}

ul li a{
    text-decoration: none;
    color: #ffffff;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
    color: #;
}



body {
  font-family: Arial, sans-serif;
  color: #000000;
  background-color: #f4f4f4;
}

header {
  background-color: #000000;
  color: #fff;
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
.courses {
  max-width: 800px;
  margin: 2em auto;
  padding: 1em;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.courses h2 {
  text-align: center;
  font-size: 2em;
  margin-bottom: 1em;
}

.course-list {
  display: flex;
  flex-direction: column;
  gap: 1em;
}

.course-item {
  background-color: #e9e9e9;
  padding: 1em;
  border-radius: 6px;
}

.course-item h3 {
  color: #333;
  font-size: 1.5em;
}
footer {
    text-align: center;
    padding: 10px 0;
    background: #35424a;
    color: #ffffff;
}


</style>
<body>
  <!-- Header -->
  <div class="main">
            <div class="menu">
                
            </div>
  <header>
    <nav>
      <a href="home.php">Home</a>
      <a href="courses.php" class="active">Classes</a>
      <a href="trainers.php">Trainers</a>
      <a href="home.php#contact">Contact</a>
    </nav>
  </header>

  <!-- Courses Section -->
  <section class="courses">
    <h2>Our Fitness Programs</h2>
    <div class="course-list">
      <?php
        // Include the database connection file
        include 'db_connection.php';

        // Fetch data from the courses table
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);

        // Check if any results were returned
        if ($result->num_rows > 0) {
            while ($course = $result->fetch_assoc()) {
                echo "<div class='course-item'>";
                echo "<h3>" . htmlspecialchars($course['name']) . "</h3>";
                echo "<p>" . htmlspecialchars($course['description']) . "</p>";
                echo "<p><strong>Schedule:</strong> " . htmlspecialchars($course['schedule']) . "</p>";
                echo "<p><strong>Price:</strong> " . htmlspecialchars($course['price']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No courses available at this time.</p>";
        }

        // Close the database connection
        $conn->close();
      ?>
      
    </div>
  </section>
    <!-- Footer -->
    <footer>
    <p>&copy; <?php echo date("Y"); ?> FitZone Fitness Center</p>
  </footer>
</body>
</html>
