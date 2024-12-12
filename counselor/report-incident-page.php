<?php
    include("header.php");
?>
    <div class="container-scroller">
<?php

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
                </span> Incident Report Form
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
  <div class="col-9 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Incident Form</h4>

        <?php

// Check if there's a session message for registration success or error
$status = isset($_SESSION['registration_status']) ? $_SESSION['registration_status'] : '';
$message = isset($_SESSION['registration_message']) ? $_SESSION['registration_message'] : '';

// Clear the session variables after displaying the message (if needed)
unset($_SESSION['registration_status']);
unset($_SESSION['registration_message']);
  
  ?>



<form method="POST" action="process/submit_incident.php" class="form-sample" enctype="multipart/form-data">
    <p class="card-description">Please fill in the incident details below</p>

    <!-- Incident Date and Time -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date of Incident:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="incident_date" required />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Time of Incident:</label>
                <div class="col-sm-9">
                    <input type="time" class="form-control" name="incident_time" required />
                </div>
            </div>
        </div>
    </div>

    <!-- Incident Location -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Location of Incident:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="incident_location" placeholder="Enter location" required />
                </div>
            </div>
        </div>
    </div>

    <!-- Incident Description -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description of Incident:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="incident_description" rows="4" placeholder="Describe what happened" required></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Parties Involved -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Parties Involved:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="parties_involved" rows="3" placeholder="Enter names and roles of parties involved" required></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Witness Information -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Witnesses (if any):</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="witnesses" rows="3" placeholder="Enter witness names and contact information"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Taken -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Actions Taken (if any):</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="actions_taken" rows="3" placeholder="Describe any immediate actions taken"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Reported By -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Reported By:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="reported_by" placeholder="Enter your name" required />
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Contact Information:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="contact_info" placeholder="Enter your contact details" required />
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Picture Upload -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Upload Picture (Optional):</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="incident_picture" accept="image/*" />
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row">
        <div class="col-md-8">
            <button type="submit" class="btn btn-success">Submit Incident Report</button>
        </div>
    </div>
</form>


      </div>
    </div>
  </div>
</div>




      <!-- Modal for Registration Status -->
      <div class="modal" tabindex="-1" id="reportIncidentModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <?php echo ($status === 'success') ? 'Registration Success' : 'Registration Error'; ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          <?php
          if ($status === 'success') {
            echo $message;  // Show success message
          } else {
            echo $message;  // Show error message
          }
          ?>
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
  <?php
  include("footer.php");
  ?>

  <script>
      <?php if ($status !== ''): ?>
    $('#reportIncidentModal').modal('show');
  <?php endif; ?>

  </script>