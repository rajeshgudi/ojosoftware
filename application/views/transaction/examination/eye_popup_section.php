<div id="modaldiv_modal" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Print Settings</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                 <div class="col-md-12">
                                                    <p style="text-align:center;"><input type="checkbox" id="ckbCheckAll" checked name="ckbCheckAll"> Select All</p>
                                                 </div>
                                            </div>
                                                <div class="row">
                                                   <div class="col-md-4" style="line-height: 32px;">
                                                       <input type="checkbox" class="check_class" name="popupchk1" id="popupchk1" checked  value="1"> Presenting Complaint <br/>
                                                       <input type="checkbox" class="check_class" name="popupchk2 " id="popupchk2" checked value="1"> Ophthalmic History <br/>
                                                       <input type="checkbox" class="check_class" name="popupchk3" id="popupchk3" checked value="1"> Medical History <br/>
                                                       <input type="checkbox" class="check_class" name="popupchk4" id="popupchk4" checked value="1"> Preliminary Examination <br/>
                                                       <input type="checkbox" class="check_class" name="popupchk5" id="popupchk5"  checked value="1"> Vision Readings <br/>
                                                       <input type="checkbox" class="check_class" name="popupchk6" id="popupchk6" checked  value="1"> Current Spectacle Prescription 1 <br/> 
                                                       <input type="checkbox" class="check_class" name="popupchk7" id="popupchk7"  checked value="1"> Current Spectacle Prescription 2 <br/>
                                                       <input type="checkbox" class="check_class" name="popupchk8" id="popupchk8" checked  value="1"> Current Spectacle Prescription 3  <br/>
                                                   </div>

                                                   <div class="col-md-4" style="line-height: 32px;">
                                                   <input type="checkbox" class="check_class" name="popupchk9" id="popupchk9" checked value="1"> Objective Refraction <br/>

                                                   <input type="checkbox" class="check_class" name="popupchk10" id="popupchk10" checked value="1"> Retina Scope <br/>

                                                   <input type="checkbox" class="check_class" name="popupchk11" id="popupchk11" checked value="1"> AR Kerotometry <br/>
                                                   <input type="checkbox" class="check_class" name="popupchk12" id="popupchk12" checked  value="1"> Manual Kerotometry <br/>
                                                  <input type="checkbox" class="check_class" name="popupchk13" id="popupchk13"  checked value="1"> Undilated Correction <br/>

                                                   <input type="checkbox" class="check_class" name="popupchk14" id="popupchk14" checked  value="1"> Cyclopedia Correction <br/>

                                                   <input type="checkbox" class="check_class" name="popupchk15" id="popupchk15" checked  value="1"> PMT Correction <br/>


                                                   <input type="checkbox" class="check_class" name="popupchk16" id="popupchk16" checked value="1"> Final Glass Prescription <br/>

                                                  
                                                  
                                                   </div>
                                              

                                    <div class="col-md-4" style="line-height: 32px;">
                                                  
                                            <input type="checkbox" class="check_class" name="popupchk17" id="popupchk17" checked  value="1">  Medicine Details <br/>
                                            <input type="checkbox" class="check_class" name="popupchk18" id="popupchk18" checked  value="1"> Diagnosis Plan <br/>
                                            <input type="checkbox" checked class="check_class" name="popupchk19" id="popupchk19"  value="1"> Eye Details  <br/>
                                            <input type="checkbox" class="check_class" name="popupchk20" id="popupchk20" checked value="1"> Eye Parts Examination<br/>
                                            <input type="checkbox" class="check_class" name="popupchk21" id="popupchk21" checked  value="1"> Investigation Details <br/> 
                                            <input type="checkbox" class="check_class" name="popupchk22" id="popupchk22" checked  value="1"> Treatment Plan <br/> 







                                                   </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
        <button id="save" class="btn btn-primary btn-sm" type="button" onclick="printsubmit();"><i class="fas fa-plus-square"></i>Submit</button>
            <button type="button" id="mclose" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>

$(document).ready(function () {
    $("#ckbCheckAll").click(function () {
        $(".check_class").prop('checked', $(this).prop('checked'));
    });
});
                                </script>