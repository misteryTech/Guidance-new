<?php
// Database connection
include('../connection.php'); // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminID = $_POST['adminID'];

    // Ensure the adminID is padded to 7 digits with leading zeros
    $adminID = str_pad($adminID, 7, '0', STR_PAD_LEFT); // Pads the ID to 7 digits, e.g., 0000001

    // Prepare and execute the query to check if the adminID exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM admin_table WHERE Admin_Id = ?");
    $stmt->bind_param("s", $adminID);
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
