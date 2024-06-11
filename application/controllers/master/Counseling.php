<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counseling extends CI_Controller {

  private $msg;
  private $error;
  private $error_message;
  private $randval;
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        
        $this->load->model('Counseling_model');
        $this->load->model('Common_model');
        $this->load->model('Mrd_user_model');
    }
  public function index()
  {
      $data['title']='EMR::Counseling';
      $data['activecls']='counseling';
      $cdate=date('Y-m-d');
      $var_array=array($this->session->userdata('office_id'));
      $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
       $data['getallmedicine']=$this->Common_model->getallmedicine($var_array);
      $content=$this->load->view('master/counseling',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
  }

  public function gettreatmentplan()
  {
      $this->form_validation->set_rules('surgical_date', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
      $this->form_validation->set_rules('chargetype_id', 'Charge Type ID', 'trim|required|min_length[1]|max_length[16]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $surgical_date_st=trim(htmlentities($this->input->post('surgical_date_st')));
        $surgical_date=trim(htmlentities($this->input->post('surgical_date')));
        $chargetype_id=trim(htmlentities($this->input->post('chargetype_id')));
        $fl=$this->input->post('flag')-1;
           $var_array=array($this->input->post('status'),$surgical_date_st,$surgical_date,$chargetype_id,$this->session->userdata('office_id'));
          $getresult=$this->Counseling_model->gettreamnetplanmodel($var_array);
         // print_r($getresult);exit;
          $flag=$this->input->post('flag');
          if($getresult)
          {
            $tdd='';$tdd1='';
            if($chargetype_id==2)
            {
              if($flag==1)
              {
                $idname='sur_open';
                $tdd='<th>Delete</th>';
              }
              elseif($flag==2)
              {
                $idname='sur_pending';
              }
              elseif($flag==3)
              {
                $idname='sur_completed';
              }
              elseif($flag==4)
              {
                $idname='sur_cancel';
              }
              
              
            }
            elseif($chargetype_id==3)
            {
              if($flag==1)
              {
                $idname='las_open';
                $tdd='<th>Delete</th>';
               
              }
              elseif($flag==2)
              {
                $idname='las_pending';
              }
              elseif($flag==3)
              {
                $idname='las_completed';
              }
              elseif($flag==4)
              {
                $idname='las_cancel';
              }
            }
               elseif($chargetype_id==4)
            {
              if($flag==1)
              {
                $idname='inj_open';
                $tdd='<th>Delete</th>';
               
              }
              elseif($flag==2)
              {
                $idname='inj_pending';
              }
              elseif($flag==3)
              {
                $idname='inj_completed';
              }
              elseif($flag==4)
              {
                $idname='inj_cancel';
              }
            }
            $html='<div class="table-responsive"><table id="'.$idname.'_datatable" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>MRD NO</th>
                                    <th>Mobile No</th>
                                    <th>Doctor Name</th>
                                    <th>Particulars</th>
                                    <th>EYE</th>
                                    <th>A Date</th>
                                    <th>Action</th>
                                    '.$tdd.'
                                    <th data-toggle="tooltip" title="Surgery Fitness Request">SFR</th>
                                    <th data-toggle="tooltip" title="Order Diagnostics">OD</th>
                                    <th data-toggle="tooltip" title="Preoperative Instruction">PI</th>
                                  </tr>
                                </thead><tbody>';
            $sl=1;
            foreach($getresult as $data)
            { 
               $examination_id=$data['examination_id'];
            if($flag==1)
              {
                
                
                $tdd1='<td><button class="btn btn-danger" onclick="deletedata('.$data['examination_treatmentplan_id'].','.$this->input->post('flag').')"><i class="la la-trash"></i></button></td>';
              } 
               $parti=$partiidlis='';
              //  if($data['particular_id'])
              // {
             
                if($examination_id)
                {
                  $getparid=$this->Common_model->get_Each_particularsmodel($examination_id,$chargetype_id);
                  if($getparid)
                  {
                    
                    foreach($getparid as $dataparti)
                    {
                       $npartid=$dataparti['particular_id'];
                       if($npartid)
                       {
                         $getparticularname=$this->Common_model->getparticularsmodel($data['chargetype_id'],$npartid,$this->session->userdata('office_id')); 
                          $parti.= $getparticularname[0]['name'].',';
                          $partiidlis.=$npartid.',';
                       }
                    }
                  }
                }

                 // $par= explode(",",$getresult[0]['particular_id']);
                 // if($par)
                 // {
                 //  $parti='';
                 //   foreach($par as $pardata)
                 //   {
                 //    if($pardata){
                 //     $getparticularname=$this->Common_model->getparticularsmodel($data['chargetype_id'],$pardata,$this->session->userdata('office_id')); 
                 //     }
                 //     $parti.= $getparticularname[0]['name'].',';
                 //   }
                 // }
              //}
              $partiy=substr($parti, 0, -1);
              $partiidlisdata=substr($partiidlis, 0, -1);
              if($data['eye']==1)
              {
                $eye='Left eye';
              }         
              elseif ($data['eye']==2) 
              {
                $eye='Right Eye';
              }
              else
              {
                $eye='Both Eye';
              }
             $newtextbox='<input type="hidden" id="datalistparti_'.$examination_id.'" value="'.$partiidlisdata.'">';
              $html.='<tr>
                    <td>'.$sl.'</td>
                    <td>'.$data['pateint_name'].'</td>
                    <td>'.$data['mrdno'].'</td>
                    <td>'.$data['mobileno'].'</td>
                    <td>'.$data['doctorname'].'</td>
                    <td>'.$partiy.'</td>
                    <td>'.$eye.'</td>
                    <td>'.$data['appointment_date'].'</td>
                   
                    <td><input type="hidden" id="trchargetype_id" value="'.$data['chargetype_id'].'"><button class="btn btn-success"><i class="la la-edit" onclick="updatestatus('.$data['examination_treatmentplan_id'].','.$this->input->post('flag').','.$examination_id.')"></i></button></td>
                    '.$tdd1.'
                     <td><button class="btn btn-info"><i class="la la-asterisk" onclick="getsurgeryfitness('.$data['examination_treatmentplan_id'].','.$chargetype_id.','.$examination_id.',1)"></i></button></td>
                    <td><button class="btn btn-warning"><i class="la la-bar-chart" onclick="getorderdia('.$data['examination_treatmentplan_id'].','.$chargetype_id.','.$examination_id.',2)"></i></button></td>
                    <td><button class="btn btn-primary"><i class="la la-clone" onclick="getpreoperative('.$data['examination_treatmentplan_id'].','.$chargetype_id.','.$examination_id.',3)"></i></button>'.$newtextbox.'</td>
                  </tr>';
              $sl++;
            }
            $html.='</tbody></table></div>';

            echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));
          }
          else
          {
              echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));
          }
        
      }
      else
      {
           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
      }
  }

  public function updatestatus()
  {
    $this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
    if($this->form_validation->run() == TRUE)
      {
          $var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
          $getresult=$this->Counseling_model->getpatientdetailsproceduremdl($var_array);
          //print_r($getresult);exit;
          if($getresult)
          {
            $le=$r=$b='';
            if($getresult[0]['eye']==1)
              {
                $le='checked';
              }         
              elseif ($getresult[0]['eye']==2) 
              {
                $r='checked';
              }
              else
              {
                $b='checked';
              }

              
                 $par= explode(",",$this->input->post('proceduredata'));
                 if($par)
                 {
                  $parti='';
                   foreach($par as $pardata)
                   {
                    if($pardata){
                     $getparticularname=$this->Common_model->getparticularsmodel($getresult[0]['chargetype_id'],$pardata,$this->session->userdata('office_id')); 
                      }
                     $parti.= $getparticularname[0]['name'].',';
                   }
                 }
             

              $getusname=$this->Common_model->getallusercounseler(6); 
              $us='';
              if($getusname)
              {
                foreach($getusname as $data)
                {
                $us.='<option value="'.$data['user_id'].'">'.$data['name'].'</option>';
                }
              }
              if($getresult[0]['chargetype_id']==2)
              {
                $clsn="style='display:block'";
              }
              elseif($getresult[0]['chargetype_id']==3)
              {
                $clsn="style='display:none'";
              }
              elseif($getresult[0]['chargetype_id']==4)
              {
                $clsn="style='display:none'";
              }

              $sell0=$sell1=$sell2=$sell3='';
              $flag=$this->input->post('flag');
              if($flag==0)
              {
                $sell0='selected';
              }
              if($flag==1)
              {
                $sell1='selected';
              }
              if($flag==2)
              {
                $sell2='selected';
              }
              if($flag==3)
              {
                $sell3='selected';
              }
              
              
                 $opt=' <option value="0" '.$sell0.'>Open</option> 
                        <option value="1" '.$sell1.'>Pending</option>
                       <option value="2" '.$sell2.'>Complete</option>
                       <option value="3" '.$sell3.'>Cancel</option>';
               
              $remval=$getresult[0]['open_remarks'].' '.$getresult[0]['pending_remarks'].' '.$getresult[0]['completed_remarks'];
              $rechk='';
              if($remval)
              {
                $rechk='<br/>Remarks:'.$remval;
              }
              $penrem='';
              if($getresult[0]['open_remarks'])
              {
                $penrem='<p>Remarks:'.$remval.'</p>';
              }
              $penrem='<table class="table table-striped table-bordered table-hover"><tr><td>Open Remarks</td><td>'.$getresult[0]['open_remarks'].'</td></tr><tr><td>Pending Remarks</td><td>'.$getresult[0]['pending_remarks'].'</td></tr><tr><td>Complete Remarks</td><td>'.$getresult[0]['completed_remarks'].'</td></tr><tr><td>Cancel Remarks</td><td>'.$getresult[0]['cancel_remarks'].'</td></tr></table>';
              $var_arrays=array($this->session->userdata('office_id'));
              $is='';
              $insurancecompanys=$this->Common_model->getinsurance_company($var_arrays);
              if($insurancecompanys)
              {
                $is='';
                foreach($insurancecompanys as $data)
                {
                  $selll='';
                  if($getresult[0]['insurancename']==$data['insurance_company_id'])
                  {
                    $selll='selected';
                  }
                  $is.='<option value="'.$data['insurance_company_id'].'" '.$selll.'>'.$data['name'].'</option>';
                }
              }
              $iol_lens_idlist='';
              $iol_lenspower=$this->Counseling_model->iol_lenspower($var_arrays);
              if($iol_lenspower)
              {
                
                foreach($iol_lenspower as $ioldata)
                {
                  $selll1='';
                  if($getresult[0]['iol_lens_id']==$ioldata['iol_lens_id'])
                  {
                    $selll1='selected';
                  }
                  $iol_lens_idlist.='<option value="'.$ioldata['iol_lens_id'].'" '.$selll1.'>'.$ioldata['name'].'</option>';
                }
              }

              $med_hist='';
              $med_listdata='';
              $medical_histrr=$this->Counseling_model->getmedi($var_arrays);
              if($medical_histrr)
              {
                foreach($medical_histrr as $medd)
                {
                  $med_hist.='<option value="'.$medd['medical_history_id'].'~'.$medd['name'].'">'.$medd['name'].'</option>';
                  //$med_listdata.='<tr><td><input type="hidden" name="med_id[]" value="'.$medd['medical_history_id'].'">'.$medd['name'].'</td><td><input type="text" class="form-control" name="rem_med[]" ></td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                }
              }
              $medical_histrrdata=$this->Counseling_model->getmedi_data($getresult[0]['examination_id']);
              if($medical_histrrdata)
              {
                $med_listdata='';
                foreach($medical_histrrdata as $medd)
                {
                   $med_listdata.='<tr><td><input type="hidden" name="med_id[]" value="'.$medd['medical_hsitory_id'].'">'.$medd['name'].'</td><td><input type="text" class="form-control" name="rem_med[]" value="'.$medd['remarks'].'"></td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                }

              }
              $ysell=$y1sell='';
              if($getresult[0]['pre_op_direction']==0)
              {
                $ysell='selected';
              }
              if($getresult[0]['pre_op_direction']==1)
              {
                $y1sell='selected';
              }
$patfilesdatat='';
              $files = $this->Counseling_model->getFiles($getresult[0]['examination_id']);
            if ($files) {
      $filename = base_url();


          $patfilesdatat = '
        
      <div >
      <header style="background-color: #20a576;
      color: #f5f6f7;
      text-align: center;
    
      ">
      <h2 style="font-weight:bold;color:white">Uploaded Files</h2>
    </header>
    <style>
    .brr{
      border:1px solid black;
    }
    </style>
        <div class="row">';


          foreach ($files as $data) {

            $ext = pathinfo($data['file_name'], PATHINFO_EXTENSION);
            if ($ext == 'pdf') {
              $patfilesdatat .= '
            
              <div class="col-md-4 brr"><p style="font-weight:bold;font-size:25px;color:green ;text-decoration: underline dotted purple; ">PDF :' . $data['file_name'] . '</p>
              <a href="' . $filename . 'uploads/files/' . $data['file_name'] . '" target="_blank">View File in New Tab</a>
              
              <p>Uploaded On ' . $data['uploaded_on'] . ' <button type="button" class="btn-sm btn btn-danger" onclick="deletefiletr('.$data['id'].')"><i class="la la-trash"></i></button></p></div>
              
          ';
            } else {
              $patfilesdatat .= '
              <div class="col-md-4 brr"><p style="font-weight:bold;font-size:25px;color:green">Image : ' . $data['file_name'] . '</p>
            <img style="width:100%;" src="' . $filename . 'uploads/files/' . $data['file_name'] . '" class="img img-responsive" >
            <p>Uploaded On ' . $data['uploaded_on'] . ' <button type="button" class="btn-sm btn btn-danger" onclick="deletefiletr('.$data['id'].')"><i class="la la-trash"></i></button></p></div>
            
        ';
            }
          }
          $patfilesdatat .= '
        </div></div>';
      }
            $html='<style>.ui-widget {
    font-size: 9px;
    line-height: 0.1;
}</style> 
              <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
               <div id="div_modal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                      <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title"></h4>
                                  <input type="hidden" id="flag" name="flag" value="'.$flag.'">
                                   <input type="hidden" id="selpart" name="selpart" value="'.$getresult[0]['particular_id'].'">
                                  <input type="hidden" name="trchargetype_id" id="trchargetype_id" value="'.$getresult[0]['chargetype_id'].'">
                                  <input type="hidden" id="treamentplan_id" name="treamentplan_id" value="'.$getresult[0]['examination_treatmentplan_id'].'">
                                  <input type="hidden" id="pat_hidname" value="'.$getresult[0]['pateint_name'].'">
                                  <input type="hidden" id="patidval" value="'.$getresult[0]['patient_registration_id'].'">
                                  <input type="hidden" id="pat_hidmrd" value="'.$getresult[0]['mrdno'].'">
                                  <input type="hidden" id="pat_hidmbl" value="'.$getresult[0]['mobileno'].'">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                               <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">
                               <div class="row" style="font-family: sans-serif;">
                                  
                                          <div class="col-md-4">
                                              <p>Name:<t style="color:red;">'.$getresult[0]['pateint_name'].'</t></p>
                                              
                                          </div>

                                          <div class="col-md-4">
                                              <p>MRD NO:<t style="color:red;">'.$getresult[0]['mrdno'].'</t></p>
                                          </div>

                                          <div class="col-md-4">
                                              <p> Eye: 
                                                  <label for="radio-1">L</label>
                                                  <input type="radio" name="eyetreatmentplan" id="radio-1" '.$le.' class="jui-radio-buttons" value="1">
                                                  <label for="radio-2">R</label>
                                                  <input type="radio" name="eyetreatmentplan" id="radio-2" '.$r.' class="jui-radio-buttons" value="2">
                                                  <label for="radio-3">B</label>
                                                  <input type="radio" name="eyetreatmentplan" id="radio-3" '.$b.' class="jui-radio-buttons" value="3">
                                              </p>
                                              
                                          </div>
                                   
                                  </div>
                                  <div class="row" style="font-family: sans-serif;">
                                  
                                          <div class="col-md-4">
                                             
                                              <p>Doctor:<t style="color:red;">'.$getresult[0]['doctorname'].'</t></p>
                                          </div>

                                          <div class="col-md-8">
                                              <p>Procedure:<t style="color:red;">'.$parti.'</t></p>
                                          </div>

                                         
                                   
                                  </div>
                                  </div>
                                    <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">
                                  <div class="row" style="font-family: sans-serif;">
                                  
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Procedure</label>
                                                <select class="form-control select2" style="width:100%;" multiple  name="update_procedure[]" id="update_procedure">
                                                    <option value="">Select Procedure</option>
                                                </select>
                                             </div>
                                          </div>

                                          <div class="col-md-3">
                                              <label>Referred By</label>
                                              <input type="text" class="form-control" name="referredby" id="referredby" value="'.$getresult[0]['referredby'].'">
                                          </div>

                                          <div class="col-md-3">
                                              <label>Email ID</label>
                                              <input type="text" class="form-control" name="emailid" id="emailid" value="'.$getresult[0]['emailid'].'">
                                          </div>
                                   
                                  </div>
                                  
                                    <div class="row" style="font-family: sans-serif;">
                                  
                                          <div class="col-md-2">
                                             <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status" id="status" style="width:100%;">
                                                    '.$opt.'
                                                </select>
                                             </div>
                                          </div>

                                          <div class="col-md-3">
                                              <label>on</label>
                                              <input type="date" class="form-control treatmentplan_date" name="date_on" id="date_on" value="'.$getresult[0]['date_on'].'">
                                          </div>

                                          <div class="col-md-3" '.$clsn.'>
                                              <label>Exp Surgery Date</label>
                                              <input type="date" class="form-control treatmentplan_date" name="sur_date" id="sur_date">
                                          </div>
                                          <div class="col-md-2" '.$clsn.'>
                                              <label>Room No</label>
                                              <input type="text" class="form-control" name="roomno" id="roomno" value="'.$getresult[0]['roomno'].'">
                                          </div>
                                          <div class="col-md-2" '.$clsn.'>
                                              <label>Bed No</label>
                                              <input type="text" class="form-control" name="bedno" id="bedno" value="'.$getresult[0]['bedno'].'">
                                          </div>
                                   
                                     </div>
                                     </div>
                                      <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">
                                  <div class="row" style="font-family: sans-serif;">
                                  
                                          <div class="col-md-3">
                                             <div class="form-group">
                                                <label>Other Eye Surgery</label>
                                                <input type="date" class="form-control treatmentplan_date" name="other_eye" id="other_eye" value="'.$getresult[0]['other_eye'].'">
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Remarks</label>
                                                <input type="text" class="form-control" name="other_remarks" id="other_remarks" value="'.$getresult[0]['other_remarks'].'">
                                             </div>
                                          </div>
                                          <div class="col-md-5">
                                             <div class="form-group">
                                                <label>Grade</label>
                                                <input type="text" class="form-control" name="grade_box" id="grade_box" value="'.$getresult[0]['grade_box'].'">
                                             </div>
                                          </div>

                                         
                                   
                                  </div>
                                  
                                    <div class="row" style="font-family: sans-serif;">
                                  
                                          <div class="col-md-3">
                                             <div class="form-group">
                                                <label>Iol Power</label>
                                               <input type="text" class="form-control" name="iol_power" id="iol_power" value="'.$getresult[0]['iol_power'].'">
                                             </div>
                                          </div>
                                           <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Iol lens</label>
                                              <select class="form-control select2" name="iol_lens_id" id="iol_lens_id" style="width:100%;">
                                                <option value="">Select</option>
                                                '.$iol_lens_idlist.'
                                              </select>
                                             </div>
                                          </div>

                                         <div class="col-md-5">
                                             <div class="form-group">
                                                <label>Preoperative Appointment</label>
                                              <select class="form-control" name="pre_op_direction" id="pre_op_direction">
                                                <option value="1" '.$y1sell.'>Yes</option>
                                                <option value="0" '.$ysell.'>No</option>
                                              </select>
                                             </div>
                                          </div>
                                   
                                     </div>
                                     </div>
                                      <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">
                                       <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                            <span>Medical History</span>
                                          </div>
                                      <div class="row" style="font-family: sans-serif;">
                                        <div class="col-md-3">
                                          <label>Medical History</label>
                                          <select class="form-control select2" style="width:100%" onchange="load_medhist($(this).val());" name="med_hist" id="med_hist">
                                            <option value="">Select</option>
                                            '.$med_hist.'
                                          </select>
                                        </div>
                                       
                                          <div class="col-md-9">
                                           <table class="table table-striped table-bordered table-hover" id="medhist_tab">
                                            <thead>
                                                <tr>
                                                  <th>Medical Name</th>
                                                  <th>Remarks</th>
                                                  <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              '.$med_listdata.'
                                            </tbody>
                                           </table>
                                        </div>
                                        

                                        
                                       
                                   
                                     </div>
                                     </div>

                                     <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">
                                       <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                            <span>Insurance details</span>
                                          </div>
                                      <div class="row" style="font-family: sans-serif;">

                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Insurance</label>
                                                <select class="form-control" name="insurancename" id="insurancename">
                                                   <option value="0">Non Insurance</option>
                                                    '.$is.'
                                                </select>
                                             </div>
                                          </div>

                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label>UHID Number</label>
                                                <input type="text" class="form-control" name="uhid" id="uhid" value="'.$getresult[0]['uhid'].'">
                                             </div>
                                          </div>

                                          <div class="col-md-4">
                                              <label>Corporate Name</label>
                                              <input type="text" class="form-control" name="coname" id="coname" value="'.$getresult[0]['coname'].'"> 
                                          </div>

                                          <div class="col-md-4 form-group">
                                              <label>Co-operative Society</label>
                                              <input type="text" class="form-control" name="society" id="society" value="'.$getresult[0]['society'].'">
                                          </div>
                                          <div class="col-md-4">
                                              <label>TPA Name</label>
                                              <input type="text" class="form-control" name="tpaname" id="tpaname" value="'.$getresult[0]['tpaname'].'">
                                          </div>
                                          <div class="col-md-4">
                                              <label>Receipt Number</label>
                                              <input type="text" class="form-control" name="receiptno" id="receiptno" value="'.$getresult[0]['receiptno'].'">
                                          </div>
                                   
                                     </div>
                                     </div>
                                     <div class="row">
                                      <div class="col-md-12">
                                        '.$penrem.'
                                      </div>
                                     </div>
                                      <div class="row form-group" style="font-family: sans-serif;">
                                       <div class="col-md-4">
                                              <label>Username</label>
                                              <select class="form-control select2" name="usernamepre" id="usernamepre" style="width:100%;">
                                                '.$us.'
                                              </select>
                                          </div>
                                         <div class="col-md-8">
                                              <label>Remarks</label>
                                              <textarea type="text" class="form-control" name="remarks" id="remarks"></textarea>
                                          </div>
                                      </div>

                                      <div class="row form-group">
                                        <div class="col-md-4">
                                              <label>Next Follow-up date</label>
                                              <input type="date" value="'.$getresult[0]['followup_date'].'" class="form-control treatmentplan_date" name="followup_date" id="followup_date"> 
                                          </div>
                                        <div class="col-md-8">
                                         <label>attachment</label>
                                            <div class="dropzone dropzone-area" id="dpz-multiple-files">
                                              <input type="file" id="files" name="files[]" multiple="multiple" >
                                          </div>
                                        </div>
                                      </div>

                                      '.$patfilesdatat.'

                              </div>
                              <div class="modal-footer">
    <button  class="btn mr-1 mb-1 btn-info btn-md" type="submit" id="savep"><i class="fas fa-plus-square"></i>Save</button>
      <button type="button" id="mclose" class="btn mr-1 mb-1 btn-danger btn-md closes" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
              ';
              echo json_encode(array('msg'=>$html,'followup_date'=>$getresult[0]['followup_date'],'date_on'=>$getresult[0]['date_on'],'sur_date'=>$getresult[0]['sur_date'],'other_eye'=>$getresult[0]['other_eye'],'error' =>'','error_message' =>''));
            }
            else
            {
              echo json_encode(array('msg'=>'','error'=> 'No Data Found','error_message' =>''));
            }
          
       
      }
      else
      {
        echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
      }
  }

  public function getparticulars()
  {
    $this->form_validation->set_rules('getid', 'Charge Type', 'trim|required|min_length[1]|max_length[100000]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $getid=trim(htmlentities($this->input->post('getid')));
        $var_array=array($getid,$this->session->userdata('office_id'));
        $issetcheckval=$this->Common_model->getcheckingchargeslist($getid,$this->session->userdata('office_id'));
        if($issetcheckval[0]['cnt']>0)
        {
          $getresult=$this->Common_model->getopdpanelmodel($getid,$this->session->userdata('office_id'));
          if($getresult)
          {
            $idval=$getid;
            $selbox='<option>Select Particulars</option>';
            if($idval==1){
                $charges='opdcharge_id';
              }
              elseif($idval==2){
                $charges='ipdcharge_id';
              }
              elseif($idval==3){
                $charges='laser_id';
              }
              elseif($idval==4){
                $charges='injection_id';
              }
              elseif($idval==5){
                $charges='investigation_id';
              }
             $i=0;
             foreach($getresult as $data)
             {
               $selbox.='<option value="'.$data[$charges].'~'.$data['name'].'" >'.$data['name'].'  '.$data['amount'].'</option>';
             $i++;
             }
            echo json_encode(array('msg' =>$selbox,'error'=>'','error_message' =>''));
          }
          else
          {
              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
        }
        else
        {
                echo json_encode(array('msg'=>'','error' =>'No Data Found','error_message' =>''));
        }
      }
      else
      {
           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
      }
  }
   public function getparticulars_sec()
  {
    $this->form_validation->set_rules('getid', 'Charge Type', 'trim|required|min_length[1]|max_length[100000]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $getid=trim(htmlentities($this->input->post('getid')));
        $var_array=array($getid,$this->session->userdata('office_id'));
        $issetcheckval=$this->Common_model->getcheckingchargeslist($getid,$this->session->userdata('office_id'));
        if($issetcheckval[0]['cnt']>0)
        {
          $getresult=$this->Common_model->getopdpanelmodel($getid,$this->session->userdata('office_id'));
          if($getresult)
          {
            $idval=$getid;
            $selbox='<option>Select Particulars</option>';
            if($idval==1){
                $charges='opdcharge_id';
              }
              elseif($idval==2){
                $charges='ipdcharge_id';
              }
              elseif($idval==3){
                $charges='laser_id';
              }
              elseif($idval==4){
                $charges='injection_id';
              }
              elseif($idval==5){
                $charges='investigation_id';
              }
             $i=0;
             foreach($getresult as $data)
             {
               $selbox.='<option value="'.$data[$charges].'" >'.$data['name'].'  '.$data['amount'].'</option>';
             $i++;
             }
            echo json_encode(array('msg' =>$selbox,'error'=>'','error_message' =>''));
          }
          else
          {
              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
        }
        else
        {
                echo json_encode(array('msg'=>'','error' =>'No Data Found','error_message' =>''));
        }
      }
      else
      {
           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
      }
  }

    private function fetch_data() 
    {
            $flag=$this->input->post('flag');
            if($flag==1)
            {
              $rem='open_remarks';
            }
            elseif($flag==2)
            {
              $rem='pending_remarks';
            }
            elseif($flag==3)
            {
              $rem='completed_remarks';
            }
            elseif($flag==3)
            {
              $rem='cancel_remarks';
            }
            elseif($flag==4)
            {
              $rem='cancel_remarks';
            }
            $particular='';
            if($this->input->post('update_procedure')){
            $particular = implode(',',$this->input->post('update_procedure'));
            }
            $particular_id=$this->db->select('particular_id')
                         ->from('examination_treatmentplan')
                         ->where(array('examination_treatmentplan_id'=>$this->input->post('treamentplan_id')))
                         ->get()->row()->particular_id;

              $part=trim($particular);

        $office_id=$this->session->office_id;
        $return=array(
               "masterdata"=>array(
                            'referredby'=>trim(htmlentities($this->input->post('referredby'))),
                            'emailid'=>trim(htmlentities($this->input->post('emailid'))),
                            'status'=>trim(htmlentities($this->input->post('status'))),
                            'date_on '=>$this->input->post('date_on'),
                            'sur_date'=>$this->input->post('sur_date'),
                            'eye'=>$this->input->post('eyetreatmentplan'),
                            'roomno'=>trim(htmlentities($this->input->post('roomno'))),
                            'bedno'=>trim(htmlentities($this->input->post('bedno'))),
                            'followup_date'=>trim(htmlentities($this->input->post('followup_date'))),
                            'insurancename'=>trim(htmlentities($this->input->post('insurancename'))),
                            'uhid'=>trim(htmlentities($this->input->post('uhid'))),
                            'coname'=>trim(htmlentities($this->input->post('coname'))),
                            'society'=>trim(htmlentities($this->input->post('society'))),
                            'tpaname'=>trim(htmlentities($this->input->post('tpaname'))),
                            'receiptno'=>trim(htmlentities($this->input->post('receiptno'))),
                            'usernamepre'=>trim(htmlentities($this->input->post('usernamepre'))),
                            'other_eye'=>trim(htmlentities($this->input->post('other_eye'))),
                            'other_remarks'=>trim(htmlentities($this->input->post('other_remarks'))),
                            'grade_box'=>trim(htmlentities($this->input->post('grade_box'))),
                            'iol_power'=>trim(htmlentities($this->input->post('iol_power'))),
                            'iol_lens_id'=>trim(htmlentities($this->input->post('iol_lens_id'))),
                            'pre_op_direction'=>trim(htmlentities($this->input->post('pre_op_direction'))),
                            $rem=>trim(htmlentities($this->input->post('remarks')))
               ),
                "medhist_data"=>array(
                   "medical_hsitory_id"=>$this->input->post('med_id'),
                   "remarks"=>$this->input->post('rem_med'),
                   "examination_id"=>$this->input->post('examination_id'),
                   "chargetype_id"=>$flag
               ),
              "partdata"=>array(
                'particular_id'=>$this->input->post('update_procedure'),
               )
           );
            return $return;

         
    }
    public  function fileSubmit()
  {

 $treamentplan_id= $this->input->post('treamentplan_id');
 $examination_id=$this->db->get_where('examination_treatmentplan',"examination_treatmentplan_id=$treamentplan_id")->row()->examination_id;
  $patient_id=$this->db->get_where('examination',"examination_id=$examination_id")->row()->patient_registration_id;

    $data = array();
    $errorUploadType = $statusMsg = '';

   // $patient_id = $this->input->post("files");

    // If files are selected to upload 
    if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
      $filesCount = count($_FILES['files']['name']);
      for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

        // File upload configuration 
        $uploadPath = 'uploads/files/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        $new_name = $patient_id . '_' . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        // Load and initialize upload library 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // Upload file to server 
        if ($this->upload->do_upload('file')) {
          // Uploaded file data 
          $fileData = $this->upload->data();

          $uploadData[$i]['file_name'] = $fileData['file_name'];
          $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
          $uploadData[$i]['examination_id'] = $examination_id;
          $uploadData[$i]['patient_registration_id'] = $patient_id;
        } else {
          $errorUploadType .= $_FILES['file']['name'] . ' | ';
        }
      }

      $errorUploadType = !empty($errorUploadType) ? '<br/>File Type Error: ' . trim($errorUploadType, ' | ') : '';
      if (!empty($uploadData)) {
        //Insert files data into the database 
        $insert = $this->Mrd_user_model->save_Files($uploadData);

        // Upload status message 
        $statusMsg = $insert ? 'Files uploaded successfully!' . $errorUploadType : 'Some problem occurred, please try again.';

        $html = 'uploaded SuccessFully!';

       // echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

      } else {
        $statusMsg = "Sorry, there was an error uploading your file." . $errorUploadType;
        //echo json_encode(array('msg' => '', 'error' => $statusMsg, 'error_message' => ''));
      }

    } else {

     // echo json_encode(array('msg' => '', 'error' => 'Sorry, there was an error uploading your file', 'error_message' => ''));

    }


  }
   public function saveupdatestatus()
   {
   // print_r($_POST);EXIT;
      $this->form_validation->set_rules('treamentplan_id', 'Treatment Plan ID', 'trim|required|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       { 
            $data=$this->fetch_data();
            $this->fileSubmit();
            $getresult=$this->Counseling_model->saveexaminationmodel($data,$this->input->post('treamentplan_id'));
            if($getresult)
            {

               echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
            }
         
       }
       else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
    public function getdataval()
  {
    $this->form_validation->set_rules('surgery_id', 'Surgery ID', 'trim|required|min_length[1]|max_length[100]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $surgery_id=trim(htmlentities($this->input->post('surgery_id')));
        $chargeid=trim(htmlentities($this->input->post('chargeid')));
          $var_array=array($surgery_id,$chargeid,$this->session->userdata('office_id'));
          $getresult=$this->Counseling_model->getdatasurgerymdl($surgery_id,$chargeid,$this->session->userdata('office_id'));
          if($getresult)
          {
            $opt='<option value="">Select Particulars</option>';
            foreach($getresult as $data)
            {
                  if($chargeid==2)
                  {
                      $tabname='ipdcharge';
                      $idname='ipdcharge_id';
                  }
                  elseif ($chargeid==3) {
                      $tabname='laser';
                      $idname='laser_id';
                  }
                  elseif ($chargeid==4) {
                      $tabname='injection';
                      $idname='injection_id';
                  }
                $opt.='<option value="'.$data[$idname].'">'.$data['name'].' '.$data['amount'].'</option>';
            }

             echo json_encode(array('msg'=>$opt,'error'=>'','error_message' =>''));
            
          }
          else
          {
            echo json_encode(array('msg'=>'','error'=>'No Data Found','error_message' =>''));
          }
       
      }
      else
      {
        echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
      }
  }
   public function deletedata()
  {
    $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $delete_id=trim(htmlentities($this->input->post('getid')));
        $var_array=array($delete_id,$this->session->userdata('office_id'));
          $getresult=$this->Counseling_model->deletedata($delete_id);
          if($getresult)
          {
             echo json_encode(array('msg'=>'Deleted Successfully','error'=>'','error_message' =>''));
          }
          else
          {
            echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));
          }
       
      }
      else
      {
        echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
      }
  }
  public function multipleImageStore()
  {
 
      $countfiles = count($_FILES['files']['name']);
  
      for($i=0;$i<$countfiles;$i++){
  
        if(!empty($_FILES['files']['name'][$i])){
  
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
 
          // Set preference
          $config['upload_path'] = '/documents'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000'; // max_size in kb
          $config['file_name'] = $_FILES['files']['name'][$i];
  print_r($config);exit;
          //Load upload library
          $this->load->library('upload',$config); 
          $arr = array('msg' => 'something went wrong', 'success' => false);
          // File upload
          if($this->upload->do_upload('file')){
           
           $data = $this->upload->data(); 
           $insert['name'] = $data['file_name'];
           print_r($data);exit;
          //  $this->db->insert('images',$insert);
          //  $get = $this->db->insert_id();
          // $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
 
          }
        }
  
      }
      echo json_encode($arr);
  
  }

   public function comnewfunction()
  {
    
        //$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
          $getresult=1;
          if($getresult)
          {
            $chid=$this->input->post('chargeid');
            if($chid==2)
            {
              $typname='Surgery';
              $sty='style="display:block"';
            }
            elseif($chid==3)
            {
              $typname='Laser';
              $sty='style="display:none;"';
            }
            elseif($chid==4)
            {
              $typname='Injection';
              $sty='style="display:none;"';
            }
            $var_array=array($this->session->userdata('office_id'));
            $departments=$this->Common_model->getdepartment($var_array);
            if($departments)
            {
              $opt='';
              foreach($departments as $data)
              {
                $opt.='<option value="'.$data['department_id'].'">'.$data['name'].'</option>';
              }
            }
            $var_arrays=array($this->session->userdata('office_id'));
 $is='';
              $insurancecompanys=$this->Common_model->getinsurance_company($var_arrays);
              if($insurancecompanys)
              {
                $is='';
                foreach($insurancecompanys as $data)
                {
                  $is.='<option value="'.$data['insurance_company_id'].'">'.$data['name'].'</option>';
                }
              }
$usd='';
              $var_arraysf=array(2,$this->session->userdata('office_id'));
              $getsur=$this->Common_model->getdoctorval($var_arraysf);
              if($getsur)
              {
                
                foreach($getsur as $data)
                {
                  $usd.='<option value="'.$data['doctors_registration_id'].'">'.$data['name'].'</option>';
                }
              }
              $ussd='';
              $var_arraysf=array(3,$this->session->userdata('office_id'));
              $getant=$this->Common_model->getdoctorval($var_arraysf);
              if($getant)
              {
                $ussd='';
                foreach($getant as $data)
                {
                  $ussd.='<option value="'.$data['doctors_registration_id'].'">'.$data['name'].'</option>';
                }
              }
 $var_arrays=array($this->session->userdata('office_id'));
               $iol_lens_idlist='';
              $iol_lenspower=$this->Counseling_model->iol_lenspower($var_arrays);
              if($iol_lenspower)
              {
                
                foreach($iol_lenspower as $ioldata)
                {
                  
                  $iol_lens_idlist.='<option value="'.$ioldata['iol_lens_id'].'" >'.$ioldata['name'].'</option>';
                }
              }

            $html='<form id="preoperative_form" method="post"> 
              <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
              <input type="hidden" id="pretreamentplan_id" name="pretreamentplan_id">
              <input type="hidden" id="chargeid" name="chargeid" value="'.$chid.'">
              <input type="hidden" id="patidval_pre" name="patient_registration_id">
               <div id="div_modalcom" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                      <!-- Modal content-->
                          <div class="modal-content shadow">
                              <div class="modal-header">
                                  <h4 class="modal-title modal-titles"></h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                               <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">
                                  <ul class="nav nav-tabs">
                                      <li class="nav-item" style="display:none;">
                                          <a class="nav-link" id="base-tab7" data-toggle="tab" aria-controls="tab7" href="#tab7" aria-expanded="true">Preoperative Appointment</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link active" id="base-tab8" data-toggle="tab" aria-controls="tab8" href="#tab8" aria-expanded="false">'.$typname.' Appointment</a>
                                      </li>
                                  </ul>

                                  <div class="tab-content px-1 pt-1">
                                     <div role="tabpanel" class="tab-pane" id="tab7" aria-expanded="true" aria-labelledby="base-tab7" style="display:none;">
                                          <div class="row">
                                                <div class="col-md-3">
                                                    <label>Appointment Date</label>
                                                    <input type="date" class="form-control treatmentplan_date" name="preappointment_date" id="preappointment_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Patient Name</label>
                                                    <input type="text" readonly class="form-control" name="paitent_name" id="paitent_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Preferred Phone</label>
                                                    <input type="text" class="form-control" readonly name="prefered_phone" id="prefered_phone">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Alternate Phone</label>
                                                    <input type="text" class="form-control" name="alternate_phone" id="alternate_phone">
                                                </div>
                                          </div>

                                          <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label>Appointment Type</label>
                                                    <select name="appointment_type" id="appointment_type" class="form-control select2">

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Source</label>
                                                    <select name="source" id="source" class="form-control select2">
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Reason</label>
                                                    <textarea class="form-control" name="reason" id="reason"></textarea>
                                                </div>
                                          </div>
                                     </div>
                                     <div class="tab-pane active" id="tab8" aria-labelledby="base-tab8">
                                          <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label>Patient Name</label>
                                                    <input type="text" readonly class="form-control" name="prepaitent_name" id="prepaitent_name">
                                                </div>
                                                  <div class="col-md-3">
                                                    <label>MRD NO</label>
                                                    <input type="text" readonly class="form-control" name="mrdno" id="mrdno">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Preferred Phone</label>
                                                    <input type="text" readonly class="form-control" name="preprefered_phone" id="preprefered_phone">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Alternate Phone</label>
                                                    <input type="text" class="form-control" name="alternate_phone" id="alternate_phone">
                                                </div>
                                               
                                          </div>
                                          <div class="row form-group">
                                           <div class="col-md-3">
                                                    <label>EYE</label>
                                                    <select class="form-control" name="eye_operate" id="eye_operate">
                                                      <option value="1">Left</option>
                                                      <option value="2">Right</option>
                                                      <option value="3">Both</option>
                                                    </select>
                                                </div>
                                              <div class="col-md-3" style="display:none;">
                                                <label>Type Of '.$typname.'</label>
                                                <select class="form-control select2" name="surgery_type" id="surgery_type" onchange="getdataval(this.value)">
                                                  <option value="">Select '.$typname.' Type</option>
                                                   '.$opt.'
                                                </select>
                                              </div>
                                              <div class="col-md-9">
                                                <label>Particulars</label>
                                                <select class="form-control select2" name="particular_type" id="particular_type" style="width:100%;">
                                                  <option value="">select Particulars</option>
                                                 
                                                </select>
                                              </div>
                                             
                                          </div>
                                          <div class="row form-group">
                                          <div class="col-md-3">
                                                <label>Appointment Date</label>
                                                <input type="date" class="form-control treatmentplan_date" name="admission_date" id="admission_date">
                                              </div>
                                          <div class="col-md-3" '.$sty.'>
                                                <label>Room No</label>
                                                <input type="text" class="form-control" name="room_no" id="room_no">
                                              </div>
                                           <div class="col-md-3" '.$sty.'>
                                                <label>BED No</label>
                                                <input type="text" class="form-control" name="table_no" id="table_no">
                                              </div>
                                           
                                            <div class="col-md-3">
                                              <label>Insurance Name</label>
                                              <select class="form-control" id="pre_insurancename" name="pre_insurancename">
                                              <option value="">select Insurance</option>
                                                 '.$is.'
                                              </select>
                                            </div>

                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label>UHID Number</label>
                                                <input type="text" class="form-control" name="uhids" id="uhids">
                                             </div>
                                          </div>

                                          <div class="col-md-4">
                                              <label>Corporate Name</label>
                                              <input type="text" class="form-control" name="conames" id="conames">
                                          </div>

                                          <div class="col-md-4 form-group">
                                              <label>Co-operative Society</label>
                                              <input type="text" class="form-control" name="societys" id="societys">
                                          </div>
                                          <div class="col-md-4">
                                              <label>TPA Name</label>
                                              <input type="text" class="form-control" name="tpanames" id="tpanames">
                                          </div>
                                          <div class="col-md-4">
                                              <label>Receipt Number</label>
                                              <input type="text" class="form-control" name="receiptnos" id="receiptnos">
                                          </div>
                                           <div class="col-md-3">
                                                    <label>Admission Time</label>
                                                    <input type="time" class="form-control" name="admission_time" id="admission_time" value="'.date('H:i:s').'">
                                                </div>
                                           
                                          </div>
                                          <div class="row form-group" >
                                           <div class="col-md-3" '.$sty.'>
                                                <label>IOL Power</label>
                                                <input type="text" class="form-control" name="iol_power" id="iol_power">
                                            </div>
                                            <div class="col-md-3" '.$sty.'>
                                              <label>IOL Lens</label>
                                             
                                              <select class="form-control select2" style="width:100%;" name="iol_lens" id="iol_lens">
                                                <option value="">Select IOL Lens</option>
                                                '.$iol_lens_idlist.'
                                              </select>
                                            </div>
                                            <div class="col-md-3" '.$sty.'>
                                              <label>Operating Surgeon</label>
                                              <select class="form-control select2" name="ope_surgeon" id="ope_surgeon" style="width:100%;">
                                                  <option value="">Operating Surgeon</option>
                                                  '.$usd.'
                                              </select>
                                            </div>
                                            <div class="col-md-3">
                                              <label>Anesthesia name</label>
                                               <select class="form-control select2" name="typeof_anthesia" id="typeof_anthesia" style="width:100%;">
                                                  <option value="">Select Anesthesia</option>
                                                  '.$ussd.'
                                              </select>
                                            </div>
                                             <div class="col-md-3" style="display:none;">
                                              <label>Ad. From Time</label>
                                              <input type="time"  class="form-control" name="from_time" id="from_time">
                                            </div>
                                            <div class="col-md-3" style="display:none;">
                                              <label>Ad. To Time</label>
                                              <input type="time"  class="form-control" name="to_time" id="to_time">
                                            </div>
                                          </div>
                                     </div>
                                  </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
    <button  class="btn mr-1 mb-1 btn-info btn-md" type="button" onclick="submitpreop()"><i class="fas fa-plus-square"></i>Save</button>
      <button type="button" id="mclose" class="btn mr-1 mb-1 btn-danger btn-md closes" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div></form>
              ';
              echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
            }
            else
            {
              echo json_encode(array('msg'=>'','error'=> 'No Data Found','error_message' =>''));
            }
          
       
      
  }
