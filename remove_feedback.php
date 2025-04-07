<?php
// Database connection
$host = 'localhost';
$dbname = 'fitness_center'; // Database name
$user = 'root'; // MySQL username
$password = ''; // MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Handle DELETE request to remove feedback
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM feedback WHERE id = :id");
    $stmt->execute(['id' => $id]);
    echo "Feedback deleted successfully!";
    header("Location: remove_feedback.php"); // Redirect to refresh the page
    exit;
}

// Fetch all feedback
$stmt = $pdo->query("SELECT * FROM feedback"); // Corrected: fetch feedback using the query
$feedbacks = $stmt->fetchAll(); // Fetch all the feedback records
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1a1a2e;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .feedback-list {
            margin-top: 40px;
        }

        .feedback-list h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #f9a826;
        }

        .feedback-item {
            background-color: #34495e;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .feedback-item h3 {
            margin-top: 0;
            font-size: 1.5em;
            color: #f9a826;
        }

        .feedback-item p {
            font-size: 1.1em;
            color: #fff;
        }

        .feedback-item a {
            color: #e6891d;
            text-decoration: none;
        }

        .feedback-item a:hover {
            text-decoration: underline;
        }

        .feedback-item .footer {
            margin-top: 10px;
            font-size: 0.9em;
            color: #ccc;
        }

        .feedback-item .footer a {
            color: #e6891d;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Feedback</h1>
    </header>
    
    <div class="container">
        <div class="feedback-list">
            <h2>All Feedback</h2>

            <?php foreach ($feedbacks as $feedback): ?>
                <div class="feedback-item">
                    <h3><?php echo htmlspecialchars($feedback['name']); ?></h3>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($feedback['email']); ?></p>
                    <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($feedback['message'])); ?></p>
                    <div class="footer">
                        <p>Received on: <?php echo $feedback['created_at']; ?></p>
                        <a href="?delete=<?php echo $feedback['id']; ?>" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete Feedback</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
