<?php
$path=base_url('template1/');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="EMR">
    <meta name="keywords" content="EMR">
    <meta name="author" content="EMR">
    <title>Common Login</title>
    <link rel="apple-touch-icon" href="<?=$path?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?=$path?>app-assets/images/backgrounds/logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/material-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/material-colors.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/colors.min.css">


    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/core/colors/palette-gradient.min.css">
   
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/pages/login-register.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->
<style type="text/css">
    input.form-control, select.form-control {
          border-bottom: 1px solid rgba(0, 0, 0, 0.3);
          border: 1px solid #dadada;
  }
  .swal2-popup #swal2-content {
    text-align: center;
    font-weight: 600;
}
#button{
  display:block;
  margin:20px auto;
  padding:10px 30px;
  background-color:#eee;
  border:solid #ccc 1px;
  cursor: pointer;
}
#overlay{   
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
.swal2-popup .swal2-title {
    font-size: 20px;
}
</style>
<!-- BEGIN: Body-->

<body style="background: url(../template1/app-assets/images/backgrounds/com.jpg);background-repeat: no-repeat;
  background-size: auto; background-size: 100% 100%;" class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 1-column  bg-full-screen-image blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
    </div>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
        </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
            <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-3 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <h3 style="color: red"><b>OJO</b></h3>
                                    </div>
                                   
                                </div>
                                <div class="card-content">
                                  
                                   
                                    <div class="card-body">
                                         <form id="form_login" action="#" method="post" autocomplete="off"> 
                                             <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>">      
                                             <fieldset class="form-group position-relative has-icon-left" style="display:none;">
                                             
                                                <select class="form-control" name="select_login_type" id="select_login_type">
                                                  
                                                    <option value="1" <?php if(isset($_COOKIE["utype_com"])) { if($_COOKIE["utype_com"]==1) echo 'selected'; } ?>>Admin</option>
                                                    <option value="2" <?php if(isset($_COOKIE["utype_com"])) { if($_COOKIE["utype_com"]==2) echo 'selected'; } ?>>Staff</option>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="text_login_username" name="text_login_username" maxlength="30" placeholder="Your Username" value="<?php if(isset($_COOKIE["name_com"])) { echo $_COOKIE["name_com"]; } ?>">
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="text_login_password" name="text_login_password" maxlength="20" placeholder="Enter Password"  value="<?php if(isset($_COOKIE["password_com"])) { echo $_COOKIE["password_com"]; } ?>">
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                    <fieldset>
                                                        <input type="checkbox" name="remember" id="remember-me" class="chk-remember" value="1" checked>
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                            
                                            </div>
                                            <button type="button" class="btn btn-outline-info btn-block" onClick="comlogin();"><i class="ft-unlock"></i> Login</button>
                                            <?php
                                                $salt_str=$salt ?? '';  
                                                echo '<input type="hidden" id="salt_string" name="salt_string" value="'.$salt_str.'">';
                                            ?> 
                                            <br/>
                             <div class="alert bg-danger alert-dismissible mb-2" role="alert" id="error" style="display: none;">
                               
                            </div>
                            <div class="alert bg-success alert-dismissible mb-22" role="alert" id="success" style="display: none;">
                                    
                            </div> 
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?=$path?>app-assets/vendors/js/material-vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=$path?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
     <script src="<?=$path?>app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=$path?>app-assets/js/core/app-menu.js"></script>
    <script src="<?=$path?>app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=$path?>app-assets/js/scripts/pages/material-app.js"></script>
    <script src="<?=$path?>app-assets/js/scripts/forms/form-login-register.js"></script>
    <script src="<?=$path?>app-assets/js/scripts/common.js"></script>
    <!-- END: Page JS-->
   
</body>
<!-- END: Body-->
<script type="text/javascript">
    function comlogin()
{
        if($("#text_login_username").val()=='' ||  $("#text_login_password").val()=='') {
           // Swal.fire({title:"Info!",text:"Please enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
            $('#error').delay(300).fadeIn('slow');
            $('#error').html("Please enter all fields !");
            $('#error').delay(2000).fadeOut('slow');
            return false;
        }   
        var saltstr=$("#salt_string").val(); 
        if(saltstr==''){
            Swal.fire({title:"Info!",text:"Security Violation Occured !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
            return false;
        }
        var username=$("#text_login_username").val();
        var pass=$("#text_login_password").val(); 
        var form = $("#form_login");
        var urlchk = "Clogin/checklogin";    
        var secret_key="<?php echo $this->session->userdata('secret_key'); ?>";
         $("#overlay").fadeIn(300);
          $.ajax({
            url: urlchk,
            type: "post",
            dataType: 'json',
            data: form.serialize(), // serializes the form's elements.
            success: function (data) {
                   $("#overlay").fadeOut(300);  
                  
                   if(data.msg)
                    {
                    $('#success').delay(300).fadeIn('slow');
                    $('#success').html("Login Successfully");
                    $('#success').delay(2000).fadeOut('slow');
                      window.location =data.url; 
                    }
                    else if(data.error)
                    {
                       var error = data.error;
                      var err_str = '';
                      for (var key in error) {
                      err_str += error[key];
                      }
                        $('#error').delay(300).fadeIn('slow');
                        $('#error').html(err_str);
                        $('#error').delay(2000).fadeOut('slow');
                    }
                      else if(data.error_message) {
                        var error = data.error_message;
                        var err_str = '';
                        for (var key in error) {
                          err_str += error[key];
                        }
                       // swal(err_str,{icon:"error"});
                        $('#error').delay(300).fadeIn('slow');
                        $('#error').html(err_str);
                        $('#error').delay(2000).fadeOut('slow');
                      }      
            },
            error: function (error) {
               // Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                $('#error').delay(300).fadeIn('slow');
                $('#error').html("Network Busy");
                $('#error').delay(2000).fadeOut('slow');
                $("#overlay").fadeOut(300);          
            }

        });

       
}
</script>
</html>