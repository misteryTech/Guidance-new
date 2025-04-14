<?php include("header.php"); ?>
<div class="container-scroller">
<?php include("top-navigation.php"); ?>

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

.is-invalid {
    border: 1px solid red;
    background-color: #fff0f0;
  }
</style>


<div class="container-fluid page-body-wrapper">
    <?php include("sidebar.php"); ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Student Registration Form</h4>

                    <!-- Nav Pills -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-q1-tab" data-bs-toggle="pill" data-bs-target="#pills-q1" type="button" role="tab">Question 1</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q2-tab" data-bs-toggle="pill" data-bs-target="#pills-q2" type="button" role="tab">Question 2</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q3-tab" data-bs-toggle="pill" data-bs-target="#pills-q3" type="button" role="tab">Question 3</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q4-tab" data-bs-toggle="pill" data-bs-target="#pills-q4" type="button" role="tab">Question 4</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q5-tab" data-bs-toggle="pill" data-bs-target="#pills-q5" type="button" role="tab">Question 5</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q6-tab" data-bs-toggle="pill" data-bs-target="#pills-q6" type="button" role="tab">Question 6</button>
                        </li>

                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q7-tab" data-bs-toggle="pill" data-bs-target="#pills-q7" type="button" role="tab">Question 7</button>
                        </li>

                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q8-tab" data-bs-toggle="pill" data-bs-target="#pills-q8" type="button" role="tab">Question 8</button>
                        </li>

                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q9-tab" data-bs-toggle="pill" data-bs-target="#pills-q9" type="button" role="tab">Question 9</button>
                        </li>


                          
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q10-tab" data-bs-toggle="pill" data-bs-target="#pills-q10" type="button" role="tab">Question 10</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q11-tab" data-bs-toggle="pill" data-bs-target="#pills-q11" type="button" role="tab">Question 11</button>
                        </li>

                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-q12-tab" data-bs-toggle="pill" data-bs-target="#pills-q12" type="button" role="tab">Question 12</button>
                        </li>

                    </ul>

                    <!-- Tab Content -->
                    <form class="form-sample" id="studentPds" action="process/pds_version2.php" method="POST">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Question 1 -->
                            <div class="tab-pane fade show active" id="pills-q1" role="tabpanel">
                                    <div class="row">
                                              <div class="col-md-4">
                                                   <div class="form-group row">
                                                      <label for="patientId" class="col-sm-5 col-form-label">Student ID <span class="notification">*</span></label>
                                                         <div class="col-sm-10">
                                                              <input 
                                                                 type="text" 
                                                                 class="form-control" 
                                                                 id="patientId" 
                                                                 name="patientId" 
                                                                 value="<?= $Patient_Id ?>"
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
                                                        
                                                            name="firstName" 
                                                            value="<?= $first_name; ?>"
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
                                                                value= "<?= $middle_name; ?>"
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
                                                           value= "<?= $last_name; ?>"
                                                            required 
                                                          />
                                                          <p id="lastNameError" style="color: red; display: none;">Last name must contain characters only.</p>
                                                         </div>
                                                   </div>
                                               </div>


                                                <div class="col-md-4">
                                                  <div class="form-group row">
                                                    <label for="gender" class="col-sm-5 col-form-label">Sex <span class="notification">*</span></label>
                                                    <div class="col-sm-10">
                                                      <select class="form-select" id="gender" name="gender" required>
                                                        <option value="<?= $gender?>"><?= $gender?></option>
                                                       
                                                      </select>
                                                    </div>
                                                  </div>
                                                </div>

                                                
                                                 <div class="col-md-4">
                                                   <div class="form-group row">
                                                     <label for="dob" class="col-sm-5 col-form-label">Date of Birth <span class="notification">*</span></label>
                                                     <div class="col-sm-10">
                                                       <input type="date" class="form-control" value="<?= $dob ?>" id="dob" name="dob" required />
                                                     </div>
                                                   </div>
                                                 </div>
                                                      
                                                 <div class="col-md-4">
                                                   <div class="form-group row">
                                                   <label for="age" class="col-sm-5 col-form-label">Age <span class="notification">*</span></label>
                                                     <div class="col-sm-10">
                                                       <input type="text" class="form-control" id="age" name="age" required  />
                                                     </div>
                                                   </div>
                                                 </div>


                                                 
                                                 <div class="col-md-6">
                                                   <div class="form-group row">
                                                   <label for="phone" class="col-sm-5 col-form-label">Phone Number <span class="notification">*</span></label>
                                                     <div class="col-sm-10">
                                                     <input 
                                                      type="number" 
                                                      class="form-control" 
                                                      id="phone" 
                                                      name="phone" 
                                                        value="<?= $admin['PhoneNumber'] ?>"
                                                      required 
                                                    />
                                                     </div>
                                                   </div>
                                                 </div>



                                                 
                                                 <div class="col-md-6">
                                                   <div class="form-group row">
                                                   <label for="email" class="col-sm-5 col-form-label">Email <span class="notification">*</span></label>
                                                     <div class="col-sm-10">
                                                     <input 
                                                        type="email" 
                                                        class="form-control" 
                                                        id="email" 
                                                        name="email" 
                                                        value="<?= $admin['Email'] ?>"
                                                        required 
                                                      />
                                                     </div>
                                                   </div>
                                                 </div>



                                                 <div class="col-md-12">
                                                   <div class="form-group row">
                                                   <label for="address" class="col-sm-5 col-form-label">Address <span class="notification">*</span></label>
                                                     <div class="col-sm-11">
                                                     <input type="text" class="form-control" value="<?= $admin['Address']?>" id="address" name="address" />
                                                     </div>
                                                   </div>
                                                 </div>

                                                 
                                                 <div class="col-md-12">
                                                   <div class="form-group row">
                                                   <label for="birthaddress" class="col-sm-5 col-form-label">Birth Address <span class="notification">*</span></label>
                                                     <div class="col-sm-11">
                                                     <input type="text" class="form-control"  id="birthaddress" name="birthaddress"  required/>
                                                     </div>
                                                   </div>
                                                 </div>

                                     </div>

                            </div>

                            <!-- Question 2 -->
                            <?php include("pds_quest/q2.php"); ?>
                            <!-- Question 3 -->
                            <?php include("pds_quest/q3.php"); ?>
                             <!-- Question 4 -->
                             <?php include("pds_quest/q4.php"); ?>
                           <!-- Question 5 -->
                           <?php include("pds_quest/q5.php"); ?>
                            <!-- Question 6 -->
                            <?php include("pds_quest/q6.php"); ?>
                          <!-- Question 7 -->
                          <?php include("pds_quest/q7.php"); ?>
                          <!-- Question 8-->
                          <?php include("pds_quest/q8.php"); ?>
                              <!-- Question 9-->
                              <?php include("pds_quest/q9.php"); ?>
                            <!-- Question 10-->
                            <?php include("pds_quest/q10.php"); ?>
                             <!-- Question 10-->
                             <?php include("pds_quest/q11.php"); ?>
                             <!-- Question 10-->
                             <?php include("pds_quest/q12.php"); ?>
                                     
                            </div>
              
                        </div>

                                       
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
<script>
// Utility to handle logic for Yes/No + input field pairing
function handleYesNo(selectId, inputId) {
    const select = document.getElementById(selectId);
    const input = document.getElementById(inputId);

    select.addEventListener('change', function () {
        if (this.value === 'No') {
            input.value = 'N/A';
       
        } else {
            input.value = '';
            input.disabled = false;
        }
    });

    // Trigger on page load (optional, in case default is No)
    if (select.value === 'No') {
        input.value = 'N/A';
        input.disabled = true;
    }
}

