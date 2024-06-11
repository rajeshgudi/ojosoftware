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
                                <h4 class="card-title">Vision Certificate</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                                 <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                         <div class="row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-4">
                                                                <input style="height: 43px;" type="date" name="search_date" id="insearch_date" class="form-control search_date">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button onclick="getsaveddetails()" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                                            </div>
                                                        </div>
                                                           <div  id="inprogress">
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
                    getsaveddetails();
                });

   function getsaveddetails() 
{
     urld='<?php echo base_url() ?>transaction/Examination/getsavedexamionationexvis';
     $("#overlay").fadeIn(300);
     $.fn.dataTable.ext.errMode = 'none';
     $.ajax({
            type: "POST",
            url: urld,
            dataType: "json",
            data: {sdate:$('#insearch_date').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){

                $('#inprogress').html(data.msg);
                  var table = $('#tablepro').DataTable( {
       
        buttons: [  ],
       
        dom: 'Blfrtip',
        columnDefs: [ {
               
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
        }]
    } );
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

  function printcertificate(examin_id){
         $('<form   method="post" action="<?php echo base_url() ?>transaction/Examination/printcertificated/"><input name="examin_id" value="'+examin_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }
            </script>

        