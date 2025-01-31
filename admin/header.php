<?php
session_start(); // Start the session to access session variables


// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['Admin_Id'])) {
    // If the session variable 'adminID' is not set, redirect to the login page
    header("Location: ../login.php"); // Replace 'login.php' with the path to your login page
    exit(); // Stop further script execution
}

include("connection.php");

// Fetch the admin details from the database
$admin_id = $_SESSION['Admin_Id'];
$sql = "SELECT FirstName, LastName FROM admin_table WHERE Admin_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $admin_id); // Bind the session admin ID as a string
$stmt->execute();
$result = $stmt->get_result();

// Check if the query returned a result
if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
    $first_name = $admin['FirstName'];
    $last_name = $admin['LastName'];
    $fullname = $first_name .' '. $last_name;

} else {
    // If no result is found, handle the error (e.g., redirect or show an error message)
    header("Location: ../login.php");
    exit();
}



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
    <link rel="shortcut icon" href="../GFI-LOGO.png" />


<!-- FullCalendar CSS -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />

<!-- FullCalendar JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
<link href='https://fullcalendar.io/releases/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
<script src='https://fullcalendar.io/releases/fullcalendar/3.10.2/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.10.2/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.10.2/fullcalendar.min.js'></script>


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

  </style>
