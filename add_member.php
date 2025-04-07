<?php
// Database connection settings
$host = 'localhost';
$dbname = 'fitness_center';
$username = 'root';
$password = '';

// Database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Initialize feedback message
$success = $error = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership_type = $_POST['membership_type'];
    $start_date = $_POST['start_date'];

    // Validate form fields
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($membership_type) && !empty($start_date)) {
        // Insert data into the database
        $sql = "INSERT INTO members (name, email, phone, membership_type, start_date) VALUES (:name, :email, :phone, :membership_type, :start_date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'membership_type' => $membership_type,
            'start_date' => $start_date
        ]);
        $success = "New member added successfully!";
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member - Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
/* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: Arial, sans-serif;
    background: url('admin/img.jpg') no-repeat center center fixed;
    background-color: #1a1a2e;
    background-size: cover;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form container */
.admin-form {
    background: rgba(26, 26, 46, 0.9); /* Semi-transparent dark blue */
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 500px;
    color: #fff;
}

/* Title styling */
h2 {
    color: #f9a826; /* Yellow color for the title */
    text-align: center;
    font-size: 1.8em;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Label styling */
label {
    font-size: 14px;
    color: #ddd; /* Light gray for labels */
    margin-bottom: 8px;
    display: block;
}

/* Input field styling */
input[type="text"],
input[type="email"],
input[type="date"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0 16px 0;
    border-radius: 5px;
    border: 1px solid #333366; /* Slightly darker blue border */
    background-color: #f3f5f7; /* Light background for inputs */
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="date"]:focus {
    border-color: #f9a826; /* Yellow border on focus */
    outline: none;
}

/* Button styling */
button {
    background-color: #f9a826; /* Yellow for button */
    color: #1a1a2e; /* Dark blue text for contrast */
    border: none;
    padding: 14px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #e6891d; /* Darker yellow on hover */
}

/* Success message */
.success {
    color: #28a745; /* Green for success messages */
    text-align: center;
    margin-bottom: 20px;
}

/* Error message */
.error {
    color: #f9a826; /* Yellow for error messages */
    text-align: center;
    margin-bottom: 20px;
}

/* Link styling (if you have any links, like for registration) */
a {
    color: #f9a826; /* Yellow for links */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}



</style>
<body>
    <div class="admin-form">
        <h2>Add New Member</h2>

        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php elseif ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="add_member.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="membership_type">Membership Type:</label>
            <input type="text" id="membership_type" name="membership_type" required>

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>

            <button type="submit">Add Member</button>
        </form>
    </div>
</body>
</html>
