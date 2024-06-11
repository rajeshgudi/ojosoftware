<?php 
$path=base_url('template1/modern-admin/');
$conred='readonly';
 if($this->session->userdata('user_type')==1)
{
    $conred='';
}
?>      
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                     <h4 class="card-title">Camp Billing Report</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Camp Billing Report</a>
                                            </li>
                                           
                                            
                                        </ul>
                   <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                             <form id="summary" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row">
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Type </label>
                                            <select class="form-control select2" name="type" id="type">
                                               <option value="1" <?= ($type == 1) ? 'selected' : '' ?>>Summary</option>
                                                <option value="2" <?= ($type == 2) ? 'selected' : '' ?>>Detailed</option>
                                            </select>
                                        </div>
                                    </div>
                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">From Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_fromdate" <?php echo $conred; ?> id="sum_fromdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">To Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_todate" <?php echo $conred; ?> id="sum_todate" class="form-control">
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Patient Name: </label>
                                         <select style="width:100%;" class="form-control form-control-xl input-xl select2" name="patient_id" id="patient_id">
                                                                   <option value="">Select Patient MRD/Name/MobileNo</option>
                                                                  <?php
                                                                  if($mrdnos)
                                                                  {
                                                                    foreach($mrdnos as $daramrd)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $daramrd['camp_deh_id'] ?>"><?php echo $daramrd['mrdno'] ?>/<?php echo $daramrd['namecamp'] ?>/<?php echo $daramrd['mobileno'] ?></option>
                                                                        <?php
                                                                    }
                                                                  }
                                                                  ?>
                                                               </select>

                                                
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Doctor Name: </label>
                                            <select class="form-control select2" name="doctor_id" id="doctor_id">
                                                <option value>Select Doctor</option>
                                                <?php if($getdoctor)
                                                {
                                                  foreach ($getdoctor as $data) {
                                                    ?>
                                                      <option value="<?php print $data['doctors_registration_id']; ?>"><?php print $data['name']; ?></option>
                                                    <?php
                                                  }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
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
                                                    <select class="form-control select2" name="particular" id="particular" >
                                                       
                                                    </select>
                                            </div>
                                         </div>
                                         <div class="col-sm-2 col-md-3">
                                          <div class="form-group">
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
                                             </div></div>

                                             <div class="col-sm-2 col-md-3" style="display: none;">
                                                <div class="form-group">
                                                    <label for="lastname">Patient type: </label>
                                                    <select class="form-control" name="pat_type" id="pat_type">
                                                    <option value="">select type</option>
                                                        <option value="1">Walk-In</option>
                                                        <option value="2">Telephone</option>
                                                        <option value="3">VIP</option>
                                                         <option value="4">Camp</option>
                                                    </select>
                                                </div>
                                             </div>
                                    
                                </div>
                              

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="summary_detailed();">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="form-group">
                                        <div class="table-responsive" id="showdata_sum">
                                        </div>
                                     </div>
                                 </div>
                                  </div>
                               
                           

                                 

                               
                            </form>
                       </div>
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                        
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
  $( document ).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
    $('#sum_fromdate').val(cd);
    $('#sum_todate').val(cd);
    $('#det_fromdate').val(cd);
    $('#det_todate').val(cd);
});
 var table;
function summary_detailed()
{
  var type = $('#type').val();
  if(type==1)
  {
    getsummary();
  }
  else{
    getdetailed();
  }
}

function getsummary()
    { 
        if($("#sum_fromdate").val()=='' || $("#sum_todate").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Camp_billing_report/getsummary";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum').html(data.getdata);
                var table = $('#example_sum').DataTable( {
       
        buttons: [ 'excel' ],
       
        dom: 'Blfrtip',
        columnDefs: [ {
               
                lengthMenu: [[10, 25, 50, 100,1000, -1], [10, 25, 50, 100,1000, "All"]]
        }]
    } );
                
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
function getdetailed()
    { 
        if($("#sum_fromdate").val()=='' || $("#sum_todate").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Camp_billing_report/getdetailed";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum').html(data.getdata);
                 $('#example_det').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5',
                        'pdfHtml5'
                    ]
                } );
                
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

   $(document).ready(function () {   
    $('body').on('change','#det_category', function() {
         cat=$('#det_category').val();
         if(cat>0)
         {
            if(cat==2)
            {
              $('#det_itemm').show();
              $('#det_lenss').hide();
            }
            else if(cat==1)
            {
              $('#det_itemm').hide();
              $('#det_lenss').show();
            }
            else
            {
              $('#det_itemm').show();
              $('#det_lenss').hide();
            }
         }
    });
});  
function getparticulars(val)
{
 
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
          </script>
