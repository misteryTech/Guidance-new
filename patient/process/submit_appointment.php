<?php

session_start();  // Start the session to store session variables
$patient_id = $_SESSION['Patient_Id'];

// Include your database connection
include '../connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $counselor_id = mysqli_real_escape_string($conn, $_POST['counselor_id']);
    $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $reason_for_appointment = mysqli_real_escape_string($conn, $_POST['reason_for_appointment']);
    $treatment = mysqli_real_escape_string($conn, $_POST['treatment']);
    $status = "Request";

    // Insert data into the appointments table
    $query = "INSERT INTO appointments (Counselor_Id, Appointment_Time, Appointment_Date, Reason_for_Appointment, Treatment, Status, Patient_Id) 
              VALUES ('$counselor_id', '$appointment_time', '$appointment_date', '$reason_for_appointment', '$treatment' , $status,'$patient_id')";
    
  
    // Check if the query is successful
    if ($conn->query($query) === TRUE) {
        $_SESSION['registration_status'] = 'success';  // Set session variable for success message
        $_SESSION['registration_message'] = 'Appointment Schedule successfully!';  // Success message
    } else {
        $_SESSION['registration_status'] = 'error';  // Set session variable for error message
        $_SESSION['registration_message'] = 'Error: ' . $conn->error;  // Error message
    }

    // Close the connection
    $conn->close();

    // Redirect back to the registration page (or to a page that will show the modal)
    header("Location: ../booked-appointment.php");  // Change the redirection to your page
    exit();


}
?>
