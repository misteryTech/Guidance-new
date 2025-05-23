     
     <?php
            $current_page  = basename($_SERVER['PHP_SELF']);
     ?>
     <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="photos/LOGO.png" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $fullname; ?> </span>
                  <span class="text-secondary text-small">Student</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
  
            <li class="nav-item <?= $current_page =='index.php' ? 'active' : ''?>">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item <?= $current_page =='booked-appointment.php' ? 'active' : ''?>">
              <a class="nav-link" href="booked-appointment.php">
                <span class="menu-title">Set Appointment</span>
                <i class="mdi mdi-calendar menu-icon"></i>
              </a>
            </li>
<!-- 
            <li class="nav-item <?= $current_page =='pds_version2.php' ? 'active' : ''?>">
              <a class="nav-link" href="pds_version2.php">
                <span class="menu-title">Version 2</span>
                <i class="mdi mdi-calendar menu-icon"></i>
              </a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#pds" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">PDS Form</span>
                <i class="mdi mdi-notebook menu-icon"></i>
              </a>
              <div class="collapse" id="pds">
                <ul class="nav flex-column sub-menu">
                <?php

$found = false;


$sql = "SELECT * FROM pds_table WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Patient_Id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $found = true;
}

?>

<!-- Dynamic link based on the condition -->
<li class="nav-item">
    <a class="nav-link" href="<?= $found ? 'view-profiles.php' : 'pds_version2.php' ?>">
        <?= $found ? 'View Data Sheet' : 'Create Data Sheet' ?>
    </a>
</li>

                </ul>
              </div>
            </li>

          
          </ul>
        </nav>