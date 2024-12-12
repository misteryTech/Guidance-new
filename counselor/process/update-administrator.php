<?php
session_start();
include('../connection.php'); // Your DB connection file
 // Dummy adminID for testing, replace it with the actual adminID later

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

    $stmt = $conn->prepare("UPDATE admin_table SET firstName = ?, lastName = ?, Gender = ?, DateOfBirth = ?, Address = ?, PhoneNumber= ?, Username = ?, Password = ? WHERE Admin_Id = ?");
    $stmt->bind_param('ssssssssi', $firstName, $lastName, $gender, $dob, $address, $phone, $username, $password, $adminID);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Administrator details updated successfully.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error updating the administrator details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../admin-profile.php");
    exit();
}
?>
