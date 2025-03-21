<?php
// Start the session
session_start();

// Include database connection
include("../connection.php");

// Include PHPMailer for email functionality
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Get patient ID
$patient_id = isset($_POST['patientId']) ? sanitize_input($_POST['patientId']) : "N/A";

// Prepare the SQL statement with all column names
$sql_student = "INSERT INTO pds_table (
    student_id, age, birth_address, civil_status, solo_parent_children, religion, tribe, language_spoken, ip_belongin, 
    birth_order, stay_in_gensan, landlord_name, landlord_number, marital_status, live_present, wife_firstname, 
    wife_lastname, wife_age, wife_occupation, wife_educ, family_income, family_transpo, repeat_grade, repeat_why, 
    failed_subject, listfailed, taketimesub, difficultinschool, difficultinschoolwhy, school_activities, work_experience, 
    employmentrecord, basic_benefits, preferred_vocation, preferred_job, plans_after_college, personality_traits, grooming, 
    posture, seriousness, academic_ability, academic_achievement, emergency_relationship, emergency_contact, emergency_address
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql_student);
$stmt->bind_param(
    "iisssssssssssssssisssssssssssssssssssssssssss",
    $patient_id,
    $_POST['age'],
    $_POST['birthaddress'],
    $_POST['civil_status'],
    $_POST['solo_parent_children'],
    $_POST['religion'],
    $_POST['tribe'],
    $_POST['language_spoken'],
    $_POST['ip_belonging'],
    $_POST['birth_order'],
    $_POST['stay_in_gensan'],
    $_POST['landlord_name'],
    $_POST['landlord_number'],
    $_POST['marital_status'],
    $_POST['live_present'],
    $_POST['wife_firstname'],
    $_POST['wife_lastname'],
    $_POST['wife_age'],
    $_POST['wife_occupation'],
    $_POST['wife_educ'],
    $_POST['family-income'],
    $_POST['family-transpo'],
    $_POST['repeat_grade'],
    $_POST['repeat_why'],
    $_POST['failed_subject'],
    $_POST['listfailed'],
    $_POST['taketimesub'],
    $_POST['difficultinschool'],
    $_POST['difficultinschoolwhy'],
    $_POST['school-activities'],
    $_POST['wordkexperience'],
    $_POST['employmentrecord'],
    $_POST['basic_benefits'],
    $_POST['preferred_vocation'],
    $_POST['preferred_job'],
    $_POST['plans_after_college'],
    $_POST['personality_traits'],
    $_POST['grooming'],
    $_POST['posture'],
    $_POST['seriousness'],
    $_POST['academic_ability'],
    $_POST['academic_achievement'],
    $_POST['emergency_relationship'],
    $_POST['emergency-contact'],
    $_POST['emergency-address']
);

if ($stmt->execute()) {
    $last_insert_id = $conn->insert_id;

    // Get user email from form input
    $recipient_email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $recipient_name = sanitize_input($_POST['name'] ?? 'Student');

    if (!empty($recipient_email) && filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
        try {
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            // SMTP settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gfiguidanceoffice@gmail.com';
            $mail->Password   = 'xaxdkyuxswljmaew'; // Use App Password for security
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Email settings
            $mail->setFrom('gfiguidanceoffice@gmail.com', 'Guidance Office');
            $mail->addAddress($recipient_email, $recipient_name);
            $mail->Subject = 'PDS Update Confirmation';
            $mail->Body    = "Hello $recipient_name,\n\nYour Personal Data Sheet (PDS) has been successfully updated.\n\nBest regards,\nGuidance Office";

            // Send email
            $mail->send();
            $_SESSION['update_message'] = "Personal Data Sheet Updated Successfully. Email sent to $recipient_email";
        } catch (Exception $e) {
            $_SESSION['update_message'] = "PDS Updated, but email could not be sent. Error: " . $mail->ErrorInfo;
        }
    } else {
        $_SESSION['update_message'] = "PDS Updated. No valid email provided.";
    }

    $_SESSION['update_status'] = 'success';
} else {
    $_SESSION['update_status'] = 'error';
    $_SESSION['update_message'] = 'Error: ' . $conn->error;
}

// Close connection and redirect
$stmt->close();
$conn->close();
header("Location: ../pds-registration.php");
exit();
?>
