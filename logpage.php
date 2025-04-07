<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #1a1a2e; /* Dark background color */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #ffffff; /* Light text color for readability */
}

.container {
    text-align: center;
    background: rgba(26, 26, 46, 0.9); /* Semi-transparent dark blue */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 400px;
    color: #fff; /* Light text color */
}

h1 {
    color: #f9a826; /* Yellow color for the title */
    margin-bottom: 15px;
}

p {
    color: #ddd; /* Light gray for secondary text */
    margin-bottom: 25px;
}

.button-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.btn {
    background-color: #f9a826; /* Yellow button color */
    color: #1a1a2e; /* Dark blue text for contrast */
    font-size: 16px;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s;
    font-weight: bold;
}

.btn:hover {
    background-color: #e6891d; /* Slightly darker yellow on hover */
}

.btn:active {
    background-color: #1abc9c; /* Green for active state */
}
</style>
</style>
<body>
    <div class="container">
        <h1>Welcome to FitZone Fitness Center</h1>
        <p>Please choose your access level to proceed.</p>

        <div class="button-container">
            <!-- Admin Panel Button: Redirect to admin-login.html -->
             
            <a class="btn" href='login.php'>Admin Panel</a>
            
            <!-- Staff Panel Button: Redirect to staff-login.html -->
            <a class="btn" href='staff\login.php'>Staff Panel</a>
        </div>
    </div>
</body>
</html>
