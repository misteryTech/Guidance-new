<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Counselor_Id'])) {
    // If not logged in, redirect to login page or return an error
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

// Retrieve the logged-in admin's ID from the session
$Counselor_Id = $_SESSION['Counselor_Id'];

// Include the database connection file
include('../connection.php');

// Prepare SQL query to fetch admin profile
$sql = "SELECT * FROM counselor_table WHERE Counselor_Id = ?";
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if (!$stmt) {
    echo json_encode(["error" => "Failed to prepare statement"]);
    exit();
}

// Bind the parameter and execute the query
$stmt->bind_param("s", $Counselor_Id); // Assuming Counselor_Id is a string
$stmt->execute();
$result = $stmt->get_result();

// Check if a profile was found
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
