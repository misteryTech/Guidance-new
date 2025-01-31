<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../connection.php");

header('Content-Type: application/json'); // Set JSON header

$sql = "SELECT Counselor_Id, Reason_for_Appointment, Appointment_Date FROM appointments";
$result = $conn->query($sql);

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['Counselor_Id'],  // Use correct column name
        'title' => $row['Reason_for_Appointment'], // Rename to 'title' for FullCalendar
        'start' => $row['Appointment_Date'] // Ensure date is in 'YYYY-MM-DD HH:MM:SS' format
    ];
}

echo json_encode($events);
?>
