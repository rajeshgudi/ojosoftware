<?php 
$path=base_url('template1/modern-admin/');
?>      
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                               
                                <div class="card-content">
                                    <div class="card-body">
                                         <h4 class="card-title">Collection Report</h4>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="lastname">Search: <span class="text-danger">*</span></label>
                                           <select style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_registration_id" id="patient_registration_id" >
                                               <option value="">Select Patient MRD NOS</option>
                                              
                                           </select>
                                        </div>
                                     </div>
                                    <div class="col-md-3">
                                       <br/>
                                         <button style="margin-top:7px;" type="button" class="btn btn-success btn-sm btn-min-width  mr-1 mb-1" onclick="getsummary();">Submit</button>
                                    </div>
                                    
                                    
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
        saveurl="Collection_report_new/getsummary";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: $('#summary').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#showdata_sum').html(data.getdata);
                $('#example_sum').DataTable({
    dom: 'Bfrtip',
    paging: true,
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Excel'
        },
        {
            extend: 'print',
            text: 'Print',
            exportOptions: {
                orientation: 'landscape'
              }
        }
    ]
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

 function printdata_patientappoitment(printpatient_registration_id,pat_apt_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_appointment/"><input name="printpatient_apt_id" value="'+pat_apt_id+'"/><input name="printpatient_registration_id" value="'+printpatient_registration_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
    function printdata_billing(billing_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>transaction/Receipt/print_billing/"><input name="billing_id" value="'+billing_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
     function printdata_insbilling(billing_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>transaction/Insurance_billing/print_billing/"><input name="billing_id" value="'+billing_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
 function printdata_examination(examinationid)
{
   var inputFields = [];
for (var i = 1; i <= 22; i++) {
    var inputField = $('<input>').attr({
        name: 'chkpostout' + i,
        value: $('#popupchk'+i).is(':checked')
    });

     if ($('#popupchk'+i).is(':checked')) {
        inputField.prop('value', true);
    } else {
        // Set the value to false if the checkbox is unchecked
        inputField.prop('value', true);
    }

    inputFields.push(inputField);
}
// console.log(inputFields);


// Create a form element
var form = $('<form>', {
    target: '_blank',
    method: 'post',
    action: '<?php echo base_url(); ?>/transaction/Examination/examinationprint_preview'
});

// Add individual input fields to the form
csrf_test_name=$('#csrf_test_name').val();
form.append('<input name="examinationid" value="' + examinationid + '" />');
form.append('<input name="csrf_test_name" value="' + csrf_test_name + '" />');


// Append the input fields from the inputFields array to the form
for (var i = 0; i < inputFields.length; i++) {
    form.append(inputFields[i]);
}

// Append the form to the body, submit it, and remove it
form.appendTo('body').submit().remove();


}
function printdata_salesop(sales_id)
{
     $('<form target="_blank" method="post" action="<?php echo base_url(); ?>reports/Collection_report/print_sales"><input name="data_generatebill" value="'+sales_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
function printdata_salesph(sales_id)
{
     $('<form target="_blank" method="post" action="<?php echo base_url(); ?>reports/Collection_report/print_sales_ph"><input name="data_generatebill" value="'+sales_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
          </script>
