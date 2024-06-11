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
    <title><?php print $title; ?></title>
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?=$path?>app-assets/images/logo/logo.png">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/vendors.min.css">
     <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/forms/selects/selectivity-full.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/bootstrap.css?ver=1.2">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/components.css?ver=1.2">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/pages/hospital.css">
      <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/plugins/forms/selectivity/selectivity.min.css">
     <link rel="stylesheet" type="text/css" href="<?=$path?>app-assets/css/plugins/ui/jqueryui.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$path?>assets/css/style.css">
    <!-- END: Custom CSS-->


  <script src="<?=$path?>app-assets/vendors/js/vendors.min.js"></script>
   <script src="<?=$path?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>


      <script src="<?=$path?>app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
    <script src="<?=$path?>app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
    <!-- END: Theme JS-->
   
    <!-- BEGIN: Page JS-->
        <script src="<?=$path?>app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
    <script src="<?=$path?>app-assets/js/scripts/pages/hospital-patients-list.js"></script>

 
 <script src="<?=$path?>app-assets/js/scripts/ui/jquery-ui/buttons-selects.min.js"></script>

    

    
   
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
<div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
    </div>
<?php
$this->load->view("includes/header",['path'=>$path]);
        ?>
  <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <?=$content?>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <div id="chatsheet_pat" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="div_moda_chartsheet_pat">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button"  class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php
$this->load->view("includes/footer");
        ?>



    <!-- END: Page JS-->

</body>
<!-- END: Body-->
<style type="text/css">
    .swal2-popup .swal2-title {
    font-size: 1.175em;
}
.swal2-popup #swal2-content {
    
    font-family: sans-serif;
}
.btn-min-width {
    min-width: 3.5rem;
}

</style>
     <!-- BEGIN: Vendor JS-->
  
    <!-- BEGIN Vendor JS-->
<script src="<?=$path?>app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
     
    <script src="<?=$path?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->
   <script src="<?=$path?>app-assets/vendors/js/charts/chart.min.js"></script>
    <!-- BEGIN: Theme JS-->
    <script src="<?=$path?>app-assets/js/core/app-menu.js"></script>
    <script src="<?=$path?>app-assets/js/core/app.js"></script>
  

      <script src="<?=$path?>app-assets/js/scripts/master.js"></script>

<script src="<?=$path?>app-assets/js/scripts/forms/switch.min.js"></script>

<script type="text/javascript">
    function loadpatdataser_new(val=1)
    {
          
            var ggg='<?php echo $this->security->get_csrf_hash(); ?>';
                $(".clientname_pat").select2({
                 ajax: { 
                    url: '<?php echo base_url(); ?>master/Common_controller/searchclient_pat',
                   type: "post",
                   dataType: 'json',
                   delay: 250,
                   data: function (params) {
                      return {
                        searchTerm: params.term,
                        serpat_v:val, 
                        csrf_test_name:ggg  // search term
                      };
                   },
                   processResults: function (response) {
                      return {
                         results: response
                      };
                   },
                   cache: true
                 }
             });
    }
    
        function getselectedval(val)
        {
            loadpatdataser_new(val);
        }
$(document ).ready(function() {
    loadpatdataser_new(1);
});

function search_patientsheet(mrd)
{
    $('#chatsheet_pat').modal('show');
    $('.modal-title').html('Patient Preview');
    serachmrdno_chartmrd(mrd);
}

function serachmrdno_chartmrd(mrd)
    {
        if(mrd)
        {
            var chart_csrf='<?php echo $this->security->get_csrf_hash(); ?>';
            $('#show_data_mrd').html('');
                $("#overlay").fadeIn(300);
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/Case_history_preview/Get_MRD_Details',
                    dataType: "json",
                    data: {
                        mrd: mrd,
                        csrf_test_name: chart_csrf
                    },
                    success: function(data) {
                        $("#overlay").fadeOut(300);
                        if (data.msg != '') {
                            $('#div_moda_chartsheet_pat').html(data.showdata);
                         
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
</script>
</html>