<?php
session_start();
include('../connection.php'); // Your DB connection file
 // Dummy counselorId for testing, replace it with the actual counselorId later

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    $patient_id = $_POST['patient_id']; 
    $arhive = "No";

    $stmt = $conn->prepare("UPDATE patient_table SET Archive = ? WHERE Patient_Id = ?");    
    $stmt->bind_param('si', $arhive, $patient_id);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Student Restore successfully.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error Restore the Student details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../patient-archive-list.php");
    exit();
}
?>
