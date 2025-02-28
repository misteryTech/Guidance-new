<?php
include("header.php");
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
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .row {
        display: flex !important;
        flex-wrap: wrap !important;
    }

    .col-md-6 {
        width: 50% !important;
        float: left !important;
        box-sizing: border-box !important;
    }

    .text-center {
        text-align: center !important;
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
                    <p><strong>Birth Address:</strong> <?= htmlspecialchars($patient['birth_address']); ?></p>
                </div>
                <div class="col-md-6">
                    <h4>Contact Information</h4>
                    <p><strong>Email:</strong> <?= htmlspecialchars($patient['Email']); ?></p>
                    <p><strong>Contact Number:</strong> <?= htmlspecialchars($patient['PhoneNumber']); ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($patient['age']); ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($patient['Username']); ?></p>
                    <p><strong>Address:</strong> <?= htmlspecialchars($patient['Address']); ?></p>
                </div>
            </div>
            <hr>
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

            <hr>
            <h1>Family History</h1>
            <br>
            <div class="row">
                <h3>Father</h3>
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
                <div class="col-md-12">  
                       <p><strong>Highest Educational Attainment:</strong></p>
                </div>

                <div class="col-md-6">
                <p><strong>Occupation:</strong> </p>
                <p><strong>Position Held:</strong> </p>
                </div>

                
                <div class="col-md-6">
                <p><strong>Business/Office Address:</strong> </p>
                </div>

            </div>


            <div class="row">
                <h3>Mother</h3>
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
                <div class="col-md-12">  
                       <p><strong>Highest Educational Attainment:</strong></p>
                </div>

                <div class="col-md-6">
                <p><strong>Occupation:</strong> </p>
                <p><strong>Position Held:</strong> </p>
                </div>

                
                <div class="col-md-6">
                <p><strong>Business/Office Address:</strong> </p>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                <p><strong>Parents Marital Status:</strong> </p>
                </div>
                <div class="col-md-6">
                <p><strong>Where do you live at present:</strong> </p>
                </div>

                <h4>If married, write your husband or wife's name</h4>
                <div class="col-md-6">
                    <p><strong>Name:</strong></p>
                    <p><strong>Occupation:</strong></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Age:</strong></p>
                    <p><strong>Education Attainment:</strong></p>
                </div>

                <h4>Household</h4>
            </div>
          
            <div class="row mt-5">
                    <div class="col-md-12">
                    <p>    What is the combined monthly income of your family?</p>
                    </div>
                    <div class="col-md-6">
                    <p>    Transportation your family owns: </p>
                    </div>
                    <div class="col-md-6">
                    <p>    Means of transportation going to school:</p>
                    </div>
            </div>

            <div class="row">
                    <h3>Kindergarten</h3>
                    <div class="col-md-12">
                        <p>Name of School (List all schools attended for every level)</p>
                    </div>
                    <div class="col-md-6">
                        <p>Address of School</p>
                    </div>
                    <div class="col-md-6">
                        <p>Honors/Awards Received</p>
                    </div>

                    <h3>Elementary</h3>
                    <div class="col-md-12">
                        <p>Name of School (List all schools attended for every level)</p>
                    </div>
                    <div class="col-md-6">
                        <p>Address of School</p>
                    </div>
                    <div class="col-md-6">
                        <p>Honors/Awards Received</p>
                    </div>



                    <h3>Junior High School</h3>
                    <div class="col-md-12">
                        <p>Name of School (List all schools attended for every level)</p>
                    </div>
                    <div class="col-md-6">
                        <p>Address of School</p>
                    </div>
                    <div class="col-md-6">
                        <p>Honors/Awards Received</p>
                    </div>

                    <h3>Senior High School</h3>
                    <div class="col-md-12">
                        <p>Name of School (List all schools attended for every level)</p>
                    </div>
                    <div class="col-md-6">
                        <p>Address of School</p>
                    </div>
                    <div class="col-md-6">
                        <p>Honors/Awards Received</p>
                    </div>

                    <hr>
                    <div class="col-md-6">
                        <p>Have you ever repeated a grade?</p>
                        <p>Have you failed in any subjects?</p>
                        <p>Do you find school work difficult?</p>
                        <p>What subjects in Elem & HS take most of your time ?</p>
                        
                    </div>

                    <div class="col-md-6">
                        <p>If yes, which grade and why?</p>
                        <p>If yes, list them?</p>
                        <p>Why?</p>
                    </div>
              
                    
            </div>
            <h4 class="mt-5">VOCATIONAL RECORD</h4>
            <div class="row mt-3">
             
                <div class="col-md-12">
              <p> Work Experience: What work of occupational significance have you done at home or other people during school year and vacations?   </p>
                </div>

                <div class="col-md-6">
                <p> Employment Record: Have you held any job?</p>
                </div>

                
                <div class="col-md-6">
                <p> If yes, are you receiving the basic benefits and privileges?</p>
                </div>

            </div>
            <h4 class="mt-5">HOBBIES, INTEREST AND VOCATIONAL RECORD</h4>
            <div class="row mt-3">
              
                <div class="col-md-12">
                    <p>What school activities are you interested in?</p>
                </div>
            </div>


            <div class="row">
                <h4>Employment</h4>
                <div class="col-md-6">
                    <p>Date Employment</p>
                    <p>Place of Employment</p>
                </div>
                <div class="col-md-6">
                    <p>Name of Employer, Company, and Business Address</p>
                    <p>Job Description</p>
                </div>
            </div>


            <h4 class="mt-5">VOCATIONAL OUTLOOK</h4>

            <div class="row">
       
                <div class="col-md-6">
                    <p>What kind of vocation or employment do you like to go into?</p>
                    <p> How would you prepare for it?</p>
                    <p> What kind of job would you prefer?</p>
                    <p> What are your plans after College?</p>
                </div>
                <div class="col-md-6">
                    <p>Name of Employer, Company, and Business Address</p>
                    <p>Job Description</p>
                </div>
            </div>
                    <h4 class="mt-5">GENERAL PERSONALITY MAKE-UP</h4>
            <div class="row">   
                <div class="col-md-12">
                    <p>Words which you feel describe your general personality make-up</p>
                </div>

                <div class="col-md-6">
                    <p>Grooming</p>
                    <p>Seriousness of Purpose</p>
                    <p>Academic Achievement</p>
                </div>

                <div class="col-md-6">
                    <p>Posture</p>
                    <p>Academic Ability</p>
                </div>

               
            </div>
            <hr>
            <h4 class="mt-5">EMERGENCY CONTACT INFORMATION</h4>
            <div class="row">
     
                    <div class="col-md-6">
                        <p>Relationship</p>
                        <p>Complete Address</p>
                    </div>
                    <div class="col-md-6">
                        <p>Contact Numbers</p>
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
