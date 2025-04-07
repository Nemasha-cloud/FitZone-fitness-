<?php
include('db_connect.php');

// Fetch trainers from the database
$sql = "SELECT * FROM trainers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trainers - FitZone</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f5f7;
            color: #333;
            padding: 20px;
        }
        h1, h2 {
            color: #1a1a2e;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f9a826;
            color: white;
        }

        td img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        a {
            color: #f9a826;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            color: #e6891d;
            text-decoration: underline;
        }

        .no-trainers {
            text-align: center;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>

    <h1>Trainer Management</h1>

    <h2>Existing Trainers</h2>
    <table>
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Specialty</th>
                <th>Experience</th>
                <th>Bio</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='{$row['photo']}' alt='{$row['name']}'></td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['specialty']}</td>";
                    echo "<td>{$row['experience']}</td>";
                    echo "<td>{$row['bio']}</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='no-trainers'>No trainers found!</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>
