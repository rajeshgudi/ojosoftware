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
                                     <h4 class="card-title">Patient Appointment Report</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Patient Appointment Report</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="true">Appointment Report</a>
                                            </li>
                                     <li class="nav-item">
                                        <a class="nav-link " id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="true">New Appointment Report</a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link " id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="true">Followup  Appointment Report</a>
                                    </li>
                                           
                                            
                                        </ul>
                   <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                             <form id="summary" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row">
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
                                              <select style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_id" id="patient_id" >
                                                <option value>Select Patient Name</option>
                                              
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

                                    <div class="col-sm-1 col-md-3">
                                                    <div class="form-group">
                                                        <label for="lastname">Area: </label>
                                                        <select class="form-control select2" name="area_id1" id="area_id1">
                                                            <option value="">Select Area</option>
                                                            <?php if($area){foreach($area as $data){ ?>
                                                                    <option value="<?php echo $data['area_id']; ?>"><?php echo $data['name']; ?>-<?php echo $data['pincode']; ?></option>
                                                               <?php } } ?>
                                                        </select>
                                                    </div>
                                                 </div>

                                                         <div class="col-sm-1 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Source: </label>
                                                <select class="form-control select2" name="source" id="source">
                                                    <option value="">Select Sources</option>
                                                        <?php if($sources){foreach($sources as $data){ ?>
                                                            <option value="<?php echo $data['source_id']; ?>"><?php echo $data['name']; ?></option>
                                                       <?php } } ?>
                                                </select>
                                            </div>
                                         </div>
                                </div>
                              

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="getsummary();">Submit</button>
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
                                                      <form id="summary1" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row">
                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">From Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_fromdate1" <?php echo $conred; ?> id="sum_fromdate1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">To Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_todate1" <?php echo $conred; ?> id="sum_todate1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 col-md-3">
                                                    <div class="form-group">
                                                        <label for="lastname">Area: </label>
                                                        <select class="form-control select2" name="area_id2" id="area_id2">
                                                            <option value="">Select Area</option>
                                                            <?php if($area){foreach($area as $data){ ?>
                                                                    <option value="<?php echo $data['area_id']; ?>"><?php echo $data['name']; ?>-<?php echo $data['pincode']; ?></option>
                                                               <?php } } ?>
                                                        </select>
                                                    </div>
                                                 </div>

                                                       <div class="col-sm-1 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Source: </label>
                                                <select class="form-control select2" name="source" id="source1">
                                                    <option value="">Select Sources</option>
                                                        <?php if($sources){foreach($sources as $data){ ?>
                                                            <option value="<?php echo $data['source_id']; ?>"><?php echo $data['name']; ?></option>
                                                       <?php } } ?>
                                                </select>
                                            </div>
                                         </div>
                                    
                                </div>
                              

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="getsummary1();">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="form-group">
                                        <div class="table-responsive" id="showdata_sum1">
                                        </div>
                                     </div>
                                 </div>
                                  </div>
                               
                           

                                 

                               
                            </form>
                                            </div>


                                               <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                                      <form id="summary_new" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row">
                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">From Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_fromdate_new"  id="sum_fromdate_new" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">To Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_todate_new"  id="sum_todate_new" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 col-md-3">
                                                    <div class="form-group">
                                                        <label for="lastname">Area: </label>
                                                        <select class="form-control select2" name="area_id_new" id="area_id_new">
                                                            <option value="">Select Area</option>
                                                            <?php if($area){foreach($area as $data){ ?>
                                                                    <option value="<?php echo $data['area_id']; ?>"><?php echo $data['name']; ?>-<?php echo $data['pincode']; ?></option>
                                                               <?php } } ?>
                                                        </select>
                                                    </div>
                                                 </div>

                                                       <div class="col-sm-1 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Source: </label>
                                                <select class="form-control select2" name="source_new" id="source_new">
                                                    <option value="">Select Sources</option>
                                                        <?php if($sources){foreach($sources as $data){ ?>
                                                            <option value="<?php echo $data['source_id']; ?>"><?php echo $data['name']; ?></option>
                                                       <?php } } ?>
                                                </select>
                                            </div>
                                         </div>
                                    
                                </div>
                              

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="getsummary_new();">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="form-group">
                                        <div class="table-responsive" id="showdata_sum_new">
                                        </div>
                                     </div>
                                 </div>
                                  </div>
                               
                           

                                 

                               
                            </form>
                                            </div>


                                              <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                                                      <form id="summary_fol" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row">
                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">From Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_fromdate_fol"  id="sum_fromdate_fol" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">To Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_todate_fol"  id="sum_todate_fol" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 col-md-3">
                                                    <div class="form-group">
                                                        <label for="lastname">Area: </label>
                                                        <select class="form-control select2" name="area_id_fol" id="area_id_fol">
                                                            <option value="">Select Area</option>
                                                            <?php if($area){foreach($area as $data){ ?>
                                                                    <option value="<?php echo $data['area_id']; ?>"><?php echo $data['name']; ?>-<?php echo $data['pincode']; ?></option>
                                                               <?php } } ?>
                                                        </select>
                                                    </div>
                                                 </div>

                                                       <div class="col-sm-1 col-md-3">
                                            <div class="form-group">
                                                <label for="lastname">Source: </label>
                                                <select class="form-control select2" name="source_fol" id="source_fol">
                                                    <option value="">Select Sources</option>
                                                        <?php if($sources){foreach($sources as $data){ ?>
                                                            <option value="<?php echo $data['source_id']; ?>"><?php echo $data['name']; ?></option>
                                                       <?php } } ?>
                                                </select>
                                            </div>
                                         </div>
                                    
                                </div>
                              

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="getsummary_fol();">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="form-group">
                                        <div class="table-responsive" id="showdata_sum_fol">
                                        </div>
                                     </div>
                                 </div>
                                  </div>
                               
                           

                                 

                               
                            </form>
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
    $('#sum_fromdate1').val(cd);
    $('#sum_todate1').val(cd);
    $('#sum_fromdate_new').val(cd);
    $('#sum_todate_new').val(cd);
    $('#sum_fromdate_fol').val(cd);
    $('#sum_todate_fol').val(cd);
    $('#det_fromdate').val(cd);
    $('#det_todate').val(cd);
});
 var table;


