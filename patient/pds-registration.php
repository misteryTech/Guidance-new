<?php
    include("header.php");
?>



<style>
  .notification {
    color: red;
  }

  .form-control{
    border-color:rgba(210, 102, 90, 0.55) ;
}

  select.form-select{
    outline: 1px solid rgba(210, 102, 90, 0.55) ;
    color: black;
  }

  .form-check-input{
    outline: 1px solid rgba(58, 43, 42, 0.55) ;

  }
  .form-check .form-check-label {
    display: block;
    margin-left: 1rem;
    margin-right: 1.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
}
</style>
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


          <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student</h4>
      <?php

  // Example of checking and displaying session messages for success or error
$status = isset($_SESSION['update_status']) ? $_SESSION['update_status'] : '';
$message = isset($_SESSION['update_message']) ? $_SESSION['update_message'] : '';

// Clear the session variables after displaying the message (optional)
unset($_SESSION['update_status']);
unset($_SESSION['update_message']);
      ?>



                    
                    <form class="form-sample" id="studentPds" action="process/pds-registration.php" method="POST">
  <p class="card-description">Student Registration Form</p>
  
  <div class="row">
    <!-- Counselor ID -->
    <div class="col-md-6">
         <div class="form-group row">
    <label for="patientId" class="col-sm-3 col-form-label">Student ID <span class="notification">*</span></label>
    <div class="col-sm-9">
      <input 
        type="text" 
        class="form-control" 
        id="patientId" 
        name="patientId" 
        maxlength="10" 
        pattern="\d+" 
        title="Counselor ID must be a number" 
        required 
        readonly 
      />
    </div>
  </div>
</div>

  </div>
  
  <div class="row">
  <div class="col-md-4">
  <div class="form-group row">
    <label for="firstName" class="col-sm-5 col-form-label">First Name <span class="notification">*</span></label>
    <div class="col-sm-10">
      <input 
        type="text" 
        class="form-control" 
        id="firstName" 
        name="firstName" 
        oninput="validateCharacters(this)" 
        required 
      />
      <p id="firstNameError" style="color: red; display: none;">First name must contain characters only.</p>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group row">
    <label for="firstName" class="col-sm-5 col-form-label">Middle Name <span class="notification">*</span></label>
    <div class="col-sm-10">
      <input 
        type="text" 
        class="form-control" 
        id="middleName" 
        name="middleName" 
        oninput="validateCharacters(this)" 
        required 
      />
      <p id="middleNameError" style="color: red; display: none;">Middle name must contain characters only.</p>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group row">
    <label for="lastName" class="col-sm-5 col-form-label">Last Name <span class="notification">*</span></label>
    <div class="col-sm-10">
      <input 
        type="text" 
        class="form-control" 
        id="lastName" 
        name="lastName" 
        oninput="validateCharacters(this)" 
        required 
      />
      <p id="lastNameError" style="color: red; display: none;">Last name must contain characters only.</p>
    </div>
  </div>
</div>



  </div>

  <div class="row">
    <!-- Gender -->
    <div class="col-md-6">
      <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label">Sex <span class="notification">*</span></label>
        <div class="col-sm-9">
          <select class="form-select" id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Non-Binary">Non-Binary</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
    </div>
    
    <!-- Date of Birth -->
    <div class="col-md-6">
      <div class="form-group row">
        <label for="dob" class="col-sm-3 col-form-label">Date of Birth <span class="notification">*</span></label>
        <div class="col-sm-9">
          <input type="date" class="form-control" id="dob" name="dob" required />
        </div>
      </div>

      <div class="form-group row">
        <label for="age" class="col-sm-3 col-form-label">Age<span class="notification">*</span></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="age" name="age" required />
        </div>
      </div>


    </div>
  </div>

  <div class="row">
    <!-- Address -->
    <div class="col-md-12">
      <div class="form-group row">
        <label for="birthaddress" class="col-sm-2 col-form-label">Birth Place<span class="notification">*</span></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="birthaddress" name="birthaddress" required />
        </div>
      </div>
    </div>
  </div>



  <div class="row">
    <!-- Address -->
    <div class="col-md-12">
      <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address <span class="notification">*</span></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="address" name="address" required />
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label for="phone" class="col-sm-3 col-form-label">Phone Number <span class="notification">*</span></label>
                  <div class="col-sm-9">
                    <input 
                      type="number" 
                      class="form-control" 
                      id="phone" 
                      name="phone" 
                      placeholder="Enter your phone number" 
                      maxlength="11" 
                      oninput="validatePhone()" 
                      required 
                    />
                    <p id="phoneError" style="color: red; display: none;">Phone number must be numeric and up to 11 digits only.</p>
                  </div>
                </div>
              </div>

    <!-- Email -->
