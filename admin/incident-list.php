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
                    $status = $_SESSION['update_status'] ?? '';
                    $message = $_SESSION['update_message'] ?? '';
                    unset($_SESSION['update_status'], $_SESSION['update_message']);
                    ?>

                    <?php if ($status && $message): ?>
                    <div class="alert alert-<?php echo $status; ?> alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    
                    <?php
                    $query_appointments = "SELECT *, DATE_FORMAT(incident_date, '%M %d, %Y') AS formatted_date, DATE_FORMAT(incident_time, '%h:%i %p') AS formatted_time FROM incident_reports";
                    $result_appointments = mysqli_query($conn, $query_appointments);
                    ?>
                  
                    <table class="table" id="incident_table_query">
                        <thead>
                            <tr>
                                <th>Incident Report</th>
                                <th>Incident Location</th>
                                <th>Date</th>
                                <th>Witnesses</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result_appointments && mysqli_num_rows($result_appointments) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result_appointments)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['incident_description']); ?></td>
                                        <td><?php echo htmlspecialchars($row['incident_location']); ?></td>
                                        <td><?php echo htmlspecialchars($row['formatted_date']); ?></td>
                                        <td><?php echo htmlspecialchars($row['witnesses']); ?></td>
                                        <td>
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal"
                                                    data-description="<?php echo htmlspecialchars($row['incident_description']); ?>"
                                                    data-location="<?php echo htmlspecialchars($row['incident_location']); ?>"
                                                    data-date="<?php echo htmlspecialchars($row['formatted_date']); ?>"
                                                    data-time="<?php echo htmlspecialchars($row['formatted_time']); ?>"
                                                    data-witnesses="<?php echo htmlspecialchars($row['witnesses']); ?>"
                                                    data-reporter="<?php echo htmlspecialchars($row['reported_by']); ?>"
                                                    data-action-taken="<?php echo htmlspecialchars($row['actions_taken']); ?>"
                                                    data-contact="<?php echo htmlspecialchars($row['contact_info']); ?>">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No incident reports found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Incident Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Incident Description:</strong> <span id="modal-description"></span></p>
                    <p><strong>Location:</strong> <span id="modal-location"></span></p>
                    <p><strong>Date:</strong> <span id="modal-date"></span></p>
                    <p><strong>Time:</strong> <span id="modal-time"></span></p>
                    <p><strong>Witnesses:</strong> <span id="modal-witnesses"></span></p>
                    <p><strong>Reporter:</strong> <span id="modal-reporter"></span></p>
                    <p><strong>Action Taken:</strong> <span id="modal-action"></span></p>
                    <p><strong>Contact Info:</strong> <span id="modal-contact"></span></p>
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
    // Populate view modal fields
    document.getElementById('viewModal').addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        document.getElementById('modal-description').textContent = button.getAttribute('data-description');
        document.getElementById('modal-location').textContent = button.getAttribute('data-location');
        document.getElementById('modal-date').textContent = button.getAttribute('data-date');
        document.getElementById('modal-time').textContent = button.getAttribute('data-time');
        document.getElementById('modal-witnesses').textContent = button.getAttribute('data-witnesses');
        document.getElementById('modal-reporter').textContent = button.getAttribute('data-reporter');
        document.getElementById('modal-action').textContent = button.getAttribute('data-action-taken');
        document.getElementById('modal-contact').textContent = button.getAttribute('data-contact');
    });
</script>
