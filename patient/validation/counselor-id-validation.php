<?php
// Database connection
include('../connection.php'); // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $counselorID = $_POST['counselorID'];

    // Ensure the adminID is padded to 7 digits with leading zeros
    $counselorID = str_pad($counselorID, 7, '0', STR_PAD_LEFT); // Pads the ID to 7 digits, e.g., 0000001

    // Prepare and execute the query to check if the adminID exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM counselor_table WHERE Counselor_Id = ?");
    $stmt->bind_param("s", $counselorID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Return response based on the count
    if ($count > 0) {
        echo "exists";  // ID already exists, need to generate next ID
    } else {
        echo "available";  // ID is available
    }
}
?>
