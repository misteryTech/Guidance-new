<?php
session_start(); // Start session

include("../connection.php");
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $patientId  = trim($_POST['patientId']);
    $email      = trim($_POST['email']);
    $firstName  = trim($_POST['firstName']);
    $middleName = trim($_POST['middleName']);
    $lastName   = trim($_POST['lastName']);
    $gender     = trim($_POST['gender']);
    $dob        = trim($_POST['dob']);
    $address    = trim($_POST['address']);
    $phone      = trim($_POST['phone']);
    $username   = trim($_POST['username']);
    $password   = trim($_POST['password']);
    $archive    = "No";

    // Check required fields
    if (empty($patientId) || empty($email) || empty($firstName) || empty($lastName) || empty($dob) || empty($username) || empty($password)) {
        $_SESSION['registration_status'] = 'error';
        $_SESSION['registration_message'] = 'All required fields must be filled.';
        header("Location: ../patient-page.php");
        exit();
    }



    // Use prepared statements to prevent SQL Injection
    $sql = "INSERT INTO patient_table (Patient_Id, Email, FirstName, LastName, Gender, DateOfBirth, Address, PhoneNumber, Username, Password, Archive, MiddleName)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $patientId, $email, $firstName, $lastName, $gender, $dob, $address, $phone, $username, $password, $archive, $middleName);

    if ($stmt->execute()) {
        $_SESSION['registration_status'] = 'success';
        $_SESSION['registration_message'] = 'New Student registered successfully!';

        // Email subject & message
        $subject = "Welcome to Guidance GFI";
        $message = "Dear $firstName,<br><br>
                    Congratulations! Your registration has been successfully completed. 
                    You may now log in using your credentials.<br><br>
                        $username, Password: <i>'$password'</i>
                    Best regards,<br>
                    Guidance Office<br>
                    [Guidance Office]";

        // Include email script (direct function call)
        include("../send_email.php"); 
        sendEmail($email, $subject, $message);
        
    } else {
        $_SESSION['registration_status'] = 'error';
        $_SESSION['registration_message'] = 'Error: ' . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();

    // Redirect back to the registration page
    header("Location: ../patient-page.php");
    exit();
}
?>
