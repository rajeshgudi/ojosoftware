<?php $doctor_id_new_cond=0; ?>
<div class="content-body">
<?php include  "eye_popup_section.php"; ?>
                                <?php if($this->session->userdata('user_type')==0){ ?>
                                <div class="row">
                                      <div class="col-12 col-xl-3">
        <div class="card">
            <div class="card-header bg-primary bg-lighten-5">
                <h4 class="card-title ">EMR Today's Collection</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                   
                </div>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-de mb-0">
                        <thead>
                            <tr>
                                <th>Mode</th>
                                <th>Total(&#8377;)</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                <?=$emrmodedata?>
                                <tr><td>Petty cash (Cr)</td><td><?=$petty_cashcr?></td></tr>
                                <tr><td>Petty cash (Dr)</td><td><?=$pettycashdr?></td></tr>
                           <tr class="bg-primary bg-lighten-5"><td><b>Total</b></td><td><b><?=$emrtotmodedata?></b></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <div class="col-12 col-xl-3">
        <div class="card">
            <div class="card-header bg-warning bg-lighten-5">
                <h4 class="card-title">OPTICAL Today's Collection</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                   
                </div>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-de mb-0">
                        <thead>
                            <tr>
                                <th>Mode</th>
                                <th>Total(&#8377;)</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?=$opticalmodedata?>
                           <tr class="bg-warning bg-lighten-5">
                            
                            <td><b>Total</b></td><td><b><?=$opticaltotmodedata?></b></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="col-12 col-xl-3">
        <div class="card">
            <div class="card-header bg-danger bg-lighten-5">
                <h4 class="card-title" style="FONT-SIZE: 15PX;">PHARMACY Today's Collection</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                   
                </div>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-de mb-0">
                        <thead>
                            <tr>
                                <th>Mode</th>
                                <th>Total(&#8377;)</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?=$pharmmodedata?>
                           <tr class="bg-danger bg-lighten-5"><td><b>Total</b></td><td><b><?=$pharmtotmodedata?></b></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

     <div class="col-12 col-md-3">
    <div class="card">
      <div class="card-header bg-info">
        <h4 class="card-title" style="color: #fff;"><b>Today's Totals</b></h4>
        <div class="heading-elements">
          
        </div>
      </div>
      <div class="card-content collapse show">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table mb-0">
              <tbody>
                <tr>
                  <th scope="row" class="border-top-0">EMR</th>
                  <th class="border-top-0 text-right">&#8377;<?=$emrtotmodedata?></th>
                </tr>
                <tr>
                  <th scope="row">OPTICAL</th>
                  <th class="text-right">&#8377;<?=$opticaltotmodedata?></th>
                </tr>
                <tr>
                  <th scope="row">PHARAMCY</th>
                  <th class="text-right">&#8377;<?=$pharmtotmodedata?></th>
                </tr>
                 <tr class="bg-info" style="color: #fff;">
                  <th scope="row">TOTAL</th>
                  <th class="text-right">&#8377;<?=$tot_col?></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


   


</div>

</div>

<div class="row">

 <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="info"><?php echo $today_insurance_collection; ?></h3>
                            <h6>Today's Insurance </h6>
                        </div>
                        <div>
                            <i class="la la-medkit info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2" style="display:none;">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
 $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
if($host_tvm=='deh')
{
    error_reporting(0);
    $summm=0.00;
    $datt=date('Y-m-d');
        $sql = "select sum(grand_total) as tott from camp_billing_master where billing_date='$datt'";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        if($res)
        {
            $summm=$res[0]['tott'];
        }
       
    ?>

     <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="info"><?php echo $summm; ?></h3>
                            <h6>Today's Camp Billing </h6>
                        </div>
                        <div>
                            <i class="la la-home info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2" style="display:none;">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>
</div>

                            <?php   } ?>
<?php if($this->session->userdata('user_type')==1 || $this->session->userdata('user_type')==4){ ?>
<div class="row">
<div class="col-xl-3 col-lg-6 col-12">
<div class="card bg-gradient-directional-danger">
  <div class="card-content">
    <div class="card-body">
      <div class="media d-flex">
        <div class="media-body text-white text-left">
          <h3 class="text-white"><?=$today_patient?></h3>
          <span>Today's Patients</span>
        </div>
        <div class="align-self-center">
          <i class="icon-users text-white font-large-2 float-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-12">
<div class="card bg-gradient-directional-success">
  <div class="card-content">
    <div class="card-body">
      <div class="media d-flex">
        <div class="media-body text-white text-left">
          <h3 class="text-white"><?=$today_collection?></h3>
          <span>Today's Collection</span>
        </div>
        <div class="align-self-center">
          <i class="la la-credit-card text-white font-large-2 float-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-12">
<div class="card bg-gradient-directional-amber">
  <div class="card-content">
    <div class="card-body">
      <div class="media d-flex">
        <div class="media-body text-white text-left">
          <h3 class="text-white"><?=$total_doctors?></h3>
          <span>Total  Doctors</span>
        </div>
        <div class="align-self-center">
          <i class="la la-stethoscope text-white font-large-2 float-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-12">
<div class="card bg-gradient-directional-info">
  <div class="card-content">
    <div class="card-body">
      <div class="media d-flex">
        <div class="media-body text-white text-left">
          <h3 class="text-white"><?=$total_patient?></h3>
          <span>Total Patients</span>
        </div>
        <div class="align-self-center">
          <i class="icon-users text-white font-large-2 float-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-x-pink">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$todaynew_patient?></h3>
              <span>New Patients</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-x-purple">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$todaynewfol_patient?></h3>
              <span>Followup Patients</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-directional-cyan">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$Opto_waiting[0]['cnt_status_opto']+$Opto_inprogress[0]['cnt_patient_status'];?></h3>
              <span>All Patients</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

      <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-y2-pink">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$Opto_completed[0]['cnt_patient_status'];?></h3>
              <span>Optometry completed</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

</div>
<div id="pat_vie_s" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_moda_pat">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="All_Pat_Det" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_moda_All">
                      
                     <?php   $this->load->view("master/dashboard_status_patients"); ?>



                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="All_cross_st" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_moda_All_cross">
                      
                     <?php   $this->load->view("master/cross_doctor_status"); ?>



                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  <div class="row" >
                    <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><b>Today's Doctors Appointments</b></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                       
                        
                              
                                    <table class="table table-bordered table-hover" id="tab_das">
                                           <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Doctor Name</th>
                                                <th>Total Appointment</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                              <?php if($doctorapp){
                                                $sl=1;
                                                $dater=date('Y-m-d');
                                                foreach($doctorapp as $doname)
                                                {
                                                  $docid=$doname['doctors_registration_id'];
                                                  $sqll2 = "select count(*) as cnt from patient_appointment  where 
                                                  doctor_id=$docid and appointment_date='$dater'";
                                                       $result_row1=$this->db->query($sqll2); 
                                                       $res1= $result_row1->result_array();
                                                       $cnt=$res1[0]['cnt'];

                                                        $Opto_waiting=$Opto_comp=$dooc_inc=$dooc_com=$Opto_inp=$dooc_incg=0;

                                                            $dte=date('Y-m-d');

                                                            $sql1 = "SELECT count(*) as cnt_status_opto FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='$dte' and doctor_id=$docid    and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC";
                                                            $result_row1=$this->db->query($sql1); 
                                                            $res1= $result_row1->result_array ();
                                                            if($res1)
                                                            {
                                                                $Opto_waiting=$res1[0]['cnt_status_opto'];
                                                            }
                                                            //opto inpro
                                                             $whr='';
                                                          $userstatus=1;$staus=0;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql2 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row2=$this->db->query($sql2); 
                                                          $res2= $result_row2->result_array ();
                                                          if($res2)
                                                          {
                                                            $Opto_inp=$res2[0]['cnt_patient_status'];
                                                          }
                                                          //end opto inpo

                                                            ///opto com
                                                            $whr='';
                                                            $userstatus=1;$staus=1;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1 and  confirm_flag=0";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql2 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row2=$this->db->query($sql2); 
                                                          $res2= $result_row2->result_array ();
                                                          if($res2)
                                                          {
                                                            $Opto_comp=$res2[0]['cnt_patient_status'];
                                                          }
                                                          //end opto comp

                                                           ///Doc Inpro
                                                            $whr='';
                                                            $userstatus=3;$staus=0;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql3 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row3=$this->db->query($sql3); 
                                                          $res3= $result_row3->result_array ();
                                                          if($res3)
                                                          {
                                                            $dooc_inc=$res3[0]['cnt_patient_status'];
                                                          }
                                                          //end Doc Inpro

                                                             ///Doc Comp
                                                            $whr='';
                                                            $userstatus=3;$staus=1;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql4 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row4=$this->db->query($sql4); 
                                                          $res4= $result_row4->result_array ();
                                                          if($res4)
                                                          {
                                                            $dooc_com=$res4[0]['cnt_patient_status'];
                                                          }
                                                          //end Doc Comp
                                                          //doc inp
                                                            $whr='';
                                                            $userstatus=3;$staus=0;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql4 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row4=$this->db->query($sql4); 
                                                          $res4= $result_row4->result_array ();
                                                          if($res4)
                                                          {
                                                            $dooc_incg=$res4[0]['cnt_patient_status'];
                                                          }
                                                          //end doc
                                                             $opp=$Opto_waiting+$Opto_inp;
                                                            $ff= $dooc_inc;
                                                            
                                                          $doctdetail="All Patients-$opp,Optometry completed-$Opto_comp ,Examination Inprogress-$ff,Examination Completed-$dooc_com";
                                                  ?>
                                                      <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><a style="text-decoration: underline;color: blue;" data-toggle="tooltip" title="<?php echo $doctdetail; ?>"><?php echo $doname['name']; ?></a></td>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><span onclick="pat_view(<?php echo $docid; ?>)" class="btn btn-success" style="cursor:pointer;"><i class="la la-eye"></i></span></td>
                                                      </tr>
                                                  <?php
                                                   $sl++;
                                                }
                                              } ?>
                                            </tbody>
                                          </table>
                                        
                                           
                              


                                    </div>
                                </div>
                            </div>
                            </div>
<script>
    $('[data-toggle="tooltip"]').tooltip();

      $('#tab_das').DataTable( {
       "drawCallback": function( settings ) {



// add as many tooltips you want

},
        buttons: [  ],
       
        dom: 'Blfrtip',
        "aaSorting": [[ 2, "desc" ]] ,
       "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
    } );
</script>
                            <div class="col-md-6">
                                 <div class="row">
                                     

                                       <div class="col-xl-6 col-lg-6 col-md-6 col-12" style="display:none;">
                                                <div class="card bg-gradient-x2-info">
                                                  <div class="card-content">
                                                    <div class="card-body">
                                                      <div class="media d-flex">
                                                        <div class="media-body text-white text-left">
                                                          <h3 class="text-white"><?=$Doc_wating[0]['cnt_patient_status'];?></h3>
                                                          <span>Consultation waiting Patients</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                          <i class="icon-users text-white font-large-2 float-right"></i>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            </div> 

                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="card bg-gradient-directional-teal">
                                                  <div class="card-content">
                                                    <div class="card-body">
                                                      <div class="media d-flex">
                                                        <div class="media-body text-white text-left">
                                                          <h3 class="text-white"><?=$Doc_inprocess[0]['cnt_patient_status'];?></h3>
                                                          <span>Examination Inprogress</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                          <i class="icon-users text-white font-large-2 float-right"></i>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            </div> 

                                               <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="card bg-gradient-y-red">
                                                  <div class="card-content">
                                                    <div class="card-body">
                                                      <div class="media d-flex">
                                                        <div class="media-body text-white text-left">
                                                          <h3 class="text-white"><?=$Doc_comp[0]['cnt_patient_status'];?></h3>
                                                          <span>Examination Completed </span>
                                                        </div>
                                                        <div class="align-self-center">
                                                          <i class="icon-users text-white font-large-2 float-right"></i>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            </div> 
                               </div>

                                <div class="row">
                                     

                                      

                                                 

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                              <div class="form-group form-group-compose">
                                                  <!-- compose button  -->
                                                  <button onclick="showallpatient_details()" type="button" class="btn btn-danger btn-glow btn-block my-2 compose-btn">
                                                      <i class="ft-info"></i>
                                                      Appointment Status
                                                  </button>

                                                 
      
                                              </div>
                                           
                                            </div> 


  <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                              <div class="form-group form-group-compose">

                                            <button style="margin-top: 5%;" onclick="getallcrossdoctorstatus()" type="button" class="btn btn-primary btn btn-block compose-btn">
                <i class="ft-info"></i>
                Cross Doctor Status  <span id="st_cnt4" style="font-size: 16px;background: #fff;color:black;" class="badge badge-pill badge badge-danger ml-1"><?php echo $crossdocst_cnt[0]['cnt']; ?></span>
            </button>

            </div>
                                           
                                           </div> 



                               </div>

                               
                            </div>
                             </div>
                              </div>


<?php }
elseif ($this->session->userdata('user_type')==2) { ?>

<div class="row">
<div class="col-xl-3 col-lg-6 col-12">
<div class="card bg-gradient-directional-danger">
  <div class="card-content">
    <div class="card-body">
      <div class="media d-flex">
        <div class="media-body text-white text-left">
          <h3 class="text-white"><?=$today_patient?></h3>
          <span>Today's Patients</span>
        </div>
        <div class="align-self-center">
          <i class="icon-users text-white font-large-2 float-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-12" style="display:none;">
<div class="card bg-gradient-directional-success">
  <div class="card-content">
    <div class="card-body">
      <div class="media d-flex">
        <div class="media-body text-white text-left">
          <h3 class="text-white"><?=$today_collection?></h3>
          <span>Today's Collection</span>
        </div>
        <div class="align-self-center">
          <i class="la la-credit-card text-white font-large-2 float-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-x-pink">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$todaynew_patient?></h3>
              <span> New Patients</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-x-purple">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$todaynewfol_patient?></h3>
              <span>Followup Patients</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-directional-cyan">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$Opto_waiting[0]['cnt_status_opto']+$Opto_inprogress[0]['cnt_patient_status'];?></h3>
              <span>All Patients</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>



</div> <!-- //row--->

<div class="row">
 

  

 

      <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-y2-pink">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$Opto_completed[0]['cnt_patient_status'];?></h3>
              <span>Optometry completed</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-directional-teal">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$Doc_inprocess[0]['cnt_patient_status'];?></h3>
              <span>Examination Inprogress</span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-12">
    <div class="card bg-gradient-y-red">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="media-body text-white text-left">
              <h3 class="text-white"><?=$Doc_comp[0]['cnt_patient_status'];?></h3>
              <span>Consultation Completed </span>
            </div>
            <div class="align-self-center">
              <i class="icon-users text-white font-large-2 float-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-12">
  
     
     
        <button onclick="showallpatient_details()" type="button" class="btn btn-danger btn btn-block compose-btn">
                                                      <i class="ft-info"></i>
                                                      Appointment Status
                                                  </button>
            <button onclick="getallcrossdoctorstatus()" type="button" class="btn btn-primary btn btn-block compose-btn">
                <i class="ft-info"></i>
                Cross Doctor Status  <span id="st_cnt4" style="font-size: 16px;background: #fff;color:black;" class="badge badge-pill badge badge-danger ml-1"><?php echo $crossdocst_cnt[0]['cnt']; ?></span>
            </button>
      
     
  
    </div>

    

</div>
<div id="pat_vie_s" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_moda_pat">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="All_Pat_Det" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_moda_All">
                      
                     <?php   $this->load->view("master/dashboard_status_patients"); ?>



                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="All_cross_st" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_moda_All_cross">
                      
                     <?php   $this->load->view("master/cross_doctor_status"); ?>



                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  <div class="row" >
                    <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><b>Today's Doctors Appointments</b></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                       
                        
                              
                                    <table class="table table-bordered table-hover" id="tab_das">
                                           <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Doctor Name</th>
                                                <th>Total Appointment</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                              <?php if($doctorapp){
                                                $sl=1;
                                                $dater=date('Y-m-d');
                                                foreach($doctorapp as $doname)
                                                {
                                                  $docid=$doname['doctors_registration_id'];
                                                  $sqll2 = "select count(*) as cnt from patient_appointment  where 
                                                  doctor_id=$docid and appointment_date='$dater'";
                                                       $result_row1=$this->db->query($sqll2); 
                                                       $res1= $result_row1->result_array();
                                                       $cnt=$res1[0]['cnt'];

                                                        $Opto_waiting=$Opto_comp=$dooc_inc=$dooc_com=$Opto_inp=$dooc_incg=0;

                                                            $dte=date('Y-m-d');

                                                            $sql1 = "SELECT count(*) as cnt_status_opto FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='$dte' and doctor_id=$docid    and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC";
                                                            $result_row1=$this->db->query($sql1); 
                                                            $res1= $result_row1->result_array ();
                                                            if($res1)
                                                            {
                                                                $Opto_waiting=$res1[0]['cnt_status_opto'];
                                                            }
                                                            //opto inpro
                                                             $whr='';
                                                          $userstatus=1;$staus=0;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql2 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row2=$this->db->query($sql2); 
                                                          $res2= $result_row2->result_array ();
                                                          if($res2)
                                                          {
                                                            $Opto_inp=$res2[0]['cnt_patient_status'];
                                                          }
                                                          //end opto inpo

                                                            ///opto com
                                                            $whr='';
                                                            $userstatus=1;$staus=1;
                                                          if($userstatus==1)
                                                          {
                                                            //$whr=" and optho_action=$staus and doc_action!=1";
                                                             $whr=" and optho_action=$staus and doc_action!=1 and  confirm_flag=0";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql2 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row2=$this->db->query($sql2); 
                                                          $res2= $result_row2->result_array ();
                                                          if($res2)
                                                          {
                                                            $Opto_comp=$res2[0]['cnt_patient_status'];
                                                          }
                                                          //end opto comp

                                                           ///Doc Inpro
                                                            $whr='';
                                                            $userstatus=3;$staus=0;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql3 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row3=$this->db->query($sql3); 
                                                          $res3= $result_row3->result_array ();
                                                          if($res3)
                                                          {
                                                            $dooc_inc=$res3[0]['cnt_patient_status'];
                                                          }
                                                          //end Doc Inpro

                                                             ///Doc Comp
                                                            $whr='';
                                                            $userstatus=3;$staus=1;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql4 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row4=$this->db->query($sql4); 
                                                          $res4= $result_row4->result_array ();
                                                          if($res4)
                                                          {
                                                            $dooc_com=$res4[0]['cnt_patient_status'];
                                                          }
                                                          //end Doc Comp
                                                          //doc inp
                                                            $whr='';
                                                            $userstatus=3;$staus=0;
                                                          if($userstatus==1)
                                                          {
                                                            $whr=" and optho_action=$staus and doc_action!=1";
                                                          }
                                                          if($userstatus==2)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=$staus";
                                                          }
                                                          if($userstatus==3)
                                                          {
                                                            $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
                                                          }
                                                          $dte=date('Y-m-d');
                                                         $sql4 = "select count(*) as cnt_patient_status from examination where examination_date='$dte' and doctor_id=$docid  $whr";
                                                          $result_row4=$this->db->query($sql4); 
                                                          $res4= $result_row4->result_array ();
                                                          if($res4)
                                                          {
                                                            $dooc_incg=$res4[0]['cnt_patient_status'];
                                                          }
                                                          //end doc
                                                             $opp=$Opto_waiting+$Opto_inp;

                                                             
                                                            $ff= $dooc_inc;

                                                         // $doctdetail="Opto waiting-$opp,Opto Completed-$Opto_comp,Doctor Waiting-$dooc_inc,Doctor Inprogress-$dooc_incg,Doctor Completed-$dooc_com";

                                                           $doctdetail="All Patients-$opp,Optometry completed-$Opto_comp ,Examination Inprogress-$ff,Examination Completed-$dooc_com";
                                                  ?>
                                                      <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><a style="text-decoration: underline;color: blue;" data-toggle="tooltip" title="<?php echo $doctdetail; ?>"><?php echo $doname['name']; ?></a></td>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><span onclick="pat_view(<?php echo $docid; ?>)" class="btn btn-success" style="cursor:pointer;"><i class="la la-eye"></i></span></td>
                                                      </tr>
                                                  <?php
                                                   $sl++;
                                                }
                                              } ?>
                                            </tbody>
                                          </table>
                                        
                                           
                              


                                    </div>
                                </div>
                            </div>
                            </div>
<script>
    $('[data-toggle="tooltip"]').tooltip();

      $('#tab_das').DataTable( {
       "drawCallback": function( settings ) {



// add as many tooltips you want

},
        buttons: [  ],
       
        dom: 'Blfrtip',
        "aaSorting": [[ 2, "desc" ]] ,
       "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
    } );
</script>
                            <div class="col-md-6">
                                 <div class="row" style="display:none;">
                                     

                                       <div class="col-xl-6 col-lg-6 col-md-6 col-12" style="display:none;">
                                                <div class="card bg-gradient-x2-info">
                                                  <div class="card-content">
                                                    <div class="card-body">
                                                      <div class="media d-flex">
                                                        <div class="media-body text-white text-left">
                                                          <h3 class="text-white"><?=$Doc_wating[0]['cnt_patient_status'];?></h3>
                                                          <span>Consultation waiting Patients</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                          <i class="icon-users text-white font-large-2 float-right"></i>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            </div> 

                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="card bg-gradient-directional-teal">
                                                  <div class="card-content">
                                                    <div class="card-body">
                                                      <div class="media d-flex">
                                                        <div class="media-body text-white text-left">
                                                          <h3 class="text-white"><?=$Doc_inprocess[0]['cnt_patient_status'];?></h3>
                                                          <span>Examination Inprogress</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                          <i class="icon-users text-white font-large-2 float-right"></i>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            </div> 

                                               <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="card bg-gradient-y-red">
                                                  <div class="card-content">
                                                    <div class="card-body">
                                                      <div class="media d-flex">
                                                        <div class="media-body text-white text-left">
                                                          <h3 class="text-white"><?=$Doc_comp[0]['cnt_patient_status'];?></h3>
                                                          <span>Examination Completed </span>
                                                        </div>
                                                        <div class="align-self-center">
                                                          <i class="icon-users text-white font-large-2 float-right"></i>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            </div> 
                               </div>

                                <div class="row">
                                     

                                      

                                                 

                                           


                               </div>

                               
                            </div>
                             </div>
                              </div>

<?php } elseif ($this->session->userdata('user_type')==3) { ?>
<style type="text/css">
  a:not([href]):not([tabindex]) {
    color: blue;
    text-decoration: underline;
}
</style>
   <div class="card-content card">
      <div class="card-body">
          <ul class="nav nav-tabs">
              <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
              <li class="nav-item">
                  <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View</a>
              </li>
             
               <li class="nav-item">
                  <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Inprogress</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Completed</a>
              </li>
              <?php if($this->session->userdata('user_type')==2){ ?>
               <li class="nav-item">
                  <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">All Patients</a>
              </li>
            <?php } ?>
          
          </ul>

              <div class="tab-content px-1 pt-1">
                 <div role="tabpanel" class="tab-pane active" id="tab2" aria-expanded="true" aria-labelledby="base-tab2">
                     <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
                             <div class="row">
                             <div class="col-sm-3 col-md-3">
                                 <?php if($this->session->userdata('user_type')==2){ ?>
                                            <div class="form-group">
                                              
                                                <select class="form-control select2" name="doctor_id" id="doctor_id1">
                                                    <option value="0">Select All Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                      $sell='';
                                                      $ll=$this->session->userdata('login_id');
                                                       $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
                                                      if($doctor_id_new_cond==$data['doctors_registration_id'])
                                                      {
                                                        $sell='selected';
                                                      }
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>" <?php echo $sell; ?>><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                         </div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="search_date" id="search_date" class="form-control search_date">
                                </div>
                                <div class="col-md-2">
                                    <button onclick="getpateintdetails(<?php echo $this->session->userdata('user_type'); ?>)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                                <div class="col-md-2">
                                  <button style="padding: 4px 9px;float: right;" class="btn btn-icon btn-info mr-1 mb-1" type="button"><i class="la la-cog" onclick="showmodal()"></i></button>
                                </div>
                            </div>
                               <div class="table-responsive" id="p_date">
                                </div>
                      </div>
                </div>


                 <div role="tabpanel" class="tab-pane" id="tab3" aria-expanded="true" aria-labelledby="base-tab3">
                     <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                             <div class="row">
                             <div class="col-sm-3 col-md-3">
                                 <?php if($this->session->userdata('user_type')==2){ ?>
                                            <div class="form-group">
                                              
                                                <select class="form-control select2" name="doctor_id" id="doctor_id2">
                                                    <option value="0">Select All Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                      $sell='';
                                                      $ll=$this->session->userdata('login_id');
                                                       $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
                                                      if($doctor_id_new_cond==$data['doctors_registration_id'])
                                                      {
                                                        $sell='selected';
                                                      }
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>" <?php echo $sell; ?>><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                         </div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="search_date" id="insearch_date" class="form-control search_date">
                                </div>
                                <div class="col-md-4">
                                    <button onclick="getsaveddetails(<?php echo $this->session->userdata('user_type'); ?>,0)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                            </div>
                               <div class="table-responsive" id="inprogress">
                                </div>
                      </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="tab4" aria-expanded="true" aria-labelledby="base-tab4">
                     <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                             <div class="row">
                             <div class="col-sm-3 col-md-3">
                                 <?php if($this->session->userdata('user_type')==2 ){ ?>
									<div class="form-group">
									  
										<select class="form-control select2" name="doctor_id" id="doctor_id3">
											<option value="0">Select All Doctor</option>
											 <?php if($doctors){foreach($doctors as $data){
											  $sell='';
											  $ll=$this->session->userdata('login_id');
											   $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
											  if($doctor_id_new_cond==$data['doctors_registration_id'])
											  {
												$sell='selected';
											  }
											  ?>
												<option value="<?php echo $data['doctors_registration_id']; ?>" <?php echo $sell; ?>><?php echo $data['name']; ?></option>
												<?php } } ?>
										</select>
									</div>
									<?php } ?>
									<?php if($this->session->userdata('user_type')==3 ){ ?>
									<div class="form-group">
									   <select class="form-control select2" name="opto_id" id="opto_id">
											<option value="0">Select All Opto</option>
											  <?php if($user_data){foreach($user_data as $data){ ?>
													<option value="<?php echo $data['user_id']; ?>"><?php echo $data['name']; ?></option>
											   <?php } } ?>
										</select>
									</div>
									<?php } ?>
                               </div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="search_date" id="prosearch_date" class="form-control search_date">
                                </div>
                                
                                <div class="col-md-2">
                                    <button onclick="getsaveddetails(<?php echo $this->session->userdata('user_type'); ?>,1)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                                 <div class="col-md-2">
                                  <button style="padding: 4px 9px;float: right;" class="btn btn-icon btn-info mr-1 mb-1" type="button"><i class="la la-cog" onclick="showmodal()"></i></button>
                                 </div>
                            </div>
                               <div class="table-responsive" id="progress">
                                </div>
                      </div>
                </div>


                 <div role="tabpanel" class="tab-pane" id="tab5" aria-expanded="true" aria-labelledby="base-tab5">
                     <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                             <div class="row">
                             <div class="col-sm-3 col-md-3">
                                 <?php if($this->session->userdata('user_type')==2){ ?>
                                            <div class="form-group">
                                              
                                                <select class="form-control select2" name="doctor_id" id="doctor_id4">
                                                    <option value="0">Select All Doctor</option>
                                                     <?php if($doctors){foreach($doctors as $data){
                                                      $sell='';
                                                      $ll=$this->session->userdata('login_id');
                                                       $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
                                                      if($doctor_id_new_cond==$data['doctors_registration_id'])
                                                      {
                                                        $sell='selected';
                                                      }
                                                      ?>
                                                        <option value="<?php echo $data['doctors_registration_id']; ?>" <?php echo $sell; ?>><?php echo $data['name']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                         </div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="allsearch_date" id="allsearch_date" class="form-control search_date">
                                </div>
                                <div class="col-md-4">
                                    <button onclick="getpateintdetailst()"  class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                            </div>
                               <div class="table-responsive" id="allpatient">
                                </div>
                      </div>
                </div>

             </div>


           


        </div>
      </div>


      <script type="text/javascript">
      $(document ).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
    $('.search_date').val(cd);
    getpateintdetails(<?php echo $this->session->userdata('user_type'); ?>);
});
function getpateintdetails(val) 
{
  if(val==3)
  {
    urld='Patients_registration/getpatientdetails1';
    doctor_id_new=0;
  }
  else if(val==2)
  {
     urld='<?php echo base_url() ?>transaction/Examination/getsavedexamionation';
     doctor_id_new=$('#doctor_id1').val();
  }
     $("#overlay").fadeIn(300);
     $.fn.dataTable.ext.errMode = 'none';
     $.ajax({
            type: "POST",
            url: urld,
            dataType: "json",
            data: {sdate:$('#search_date').val(),doctor_id_new:doctor_id_new,utype:val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#p_date').html(data.msg);
                  var table = $('#tableid').DataTable( {
       
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


function getsaveddetails(val,typed) 
{
	// alert(val);
	// alert(typed);
   urld='<?php echo base_url() ?>transaction/Examination/getsavedexamionationex';
  if(typed==0)
  {
     dd=$('#insearch_date').val();
     dsdd='inprogress';
      dsd1d='tablein';
      doctor_id_new=0;
  }
  else
  {
     dd=$('#prosearch_date').val();
     dsdd='progress';
      dsd1d='tablepro';
      doctor_id_new=$('#doctor_id2').val();
  }
     $("#overlay").fadeIn(300);
     $.fn.dataTable.ext.errMode = 'none';
     $.ajax({
            type: "POST",
            url: urld,
            dataType: "json",
            data: {sdate:dd,utype:val,doctor_id_new:doctor_id_new,typecond:typed,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){

                $('#'+dsdd).html(data.msg);
                  var table = $('#'+dsd1d).DataTable( {
       
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

 function printdata(printpatient_registration_id){

         $('<form target="_blank"  method="post" action="<?php echo base_url() ?>master/Patients_registration/print_appointment/"><input name="printpatient_registration_id" value="'+printpatient_registration_id+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }

    function printdataexamination(printpatient_registration_id,pat_app_id,sel=0,actionflag=0){
      //actionflag=0.fresh optho ,1.optho,2:doctor

         $('<form method="post" action="<?php echo base_url() ?>transaction/Examination/"><input name="printpatient_registration_id" value="'+printpatient_registration_id+'"/><input name="pat_app_id" value="'+pat_app_id+'"/><input name="doc_examination_id" id="doc_examination_id" value="'+sel+'"/><input name="actionflag" id="actionflag" value="'+actionflag+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

    }

    function examinationnewprint(examinationid)
{
   $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/examinationnewprint"><input name="examinationid" value="'+examinationid+'"/><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();
}

function examinationprint(examinationid,sel=0)
{
  //   if(sel==1)
  //   {
  //        $(".check_class").attr("checked", false);
  //        $("#specchk").attr("checked", true);
  //   }
  //   else
  //   {
  //       $(".check_class").attr("checked", true);
  //   }

  //  $('<form target="_blank"  method="post" action="<?php echo base_url(); ?>/transaction/Examination/examinationprint"><input name="examinationid" value="'+examinationid+'"/><input name="chkcomplaintsout" value="'+$('#chkcomplaints').is(':checked')+'"><input name="chkopthalmicsout" value="'+$('#chkophthalmic').is(':checked')+'"><input name="chkmedicalout" value="'+$('#chkmedical').is(':checked')+'"><input name="chkeyepartout" value="'+$('#chkeyepart').is(':checked')+'"><input name="addmedicinessout" value="'+$('#addmediciness').is(':checked')+'"><input name="investigationchkout" value="'+$('#investigationchk').is(':checked')+'"><input name="preliminary_exout" value="'+$('#preliminary_ex').is(':checked')+'"><input name="vsisonreadingsout" value="'+$('#vsisonreadings').is(':checked')+'"><input name="curspecout" value="'+$('#curspec').is(':checked')+'"><input name="objectchkout" value="'+$('#objectchk').is(':checked')+'"><input name="arkkchkout" value="'+$('#arkkchk').is(':checked')+'"><input name="manchkout" value="'+$('#manchk').is(':checked')+'"><input name="specchkout" value="'+$('#specchk').is(':checked')+'"><input name="fspecchkout" value="'+$('#fspecchk').is(':checked')+'"><input name="conlchkout" value="'+$('#conlchk').is(':checked')+'"><input name="pmtchkout" value="'+$('#pmtchk').is(':checked')+'"><input name="csrf_test_name" value="'+$('#csrf_test_name').val()+'"></form>').appendTo('body').submit().remove();

   var inputFields = [];

for (var i = 1; i <= 22; i++) {
    var inputField = $('<input>').attr({
        name: 'chkpostout' + i,
        value: $('#popupchk'+i).is(':checked')
    });
    inputFields.push(inputField);
}

// Create a form element
var form = $('<form>', {
    target: '_blank',
    method: 'post',
    action: '<?php echo base_url(); ?>/transaction/Examination/examinationprint_preview'
});

// Add individual input fields to the form
csrf_test_name=$('#csrf_test_name').val();
form.append('<input name="examinationid" value="' + examinationid + '" />');
form.append('<input name="csrf_test_name" value="' + csrf_test_name + '" />');


// Append the input fields from the inputFields array to the form
for (var i = 0; i < inputFields.length; i++) {
    form.append(inputFields[i]);
}

// Append the form to the body, submit it, and remove it
form.appendTo('body').submit().remove();


}
 function printsubmit()
   {
      Swal.fire({title:"",text:"Saved data",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
      $('#mclose').click();
   }
    function showmodal() {
              $('#modaldiv_modal').modal('show');
         }

         
function previewdatewise(val, preid) {
        //INR2
        $('#examinationIdPreview').val(val);
        $('#preIdvalue').val(preid);
        $('#select-all').prop('checked', false);
        console.log($('#examinationIdPreview').val(val));
        if (val > 0) {
            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>transaction/Examination/getexaminationpreview',
                dataType: "json",
                data: {
                    examinationid: val,
                    csrf_test_name: $('#csrf_test_name').val()
                },
                success: function(data) {
                    $("#overlay").fadeOut(300);
                    if (data.msg != '') {
                        $('#' + preid).html(data.showdata);
                    } else if (data.error != '') {

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
    function getalert()
{
    $('#select-all').on('click',function(){
        if(this.checked){
 var preId=$('#preIdvalue').val();
        for (var i = 1; i <= 22; i++) 
        {
            $('#'+preId).find('#'+i+'sec_chk').prop('checked', true);
        }

        }else{
var preId=$('#preIdvalue').val();
        for (var i = 1; i <= 22; i++) 
        {
            $('#'+preId).find('#'+i+'sec_chk').prop('checked', false);
        }

        }
    });
}
    $(document).ready(function(){
   getalert();
    
   
});
function examinationprintNew()
{


   var examinationid= $('#examinationIdPreview').val();
   var preId=$('#preIdvalue').val();
  
   if(examinationid > 0)
{

    var inputFields = [];

for (var i = 1; i <= 22; i++) {
    var inputField = $('<input>').attr({
        name: 'chkpostout' + i,
        value: $('#'+preId).find('#'+i+'sec_chk').is(':checked')
    });
    inputFields.push(inputField);
}

// Create a form element
var form = $('<form>', {
    target: '_blank',
    method: 'post',
    action: '<?php echo base_url(); ?>/transaction/Examination/examinationprint_preview'
});

// Add individual input fields to the form
csrf_test_name=$('#csrf_test_name').val();
form.append('<input name="examinationid" value="' + examinationid + '" />');
form.append('<input name="csrf_test_name" value="' + csrf_test_name + '" />');


// Append the input fields from the inputFields array to the form
for (var i = 0; i < inputFields.length; i++) {
    form.append(inputFields[i]);
}

// Append the form to the body, submit it, and remove it
form.appendTo('body').submit().remove();



}


    
}
</script>
<style>
    .table th,
    .table td {
        padding: 5px;
    }

    .powline{
        line-height:26px;
    }
</style>

<?php  } elseif ($this->session->userdata('user_type')==8){ ?>

   <div class="card-content card">
      <div class="card-body">
        <div id="invest_data"></div>
          <ul class="nav nav-tabs">
              <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
              <li class="nav-item">
                  <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">View Investigation</a>
              </li>
          </ul>

          <div class="tab-content px-1 pt-1">
                 <div role="tabpanel" class="tab-pane active" id="tab2" aria-expanded="true" aria-labelledby="base-tab2">
                     <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
                             <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4">
                                    <input style="height: 43px;" type="date" name="search_date" id="search_date" class="form-control search_date">
                                </div>
                                <div class="col-md-2">
                                    <button onclick="getpateintdetails(<?php echo $this->session->userdata('user_type'); ?>)" class="btn btn-icon btn-warning mr-1 mb-1" type="button"><i class="la la-search"></i></button>
                                </div>
                              
                            </div>
                               <div class="table-responsive" id="p_date">
                                </div>
                      </div>
                </div>

               
             </div>


          </div>
        </div>
        <form id="upload_file" action="#" method="post"> 
      <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
 <div id="up_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" id="div_modal">
                            
                               <div class="form-group">
                                <input type="hidden" name="invoiceidu" id="invoiceidu" >
                                <label>Upload File</label>
                              
                      <input type="file" id="file_input" name="files[]" multiple="" accept=".pdf,.jpg,.png,.jpeg">
                      <input type="hidden" id="file_patient" name="file_patient" >
                  
                               </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button style="float:left;" id="save" class="btn btn-info btn-sm" type="button" onclick="viewfile();"><i class="fas fa-plus-square"></i>View Files</button>
                <button id="save" class="btn btn-primary btn-sm" type="button" onclick="saveatt();"><i class="fas fa-plus-square"></i>Upload file</button>
                    <button type="button" id="mclose" class="btn btn-danger btn-sm cls upclick" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>



    




        <script type="text/javascript">
            $(document ).ready(function() {
    cd = (new Date()).toISOString().split('T')[0];
    $('.search_date').val(cd);
     getallinvestigation(<?php echo $this->session->userdata('user_type'); ?>);
});
function deletefile(val)
{
      if(val=='') {
           Swal.fire({title:"Info!",text:"Delete ID Not Found !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
           return false;
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
            delurl="Common_controller/deletefile";
           
                   $.ajax({
            type: "POST",
            url: delurl,
            dataType: "json",
            data: $('#upload_file').serialize()+"&id="+val,
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
               Swal.fire({title:"Deleted",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
               table.draw();

                // $("#savepurchaseorder_form")[0].reset();
                 return false;
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

function saveatt()
{    
   
    var formData = new FormData();
    var filesLength = document.getElementById('file_input').files.length;
    console.log(filesLength);
    if (filesLength == 0) {
      Swal.fire({ title: "Info!", text: "No Files Selected", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

      $("#overlay").fadeOut(300);
    }
    else {
      for (var i = 0; i < filesLength; i++) {
        formData.append("files[]", document.getElementById('file_input').files[i]);

      }
      formData.append("file_patient", $('#file_patient').val());
       formData.append("csrf_test_name", $('#csrf_test_name').val());

      $.ajax({

        type: "POST",

        url: 'Common_controller/saveatt',

        mimeType: "multipart/form-data",
        //    data:$('#fileUploadForm').serialize(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {

          $("#overlay").fadeOut(300);

          if (data.msg != '') {

            //  $('#view_file').html(data.msg);
            Swal.fire({ title: "success", text: "" + "File Uploaded Sucessfully!!" + "", type: "success", confirmButtonClass: "btn btn-success", buttonsStyling: !1 });

          } else if (data.error != '') {

            Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          } else if (data.error_message) {

            var error = data.error_message;

            var err_str = '';

            for (var key in error) {

              err_str += error[key] + '\n';

            }

            Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          }



        },

        error: function (error) {

          Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          $("#overlay").fadeOut(300);

        }

      });
    }

        // if($("#photo").val()=='') {
        //    Swal.fire({title:"Info!",text:"Please Choose Attachment !",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1})
        //    return false;
        // }
        // let data = new FormData($("#upload_file")[0]);
        // $("#overlay").fadeIn(300);
        // saveurl="Common_controller/saveatt";
        //  $.ajax({
        //     type: "POST",
        //     url: saveurl,
        //     dataType: "json",
        //     data: data,
        //     contentType: false,       
        //     cache: false,             
        //     processData:false, 
        //     success: function(data){
        //         $("#overlay").fadeOut(300);
        //        if(data.msg != ''){
        //        Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
        //        $('.cls').click();
        //       } else if(data.error != ''){
        //         Swal.fire({title:"Warning!",text:""+data.error+"",type:"warning",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
        //       } else if(data.error_message) 
        //       {
        //         var error = data.error_message;
        //         var err_str = '';
        //         for (var key in error) {
        //           err_str += error[key] +'\n';
        //         }
        //         Swal.fire({title:"Info!",text:""+err_str+"",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
        //       }
                
        //     },
        //     error: function (error) {
        //         Swal.fire({title:"Info!",text:"Network Busy",type:"info",confirmButtonClass:"btn btn-primary",buttonsStyling:!1});
        //         $("#overlay").fadeOut(300);  
        //     }
        // }); 

    
}

function uploadattachment(val)
{
    if(val>0)
    {
        tit='Upload Attachment';
        $('#up_modal').modal('show');
        $('.modal-title').html(tit);
        $('#invoiceidu').val(val);
        $('#file_patient').val(val);
    }
}
function viewfile()
{
    if($('#file_patient').val()>0)
    {
      
       

       
   
    $("#overlay").fadeIn(300);


    $.ajax({

      type: "POST",

      url: 'Common_controller/viewFile',

      dataType: "json",

      data: { getid: $('#file_patient').val(), csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {
          
          $('.upclick').click();
        tit='View Attachment';
        $('#att_view_modal').modal('show');
        $('.modal-titlest').html(tit);
          $('#siv_fil_at').html(data.msg);

        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });




  


    }
}
  function getallinvestigation(val) 
{
  
     $("#overlay").fadeIn(300);
     $.fn.dataTable.ext.errMode = 'none';
     $.ajax({
            type: "POST",
            url: 'Common_controller/getallinvestigation',
            dataType: "json",
            data: {sdate:$('#search_date').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#p_date').html(data.msg);
                  var table = $('#tableid').DataTable({
                      buttons: [  ],
                      dom: 'Blfrtip',
                      columnDefs: [{
                             lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
                         }]
                 });
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
function getpateintdetails(val) 
{
  
     $("#overlay").fadeIn(300);
     $.fn.dataTable.ext.errMode = 'none';
     $.ajax({
            type: "POST",
            url: 'Common_controller/getallinvestigation',
            dataType: "json",
            data: {sdate:$('#search_date').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#p_date').html(data.msg);
                  var table = $('#tableid').DataTable({
                      buttons: [  ],
                      dom: 'Blfrtip',
                      columnDefs: [{
                             lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
                         }]
                 });
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


function addinvest(dte,patid)
{
    if(patid>0)
    {
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Common_controller/addinvest',
            dataType: "json",
            data: {dte: $('#'+dte).val(),patid: patid,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                 $('#invest_data').html(data.msg);
                 $('#div_modal').modal('show');
                 $('.modal-title').html('Investigation Details');
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
        </script>

<?php } ?>
<script type="text/javascript">
  function getpateintdetailst() 
{
    $('#allpatient').html('');
     $("#overlay").fadeIn(300);
     $.fn.dataTable.ext.errMode = 'none';
     doctor_id_new=$('#doctor_id2').val();
     $.ajax({
            type: "POST",
            url: 'Patients_registration/getpatientdetailsall',
            dataType: "json",
            data: {sdate:$('#allsearch_date').val(),doctor_id_new:doctor_id_new,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#allpatient').html(data.msg);
                  var table = $('#tableidall').DataTable( {
       
        buttons: [  ],
       
        dom: 'Blfrtip',
       "lengthMenu": [[5,10,25, 50, 100, 1000], [5,10,25, 50, 100, 1000]]
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

function pat_view(docid)
{
    if(docid>0)
    {
         $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Dashboard/pat_view',
            dataType: "json",
            data: {docid: docid,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                //alert(data.msg);
                 $('#div_moda_pat').html(data.msg);
                 $('#pat_vie_s').modal('show');
                 $('.modal-title').html('Appointment Details');
                
                 var table = $('#pp_pat').DataTable( {
       
       buttons: [  ],
      
       dom: 'Blfrtip',
      "lengthMenu": [[1000], [1000]]
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
}
function showallpatient_details(val=0)
{
    <?php
    $doctor_id_new_cond=0;
        if($this->session->userdata('user_type')==2)
          {
             $ll=$this->session->userdata('login_id');
             $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
          } 
       ?>
  if(val==0)
  {
    docid=$('#all_cons').val();
    curdate=$('#date_pic').val();

    if ( $.fn.DataTable.isDataTable('#pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4') ) {
  $('#pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4').DataTable().destroy();
}
  }
  else
  {
    docid=$('#all_cons').val();
    curdate=$('#date_pic').val();

    if ( $.fn.DataTable.isDataTable('#pat_st_av'+val) ) {
  $('#pat_st_av'+val).DataTable().destroy();
}

$('#show_all_pat_st_av'+val).empty();
  }
  $('#All_Pat_Det').modal('show');
  $('.modal-title').html('Appointment Status');

        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Dashboard/patview_status',
            dataType: "json",
            data: {doc_id:docid,curdate:curdate,type:val,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                if(val==0)
                {
                  $('#show_all_pat_st_av1').html(data.dataview1);
                  $('#st_cnt1').html(data.cnt1);
                  $('#show_all_pat_st_av2').html(data.dataview2);
                  $('#st_cnt2').html(data.cnt2);
                  $('#show_all_pat_st_av3').html(data.dataview3);
                  $('#st_cnt3').html(data.cnt3);
                  $('#show_all_pat_st_av4').html(data.dataview4);
                  $('#st_cnt4').html(data.cnt4);
                  $('#pat_st_av1,#pat_st_av2,#pat_st_av3,#pat_st_av4').DataTable({
                    buttons: [  ],
                    dom: 'Blfrtip',
                     
                    "lengthMenu": [[1000], [1000]],
                  });
                  
                }
                else
                {
                  $('#show_all_pat_st_av'+val).html(data.dataview1);
                  $('#st_cnt'+val).html(data.cnt1);
                  $('#pat_st_av'+val).DataTable({
                    buttons: [  ],
                    dom: 'Blfrtip',
                   "lengthMenu": [[1000], [1000]]
                  });
                }
                 $('.modal-title').html('Appointment Details');
                
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
function getallcrossdoctorstatus()
{
  $('#cross_cnt_contr').html(0);
  $('#All_cross_st').modal('show');
  $('.modal-title').html('Cross Doctor Status');
        $("#overlay").fadeIn(300);
         $.ajax({
            type: "POST",
            url: 'Dashboard/Get_cross_data',
            dataType: "json",
            data: {doc_id:$('#cross_all_cons').val(),cross_date_pic:$('#cross_date_pic').val(),csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                $('#cross_cnt_contr').html(data.crosscnt);
                   $('#cross_ref_data').html(data.msg);
                   var table = $('#data_cross').DataTable( {
       
                    buttons: [  ],
                    
                    dom: 'Blfrtip',
                    columnDefs: [ {
                            
                            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
                    }]
                } );
                
                 } else if(data.error != ''){
                  var table = $('#data_cross').DataTable();

//clear datatable
table.clear().draw();
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
function rooming(appid)
{
  Swal.fire({title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, Rooming it!",
            confirmButtonClass:"btn btn-warning",
            cancelButtonClass:"btn btn-danger ml-1",
            buttonsStyling:!1}).then((function(t){
              if(t.value)
                {
             $("#overlay").fadeIn(300);
             $.ajax({
            type: "POST",
            url: 'Patients_registration/rooming_change',
            dataType: "json",
            data: {appid:appid,csrf_test_name:$('#csrf_test_name').val()},
            success: function(data){
                $("#overlay").fadeOut(300);
               if(data.msg != ''){
                Swal.fire({title:"",text:""+data.msg+"",type:"success",confirmButtonClass:"btn btn-success",buttonsStyling:!1});
                location.reload();
                 } else if(data.error != '')
                 {
                
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
                })) 

    
       
}
cd = (new Date()).toISOString().split('T')[0];
$('.date_pic_class').val(cd);

</script>
</div>
<style>
  .modal {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    overflow: hidden;
}
.modal-dialog {
    position: fixed;
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}
.modal-header {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    border: none;
}
.modal-content {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 0;
    box-shadow: none;
}
.modal-body {
    position: absolute;
    top: 50px;
    bottom: 0;
    font-size: 15px;
    overflow: auto;
    margin-bottom: 60px;
    padding: 0 15px 0;
    width: 100%;
}
.modal-footer {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    height: 30px;
    padding: 10px;
    background: #f1f3f5;
}
.modal-xl {
    max-width: 100%;
   
}
.modal-lg {
    max-width: 100%;
   
}
.bgsts
{
  background:green;
}
/* to delete the scrollbar */
/*
::-webkit-scrollbar {
    -webkit-appearance: none;
    background: #f1f3f5;
    border-left: 1px solid darken(#f1f3f5, 10%);
    width: 10px;
}
::-webkit-scrollbar-thumb {
    background: darken(#f1f3f5, 20%);
}
*/


.buttonbl {
        background-color: #1c87c9;
        -webkit-border-radius: 60px;
        border-radius: 60px;
        border: none;
        color: #eeeeee;
        cursor: pointer;
        display: inline-block;
        font-family: sans-serif;
        font-size: 17px;
       padding: 0px 5px;
        text-align: center;
        text-decoration: none;
      }
      @keyframes glowing {
        0% {
          background-color: #2ba805;
          box-shadow: 0 0 5px #2ba805;
        }
        50% {
          background-color: #49e819;
          box-shadow: 0 0 20px #49e819;
        }
        100% {
          background-color: #2ba805;
          box-shadow: 0 0 5px #2ba805;
        }
      }
      .buttonbl {
        animation: glowing 1300ms infinite;
      }

</style>
