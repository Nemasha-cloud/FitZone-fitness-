<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course'];
    $course_date = $_POST['course_date'];
    $course_time = $_POST['course_time'];
    $course_name = $_POST['course_name'];
    $course_email = $_POST['course_email'];

    // Prepare SQL query with prepared statements
    $stmt = $conn->prepare("INSERT INTO course_booking (course, course_date, course_time, course_name, course_email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $course, $course_date, $course_time, $course_name, $course_email);

    if ($stmt->execute() === TRUE) {
        echo "<script>
                alert('Thank you for booking a $course course!');
                window.location.href = 'booking.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
