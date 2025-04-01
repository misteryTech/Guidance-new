<?php
session_start();  // Start the session if needed elsewhere

include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $counselorId = $_POST['counselorID'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $archive = "No";

    // SQL Query to insert data into the database
    $sql = "INSERT INTO counselor_table (Counselor_Id, Email, FirstName, LastName, Gender, DateOfBirth, Address, PhoneNumber, Username, Password, Archive)
            VALUES ('$counselorId', '$email', '$firstName', '$lastName', '$gender', '$dob', '$address', '$phone', '$username', '$password', '$archive')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New counselor registered successfully!'); window.location.href='../counselor-page.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='../counselor-page.php';</script>";
    }

    // Close the connection
    $conn->close();
}
?>
