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
                                     <h4 class="card-title">Counseling/Diagnosis  Report</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Diagnosis  Report</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="true">Counselling  Report</a>
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
                                            <input type="date" name="sum_fromdate" id="sum_fromdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">To Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="sum_todate" id="sum_todate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select Doctor</label>
                                        <select class="form-control select2" name="doc_id" id="doc_id" style="width:100%;">
                                            <option value="">Select Doctor</option>
                                            <?php if ($doctors) {
                                                foreach ($doctors as $data) {
                                            ?>
                                                    <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
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
                                                 <div class="">
                                                  <form id="detailed" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name1" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                               <div class="row">
                                       <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="lastname">From Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="det_fromdate" id="det_fromdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="lastname">To Date: <span class="text-danger">*</span></label>
                                            <input type="date" name="det_todate" id="det_todate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select Doctor</label>
                                        <select class="form-control select2" name="coun_doc_id" id="coun_doc_id" style="width:100%;">
                                            <option value="">Select Doctor</option>
                                            <?php if ($doctors) {
                                                foreach ($doctors as $data) {
                                            ?>
                                                    <option value="<?php echo $data['doctors_registration_id']; ?>"><?php echo $data['name']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Counseling</label>
                                        <select class="form-control select2" name="coun_rep" id="coun_rep" style="width:100%;">
                                           
                                            <option value="2">Surgical</option>
                                            <option value="3">Laser</option>
                                            <option value="4">Injection</option>
                                            <option value="5">Investigation</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Type</label>
                                        <select class="form-control select2" name="coun_type" id="coun_type" style="width:100%;">
                                          
                                            <option value="1">Open</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Completed</option>
                                            <option value="4">Cancelled</option>
                                        </select>
                                    </div>
                                    
                                    
                                   

                                         
                                </div>

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="gettreatmentplan()">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="form-group">
                                        <div class="table-responsive" id="showdata_det">
                                           
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


function getsummary()
    { 
        if($("#sum_fromdate").val()=='' || $("#sum_todate").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter  All Mandatory fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $('#showdata_sum').html('');
$.fn.dataTable.ext.errMode = 'none';
        $("#overlay").fadeIn(300);
        saveurl="Coun_dia_report/getsummary";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                if(data.getdata)
                {
                    $('#showdata_sum').html(data.getdata);
                 $('#example_sum').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5',
                        'pdfHtml5'
                    ]
                } );
                }
                else
                {
                    Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                }
              
                
              } else if(data.error != ''){
               // alert("Sd");
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
        saveurl="Sales_return_report/getdetailed";
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

  
function gettreatmentplan()
   {
    //flag=1 (open) flag=2(pending) flag=3 (completed) flag=4(cancel)
    val=$('#coun_rep').val();
   // alert(val);
    flag=$('#coun_type').val();
    if(val==2)
    {
        if(flag==1)
        {
            idname='sur_open';
        }
        else if(flag==2)
        {
            idname='sur_pending';
        }
        else if(flag==3)
        {
            idname='sur_completed';
        }
        else if(flag==4)
        {
            idname='sur_cancel';
        }
        
    }
    else if(val==3)
    {
        if(flag==1)
        {
            idname='las_open';
        }
        else if(flag==2)
        {
            idname='las_pending';
        }
        else if(flag==3)
        {
            idname='las_completed';
        }
        else if(flag==4)
        {
            idname='las_cancel';
        }
    }
     else if(val==4)
    {
        if(flag==1)
        {
            idname='inj_open';
        }
        else if(flag==2)
        {
            idname='inj_pending';
        }
        else if(flag==3)
        {
            idname='inj_completed';
        }
        else if(flag==4)
        {
            idname='inj_cancel';
        }
    }
    csrf=$('#csrf_test_name').val();
        $("#overlay").fadeIn(300);
        $('#showdata_det').html('');
         $.ajax({
            type: "POST",
            url: 'Coun_dia_report/gettreatmentplan',
            dataType: "json",
            data: {coun_doc_id:$('#coun_doc_id').val(),flag:flag,csrf_test_name:csrf,chargetype_id:val,surgical_date:$('#det_todate').val(),surgical_date_st:$('#det_fromdate').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                      $('#showdata_det').html(data.msg);
                      $('#det_datatable').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                         
                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
                        });
              } else if(data.error != '')
              {
                 $('#showdata_det').html('No Data Found');
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
          </script>
