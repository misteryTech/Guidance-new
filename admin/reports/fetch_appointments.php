<?php
include('../connection.php');

// Query to count appointments per month
$query = "
    SELECT MONTH(Appointment_Date) AS month, COUNT(*) AS total 
    FROM appointments 
    GROUP BY MONTH(Appointment_Date) 
    ORDER BY MONTH(Appointment_Date)
";
$result = $conn->query($query);

$appointmentData = array_fill(0, 12, 0); // Initialize array with 12 months

while ($row = $result->fetch_assoc()) {
    $appointmentData[(int)$row['month'] - 1] = (int)$row['total']; // Ensure whole numbers
}

$conn->close();

// Return data as JSON
echo json_encode($appointmentData, JSON_NUMERIC_CHECK); // Ensures numbers in JSON
?>
