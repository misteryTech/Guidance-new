<?php
// Database connection
include('../connection.php'); // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Prepare and execute the query to check if the email exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM counselor_table WHERE Email = ?");
    $stmt->bind_param("s", $email);
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
