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
                    url: 'Psychiatrist_case_history_preview/Get_MRD_Details',
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
                url: '<?php echo base_url() ?>master/Psychiatrist_case_history_preview/getexaminationpreview',
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
function getalert()
{
    $('#select-all').on('click',function(){
        if(this.checked){
        var preId=$('#preIdvalue').val();
        for (var i = 1; i <= 12; i++) 
        {
            $('#'+preId).find('#popupchk'+i).prop('checked', true);
        }

        }else{
        var preId=$('#preIdvalue').val();
        for (var i = 1; i <= 12; i++) 
        {
            $('#'+preId).find('#popupchk'+i).prop('checked', false);
        }

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

  
