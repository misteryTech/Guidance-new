<?php
session_start();
include('../connection.php'); // Your DB connection file
 // Dummy counselorId for testing, replace it with the actual counselorId later

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    $counselorId = $_POST['counselor_id']; 
    $arhive = "No";

    $stmt = $conn->prepare("UPDATE counselor_table SET Archive = ? WHERE Counselor_Id = ?");    
    $stmt->bind_param('si', $arhive, $counselorId);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Counselor Restore successfully.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error Restore the Counselor details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../counselor-archive-list.php");
    exit();
}
?>
