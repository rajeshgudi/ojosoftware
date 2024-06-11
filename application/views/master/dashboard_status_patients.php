<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <select class="form-control select2" name="all_cons" id="all_cons">
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
              <input type="date" style="height:40px;" class="form-control date_pic_class" name="date_pic" id="date_pic" >
            </div>
            <button type="button" onclick="showallpatient_details(0)" class="btn btn-danger"><i class="ft-search"></i></button>
        </div>
        <br/>
<ul class="nav nav-pills nav-pill-bordered">
    <li class="nav-item">
        <a class="nav-link active" id="homeOpt1-tab" data-toggle="pill" href="#homeOpt1" aria-expanded="true">All Patients <span id="st_cnt1" style="font-size: 16px;background: #d32f2f;" class="badge badge-pill badge-glow badge-danger ml-1"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="homeOpt2-tab" data-toggle="pill" href="#homeOpt2" aria-expanded="false">Optometry Completed <span id="st_cnt2" style="font-size: 16px;background: #d32f2f;" class="badge badge-pill badge-glow badge-danger ml-1"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="homeOpt3-tab" data-toggle="pill" href="#homeOpt3" aria-expanded="false">Examination Inprogress <span id="st_cnt3"  style="font-size: 16px;background: #d32f2f;" class="badge badge-pill badge-glow badge-danger ml-1"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="homeOpt4-tab" data-toggle="pill" href="#homeOpt4" aria-expanded="false">Examination Completed <span id="st_cnt4" style="font-size: 16px;background: #d32f2f;" class="badge badge-pill badge-glow badge-danger ml-1"></span></a>
    </li>
   
   
</ul>
<div class="tab-content px-1 pt-1" id="atsa">
    <?php 
    $x = 1;

    while($x <= 4) {
        $cls='';
        if($x==1)
        {
            $cls='flipInY active';
        }
        ?>
     <div role="tabpanel" class="tab-pane animated <?php echo $cls; ?>" id="homeOpt<?php echo $x; ?>" aria-labelledby="homeOpt<?php echo $x; ?>-tab" aria-expanded="true">
   
        <br/>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="pat_st_av<?php echo $x; ?>" style="width:100%;font-size: 12px;">
                   <thead>
                        <tr>
                            <th>Token No</th>
                            <th>Patient Name</th>
                            <th>MRD NO</th>
                            <th>DOB & Age</th>
                            <th>App.Time</th>
                            <th>Particulars</th>
                            <th>Consultant</th>
                            <th>W.T</th>
                            <th>Status</th>
                        </tr>
                   </thead>
                   <tbody id="show_all_pat_st_av<?php echo $x; ?>" >
                     
                   </tbody>
               </table>
            </div>
        </div>
    </div>
     
    <?php  $x++;
    }
    ?>
  
   
   <style type="text/css">
       #pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4.dataTable >tbody th, #pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4.dataTable tbody td {
    padding: 0px 0px;
}

#pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4.dataTable thead th, #pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4.dataTable thead td {
    padding: 2px 5px;
   
}

   </style>
</div>