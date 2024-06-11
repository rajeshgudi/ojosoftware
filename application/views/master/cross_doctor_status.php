<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <select class="form-control select2" name="cross_all_cons" id="cross_all_cons">
                 <option value="0">All Consulatant</option>
                 <?php if($doctors) foreach ($doctors as $datadoc) {
                    $sell='';
                     if($this->session->userdata('user_type')==2)
                     {
                            $ll=$this->session->userdata('login_id');
                            $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
                        if($doctor_id_new_cond==$datadoc['doctors_registration_id'])
                        {
                            $sell='selected';
                        }
                    }
                    ?>
                      <option value="<?php echo $datadoc['doctors_registration_id']; ?>"  <?php echo $sell; ?>><?php echo $datadoc['name']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <input type="date" style="height:40px;" class="form-control date_pic_class" name="cross_date_pic" id="cross_date_pic" >
            </div>
            <button type="button" onclick="getallcrossdoctorstatus()" class="btn btn-danger"><i class="ft-search"></i></button>
            <h3 style="    padding-left: 2%;
    color: red;
    font-weight: bold;
    font-family: sans-serif;">Total Count : <t id="cross_cnt_contr">0</t></h3>
        </div>
        <br/>
      
        <div class="row">
            <div class="col-md-12" id="cross_ref_data">
              
            </div>
        </div>
   
 