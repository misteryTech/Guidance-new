<?php
    include("header.php");
?>
    <div class="container-scroller">


<?php
  include("banner.php");
  include("top-navigation.php");

?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
 
      <?php
        include("sidebar.php");
      ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">

                  <?php 
                    $query_total_students = "SELECT COUNT(*) AS total_students FROM  patient_table"; 

                    $total_student = mysqli_query($conn, $query_total_students);


                    $totalStudentTotal = 0;
                    if($total_student && $row = mysqli_fetch_assoc($total_student)){
                      $totalStudent = $row['total_students'];
                    }

                  ?>
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Students Registered <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?=  $totalStudent; ?></h2>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">

                  <?php
                        $query_total_counselor = "SELECT COUNT(*) AS total_counselor FROM counselor_table";
                        $total_counselor = mysqli_query($conn, $query_total_counselor);

                        if($total_counselor && $row_counselor = mysqli_fetch_assoc($total_counselor)){
                          $totalCounselor = $row_counselor['total_counselor'];
                        }
                  ?>
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Registered Counselor <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?= $totalCounselor; ?></h2>
          
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">

                  <?php
                  $query_total_request = "SELECT COUNT(*) AS total_incident FROM incident_reports";
                  $total_request = mysqli_query($conn, $query_total_request);

                  $totalIncident = 0;
                  if($total_request && $row_incident_report= mysqli_fetch_assoc($total_request)){
                        $totalIncident = $row_incident_report['total_incident'];
                  }

                  ?>
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Incident Report<i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?= $totalIncident; ?></h2>
          
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Incident Report</h4>
                    <div class="table-responsive">
                    <?php


// Query to fetch appointments for the specific counselor
$query_appointments = "
    SELECT A.*
    FROM 
        incident_reports AS A

";

$result_appointments = mysqli_query($conn, $query_appointments);
?>


<table class="table" id="incident_table">
    <thead>
        <tr>
              
            <th>Incident Report</th>
            <th>Incident Location</th>
            <th>Date</th>
            <th>Witnesses</th>

           
        
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result_appointments && mysqli_num_rows($result_appointments) > 0) {
            // Fetch and display each appointment
            while ($row = mysqli_fetch_assoc($result_appointments)) {
                ?>
                <tr>
                  
                    <td><?php echo htmlspecialchars($row['incident_description']); ?></td>
                    <td><?php echo htmlspecialchars($row['incident_location']); ?></td>
                 
                    <td><?php echo htmlspecialchars($row['incident_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['witnesses']); ?></td>
          
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">No appointments request for this counselor.</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
  <?php
  include("footer.php");
  ?>