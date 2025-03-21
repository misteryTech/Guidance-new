<?php
    include("header.php");
?>
    <div class="container-scroller">


<?php

  // include("banner.php");
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
                      $query_total_request = "SELECT COUNT(*) AS total_request FROM appointments  WHERE Counselor_Id = '$counselor_id'";
                      $result_request  = mysqli_query($conn, $query_total_request);

                    $totalAppointmentRequest = 0 ;
                    if($result_request && $row = mysqli_fetch_assoc($result_request)){
                      $totalRequest = $row['total_request'];
                    }
                    ?>

                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Request<i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?= $totalRequest; ?> </h2>
                   
                  </div>
                </div>
              </div>


              <div class="col-md-4 stretch-card grid-margin">
                     <div class="card bg-gradient-info card-img-holder text-white">
                             <div class="card-body">

                                 <!-- Month Selection Dropdown -->
                                 <label for="monthFilter">Select Month:</label>
                                 <select id="monthFilter" class="form-control">
                                     <option value="<?= date('m') ?>" selected>This Month</option>
                                     <?php 
                                     for ($m = 1; $m <= 12; $m++) {
                                         $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                         echo "<option value='$m'>$monthName</option>";
                                     }
                                     ?>
                                 </select>
                                   
                                 <?php
                                     // Default query for the current month
                                     $currentMonth = date('m');
                                     $query_total_student_request = "
                                     SELECT COUNT(*) AS total_student_request 
                                     FROM appointments 
                                     WHERE MONTH(Appointment_Date) = '$currentMonth' 
                                         AND YEAR(Appointment_Date) = YEAR(NOW()) 
                                         AND Counselor_Id = '$counselor_id';
                                     ";
                                   
                                     $result_total_student = mysqli_query($conn, $query_total_student_request);
                                     $totalStudentRequest = 0;
                                   
                                     if ($result_total_student && $row_request = mysqli_fetch_assoc($result_total_student)) {
                                         $totalStudentRequest = $row_request['total_student_request'];
                                     }
                                 ?>

                                 <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                 <h4 class="font-weight-normal mb-3">This Month Request <i class="mdi mdi-calendar mdi-24px float-end"></i></h4>
                                 <h2 class="mb-5" id="thisMonthRequest"><?= $totalStudentRequest; ?></h2>
                                   
                             </div>
                         </div>
                                   
                     </div>



              
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">

                  <?php
                        $query_student = "SELECT COUNT(*) as total_student FROM patient_table";
                        $result_student = mysqli_query($conn, $query_student);

                        $totalStudent = 0;
                        if($result_student  && $row_student = mysqli_fetch_assoc($result_student)){
                          $totalStudent = $row_student['total_student'];
                        }

                  ?>
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Student Registered<i class="fa fa-user mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?= $totalStudent; ?></h2>
                 
                  </div>
                </div>
              </div>
            </div>
   
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Request</h4>
                    <div class="table-responsive">
                    <?php



                    $query_appointments = "
                        SELECT 
                            a.Patient_Id, 
                            a.Reason_for_Appointment, 
                            a.Status, 
                            a.Treatment,
                            a.Appointment_Date,
                            a.Appointment_Id
                        FROM 
                            appointments a
                        WHERE 
                            a.Counselor_Id = '$counselor_id' AND status= 'Request'
                    ";

                    $result_appointments = mysqli_query($conn, $query_appointments);
                    ?>

                    <table class="table" id="student_request_table">
    <thead>
        <tr>
            <th>Student</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Treatment</th>
            <th>Date Appointment</th>
            <th>Action</th>
        
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result_appointments && mysqli_num_rows($result_appointments) > 0) {
            // Fetch and display each appointment
            while ($row = mysqli_fetch_assoc($result_appointments)) {
                ?>
                <tr>
                    <td>
                        <img src="../GFI-LOGO.png" class="me-2" alt="image"> 
                        <?php echo htmlspecialchars($row['Patient_Id']); ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['Reason_for_Appointment']); ?></td>
                    <td>
                        <label class="badge badge-gradient-<?php echo $row['Status'] === 'Request' ? 'warning' : 'success'; ?>">
                            <?php echo htmlspecialchars($row['Status']); ?>
                        </label>
                    </td>
                    <td><?php echo htmlspecialchars($row['Treatment']); ?></td>
                    <td><?php echo htmlspecialchars($row['Appointment_Date']); ?></td>
                    <td>
                                                    <a href="session-page.php?Appointment_Id=<?= htmlspecialchars($row['Appointment_Id']); ?>" 
                                                       class="btn btn-outline-success btn-icon-text">
                                                        <i class="mdi mdi-account-details btn-icon-prepend"></i> Session
                                                    </a>
                                                </td>
                </tr>
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

  <script>
    $(document).ready(function () {
    $("#monthFilter").change(function () {
        var selectedMonth = $(this).val();
        
        $.ajax({
            url: "fetch/fetch_requests.php", // PHP file to fetch data
            type: "POST",
            data: { selectedMonth: selectedMonth },
            success: function (response) {
                $("#thisMonthRequest").text(response); // Update the count dynamically
            }
        });
    });
});

  </script>