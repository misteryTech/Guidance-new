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
                    <h4 class="card-title">Administrator</h4>


                    
                    <form class="form-sample" id="AdminRegistration" action="process/update-administrator.php" method="POST">
  <p class="card-description">Administrator Registration Form</p>
  
  <div class="row">
    <!-- Administrator ID -->
    <div class="col-md-6">
  <div class="form-group row">
    <label for="adminID" class="col-sm-3 col-form-label">Administrator ID <span class="notification">*</span></label>
    <div class="col-sm-9">
      <input 
        type="text" 
        class="form-control" 
        id="adminID" 
        name="adminID" 
        maxlength="10" 
        pattern="\d+" 
        title="Administrator ID must be a number" 
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
    <!-- Username -->
    <div class="col-md-6">
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


    <!-- Password -->
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
    


window.onload = function() {




  // Toggle Password Visibility
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
  
  togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
  });


  fetchAdministratorProfile();
};

function fetchAdministratorProfile() {
  const xhr = new XMLHttpRequest(); 
  xhr.open('GET', 'process/fetch-admin-profile.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const profile = JSON.parse(xhr.responseText); 
      if (profile) {
        // Populate form fields with profile data
        document.getElementById('adminID').value = profile.Admin_Id;
        document.getElementById('firstName').value = profile.FirstName;
        document.getElementById('lastName').value = profile.LastName;

        // Correctly populate gender if available
        if (profile.Gender) {
          const genderSelect = document.getElementById('gender');
          const genderValue = profile.Gender.trim(); // Ensure no extra spaces
          
          // Check if the gender value matches an option
          if (Array.from(genderSelect.options).some(option => option.value === genderValue)) {
            genderSelect.value = genderValue; // Set the selected gender value
          } else {
            console.error('Invalid gender value: ', genderValue);
          }
        }

     // Correctly populate date of birth if available
     if (profile.DateOfBirth && /^\d{4}-\d{2}-\d{2}$/.test(profile.DateOfBirth)) {
          document.getElementById('dob').value = profile.DateOfBirth; // Make sure 'dob' is the correct key
        } else {
          console.error('Invalid date format or dob not found');
        }


        document.getElementById('address').value = profile.Address;
        document.getElementById('phone').value = profile.PhoneNumber;
        document.getElementById('email').value = profile.Email;
        document.getElementById('username').value = profile.Username;
        document.getElementById('password').value = profile.Password;
      } else {
        alert("Profile data not found.");
      }
    }
  };
  xhr.send();
}
</script>
