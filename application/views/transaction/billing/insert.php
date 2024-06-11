<?php 
$path=base_url('template1/');
?>      
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Billing</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true"><l id="tab_tit">Add Billing<l></a>
                                            </li>

                                           
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View/Edit/Delete</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Advance Billing</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                            <form id="billing" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <input type="hidden" name="edit_billing_master_id" id="edit_billing_master_id">
                                <div class="row">
                                 
                                                    <div class="col-sm-2 col-md-3">
                                                            <div class="form-group">
                                                                <label for="lastname">Select Search: <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="search" id="search" onchange="getselectedval(this.value);">
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
                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Date: <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control bill_date"  id="bill_date" name="bill_date" >
                                            </div>
                                         </div>
                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Time: <span class="text-danger">*</span></label>
                                                <input type="time" class="form-control bill_time"  id="bill_time" name="bill_time" >
                                            </div>
                                         </div>
                                </div>
                                    
                              <div id="last_appointmentdetails" style="margin-bottom: 1%;"></div>
                               <div class="form-group row">
                                
                                     <div class="col-md-6">
                                        <label>Package List</label>
                                        <select class="form-control select2" name="package_list" id="package_list" style="width:100%;" onchange="selectpackage(this.value)">>
                                           <option value="">Select Package</option>
                                           <?php
                                           if($packagelist)
                                           {
                                              foreach ($packagelist as $datapckage) 
                                              {
                                                  ?>
                                                  <option value="<?php echo $datapckage['package_master_id']; ?>"><?php echo $datapckage['name']; ?></option>
                                                  <?php
                                              }
                                           }

                                           ?>
                                           <option></option>
                                        </select>
                                     </div>

                                        <div class="col-md-4">
                                             <label>Billing Type</label>
                                             <select class="form-control" name="billing_type" id="billing_type">
                                                <option value="0">Normal Billing</option>
                                                <option value="1">Advance Billing</option>
                                             </select>
                                        </div>
                                     </div>
                             
                                <div class="row">
                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Charge Type: <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="charge_type_id" id="charge_type_id" onchange="getparticulars(this.value);">
                                                        <option value="">Select Charge Type </option>
                                                        <?php if($chargeslist){ foreach($chargeslist as $data){ ?>
                                                            <option value="<?php  echo $data['charge_id']; ?>"><?php echo  $data['name']; ?></option>
                                                     <?php }} ?>
                                                    </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Select Particular: <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="particular" id="particular" onchange="getparticularsdetails(this.value)">
                                                       
                                                    </select>
                                            </div>
                                         </div>

                                          <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Insurance Company Name:</label>
                                                    <select class="form-control select2" name="insurance_company_id" id="insurance_company_id">
                                                       <option value="">Select Insurance Company Name</option>
                                                 <?php if($insurancecompanys){ foreach($insurancecompanys as $data){ ?>
                                                            <option value="<?php  echo $data['insurance_company_id']; ?>"><?php echo  $data['name']; ?></option>
                                                     <?php }} ?>
                                                    </select>
                                            </div>
                                         </div>
                                          <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Select Doctor Name: <span class="text-danger">*</span></label>
                                                 <select class="form-control select2" name="doctor_id" id="doctor_id">
                                                    <option value="">Select Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){ ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                         </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                            <div class="table-responsive">
                                                <?php 
                                                if($this->session->userdata('user_type')==4)
                                                {
                                                    $cls='class="receiptioncls"';
                                                }
                                                else
                                                {
                                                    $cls='';
                                                 }
                                                 ?>
                                         
                                                <table class="table table-striped table-hover" id="productdetails" bquotation="0">
                                                    <thead style="background:#e0e0e0;">
                                                    <tr>
                                                        <th>Remove</th>
                                                        <th>Particulars</th>
                                                        <th>Qty</th>
                                                        <th>Eye</th>
                                                        <th>Rate</th>
                                                        <th <?php echo $cls; ?>>Dis Amt</th>
                                                        <th <?php echo $cls; ?>>Dis Per</th>
                                                        <th>Total Amt</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname">Bill Amount: <span class="text-danger">*</span></label>
                                                       <input type="text" readonly name="billamount" id="billamount" class="form-control">
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname">Insurance  amount: </label>
                                                    <input type="text" onkeyup="calcnet()" name="insuranceamt" id="insuranceamt" class="form-control">
                                             </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname">Advanced Amount: </label>
                                                    <input type="text" onkeyup="calcnet()" name="advancedamount" id="advancedamount" class="form-control">
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="lastname">Modeofpay: <span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="modeofpay_id" id="modeofpay_id">
                                                    <option value="">Select Modeofpay</option>
                                                   <?php if($modeofpays){
                                                    foreach($modeofpays as $data){
                                                        ?>
                                                        <option value="<?php echo $data['modeofpay_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php
                                                    }
                                                   } ?>
                                                </select>
                                             </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname"><b>Grand Total: </b></label>
                                                    <input type="text" name="net_amount" id="net_amount" class="form-control" readonly style="color: black;font-weight: bold;font-size: 19px;" value="0.00">
                                             </div>
                                        </div>
                                    </div>
                                </div>
                               
                            

                               
                                    <div class="row">
                                             <div class="col-md-3">
                                                 <label>Cash</label>
                                                 <input type="text" name="cash_billing" id="cash_billing" class="form-control">
                                             </div>
                                             <div class="col-md-3">
                                                 <label>Card</label>
                                                 <input type="text" name="card_billing" id="card_billing" class="form-control">
                                             </div>
                                             <div class="col-md-3">
                                                 <label>Paytm</label>
                                                 <input type="text" name="paytm_billing" id="paytm_billing" class="form-control">
                                             </div>
                                             <div class="col-md-3">
                                                 <label>Others</label>
                                                 <input type="text" name="others_billing" id="others_billing" class="form-control">
                                             </div>
                                     </div>
                                <div class="card-footer ml-auto">
                                    <button id="save" type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata();">Submit</button>
                                      <button id="update" style="display:none;" type="button" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedataval();">Update</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                    
                                </div>
                            </form>
                                            </div>
                                            <?php
                                            if($this->session->userdata('user_type')==4)
                                            {
                                                $cls='class="receiptioncls"';
                                            }
                                            else
                                            {
                                                $cls='';
                                            }
                                            ?>

<!---advance adjustment begins--->
<div role="tabpanel" class="tab-pane" id="tab11" aria-expanded="true" aria-labelledby="base-tab11">
                            <form id="billingdata" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <input type="hidden" name="edit_billing_master_ida" id="edit_billing_master_ida">
                                <input type="hidden" name="patient_registration_ida" id="patientidAdjust">
                                
                                <div class="row">
                                 
                                                    <div class="col-sm-2 col-md-3">
                                                            <div class="form-group">
                                                                <label for="lastname">Select Search: <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="search" id="search" >
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
                                                               <select style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_registration_id" id="patient_registration_ida" onchange="editdataAdjust(this.value);">
                                                                   <option value="">Select Patient MRD NOS</option>
                                                                  
                                                               </select>


                                                               
                                                            </div>
                                                         </div>
                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Date: <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control bill_date"  id="bill_datea" name="bill_date" >
                                            </div>
                                         </div>
                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Time: <span class="text-danger">*</span></label>
                                                <input type="time" class="form-control bill_time"  id="bill_timea" name="bill_time" >
                                            </div>
                                         </div>
                                </div>
                                <div id="last_appointmentdetailsa" style="margin-bottom: 1%;"></div>
                              <div id="" style="margin-bottom: 1%;"></div>

                                <div class="row">
                                         <!-- <div class="col-sm-2 col-md-3">
                                            <div class="form-group" disabled>
                                                <label for="lastname">Charge Type: <span class="text-danger">*</span></label>
                                                    <select class="form-control  select2"  disabled name="charge_type_id" id="charge_type_ida" onchange="getparticularsa(this.value);">
                                                        <option value="">Select Charge Type </option>
                                                        <?php //if($chargeslist){ foreach($chargeslist as $data){ ?>
                                                            <option value="<?php  //echo $data['charge_id']; ?>"><?php //echo  $data['name']; ?></option>
                                                     <?php //}} ?>
                                                    </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Select Particular: <span class="text-danger">*</span></label>
                                                    <select readonly class="form-control select2" name="particular" id="particulara" onchange="getparticularsdetailsa(this.value)">
                                                       
                                                    </select>
                                            </div>
                                         </div> -->

                                          <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Insurance Company Name:</label>
                                                    <select readonly class="form-control select2" name="insurance_company_id" id="insurance_company_ida">
                                                       <option value="">Select Insurance Company Name</option>
                                                 <?php if($insurancecompanys){ foreach($insurancecompanys as $data){ ?>
                                                            <option value="<?php  echo $data['insurance_company_id']; ?>"><?php echo  $data['name']; ?></option>
                                                     <?php }} ?>
                                                    </select>
                                            </div>
                                         </div>
                                          <div class="col-sm-2 col-md-3">
                                            <div class="form-group">
                                                <label  for="lastname">Select Doctor Name: <span class="text-danger">*</span></label>
                                                 <select readonly class="form-control select2" name="doctor_ida" id="doctor_ida">
                                                    <option value="">Select Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){ ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                         </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                            <div class="table-responsive">
                                                <?php 
                                                if($this->session->userdata('user_type')==4)
                                                {
                                                    $cls='class="receiptioncls"';
                                                }
                                                else
                                                {
                                                    $cls='';
                                                 }
                                                 ?>
                                         
                                                <table class="table table-striped table-hover" id="productdetailsa" bquotation="0">
                                                    <thead style="background:#e0e0e0;">
                                                    <tr>
                                                        <th>Remove</th>
                                                        <th>Particulars</th>
                                                        <th>Qty</th>
                                                        <th>Eye</th>
                                                        <th>Rate</th>
                                                        <th <?php echo $cls; ?>>Dis Amt</th>
                                                        <th <?php echo $cls; ?>>Dis Per</th>
                                                        <th>Total Amt</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname">Bill Amount: <span class="text-danger">*</span></label>
                                                       <input type="text" readonly name="billamount" id="billamounta" class="form-control">
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname">Previous Paid Amount: </label>
                                                    <input type="text" readonly  id="advancedamountab" class="form-control">
                                                    <input type="hidden" readonly name="adjustment_time_paid" value="<?php echo date('Y-m-d');?>" id="adjustment_time_paid" class="form-control">
                                             </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname">Advanced Amount: </label>
                                                    <input type="text" onkeyup="calcneta()" name="advancedamounta" id="advancedamounta" class="form-control">
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="lastname">Modeofpay: <span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="modeofpay_id" id="modeofpay_id">
                                                    <option value="">Select Modeofpay</option>
                                                   <?php if($modeofpays){
                                                    foreach($modeofpays as $data){
                                                        ?>
                                                        <option value="<?php echo $data['modeofpay_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php
                                                    }
                                                   } ?>
                                                </select>
                                             </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                    <label for="lastname"><b>Balance Remaining: </b></label>
                                                    <input type="text" name="net_amounta" id="net_amounta" class="form-control" readonly style="color: black;font-weight: bold;font-size: 19px;" value="0.00">
                                                    <input type="hidden" name="net_amountab" id="net_amountab" class="form-control" readonly style="color: black;font-weight: bold;font-size: 19px;" value="0.00">
                                             </div>
                                        </div>
                                    </div>
                                </div>
                               
                            

                               

                                <div class="card-footer ml-auto">
                                    
                                      <button id="update" style="display:none;" type="button" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedataval();">Update</button>
                                      <button id="updateAdjust" style="display:none;" type="button" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedatavaladjust();">Adjust Billing</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                            </form>
                                            </div>
                                            <?php
                                            if($this->session->userdata('user_type')==4)
                                            {
                                                $cls='class="receiptioncls"';
                                            }
                                            else
                                            {
                                                $cls='';
                                            }
                                            ?>

<!---advance adjumsnt ends here--->
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                                 <div class="card-body collapse show">
                                                    <div class="table-responsive">
                                                     <table id="tableid" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                        <thead>
                                                          <tr>
                                                             <th>Sl No</th>
                                                             <th>Paitent Name</th>
                                                             <th>Invoice No</th>
                                                             <th>Modeof Pay</th>
                                                             <th>Billing Amount</th>
                                                             <th>Advance Paid</th>
                                                             <th>Pending Amount</th>
                                                             <th>Print</th>
                                                          <th>Edit</th>
                                                             <th <?php echo $cls; ?>>Delete</th>
                                                          </tr>
                                                        </thead>
                                                         <tfoot>
                                                            <tr>
                                                                 <th>Sl No</th>
                                                                 <th>Paitent Name</th>
                                                                 <th>Invoice No</th>
                                                                 <th>Modeof Pay</th>
                                                                 <th>Billing Amount</th>
                                                             <th>Advance Paid</th>
                                                             <th>Pending Amount</th>
                                                                 <th>Print</th>
                                                                <th>Edit</th>
                                                                 <th <?php echo $cls; ?>>Delete</th>
                                                            </tr>
                                                        </tfoot>
                                                      </table>
                                                    </div>
                                                </div>
                                            </div>


                                           
                                            <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                                                 <div class="">
                                                    <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label>Advance Bill Details MRDNO-Name/Invoice Number</label>
                                                        <select class="form-control select2" name="advance_bill_det" id="advance_bill_det" onchange="getaddbill(this.value);">
                                                            <option value="">Advance Bill Details MRDNO-Name/Invoice Number</option>
                                                            <?php if($advancebilling)
                                                            {
                                                                foreach ($advancebilling as $databilling) {
                                                                  ?>
                                                                    <option value="<?php echo $databilling['billing_master_id']; ?>~<?php echo $databilling['patient_registration_id']; ?>"><?php echo $databilling['mrdno']; ?>-<?php echo $databilling['pateint_name']; ?>/<?php echo $databilling['invoice_number']; ?></option>
                                                                  <?php
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                       
                                                    <div class="col-md-12 form-group" id="bill_add_det"></div>

                                                    <div class="col-md-12 form-group" id="bill_invoice_det"></div>
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
             var table;
$( document ).ready(function() {
   table= $('#tableid').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?php echo base_url() ?>transaction/Billing/ajax_call',
          'columns': [
             { data: 'slno' },
             { data: 'pateint_name' },
             { data: 'invoice_number' },
             { data: 'mode' },
             { data: 'bill_amount' },
             { data: 'advanced_amount' },
             { data: 'pending' },
             { data: 'print' },
             { data: 'edit' },
             { data: 'delete' },
            
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );

   <?php if($pat_id>0){ ?>
    getpatientdetails(<?php echo $pat_id; ?>);
    $("#patient_registration_id").val(<?php echo $pat_id; ?>).trigger('change');
   <?php } ?>


   <?php if($pat_id>0){ ?>
    getpatientdetailsa(<?php echo $pat_id; ?>);
    $("#patient_registration_ida").val(<?php echo $pat_id; ?>).trigger('change');
   <?php } ?>

}); 

       cd = (new Date()).toISOString().split('T')[0];
    $('.bill_date').val(cd);
     timee="<?php Echo date('H:i'); ?>";
    $('.bill_time').val(timee);
function savedata()
{
     if($("#patient_title_id").val()=='' || $("#bill_date").val()=='' || $("#bill_time").val()=='' || $("#doctor_id").val()=='' ) {
           Swal.fire({title:"Info!",text:"Please Enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        if($('#billing_type').val()==1)
        {
            if($('#advancedamount').val()=='')
            {
                Swal.fire({title:"Info!",text:"Please Enter Advanced  Amount !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
                return false;
            }
        }
      
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/savedata',
            dataType: "json",
            data: $('#billing').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               printdata(data.sales_id);
              location.reload();
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

function editdata(val)
{
        if(val=='') {
           Swal.fire({title:"Info!",text:"Edit ID Not found",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $("#overlay").fadeIn(300);
        getselectedval(1);
        csrf=$('#csrf_test_name').val();
        getdata='<?php echo base_url() ?>transaction/Billing/getsavedata';
         $.ajax({
            type: "POST",
            url: getdata,
            dataType: "json",
            data: {getid: val,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg)
               {
                  $('#base-tab1').click(); 
                  $('#tab_tit').html('Edit Billing');
                  $("#insurance_company_id").val(data.msg[0]['insurance_company_id']).trigger("change");
                  $("#doctor_id").val(data.msg[0]['doctor_id']).trigger("change");
                  $('#bill_date').val(data.msg[0]['billing_date']);
                  $('#bill_time').val(data.msg[0]['billing_time']);
                  $('#billamount').val(data.msg[0]['bill_amount']);
                  $('#advancedamount').val(data.msg[0]['advanced_amount']);
                  $('#insuranceamt').val(data.msg[0]['insuranceamount']);
                  $('#modeofpay_id').val(data.msg[0]['modeofpay_id']).trigger("change");
                  $('#net_amount').val(data.msg[0]['grand_total']);
                  $('#productdetails').children('tbody').html(data.getchilddata);
                  $('#edit_billing_master_id').val(data.msg[0]['billing_master_id']);

                  $('#cash_billing').val(data.msg[0]['cash']);
                  $('#card_billing').val(data.msg[0]['card']);
                  $('#paytm_billing').val(data.msg[0]['paytm']);
                  $('#others_billing').val(data.msg[0]['others']);

                  $('#save').hide();
                  $('#update').show();
                  $("#patient_registration_id").val(data.msg[0]['patient_registration_id']).trigger("change");

               } 
              else if(data.error != '')
              {
                Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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


function updatedataval()
{
        if($("#edit_billing_master_id").val()=='') {
           Swal.fire({title:"Info!",text:"Please enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
         if($("#patient_registration_id").val()=='') {
           Swal.fire({title:"Info!",text:"Please select Patient !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/updatedata',
            dataType: "json",
            data: $('#billing').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               location.reload();
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
            url: '<?php echo base_url() ?>transaction/Billing/deletedata',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               table.draw();
               
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
    
function findFloatValue(id)
{
    var value=$("#"+id).val();
       value=parseFloat(value);
    if(isNaN(value))
    {
        return 0;
    }else{
        return value;
    }
 }
    function getparticularsdetails(val,package=0)
{
    if($('#patient_registration_id').val()=='')
 {
     Swal.fire({title:"Info!",text:"Please Search Patient !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
 }
    chargetype_id=$('#charge_type_id').val();
    if(val>0 && chargetype_id>0)
    {
        clsr='';
                <?php 
                   if($this->session->userdata('user_type')==4)
                    {
                        ?>
                        clsr='class="receiptioncls"';
                    <?php  }?>
           

         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/getparticularsdetails',
            dataType: "json",
            data: {chargetype_id:chargetype_id,getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                             var lenrow=0;
                              var rowLen =  $('#productdetails > tbody >tr').length;
                              var lenrow=rowLen+1;
                              var row_num=lenrow;
                               if(chargetype_id==1){
                                    id="opdcharge_id";
                                }
                                else if(chargetype_id==2){
                                    id="ipdcharge_id";
                                }
                                else if(chargetype_id==3){
                                   id="laser_id";
                                }
                                else if(chargetype_id==4){
                                    id="injection_id";
                                }
                                else if(chargetype_id==5){
                                    id="investigation_id";
                                }
                 var html='<tr>\n\
                  <td>\n\
                        <a href="#" onclick="$(this).parent().parent().remove();calcnet();checkgridcount();" class="input_column">\n\
                        <button class="btn btn-danger btnDelete btn-sm">\n\
                           <i class="la la-trash"></i>\n\
                        </button>\n\
                        </a>\n\
                     </td><td>'+data.msg[0]['name']+'</td>\n\
<td><input type="text" step="any" name="quantity[]" id="quantity_'+row_num+'" class="form-control grid_table"   onKeyUp="calcrow('+row_num+')"  onkeypress="return isFloat(event)" required  autocomplete="off"></td>\n\
<td><select  step="any" name="eye[]" id="eye_'+row_num+'" class="form-control grid_table"  autocomplete="off">\n\
<option value="0">Select</option>\n\
<option value="1">Left</option>\n\
<option value="2">Right</option>\n\
<option value="3">Both</option></select></td>\n\
<td><input type="text" step="any" name="rate[]" id="rate_'+row_num+'" class="form-control grid_table" value="'+data.msg[0]['amount']+'"  onKeyUp="calcrow('+row_num+')"    autocomplete="off"></td>\n\
<td '+clsr+'><input type="text" step="any" name="disamt[]" id="disamt_'+row_num+'" class="form-control grid_table" value=""  onKeyUp="calcrow('+row_num+')"   onkeypress="return isFloat(event)" required  autocomplete="off"></td>\n\
<td '+clsr+'><input type="text" step="any" name="disper[]" id="disper_'+row_num+'" class="form-control grid_table" value=""  onKeyUp="calcrow('+row_num+')"   onkeypress="return isFloat(event)" required  autocomplete="off"></td>\n\
  <td>\n\
  <input type="text" name="amount[]" id="amount_'+row_num+'" class="form-control grid_table" value="0" readonly="">\n\
  <input type="hidden" id="calrow_id_'+row_num+'" name="calrow_id[]" value="'+lenrow+'" >\n\
  <input type="hidden" id="particularsid_'+row_num+'" name="particularsid[]" value="'+data.msg[0][id]+'" >\n\
  <input type="hidden" id="packageid_'+row_num+'" name="packageid[]" value="'+package+'" >\n\
   <input type="hidden" name="chargesid[]" id="chargesid_'+row_num+'" class="form-control grid_table" value="'+chargetype_id+'" readonly="">\n\
                   </td>\n\
                     </tr>';
                    $('#productdetails').children('tbody').append(html);
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


function getparticulars(val)
{
 if($('#patient_registration_id').val()=='')
 {
     Swal.fire({title:"Info!",text:"Please Search Patient !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
 }
    if(val>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getparticulars',
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
function selectpackage(sel)
{
     if (sel > 0) {
            $("#charge_type_id").val(2).trigger("change");
            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: 'Billing/Get_Package_List_particulars',
                dataType: "json",
                data: {
                    sel: sel,
                    csrf_test_name: $('#csrf_test_name').val()
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {
                        medtem = data.msg;
                        var array = medtem.split(",");
                        $.each(array, function(i) {
                            if (array[i] > 0) {
                               getparticularsdetails(array[i],sel);
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
//     function getselectedval(val)

// {
//     // $("#overlay").fadeIn(300);
//     //  $.ajax({
//     //         type: "POST",
//     //         url: '<?php echo base_url() ?>master/Common_controller/getsearchval',
//     //         dataType: "json",
//     //         data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
//     //         success: function(data){
//     //             $("#overlay").fadeOut(300);
//     //            if(data.msg != ''){
//     //             $('#patient_registration_id').html(data.msg);
//     //           } else if(data.error != ''){
//     //             Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//     //           } else if(data.error_message) 
//     //           {
//     //             var error = data.error_message;
//     //             var err_str = '';
//     //             for (var key in error) {
//     //               err_str += error[key] +'\n';
//     //             }
//     //             Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//     //           }
                
//     //         },
//     //         error: function (error) {
//     //             Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//     //             $("#overlay").fadeOut(300);  
//     //         }
//     //     });
// }

function getpatientdetails(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getpatientdetails',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#last_appointmentdetails').html(data.msg);
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
function findIntValue(id)
{
    
    var value=$("#"+id).val();
       value=parseInt(value);
    if(isNaN(value))
    {
        return 0;
    }else{
        return value;
    }
 }
function calcrow(eid)
{
   //alert(eid);
   var quantity=findFloatValue('quantity_'+eid);
   var selling_price=findFloatValue('rate_'+eid);
   var price=quantity*selling_price;
  
   
    if($('#disper_'+eid).val()>0){
      $('#disamt_'+eid).val("0");
      var discount_percentage= findIntValue('disper_'+eid);
      var discount_amount=price*discount_percentage/100;
       $('#disamt_'+eid).val(discount_amount);
   }
   

   var price_reduced_discount=price-findFloatValue('disamt_'+eid);
    $('#amount_'+eid).val(price_reduced_discount.toFixed(2));
   calcnet();
   
}




function calcnet()
  { 
     
      var total_amount=0;
     
      
    $('input[name="calrow_id[]"]').each(function(){
        var product_id=$(this).val();
        total_amount+=findFloatValue('amount_'+product_id);
    });
  
    $('#billamount').val(total_amount.toFixed(2));
    var insuranceamt=$("#insuranceamt").val();
    var other_charge=$("#advancedamount").val();
    var net_amount=total_amount-other_charge-insuranceamt;
    //alert(net_amount);
    //alert(net_amount);
    $('#net_amount').val(net_amount);
   
}


function calcrowa(eid)
{
   
   var quantity=findFloatValue('quantity_'+eid);
   var selling_price=findFloatValue('rate_'+eid);
   var price=quantity*selling_price;
  
   
    if($('#disper_'+eid).val()>0){
      $('#disamt_'+eid).val("0");
      var discount_percentage= findIntValue('disper_'+eid);
      var discount_amount=price*discount_percentage/100;
       $('#disamt_'+eid).val(discount_amount);
   }
   

   var price_reduced_discount=price-findFloatValue('disamt_'+eid);
    $('#amount_'+eid).val(price_reduced_discount.toFixed(2));
   calcneta();
   
}

function calcneta()
  { 
     
      var total_amount=0;
     
      
    $('input[name="calrow_id[]"]').each(function(){
        var product_id=$(this).val();
        total_amount+=findFloatValue('amount_'+product_id);
    });
  
    $('#billamount').val(total_amount.toFixed(2));

    var net=$("#net_amountab").val()
    var bl=$("#advancedamounta").val();
    var net_amount=net-bl;
    //alert(net_amount);
    //alert(net_amount);
    $('#net_amounta').val(net_amount);
   
}

 function printdata(billing_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>transaction/Billing/print_billing/"><input name="billing_id" value="'+billing_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }






          </script>


<!---adjustment billing--->
<script>
function getparticularsa(val)
{
 if($('#patient_registration_id').val()=='')
 {
     Swal.fire({title:"Info!",text:"Please Search Patient !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
 }
    if(val>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getparticulars',
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
    function getselectedvala(val)

{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getsearchvaldata',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#patient_registration_ida').html(data.msg);
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

function getpatientdetailsa(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getpatientdetails',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#last_appointmentdetailsa').html(data.msg);
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




function updatedatavaladjust()

{

  var datavals=$("#patient_registration_ida").val();
  //falert(datavals);
        if($("#edit_billing_master_ida").val()=='') {
           Swal.fire({title:"Info!",text:"Please enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }

        var patientid=$("#patientidAdjust").val();
        //alert(patientid);
         if(patientid=='') {
           Swal.fire({title:"Info!",text:"Please select Patient !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }

        //return false;
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/updatedataadjust',
            dataType: "json",
            data: $('#billingdata').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               location.reload();
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


function editdataAdjust(val)
{

 
$('.saverq').hide();
        if(val=='') {
           Swal.fire({title:"Info!",text:"Edit ID Not found",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $("#overlay").fadeIn(300);
        getselectedval(1);
        csrf=$('#csrf_test_name').val();
        getdata='<?php echo base_url() ?>transaction/Billing/getsavedataAdjust';
         $.ajax({
            type: "POST",
            url: getdata,
            dataType: "json",
            data: {getid: val,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg)
               {
                  $('#base-tab11').click(); 
                  $('#tab_tit11').html('Billing Adjustment');
                  $("#insurance_company_ida").val(data.msg[0]['insurance_company_id']).trigger("change");
                  $("#doctor_ida").val(data.msg[0]['doctor_id']).trigger("change");
                  $('#bill_datea').val(data.msg[0]['billing_date']);
                  $('#bill_timea').val(data.msg[0]['billing_time']);
                  $('#billamounta').val(data.msg[0]['bill_amount']);
                  $('#advancedamountab').val(data.msg[0]['advanced_amount']);
                  $('#advancedamounta').val("");
                  $('#modeofpay_ida').val(data.msg[0]['modeofpay_id']).trigger("change");
                  $('#net_amounta').val(data.msg[0]['grand_total']);
                  $('#net_amountab').val(data.msg[0]['grand_total']);
                  $('#productdetailsa').children('tbody').html(data.getchilddata);
                  $('#edit_billing_master_ida').val(data.msg[0]['billing_master_id']);
                  $('#last_appointmentdetailsa').html(data.msg);
              
                  $('#patientidAdjust').val(data.msg[0]['patient_registration_id']);
                  getpatientdetailsa(data.msg[0]['patient_registration_id']);
                  $('#updateAdjust').show();
                  $("#patient_registration_id").val(data.msg[0]['patient_registration_id']).trigger("change");

               } 
              else if(data.error != '')
              {
                Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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


        function getparticularsdetailsa(val)
{
    if($('#patient_registration_id').val()=='')
 {
     Swal.fire({title:"Info!",text:"Please Search Patient !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
 }
    chargetype_id=$('#charge_type_id').val();
    if(val>0 && chargetype_id>0)
    {
        clsr='';
                <?php 
                   if($this->session->userdata('user_type')==4)
                    {
                        ?>
                        clsr='class="receiptioncls"';
                    <?php  }?>
           

         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/getparticularsdetails',
            dataType: "json",
            data: {chargetype_id:chargetype_id,getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                             var lenrow=0;
                              var rowLen =  $('#productdetailsa > tbody >tr').length;
                              var lenrow=rowLen+1;
                              var row_num=lenrow;
                               if(chargetype_id==1){
                                    id="opdcharge_id";
                                }
                                else if(chargetype_id==2){
                                    id="ipdcharge_id";
                                }
                                else if(chargetype_id==3){
                                   id="laser_id";
                                }
                                else if(chargetype_id==4){
                                    id="injection_id";
                                }
                                else if(chargetype_id==5){
                                    id="investigation_id";
                                }
                 var html='<tr>\n\
                  <td>\n\
                        <a href="#" onclick="$(this).parent().parent().remove();calcneta();checkgridcount();" class="input_column">\n\
                        <button class="btn btn-danger btnDelete btn-sm">\n\
                           <i class="la la-trash"></i>\n\
                        </button>\n\
                        </a>\n\
                     </td><td>'+data.msg[0]['name']+'</td>\n\
<td><input type="text" step="any" name="quantity[]" id="quantity_'+row_num+'" class="form-control grid_table"   onKeyUp="calcrowa('+row_num+')"  onkeypress="return isFloat(event)" required  autocomplete="off"></td>\n\
<td><select  step="any" name="eye[]" id="eye_'+row_num+'" class="form-control grid_table"  autocomplete="off">\n\
<option value="0">Select</option>\n\
<option value="1">Left</option>\n\
<option value="2">Right</option>\n\
<option value="3">Both</option></select></td>\n\
<td><input type="text" step="any" name="rate[]" id="rate_'+row_num+'" class="form-control grid_table" value="'+data.msg[0]['amount']+'"  onKeyUp="calcrowa('+row_num+')"    autocomplete="off"></td>\n\
 <td>\n\
  <input type="text" name="amount[]" id="amount_'+row_num+'" class="form-control grid_table" value="0" readonly="">\n\
  <input type="hidden" id="calrow_id_'+row_num+'" name="calrow_id[]" value="'+lenrow+'" >\n\
  <input type="hidden" id="particularsida_'+row_num+'" name="particularsida[]" value="'+data.msg[0][id]+'" >\n\
   <input type="hidden" name="chargesid[]" id="chargesid_'+row_num+'" class="form-control grid_table" value="'+chargetype_id+'" readonly="">\n\
                   </td>\n\
                     </tr>';
                    $('#productdetails').children('tbody').append(html);
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
        
        
}
function getpatientdetails_addbilldet(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getpatientdetails',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#bill_add_det').html(data.msg);
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
function getaddbill(billdetails)
{
    var array = billdetails.split("~");
    if(array[1]>0)
    {
        getpatientdetails_addbilldet(array[1]);
        getbillinvoicedetails(array[0]);
    }
   
}
function getbillinvoicedetails(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/getbillinvoicedetails',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#bill_invoice_det').html(data.getinvicedetails);
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
function payamount()
{
     if($('#bill_m_id').val()=='') {
           Swal.fire({title:"Info!",text:"Billing ID Not Found !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
      
          Swal.fire({title:"Are you sure to Pay Amount?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Confirm it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
                        
       
      
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Billing/payamount',
            dataType: "json",
             data: {bill_m_id:$('#bill_m_id').val(),st_dis_amt:$('#st_dis_amt').val(),st_paydue:$('#st_paydue').val(),pay_mode:$('#pay_mode').val(),gran:$('#gran').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               //printsale(data.sales_id);
               location.reload();
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
    </script>
