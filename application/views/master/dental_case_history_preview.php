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
                    url: 'Dental_case_history_preview/Get_MRD_Details',
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
                url: '<?php echo base_url() ?>transaction/Dental_examination/getexaminationpreview',
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

    $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Dental_examination/examinationprint_preview"><input name="examinationid" value="'+examinationid+'"/><input name="chkcomplaintsout" value="'+$('#'+preId).find('#complaints_c').is(':checked')+'"><input name="chkopthalmicsout" value="'+$('#'+preId).find('#ophthalmic_history_c').is(':checked')+'"><input name="chkmedicalout" value="'+$('#'+preId).find('#medical_history_c').is(':checked')+'"><input name="chkeyepartout" value="'+$('#'+preId).find('#eye_comp_c').is(':checked')+'"><input name="addmedicinessout" value="'+$('#'+preId).find('#getdoctorprescription_c').is(':checked')+'"><input name="investigationchkout" value="'+$('#'+preId).find('#Getdetailstableex_c').is(':checked')+'"><input name="preliminary_exout" value="'+$('#'+preId).find('#preExam').is(':checked')+'"><input name="vsisonreadingsout" value="'+$('#'+preId).find('#visionReading').is(':checked')+'"><input name="curspecout" value="'+$('#'+preId).find('#csp').is(':checked')+'"><input name="objectchkout" value="'+$('#'+preId).find('#Objref').is(':checked')+'"><input name="arkkchkout" value="'+$('#'+preId).find('#arKer').is(':checked')+'"><input name="manchkout" value="'+$('#'+preId).find('#manKer').is(':checked')+'"><input name="specchkout" value="'+$('#'+preId).find('#specor').is(':checked')+'"><input name="conlchkout" value="'+$('#'+preId).find('#clc').is(':checked')+'"><input name="pmtchkout" value="'+$('#'+preId).find('#pmtchk').is(':checked')+'"><input name="getexamination_treatmentplan_c" value="'+$('#'+preId).find('#getexamination_treatmentplan_c').is(':checked')+'"><input name="addEyePart_c" value="'+$('#'+preId).find('#addEyePart_c').is(':checked')+'"><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();}
}
function getalert()
{
     $('#select-all').on('click',function(){
        if(this.checked){
          var preId=$('#preIdvalue').val();
  //alert(preId);
$('#'+preId).find('#complaints_c').prop('checked', true);
$('#'+preId).find('#ophthalmic_history_c').prop('checked', true);
$('#'+preId).find('#medical_history_c').prop('checked', true);
$('#'+preId).find('#eye_comp_c').prop('checked', true);
$('#'+preId).find('#getdoctorprescription_c').prop('checked', true);
$('#'+preId).find('#Getdetailstableex_c').prop('checked', true);
$('#'+preId).find('#visionReading').prop('checked', true);
$('#'+preId).find('#preExam').prop('checked', true);
$('#'+preId).find('#Objref').prop('checked', true);
$('#'+preId).find('#csp').prop('checked', true);
$('#'+preId).find('#arKer').prop('checked',true);
$('#'+preId).find('#manKer').prop('checked', true);
$('#'+preId).find('#specor').prop('checked', true);
$('#'+preId).find('#clc').prop('checked', true);
$('#'+preId).find('#pmtchk').prop('checked', true);
$('#'+preId).find('#getexamination_treatmentplan_c').prop('checked', true);
$('#'+preId).find('#addEyePart_c').prop('checked', true);
$('#'+preId).find('#manKer').prop('checked', true);
        }else{
            var preId=$('#preIdvalue').val();
            $('#'+preId).find('#complaints_c').prop('checked', false);
$('#'+preId).find('#ophthalmic_history_c').prop('checked', false);
$('#'+preId).find('#medical_history_c').prop('checked', false);
$('#'+preId).find('#eye_comp_c').prop('checked', false);
$('#'+preId).find('#visionReading').prop('checked', false);
$('#'+preId).find('#getdoctorprescription_c').prop('checked', false);
$('#'+preId).find('#Getdetailstableex_c').prop('checked', false);
$('#'+preId).find('#preExam').prop('checked', false);
$('#'+preId).find('#Objref').prop('checked', false);
$('#'+preId).find('#csp').prop('checked', false);
$('#'+preId).find('#arKer').prop('checked',false);
$('#'+preId).find('#manKer').prop('checked', false);
$('#'+preId).find('#specor').prop('checked', false);
$('#'+preId).find('#clc').prop('checked', false);
$('#'+preId).find('#pmtchk').prop('checked', false);
$('#'+preId).find('#getexamination_treatmentplan_c').prop('checked', false);
$('#'+preId).find('#addEyePart_c').prop('checked', false);
$('#'+preId).find('#manKer').prop('checked', false);
        }
    });
}
    $(document).ready(function(){
   getalert();
    
   
});
</script>
<style>
                             
                              
                            
                              
                             .cat{
                             
                               background-color: #104068;
                               border-radius: 4px;
                               border: 1px solid #fff;
                               overflow: hidden;
                               float: left;
                             }
                             
                             .cat label {
                               float: left;
                               line-height: 2em;
                               width: 2em;
                               height: 2em;
                               cursor: pointer;
                             }
                             
                             .cat label span {
                               text-align: center;
                               padding: 3px 0;
                               display: block;
                             }
                             
                             .cat label input {
                               position: absolute;
                               display: none;
                               color: #fff !important;
                             }
                             /* selects all of the text within the input element and changes the color of the text */
                             .cat label input + span{color: #fff;}
                             
                             
                             /* This will declare how a selected input will look giving generic properties */
                             .cat input:checked + span {
                                 color: #ffffff;
                                 text-shadow: 0 0  6px rgba(0, 0, 0, 0.8);
                             }
                             
                             
                          
                             
                             .action input:checked + span{background-color: #F75A1B;}
                           </style>

  
