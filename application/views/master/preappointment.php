<?php 
$path=base_url('template1/modern-admin/');
?>      
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                <h4 class="card-title">Appointment</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Add Appointments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View/Delete</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                            <form id="preoperative_form" method="post">
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Type</label>
                                        <select class="form-control" name="chargeid" id="chargeid" onchange="changetype(this.value)">
                                            <option value="2">Surgery</option>
                                            <option value="3">Laser</option>
                                            <option value="4">Injection</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label>Patient Name</label>
                                                 <select class="form-control select2" name="patient_registration_id" id="patient_registration_id">
                                                                   <option value="">Select Patient MRD NOS</option>
                                                                   <?php if($mrdnos){ foreach($mrdnos as $data){ ?>
                                <option value="<?php  echo $data['patient_registration_id']; ?>"><?php echo  $data['pname']; ?>/<?php echo  $data['mrdno']; ?></option>
                                                                    <?php }} ?>
                                                               </select>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <label>Preferred Phone</label>
                                                    <input type="text"  class="form-control" name="preprefered_phone" id="preprefered_phone">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Alternate Phone</label>
                                                    <input type="text" class="form-control" name="alternate_phone" id="alternate_phone">
                                                </div>
                                               
                                          </div>
                                          <div class="row form-group">
                                           <div class="col-md-3">
                                                    <label>EYE </label>
                                                    <select class="form-control" name="eye_operate" id="eye_operate">
                                                      <option value="1">Left</option>
                                                      <option value="2">Right</option>
                                                      <option value="3">Both</option>
                                                    </select>
                                                </div>
                                              <div class="col-md-3">
                                                <label>Type Of <t class="typeof">Surgery</t></label>
                                                <select class="form-control select2" name="surgery_type" id="surgery_type" onchange="getdataval(this.value)">
                                                  <option value="">Select  Type</option>
                                                  <?php
                                                    if($departments)
                                                    {
                                                      $opt='';
                                                      foreach($departments as $data)
                                                      {
                                                        $opt.='<option value="'.$data['department_id'].'">'.$data['name'].'</option>';
                                                      }
                                                    }
                                                    echo $opt;
                                                    ?>
                                                </select>
                                              </div>
                                              <div class="col-md-6">
                                                <label>Particulars</label>
                                                <select class="form-control select2" name="particular_type" id="particular_type" style="width:100%;">
                                                  <option value="">select Particulars</option>
                                                 
                                                </select>
                                              </div>
                                             
                                          </div>
                                          <div class="row form-group">
                                          <div class="col-md-3">
                                                <label>Appointment Date</label>
                                                <input type="date" class="form-control treatmentplan_date" name="admission_date" id="admission_date">
                                              </div>
                                          <div class="col-md-3 surcls">
                                                <label>Room No</label>
                                                <input type="text" class="form-control" name="room_no" id="room_no">
                                              </div>
                                           <div class="col-md-3 surcls">
                                                <label>Table No</label>
                                                <input type="text" class="form-control" name="table_no" id="table_no">
                                              </div>
                                           
                                            <div class="col-md-3">
                                              <label>Insurance Name</label>
                                              <select class="form-control select2" id="pre_insurancename" name="pre_insurancename">
                                                <?php 
                                               $is='';
                                                 if($insurancecompanys)
                                              {
                                                $is='';
                                                foreach($insurancecompanys as $data)
                                                {
                                                  $is.='<option value="'.$data['insurance_company_id'].'">'.$data['name'].'</option>';
                                                }
                                              }
                                              echo $is;
                                             ?>
                                              </select>
                                            </div>

                                             <div class="col-md-4">
                                             <div class="form-group">
                                                <label>UHID Number</label>
                                                <input type="text" class="form-control" name="uhids" id="uhids">
                                             </div>
                                          </div>

                                          <div class="col-md-4">
                                              <label>Corporate Name</label>
                                              <input type="text" class="form-control" name="conames" id="conames">
                                          </div>

                                          <div class="col-md-4 form-group">
                                              <label>Co-operative Society</label>
                                              <input type="text" class="form-control" name="societys" id="societys">
                                          </div>
                                          <div class="col-md-4">
                                              <label>TPA Name</label>
                                              <input type="text" class="form-control" name="tpanames" id="tpanames">
                                          </div>
                                          <div class="col-md-4">
                                              <label>Receipt Number</label>
                                              <input type="text" class="form-control" name="receiptnos" id="receiptnos">
                                          </div>
                                           
                                          </div>
                                          <div class="row form-group" >
                                           <div class="col-md-3 surcls">
                                                <label>IOL Power</label>
                                                <input type="text" class="form-control" name="iol_power" id="iol_power">
                                            </div>
                                            <div class="col-md-3 surcls">
                                              <label>IOL Lens</label>
                                              <input type="text" class="form-control" name="iol_lens" id="iol_lens">
                                            </div>
                                            <div class="col-md-3 surcls">
                                              <label>Operating Surgeon</label>
                                              <select class="form-control select2" name="ope_surgeon" id="ope_surgeon">
                                                  <option value="">Operating Surgeon</option>
                                                   <?php
                                                   $usd='';
                                                   if($surgeon)
                                                  {
                                                    
                                                    foreach($surgeon as $data)
                                                    {
                                                      $usd.='<option value="'.$data['doctors_registration_id'].'">'.$data['name'].'</option>';
                                                    }
                                                  }
                                                  echo $usd;
                                                  ?>
                                              </select>
                                            </div>
                                            <div class="col-md-3">
                                              <label>Type Of Anesthesia</label>
                                               <select class="form-control select2" name="typeof_anthesia" id="typeof_anthesia">
                                                  <option value="">Select Anesthesia</option>
                                                   <?php
                                                   $ussd='';
                                                   if($anthes)
                                                      {
                                                        
                                                        foreach($anthes as $data)
                                                        {
                                                          $ussd.='<option value="'.$data['doctors_registration_id'].'">'.$data['name'].'</option>';
                                                        }
                                                      }
                                                      echo $ussd;
                                                   ?>
                                              </select>
                                            </div>
                                             <div class="col-md-3" style="display:none;">
                                              <label>Ad. From Time</label>
                                              <input type="time"  class="form-control" name="from_time" id="from_time">
                                            </div>
                                            <div class="col-md-3" style="display:none;">
                                              <label>Ad. To Time</label>
                                              <input type="time"  class="form-control" name="to_time" id="to_time">
                                              <input type="hidden" name="pretreamentplan_id" value="0">
                                            </div>
                                          </div>
                               
                              

                                 

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="submitpreop();">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                            </form>
                                            </div>
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                                 <div class="card-body collapse show">
                                                     <form id="app_form" method="post">
                                                        <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                             <div class="row">
                                                              <div class="col-md-3">
                                                                  <select class="form-control" name="getid" id="getid" style="height: 43px;">
                                                                      <option value="2">Surgery</option>
                                                                      <option value="3">Laser</option>
                                                                      <option value="4">Injection</option>
                                                                      <option value="5">Investigation</option>
                                                                  </select>
                                                              </div>
                                                                <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="ser_date" id="ser_date" class="form-control search_date">
                                                                </div>
                                                             
                                                                <div class="col-md-2">
                                                                    <button onclick="getallapp()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                                                </div>
                                                                 
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12" id="div_data">
                                                                        
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
                    </div>
                </section>
                <!-- Justified With Top Border end -->
            </div>

          <script type="text/javascript">
                      $(document ).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
        $('.search_date').val(cd);
    });
 function getallapp()
{
    val=$('#getid').val();
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Preoperative_appointment/getallapp',
            dataType: "json",
            data:$('#app_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#div_data').html(data.msg);
                 $('#app_datatable').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                         
                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
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

function changetype(val)
{
    if(val>0)
    {
        if(val==2)
        {
            $('.typeof').html('Surgery');
            $('.surcls').show();
        }
        else if(val==3)
        {
            $('.typeof').html('Laser');
            $('.surcls').hide();
        }
        else if(val==4)
        {
            $('.typeof').html('Injection');
            $('.surcls').hide();
        }
    }
}
function submitpreop()
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/savepreop',
            dataType: "json",
            data:$('#preoperative_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                Swal.fire({title:"success",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                $('#preopform').val(1);
                $('#savep').click();
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
function getdataval(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/getdataval',
            dataType: "json",
            data: {csrf_test_name:$('#csrf_test_name').val(),surgery_id:val,chargeid:$('#chargeid').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#particular_type').html(data.msg);
                $(".select2").select2();
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
            url: 'Counseling_viewdetails/deletedata',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               location.reload();
               
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
          </script>
