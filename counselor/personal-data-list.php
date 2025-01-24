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
                    <h4 class="card-title">Student Personal Data Sheet</h4>
                    <p class="card-description"> List of <code>Registered Student</code></p>

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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Student ID </th>
                                <th> Full Name </th>
                                <th> Email </th>
                                <th> Gender </th>
                                <th> Username </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include database connection
                            include("connection.php");

                            // Fetch registered Patients from the database
                            $sql = "
                            SELECT 
                                pt.Patient_Id, 
                                pt.FirstName, 
                                pt.LastName, 
                                pt.Email, 
                                pt.Gender, 
                                pt.Username

                            FROM patient_table AS pt
                            LEFT JOIN pds_table AS pds ON pt.Patient_Id = pds.Patient_Id
                            WHERE pt.Archive = 'No'
                        ";
                            $result = $conn->query($sql);

                            // Check if there are records
                            if ($result->num_rows > 0) {
                                // Loop through each record and display it in the table
                                while ($row = $result->fetch_assoc()) {
                                    $Patient_Id = htmlspecialchars($row['Patient_Id']);
                                    $full_name = htmlspecialchars($row['FirstName'] . " " . $row['LastName']);
                                    $email = htmlspecialchars($row['Email']);
                                    $gender = htmlspecialchars($row['Gender']);
                                    $username = htmlspecialchars($row['Username']);
                                    ?>
                                    <tr>
                                        <td><?php echo $Patient_Id; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                                    <a href="view-profile.php?Patient_Id=<?= htmlspecialchars($row['Patient_Id']); ?>" 
                                                       class="btn btn-outline-info btn-icon-text">
                                                        <i class="mdi mdi-account-details btn-icon-prepend"></i> View Profile
                                                    </a>
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

    <!-- Archive Modal -->
    <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="archiveForm" method="post" action="process/archive-patient.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="archiveModalLabel">Archive Student</h5>
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
