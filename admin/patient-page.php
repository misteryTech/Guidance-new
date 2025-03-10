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
                    <h4 class="card-title">Student</h4>
      <?php

    // Check if there's a session message for registration success or error
    $status = isset($_SESSION['registration_status']) ? $_SESSION['registration_status'] : '';
    $message = isset($_SESSION['registration_message']) ? $_SESSION['registration_message'] : '';
    
    // Clear the session variables after displaying the message (if needed)
    unset($_SESSION['registration_status']);
    unset($_SESSION['registration_message']);
      
      ?>



                    
                    <form class="form-sample" id="AdminRegistration" action="process/register-patient.php" method="POST">
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
         
      />
    </div>
  </div>
</div>

  </div>
  
  <div class="row">
  <div class="col-md-4">
  <div class="form-group row">
    <label for="firstName" class="col-sm-3 col-form-label">First Name <span class="notification">*</span></label>
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
    <label for="middleName" class="col-sm-3 col-form-label">Middle Name <span class="notification">*</span></label>
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
    <label for="lastName" class="col-sm-3 col-form-label">Last Name <span class="notification">*</span></label>
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


<!-- Password field and error message in your form -->
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
      <p id="passwordError" style="color: red; display: none;"></p> <!-- Password error message -->
    </div>
  </div>
</div>



  </div>

  <div class="row">
    <!-- Submit Button -->
    <div class="col-md-12 text-center">
    <button type="submit" class="btn btn-success" id="submitButton" >Register</button>

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

  // Single window.onload function
  window.onload = function() {
    
    checkFormValidity();  // Check form validity on page load
  };

  // Validate characters (for names or text inputs)
  function validateCharacters(input) {
    const regex = /^[a-zA-Z\s]+$/;
    const errorElement = document.getElementById(input.id + "Error");

    if (!regex.test(input.value)) {
      errorElement.style.display = "block";
    } else {
      errorElement.style.display = "none";
    }
  }

  // Toggle Password Visibility
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
  const passwordError = document.querySelector('#passwordError'); // Error message element


  togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
  });


  // Listen to input event on the password field to validate as the user types
  password.addEventListener('input', validatePassword);

  // Add form validation before submission
  const form = document.querySelector('#AdminRegistration');
  form.addEventListener('submit', function (event) {
    if (!validatePassword()) {
      event.preventDefault(); // Prevent form submission if password is invalid
      alert("Please correct the password requirements.");
    }
  });

  // Validate Phone
  function validatePhone() {
    var phoneInput = document.getElementById('phone');
    var phoneError = document.getElementById('phoneError');
    var valid = /^\d{1,11}$/.test(phoneInput.value);

    if (!valid) {
      phoneError.style.display = 'block';
      phoneInput.setCustomValidity("Invalid");
    } else {
      phoneError.style.display = 'none';
      phoneInput.setCustomValidity("");
    }
    checkFormValidity(); // Check if the form is valid after validating phone
  }

  // Validate Email
  function checkEmail() {
    const email = document.getElementById("email").value;
    const emailError = document.getElementById("emailError");
    const emailSuccess = document.getElementById("emailSuccess");

    if (email === "") {
      emailError.style.display = "none";
      emailSuccess.style.display = "none";
      checkFormValidity();  // Recheck form validity
      return;
    }

    // AJAX request to check email
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "validation/patient-check-email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = xhr.responseText;

        if (response === "exists") {
          emailError.style.display = "block";
          emailSuccess.style.display = "none";
        } else if (response === "available") {
          emailError.style.display = "none";
          emailSuccess.style.display = "block";
        }
        checkFormValidity(); // Check if the form is valid after email validation
      }
    };

    xhr.send("email=" + encodeURIComponent(email));
  }





  // Validate Username
  function checkUsername() {
    const username = document.getElementById("username").value;
    const usernameError = document.getElementById("usernameError");
    const usernameSuccess = document.getElementById("usernameSuccess");

    if (username === "") {
      usernameError.style.display = "none";
      usernameSuccess.style.display = "none";
      checkFormValidity();  // Recheck form validity
      return;
    }

    // AJAX request to check username
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "validation/patient-check-username.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = xhr.responseText;

        if (response === "exists") {
          usernameError.style.display = "block";
          usernameSuccess.style.display = "none";
        } else if (response === "available") {
          usernameError.style.display = "none";
          usernameSuccess.style.display = "block";
        }
        checkFormValidity(); // Check if the form is valid after username validation
      }
    };

    xhr.send("username=" + encodeURIComponent(username));
  }

  // Check if all form fields are valid before enabling the submit button
  function checkFormValidity() {
    const passwordValid = validatePassword();
    const phoneValid = document.getElementById('phone').validity.valid;
    const emailValid = document.getElementById('emailError').style.display === 'none' && document.getElementById('emailSuccess').style.display === 'block';
    const usernameValid = document.getElementById('usernameError').style.display === 'none' && document.getElementById('usernameSuccess').style.display === 'block';

    // If all fields are valid, enable the submit button
    if (passwordValid && phoneValid && emailValid && usernameValid) {
      submitButton.disabled = false; // Enable submit button
    } else {
      submitButton.disabled = true; // Disable submit button
    }
  }

  // Add event listeners to input fields to validate on change
  document.getElementById('phone').addEventListener('input', validatePhone);
  document.getElementById('email').addEventListener('input', checkEmail);
  document.getElementById('username').addEventListener('input', checkUsername);

  // Initially disable the submit button
  submitButton.disabled = true;
</script>


