<?php 
$path=base_url('template1/modern-admin/');
$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
?>   
<script type="text/javascript">
    var doc_examination_id=<?php echo $doc_examination_id; ?>;
    var actionflag=<?php echo $actionflag; ?>;
row_numm=1;
</script>
<style type="text/css">
  table th 
  {
    background: #add8f4;
  }
  .table-bordered th, .table-bordered td {
    border: 1px solid #add8f4;
}
<?php if($doc_examination_id>0){ ?>

    <?php } else { ?>
     .pricss
    {
        display: none;
    }   
    <?php } ?>

 <?php if($actionflag==1 || $actionflag==0){  ?>
     .actionflagcls_foropth
    {
        display: block;
    }   
   
  <?php }else{  ?>
     .actionflagcls_foropth
    {
        display: none;
    }   
   <?php } ?>

   <?php if($actionflag==2){  ?>
     .actionflagcls_fordoc
    {
        display: block;
    }   
   
  <?php }else{  ?>
     .actionflagcls_fordoc
    {
        display: none;
    }   
   <?php } ?>

</style>   
 <div class="content-body">
    <input type="hidden" id="objsph">
    <input type="hidden" id="objcyl">
    <input type="hidden" id="objaxe">
     <input type="hidden" id="objva">
      <input type="hidden" id="objadd">
     <input type="hidden" id="objnv">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                              <div class="card">
                                <div class="card-body">
                                 
                                  <ul class="nav nav-pills nav-pill-toolbar nav-justified">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="active2-pill1" data-toggle="pill" href="#active21"
                                        aria-expanded="true"><l id="tab_tit">Examination<l></a>
                                    </li>
                                      <?php if($doc_examination_id>0){ ?>
                                     <li class="nav-item" >
                                      <a class="nav-link" id="link3-pill2" data-toggle="pill" href="#link22" aria-expanded="false">Preview</a>
                                    </li>
                                    <?php } ?>
                                    <li class="nav-item" >
                                      <a class="nav-link" id="link2-pill1" data-toggle="pill" href="#link21" aria-expanded="false">Case History</a>
                                    </li>
                                  
                                 
                                    
                                  </ul>
                                  <div class="tab-content px-1 pt-1">
                                    <div id="refractionmodal"></div>
                                    <div role="tabpanel" class="tab-pane active" id="active21" aria-labelledby="active2-pill1"
                                      aria-expanded="true">
                                        <form id="examination_addmedhistorysaveform" action="#" method="post"> 
                                          <input type="hidden" name="csrf_test_name"  value="<?php echo $this->security->get_csrf_hash(); ?>">
                                         <div id="addmed_modal_view" style="display:none;">
                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Select Medicine<span class="text-danger">*</span></label>
                                                                    <select class="form-control select2" name="medicine_id" id="medicine_id" onchange="getallmedicine(this.value)">
                                                                        <option value="">Select Medicine</option>
                                                                        <?php if($getallmedicine) foreach($getallmedicine as $data) { ?>
                                                                            <option value="<?php echo $data['medicine_id']; ?>"><?php echo $data['name']; ?></option>
                                                                      <?php } ?>
                                                                    </select>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Medicine Templates: <span class="text-danger">*</span></label>
                                                                       <select class="form-control select2" id="medicine_templates_id" name="medicine_templates_id" onchange="selecttemp(this.value)">
                                                                           <option value="">Select Medicine Templates</option>
                                                                           <?php if($medtemplates) foreach ($medtemplates as $data) { ?>
                                                                                <option value="<?php echo $data['medicine_templates_id']; ?>"><?php echo $data['name']; ?></option>
                                                                         <?php  } ?>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/>
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
                                                             <br/>
                                                              <div class="col-md-6">
                                                                <label>Remarks</label>
                                                                <textarea class="form-control" name="medicine_doc_remarks" id="medicine_doc_remarks"></textarea>
                                                              </div>
                                                             </div>

                                <div class="card-footer ml-auto" id="m_btn_addmedhis">
                                    <button  class="btn btn-primary btn-sm" type="button" onclick="addmedhistorydetails();"><i class="fas fa-plus-square"></i>Submit</button>
                                    <button type="button"  class="btn btn-danger btn-sm"  onclick="backmedscreen()">Back</button>
                                </div>

                                         </div>
                                     </form>

                                    <form id="examination_addeyepartssaveform" action="#" method="post"> 
                                        <input type="hidden" name="csrf_test_name"  value="<?php echo $this->security->get_csrf_hash(); ?>">
                                         <div id="add_modal_eyeparts" style="display:none;">
                                            <div class="row">
                                                   <div class="col-md-4" id="allsegmentlistshowing">
                                                    
                                                    
                                                   </div>
                                                <div class="col-md-8">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover" id="productdetailseye">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:50%;">Content</th>
                                                                    <th style="width:25%;">Right</th>
                                                                    <th style="width:25%;">Left</th>
                                                                </tr>
                                                             </thead>
                                                             <tbody>
                                                                
                                                             </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                 <div class="card-footer ml-auto" >
                                    <button  class="btn btn-primary btn-sm" type="button" onclick="addeyesave();"><i class="fas fa-plus-square"></i>Submit</button>
                                    <button type="button"  class="btn btn-danger btn-sm"  onclick="backscreeneye()">Back</button>
                                </div>
                                        </div>
                                    </form>

                                         <form id="examination_addhistorysaveform" action="#" method="post"> 
                                  <input type="hidden" name="csrf_test_name"  value="<?php echo $this->security->get_csrf_hash(); ?>">
                                  
                                         <div id="add_modal_view" style="display:none;">
                                       
                                                           <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="table-responsive">
                                                                        <style type="text/css">
                                    

table.scroll tbody,
table.scroll thead { display: block; }



table.scroll tbody {
    height: 220px;
    overflow-y: auto;
    overflow-x: hidden;
}



