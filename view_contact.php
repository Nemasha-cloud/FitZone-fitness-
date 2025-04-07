<?php
// Database connection
$host = 'localhost';
$dbname = 'fitness_center'; 
$user = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Handle DELETE request to delete a contact
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM contact_form WHERE id = :id");
    $stmt->execute(['id' => $id]);
    echo "Contact deleted successfully!";
    header("Location: ?"); // Redirect to refresh the page
    exit;
}


$stmt = $pdo->query("SELECT * FROM contact_form");
$contacts = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            color: #f9a826;
            margin: 0;
            padding: 0;
        }
        header {
            color: #f9a826;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .contact-list {
            margin-top: 20px;
        }
        .contact {
            background-color: #fff;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .contact h3 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }
        .contact p {
            font-size: 0.9em;
            color: #555;
        }
        .contact a {
            text-decoration: none;
            color: #d9534f;
            font-weight: bold;
            float: right;
            margin-top: -20px;
        }
        .contact a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>All Contacts</h1>
    </header>
    
    <div class="container">
        <div class="contact-list">
            <?php foreach ($contacts as $contact): ?>
                <div class="contact">
                    <h3><?php echo htmlspecialchars($contact['name']); ?> (<?php echo htmlspecialchars($contact['email']); ?>)</h3>
                    <p>Message: <?php echo htmlspecialchars($contact['message']); ?></p>
                    <p>Submitted on: <?php echo htmlspecialchars($contact['created_at']); ?></p>

                    <a href="?delete=<?php echo $contact['id']; ?>" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
