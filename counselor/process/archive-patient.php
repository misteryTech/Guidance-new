<?php
session_start();
include('../connection.php'); // Your DB connection file
 // Dummy adminID for testing, replace it with the actual adminID later

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    $Patient_Id = $_POST['Patient_Id']; 
    $arhive = "Yes";

    $stmt = $conn->prepare("UPDATE patient_table SET Archive = ? WHERE Patient_Id = ?");
    $stmt->bind_param('si', $arhive, $Patient_Id);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Student Archived successfully.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error Archived the Student details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../patient-list.php");
    exit();
}
?>
