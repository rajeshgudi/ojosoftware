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
                                <h4 class="card-title">Refraction Master</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="edit_data"></div>
                                        <ul class="nav nav-tabs">
                                             <li class="nav-item">
                                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Vision Master</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Pin Hole</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Best Correction</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false" style="color:red;font-weight: bold;">Sphere</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false" style="color:red;font-weight: bold;">Cylinder</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="base-tab6" data-toggle="tab" aria-controls="tab6" href="#tab6" aria-expanded="false" style="color:red;font-weight: bold;">Axis</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab7" data-toggle="tab" aria-controls="tab7" href="#tab7" aria-expanded="false" style="color:blue;font-weight: bold;">Refraction</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                            <div class="row">
                                <div class="col-md-4">
                            <form id="Vision_master" action="#" method="post"> 
                                <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                <input type="hidden" name="refraction_type" id="refraction_type" value="1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                            <select class="form-control" name="eye_type" id="eye_type">
                                                <option value="">Select EYE</option>
                                                <option value="1">Left</option>
                                                <option value="2">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Vision Type: <span class="text-danger">*</span></label>
                                            <select class="form-control" name="vis_type" id="vis_type">
                                                <option value="">Select Vision Type</option>
                                                <option value="1">UCDVA</option>
                                                <option value="2">UCNVA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="symptoms">Description:</label>
                                            <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group mt-1">
                                        <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                          <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                          <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer ml-auto">
                                    <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(1);">Submit</button>
                                     <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                </div>
                            </form>
                             </div>
                             <style type="text/css">
                                 .vie th, .table td {
                                            padding: 0.15rem 1rem;

                                    }
                             </style>
                                <div class="col-md-8">
                                   <div class="table-responsive">
                                             <table id="tableid" class="vie table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                <thead>
                                                  <tr>
                                                    <th>Sl No</th>
                                                    <th>Name</th>
                                                    <th>EYE</th>
                                                    <th>Vision Type</th>
                                                    <th>Description</th>
                                                     <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                  </tr>
                                                </thead>
                                                 <tfoot>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Name</th>
                                                        <th>EYE</th>
                                                        <th>Vision Type</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                         <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </tfoot>
                                              </table>
                                            </div>
                                </div>
                            </div>
                            <hr/>
                           
                                <h4 class="card-title">View Details</h4>
                                <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">UCDVA -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftucdva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">UCDVA -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightucdva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                                    <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">UCNVA -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftucnva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                                  <div class="col-md-3">
                                    <h4 style="text-align: center;" class="card-title">UCNVA -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightucnva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                            </div>
                                            </div>
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                               
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                      <form id="Vision_master_pin" action="#" method="post"> 
                                                            <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                            <input type="hidden" name="refraction_type" id="refraction_type" value="2">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Name: <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="eye_type" id="eye_type">
                                                                            <option value="">Select EYE</option>
                                                                            <option value="1">Left</option>
                                                                            <option value="2">Right</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="symptoms">Description:</label>
                                                                        <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="form-group mt-1">
                                                                    <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                                                      <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                                                      <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer ml-auto">
                                                                <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(2);">Submit</button>
                                                                 <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                      <div class="col-md-8">
                                                            <div class="table-responsive">
                                                                 <table id="tableid_pin" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>EYE</th>
                                                                        <th>Description</th>
                                                                         <th>Status</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                      </tr>
                                                                    </thead>
                                                                     <tfoot>
                                                                        <tr>
                                                                            <th>Sl No</th>
                                                                            <th>Name</th>
                                                                            <th>EYE</th>
                                                                            <th>Description</th>
                                                                            <th>Status</th>
                                                                             <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                  </table>
                                                                </div>
                                                      </div>
                                                  </div>

                                                   <hr/>
                           
                                <h4 class="card-title">View Details</h4>
                                <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">PH -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftpinhole as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <h4 class="card-title" style="text-align: center;">PH -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightpinhole as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                                    

                               


                            </div>

                                                
                                            </div>

                                             <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                      <form id="best_correction" action="#" method="post"> 
                                                            <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                            <input type="hidden" name="refraction_type" id="refraction_type" value="3">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Name: <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="eye_type" id="eye_type">
                                                                            <option value="">Select EYE</option>
                                                                            <option value="1">Left</option>
                                                                            <option value="2">Right</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Vision Type: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="vis_type" id="vis_type">
                                                                            <option value="">Select Vision Type</option>
                                                                            <option value="3">BCDVA</option>
                                                                            <option value="4">BCNVA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="symptoms">Description:</label>
                                                                        <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="form-group mt-1">
                                                                    <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                                                      <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                                                      <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer ml-auto">
                                                                <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(3);">Submit</button>
                                                                 <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                      <div class="col-md-8">
                                                            <div class="table-responsive">
                                                                 <table id="tableid_best" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>EYE</th>
                                                                        <th>Vision Type</th>
                                                                        <th>Description</th>
                                                                         <th>Status</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                      </tr>
                                                                    </thead>
                                                                     <tfoot>
                                                                        <tr>
                                                                            <th>Sl No</th>
                                                                            <th>Name</th>
                                                                            <th>EYE</th>
                                                                            <th>Vision Type</th>
                                                                            <th>Description</th>
                                                                            <th>Status</th>
                                                                             <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                  </table>
                                                                </div>
                                                      </div>
                                                  </div>

                                                  <hr/>
                                                    <h4 class="card-title">View Details</h4>
                                                    <div class="row">
                                                           <div class="col-md-3">
                                                    <h4 class="card-title" style="text-align: center;">BCDVA -LEFT EYE</h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                <?php
                                                $i=1;
                                                foreach ($refractionleftbcdva as $row)
                                                {
                                                    $k=0;
                                                    $quantity=1;
                                                    while ($quantity>$k)
                                                    {
                                                ?>
                                                               <td><?php echo $row->name; ?></td>
                                                <?php
                                                if($i%5==0)
                                                {
                                                    ?>
                                                    </tr><tr>
                                                    <?php
                                                }
                                                $i++;
                                                $k++;
                                                }
                                                }
                                                
                                                ?>
                                                       </tr>
                                                   </tbody>
                                                </table>
                                                     </div>
                                              </div>

                                                  <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">BCDVA -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightbcdva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">BCNVA -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftbcnva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <h4 style="text-align: center;" class="card-title">BCNVA -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightbcnva as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                                                    </div>
                                                
                                            </div>

                                              <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                                               
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                      <form id="sphere_master" action="#" method="post"> 
                                                            <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                            <input type="hidden" name="refraction_type" id="refraction_type" value="4">
                                                            <div class="row">
                                                               
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Action: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="action" id="action">
                                                                            <option value="">Select Action</option>
                                                                            <option value="1">-</option>
                                                                            <option value="2">+</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Name: <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="eye_type" id="eye_type">
                                                                            <option value="">Select EYE</option>
                                                                            <option value="1">Left</option>
                                                                            <option value="2">Right</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="symptoms">Description:</label>
                                                                        <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="form-group mt-1">
                                                                    <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                                                      <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                                                      <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer ml-auto">
                                                                <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(4);">Submit</button>
                                                                 <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                      <div class="col-md-8">
                                                            <div class="table-responsive">
                                                                 <table id="tableid_sphere" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>EYE</th>
                                                                        <th>Description</th>
                                                                         <th>Status</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                      </tr>
                                                                    </thead>
                                                                     <tfoot>
                                                                        <tr>
                                                                            <th>Sl No</th>
                                                                            <th>Name</th>
                                                                            <th>EYE</th>
                                                                            <th>Description</th>
                                                                            <th>Status</th>
                                                                             <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                  </table>
                                                                </div>
                                                      </div>
                                                  </div>
                                                  <hr/>
                                                    <h4 class="card-title">View Details</h4>
                                <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">SPHERE -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftsphere as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <h4 class="card-title" style="text-align: center;">SPHERE -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightsphere as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                                    

                               


                            </div>

                                                
                                            </div>


                                              <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                                               
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                      <form id="cylinder_master" action="#" method="post"> 
                                                            <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                            <input type="hidden" name="refraction_type" id="refraction_type" value="5">
                                                            <div class="row">
                                                                   <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Action: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="action" id="action">
                                                                            <option value="">Select Action</option>
                                                                            <option value="1">-</option>
                                                                            <option value="2">+</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Name: <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="eye_type" id="eye_type">
                                                                            <option value="">Select EYE</option>
                                                                            <option value="1">Left</option>
                                                                            <option value="2">Right</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="symptoms">Description:</label>
                                                                        <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="form-group mt-1">
                                                                    <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                                                      <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                                                      <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer ml-auto">
                                                                <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(5);">Submit</button>
                                                                 <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                      <div class="col-md-8">
                                                            <div class="table-responsive">
                                                                 <table id="tableid_cylinder" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>EYE</th>
                                                                        <th>Description</th>
                                                                         <th>Status</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                      </tr>
                                                                    </thead>
                                                                     <tfoot>
                                                                        <tr>
                                                                            <th>Sl No</th>
                                                                            <th>Name</th>
                                                                            <th>EYE</th>
                                                                            <th>Description</th>
                                                                            <th>Status</th>
                                                                             <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                  </table>
                                                                </div>
                                                      </div>
                                                  </div>

                                                       <hr/>
                                                    <h4 class="card-title">View Details</h4>
                                <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">CYLINDER -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftcylinder as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <h4 class="card-title" style="text-align: center;">CYLINDER -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightcylinder as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                            </div>

                                                
                                            </div>

                                             <div class="tab-pane" id="tab6" aria-labelledby="base-tab6">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                      <form id="axis_master" action="#" method="post"> 
                                                            <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                            <input type="hidden" name="refraction_type" id="refraction_type" value="6">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Name: <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="eye_type" id="eye_type">
                                                                            <option value="">Select EYE</option>
                                                                            <option value="1">Left</option>
                                                                            <option value="2">Right</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="symptoms">Description:</label>
                                                                        <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="form-group mt-1">
                                                                    <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                                                      <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                                                      <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer ml-auto">
                                                                <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(6);">Submit</button>
                                                                 <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                      <div class="col-md-8">
                                                            <div class="table-responsive">
                                                                 <table id="tableid_axis" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>EYE</th>
                                                                        <th>Description</th>
                                                                         <th>Status</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                      </tr>
                                                                    </thead>
                                                                     <tfoot>
                                                                        <tr>
                                                                            <th>Sl No</th>
                                                                            <th>Name</th>
                                                                            <th>EYE</th>
                                                                            <th>Description</th>
                                                                            <th>Status</th>
                                                                             <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                  </table>
                                                                </div>
                                                      </div>
                                                  </div>

                                                   <hr/>
                                                    <h4 class="card-title">View Details</h4>
                                <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title" style="text-align: center;">Axis -LEFT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionleftaxis as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <h4 class="card-title" style="text-align: center;">Axis -RIGHT EYE</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
            <tbody>
                <tr>
        <?php
        $i=1;
        foreach ($refractionrightaxis as $row)
        {
            $k=0;
            $quantity=1;
            while ($quantity>$k)
            {
        ?>
                       <td><?php echo $row->name; ?></td>
        <?php
        if($i%5==0)
        {
            ?>
            </tr><tr>
            <?php
        }
        $i++;
        $k++;
        }
        }
        
        ?>
               </tr>
           </tbody>
        </table>
                                    </div>
                                </div>

                            </div>
                                                
                                            </div>

                                              <div class="tab-pane" id="tab7" aria-labelledby="base-tab7">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                      <form id="refraction" action="#" method="post"> 
                                                            <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                                                            <input type="hidden" name="refraction_type" id="refraction_type" value="7">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Name: <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Eye: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="eye_type" id="eye_type">
                                                                            <option value="">Select EYE</option>
                                                                            <option value="1">Left</option>
                                                                            <option value="2">Right</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Vision Type: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="vis_type" id="vis_type" onchange="changevis(this.value);">
                                                                            <option value="">Select Vision Type</option>
                                                                            <option value="5">Sphere</option>
                                                                            <option value="6">Cylinder</option>
                                                                            <option value="7">Axis</option>
                                                                            <option value="8">V/A</option>
                                                                            <option value="9">Add</option>
                                                                            <option value="10">N/V</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-4" id="reff_action">
                                                                    <div class="form-group">
                                                                        <label for="lastname">Action: <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="action" id="ref_action">
                                                                            <option value="">Select Action</option>
                                                                            <option value="1">-</option>
                                                                            <option value="2">+</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="symptoms">Description:</label>
                                                                        <textarea cols="3" rows="3" id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-md-12">
                                                                  <div class="form-group mt-1">
                                                                    <label for="switcheryColor2" class="card-title ml-1">De-Active</label>
                                                                      <input type="checkbox" value="1" id="switcheryColor2" class="switchery" name="status" data-color="info" checked />
                                                                      <label for="switcheryColor2" class="card-title ml-1">Active</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer ml-auto">
                                                                <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="savedata(7);">Submit</button>
                                                                 <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" onclick="this.form.reset();">Reset</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                      <div class="col-md-8">
                                                            <div class="table-responsive">
                                                                 <table id="tableid_ref" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Sl No</th>
                                                                        <th>Name</th>
                                                                        <th>EYE</th>
                                                                        <th>Ref Type</th>
                                                                        <th>Description</th>
                                                                         <th>Status</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                      </tr>
                                                                    </thead>
                                                                     <tfoot>
                                                                        <tr>
                                                                            <th>Sl No</th>
                                                                            <th>Name</th>
                                                                            <th>EYE</th>
                                                                            <th>Ref Type</th>
                                                                            <th>Description</th>
                                                                            <th>Status</th>
                                                                             <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                  </table>
                                                                </div>
                                                      </div>
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
     function changevis(val)
     {
            if(val==5 || val==6)
            {
                $('#reff_action').show();
            }
            else
            {
                $('#reff_action').hide();
            }
     }   
     function changeviss(val)
     {
            if(val==5 || val==6)
            {
                $('#editt_action').show();
            }
            else
            {
                $('#editt_action').hide();
            }
     }      