<div class="col-md-6">
  <div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">Email <span class="notification">*</span></label>
    <div class="col-sm-9">
      <input 
        type="email" 
        class="form-control" 
        id="email" 
        name="email" 
        oninput="checkEmail()" 
        required 
      />
      <p id="emailError" style="color: red; display: none;">Email is already registered.</p>
      <p id="emailSuccess" style="color: green; display: none;">Email is available.</p>
    </div>
  </div>
</div>

  </div>

  <div class="row">

 <hr>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Civil Status</label>
          <div class="col-sm-9">
              <select class="form-select"  name="civil_status" >
                  <option value="">Select Civil Status</option>
                  <option value="single">Single</option>
                  <option value="married">Married</option>
                  <option value="widowed">Widowed</option>
                  <option value="divorced">Divorced</option>
                  <option value="separated">Separated</option>
              </select>
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">If Solo Parent, how many children do you have?</label>
          <div class="col-sm-9">
              <input type="number" class="form-control" name="solo_parent_children"> 
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Religion</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="religion"  >
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Tribe</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="tribe" >
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Language/Dialect Spoken</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="language_spoken" >
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">If belonging to IP, please specify</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="ip_belonging" >
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Number of Siblings</label>
          <div class="col-sm-9">
              <input type="number" class="form-control" name="number_of_siblings" >
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Birth Order</label>
          <div class="col-sm-9">
              <select class="form-select" name="birth_order">
                  <option value="">Select Birth Order</option>
                  <option value="oldest">Oldest</option>
                  <option value="middle">Middle</option>
                  <option value="youngest">Youngest</option>
                  <option value="only_child">Only Child</option>
              </select>
          </div>
      </div>
  </div>
</div>

<hr>
<p class="card-description">FOR STUDENTS NOT OFFICIALLY RESIDENT OF GENERAL SANTOS CITY (OPTIONAL) </p>
<h4 class="text-danger">If not type (N/A)</h4>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Where did you stay here in General Santos City</label>
          
          <div class="col-sm-9">
              <select class="form-select" name="stay_in_gensan">
                  <option value="N/A">N/A</option>
                  <option value="other">Other</option>
                  <option value="boarding-house">Boarding House</option>
                  <option value="Dormitory">Dormitory</option>
                  <option value="Apartment">Apartment</option>
                  <option value="Relatives">Relatives</option>
                  <option value="Employer">Employer</option>
    
              </select>
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Name of Landlord/Landlady/Employer:</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="landlord_name" >
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Contact Number:</label>
          <div class="col-sm-9">
              <input type="number" class="form-control" name="landlord_number" >
          </div>
      </div>
  </div>
</div>

