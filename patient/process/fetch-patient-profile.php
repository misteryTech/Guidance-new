<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Patient_Id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

// Retrieve the logged-in user's ID from the session
$Patient_Id = $_SESSION['Patient_Id'];

// Include the database connection file
include('../connection.php');

// Prepare SQL query to fetch the profile
$sql = "SELECT * FROM patient_table WHERE Patient_Id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "Failed to prepare statement"]);
    exit();
}

// Bind the parameter and execute the query
$stmt->bind_param("s", $Patient_Id); // Assuming Patient_Id is a string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $profile = $result->fetch_assoc();
    echo json_encode($profile); // Return the profile data as JSON
} else {
    echo json_encode(["error" => "Profile not found"]);
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
