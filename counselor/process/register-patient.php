<?php
session_start();  // Start the session to store session variables

include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientId = $_POST['patientId'];
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
    $sql = "INSERT INTO patient_table (Patient_Id, Email, FirstName, LastName, Gender, DateOfBirth, Address, PhoneNumber, Username, Password, Archive)
            VALUES ('$patientId', '$email', '$firstName', '$lastName', '$gender', '$dob', '$address', '$phone', '$username', '$password', '$archive')";

    // Check if the query is successful
    if ($conn->query($sql) === TRUE) {
        $_SESSION['registration_status'] = 'success';  // Set session variable for success message
        $_SESSION['registration_message'] = 'New Patient registered successfully!';  // Success message
    } else {
        $_SESSION['registration_status'] = 'error';  // Set session variable for error message
        $_SESSION['registration_message'] = 'Error: ' . $conn->error;  // Error message
    }

    // Close the connection
    $conn->close();

    // Redirect back to the registration page (or to a page that will show the modal)
    header("Location: ../patient-registration.php");  // Change the redirection to your page
    exit();
}
?>
