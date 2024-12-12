<?php
// Database connection
include('../connection.php'); // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Prepare and execute the query to check if the username exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM admin_table WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}
?>
