<?php
// Start the session
session_start();

// Get the patient ID from the session
$patient_id = isset($_SESSION['Patient_Id']) ? $_SESSION['Patient_Id'] : "N/A";

// Include database connection
include("../connection.php");

// Get POST data with fallback to "N/A" for empty or missing values
$civil_status = isset($_POST['civil_status']) && trim($_POST['civil_status']) !== "" ? htmlspecialchars($_POST['civil_status'], ENT_QUOTES, 'UTF-8') : "N/A";
$solo_parent_children = isset($_POST['solo_parent_children']) && trim($_POST['solo_parent_children']) !== "" ? intval($_POST['solo_parent_children']) : "N/A";
$religion = isset($_POST['religion']) && trim($_POST['religion']) !== "" ? htmlspecialchars($_POST['religion'], ENT_QUOTES, 'UTF-8') : "N/A";
$tribe = isset($_POST['tribe']) && trim($_POST['tribe']) !== "" ? htmlspecialchars($_POST['tribe'], ENT_QUOTES, 'UTF-8') : "N/A";
$language_spoken = isset($_POST['language_spoken']) && trim($_POST['language_spoken']) !== "" ? htmlspecialchars($_POST['language_spoken'], ENT_QUOTES, 'UTF-8') : "N/A";
$ip_belonging = isset($_POST['ip_belonging']) && trim($_POST['ip_belonging']) !== "" ? htmlspecialchars($_POST['ip_belonging'], ENT_QUOTES, 'UTF-8') : "N/A";
$number_of_siblings = isset($_POST['number_of_siblings']) && trim($_POST['number_of_siblings']) !== "" ? intval($_POST['number_of_siblings']) : "N/A";
$birth_order = isset($_POST['birth_order']) && trim($_POST['birth_order']) !== "" ? htmlspecialchars($_POST['birth_order'], ENT_QUOTES, 'UTF-8') : "N/A";
$stay_in_gensan = isset($_POST['stay_in_gensan']) && trim($_POST['stay_in_gensan']) !== "" ? htmlspecialchars($_POST['stay_in_gensan'], ENT_QUOTES, 'UTF-8') : "N/A";
$landlord_name = isset($_POST['landlord_name']) && trim($_POST['landlord_name']) !== "" ? htmlspecialchars($_POST['landlord_name'], ENT_QUOTES, 'UTF-8') : "N/A";
$contact_number = isset($_POST['contact_number']) && trim($_POST['contact_number']) !== "" ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES, 'UTF-8') : "N/A";
$father_firstname = isset($_POST['father_firstname']) && trim($_POST['father_firstname']) !== "" ? htmlspecialchars($_POST['father_firstname'], ENT_QUOTES, 'UTF-8') : "N/A";
$father_lastname = isset($_POST['father_lastname']) && trim($_POST['father_lastname']) !== "" ? htmlspecialchars($_POST['father_lastname'], ENT_QUOTES, 'UTF-8') : "N/A";
$mother_firstname = isset($_POST['mother_firstname']) && trim($_POST['mother_firstname']) !== "" ? htmlspecialchars($_POST['mother_firstname'], ENT_QUOTES, 'UTF-8') : "N/A";
$mother_lastname = isset($_POST['mother_lastname']) && trim($_POST['mother_lastname']) !== "" ? htmlspecialchars($_POST['mother_lastname'], ENT_QUOTES, 'UTF-8') : "N/A";
$current_address = isset($_POST['current_address']) && trim($_POST['current_address']) !== "" ? htmlspecialchars($_POST['current_address'], ENT_QUOTES, 'UTF-8') : "N/A";
$emergency_relationship = isset($_POST['emergency_relationship']) && trim($_POST['emergency_relationship']) !== "" ? htmlspecialchars($_POST['emergency_relationship'], ENT_QUOTES, 'UTF-8') : "N/A";
$emergency_contact = isset($_POST['emergency_contact']) && trim($_POST['emergency_contact']) !== "" ? htmlspecialchars($_POST['emergency_contact'], ENT_QUOTES, 'UTF-8') : "N/A";
$emergency_address = isset($_POST['emergency_address']) && trim($_POST['emergency_address']) !== "" ? htmlspecialchars($_POST['emergency_address'], ENT_QUOTES, 'UTF-8') : "N/A";
$school_activities = isset($_POST['school_activities']) && trim($_POST['school_activities']) !== "" ? htmlspecialchars($_POST['school_activities'], ENT_QUOTES, 'UTF-8') : "N/A";
$email1 = isset($_POST['email1']) && trim($_POST['email1']) !== "" ? filter_var($_POST['email1'], FILTER_SANITIZE_EMAIL) : "N/A";
$email2 = isset($_POST['email2']) && trim($_POST['email2']) !== "" ? filter_var($_POST['email2'], FILTER_SANITIZE_EMAIL) : "N/A";
$highest_education = isset($_POST['highest_education']) && trim($_POST['highest_education']) !== "" ? htmlspecialchars($_POST['highest_education'], ENT_QUOTES, 'UTF-8') : "N/A";
$occupation = isset($_POST['occupation']) && trim($_POST['occupation']) !== "" ? htmlspecialchars($_POST['occupation'], ENT_QUOTES, 'UTF-8') : "N/A";
$business_address = isset($_POST['business_address']) && trim($_POST['business_address']) !== "" ? htmlspecialchars($_POST['business_address'], ENT_QUOTES, 'UTF-8') : "N/A";
$position_held = isset($_POST['position_held']) && trim($_POST['position_held']) !== "" ? htmlspecialchars($_POST['position_held'], ENT_QUOTES, 'UTF-8') : "N/A";

// Prepare SQL query
$sql = "INSERT INTO pds_table (
    patient_id, civil_status, solo_parent_children, religion, tribe, language_spoken, ip_belonging, 
    number_of_siblings, birth_order, stay_in_gensan, landlord_name, contact_number, 
    father_firstname, father_lastname, mother_firstname, mother_lastname, current_address, 
    emergency_relationship, emergency_contact, emergency_address, school_activities, email1, 
    email2, highest_education, occupation, business_address, position_held
) VALUES (
    '$patient_id', '$civil_status', '$solo_parent_children', '$religion', '$tribe', '$language_spoken', 
    '$ip_belonging', '$number_of_siblings', '$birth_order', '$stay_in_gensan', '$landlord_name', 
    '$contact_number', '$father_firstname', '$father_lastname', '$mother_firstname', '$mother_lastname', 
    '$current_address', '$emergency_relationship', '$emergency_contact', '$emergency_address', 
    '$school_activities', '$email1', '$email2', '$highest_education', '$occupation', '$business_address', 
    '$position_held'
)";

// Execute query and handle result
if ($conn->query($sql) === TRUE) {
    $_SESSION['registration_status'] = 'success';
    $_SESSION['registration_message'] = 'Personal Data Sheet Updated';
} else {
    $_SESSION['registration_status'] = 'error';
    $_SESSION['registration_message'] = 'Error: ' . $conn->error;
}

// Close connection and redirect
$conn->close();
header("Location: ../pds-registration.php");
exit();
?>
