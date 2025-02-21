<?php

// Database connection credentials
$primary_host = 'localhost';
$secondary_host = 'your_remote_host'; // Replace with actual remote host
$username = 'root';
$password = '';
$database = 'guidance-new';

// Attempt connection to primary host
$conn = new mysqli($primary_host, $username, $password, $database);

// If connection fails, attempt secondary host
if ($conn->connect_error) {
    $conn = new mysqli($secondary_host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

?>
