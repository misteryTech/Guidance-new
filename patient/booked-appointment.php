<?php
include "header.php"; ?>
    <div class="container-scroller">


<?php
include "banner.php";
include "top-navigation.php";
?>

     
   
      <div class="container-fluid page-body-wrapper">
 
      <?php include "sidebar.php"; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Set  Appointment
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>

            <?php if (isset($_SESSION["registration_status"]) && isset($_SESSION["registration_message"])): ?>
            <div class="alert alert-<?php echo $_SESSION["registration_status"] === "success" ? "success" : "danger"; ?>" role="alert">
                <?php echo $_SESSION["registration_message"]; ?>
            </div>
            <?php unset($_SESSION["registration_status"]); unset($_SESSION["registration_message"]); ?>
        <?php endif; ?>

        
        
            <div class="row">
  <div class="col-lg-7 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Set an Appointment </h4>

        <?php
        // Check if there's a session message for registration success or error
        $status = isset($_SESSION["registration_status"])
            ? $_SESSION["registration_status"]
            : "";
        $message = isset($_SESSION["registration_message"])
            ? $_SESSION["registration_message"]
            : "";

        // Clear the session variables after displaying the message (if needed)
        unset($_SESSION["registration_status"]);
        unset($_SESSION["registration_message"]);
        ?>
        <form method="POST" action="process/submit_appointment.php" class="form-sample">
          <p class="card-description">Please fill in the details below</p>
            <div class="row">
             <?php
        // Fetch counselors from the database
               $query_counselor = "SELECT * FROM counselor_table";
               $result_counselor = mysqli_query($conn, $query_counselor);
             ?>
                 <div class="col-md-12">
                     <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Preferred Counselor Name:</label>
                         <div class="col-sm-9">
                             <select class="form-select" name="counselor_id">
                                 <option value="" disabled selected>Select Counselor</option>
                                 <?php if (
                                     $result_counselor &&
                                     mysqli_num_rows($result_counselor) > 0
                                 ) {
                                     while (
                                         $row = mysqli_fetch_assoc($result_counselor)
                                     ) {
                                         echo '<option value="' .
                                             htmlspecialchars($row["Counselor_Id"]) .
                                             '">' .
                                             htmlspecialchars(
                                                 $row["FirstName"] .
                                                     " " .
                                                     $row["LastName"] .
                                                     " - " .
                                                     $row["Gender"] 
                                             ) .
                                             "</option>";
                                     }
                                 } else {
                                     echo '<option value="" disabled>No Counselors Available</option>';
                                 } ?>
                             </select>
                         </div>
                     </div>
                 </div>
             </div>

    <!-- Appointment Details -->
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Preferred Appointment Time:</label>
                          <div class="col-sm-9">
                              <input type="time" class="form-control" name="appointment_time" required />
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Preferred Appointment Date:</label>
                          <div class="col-sm-9">
                              <input type="date" class="form-control" name="appointment_date" required />
                          </div>
                      </div>
                  </div>
              </div>

    <!-- Reason for Appointment -->
               <div class="row">
                   <div class="col-md-12">
                       <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Reason for Appointment:</label>
                           <div class="col-sm-9">
                               <input type="text" class="form-control" name="reason_for_appointment" placeholder="Enter reason" required />
                           </div>
                       </div>
                       <div class="form-group row">
                       <label class="col-sm-3 col-form-label">Appointment Type:</label>
                    <div class="col-sm-9">
                      <select class="form-select" name="appointment_type" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="Solo">Solo</option>
                        <option value="Group">Group</option>
                      </select>
                    </div>
                       </div>

               </div>
           </div>

    <!-- Submit Button -->
        <div class="row">
            <div class="col-md-8">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
      </form>

      </div>
    </div>
  </div>




  <div class="col-lg-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Booking Logs</h4>
       
        <table class="table table-hover" id="counselor_transaction">
    <thead>
        <tr>
            <th>Counselor Name</th>
            <th>Appointment Date</th>
         
        </tr>
    </thead>
    <tbody>
        <?php
        include("connection.php"); // Ensure your database connection is included

        // Fetch appointments and counselor names from the database
        $query_appointment = "
            SELECT A.Appointment_Date, A.Status, 
                   CONCAT(CT.FirstName, ' ', CT.LastName) AS CounselorFullName
            FROM appointments AS A
            INNER JOIN counselor_table AS CT 
            ON A.Counselor_Id = CT.Counselor_Id 
            WHERE Patient_Id = $Patient_Id
            "; // Join appointments with counselors
        
        $result = mysqli_query($conn, $query_appointment);

        // Check if any results are returned
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Extract and format data for each row
                $counselorName = htmlspecialchars($row['CounselorFullName']); // Full counselor name
                $appointmentDate = date('F j, Y', strtotime($row['Appointment_Date'])); // Format the date
                $statuss = htmlspecialchars($row['Status']); // Status

                // Display data in the table row
                echo "<tr>";
                echo "<td>{$counselorName}</td>";
                echo "<td>{$appointmentDate}</td>";
               
                echo "</tr>";
            }
        } else {
            // Show a message if no appointments are found
            echo "<tr><td colspan='3'>No appointments found.</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </tbody>
</table>


                                 
      </div>
    </div>
  </div>

</div>
      <!-- Modal for Registration Status -->
      <div class="modal" tabindex="-1" id="registrationModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <?php echo $status === "success"
              ? "Registration Success"
              : "Registration Error"; ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          <?php if ($status === "success") {
              echo $message; // Show success message
          } else {
              echo $message; // Show error message
          } ?>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
  <?php include "footer.php"; ?>

  <script>
      <?php if ($status !== ""): ?>
    $('#registrationModal').modal('show');
  <?php endif; ?>

  </script>