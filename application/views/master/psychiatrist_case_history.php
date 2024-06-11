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
                                <h4 class="card-title">Psychiatrist Case History</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">View Details</a>
                                            </li>
                                           
                                            
                                        </ul>
 <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 

  <?php   $this->load->view("master/printsetting_list_psy"); ?>
                             

                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                               
                                                 <div class="row">
                                          <div class="col-md-3">
                                          <?php if($this->session->userdata('user_type')==2){ ?>
                                            <div class="form-group">
                                              
                                                <select class="form-control select2" name="doctor_id_n" id="doctor_id_n">
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
                                            <?php } ?>
                                          </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="search_date" id="search_date" class="form-control search_date">
                                            </div>
                                         
                                           <div class="col-md-2">
                                                <button onclick="getexaminationdata(<?php echo $this->session->userdata('user_type'); ?>)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                            </div>
                                            <div class="col-md-2" >
                                                <button style="padding: 4px 9px;float: right;"  class="btn btn-icon btn-info mr-1 mb-1" type="button"><i class="la la-cog" onclick="showmodal()"></i></button>
                                              </div>
                                            </div>

                                             <div class="row">
                                              <div class="col-md-12" id="examination_data"></div>
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

          function printdataexamination(printpatient_registration_id,pat_app_id,sel=0,actionflag=0){
      //actionflag=0.fresh optho ,1.optho,2:doctor

         $('<form   method="post" action="<?php echo base_url() ?>transaction/Psychiatrist/"><input name="printpatient_registration_id" value="'+printpatient_registration_id+'"/><input name="pat_app_id" value="'+pat_app_id+'"/><input name="doc_examination_id" id="doc_examination_id" value="'+sel+'"/><input name="actionflag" id="actionflag" value="'+actionflag+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }

          function showmodal() {
              $('#modaldiv_modal').modal('show');
         }

csrf=$('#csrf_test_name').val();
         function getexaminationdata(typeuser)
   {
         did=0;
        if($('#doctor_id_n').val())
        {
            did=$('#doctor_id_n').val();
        }
        $("#overlay").fadeIn(300);
        $('#examination_data').html('');
         $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>master/Psychiatrist_case_history/getdata_savedata',
            dataType: "json",
            data: {typeuser:typeuser,did:did,csrf_test_name:csrf,examination_date:$('#search_date').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                      $('#examination_data').html(data.dataexam);
                      $('#ex_datatable').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                         
                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
                        });
              } else if(data.error != '')
              {
                 $('#examination_data').html('No Data Found');
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

   function deletedatapsy(val)
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
            url: '<?php echo base_url(); ?>master/Psychiatrist_case_history/deletedata',
            dataType: "json",
            data: {getid: val,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
            getexaminationdata(<?php echo $this->session->userdata('user_type'); ?>)
               
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

 function printpsy(psyid)
{
   var inputFields = [];
for (var i = 1; i <= 12; i++) {
    var inputField = $('<input>').attr({
        name: 'chkpostout' + i,
        value: $('#popupchk'+i).is(':checked')
    });
    inputFields.push(inputField);
}

// Create a form element
var form = $('<form>', {
    target: '_blank',
    method: 'post',
    action: '<?php echo base_url(); ?>transaction/Psychiatrist/printpsy'
});

// Add individual input fields to the form
csrf_test_name=$('#csrf_test_name').val();
form.append('<input name="printpsyid" value="' + psyid + '" />');
form.append('<input name="csrf_test_name" value="' + csrf_test_name + '" />');


// Append the input fields from the inputFields array to the form
for (var i = 0; i < inputFields.length; i++) {
    form.append(inputFields[i]);
}

// Append the form to the body, submit it, and remove it
form.appendTo('body').submit().remove();


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

          </script>
