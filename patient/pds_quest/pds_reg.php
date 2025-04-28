<?php
session_start();
include("../connection.php");

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable error reporting

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

try {
    // Get patient ID
    $patient_id = isset($_POST['patientId']) ? sanitize_input($_POST['patientId']) : "1";

    if (!is_numeric($patient_id)) {
        throw new Exception("Invalid patient ID. Must be a number.");
    }

    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : "reymarkescalante12@gmail.com";
    
    // SQL Query for PDS Table
    $sql_student = "INSERT INTO pds_table (
        student_id, age, birth_address, civil_status, solo_parent_children, religion, tribe, language_spoken, ip_belongin, 
        birth_order, stay_in_gensan, landlord_name, landlord_number, marital_status, live_present, wife_firstname, 
        wife_lastname, wife_age, wife_occupation, wife_educ, family_income, family_transpo, repeat_grade, repeat_why, 
        failed_subject, listfailed, taketimesub, difficultinschool, difficultinschoolwhy, school_activities, work_experience, 
        basic_benefits, preferred_vocation, preferred_job, plans_after_college, personality_traits, grooming, 
        posture, seriousness, academic_ability, academic_achievement, emergency_relationship, emergency_contact, emergency_address
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_student);

    // Check if $stmt is valid
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "iisssssssssssssssissssssssssssssssssssssssss",
        $patient_id, $_POST['age'], $_POST['birthaddress'], $_POST['civil_status'], $_POST['solo_parent_children'],
        $_POST['religion'], $_POST['tribe'], $_POST['language_spoken'], $_POST['ip_belonging'], $_POST['birth_order'],
        $_POST['stay_in_gensan'], $_POST['landlord_name'], $_POST['landlord_number'], $_POST['marital_status'], $_POST['live_present'],
        $_POST['wife_firstname'], $_POST['wife_lastname'], $_POST['wife_age'], $_POST['wife_occupation'], $_POST['wife_educ'],
        $_POST['family-income'], $_POST['family-transpo'], $_POST['repeat_grade'], $_POST['repeat_why'], $_POST['failed_subject'],
        $_POST['listfailed'], $_POST['taketimesub'], $_POST['difficultinschool'], $_POST['difficultinschoolwhy'], $_POST['school-activities'],
        $_POST['wordkexperience'], $_POST['basic_benefits'], $_POST['preferred_vocation'], $_POST['preferred_job'],
        $_POST['plans_after_college'], $_POST['personality_traits'], $_POST['grooming'], $_POST['posture'], $_POST['seriousness'],
        $_POST['academic_ability'], $_POST['academic_achievement'], $_POST['emergency_relationship'], $_POST['emergency-contact'], $_POST['emergency-address']

        
    );

    if ($stmt->execute()) {
        $last_insert_id = $conn->insert_id;
    

                                     // Get user email from form input
                                     $recipient_email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
                                     $recipient_name = sanitize_input($_POST['name'] ?? 'Student');

                                     if (!empty($recipient_email) && filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
                                         try {


                                                        // Email subject & message
                                                        $subject = "PDS Update Confirmation";
                                                        $message = "Hello $recipient_name,\n\nYour Personal Data Sheet (PDS) has been successfully updated.\n\nBest regards,\nGuidance Office";

                                                        // Include email script and send email
                                                        include("../send_email.php"); 
                                                        sendEmail($recipient_email, $subject, $message);




                                             sendEmail($email, $subject, $message);

                                             $_SESSION['update_message'] = "Personal Data Sheet Updated Successfully. Email sent to $recipient_email";
                                         } catch (Exception $e) {
                                             $_SESSION['update_message'] = "PDS Updated, but email could not be sent. Error: " . $mail->ErrorInfo;
                                         }
                                     } else {
                                         $_SESSION['update_message'] = "PDS Updated. No valid email provided.";
                                     }



                                     
    // Insert Parent Details
    $parents = ['father', 'mother'];
    $fields = ['firstname', 'lastname', 'religion', 'tribe', 'cellphone', 'email', 'schoolattain', 'language', 'occupation', 'business', 'position'];

    foreach ($parents as $parent) {
        $values = [];
        foreach ($fields as $field) {
            $input_name = $parent . "_" . $field;
            $values[$field] = isset($_POST[$input_name]) ? sanitize_input($_POST[$input_name]) : "N/A";
        }

        $sql_parent = "INSERT INTO parents_info (student_id, parent_type, firstname, lastname, religion, tribe, cellphone, email, schoolattain, language, occupation, business, position)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_parent = $conn->prepare($sql_parent);
        $stmt_parent->bind_param("issssssssssss", 
            $patient_id, $parent, $values['firstname'], $values['lastname'], $values['religion'], $values['tribe'],
            $values['cellphone'], $values['email'], $values['schoolattain'], $values['language'], $values['occupation'], 
            $values['business'], $values['position']
        );
        $stmt_parent->execute();
    }

    $householdCount = 4; // same value you used in JS
    $last_insert_id = $conn->insert_id; // student's ID from previous insert
    
    for ($i = 1; $i <= $householdCount; $i++) {
        // Check if marked as "N/A"
        $na_checked = isset($_POST["household{$i}na"]);
    
        // Only insert if not marked N/A and fields are not empty
        if (!$na_checked && !empty($_POST["household{$i}fname"])) {
            $fname = sanitize_input($_POST["household{$i}fname"]);
            $lname = sanitize_input($_POST["household{$i}lname"]);
            $sex = sanitize_input($_POST["household{$i}sex"]);
            $age = intval(sanitize_input($_POST["household{$i}age"]));
            $civil_status = sanitize_input($_POST["household{$i}civilstatus"]);
            $relationship = sanitize_input($_POST["household{$i}relationship"]);
    
            $sql = "INSERT INTO household_members (student_id, firstname, lastname, sex, age, civil_status, relationship)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssiss", 
                $patient_id, 
                $fname, 
                $lname, 
                $sex, 
                $age, 
                $civil_status, 
                $relationship
            );
            $stmt->execute();
        }
    }
    
    // Insert Education Details
    $educationLevels = ["Kindergarten", "Elementary", "Junior High School", "Senior High School"];
    foreach ($educationLevels as $index => $level) {
        $levelNumber = $index + 1;
        $school_name = sanitize_input($_POST["school{$levelNumber}"] ?? "N/A");
        $school_address = sanitize_input($_POST["school{$levelNumber}address"] ?? "N/A");
        $school_awards = sanitize_input($_POST["school{$levelNumber}awards"] ?? "N/A");

        if ($school_name !== "N/A") {
            $sql_education = "INSERT INTO education (student_id, level, school_name, school_address, awards) VALUES (?, ?, ?, ?, ?)";
            $stmt_education = $conn->prepare($sql_education);
            $stmt_education->bind_param("issss", $patient_id, $level, $school_name, $school_address, $school_awards);
            $stmt_education->execute();
        }
    }

    // Insert Employment Details
    for ($i = 1; $i <= 3; $i++) {
        $employment_date = sanitize_input($_POST["employment{$i}_date"] ?? "");
        $company_name = sanitize_input($_POST["employment{$i}_company"] ?? "");
        $employment_place = sanitize_input($_POST["employment{$i}_place"] ?? "");
        $job_description = sanitize_input($_POST["employment{$i}_job"] ?? "");

        if (!empty($company_name)) {
            $sql_employment = "INSERT INTO employment (student_id, employment_date, company_name, employment_place, job_description) VALUES (?, ?, ?, ?, ?)";
            $stmt_employment = $conn->prepare($sql_employment);
            $stmt_employment->bind_param("issss", $patient_id, $employment_date, $company_name, $employment_place, $job_description);
            $stmt_employment->execute();
        }
    }


    if ($stmt->execute()) {
        echo "Inserted successfully.";
    }
     echo "<script>alert('Student PDS Updated successfully!'); window.location.href='../pds-registration.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href='../pds-registration.php';</script>";
}
    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
