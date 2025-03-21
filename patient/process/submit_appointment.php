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
    $appointment_type = mysqli_real_escape_string($conn, $_POST['appointment_type']);
    
    $treatment = "N/A";
    $status = "Request";
    
    // Check if the patient already has 5 appointments on the selected date
    $check_query = "SELECT COUNT(*) AS appointment_count FROM appointments WHERE Patient_Id = '$patient_id' AND Appointment_Date = '$appointment_date'";
    $result = $conn->query($check_query);
    $row = $result->fetch_assoc();
    
    if ($row['appointment_count'] >= 5) {
        $_SESSION['registration_status'] = 'error';
        $_SESSION['registration_message'] = 'You can only book up to 5 appointments per day.';
    } else {
        // Insert data into the appointments table
        $query = "INSERT INTO appointments (Counselor_Id, Appointment_Time, Appointment_Date, Reason_for_Appointment, Treatment, `Status`, Patient_Id, Appointment_Type) 
                  VALUES ('$counselor_id', '$appointment_time', '$appointment_date', '$reason_for_appointment', '$treatment', '$status', '$patient_id', '$appointment_type')";
        
        if ($conn->query($query) === TRUE) {
            $_SESSION['registration_status'] = 'success';
            $_SESSION['registration_message'] = 'Appointment scheduled successfully!';
        } else {
            $_SESSION['registration_status'] = 'error';
            $_SESSION['registration_message'] = 'Error: ' . $conn->error;
        }
    }
    
    // Close the connection
    $conn->close();
    
    // Redirect back to the booking page
    header("Location: ../booked-appointment.php");
    exit();
}
?>