.scroll tbody td, thead th {
    width: 10%; /* Optional */
  
}


                                                                        </style>
                                                        <table class="table table-bordered table-hover scroll" id="complaintidd" style="width:100%;">
                                  <thead>
                                     <tr><th colspan="4" style="text-align:center;">Complaints</th></tr>
                                      <tr style="position: relative;">
                                          <th>Sl No</th>
                                          <th>Complaints</th>
                                          <th>EYE</th>
                                          <th>Remarks</th>
                                      </tr>
                                  </thead>
                                  <tbody id="complaintid">
                                                                        </tbody>
                                                                    </table>
                                                                    <br/>
                                                                   
                                                                </div>
                                                                 <div id="comp_remm"></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                     <div  id="opthol">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr/>

                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                    <div  id="medicalhis">
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                      <div class="col-md-12">
                                                                         <label>Family History</label>
                                                                         <input type="text" name="family_history" id="family_history" class="form-control">
                                                                      </div>
                                                                       <div class="col-md-12">
                                                                         <label>Drug Allergy</label>
                                                                         <input type="text" name="drug_history" id="drug_history" class="form-control">
                                                                      </div>
                                                                       <div class="col-md-12">
                                                                         <label>Current Meditation</label>
                                                                         <input type="text" name="current_meditation" id="current_meditation" class="form-control">
                                                                      </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <hr/>

                                                         

                                <div class="card-footer ml-auto" id="m_btn_addhis">
                                    <button  class="btn btn-primary btn-sm" type="button" onclick="addhistorydetails();"><i class="fas fa-plus-square"></i>Submit</button>
                                    <button type="button"  class="btn btn-danger btn-sm"  onclick="backscreen()">Back</button>
                                </div>
                                        
                                       </div>
                                     </form>
                                     <div id="add_modal_view_screen">
                                      <form id="examination_saveform" action="#" method="post"> 
                                            <input type="hidden" name="doc_examination_id"  value="<?php echo $doc_examination_id; ?>">
                                             <input type="hidden" name="actionflagg"  value="<?php echo $actionflag; ?>">
                                        <input type="hidden" name="patient_registration_id" id="patient_registration_id" value="<?php echo $patient_registration_id; ?>">
                                         <input type="hidden" name="patient_appointment_id" id="patient_appointment_id" value="<?php echo $patient_appointment_id; ?>">
                                         <input type="hidden" name="history_id" id="history_id">
                                          <input type="hidden" name="addmedhistory_id" id="addmedhistory_id">
                                          <input type="hidden" name="eyepartshistory_id" id="eyepartshistory_id">
                                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                    <input type="hidden" id="hidgen_comp_remarks" name="hidgen_comp_remarks">
                                    <input type="hidden" id="hidgen_opth_remarks" name="hidgen_opth_remarks">
                                    <input type="hidden" id="hidgen_medi_remarks" name="hidgen_medi_remarks">
                                     <input type="hidden" id="examination_id" name="examination_id">
                                     <input type="hidden" id="examination_datee" name="examination_datee" value="<?php echo date('Y-m-d'); ?>">
                                      <div class="row alert bg-primary alert-dismissible mb-2">
                                          <div class="col-md-10">
                                                    <h5 style="color:#fff;"> Patient Name: <?=$pname?> MRD NO:<?=$mrdno?> Age-<?=$ageyy?> <?=$agemm?>/<?=$gender?>  <?=$address?> </h5>
                                          </div>
                                          <div class="col-md-2">
                                                
                                                <select class="form-control select2" name="doctor_id" id="doctor_id">
                                                    <option value="">Select Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                        $sel='';
                                                        if($doc_examination_id)
                                                        {

                                                        }
                                                        else
                                                        {
                                                            if($docc_id==$data['doctors_registration_id'])
                                                            {
                                                                $sel='selected';
                                                            }
                                                        }
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>"  <?php echo $sel; ?>><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                          </div>
                                        </div>
                                     
                                      <div class="row">
                                            <div class="col-md-6">
                                                <span class="patient-info-heading"><b>BP : <?php echo $bp; ?>  Sugar :</span> <?php echo $sugar; ?> Temprature :</span> <?php echo $temprature; ?> Last Visit :</span> <?php echo $lastvisitdate; ?></b>
                                              </span>
                                                <span class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" style="cursor: pointer;float:right;" onclick="addhistory()">Add History</span>
                                            </div>
                                             <?php if($doc_examination_id>0 && $actionflag==2){  ?>
                                                <div class="col-md-6"><button type="button" style="float: right;" onclick="examinationprint(<?php echo $doc_examination_id; ?>)" class="btn btn-success btn-glow"><i class="la la-print"></i></button></div>
                                             <?php } ?>
                                      </div>
                             
                                      <div class="row" >
                                          <div class="col-md-6">
                                              <div class="table-responsive">
                                                  <table class="table table-bordered table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th>Complaints</th>
                                                              <th>Current Medication</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="comp_medicine">
                                                          
                                                      </tbody>
                                                  </table>
                                              </div>

                                              <div class="table-responsive">
                                                   <table class="table table-bordered table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th>Opthalmic History</th>
                                                              <th>Medical History</th>
                                                              <th>Family History</th>
                                                              <th>Drug Allergy</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="other_history">
                                                        
                                                      </tbody>
                                                  </table>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <input type="radio"  name="preliminary" checked>Preliminary Examination
                                                     
                                                  </div>
                                              </div>
                                              <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="padding: 0px;">
                                            <table class="">
                                                <tr style="background: #75e7be !important;">
                                                    <th>Date</th>
                                                    <th class="tab_tit">NCT</th>
                                                    <th class="tab_tit">GAT</th>
                                                    <th class="tab_tit">CCT</th>
                                                    <th class="tab_tit">Angle</th>
                                                    <th class="tab_tit">Color Vision</th>
                                                    <th class="tab_tit">Pupil</th>
                                                </tr>
                                                 <tr >
                                                    <td class="tab_tit" style="background: #e0e0e057;">Right Eye</td>
                                                    <td style="padding:5px;"><input type="text" name="pre1" id="pre1" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre2" id="pre2" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre3" id="pre3" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre4" id="pre4" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre5" id="pre5" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre6" id="pre6" class="form-control"></td>
                                                </tr>
                                                 <tr>
                                                    <td style="background: #e0e0e057;" class="tab_tit">Left Eye</td>
                                                    <td style="padding:5px;"><input type="text" name="pre7" id="pre7" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre8" id="pre8" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre9" id="pre9" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre10" id="pre10" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre11" id="pre11" class="form-control"></td>
                                                    <td style="padding:5px;"><input type="text" name="pre12" id="pre12" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td style="background: #e0e0e057;" class="tab_tit">Remarks</td>
                                                    <td style="padding:5px;" colspan="7"><input type="text" name="pre_remarks" id="pre_remarks" class="form-control"></td>
                                                    
                                                </tr>
                                            </table>
                                        </td>
                                      
                                    </tr>
                                </table>
                            </div> 
                            <br/>
                                                  <div class="row">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                          <thead>
                                                             <tr>
                                                               <th>Right Eye</th>
                                                               <th style="background: #e0e0e057 !important;">Particulars</th>
                                                               <th>Left Eye</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="showdataeyecomp">
                                                            <?php foreach ($geteyecomp as $data) { ?>
                                                                 <tr>
                                                                    <td><input type="hidden" name="eye_complaints_id[]" value="<?php echo $data['eye_complaints_id']; ?>" class="form-control"><input type="text" name="righteye[]" class="form-control"></td>
                                                                    <td style="background: #e0e0e057;"><?php echo $data['name']; ?></td>
                                                                    <td><input type="text" name="lefteye[]" class="form-control"></td>
                                                                </tr>
                                                           <?php  }  ?>
                                                           </tbody>
                                                        </table>
                                                    </div>
                                                   

                                                  </div>
                                                  <?php if($host_tvm=='emr'){ ?>
                                                  <div class="row form-group">
                                                     <div class="col-md-4">
                                                     </div>
                                                     <div class="col-md-4">
                                                        <span class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1" onclick="addeyeparts()" style="cursor:pointer;">Add Eye Parts</span>
                                                     </div>
                                                  </div>

                                                   <div class="row form-group">
                                                        <div class="col-md-12" id="frontscreen_logsegment"></div>
                                                     </div>
                                              <?php } ?>
                                                   <br/>
                                                   <div class="row form-group">
                                                       <div class="col-md-4">
                                                            <label>Dilation</label>
                                                        <select class="form-control" name="dialysiscon" id="dialysiscon" onchange="checkdia(this.value);">
                                                                <option value="1">No</option>
                                                                <option value="2">Yes</option>
                                                        </select>
                                                       </div>
                                                       <div class="col-md-8" style="display:none;" id="drops">
                                                        <label>Dilation Drops</label>
                                                        <select class="form-control select2" name="dialysis_drops" id="dialysis_drops">
                                                             <option value="">Select Dilation Drops</option>
                                                <?php if($getalldialysis){ foreach($getalldialysis as $data){ ?>  
                                                     <option value="<?php echo $data['dialysis_id']; ?>"><?php echo $data['name']; ?></option>
                                                <?php } } ?>
                                                        </select>
                                                       </div>
                                                   </div>
                                                     <?php if($doc_examination_id>0 && $actionflag==2){  ?>
                                                   <div class="row form-group">
                                                    <div class="col-md-12">
                                                      
                                                 <span  class="badge badge-danger" style="cursor: pointer;float:right;" onclick="addmedhistory()">Add Medicine</span>
                                          
                                             <br/>
                                             </div>
                                                   </div>
                                                      <?php } ?>
                                                     
                                                     <div class="row form-group">
                                                         
                                                        <div class="col-md-12" id="doctor_medicine"></div>
                                                     </div>
                              
                                          </div>


                                           <div class="col-md-6">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                      <input type="radio" name="lenstype" value="1" checked> Vision Readings
                                                      <input type="radio" name="lenstype" value="2"> Current Spectacle Prescription
                                                  </div>
                                              </div>

                                              <div class="row">
                                                  <div class="table-responsive" style="padding: 15px;margin-top: -18px;">
                                                      <table class="table table-bordered" id="Vision" >
                                                          <tr>
                                                            <th></th>
                                                            <th colspan="2" align="center">UCVA</th>
                                                            <th>PH</th>
                                                            <th colspan="2" align="center">BCVA</th>
                                                          </tr>
                                                          <tr style="background: #faebd747;">
                                                            <td></td>
                                                            <td>UCDVA</td>
                                                            <td>UCNVA</td>
                                                            <td>PH</td>
                                                            <td>BCDVA</td>
                                                            <td>BCNVA</td>
                                                          </tr>
                                                           <tr>
                                                              <td style="background: #faebd747;">Right Eye</td>
                                                              <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(1,1,2,1)"  type="text" name="vis1" id="vis1" class="form-control" ></td>
                                                              <td style="background: #e0e0e057;"><input type="text" name="vis2" ondblclick="getrefractiondata(1,2,2,1)"  id="vis2" class="form-control"></td>
                                                              <td style="background: whitesmoke;"><input type="text" name="vis3" id="vis3" class="form-control" ondblclick="getrefractiondata(2,0,2,3)" ></td>
                                                              <td style="background: #ddd;"><input type="text" name="vis4" id="vis4" class="form-control" ondblclick="getrefractiondata(3,3,2,2)" ></td>
                                                              <td style="background: #ddd;"><input type="text" name="vis5" id="vis5" class="form-control" ondblclick="getrefractiondata(3,4,2,2)" ></td>
                                                          </tr>
                                                          <tr>
                                                              <td style="background: #faebd747;">Left Eye</td>
                                                              <td style="background: #e0e0e057;"><input type="text" ondblclick="getrefractiondata(1,1,1,1)"  name="vis6" id="vis6" class="form-control"></td>
                                                              <td style="background: #e0e0e057;"><input type="text" ondblclick="getrefractiondata(1,2,1,1)"  name="vis7" id="vis7" class="form-control"></td>
                                                              <td style="background: whitesmoke;"><input type="text" ondblclick="getrefractiondata(2,0,1,3)"  name="vis8" id="vis8" class="form-control"></td>
                                                              <td style="background: #ddd;"><input type="text" name="vis9" id="vis9" class="form-control" ondblclick="getrefractiondata(3,3,1,2)" ></td>
                                                              <td style="background: #ddd;"><input type="text" name="vis10" id="vis10" class="form-control" ondblclick="getrefractiondata(3,4,1,2)" ></td>
                                                          </tr>
                                                      </table>

                                     <table class="table table-bordered" id="spectacle" style="display: none;">
                                        <tr style="background: #1e9ff24f">
                                            <th align="center" class="tab_tit">RE</th>
                                            <th align="center" class="tab_tit">LE</th>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td style="background: #e0e0e057;"></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit" style="background: #e0e0e057;">D.V</td>
                                                        <td style="padding:5px;"><input type="text" name="cur1" id="cur1" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur2" id="cur2" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur3" id="cur3" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur4" id="cur4" class="form-control"></td>
                                                    </tr>
                                                     <tr>
                                                        <td style="background: #e0e0e057;" class="tab_tit">N.V</td>
                                                        <td style="padding:5px;"><input type="text" onblur="calvaldvcur(this.value)" name="cur5" id="cur5"  class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur6" id="cur6" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur7" id="cur7" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur8" id="cur8" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" name="cur9" id="cur9" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur10" id="cur10" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur11" id="cur11" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur12" id="cur12" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" onblur="calvaldvcur1(this.value)" name="cur13" id="cur13" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur14" id="cur14" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur15" id="cur15" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="cur16" id="cur16" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                                  </div>
                                              </div>

                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <input type="radio" name="refraction" value="1" checked> Objective Refraction
                                                      <input type="radio" name="refraction" value="2"> AR Kerotometry
                                                      <input type="radio" name="refraction" value="3"> Manual Kerotometry
                                                  </div>
                                              </div>

                                                <div class="row">
                                                  <div class="table-responsive" style="padding: 15px;margin-top: -18px;">
                                                      <table class="table table-bordered" id="Objective1">
                                                          <tr>
                                                            <th>UD</th>
                                                            <th>SPH</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                            <th>CP</th>
                                                            <th>SPH</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                          </tr>
                                                          <tr>
                                                             <td style="background: #faebd747;">RE</td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1,1)"  type="text" name="obj1" id="obj1" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1,0,1)"  type="text" name="obj2" id="obj2" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1,0,0,1)"  type="text" name="obj3" id="obj3" class="form-control grid_table"></td>
                                                             <td style="background: #faebd747;">RE</td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,2,2)"  type="text" name="obj4" id="obj4" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,2,0,2)"  type="text" name="obj5" id="obj5" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,2,0,0,2)"  type="text" name="obj6" id="obj6" class="form-control grid_table"></td>
                                                          </tr>
                                                           <tr>
                                                             <td style="background: #faebd747;">LE</td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1,3)"  type="text" name="obj7" id="obj7" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1,0,3)"  type="text" name="obj8" id="obj8" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1,0,0,3)"  type="text" name="obj9" id="obj9" class="form-control grid_table"></td>
                                                             <td style="background: #faebd747;">LE</td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,1)"  type="text" name="obj10" id="obj10" ondblclick="getrefractiondata(4,1,2,4,2,4)"  class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,2,0,4)"  type="text" name="obj11" id="obj11" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input ondblclick="getrefractiondata(4,1,2,4,2,0,0,4)"  type="text" name="obj12" id="obj12" class="form-control grid_table"></td>
                                                          </tr>
                                                          <tr>
                                                            <td>IPD</td>
                                                            <td><input type="text" name="obj13" id="obj13" class="form-control grid_table"></td>
                                                            <td>PD RE</td>
                                                            <td><input type="text" name="obj14" id="obj14" class="form-control grid_table"></td>
                                                            <td>PD LE</td>
                                                            <td colspan="3"><input type="text" name="obj15" id="obj15" class="form-control grid_table"></td>
                                                          </tr>
                                                         
                                                      </table>
                                                        <table class="table table-bordered" id="Objective2" style="display:none">
                                                          <tr>
                                                            <th>ARK</th>
                                                            <th>K1</th>
                                                            <th>AXIS</th>
                                                            <th>K2</th>
                                                            <th>AXIS</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                          </tr>
                                                          <tr>
                                                             <td style="background: #faebd747;">RE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar1" id="ar1" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar2" id="ar2" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar3" id="ar3" class="form-control grid_table"></td>
                                                             <td style="background: #faebd747;">RE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar4" id="ar4" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar5" id="ar5" class="form-control grid_table"></td>
                                                            
                                                          </tr>
                                                           <tr>
                                                             <td style="background: #faebd747;">LE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar6" id="ar6" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar7" id="ar7" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar8" id="ar8" class="form-control grid_table"></td>
                                                             <td style="background: #faebd747;">LE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar9" id="ar9" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="ar10" id="ar10" class="form-control grid_table"></td>
                                                             
                                                          </tr>
                                                      </table>
                                                      <table class="table table-bordered" id="Objective3" style="display:none">
                                                          <tr>
                                                            <th>MK</th>
                                                            <th>K1</th>
                                                            <th>AXIS</th>
                                                            <th>K2</th>
                                                            <th>AXIS</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                          </tr>
                                                          <tr>
                                                             <td style="background: #faebd747;">RE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man1" id="man1" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man2" id="man2" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man3" id="man3" class="form-control grid_table"></td>
                                                             <td style="background: #faebd747;">RE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man4" id="man4" class="form-control grid_table"></td>
                                                              <td style="background: #e0e0e057;"><input type="text" name="man5" id="man5" class="form-control grid_table"></td>
                                                             
                                                          </tr>
                                                           <tr>
                                                             <td style="background: #faebd747;">LE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man6" id="man6" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man7" id="man7" class="form-control grid_table"></td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man8" id="man8" class="form-control grid_table"></td>
                                                             <td style="background: #faebd747;">LE</td>
                                                             <td style="background: #e0e0e057;"><input type="text" name="man9" id="man9" class="form-control grid_table"></td>
                                                              <td style="background: #e0e0e057;"><input type="text" name="man10" id="man10" class="form-control grid_table"></td>
                                                            
                                                          </tr>
                                                       
                                                         
                                                      </table>
                                                  </div>
                                              </div>
                                              <?php if($doc_examination_id>0){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" style="float: right;" onclick="examinationprint(<?php echo $doc_examination_id; ?>,1)" class="btn btn-info btn-glow"><i class="la la-print"></i></button>
                                                    </div>
                                                </div>
                                            <?php }?>
                                               <div class="row">
                                                  <div class="col-md-12">
                                                      <input type="radio" name="spectacle" value="1" checked> Undilated Correction
                                                      <input type="radio" name="spectacle" value="2"> Cyclopedia  Correction
                                                      <input type="radio" name="spectacle" value="3"> PMT Correction
                                                      <input type="checkbox" name="cylcheckbox" id="cylcheckbox" onchange="clickcyl()">CYL
                                                      <input type="checkbox" name="axischeckbox" id="axischeckbox" onchange="clickaxis()">AXIS 
                                                      <span id="showallCorrectionuncylpmtshow" onclick="showallCorrectionuncylpmtshow()" class="badge badge-danger" style="cursor: pointer;float:right;">Show All </span>
                                                      <span id="showallCorrectionuncylpmthide" onclick="showallCorrectionuncylpmthide()" class="badge badge-danger" style="cursor: pointer;float:right;display: none;">Show All </span>
                                                  </div>
                                              </div>

                                              <div class="row">
                                                 <div class="table-responsive" style="padding: 15px;margin-top: -18px;">
                                    <table class="table table-bordered" id="spectacle1">
                                        <tr style="background: #1e9ff24f">
                                            <th align="center" class="tab_tit">RE</th>
                                            <th align="center" class="tab_tit">LE</th>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td style="background: #e0e0e057;"></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit" style="background: #e0e0e057;">D.V</td>
                                                        <td style="padding:5px;"><input ondblclick="getrefractiondata(7,1,2,5,1,1)" type="text" name="spe1" id="spe1" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,1,0,1)" name="spe2" onblur="getsepval2(this.value)" id="spe2" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,1,0,0,1)" name="spe3" id="spe3" onblur="getsepval3(this.value)" class="form-control"></td>
                                                        <td style="padding:5px;"><input 
                                                            type="text" name="spe4" ondblclick="getrefractiondata(7,1,2,5,1,0,0,0,1)" id="spe4" class="form-control"></td>
                                                    </tr>
                                                     <tr>
                                                        <td style="background: #e0e0e057;" class="tab_tit">N.V</td>
                                                        <td style="padding:5px;"><input onblur="calvaldv(this.value)" type="text" ondblclick="getrefractiondata(7,1,2,5,1,3)" name="spe5" id="spe5" class="form-control"></td>
                                                        <td style="padding:5px;"><input ondblclick="getrefractiondata(7,1,2,5,1,0,3)" type="text" name="spe6" id="spe6" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,1,0,0,3)" name="spe7" id="spe7" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,1,0,0,0,3)" name="spe8" id="spe8" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,2,2)" name="spe9" id="spe9" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,2,0,2)" name="spe10" onblur="getsepval0(this.value)" id="spe10" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="spe11" onblur="getsepval1(this.value)" id="spe11" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="spe12" id="spe12" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input onblur="calvaldv1(this.value)" type="text" name="spe13" ondblclick="getrefractiondata(7,1,2,5,2,4)" id="spe13" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,2,0,4)" name="spe14" id="spe14" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" ondblclick="getrefractiondata(7,1,2,5,2,0,0,4)" name="spe15" id="spe15" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="spe16" ondblclick="getrefractiondata(7,1,2,5,2,0,0,0,4)" id="spe16" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                     <table class="table table-bordered" id="spectacle2" style="display:none;">
                                        <tr style="background: #1e9ff24f">
                                            <th align="center" class="tab_tit">RE</th>
                                            <th align="center" class="tab_tit">LE</th>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td style="background: #e0e0e057;"></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit" style="background: #e0e0e057;">D.V</td>
                                                        <td style="padding:5px;"><input type="text" name="con1" id="con1" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con2" id="con2" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con3" id="con3" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con4" id="con4" class="form-control"></td>
                                                    </tr>
                                                     <tr>
                                                        <td style="background: #e0e0e057;" class="tab_tit">N.V</td>
                                                        <td style="padding:5px;"><input type="text" name="con5" id="con5" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con6" id="con6" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con7" id="con7" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con8" id="con8" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" name="con9" id="con9" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con10" id="con10" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con11" id="con11" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con12" id="con12" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" name="con13" id="con13" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con14" id="con14" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con15" id="con15" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="con16" id="con16" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                     <table class="table table-bordered" id="spectacle3" style="display:none;">
                                        <tr style="background: #1e9ff24f">
                                            <th align="center" class="tab_tit">RE</th>
                                            <th align="center" class="tab_tit">LE</th>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td style="background: #e0e0e057;"></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit" style="background: #e0e0e057;">D.V</td>
                                                        <td style="padding:5px;"><input type="text" name="pmt1" id="pmt1" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt2" id="pmt2" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt3" id="pmt3" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt4" id="pmt4" class="form-control"></td>
                                                    </tr>
                                                     <tr>
                                                        <td style="background: #e0e0e057;" class="tab_tit">N.V</td>
                                                        <td style="padding:5px;"><input type="text" name="pmt5" id="pmt5" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt6" id="pmt6" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt7" id="pmt7" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt8" id="pmt8" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;">
                                                <table class="">
                                                    <tr style="background: #e0e0e057;">
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" name="pmt9" id="pmt9" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt10" id="pmt10" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt11" id="pmt11" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt12" id="pmt12" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;"><input type="text" name="pmt13" id="pmt13" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt14" id="pmt14" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt15" id="pmt15" class="form-control"></td>
                                                        <td style="padding:5px;"><input type="text" name="pmt16" id="pmt16" class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div> 
                                              </div>

                                              <div class="row form-group" style="display:none;">
                                                <div class="col-md-3">
                                                    <label>Material</label>
                                                    <input type="text" name="material" id="material" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>CR</label>
                                                    <input type="text" name="cr" id="cr" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Usage</label>
                                                    <input type="text" name="usage" id="usage" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Type</label>
                                                    <input type="text" name="typev" id="typev" class="form-control">
                                                </div>
                                              </div>

                                              <div class="row ">
                                                <div class="col-md-2">
                                                    <label>IPD</label>
                                                    <input type="text" name="ipd" id="ipd" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>PD RE</label>
                                                    <input type="text" name="pdre" id="pdre" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>LE</label>
                                                    <input type="text" name="le" id="le" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Segment RE</label>
                                                    <input type="text" name="segmentre" id="segmentre" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>LE</label>
                                                    <input type="text" name="lle" id="lle" class="form-control">
                                                </div>
                                              </div>
                                              <hr/ style="background: black;">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <input type="checkbox" name="followup" id="followup"> Follow Up
                                                      <input type="checkbox" name="workup" id="workup"> Work Up Plan
                                                  </div>
                                              </div>

                                              <div class="row ">
                                                <div class="col-md-2">
                                                    <label>MM</label>
                                                    <input type="text" name="mm" id="mm" onkeyup="ageChanged()" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>WWW</label>
                                                    <input type="text" name="www" id="www" onkeyup="ageChanged()" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Days</label>
                                                    <input type="text" name="dayss" id="dayss" onkeyup="ageChanged()" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Date</label>
                                                    <input type="date" name="d_date" id="d_date" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>SOS</label>
                                                   
                                                    <select class="form-control" name="sos" id="sos">
                                                        <option value="1">No</option>
                                                         <option value="2">Yes</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="row ">
                                                <div class="col-md-12">
                                                    <label>Plan Of Action</label>
                                                    <input type="text" name="plan_of_action" id="plan_of_action" class="form-control">
                                                </div>
                                               
                                              </div>
                                                  <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label>Opthalmic User Comments</label>
                                                    <input type="text" name="opth_user_comments" id="opth_user_comments" class="form-control">
                                                </div>
                                               
                                              </div>
                                                 <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label>Clinical Advisor</label>
                                                    <input type="text" name="clinical_advisor" id="clinical_advisor" class="form-control">
                                                </div>
                                               
                                              </div>
                                              <div class="row " >
                                                  <div class="col-sm-6 col-md-6 docscr" style="display:none;">
                                            <div class="form-group">
                                                <label for="lastname">Select Investigation Particulars: <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="particular" id="particular" onchange="getparticularsdetails(this.value)">
                                                       
                                                    </select>
                                                        </div>
                                                     </div>
                                                        
                                                   
                                                       <div class="col-sm-6 col-md-6 actionflagcls_foropth">
                                                         <div class="form-group">
                                                            <label>Action</label>
                                                            <select class="form-control select2" name="optho_action" id="optho_action">
                                                                <option value="0">Inprogress</option>
                                                                <option value="1">Completed</option>
                                                            </select>
                                                        </div>
                                                           </div>
                                                     
                                                
                                                   
                                                       <div class="col-sm-6 col-md-6 actionflagcls_fordoc">
                                            <div class="form-group">
                                                <label for="lastname">Action: <span class="text-danger">*</span></label>
                                                         <select class="form-control select2" name="doc_action" id="doc_action">
                                                               <option value="0">Inprogress</option>
                                                               <option value="1">Completed</option>
                                                        </select>
                                                        </div>
                                                     </div>
                                               
                                              </div>
                                            <div class="row docscr" style="display:none;">
                                                 <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="productdetailsinv" bquotation="0">
                                                    <thead style="background:#e0e0e0;">
                                                    <tr>
                                                        <th>Remove</th>
                                                        <th>Particulars</th>
                                                        <th>Rate</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                    </tbody>
                                                </table>
                                                     </div>
                                             </div>
                                               </div>

                                         <div class="row pricss">
                                             <div class="col-md-12">
                                                <input type="hidden" name="treatmentplan_refid" id="treatmentplan_refid" value="<?php echo $treatmentplankey; ?>">
                                                 <label><input type="radio" name="treatmentplan" checked onchange="getparticularstreatmentplan(2)" value="2">Surgery</label>
                                                 <label><input type="radio" name="treatmentplan" value="3" onchange="getparticularstreatmentplan(3)">Laser</label>
                                                 <label><input type="radio" name="treatmentplan" value="4" onchange="getparticularstreatmentplan(4)">Injection</label>
                                             </div>
                                         </div>
                                         <div class="row form-group pricss">
                                             <div class="col-md-3">
                                                 <label>EYE<span class="text-danger">*</span></label><br/>
                                                   <input type="radio" name="eyetreatmentplan" checked value="1">LE
                                                   <input type="radio" name="eyetreatmentplan" value="2">RE
                                                  <input type="radio" name="eyetreatmentplan" value="3">BE
                                             </div>
                                             <div class="col-md-5">
                                                 <label>Select Procedure<span class="text-danger">*</span></label>
                                                 <select class="form-control select2" name="particular_treatment" id="particular_treatment">
                                                     <option value="">Select Procedure</option>
                                                 </select>
                                             </div>
                                             <div class="col-md-4">
                                                 <label>Select Doctor</label>
                                                 <select class="form-control select2" name="treatmentplandoctor_id" id="treatmentplandoctor_id">
                                                    <option value="">Select Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                             </div>
                                         </div>

                                         <div class="row form-group pricss">
                                             <div class="col-md-4">
                                                 <label>Appointment Date<span class="text-danger">*</span></label>
                                                 <input type="date" name="treatmentplan_appointmentdate" id="treatmentplan_appointmentdate" class="form-control comdate">
                                             </div>
                                             <div class="col-md-3">
                                                 <label>Counseling</label>
                                                 <select class="form-control select2" name="treatmentplan_counseling" id="treatmentplan_counseling">
                                                     <option value="1">Yes</option>
                                                     <option value="0">No</option>
                                                     
                                                 </select>
                                             </div>
                                             <div class="col-md-4">
                                                <br/>
                                                 <button style="margin-top: 6%;" class="btn mr-1 mb-1 btn-primary btn-sm" type="button" onclick="treatmentsave()">Save</button>
                                             </div>
                                         </div>



                                                    

                                             







                                           </div>

                                         

                                      </div>
                                <div class="card-footer ml-auto" id="m_btn_exm">
                                    <button id="save" type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata();">Submit</button>
                                     <button style="display:none;" id="update" type="button" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedataexamination();">
                                        <?php if($doc_examination_id>0 && $actionflag==2){ ?> Save <?php  }else { ?>Update <?php } ?> 
                                     </button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                    </form>
                                  </div>
                                  
                                    </div>
                                    <div class="tab-pane" id="link21" role="tabpanel" aria-labelledby="link2-pill1" aria-expanded="false">
                                        <div class="row">
                                           <div class="col-md-6"></div>
                                         
                                           <div class="col-md-4">
                                                <button style="padding: 4px 9px;" onclick="getexaminationdata(doc_examination_id)" class="btn btn-icon btn-warning mr-1 mb-1" type="button">Show Records</button>
                                          </div>
                                           <div class="col-md-2" >
                                                <button style="padding: 4px 9px;float: right;"  class="btn btn-icon btn-info mr-1 mb-1" type="button"><i class="la la-cog" onclick="showmodal()"></i></button>
                                          </div>
                                        </div>

                                        <div id="modaldiv_modal" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Print Settings</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                  <table class="table table-bordered table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th>#</th>
                                                              <th>Names</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="chkcomplaints" id="chkcomplaints"  value="1"></td>
                                                              <td>Complaints</td>
                                                          </tr>
                                                           <tr>
                                                              <td><input type="checkbox" class="check_class" name="chkophthalmic " id="chkophthalmic"  value="1"></td>
                                                              <td>Ophthalmic History</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="chkmedical" id="chkmedical" checked value="1"></td>
                                                              <td>Medical History</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="chkeyepart" id="chkeyepart"  value="1"></td>
                                                              <td>EYE Particulars</td>
                                                          </tr>
                                                          <tr class="pricss">
                                                              <td><input type="checkbox" class="check_class" name="addmediciness" id="addmediciness"  value="1"></td>
                                                              <td>Medicine</td>
                                                          </tr>
                                                           <tr class="pricss">
                                                              <td><input type="checkbox" class="check_class" name="investigationchk" id="investigationchk"  value="1"></td>
                                                              <td>Investigation</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="preliminary_ex" id="preliminary_ex"  value="1"></td>
                                                              <td>Preliminary Examination</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="vsisonreadings" id="vsisonreadings"  value="1"></td>
                                                              <td>Vision Readings</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="curspec" id="curspec" checked value="1"></td>
                                                              <td>Current Spectacle Prescription</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="objectchk" id="objectchk"  value="1"></td>
                                                              <td>Objective Refraction</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="arkkchk" id="arkkchk"  value="1"></td>
                                                              <td> AR Kerotometry</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="manchk" id="manchk"  value="1"></td>
                                                              <td>Manual Kerotometry</td>
                                                          </tr>
                                                           <tr>
                                                              <td><input type="checkbox" class="check_class" name="specchk" id="specchk"  value="1"></td>
                                                              <td>Spectacle Correction</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="conlchk" id="conlchk"  value="1"></td>
                                                              <td> Contact Lens Correction</td>
                                                          </tr>
                                                          <tr>
                                                              <td><input type="checkbox" class="check_class" name="pmtchk" id="pmtchk"  value="1"></td>
                                                              <td>PMT Correction</td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                                  </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
        <button id="save" class="btn btn-primary btn-sm" type="button" onclick="printsubmit();"><i class="fas fa-plus-square"></i>Submit</button>
            <button type="button" id="mclose" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                        <div class="row">
                                            <div class="col-md-12" id="examination_data"></div>
                                        </div>
                                    </div>






                                    <div class="tab-pane" id="link22" role="tabpanel" aria-labelledby="link3-pill2" aria-expanded="false">
                                       <div class="row match-height">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card" >
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 d-flex card" style="color:white;">
                                                                <div class="patient-info card bg-gradient-y-pink">
                                                                    <div class="card-body">
                                                                    <h4 style="color: white;font-weight: bold;"><?php echo $pname; ?></h4>
                                                                   <div class="row">
                                                                    <div class="col-md-6">
                                                                    <ul class="list-unstyled">
                                                                         <li>
                                                                            <div class="patient-info-heading">MRD NO:<?php echo $mrdno; ?></div> 
                                                                        </li>
                                                                        <li>
                                                                            <div class="patient-info-heading">Date Of Birth:<?php echo $dob; ?></div> 
                                                                        </li>
                                                                    </ul>
                                                                    </div>

                                                                     <div class="col-md-6" style="margin-top: -35px;">
                                                                    <ul class="list-unstyled">
                                                                         <li>
                                                                            <div class="patient-info-heading">Age:<?php echo $ageyy; ?>/<?php echo $agemm; ?>   <?php echo $gender; ?></div> 
                                                                        </li>
                                                                       
                                                                        <li>
                                                                            <div class="patient-info-heading">Contact:<?php echo $mobileno; ?></div> 
                                                                        </li>
                                                                        <li>
                                                                            <div class="patient-info-heading">Address:<?php echo nl2br($address); ?></div> 
                                                                        </li>
                                                                    </ul>
                                                                    </div>

                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6" style="height:183px;">
                                                <div class="card bg-gradient-y-info">
                                                    <div class="card-body">
                                                        <ul class="list-unstyled text-white patient-info-card">
                                                            <li><span class="patient-info-heading">Complaints :</span> <div id="preview_comp"></div></li>
                                                            <li><span class="patient-info-heading">BP :</span> <?php echo $bp; ?>  Sugar :</span> <?php echo $sugar; ?> Temprature :</span> <?php echo $temprature; ?></li>
                                                            <li><span class="patient-info-heading">Last Visit :</span> <?php echo $lastvisitdate; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6" style="height:183px;">
                                                <div class="card bg-gradient-y-warning">
                                                    <div class="card-header">
                                                        <h5 class="card-title text-white">Checkup Doctors</h5>
                                                    </div>
                                                    <div class="card-content mx-2">
                                                        <ul class="list-unstyled text-white">
                                                            <?php if($checkupdoctorname){ foreach($checkupdoctorname as $data){ ?>
                                                            <li><?php echo $data['name']; ?> <span class="float-right"><?php echo $data['examination_date']; ?></span></li>
                                                        <?php } } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" > 
                                            <div class="col-md-12">
                                                <div class="card-content">
                                                         <ul class="nav nav-tabs">
                                                            <?php if($checkupdoctorname){ $sl=1; foreach($checkupdoctorname as $data){ ?>
                                                            <li class="nav-item">
                                                               <a class="nav-link" id="base-tab<?php echo $sl; ?>" data-toggle="tab" aria-controls="tab<?php echo $sl; ?>" onclick="previewdatewise(<?php echo $data['examination_id']; ?>,'showdata<?php echo $sl; ?>')" href="#tab<?php echo $sl; ?>" aria-expanded="true"><?php echo $data['examination_date']; ?></a>
                                                            </li>
                                                             <?php $sl++; } } ?>
                                                        </ul>

                                                        <div class="tab-content px-1 pt-1">
                                                             <?php if($checkupdoctorname){ $sl=1; foreach($checkupdoctorname as $data){ ?>
                                                             <div role="tabpane<?php echo $sl; ?>" class="tab-pane" id="tab<?php echo $sl; ?>" aria-expanded="true" aria-labelledby="base-tab<?php echo $sl; ?>">
                                                                  <div id="showdata<?php echo $sl; ?>"></div>
                                                             </div>
                                                               <?php $sl++; } } ?>
                                                        </div>
                                                </div>
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



          <script type="text/javascript">
            csrf='<?php echo $this->security->get_csrf_hash(); ?>';
            function previewdatewise(val,preid)
            {
                if(val>0)
                {
                     $("#overlay").fadeIn(300);
                     $.ajax({
                        type: "POST",
                        url: 'getexaminationpreview',
                        dataType: "json",
                        data: {examinationid:val,csrf_test_name:csrf},
                        success: function(data){
                            $("#overlay").fadeOut(300);
                           if(data.msg != '')
                           {
                              $('#'+preid).html(data.showdata);
                           }
                           else if(data.error != '')
                          {
                           
                          }
                          else if(data.error_message) 
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
            }
         function showmodal() {
              $('#modaldiv_modal').modal('show');
         }
         function printsubmit()
         {
            Swal.fire({title:"",text:"Saved data",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
            $('#mclose').click();
         }
             $("body").removeClass(" vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-expanded").addClass( "vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-collapsed" );
         
          </script>
       
<style type="text/css">
    .nav.nav-pills.nav-justified {
    width: 35%;
}
.table th, .table td {
    padding: 0.55rem 1.5rem;
}
.grid_table {
   
    width: 70px;
}
#complaintidd_paginate,#complaintidd_length ,#complaintidd_info,#opthold_paginate,#opthold_length ,#opthold_info,#medicalhist_paginate,#medicalhist_length ,#medicalhist_info
{
    display: none;medicalhist
}
</style>
<script type="text/javascript">
     row_num=1;
      cd = (new Date()).toISOString().split('T')[0];
      
    function getallmedicine(val)
    {
        if(val>0)
        {
            $("#overlay").fadeIn(300);
            $.ajax({
            type: "POST",
            url: 'getmedinedetails',
            dataType: "json",
            data: {medid:val,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                
                        $('#productdetails').children('tbody').append('<tr>\n\
                                       <td>'+data.getdata[0]['drugname']+'</td>\n\
                                       <td><input type="hidden" class="form-control" id="medicine_id_'+row_num+'" name="medicine_id[]" value="'+val+'"><input type="text" class="form-control" onkeyup="getlistdescription(this.value,'+data.getdata[0]['category_id']+','+row_num+')" id="instruction_'+row_num+'" name="instruction[]" value="'+data.getdata[0]['instruction']+'"><span id="search_result'+row_num+'"></span></td>\n\
                                       <td><input type="text" class="form-control" id="days_'+row_num+'" name="days[]" value="'+data.getdata[0]['days']+'"></td>\n\
                                        <td><input type="text" class="form-control" id="qty_'+row_num+'" name="qty[]" value="1"></td>\n\
                                        <td style="display:none;"><input type="date" class="form-control" id="sdate_'+row_num+'" name="sdate[]" value="'+cd+'"></td>\n\
                                         <td style="display:none;"><input type="date" class="form-control" id="tdate_'+row_num+'" name="tdate[]" value="'+cd+'"></td>\n\
                                          <td><select class="form-control" name="medeye[]" id="medeye_'+row_num+'"><option value="BE">BE</option><option value="LE">LE</option><option value="RE">RE</option><option value="A/F">A/F</option><option value="B/F">B/F</option></select></td>\n\
                                           <td>\n\
                                            <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">\n\
                                            <button class="btn btn-danger btnDelete btn-sm">\n\
                                               <i class="la la-trash"></i>\n\
                                            </button>\n\
                                            </a>\n\
                                       </td>\n\
                                         </tr>'); 
                         row_num++;

              } else if(data.error != '')
              {
                 $('#complaintid').html('No Data Found');
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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
    }
    function calcnet()
    {

    }
    function checkdia(val)
    {
       if(val==2)
       {
            $('#drops').show();
       }
       else
       {
            $('#drops').hide();
       }
    }

     
    
    $('#examination_date').val(cd);
     $('#d_date').val(cd);
     $('.comdate').val(cd);

     function selecttemp(sel)
   {
    if(sel>0)
    {
        $("#overlay").fadeIn(300);
        $('#examination_data').html('');
         $.ajax({
            type: "POST",
            url: 'getalltempl',
            dataType: "json",
            data: {sel:sel,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                medtem= data.msg;
                var array = medtem.split(",");
                $.each(array,function(i){
                       if(array[i]>0)
                       {
                         getallmedicine(array[i]);
                       }
                    });
              } 
              else if(data.error != '')
              {
                 Swal.fire({title:"Info!",text:""+data.error+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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
   }
 
   function getexaminationdata(sel=0)
   {
        $("#overlay").fadeIn(300);
        $('#examination_data').html('');
         $.ajax({
            type: "POST",
            url: 'getexaminationdata',
            dataType: "json",
            data: {doc_exam:sel,csrf_test_name:csrf,examination_date:$('#examination_date').val(),patient_registration_id:$('#patient_registration_id').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                      $('#examination_data').html(data.dataexam);
                      $('#ex_datatable').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                         
                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
                        });
              } else if(data.error != '')
              {
                 $('#complaintid').html('No Data Found');
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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

   $( document ).ready(function() {
      
     
        if(doc_examination_id>0)
        {
            editdata(doc_examination_id);
            getparticulars(5);
            if(actionflag!=1){
            $('.docscr').show();
            }
        }
        else
        {
             showhisdet();
        }
        getparticularstreatmentplan(2);
        allsegmentshow();

   }

   );
function getparticularsdetails(val)
{
    
    chargetype_id=5;
    if(val>0 && chargetype_id>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/Billing/getparticularsdetails',
            dataType: "json",
            data: {chargetype_id:chargetype_id,getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                            
                            
                                id="investigation_id";
                 var html='<tr>\n\
                  <td>\n\
                        <a href="#" onclick="$(this).parent().parent().remove();" class="input_column">\n\
                        <button class="btn btn-danger btnDelete btn-sm">\n\
                           <i class="la la-trash"></i>\n\
                        </button>\n\
                        </a>\n\
                     </td><td>'+data.msg[0]['name']+'</td>\n\
                <td><input type="text" step="any" name="rate[]" id="rate_'+row_numm+'" class="form-control grid_table" value="'+data.msg[0]['amount']+'"     autocomplete="off"></td>\n\
                <td style="display:none;">row_numm\n\
                  <input type="hidden" id="calrow_id_'+row_numm+'" name="calrow_id[]" value="'+row_numm+'" >\n\
                  <input type="hidden" id="particularsid_'+row_numm+'" name="particularsid[]" value="'+data.msg[0][id]+'" >\n\
                   <input type="hidden" name="chargesid[]" id="chargesid_'+row_numm+'" class="form-control grid_table" value="'+chargetype_id+'" readonly="">\n\
                </td>\n\
                     </tr>';
                     row_numm++;
                    $('#productdetailsinv').children('tbody').append(html);
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
}

   function showhisdet()
   {
     $.fn.dataTable.ext.errMode = 'none';
      $.ajax({
            type: "POST",
            url: 'getcompalints',
            dataType: "json",
            data: {his_id:$('#history_id').val(),csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                    
                     $('#complaintid').html(data.getdata);
                      $('#complaintidd').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                          
                           "autoWidth": false,

                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
                        });
                      $('#comp_remm').html(data.comrem);

                      $('#opthol').html(data.optho);
                       $('#opthold').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                           "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
                        });

                        $('#medicalhis').html(data.medi);
                       $('#medicalhist').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                           "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
                        });

                        $('.dataTables_wrapper').css('width', '100%');


              } else if(data.error != '')
              {
                 $('#complaintid').html('No Data Found');
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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
function addmedhistory()
{
   $('.badge-success').hide(1000);
   $('#addmed_modal_view').show(1000);
   $('#add_modal_view_screen').hide(1000);
   $('#m_btn_exm').hide(1000); 
}
function backmedscreen()
{
   $('.badge-success').show(1000);
   $('#addmed_modal_view').hide(1000);
   $('#add_modal_view_screen').show(1000);
   $('#m_btn_exm').show(1000);
   window.scrollTo({top: 0, behavior: 'smooth'});
}

function addhistory()
{
   $('.badge-success').hide(1000);
   $('#add_modal_view').show(1000);
   $('#add_modal_view_screen').hide(1000);
   $('#m_btn_exm').hide(1000); 
}
function backscreen()
{
   $('.badge-success').show(1000);
   $('#add_modal_view').hide(1000);
   $('#add_modal_view_screen').show(1000);
   $('#m_btn_exm').show(1000);
   window.scrollTo({top: 0, behavior: 'smooth'});
}

function addeyeparts()
{
   $('.badge-success').hide(1000);
   $('#add_modal_eyeparts').show(1000);
   $('#add_modal_view_screen').hide(1000);
   $('#m_btn_exm').hide(1000); 
}
function backscreeneye()
{
   $('.badge-success').show(1000);
   $('#add_modal_eyeparts').hide(1000);
   $('#add_modal_view_screen').show(1000);
   $('#m_btn_exm').show(1000);
   window.scrollTo({top: 0, behavior: 'smooth'});
}

function addhistorydetails()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'addhistorysave',
            dataType: "json",
            data: $('#examination_addhistorysaveform').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 getaddhistorydata(data.key);
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               $('#history_id').val(data.key);
                $('#hidgen_comp_remarks').val($('#gen_comp_remarks').val());
                $('#hidgen_opth_remarks').val($('#gen_opth_remarks').val());
                $('#hidgen_medi_remarks').val($('#gen_medi_remarks').val());
               backscreen();

              
              } else if(data.error != ''){
               // Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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


function addeyesave()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'addeyepartsave',
            dataType: "json",
            data: $('#examination_addeyepartssaveform').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                $('#eyepartshistory_id').val(data.key);
                getfrontscreensegment(data.key);
               backscreeneye();
              
              } else if(data.error != ''){
               // Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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
function getfrontscreensegment(key)
{
        $("#overlay").fadeIn(300);
        $('#frontscreen_logsegment').html('');
         $.ajax({
            type: "POST",
            url: 'getfrontscreensegment',
            dataType: "json",
            data: {key:key,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#frontscreen_logsegment').html(data.msg);
              
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
function addmedhistorydetails()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'addmedhistorysave',
            dataType: "json",
            data: $('#examination_addmedhistorysaveform').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                   getaddmedhistorydata(data.key);
                   Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                   $('#addmedhistory_id').val(data.key);
                   backmedscreen();
              } else if(data.error != ''){
               // Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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

function editdata(key)
{
    if(doc_examination_id>0)
    {
        $('#case2nd').hide();
    }

        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'geteditdata',
            dataType: "json",
            data: {getid:key,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                  $('#active2-pill1').click(); 
                  if(doc_examination_id==0){
                  $('#tab_tit').html('Edit Examination Entry');
                  }
                  $('#history_id').val(data.mastertable[0]['history_id']);
                  $('#examination_datee').val(data.mastertable[0]['examination_date']);
                  $('#examination_id').val(data.mastertable[0]['examination_id']);
                  $('#family_history').val(data.mastertable[0]['family_history']);
                  $('#gen_comp_remarks').val(data.mastertable[0]['gen_comp_remarks']);
                  $('#drug_history').val(data.mastertable[0]['drug_history']);
                  $('#current_meditation').val(data.mastertable[0]['current_meditation']);
                  $("#doctor_id").val(data.mastertable[0]['doctor_id']).trigger("change");

                  $('#pre1').val(data.mastertable[0]['pre1']);
                  $('#pre2').val(data.mastertable[0]['pre2']);
                  $('#pre3').val(data.mastertable[0]['pre3']);
                  $('#pre4').val(data.mastertable[0]['pre4']);
                  $('#pre5').val(data.mastertable[0]['pre5']);
                  $('#pre6').val(data.mastertable[0]['pre6']);
                  $('#pre7').val(data.mastertable[0]['pre7']);
                  $('#pre8').val(data.mastertable[0]['pre8']);
                  $('#pre9').val(data.mastertable[0]['pre9']);
                  $('#pre10').val(data.mastertable[0]['pre10']);
                  $('#pre11').val(data.mastertable[0]['pre11']);
                  $('#pre12').val(data.mastertable[0]['pre12']);
                  $('#pre_remarks').val(data.mastertable[0]['pre_remarks']);

                  $('#vis1').val(data.mastertable[0]['vis1']);
                  $('#vis2').val(data.mastertable[0]['vis2']);
                  $('#vis3').val(data.mastertable[0]['vis3']);
                  $('#vis4').val(data.mastertable[0]['vis4']);
                  $('#vis5').val(data.mastertable[0]['vis5']);
                  $('#vis6').val(data.mastertable[0]['vis6']);
                  $('#vis7').val(data.mastertable[0]['vis7']);
                  $('#vis8').val(data.mastertable[0]['vis8']);
                  $('#vis9').val(data.mastertable[0]['vis9']);
                  $('#vis10').val(data.mastertable[0]['vis10']);

                  $('#cur1').val(data.mastertable[0]['cur1']);
                  $('#cur2').val(data.mastertable[0]['cur2']);
                  $('#cur3').val(data.mastertable[0]['cur3']);
                  $('#cur4').val(data.mastertable[0]['cur4']);
                  $('#cur5').val(data.mastertable[0]['cur5']);
                  $('#cur6').val(data.mastertable[0]['cur6']);
                  $('#cur7').val(data.mastertable[0]['cur7']);
                  $('#cur8').val(data.mastertable[0]['cur8']);
                  $('#cur9').val(data.mastertable[0]['cur9']);
                  $('#cur10').val(data.mastertable[0]['cur10']);
                  $('#cur11').val(data.mastertable[0]['cur11']);
                  $('#cur12').val(data.mastertable[0]['cur12']);
                  $('#cur13').val(data.mastertable[0]['cur13']);
                  $('#cur14').val(data.mastertable[0]['cur14']);
                  $('#cur15').val(data.mastertable[0]['cur15']);
                  $('#cur16').val(data.mastertable[0]['cur16']);

                  $('#obj1').val(data.mastertable[0]['obj1']);
                  $('#obj2').val(data.mastertable[0]['obj2']);
                  $('#obj3').val(data.mastertable[0]['obj3']);
                  $('#obj4').val(data.mastertable[0]['obj4']);
                  $('#obj5').val(data.mastertable[0]['obj5']);
                  $('#obj6').val(data.mastertable[0]['obj6']);
                  $('#obj7').val(data.mastertable[0]['obj7']);
                  $('#obj8').val(data.mastertable[0]['obj8']);
                  $('#obj9').val(data.mastertable[0]['obj9']);
                  $('#obj10').val(data.mastertable[0]['obj10']);
                  $('#obj11').val(data.mastertable[0]['obj11']);
                  $('#obj12').val(data.mastertable[0]['obj12']);
                  $('#obj13').val(data.mastertable[0]['obj13']);
                  $('#obj14').val(data.mastertable[0]['obj14']);
                  $('#obj15').val(data.mastertable[0]['obj15']);

                  $('#ar1').val(data.mastertable[0]['ar1']);
                  $('#ar2').val(data.mastertable[0]['ar2']);
                  $('#ar3').val(data.mastertable[0]['ar3']);
                  $('#ar4').val(data.mastertable[0]['ar4']);
                  $('#ar5').val(data.mastertable[0]['ar5']);
                  $('#ar6').val(data.mastertable[0]['ar6']);
                  $('#ar7').val(data.mastertable[0]['ar7']);
                  $('#ar8').val(data.mastertable[0]['ar8']);
                  $('#ar9').val(data.mastertable[0]['ar9']);
                  $('#ar10').val(data.mastertable[0]['ar10']);

                  $('#man1').val(data.mastertable[0]['man1']);
                  $('#man2').val(data.mastertable[0]['man2']);
                  $('#man3').val(data.mastertable[0]['man3']);
                  $('#man4').val(data.mastertable[0]['man4']);
                  $('#man5').val(data.mastertable[0]['man5']);
                  $('#man6').val(data.mastertable[0]['man6']);
                  $('#man7').val(data.mastertable[0]['man7']);
                  $('#man8').val(data.mastertable[0]['man8']);
                  $('#man9').val(data.mastertable[0]['man9']);
                  $('#man10').val(data.mastertable[0]['man10']);

                  $('#spe1').val(data.mastertable[0]['spe1']);
                  $('#spe2').val(data.mastertable[0]['spe2']);
                  $('#spe3').val(data.mastertable[0]['spe3']);
                  $('#spe4').val(data.mastertable[0]['spe4']);
                  $('#spe5').val(data.mastertable[0]['spe5']);
                  $('#spe6').val(data.mastertable[0]['spe6']);
                  $('#spe7').val(data.mastertable[0]['spe7']);
                  $('#spe8').val(data.mastertable[0]['spe8']);
                  $('#spe9').val(data.mastertable[0]['spe9']);
                  $('#spe10').val(data.mastertable[0]['spe10']);
                  $('#spe11').val(data.mastertable[0]['spe11']);
                  $('#spe12').val(data.mastertable[0]['spe12']);
                  $('#spe13').val(data.mastertable[0]['spe13']);
                  $('#spe14').val(data.mastertable[0]['spe14']);
                  $('#spe15').val(data.mastertable[0]['spe15']);
                  $('#spe16').val(data.mastertable[0]['spe16']);

                  $('#con1').val(data.mastertable[0]['con1']);
                  $('#con2').val(data.mastertable[0]['con2']);
                  $('#con3').val(data.mastertable[0]['con3']);
                  $('#con4').val(data.mastertable[0]['con4']);
                  $('#con5').val(data.mastertable[0]['con5']);
                  $('#con6').val(data.mastertable[0]['con6']);
                  $('#con7').val(data.mastertable[0]['con7']);
                  $('#con8').val(data.mastertable[0]['con8']);
                  $('#con9').val(data.mastertable[0]['con9']);
                  $('#con10').val(data.mastertable[0]['con10']);
                  $('#con11').val(data.mastertable[0]['con11']);
                  $('#con12').val(data.mastertable[0]['con12']);
                  $('#con13').val(data.mastertable[0]['con13']);
                  $('#con14').val(data.mastertable[0]['con14']);
                  $('#con15').val(data.mastertable[0]['con15']);
                  $('#con16').val(data.mastertable[0]['con16']);

                  $('#pmt1').val(data.mastertable[0]['pmt1']);
                  $('#pmt2').val(data.mastertable[0]['pmt2']);
                  $('#pmt3').val(data.mastertable[0]['pmt3']);
                  $('#pmt4').val(data.mastertable[0]['pmt4']);
                  $('#pmt5').val(data.mastertable[0]['pmt5']);
                  $('#pmt6').val(data.mastertable[0]['pmt6']);
                  $('#pmt7').val(data.mastertable[0]['pmt7']);
                  $('#pmt8').val(data.mastertable[0]['pmt8']);
                  $('#pmt9').val(data.mastertable[0]['pmt9']);
                  $('#pmt10').val(data.mastertable[0]['pmt10']);
                  $('#pmt11').val(data.mastertable[0]['pmt11']);
                  $('#pmt12').val(data.mastertable[0]['pmt12']);
                  $('#pmt13').val(data.mastertable[0]['pmt13']);
                  $('#pmt14').val(data.mastertable[0]['pmt14']);
                  $('#pmt15').val(data.mastertable[0]['pmt15']);
                  $('#pmt16').val(data.mastertable[0]['pmt16']);

                  $('#material').val(data.mastertable[0]['material']);
                  $('#cr').val(data.mastertable[0]['cr']);
                  $('#usage').val(data.mastertable[0]['usage']);
                  $('#typev').val(data.mastertable[0]['typev']);
                  $('#ipd').val(data.mastertable[0]['ipd']);
                  $('#pdre').val(data.mastertable[0]['pdre']);
                  $('#le').val(data.mastertable[0]['le']);
                  $('#segmentre').val(data.mastertable[0]['segmentre']);
                  $('#lle').val(data.mastertable[0]['lle']);
                  $('#mm').val(data.mastertable[0]['mm']);
                  $('#www').val(data.mastertable[0]['www']);
                  $('#dayss').val(data.mastertable[0]['dayss']);
                  $('#d_date').val(data.mastertable[0]['d_date']);
                  $('#sos').val(data.mastertable[0]['sos']);
                  $('#eyepartshistory_id').val(data.mastertable[0]['eyepartshistory_id']);
                  $('#plan_of_action').val(data.mastertable[0]['plan_of_action']);
                  $('#opth_user_comments').val(data.mastertable[0]['opth_user_comments']);
                  $('#dialysiscon').val(data.mastertable[0]['dialysis_con']);
                  checkdia(data.mastertable[0]['dialysis_con']);
                  $("#dialysis_drops").val(data.mastertable[0]['dialysis_drop']).trigger("change");
                  $("#optho_action").val(data.mastertable[0]['optho_action']).trigger("change");


                  setTimeout(
              function() 
              {
                getaddhistorydata(data.mastertable[0]['history_id']);
                getallsegmentlistdata(data.mastertable[0]['eyepartshistory_id']);
                getfrontscreensegment(data.mastertable[0]['eyepartshistory_id']);
                allsegmentshow(data.mastertable[0]['eyepartshistory_id']);
              }, 1800);
                 

                 
                  if(doc_examination_id>0)
                  {
                    getaddmedhistorydata(data.mastertable[0]['addmedhistory_id']);
                    $('#addmedhistory_id').val(data.mastertable[0]['addmedhistory_id']);
                    getaddmedhistorysaveddata(data.mastertable[0]['addmedhistory_id']);
                    $('#medicine_doc_remarks').val(data.mastertable[0]['medicine_doc_remarks']);
                     $('#productdetailsinv').children('tbody').html(data.examinationcharges);
                     row_numm=data.countchk;
                     $("#doc_action").val(data.mastertable[0]['doc_action']).trigger("change");
                  }
                  showhisdet();
                  $('#showdataeyecomp').html('');
                  $('#showdataeyecomp').html(data.eyepart);
                  $('#save').hide();
                  $('#update').show();
                  
                  
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
function getallsegmentlistdata(key)
{  
         $.ajax({
            type: "POST",
            url: 'getallsegmentlistdata',
            dataType: "json",
            data: {key:key,csrf_test_name:csrf},
            success: function(data){
               if(data.msg != ''){
                $('#productdetailseye').children('tbody').append(data.msg);
              } else if(data.error != ''){
               // Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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

function getaddhistorydata(key)
{        

      //  $("#overlay").fadeIn(300);
       // $('#doctor_medicine').html('');
         $.ajax({
            type: "POST",
            url: 'showhistorydata',
            dataType: "json",
            data: {comprem:$('#gen_comp_remarks').val(),opthrem:$('#gen_opth_remarks').val(),medrem:$('#gen_medi_remarks').val(),key:key,current_meditation:$('#current_meditation').val(),family_history:$('#family_history').val(),drug_history:$('#drug_history').val(),csrf_test_name:csrf},
            success: function(data){
               // $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#comp_medicine').html(data.comp);
                $('#preview_comp').html(data.compprev);
                $('#other_history').html(data.otherhistory);
               // $('#mycomrem').html($('#gen_comp_remarks').val());
               
              
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
function addtextboxvalue(sl,dl)
{
    $('#instruction_'+sl).val($('#strchk'+dl).val());
    $('#search_result'+sl).html('');
}
function getlistdescription(val,catid,sl)
{
   // if(val)
   // {
   //    $("#overlay").fadeIn(300);
   //      $('#search_result'+sl).html('');
   //       $.ajax({
   //          type: "POST",
   //          url: 'getmedicineinstruction',
   //          dataType: "json",
   //          data: {val:val,catid:catid,sl:sl,csrf_test_name:csrf},
   //          success: function(data){
   //              $("#overlay").fadeOut(300);
   //             if(data.msg != ''){
   //              $('#search_result'+sl).html(data.htmldata);
              
   //            } else if(data.error != ''){
   //              Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
   //            } else if(data.error_message) 
   //            {
   //              var error = data.error_message;
   //              var err_str = '';
   //              for (var key in error) {
   //                err_str += error[key] +'\n';
   //              }
   //              Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
   //            }
                
   //          },
   //          error: function (error) {
   //              Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
   //              $("#overlay").fadeOut(300);  
   //          }
   //      }); 

   // }
}

function getaddmedhistorydata(key)
{
        $("#overlay").fadeIn(300);
        $('#doctor_medicine').html('');
         $.ajax({
            type: "POST",
            url: 'showhistorydata',
            dataType: "json",
            data: {key:key,current_meditation:$('#current_meditation').val(),family_history:$('#family_history').val(),drug_history:$('#drug_history').val(),csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#doctor_medicine').html(data.docmed);
              
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

function getaddmedhistorysaveddata(key)
{
       // $("#overlay").fadeIn(300);

         $.ajax({
            type: "POST",
            url: 'showmedhistorydata',
            dataType: "json",
            data: {key:key,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                
                $('#productdetails').children('tbody').append(data.docmed);
                row_num=data.rowcnt+1;
              
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


function savedata()
{
    if($('#dialysiscon').val()==2)
    {
        Swal.fire({title:"Are you sure?",
            text:"Dilation Yes",
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
            data: $('#examination_saveform').serialize() + "&medicine_doc_remarks="+$('#medicine_doc_remarks').val()+"&gen_comp_remarks="+$('#gen_comp_remarks').val()+"&gen_opth_remarks="+$('#gen_opth_remarks').val()+"&gen_medi_remarks="+$('#gen_medi_remarks').val()+"&family_history="+$('#family_history').val()+"&drug_history="+$('#drug_history').val()+"&current_meditation="+$('#current_meditation').val()+"",
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               window.location.href = "https://<?php echo $host_tvm; ?>.argsolution.com/master/Dashboard";
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
    else
    {
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'savedata',
            dataType: "json",
            data: $('#examination_saveform').serialize() + "&medicine_doc_remarks="+$('#medicine_doc_remarks').val()+"&gen_comp_remarks="+$('#gen_comp_remarks').val()+"&gen_opth_remarks="+$('#gen_opth_remarks').val()+"&gen_medi_remarks="+$('#gen_medi_remarks').val()+"&family_history="+$('#family_history').val()+"&drug_history="+$('#drug_history').val()+"&current_meditation="+$('#current_meditation').val()+"",
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               window.location.href = "https://<?php echo $host_tvm; ?>.argsolution.com/master/Dashboard";
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

}
function getparticularstreatmentplan(val)
{

    if(val>0)
    {
         //$("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/master/Common_controller/getparticulars',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#particular_treatment').html(data.msg);
              } else if(data.error != ''){
                //Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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
}
function getparticulars(val)
{

    if(val>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/master/Common_controller/getparticulars',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#particular').html(data.msg);
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
}

function updatedataexamination()
{
    
    if($('#dialysiscon').val()==2)
    {
        Swal.fire({title:"Are you sure?",
            text:"Dilation Yes",
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
            url: 'updatedata',
            dataType: "json",
            data: $('#examination_saveform').serialize() + "&medicine_doc_remarks="+$('#medicine_doc_remarks').val()+"&gen_comp_remarks="+$('#hidgen_comp_remarks').val()+"&gen_opth_remarks="+$('#hidgen_opth_remarks').val()+"&gen_medi_remarks="+$('#hidgen_medi_remarks').val()+"&family_history="+$('#family_history').val()+"&drug_history="+$('#drug_history').val()+"&current_meditation="+$('#current_meditation').val()+"",
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                if(doc_examination_id>0)
                {
                    savefollowupnn($('#patient_registration_id').val(),$('#d_date').val())
                }
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
             window.location.href = "https://<?php echo $host_tvm; ?>.argsolution.com/master/Dashboard";
               
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
    else
    {
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'updatedata',
            dataType: "json",
            data: $('#examination_saveform').serialize() + "&medicine_doc_remarks="+$('#medicine_doc_remarks').val()+"&gen_comp_remarks="+$('#hidgen_comp_remarks').val()+"&gen_opth_remarks="+$('#hidgen_opth_remarks').val()+"&gen_medi_remarks="+$('#hidgen_medi_remarks').val()+"&family_history="+$('#family_history').val()+"&drug_history="+$('#drug_history').val()+"&current_meditation="+$('#current_meditation').val()+"",
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                if(doc_examination_id>0)
                {
                    savefollowupnn($('#patient_registration_id').val(),$('#d_date').val())
                }
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
             window.location.href = "https://<?php echo $host_tvm; ?>.argsolution.com/master/Dashboard";
               
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

}
$("body").on("click", "#ucdvaryt td", function () {
    
    $('#ucdvarytval').val($(this).text());
    $('#ucdvaryt td').removeClass("activeref");
    $('#ucdvaryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#ucnvaryt td", function () {
    
    $('#ucnvarytval').val($(this).text());
    $('#ucnvaryt td').removeClass("activeref");
    $('#ucnvaryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#ucdvalft td", function () {
    
    $('#ucdvalftval').val($(this).text());
    $('#ucdvalft td').removeClass("activeref");
    $('#ucdvalft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#ucnvalft td", function () {
    
    $('#ucnvalftval').val($(this).text());
    $('#ucnvalft td').removeClass("activeref");
    $('#ucnvalft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});
function urefractionvision()
{
    $('#vis1').val($('#ucdvarytval').val()); //ucdva ryt
    $('#vis2').val($('#ucnvarytval').val()); //ucnva ryt
    $('#vis6').val($('#ucdvalftval').val()); //ucdva lft
    $('#vis7').val($('#ucnvalftval').val()); //ucnva lft
     $(".close").click();
}




$("body").on("click", "#bcdvaryt td", function () {
    
    $('#bcdvarytval').val($(this).text());
    $('#bcdvaryt td').removeClass("activeref");
    $('#bcdvaryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#bcnvaryt td", function () {
    
    $('#bcnvarytval').val($(this).text());
    $('#bcnvaryt td').removeClass("activeref");
    $('#bcnvaryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#bcdvalft td", function () {
    
    $('#bcdvalftval').val($(this).text());
    $('#bcdvalft td').removeClass("activeref");
    $('#bcdvalft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#bcnvalft td", function () {
    
    $('#bcnvalftval').val($(this).text());
    $('#bcnvalft td').removeClass("activeref");
    $('#bcnvalft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});
function brefractionvision()
{
    $('#vis4').val($('#bcdvarytval').val()); //ucdva ryt
    $('#vis5').val($('#bcnvarytval').val()); //ucnva ryt
    $('#vis9').val($('#bcdvalftval').val()); //ucdva lft
    $('#vis10').val($('#bcnvalftval').val()); //ucnva lft
     $(".close").click();
}

///php


$("body").on("click", "#phpryt td", function () {
    
    $('#phprytval').val($(this).text());
    $('#phpryt td').removeClass("activeref");
    $('#phpryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", "#phplft td", function () {
    
    $('#phplftval').val($(this).text());
    $('#phplft td').removeClass("activeref");
    $('#phplft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});
function crefractionvision()
{
    $('#vis3').val($('#phprytval').val()); //ucdva ryt
    $('#vis8').val($('#phplftval').val()); //ucnva ryt
     $(".close").click();
}

$("body").on("click", ".sphryt td", function () {
    $('#sphrytmin').val('');
    $('#sphrytplus').val('');
    var data =$(this).text();
    var arr = data.trim();
    valr=arr.slice(0,1);
    // if(valr=='-')
    // { 
    //     $('#sphrytmin').val($(this).text());
    // }
    // else
    // {
    //     $('#sphrytplus').val($(this).text());
    // }
    $('#sphrytmin').val($(this).text());
    
    $('.sphryt td').removeClass("activeref");
    $('.sphryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", ".cylryt td", function () {
    $('#cylrytmin').val('');
    $('#cylrytplus').val('');
    var data =$(this).text();
    var arr = data.trim();
    valr=arr.slice(0,1);
    // if(valr=='-')
    // { 
    //     $('#cylrytmin').val($(this).text());
    // }
    // else
    // {
    //     $('#cylrytplus').val($(this).text());
    // }
    $('#cylrytmin').val($(this).text());
    
    $('.cylryt td').removeClass("activeref");
    $('.cylryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", ".cylft td", function () {
    $('#cylftmin').val('');
    $('#cylftplus').val('');
    var data =$(this).text();
    var arr = data.trim();
    valr=arr.slice(0,1);
    // if(valr=='-')
    // { 
    //     $('#cylftmin').val($(this).text());
    // }
    // else
    // {
    //     $('#cylftplus').val($(this).text());
    // }
    $('#cylftmin').val($(this).text());
    
    $('.cylft td').removeClass("activeref");
    $('.cylft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});


$("body").on("click", ".axisryt td", function () {
    $('#axisrytmin').val('');
    $('#axisrytmin').val($(this).text());
    $('.axisryt td').removeClass("activeref");
    $('.axisryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", ".varyt  td", function () {
    $('#varytmin').val('');
    $('#varytmin').val($(this).text());
    $('.varyt  td').removeClass("activeref");
    $('.varyt  td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});


$("body").on("click", ".valft  td", function () {
    $('#vall').val('');
    $('#vall').val($(this).text());
    $('.valft   td').removeClass("activeref");
    $('.valft   td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});


$("body").on("click", ".axislft td", function () {
    $('#laxisll').val('');
    $('#laxisll').val($(this).text());
    $('.axislft td').removeClass("activeref");
    $('.axislft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", ".addryt td", function () {
    $('#addr1').val('');
    $('#addr1').val($(this).text());
    $('.addryt td').removeClass("activeref");
    $('.addryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});


$("body").on("click", ".nvryt td", function () {
    $('#nvr1').val('');
    $('#nvr1').val($(this).text());
    $('.nvryt td').removeClass("activeref");
    $('.nvryt td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});


$("body").on("click", ".addlft td", function () {
    $('#addlftr').val('');
    $('#addlftr').val($(this).text());
    $('.addlft td').removeClass("activeref");
    $('.addlft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});


$("body").on("click", ".nvlft td", function () {
    $('#nvlftr').val('');
    $('#nvlftr').val($(this).text());
    $('.nvlft td').removeClass("activeref");
    $('.nvlft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

$("body").on("click", ".sprlft td", function () {
    $('#sphlftmin').val('');
    $('#sphlftplus').val('');
    var data =$(this).text();
    var arr = data.trim();
    valr=arr.slice(0,1);
    // if(valr=='-')
    // { 
    //     $('#sphlftmin').val($(this).text());
    // }
    // else
    // {
    //     $('#sphlftplus').val($(this).text());
    // }
    $('#sphlftmin').val($(this).text());
    
    $('.sprlft td').removeClass("activeref");
    $('.sprlft td').addClass("inactiveref");
    $(this).addClass("activeref");
    $(this).removeClass("inactiveref");
});

function srefractionvision()
{
        if($('#objsph').val()==1 || $('#objsph').val()==3 || $('#objcyl').val()==1 || $('#objcyl').val()==3)
        {
             if($('#sphrytmin').val())
             {
                $('#obj1').val($('#sphrytmin').val()); //ucdva ryt
             }
             if($('#sphlftmin').val())
             {
                 $('#obj7').val($('#sphlftmin').val()); //ucdva ryt
             }

             if($('#cylrytmin').val())
             {
                $('#obj2').val($('#cylrytmin').val()); //ucdva ryt
             }
             if($('#cylftmin').val())
             {
                 $('#obj8').val($('#cylftmin').val()); //ucdva ryt
             }

             if($('#axisrytmin').val())
             {
                $('#obj3').val($('#axisrytmin').val()); //ucdva ryt
             }
             if($('#laxisll').val())
             {
                $('#obj9').val($('#laxisll').val()); //ucdva ryt
             }
        }

        if($('#objsph').val()==2 || $('#objsph').val()==4 || $('#objcyl').val()==2 || $('#objcyl').val()==4)
        {
             if($('#sphrytmin').val())
             {
                $('#obj4').val($('#sphrytmin').val()); //ucdva ryt
             }
             if($('#sphlftmin').val())
             {
                 $('#obj10').val($('#sphlftmin').val()); //ucdva ryt
             }

             if($('#cylrytmin').val())
             {
                $('#obj5').val($('#cylrytmin').val()); //ucdva ryt
             }
             if($('#cylftmin').val())
             {
                 $('#obj11').val($('#cylftmin').val()); //ucdva ryt
             }

              if($('#objaxe').val()==2)
            {
                 if($('#axisrytmin').val())
                 {
                    $('#obj6').val($('#axisrytmin').val()); //ucdva ryt
                 }
            }
            
            if($('#objaxe').val()==4)
            {
                 if($('#laxisll').val())
                 {
                    $('#obj12').val($('#laxisll').val()); //ucdva ryt
                 }
            }

             if($('#laxisll').val())
             {
                $('#obj12').val($('#laxisll').val()); //ucdva ryt
             }
             //  if($('#axisrytmin').val())
             // {
             //    $('#obj9').val($('#axisrytmin').val()); //ucdva ryt
             // }
              if($('#axisrytmin').val())
             {
                $('#obj6').val($('#axisrytmin').val()); //ucdva ryt
             }
        }


        // if($('#objcyl').val()==1 || $('#objcyl').val()==3)
        // {
        //      if($('#cylrytmin').val())
        //      {
        //         $('#obj2').val($('#cylrytmin').val()); //ucdva ryt
        //      }
        //      if($('#cylftmin').val())
        //      {
        //          $('#obj8').val($('#cylftmin').val()); //ucdva ryt
        //      }
        // }

        // if($('#objcyl').val()==2 || $('#objcyl').val()==4)
        // {
        //      if($('#cylrytmin').val())
        //      {
        //         $('#obj5').val($('#cylrytmin').val()); //ucdva ryt
        //      }
        //      if($('#cylftmin').val())
        //      {
        //          $('#obj11').val($('#cylftmin').val()); //ucdva ryt
        //      }
        // }



        if($('#objaxe').val()==1)
        {
             if($('#axisrytmin').val())
             {
                $('#obj3').val($('#axisrytmin').val()); //ucdva ryt
             }
        }
         if($('#objaxe').val()==2)
        {
             if($('#axisrytmin').val())
             {
                $('#obj6').val($('#axisrytmin').val()); //ucdva ryt
             }
              if($('#laxisll').val())
             {
                $('#obj12').val($('#laxisll').val()); //ucdva ryt
             }
        }

        if($('#objaxe').val()==3)
        {
             if($('#axisrytmin').val())
             {
                $('#obj9').val($('#axisrytmin').val()); //ucdva ryt
             }
        }

        if($('#objaxe').val()==4)
        {
             if($('#laxisll').val())
             {
                $('#obj12').val($('#laxisll').val()); //ucdva ryt
             }
        }
        

    $(".close").click();
}

function rrefractionvision()
{
        if($('#objsph').val()==1 || $('#objsph').val()==3 || $('#objcyl').val()==1 || $('#objcyl').val()==3)
        {
             if($('#sphrytmin').val())
             {
                $('#spe1').val($('#sphrytmin').val()); //ucdva ryt
             }
             if($('#sphlftmin').val())
             {
                 $('#spe9').val($('#sphlftmin').val()); //ucdva ryt
             }

             if($('#cylrytmin').val())
             {
                $('#spe2').val($('#cylrytmin').val()); //ucdva ryt
             }
             if($('#cylftmin').val())
             {
                 $('#spe10').val($('#cylftmin').val()); //ucdva ryt
             }

             if($('#axisrytmin').val())
             {
                $('#spe3').val($('#axisrytmin').val()); //ucdva ryt
             }
             // if($('#axisrytmin').val())
             // {
             //    $('#spe11').val($('#axisrytmin').val()); //ucdva ryt
             // }

             if($('#varytmin').val())
             {
                $('#spe4').val($('#varytmin').val()); //ucdva ryt
             }
              if($('#laxisll').val())
                 {
                    $('#spe11').val($('#laxisll').val()); //ucdva ryt
                 }
                  if($('#vall').val())
                 {
                    $('#spe12').val($('#vall').val()); //ucdva ryt
                 }

            if($('#addr1').val())
             {
                $('#spe5').val($('#addr1').val()); //ucdva ryt
             }
              if($('#nvr1').val())
             {
                $('#spe8').val($('#nvr1').val()); //ucdva ryt
             }
             // if($('#varytmin').val())
             // {
             //    $('#spe12').val($('#varytmin').val()); //ucdva ryt
             // }
        }

        if($('#objsph').val()==2 || $('#objsph').val()==4 || $('#objcyl').val()==2 || $('#objcyl').val()==4)
        {
             // if($('#sphrytmin').val())
             // {
             //    $('#spe9').val($('#sphrytmin').val()); //ucdva ryt
             // }
             if($('#sphlftmin').val())
             {
                 $('#spe9').val($('#sphlftmin').val()); //ucdva ryt
             }

             // if($('#cylrytmin').val())
             // {
             //    $('#spe10').val($('#cylrytmin').val()); //ucdva ryt
             // }
             if($('#cylftmin').val())
             {
                 $('#spe10').val($('#cylftmin').val()); //ucdva ryt
             }

                 if($('#laxisll').val())
                 {
                    $('#spe11').val($('#laxisll').val()); //ucdva ryt
                 }
                  if($('#vall').val())
                 {
                    $('#spe12').val($('#vall').val()); //ucdva ryt
                 }

             
        }




       



        if($('#objaxe').val()==1)
        {
             if($('#axisrytmin').val())
             {
                $('#spe3').val($('#axisrytmin').val()); //ucdva ryt
             }
        }
         if($('#objaxe').val()==2)
        {
             if($('#axisrytmin').val())
             {
                $('#spe7').val($('#axisrytmin').val()); //ucdva ryt
             }
        }

        if($('#objaxe').val()==3)
        {
             if($('#axisrytmin').val())
             {
                $('#spe11').val($('#axisrytmin').val()); //ucdva ryt
             }
             if($('#axisrytmin').val())
             {
                $('#spe7').val($('#axisrytmin').val()); //ucdva ryt
             }
        }

        if($('#objaxe').val()==4)
        {
             if($('#axisrytmin').val())
             {
                $('#spe15').val($('#axisrytmin').val()); //ucdva ryt
             }
        }



        if($('#objva').val()==1)
        {
             if($('#varytmin').val())
             {
                $('#spe4').val($('#varytmin').val()); //ucdva ryt
             }
        }
         if($('#objva').val()==2)
        {
             if($('#varytmin').val())
             {
                $('#spe8').val($('#varytmin').val()); //ucdva ryt
             }
        }


        if($('#objva').val()==3)
        {
             if($('#vall').val())
             {
                $('#spe12').val($('#vall').val()); //ucdva ryt
             }

             if($('#varytmin').val())
             {
                $('#spe8').val($('#varytmin').val()); //ucdva ryt
             }
        }

        if($('#objva').val()==4)
        {
             if($('#vall').val())
             {
                $('#spe16').val($('#vall').val()); //ucdva ryt
             }

             if($('#varytmin').val())
             {
                $('#spe16').val($('#varytmin').val()); //ucdva ryt
             }
        }


         if($('#addlftr').val())
             {
                $('#spe13').val($('#addlftr').val()); //ucdva ryt
             }
              if($('#nvlftr').val())
             {
                $('#spe16').val($('#nvlftr').val()); //ucdva ryt
             }
        

    $(".close").click();
}

function treatmentsave()
{
     var treatmentplan = $('input:radio[name="treatmentplan"]:checked').val();
     var eyetreatmentplan = $('input:radio[name="eyetreatmentplan"]:checked').val();
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'savetreatmentplan',
            dataType: "json",
            data: {treatmentplan_refid:$('#treatmentplan_refid').val(),treatmentplan:treatmentplan,eyetreatmentplan:eyetreatmentplan,particular_treatment:$('#particular_treatment').val(),treatmentplandoctor_id:$('#treatmentplandoctor_id').val(),treatmentplan_appointmentdate:$('#treatmentplan_appointmentdate').val(),treatmentplan_counseling:$('#treatmentplan_counseling').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               
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

$(".clskwa").on("dblclick", function() 
{
 $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'getrefractiondataobj',
            dataType: "json",
            data: {csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#refractionmodal').html(data.msg);
                 $('#div_modal').modal('show');
                 $('.modal-title').html('Refraction Master Data');
               
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
   
});

function getrefractiondata(refraction_type,ref_type,eye_type,val,axis=0,sph=0,cyl=0,axist=0,va=0)
{ 
    $('#objsph').val();
    if(val)
    {
        if(sph>0)
        {
            $('#objsph').val(sph);
        }
        if(cyl>0)
        {
            $('#objcyl').val(cyl);
        }
        if(axist>0)
        {
            $('#objaxe').val(axist);
        }
        if(va>0)
        {
            $('#objva').val(va);
        }

        
        $('#refractionmodal').html('');
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'getrefractiondata',
            dataType: "json",
            data: {refraction_type: refraction_type,ref_type: ref_type,eye_type: eye_type,getid: val,axis: axis,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#refractionmodal').html(data.msg);
                 $('#div_modal').modal('show');
                 $('.modal-title').html('Refraction Master Data');
               
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

}


function deletedata(val)
{
    if(val>0)
    {
          Swal.fire({title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Delete it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
             $("#overlay").fadeIn(300);
                   $.ajax({
            type: "POST",
            url: 'deletedata',
            dataType: "json",
            data: {getid: val,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
             getexaminationdata();
               
              } else if(data.error != ''){
                Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
               return false;
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                 return false;
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
}

$("input:radio[name=lenstype]").click(function() {
    var value = $(this).val();
     if(value==1)
     {
        $('#Vision').show(500);
        $('#spectacle').hide();
     }
     else
     {
        $('#Vision').hide();
        $('#spectacle').show(500);
        
     }
});




$("input:radio[name=spectacle]").click(function() {
    var value = $(this).val();
     if(value==1)
     {
        $('#spectacle1').show(500);
        $('#spectacle2').hide();
        $('#spectacle3').hide();
     }
     else if(value==2)
     {
        $('#spectacle1').hide();
        $('#spectacle2').show(500);
        $('#spectacle3').hide();
     }
     else
     {
        $('#spectacle1').hide();
        $('#spectacle2').hide();
        $('#spectacle3').show(500);
     }
});

$("input:radio[name=refraction]").click(function() {
    var value = $(this).val();
     if(value==1)
     {
        $('#Objective1').show(500);
        $('#Objective2').hide();
        $('#Objective3').hide();
     }
     else if(value==2)
     {
         $('#Objective1').hide();
        $('#Objective2').show(500);
        $('#Objective3').hide();
     }
     else
     {
         $('#Objective1').hide();
        $('#Objective2').hide();
        $('#Objective3').show(500);
     }
});

function examinationprint(examinationid,sel=0)
{
    if(sel==1)
    {
         $(".check_class").attr("checked", false);
         $("#specchk").attr("checked", true);
    }
    else
    {
        $(".check_class").attr("checked", true);
    }

   $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/examinationprint"><input name="examinationid" value="'+examinationid+'"/><input name="chkcomplaintsout" value="'+$('#chkcomplaints').is(':checked')+'"><input name="chkopthalmicsout" value="'+$('#chkophthalmic').is(':checked')+'"><input name="chkmedicalout" value="'+$('#chkmedical').is(':checked')+'"><input name="chkeyepartout" value="'+$('#chkeyepart').is(':checked')+'"><input name="addmedicinessout" value="'+$('#addmediciness').is(':checked')+'"><input name="investigationchkout" value="'+$('#investigationchk').is(':checked')+'"><input name="preliminary_exout" value="'+$('#preliminary_ex').is(':checked')+'"><input name="vsisonreadingsout" value="'+$('#vsisonreadings').is(':checked')+'"><input name="curspecout" value="'+$('#curspec').is(':checked')+'"><input name="objectchkout" value="'+$('#objectchk').is(':checked')+'"><input name="arkkchkout" value="'+$('#arkkchk').is(':checked')+'"><input name="manchkout" value="'+$('#manchk').is(':checked')+'"><input name="specchkout" value="'+$('#specchk').is(':checked')+'"><input name="conlchkout" value="'+$('#conlchk').is(':checked')+'"><input name="pmtchkout" value="'+$('#pmtchk').is(':checked')+'"><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}

function printdata()
{
   $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/doctorprintmedicineprescription"><input name="key" value="'+$('#addmedhistory_id').val()+'"/><input name="pid" value="'+$('#patient_registration_id').val()+'"/><input name="paid" value="'+$('#patient_appointment_id').val()+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}

function calvaldvcur(val)
{
    dv= $('#cur1').val();
    fc= dv.slice(0,1);
    sumva=0;
    if(fc=='+')
    {
      var getval = dv.replace('+', '');
      sumval=parseFloat(val)+parseFloat(getval);
      if(sumval)
      {
         $('#cur5').val('+'+sumval);
      }
      else
      {
        $('#cur5').val('');
      }
    }
    else if(fc=='-')
    { 
        var getval = dv.replace('-', '');
        sumval=parseFloat(val)-parseFloat(getval);
        // if(dv>$('#spe5').val())
        // {
        //     mark="+";
        // }
        // else
        // {
        //     mark="";
        // }
        sumva=sumval;
        sumva = isNaN(sumva) ? '' : sumva;
        if(sumva)
        {
            $('#cur5').val(sumva);
        }
        else
        {
            $('#cur5').val('');
        }
        
    }
    else
    {

        if(dv)
        {
            sumval=parseFloat(val)+parseFloat(dv);
            if(sumval)
            {
                $('#cur5').val(sumval);
            }
            else
            {
                $('#cur5').val('');
            }
            
       }
       else
       {
            if(val)
            {
              $('#cur5').val(val);
            }
            else
            {
                $('#cur5').val('');
            }
       }

    }
    
}

function calvaldvcur1(val)
{
    dv= $('#cur9').val();
    fc= dv.slice(0,1);
    sumva=0;
    if(fc=='+')
    {
      var getval = dv.replace('+', '');
      sumval=parseFloat(val)+parseFloat(getval);
      if(sumval)
      {
         $('#cur13').val('+'+sumval);
      }
      else
      {
        $('#cur13').val('');
      }
    }
    else if(fc=='-')
    { 
        var getval = dv.replace('-', '');
        sumval=parseFloat(val)-parseFloat(getval);
        // if(dv>$('#spe5').val())
        // {
        //     mark="+";
        // }
        // else
        // {
        //     mark="";
        // }
        sumva=sumval;
        sumva = isNaN(sumva) ? '' : sumva;
        if(sumva)
        {
            $('#cur13').val(sumva);
        }
        else
        {
            $('#cur13').val('');
        }
        
    }
    else
    {

        if(dv)
        {
            sumval=parseFloat(val)+parseFloat(dv);
            if(sumval)
            {
                $('#cur13').val(sumval);
            }
            else
            {
                $('#cur13').val('');
            }
            
       }
       else
       {
            if(val)
            {
              $('#cur13').val(val);
            }
            else
            {
                $('#cur13').val('');
            }
       }

    }
    
}

function calvaldv(val)
{
    dv= $('#spe1').val();
    fc= dv.slice(0,1);
    sumva=0;
    if(fc=='+')
    {
      var getval = dv.replace('+', '');
      sumval=parseFloat(val)+parseFloat(getval);
      if(sumval)
      {
         $('#spe5').val('+'+sumval);
      }
      else
      {
        $('#spe5').val('');
      }
    }
    else if(fc=='-')
    { 
        var getval = dv.replace('-', '');
        sumval=parseFloat(val)-parseFloat(getval);
        // if(dv>$('#spe5').val())
        // {
        //     mark="+";
        // }
        // else
        // {
        //     mark="";
        // }
        sumva=sumval;
        sumva = isNaN(sumva) ? '' : sumva;
        if(sumva)
        {
            $('#spe5').val(sumva);
        }
        else
        {
            $('#spe5').val('');
        }
        
    }
    else
    {

        if(dv)
        {
            sumval=parseFloat(val)+parseFloat(dv);
            if(sumval)
            {
                $('#spe5').val(sumval);
            }
            else
            {
                $('#spe5').val('');
            }
            
       }
       else
       {
            if(val)
            {
              $('#spe5').val(val);
            }
            else
            {
                $('#spe5').val('');
            }
       }

    }
    
}

function calvaldv1(val)
{
    dv= $('#spe9').val();
    fc= dv.slice(0,1);
    if(fc=='+')
    {
      var getval = dv.replace('+', '');
      sumval=parseFloat(val)+parseFloat(getval);
      if(sumval)
      {
        $('#spe13').val('+'+sumval);
      }
      else
      {
        $('#spe13').val('');
      }
      
    }
    else if(fc=='-')
    {
        var getval = dv.replace('-', '');
        sumval=parseFloat(val)-parseFloat(getval);
        // if(dv>$('#spe13').val())
        // {
        //     mark="+";
        // }
        // else
        // {
        //     mark="";
        // }
        op=sumval;
        op = isNaN(op) ? '' : op;
        if(op)
        {
            $('#spe13').val(op);
        }
        else
        {
            $('#spe13').val('');
        }
        
    }
    else
    {
        if(dv)
        {
            sumval=parseFloat(val)+parseFloat(dv);
            if(sumval)
            {
                $('#spe13').val(sumval);
            }
            else
            {
               $('#spe13').val(''); 
            }
            
       }
       else
       {
            if(val)
            {
             $('#spe13').val(val);
            }
            else
            {
               $('#spe13').val(''); 
            }
       }

    }
    
}


function getsepval2(val)
{
    if($('#cylcheckbox').is(':checked'))
    {
        $('#spe6').val(val);
    }
    
}
function getsepval3(val)
{
    if($('#axischeckbox').is(':checked'))
    {
        $('#spe7').val(val);
    }
}
function getsepval0(val)
{
    if($('#cylcheckbox').is(':checked'))
    {
        $('#spe14').val(val);
    }
}
function getsepval1(val)
{
     if($('#axischeckbox').is(':checked'))
    {
        $('#spe15').val(val);
    }
}
function clickcyl()
{
    if($('#cylcheckbox').is(':checked'))
    {
        $('#spe6').val($('#spe2').val());
        $('#spe14').val($('#spe10').val());
    }
    else
    {
        $('#spe6').val('');
        $('#spe14').val('');
    }
}
function clickaxis()
{
    if($('#axischeckbox').is(':checked'))
    {
        $('#spe7').val($('#spe3').val());
        $('#spe15').val($('#spe11').val());
    }
    else
    {
        $('#spe7').val('');
        $('#spe15').val('');
    }
}
function showallCorrectionuncylpmtshow() 
{
   $('#showallCorrectionuncylpmtshow').hide();
   $('#showallCorrectionuncylpmthide').show();
   $('#spectacle1').show();
   $('#spectacle2').show();
   $('#spectacle3').show();

}
function showallCorrectionuncylpmthide()
{
    $('#showallCorrectionuncylpmtshow').show();
    $('#showallCorrectionuncylpmthide').hide();
    $('#spectacle1').show();
    $('#spectacle2').hide();
    $('#spectacle3').hide();
}

 function ageChanged()
  {
   var today = new Date('<?php echo date('Y-m-d'); ?>');
   var year=0;
   var month=$("#mm").val();
   var dated=$("#dayss").val();
   var www=$("#www").val();
   var datet=0;
   var year=parseInt(year);
   if(isNaN(year))
   {
       year=0;
   }
   var month=parseInt(month);
   if(isNaN(month))
   {
       month=0;
   }
   var date=parseInt(dated);
   if(isNaN(date))
   {
       date=0;
   }

   var www=parseInt(www);
   if(isNaN(www))
   {
      
      
   }
   else
   {
       var dd=7;
       datet=parseInt(dd)*parseInt(www);
       date=parseInt(datet)+parseInt(date);
   }
 

     var total_days=   year*365.25+month*30.42+date;
     var total_days=Math.round(total_days);
     if(total_days==0)
     {
     return;
     }
    today.setDate(today.getDate()-total_days);
    var birth_date = today. getDate();
    var birth_month = today. getMonth() + 1; 
    var birth_year = today. getFullYear();
  // var dob=pad(birth_date,2)+'-'+pad(birth_month,2)+'-'+birth_year;
   var dob=birth_year+'-'+pad(birth_month,2)+'-'+pad(birth_date,2);
    $("#d_date").val(dob);
         
  }
  function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

function savefollowupnn(patfolid,padate)
{
      
       
         $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>master/Patients_registration/savefollowupnewfture',
            dataType: "json",
            data: {patfolid: patfolid,padate: padate,foldescription: 'Doctor Follow UP',csrf_test_name:csrf},
            success: function(data){
               
                
            },
            error: function (error) {
              
            }
        }); 

}

function geteyepartssegmentdetails(segmentid)
{ 
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'geteyepartssegmentdetails',
            dataType: "json",
            data: {segmentid: segmentid,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                             
                              $.each(data.getdata, function(index, value) {
                                  var lenrow=0;
                                  var rowLen =  $('#productdetailseye > tbody >tr').length;
                                  var lenrow=rowLen+1;
                                  var id=lenrow;
                                $('#productdetailseye').children('tbody').append('<tr class="eyeparcon'+segmentid+'">\n\
                                       <td><input type="hidden" id="calrow_id_'+id+'" name="calrow_id[]" value="'+lenrow+'" ><input type="hidden" id="eye_mapping_segment_id'+id+'" name="eye_mapping_segment_id[]" value="'+value.eye_mapping_segment_id+'" >'+value.name+'</td>\n\
                                        <td><input  type="text"  name="righteyeparts[]"   class="form-control" id="righteyeparts'+id+'"></td>\n\
                                        <td><input  type="text"  name="lefteyeparts[]"   class="form-control" id="lefteyeparts'+id+'"></td>\n\
                                       </tr>'); 
                              });
                                 
                 
               
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

function allsegmentshow(key=0)
{ 
    $('#allsegmentlistshowing').html('');
         $.ajax({
            type: "POST",
            url: 'getallsegment',
            dataType: "json",
            data: {key:key,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#allsegmentlistshowing').html(data.msg);
                 $('input[name="selectedItems1"]').click(function()
                { 
                      if (this.checked) 
                      {
                         geteyepartssegmentdetails(this.value);
                      }
                      else
                      {
                         $('.eyeparcon'+this.value).remove();
                      }
                });
              } else if(data.error != ''){
                //Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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


</script>
<style>
.table th, .table td {
    padding: 5px;
}
.activeref {
    background: #1e9ff2;
    color: #fff;
}
.inactiveref {
   
}
</style>