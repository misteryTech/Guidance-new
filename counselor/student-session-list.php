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
                    <h4 class="card-title">Student Session</h4>
                    <p class="card-description"> List of <code>Sessions</code></p>

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

                    <table class="table table-striped" id="student_session_list">
                        <thead>
                            <tr>
                                <th> Student ID </th>
                                <th> Full Name </th>
                                <th> Reason for Appointment </th>
                                <th> Treatment </th>
                                <th> Diagnosed </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include database connection
                            include("connection.php");

                            // Fetch registered Patients from the database
                            $sql = "SELECT APT.*, S.* 
                                    FROM appointments AS APT
                                    INNER JOIN patient_table AS S ON S.Patient_Id = APT.Patient_Id
                                    WHERE Counselor_Id = '$counselor_id'";
                            $result = $conn->query($sql);

                            // Check if there are records
                            if ($result->num_rows > 0) {
                                // Loop through each record and display it in the table
                                while ($row = $result->fetch_assoc()) {
                                    $Appointment_Id = htmlspecialchars($row['Appointment_Id']);
                                    $Patient_Id = htmlspecialchars($row['Patient_Id']);
                                    $full_name = htmlspecialchars($row['FirstName'] . " " . $row['LastName']);
                                    $Reason_for_Appointment = htmlspecialchars($row['Reason_for_Appointment']);
                                    $Treatment = htmlspecialchars($row['Treatment']);
                                    $Diagnosed = htmlspecialchars($row['Diagnosed']);
                                    $Status = htmlspecialchars($row['Status']);
                                    ?>
                                    <tr>
                                        <td><?php echo $Patient_Id; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $Reason_for_Appointment; ?></td>
                                        <td><?php echo $Treatment; ?></td>
                                        <td><?php echo $Diagnosed; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-icon-text" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailsModal" 
                                                data-appointment-id="<?php echo $Appointment_Id; ?>" 
                                                data-patient-id="<?php echo $Patient_Id; ?>"
                                                data-full-name="<?php echo $full_name; ?>"
                                                data-reason="<?php echo $Reason_for_Appointment; ?>"
                                                data-treatment="<?php echo $Treatment; ?>"
                                                data-diagnosed="<?php echo $Diagnosed; ?>"
                                                data-Status="<?php echo $Status; ?>">
                                                <i class="mdi mdi-eye btn-icon-prepend"></i> View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // If no records are found, display a message
                                echo "<tr><td colspan='6' class='text-center'>No registered Patients found.</td></tr>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Student ID:</strong> <span id="modalPatientId"></span></p>
                    <p><strong>Full Name:</strong> <span id="modalFullName"></span></p>
                    <p><strong>Reason for Appointment:</strong> <span id="modalReason"></span></p>
                    <p><strong>Treatment:</strong> <span id="modalTreatment"></span></p>
                    <p><strong>Diagnosed:</strong> <span id="modalDiagnosed"></span></p>
                    <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- partial:partials/_footer.html -->
    <?php include("footer.php"); ?>
</div>

<script>
    // Populate details modal fields
    var detailsModal = document.getElementById('detailsModal');
    detailsModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        
        // Extract data from button attributes
        var appointmentId = button.getAttribute('data-appointment-id');
        var patientId = button.getAttribute('data-patient-id');
        var fullName = button.getAttribute('data-full-name');
        var reason = button.getAttribute('data-reason');
        var treatment = button.getAttribute('data-treatment');
        var diagnosed = button.getAttribute('data-diagnosed');
        var status = button.getAttribute('data-status');
        
        // Populate modal fields
        document.getElementById('modalPatientId').textContent = patientId;
        document.getElementById('modalFullName').textContent = fullName;
        document.getElementById('modalReason').textContent = reason;
        document.getElementById('modalTreatment').textContent = treatment;
        document.getElementById('modalDiagnosed').textContent = diagnosed;
        document.getElementById('modalStatus').textContent = status;
    });
</script>
