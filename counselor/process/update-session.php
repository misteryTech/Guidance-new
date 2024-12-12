<?php
session_start();

include('../connection.php'); // Your DB connection file
 // Dummy adminID for testing, replace it with the actual adminID later

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    $appointment_Id = $_POST['appointment_Id']; 
    $diagnosed = !empty($_POST['diagnosed']) ? $_POST['diagnosed'] : 'N/A';
    $referral = !empty($_POST['referral']) ? $_POST['referral'] : 'N/A';
    $status = "Closure";




    
    $stmt = $conn->prepare("UPDATE appointments SET Diagnosed = ?, Referral = ?, Status = ? WHERE Appointment_Id = ?");
    $stmt->bind_param('sssi', $diagnosed, $referral, $status, $appointment_Id);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Session Succesfully Discharge.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error updating the Counselor details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../session-page.php?Appointment_Id=$appointment_Id");
    exit();
}
?>
