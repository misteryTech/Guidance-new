<?php
include("header.php");
include("connection.php");

// Get the Patient ID from the URL
$Appointment_Id = isset($_GET['Appointment_Id']) ? $_GET['Appointment_Id'] : null;

if ($Appointment_Id) {
    $sql = "
        SELECT 
        APT.*, PT.*
            
        FROM appointments AS APT
        INNER JOIN patient_table AS PT ON PT.Patient_Id = APT.Patient_Id
        WHERE APT.Appointment_Id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Appointment_Id);
    $stmt->execute();
    $result = $stmt->get_result();
    $patient = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "<p class='text-danger'>Invalid Patient ID.</p>";
    exit;
}

$conn->close();
?>

<style>
 /* General Styles */
 .row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 10px;
        box-sizing: border-box;
    }
    .clearfix {
        clear: both;
    }

    /* Print-Specific Styles */
    @media print {
        body {
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        .btn, .sidebar, .top-navigation, footer {
            display: none !important;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 5px;
        }
        hr {
            margin: 10px 0;
            border: 0.5px solid #ccc;
        }
    }
</style>

<div class="container-scroller">
    <?php include("top-navigation.php"); ?>
    <div class="container-fluid page-body-wrapper">
        <?php include("sidebar.php"); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">



                <div class="card">
    <div class="card-body print-container" id="printSection">
        <!-- Logo Section (Centered) -->
        <div class="text-center">
         
            <!-- Title Section -->
            <h1 class="card-title" style="font-size: 35px; margin-bottom: 20px;">Student Session</h1>
        </div>
  <!-- Description Section -->
                  <hr>

                  <?php
                    // Check if there's a session message for registration success or error
                    $status = isset($_SESSION['update_status']) ? $_SESSION['update_status'] : '';
                    $message = isset($_SESSION['update_message']) ? $_SESSION['update_message'] : '';

                    // Clear the session variables after displaying the message (if needed)
                    unset($_SESSION['update_status']);
                    unset($_SESSION['update_message']);
                    ?>


       
        <h1>Student Information</h1>
        <?php if ($status && $message): ?>
        <div class="alert alert-<?php echo $status; ?> alert-dismissible fade show" role="alert">
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
        <?php if ($patient): ?>
            <!-- Two-Column Layout -->
            <div class="row">
                <div class="col-md-6">
                    <h4>Personal Details</h4>
                    <p><strong>Patient ID:</strong> <?= htmlspecialchars($patient['Patient_Id']); ?></p>
                    <p><strong>Full Name:</strong> <?= htmlspecialchars($patient['FirstName'] . " " . $patient['LastName']); ?></p>
               
                </div>
                <div class="col-md-6">
                    <h4>Contact Information</h4>
                    <p><strong>Email:</strong> <?= htmlspecialchars($patient['Email']); ?></p>
                    <p><strong>Contact Number:</strong> <?= htmlspecialchars($patient['PhoneNumber']); ?></p>
             
                </div>
            </div>

            <hr>

            <form action="process/update-session.php" method="POST">
            <div class="row">

            <h1>Appointment</h1>
                <input type="hidden" name="appointment_Id" value="<?= htmlspecialchars($patient['Appointment_Id'] ); ?>" >
                <div class="col-md-6">
   
                    <p><strong>Reason for Appointment:</strong> <?= htmlspecialchars($patient['Reason_for_Appointment']); ?></p>
                    <p><strong>Appointment Time:</strong> <?= htmlspecialchars($patient['Appointment_Time']); ?></p>
                    
                </div>

                <div class="col-md-6">

                   <p><strong>Treatment:</strong> <?= htmlspecialchars($patient['Treatment']); ?></p>
                   <p><strong>Appointment Date:</strong> <?= htmlspecialchars($patient['Appointment_Date']); ?></p>
                </div>

               
            </div>

            <hr>
            <div class="row">
    <div class="col-md-12 mb-5">
        <p><strong>Diagnosed:</strong></p>
        <textarea class="form-control" name="diagnosed" id="diagnosed" rows="4"><?= isset($patient['Diagnosed']) && !empty($patient['Diagnosed']) ? htmlspecialchars($patient['Diagnosed']) : ''; ?></textarea>   
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p><strong>Referral:</strong></p>
        <textarea class="form-control" name="referral" id="referral" rows="4"><?= isset($patient['Referral']) && !empty($patient['Referral']) ? htmlspecialchars($patient['Referral']) : ''; ?></textarea>   
    </div>
</div>


            <div class="clearfix"></div>
        <?php else: ?>
            <p class="text-danger text-center">No profile found for this patient.</p>
        <?php endif; ?>

          <!-- Print Button -->
            <div class="text-center mt-4">
                         
                            <input type="submit" class="btn btn-success" value="Submit">
            </div>

            </form>
    </div>
</div>

                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
</div>

