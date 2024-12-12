<?php
    include("header.php");
?>



<style>
  .notification {
    color: red;
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
                    <h4 class="card-title">Patient</h4>
      <?php

  // Example of checking and displaying session messages for success or error
$status = isset($_SESSION['update_status']) ? $_SESSION['update_status'] : '';
$message = isset($_SESSION['update_message']) ? $_SESSION['update_message'] : '';

// Clear the session variables after displaying the message (optional)
unset($_SESSION['update_status']);
unset($_SESSION['update_message']);
      ?>



                    
                    <form class="form-sample" id="counselorRegistration" action="process/pds-registration.php" method="POST">
  <p class="card-description">Patient Registration Form</p>
  
  <div class="row">
    <!-- Counselor ID -->
    <div class="col-md-6">
         <div class="form-group row">
    <label for="patientId" class="col-sm-3 col-form-label">Patient ID <span class="notification">*</span></label>
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
              <select class="form-control"  name="civil_status" >
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
              <select class="form-control" name="birth_order">
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
<p class="card-description">FOR STUDENTS NOT OFFICIALLY RESIDENT OF GENERAL SANTOS CITY</p>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Where did you stay here in General Santos City</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="stay_in_gensan" >
          </div>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Name of Landlord/Landlady/Employer:</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="stay_in_gensan" >
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
          <label for="">Contact Number:</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" name="contact_number" >
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
              <select class="form-control" id="religion1" >
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
              <select class="form-control" id="religion2">
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
              <input type="text" class="form-control" id="tribe1" >
          </div>
      </div>
  </div>

  <!-- Tribe Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="tribe2">Tribe</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="tribe2">
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
              <input type="tel" class="form-control" id="contact1" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx" >
          </div>
      </div>
  </div>

  <!-- Contact Number Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="contact2">Landline/Cellphone No.</label>
          <div class="col-sm-9">
              <input type="tel" class="form-control" id="contact2" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
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
              <input type="email" class="form-control" id="email1" placeholder="example@email.com" >
          </div>
      </div>
  </div>

  <!-- Email Address Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="email2">Email Address</label>
          <div class="col-sm-9">
              <input type="email" class="form-control" id="email2" placeholder="example@email.com">
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
              <select class="form-control" id="edu1" >
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
              <select class="form-control" id="edu2">
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
          <label for="languages1">Language/s Spoken</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="languages1" >
          </div>
      </div>
  </div>

  <!-- Languages Spoken Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="languages2">Language/s Spoken</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="languages2">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Occupation Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="occupation1">Occupation</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="occupation1" >
          </div>
      </div>
  </div>

  <!-- Occupation Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="occupation2">Occupation</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="occupation2">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Business/Office Address Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="business1">Business/Office Address</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="business1" >
          </div>
      </div>
  </div>

  <!-- Business/Office Address Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="business2">Business/Office Address</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="business2">
          </div>
      </div>
  </div>
</div>

<div class="row">
  <!-- Position Held Field -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="position1">Position Held</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="position1" >
          </div>
      </div>
  </div>

  <!-- Position Held Field 2 -->
  <div class="col-md-6">
      <div class="form-group row">
          <label for="position2">Position Held</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="position2">
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
