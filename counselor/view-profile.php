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
            PI.email AS parents_email,
            pt.PatientId AS pds_id

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
                                <a href="personal-data-list.php"> <button  class="btn print-button btn-back"> Back to Dashboard</button> </a>
                            </div>
                        <?php if ($patient): ?>
                            <div class="container-fluid">
                                <div class="row g-4"> <!-- Added gap for better spacing -->
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Personal Details</h4>
                                        <p><strong>Student ID:</strong> <?= htmlspecialchars($patient['Patient_Id']); ?></p>
                                        <p><strong>Full Name:</strong> <?= htmlspecialchars($patient['FirstName'] ." " .   $patient['MiddleName'] . " " . $patient['LastName']); ?></p>
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

                                     

                        
                                     <hr>
                                     <h1>Family History</h1>
                                     <h4>Father Details</h4>
                                 
                    <?php
                    // Assuming you have a database connection
              
                    // Fetch father’s details
                    $student_id = $patient['pds_id']; // Assuming patient ID is available
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
                                <p><strong>School Attain:</strong> <?= htmlspecialchars($father['schoolattain']); ?></p>
                                <p><strong>Occupation:</strong> <?= htmlspecialchars($father['occupation']); ?></p>
                                
                            </div>
                            <div class="col-md-6">
                                <p><strong>Religion:</strong> <?= htmlspecialchars($father['religion']); ?></p>
                                <p><strong>Tribe:</strong> <?= htmlspecialchars($father['tribe']); ?></p>
                                <p><strong>Language Spoken:</strong> <?= htmlspecialchars($father['language']); ?></p>
                                <p><strong>Business Address:</strong> <?= htmlspecialchars($father['business']); ?></p>
                                <p><strong>position:</strong> <?= htmlspecialchars($father['position']); ?></p>
                               
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
                                <p><strong>School Attain:</strong> <?= htmlspecialchars($mother['schoolattain']); ?></p>
                                <p><strong>Occupation:</strong> <?= htmlspecialchars($mother['occupation']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Religion:</strong> <?= htmlspecialchars($mother['religion']); ?></p>
                                <p><strong>Tribe:</strong> <?= htmlspecialchars($mother['tribe']); ?></p>
                                <p><strong>Language Spoken:</strong> <?= htmlspecialchars($mother['language']); ?></p>
                                <p><strong>Business Address:</strong> <?= htmlspecialchars($mother['business']); ?></p>
                                <p><strong>position:</strong> <?= htmlspecialchars($mother['position']); ?></p>
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

                                      

                                                <div class="row">
                                                        <div class="col-md-6">
                                                        <p><strong>What is the combined monthly income of your family?</strong> <?= htmlspecialchars($patient['family_income']); ?></p>
                                                        <p><strong>Transportation your family owns:</strong> <?= htmlspecialchars($patient['family_transpo']); ?></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <p><strong>Means of transportation going to school:</strong> <?= htmlspecialchars($patient['family_transpo']); ?></p>
                                                        </div>
                                                </div>

                 <h1>Household</h1>

<?php


// Fetch all household members associated with the student ID
$sql_household = "SELECT * FROM household_members WHERE student_id = ?";
$stmt = $conn->prepare($sql_household);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$household_members = $result->fetch_all(MYSQLI_ASSOC);
?>

<?php if (!empty($household_members)) : ?>
    <?php foreach ($household_members as $household) : ?>
        <h4><?= htmlspecialchars($household['relationship']) ?> Details</h4>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Full Name:</strong> <?= htmlspecialchars($household['firstname'] . " " . $household['lastname']); ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($household['sex']); ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Civil Status:</strong> <?= htmlspecialchars($household['civil_status']); ?></p>
                <p><strong>Relationship:</strong> <?= htmlspecialchars($household['relationship']); ?></p>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else : ?>
    <p>No household details found.</p>
<?php endif; ?>



                                                <h1>Socio-Economic Status of the Family</h1>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                        <p><strong>What is the combined monthly income of your family?</strong> <?= htmlspecialchars($patient['family_income']); ?></p>
                                                        <p><strong>Transportation your family owns:</strong> <?= htmlspecialchars($patient['family_transpo']); ?></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <p><strong>Means of transportation going to school:</strong> <?= htmlspecialchars($patient['family_transpo']); ?></p>
                                                        </div>
                                                </div>

                                                
                                                <h1>School Work & Progress Record</h1>
                    <?php
                                                // Fetch father’s details
                    $student_id = $patient['id']; // Assuming patient ID is available
                    $sql_kinder = "SELECT * FROM education WHERE student_id = ? AND level = 'Kindergarten'";
                    $stmt = $conn->prepare($sql_kinder);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $kinder = $result->fetch_assoc();

                    if ($kinder) {
                    ?>
                         <h3>Kindergarten</h3>
                        <div class="row">
                       
                            <div class="col-md-6">
                            
                                <p><strong>School Name:</strong> <?= htmlspecialchars($kinder['school_name']); ?></p>
                        
                                
                            </div>
                            <div class="col-md-6">
                               <p><strong>School Address:</strong> <?= htmlspecialchars($kinder['school_address']); ?></p>    
                           
                            </div>

                            <div class="col-md-12">
                            <p><strong>School Address:</strong> <?= htmlspecialchars($kinder['awards']); ?></p>    
                            </div>
                        </div>
                    <?php


                    } else {
                        echo "<p>Kindergarten details not found.</p>";
                    }


                    ?>




<?php
                                                // Fetch father’s details
                    $student_id = $patient['pds_id']; // Assuming patient ID is available
                    $sql_elementary = "SELECT * FROM education WHERE student_id = ? AND level = 'Elementary'";
                    $stmt = $conn->prepare($sql_elementary);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $elementary = $result->fetch_assoc();

                    if ($elementary) {
                    ?>
                         <h3>Elementary</h3>
                        <div class="row">
                       
                            <div class="col-md-6">
                            
                                <p><strong>School Name:</strong> <?= htmlspecialchars($elementary['school_name']); ?></p>
                        
                                
                            </div>
                            <div class="col-md-6">
                               <p><strong>School Address:</strong> <?= htmlspecialchars($elementary['school_address']); ?></p>    
                           
                            </div>

                            <div class="col-md-12">
                            <p><strong>School Address:</strong> <?= htmlspecialchars($elementary['awards']); ?></p>    
                            </div>
                        </div>
                    <?php


                    } else {
                        echo "<p>Father's details not found.</p>";
                    }


                    ?>





<?php
                                                // Fetch father’s details
                    $student_id = $patient['pds_id']; // Assuming patient ID is available
                    $sql_jhs = "SELECT * FROM education WHERE student_id = ? AND level = 'Junior High School'";
                    $stmt = $conn->prepare($sql_jhs);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $jhs = $result->fetch_assoc();

                    if ($jhs) {
                    ?>
                         <h3>Junior High School</h3>
                        <div class="row">
                       
                            <div class="col-md-6">
                            
                                <p><strong>School Name:</strong> <?= htmlspecialchars($jhs['school_name']); ?></p>
                        
                                
                            </div>
                            <div class="col-md-6">
                               <p><strong>School Address:</strong> <?= htmlspecialchars($jhs['school_address']); ?></p>    
                           
                            </div>

                            <div class="col-md-12">
                            <p><strong>School Address:</strong> <?= htmlspecialchars($jhs['awards']); ?></p>    
                            </div>
                        </div>
                    <?php


                    } else {
                        echo "<p>Junior high School details not found.</p>";
                    }


                    ?>









<?php
                                                // Fetch father’s details
                    $student_id = $patient['pds_id']; // Assuming patient ID is available
                    $sql_shs = "SELECT * FROM education WHERE student_id = ? AND level = 'Senior High School'";
                    $stmt = $conn->prepare($sql_shs);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $shs = $result->fetch_assoc();

                    if ($shs) {
                    ?>
                         <h3>Junior High School</h3>
                        <div class="row">
                       
                            <div class="col-md-6">
                            
                                <p><strong>School Name:</strong> <?= htmlspecialchars($shs['school_name']); ?></p>
                        
                                
                            </div>
                            <div class="col-md-6">
                               <p><strong>School Address:</strong> <?= htmlspecialchars($shs['school_address']); ?></p>    
                           
                            </div>

                            <div class="col-md-12">
                            <p><strong>School Address:</strong> <?= htmlspecialchars($shs['awards']); ?></p>    
                            </div>
                        </div>
                    <?php


                    } else {
                        echo "<p>Senior high School details not found.</p>";
                    }


                    ?>



                                     <br>
                                     <div class="row">
                                         <div class="col-md-6">

                                             <p><strong>Have you ever repeated a grade?</strong> <?= htmlspecialchars($patient['repeat_grade']); ?></p>
                                             <p><strong>Have you failed in any subjects?</strong> <?= htmlspecialchars($patient['failed_subject']); ?></p>
                                             <p><strong>What subjects in Elem & HS take most of your time ?</strong> <?= htmlspecialchars($patient['taketimesub']); ?></p>
                                             
                                             <p><strong>Do you find school work difficult?</strong> <?= htmlspecialchars($patient['difficultinschool']); ?></p>
                            
                                         </div>

                                         <div class="col-md-6">

                                             <p><strong>Why?</strong> <?= htmlspecialchars($patient['repeat_why']); ?></p>
                                             <p><strong>List Failed Items</strong> <?= htmlspecialchars($patient['listfailed']); ?></p>
                                             <p><strong>What subjects in Elem & HS take least of your time?</strong> <?= htmlspecialchars($patient['listfailed']); ?></p>
                                             <br>
                                             <p><strong>Why?</strong> <?= htmlspecialchars($patient['difficultinschoolwhy']); ?></p>

                                         </div>
                                     </div>



                                     

                                     <br>

                      
                                     <h3>Hobbies, Interest and Vocational Record</h3>
                                     <div class="row">
                                         <div class="col-md-6">

                                             <p><strong>What school activities are you interested: </strong> <?= htmlspecialchars($patient['school_activities']); ?></p>
                                         
                                         </div>

                                         <div class="col-md-6">
                                         </div>
                                     </div>




                                     <h3>Vocational Record</h3>
                                     <div class="row">
                                         <div class="col-md-12">

                                             <p><strong>Work Experience</strong> <?= htmlspecialchars($patient['work_experience']); ?></p>
                                         
                                         </div>


                                     </div>

                                     <div class="row">
                                        
                                     <div class="col-md-6">
                                         <p><strong>Employment Record: </strong> <?= htmlspecialchars($patient['employmentrecord']); ?></p>
                                         </div>
                                         
                                         <div class="col-md-6">
                                         <p><strong>Basic Benefits:</strong> <?= htmlspecialchars($patient['basic_benefits']); ?></p>
                                         </div>

                                     </div>



                                <?php
                                                                     // Fetch all household members associated with the student ID
                                $sql_employment = "SELECT * FROM employment WHERE student_id = ?";
                                $stmt = $conn->prepare($sql_employment);
                                $stmt->bind_param("i", $student_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $employment_list = $result->fetch_all(MYSQLI_ASSOC);
                                ?>

                                <?php if (!empty($employment_list)) : ?>
                                    <?php foreach ($employment_list as $employment) : ?>
                         
                                        <div class="row">
                                            <div class="col-md-6">
                                           
                                                <p><strong>Date Employment:</strong> <?= htmlspecialchars($employment['employment_date']); ?></p>
                                                <p><strong>Employment Place:</strong> <?= htmlspecialchars($employment['employment_place']); ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Company Name</strong> <?= htmlspecialchars($employment['company_name']); ?></p>
                                                <p><strong>Job Description:</strong> <?= htmlspecialchars($employment['job_description']); ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>No Employment Record found.</p>
                                <?php endif; ?>



                                         <div class="row">
                                        
                                              <div class="col-md-6">
                                            <p><strong>Preferred Vocation </strong> <?= htmlspecialchars($patient['preferred_vocation']); ?></p>
                                            </div>
                                            
                                            <div class="col-md-6">
                                            <p><strong>Preferred Job:</strong> <?= htmlspecialchars($patient['preferred_job']); ?></p>
                                            </div>
   
                                        </div>
   
                                        <div class="row">
                                        
                                        <div class="col-md-12">
                                      <p><strong>What are your plans after College?</strong> <?= htmlspecialchars($patient['plans_after_college']); ?></p>
                                      </div>
                               
                                  </div>

                                  <div class="row">
                                     
                                      <div class="col-md-12">
                                      <p><strong>Personal Traits</strong> <?= htmlspecialchars($patient['personality_traits']); ?></p>
                                      </div>
                                  </div>



                                  <div class="row">
                                     
                                      <div class="col-md-6">
                                      <p><strong>Grooming</strong> <?= htmlspecialchars($patient['grooming']); ?></p>
                                      <p><strong>Seriousness</strong> <?= htmlspecialchars($patient['seriousness']); ?></p>
                                      <p><strong>Academic Achievement</strong> <?= htmlspecialchars($patient['academic_achievement']); ?></p>
                                      </div>

                                            
                                      <div class="col-md-6">
                                      <p><strong>Posture</strong> <?= htmlspecialchars($patient['posture']); ?></p>
                                      <p><strong>Academic Ability</strong> <?= htmlspecialchars($patient['academic_ability']); ?></p>
                                      </div>

                                  </div>

                                        <hr>
                                        <h1>Emergency Contact Information </h1>
                                  <div class="row">


                                    <div class="col-md-6">
                                      <p><strong>Relationship</strong> <?= htmlspecialchars($patient['emergency_relationship']); ?></p>
                                      </div>

                                            
                                      <div class="col-md-6">
                                      <p><strong>Contact Numbers</strong> <?= htmlspecialchars($patient['emergency_contact']); ?></p>
                                  
                                      </div>

                                  </div>


                                  <div class="row">
                                        <div class="col-md-12">
                                        <p><strong>Complete Address</strong> <?= htmlspecialchars($patient['emergency_address']); ?></p>
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
