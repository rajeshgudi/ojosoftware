<?php
$path = base_url('template1/');
?>

<style type="text/css">
  #profile-container {
    overflow: hidden;
  }

  #profile-container img {
    width: 150px;
    height: 140px;
  }

  #imageUpload {
    display: none;
  }
</style>

<div class="content-body" style="margin-top: -1%;">
  <!-- Justified With Top Border start -->
  <section id="basic-tabs-components">
    <div class="row match-height">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Patients Registration</h4>
          </div>
          <div class="card-content" style="margin-top: -32px;">
            <div class="card-body">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
                    <l id="tab_tit">Add Patients Registration<l>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Follow-up patient</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View/Edit/Delete</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Followup List</a>
                </li>
                <?php $host_tvm = explode('.', $_SERVER['HTTP_HOST'])[0];
                if ($host_tvm == 'deh') { ?>
                  <li class="nav-item">
                    <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">Campaign List</a>
                  </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab7" data-toggle="tab" aria-controls="tab7" href="#tab7" aria-expanded="false">Telephonic Patients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab6" data-toggle="tab" aria-controls="tab6" href="#tab6" aria-expanded="false">ID Card</a>
                </li>
                <!-- <li class="nav-item">
                                                <a class="nav-link" id="base-tab8" data-toggle="tab" aria-controls="tab8" href="#tab8" onclick="getsummary();" aria-expanded="false">Advanced Search</a>
                                            </li> -->
              </ul>
              <div id="folmod"></div>
              <div id="clickkcamps"></div>
              <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                  <form enctype="multipart/form-data" method="post" id="patientreg">
                    <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="col-sm-3 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Title: <span class="text-danger">*</span></label>
                              <select class="form-control" name="patient_title_id" id="patient_title_id" onchange="getgender(this.value);">
                                <option value="">Select Title</option>
                                <?php if ($patient_titles) {
                                  foreach ($patient_titles as $data) { ?>
                                    <option value="<?php echo $data['patient_title_id']; ?>"><?php echo $data['name']; ?></option>
                                <?php }
                                } ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                              <label for="lastname">First Name: <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="fname" name="fname">
                            </div>
                          </div>

                          <div class="col-sm-3 col-md-3 mand">
                            <div class="form-group">
                              <label for="lastname">Last Name: </label>
                              <input type="text" class="form-control" id="lname" name="lname">
                            </div>
                          </div>

                          <div class="col-sm-3 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Gender: <span class="text-danger">*</span></label>
                              <select class="form-control" name="gender_id" id="gender_id">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Transgender</option>
                              </select>
                            </div>
                          </div>



                          <div class="col-sm-3 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Age: <span class="text-danger">*</span></label>
                              <div class="row">
                                <div class="col-md-4 p-0">
                                  <input type="text" onkeyup="ageChanged()" class="form-control" id="agey" name="agey" placeholder="YY">
                                </div>
                                <div class="col-md-4 p-0">
                                  <input type="text" onkeyup="ageChanged()" class="form-control" id="agem" name="agem" placeholder="MM">
                                </div>
                                <div class="col-md-4 p-0">
                                  <input type="text" onkeyup="ageChanged()" class="form-control" id="aged" name="aged" placeholder="DD">
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="col-sm-2 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Date Of Birth: <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                          </div>





                          <div class="col-sm-3 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Mobile No: <span class="text-danger">*</span></label>
                              <input type="text" class="form-control phone-inputmask" id="mobileno" name="mobileno" onchange="checkduplicateuser()">
                            </div>
                          </div>
                          <div class="col-sm-2 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Source: <span class="text-danger">*</span></label>
                              <select class="form-control select2" name="source" id="source">
                                <option value="">Select Sources</option>
                                <?php if ($sources) {
                                  foreach ($sources as $data) { ?>
                                    <option value="<?php echo $data['source_id']; ?>"><?php echo $data['name']; ?></option>
                                <?php }
                                } ?>
                              </select>
                            </div>
                          </div>




                          <div class="col-sm-3 col-md-2">
                            <div class="form-group">
                              <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
                              <select class="form-control select2" name="doctor_id" id="doctor_id">
                                <option value="">Select Doctor</option>
                                <?php if ($doctors) {
                                  foreach ($doctors as $data) { ?>
                                    <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                <?php }
                                } ?>
                              </select>
                            </div>
                          </div>

                          <div id="appointmentdata-show"></div>
                          <div class="col-sm-3 col-md-2" <?php
                                                          if ($conf_settings[0]['app_type'] == 2) {
                                                          ?> style="display:none;" <?php
                                                                                  }
                                                                                    ?>>
                            <div class="form-group">
                              <label for="lastname">Appt Type: <span class="text-danger">*</span><span onclick="getappointmentopd()" class="notification-tag badge badge-danger float-right m-0"> %</span></label>
                              <select class="form-control select2" name="appointment_type_id" id="appointment_type_id" onchange="getappointmentopd()">
                                <option value="">Select Appointment Type</option>
                                <?php if ($appointmenttypes) {
                                  foreach ($appointmenttypes as $data) { ?>
                                    <option value="<?php echo $data['appointment_type_id']; ?>"><?php echo $data['name']; ?></option>
                                <?php }
                                } ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-2" <?php
                                                if ($conf_settings[0]['pat_mod'] == 2) {
                                                ?> style="display:none;" <?php
                                                                        }
                                                                          ?>>
                            <label for="lastname">Modeofpay: <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="modeofpay_id" id="modeofpay_id">
                              <option value="">Select Modeofpay</option>
                              <?php if ($modeofpays) {
                                foreach ($modeofpays as $data) {
                              ?>
                                  <option value="<?php echo $data['modeofpay_id']; ?>"><?php echo $data['name']; ?></option>
                              <?php
                                }
                              } ?>
                            </select>
                          </div>

                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="lastname">Address: </label>
                          <textarea class="form-control" name="address" id="address" rows="5"></textarea>
                        </div>
                      </div>
                    </div>


                    <div class="row">


                      <div class="col-sm-2 col-md-2 mand">
                        <div class="form-group">
                          <label for="lastname">Description: </label>
                          <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2 ">
                        <div class="form-group">
                          <label for="lastname">Drug Alergy :<span class="text-danger">*</span> </label>
                          <input type="text" class="form-control" name="drugalergy" id="drugalergy">
                        </div>
                      </div>

                      <div class="col-sm-1 col-md-1" style="display:none;">
                        <div class="form-group">
                          <label for="lastname">Campaign : </label>
                          <select class="form-control" name="campconduct" id="campconduct">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4 col-md-2" style="display:none;">
                        <div class="form-group">
                          <label for="lastname">Card No : </label>
                          <input type="text" class="form-control" name="cardno" id="cardno">
                        </div>
                      </div>

                      <div class="col-sm-1 col-md-2 mand">
                        <div class="form-group">
                          <label for="lastname">City: </label>
                          <select class="form-control select2" name="city_id" id="city_id">
                            <option value="">Select City</option>
                            <?php if ($citys) {
                              foreach ($citys as $data) { ?>
                                <option value="<?php echo $data['city_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-1 col-md-3 mand">
                        <div class="form-group">
                          <label for="lastname">Area: </label>
                          <select class="form-control select2" name="area_id" id="area_id">
                            <option value="">Select Area</option>
                            <?php if ($area) {
                              foreach ($area as $data) { ?>
                                <option value="<?php echo $data['area_id']; ?>"><?php echo $data['name']; ?>-<?php echo $data['pincode']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 mand">
                        <div class="form-group">
                          <label for="lastname">Patient type: </label>
                          <select class="form-control" name="pat_type" id="pat_type">
                            <option value="1">Walk-In</option>
                            <option value="2">Telephone</option>
                            <option value="3">VIP</option>
                            <option value="4">Camp</option>
                          </select>
                        </div>
                      </div>


                      <div class="col-md-3 mand">
                        <div class="form-group">
                          <label for="lastname">Doctor Referral Name: </label>
                          <input type="text" name="doc_ref_name" id="doc_ref_name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3 mand">
                        <div class="form-group">
                          <label for="lastname">Doctor Contact No: </label>
                          <input type="text" name="doc_mob" id="doc_mob" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Appointment Date: </label>
                          <input type="date" class="form-control appointment_date" name="appointment_date" id="appointment_date" />
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Appointment Time: </label>
                          <input type="time" class="form-control appointment_time" name="appointment_time" id="appointment_time" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="checkbox" value="1" id="mandatory" name="mandatory" onclick="mandatoryclick();" />
                          <label><span style="color:red;">* Mandatory Filed Only </span></label>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group mt-1" style="display: none;">
                          <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                          <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                          <label for="switcheryColor2" class="card-title ml-1">Active</label>
                        </div>
                      </div>

                    </div>


                    <div class="row" style="display:none;">


                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Gmail: </label>
                          <input type="text" class="form-control" id="gmail" name="gmail">
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Whatsapp No: </label>
                          <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Occupation: </label>
                          <input type="text" class="form-control" id="occupation" name="occupation">
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Referral name: </label>
                          <select class="form-control select2" name="referral_masters_id" id="referral_masters_id">
                            <option value="">Select Referral name</option>
                            <?php if ($referral_masters) {
                              foreach ($referral_masters as $data) { ?>
                                <option value="<?php echo $data['referral_master_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Patient Category: <span class="text-danger">*</span></label>
                          <select class="form-control select2" name="patient_category_id" id="patient_category_id">

                            <?php if ($pateintcategory) {
                              foreach ($pateintcategory as $data) { ?>
                                <option value="<?php echo $data['patient_category_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Emergency: </label>
                          <select class="form-control" name="emergency_id" id="emergency_id">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-2 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Select print: <span class="text-danger">*</span></label>
                          <select class="form-control" name="print" id="print">
                            <option value="1">A4</option>
                            <option value="3">A5</option>

                            <option value="2">A4 landscape</option>

                            <option value="4">A5 landscape</option>
                          </select>
                        </div>
                      </div>




                      <div class="col-sm-3 col-md-1">
                        <div class="form-group">
                          <label for="lastname">Billing : </label>
                          <select class="form-control" name="billing" id="billing">
                            <?php if ($conf_settings[0]['pat_reg_billprint'] == 1) {
                            ?>
                              <option value="0">Yes</option>
                            <?php } ?>

                            <?php if ($conf_settings[0]['pat_reg_billprint'] == 2) {
                            ?>
                              <option value="1">No</option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>



                      <div class="col-md-2">
                        <label for="lastname">Complaints: </label>
                        <select class="form-control select2" name="complaints_id" id="complaints_id">
                          <option value="">Select Complaints</option>
                          <?php if ($getcomplaints) {
                            foreach ($getcomplaints as $data) {
                          ?>
                              <option value="<?php echo $data['complaints_id']; ?>"><?php echo $data['name']; ?></option>
                          <?php
                            }
                          } ?>
                        </select>
                      </div>

                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">OPD Insurance Name: </label>
                          <select class="form-control select2" name="insurance_company_id" id="insurance_company_id">
                            <option value="1">Select OPD Insurance Name</option>
                            <?php if ($opdinsurancecompany) {
                              foreach ($opdinsurancecompany as $data) { ?>
                                <option value="<?php echo $data['insurance_company_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div id="profile-container">
                          <img style="border:1px solid black;" id="profileImage" src="<?= $path ?>app-assets/images/icons/temp.jpg">
                        </div>
                        <input id="imageUpload" type="file" name="logo" placeholder="Photo" capture="" accept="image/*">

                      </div>
                    </div>
                    <div class="card-footer ml-auto">
                      <button id="save" type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedpateintreg();">Submit</button>
                      <button style="display: none;" id="update" type="button" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedataval();">Update</button>
                      <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onClick="window.location.reload();">Reset</button>
                    </div>
                  </form>
                </div>

                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                  <form id="savefollowup" action="#" method="post">
                    <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                      <div class="col-sm-2 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Select Search: <span class="text-danger">*</span></label>
                          <!-- <select class="form-control" name="search" id="search" onchange="getselectedval(this.value);"> -->
                          <select class="form-control"  name="search[]" multiple="multiple" id="search" onchange="getselectedval(this.value);">
                            <option value="1">MRD Number</option>
                            <option value="2">Phone number</option>
                            <option value="3">Address Search</option>
                            <option value="4">Barcode</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-2 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Search: <span class="text-danger">*</span></label>
                          <select style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_registration_id" id="patient_registration_id" onchange="getpatientdetails(this.value);">
                            <option value="">Select Patient MRD NOS</option>

                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
                          <select class="form-control select2" name="followup_doctor_id" id="followup_doctor_id">
                            <option value="">Select Doctor</option>
                            <?php if ($doctors) {
                              foreach ($doctors as $data) { ?>
                                <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Patient Category: <span class="text-danger">*</span></label>
                          <select class="form-control select2" name="followup_patient_category_id" id="followup_patient_category_id">

                            <?php if ($pateintcategory) {
                              foreach ($pateintcategory as $data) { ?>
                                <option value="<?php echo $data['patient_category_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-3 col-md-3" <?php
                                                      if ($conf_settings[0]['app_type'] == 2) {
                                                      ?> style="display:none;" <?php
                                                                              }
                                                                                ?>>
                        <div class="form-group">
                          <label for="lastname">Appt Type: <span class="text-danger">*</span><span onclick="getappointmentopd(1)" class="notification-tag badge badge-danger float-right m-0"> %</span></label>
                          <select class="form-control select2" name="followup_appointment_type_id" id="followup_appointment_type_id" onchange="getappointmentopd(1)">
                            <option value="">Select Appointment Type</option>
                            <?php if ($appointmenttypes) {
                              foreach ($appointmenttypes as $data) { ?>
                                <option value="<?php echo $data['appointment_type_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-2" style="display:none;">
                        <div class="form-group">
                          <label for="lastname">Emergency:</label>
                          <select class="form-control" name="followup_emergency_id" id="followup_emergency_id">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Source: </label>
                          <select class="form-control select2" name="followup_source" id="followup_source">
                            <option value="">Select Sources</option>
                            <?php if ($sources) {
                              foreach ($sources as $data) { ?>
                                <option value="<?php echo $data['source_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-2">
                        <div class="form-group">
                          <label for="lastname">Appointment Date: </label>
                          <input type="date" class="form-control appointment_date" name="followup_appointment_date" id="followup_appointment_date" />
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Appointment Time: </label>
                          <input type="time" class="form-control appointment_time" name="followup_appointment_time" id="followup_appointment_time" />
                        </div>
                      </div>



                    </div>
                    <div id="div_modal_followup"></div>
                    <div class="row">
                      <div class="col-md-2" <?php
                                            if ($conf_settings[0]['pat_mod'] == 2) {
                                            ?> style="display:none;" <?php
                                                                    }
                                                                      ?>>
                        <label for="lastname">Modeofpay: <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="followup_modeofpay_id" id="followup_modeofpay_id">
                          <option value="">Select Modeofpay</option>
                          <?php if ($modeofpays) {
                            foreach ($modeofpays as $data) {
                          ?>
                              <option value="<?php echo $data['modeofpay_id']; ?>"><?php echo $data['name']; ?></option>
                          <?php
                            }
                          } ?>
                        </select>
                      </div>

                      <div class="col-sm-3 col-md-1" style="display:none;">
                        <div class="form-group">
                          <label for="lastname">Billing : </label>
                          <select class="form-control" name="followup_billing" id="followup_billing">
                            <?php if ($conf_settings[0]['pat_reg_billprint'] == 1) {
                            ?>
                              <option value="0">Yes</option>
                            <?php } ?>

                            <?php if ($conf_settings[0]['pat_reg_billprint'] == 2) {
                            ?>
                              <option value="1">No</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-1 col-md-1" style="display:none;">
                        <div class="form-group">
                          <label for="lastname">Campaign : </label>
                          <select class="form-control" name="followup_campconduct" id="followup_campconduct">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-4 col-md-3" style="display:none;">
                        <div class="form-group">
                          <label for="lastname">Card No : </label>
                          <input type="text" class="form-control" name="followup_cardno" id="followup_cardno">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="lastname">Complaints: </label>
                          <select class="form-control select2" name="followup_complaints_id" id="followup_complaints_id">
                            <option value="">Select Complaints</option>
                            <?php if ($getcomplaints) {
                              foreach ($getcomplaints as $data) {
                            ?>
                                <option value="<?php echo $data['complaints_id']; ?>"><?php echo $data['name']; ?></option>
                            <?php
                              }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label for="lastname">Description: </label>
                          <textarea class="form-control" name="followup_description" id="followup_description"></textarea>
                        </div>
                      </div>
                    </div>

                    <div id="last_appointmentdetails">


                    </div>

                    <div class="card-footer ml-auto">
                      <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savefollowup('1');">Submit</button>
                      <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                    </div>
                  </form>
                </div>

                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                  <div class="row">
                    <div class="col-md-3">

                      <select class="form-control select2" name="sur_doctorid" id="sur_doctorid">
                        <option value="">Select Doctor</option>
                        <?php if ($doctors) {
                          foreach ($doctors as $data) {
                        ?>
                            <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <input style="height: 43px;" type="date" name="search_date" id="search_date" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <button onclick="getpateintdetails()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                    </div>
                  </div>
                  <div class="table-responsive" id="p_date">
                  </div>
                  <p style="float:right"><i style="color: yellow;
    font-size: 20px;
    font-weight: bold;" class="la la-dot-circle-o"></i> <b>Yellow color cancel Patient</b></p>
                </div>

                <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                  <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-4">
                      <input style="height: 43px;" type="date" name="search_date_fol" id="search_date_fol" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <button onclick="getpateintdetails_followup()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                    </div>
                  </div>
                  <div class="table-responsive" id="pp_date">
                  </div>
                </div>


                <div class="tab-pane" id="tab7" aria-labelledby="base-tab7">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="tele_fil_doctor_id" id="tele_fil_doctor_id">
                          <option value="">Select Doctor</option>
                          <?php if ($doctors) {
                            foreach ($doctors as $data) { ?>
                              <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                          <?php }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="lastname">From Date: <span class="text-danger">*</span></label>
                        <input style="height: 1%;" type="date" name="tele_fromdate" id="tele_fromdate" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="lastname">To Date: <span class="text-danger">*</span></label>
                        <input style="height: 1%;" type="date" name="tele_todate" id="tele_todate" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-1">
                      <button style="margin-top: 30%;" onclick="search_tele()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                    </div>
                    <div class="col-md-4">
                      <button style="float: right;margin-top: 6%;" onclick="addtele(2)" class="btn btn-info mr-1 mb-1" type="button"><i class="la la-plus"></i> Add Review Patients</button>
                      <button style="float: right;margin-top: 6%;" onclick="addtele(1)" class="btn btn-success mr-1 mb-1" type="button"><i class="la la-plus"></i> Add Telephonic Patients</button>

                    </div>
                  </div>
                  <div class="col-md-12" id="tele_data">

                  </div>

                </div>



                <div class="tab-pane" id="tab6" aria-labelledby="base-tab6">
                  <div class="row">
                    <div class="col-sm-2 col-md-2"></div>
                    <div class="col-sm-2 col-md-3">
                      <div class="form-group">
                        <label for="lastname">Select Search: <span class="text-danger">*</span></label>
                        <select style="height: 39px;" class="form-control" onchange="getselectedval(this.value);">
                          <option value="1">MRD Number</option>
                          <option value="2">Phone number</option>
                          <option value="3">Address Search</option>
                          <option value="4">Barcode</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2 col-md-3">
                      <div class="form-group">
                        <label for="lastname">Search: <span class="text-danger">*</span></label>
                        <select style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" id="pat_idcard">
                          <option value="">Select Patient MRD NOS</option>

                        </select>
                      </div>
                    </div>


                    <div class="col-md-2">
                      <button style="margin-top: 12%;" onclick="Get_pat_idcard()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                    </div>
                  </div>
                  <div id="id_card_data">
                  </div>

                </div>

                <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                  <div class="row">
                    <div class="col-md-3">
                      <label>From date</label>
                      <input style="height: 43px;" type="date" name="search_date_camp1" id="search_date_camp1" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label>To date</label>
                      <input style="height: 43px;" type="date" name="search_date_camp2" id="search_date_camp2" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <br />
                      <button onclick="getpateintdetails_camp()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                    </div>
                  </div>
                  <br /> <br />
                  <div class="" id="camplist">
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Justified With Top Border end -->
</div>


<div id="tele_mod" class="modal fade" role="dialog" style="margin-top:1%">
  <input type="hidden" name="edit_tele_id" id="edit_tele_id">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="sele_type" id="sele_type" class="form-control">
        <div id="review_pat" style="display:none;">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Select Search: <span class="text-danger">*</span></label>
                <select class="form-control" name="r_tele" id="r_tele" onchange="getselectedval(this.value);">
                  <option value="1">MRD Number</option>
                  <option value="2">Phone number</option>
                  <option value="3">Address Search</option>
                  <option value="4">Barcode</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Search: <span class="text-danger">*</span></label>
                <select style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_registration_id_review" id="patient_registration_id_review">
                  <option value="">Select Patient MRD NOS</option>

                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
                <select class="form-control select2" name="rev_doctor_id" id="rev_doctor_id">
                  <option value="">Select Doctor</option>
                  <?php if ($doctors) {
                    foreach ($doctors as $data) { ?>
                      <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
            </div>


            <div class="col-md-4">
              <label>Appointment Date<span class="text-danger">*</span></label>
              <input type="date" name="r_app_date" id="r_app_date" class="form-control">
            </div>

            <div class="col-md-4">
              <label>Appointment Time<span class="text-danger">*</span></label>
              <input type="time" name="r_app_time " id="r_app_time" class="form-control appointment_time">
            </div>
          </div>




        </div>

        <div id="tele_pat_sec" style="display:none;">
          <div class="row form-group">
            <div class="col-md-4">
              <label>Name<span class="text-danger">*</span></label>
              <input type="text" name="tele_pat" id="tele_pat" class="form-control">
            </div>
            <div class="col-md-4">
              <label>Mobile No<span class="text-danger">*</span></label>
              <input type="text" name="tele_mobile" id="tele_mobile" class="form-control phone-inputmask">
            </div>
            <div class="col-md-4">
              <label>Age<span class="text-danger">*</span></label>
              <input type="text" name="tele_age" id="tele_age" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-3">
              <label>Gender</label>
              <select class="form-control" name="tele_gender" id="tele_gender">
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Transgender</option>
              </select>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
                <select class="form-control select2" name="tele_doctor_id" id="tele_doctor_id">
                  <option value="">Select Doctor</option>
                  <?php if ($doctors) {
                    foreach ($doctors as $data) { ?>
                      <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <label>Appointment Date<span class="text-danger">*</span></label>
              <input type="date" name="tele_app_date" id="tele_app_date" class="form-control">
            </div>

            <div class="col-md-3">
              <label>Appointment Time<span class="text-danger">*</span></label>
              <input type="time" name="tele_app_time " id="tele_app_time" class="form-control appointment_time">
            </div>

          </div>


        </div>

        <div class="row form-group">

          <div class="col-md-12">
            <label>Description</label>
            <textarea class="form-control" name="tele_description" id="tele_description"></textarea>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6">
            <label>Do You Want Send Sms</label>
            <input type="checkbox" name="tele_sms" id="tele_sms" value="0">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="tel_s" class="btn btn-success" type="button" onclick="save_tele()">Submit</button>
        <button style="display:none;" id="tel_u" class="btn btn-warning" type="button" onclick="update_tele()">Update</button>
        <button type="button" id="mclose" class="btn btn-danger  cls upclick" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="hiddenInput" name="checkboxValue" value="0">
<script type="text/javascript">
  $(document).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
    $('#search_date').val(cd);
    $('#search_date_fol').val(cd);
    $('#search_date_camp2').val(cd);
    $('#search_date_camp1').val(cd);
    $('#search_date_camp').val(cd);
    $('#tele_fromdate').val(cd);
    $('#tele_todate').val(cd);
    $('#tele_app_date').val(cd);
    //getpateintdetails();

    $("#mobile_no").select2({

      ajax: {
        url: "Patients_registration/serchphone_no",
        dataType: 'json',
        type: "POST",
        delay: 250,
        data: function(params) {
          return {
            searchTerm: params.term, // search term
            csrf_test_name: $("#csrf_test_name").val()

          };
        },
        processResults: function(response) {
          return {
            results: response
          };
        },

        cache: true
      }
    });

  });

  $("#tele_sms").change(function() {
    if (this.checked) {
      $("#hiddenInput").val("1");
    } else {
      $("#hiddenInput").val("0");
    }
  });

  function gotoNode(name, mob, age, gender, desc, docid, which_type_pat, patdata) {
    if (which_type_pat == 1) {
      $('#base-tab1').click();
      $('#tab_tit').html('Add Patients Registration');
      $('#fname').val(name);
      $('#gender_id').val(gender);
      $('#agey').val(age);
      $('#mobileno').val(mob);
      $('#description').val(desc);
      $('#doctor_id').val(docid).trigger('change');
    }
    if (which_type_pat == 2) {
      $('#base-tab3').click();
      var output = patdata.split('~');
      var option = new Option(output[1], output[0], true, true);
      $('#patient_registration_id').append(option).trigger('change');
      $('#followup_description').val(desc);
      $('#followup_doctor_id').val(docid).trigger('change');
      // getpatientdetails(output[1]);
    }

  }

  function save_tele() {

    $("#overlay").fadeIn(300);
    if ($('#sele_type').val() == 1) {
      var formData = {
        sele_type: $('#sele_type').val(), ///telephonc
        tele_doctor_id: $('#tele_doctor_id').val(),
        tele_app_date: $('#tele_app_date').val(),
        tele_app_time: $('#tele_app_time').val(),
        tele_pat: $('#tele_pat').val(),
        tele_mobile: $('#tele_mobile').val(),
        tele_age: $('#tele_age').val(),
        tele_gender: $('#tele_gender').val(),
        tele_description: $('#tele_description').val(),
        checvall: $("#hiddenInput").val(),
        csrf_test_name: $('#csrf_test_name').val()
      };
    } else {
      var formData = {
        sele_type: $('#sele_type').val(), ///review 
        patient_registration_id_review: $('#patient_registration_id_review').val(),
        rev_doctor_id: $('#rev_doctor_id').val(),
        r_app_date: $('#r_app_date').val(),
        r_app_time: $('#r_app_time ').val(),
        tele_description: $('#tele_description').val(),
        checvall: $("#hiddenInput").val(),
        csrf_test_name: $('#csrf_test_name').val()
      };
    }

    $.ajax({
      type: "POST",
      url: 'Patients_registration/addtele',
      dataType: "json",
      data: formData,
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
          $('.upclick').click();
          search_tele();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function patgetprint(patid) {
    $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_patidcard/"><input name="printpatient_registration_id" value="' + patid + '"/><input name="csrf_test_name" value="' + $('#csrf_test_name').val() + '"></form>').appendTo('body').submit().remove();

  }

  function search_tele() {

    $("#overlay").fadeIn(300);
    $.fn.dataTable.ext.errMode = 'none';
    $.ajax({
      type: "POST",
      url: 'Patients_registration/gettelepat_data',
      dataType: "json",
      data: {
        tele_fil_doctor_id: $('#tele_fil_doctor_id').val(),
        from_date: $('#tele_fromdate').val(),
        to_date: $('#tele_todate').val(),
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {

        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          $('#tele_data').html(data.msgsdata);
          var table = $('#tableid_etele').DataTable({
            "drawCallback": function(settings) {

              $('[data-toggle="tooltip"]').tooltip();

              // add as many tooltips you want

            },
            buttons: [],

            dom: 'Blfrtip',
            "lengthMenu": [
              [5, 10, 25, 50, 100, 1000],
              [5, 10, 25, 50, 100, 1000]
            ]
          });


        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });

  }

  function getpateintdetails() {

    $('#p_date').html('');
    $("#overlay").fadeIn(300);
    $.fn.dataTable.ext.errMode = 'none';
    $.ajax({
      type: "POST",
      url: 'Patients_registration/getpatientdetails',
      dataType: "json",
      data: {
        sdate: $('#search_date').val(),
        sur_doctorid: $('#sur_doctorid').val(),
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {

        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          $('#p_date').html(data.msg);
          var table = $('#tableid').DataTable({
            "drawCallback": function(settings) {

              $('[data-toggle="tooltip"]').tooltip();

              // add as many tooltips you want

            },
            buttons: [],

            dom: 'Blfrtip',
            "lengthMenu": [
              [5, 10, 25, 50, 100, 1000],
              [5, 10, 25, 50, 100, 1000]
            ]
          });


        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });

  }

  function getpateintdetails_camp() {
    $('#camplist').html('');
    $("#overlay").fadeIn(300);
    $.fn.dataTable.ext.errMode = 'none';
    $.ajax({
      type: "POST",
      url: 'Patients_registration/getcamplist',
      dataType: "json",
      data: {
        sdate1: $('#search_date_camp1').val(),
        sdate2: $('#search_date_camp2').val(),
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          $('#camplist').html(data.msg);
          var table = $('#tablecamp').DataTable({

            buttons: [],

            dom: 'Blfrtip',
            columnDefs: [{

              lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
              ]
            }]
          });
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function Get_pat_idcard() {
    if ($('#pat_idcard').val() > 0) {
      $("#overlay").fadeIn(300);
      $.ajax({
        type: "POST",
        url: 'Patients_registration/Get_Idcard',
        dataType: "json",
        data: {
          patid: $('#pat_idcard').val(),
          csrf_test_name: $('#csrf_test_name').val()
        },
        success: function(data) {
          $("#overlay").fadeOut(300);
          if (data.msg != '') {
            $('#id_card_data').html(data.msg);



          } else if (data.error != '') {
            Swal.fire({
              title: "Warning!",
              text: "" + data.error + "",
              type: "warning",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          } else if (data.error_message) {
            var error = data.error_message;
            var err_str = '';
            for (var key in error) {
              err_str += error[key] + '\n';
            }
            Swal.fire({
              title: "Info!",
              text: "" + err_str + "",
              type: "info",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          }

        },
        error: function(error) {
          Swal.fire({
            title: "Info!",
            text: "Network Busy",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
          $("#overlay").fadeOut(300);
        }
      });
    } else {
      Swal.fire({
        title: "Info!",
        text: "Please select Patient",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      });
    }
  }

  function getpateintdetails_followup() {
    $('#pp_date').html('');
    $("#overlay").fadeIn(300);
    $.fn.dataTable.ext.errMode = 'none';
    $.ajax({
      type: "POST",
      url: 'Patients_registration/getpatientdetailsfol',
      dataType: "json",
      data: {
        sdate: $('#search_date_fol').val(),
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          $('#pp_date').html(data.msg);
          var table = $('#tablefolid').DataTable({

            buttons: [],

            dom: 'Blfrtip',
            columnDefs: [{

              lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
              ]
            }]
          });
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }
  var table;
  //$( document ).ready(function() {
  //    table= $('#tableid').DataTable( {
  //           'processing': true,
  //           'serverSide': true,
  //           'ajax':'<?= base_url() ?>master/Patients_registration/ajax_call',
  //           'columns': [
  //              { data: 'slno' },
  //              { data: 'pateint_name' },
  //              { data: 'doc' },
  //              { data: 'mrdno' },
  //              { data: 'dateofbirth' },
  //              { data: 'mobileno' },
  //              { data: 'status' },
  //              { data: 'print' },
  //              { data: 'edit' },
  //              { data: 'delete' }
  //                      ],

  //          key: {
  //            enterkey: false

  //                 },
  //      "order": [[ 0, "desc" ]],
  //      "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
  //      } );
  // }); 

  $("#profileImage").click(function(e) {
    $("#imageUpload").click();
  });

  cd = (new Date()).toISOString().split('T')[0];
  $('.appointment_date').val(cd);
  timee = "<?php echo date('H:i'); ?>";
  $('.appointment_time').val(timee);

  function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
      $('#profileImage').attr('src',
        window.URL.createObjectURL(uploader.files[0]));
    }
  }

  $("#imageUpload").change(function() {
    fasterPreview(this);
  });

  function getpatientdetails(val) {
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Common_controller/getpatientdetails',
      dataType: "json",
      data: {
        getid: val,
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          $('#last_appointmentdetails').html(data.msg);

          checkvalidity();
          $('[data-toggle="tooltip"]').tooltip();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function getselectedval(val) {
    // $("#overlay").fadeIn(300);
    //  $.ajax({
    //         type: "POST",
    //         url: 'Common_controller/getsearchval',
    //         dataType: "json",
    //         data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
    //         success: function(data){
    //             $("#overlay").fadeOut(300);
    //            if(data.msg != ''){
    //             $('#patient_registration_id').html(data.msg);
    //           } else if(data.error != ''){
    //             Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
    //           } else if(data.error_message) 
    //           {
    //             var error = data.error_message;
    //             var err_str = '';
    //             for (var key in error) {
    //               err_str += error[key] +'\n';
    //             }
    //             Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
    //           }

    //         },
    //         error: function (error) {
    //             Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
    //             $("#overlay").fadeOut(300);  
    //         }
    //     });
  }
  /* function mandatoryclick()
  {
    $mandatory = $('#mandatory').val(this.checked ? 1 : 0);
     //$mandatory = $("#mandatory").val();
     alert(mandatory);
     if($mandatory ==1)
  	{
  		$('.mand').hide();
  	}else{
  		$('.mand').show();
  	}
  } */

  $('#mandatory').click(function() {
    if ($(this).is(':checked'))
      $('.mand').hide();
    else
      $('.mand').show();
  });

  function getgender(val) {
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/getgender',
      dataType: "json",
      data: {
        getid: val,
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          $('#gender_id').val(data.msg[0]['gender']);
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function getappointmentopd(sel = 0) {

    if (sel == 0) {
      if ($("#appointment_type_id").val() == '') {
        Swal.fire({
          title: "Info!",
          text: "Please select Appointment Type !",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        })
        return false;
      }
      getval = $('#appointment_type_id').val();
      idvak = 'appointmentdata-show';
      cval = '';
    } else {
      if ($("#followup_appointment_type_id").val() == '') {
        Swal.fire({
          title: "Info!",
          text: "Please select Appointment Type !",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        })
        return false;
      }
      getval = $('#followup_appointment_type_id').val();
      idvak = 'div_modal_followup';
      cval = '1';
    }
    if (getval > 0) {
      $("#overlay").fadeIn(300);
      $.ajax({
        type: "POST",
        url: 'Patients_registration/getappointmentopd',
        dataType: "json",
        data: {
          sel: sel,
          getid: getval,
          csrf_test_name: $('#csrf_test_name').val()
        },
        success: function(data) {
          $("#overlay").fadeOut(300);
          if (data.msg != '') {
            $('#' + idvak).html(data.msg);
            $('#div_modal' + cval).modal('show');
            $('.modal-title').html('Appointment OPD Charge');
          } else if (data.error != '') {
            Swal.fire({
              title: "Warning!",
              text: "" + data.error + "",
              type: "warning",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          } else if (data.error_message) {
            var error = data.error_message;
            var err_str = '';
            for (var key in error) {
              err_str += error[key] + '\n';
            }
            Swal.fire({
              title: "Info!",
              text: "" + err_str + "",
              type: "info",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          }

        },
        error: function(error) {
          Swal.fire({
            title: "Info!",
            text: "Network Busy",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
          $("#overlay").fadeOut(300);
        }
      });



    }
  }

  function addtele(val) {
    $('#sele_type').val(val);
    if (val == 1) {
      $('#tele_pat_sec').show();
      $('#review_pat').hide();
      $('#tele_mod').modal('show');
      $('.modal-title').html('Add New telephonic Patients');
      $('#tel_s').show();
      $('#tel_u').hide();
      $('#tele_pat').val('');
      $('#tele_mobile').val('');
      $('#tele_age').val('');
      $('#tele_doctor_id').val('');
      $('#tele_description').val('');
    }
    if (val == 2) {
      $('#tele_pat_sec').hide();
      $('#review_pat').show();
      $('#tele_mod').modal('show');
      $('.modal-title').html('Add Review Patients');
      $('#tel_s').show();
      $('#tel_u').hide();
      $('#tele_pat').val('');
      $('#tele_mobile').val('');
      $('#tele_age').val('');
      $('#tele_doctor_id').val('');
      $('#tele_description').val('');
    }

  }

  function checkvalidity() {

    $.ajax({
      type: "POST",
      url: 'Patients_registration/appointmentopdvalidity',
      dataType: "json",
      data: {
        patient_registration_id: $('#patient_registration_id').val(),
        csrf_test_name: $('#csrf_test_name').val()
      },
      success: function(data) {
        var dateAr = data.edate.split('-');
        var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
        if (parseInt(data.days) >= 0 && parseInt(data.days) <= 15) {
          Swal.fire({
            title: 'You are eligabile for free consultation',
            icon: 'info',
            html: 'Your appotiment is validate for ' + data.days + ' days<br/>Untill:' + newDate,
            showCloseButton: true,
            showCancelButton: false,

          })
        }

        //appointementpdo(sel,getval,idvak,cval);
      }
    });
  }

  function savedpateintreg() {
    if ($("#patient_title_id").val() == '' || $("#fname").val() == '') {
      Swal.fire({
        title: "Info!",
        text: "Please Enter all fields !",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
      return false;
    }
    $("#overlay").fadeIn(300);
    let data = new FormData($("#patientreg")[0]);
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/savedata',
      dataType: "json",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
          if ($('#billing').val() == 0) {
            printdata(data.patient_registration_id, data.patient_app_id);
          }
          getpateintdetails();
          location.reload();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function editdata(val) {
    if (val > 0) {
      $("#overlay").fadeIn(300);
      $.ajax({
        type: "POST",
        url: 'Patients_registration/editdata',
        dataType: "json",
        data: {
          getid: val,
          csrf_test_name: $('#csrf_test_name').val()
        },
        success: function(data) {
          $("#overlay").fadeOut(300);
          if (data.msg != '') {
            //  alert(data.msg[0]['apponitment_type_id']);
            $('#base-tab1').click();
            $('#tab_tit').html('Edit Patients Registration');
            $('#id').val(data.msg[0]['patient_registration_id']);
            $('#patient_title_id').val(data.msg[0]['title']);
            $('#fname').val(data.msg[0]['fname']);
            $('#lname').val(data.msg[0]['lname']);
            $('#gender_id').val(data.msg[0]['gender']);
            $('#agey').val(data.msg[0]['ageyy']);
            $('#agem').val(data.msg[0]['agemm']);
            $('#dob').val(data.msg[0]['dob']);
            $('#city_id').val(data.msg[0]['city']);
            $('#city_id').val(data.msg[0]['city']).trigger('change');
            $('#area_id').val(data.msg[0]['area_id']).trigger('change');
            $('#mobileno').val(data.msg[0]['mobileno']);
            $('#address').val(data.msg[0]['address']);
            $('#source').val(data.msg[0]['source']).trigger('change');
            $('#occupation').val(data.msg[0]['occupation']);
            $('#referral_masters_id').val(data.msg[0]['referral_masters_id']);
            $('#insurance_company_id').val(data.msg[0]['insurance_company_id']);
            $('#insurance_company_id').val(data.msg[0]['insurance_company_id']).trigger('change');
            $('#patient_category_id').val(data.msg[0]['patient_category_id']);
            $('#patient_category_id').val(data.msg[0]['patient_category_id']).trigger('change');
            $('#emergency_id').val(data.msg[0]['emergency']);
            $('#doctor_id').val(data.msg[0]['doctor_id']);
            $('#doctor_id').val(data.msg[0]['doctor_id']).trigger('change');
            $('#mode').val(data.msg[0]['doctor_id']).trigger('change');
            $('#print').val(data.msg[0]['print']);
            //$('#appointment_type_id').val(data.msg[0]['apponitment_type_id']);
            $('#appointment_type_id').val(data.msg[0]['apponitment_type_id']).trigger('change');
            $('#modeofpay_id').val(data.msg[0]['modeofpay_id']).trigger('change');
            $('#referral_masters_id').val(data.msg[0]['referral_masters_id']).trigger('change');
            $('#description').val(data.msg[0]['description']);
            $('#appointment_date').val(data.msg[0]['appointment_date']);
            $('#appointment_time').val(data.msg[0]['appointment_time']);
            $('#pat_type').val(data.msg[0]['pat_type']);
            $('#doc_ref_name').val(data.msg[0]['doc_ref_name']);
            $('#doc_mob').val(data.msg[0]['doc_mob']);
            $('#drugalergy').val(data.msg[0]['drugalergy']);
            $('#campconduct').val(data.msg[0]['campconduct']);
            $('#cardno').val(data.msg[0]['cardno']);
            $('#gmail').val(data.msg[0]['gmail']);
            $('#whatsapp').val(data.msg[0]['whatsup']);
            setTimeout(function() {
              $('#opdcharge_id').val(data.msg[0]['appointment_opd_charge_id']);
            }, 2000);

            if (data.msg[0]['image']) {
              $("#profileImage").attr("src", "<?php echo base_url() ?>images/profile/" + data.msg[0]['image']);
            }
            $('#save').hide();
            $('#update').show();
          } else if (data.error != '') {
            Swal.fire({
              title: "Warning!",
              text: "" + data.error + "",
              type: "warning",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          } else if (data.error_message) {
            var error = data.error_message;
            var err_str = '';
            for (var key in error) {
              err_str += error[key] + '\n';
            }
            Swal.fire({
              title: "Info!",
              text: "" + err_str + "",
              type: "info",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          }

        },
        error: function(error) {
          Swal.fire({
            title: "Info!",
            text: "Network Busy",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
          $("#overlay").fadeOut(300);
        }
      });
    }
  }

  function updatedataval() {
    if ($("#patient_title_id").val() == '' || $("#fname").val() == '') {
      Swal.fire({
        title: "Info!",
        text: "Please Enter all fields !",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
      return false;
    }
    $("#overlay").fadeIn(300);
    let data = new FormData($("#patientreg")[0]);
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/updatedata',
      dataType: "json",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
          // table.draw();
          location.reload();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function chkoutp(val, patid) {
    if (val > 0) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Checkout it!",
        confirmButtonClass: "btn btn-warning",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then((function(t) {
        if (t.value) {
          $("#overlay").fadeIn(300);
          $.ajax({
            type: "POST",
            url: 'Patients_registration/checkout',
            dataType: "json",
            data: {
              getid: val,
              patid: patid,
              csrf_test_name: $('#csrf_test_name').val()
            },
            success: function(data) {
              $("#overlay").fadeOut(300);
              if (data.msg != '') {
                Swal.fire({
                  title: "Deleted",
                  text: "" + data.msg + "",
                  type: "success",
                  confirmButtonClass: "btn btn-success",
                  buttonsStyling: !1
                });
                // table.draw();

              } else if (data.error != '') {
                Swal.fire({
                  title: "Warning!",
                  text: "" + data.error + "",
                  type: "warning",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              } else if (data.error_message) {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] + '\n';
                }
                Swal.fire({
                  title: "Info!",
                  text: "" + err_str + "",
                  type: "info",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              }

            },
            error: function(error) {
              Swal.fire({
                title: "Info!",
                text: "Network Busy",
                type: "info",
                confirmButtonClass: "btn btn-primary",
                buttonsStyling: !1
              });
              $("#overlay").fadeOut(300);
            }
          });

        }
      }))
    }
  }

  function deletedata(val) {
    if (val > 0) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete it!",
        confirmButtonClass: "btn btn-warning",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then((function(t) {
        if (t.value) {
          $("#overlay").fadeIn(300);
          $.ajax({
            type: "POST",
            url: 'Patients_registration/deletedata',
            dataType: "json",
            data: {
              getid: val,
              csrf_test_name: $('#csrf_test_name').val()
            },
            success: function(data) {
              $("#overlay").fadeOut(300);
              if (data.msg != '') {
                Swal.fire({
                  title: "Deleted",
                  text: "" + data.msg + "",
                  type: "success",
                  confirmButtonClass: "btn btn-success",
                  buttonsStyling: !1
                });
                // table.draw();
                location.reload();

              } else if (data.error != '') {
                Swal.fire({
                  title: "Warning!",
                  text: "" + data.error + "",
                  type: "warning",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              } else if (data.error_message) {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] + '\n';
                }
                Swal.fire({
                  title: "Info!",
                  text: "" + err_str + "",
                  type: "info",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              }

            },
            error: function(error) {
              Swal.fire({
                title: "Info!",
                text: "Network Busy",
                type: "info",
                confirmButtonClass: "btn btn-primary",
                buttonsStyling: !1
              });
              $("#overlay").fadeOut(300);
            }
          });

        }
      }))
    }
  }

  function foldeletedata(val) {
    if (val > 0) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete it!",
        confirmButtonClass: "btn btn-warning",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then((function(t) {
        if (t.value) {
          $("#overlay").fadeIn(300);
          $.ajax({
            type: "POST",
            url: 'Patients_registration/foldeletedata',
            dataType: "json",
            data: {
              getid: val,
              csrf_test_name: $('#csrf_test_name').val()
            },
            success: function(data) {
              $("#overlay").fadeOut(300);
              if (data.msg != '') {
                Swal.fire({
                  title: "Deleted",
                  text: "" + data.msg + "",
                  type: "success",
                  confirmButtonClass: "btn btn-success",
                  buttonsStyling: !1
                });
                getpateintdetails_followup();

              } else if (data.error != '') {
                Swal.fire({
                  title: "Warning!",
                  text: "" + data.error + "",
                  type: "warning",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              } else if (data.error_message) {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] + '\n';
                }
                Swal.fire({
                  title: "Info!",
                  text: "" + err_str + "",
                  type: "info",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              }

            },
            error: function(error) {
              Swal.fire({
                title: "Info!",
                text: "Network Busy",
                type: "info",
                confirmButtonClass: "btn btn-primary",
                buttonsStyling: !1
              });
              $("#overlay").fadeOut(300);
            }
          });

        }
      }))
    }
  }

  function canceldata(val) {
    if (val > 0) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Cancel it!",
        confirmButtonClass: "btn btn-warning",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then((function(t) {
        if (t.value) {
          $("#overlay").fadeIn(300);
          $.ajax({
            type: "POST",
            url: 'Patients_registration/canceldata',
            dataType: "json",
            data: {
              getid: val,
              csrf_test_name: $('#csrf_test_name').val()
            },
            success: function(data) {
              $("#overlay").fadeOut(300);
              if (data.msg != '') {
                Swal.fire({
                  title: "Canceled",
                  text: "" + data.msg + "",
                  type: "success",
                  confirmButtonClass: "btn btn-success",
                  buttonsStyling: !1
                });
                // table.draw();

              } else if (data.error != '') {
                Swal.fire({
                  title: "Warning!",
                  text: "" + data.error + "",
                  type: "warning",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              } else if (data.error_message) {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] + '\n';
                }
                Swal.fire({
                  title: "Info!",
                  text: "" + err_str + "",
                  type: "info",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              }

            },
            error: function(error) {
              Swal.fire({
                title: "Info!",
                text: "Network Busy",
                type: "info",
                confirmButtonClass: "btn btn-primary",
                buttonsStyling: !1
              });
              $("#overlay").fadeOut(300);
            }
          });

        }
      }))
    }
  }

  function savefollowup() {

    if ($("#patient_registration_id").val() == '') {
      Swal.fire({
        title: "Info!",
        text: "Please Enter all fields !",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
      return false;
    }
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/savefollowup',
      dataType: "json",
      data: $('#savefollowup').serialize(),
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
          // table.draw();
          if ($('#billing').val() == 0) {
            printdata(data.patient_registration_id, data.patient_app_id);
          }
          $("#savefollowup")[0].reset();
          getpateintdetails();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });

  }

  function printdata(printpatient_registration_id, pat_apt_id) {

    $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_appointment/"><input name="printpatient_apt_id" value="' + pat_apt_id + '"/><input name="printpatient_registration_id" value="' + printpatient_registration_id + '"/><input name="csrf_test_name" value="' + $('#csrf_test_name').val() + '"></form>').appendTo('body').submit().remove();

  }

  function hdprintdata(printpatient_registration_id, typeprint) {

    $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_appointmenthd/"><input name="printpatient_registration_id" value="' + printpatient_registration_id + '"/><input name="typeprint" value="' + typeprint + '"/><input name="csrf_test_name" value="' + $('#csrf_test_name').val() + '"></form>').appendTo('body').submit().remove();

  }

  function ageChanged() {
    var today = new Date('<?= date('Y-m-d') ?>');
    var year = $("#agey").val();
    var month = $("#agem").val();
    var date = $("#aged").val();
    var year = parseInt(year);
    if (isNaN(year)) {
      year = 0;
    }
    var month = parseInt(month);
    if (isNaN(month)) {
      month = 0;
    }
    var date = parseInt(date);
    if (isNaN(date)) {
      date = 0;
    }
    var total_days = year * 365.25 + month * 30.42 + date;
    var total_days = Math.round(total_days);
    if (total_days == 0) {
      return;
    }
    today.setDate(today.getDate() - total_days);
    var birth_date = today.getDate();
    var birth_month = today.getMonth() + 1;
    var birth_year = today.getFullYear();
    // var dob=pad(birth_date,2)+'-'+pad(birth_month,2)+'-'+birth_year;
    var dob = birth_year + '-' + pad(birth_month, 2) + '-' + pad(birth_date, 2);
    $("#dob").val(dob);

  }

  /*     function dobChanged()
        {
  		 
  			 var date1=$("#dob").val();

              date = date1.value.split('-');
  alert(date);
              var day = date[1];
              var month = date[0];
              var year = date[2];
    alert(day);
    alert(month);
    alert(day);
              $('#day').val(day);
              $('#month').val(month);
              $('#year').val(year); 

         
  	  } */

  $("#dob").change(function() {
    var mdate = $("#dob").val().toString();

    var yearThen = parseInt(mdate.substring(0, 4), 10);
    var monthThen = parseInt(mdate.substring(5, 7), 10);
    var dayThen = parseInt(mdate.substring(8, 10), 10);

    var today = new Date();
    var birthday = new Date(yearThen, monthThen - 1, dayThen);

    var differenceInMilisecond = today.valueOf() - birthday.valueOf();

    var year_age = Math.floor(differenceInMilisecond / 31536000000);
    var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
    var month_age = Math.floor(day_age / 30);
    day_age = day_age % 30;
    /*  alert(year_age);	
		 alert(month_age);	
		 alert(day_age); */
    $('#aged').val(day_age);
    $('#agem').val(month_age);
    $('#agey').val(year_age);
    // Do something with the day, month, and year
  });

  function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
  }

  function followupchk(val) {
    if (val > 0) {
      $("#overlay").fadeIn(300);
      $('#folmod').html('');
      $.ajax({
        type: "POST",
        url: 'Patients_registration/followuunew',
        dataType: "json",
        data: {
          getid: val,
          csrf_test_name: $('#csrf_test_name').val()
        },
        success: function(data) {
          $("#overlay").fadeOut(300);
          if (data.msg != '') {
            $('#folmod').html(data.msg);
            $('#div_modalf').modal('show');
            $('.modal-title').html('Followup');
            $('.fol_date').val(cd);
          } else if (data.error != '') {
            Swal.fire({
              title: "Warning!",
              text: "" + data.error + "",
              type: "warning",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          } else if (data.error_message) {
            var error = data.error_message;
            var err_str = '';
            for (var key in error) {
              err_str += error[key] + '\n';
            }
            Swal.fire({
              title: "Info!",
              text: "" + err_str + "",
              type: "info",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          }

        },
        error: function(error) {
          Swal.fire({
            title: "Info!",
            text: "Network Busy",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
          $("#overlay").fadeOut(300);
        }
      });
    }
  }

  function clickcamps(val) {
    if (val > 0) {
      $("#overlay").fadeIn(300);
      $('#clickkcamps').html('');
      $.ajax({
        type: "POST",
        url: 'Patients_registration/clickkcamps',
        dataType: "json",
        data: {
          getid: val,
          csrf_test_name: $('#csrf_test_name').val()
        },
        success: function(data) {
          $("#overlay").fadeOut(300);
          if (data.msg != '') {
            $('#clickkcamps').html(data.msg);
            $('#camdiv').modal('show');
            $('.modal-title').html('Camp Action');
          } else if (data.error != '') {
            Swal.fire({
              title: "Warning!",
              text: "" + data.error + "",
              type: "warning",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          } else if (data.error_message) {
            var error = data.error_message;
            var err_str = '';
            for (var key in error) {
              err_str += error[key] + '\n';
            }
            Swal.fire({
              title: "Info!",
              text: "" + err_str + "",
              type: "info",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          }

        },
        error: function(error) {
          Swal.fire({
            title: "Info!",
            text: "Network Busy",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
          $("#overlay").fadeOut(300);
        }
      });
    }
  }

  function whitecell(val, patapt) {
    if (val > 0) {
      $("#overlay").fadeIn(300);
      $('#folmod').html('');
      $.ajax({
        type: "POST",
        url: 'Patients_registration/whitecellfn',
        dataType: "json",
        data: {
          getid: val,
          patapt: patapt,
          csrf_test_name: $('#csrf_test_name').val()
        },
        success: function(data) {
          $("#overlay").fadeOut(300);
          if (data.msg != '') {
            $('#folmod').html(data.msg);
            $('#div_modalf').modal('show');
            $('.modal-title').html('White cell');
            $('.fol_date').val(cd);
          } else if (data.error != '') {
            Swal.fire({
              title: "Warning!",
              text: "" + data.error + "",
              type: "warning",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          } else if (data.error_message) {
            var error = data.error_message;
            var err_str = '';
            for (var key in error) {
              err_str += error[key] + '\n';
            }
            Swal.fire({
              title: "Info!",
              text: "" + err_str + "",
              type: "info",
              confirmButtonClass: "btn btn-primary",
              buttonsStyling: !1
            });
          }

        },
        error: function(error) {
          Swal.fire({
            title: "Info!",
            text: "Network Busy",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
          $("#overlay").fadeOut(300);
        }
      });
    }
  }

  function savecamps() {
    if ($("#card").val() == '') {
      Swal.fire({
        title: "Info!",
        text: "Please Enter all fields !",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
      return false;
    }
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/savecamps',
      dataType: "json",
      data: $('#camp_form').serialize(),
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
          $('.gguuu').click();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });

  }

  function savefollowupnn() {
    if ($("#padate").val() == '') {
      Swal.fire({
        title: "Info!",
        text: "Please Enter all fields !",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
      return false;
    }
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/savefollowupnew',
      dataType: "json",
      data: $('#followupd_form').serialize(),
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });

  }

  function savewhitecell() {
    if ($("#bp").val() == '') {
      Swal.fire({
        title: "Info!",
        text: "Please Enter all fields !",
        type: "info",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
      return false;
    }
    $("#overlay").fadeIn(300);
    $.ajax({
      type: "POST",
      url: 'Patients_registration/savewhitecellnew',
      dataType: "json",
      data: $('#whitecell_form').serialize(),
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });

  }

  function edittele(name, mob, age, gender, desc, docid, teleid, tele_app_date, tele_app_time, which_type_pat, patdata) {
    $('#sele_type').val(which_type_pat);
    if (which_type_pat == 1) {

      $('#tele_pat_sec').show();
      $('#review_pat').hide();
      $('#tele_mod').modal('show');
      $('.modal-title').html('Edit  telephonic Patients');
      $('#tele_pat').val(name);
      $('#tele_mobile').val(mob);
      $('#tele_age').val(age);
      $('#tele_gender').val(gender);
      $('#tele_doctor_id').val(docid);
      $('#tele_app_date').val(tele_app_date);
      $('#tele_app_time').val(tele_app_time);
      $('#tele_description').val(desc);
      $('#edit_tele_id').val(teleid);
      $('#tel_s').hide();
      $('#tele_doctor_id').trigger('change');
      $('#tel_u').show();
    }
    if (which_type_pat == 2) {
      if (patdata) {
        var output = patdata.split('~');
      }
      $('#tele_pat_sec').hide();
      $('#review_pat').show();
      $('#tele_mod').modal('show');
      $('.modal-title').html('Edit  Review Patients');

      $('#rev_doctor_id').val(docid);

      $('#r_app_date').val(tele_app_date);
      $('#r_app_time').val(tele_app_time);
      $('#tele_description').val(desc);
      $('#edit_tele_id').val(teleid);
      $('#tel_s').hide();
      $('#tel_u').show();
      var option = new Option(output[1], output[0], true, true);
      $('#patient_registration_id_review').append(option).trigger('change');
      $('#rev_doctor_id').trigger('change');
    }

  }

  function update_tele() {

    $("#overlay").fadeIn(300);


    if ($('#sele_type').val() == 1) {
      var formData = {
        sele_type: $('#sele_type').val(),
        edit_tele_id: $('#edit_tele_id').val(),
        tele_doctor_id: $('#tele_doctor_id').val(),
        tele_app_date: $('#tele_app_date').val(),
        tele_app_time: $('#tele_app_time').val(),
        tele_pat: $('#tele_pat').val(),
        tele_mobile: $('#tele_mobile').val(),
        tele_age: $('#tele_age').val(),
        tele_gender: $('#tele_gender').val(),
        tele_description: $('#tele_description').val(),
        checvall: $("#hiddenInput").val(),
        csrf_test_name: $('#csrf_test_name').val()
      };
    } else {
      var formData = {
        sele_type: $('#sele_type').val(),
        patient_registration_id_review: $('#patient_registration_id_review').val(),
        edit_tele_id: $('#edit_tele_id').val(),
        rev_doctor_id: $('#rev_doctor_id').val(),
        r_app_date: $('#r_app_date').val(),
        r_app_time: $('#r_app_time ').val(),
        tele_description: $('#tele_description').val(),
        checvall: $("#hiddenInput").val(),
        csrf_test_name: $('#csrf_test_name').val()
      };
    }


    $.ajax({
      type: "POST",
      url: 'Patients_registration/updatetele',
      dataType: "json",
      data: formData,
      success: function(data) {
        $("#overlay").fadeOut(300);
        if (data.msg != '') {
          Swal.fire({
            title: "",
            text: "" + data.msg + "",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
          });
          $('.upclick').click();
          search_tele();
        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });
        $("#overlay").fadeOut(300);
      }
    });
  }

  function deletetele(val) {
    if (val > 0) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete it!",
        confirmButtonClass: "btn btn-warning",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then((function(t) {
        if (t.value) {
          $("#overlay").fadeIn(300);
          $.ajax({
            type: "POST",
            url: 'Patients_registration/deletetele',
            dataType: "json",
            data: {
              getid: val,
              csrf_test_name: $('#csrf_test_name').val()
            },
            success: function(data) {
              $("#overlay").fadeOut(300);
              if (data.msg != '') {
                Swal.fire({
                  title: "Deleted",
                  text: "" + data.msg + "",
                  type: "success",
                  confirmButtonClass: "btn btn-success",
                  buttonsStyling: !1
                });
                search_tele();

              } else if (data.error != '') {
                Swal.fire({
                  title: "Warning!",
                  text: "" + data.error + "",
                  type: "warning",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              } else if (data.error_message) {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] + '\n';
                }
                Swal.fire({
                  title: "Info!",
                  text: "" + err_str + "",
                  type: "info",
                  confirmButtonClass: "btn btn-primary",
                  buttonsStyling: !1
                });
                return false;
              }

            },
            error: function(error) {
              Swal.fire({
                title: "Info!",
                text: "Network Busy",
                type: "info",
                confirmButtonClass: "btn btn-primary",
                buttonsStyling: !1
              });
              $("#overlay").fadeOut(300);
            }
          });

        }
      }))
    }
  }

  function getsummary() {

    $('#showdata_sum').html('');
    $.fn.dataTable.ext.errMode = 'none';

    saveurl = "Patients_registration/getsummary";
    $.ajax({
      type: "POST",
      url: saveurl,
      dataType: "json",
      data: $('#adv_search').serialize(),
      success: function(data) {

        if (data.msg != '') {
          $('#showdata_sum').html(data.getdata);
          $('#example_sum').DataTable({
            dom: 'Bfrtip'
          });

        } else if (data.error != '') {
          Swal.fire({
            title: "Warning!",
            text: "" + data.error + "",
            type: "warning",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        } else if (data.error_message) {
          var error = data.error_message;
          var err_str = '';
          for (var key in error) {
            err_str += error[key] + '\n';
          }
          Swal.fire({
            title: "Info!",
            text: "" + err_str + "",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
          });
        }

      },
      error: function(error) {
        Swal.fire({
          title: "Info!",
          text: "Network Busy",
          type: "info",
          confirmButtonClass: "btn btn-primary",
          buttonsStyling: !1
        });

      }
    });
  }

  function directbilling(printpatient_registration_id) {

    $('<form   method="post" action="<?php echo base_url() ?>transaction/Billing/"><input name="printpatient_registration_id" value="' + printpatient_registration_id + '"/><input name="csrf_test_name" value="' + $('#csrf_test_name').val() + '"></form>').appendTo('body').submit().remove();
  }

  function checkduplicateuser() {
    fname = $('#fname').val();
    mobileno = $('#mobileno').val();
    if (fname != '' || mobileno != "") {
      $.ajax({
        type: "POST",
        url: 'Patients_registration/checkduplicateuser',
        dataType: "json",
        data: {
          fname: fname,
          mobileno: mobileno
        },
        success: function(data) {
          var dateAr = data.edate.split('-');
          var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
          if (parseInt(data.days) >= 0 && parseInt(data.days) <= 15) {
            Swal.fire({
              title: 'Patient already registered',
              icon: 'info',
              html: 'Patient already registered with given mobile number',
              showCloseButton: true,
              showCancelButton: false,

            })
          }

        }
      });
    }
  }
</script>
<script type="text/javascript">
  $("body").removeClass(" vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-expanded").addClass("vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-collapsed");
</script>
<script src="<?= $path ?>app-assets/js/inputmast.js"></script>