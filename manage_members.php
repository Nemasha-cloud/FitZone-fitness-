<?php
include 'db_connect.php';

$sql = "SELECT id, email, name, age, weight, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Members</title>
</head>
<body>
    <h2>Member List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Age</th>
            <th>Weight</th>
            <th>Joined Date</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['weight']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><a href="remove_member.php?id=<?php echo $row['id']; ?>">Remove</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
