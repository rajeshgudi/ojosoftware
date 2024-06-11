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
                                <h4 class="card-title">Couseling Appointment View Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Surgery</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Laser</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Injection</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Investigation</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">Preoperative Appointment</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    <form id="sur_form" method="post">
                    <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                    <input type="hidden" name="getid" id="getid" value="2">
                       
                       
                         <div class="row">
                            <div class="col-md-4">
                                <input style="height: 43px;" type="date" name="sur_date0" id="sur_date0" class="form-control search_date">
                            </div>
                            <div class="col-md-4">
                                <input style="height: 43px;" type="date" name="sur_date" id="sur_date" class="form-control search_date">
                            </div>
                         
                            <div class="col-md-2">
                                <button onclick="getallapp(2)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                            </div>
                             
                            </div>

                            <div class="row">
                                <div class="col-md-12" id="sur_data">
                                    
                                </div>
                            </div>
                   
                    </form>
                   </div>
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                                 <form id="las_form" method="post">
                                                        <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                        <input type="hidden" name="getid" id="getid" value="3">
                                                           
                                                           
                                                             <div class="row">
                                                              <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="las_date0" id="sur_date0" class="form-control search_date">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="las_date" id="sur_date" class="form-control search_date">
                                                                </div>
                                                             
                                                                <div class="col-md-2">
                                                                    <button onclick="getallapp(3)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                                                </div>
                                                                 
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12" id="las_data">
                                                                        
                                                                    </div>
                                                                </div>
                                                       
                                                        </form>
                                            </div>

                                            <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                                                 <form id="pre_form" method="post">
                                                        <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                     
                                                           
                                                           
                                                             <div class="row">
                                                              <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="pre_date0"  class="form-control search_date">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="pre_date"  class="form-control search_date">
                                                                </div>
                                                             
                                                                <div class="col-md-2">
                                                                    <button onclick="getpredata()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                                                </div>
                                                                 
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12" id="pre_data">
                                                                        
                                                                    </div>
                                                                </div>
                                                       
                                                        </form>
                                            </div>

                                             <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                                 <form id="inj_form" method="post">
                                                        <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                        <input type="hidden" name="getid" id="getid" value="4">
                                                           
                                                           
                                                             <div class="row">
                                                              <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="inj_date0"  class="form-control search_date">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input style="height: 43px;" type="date" name="inj_date" id="inj_date" class="form-control search_date">
                                                                </div>
                                                             
                                                                <div class="col-md-2">
                                                                    <button onclick="getallapp(4)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                                                </div>
                                                                 
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12" id="inj_data">
                                                                        
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

  <form id="com_form_new2" action="#" method="post">
       <input type="hidden" name="csrf_test_name"   value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div  id="com_form_id2" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                    </div>
                    <div class="modal-body"  >
                       <div id="com_sec2"></div>
                    </div>
                    <div class="modal-footer">
                    
                    <button  class="btn btn-primary btn-sm" type="button" onclick="savecompopup2()"><i class="fas fa-plus-square"></i>Submit & Print</button>
                     <button type="button" id="mclose" class="btn btn-danger btn-sm cls comclse" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

          <script type="text/javascript">
               $(document ).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
        $('.search_date').val(cd);
    });

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

function getallapp(val)
{
    if(val==2)
    {
        opname="sur";
    }
    else if(val==3)
    {
        opname="las";
    }
    else if(val==4)
    {
        opname="inj";
    }
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling_viewdetails/getallapp',
            dataType: "json",
            data:$('#'+opname+'_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#'+opname+'_data').html(data.msg);
                 $('#'+opname+'_datatable').DataTable({
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

function cancel(val)
{
    if(val>0)
    {
          Swal.fire({title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, cancel it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
             $("#overlay").fadeIn(300);
                   $.ajax({
            type: "POST",
            url: 'Counseling_viewdetails/canceldata',
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
function actionpop(examination_treatment_plan_id)
{
   
     $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling_viewdetails/Getpopup_eye',
            dataType: "json",
            data: {csrf_test_name:$('#csrf_test_name').val(),examination_treatment_plan_id:examination_treatment_plan_id},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                 $('.modal-title').html('Investigation Report');
                 $('#com_form_id2').modal('show');
                 $('#com_sec2').html(data.htmldata);
              } else if(data.error != '')
              {
                var error = data.error;
                 var err_str = '';
                for (var key in error) 
                {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
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
 function getpredata()
   {
   
   
   
        $("#overlay").fadeIn(300);
        $('#pre_data').html('');
         $.ajax({
            type: "POST",
            url: 'Counseling_viewdetails/gettreatmentplan',
            dataType: "json",
             data:$('#pre_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                      $('#pre_data').html(data.msg);
                      $('#idname_datatable').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                         
                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
                        });
                       $('[data-toggle="tooltip"]').tooltip();
              } else if(data.error != '')
              {
                 $('#'+idname+'_data').html('No Data Found');
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
   function printseqrate(printid)
{
 $('<form target="_blank" method="post" action="<?php echo base_url('master/Counseling_viewdetails/Preoperativeinsprint'); ?>"><input name="printid" value="'+printid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
   function savecompopup2()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling_viewdetails/saveinv',
            dataType: "json",
            data: $('#com_form_new2').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               printseqrate(data.sur_fit_id);
               $('.comclse').click();
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
          </script>
