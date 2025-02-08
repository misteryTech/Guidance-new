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



                    
                    <form class="form-sample" id="counselorRegistration" action="process/pds-registration.php" method="POST">
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
  <div class="col-md-6">
  <div class="form-group row">
    <label for="firstName" class="col-sm-3 col-form-label">First Name <span class="notification">*</span></label>
    <div class="col-sm-9">
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

<div class="col-md-6">
  <div class="form-group row">
    <label for="lastName" class="col-sm-3 col-form-label">Last Name <span class="notification">*</span></label>
    <div class="col-sm-9">
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
        <label for="birthaddress" class="col-sm-2 col-form-label">Birth Address <span class="notification">*</span></label>
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
                      type="text" 
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

    <!-- <div class="col-md-6">
  <div class="form-group row">
    <label for="username" class="col-sm-3 col-form-label">Username <span class="notification">*</span></label>
    <div class="col-sm-9">
      <input 
        type="text" 
        class="form-control" 
        id="username" 
        name="username" 
        oninput="checkUsername()" 
        required 
      />
      <p id="usernameError" style="color: red; display: none;">Username is already taken.</p>
      <p id="usernameSuccess" style="color: green; display: none;">Username is available.</p>
    </div>
  </div>
</div>



    <div class="col-md-6">
      <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password <span class="notification">*</span></label>
        <div class="col-sm-9">
          <input 
            type="password" 
            class="form-control" 
            id="password" 
            name="password" 
            required 
          />
          <button type="button" id="togglePassword" class="btn btn-outline-secondary btn-sm mt-2">Show Password</button>
        </div>
      </div>
    </div>
  </div>
 -->


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
<p class="card-description">FOR STUDENTS NOT OFFICIALLY RESIDENT OF GENERAL SANTOS CITY (OPTIONAL)</p>

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
              <input type="text" class="form-control" name="landlord_number" >
          </div>
      </div>
  </div>
</div>

<hr>
<p class="card-description">FAMILY HISTORY</p>

<div class="row">
  <div class="col-md-6">
      <h2>Father</h2>
      <div class="form-group row">
          <label for="">Firstname</label>
          <div class="col-sm-9">
              <input type="text" class="form-control"  name="father_firstname">
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <h2>Mother</h2>
      <div class="form-group row">
          <label for="">Firstname</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="mother_firstname">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Lastname</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="father_lastname" >
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Lastname</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="mother_lastname" >
          </div>
      </div>
  </div>
</div>






