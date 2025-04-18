<?php
session_start(); // Start the session to access session variables


// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['Patient_Id'])) {
    // If the session variable 'adminID' is not set, redirect to the login page
    header("Location: ../login.php"); // Replace 'login.php' with the path to your login page
    exit(); // Stop further script execution
}

include("connection.php");

// Fetch the admin details from the database
$Patient_Id = $_SESSION['Patient_Id'];
$sql = "SELECT * FROM patient_table WHERE Patient_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $Patient_Id); // Bind the session admin ID as a string
$stmt->execute();
$result = $stmt->get_result();

// Check if the query returned a result
if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
    $first_name = $admin['FirstName'];
    $middle_name = $admin['MiddleName'];
    $last_name = $admin['LastName'];
    $gender = $admin['Gender'];
    $dob = $admin['DateOfBirth'];
    $fullname = $first_name .' '. $last_name;

} else {
    // If no result is found, handle the error (e.g., redirect or show an error message)
    header("Location: ../login.php");
    exit();
}

// Close the statement and connection

  $query_counselor = ("SELECT * FROM counselor_table");
 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guidance</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
<!-- Include DataTables CSS & Bootstrap -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">




  </head>
  <body>


  <style>
    .sidebar .nav .nav-item.active > .nav-link i{
      color: red;
    }

    .sidebar .nav .nav-item.active > .nav-link .menu-title{
      color: red;
    }
      .registration{
        color: red;
      }
    .content-wrapper{
      background: #fb8f8370;
    }

    div.dataTables_wrapper div.dataTables_length select {
    width: 50px;
    display: inline-block;
}

  </style>
