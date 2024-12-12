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
      

        // SQL query to count all appointments
        $count_request = "SELECT COUNT(*) AS total_appointments FROM appointments WHERE Patient_id = $Patient_Id";
        $result = mysqli_query($conn, $count_request);

        // Fetch the count from the result
        $totalAppointments = 0; // Default value
        if ($result && $row = mysqli_fetch_assoc($result)) {
            $totalAppointments = $row['total_appointments']; // Extract the count
        }

        ?>
        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Request Appointment
            <i class="mdi mdi-chart-line mdi-24px float-end"></i>
        </h4>
        <h2 class="mb-5"><?= $totalAppointments ?></h2>

    </div>
</div>




              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">


                  <?php
                      $count_approved_served = "SELECT COUNT(*) AS total_serve FROM appointments WHERE Patient_id = '123123' AND Status='Serve' ";
                      $result_count_serve = mysqli_query($conn, $count_approved_served);

                      $totalApprovedServe = 0;
                      if ($result_count_serve && $row_serve= mysqli_fetch_assoc($result_count_serve)){
                        $totalApprovedServe = $row_serve['total_serve'];
                      }

                  ?>
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointment Served<i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?= $totalApprovedServe ?></h2>
                  
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">

                      <?php
                          $count_counselor = "SELECT COUNT(*) AS total_counselor FROM counselor_table";
                          $result_counselor_count = mysqli_query($conn, $count_counselor);

                          $totalCounselor = 0;
                          if($result_counselor_count && $row_counselor = mysqli_fetch_assoc($result_counselor_count)){
                            $totalCounselor = $row_counselor['total_counselor'];
                          }

                      ?>
      
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Counselors<i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?= $totalCounselor ?></h2>
                  
                  </div>
                </div>
              </div>
            </div>
       
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Tickets</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Assignee </th>
                            <th> Subject </th>
                            <th> Status </th>
                            <th> Last Update </th>
                            <th> Tracking ID </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> David Grey
                            </td>
                            <td> Fund is not recieved </td>
                            <td>
                              <label class="badge badge-gradient-success">DONE</label>
                            </td>
                            <td> Dec 5, 2017 </td>
                            <td> WD-12345 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face2.jpg" class="me-2" alt="image"> Stella Johnson
                            </td>
                            <td> High loading time </td>
                            <td>
                              <label class="badge badge-gradient-warning">PROGRESS</label>
                            </td>
                            <td> Dec 12, 2017 </td>
                            <td> WD-12346 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face3.jpg" class="me-2" alt="image"> Marina Michel
                            </td>
                            <td> Website down for one week </td>
                            <td>
                              <label class="badge badge-gradient-info">ON HOLD</label>
                            </td>
                            <td> Dec 16, 2017 </td>
                            <td> WD-12347 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face4.jpg" class="me-2" alt="image"> John Doe
                            </td>
                            <td> Loosing control on server </td>
                            <td>
                              <label class="badge badge-gradient-danger">REJECTED</label>
                            </td>
                            <td> Dec 3, 2017 </td>
                            <td> WD-12348 </td>
                          </tr>
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