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
                                <h4 class="card-title">Dental Doctor Appointments</h4>
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">View Appointments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Completed</a>
                                            </li>
                                           
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">

                                            <div class="row form-group">
                             <div class="col-sm-3 col-md-3">
                               
                                            <div class="form-group">
                                              
                                                <select class="form-control select2" name="v_doctor_id" id="v_doctor_id">
                                                    <option value="0">Select All Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                      $sell='';
                                                      $ll=$this->session->userdata('login_id');
                                                       $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
                                                      if($doctor_id_new_cond==$data['doctors_registration_id'])
                                                      {
                                                        $sell='selected';
                                                      }
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>" <?php echo $sell; ?>><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                         
                                         </div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="search_date" id="search_date" class="form-control search_date">
                                </div>
                                <div class="col-md-2">
                                    <button onclick="getpateintdetails()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                               
                            </div>

                          


                            <div class="row">
                            <div class="col-md-12">

                                                <table class="table table-bordered table-hover" id="den_tab">
                                                    <thead>
                                                        <tr>
                                                            <th>SL NO</th>
                                                            <th>Appointment Date</th>
                                                            <th>Patient Name</th>
                                                            <th>MRD NO</th>
                                                            <th>Gender/Age</th>
                                                            <th>Mobile No</th>
                                                            <th>Doctor Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dental_dept_table"></tbody>
                                                </table>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                                 <div class="">

                                                 <div class="row form-group">
                             <div class="col-sm-3 col-md-3">
                               
                                            <div class="form-group">
                                              
                                                <select class="form-control select2" name="com_doctor_id" id="com_doctor_id">
                                                    <option value="0">Select All Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                      $sell='';
                                                      $ll=$this->session->userdata('login_id');
                                                       $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
                                                      if($doctor_id_new_cond==$data['doctors_registration_id'])
                                                      {
                                                        $sell='selected';
                                                      }
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>" <?php echo $sell; ?>><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                         
                                         </div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="com_search_date" id="com_search_date" class="form-control search_date">
                                </div>
                                <div class="col-md-2">
                                    <button onclick="getcomppatdetails()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                                <div class="col-md-2">
                                  <button style="padding: 4px 9px;float: right;" class="btn btn-icon btn-info mr-1 mb-1" type="button"><i class="la la-cog" onclick="showmodal()"></i></button>
                                </div>
                            </div>

                                                 <div class="row">
                                             <div class="col-md-12">

                                                <table class="table table-bordered table-hover" id="den_com">
                                                   <thead> 
                                                        <tr>
                                                            <th>SL No</th>
                                                            <th>Examination Date</th>
                                                            <th>Patient Name</th>
                                                            <th>MRD NO</th>
                                                            <th>Age/YY MM</th>
                                                            <th>Mobile No</th>
                                                            <th>Doctor ID</th>
                                                            <th>Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dencom_tbody"></tbody>
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
                    </div>
                </section>
                <!-- Justified With Top Border end -->
            </div>


            <?php   $this->load->view("master/printsetting_list"); ?>

          <script type="text/javascript">
      $(document ).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';
    cd = (new Date()).toISOString().split('T')[0];
    $('.search_date').val(cd);
    getpateintdetails();
   
});
function getpateintdetails()
{
    $('#dental_dept_table').html('');
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Dental_doctor_appointment/Get_Dental_appointmentdata',
            dataType: "json",
            data: { search_date: $('#search_date').val(),doctor_id: $('#v_doctor_id').val(), csrf_test_name: $('#csrf_test_name').val() },
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
             $('#dental_dept_table').html(data.msg);
             var table = $('#den_tab').DataTable({
                      buttons: [  ],
                      dom: 'Blfrtip',
                      columnDefs: [{
                             lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
                         }]
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
function printdataexamination(printpatient_registration_id,pat_app_id,sel=0,actionflag=0){
      //actionflag=0.fresh optho ,1.optho,2:doctor

         $('<form   method="post" action="<?php echo base_url() ?>transaction/Dental_examination/"><input name="printpatient_registration_id" value="'+printpatient_registration_id+'"/><input name="pat_app_id" value="'+pat_app_id+'"/><input name="doc_examination_id" id="doc_examination_id" value="'+sel+'"/><input name="actionflag" id="actionflag" value="'+actionflag+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
    function  getcomppatdetails() {
        $('#dental_dept_table').html('');
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Dental_doctor_appointment/Get_Dental_comp',
            dataType: "json",
            data: { search_date: $('#com_search_date').val(),doctor_id: $('#com_doctor_id').val(), csrf_test_name: $('#csrf_test_name').val() },
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
             $('#dencom_tbody').html(data.msg);
             var table = $('#den_com').DataTable({
                      buttons: [  ],
                      dom: 'Blfrtip',
                      columnDefs: [{
                             lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
                         }]
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
    function showmodal() {
        $('#modaldiv_modal').modal('show');
    }
    function printsubmit() {
        Swal.fire({
            title: "",
            text: "Saved data",
            type: "success",
            confirmButtonClass: "btn btn-success",
            buttonsStyling: !1
        });
        $('#mclose').click();
    }

    function examinationprint(examinationid, sel = 0) {
        if (sel == 1) {
            $(".check_class").attr("checked", false);
            $("#specchk").attr("checked", true);
        } else {
            $(".check_class").attr("checked", true);
        }

     

//INR4
        $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Dental_examination/examinationprint_preview"><input name="examinationid" value="' + examinationid + '"/><input name="chkcomplaintsout" value="' + $('#chkcomplaints').is(':checked') + '"><input name="chkopthalmicsout" value="' + $('#chkophthalmic').is(':checked') + '"><input name="chkmedicalout" value="' + $('#chkmedical').is(':checked') + '"><input name="chkeyepartout" value="' + $('#chkeyepart').is(':checked') + '"><input name="addmedicinessout" value="' + $('#addmediciness').is(':checked') + '"><input name="investigationchkout" value="' + $('#investigationchk').is(':checked') + '"><input name="preliminary_exout" value="' + $('#preliminary_ex').is(':checked') + '"><input name="eyePartsout" value="' + $('#eyeParts_chk').is(':checked') + '"><input name="addEyePart_c" value="' + $('#diagnosis_chk').is(':checked') + '"><input name="vsisonreadingsout" value="' + $('#vsisonreadings').is(':checked') + '"><input name="curspecout" value="' + $('#curspec').is(':checked') + '"><input name="objectchkout" value="' + $('#objectchk').is(':checked') + '"><input name="arkkchkout" value="' + $('#arkkchk').is(':checked') + '"><input name="manchkout" value="' + $('#manchk').is(':checked') + '"><input name="specchkout" value="' + $('#specchk').is(':checked') + '"><input name="conlchkout" value="' + $('#conlchk').is(':checked') + '"><input name="pmtchkout" value="' + $('#pmtchk').is(':checked') + '"><input name="csrf_test_name" value="' + $('#csrf_test_name').val() + '"></form>').appendTo('body').submit().remove();
    
     
    
    }
          </script>
