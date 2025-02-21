<?php
// Start the session
session_start();

// Include database connection
include("../connection.php");

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Get patient ID
$patient_id = isset($_POST['patientId']) ? sanitize_input($_POST['patientId']) : "N/A";

// Prepare the SQL statement with all column names
$sql_student = "INSERT INTO pds_table (
    student_id, age, birth_address, civil_status, solo_parent_children, religion, tribe, language_spoken, ip_belongin,
    birth_order, stay_in_gensan, landlord_name, landlord_number, marital_status, live_present,
    wife_firstname, wife_lastname, wife_age, wife_occupation, wife_educ, family_income, family_transpo, repeat_grade, repeat_why,
    failed_subject, listfailed, taketimesub, difficultinschool, difficultinschoolwhy, school_activities, work_experience,
    employmentrecord, basic_benefits, preferred_vocation, preferred_job, plans_after_college, personality_traits, grooming,
    posture, seriousness, academic_ability, academic_achievement, emergency_relationship, emergency_contact, emergency_address
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql_student);

// Bind parameters correctly
$stmt->bind_param(
    "iisssssssssssssssssssssssssssssssssssssssssss",
    $patient_id,
    $_POST['age'],
    $_POST['birthaddress'],
    $_POST['civil_status'],
    $_POST['solo_parent_children'],
    $_POST['religion'],
    $_POST['tribe'],
    $_POST['language_spoken'],
    $_POST['ip_belongin'],
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
    $_POST['family_income'],
    $_POST['family_transpo'],
    $_POST['repeat_grade'],
    $_POST['repeat_why'],
    $_POST['failed_subject'],
    $_POST['listfailed'],
    $_POST['taketimesub'],
    $_POST['difficultinschool'],
    $_POST['difficultinschoolwhy'],
    $_POST['school_activities'],
    $_POST['work_experience'],
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
    $_POST['emergency_contact'],
    $_POST['emergency_address']
);
if ($stmt->execute()) {
    $last_insert_id = $conn->insert_id;

    // Insert parent details
    $parents = ['father', 'mother'];
    $fields = ['firstname', 'lastname', 'religion', 'tribe', 'cellphone', 'email', 'schoolattain', 'language', 'occupation', 'business', 'position'];

    foreach ($parents as $parent) {
        $values = [];
        foreach ($fields as $field) {
            $input_name = $parent . "_" . $field;
            $values[$field] = isset($_POST[$input_name]) ? sanitize_input($_POST[$input_name]) : "N/A";
        }

        $sql_parent = "INSERT INTO parents_info (
            student_id, parent_type, firstname, lastname, religion, tribe, cellphone, email, schoolattain, language, occupation, business, position
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_parent = $conn->prepare($sql_parent);
        $stmt_parent->bind_param("issssssssssss", 
            $last_insert_id, $parent, $values['firstname'], $values['lastname'], $values['religion'], $values['tribe'], 
            $values['cellphone'], $values['email'], $values['schoolattain'], $values['language'], $values['occupation'], 
            $values['business'], $values['position']
        );
        $stmt_parent->execute();
    }

    // Insert household members dynamically
    for ($i = 1; isset($_POST["household{$i}fname"]); $i++) {
        $household_fname = sanitize_input($_POST["household{$i}fname"]);
        $household_lname = sanitize_input($_POST["household{$i}lname"]);
        $household_sex = sanitize_input($_POST["household{$i}sex"]);
        $household_age = sanitize_input($_POST["household{$i}age"]);
        $household_civilstatus = sanitize_input($_POST["household{$i}civilstatus"]);
        $household_relationship = sanitize_input($_POST["household{$i}relationship"]);

        if (!empty($household_fname)) {
            $sql_household = "INSERT INTO household_members (
                student_id, firstname, lastname, sex, age, civil_status, relationship
            ) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt_household = $conn->prepare($sql_household);
            $stmt_household->bind_param("issssss", 
                $last_insert_id, $household_fname, $household_lname, $household_sex, $household_age, $household_civilstatus, $household_relationship
            );
            $stmt_household->execute();
        }
    }

    // Insert education details dynamically
    $educationLevels = ["Kindergarten", "Elementary", "Junior High School", "Senior High School"];
    foreach ($educationLevels as $index => $level) {
        $levelNumber = $index + 1;
        $school_name = sanitize_input($_POST["school{$levelNumber}"] ?? "N/A");
        $school_address = sanitize_input($_POST["school{$levelNumber}address"] ?? "N/A");
        $school_awards = sanitize_input($_POST["school{$levelNumber}awards"] ?? "N/A");

        if ($school_name !== "N/A") {
            $sql_education = "INSERT INTO education_details (
                student_id, level, school_name, school_address, honors_awards
            ) VALUES (?, ?, ?, ?, ?)";

            $stmt_education = $conn->prepare($sql_education);
            $stmt_education->bind_param("issss", 
                $last_insert_id, $level, $school_name, $school_address, $school_awards
            );
            $stmt_education->execute();
        }
    }


    // Insert employment details dynamically
        $numEmployments = 3; // Adjust if needed

        for ($i = 1; $i <= $numEmployments; $i++) {
            $employment_date = sanitize_input($_POST["employment{$i}_date"] ?? "");
            $company_name = sanitize_input($_POST["employment{$i}_company"] ?? "");
            $employment_place = sanitize_input($_POST["employment{$i}_place"] ?? "");
            $job_description = sanitize_input($_POST["employment{$i}_job"] ?? "");
        
            // Only insert if company name is provided
            if (!empty($company_name)) {
                $sql_employment = "INSERT INTO employment (
                    student_id, employment_date, company_name, employment_place, job_description
                ) VALUES (?, ?, ?, ?, ?)";

                $stmt_employment = $conn->prepare($sql_employment);
                $stmt_employment->bind_param("issss", 
                    $last_insert_id, $employment_date, $company_name, $employment_place, $job_description
                );
                $stmt_employment->execute();
            }
        }



    $_SESSION['update_status'] = 'success';
    $_SESSION['update_message'] = 'Personal Data Sheet Updated';
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