<div class="row">
  <!-- Religion Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="religion1">Religion</label>
          <div class="col-sm-9">
              <select class="form-select" id="freligion" >
                  <option value="" disabled selected>Select your religion</option>
                  <option value="Christian">Christian</option>
                  <option value="Islam">Islam</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddhist">Buddhist</option>
                  <option value="Other">Other</option>
              </select>
          </div>
      </div>
  </div>

  <!-- Religion Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="religion2">Religion</label>
          <div class="col-sm-9">
              <select class="form-select" id="mreligion">
                  <option value="" disabled selected>Select your religion</option>
                  <option value="Christian">Christian</option>
                  <option value="Islam">Islam</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddhist">Buddhist</option>
                  <option value="Other">Other</option>
              </select>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Tribe Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="tribe1">Tribe</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="ftribe" >
          </div>
      </div>
  </div>

  <!-- Tribe Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="tribe2">Tribe</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="mtribe">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Contact Number Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="contact1">Landline/Cellphone No.</label>
          <div class="col-sm-9">
              <input type="tel" class="form-control" id="contact1" name="fcellphone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx" >
          </div>
      </div>
  </div>

  <!-- Contact Number Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="contact2">Landline/Cellphone No.</label>
          <div class="col-sm-9">
              <input type="tel" class="form-control" id="contact2" name="mcellphone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Email Address Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="email1">Email Address</label>
          <div class="col-sm-9">
              <input type="email" class="form-control" id="email1" name="femail" placeholder="example@email.com" >
          </div>
      </div>
  </div>

  <!-- Email Address Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="email2">Email Address</label>
          <div class="col-sm-9">
              <input type="email" class="form-control" id="email2" name="memail" placeholder="example@email.com">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Highest Educational Attainment Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="edu1">Highest Educational Attainment</label>
          <div class="col-sm-9">
              <select class="form-select" id="edu1"  name="fschoolattain">
                  <option value="" disabled selected>Select your highest educational attainment</option>
                  <option value="High School">High School</option>
                  <option value="Undergraduate">Undergraduate</option>
                  <option value="Bachelor's Degree">Bachelor's Degree</option>
                  <option value="Master's Degree">Master's Degree</option>
                  <option value="Doctorate">Doctorate</option>
              </select>
          </div>
      </div>
  </div>

  <!-- Highest Educational Attainment Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="edu2">Highest Educational Attainment</label>
          <div class="col-sm-9">
              <select class="form-select" id="edu2" name="mschoolattain">
                  <option value="" disabled selected>Select your highest educational attainment</option>
                  <option value="High School">High School</option>
                  <option value="Undergraduate">Undergraduate</option>
                  <option value="Bachelor's Degree">Bachelor's Degree</option>
                  <option value="Master's Degree">Master's Degree</option>
                  <option value="Doctorate">Doctorate</option>
              </select>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Languages Spoken Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="flanguage">Language/s Spoken</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="flanguage" name="flanguage">
          </div>
      </div>
  </div>

  <!-- Languages Spoken Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="mlanguage">Language/s Spoken</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="mlanguage" name="mlanguage">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Occupation Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="foccupation">Occupation</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="foccupation"  name="foccupation">
          </div>
      </div>
  </div>

  <!-- Occupation Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="moccupation">Occupation</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="moccupation" name="moccupation">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Business/Office Address Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="fbusiness">Business/Office Address</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="business1" name="fbusiness" >
          </div>
      </div>
  </div>

  <!-- Business/Office Address Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="mbusiness">Business/Office Address</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="mbusiness" name="mbusiness">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Position Held Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="fposition">Position Held</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="fposition" name="fposition" >
          </div>
      </div>
  </div>

  <!-- Position Held Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="mposition">Position Held</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="mposition" name="mposition">
          </div>
      </div>
  </div>
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
                                 <input type="text" class="form-control" id="wife_educ" name="wife_educ">
                             </div>
                         </div>
                      </div>

                </div>

              </div>
           </div>        



           <div class="col-md-12">
                    <div class="form-group row">
                    <label><b>Other members of household? </b>(Relatives,Helpers,etc.)</label>
                          <h6>Household 1</h6>
                          <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Firstname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Lastname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1lname" name="household1lname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Sex</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Age</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Civil Status</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Relationship</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                          </div>




                          <h6>Household 2</h6>
                          <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Firstname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Lastname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1lname" name="household1lname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Sex</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Age</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Civil Status</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Relationship</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                          </div>





                          <h6>Household 3</h6>
                          <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Firstname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Lastname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1lname" name="household1lname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Sex</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Age</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Civil Status</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Relationship</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                          </div>



                          <h6>Household 4</h6>
                          <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Firstname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Lastname</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1lname" name="household1lname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Sex</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Age</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Civil Status</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Relationship</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                          </div>



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
          <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
          <label class="form-check-label" for="both-parents">Below Php 10,000.00</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
          <label class="form-check-label" for="father">10,000 – 20,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
          <label class="form-check-label" for="mother">20,001 – 30,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="grandparents" name="live_present" value="grandparents">
          <label class="form-check-label" for="grandparents">30,001 – 40,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="brothers-sisters" name="live_present" value="brothers-sisters">
          <label class="form-check-label" for="brothers-sisters">40,001 – 50,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="relatives" name="live_present" value="relatives">
          <label class="form-check-label" for="relatives">50,001 – 60,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="others" name="live_present" value="others">
          <label class="form-check-label" for="others">60,001 – 70,000</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="others" name="live_present" value="others">
          <label class="form-check-label" for="others">70,001 – 80,000</label>
        </div>

        <div class="form-check">
          <input type="radio" class="form-check-input" id="others" name="live_present" value="others">
          <label class="form-check-label" for="others">80,001 – Above</label>
        </div>
   
      </div>
    </div>


    <div class="col-md-12">
      <div class="form-group row">

              <h6>Transportation your family owns:</h6>
              <div class="col-sm-12 d-flex flex-wrap gap-4">
                <!-- Radio buttons for marital status -->
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                  <label class="form-check-label" for="both-parents">Car/SUV</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                  <label class="form-check-label" for="father">Jeep</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                  <label class="form-check-label" for="mother">Tricycle</label>
                </div>

                <div class="form-check">
                  <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                  <label class="form-check-label" for="mother">Motorcycle</label>
                </div>

        </div>
    </div>

    <div class="col-md-12">
      <div class="form-group row">

              <h6>Means of transportation going to school:</h6>
              <div class="col-sm-12 d-flex flex-wrap gap-4">
                <!-- Radio buttons for marital status -->
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                  <label class="form-check-label" for="both-parents">Car/SUV</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                  <label class="form-check-label" for="father">Jeep</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                  <label class="form-check-label" for="mother">Tricycle</label>
                </div>
        
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                  <label class="form-check-label" for="mother">Motorcycle</label>
                </div>

        </div>
    </div>


  </div>

  <hr>
  <p><strong>SCHOOL WORK AND PROGRESS RECORD</strong></p>
  
                          <h6>Kindergarten </h6>
                          <div class="row">
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Name of School (List all schools attended for every level)</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>
                              
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Address of School</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Honors/Awards Received</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                              <h6>Elementary</h6>
             
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Name of School (List all schools attended for every level)</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>
                              
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Address of School</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Honors/Awards Received</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              
                          <h6>Junior High School</h6>
                          
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Name of School (List all schools attended for every level)</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>
                              
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Address of School</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Honors/Awards Received</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              
                          <h6>Senior High School</h6>
                 
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Name of School (List all schools attended for every level)</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>
                              
                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Address of School</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">Honors/Awards Received</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                  <hr>
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Have you ever repeated a grade?</label>
                                            <div class="co-sm-12">
                                            <select class="form-select" id="edu1" >                                           
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
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Have you failed in any subjects?</label>
                                            <div class="co-sm-12">
                                            <select class="form-select" id="edu1" >                                           
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
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-12">
                                    <div class="form-group row">
                                          <label for="">What subjects in Elem & HS take most of your time ?</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>



                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Do you find school work difficult? </label>
                                            <div class="co-sm-12">
                                            <select class="form-select" id="edu1" >                                           
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
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
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
                      <div class="row">
                        <div class="col-md-12">
                              <div class="form-group row">
                                  <label for="">1.	Work Experience:  What work of occupational significance have you done at home or other people during 
                                 school year and vacations?</label>
                                    <div class="co-sm-12">
                                        <input type="text" class="form-control" id="household1fname" name="household1fname">
                                    </div>
                               </div>
                        </div>


                            <div class="col-md-12">
                              <div class="form-group row">
                                <label for="firstName" class="col-sm-5 col-form-label">2.	Employment Record:  Have you held any job?</label>
                                <div class="col-sm-3">
                                  <select class="form-select" id="edu1" >                                           
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
                                  <select class="form-select" id="edu1" >                                           
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                    </select>
                               
                                </div>
                              </div>
                            </div>



                            
                          <h6>Employment (1)</h6>
                   
                              <div class="col-md-3">
                                    <div class="form-group row">
                                          <label for="">Date of Employment</label>
                                            <div class="co-sm-12">
                                                <input type="date" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>
                              
                              <div class="col-md-9">
                                    <div class="form-group row">
                                          <label for="">Name of Employer, Company and Business Address</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Place of Employment</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>

                              <div class="col-md-6">
                                    <div class="form-group row">
                                          <label for="">Job Description</label>
                                            <div class="co-sm-12">
                                                <input type="text" class="form-control" id="household1fname" name="household1fname">
                                            </div>
                                    </div>
                              </div>


                                 
                          <h6>Employment (2)</h6>
                   
                   <div class="col-md-3">
                         <div class="form-group row">
                               <label for="">Date of Employment</label>
                                 <div class="co-sm-12">
                                     <input type="date" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>
                   
                   <div class="col-md-9">
                         <div class="form-group row">
                               <label for="">Name of Employer, Company and Business Address</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>


                   <div class="col-md-6">
                         <div class="form-group row">
                               <label for="">Place of Employment</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>

                   <div class="col-md-6">
                         <div class="form-group row">
                               <label for="">Job Description</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>


                      
                   <h6>Employment (3)</h6>
                   
                   <div class="col-md-3">
                         <div class="form-group row">
                               <label for="">Date of Employment</label>
                                 <div class="co-sm-12">
                                     <input type="date" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>
                   
                   <div class="col-md-9">
                         <div class="form-group row">
                               <label for="">Name of Employer, Company and Business Address</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>


                   <div class="col-md-6">
                         <div class="form-group row">
                               <label for="">Place of Employment</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>

                   <div class="col-md-6">
                         <div class="form-group row">
                               <label for="">Job Description</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>




                                 
                   <p><strong>VOCATIONAL OUTLOOK</strong></p>
                   <div class="col-md-12">
                         <div class="form-group row">
                               <label for="">a. What kind of vocation or employment do you like to go into?</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>

                   <div class="col-md-12">
                         <div class="form-group row">
                               <label for="">b. How would you prepare for it?</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>

                   <div class="col-md-12">
                         <div class="form-group row">
                               <label for="">c. What kind of job would you prefer? </label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>

                   <div class="col-md-12">
                         <div class="form-group row">
                               <label for="">d.	What are your plans after College?</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
                                 </div>
                         </div>
                   </div>

                   <p><strong>GENERAL PERSONALITY MAKE-UP</strong></p>

                   <div class="col-md-12">
                         <div class="form-group row">
                               <label for="">Words which you feel describe your general personality make-up</label>
                                 <div class="co-sm-12">
                                     <input type="text" class="form-control" id="household1fname" name="household1fname">
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
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                                </div>



                                <h6>Posture</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                                </div>


                                <h6>Health</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                                </div>


                                <h6>Manners</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                                </div>
                                

                                <h6>Conversational Ability</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                                     <div class="form-check">
                                       <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                       <label class="form-check-label" for="both-parents">Excellent</label>
                                     </div>
                                     <div class="form-check">
                                       <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                       <label class="form-check-label" for="father">Good</label>
                                     </div>
                                     <div class="form-check">
                                       <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                       <label class="form-check-label" for="mother">Fair</label>
                                     </div>

                                      <div class="form-check">
                                        <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                        <label class="form-check-label" for="mother">Poor</label>
                                      </div>

                                </div>



                                <h6>Concern for others</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                              </div>


                              <h6>Seriousness of purpose</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                              </div>
                              

                              <h6>Academic ability</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
                               </div>

                              </div>

                              <h6>Academic Achievement</h6>
                              <div class="col-sm-12 d-flex flex-wrap gap-5">
                               <!-- Radio buttons for marital status -->
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents">
                                 <label class="form-check-label" for="both-parents">Excellent</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="father" name="live_present" value="father">
                                 <label class="form-check-label" for="father">Good</label>
                               </div>
                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Fair</label>
                               </div>

                               <div class="form-check">
                                 <input type="radio" class="form-check-input" id="mother" name="live_present" value="mother">
                                 <label class="form-check-label" for="mother">Poor</label>
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
              <input type="text" class="form-control" id="relationship" >
          </div>
      </div>
  </div>

  <!-- Contact Numbers Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="emergency-contact">Contact Numbers</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="emergency-contact">
          </div>
      </div>
  </div>

  <!-- Complete Address Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="emergency-address">Complete Address</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="emergency-address">
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


//   window.onload = function() {
//     generatepatientId();
// };



window.onload = function() {




  // // Toggle Password Visibility
  // const togglePassword = document.querySelector('#togglePassword');
  // const password = document.querySelector('#password');
  
  // togglePassword.addEventListener('click', function () {
  //   const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  //   password.setAttribute('type', type);
  //   this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
  // });


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
