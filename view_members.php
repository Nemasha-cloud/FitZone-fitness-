<?php
include 'db_connect.php';

// Fetch member data
$sql = "SELECT id, email, name, age, weight, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
    <style>
        /* Basic reset and styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f5f7;
            color: #333;
            padding: 20px;
        }

        h2 {
            color: #1a1a2e;
            text-align: center;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #1a1a2e;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Action link styling */
        .action-link {
            color: #f9a826;
            font-weight: bold;
            text-decoration: none;
        }

        .action-link:hover {
            color: #e6891d;
            text-decoration: underline;
        }
    </style>
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
            
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['weight']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
               
            </tr>
        <?php endwhile; ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
