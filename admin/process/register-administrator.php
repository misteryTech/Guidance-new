<?php
session_start();  // Start session

include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $adminID    = trim($_POST['adminID']);
    $email      = trim($_POST['email']);
    $firstName  = trim($_POST['firstName']);
    $lastName   = trim($_POST['lastName']);
    $gender     = trim($_POST['gender']);
    $dob        = trim($_POST['dob']);
    $address    = trim($_POST['address']);
    $phone      = trim($_POST['phone']);
    $username   = trim($_POST['username']);
    $password   = trim($_POST['password']);
    $archive    = "No";

    // Check for required fields
    if (empty($adminID) || empty($email) || empty($firstName) || empty($lastName) || empty($dob) || empty($username) || empty($password)) {
        echo "<script>
                alert('All required fields must be filled.');
                window.location.href='../admin-page.php';
              </script>";
        exit();
    }

    // SQL Query using prepared statement
    $sql = "INSERT INTO admin_table (Admin_Id, Email, FirstName, LastName, Gender, DateOfBirth, Address, PhoneNumber, Username, Password, Archive)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $adminID, $email, $firstName, $lastName, $gender, $dob, $address, $phone, $username, $password, $archive);

    if ($stmt->execute()) {
        // Email subject & message
        $subject = "Welcome to Guidance GFI";
        $message = "Dear $firstName $lastName,<br><br>
                    Congratulations! Your registration has been successfully completed. 
                    You may now log in using your credentials.<br><br>
                    <b>Username:</b> $username <br>
                    <b>Password:</b> <i>$password</i><br><br>
                    Best regards,<br>
                    Guidance Office<br>
                    [Guidance Office]";

        // Include email script and send email
        include("../send_email.php"); 
        sendEmail($email, $subject, $message);

        // JavaScript alert for successful registration
        echo "<script>
                alert('Successfully registered!');
                window.location.href='../administrator-registration.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . addslashes($stmt->error) . "');
                window.location.href='../administrator-registration.php';
              </script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
