<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membership_plan = $_POST['membership_plan'];
    $membership_name = $_POST['membership_name'];
    $membership_email = $_POST['membership_email'];
    $membership_phone = $_POST['membership_phone'];

    // Prepare SQL query with prepared statements
    $stmt = $conn->prepare("INSERT INTO memberships (membership_plan, membership_name, membership_email, membership_phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $membership_plan, $membership_name, $membership_email, $membership_phone);

    if ($stmt->execute() === TRUE) {
        // Success: Redirect with alert message
        echo "<script>
                alert('Thank you for choosing the $membership_plan membership!');
                window.location.href = 'booking.php'; // Redirect to booking page
              </script>";
    } else {
        // Error: Display the error message
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

