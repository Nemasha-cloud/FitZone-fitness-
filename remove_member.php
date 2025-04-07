<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$member_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Member removed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove Member</title>
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
.remove-form {
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
input[type="number"] {
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

input[type="number"]:focus {
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

/* Link styling (if you have any links, like for navigation) */
a {
    color: #f9a826; /* Yellow for links */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}


</style>
<body>
    <h2>Remove Member</h2>
    <form method="POST" action="">
        <label>Member ID:</label><input type="number" name="id" required><br>
        <button type="submit">Remove Member</button>
    </form>
</body>
</html>
