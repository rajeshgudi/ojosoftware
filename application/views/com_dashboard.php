<?php
$path=base_url('template1/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OJO Dashboard</title>
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
 <style>
    .box {
      background-color: #fff;
      border: 1px solid #ced4da;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      text-align: center;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .box:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .box h3 {
      color: #343a40;
      margin-top: 10%;
      font-weight: bold;
    }

    .col-centered {
      text-align: center;
    }

    .color-box img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin: 0 auto 10px;
    }

    .heading {
      background: linear-gradient(to right, #4CAF50, #FFC107);
      color: white;
      padding: 20px;
      border-radius: 8px;
      text-align: center;
      margin-bottom: 30px;
    }

    /* Remove default link styles */
    .box a {
      text-decoration: none;
      color: inherit;
    }
    p{
      color: black;
    }

    /* Adjust link color on hover */
    .box a:hover {
      color: inherit;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-centered">
      <h1 class="heading">Dashboard <i onclick="logout()" title="logout" style="float: right;font-size: 35px;cursor: pointer;" class="la la-sign-out"></i></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="box" style="background-color: #ff6b6b;">
        <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>EMR</h3>
        <p>Click here <b><c onclick="clickgotodashboard(1,1)"  style="text-decoration: underline;cursor: pointer;">Admin Dashboard</c></b>.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box" style="background-color: #feca57;">
         <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>EMR</h3>
        <p>Click here <b><c onclick="clickgotodashboard(1,3)" style="text-decoration: underline;cursor: pointer;">OPTO Dashboard</c></b>.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box" style="background-color: #48dbfb;">
        <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>EMR</h3>
       <p>Click here <b><c  onclick="cliklistdoc()" style="text-decoration: underline;cursor: pointer;">Listing Doctor</c></b>.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box" style="background-color: #1dd1a1;">
        <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>EMR</h3>
       <p>Click here <b><c  onclick="clickgotodashboard(1,6)" style="text-decoration: underline;cursor: pointer;">Coun Dashboard</c></b>.</p>
      </div>
    </div>
    <div class="col-md-3" style="visibility: hidden;">
      <div class="box" style="background-color: #ff7979;">
         <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>Box 6</h3>
        <p>This is the content of box 6.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box" style="background-color: #ff9f43;">
        <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>OPTICAL</h3>
       <p>Click here <b><c  onclick="clickgotodashboard(2,1)" style="text-decoration: underline;cursor: pointer;">Admin Sales Page</c></b>.</p>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="box" style="background-color: #badc58;">
       <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
         <h3>PHARMACY</h3>
       <p>Click here <b><c  onclick="clickgotodashboard(3,1)" style="text-decoration: underline;cursor: pointer;">Admin Sales Page</c></b>.</p>
      </div>
    </div>
    <div class="col-md-3" style="visibility: hidden;">
      <div class="box" style="background-color: #6ab04c;">
        <div class="color-box"><img src="<?=$path?>app-assets/images/backgrounds/logo.jpg" alt="Box 1"></div>
        <h3>Box 8</h3>
        <p>This is the content of box 8.</p>
      </div>
    </div>
  </div>
</div>



                                   

                                                    <!-- Modal -->
                                                   <div id="up_modal" class="modal fade" role="dialog">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i>Doctors List</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                       <div class="content-body">
                <div id="doctors-list">

                    <div class="row match-height" id="doc_list_v">
                       
                      
                    </div>
                </div>

            </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                               

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
<script type="text/javascript">
   function cliklistdoc()
  {
       var urlchk = "Common_dashboard/getalldoc";    
        var secret_key="<?php echo $this->security->get_csrf_hash(); ?>";
         $("#overlay").fadeIn(300);
          $.ajax({
            url: urlchk,
            type: "post",
            dataType: 'json',
            data: {csrf_test_name:secret_key},
            success: function (data) {
                   $("#overlay").fadeOut(300);  
                   $('#up_modal').modal('show');
                   if(data.msg)
                    {
                      $('#doc_list_v').html(data.datadoc); 
                    }
                         
            },
            error: function (error) {
              
            }

        });
  }
  function clickgotodashboard(apps,usertype,docid=0)
  {
    if(apps>0 && usertype>0)
    {
       var urlchk = "Common_dashboard/gotodasboard";    
        var secret_key="<?php echo $this->security->get_csrf_hash(); ?>";
         $("#overlay").fadeIn(300);
          $.ajax({
            url: urlchk,
            type: "post",
            dataType: 'json',
            data: {csrf_test_name:secret_key,apps:apps,usertype:usertype,docid:docid},
            success: function (data) {
                   $("#overlay").fadeOut(300);  
                  
                   if(data.msg)
                    {
                      //alert(data.url);
                      window.location =data.url; 
                    }
                         
            },
            error: function (error) {
              
            }

        });
    }
  }
  function logout() 
  {
       var urlchk = "Common_dashboard/logout";    
        var secret_key="<?php echo $this->security->get_csrf_hash(); ?>";
         $("#overlay").fadeIn(300);
          $.ajax({
            url: urlchk,
            type: "post",
            dataType: 'json',
            data: {csrf_test_name:secret_key},
            success: function (data) {
                   $("#overlay").fadeOut(300);  
                  
                   if(data.msg)
                    {
                      window.location =data.url; 
                    }
                         
            },
            error: function (error) {
              
            }

        });
  }
</script>
</body>
</html>