private function prefetch_data() 
    {      
        $office_id=$this->session->office_id;
          return array(
              'examination_treatmentplan_id'=>$this->input->post('pretreamentplan_id'),
              'appointment_date'=>trim(htmlentities($this->input->post('preappointment_date'))),
              'alternate_phone'=>trim(htmlentities($this->input->post('alternate_phone'))),
              'appointment_type_id'=>trim(htmlentities($this->input->post('appointment_type'))),
              'patient_registration_id'=>$this->input->post('patient_registration_id'),
              'charge_id'=>$this->input->post('chargeid'),
              'source_id'=>$this->input->post('source'),
              'reason'=>$this->input->post('reason'),
              'eye'=>$this->input->post('eye_operate'),
              'typeof_surgery_id'=>trim(htmlentities($this->input->post('surgery_type'))),
              'admission_date'=>trim(htmlentities($this->input->post('admission_date'))),
              'admission_time'=>trim(htmlentities($this->input->post('admission_time'))),
              'room_no'=>trim(htmlentities($this->input->post('room_no'))),
              'table_no'=>trim(htmlentities($this->input->post('table_no'))),
              'from_time'=>trim(htmlentities($this->input->post('from_time'))),
              'to_time'=>trim(htmlentities($this->input->post('to_time'))),
              'insurance_name'=>trim(htmlentities($this->input->post('pre_insurancename'))),
              'iol_power'=>trim(htmlentities($this->input->post('iol_power'))),
              'iol_lens'=>trim(htmlentities($this->input->post('iol_lens'))),
              'uhid'=>trim(htmlentities($this->input->post('uhids'))),
              'coname'=>trim(htmlentities($this->input->post('conames'))),
              'society'=>trim(htmlentities($this->input->post('societys'))),
              'tpaname'=>trim(htmlentities($this->input->post('tpanames'))),
              'receiptno'=>trim(htmlentities($this->input->post('receiptnos'))),
              'operating_surgon'=>trim(htmlentities($this->input->post('ope_surgeon'))),
              'typeof_anthesia'=>trim(htmlentities($this->input->post('typeof_anthesia'))),
              'particular_type'=>trim(htmlentities($this->input->post('particular_type'))),
              'parent_id'=>$this->session->userdata('parent_id'),
              'login_id'=>$this->session->userdata('login_id'),
              'office_id'=> $this->session->userdata('office_id')
             );
    }
   public function savepreop()
   {
       $this->form_validation->set_rules('pretreamentplan_id', 'Treatment Plan ID', 'trim|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       { 
            $data=$this->prefetch_data();
            $getresult=$this->Counseling_model->saveproperativedata($data,$this->input->post('pretreamentplan_id'));
            if($getresult)
            {
               echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
            }
       }
       else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
   public function getsurgeryfitnessfn()
   {
    $tabdata='';
       $html=$saved_surgery_fitness_request_id='';
       $this->form_validation->set_rules('treatmentplan_id', 'Treatment Plan ID', 'trim|min_length[1]|max_length[30]');
       $this->form_validation->set_rules('chargetype_id', 'charges  ID', 'trim|min_length[1]|max_length[30]');
       $this->form_validation->set_rules('examination_id', 'eXAMINATION ID', 'trim|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       { 
            $seledep=$seleipd=$seleipds='';
            $getresult=$this->Counseling_model->getpatientdetails_examin($this->input->post('examination_id'));
            if($getresult)
            {
              $ge='';
              if($getresult[0]['gender']==1)
              {
                $ge='Male';
              }
              else
              {
                $ge='Female';
              }

              ///alreadysaved data
              $saved_to_form='The Physician';
              $saved_headerprint=0;
              $saved_dept=$saved_ipdcharge_id=$saved_surgeryunder=$saved_eyeid=$saved_case_desc=$saved_patient_registration_id='';
              $getresult_saved_data=$this->Counseling_model->Get_fitnesssaved($this->input->post('examination_id'),$this->input->post('chargetype_id'),$getresult[0]['patient_registration_id']);
              if($getresult_saved_data)
              {
                $saved_to_form=$getresult_saved_data['0']['to_form'];
                $saved_dept=$getresult_saved_data['0']['department_id'];
                $saved_ipdcharge_id=$getresult_saved_data['0']['ipdcharge_id'];
                $saved_surgeryunder=$getresult_saved_data['0']['surgeryunder'];
                $saved_eyeid=$getresult_saved_data['0']['eyeid'];
                $saved_case_desc=$getresult_saved_data['0']['case_desc'];
                $saved_headerprint=$getresult_saved_data['0']['headerprint'];
                $saved_surgery_fitness_request_id=$getresult_saved_data['0']['surgery_fitness_request_id'];
              }

              $var_array=array($this->session->userdata('office_id'));
              $departments=$this->Common_model->getdepartment($var_array);
              if($departments)
              {
                  $seledep='<select style="width:100%;" class="form-control select2" name="department_id">';
                  foreach($departments as $datadept)
                  {
                    $sel1='';
                    if($datadept['department_id']==$saved_dept)
                    {
                      $sel1='selected';
                    }
                    $seledep.='<option value="'.$datadept['department_id'].'" '.$sel1.'>'.$datadept['name'].'</option>';
                  }
                  $seledep.='<select>';
              }
              $var_array=array($this->session->userdata('office_id'));
              $ipdchrge=$this->Common_model->Get_IPDfn($var_array);
              if($ipdchrge)
              {
                  $seleipd='<select style="width:100%;" class="form-control select2" name="ipdcharge_id">';
                  foreach($ipdchrge as $datadeptds)
                  {
                    $sel2='';
                    if($datadeptds['ipdcharge_id']==$saved_ipdcharge_id)
                    {
                      $sel2='selected';
                    }
                    $seleipd.='<option value="'.$datadeptds['ipdcharge_id'].'" '.$sel2.'>'.$datadeptds['name'].'</option>';
                  }
                  $seleipd.='<select>';
              }

              $var_array=array($this->session->userdata('office_id'));
              $ordedia=$this->Common_model->Get_orderdiagnostics($var_array);
              $sl=1;
              if($ordedia)
              {
                  $seleipds='<select style="width:100%;" name="order_diagnostics_id" class="form-control select2" onchange="loadpro_getvalue($(this).val());">';
                  $tabdata='<table id="productdetails" class="table table-striped table-bordered table-hover"><thead><tr><th>Investigation</th><th>Delete</th></tr></thead><tbody>';
                  foreach($ordedia as $datadeptdss)
                  {
                    $seleipds.='<option value="'.$datadeptdss['order_diagnostics_id'].'~'.$datadeptdss['name'].'">'.$datadeptdss['name'].'</option>';
                    $tabdata.='<tr><td><input type="hidden"  name="orderdia[]" value="'.$datadeptdss['order_diagnostics_id'].'">'.$datadeptdss['name'].'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                    $sl++;
                  }
                  $seleipds.='<select>';
                  $tabdata.='</tbody></table>';
              }
              if($saved_surgery_fitness_request_id>0)
              {
                $tabdata='';
                 $surinvdata=$this->Counseling_model->Get_surinvestigation($saved_surgery_fitness_request_id);
                 if($surinvdata)
                 {
                  $sl=1;
                  $tabdata='<table id="productdetails" class="table table-striped table-bordered table-hover"><thead><tr><th>Investigation</th><th>Delete</th></tr></thead><tbody>';
                   foreach ($surinvdata as $datainv) 
                   {
                       $tabdata.='<tr><td><input type="hidden"  name="orderdia[]" value="'.$datainv['order_diagnostics_id'].'">'.$datainv['name'].'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                      
                      $sl++;
                   }
                   $tabdata.='</tbody></table>';
                 }
              }
              $la1=$la2=$la3='';
              if($saved_surgeryunder=='LA')
              {
                $la1='selected';
              }
              if($saved_surgeryunder=='TA')
              {
                $la2='selected';
              }
               if($saved_surgeryunder=='GA')
              {
                $la3='selected';
              }

              $sella='<select style="width:100%;"  class="form-control select2" name="surgeryunder"><option value="LA" '.$la1.'>LA</option><option value="TA" '.$la2.'>TA</option><option value="GA" '.$la3.'>GA</option></select>';


              $la4=$la5=$la6='';
              if($saved_eyeid=='LE')
              {
                $la4='selected';
              }
              if($saved_eyeid=='RE')
              {
                $la5='selected';
              }
               if($saved_eyeid=='BE')
              {
                $la6='selected';
              }
              $sele0='';$sele1='';
              if($saved_headerprint==0)
              {
                $sele0='selected';
              }
              if($saved_headerprint==1)
              {
                $sele1='selected';
              }

              $seleye='<select style="width:100%;" name="eyeid" class="form-control select2"><option '.$la4.' value="LE">LE</option><option '.$la5.' value="RE">RE</option><option '.$la6.' value="BE">BE</option></select>';
              if($saved_surgery_fitness_request_id>0)
              {
               $html.='<div class="row form-group">
                        
                        <div class="col-md-12">
                           <button style="float: right;" onclick="printsurfitreq('.$saved_surgery_fitness_request_id.')" type="button" class="btn btn-primary"><i class="la la-print"></i></button>
                        </div>
                   </div>';
              }
              
               $html.='<div class="row form-group">
                        <div class="col-md-10">
                            <p>Patient Name:'.$getresult[0]['pateint_name'].'/'.$ge.'/'.$getresult[0]['ageyy'].'Y</p>
                            <p>MRD NO:'.$getresult[0]['mrdno'].'</p>
                        </div>
                        <div class="col-md-2">
                           <input type="date" class="form-control" name="surgery_fitness_date" id="surgery_fitness_date">
                        </div>
                   </div>';

                    $html.='<div class="row form-group">
                        <div class="col-md-4">
                            <p>To,</p>
                            <input type="text" class="form-control" name="to_form" id="to_form" value="'.$saved_to_form.'">
                        </div>
                        
                   </div>';

                     $html.='<div class="row">
                        <div class="col-md-12">
                            <p>Respected Sir,</p>
                              <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sending herewith <b>'.$getresult[0]['pateint_name'].'</b> for fitness for </p>
                             
                        </div>
                   </div>';
                    $html.='<div class="row form-group">

                        <div class="col-md-2">
                             '.$seleye.'
                        </div>
                        <div class="col-md-2">
                             '.$seledep.'
                        </div>
                        <div class="col-md-2">
                             '.$seleipd.'
                        </div>
                         <div class="col-md-2">
                            <p>Surgery Under</p>
                         </div>
                          <div class="col-md-2" style="float:left;"> '.$sella.'</div>
                   </div>';
                     $html.='<div class="row">
                        <div class="col-md-2">
                        <p>He/She is a known case of </p>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="case_desc" value="'.$saved_case_desc.'">
                        </div>
                      
                   </div>';
                    $html.='<div class="row">

                        <div class="col-md-12">
                            <p>Kindly do the needful and oblige.</p>
                        </div>
                      
                   </div>';
                   $html.='<div class="row">
                        <div class="col-md-4">
                            <p><b>Suggested Investigation:-</b>.</p>
                        </div>
                          <div class="col-md-4">
                            <p>Include header Print</p>
                        </div>
                   </div>';
                   $html.='<div class="row">
                        <div class="col-md-4">
                            <p>'.$seleipds.'</p>
                        </div>
                        <div class="col-md-4">
                          
                          <select class="form-control select2" style="width:100%" name="headerprint">
                            <option value="0" '.$sele0.'>No</option>
                            <option value="1" '.$sele1.'>Yes</option>
                          </select>
                        </div>
                   </div>';

                   $html.='<div class="row">
                        <div class="col-md-4">
                           
                            '.$tabdata.'
                        </div>
                   </div>

<input type="hidden" name="patient_registration_id" value="'.$getresult[0]['patient_registration_id'].'">
<input type="hidden" name="examination_id" value="'.$this->input->post('examination_id').'">
<input type="hidden" name="chargetype_id" value="'.$this->input->post('chargetype_id').'">
                   ';
               echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$html,'error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'No data Found','error_message' =>''));
            }
       }
       else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
    private function surgeryfitness_data() 
    {
      $flagprint=1;
      if($this->input->post('headerprint')==0)
      {
        $flagprint=0;
      }

       $return=array(
               "surgery_fitness_request"=>array(
                   "patient_registration_id"=>$this->input->post('patient_registration_id'),
                   "examination_id"=>$this->input->post('examination_id'),
                   "chargetype_id"=>$this->input->post('chargetype_id'),
                   "surgery_fitness_date"=>$this->input->post('surgery_fitness_date'),
                   "to_form"=>$this->input->post('to_form'),
                   "eyeid"=>$this->input->post('eyeid'),
                   'department_id'=>$this->input->post('department_id'),
                   'ipdcharge_id'=>$this->input->post('ipdcharge_id'),
                   'surgeryunder'=>$this->input->post('surgeryunder'),
                   'case_desc'=>$this->input->post('case_desc'),
                   'headerprint'=>$flagprint
               ),
                "surgery_fitness_investigation"=>array(
                   "examination_id"=>$this->input->post('examination_id'),
                   "order_diagnostics_id"=>$this->input->post('orderdia')
               ),
           );
            return $return;
      }


       private function surgeryfitness_data1() 
    {
      $flagprint=1;
      if($this->input->post('headerprint')==0)
      {
        $flagprint=0;
      }

       $return=array(
               "surgery_fitness_request"=>array(
                   "patient_registration_id"=>$this->input->post('patient_registration_id'),
                   "examination_id"=>$this->input->post('examination_id'),
                   "chargetype_id"=>$this->input->post('chargetype_id'),
                   "order_dia_date"=>$this->input->post('orderdia_date'),
                   "order_dia_time"=>date('H:i'),
                   'headerprint'=>$flagprint
               ),
                "surgery_fitness_investigation"=>array(
                   "examination_id"=>$this->input->post('examination_id'),
                   "remarks"=>$this->input->post('remarks'),
                   "order_diagnostics_id"=>$this->input->post('orderdia')
               ),
           );
            return $return;
      }
    
    
   public function savedatasurgeryfitness()
   {
     
    $this->form_validation->set_rules('surgery_fitness_date', 'Date', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('to_form', 'to form', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('eyeid', 'Eye ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('department_id', 'Department Plan ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('case_desc', 'Case Desc', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('ipdcharge_id', 'IPD Charges ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('surgeryunder', 'Surgery Under ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('orderdia[]', 'Order Diagnostics', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('patient_registration_id', 'patient Registration Id', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('headerprint', 'header print', 'trim|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('examination_id', 'Examination ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('chargetype_id', 'charges id', 'trim|min_length[1]|max_length[30]|required');
     if($this->form_validation->run() == TRUE)
     { 
          $data=$this->surgeryfitness_data();
          $getresult=$this->Counseling_model->savedata_surgeryfitness($data);
          if($getresult)
          {

             echo json_encode(array('msg' =>'Saved Successfully','sur_fit_id'=>$getresult,'error'=>'','error_message' =>''));
          }
          else
          {
               echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
     }
     else
     {
          echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
     }
   }
     public function savedatasurgeryfitness1()
   {
     
    $this->form_validation->set_rules('orderdia_date', 'Date', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('orderdia[]', 'Investigation', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('remarks[]', 'Remarks', 'trim|min_length[1]|max_length[100]');
    $this->form_validation->set_rules('patient_registration_id', 'patient Registration Id', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('headerprint', 'header print', 'trim|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('examination_id', 'Examination ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('chargetype_id', 'charges id', 'trim|min_length[1]|max_length[30]|required');
     if($this->form_validation->run() == TRUE)
     { 
          $data=$this->surgeryfitness_data1();
          $getresult=$this->Counseling_model->savedata_surgeryfitness1($data);
          if($getresult)
          {

             echo json_encode(array('msg' =>'Saved Successfully','sur_fit_id'=>$getresult,'error'=>'','error_message' =>''));
          }
          else
          {
               echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
     }
     else
     {
          echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
     }
   }
  public function print_surgeryfit() 
  {
      $this->Counseling_model->print_surgery($this->input->post('surid'),$this->session->userdata('office_id'));
  }
   public function Order_diagnosticsprint() 
  {
      $this->Counseling_model->print_surgery1($this->input->post('surid'),$this->session->userdata('office_id'));
  }
  public function Preoperativeinsprint() 
  {
      $this->Counseling_model->Preoperativeinsprint_data($this->input->post('surid'),$this->session->userdata('office_id'));
  }
  public function getorderdia_pop()
   {
       $html='';
          $ge='';
          $tabdata='';
       $saved_counselling_order_diagnostics_master_id='';
       $this->form_validation->set_rules('treatmentplan_id', 'Treatment Plan ID', 'trim|min_length[1]|max_length[30]');
       $this->form_validation->set_rules('chargetype_id', 'charges  ID', 'trim|min_length[1]|max_length[30]');
       $this->form_validation->set_rules('examination_id', 'eXAMINATION ID', 'trim|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       { 
            $seledep=$seleipd=$seleipds='';
            $saved_headerprint=0;
            $getresult=$this->Counseling_model->getpatientdetails_examin($this->input->post('examination_id'));
            if($getresult)
            {

              $getresult_saved_data=$this->Counseling_model->Get_fitnesssaved1($this->input->post('examination_id'),$this->input->post('chargetype_id'),$getresult[0]['patient_registration_id']);
              if($getresult_saved_data)
              {
                $saved_headerprint=$getresult_saved_data['0']['headerprint'];
                $saved_counselling_order_diagnostics_master_id=$getresult_saved_data['0']['counselling_order_diagnostics_master_id'];
              }

              $var_array=array($this->session->userdata('office_id'));
              $ordedia=$this->Common_model->Get_orderdiagnostics($var_array);
              $sl=1;
              if($ordedia)
              {
                $ge='';
              if($getresult[0]['gender']==1)
              {
                $ge='Male';
              }
              else
              {
                $ge='Female';
              }
                  $seleipds='<select style="width:100%;" name="order_diagnostics_id" class="form-control select2" onchange="loadpro_getvalue1($(this).val());">';
                  $tabdata='<table id="productdetails1" class="table table-striped table-bordered table-hover"><thead><tr><th>Order test</th><th>Remarks</th><th>Delete</th></tr></thead><tbody>';
                  foreach($ordedia as $datadeptdss)
                  {
                    $seleipds.='<option value="'.$datadeptdss['order_diagnostics_id'].'~'.$datadeptdss['name'].'">'.$datadeptdss['name'].'</option>';
                    $tabdata.='<tr><td><input type="hidden"  name="orderdia[]" value="'.$datadeptdss['order_diagnostics_id'].'">'.$datadeptdss['name'].'</td><td><input type="text"  class="form-control" name="remarks[]"></td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                    $sl++;
                  }
                  $seleipds.='<select>';
                  $tabdata.='</tbody></table>';
              }
              if($saved_counselling_order_diagnostics_master_id>0)
              {
                 $tabdata='';
                 $surinvdata=$this->Counseling_model->Get_surinvestigation1($saved_counselling_order_diagnostics_master_id);
                 if($surinvdata)
                 {
                  $sl=1;
                 $tabdata='<table id="productdetails1" class="table table-striped table-bordered table-hover"><thead><tr><th>Order test</th><th>Remarks</th><th>Delete</th></tr></thead><tbody>';
                   foreach ($surinvdata as $datainv) 
                   {
                       $tabdata.='<tr><td><input type="hidden"  name="orderdia[]" value="'.$datainv['order_diagnostics_id'].'">'.$datainv['name'].'</td><td><input type="text"  class="form-control" value="'.$datainv['remarks'].'" name="remarks[]"></td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                      
                      $sl++;
                   }
                   $tabdata.='</tbody></table>';
                 }
              }
             
              if($saved_counselling_order_diagnostics_master_id>0)
              {
               $html.='<div class="row form-group">
                        
                        <div class="col-md-12">
                           <button style="float: right;" onclick="printsurfitreq1('.$saved_counselling_order_diagnostics_master_id.')" type="button" class="btn btn-primary"><i class="la la-print"></i></button>
                        </div>
                   </div>';
              }
              
               $html.='<div class="row form-group">
                        <div class="col-md-9">
                            <p>Patient Name:'.$getresult[0]['pateint_name'].'/'.$ge.'/'.$getresult[0]['ageyy'].'Y</p>
                            <p>MRD NO:'.$getresult[0]['mrdno'].'</p>
                        </div>
                        <div class="col-md-3">
                           <input type="date" class="form-control" name="orderdia_date" id="orderdia_date">
                        </div>
                   </div>';
                $html.='<div class="row form-group">
                        <div class="col-md-6">
                           
                            '.$seleipds.'
                        </div>
                   </div>';

                   $html.='<div class="row form-group">
                        <div class="col-md-12">
                           
                            '.$tabdata.'
                        </div>
                   </div>';
              $sele0='';$sele1='';
              if($saved_headerprint==0)
              {
                $sele0='selected';
              }
              if($saved_headerprint==1)
              {
                $sele1='selected';
              }
                    $html.='<div class="row">
                        <div class="col-md-4">
                          <label>Header Print</label>
                          <select class="form-control select2" style="width:100%" name="headerprint">
                            <option value="0" '.$sele0.'>No</option>
                            <option value="1" '.$sele1.'>Yes</option>
                          </select>
                        </div>
                   </div>
                  
<input type="hidden" name="patient_registration_id" value="'.$getresult[0]['patient_registration_id'].'">
<input type="hidden" name="examination_id" value="'.$this->input->post('examination_id').'">
<input type="hidden" name="chargetype_id" value="'.$this->input->post('chargetype_id').'">
                   ';
               echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$html,'error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'No data Found','error_message' =>''));
            }
       }
       else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
   public function getpreoperative_section()
   {
       $html=$tabdata='';
       $saved_eyeid='';
       $timeof_admission=date('H:i');
       $dateof_operation=date('Y-m-d');
       $saved_counselling_preoperative_directions_id='';
       $saved_medicine_remarks='';
       $this->form_validation->set_rules('treatmentplan_id', 'Treatment Plan ID', 'trim|min_length[1]|max_length[30]');
       $this->form_validation->set_rules('chargetype_id', 'charges  ID', 'trim|min_length[1]|max_length[30]');
       $this->form_validation->set_rules('examination_id', 'eXAMINATION ID', 'trim|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       { 
            $seledep=$seleipd=$seleipds='';
            $saved_headerprint=0;
            $getresult_INS=$this->Counseling_model->Get_Preoperative_INS();
            $getresult=$this->Counseling_model->getpatientdetails_examin($this->input->post('examination_id'));
            if($getresult)
            {
                $seledep=$seleipd=$seleipds='';
              $saved_headerprint=0;
              ///alreadysaved data
              $getresult_alreadysaveddata=$this->Counseling_model->getsaved_preoperativedata($this->input->post('examination_id'));
              if($getresult_alreadysaveddata)
              {
                $saved_counselling_preoperative_directions_id=$getresult_alreadysaveddata[0]['counselling_preoperative_directions_id'];
                $saved_eyeid=$getresult_alreadysaveddata['0']['eyeid'];
                $saved_headerprint=$getresult_alreadysaveddata['0']['headerprint'];
                $saved_medicine_remarks=$getresult_alreadysaveddata['0']['medicine_remarks'];
                $dateof_operation=$getresult_alreadysaveddata['0']['dateof_operation'];
                $timeof_admission=$getresult_alreadysaveddata['0']['timeof_admission'];
              }

              $sele0='';$sele1='';
              if($saved_headerprint==0)
              {
                $sele0='selected';
              }
              if($saved_headerprint==1)
              {
                $sele1='selected';
              }

              $la4=$la5=$la6='';
              if($saved_eyeid=='LE')
              {
                $la4='selected';
              }
              if($saved_eyeid=='RE')
              {
                $la5='selected';
              }
               if($saved_eyeid=='BE')
              {
                $la6='selected';
              }

              $getresult=$this->Counseling_model->getpatientdetails_examin($this->input->post('examination_id'));
              if($getresult)
              {
                $ge='';
              if($getresult[0]['gender']==1)
              {
                $ge='Male';
              }
              else
              {
                $ge='Female';
              }

               $tabdata='<table id="pr_in_op" class="table table-striped table-bordered table-hover"><thead><tr><th>Operation</th><th>Delete</th></tr></thead><tbody>';

                $proceduredata=trim($this->input->post('proceduredata'));
                if($proceduredata)
                {
                  $getparid=explode(',',$proceduredata);
                    $parti=$partiidlis='';
                    if($getparid)
                    {
                     
                      foreach($getparid as $dataparti)
                      {
                         $npartid=$dataparti;
                         if($npartid)
                         {
                           $getparticularname=$this->Common_model->getparticularsmodel($this->input->post('chargetype_id'),$npartid,$this->session->userdata('office_id')); 
                            $parti.= $getparticularname[0]['name'].',';
                            $tabdata.='<tr><td><input type="hidden" name="pre_op_dir[]" value="'.$npartid.'">'.$getparticularname[0]['name'].'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                         }
                      }
                     
                  }
                }

                if($saved_counselling_preoperative_directions_id>0)
                {
                    $tabdata='<table id="pr_in_op" class="table table-striped table-bordered table-hover"><thead><tr><th>Operation</th><th>Delete</th></tr></thead><tbody>';
                    $surinvdata=$this->Counseling_model->Get_operationdata($saved_counselling_preoperative_directions_id);
                    if($surinvdata)
                   {
                      foreach($surinvdata as $dataval)
                      {
                          $partidate=$dataval['particulars_id'];
                           $chagetype_id=$dataval['chagetype_id'];
                          $getparticularname=$this->Counseling_model->getparticularsmodel($chagetype_id,$partidate,$this->session->userdata('office_id')); 
                         

                          $tabdata.='<tr><td><input type="hidden" name="pre_op_dir[]" value="'.$partidate.'">'.$getparticularname[0]['name'].'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                      }
                   }
                }


                 $tabdata.='</tbody></table>';

                  if($saved_counselling_preoperative_directions_id>0)
              {
               $html.='<div class="row form-group">
                        
                        <div class="col-md-12">
                           <button style="float: right;" onclick="printsurfitreq3('.$saved_counselling_preoperative_directions_id.')" type="button" class="btn btn-primary"><i class="la la-print"></i></button>
                        </div>
                   </div>';
              }
                    
                 $html.='<div class="row form-group">
                        <div class="col-md-9">
                            <p>Patient Name:'.$getresult[0]['pateint_name'].'/'.$ge.'/'.$getresult[0]['ageyy'].'Y</p>
                            <p>MRD NO:'.$getresult[0]['mrdno'].'</p>
                        </div>
                        <div class="col-md-3">
                           <input type="date" class="form-control" name="preoperative_date" id="preoperative_date">
                        </div>
                   </div>';

                   $html.='<div class="row form-group">
                            <div class="col-md-4">
                               <label>Eye to be Operared</label>
                               <select class="form-control select2" name="eyeid" id="eyeid">
                                <option value="LE" '.$la4.'>LE</option>
                                <option value="RE" '.$la5.'>RE</option>
                                <option value="BE" '.$la6.'>BE</option>
                               </select>
                            </div>
                             <div class="col-md-4">
                                 <label>Date Of Operation</label>
                                 <input type="date" class="form-control" name="dateof_operation" id="dateof_operation">
                            </div>
                            <div class="col-md-4">
                                 <label>Time Of Admission</label>
                                 <input type="time" class="form-control" name="timeof_admission" id="timeof_admission" value="'.$timeof_admission.'">
                            </div>
                       
                   </div>';

                     $html.='<div class="row form-group">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Procedure</label>
                                <select class="form-control select2"  name="procedure_operation" id="procedure_operation" onchange="loadprocedure_preoperative($(this).val());">
                                    <option value="">Select Procedure</option>
                                </select>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <label>Header Print</label>
                                <select class="form-control select2" style="width:100%" name="headerprint">
                                  <option value="0" '.$sele0.'>No</option>
                                  <option value="1" '.$sele1.'>Yes</option>
                                </select>
                          </div>
                   </div>';

                    $html.='<div class="row form-group">
                             <div class="col-md-6">
                                  '.$tabdata.'
                                  </div>
                           </div>';

                            $html.='<div class="row form-group">
                             <div class="col-md-6">
                                  <p><b>Directions:-</b></p>
                                  </div>
                           </div>';

                           $htmldata_ins='';
                           $htmldata_ins.='<br/><div class="row form-group">
                                              <div class="col-md-6">
                                                  <p><b>Instruction:-</b></p>
                                                  <label>Instructions</label>
                                                  <select class="form-control select2" name="ins_data" id="ins_data" onchange="loadpreop_ins($(this).val());">
                                                     <option value="">Select Instructions</option>';

                                                     if($getresult_INS)
                                                      {
                                                        foreach($getresult_INS as $dataval)
                                                        {
                                                          $htmldata_ins.='<option value="'.$dataval['preoperative_instruction_id'].'~'.$dataval['name'].'">'.$dataval['name'].'</option>';
                                                        }
                                                      }
                                                  $htmldata_ins.='</select><br/>
                                                  <table id="pro_ins_tab" style="margin-top: 4%;" class="table table-striped table-bordered table-hover">
                                                  <thead>
                                                    <tr>
                                                      <th>Instruction</th>
                                                      <th>Delete</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>';
                      if($saved_counselling_preoperative_directions_id>0)
                      {
                          $instr_preop= $this->db->query("select counselling_preoperative_instruction.remarks_id,preoperative_instruction.name as insdata from counselling_preoperative_instruction inner join preoperative_instruction on preoperative_instruction.preoperative_instruction_id=counselling_preoperative_instruction.remarks_id where counselling_preoperative_instruction.counselling_preoperative_directions_id=$saved_counselling_preoperative_directions_id")->result();
                          if($instr_preop)
                          {
                            foreach($instr_preop as $datavv)
                            {
                              $htmldata_ins.='<tr><td><input type="hidden" name="preinsdataval[]" value="'.$datavv->remarks_id.'">'.$datavv->insdata.'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                            }
                          }
                      }
                      else
                      {
                          if($getresult_INS)
                          {
                            foreach($getresult_INS as $dataval)
                            {
                               $htmldata_ins.='<tr><td><input type="hidden" name="preinsdataval[]" value="'.$dataval['preoperative_instruction_id'].'">'.$dataval['name'].'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button type="button" class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                            }
                          }
                      }

                    

                     $htmldata_ins.='</tbody></table></div>
                           </div>

<input type="hidden" name="patient_registration_id" value="'.$getresult[0]['patient_registration_id'].'">
<input type="hidden" name="examination_id" value="'.$this->input->post('examination_id').'">
<input type="hidden" name="chargetype_id" value="'.$this->input->post('chargetype_id').'">
                           ';


                 echo json_encode(array('msg' =>'Saved Successfully',
                  'htmldata'=>$html,
                  'medid'=>$saved_counselling_preoperative_directions_id,
                  'saved_medicine_remarks'=>$saved_medicine_remarks,
                  'dateof_operation'=>$dateof_operation,
                  'htmldata_ins'=>$htmldata_ins,
                  'getid'=>$this->input->post('chargetype_id'),
                  'error'=>'',
                  'error_message' =>''));
              }
              else
              {
                echo json_encode(array('msg' =>'','error'=> 'No data Found','error_message' =>''));
              }
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'No data Found','error_message' =>''));
            }
       }
       else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
    private function preoperative_directions() 
    {
      $flagprint=1;
      if($this->input->post('headerprint')==0)
      {
        $flagprint=0;
      }
       $return=array(
               "counselling_preoperative_directions"=>array(
                   "patient_registration_id"=>$this->input->post('patient_registration_id'),
                   "examination_id"=>$this->input->post('examination_id'),
                   "chargetype_id"=>$this->input->post('chargetype_id'),
                   "preopertive_date"=>$this->input->post('preoperative_date'),
                   "preopertive_time"=>date('H:i'),
                   "eyeid"=>$this->input->post('eyeid'),
                   "dateof_operation"=>$this->input->post('dateof_operation'),
                   "timeof_admission"=>$this->input->post('timeof_admission'),
                   "medicine_remarks"=>$this->input->post('medicine_doc_remarks'),
                   'headerprint'=>$flagprint
               ),
                "counselling_preoperative_directions_operation"=>array(
                   "examination_id"=>$this->input->post('examination_id'),
                   "chagetype_id"=>$this->input->post('chargetype_id'),
                   "particulars_id"=>$this->input->post('pre_op_dir')
               ),
              "counselling_medicine_prescription"=>array(
                'medicine_id'=>$this->input->post('medicine_id'),
                "examination_id"=>$this->input->post('examination_id'),
                'instruction'=>$this->input->post('instruction'),
                'nodays'=>$this->input->post('days'),
                'qty'=>$this->input->post('qty'),
                'sdate'=>$this->input->post('sdate'),
                'tdate'=>$this->input->post('tdate'),
                'med_eye'=>$this->input->post('medeye'),
                "med_action"=>$this->input->post('med_action'),
                "med_name"=>$this->input->post('med_name')
               ),
              "counselling_preoperative_instruction"=>array(
                "examination_id"=>$this->input->post('examination_id'),
                'remarks_id'=>$this->input->post('preinsdataval')
               ),
           );
            return $return;
      }
   public function savedatapreoperativeins()
   {
     
    $this->form_validation->set_rules('preoperative_date', 'Date', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('eyeid', 'Eye', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('dateof_operation', 'Date Of Operation', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('timeof_admission', 'Time Of Admission', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('medicine_doc_remarks', 'Medicine Remarks', 'trim|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('preoperative_date', 'Date', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('pre_op_dir[]', 'Operation', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('patient_registration_id', 'patient Registration Id', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('headerprint', 'header print', 'trim|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('examination_id', 'Examination ID', 'trim|min_length[1]|max_length[30]|required');
    $this->form_validation->set_rules('chargetype_id', 'charges id', 'trim|min_length[1]|max_length[30]|required');
     if($this->form_validation->run() == TRUE)
     { 
          $data=$this->preoperative_directions();
          $getresult=$this->Counseling_model->savedata_preoperative($data);
          if($getresult)
          {

             echo json_encode(array('msg' =>'Saved Successfully','sur_fit_id'=>$getresult,'error'=>'','error_message' =>''));
          }
          else
          {
               echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
     }
     else
     {
          echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
     }
   }
   public function showmedhistorydata()
   {

            $key=trim(htmlentities($this->input->post('key')));
            $var_array=array($key,$this->session->userdata('office_id'));
            $getdoctorprescription=$this->Counseling_model->getdoctormedicinemodel($var_array);
            $opth=$medd='';
             $sl=0;
            if($getdoctorprescription!='')
            { 
               $docc='';
               if($getdoctorprescription)
               {
                 foreach($getdoctorprescription as $data)
                 {
                    $sl++;
                    $be=$le=$re=$na='';
                    if($data['med_eye']=='BE')
                    {
                        $be='selected';
                    }
                    if($data['med_eye']=='LE')
                    {
                        $le='selected';
                    }
                    if($data['med_eye']=='RE')
                    {
                        $re='selected';
                    }
                    if($data['med_eye']=='N/A')
                    {
                        $na='selected';
                    }
                    $medac=$data['med_action'];
                    if($data['med_action']==1)
                    {
                        $med=$data['med_name'];
                    }
                    else
                    {
                         $med=$data['drugname'];
                    }
                    $htmllj='';
                    $var_arrasy=array($this->session->userdata('office_id'));
                    $medinss=$this->Common_model->GetAllmedins($var_arrasy);
                    if($medinss)
                    {
                        foreach ($medinss as $dattamed) {
                            $selmm='';
                            if($dattamed['name']==$data['instruction'])
                            {
                                $selmm='selected';
                            }
                           $htmllj.='<option value="'.$dattamed['name'].'" '.$selmm.'>'.$dattamed['name'].'</option>';
                        }
                    }

                    $docc.='<tr><td>'.$med.'</td>
                                <td>

                                 <input type="hidden" class="form-control" id="medicine_id_'.$sl.'" name="medicine_id[]" value="'.$data['medicine_id'].'">
                                 <select class="form-control" id="instruction_'.$sl.'" name="instruction[]" >'.$htmllj.'</select><span id="search_result'.$sl.'"></span>
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="days_'.$sl.'" name="days[]" value="'.$data['nodays'].'">
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="qty_'.$sl.'" name="qty[]" value="'.$data['qty'].'">
                                </td>
                                <td style="display:none;">
                                  <input type="date" class="form-control" id="sdate_'.$sl.'" name="sdate[]" value="'.$data['ssdate'].'">
                                </td>
                                <td style="display:none;"><input type="date" class="form-control" id="tdate_'.$sl.'" name="tdate[]" value="'.$data['ttdate'].'"></td>
                                <td>
                                <select class="form-control" name="medeye[]" id="medeye_'.$sl.'">
                                    <option value="BE" '.$be.'>BE</option>
                                    <option value="LE" '.$le.'>LE</option>
                                    <option value="RE" '.$re.'>RE</option>
                                    <option value="N/A" '.$na.'>N/A</option>
                                </select></td>
                                <td>
                                    <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">
                                    <button class="btn btn-danger btnDelete btn-sm">
                                       <i class="la la-trash"></i>
                                    </button>
                                    </a>
                                    
                                    <div  class="multiple_'.$sl.'" style="display:none;">
                                  <input type="hidden" name="mulframetype[]" id="mulframetype_'.$sl.'" class="form-control span2" value="'.$data['ex_ins'].'">
                                  <input type="hidden" name="mulframecolor[]" id="mulframecolor_'.$sl.'" class="form-control span2" value="'.$data['ex_no'].'">
                                   <input type="hidden" name="med_action[]" value="'.$medac.'" id="med_action_'.$sl.'" class="form-control span2">
                <input type="hidden" name="med_name[]"  id="med_name_'.$sl.'" value="' .$med. '" class="form-control span2">
                                </div>
                                </td>
                                </tr>';

                 }
               }
               echo json_encode(array('msg' =>'Saved Successfully','docmed'=>$docc,'rowcnt'=>$sl,'error'=>'','error_message' =>''));

            }
            else

            {
                 echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));
            }
   }
   function deleteDatadd()
  {

    $getid = $this->input->post("getid");
    $file_name=$this->db->get_where('patient_files',"id=$getid")->row()->file_name;

    $file_name = $this->input->post("filename");
    $status = $this->Counseling_model->deletedata_files($getid);

    if ($status) {
      @unlink('uploads/files/' . $file_name);
      $html = 'Deleted Successfully!!';
      echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

    } else {

      echo json_encode(array('msg' => '', 'error' => 'No Files Found', 'error_message' => 'No Files Found'));
    }
  }
}
