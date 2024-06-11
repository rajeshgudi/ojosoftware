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
                                    <h4 class="card-title">Receipt And Advance</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true"><l id="tab_tit">Add Receipt<l></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View/Edit/Delete</a>
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
                                                               <select class="form-control select2" name="patient_registration_id" id="patient_registration_id" onchange="getpatientdetails(this.value);">
                                                                   <option value="">Select Patient MRD NOS</option>
                                                                   <?php if($mrdnos){ foreach($mrdnos as $data){ ?>
                                <option value="<?php  echo $data['patient_registration_id']; ?>"><?php echo  $data['mrdno']; ?></option>
                                                                    <?php }} ?>
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
                                                    <label for="lastname"><b>Remaining Balance: </b></label>
                                                    <input type="text" name="net_amount" id="net_amount" class="form-control" readonly style="color: black;font-weight: bold;font-size: 19px;" value="0.00">
                                             </div>
                                        </div>
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
                                                             <th>Amount Paid</th>
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
                                                                 <th>Amount Paid</th>
                                                                 <th>Grand Total</th>
                                                                 <th>Print</th>
                                                                 <th>Edit</th>
                                                                 <th <?php echo $cls; ?>>Delete</th>
                                                            </tr>
                                                        </tfoot>
                                                      </table>
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
          'ajax':'<?php echo base_url() ?>transaction/Receipt/ajax_call',
          'columns': [
             { data: 'slno' },
             { data: 'pateint_name' },
             { data: 'invoice_number' },
             { data: 'mode' },
             { data: 'advanced_amount' },
             { data: 'grand_total' },
             { data: 'print' },
             { data: 'edit' },
             { data: 'delete' }
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
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>transaction/Receipt/savedata',
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
        getdata='<?php echo base_url() ?>transaction/Receipt/getsavedata';
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
                  $('#tab_tit').html('Edit Receipt');
                  $("#insurance_company_id").val(data.msg[0]['insurance_company_id']).trigger("change");
                  $("#doctor_id").val(data.msg[0]['doctor_id']).trigger("change");
                  $('#bill_date').val(data.msg[0]['billing_date']);
                  $('#bill_time').val(data.msg[0]['billing_time']);
                  $('#billamount').val(data.msg[0]['bill_amount']);
                  $('#advancedamount').val(data.msg[0]['advanced_amount']);
                  $('#modeofpay_id').val(data.msg[0]['modeofpay_id']).trigger("change");
                  $('#net_amount').val(data.msg[0]['grand_total']);
                  $('#productdetails').children('tbody').html(data.getchilddata);
                  $('#edit_billing_master_id').val(data.msg[0]['billing_master_id']);
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
            url: '<?php echo base_url() ?>transaction/Receipt/updatedata',
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
            url: '<?php echo base_url() ?>transaction/Receipt/deletedata',
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
    function getparticularsdetails(val)
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
            url: '<?php echo base_url() ?>transaction/Receipt/getparticularsdetails',
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
<td>\n\
  <input type="text" name="amount[]" id="amount_'+row_num+'" class="form-control grid_table" value="0" readonly="">\n\
  <input type="hidden" id="calrow_id_'+row_num+'" name="calrow_id[]" value="'+lenrow+'" >\n\
  <input type="hidden" id="particularsid_'+row_num+'" name="particularsid[]" value="'+data.msg[0][id]+'" >\n\
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
    function getselectedval(val)

{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/Common_controller/getsearchval',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#patient_registration_id').html(data.msg);
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
    var other_charge=$("#advancedamount").val();
    var net_amount=total_amount-other_charge;
    //alert(net_amount);
    $('#net_amount').val(net_amount);
   
}

 function printdata(billing_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>transaction/Receipt/print_billing/"><input name="billing_id" value="'+billing_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
          </script>