// Attach the handlers
handleYesNo('repeat_grade', 'repeat_why');
handleYesNo('failed_subject', 'listfailed');
handleYesNo('difficultinschool', 'difficultinschoolwhy');
handleYesNo('basic_benefits', 'wordkexperience');

// Household logic with N/A checkbox
const householdCount = 4;
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("household-container");

    for (let i = 1; i <= householdCount; i++) {
        container.innerHTML += `
            <div class="household-group mb-3 border p-3" id="household-group-${i}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6>Household ${i}</h6>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input household-na" id="household${i}-na" data-group="${i}">
                        <label class="form-check-label" for="household${i}-na">N/A</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" class="form-control household-field-${i}" id="household${i}fname" name="household${i}fname" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" class="form-control household-field-${i}" id="household${i}lname" name="household${i}lname" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sex</label>
                            <input type="text" class="form-control household-field-${i}" id="household${i}sex" name="household${i}sex" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control household-field-${i}" id="household${i}age" name="household${i}age" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Civil Status</label>
                            <input type="text" class="form-control household-field-${i}" id="household${i}civilstatus" name="household${i}civilstatus" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Relationship</label>
                            <input type="text" class="form-control household-field-${i}" id="household${i}relationship" name="household${i}relationship" required>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // N/A Checkbox logic
    document.querySelectorAll('.household-na').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const group = this.getAttribute('data-group');
            const fields = document.querySelectorAll(`.household-field-${group}`);

            if (this.checked) {
                fields.forEach(field => {
                    field.value = 'N/A';
                    field.disabled = true;
                });
            } else {
                fields.forEach(field => {
                    if (field.value === 'N/A') field.value = '';
                    field.disabled = false;
                });
            }
        });
    });
});


// Employment logic
document.addEventListener("DOMContentLoaded", function () {
    const numEmployments = 3; // Adjust this number if needed
    let container = document.getElementById("employment-container");

    for (let i = 1; i <= numEmployments; i++) {
        container.innerHTML += `
            <div class="card p-3 mb-3" id="employment-box-${i}">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>Employment (${i})</h6>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input na-checkbox" id="employment${i}_na" data-group="${i}">
                        <label class="form-check-label" for="employment${i}_na">N/A</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label>Date of Employment</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control employment-field-${i}" name="employment${i}_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label>Name of Employer, Company, and Business Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control employment-field-${i}" name="employment${i}_company" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Place of Employment</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control employment-field-${i}" name="employment${i}_place" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Job Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control employment-field-${i}" name="employment${i}_job" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Add behavior for N/A checkboxes
    document.querySelectorAll('.na-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const group = this.getAttribute('data-group');
            const fields = document.querySelectorAll(`.employment-field-${group}`);

            if (this.checked) {
                fields.forEach(field => {
                    if (field.type === "date") {
                        field.value = '';
                    } else {
                        field.value = 'N/A';
                    }
                    field.disabled = true;
                });
            } else {
                fields.forEach(field => {
                    field.value = '';
                    field.disabled = false;
                });
            }
        });
    });
});

