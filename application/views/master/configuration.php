<?php 
$path=base_url('template1/modern-admin/');
$profile_pic='';
?>  
<style type="text/css">
  #profile-container {
   width: 100%;
    overflow: hidden;
  
}
#imageUpload
{
    /*display: none;*/
}

#profileImage
{
    cursor: pointer;
}

#profile-container {
   width: 100%;
    overflow: hidden;
   
}

#profile-container img {
   width: 100%;
  
}


</style>    
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Configuration</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Configuration</a>
                                            </li>
                                          
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                               <form enctype="multipart/form-data" method="post" id="profilesave">
                                                 <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
             


                    <div class="row">
                                    <div class="col-md-3">
                                        <label>Company Code</label>
                                        <input type="text" name="printable_company_code" id="printable_company_code" class="form-control" value="<?php if(isset($getofficedata[0]['printable_company_code'])) print $getofficedata[0]['printable_company_code']; ?>">
                                    </div>
                                 
                                   

                                         <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="firstname">Financial year (Y/N): </label>
                                            <select class="form-control" name="fin_year_settings" id="fin_year_settings" onchange="changefinyear(this.value)">
                                                <option value="0">select</option>
                                                <option value="1" <?php if(isset($getofficedata[0]['fin_year_settings']) && $getofficedata[0]['fin_year_settings'] == 1) echo 'selected'; ?>>Yes</option>
                                                <option value="2" <?php if(isset($getofficedata[0]['fin_year_settings']) && $getofficedata[0]['fin_year_settings'] == 2) echo 'selected'; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-md-2 finyrcls" <?php if($getofficedata[0]['fin_year_settings']==0 || $getofficedata[0]['fin_year_settings']==2){?> style="display:none;"  <?php }?> >
                                         <div class="form-group">
                                            <label for="firstname">Financial year: </label>
                                            <?php
                                        // Get the current year
                                        $currentYear = date('Y');

                                        // Generate options for the past 5 years and the next 5 years
                                        $options = '';
                                        for ($i = -1; $i <= 5; $i++) {
                                            $startYear = $currentYear + $i;
                                            $endYear = $startYear + 1;
                                            $optionValue = substr($startYear, 2) . '-' . substr($endYear, 2);
                                            $optionText = $startYear . '-' . $endYear;

                                            if($getofficedata[0]['fin_year'])
                                            {
                                                if($getofficedata[0]['fin_year']==$optionValue)
                                                {
                                                     $options .= "<option value=\"$optionValue\" selected>$optionText</option>";
                                                }
                                                else
                                                {
                                                   if ($startYear == date('Y') && date('n') >= 4) {
                                                    $options .= "<option value=\"$optionValue\" >$optionText</option>";
                                                    } elseif ($startYear + 1 == date('Y') && date('n') < 4) {
                                                        $options .= "<option value=\"$optionValue\" >$optionText</option>";
                                                    } else {
                                                        $options .= "<option value=\"$optionValue\">$optionText</option>";
                                                    }  
                                                }
                                            }
                                            else
                                            {
                                                 // Check if it's the current financial year
                                                if ($startYear == date('Y') && date('n') >= 4) {
                                                    $options .= "<option value=\"$optionValue\" selected>$optionText</option>";
                                                } elseif ($startYear + 1 == date('Y') && date('n') < 4) {
                                                    $options .= "<option value=\"$optionValue\" selected>$optionText</option>";
                                                } else {
                                                    $options .= "<option value=\"$optionValue\">$optionText</option>";
                                                } 
                                            }
                                            
                                          
                                        }
                                        ?>
                                            <select class="form-control" name="fin_year" id="fin_year">
                                                <option value="0">select</option>
                                                 <?php echo $options; ?>
                                            </select>
                                        </div>
                                    </div>

                                      <div class="col-md-3 finyrcls" <?php if($getofficedata[0]['fin_year_settings']==0 || $getofficedata[0]['fin_year_settings']==2){?> style="display:none;"  <?php }?>>
                                         <div class="form-group">
                                            <label for="firstname">Starting Bill No: </label>
                                            <?php
                                           
function getCurrentFinancialYear() {
    // Get the current month and year
    $currentMonth = date('n');
    $currentYear = date('Y');

    // If the current month is January, the financial year starts from the current year
    // Otherwise, it starts from the previous year
    $startYear = $currentMonth == 1 ? $currentYear : $currentYear - 1;

    // The financial year ends on December 31st of the current year
    $endYear = $currentYear;

    // Format the financial year
    $startYearShort = substr($startYear, 2);
    $endYearShort = substr($endYear, 2);
    return $startYearShort . '-' . $endYearShort;
}