<hr>
<p class="card-description">FAMILY HISTORY</p>
<h4 class="text-danger">If not type (N/A)</h4>
<?php
$parents = ['father' => 'Father', 'mother' => 'Mother'];
$fields = [
    'firstname' => 'Firstname',
    'lastname' => 'Lastname',
    'religion' => 'Religion',
    'tribe' => 'Tribe',
    'cellphone' => 'Landline/Cellphone No.',
    'email' => 'Email Address',
    'schoolattain' => 'Highest Educational Attainment',
    'language' => 'Language/s Spoken',
    'occupation' => 'Occupation',
    'business' => 'Business/Office Address',
    'position' => 'Position Held',
];

$educationOptions = [
    "High School", "Undergraduate", "Bachelor's Degree", "Master's Degree", "Doctorate"
];

$religions = ["Catholic","Christian", "Islam", "Hindu", "Buddhist", "Other"];
?>

<div class="row">
    <?php foreach ($parents as $key => $label) : ?>
        <div class="col-md-6">
            <h2><?= $label ?></h2>
            <?php foreach ($fields as $field => $fieldLabel) : ?>
                <div class="form-group row">
                    <label><?= $fieldLabel ?></label>
                    <div class="col-sm-9">
                        <?php if ($field === 'religion') : ?>
                            <select class="form-select" name="<?= $key . '_' . $field ?>">
                                <option value="" disabled selected>Select your religion</option>
                                <?php foreach ($religions as $religion) : ?>
                                    <option value="<?= $religion ?>"><?= $religion ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php elseif ($field === 'schoolattain') : ?>
                            <select class="form-select" name="<?= $key . '_' . $field ?>">
                                <option value="" disabled selected>Select your highest educational attainment</option>
                                <?php foreach ($educationOptions as $option) : ?>
                                    <option value="<?= $option ?>"><?= $option ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php elseif ($field === 'cellphone') : ?>
                            <input type="number" class="form-control" name="<?= $key . '_' . $field ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
                        <?php elseif ($field === 'email') : ?>
                            <input type="email" class="form-control" name="<?= $key . '_' . $field ?>" placeholder="example@email.com">
                        <?php else : ?>
                            <input type="text" class="form-control" name="<?= $key . '_' . $field ?>">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>




<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label><b>Parents Marital Status</b></label>
      <div class="col-sm-12 d-flex flex-wrap gap-5">
        <!-- Radio buttons for marital status -->
        <div class="form-check">
          <input type="radio" class="form-check-input" id="living-together" name="marital_status" value="living-together">
          <label class="form-check-label" for="living-together">Living Together</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="legally-separated" name="marital_status" value="legally-separated">
          <label class="form-check-label" for="legally-separated">Legally Separated</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="father-remarried" name="marital_status" value="father-remarried">
          <label class="form-check-label" for="father-remarried">Father Remarried</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="mother-remarried" name="marital_status" value="mother-remarried">
          <label class="form-check-label" for="mother-remarried">Mother Remarried</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="deceased-father" name="marital_status" value="deceased-father">
          <label class="form-check-label" for="deceased-father">Deceased Father</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="deceased-mother" name="marital_status" value="deceased-mother">
          <label class="form-check-label" for="deceased-mother">Deceased Mother</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="marriage-annulled" name="marital_status" value="marriage-annulled">
          <label class="form-check-label" for="marriage-annulled">Marriage Annulled</label>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label><b>Where do you live at present?</b></label>
      <div class="col-sm-12 d-flex flex-wrap gap-5">
        <!-- Radio buttons for marital status -->
        <div class="form-check">
          <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
          <label class="form-check-label" for="both-parents">both parents</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
          <label class="form-check-label" for="father">father</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
          <label class="form-check-label" for="mother">mother</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="grandparents" name="live_present" value="grandparents">
          <label class="form-check-label" for="grandparents">grandparents</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="brothers-sisters" name="live_present" value="brothers-sisters">
          <label class="form-check-label" for="brothers-sisters">brothers and sisters</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="relatives" name="live_present" value="relatives">
          <label class="form-check-label" for="relatives">relatives</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="others" name="live_present" value="others">
          <label class="form-check-label" for="others">others</label>
        </div>
      </div>
    </div>
  </div>



           <div class="col-md-12">
                <div class="form-group row">
                <label><b>If married, write your husband or wife's name:</b>(OPTIONAL)</label>
                <h4 class="text-danger">If not type (N/A)</h4>

                <div class="row">
            <!-- Position Held Field -->
                    <div class="col-md-6">
                          <div class="form-group row">
                              <label for="position1">Firstname</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="wife_firstname" name="wife_firstname">
                              </div>
                          </div>
                      </div>

              <!-- Position Held Field 2 -->
                     <div class="col-md-6">
                         <div class="form-group row">
                             <label for="position2">Lastname</label>
                             <div class="col-sm-12">
                                 <input type="text" class="form-control" id="wife_lastname" name="wife_lastname">
                             </div>
                         </div> 
                     </div>
                </div>


                <div class="row">
            <!-- Position Held Field -->
                    <div class="col-md-6">
                          <div class="form-group row">
                              <label for="wife_age">Age</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="wife_age" name="wife_age">
                              </div>
                          </div>
                      </div>

              <!-- Position Held Field 2 -->
                     <div class="col-md-6">
                         <div class="form-group row">
                             <label for="wife_occupation">Occupation</label>
                             <div class="col-sm-12">
                                 <input type="text" class="form-control" id="wife_occupation" name="wife_occupation">
                             </div>
                         </div>
                     </div>


                       <!-- Position Held Field 2 -->
                       <div class="col-md-12">
                         <div class="form-group row">
                             <label for="wife_educ">Education Attainment</label>
                             <div class="col-sm-12">
                                 <input type="text" class="form-control" id=" " name="wife_educ">
                             </div>
                         </div>
                      </div>

                </div>

              </div>
           </div>        



           <div class="col-md-12">
    <div class="form-group">
        <label><b>Other members of household?</b> (Relatives, Helpers, etc.)</label>
