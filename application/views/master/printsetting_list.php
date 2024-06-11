<div id="modaldiv_modal" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Print Settings</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Names</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><input type="checkbox" checked class="check_class" name="chkcomplaints" id="chkcomplaints" value="1"></td>
                                                                        <td>Complaints</td>
                                                                    </tr>
                                                                  
                                                                    <tr>
                                                                        <td><input type="checkbox" class="check_class" name="chkmedical" id="chkmedical" checked value="1"></td>
                                                                        <td>Medical History</td>
                                                                    </tr>
                                                                  
                                                                    <tr class="pricss">
                                                                        <td><input type="checkbox" checked class="check_class" name="addmediciness" id="addmediciness" value="1"></td>
                                                                        <td>Medicine</td>
                                                                    </tr>
                                                                    <tr class="pricss">
                                                                        <td><input type="checkbox" checked class="check_class" name="investigationchk" id="investigationchk" value="1"></td>
                                                                        <td>Investigation</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" checked class="check_class" name="preliminary_ex" id="preliminary_ex" value="1"></td>
                                                                        <td>Past Dental History</td>
                                                                    </tr>
                                                                    
<!-- INR4 -->


                                                                      

                                                                    <tr>
                                                                        <td><input type="checkbox" checked class="check_class" name="diagnosis_chk" id="diagnosis_chk" value="1"></td>
                                                                        <td>Diagnosis</td>
                                                                    </tr>
<!-- INR4 End-->
                                                                    <tr>
                                                                        <td><input type="checkbox" checked class="check_class" name="vsisonreadings" id="vsisonreadings" value="1"></td>
                                                                        <td>Treatment Plan</td>
                                                                    </tr>
                                                                 
                                                                </tbody>
                                                            </table>
                                                        </div>
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