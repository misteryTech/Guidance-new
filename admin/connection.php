<?php


// Database connection
    $conn = new mysqli('localhost', 'root', '', 'guidance-new');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    ?>