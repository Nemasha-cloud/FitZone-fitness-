<?php
// Database connection
$host = 'localhost';
$dbname = 'fitness_center'; // Replace with your database name
$user = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Handle POST request to add/edit blog post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $content = $_POST['content'];

    if ($id) {
        // Update existing blog post
        $sql = "UPDATE blogs SET title = :title, author = :author, date = :date, image = :image, content = :content WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'author' => $author, 'date' => $date, 'image' => $image, 'content' => $content, 'id' => $id]);
        echo "Blog post updated successfully!";
    } else {
        // Insert new blog post
        $sql = "INSERT INTO blogs (title, author, date, image, content) VALUES (:title, :author, :date, :image, :content)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'author' => $author, 'date' => $date, 'image' => $image, 'content' => $content]);
        echo "Blog post added successfully!";
    }
    header("Location: ?"); // Redirect to self to avoid form resubmission
    exit;
}

// Handle GET request for editing a blog post
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $blog = $stmt->fetch();
}

// Handle DELETE request to delete a blog post
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = :id");
    $stmt->execute(['id' => $id]);
    echo "Blog post deleted successfully!";
    header("Location: ?"); // Redirect to refresh the page
    exit;
}

// Get all blog posts for display
$stmt = $pdo->query("SELECT * FROM blogs");
$blogs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blog Posts</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #1a1a2e; /* Dark Blue */
    color: #fff; /* White text */
    margin: 0;
    padding: 0;
}

header {
    background-color: #1a1a2e; /* Dark Blue */
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

.form-container {
    background-color: rgba(26, 26, 46, 0.9); /* Dark Blue with some transparency */
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    margin-bottom: 30px;
    border-radius: 8px;
    color: #fff; /* White text */
}

.form-container h2 {
    text-align: center;
    font-size: 2em;
    margin-bottom: 20px;
    color: #f9a826; /* Yellow for the heading */
}

.form-container label {
    font-size: 1.2em;
    color: #fff; /* White for labels */
    display: block;
    margin: 10px 0 5px;
}

.form-container input,
.form-container select,
.form-container textarea,
.form-container button {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #7f8c8d; /* Light gray border */
    font-size: 1em;
    background-color: #fff; /* White background for inputs */
    color: #333; /* Dark text */
}

.form-container input[type="text"],
.form-container input[type="date"],
.form-container textarea {
    background-color: #34495e; /* Dark Blue background for inputs */
    color: #fff; /* White text */
}

.form-container button {
    background-color: #f9a826; /* Yellow for button */
    color: white;
    cursor: pointer;
    font-size: 1.2em;
    border: none;
}

.form-container button:hover {
    background-color: #e6891d; /* Darker yellow on hover */
}

.form-container textarea {
    min-height: 150px; /* Ensuring textarea is tall enough */
    resize: vertical; /* Allow vertical resizing */
}

.success,
.error {
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.success {
    color: #28a745; /* Green for success */
}

.error {
    color: #f9a826; /* Yellow for errors */
}

.admin-list {
    margin-top: 40px;
}

.admin-list h2 {
    font-size: 1.8em;
    margin-bottom: 15px;
}

.admin-list .admin {
    background-color: #fff;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.admin-list .admin h3 {
    margin-top: 0;
    font-size: 1.5em;
}

.admin-list .admin p {
    font-size: 1em;
    color: #555;
}

.admin-list .admin a {
    text-decoration: none;
    color: #007bff;
    margin-right: 15px;
}

.admin-list .admin a:hover {
    text-decoration: underline;
}


    </style>
</head>
<body>
    <header>
    </header>
    
    <div class="container">
        <!-- Add or Edit Blog Form -->
        <div class="form-container">
            <h2><?php echo isset($blog) ? 'Edit Blog Post' : 'Add New Blog Post'; ?></h2>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $blog['id'] ?? ''; ?>">

                <label>Title:</label>
                <input type="text" name="title" value="<?php echo $blog['title'] ?? ''; ?>" required>

                <label>Author:</label>
                <input type="text" name="author" value="<?php echo $blog['author'] ?? ''; ?>" required>

                <label>Date:</label>
                <input type="date" name="date" value="<?php echo $blog['date'] ?? ''; ?>" required>

                <label>Image URL:</label>
                <input type="text" name="image" value="<?php echo $blog['image'] ?? ''; ?>">

                <label>Content:</label>
                <textarea name="content" required><?php echo $blog['content'] ?? ''; ?></textarea>

                <button type="submit"><?php echo isset($blog) ? 'Update' : 'Add'; ?> Blog Post</button>
            </form>
        </div>

        <!-- List all blog posts -->
        <div class="blog-list">
            <h2>All Blog Posts</h2>
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-post">
                    <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                    <p>By <?php echo htmlspecialchars($blog['author']); ?> on <?php echo htmlspecialchars($blog['date']); ?></p>
                    <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="Image">
                    <p><?php echo htmlspecialchars($blog['content']); ?></p>
                    <a href="?edit=<?php echo $blog['id']; ?>">Edit</a> |
                    <a href="?delete=<?php echo $blog['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
