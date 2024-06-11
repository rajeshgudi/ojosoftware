<?php
$path = base_url('template1/modern-admin/');
$host_tvm = explode('.', $_SERVER['HTTP_HOST'])[0];
?>
<style>
    .form-control-position {
    top: -3px;
}
</style>
<div class="content-body">
 
   
         <section class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                     <div class="row">
                                        <div class="form-group col-11 mb-2">
                                           
                                            <div class="position-relative has-icon-left">
                                                <input style="height: 39px;" type="text" id="timesheetinput1" class="form-control" placeholder=" Search MRD NO.." name="employeename">
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group col-1 mb-2" style="margin-left: -2%;">
                                             <button onclick="serachmrdno($('#timesheetinput1').val())"  type="button" class="btn btn-primary"><i class="ft-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>                                     

    <!-- Justified With Top Border start -->
    <section id="basic-tabs-components" style="display:none;">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body" id="show_data_mrd">

                       




                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
 
    <!-- Select All value -->

    



<script type="text/javascript">
   csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
    $("body").removeClass(" vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-expanded").addClass("vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-collapsed");
    function serachmrdno(mrd)
    {
        if(mrd)
        {
            $('#show_data_mrd').html('');
                $("#overlay").fadeIn(300);
                $.ajax({
                    type: "POST",
                    url: 'Case_history_preview/Get_MRD_Details',
                    dataType: "json",
                    data: {
                        mrd: mrd,
                        csrf_test_name: csrf
                    },
                    success: function(data) {
                        $("#overlay").fadeOut(300);
                        if (data.msg != '') {
                            $('#show_data_mrd').html(data.showdata);
                            $('#basic-tabs-components').show();
                            getalert();
                        } else if (data.error != '') {
                            Swal.fire({
                                title: "info!",
                                text: "No Data Found",
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
        else
        {
          Swal.fire({
                    title: "Info!",
                    text: "Please Enter MRD NO",
                    type: "info",
                    confirmButtonClass: "btn btn-primary",
                    buttonsStyling: !1
                });
        }
    }

        function previewdatewise(val, preid) {
        //INR2
        $('#examinationIdPreview').val(val);
        $('#preIdvalue').val(preid);
        $('#select-all').prop('checked', false);
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
   
    function examinationprintNew()
{


   var examinationid= $('#examinationIdPreview').val();
   var preId=$('#preIdvalue').val();
  
   if(examinationid > 0)
{

 //   $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/examinationprint"><input name="examinationid" value="'+examinationid+'"/><input name="chkcomplaintsout" value="'+complaints_lcl+'"><input name="chkopthalmicsout" value="'+ophthalmic_history_lcl+'"><input name="chkmedicalout" value="'+medical_history_lcl+'"><input name="chkeyepartout" value="'+eye_comp_c+'"><input name="addmedicinessout" value="'+getdoctorprescription_lcl+'"><input name="investigationchkout"  value="'+Getdetailstableex_lcl+'" ><input name="preliminary_exout"  value="'+preExam_lcl+'" ><input name="vsisonreadingsout"   value="'+visionReading_lcl+'" ><input name="curspecout"  value="'+csp_lcl+'" ><input name="objectchkout" value="'+Objref_lcl+'"><input name="arkkchkout" value="'+arKer_lcl+'"><input name="manchkout" value="'+manKer_lcl+'"><input name="specchkout" value="'+specor_lcl+'"><input name="conlchkout" value="'+clc_lcl+'"><input name="pmtchkout" value="'+pmtchk_lcl+'"><input name="csrf_test_name" value="'+csrf_test_name_lcl+'"></form>').appendTo('body').submit().remove();
  
    //$('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/examinationprint"><input name="examinationid" value="'+examinationid+'"/><input name="chkcomplaintsout" value="'+$('#complaints_c').is(':checked')+'"><input name="chkopthalmicsout" value="'+$('#ophthalmic_history_c').is(':checked')+'"><input name="chkmedicalout" value="'+$('#medical_history_c').is(':checked')+'"><input name="chkeyepartout" value="'+$('#eye_comp_c').is(':checked')+'"><input name="addmedicinessout" value="'+$('#getdoctorprescription_c').is(':checked')+'"><input name="investigationchkout" value="'+$('#Getdetailstableex_c').is(':checked')+'"><input name="preliminary_exout" value="'+$('#preExam').is(':checked')+'"><input name="vsisonreadingsout" value="'+$('#visionReading').is(':checked')+'"><input name="curspecout" value="'+$('#csp').is(':checked')+'"><input name="objectchkout" value="'+$('#Objref').is(':checked')+'"><input name="arkkchkout" value="'+$('#arKer').is(':checked')+'"><input name="manchkout" value="'+$('#manKer').is(':checked')+'"><input name="specchkout" value="'+$('#specor').is(':checked')+'"><input name="conlchkout" value="'+$('#clc').is(':checked')+'"><input name="pmtchkout" value="'+$('#pmtchk').is(':checked')+'"><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    // var inputFields = [];
    //     for (var i = 1; i <= 22; i++) {
    //         var inputField = $('<input>').attr({
    //             name: 'chkpostout' + i,
    //             value: $('#'+preId).find('#'+i+'sec_chk').is(':checked')
    //         });
    //         inputFields.push(inputField);
    //     }

    // $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/examinationprint_preview"><input name="examinationid" value="'+examinationid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'">'+inputFields+'</form>').appendTo('body').submit().remove();


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
</script>
<style>
    .table th,
    .table td {
        padding: 5px;
    }

    
</style>
<style type="text/css">
  
    .powline{
        line-height:26px;
    }
</style>

  
