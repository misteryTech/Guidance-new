<?php
session_start();
include('../connection.php'); // Your DB connection file
 // Dummy adminID for testing, replace it with the actual adminID later

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    $adminID = $_POST['admin_id']; 
    $arhive = "Yes";

    $stmt = $conn->prepare("UPDATE admin_table SET Archive = ? WHERE Admin_Id = ?");
    $stmt->bind_param('si', $arhive, $adminID);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Administrator Archived successfully.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error Archived the administrator details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../administrator-list.php");
    exit();
}
?>
