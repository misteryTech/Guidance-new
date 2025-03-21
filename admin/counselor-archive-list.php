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
                    <h4 class="card-title">Counselor Table</h4>
                    <p class="card-description"> List of <code>Archived Counselors</code></p>

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

                    <table class="table table-striped" id="c_archive_table">
                        <thead>
                            <tr>
                                <th> Counselor ID </th>
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

                            // Fetch registered Counselors from the database
                            $sql = "SELECT Counselor_Id, FirstName, LastName, Email, Gender, Username FROM counselor_table WHERE Archive = 'Yes'";
                            $result = $conn->query($sql);

                            // Check if there are records
                            if ($result->num_rows > 0) {
                                // Loop through each record and display it in the table
                                while ($row = $result->fetch_assoc()) {
                                    $counselor_id = htmlspecialchars($row['Counselor_Id']);
                                    $full_name = htmlspecialchars($row['FirstName'] . " " . $row['LastName']);
                                    $email = htmlspecialchars($row['Email']);
                                    $gender = htmlspecialchars($row['Gender']);
                                    $username = htmlspecialchars($row['Username']);
                                    ?>
                                    <tr>
                                        <td><?php echo $counselor_id; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <button type="button"  class="btn btn-gradient-success btn-icon-text"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#archiveModal" 
                                                data-counselor-id="<?php echo $counselor_id; ?>">
                                                <i class="mdi mdi-file-check btn-icon-append"></i> Restore
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // If no records are found, display a message
                                echo "<tr><td colspan='6' class='text-center'>No Archive Counselors found.</td></tr>";
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
                <form id="archiveForm" method="post" action="process/counselor-unarchive.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="archiveModalLabel">Restore Counselor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to restore this Counselor?</p>
                        <input type="hidden" id="archivecounselorId" name="counselor_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Restore</button>
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
        document.getElementById('archivecounselorId').value = button.getAttribute('data-counselor-id');
    });
</script>