$currentFinancialYear = getCurrentFinancialYear();




                                            $codeno='OJO';
                                            if($getofficedata[0]['printable_company_code'])
                                            {
                                                $codeno='';
                                                $codeno.=$getofficedata[0]['printable_company_code'];
                                            }
                                            $codeno.='-'.$getofficedata[0]['apps_code'];
                                            $codeno.='-0001';

                                            $bar = $getofficedata[0]['fin_year'];
                                             if($bar){
                                         
                                           
                                            $codeno.='/'.$bar;
                                            }
                                            else
                                            {
                                               $codeno.='/'.$currentFinancialYear; 
                                            }
                                            ?>
                                           <input style="color: #3a44e1;
    font-size: 20px;" readonly type="text" name="starting_bill_no" value="<?php echo $codeno; ?>" id="starting_bill_no" class="form-control" placeholder="starting bill no">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                      <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="firstname">Patient Registration Billprint (Y/N): </label>
                                            <select class="form-control" name="pat_reg_billprint" id="pat_reg_billprint">
                                                <option value="0">select</option>
                                                <option value="1" <?php if(isset($getofficedata[0]['pat_reg_billprint']) && $getofficedata[0]['pat_reg_billprint'] == 1) echo 'selected'; ?>>Yes</option>
                                                <option value="2" <?php if(isset($getofficedata[0]['pat_reg_billprint']) && $getofficedata[0]['pat_reg_billprint'] == 2) echo 'selected'; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="firstname">Patient Registration Modeofpay (Y/N): </label>
                                            <select class="form-control" name="pat_mod" id="pat_mod">
                                                <option value="0">select</option>
                                                <option value="1" <?php if(isset($getofficedata[0]['pat_mod']) && $getofficedata[0]['pat_mod'] == 1) echo 'selected'; ?>>Yes</option>
                                                <option value="2" <?php if(isset($getofficedata[0]['pat_mod']) && $getofficedata[0]['pat_mod'] == 2) echo 'selected'; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="firstname">Patient Registration App type (Y/N): </label>
                                            <select class="form-control" name="app_type" id="app_type" >
                                                <option value="0">select</option>
                                                <option value="1" <?php if(isset($getofficedata[0]['app_type']) && $getofficedata[0]['app_type'] == 1) echo 'selected'; ?>>Yes</option>
                                                <option value="2" <?php if(isset($getofficedata[0]['app_type']) && $getofficedata[0]['app_type'] == 2) echo 'selected'; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="firstname">Patient Direct Doctor Login (Y/N): </label>
                                            <select class="form-control" name="direct_doctor" id="direct_doctor" >
                                                <option value="0">select</option>
                                                <option value="1" <?php if(isset($getofficedata[0]['direct_doctor']) && $getofficedata[0]['direct_doctor'] == 1) echo 'selected'; ?>>Yes</option>
                                                <option value="2" <?php if(isset($getofficedata[0]['direct_doctor']) && $getofficedata[0]['direct_doctor'] == 2) echo 'selected'; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="firstname">Default Medicine: </label>
                                            <select class="form-control" name="load_medicine" id="load_medicine" >
                                               
                                                <option value="1" <?php if(isset($getofficedata[0]['load_medicine']) && $getofficedata[0]['load_medicine'] == 1) echo 'selected'; ?>>EMR</option>
                                                <option value="2" <?php if(isset($getofficedata[0]['load_medicine']) && $getofficedata[0]['load_medicine'] == 2) echo 'selected'; ?>>Pharmacy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                 


           
         
                                    
                              
                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="saveconfig();">Submit</button>
                                    
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
          <script type="text/javascript">
     $("#imageUpload").change(function(){
     // alert("df");
    var file_size = $(this)[0].files[0].size;
  if(file_size>1000000) {
    alert("File size is greater than 1MB");
    $(this).val('');
  }
});

//      $("#profileImage").click(function(e) {
//     $("#imageUpload").click();
// });
</script>

<script type="text/javascript">
      function changefinyear(val)
    {
       if(val==2)
       {
        $('.finyrcls').hide();
       }
       else if(val==1)
       {
        $('.finyrcls').show();
       }
       else
       {
        $('.finyrcls').hide();
       }
      
    }
  $("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});


$('#nabh_logo').click(function() {
    $('#nabh_logo').change(function() {
        var filename = $('#nabh_logo').val();
        $('#nabh_logo_hid').html(filename);
    });
});


function saveconfig()
{    
       
        let data = new FormData($("#profilesave")[0]);
        $("#overlay").fadeIn(300);
        saveurl="Configuration/saveprofile";
         $.ajax({
            type: "POST",
            url: saveurl,
            dataType: "json",
            data: data,
            contentType: false,       
            cache: false,             
            processData:false, 
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               
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
          