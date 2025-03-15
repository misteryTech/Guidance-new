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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Incident Table</h4>
                    <p class="card-description"> List of <code>Incident</code></p>

                    <?php
                    // Check if there's a session message for registration success or error
                    $status = isset($_SESSION['update_status']) ? $_SESSION['update_status'] : '';
                    $message = isset($_SESSION['update_message']) ? $_SESSION['update_message'] : '';

                    // Clear the session variables after displaying the message (if needed)
                    unset($_SESSION['update_status']);
                    unset($_SESSION['update_message']);
                    ?>

                    <?php if ($status && $message): ?>
                    <div class="alert alert-<?php echo $status; ?> alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <?php


// Query to fetch appointments for the specific counselor
$query_appointments = "
    SELECT A.*
    FROM 
        incident_reports AS A

";

$result_appointments = mysqli_query($conn, $query_appointments);
?>
                 
<table class="table">
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

    <!-- Archive Modal -->
    <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="archiveForm" method="post" action="process/archive-patient.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="archiveModalLabel">Archive Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to archive this Student?</p>
                        <input type="hidden" id="archivePatientId" name="Patient_Id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Archive</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- partial:partials/_footer.html -->
    <?php include("footer.php"); ?>
</div>

<script>
    // Populate archive modal fields
    var archiveModal = document.getElementById('archiveModal');
    archiveModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        document.getElementById('archivePatientId').value = button.getAttribute('data-patient-id');
    });
</script>
