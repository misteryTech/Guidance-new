<?php
// Database connection
include('../connection.php'); // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['patientId'];

    // Prepare and execute the query to check if the email exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM patient_table WHERE Patient_Id = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}
?>