var table1;
var table2;
var table3;
var table4;
var table5;
var table6;
var table7;
$( document ).ready(function() {
   table1= $('#tableid').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call1',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'vistype' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 


$( document ).ready(function() {
   table2= $('#tableid_pin').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call2',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 

$( document ).ready(function() {
   table3= $('#tableid_best').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call3',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'vistype' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 

$( document ).ready(function() {
   table4= $('#tableid_sphere').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call4',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 

$( document ).ready(function() {
   table5= $('#tableid_cylinder').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call5',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 

$( document ).ready(function() {
   table6= $('#tableid_axis').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call6',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
});

$( document ).ready(function() {
   table7= $('#tableid_ref').DataTable( {
          'processing': true,
          'serverSide': true,
          'ajax':'<?=base_url()?>master/Refraction/ajax_call7',
          'columns': [
             { data: 'slno' },
             { data: 'name' },
             { data: 'eye' },
             { data: 'vistype' },
             { data: 'description' },
             { data: 'status' },
             { data: 'edit' },
             { data: 'delete' }
                     ],
    
         key: {
           enterkey: false

                },
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
     } );
}); 


function savedata(val)
{
    if(val==1)
    {
        formurl=$('#Vision_master').serialize();
        res=$("#Vision_master")[0];
        idval=table1;
    }
    else if(val==2)
    {
       formurl=$('#Vision_master_pin').serialize();
       res=$("#Vision_master_pin")[0];
       idval=table2;
    }
    else if(val==3)
    {
       formurl=$('#best_correction').serialize();
       res=$("#best_correction")[0];
       idval=table3;
    }
     else if(val==4)
    {
       formurl=$('#sphere_master').serialize();
       res=$("#sphere_master")[0];
       idval=table4;
    }
    else if(val==5)
    {
       formurl=$('#cylinder_master').serialize();
       res=$("#cylinder_master")[0];
       idval=table5;
    }
    else if(val==6)
    {
       formurl=$('#axis_master').serialize();
       res=$("#axis_master")[0];
       idval=table6;
    }
     else if(val==7)
    {
       formurl=$('#refraction').serialize();
       res=$("#refraction")[0];
       idval=table7;
    }
  
  
     
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Refraction/savedata',
            dataType: "json",
            data: formurl,
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               idval.draw();
                res.reset();
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

function editdata(val,typeval)
{
    if(val>0)
    {
        $('#edit_data').html('');
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Refraction/editrefraction',
            dataType: "json",
            data: {getid: val,refraction_type: typeval,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#edit_data').html(data.msg);
                 $('#div_modal').modal('show');
                 $('.modal-title').html('Edit Refraction Master');
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

function updatedataval()
{
        if($("#edit_name").val()=='') {
           Swal.fire({title:"Info!",text:"Please enter all fields !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
        }
        if($('#edit_refraction_type').val()==1)
        {
            idval=table1;
        }
        else if($('#edit_refraction_type').val()==2)
        {
            idval=table2;
        }
         else if($('#edit_refraction_type').val()==3)
        {
            idval=table3;
        }
        else if($('#edit_refraction_type').val()==4)
        {
            idval=table4;
        }
        else if($('#edit_refraction_type').val()==5)
        {
            idval=table5;
        }
        else if($('#edit_refraction_type').val()==6)
        {
            idval=table6;
        }
        else if($('#edit_refraction_type').val()==7)
        {
            idval=table7;
        }
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Refraction/updatedata',
            dataType: "json",
            data: $('#edit_form').serialize(),
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                idval.draw();
                $("#edit_form")[0].reset();
                $(".close").click();
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
function deletedata(val,tyv)
{
    if(val>0)
    {
    if(tyv==1)
    {
        idval=table1;
    }
    else if(tyv==2)
    {
       idval=table2;
    }
    else if(tyv==3)
    {
       idval=table3;
    }
     else if(tyv==4)
    {
       idval=table4;
    }
    else if(tyv==5)
    {
       idval=table5;
    }
    else if(tyv==6)
    {
       idval=table6;
    }
    else if(tyv==7)
    {
       idval=table7;
    }

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
            url: 'Refraction/deletedata',
            dataType: "json",
            data: {getid: val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               idval.draw();
               
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