// Validation for required fields before tab switch
const tabButtons = document.querySelectorAll('#pills-tab .nav-link');
tabButtons.forEach(button => {
    button.addEventListener('click', function (e) {
        const currentTab = document.querySelector('.tab-pane.active');
        const requiredFields = currentTab.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if (!valid) {
            e.preventDefault(); // prevent tab switch
            alert('Please fill in all required fields before proceeding to the next question.');
        }
    });
});
// Validation for form submission
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

form.addEventListener('submit', function (e) {  
    const requiredFields = form.querySelectorAll('[required]');
    let valid = true;
    let firstInvalid = null;

    requiredFields.forEach(field => {
        const isHidden = field.offsetParent === null || field.disabled;

        if (!isHidden && !field.value.trim()) {
            valid = false;
            field.classList.add('is-invalid');
            if (!firstInvalid) firstInvalid = field;
        } else {
            field.classList.remove('is-invalid');
        }
    });

    if (!valid) {
        e.preventDefault();
        alert('Please complete all required fields.');
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalid.focus();
        }
    }
    });
});





// Logic for N/A in the "stay_in_gensan" section
const staySelect = document.querySelector('select[name="stay_in_gensan"]');
const landlordName = document.querySelector('input[name="landlord_name"]');
const landlordNumber = document.querySelector('input[name="landlord_number"]');

staySelect.addEventListener('change', function () {
    if (this.value === 'N/A') {
        landlordName.value = 'N/A';
        landlordNumber.value = '0000000000';
 
    } else {
        // Clear and make editable again
        if (landlordName.value === 'N/A') landlordName.value = '';
        if (landlordNumber.value === '0000000000') landlordNumber.value = '';

    }
});

// Calculate age from date of birth
function calculateAge() {
    const dobInput = document.getElementById('dob');
    const ageInput = document.getElementById('age');

    if (!dobInput.value) return;

    const dob = new Date(dobInput.value);
    const today = new Date();

    let age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();
    const dayDiff = today.getDate() - dob.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
        age--;
    }

    ageInput.value = age >= 0 ? age : '';
}

// Run on page load
window.addEventListener('DOMContentLoaded', calculateAge);

// Run when dob changes
document.getElementById('dob').addEventListener('change', calculateAge);

</script>
