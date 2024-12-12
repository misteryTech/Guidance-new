<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $incident_date = $_POST['incident_date'];
    $incident_time = $_POST['incident_time'];
    $incident_location = $_POST['incident_location'];
    $incident_description = $_POST['incident_description'];
    $parties_involved = $_POST['parties_involved'];
    $witnesses = $_POST['witnesses'];
    $actions_taken = $_POST['actions_taken'];
    $reported_by = $_POST['reported_by'];
    $contact_info = $_POST['contact_info'];
    $picture_path = null;

    // Handle optional picture upload
    if (isset($_FILES['incident_picture']) && $_FILES['incident_picture']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = "../uploads/";
        $file_name = basename($_FILES['incident_picture']['name']);
        $target_file = $upload_dir . time() . "_" . $file_name;

        // Move uploaded file
        if (move_uploaded_file($_FILES['incident_picture']['tmp_name'], $target_file)) {
            $picture_path = $target_file;
        } else {
            echo "<p class='text-danger'>Error uploading the picture.</p>";
            exit;
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO incident_reports 
        (incident_date, incident_time, incident_location, incident_description, parties_involved, witnesses, actions_taken, reported_by, contact_info, picture_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssss",
        $incident_date,
        $incident_time,
        $incident_location,
        $incident_description,
        $parties_involved,
        $witnesses,
        $actions_taken,
        $reported_by,
        $contact_info,
        $picture_path
    );

    if ($stmt->execute()) {
        $_SESSION['registration_status'] = 'success';
        $_SESSION['registration_message'] = 'Your incident report has been successfully submitted!';
    
        // Redirect back to the form page (so the modal will show)
        header('Location: ../report-incident-page.php');
        exit;
    } else {
        // Handle form submission failure (e.g., invalid data)
    $_SESSION['registration_status'] = 'error';
    $_SESSION['registration_message'] = 'There was an error submitting your report. Please try again.';

    // Redirect back to the form page
    header('Location: ../report-incident-page.php');
    exit;
    }

    $stmt->close();
    $conn->close();
}
?>