function getsummary()
    { 
        if($("#sum_fromdate").val()=='' || $("#sum_todate").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Patient_appointment_report/getsummary";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum').html(data.getdata);
                 $('#example_sum').DataTable( {
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
var table;
function getsummary1()
    { 
        if($("#sum_fromdate1").val()=='' || $("#sum_todate1").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum1').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Patient_appointment_report/getsummary1";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary1').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum1').html(data.getdata);
                 var table = $('#example_sum1').DataTable( {
       
        buttons: [ 'excel' ],
       
        dom: 'Blfrtip',
        columnDefs: [ {
               
                lengthMenu: [[1000, -1], [1000, "All"]]
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
var table1;
function getsummary_new()
    { 
        if($("#sum_fromdate_new").val()=='' || $("#sum_todate_new").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum_new').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Patient_appointment_report/getsummary_new";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary_new').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum_new').html(data.getdata);
                 var table1 = $('#example_sum_new').DataTable( {
       
        buttons: [ 'excel' ],
       
        dom: 'Blfrtip',
        columnDefs: [ {
               
                lengthMenu: [[1000, -1], [1000, "All"]]
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
var table2;
function getsummary_fol()
    { 
        if($("#sum_fromdate_fol").val()=='' || $("#sum_todate_fol").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum_new').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Patient_appointment_report/getsummary_fol";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary_fol').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum_fol').html(data.getdata);
                 var table2 = $('#example_sum_fol').DataTable( {
       
        buttons: [ 'excel' ],
       
        dom: 'Blfrtip',
        columnDefs: [ {
               
                lengthMenu: [[1000, -1], [1000, "All"]]
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
        if($("#det_fromdate").val()=='' || $("#det_todate").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_det').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Sales_report/getdetailed";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#detailed').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_det').html(data.getdata);
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
          </script>
