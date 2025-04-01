<?php
session_start();
include('../connection.php'); // Your DB connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $adminID = $_POST['adminID']; 
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE admin_table SET firstName = ?, lastName = ?, Gender = ?, Email=?, DateOfBirth = ?, Address = ?, PhoneNumber= ?, Username = ?, Password = ? WHERE Admin_Id = ?");
    $stmt->bind_param('sssssssssi', $firstName, $lastName, $gender, $email, $dob, $address, $phone, $username, $password, $adminID);

    if ($stmt->execute()) {
        // Success message
        echo "<script>alert('Administrator details updated successfully.'); window.location.href='../admin-profile.php';</script>";
    } else {
        // Error message
        echo "<script>alert('There was an error updating the administrator details. Please try again.'); window.location.href='../admin-profile.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
