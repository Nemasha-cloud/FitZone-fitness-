<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center - Meal Plans</title>
    <link rel="stylesheet" href="styles.css">
</head>
<<style>
    
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
  width:100%;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.5) 50%), url(img/Fitness-meal-planning.jpg);
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
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}


header {
    background: #000000; /* Bright header color */
    color: #ffffff;
    padding: 20px 0;
    text-align: center;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    color: #ffd700; /* Gold color on hover */
}

main {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2 10px rgba(0, 0, 0, 0.2);
}1

.meal-plans {
    display: flex;
    flex-direction: column;
}

.meal-plan {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd; /* Light border for separation */
    border-radius: 10px; /* Rounded corners for meal plan articles */
    background-color: #f1f1f1; /* Light grey background for meal plans */
    transition: transform 0.3s; /* Smooth scale transition */
}

.meal-plan:hover {
    transform: scale(1.02); /* Slightly enlarge on hover */
}

.meal-plan h2 {
    color: #2c3e50; /* Dark color for headings */
}

.meal-image {
    width: 100%;
    height: auto;
    border-radius: 10px; /* Rounded corners for images */
}

footer {
    text-align: center;
    padding: 10px 0;
    background: #2c3e50; /* Dark background for footer */
    color: #ecf0f1; /* Light text color */
    position: relative;
    bottom: 0;
    width: 100%;
}

@media (max-width: 600px) {
    nav ul li {
        display: block; /* Stack nav items on small screens */
        margin: 10px 0; /* Margin adjustment for stacked items */
    }
}


</style>
<body>
      <!-- Header -->
  <div class="main">
            <div class="menu">
                
            </div>
    <header>
        <h1> Meal Plans</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="mealplans.php">Meal Plans</a></li>
                <li><a href="home.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="meal-plans">
            <article class="meal-plan">
                <h2>Weight Loss Meal Plan</h2>
                <p>Designed for individuals looking to lose weight in a healthy and sustainable manner.</p>
                <h3>Sample Menu:</h3>
                <ul>
                    <li>Breakfast: Overnight oats with berries</li>
                    <li>Snack: Greek yogurt with honey</li>
                    <li>Lunch: Grilled chicken salad</li>
                    <li>Snack: Carrot sticks with hummus</li>
                    <li>Dinner: Baked salmon with quinoa and steamed broccoli</li>
                </ul>
                <p><strong>Nutritional Info:</strong> Approximately 1500 calories per day.</p>
            </article>

            <article class="meal-plan">
                <h2>Muscle Gain Meal Plan</h2>
                <p>This plan is tailored for those looking to increase muscle mass through proper nutrition.</p>
                <h3>Sample Menu:</h3>
                <ul>
                    <li>Breakfast: Scrambled eggs with whole grain toast</li>
                    <li>Snack: Protein smoothie with banana and spinach</li>
                    <li>Lunch: Turkey wrap with avocado and spinach</li>
                    <li>Snack: Almonds and a protein bar</li>
                    <li>Dinner: Stir-fried chicken with brown rice and vegetables</li>
                </ul>
                <p><strong>Nutritional Info:</strong> Approximately 3000 calories per day.</p>
            </article>

            <article class="meal-plan">
                <h2>Maintenance Meal Plan</h2>
                <p>This plan helps maintain current weight and provides balanced nutrition for active individuals.</p>
                <h3>Sample Menu:</h3>
                <ul>
                    <li>Breakfast: Smoothie bowl with nuts and seeds</li>
                    <li>Snack: Sliced apple with peanut butter</li>
                    <li>Lunch: Quinoa salad with black beans and corn</li>
                    <li>Snack: Rice cakes with cottage cheese</li>
                    <li>Dinner: Grilled shrimp tacos with cabbage slaw</li>
                </ul>
                <p><strong>Nutritional Info:</strong> Approximately 2500 calories per day.</p>
            </article>

            <!-- Add more meal plans as needed -->
        </section>
    </main>
    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>
</body>
</html>