<h4 class="text-danger">If not type (N/A)</h4>
        <!-- Loop for Household Members -->
        <script>
            const householdCount = 4;
            document.addEventListener("DOMContentLoaded", function () {
                let container = document.getElementById("household-container");
                for (let i = 1; i <= householdCount; i++) {
                    container.innerHTML += `
                        <h6>Household ${i}</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" id="household${i}fname" name="household${i}fname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" id="household${i}lname" name="household${i}lname">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sex</label>
                                    <input type="text" class="form-control" id="household${i}sex" name="household${i}sex">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="text" class="form-control" id="household${i}age" name="household${i}age">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Civil Status</label>
                                    <input type="text" class="form-control" id="household${i}civilstatus" name="household${i}civilstatus">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Relationship</label>
                                    <input type="text" class="form-control" id="household${i}relationship" name="household${i}relationship">
                                </div>
                            </div>
                        </div>
                    `;
                }
            });
        </script>

        <div id="household-container"></div>
    </div>
</div>

           </div>


<hr>


<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label><b>Socio-Economic Status of the Family</b></label>
      <h6>What is the combined monthly income of your family? Please check appropriate box.</h6>
      <div class="col-sm-12 d-flex flex-wrap gap-4">
        <!-- Radio buttons for marital status -->
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="below-10k">
          <label class="form-check-label" for="family-income">Below Php 10,000.00</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="10k-20k">
          <label class="form-check-label" for="father">10,000 – 20,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="20,001-30k">
          <label class="form-check-label" for="mother">20,001 – 30,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="30,001-40k">
          <label class="form-check-label" for="family-income">30,001 – 40,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="40,001-50k">
          <label class="form-check-label" for="family-income">40,001 – 50,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="50,001-60k">
          <label class="form-check-label" for="family-income">50,001 – 60,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="60,001-70k">
          <label class="form-check-label" for="family-income">60,001 – 70,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="70,001-80k">
          <label class="form-check-label" for="family-income">70,001 – 80,000</label>
        </div>

        <div class="form-check">
          <input type="radio" class="form-check-input" id="family-income" name="family-income" value="above-80k">
          <label class="form-check-label" for="family-income">80,001 – Above</label>
        </div>
   
      </div>
    </div>


    <div class="col-md-12">
      <div class="form-group row">

              <h6>Transportation your family owns:</h6>
              <div class="col-sm-12 d-flex flex-wrap gap-4">
                <!-- Radio buttons for marital status -->
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="car-suv" name="family-transpo" value="car-suv">
                  <label class="form-check-label" for="car-suv">Car/SUV</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="jeep" name="family-transpo" value="jeep">
                  <label class="form-check-label" for="jeep">Jeep</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="tricycle" name="family-transpo" value="tricycle">
                  <label class="form-check-label" for="tricycle">Tricycle</label>
                </div>

                <div class="form-check">
                  <input type="radio" class="form-check-input" id="motorcycle" name="family-transpo" value="motorcycle">
                  <label class="form-check-label" for="motorcycle">Motorcycle</label>
                </div>

        </div>
    </div>

    <div class="col-md-12">
      <div class="form-group row">

              <h6>Means of transportation going to school:</h6>
              <div class="col-sm-12 d-flex flex-wrap gap-4">
                <!-- Radio buttons for marital status -->
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="car-suv" name="transpo-school" value="car-suv">
                  <label class="form-check-label" for="car-suv">Car/SUV</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="jeep" name="transpo-school" value="jeep">
                  <label class="form-check-label" for="jeep">Jeep</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="tricycle" name="transpo-school" value="tricycle">
                  <label class="form-check-label" for="tricycle">Tricycle</label>
                </div>
        
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="motorcycle" name="transpo-school" value="motorcycle">
                  <label class="form-check-label" for="motorcycle">Motorcycle</label>
                </div>

        </div>
    </div>


  </div>

  <hr>
  <p><strong>SCHOOL WORK AND PROGRESS RECORD</strong></p>
  <h4 class="text-danger">If not type (N/A)</h4>
  <div id="education-container"></div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const educationLevels = ["Kindergarten", "Elementary", "Junior High School", "Senior High School"];
    let container = document.getElementById("education-container");

    educationLevels.forEach((level, index) => {
        let levelNumber = index + 1;
        container.innerHTML += `
            <h6>${level}</h6>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label>Name of School (List all schools attended for every level)</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="school${levelNumber}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label>Address of School</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="school${levelNumber}address">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label>Honors/Awards Received</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="school${levelNumber}awards">
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
});
</script>


                  <hr>
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Have you ever repeated a grade?</label>
                                            <div class="co-sm-12">
                                            <select class="form-select" id="repeat_grade" name="repeat_grade" >                                           
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-9">
                                    <div class="form-group row">
                                          <label for="">If yes, which grade and why? </label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="repeat_why" name="repeat_why">
                                            </div>
                                    </div>
                              </div>



                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Have you failed in any subjects?</label>
                                            <div class="co-sm-12">
                                            <select class="form-select" id="failed_subject"  name="failed_subject" >                                           
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-9">
                                    <div class="form-group row">
                                          <label for="">If yes, list them</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="listfailed" name="listfailed">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">What subjects in Elem & HS take most of your time ?</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="taketimesub" name="taketimesub">
                                            </div>
                                    </div>
                              </div>



                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Do you find school work difficult? </label>
                                            <div class="co-sm-12">
                                            <select class="form-select" id="difficultinschool" name="difficultinschool">                                           
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-9">
                                    <div class="form-group row">
                                          <label for="">Why?</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="difficultinschoolwhy" name="difficultinschoolwhy">
                                            </div>
                                    </div>
                              </div>


                          </div>



<hr>
<p><strong>HOBBIES, INTEREST AND VOCATIONAL RECORD</strong></p>


<div class="row">
  <div class="col-md-12">
      <div class="form-group row">
          <label>What school activities are you interested in? (Please check)</label>
          <div class="col-sm-9">
              <!-- Radio buttons for school activities -->
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="activity1" name="school-activities" value="Sports" >
                  <label class="form-check-label" for="activity1">Sports</label>
              </div>
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="activity2" name="school-activities" value="Music">
                  <label class="form-check-label" for="activity2">Music</label>
              </div>
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="activity3" name="school-activities" value="Theater">
                  <label class="form-check-label" for="activity3">Theater</label>
              </div>
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="activity4" name="school-activities" value="Art">
                  <label class="form-check-label" for="activity4">Art</label>
              </div>
              <div class="form-check">
                  <input type="radio" class="form-check-input" id="activity5" name="school-activities" value="Other">
                  <label class="form-check-label" for="activity5">Other</label>
              </div>
          </div>
      </div>
  </div>
</div>

<hr>
                      <p><strong>VOCATIONAL RECORD</strong></p>
                      <h4 class="text-danger">If not type (N/A)</h4>
                      <div class="row">
                        <div class="col-md-12">
                              <div class="form-group row">
                                  <label for="">1.	Work Experience:  What work of occupational significance have you done at home or other people during 
                                 school year and vacations?</label>
                                    <div class="co-sm-12">
                                        <input type="text" class="form-control" id="wordkexperience" name="wordkexperience">
                                    </div>
                               </div>
                        </div>


                            <div class="col-md-12">
                              <div class="form-group row">
                                <label for="firstName" class="col-sm-5 col-form-label">2.	Employment Record:  Have you held any job?</label>
                                <div class="col-sm-3">
                                  <select class="form-select" id="employmentrecord" name="employmentrecord" >                                           
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                    </select>
                               
                                </div>
                              </div>
                            </div>


                            <div class="col-md-12">
                              <div class="form-group row">
                                <label for="firstName" class="col-sm-5 col-form-label">If yes, are you receiving the basic benefits and privileges?</label>
                                <div class="col-sm-3">
                                  <select class="form-select" id="basic_benefits"  name="basic_benefits">                                           
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                    </select>
                               
                                </div>
                              </div>
                            </div>



                            
                            <div id="employment-container"></div>

                                          <script>
                                          document.addEventListener("DOMContentLoaded", function () {
                                              const numEmployments = 3; // Adjust this number if needed
                                              let container = document.getElementById("employment-container");

                                              for (let i = 1; i <= numEmployments; i++) {
                                                  container.innerHTML += `
                                                      <h6>Employment (${i})</h6>
                                                      <div class="row">
                                                          <div class="col-md-3">
                                                              <div class="form-group row">
                                                                  <label>Date of Employment</label>
                                                                  <div class="col-sm-12">
                                                                      <input type="date" class="form-control" name="employment${i}_date">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-9">
                                                              <div class="form-group row">
                                                                  <label>Name of Employer, Company, and Business Address</label>
                                                                  <div class="col-sm-12">
                                                                      <input type="text" class="form-control" name="employment${i}_company">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <div class="form-group row">
                                                                  <label>Place of Employment</label>
                                                                  <div class="col-sm-12">
                                                                      <input type="text" class="form-control" name="employment${i}_place">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <div class="form-group row">
                                                                  <label>Job Description</label>
                                                                  <div class="col-sm-12">
                                                                      <input type="text" class="form-control" name="employment${i}_job">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  `;
                                              }
                                          });
                                          </script>




                                 
                   <p><strong>VOCATIONAL OUTLOOK</strong></p>
                  <div class="col-md-12">
    <div class="form-group row">
        <label for="preferred_vocation">a. What kind of vocation or employment do you like to go into?</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="preferred_vocation" name="preferred_vocation">
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group row">
        <label for="preparation_for_vocation">b. How would you prepare for it?</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="preparation_for_vocation" name="preparation_for_vocation">
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group row">
        <label for="preferred_job">c. What kind of job would you prefer?</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="preferred_job" name="preferred_job">
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group row">
        <label for="plans_after_college">d. What are your plans after College?</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="plans_after_college" name="plans_after_college">
        </div>
    </div>
</div>

<p><strong>GENERAL PERSONALITY MAKE-UP</strong></p>

<div class="col-md-12">
    <div class="form-group row">
        <label for="personality_traits">Words which you feel describe your general personality make-up</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="personality_traits" name="personality_traits">
        </div>
    </div>
</div>

                  </div>

                      </div>

                      <p><strong>Rate yourself on the following areas by marking a check.</strong></p>
                      <div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <h6>Grooming</h6>
            <div class="col-sm-12 d-flex flex-wrap gap-5">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="grooming-excellent" name="grooming" value="excellent">
                    <label class="form-check-label" for="grooming-excellent">Excellent</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="grooming-good" name="grooming" value="good">
                    <label class="form-check-label" for="grooming-good">Good</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="grooming-fair" name="grooming" value="fair">
                    <label class="form-check-label" for="grooming-fair">Fair</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="grooming-poor" name="grooming" value="poor">
                    <label class="form-check-label" for="grooming-poor">Poor</label>
                </div>
            </div>
        </div>
        
        <div class="form-group row">
            <h6>Posture</h6>
            <div class="col-sm-12 d-flex flex-wrap gap-5">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="posture-excellent" name="posture" value="excellent">
                    <label class="form-check-label" for="posture-excellent">Excellent</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="posture-good" name="posture" value="good">
                    <label class="form-check-label" for="posture-good">Good</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="posture-fair" name="posture" value="fair">
                    <label class="form-check-label" for="posture-fair">Fair</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="posture-poor" name="posture" value="poor">
                    <label class="form-check-label" for="posture-poor">Poor</label>
                </div>
            </div>
        </div>
        
        <div class="form-group row">
            <h6>Seriousness of Purpose</h6>
            <div class="col-sm-12 d-flex flex-wrap gap-5">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="seriousness-excellent" name="seriousness" value="excellent">
                    <label class="form-check-label" for="seriousness-excellent">Excellent</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="seriousness-good" name="seriousness" value="good">
                    <label class="form-check-label" for="seriousness-good">Good</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="seriousness-fair" name="seriousness" value="fair">
                    <label class="form-check-label" for="seriousness-fair">Fair</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="seriousness-poor" name="seriousness" value="poor">
                    <label class="form-check-label" for="seriousness-poor">Poor</label>
                </div>
            </div>
        </div>
        
        <div class="form-group row">
            <h6>Academic Ability</h6>
            <div class="col-sm-12 d-flex flex-wrap gap-5">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-ability-excellent" name="academic_ability" value="excellent">
                    <label class="form-check-label" for="academic-ability-excellent">Excellent</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-ability-good" name="academic_ability" value="good">
                    <label class="form-check-label" for="academic-ability-good">Good</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-ability-fair" name="academic_ability" value="fair">
                    <label class="form-check-label" for="academic-ability-fair">Fair</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-ability-poor" name="academic_ability" value="poor">
                    <label class="form-check-label" for="academic-ability-poor">Poor</label>
                </div>
            </div>
        </div>
        
        <div class="form-group row">
            <h6>Academic Achievement</h6>
            <div class="col-sm-12 d-flex flex-wrap gap-5">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-achievement-excellent" name="academic_achievement" value="excellent">
                    <label class="form-check-label" for="academic-achievement-excellent">Excellent</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-achievement-good" name="academic_achievement" value="good">
                    <label class="form-check-label" for="academic-achievement-good">Good</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-achievement-fair" name="academic_achievement" value="fair">
                    <label class="form-check-label" for="academic-achievement-fair">Fair</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="academic-achievement-poor" name="academic_achievement" value="poor">
                    <label class="form-check-label" for="academic-achievement-poor">Poor</label>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<p><strong>EMERGENCY CONTACT INFORMATION</strong></p>

<div class="row">
  <!-- Relationship Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="relationship">Relationship</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="emergency_relationship" name="emergency_relationship" >
          </div>
      </div>
  </div>

  <!-- Contact Numbers Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="emergency-contact">Contact Numbers</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="emergency-contact" name="emergency-contact">
          </div>
      </div>
  </div>

  <!-- Complete Address Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="emergency-address">Complete Address</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="emergency-address" name="emergency-address">
          </div>
      </div>
  </div>




</div>



<div class="row">
  <!-- Submit Button -->
  <div class="col-md-12 text-center">
    <button type="submit" class="btn btn-success">Update</button>
  </div>
</div>
</form>



      <!-- Modal for Registration Status -->
      <div class="modal" tabindex="-1" id="registrationModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title">
          <?php echo ($status === 'success') ? 'Registration Success' : 'Registration Error'; ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          <?php
          if ($status === 'success') {
            echo $message;  // Show success message
          } else {
            echo $message;  // Show error message
          }
          ?>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



                  </div>
                </div>
              </div>



          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
     <?php
        include("footer.php");
?>


<script>
    
  // Show the modal only if there's a message
  <?php if ($status !== ''): ?>
    $('#registrationModal').modal('show');
  <?php endif; ?>


  function calculateAge() {
  const dobInput = document.getElementById("dob");
  const ageInput = document.getElementById("age");

  if (!dobInput || !dobInput.value) return; // Ensure dobInput exists and has a value

  const dob = new Date(dobInput.value);
  const today = new Date();
  let age = today.getFullYear() - dob.getFullYear();
  const monthDiff = today.getMonth() - dob.getMonth();

  // Adjust age if the birthday hasn't occurred yet this year
  if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
    age--;
  }

  ageInput.value = age >= 0 ? age : ""; // Ensure no negative age
}

// Calculate age when the page loads (DOB is already fetched)
window.addEventListener("DOMContentLoaded", function () {
  setTimeout(calculateAge, 500); // Small delay to ensure the DOM is fully loaded
});




window.onload = function() {

  fetchPatientProfile();
};
function fetchPatientProfile() {
  const xhr = new XMLHttpRequest(); 
  xhr.open('GET', 'process/fetch-patient-profile.php', true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);

        if (response.error) {
          // If an error message is returned, show it
          alert(response.error);
          return;
        }

        if (response) {
          // Populate form fields with profile data
          document.getElementById('patientId').value = response.Patient_Id || '';
          document.getElementById('firstName').value = response.FirstName || '';
          document.getElementById('lastName').value = response.LastName || '';
          document.getElementById('middleName').value = response.MiddleName || '';
          document.getElementById('address').value = response.Address || '';
          document.getElementById('phone').value = response.PhoneNumber || '';
          document.getElementById('email').value = response.Email || '';
          
          // Populate gender if available
          if (response.Gender) {
            const genderSelect = document.getElementById('gender');
            const genderValue = response.Gender.trim();

            if (Array.from(genderSelect.options).some(option => option.value === genderValue)) {
              genderSelect.value = genderValue;
            } else {
              console.error('Invalid gender value: ', genderValue);
            }
          }

          // Populate date of birth if available
          if (response.DateOfBirth && /^\d{4}-\d{2}-\d{2}$/.test(response.DateOfBirth)) {
            document.getElementById('dob').value = response.DateOfBirth;
          } else {
            console.error('Invalid date format or DateOfBirth not found');
          }
        } else {
          alert("Profile data not found."); // Only alert if profile data is not found
        }
      } else {
        alert("Failed to fetch profile data. Server returned status: " + xhr.status);
      }
    }
  };
  xhr.send();
}

</script>
