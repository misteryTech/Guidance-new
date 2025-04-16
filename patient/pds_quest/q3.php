<div class="tab-pane fade" id="pills-q3" role="tabpanel">
                                   <p class="card-description">For Students Not Officially Resident Of General Santos City (Optional)</p>
                                <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group row">
                                               <label for="">Where did you stay here in General Santos City</label>

                                               <div class="col-sm-9">
                                                   <select class="form-select" name="stay_in_gensan" required>
                                                       <option>--SELECT--</option>
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
                                                    <input type="text" class="form-control" name="landlord_name" required>
                                                </div>
                                            </div>
                                        </div>

                                        <p><strong>School Work and Progress Record</strong></p>
  
  <div id="education-container"></div>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    const educationLevels = ["Kindergarten", "Elementary", "Junior High School", "Senior High School"];
    let container = document.getElementById("education-container");

    educationLevels.forEach((level, index) => {
        let levelNumber = index + 1;
        const groupId = `edu-group-${levelNumber}`;
        
        container.innerHTML += `
            <div class="education-level mb-4 border p-3" id="${groupId}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6>${level}</h6>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input edu-na" id="edu-na-${levelNumber}" data-group="${levelNumber}">
                        <label class="form-check-label" for="edu-na-${levelNumber}">N/A</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label>Name of School</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control edu-field-${levelNumber}" name="school${levelNumber}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label>Address of School</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control edu-field-${levelNumber}" name="school${levelNumber}address" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label>Honors/Awards Received</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control edu-field-${levelNumber}" name="school${levelNumber}awards" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    // Apply checkbox logic after rendering
    document.querySelectorAll(".edu-na").forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const group = this.getAttribute("data-group");
            const fields = document.querySelectorAll(`.edu-field-${group}`);

            if (this.checked) {
                fields.forEach(field => {
                    field.value = "N/A";
                    field.disabled = true;
                });
            } else {
                fields.forEach(field => {
                    if (field.value === "N/A") field.value = "";
                    field.disabled = false;
                });
            }
        });
    });
});
</script>


                                </div>
 </div>
