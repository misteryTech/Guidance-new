<div class="tab-pane fade" id="pills-q4" role="tabpanel">
                                   <p class="card-description">Family History</p>

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
                                                                    <select class="form-select" name="<?= $key . '_' . $field ?>" required>
                                                                        <option value="" disabled selected>Select your religion</option>
                                                                        <?php foreach ($religions as $religion) : ?>
                                                                            <option value="<?= $religion ?>"><?= $religion ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                <?php elseif ($field === 'schoolattain') : ?>
                                                                    <select class="form-select" name="<?= $key . '_' . $field ?>" required>
                                                                        <option value="" disabled selected>Select your highest educational attainment</option>
                                                                        <?php foreach ($educationOptions as $option) : ?>
                                                                            <option value="<?= $option ?>"><?= $option ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                <?php elseif ($field === 'cellphone') : ?>
                                                                    <input type="number" class="form-control" name="<?= $key . '_' . $field ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx" required>
                                                                <?php elseif ($field === 'email') : ?>
                                                                    <input type="email" class="form-control" name="<?= $key . '_' . $field ?>" placeholder="example@email.com" required>
                                                                <?php else : ?>
                                                                    <input type="text" class="form-control" name="<?= $key . '_' . $field ?>" required>
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
                                              <input type="radio" class="form-check-input" id="living-together" name="marital_status" value="living-together" required>
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


                                        <div class="col-md-12">
                                         <div class="form-group row">
                                           <label><b>Where do you live at present?</b></label>
                                           <div class="col-sm-12 d-flex flex-wrap gap-5">
                                             <!-- Radio buttons for marital status -->
                                             <div class="form-check">
                                               <input type="radio" class="form-check-input" id="both-parents" name="live_present" value="both-parents" required> 
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
                                    </div>                          
                            </div>