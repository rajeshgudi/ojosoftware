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
                                <h4 class="card-title">Doctors registration</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Add Doctors registration</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View/Edit/Delete</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                            <form id="Doctors_registration" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Designation: <span class="text-danger">*</span></label>
                                            <select class="form-control" name="designation" id="designation">
                                                <option value="">Select Designation</option>
                                                <option value="1">Consultant</option>
                                                <option value="2">Surgery</option>
                                                <option value="3">Anesthesia</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  id="name" name="name" >
                                        </div>
                                    </div>

                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Mobile No: </label>
                                            <input type="text" class="form-control"  id="mobileno" name="mobileno" >
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Specialist: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  id="specialist" name="specialist" >
                                        </div>
                                    </div>

                                </div>
                               
                                <div class="row">
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Registration No: </label>
                                            <input type="text" class="form-control"  id="regno" name="regno" >
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Digital Signature: </label>
                                            <input type="text" class="form-control"  id="dgs" name="dgs" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Description:</label>
                                            <textarea cols="3" rows="3" id="description" name="description" class="form-control" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Department:<span class="text-danger">*</span></label>
                                            <select class="form-control select2" name="doctor_department_id" id="doctor_department_id">
                                               
                                                <?php
                                                  if($doctor_department)
                                                  {
                                                    foreach ($doctor_department as $datadepart) 
                                                    {
                                                       ?>
                                                       <option value="<?php echo $datadepart['doctor_department_id']; ?>"><?php echo $datadepart['name']; ?></option>
                                                       <?php
                                                    }
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Signature:</label>
                                            <input   id="nabh_logo" type="file" name="nabh_logo" capture class="form-control" style="height:45px;">
                                       <input   id="nabh_logo_hid" type="hidden" name="nabh_logo_hid" >
                                       <span style="color:red;">Allow size width:200px *  height 50px</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group mt-1">
                                        <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                          <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                          <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata();">Submit</button>
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
                                                            <th>Name</th>
                                                            <th>Mobile No</th>
                                                            <th>specialist</th>
                                                             <th>Department</th>
                                                            <th>Description</th>
                                                             <th>Status</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                          </tr>
                                                        </thead>
                                                         <tfoot>
                                                            <tr>
                                                                <th>Sl No</th>
                                                                 <th>Name</th>
                                                                 <th>Mobile No</th>
                                                                 <th>specialist</th>
                                                                  <th>Department</th>
                                                                <th>Description</th>
                                                                <th>Status</th>
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
           
 var table;
$( document ).ready(function() {
   table= $('#tableid').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Doctors_registration/ajax_call',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'mobileno' },
             { data: 'specialist' },
              { data: 'doc_dept' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 
function savedata()
{    
  if( $("#name").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        let data = new FormData($("#Doctors_registration")[0]);
        $("#overlay").fadeIn(300);
       
         $.ajax({
            type: "POST",
            url: 'Doctors_registration/savedata',
            dataType: "json",
            data: data,
            contentType: false,       
            cache: false,             
            processData:false, 
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
// function savedata()
// {
//     if( $("#name").val()=='') {
//            Swal.fire({title:"Info!",text:"Please Enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
//            return false;
//         }
//         $("#overlay").fadeIn(300);
//          $.ajax({
//             type: "POST",
//             url: 'Doctors_registration/savedata',
//             dataType: "json",
//             data: $('#Doctors_registration').serialize(),
//             success: function(data){
//                 $("#overlay").fadeOut(300);
//                if(data.msg != ''){
//                Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
//                table.draw();
//                 $("#Doctors_registration")[0].reset();
//               } else if(data.error != ''){
//                 Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//               } else if(data.error_message) 
//               {
//                 var error = data.error_message;
//                 var err_str = '';
//                 for (var key in error) {
//                   err_str += error[key] +'\n';
//                 }
//                 Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//               }
                
//             },
//             error: function (error) {
//                 Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//                 $("#overlay").fadeOut(300);  
//             }
//         }); 

// }

function editdata(val)
{
    if(val>0)
    {
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Doctors_registration/editdata',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#edit_data').html(data.msg);
                 $('#div_modal').modal('show');
                 $('.modal-title').html('Edit Doctors registration');
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
function updatedataval()
{    
  if($("#edit_name").val()=='') {
           Swal.fire({title:"Info!",text:"Please enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        let data = new FormData($("#edit_form")[0]);
        $("#overlay").fadeIn(300);
       
         $.ajax({
            type: "POST",
            url: 'Doctors_registration/updatedata',
            dataType: "json",
            data: data,
            contentType: false,       
            cache: false,             
            processData:false, 
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
// function updatedatsdsdaval()
// {
//         if($("#edit_name").val()=='') {
//            Swal.fire({title:"Info!",text:"Please enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
//            return false;
//         }
//         $("#overlay").fadeIn(300);
//          $.ajax({
//             type: "POST",
//             url: 'Doctors_registration/updatedata',
//             dataType: "json",
//             data: $('#edit_form').serialize(),
//             success: function(data){
//                 $("#overlay").fadeOut(300);
//                if(data.msg != ''){
//                Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
//                table.draw();
//                 $("#edit_form")[0].reset();
//                 $(".close").click();
//               } else if(data.error != ''){
//                 Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//               } else if(data.error_message) 
//               {
//                 var error = data.error_message;
//                 var err_str = '';
//                 for (var key in error) {
//                   err_str += error[key] +'\n';
//                 }
//                 Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//               }
                
//             },
//             error: function (error) {
//                 Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
//                 $("#overlay").fadeOut(300);  
//             }
//         }); 
// }
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
            url: 'Doctors_registration/deletedata',
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
          </script>
