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
                                <h4 class="card-title">Patients profile & Appointment history</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form id="Area" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                            <div class="row">
                                        <div class="form-group col-11 mb-2">
                                                <div class="position-relative ">
                                                    <select style="width:100%;height: 39px;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_registration_id" id="timesheetinput1" >
                                                           <option value="">Select Patient MRD NOS</option>
                                                       </select>
                                                    <div class="form-control-position">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="form-group col-1 mb-2" style="margin-left: -2%;">
                                                 <button onclick="serachmrdno($('#timesheetinput1').val())"  type="button" class="btn btn-primary"><i class="ft-search"></i></button>
                                            </div>
                                        </div>
                                        <hr/>
                                    </form>
                                    <div id="showdata"></div>
                                        
                                      
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Justified With Top Border end -->
            </div>
 <div id="folmod"></div>
          <script type="text/javascript">
                $("body").removeClass(" vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-expanded").addClass( "vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-collapsed" );
 
function serachmrdno(val)
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Patients_profile/getpatientdetails',
            dataType: "json",
            data: $('#Area').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
              $('#showdata').html(data.htmldata);
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

 function printdata(billing_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>transaction/Billing/print_billing/"><input name="billing_id" value="'+billing_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
   function examinationprintNew()
{


   var examinationid= $('#examinationIdPreview').val();
   var preId=$('#preIdvalue').val();
  
   if(examinationid > 0)
{

    var inputFields = [];

for (var i = 1; i <= 22; i++) {
    var inputField = $('<input>').attr({
        name: 'chkpostout' + i,
        value: $('#'+preId).find('#'+i+'sec_chk').is(':checked')
    });
    inputFields.push(inputField);
}

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


    
}

     function previewdatewise(val, preid) {
        //INR2
        csrf = $('#csrf_test_name').val();
        $('#examinationIdPreview').val(val);
        $('#preIdvalue').val(preid);
        $('#select-all').prop('checked', false);
        getalert();
        console.log($('#examinationIdPreview').val(val));
        if (val > 0) {
            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>transaction/Examination/getexaminationpreview',
                dataType: "json",
                data: {
                    examinationid: val,
                    csrf_test_name: csrf
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {
                        $('#' + preid).html(data.showdata);
                    } else if (data.error != '') {

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
    }
        function getalert()
{
    $('#select-all').on('click',function(){
        if(this.checked){
 var preId=$('#preIdvalue').val();
        for (var i = 1; i <= 22; i++) 
        {
            $('#'+preId).find('#'+i+'sec_chk').prop('checked', true);
        }

        }else{
var preId=$('#preIdvalue').val();
        for (var i = 1; i <= 22; i++) 
        {
            $('#'+preId).find('#'+i+'sec_chk').prop('checked', false);
        }

        }
    });
}
    $(document).ready(function(){
   getalert();
    
   
});

    function editpat_det_hist(val)
{
    if(val>0)
    {
         $("#overlay").fadeIn(300);
         $('#folmod').html('');
         $.ajax({
            type: "POST",
            url: 'Patients_profile/getpatdet',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#folmod').html(data.msg);
                 $('#div_modalf').modal('show');
                 $('.modal-title').html('Edit Patient details');
                ageChanged(data.yearpat);
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

function patgetprint(patid)
{
  $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_patidcard/"><input name="printpatient_registration_id" value="'+patid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
function updatepat()
{
      if( $("#pat_pro_tit").val()=='' || $("#pat_fname").val()==''  || $("#mobileno").val()=='') {
           Swal.fire({title:"Info!",text:"Please Enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Patients_profile/updatedata',
            dataType: "json",
            data: $('#followupd_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
              $('.mmclld').click();
              serachmrdno($('#timesheetinput1').val());
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


 function printdata_con(printpatient_registration_id,pat_apt_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_appointment/"><input name="printpatient_apt_id" value="'+pat_apt_id+'"/><input name="printpatient_registration_id" value="'+printpatient_registration_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }

   function ageChanged()
          {
           var today = new Date('<?=date('Y-m-d')?>');
           var year=$("#agey").val();
           var month=$("#agem").val();
           var date=0;
           var year=parseInt(year);
           if(isNaN(year))
           {
               year=0;
           }
           var month=parseInt(month);
           if(isNaN(month))
           {
               month=0;
           }
           var date=parseInt(date);
           if(isNaN(date))
           {
               date=0;
           }
             var total_days=   year*365.25+month*30.42+date;
             var total_days=Math.round(total_days);
             if(total_days==0)
             {
             return;
             }
            today.setDate(today.getDate()-total_days);
            var birth_date = today. getDate();
            var birth_month = today. getMonth() + 1; 
            var birth_year = today. getFullYear();
          // var dob=pad(birth_date,2)+'-'+pad(birth_month,2)+'-'+birth_year;
           var dob=birth_year+'-'+pad(birth_month,2)+'-'+pad(birth_date,2);
            $("#dob").val(dob);
                 
          }
function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

          </script>
<style type="text/css">
    .tit_clas_pro
    {
        font-size: 18px;
       line-height: 28px;
       font-family: ui-sans-serif;
    }
    .tit_hd
    {
        text-align: center;
        text-decoration: underline;
        font-family: ui-sans-serif;
        font-size: 25px;
    }
    .bor_cls
    {
        border-right: 1px solid black;
    }
</style>