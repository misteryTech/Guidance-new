<?php
include("connection.php");

// Get the Patient ID from the URL
$patientId = isset($_GET['Patient_Id']) ? $_GET['Patient_Id'] : null;

if ($patientId) {
    $sql = "
        SELECT 
            pt.*,
            pds.religion AS student_religion,
            pds.tribe AS student_tribe,
            pt.email AS student_email,
            pds.*,
            PI.*,
            PI.religion AS parents_religion,
            PI.tribe AS parents_tribe,
            PI.email AS parents_email
        FROM patient_table AS pt
        LEFT JOIN pds_table AS pds ON pt.Patient_Id = pds.student_id
        INNER JOIN parents_info AS PI ON PI.student_id = pds.id
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


?>

    
<style>

.text-center {
        text-align: center !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        width: 100% !important;
    }

    .text-center img {
        display: block;
        margin: 0 auto;
    }

    .text-center h1, 
    .text-center h3, 
    .text-center p {
        text-align: center !important;
        margin: 0 auto !important;
        width: 100% !important;
    }
    .card {
    width: 8.5in; /* Standard bond paper width */

    margin: auto;
    padding: 20px;
    border: 2px solid #000;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.1);
    }

    .container-fluid{
        padding: 20px; /* Adds padding inside the container */
    }


    .column {
        flex: 1; /* Makes columns equal width */
        min-width: 300px; /* Prevents extreme compression */
    }

    .column h4 {
        margin-bottom: 15px; /* Adds spacing below headings */
    }

    .column p {
        margin-bottom: 10px; /* Adds spacing between details */
        line-height: 1.6; /* Increases readability */
    }
    .col-md-6 {
        width: 50% !important;
        box-sizing: border-box !important;
    }

    


    
@media print {
    body {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    .row {
        display: flex !important;
        flex-wrap: wrap !important;
    }
    .col-md-6 {
        width: 50% !important;
        box-sizing: border-box !important;
    }

    .print-container {
        width: 8.5in !important;
        height: 13in !important;
        margin: auto !important;
        padding: 20px !important;
        border: 2px solid #000 !important;
        box-shadow: none !important;
    }

   
    .print-button {
        display: none !important; /* Hide the button when printing */
    }

}

.row {
    display: flex;
    flex-wrap: wrap;
}
</style>

<div class="container-scroller">
  
    <div class="container-fluid page-body-wrapper">

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    
                    <div class="card-body print-container" id="printSection">
                        
                        <div class="text-center">
                            <img src="../GFI-LOGO.png" alt="Logo" style="width: 150px; height: auto; margin-bottom: 15px;">
                            <h1 class="card-title" style="font-size: 35px; margin-bottom: 20px;">Student Personal Data Sheet</h1>
                            <h3 class="card-title" style="font-size: 20px; margin-bottom: 20px;">GENSANTOS FOUNDATION COLLEGE, INC.<br>Bulaong Extension, General Santos City</h3>
                        </div>
                        
                        <p style="font-size: 16px; line-height: 1.5; font-style: italic; margin-bottom: 30px;">
                            This Student's Personal Data consists of questions regarding you and your family. 
                            The purpose of this is for us to know you better and to help you with problems/difficulties 
                            that you may encounter along the course of your stay in Gensantos Foundation College Inc.
                            Please answer the entire question honestly and accurately. Thank you.
                        </p>
                        <hr>

                        <h1>Personal Information</h1>
                        <div class=" mt-2">
                                <button  class="btn print-button btn-primary" onclick="printSection()">Print</button> 
                                <button  class="btn print-button btn-primary" onclick="printSection()">Back to Dashboard</button> 
                            </div>
                        <?php if ($patient): ?>
                            <div class="container-fluid">
                                <div class="row g-4"> <!-- Added gap for better spacing -->
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Personal Details</h4>
                                        <p><strong>Student ID:</strong> <?= htmlspecialchars($patient['Patient_Id']); ?></p>
                                        <p><strong>Full Name:</strong> <?= htmlspecialchars($patient['FirstName'] . " " . $patient['LastName']); ?></p>
                                        <p><strong>Date of Birth:</strong> <?= htmlspecialchars($patient['DateOfBirth']); ?></p>
                                        <p><strong>Gender:</strong> <?= htmlspecialchars($patient['Gender']); ?></p>
                                        <p><strong>Birth Address:</strong> <?= htmlspecialchars($patient['birth_address']); ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="mb-3">Contact Information</h4>
                                        <p><strong>Email:</strong> <?= htmlspecialchars($patient['student_email'] ?? 'N/A'); ?></p>
                                        <p><strong>Contact Number:</strong> <?= htmlspecialchars($patient['PhoneNumber']); ?></p>
                                        <p><strong>Age:</strong> <?= htmlspecialchars($patient['age']); ?></p>
                                        <p><strong>Username:</strong> <?= htmlspecialchars($patient['Username']); ?></p>
                                        <p><strong>Address:</strong> <?= htmlspecialchars($patient['Address']); ?></p>
                                    </div>
                                </div>




                                <div class="row">
                                      <div class="col-md-6">
                            
                                          <p><strong>Civil Status:</strong> <?= htmlspecialchars($patient['civil_status']); ?></p>
                                          <p><strong>Religion:</strong> <?= htmlspecialchars($patient['student_religion']); ?></p>
                                          <p><strong>Languages/Dialect Spoken:</strong> <?= htmlspecialchars($patient['language_spoken']); ?></p>

                                      </div>
                                      <div class="col-md-6">

                                          <p><strong>If Solo Parent, how many children do you have?:</strong> <?= htmlspecialchars($patient['solo_parent_children']); ?></p>
                                          <p><strong>Tribe:</strong> <?= htmlspecialchars($patient['student_tribe']); ?></p>
                                          <p><strong>If belonging to IP, please specify:</strong> <?= htmlspecialchars($patient['ip_belongin']); ?></p>
                                          <p><strong>Birth Order:</strong> <?= htmlspecialchars($patient['birth_order']); ?></p>
                                      </div>
                                </div>

                                <hr>
                                <h4>For Students not officially RESIDENT OF GENERAL SANTOS CITY</h4>
                                     <br>
                                     <div class="row">
                                         <div class="col-md-6">

                                             <p><strong>Where did you stay here in General Santos City:</strong> <?= htmlspecialchars($patient['stay_in_gensan']); ?></p>
                                             <p><strong>Contact No.:</strong> <?= htmlspecialchars($patient['landlord_number']); ?></p>
                                         </div>

                                         <div class="col-md-6">

                                             <p><strong>Name of Landlord/Landlady/Employer:</strong> <?= htmlspecialchars($patient['landlord_name']); ?></p>

                                         </div>
                                     </div>

                                     

                                     <div class="row">
                                         <div class="col-md-6">

                                              <p><strong>Fullname:</strong><?= htmlspecialchars($patient['firstname'] . " " . $patient['lastname']); ?></p>
                                              <p><strong>Email:</strong> <?= htmlspecialchars($patient['parents_email']); ?></p>
                                              <p><strong>Mobile No.:</strong> </p>
                                         </div>

                                         <div class="col-md-6">

                                            <p><strong>Religion:</strong> <?= htmlspecialchars($patient['parents_religion']); ?></p>
                                            <p><strong>Tribe:</strong> <?= htmlspecialchars($patient['landlord_name']); ?></p>
                                            <p><strong>Language Spoken:</strong> <?= htmlspecialchars($patient['landlord_name']); ?></p>

                                         </div>


                                         
                                     </div>

                        
                                     <hr>
                                     <h4>Father Details</h4>

                    <?php
                    // Assuming you have a database connection
              
                    // Fetch father’s details
                    $student_id = $patient['id']; // Assuming patient ID is available
                    $sql_parents = "SELECT * FROM parents_info WHERE student_id = ? AND parent_type = 'father'";
                    $stmt = $conn->prepare($sql_parents);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $father = $result->fetch_assoc();

                    if ($father) {
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Fullname:</strong> <?= htmlspecialchars($father['firstname'] . " " . $father['lastname']); ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($father['email']); ?></p>
                                <p><strong>Mobile No.:</strong> <?= htmlspecialchars($father['cellphone']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Religion:</strong> <?= htmlspecialchars($father['religion']); ?></p>
                                <p><strong>Tribe:</strong> <?= htmlspecialchars($father['tribe']); ?></p>
                                <p><strong>Language Spoken:</strong> <?= htmlspecialchars($father['language']); ?></p>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo "<p>Father's details not found.</p>";
                    }

                    // Fetch mother’s details
                    $sql_mother = "SELECT * FROM parents_info WHERE student_id = ? AND parent_type = 'mother'";
                    $stmt = $conn->prepare($sql_mother);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $mother = $result->fetch_assoc();
                    ?>

                    <h4>Mother Details</h4>

                    <?php
                    if ($mother) {
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Fullname:</strong> <?= htmlspecialchars($mother['firstname'] . " " . $mother['lastname']); ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($mother['email']); ?></p>
                                <p><strong>Mobile No.:</strong> <?= htmlspecialchars($mother['cellphone']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Religion:</strong> <?= htmlspecialchars($mother['religion']); ?></p>
                                <p><strong>Tribe:</strong> <?= htmlspecialchars($mother['tribe']); ?></p>
                                <p><strong>Language Spoken:</strong> <?= htmlspecialchars($mother['language']); ?></p>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo "<p>Mother's details not found.</p>";
                    }


                    ?>



                                                <div class="row">
                                                            <div class="col-md-6">  
                                                                <p><strong>Parents Marital Status:</strong> <?= htmlspecialchars($patient['marital_status']); ?></p>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                        <p><strong>Where do you live at present?:</strong> <?= htmlspecialchars($patient['live_present']); ?></p>
                                                        </div>
                                                </div>


                                                
                            </div>

                       

                            
                        <?php else: ?>
                            <p class="text-danger text-center">No profile found for this patient.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            
<script>
function printSection() {
    var printContents = document.getElementById("printSection").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
