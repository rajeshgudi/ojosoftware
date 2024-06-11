<?php 
$path=base_url('template1/modern-admin/');
?>  
    <input type="hidden" id="activeproceduredata"> 
 <div class="content-body">
             <!-- Justified With Top Border start -->
                 <section id="basic-tabs-components">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <input type="hidden" id="preopform" value="0">
                                <h4 class="card-title">Counseling</h4>
                                </div>
                                <form id="updatestatus_form" method="post">
                                <div id="updatestatus_data"></div>
                                  
                               </form> 
                               <div id="com_data"></div>
                                 <input type="hidden" name="csrf_test_name" id="csrf_test_name"  value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>

                               
                                        <ul class="nav nav-pills nav-pill-toolbar nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="active2-pill1" data-toggle="pill" href="#active21"
                                        aria-expanded="true"><l id="tab_tit">Surgical<l></a>
                                            </li>
                                            <li class="nav-item">
                                               <a class="nav-link" id="link2-pill1" data-toggle="pill" href="#link21" aria-expanded="false">Laser</a>
                                            </li>

                                            <li class="nav-item">
                                               <a class="nav-link" id="link3-pill1" data-toggle="pill" href="#link31" aria-expanded="false">Injection</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="link4-pill1" data-toggle="pill" href="#link41" aria-expanded="false">Investigation</a>
                                            </li>
                                        </ul>
 
                              

                                        <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane active" id="active21" aria-labelledby="active2-pill1"
                                      aria-expanded="true">


                             <ul class="nav nav-tabs nav-top-border no-hover-bg">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="surbaseIcon-tab11" data-toggle="tab" aria-controls="surtabIcon11"
                                      href="#surtabIcon11" aria-expanded="true"> Open</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="surbaseIcon-tab12" data-toggle="tab" aria-controls="surtabIcon12" href="#surtabIcon12"
                                      aria-expanded="false">Pending</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="surbaseIcon-tab13" data-toggle="tab" aria-controls="surtabIcon13" href="#surtabIcon13"
                                      aria-expanded="false">Completed</a>
                                  </li>
                                   <li class="nav-item">
                                    <a class="nav-link" id="surbaseIcon-tab14" data-toggle="tab" aria-controls="surtabIcon14" href="#surtabIcon14"
                                      aria-expanded="false">Cancelled</a>
                                  </li>
                            </ul>

                             <div class="tab-content px-1 pt-1">
                                  <div role="tabpanel" class="tab-pane active" id="surtabIcon11" aria-expanded="true"
                                    aria-labelledby="surbaseIcon-tab11">
                                       
                                         <div class="row">
                                          <div class="col-md-4">
                                             <input style="height: 43px;" type="date" name="sur_open_date0" id="sur_open_date0" class="form-control search_date">
                                          </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_open_date" id="sur_open_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button onclick="gettreatmentplan(2,1,0)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="sur_open_data"></div>
                                            </div>

                                  </div>
                                  <div class="tab-pane" id="surtabIcon12" aria-labelledby="surbaseIcon-tab12">

                                       <div class="row">
                                           <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_pending_date0" id="sur_pending_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_pending_date" id="sur_pending_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                              <button  class="btn btn-icon btn-warning mr-1 mb-1" onclick="gettreatmentplan(2,2,1)" type="button"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="sur_pending_data"></div>
                                            </div>

                                  </div>
                                  <div class="tab-pane" id="surtabIcon13" aria-labelledby="surbaseIcon-tab13">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_completed_date0" id="sur_completed_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_completed_date" id="sur_completed_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                              <button  class="btn btn-icon btn-warning mr-1 mb-1" onclick="gettreatmentplan(2,3,2)" type="button"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="sur_completed_data"></div>
                                            </div>
                                  </div>
                                  <div class="tab-pane" id="surtabIcon14" aria-labelledby="surbaseIcon-tab14">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_cancel_date0" id="sur_cancel_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="sur_cancel_date" id="sur_cancel_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button onclick="gettreatmentplan(2,4,3)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="sur_cancel_data"></div>
                                            </div>
                                  </div>
                            </div>

















                                               
                                                

                                            </div>

                                            <!-- 2 nd tab -->

                   <div class="tab-pane" id="link21" role="tabpanel" aria-labelledby="link2-pill1" aria-expanded="false">

                              <ul class="nav nav-tabs nav-top-border no-hover-bg">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="lasbaseIcon-tab11" data-toggle="tab" aria-controls="lastabIcon11"
                                      href="#lastabIcon11" aria-expanded="true"> Open</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="lasbaseIcon-tab12" data-toggle="tab" aria-controls="lastabIcon12" href="#lastabIcon12"
                                      aria-expanded="false">Pending</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="lasbaseIcon-tab13" data-toggle="tab" aria-controls="lastabIcon13" href="#lastabIcon13"
                                      aria-expanded="false">Completed</a>
                                  </li>
                                   <li class="nav-item">
                                    <a class="nav-link" id="lasbaseIcon-tab14" data-toggle="tab" aria-controls="lastabIcon14" href="#lastabIcon14"
                                      aria-expanded="false">Cancelled</a>
                                  </li>
                            </ul>

                             <div class="tab-content px-1 pt-1">
                                  <div role="tabpanel" class="tab-pane active" id="lastabIcon11" aria-expanded="true"
                                    aria-labelledby="lasbaseIcon-tab11">
                                       
                                         <div class="row">
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_open_date0" id="las_open_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_open_date" id="las_open_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(3,1,0)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="las_open_data"></div>
                                            </div>

                                  </div>
                                  <div class="tab-pane" id="lastabIcon12" aria-labelledby="lasbaseIcon-tab12">

                                       <div class="row">
                                          <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_pending_date0" id="las_pending_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_pending_date" id="las_pending_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(3,2,1)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="las_pending_data"></div>
                                            </div>

                                  </div>
                                      <div class="tab-pane" id="lastabIcon13" aria-labelledby="lasbaseIcon-tab13">
                                           <div class="row">
                                           <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_completed_date0" id="las_completed_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_completed_date" id="las_completed_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(3,3,2)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="las_completed_data"></div>
                                            </div>
                                      </div>
                                      <div class="tab-pane" id="lastabIcon14" aria-labelledby="lasbaseIcon-tab14">
                                       <div class="row">
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_cancel_date0" id="las_cancel_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="las_cancel_date" id="las_cancel_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(3,4,3)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="las_cancel_data"></div>
                                            </div>
                                      </div>
                            </div>


                   </div>

                      <!-- 3rd nd tab -->
                     <div class="tab-pane" id="link31" role="tabpanel" aria-labelledby="link3-pill1" aria-expanded="false">

                             <ul class="nav nav-tabs nav-top-border no-hover-bg">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="injbaseIcon-tab11" data-toggle="tab" aria-controls="injtabIcon11"
                                      href="#lastabIcon11" aria-expanded="true"> Open</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="injbaseIcon-tab12" data-toggle="tab" aria-controls="injtabIcon12" href="#injtabIcon12"
                                      aria-expanded="false">Pending</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="injbaseIcon-tab13" data-toggle="tab" aria-controls="injtabIcon13" href="#injtabIcon13"
                                      aria-expanded="false">Completed</a>
                                  </li>
                                   <li class="nav-item">
                                    <a class="nav-link" id="injbaseIcon-tab14" data-toggle="tab" aria-controls="injtabIcon14" href="#injtabIcon14"
                                      aria-expanded="false">Cancelled</a>
                                  </li>
                            </ul>

                             <div class="tab-content px-1 pt-1">
                                  <div role="tabpanel" class="tab-pane active" id="injtabIcon11" aria-expanded="true"
                                    aria-labelledby="injbaseIcon-tab11">
                                       
                                         <div class="row">
                                           <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_open_date0" id="inj_open_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_open_date" id="inj_open_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(4,1,0)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="inj_open_data"></div>
                                            </div>

                                  </div>
                                  <div class="tab-pane" id="injtabIcon12" aria-labelledby="injbaseIcon-tab12">

                                       <div class="row">
                                           <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_pending_date0" id="inj_pending_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_pending_date" id="inj_pending_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(4,2,1)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="inj_pending_data"></div>
                                            </div>

                                  </div>
                                      <div class="tab-pane" id="injtabIcon13" aria-labelledby="injbaseIcon-tab13">
                                           <div class="row">
                                           <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_completed_date0" id="inj_completed_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_completed_date" id="inj_completed_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(4,3,2)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="inj_completed_data"></div>
                                            </div>
                                      </div>
                                      <div class="tab-pane" id="injtabIcon14" aria-labelledby="injbaseIcon-tab14">
                                       <div class="row">
                                       <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_cancel_date0" id="inj_cancel_date0" class="form-control search_date">
                                            </div>
                                            <div class="col-md-4">
                                                <input style="height: 43px;" type="date" name="inj_cancel_date" id="inj_cancel_date" class="form-control search_date">
                                            </div>
                                         
                                            <div class="col-md-2">
                                                <button  class="btn btn-icon btn-warning mr-1 mb-1" type="button" onclick="gettreatmentplan(4,4,3)"><i class="la la-search"></i></button>
                                            </div>
                                             
                                            </div>

                                             <div class="row">
                                                 <div class="col-md-12" id="inj_cancel_data"></div>
                                            </div>
                                      </div>
                            </div>

                     </div>

                     <!-- 4th nd tab -->
                        <div class="tab-pane" id="link41" role="tabpanel" aria-labelledby="link4-pill1" aria-expanded="false">

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


  <form id="com_form_new" action="#" method="post">
       <input type="hidden" name="csrf_test_name"   value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div  id="com_form_id" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <input type="hidden" id="examination_treamentplat_id">
                        <input type="hidden" id="examination_id">
                        <input type="hidden" id="charges_id">
                    </div>
                    <div class="modal-body" id="com_sec" >
                       
                    </div>
                    <div class="modal-footer">
                    
                    <button  class="btn btn-primary btn-sm" type="button" onclick="savecompopup()"><i class="fas fa-plus-square"></i>Submit & Print</button>
                     <button type="button" id="mclose" class="btn btn-danger btn-sm cls comclse" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


      <form id="com_form_new1" action="#" method="post">
       <input type="hidden" name="csrf_test_name"   value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div  id="com_form_id1" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <input type="hidden" id="examination_treamentplat_id1">
                        <input type="hidden" id="examination_id1">
                        <input type="hidden" id="charges_id1">
                    </div>
                    <div class="modal-body" id="com_sec1" >
                       
                    </div>
                    <div class="modal-footer">
                    
                    <button  class="btn btn-primary btn-sm" type="button" onclick="savecompopup1()"><i class="fas fa-plus-square"></i>Submit & Print</button>
                     <button type="button" id="mclose" class="btn btn-danger btn-sm cls comclse" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="com_form_new2" action="#" method="post">
       <input type="hidden" name="csrf_test_name"   value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div  id="com_form_id2" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <input type="hidden" id="examination_treamentplat_id2">
                        <input type="hidden" id="examination_id2">
                        <input type="hidden" id="charges_id2">
                    </div>
                    <div class="modal-body"  >
                       <div id="com_sec2"></div>

                        
                                   
                                    <div id="addmed_modal_view">
                                    <div class="row form-group" style="display:none;">
                                        <div class="col-md-4">
                                            <label>Type</label>
                                            <select class="form-control" name="typeaction" id="typeaction" onchange="typeofmedicineaction(this.value);">
                                                <option value="0">EMR</option>
                                                <option value="1">PHARMACY</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row" id="emr_action">
                                            <div class="col-md-6">
                                                <label>Select Medicine<span class="text-danger">*</span></label>
                                                <select style="width:100%;" class="form-control select2" name="medicine_id" id="medicine_id" onchange="getallmedicine(this.value)">
                                                    <option value="">Select Medicine</option>
                                                    <?php if ($getallmedicine) foreach ($getallmedicine as $data) { ?>
                                                        <option value="<?php echo $data['medicine_id']; ?>"><?php echo $data['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Medicine Templates: <span class="text-danger">*</span></label>
                                                    <select style="width:100%;" class="form-control select2" id="medicine_templates_id" name="medicine_templates_id" onchange="selecttemp(this.value)">
                                                        <option value="">Select Medicine Templates</option>
                                                        <?php if ($medtemplates) foreach ($medtemplates as $data) { ?>
                                                            <option value="<?php echo $data['medicine_templates_id']; ?>"><?php echo $data['name']; ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row" id="pharmacy_action" style="display:none;">
                                             <div class="col-md-12">
                                                 <label>Search Medicine</label>
                                                <input type="text" style="background: #0abdef;" name="" class="form-control" id="pro_name" onkeyup="loadautocomplete($(this).val(),1)" onkeydown="add_focus_to_first(event)" autocomplete="off">
                                             </div>

                                             
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <div class="table-responsive">
                                                        <table class="table table-bquotationed">
                                                            <thead class="lookuphead" id="frame_section">
                                                                <tr>
                                                                    <th>Item Name</th>
                                                                    <th>Batch No</th>
                                                                    <th>Expiry Date</th>
                                                                    <th>MRP</th>
                                                                    <th>SP</th>
                                                                    <th>Stock</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="sugession">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                      

                                         </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="productdetails_tabs">
                                                        <thead>
                                                            <tr>
                                                                <th>Drug Name</th>
                                                                <th>Instruction</th>
                                                                <th>No.days</th>
                                                                <th>Qty</th>
                                                                <th>Eye</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <div id="search_result"></div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="col-md-6">
                                                <label>Medicine Remarks</label>
                                                <textarea class="form-control" name="medicine_doc_remarks" id="medicine_doc_remarks"></textarea>
                                            </div>
                                        </div>
                                        <div id="pre_ins"></div>
                                       
                                    </div>
                                </form>

                    </div>
                    <div class="modal-footer">
                    
                    <button  class="btn btn-primary btn-sm" type="button" onclick="savecompopup2()"><i class="fas fa-plus-square"></i>Submit & Print</button>
                     <button type="button" id="mclose" class="btn btn-danger btn-sm cls comclse" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

          <script type="text/javascript">
             row_num = 1;
          $(document ).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
        $('.search_date').val(cd);
    });

          function showmodal() {
              $('#modaldiv_modal').modal('show');
         }
csrf=$('#csrf_test_name').val();

function updatestatus(val,flag,examination_id='')
{
    //alert(examination_id);
    if(val>0)
    {
         proceduredata=$('#datalistparti_'+examination_id).val();
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling/updatestatus',
            dataType: "json",
            data: {proceduredata: proceduredata,flag: flag,getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#updatestatus_data').html(data.msg);
                 $('#div_modal').modal('show');
                 $('.modal-title').html('Update Counseling Status');
                 getparticularstreatmentplan($('#trchargetype_id').val(),examination_id,data.followup_date,data.date_on,data.sur_date,data.other_eye);
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

function getparticularstreatmentplan(val,examination_id='',folupdate='',dateon='',surdate='',other_eye='')
{
    <?php
$path=base_url('template1/');
?>
   

 proceduredata=$('#datalistparti_'+examination_id).val();
 $('#activeproceduredata').val(proceduredata);

    if(val>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/getparticulars_sec',
            dataType: "json",
            data: {proceduredata: proceduredata,getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#update_procedure').html(data.msg);
                $(".select2").select2();
                cd = (new Date()).toISOString().split('T')[0];
                $('.treatmentplan_date').val(cd);
               if(folupdate)
               {
                $('#followup_date').val(folupdate);
               }
               if(dateon)
               {
                $('#date_on').val(dateon);
               }
               if(surdate)
               {
                $('#sur_date').val(surdate);
               }
                if(other_eye)
               {
                $('#other_eye').val(other_eye);
               }
                selpar=$('#selpart').val();
                var mf = [];
                var array = $('#selpart').val().split(",");
                $.each(array,function(i){
                      let arrayas = [array[i]];
                  // alert(array[i]);
                   mf.push(array[i]);
                });
              
// alert(mf);
                var scriptTag = document.createElement("script");
                scriptTag.src = "<?php echo $path; ?>app-assets/js/scripts/ui/jquery-ui/buttons-selects.min.js";
                document.getElementsByTagName("head")[0].appendChild(scriptTag);
                // if(selpar){
                  
                // $("#update_procedure").val(mf).select2();
                // }


                                    var newArray = proceduredata.split(",");
                                    newArray = newArray.map(function(value) {
                                    return parseInt(value, 10);
                                });
                            newArray.unshift(proceduredata);

setTimeout(() => { 
           $('#update_procedure').val(newArray).trigger("change");
        }, 
        1000 
    ); 
                               


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

function getparticularstreatmentplann(val)
{
    <?php
$path=base_url('template1/');
?>
   



    if(val>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/getparticulars_sec',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#particular_type').html(data.msg);
                $(".select2").select2();
               
               
               
//                 var mf = [];
//                 var array = $('#selpart').val().split(",");
//                 $.each(array,function(i){
//                       let arrayas = [array[i]];
//                   // alert(array[i]);
//                    mf.push(array[i]);
//                 });
              
// // alert(mf);
               
//                 if(selpar){
                  
//                 $("#particular_type").val(mf).select2();
//                 }

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


function getdataval(val)
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/getdataval',
            dataType: "json",
            data: {csrf_test_name:$('#csrf_test_name').val(),surgery_id:val,chargeid:$('#trchargetype_id').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#particular_type').html(data.msg);
                $(".select2").select2();
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

function submitpreop()
{
    $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/savepreop',
            dataType: "json",
            data:$('#preoperative_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                Swal.fire({title:"success",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                $('#preopform').val(1);
                $('#savep').click();
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
function getnewmodal()
{
    $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling/comnewfunction',
            dataType: "json",
            data: {chargeid:$('#trchargetype_id').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#com_data').html(data.msg);
                 $('#div_modalcom').modal('show');
                 $('.modal-titles').html('New Preoperative Appointment');
                 cd = (new Date()).toISOString().split('T')[0];
                $('.treatmentplan_date').val(cd);
                $('#paitent_name').val($('#pat_hidname').val());
                $('#prefered_phone').val($('#pat_hidmbl').val());
                $('#prepaitent_name').val($('#pat_hidname').val());
                $('#mrdno').val($('#pat_hidmrd').val());
                $('#preprefered_phone').val($('#pat_hidmbl').val());
                $('#pretreamentplan_id').val($('#treamentplan_id').val());
                $('#patidval_pre').val($('#patidval').val());
                 getparticularstreatmentplann($('#trchargetype_id').val());
                  iol_power = $('#updatestatus_form').find('input[name="iol_power"]').val();
                  roomno = $('#updatestatus_form').find('input[name="roomno"]').val();
                   bedno = $('#updatestatus_form').find('input[name="bedno"]').val();

                 $('#iol_lens').val($('#iol_lens_id').val()).trigger("change");;
                $('#preoperative_form').find('input[name="iol_power"]').val(iol_power);
                $('#preoperative_form').find('input[name="room_no"]').val(roomno);
                $('#preoperative_form').find('input[name="table_no"]').val(bedno);
                 //$('#').val($('#iol_lens_id').val());
                 //$('#').val($('#iol_power').val());
                /// $('#').val($('#iol_lens_id').val());
                 //$('#').val($('#iol_power').val());
                 $(".select2").select2();
proceduredata=$('#activeproceduredata').val();
// alert(proceduredata);
                  var newArray = proceduredata.split(",");
                                    newArray = newArray.map(function(value) {
                                    return parseInt(value, 10);
                                });
                            newArray.unshift(proceduredata);

setTimeout(() => { 
           $('#particular_type').val(newArray).trigger("change");
        }, 
        1500 
    ); 

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
$(document).ready(function(){
    gettreatmentplan(2,1,0);
  $('#updatestatus_form').submit(function(e){
            e.preventDefault(); 
            if($('#preopform').val()==0)
            {
                if($('#status').val()==2)
                {
                    getnewmodal();
                    return false;
                }
           }
          
        var data;
        data = new FormData(this);
      
       $.ajax({
        url:'Counseling/saveupdatestatus',
        type:"post",
        dataType: "json",
        data:data,
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(data){

             $("#overlay").fadeOut(300);
             if(data.error=='<p>You did not select a file to upload.</p>')
             {
               Swal.fire({title:"Warning!",text:"You did not select a file to upload.",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
               return false;
             }
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                location.reload();
               
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
        });
    });
      


    function gettreatmentplan(val,flag,status=0)
   {
    //flag=1 (open) flag=2(pending) flag=3 (completed) flag=4(cancel)
    if(val==2)
    {
        if(flag==1)
        {
            idname='sur_open';
        }
        else if(flag==2)
        {
            idname='sur_pending';
        }
        else if(flag==3)
        {
            idname='sur_completed';
        }
        else if(flag==4)
        {
            idname='sur_cancel';
        }
        
    }
    else if(val==3)
    {
        if(flag==1)
        {
            idname='las_open';
        }
        else if(flag==2)
        {
            idname='las_pending';
        }
        else if(flag==3)
        {
            idname='las_completed';
        }
        else if(flag==4)
        {
            idname='las_cancel';
        }
    }
     else if(val==4)
    {
        if(flag==1)
        {
            idname='inj_open';
        }
        else if(flag==2)
        {
            idname='inj_pending';
        }
        else if(flag==3)
        {
            idname='inj_completed';
        }
        else if(flag==4)
        {
            idname='inj_cancel';
        }
    }
        $("#overlay").fadeIn(300);
        $('#'+idname+'_data').html('');
         $.ajax({
            type: "POST",
            url: 'Counseling/gettreatmentplan',
            dataType: "json",
            data: {status:status,flag:flag,csrf_test_name:csrf,chargetype_id:val,surgical_date:$('#'+idname+'_date').val(),surgical_date_st:$('#'+idname+'_date0').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                      $('#'+idname+'_data').html(data.msg);
                      $('#'+idname+'_datatable').DataTable({
                           dom: 'Bfrtip',
                           buttons: [
                            'pdfHtml5'
                          ],
                         
                           "lengthMenu": [[1000,10,25, 50, 100, 1000], [1000,10,25, 50, 100, 1000]]
                        });
                       $('[data-toggle="tooltip"]').tooltip();
              } else if(data.error != '')
              {
                 $('#'+idname+'_data').html('No Data Found');
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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

   function deletedata(val,flag)
{
    if(val>0)
    {
          Swal.fire({title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Delete it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
             $("#overlay").fadeIn(300);
                   $.ajax({
            type: "POST",
            url: 'Counseling/deletedata',
            dataType: "json",
            data: {getid: val,csrf_test_name:csrf},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
           location.reload();
               
              } else if(data.error != ''){
                Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
               return false;
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                 return false;
              }
                
            },
            error: function (error) {
                Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                $("#overlay").fadeOut(300);  
            }
        });
               
                }
                })) 
    }
}

function getsurgeryfitness(treatmentplan_id,chargetype_id,examination_id,whichpop)
{ 
    if(whichpop==1)
    {
        urlv='Counseling/getsurgeryfitnessfn';
    }
    $('#com_sec').html('');
    tit = 'Surgery Fitness Request';
    $('#com_form_id').modal('show');
    $('.modal-title').html(tit);
    $('#examination_treamentplat_id').val(treatmentplan_id);
    $('#examination_id').val(chargetype_id);
    $('#charges_id').val(examination_id);
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: urlv,
            dataType: "json",
            data: {csrf_test_name:csrf,treatmentplan_id:treatmentplan_id,chargetype_id:chargetype_id,examination_id:examination_id},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                $('#com_sec').html(data.htmldata);
                 cd = (new Date()).toISOString().split('T')[0];
                $('#surgery_fitness_date').val(cd);
                 $(".select2").select2();
              } else if(data.error != '')
              {
                var error = data.error;
                 var err_str = '';
                for (var key in error) 
                {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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
function loadpro_getvalue(val)
{
    myArray = val.split("~");

    if(myArray)
    {
           $('#productdetails').children('tbody').append('<tr>\n\
                                       <td><input type="hidden"  name="orderdia[]" value="'+myArray[0]+'">'+myArray[1]+'</td>\n\
                                       <td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>\n\
                                       </tr>'); 
    }
}
function loadpro_getvalue1(val)
{
    myArray = val.split("~");

    if(myArray)
    {
           $('#productdetails1').children('tbody').append('<tr>\n\
                                       <td><input type="hidden"  name="orderdia[]" value="'+myArray[0]+'">'+myArray[1]+'</td>\n\
                                       <td><input type="text" class="form-control" name="remarks[]" ></td>\n\
                                       <td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>\n\
                                       </tr>'); 
    }
}
function savecompopup()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling/savedatasurgeryfitness',
            dataType: "json",
            data: $('#com_form_new').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               printsurfitreq(data.sur_fit_id);
               $('.comclse').click();
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
function printsurfitreq(surid)
{
 $('<form target="_blank" method="post" action="<?php echo base_url('master/Counseling/print_surgeryfit'); ?>"><input name="surid" value="'+surid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}


function getorderdia(treatmentplan_id,chargetype_id,examination_id,whichpop)
{ 
    if(whichpop==2)
    {
        urlv='Counseling/getorderdia_pop';
    }
    $('#com_sec1').html('');
    tit = 'Order Diagnostics';
    $('#com_form_id1').modal('show');
    $('.modal-title').html(tit);
    $('#examination_treamentplat_id1').val(treatmentplan_id);
    $('#examination_id1').val(chargetype_id);
    $('#charges_id1').val(examination_id);
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: urlv,
            dataType: "json",
            data: {csrf_test_name:csrf,treatmentplan_id:treatmentplan_id,chargetype_id:chargetype_id,examination_id:examination_id},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                $('#com_sec1').html(data.htmldata);
                 cd = (new Date()).toISOString().split('T')[0];
                $('#orderdia_date').val(cd);
                 $(".select2").select2();
              } else if(data.error != '')
              {
                var error = data.error;
                 var err_str = '';
                for (var key in error) 
                {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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
function savecompopup1()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling/savedatasurgeryfitness1',
            dataType: "json",
            data: $('#com_form_new1').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               printsurfitreq1(data.sur_fit_id);
               $('.comclse').click();
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
function printsurfitreq1(surid)
{
 $('<form target="_blank" method="post" action="<?php echo base_url('master/Counseling/Order_diagnosticsprint'); ?>"><input name="surid" value="'+surid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
function getpreoperative(treatmentplan_id,chargetype_id,examination_id,whichpop)
{
    urlv='Counseling/getpreoperative_section';
    $('#com_sec2').html('');
    proceduredata=$('#datalistparti_'+examination_id).val();
    tit = 'Preoperative Directions';
    $('#com_form_id2').modal('show');
    $('.modal-title').html(tit);
    $('#examination_treamentplat_id2').val(treatmentplan_id);
    $('#examination_id2').val(chargetype_id);
    $('#charges_id2').val(examination_id);
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: urlv,
            dataType: "json",
            data: {csrf_test_name:csrf,proceduredata:proceduredata,treatmentplan_id:treatmentplan_id,chargetype_id:chargetype_id,examination_id:examination_id},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != '')
              {
                getoperation(data.getid);
                if(data.medid>0)
                {
                    getaddmedhistorysaveddata(data.medid);
                }
                $('#com_sec2').html(data.htmldata);
                 cd = (new Date()).toISOString().split('T')[0];
               
                $('#preoperative_date').val(cd);
                cd=data.dateof_operation;
                $('#dateof_operation').val(cd);
                $('#pre_ins').html(data.htmldata_ins);
                 $(".select2").select2();
              } else if(data.error != '')
              {
                var error = data.error;
                 var err_str = '';
                for (var key in error) 
                {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) 
                {
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

function getoperation(val)
{
    <?php
$path=base_url('template1/');
?>
    if(val>0)
    {
         $("#overlay").fadeIn(300);
     $.ajax({
            type: "POST",
            url: 'Counseling/getparticulars',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#procedure_operation').html(data.msg);
                $(".select2").select2();
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
function typeofmedicineaction(val)
{

    if(val==0)
    {
        $('#emr_action').show(500);
        $('#pharmacy_action').hide(500);
    }
    if(val==1)
    {
        $('#emr_action').hide(500);
        $('#pharmacy_action').show(500);
    }
}
 function getallmedicine(val) {
        if (val > 0) {
            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>transaction/Examination/getmedinedetails',
                dataType: "json",
                data: {
                    medid: val,
                    csrf_test_name: csrf
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {

                        $('#productdetails_tabs').children('tbody').append('<tr>\n\
                                       <td>' + data.getdata[0]['drugname'] + '</td>\n\
                                       <td><input type="hidden" class="form-control" id="medicine_id_' + row_num + '" name="medicine_id[]" value="' + val + '"><input type="text" class="form-control" onkeyup="getlistdescription(this.value,' + data.getdata[0]['category_id'] + ',' + row_num + ')" id="instruction_' + row_num + '" name="instruction[]" value="' + data.getdata[0]['instruction'] + '"><span id="search_result' + row_num + '"></span></td>\n\
                                       <td><input type="text" class="form-control" id="days_' + row_num + '" name="days[]" value="' + data.getdata[0]['days'] + '"></td>\n\
                                        <td><input type="text" class="form-control" id="qty_' + row_num + '" name="qty[]" value="1"></td>\n\
                                        <td style="display:none;"><input type="date" class="form-control" id="sdate_' + row_num + '" name="sdate[]" value="' + cd + '"></td>\n\
                                         <td style="display:none;"><input type="date" class="form-control" id="tdate_' + row_num + '" name="tdate[]" value="' + cd + '"></td>\n\
                                          <td><select class="form-control" name="medeye[]" id="medeye_' + row_num + '"><option value="BE">BE</option><option value="LE">LE</option><option value="RE">RE</option><option value="A/F">A/F</option><option value="B/F">B/F</option></select></td>\n\
                                           <td>\n\
                                            <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">\n\
                                            <button class="btn btn-danger btnDelete btn-sm">\n\
                                               <i class="la la-trash"></i>\n\
                                            </button>\n\
                                            </a>\n\
                                            <div  class="multiple_'+row_num+'" style="display:none;">\n\
                                          <input type="hidden" name="mulframetype[]" id="mulframetype_'+row_num+'" class="form-control span2">\n\
                                          <input type="hidden" name="mulframecolor[]" id="mulframecolor_'+row_num+'" class="form-control span2">\n\
                                          <input type="hidden" name="med_name[]"  id="med_name_'+row_num+'"  class="form-control span2">\n\
                                           <input type="hidden" name="med_action[]" value="0" id="med_action_'+row_num+'" class="form-control span2">\n\
                                        </div>\n\
                                       </td>\n\
                                         </tr>');
                        row_num++;

                    } else if (data.error != '') {
                        $('#complaintid').html('No Data Found');
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
    function selecttemp(sel) {
        if (sel > 0) {
            $("#overlay").fadeIn(300);
            $('#examination_data').html('');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>transaction/Examination/getalltempl',
                dataType: "json",
                data: {
                    sel: sel,
                    csrf_test_name: csrf
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {
                        medtem = data.msg;
                        var array = medtem.split(",");
                        $.each(array, function(i) {
                            if (array[i] > 0) {
                                getallmedicine(array[i]);
                            }
                        });
                    } else if (data.error != '') {
                        Swal.fire({
                            title: "Info!",
                            text: "" + data.error + "",
                            type: "info",
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
    }
    function loadpreop_ins(val)
{
    myArray = val.split("~");

    if(myArray)
    {
           $('#pro_ins_tab').children('tbody').append('<tr>\n\
                                       <td><input type="hidden"  name="preinsdataval[]" value="'+myArray[0]+'">'+myArray[1]+'</td>\n\
                                       <td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>\n\
                                       </tr>'); 
    }
}
function loadprocedure_preoperative(val)
{
     myArray = val.split("~");

    if(myArray)
    {
           $('#pr_in_op').children('tbody').append('<tr>\n\
                                       <td><input type="hidden"  name="pre_op_dir[]" value="'+myArray[0]+'">'+myArray[1]+'</td>\n\
                                       <td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>\n\
                                       </tr>'); 
    }
}
function load_medhist(val)
{
     myArray = val.split("~");

    if(myArray)
    {
           $('#medhist_tab').children('tbody').append('<tr>\n\
                                       <td><input type="hidden"  name="med_id[]" value="'+myArray[0]+'">'+myArray[1]+'</td>\n\
                                       <td><input type="text"  name="rem_med[]" class="form-control"></td>\n\
                                       <td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>\n\
                                       </tr>'); 
    }
}
function savecompopup2()
{
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Counseling/savedatapreoperativeins',
            dataType: "json",
            data: $('#com_form_new2').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               printsurfitreq3(data.sur_fit_id);
               $('.comclse').click();
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
function printsurfitreq3(surid)
{
 $('<form target="_blank" method="post" action="<?php echo base_url('master/Counseling/Preoperativeinsprint'); ?>"><input name="surid" value="'+surid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

}
 function getaddmedhistorysaveddata(key) {
        // $("#overlay").fadeIn(300);
 $('#productdetails_tabs tbody').empty();
        $.ajax({
            type: "POST",
            url: 'Counseling/showmedhistorydata',
            dataType: "json",
            data: {
                key: key,
                csrf_test_name: csrf
            },
            success: function(data) {
                $("#overlay").fadeOut(300);
                if (data.msg != '') {

                    $('#productdetails_tabs').children('tbody').append(data.docmed);
                    row_num = data.rowcnt + 1;

                } else if (data.error != '') {
                    Swal.fire({
                        title: "Warning!",
                        text: "" + data.error + "",
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

    function deletefiletr(val)
{

    if(val>0)
    {
          Swal.fire({title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Delete it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
             $("#overlay").fadeIn(300);
                   $.ajax({
            type: "POST",
            url: 'Counseling/deleteDatadd',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
              location.reload();
               
              } else if(data.error != ''){
                Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
               return false;
              } else if(data.error_message) 
              {
                var error = data.error_message;
                var err_str = '';
                for (var key in error) {
                  err_str += error[key] +'\n';
                }
                Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                 return false;
              }
                
            },
            error: function (error) {
                Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
                $("#overlay").fadeOut(300);  
            }
        });
               
                }
                })) 
    }
}
          </script>


