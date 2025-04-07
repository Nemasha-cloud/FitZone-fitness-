<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FitZone Fitness Center | Trainers</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
  /* Global styles */
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(img/pexels-willpicturethis-1954524.jpg);
    background-position: center;
    background-size: cover;
    height: 130vh;
}

.menu{
    width: 400px;
    float: left;
    height: 70px;
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
body {
  font-family: Arial, sans-serif;
  color: #000000;
  background-color: #f4f4f4;
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

/* Trainers Section */
.trainers {
  max-width: 1000px;
  margin: 2em auto;
  padding: 1em;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.trainers h2 {
  text-align: center;
  font-size: 2em;
  margin-bottom: 1em;
}

.trainer-list {
  display: flex;
  flex-wrap: wrap;
  gap: 1em;
  justify-content: space-around;
}

.trainer-item {
  background-color: #f9f9f9;
  border-radius: 8px;
  padding: 1em;
  width: 250px;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.trainer-item img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.trainer-item h3 {
  font-size: 1.5em;
  color: #333;
  margin: 0.5em 0;
}

.trainer-item p {
  color: #666;
  margin: 0.5em 0;
}

/* Footer */
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
      <a href="courses.php">Courses</a>
      <a href="trainers.php" class="active">Trainers</a>
      <a href="home.php#contact">Contact</a>
    </nav>
  </header>

  <!-- Trainers Section -->
  <section class="trainers">
    <h2>Meet Our Certified Trainers</h2>
    <div class="trainer-list">
      <?php
        // Sample data for trainers
        $trainers = [
          [
            "name" => "John Doe",
            "specialty" => "Strength and Conditioning",
            "experience" => "5 years",
            "bio" => "John specializes in strength training and helping clients build muscle and endurance.",
            "photo" => "Assests/Coach/pexels-ron-lach-8745172.jpg"
          ],
          [
            "name" => "Margot Robbie",
            "specialty" => "Yoga and Flexibility",
            "experience" => "7 years",
            "bio" => "Jane is a certified yoga instructor with a passion for flexibility and mindfulness training.",
            "photo" => "Assests/Coach/pexels-cliff-booth-4057112.jpg"
          ],
          [
            "name" => "Keiran Lee",
            "specialty" => "Cardio and Weight Loss",
            "experience" => "4 years",
            "bio" => "Mike helps clients achieve weight loss goals through cardio-intensive workouts.",
            "photo" => "Assests/Coach/pexels-pixabay-416809.jpg"
          ],

          [
            "name" => "Jhony Depp",
            "specialty" => "Cardio and Weight Loss",
            "experience" => "4 years",
            "bio" => "Mike helps clients achieve weight loss goals through cardio-intensive workouts.",
            "photo" => "Assests/Coach/pexels-annushka-ahuja-7991604.jpg"
          ],
          [
            "name" => "Scarlot Johanson",
            "specialty" => "Martial Arts",
            "experience" => "8 years",
            "bio" => "Mike helps clients achieve weight loss goals through cardio-intensive workouts.",
            "photo" => "Assests/Coach/pexels-annushka-ahuja-7991652.jpg"
          ],
          [
            "name" => "Bella Porch",
            "specialty" => "Cardio and Weight Loss",
            "experience" => "4 years",
            "bio" => "Mike helps clients achieve weight loss goals through cardio-intensive workouts.",
            "photo" => "Assests/Coach/pexels-koolshooters-9944859.jpg"
          ],
        ];

        // Display each trainer
        foreach ($trainers as $trainer) {
          echo "<div class='trainer-item'>";
          echo "<img src='{$trainer['photo']}' alt='{$trainer['name']}'>";
          echo "<h3>{$trainer['name']}</h3>";
          echo "<p><strong>Specialty:</strong> {$trainer['specialty']}</p>";
          echo "<p><strong>Experience:</strong> {$trainer['experience']}</p>";
          echo "<p>{$trainer['bio']}</p>";
          echo "</div>";
        }
      ?>
    </div>
  </section>


  <!-- Footer -->
  <footer>
    <p>&copy; <?php echo date("Y"); ?> FitZone Fitness Center</p>
  </footer>
</body>
</html>
