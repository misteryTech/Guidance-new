<?php
session_start();
include '../connection.php'; // Adjust based on your project

if (isset($_POST['selectedMonth'])) {
    $selectedMonth = $_POST['selectedMonth'];
} else {
    $selectedMonth = date('m'); // Default to current month
}

$counselor_id = $_SESSION['Counselor_Id']; // Ensure session is started

$query_total_student_request = "
    SELECT COUNT(*) AS total_student_request 
    FROM appointments 
    WHERE MONTH(Appointment_Date) = '$selectedMonth' 
    AND YEAR(Appointment_Date) = YEAR(NOW()) 
    AND Counselor_Id = '$counselor_id'
";

$result_total_student = mysqli_query($conn, $query_total_student_request);
$totalStudentRequest = 0;

if ($result_total_student && $row_request = mysqli_fetch_assoc($result_total_student)) {
    $totalStudentRequest = $row_request['total_student_request'];
}

echo $totalStudentRequest;
?>
