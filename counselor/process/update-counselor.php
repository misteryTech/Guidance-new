<?php
session_start();
include('../connection.php'); // Your DB connection file
 // Dummy adminID for testing, replace it with the actual adminID later

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data

    $counselorID = $_POST['counselorID']; 
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $licensedNo = !empty($_POST['licensedNo']) ? $_POST['licensedNo'] : 'N/A';
    $validityPeriod = !empty($_POST['validityPeriod']) ? $_POST['validityPeriod'] : 'N/A';
    $educbg = !empty($_POST['educbg']) ? $_POST['educbg'] : 'N/A';
    $specialization = !empty($_POST['specialization']) ? $_POST['specialization'] : 'N/A';
    
    $stmt = $conn->prepare("UPDATE counselor_table SET firstName = ?, lastName = ?, Gender = ?, DateOfBirth = ?, Address = ?, PhoneNumber= ?, Username = ?, Password = ?, Licensed_No = ?,   Validity_Period = ?, Education_Bg = ?,  Specialization= ? WHERE Counselor_Id = ?");
    $stmt->bind_param('ssssssssssssi', $firstName, $lastName, $gender, $dob, $address, $phone, $username, $password, $licensedNo, $validityPeriod, $educbg, $specialization, $counselorID);

    if ($stmt->execute()) {
        // Success: Set session message for successful update
        $_SESSION['update_status'] = 'success';
        $_SESSION['update_message'] = 'Counselor details updated successfully.';
    } else {
        // Error: Set session message for failure
        $_SESSION['update_status'] = 'danger';
        $_SESSION['update_message'] = 'There was an error updating the Counselor details. Please try again.';
    }
    
    // Redirect back to the update form page
    header("Location: ../counselor-profile.php");
    exit();
}
?>
