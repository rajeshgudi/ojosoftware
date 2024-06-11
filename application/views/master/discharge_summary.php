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
                                <h4 class="card-title">Discharge Summary</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true"><hg id="tab_tit">Add Discharge Summary </hg></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View/Edit/Delete</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                            <form id="Discharge_Summary" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <input type="hidden" name="discharge_summary_id" id="discharge_summary_id"> 
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

                                        <div class="col-sm-3 col-md-3">
                                                            <div class="form-group">
                                                                <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
                                                                <select class="form-control select2" name="doctor_id" id="doctor_id">
                                                                <option value="">Select Doctor</option>
                                                                 <?php if($doctors){foreach($doctors as $data){ ?>
                                                                    <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            </div>
                                                         </div>

                                        <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Discharge Date: <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="discharge_date" id="discharge_date">
                                        </div>
                                        </div>
                                  
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                    <div  id="last_appointmentdetails"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div id="medicalhis"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                             <div class="col-md-12 form-group">
                                                 <label>Diagnosis</label>
                                                 <input type="text" class="form-control" name="diagnosis" id="diagnosis">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                 <label>Surgical Procedure:</label>
                                                 <input type="text" class="form-control" name="surgical_procedure" id="surgical_procedure">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                 <label>Recovery During Hospital Stay:</label>
                                                 <input type="text" class="form-control" name="recovery" id="recovery">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                 <label>Condition at the time of discharge:</label>
                                                 <input type="text" class="form-control" name="conditionofthetime" id="conditionofthetime" value="stable">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                 <label>Investigations Performed:</label>
                                                 <input type="text" class="form-control" name="investigation" id="investigation" >
                                             </div>
                                        </div>
                                    </div>
                                </div>
<?php
$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0]; 
if($host_tvm=='eyecon'){
    $stleye='style="display:none;"';
    $stleyes='style="display:flex;"';
    $mob='7695009289';
}
else
{
   $stleye='style="display:flex;"';
   $stleyes='style="display:none;"';
   $mob='9270222244';
}
 ?>

                                <div class="row form-group" <?php echo $stleye; ?>>
                                     <div class="col-md-2">
                                         <label>PP</label>
                                         <input type="text" class="form-control" name="pp" id="pp">
                                     </div>
                                     <div class="col-md-2">
                                         <label>Sugar</label>
                                         <input type="text" class="form-control" name="sugar" id="sugar">
                                     </div>
                                     <div class="col-md-4">
                                         <label>K-Reading</label>
                                         <input type="text" class="form-control" name="kreading" id="kreading">
                                     </div>
                                     <div class="col-md-4">
                                         <label>IOL</label>
                                         <input type="text" class="form-control" name="iol" id="iol">
                                     </div>
                                </div>

                                 <div class="row form-group" <?php echo $stleyes; ?>> 
                                    <div class="col-md-5">
                                        <label style="text-decoration: underline;"><b>Preoperative vision</b></label>
                                    </div>
                                     <div class="col-md-7">
                                        <label style="text-decoration: underline;"><b>Preoperative Diagnosis</b></label>
                                    </div>
                                    <div class="col-md-5">
                                        <table class="table table-bordered">
                                                        <tbody><tr>
                                                            <td style="padding: 0px;">
                                                                <table class="">
                                                                    <tbody><tr style="background: #75e7be !important;">
                                                                        <th></th>
                                                                        <th class="tab_tit">D.V</th>
                                                                        <th class="tab_tit">N.V</th>
                                                                        <th class="tab_tit">PH</th>
                                                                     
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="tab_tit" style="background: #e0e0e057;">Right Eye</td>
                                                                        <td style="padding:5px;"><input type="text" name="pre1" id="pre1" class="form-control"></td>
                                                                        <td style="padding:5px;"><input type="text" name="pre2" id="pre2" class="form-control"></td>
                                                                        <td style="padding:5px;"><input type="text" name="pre3" id="pre3" class="form-control"></td>
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background: #e0e0e057;" class="tab_tit">Left Eye</td>
                                                                        <td style="padding:5px;"><input type="text" name="pre7" id="pre7" class="form-control"></td>
                                                                        <td style="padding:5px;"><input type="text" name="pre8" id="pre8" class="form-control"></td>
                                                                        <td style="padding:5px;"><input type="text" name="pre9" id="pre9" class="form-control"></td>
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="background: #e0e0e057;" class="tab_tit">Remarks</td>
                                                                        <td style="padding:5px;" colspan="7"><input type="text" name="pre_remarks" id="pre_remarks" class="form-control"></td>

                                                                    </tr>
                                                                </tbody></table>
                                                            </td>

                                                        </tr>
                                                    </tbody></table>
                                    </div>
                                   
                                     <div class="col-md-7">
                                         <label> LE/RE/BE</label>
                                         <input type="text" class="form-control" name="prod_eye" id="prod_eye" placeholder="LE:Test">
                                         <span class="text-danger">Example like LE:Test or RE:test or BE:Test</span>
                                     </div>
                                </div>
                                <b>Follow up Mediciations:</b>
                                <br/>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Select Medicine<span class="text-danger">*</span></label>
                                        <select class="form-control select2" name="medicine_id" id="medicine_id" onchange="getallmedicine(this.value)">
                                            <option value="">Select Medicine</option>
                                            <?php if($getallmedicine) foreach($getallmedicine as $data) { ?>
                                                <option value="<?php echo $data['medicine_id']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                        <div class="col-md-6">
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
                                                        <th style="width:10%;">Drug Name</th>
                                                        <th  style="width:20%;">Instruction</th>
                                                        <th  style="width:5%;">No.days</th>
                                                        <th  style="width:10%;">Qty</th>
                                                        <th style="display:none;">Start Date</th>
                                                        <th style="display:none;">End Date</th>
                                                        <th  style="width:15%;">Eye</th>
                                                        <th  style="width:35%;">Description</th>
                                                        <th  style="width:5%;">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                            <div id="search_result"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="symptoms">Next Visit Date:</label>
                                            <input type="date" class="form-control" name="nextvisit_date" id="nextvisit_date">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="symptoms">Content:</label>
                                            <textarea cols="3" rows="3" id="content" name="content" class="form-control" placeholder="content">In case of unusual pain, watering, redness or decrease in vision, report immediately to our emergency services Contact Numbers:+91 <?php echo $mob; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Date of Admission:</label>
                                            <input type="date" class="form-control" name="dateofad" id="dateofad">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Date of surgery:</label>
                                            <input type="date" class="form-control" name="datesur" id="datesur">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Date:</label>
                                            <input type="date" class="form-control" name="tdate" id="tdate">
                                        </div>
                                    </div>
                                  
                                </div>
                               
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="symptoms">Description:</label>
                                            <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                              

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata();" id="save">Submit</button>
                                    <button style="display:none;" id="update" type="button" class="btn btn-warning btn-min-width btn-glow mr-1 mb-1" onclick="updatedisdata();">Update</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                            </form>
                                            </div>
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                                 <div class="card-body collapse show">
                                                <div class="table-responsive">
                                                     <table id="tableid" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                        <thead>
                                                          <tr>
                                                            <th>Sl No</th>
                                                            <th>Patient Name</th>
                                                            <th>Discharge Date</th>
                                                            <th>Print</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                          </tr>
                                                        </thead>
                                                         <tfoot>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                <th>Patient Name</th>
                                                                <th>Discharge Date</th>
                                                                <th>Print</th>
                                                                <th>Edit</th>
                                                                <th>Delete</th>
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
            row_num=1;
              cd = (new Date()).toISOString().split('T')[0];
            $('#discharge_date').val(cd);
            $('#nextvisit_date').val(cd);
            $('#dateofad').val(cd);
            $('#datesur').val(cd);
            $('#tdate').val(cd);

 var table;
$( document ).ready(function() {
   table= $('#tableid').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?php echo base_url() ?>master/Discharge_summary/ajax_call',
          'columns': [
             { data: 'slno' },
             { data: 'pateint_name' },
             { data: 'discharge_date' },
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
    } );


            $( document ).ready(function() {
                showhisdet();
            });
            
function savedata()
{
    if( $("#patient_registration_id").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Discharge_summary/savedata',
            dataType: "json",
            data: $('#Discharge_Summary').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               table.draw();
                $("#Discharge_Summary")[0].reset();
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
   function showhisdet()
   {
     $.fn.dataTable.ext.errMode = 'none';
      $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/Examination/getcompalints',
            dataType: "json",
            data: {his_id:$('#history_id').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                    
                   

                        $('#medicalhis').html(data.medi);
                       $('#medicalhist').DataTable({
                           dom: 'Bfrtip',
                           searching: false,
                           paging: false,
                           info: false,
                           buttons: [
                            'pdfHtml5'
                          ],
                           "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
                        });

                        $('.dataTables_wrapper').css('width', '100%');


              } else if(data.error != '')
              {
                // $('#complaintid').html('No Data Found');
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
        function getpatientdetails(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Common_controller/getpatientdetails',
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
function updatedisdata()
{
    $("#overlay").fadeIn(300);
        $.ajax({
            type: "POST",
            url: 'Discharge_summary/updatedata',
            dataType: "json",
            data: $('#Discharge_Summary').serialize(),
            success: function(data) {
                $("#overlay").fadeOut(300);
                if (data.msg != '') {
                    Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
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
      

        $("#overlay").fadeIn(300);
        $.ajax({
            type: "POST",
            url: 'Discharge_summary/geteditdata',
            dataType: "json",
            data: {
                getid: val,
                csrf_test_name: $('#csrf_test_name').val()
            },
            success: function(data) {
                $("#overlay").fadeOut(300);
                if (data.msg != '') {
                    $('#base-tab1').click();
                    $('#tab_tit').html('Edit Discharge Summary');
                    $('#discharge_summary_id').val(data.masterdata[0]['discharge_summary_id']);
                    $("#patient_registration_id").val(data.masterdata[0]['patient_registration_id']).trigger("change");
                    $("#doctor_id").val(data.masterdata[0]['doctor_id']).trigger("change");
                    $('#discharge_date').val(data.masterdata[0]['discharge_date']);
                    $('#diagnosis').val(data.masterdata[0]['diagnosis']);
                    $('#surgical_procedure').val(data.masterdata[0]['surgical_procedure']);
                    $('#recovery').val(data.masterdata[0]['recovery']);
                    $('#conditionofthetime').val(data.masterdata[0]['conditionofthetime']);
                    $('#investigation').val(data.masterdata[0]['investigation']);
                    $('#pp').val(data.masterdata[0]['pp']);
                    $('#sugar').val(data.masterdata[0]['sugar']);
                    $('#kreading').val(data.masterdata[0]['kreading']);
                    $('#iol').val(data.masterdata[0]['iol']);
                    $('#nextvisit_date').val(data.masterdata[0]['nextvisit_date']);
                    $('#content').val(data.masterdata[0]['content']);
                    $('#dateofad').val(data.masterdata[0]['dateofad']);
                    $('#datesur').val(data.masterdata[0]['datesur']);
                    $('#tdate').val(data.masterdata[0]['tdate']);

                    $('#pre1').val(data.masterdata[0]['pre1']);
                    $('#pre2').val(data.masterdata[0]['pre2']);
                    $('#pre3').val(data.masterdata[0]['pre3']);
                    $('#pre7').val(data.masterdata[0]['pre7']);
                    $('#pre8').val(data.masterdata[0]['pre8']);
                     $('#pre9').val(data.masterdata[0]['pre9']);
                     $('#pre_remarks').val(data.masterdata[0]['pre_remarks']);

                    $('#prod_eye').val(data.masterdata[0]['prod_eye']);

                    $('#description').val(data.masterdata[0]['description']);
                    getaddmedhistorydata(data.masterdata[0]['discharge_summary_id']);
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
    function getaddmedhistorydata(key) {
        $("#overlay").fadeIn(300);
        $('#doctor_medicine').html('');
        $.ajax({
            type: "POST",
            url: 'Discharge_summary/showhistorydata',
            dataType: "json",
            data: {
                key: key,
                csrf_test_name: $('#csrf_test_name').val()
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
function getselectedval(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Common_controller/getsearchval',
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

function getallmedicine(val)
    {
        if(val>0)
        {
            $("#overlay").fadeIn(300);
            $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/Examination/getmedinedetails',
            dataType: "json",
            data: {medid:val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                 var allInstructions = "";
                 $.each(data.getdata, function(index, item) {
        allInstructions += item.instruction + "\n";
    });
                
                        $('#productdetails').children('tbody').append('<tr>\n\
                                       <td>'+data.getdata[0]['drugname']+'</td>\n\
                                       <td><input type="hidden" class="form-control" id="medicine_id_'+row_num+'" name="medicine_id[]" value="'+val+'"><textarea style="width: 200px;" type="text" class="form-control"  id="instruction_'+row_num+'" name="instruction[]">'+allInstructions+'</textarea><span id="search_result'+row_num+'"></span></td>\n\
                                       <td><input type="text" class="form-control" id="days_'+row_num+'" name="days[]" value="'+data.getdata[0]['days']+'"></td>\n\
                                        <td><input type="text" style="width: 100px;" class="form-control" id="qty_'+row_num+'" name="qty[]" value="1"></td>\n\
                                        <td style="display:none;"><input type="date" class="form-control" id="sdate_'+row_num+'" name="sdate[]" value="'+cd+'"></td>\n\
                                         <td style="display:none;"><input type="date" class="form-control" id="tdate_'+row_num+'" name="etdate[]" value="'+cd+'"></td>\n\
                                          <td><select style="width: 200px;" class="form-control" name="medeye[]" id="medeye_'+row_num+'"><option value="BE">BE</option><option value="LE">LE</option><option value="RE">RE</option><option value="A/F">A/F</option><option value="B/F">B/F</option></select></td>\n\
                                          <td><textarea style="width: 200px;" cols="5" rows="5" name="descr[]" id="descr_'+row_num+'" class="form-control" placeholder="Description"></textarea></td>\n\
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
                // $('#complaintid').html('No Data Found');
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
    function selecttemp(sel)
   {
    if(sel>0)
    {
        $("#overlay").fadeIn(300);
        $('#examination_data').html('');
         $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>transaction/Examination/getalltempl',
            dataType: "json",
            data: {sel:sel,csrf_test_name:$('#csrf_test_name').val()},
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
            url: 'Discharge_summary/deletedata',
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

function printdata(discharge_summary_id)
{
   $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>master/Discharge_summary/Discharge_summaryprint"><input name="discharge_summary_id" value="'+discharge_summary_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
 
          </script>
          <style>
            #medicalhis .row
            {
                display:none;
            }
          </style>
