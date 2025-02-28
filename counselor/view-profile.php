<?php
include("header.php");
include("connection.php");

// Get the Patient ID from the URL
$patientId = isset($_GET['Patient_Id']) ? $_GET['Patient_Id'] : null;

if ($patientId) {
    $sql = "
        SELECT 
            pt.*,pds.*
            
        FROM patient_table AS pt
        LEFT JOIN pds_table AS pds ON pt.Patient_Id = pds.student_id
        WHERE pt.Patient_Id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $patientId);
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
            <img src="../GFI-LOGO.png" alt="Logo" style="width: 150px; height: auto; margin-bottom: 15px;">
            <!-- Title Section -->
            <h1 class="card-title" style="font-size: 35px; margin-bottom: 20px;">Student Personal Data Sheet</h1>
            <h3 class="card-title" style="font-size: 20px; margin-bottom: 20px;">GENSANTOS FOUNDATION COLLEGE,INC.
            Bulaong Extension, General Santos City</h3>

           


        </div>
  <!-- Description Section -->
             <p style="font-size: 16px; line-height: 1.5; font-style: italic; margin-bottom: 30px;">
            This Student's Personal Data consists of questions regarding you and your family. 
            The purpose of this is for us to know you better and to help you with problems/difficulties 
            that you may encounter along the course of your stay in Gensantos Foundation College Inc.
            Please answer the entire question honestly and accurately. Thank you.
            </p>
        <hr>

        <h1>Personal Information</h1>
        <?php if ($patient): ?>
            <!-- Two-Column Layout -->
            <div class="row">
                <div class="col-md-6">
                    <h4>Personal Details</h4>
                    <p><strong>Student ID:</strong> <?= htmlspecialchars($patient['Patient_Id']); ?></p>
                    <p><strong>Full Name:</strong> <?= htmlspecialchars($patient['FirstName'] . " " . $patient['LastName']); ?></p>
                    <p><strong>Date of Birth:</strong> <?= htmlspecialchars($patient['DateOfBirth']); ?></p>
                    <p><strong>Gender:</strong> <?= htmlspecialchars($patient['Gender']); ?></p>
                </div>
                <div class="col-md-6">
                    <h4>Contact Information</h4>
                    <p><strong>Email:</strong> <?= htmlspecialchars($patient['Email']); ?></p>
                    <p><strong>Contact Number:</strong> <?= htmlspecialchars($patient['PhoneNumber']); ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($patient['Username']); ?></p>
                    <p><strong>Address:</strong> <?= htmlspecialchars($patient['Address']); ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
   
                    <p><strong>Civil Status:</strong> <?= htmlspecialchars($patient['civil_status']); ?></p>
                    <p><strong>Religion:</strong> <?= htmlspecialchars($patient['religion']); ?></p>
                    <p><strong>Languages/Dialect Spoken:</strong> <?= htmlspecialchars($patient['language_spoken']); ?></p>
                    <p><strong>Number of Siblings:</strong> <?= htmlspecialchars($patient['number_of_siblings']); ?></p>
                </div>
                <div class="col-md-6">
          
                    <p><strong>If Solo Parent, how many children do you have?:</strong> <?= htmlspecialchars($patient['solo_parent_children']); ?></p>
                    <p><strong>Tribe:</strong> <?= htmlspecialchars($patient['tribe']); ?></p>
                    <p><strong>If belonging to IP, please specify:</strong> <?= htmlspecialchars($patient['ip_belonging']); ?></p>
                    <p><strong>Birth Order:</strong> <?= htmlspecialchars($patient['birth_order']); ?></p>
                </div>
            </div>

            <hr>
    
            <h4>For Students not officially RESIDENT OF GENERAL SANTOS CITY</h4>
            <br>
            <div class="row">
                <div class="col-md-6">
            
                    <p><strong>Where did you stay here in General Santos City:</strong> <?= htmlspecialchars($patient['stay_in_gensan']); ?></p>
                    <p><strong>Contact No.:</strong> <?= htmlspecialchars($patient['contact_number']); ?></p>
                </div>
                  
                <div class="col-md-6">
                  
                    <p><strong>Name of Landlord/Landlady/Employer:</strong> <?= htmlspecialchars($patient['landlord_name']); ?></p>
             
                </div>
            </div>

            <hr>
            <h1>Family History</h1>
            <br>
            <div class="row">
                <div class="col-md-6">
            
                    <p><strong>Where did you stay here in General Santos City:</strong> <?= htmlspecialchars($patient['stay_in_gensan']); ?></p>
                    <p><strong>Contact No.:</strong> <?= htmlspecialchars($patient['contact_number']); ?></p>
                </div>
                  
                <div class="col-md-6">
                  
                    <p><strong>Name of Landlord/Landlady/Employer:</strong> <?= htmlspecialchars($patient['landlord_name']); ?></p>
             
                </div>
            </div>

            <div class="clearfix"></div>
        <?php else: ?>
            <p class="text-danger text-center">No profile found for this patient.</p>
        <?php endif; ?>

          <!-- Print Button -->
            <div class="text-center mt-4">
                            <button class="btn btn-primary" onclick="printPDS()">Print</button>
            </div>


    </div>
</div>

                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
</div>

<script>
   function printPDS() {
        var printContent = document.getElementById('printSection').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
        location.reload(); // Refresh to ensure everything resets correctly
    }
</script>