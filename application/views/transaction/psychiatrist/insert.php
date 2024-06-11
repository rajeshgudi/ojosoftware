<?php 
$path=base_url('template1/modern-admin/');
$pathurlbase = $_SERVER["HTTP_HOST"];
$loadmedicine=1;
if($getofficedata)
{
    $loadmedicine=$getofficedata[0]['load_medicine'];
}
$hmmdins='';
if(isset($getmedins))
{
    foreach ($getmedins as $datamedins) {
       $hmmdins.='<option value="'.$datamedins['name'].'">'.$datamedins['name'].'</option>';
    }
}
?>   
<div style="display:none;"> 
     <textarea style="display:none;" class="form-control" name="med_inst_d" id="med_inst_d"><?php echo $hmmdins; ?></textarea>
<input type="checkbox" class="check_class" name="popupchk1" id="popupchk1"  checked value="1">
<input type="checkbox" class="check_class" name="popupchk2" id="popupchk2"  checked value="1">
<input type="checkbox" class="check_class" name="popupchk3" id="popupchk3"  checked value="1">
<input type="checkbox" class="check_class" name="popupchk4" id="popupchk4" checked  value="1">
<input type="checkbox" class="check_class" name="popupchk5" id="popupchk5" checked  value="1">
<input type="checkbox" class="check_class" name="popupchk6" id="popupchk6"  checked value="1">
<input type="checkbox" class="check_class" name="popupchk7" id="popupchk7" checked  value="1">
<input type="checkbox" class="check_class" name="popupchk8" id="popupchk8"  checked value="1">
<input type="checkbox" class="check_class" name="popupchk9" id="popupchk9" checked  value="1">
<input type="checkbox" class="check_class" name="popupchk10" id="popupchk10" checked  value="1">
<input type="checkbox" class="check_class" name="popupchk11" id="popupchk11" checked  value="1">
<input type="checkbox" class="check_class" name="popupchk12" id="popupchk12"  checked value="1">
</div>
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                <h2 style="font-size: 20px;" class="card-title"><b>Psychiatrist</b></h2>
                         <?php if($psychiatrist_process_id){ ?>
                               <button onclick="printpsy(<?php echo $psychiatrist_process_id; ?>)" style="float:right;" type="button" class="btn btn-primary"><i class="la la-print"></i></button>
                           <?php } ?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       
                                        <form method="post" id="psy_save_form" name="psy_save_form">
                                       <div class="row">
                                           <div class="col-md-12" style="background: gold;
    padding: 10px 0px 10px 15px;
    border-radius: 15px;"><b style="color: black;    font-size: 15px;">Patient Name: <?php echo $pname; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Age: <?php echo $ageyy; ?> YY <?php echo $agemm; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gender: <?php echo $gender; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phone No: <?php echo $mobileno; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address: <?php echo $address; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MRD NO: <?php echo $mrdno; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><b style="color: blue;    font-size: 15px;">Doctor:<?php echo $doc_name; ?></b></div>
                                     <input type="hidden" id="demo_frametype">
                                                <input type="hidden" id="demo_framecolor">
                                                <input type="hidden" id="edit_psychiatrist_process_id" name="edit_psychiatrist_process_id">
                                                <input type="hidden" id="demo_framesize">
                                                <input type="hidden" id="demo_framemodel">
    <input type="hidden" id="patient_registration_id" name="patient_registration_id" value="<?php echo $patient_registration_id; ?>">
    <input type="hidden" id="patient_appointment_id" name="patient_appointment_id" value="<?php echo $patient_appointment_id; ?>">
    <input type="hidden" id="doctor_id" name="doctor_id" value="<?php echo $doctor_id; ?>">
                                              
                              
                                <div class="row">
                                      <div class="modal fade" id="myModalframe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-body">
                         <div id="save_frame">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="hidden" id="frame_details_id">
                                  <div style="text-align: center;font-weight: bold;" id="heading-popup"></div>
                              </div>
                          </div>
                          <div id="pop-error"></div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div style="text-align: center;font-weight: bold;" id="heading-popuptitle"></div>
                              </div>
                          </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <label><b>Instruction</b></label>
                                    <div class="form-group">
                                        <div class="input-groupp"  id="showframetype">
                                          
                                        </div>
                                    </div>
                               </div>
                                <div class="col-md-3">
                                    <label><b>No of days</b></label>
                                    <div class="form-group">
                                        <div class="input-groupp"  id="showframecolor">
                                          
                                        </div>
                                    </div>
                               </div>
                               
                           </div>
                         </div>
                       

                    
                   <div class="modal-footer">
                   <button type="button" class="btn btn-success" name="update_serial_no" id="update_serial_no" onclick="saveframetype()">save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="popupclose">Close</button>
                     <!-- <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />   -->
                   </div>
                 </div>
                 <!-- /.modal-content -->
                 </div>
               <!-- /.modal-dialog -->
             </div>
             <!-- /.modal -->
           </div>
             </div>
                                       </div>
                                      
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Informant</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Informant</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="infor" id="infor" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($infor)
                                                                        {
                                                                            foreach ($infor as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                              
                                                              

                                                                
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                      <button type="button" onclick="downarrow(1)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="3" id="textarea1" name="textarea1"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 83 line row -->

                                       <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Cheif Complaints</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Complaints</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="cheif_comp" id="cheif_comp" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($cheif_comp)
                                                                        {
                                                                            foreach ($cheif_comp as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <label>Duration</label>
                                                                      <select style="width: 100%;" class="form-control select2" name="cheif_comp_dur1" id="cheif_comp_dur1" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php $i = 1; while ($i < 30) { ?>
                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                        <?php $i++; } ?>
                                                                   </select>
                                                                </div>

                                                                 <div class="col-md-2">
                                                                     <label>Duration</label>
                                                                      <select style="width: 100%;" class="form-control select2" name="cheif_comp_dur2" id="cheif_comp_dur2" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                        <option value="Hour(s)">Hour(s)</option>
                                                                         <option value="Day(s)">Day(s)</option>
                                                                        <option value="Week(s)">Week(s)</option>
                                                                        <option value="Month(s)">Month(s)</option>
                                                                        <option value="Year(s)">Year(s)</option>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                     <button type="button" onclick="downarrow(2)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                      <textarea class="form-control" rows="3" id="textarea2" name="textarea2"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
                                        <!-- End 140 line row -->

                                         <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Past Psychiatrist Illness</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Disease</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="past_disease" id="past_disease" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($past_psy)
                                                                        {
                                                                            foreach ($past_psy as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <label>Duration</label>
                                                                      <select style="width: 100%;" class="form-control select2" name="past_dur1" id="past_dur1" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php $i = 1; while ($i < 30) { ?>
                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                        <?php $i++; } ?>
                                                                   </select>
                                                                </div>

                                                                 <div class="col-md-2">
                                                                     <label>Duration</label>
                                                                      <select style="width: 100%;" class="form-control select2" name="past_dur2" id="past_dur2" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                        <option value="Hour(s)">Hour(s)</option>
                                                                         <option value="Day(s)">Day(s)</option>
                                                                        <option value="Week(s)">Week(s)</option>
                                                                        <option value="Month(s)">Month(s)</option>
                                                                        <option value="Year(s)">Year(s)</option>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                       <button type="button" onclick="downarrow(3)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                     <textarea class="form-control" rows="3" id="textarea3" name="textarea3"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 97 line row -->
                        <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Past Medical & Surgery</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Past medical & Surgery</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="past_med_sur" id="past_med_sur" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($past_med_sur)
                                                                        {
                                                                            foreach ($past_med_sur as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <label>Duration</label>
                                                                      <select style="width: 100%;" class="form-control select2" name="past_med_dur1" id="past_med_dur1" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php $i = 1; while ($i < 30) { ?>
                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                        <?php $i++; } ?>
                                                                   </select>
                                                                </div>

                                                                 <div class="col-md-2">
                                                                     <label>Duration</label>
                                                                      <select style="width: 100%;" class="form-control select2" name="past_med_dur2" id="past_med_dur2" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                        <option value="Hour(s)">Hour(s)</option>
                                                                         <option value="Day(s)">Day(s)</option>
                                                                        <option value="Week(s)">Week(s)</option>
                                                                        <option value="Month(s)">Month(s)</option>
                                                                        <option value="Year(s)">Year(s)</option>
                                                                   </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                      <button type="button" onclick="downarrow(4)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="3" id="textarea4" name="textarea4"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 170 line row -->

                        <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Family History</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Relation</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="relation" id="relation" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($fam_rel)
                                                                        {
                                                                            foreach ($fam_rel as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <label>Disease</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="fam_dis" id="fam_dis" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($fam_hist)
                                                                        {
                                                                            foreach ($fam_hist as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                              

                                                                
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                      <button type="button" onclick="downarrow(5)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                     <textarea class="form-control" rows="3" id="textarea5" name="textarea5"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 244 line row -->
              <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Personal History</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Personal History</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="per_hist" id="per_hist" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($per_hist)
                                                                        {
                                                                            foreach ($per_hist as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                              
                                                              

                                                                
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                      <button type="button" onclick="downarrow(6)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="3" id="textarea6" name="textarea6"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 312 line row -->
               <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Diagnosis</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-6">
                                                                    <label>Diagnosis</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="dia" id="dia" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($diagnosis_v)
                                                                        {
                                                                            foreach ($diagnosis_v as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                              
                                                              

                                                                
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                     <button type="button" onclick="downarrow(7)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                     <textarea class="form-control" rows="3" id="textarea7" name="textarea7"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 368 line row -->

     <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Medicine</div>
                                                    <div class="popover-body">
                                                   
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-12" style="margin-top: 1%;">
                                                                 
                                    <input type="hidden" name="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div id="addmed_modal_view" >
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label>Type</label>
                                            <select class="form-control" name="typeaction" id="typeaction" onchange="typeofmedicineaction(this.value);">
                                                <option value="0">EMR</option>
                                                <option value="1">PHARMACY</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row" id="emr_action">
                                            <div class="col-md-6">
                                                <label>Select Medicine<span class="text-danger">*</span></label>
                                                <select style="width:100%;" class="form-control select2" name="medicine_id" id="medicine_id" onchange="getallmedicine(this.value)">
                                                    <option value="">Select Medicine</option>
                                                    <?php if ($getallmedicine) foreach ($getallmedicine as $data) { ?>
                                                        <option value="<?php echo $data['medicine_id']; ?>"><?php echo $data['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Medicine Templates: <span class="text-danger">*</span></label>
                                                    <select style="width:100%;" class="form-control select2" id="medicine_templates_id" name="medicine_templates_id" onchange="selecttemp(this.value)">
                                                        <option value="">Select Medicine Templates</option>
                                                        <?php if ($medtemplates) foreach ($medtemplates as $data) { ?>
                                                            <option value="<?php echo $data['medicine_templates_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row form-group" id="pharmacy_action" style="display:none;">
                                             <div class="col-md-6">
                                                 <label>Search Medicine</label>
                                                <input type="text" style="background: #0abdef;" name="" class="form-control" id="pro_name" onkeyup="loadautocomplete($(this).val(),1)" onkeydown="add_focus_to_first(event)" autocomplete="off">
                                             </div>
                                              <div class="col-md-6">
                                                   <label>Medicine Templates</label>
                                           <select class="form-control select2" id="medicine_templates_id_ph" name="medicine_templates_id_ph" style="width:100%;" onchange="loadpreop_ins($(this).val());">
                                               <option value="">Select Medicine Templates</option>
                                               <?php if($medtemplates_pharmacy) foreach ($medtemplates_pharmacy as $data) { ?>
                                                    <option value="<?php echo $data['medicine_templates_id']; ?>"><?php echo $data['name']; ?></option>
                                             <?php  } ?>
                                           </select>
                                              </div>

                                             
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <br/>
                                                    

                                                    <div id="med_ph_pop"></div>

                                                    <div class="table-responsive">
                                                        <table class="table table-bquotationed">
                                                            <thead class="lookuphead" id="frame_section">
                                                                <tr>
                                                                    <th>Item Name</th>
                                                                    <th>Batch No</th>
                                                                    <th>Expiry Date</th>
                                                                    <th>MRP</th>
                                                                    <th>SP</th>
                                                                    <th>Stock</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="sugession">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                      

                                         </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="productdetails">
                                                        <thead>
                                                            <tr>
                                                                <th>Drug Name</th>
                                                                <th>Instruction</th>
                                                                <th>No.days</th>
                                                                <th>Qty</th>
                                                                <th style="display:none;">Start Date</th>
                                                                <th style="display:none;">End Date</th>
                                                                <th>Eye</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <div id="search_result"></div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="col-md-12">
                                                <label>Remarks</label>
                                                <textarea class="form-control" name="medicine_doc_remarks" id="medicine_doc_remarks"></textarea>
                                            </div>
                                        </div>

                                       

                                    </div>
                              

                                  </div>                             
                                                              

                                                                
                                                             
                                                               

                                                            </div>
                                                           


                                                      
                                                   
                                            
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 425 line row -->

           <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Advice</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-12">
                                            
                                                     
                                                       
                                                            <div class="row" style="margin-top: 1%;">
                                                                <div class="col-md-2">
                                                                    <label>Advice</label>
                                                                    <select style="width: 100%;" class="form-control select2" name="advice" id="advice" style="margin-bottom: 5%;">
                                                                       <option value="">Select</option>
                                                                       <?php
                                                                        if($advice)
                                                                        {
                                                                            foreach ($advice as $data_c) {
                                                                               ?>
                                                                               <option value="<?php echo $data_c['name'];  ?>"><?php echo $data_c['name'];  ?></option>
                                                                           <?php }}?>
                                                                   </select>
                                                                </div>
                                                              
                                                              

                                                                
                                                                <div class="col-md-2">
                                                                     <br/>
                                                                       <button type="button" onclick="downarrow(8)" style="margin-top: 5%;padding: 5px;font-size: 25px;" class="btn btn-success btn-sm"><i class="ft-corner-down-left"></i></button>
                                                                </div>
                                                               

                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" rows="3" id="textarea8" name="textarea8"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>
                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 694 line row -->

       <div class="row">
                                            <div class="col-md-12 text-left">
                                               
                                                <div class="popover bs-popover-top show popover-demo" style=" width: 100% !important;"> 
                                                    <div class="arrow arrow-left-demo"></div>
                                                    <div class="popover-header">Remarks</div>
                                                    <div class="popover-body">
                                                       <div class="row">
                                            <div class="col-md-6">
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Permorbid Personality</label>
                                                     <textarea class="form-control" rows="3" id="textarea9" name="textarea9"></textarea>
                                                </div>
                                            </div>   
                                                   
                                            </div>


                                                 <div class="col-md-6">
                                            
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                     <label>Medical Status Examination</label>
                                                                    <textarea class="form-control" rows="3" id="textarea10" name="textarea10"></textarea>
                                                                </div>
                                                            </div>


                                                      
                                                   
                                            </div>



                                       </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                          
                                        </div> 
  <!-- End 757 line row -->

  <div class="row">
      <div class="col-md-3">
          <label>Review Date</label>
          <input type="date" name="review_date" id="review_date" class="form-control">
      </div>
  </div>
                                       
                                      
                         





</form>

                                    </div>

                                     <div class="card-footer ml-auto">
                                    <button id="save" type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata();">Submit</button>
                                     <button style="display:none;" type="button" id="update" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedata_psy();">Update</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Justified With Top Border end -->
            </div>
<style type="text/css">
    .sumdown
    {
        margin-top: 3%;
    }
    .table th, .table td {
  
    padding: 0px 0px 0px 0px;
}



</style>
            <script>
                <?php if($psychiatrist_process_id){ ?>
                psychiatrist_process_id=<?php echo $psychiatrist_process_id; ?>;
                <?php }else{ ?>
                     psychiatrist_process_id=0;
                 <?php } ?>
                 csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
                var daysInMonth = [31,28,31,30,31,30,31,31,30,31,30,31],
    today = new Date(),
    // default targetDate is christmas
    targetDate = new Date(today.getFullYear(), 11, 25); 

setDate(targetDate);
setYears(5) // set the next five years in dropdown

$("#select-month").change(function() {
  var monthIndex = $("#select-month").val();
  setDays(monthIndex);
});

 $(document).ready(function() 
 {
    if(psychiatrist_process_id>0) 
    {
        editdata(psychiatrist_process_id);
    } 
});

//  function printpsy(psyid)
// {
//     $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Psychiatrist/printpsy"><input name="examinationid" value="'+examinationid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove(); 
// }

 function printpsy(psyid)
{
   var inputFields = [];
for (var i = 1; i <= 12; i++) {
    var inputField = $('<input>').attr({
        name: 'chkpostout' + i,
        value: $('#popupchk'+i).is(':checked')
    });
    inputFields.push(inputField);
}

// Create a form element
var form = $('<form>', {
    target: '_blank',
    method: 'post',
    action: '<?php echo base_url(); ?>transaction/Psychiatrist/printpsy'
});

// Add individual input fields to the form
csrf_test_name=$('#csrf_test_name').val();
form.append('<input name="printpsyid" value="' + psyid + '" />');
form.append('<input name="csrf_test_name" value="' + csrf_test_name + '" />');


// Append the input fields from the inputFields array to the form
for (var i = 0; i < inputFields.length; i++) {
    form.append(inputFields[i]);
}

// Append the form to the body, submit it, and remove it
form.appendTo('body').submit().remove();


}


  function editdata(val) {
        $("#overlay").fadeIn(300);
        $.ajax({
            type: "POST",
            url: 'geteditdata',
            dataType: "json",
            data: {
                getid: val,
                csrf_test_name: csrf
            },
            success: function(data) {
                $("#overlay").fadeOut(300);
                if (data.msg != '') 
                {
                    $('#edit_psychiatrist_process_id').val(data.mastertable[0]['psychiatrist_process_id']);
                    $('#textarea1').val(data.mastertable[0]['informant']);
                    $('#textarea2').val(data.mastertable[0]['cheif_complaints']);
                    $('#textarea3').val(data.mastertable[0]['past_psychiatrist_illness']);
                    $('#textarea4').val(data.mastertable[0]['past_medical_surgery']);
                    $('#textarea5').val(data.mastertable[0]['family_history']);
                    $('#textarea6').val(data.mastertable[0]['personal_history']);
                    $('#textarea7').val(data.mastertable[0]['diagnosis']);
                    $('#textarea8').val(data.mastertable[0]['advice']);
                    $('#textarea9').val(data.mastertable[0]['permorbid_personality']);
                    $('#textarea10').val(data.mastertable[0]['medical_status_examination']);
                    $('#review_date').val(data.mastertable[0]['review_date']);
                    $('#medicine_doc_remarks').val(data.mastertable[0]['medicine_doc_remarks']);
                     getaddmedhistorysaveddata(data.mastertable[0]['psychiatrist_process_id']);
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
    function getaddmedhistorysaveddata(key) {
        // $("#overlay").fadeIn(300);

        $.ajax({
            type: "POST",
           url: '<?php echo base_url(); ?>transaction/Psychiatrist/showhistorydata',
            dataType: "json",
            data: {
                key: key,
                csrf_test_name: csrf
            },
            success: function(data) {
                $("#overlay").fadeOut(300);
                if (data.msg != '') {

                    $('#productdetails').children('tbody').append(data.docmed);
                    row_num = data.rowcnt + 1;

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


   
function setDate(date) {
  setDays(date.getMonth());
  $("#select-day").val(date.getDate());
  $("#select-month").val(date.getMonth());
  $("#select-year").val(date.getFullYear()); 
}

// make sure the number of days correspond with the selected month
function setDays(monthIndex) {
  var optionCount = $('#select-day option').length,
      daysCount = daysInMonth[monthIndex];
  
  if (optionCount < daysCount) {
    for (var i = optionCount; i < daysCount; i++) {
      $('#select-day')
        .append($("<option></option>")
        .attr("value", i + 1)
        .text(i + 1)); 
    }
  }
  else {
    for (var i = daysCount; i < optionCount; i++) {
      var optionItem = '#select-day option[value=' + (i+1) + ']';
      $(optionItem).remove();
    } 
  } 
}

function setYears(val) {
  var year = today.getFullYear();
  for (var i = 0; i < val; i++) {
      $('#select-year')
        .append($("<option></option>")
        .attr("value", year + i)
        .text(year + i)); 
    }
}

function typeofmedicineaction(val)
{

    if(val==0)
    {
        $('#emr_action').show(500);
        $('#pharmacy_action').hide(500);
    }
    if(val==1)
    {
        $('#emr_action').hide(500);
        $('#pharmacy_action').show(500);
    }
}
 var timeout = 500;
    var timer;
function loadautocomplete(product, val) {

        $('#sugession').empty();
        if (product.length < 3) {
            $('#sugession').parent().hide();
            return;
        }
        clearTimeout(timer);
        timer = setTimeout(function() {
            st = '';
            $('#sugession').parent().show();
            product_result = [];
            $.ajax({
                url: '<?php echo base_url(); ?>transaction/Examination/sales_search_stock',
                type: 'post',
                dataType: 'json',
                data: {
                    product: product,
                    csrf_test_name: $('#csrf_test_name').val()
                },
                success: function(data) {
                    $('#sugession').html('');
                    if (data.msg != '') {
                        product_result = data.getdata;
                        data.getdata.forEach(function(item, index) {
                            var name = item['name'];
                            var mrp = item['mrp'];
                            var selling_price = item['selling_price'];
                            var stock = item['quantity'];
                            var batchno = item['batchno'];
                            var expirydate = item['expirydate'];
                            var days = item['days'];
                            if (days == null) {
                                days = 0;
                            }
                            // alert(days);
                            if (days > 0) {
                                st = '<br/><span class="text-danger">Expire  in ' + days + ' Days</span>';
                                onclickfn = 'onclick="setActive($(this))"';
                            } else {
                                st = '<br/><span class="text-warning">Expired  in ' + days + ' Days</span>';
                                onclickfn = 'onclick="expireditem()"';
                            }


                            var html = '<tr ondblclick="addProduct(' + index + ')"  ' + onclickfn + '  onkeydown="changeActive($(this),event)" tabindex="' + index + '"><td style="color: #6f42c1;font-weight: 600;">' + name + ' ' + st + '</td><td>' + batchno + '</td><td>' + expirydate + '</td><td>' + mrp + '</td><td>' + selling_price + '</td><td>' + stock + '</td></tr>';
                            $('#sugession').append(html);
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

                }
            });



        }, timeout);
    }

      function selecttemp(sel) {
        if (sel > 0) {
            $("#overlay").fadeIn(300);
            $('#examination_data').html('');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>transaction/Examination/getalltempl',
                dataType: "json",
                data: {
                    sel: sel,
                    csrf_test_name: csrf
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {
                        medtem = data.msg;
                        var array = medtem.split(",");
                        $.each(array, function(i) {
                            if (array[i] > 0) {
                                getallmedicine(array[i]);
                            }
                        });
                    } else if (data.error != '') {
                        Swal.fire({
                            title: "Info!",
                            text: "" + data.error + "",
                            type: "info",
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

  row_num = 1;
    row_num_dia = 1;
    cd = (new Date()).toISOString().split('T')[0];
    $('#review_date').val(cd);

    function getallmedicine(val) {
        if (val > 0) {
            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>transaction/Examination/getmedinedetails',
                dataType: "json",
                data: {
                    medid: val,
                    csrf_test_name: csrf
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {

                        $('#productdetails').children('tbody').append('<tr>\n\
                                       <td>' + data.getdata[0]['drugname'] + '</td>\n\
                                       <td><input type="hidden" class="form-control" id="medicine_id_' + row_num + '" name="medicine_id[]" value="' + val + '"><input type="text" class="form-control" onkeyup="getlistdescription(this.value,' + data.getdata[0]['category_id'] + ',' + row_num + ')" id="instruction_' + row_num + '" name="instruction[]" value="' + data.getdata[0]['instruction'] + '"><span id="search_result' + row_num + '"></span></td>\n\
                                       <td><input type="text" class="form-control" id="days_' + row_num + '" name="days[]" value="' + data.getdata[0]['days'] + '"></td>\n\
                                        <td><input type="text" class="form-control" id="qty_' + row_num + '" name="qty[]" value="1"></td>\n\
                                        <td style="display:none;"><input type="date" class="form-control" id="sdate_' + row_num + '" name="sdate[]" value="' + cd + '"></td>\n\
                                         <td style="display:none;"><input type="date" class="form-control" id="tdate_' + row_num + '" name="tdate[]" value="' + cd + '"></td>\n\
                                          <td><select class="form-control" name="medeye[]" id="medeye_' + row_num + '"><option value="BE">BE</option><option value="LE">LE</option><option value="RE">RE</option><option value="A/F">A/F</option><option value="B/F">B/F</option></select></td>\n\
                                           <td>\n\
                                            <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">\n\
                                            <button class="btn btn-danger btnDelete btn-sm">\n\
                                               <i class="la la-trash"></i>\n\
                                            </button>\n\
                                            </a>\n\
                                            <a href="#" id="mult_' + row_num + '" class="table-link danger serial_number_setting" data-target="#myModalframe" data-toggle="modal" onclick="pop(' + row_num + ')"><button class="btn btn-sm btn-success">Add</button></a>\n\
                                            <div  class="multiple_'+row_num+'" style="display:none;">\n\
                                          <input type="hidden" name="mulframetype[]" id="mulframetype_'+row_num+'" class="form-control span2">\n\
                                          <input type="hidden" name="mulframecolor[]" id="mulframecolor_'+row_num+'" class="form-control span2">\n\
                                          <input type="hidden" name="med_name[]"  id="med_name_'+row_num+'"  class="form-control span2">\n\
                                           <input type="hidden" name="med_action[]" value="0" id="med_action_'+row_num+'" class="form-control span2">\n\
                                        </div>\n\
                                       </td>\n\
                                         </tr>');
                        row_num++;

                    } else if (data.error != '') {
                        $('#complaintid').html('No Data Found');
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

    function pop(val)
            {
                res='';
                showval='';
                selframetype='';
                selframecolor='';
                selframemodel='';
                selframesize='';
                addframetype='';
                addframecolor='';
                addframesize='';
                addframemodel='';
                var frametype = $('#demo_frametype').val();
                var framecolor = $('#demo_framecolor').val();
              
                $('#frame_details_id').val('');
                $('#frame_details_id').val(val);
                var qty = 10;
                $('#heading-popup').html('<b>Medicine Instruction details</b>');
                if(qty>0){
                if (isNaN(qty) || qty=="" ) { qty=0; }
                lng=qty;
                if (isNaN(lng) || lng=="" ) { lng=0; }
                var text = ""
                var i = 0;

                do {
                var slno=0;
                if(qty.length>i){slno=qty[i];}
                if(slno==0) {slno=""};
                  addframetype += "<input type='text' class='form-control' name='mframetype[]' id='mframetype_"+i+"' value="+frametype+"><br>" ;
                  addframecolor += "<input type='text' class='form-control' name='mframcolor[]' id='mframecolor_"+i+"' value="+framecolor+"><br>" ;
                 
                  
                i++;
                }
                while (i < lng);
                    document.getElementById("showframetype").innerHTML = addframetype;
                    document.getElementById("showframecolor").innerHTML = addframecolor;
                   

                }
                else
                {
                    //$('#heading-popuptitle').html('<p class="text-danger">Please Check Qty</p>');
                    $('#showframetype').html('');
                }
                   selframetype=$('#mulframetype_'+val).val();
                   selframecolor=$('#mulframecolor_'+val).val();
                 
                   showframetypeval='';
                   if(selframetype){
                     var j = 0;
                     while (j < qty) {
                            var resframetype = selframetype.split(",");
                            showframetypeval=resframetype[j];
                       
                             $('#mframetype_'+j).val(showframetypeval);

                             var resframecolor = selframecolor.split(",");
                             showframecolorval=resframecolor[j];
                             $('#mframecolor_'+j).val(showframecolorval);

                             j++;
                        }
                   }

            }

            function saveframetype()
{
          Swal.fire({title:"Are you sure?",
            text:"",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Save it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
                        var getproductid = $('#frame_details_id').val();
                        var qty =20;
                        var valueframetype='';
                        var valueframecolor='';
                       
                        for(var i=0;i<qty;i++){
                           getframetype= $('#mframetype_'+i).val();
                           valueframetype+=getframetype+',';

                           getframecolor= $('#mframecolor_'+i).val();
                           valueframecolor+=getframecolor+',';

                         
                      }
                      $('#mulframetype_'+getproductid).val(valueframetype);
                      $('#mulframecolor_'+getproductid).val(valueframecolor);
                   
                      $('#popupclose').click();
                    //  $("#quantity_"+getproductid).prop("readonly", true);
               
                }
                }))
            

        
        
}

  function addProduct(index, from, qty, rate) {

        $("#overlay").fadeIn(300);
        $('.product_select').removeClass('product_select');
        $('#sugession').html('');
        $('#sugession').parent().hide();
        var row = product_result[index];
        for (var k = 1; k < row_num; k++) {
            if ($('#stock_id_' + k).val() == row['stock_id']) {
                if (from == 1) {
                    var qty = $('#quantity_' + k).val();
                    qty = parseFloat(qty);
                    qty++;
                    $('#quantity_' + k).val(qty);
                    calcrow(k);
                    $('#quantity_' + k).focus();
                } else {
                    Swal.fire({
                        title: "Info!",
                        text: "already added",
                        type: "info",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: !1
                    });

                }
               
                return;
            }
        }
        mmedins=$('#med_inst_d').val();
 $("#overlay").fadeOut(300);
         $('#productdetails').children('tbody').append('<tr>\n\
           <td>' + row['name'] + '</td>\n\
           <td><input type="hidden" class="form-control" id="medicine_id_' + row_num + '" name="medicine_id[]" value="' + row['stock_id'] + '"><select  class="form-control"  id="instruction_' + row_num + '" name="instruction[]" >'+mmedins+'</select><span id="search_result' + row_num + '"></span></td>\n\
           <td><input type="text" class="form-control" id="days_' + row_num + '" name="days[]" ></td>\n\
            <td><input type="text" class="form-control" id="qty_' + row_num + '" name="qty[]" value="1"></td>\n\
            <td style="display:none;"><input type="date" class="form-control" id="sdate_' + row_num + '" name="sdate[]" value="' + cd + '"></td>\n\
             <td style="display:none;"><input type="date" class="form-control" id="tdate_' + row_num + '" name="tdate[]" value="' + cd + '"></td>\n\
              <td><select class="form-control" name="medeye[]" id="medeye_' + row_num + '"><option value="BE">BE</option><option value="LE">LE</option><option value="RE">RE</option><option value="A/F">A/F</option><option value="B/F">B/F</option></select></td>\n\
               <td>\n\
                <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">\n\
                <button class="btn btn-danger btnDelete btn-sm">\n\
                   <i class="la la-trash"></i>\n\
                </button>\n\
                </a>\n\
                <a href="#" id="mult_' + row_num + '" class="table-link danger serial_number_setting" data-target="#myModalframe" data-toggle="modal" onclick="pop(' + row_num + ')"><button class="btn btn-sm btn-success">Add</button></a>\n\
                <div  class="multiple_'+row_num+'" style="display:none;">\n\
              <input type="hidden" name="mulframetype[]" id="mulframetype_'+row_num+'" class="form-control span2">\n\
              <input type="hidden" name="mulframecolor[]" id="mulframecolor_'+row_num+'" class="form-control span2">\n\
               <input type="hidden" name="med_action[]" value="1" id="med_action_'+row_num+'" class="form-control span2">\n\
                <input type="hidden" name="med_name[]"  id="med_name_'+row_num+'" value="' + row['name'] + '" class="form-control span2">\n\
            </div>\n\
           </td>\n\
             </tr>');
                        row_num++;
        


    }

      function expireditem() {
        Swal.fire({
            title: "Info!",
            text: "This  Medicine Expired.cant able to Bill",
            type: "info",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: !1
        });
        return false;
    }

  function setActive(ref) {
        $('.product_select').removeClass('product_select');
        ref.addClass('product_select');
    }

 function add_focus_to_first(event) {
        if ((event.keyCode == 13) || (event.keyCode == 40)) {
            event.preventDefault();
            $('#sugession').children('tr:first').addClass('product_select');
            $('.product_select').focus();
        }
    }
    function downarrow(val)
    {
        if(val==1)
        {
            comva=$('#infor').val();
            textareav = $('#textarea' + val).val();
            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + comva);
            } else {
                $('#textarea' + val).val(comva);
            }
        }

        if(val==2)
        {
            comva=$('#cheif_comp').val();
            cheif_comp_dur1=$('#cheif_comp_dur1').val();
            cheif_comp_dur2=$('#cheif_comp_dur2').val();
            textareav = $('#textarea' + val).val();
           // Concatenate the values with hyphens
            var concatenatedValue = comva + '-' + cheif_comp_dur1 + '-' + cheif_comp_dur2;

            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + concatenatedValue);
            } else {
                $('#textarea' + val).val(concatenatedValue);
            }
        }
         if(val==3)
        {
            comva=$('#past_disease').val();
            cheif_comp_dur1=$('#past_dur1').val();
            cheif_comp_dur2=$('#past_dur2').val();
            textareav = $('#textarea' + val).val();
           // Concatenate the values with hyphens
            var concatenatedValue = comva + '-' + cheif_comp_dur1 + '-' + cheif_comp_dur2;

            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + concatenatedValue);
            } else {
                $('#textarea' + val).val(concatenatedValue);
            }
        }
         if(val==4)
        {
            comva=$('#past_med_sur').val();
            cheif_comp_dur1=$('#past_med_dur1').val();
            cheif_comp_dur2=$('#past_med_dur2').val();
            textareav = $('#textarea' + val).val();
           // Concatenate the values with hyphens
            var concatenatedValue = comva + '-' + cheif_comp_dur1 + '-' + cheif_comp_dur2;

            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + concatenatedValue);
            } else {
                $('#textarea' + val).val(concatenatedValue);
            }
        }
        if(val==5)
        {
            comva=$('#relation').val();
            cheif_comp_dur1=$('#fam_dis').val();
          
            textareav = $('#textarea' + val).val();
           // Concatenate the values with hyphens
            var concatenatedValue = comva + '-' + cheif_comp_dur1;

            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + concatenatedValue);
            } else {
                $('#textarea' + val).val(concatenatedValue);
            }
        }
         if(val==6)
        {
             comva=$('#per_hist').val();
            textareav = $('#textarea' + val).val();
            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + comva);
            } else {
                $('#textarea' + val).val(comva);
            }
        }

         if(val==7)
        {
             comva=$('#dia').val();
            textareav = $('#textarea' + val).val();
            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + comva);
            } else {
                $('#textarea' + val).val(comva);
            }
        }
         if(val==8)
        {
             comva=$('#advice').val();
            textareav = $('#textarea' + val).val();
            // Add a line break if the textarea already has content
            if (textareav) {
                $('#textarea' + val).val(textareav + '\n' + comva);
            } else {
                $('#textarea' + val).val(comva);
            }
        }
         

    }


function savedata()
{
  
        Swal.fire({title:"Are you sure?",
            text:"Do You Want Save this Data",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Proceed it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
             $("#overlay").fadeIn(300);
                    $.ajax({
            type: "POST",
            url: 'savedata',
            dataType: "json",
            data: $('#psy_save_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
             window.location.href = "https://<?php echo $pathurlbase; ?>/master/Psychiatrist_doctor_appointment";
              } else if(data.error != ''){
                Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
              }
                
            },
            error: function (error) {
                Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                $("#overlay").fadeOut(300);  
            }
        }); 
               
                }
                })) 
}

 function updatedata_psy() {
            Swal.fire({
                text:"Are You Sure  update this Data",
                type:"warning",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Proceed it!",
                confirmButtonClass: "btn btn-warning",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: !1
            }).then((function(t) {
                if (t.value) {
                    $("#overlay").fadeIn(300);
                    $.ajax({
                        type: "POST",
                        url: 'updatedata',
                        dataType: "json",
                        data: $('#psy_save_form').serialize(),
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
                                window.location.href = "http://<?php echo $pathurlbase; ?>/master/Psychiatrist_doctor_appointment";
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
            }))

    }

     function changeActive(ref, event) {
        $('.product_select').removeClass('product_select');
        if (event.keyCode == 40) {
            ref.next().addClass('product_select');
            $('.product_select').focus();
        }
        if (event.keyCode == 38) {
            ref.prev().addClass('product_select');
            $('.product_select').focus();
        }
        if (event.keyCode == 13) {
            var index = ref.attr('tabindex');
            addProduct(index);
            return;
        }

    }
 function changefocus(event, ref) {
        var ref_id = ref.attr('id');
        var index = ref_id.split("_")[1];
        index = parseInt(index);

        var keycode = (event.keyCode ? event.keyCode : event.which);

        if (keycode == '13') {
            event.preventDefault();
            $('#pro_name').val('');
            $('#pro_name').focus();
        } else if (keycode == '38') {
            while (index > 0) {
                index--;
                if ($('#quantity_' + index).length > 0) {
                    $('#quantity_' + index).focus();
                    break;
                }
            }
        } else if (keycode == '40') {
            while (index < row_num) {
                index++;
                if ($('#quantity_' + index).length > 0) {
                    $('#quantity_' + index).focus();
                    break;
                }
            }
        }
    }

<?php if($loadmedicine==2){ ?>
typeofmedicineaction(1);
$('#typeaction').val(1);
<?php } ?>

            </script>

         