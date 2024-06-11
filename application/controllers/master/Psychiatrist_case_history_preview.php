<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psychiatrist_case_history_preview extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Case_hsitory_preview_model');
         $this->load->model('Common_model');
         $this->load->model('Examination_model');
         $this->load->model('Psychiatrist_model');

      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Typeof_length_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Case_history_preview';
      $data['activecls']='Case_history_preview';
      $var_array=array($this->session->userdata('office_id'));
	  $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('master/psychiatrist_case_history_preview',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
     public function Get_MRD_Details()
	{
		$this->form_validation->set_rules('mrd', 'MRD NO', 'trim|required|min_length[1]|max_length[200]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$patient_registration_id=trim(htmlentities($this->input->post('mrd')));
	    	
	    		
	    		$Get_APP_ID=$this->Case_hsitory_preview_model->Get_App_ID($patient_registration_id);
	    		if($Get_APP_ID)
	    		{
	    			$lastvisitdate=date("d-m-Y", strtotime($Get_APP_ID[0]['appointment_date']));
	    			$patient_appointment_id=$Get_APP_ID[0]['patient_appointment_id'];
	    		}
	    		$patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$patient_registration_id")->row();
				$pname=$patient_details->fname . $patient_details->lname; 
				$mrdno=$patient_details->mrdno; 
				$dob=date("d-m-Y", strtotime($patient_details->dob));
				$address=$patient_details->address;
				$mobileno=$patient_details->mobileno;
				if($patient_details->gender==1)
				{
				 $age='Male';
				}
				elseif($patient_details->gender==2)
				{
				  $age="Female";
				}
				else
				{
				  $age='Transgender';
				}
				$gender=$age; 
				$ageyy=$patient_details->ageyy; 
				$agemm=$patient_details->agemm; 

				$patientwhite_details=$this->db->get_where('whitecell',"patient_registration_id=$patient_registration_id")->row();
				 if($patientwhite_details)
			        {
						$bp=$patientwhite_details->bp; 
						$sugar=$patientwhite_details->sugar; 
						$temprature=$patientwhite_details->temprature; 
			       }
			       else
			       {
			        $sugar='';
			        $bp='';
			        $temprature='';
			       }
				$checkupdoctorname=$this->Examination_model->getcheckdoctorname_psy($patient_registration_id);
				$ddt='';$ddtu='';$sl=1;$sst='';
				if($checkupdoctorname)
				{
					foreach ($checkupdoctorname as $datad) {
					    $ddt.='<li>'.$datad['name'].'<span class="float-right">'.$datad['psychiatrist_date'].'</span></li>';
					}


                    foreach ($checkupdoctorname as $data) 
                    {
                    	$hhh=$data['psychiatrist_process_id'];
                    	$hhhd="'showdata$sl'";
                        $ddtu.='<li class="nav-item">
                            <a class="nav-link" id="base-tab'.$sl.'" data-toggle="tab" aria-controls="tab'.$sl.'" onclick="previewdatewise('.$hhh.','.$hhhd.')" href="#tab'.$sl.'" aria-expanded="true">'.$data['psychiatrist_date'].'</a>
                        </li>';

                         $sst.='<div role="tabpane'.$sl.'" class="tab-pane" id="tab'.$sl.'" aria-expanded="true" aria-labelledby="base-tab'.$sl.'">
                                 <div id="showdata'.$sl.'"></div>
                              </div>';

               		 $sl++;
                    }

                   
                    
                                              
                                              
                                           
				}
				$html='<div class="row match-height">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 d-flex card" style="color:white;">
                                                        <div class="patient-info card bg-gradient-y-pink">
                                                            <div class="card-body">
                                                                <h4 style="color: white;font-weight: bold;">'.$pname.'</h4>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <div class="patient-info-heading">MRD NO:<b>'.$mrdno.'</b></div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="patient-info-heading">Date Of Birth: '.$dob.'</div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-md-6" style="margin-top: -35px;">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <div class="patient-info-heading">Age: '.$ageyy.'/ '.$agemm.'/ '.$gender.'</div>
                                                                            </li>

                                                                            <li>
                                                                                <div class="patient-info-heading">Contact: '.$mobileno.'</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="patient-info-heading">Address: '.nl2br($address).'</div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6" style="height:183px;">
                                        <div class="card bg-gradient-y-info">
                                            <div class="card-body">
                                                <ul class="list-unstyled text-white patient-info-card">
                                                    <li><span class="patient-info-heading">Complaints :</span>
                                                        <div id="preview_comp"></div>
                                                    </li>
                                                    <li><span class="patient-info-heading">BP : '.$bp.'</span>  Sugar : '.$sugar.'</span>  Temprature : '.$temprature.'</span> </li>
                                                    <li><span class="patient-info-heading">Last Visit : '.$lastvisitdate.'</span> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6" style="height:183px;">
                                        <div class="card bg-gradient-y-warning">
                                            <div class="card-header">
                                                <h5 class="card-title text-white">Checkup Doctors</h5>
                                            </div>
                                            <div class="card-content mx-2">
                                                <ul class="list-unstyled text-white">
                                                   '.$ddt.'
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="row">
								    <div class="col-md-12">
								        <div class="card-content">
								           <ul class="nav nav-tabs">
                                               '.$ddtu.'
                                            </ul>
								        </div>
								    </div>
								 </div>

								   <div class="row">
                                        <div class="col-md-12"> 
                                            </br>
           <input style="float: left;"  type="checkbox" name="select-all" id="select-all" >   <h5 style="font-weight: bold;">Select All</h5>
         
                <input type="hidden" id="examinationIdPreview" name="examinationIdPreview" >
                <input type="hidden" id="preIdvalue" name="preIdvalue" >
                                    </div>
                                      <div class="col-md-12 px-1 pt-1">
                                                '.$sst.'
                                            </div>
                                    </div>
                                ';
                echo json_encode(array('msg'=>'success','error' =>'No Data Found','error_message' =>'','showdata'=>$html));


	    	
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
    public function getexaminationpreview()
    {
       $this->form_validation->set_rules('examinationid', 'Examination ID', 'trim|required|min_length[1]|max_length[100]|numeric');
       if($this->form_validation->run() == TRUE)
       {
          $printpsyid=$this->input->post('examinationid');
          $office_id=$this->session->userdata('office_id');
           $printpsyid_master=$this->db->get_where('psychiatrist_process',"psychiatrist_process_id=$printpsyid")->row();
          $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$printpsyid_master->doctor_id")->row()->name;
          $data['username']=$this->db->get_where('user',"user_id=$printpsyid_master->login_id")->row()->name;
          $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$printpsyid_master->patient_registration_id")->row();
          $data['psychiatrist_date']=date("d-m-Y", strtotime($printpsyid_master->psychiatrist_date));
          $data['review_date']=date("d-m-Y", strtotime($printpsyid_master->review_date));
          $informant=$printpsyid_master->informant;
          $data['cheif_complaints']=$printpsyid_master->cheif_complaints;
          
          $data['past_psychiatrist_illness']=$printpsyid_master->past_psychiatrist_illness;
          $data['past_medical_surgery']=$printpsyid_master->past_medical_surgery;
          $data['family_history']=$printpsyid_master->family_history;
          $data['personal_history']=$printpsyid_master->personal_history;
          $data['diagnosis']=$printpsyid_master->diagnosis;
          $data['advice']=$printpsyid_master->advice;
          $data['permorbid_personality']=$printpsyid_master->permorbid_personality;
          $data['medical_status_examination']=$printpsyid_master->medical_status_examination;
          $data['medicine_doc_remarks']=$printpsyid_master->medicine_doc_remarks;
         $data['fname']=$patient_details->fname; 
         $data['lname']=$patient_details->lname; 
         $data['mrdno']=$patient_details->mrdno; 
         $data['address']=$patient_details->address; 
         $data['mobileno']=$patient_details->mobileno; 
         if($patient_details->gender==1)
         {
          $age='Male';
         }
         elseif($patient_details->gender==2)
         {
          $age="Female";
         }
         else
         {
          $age='Transgender';
         }
  //         $postoutvalue1=$postvaluesArray[0]; //Informant
  // $postoutvalue2=$postvaluesArray[1]; //Cheif Complaints
  // $postoutvalue3=$postvaluesArray[2]; // Past Psychiatrist Illness
  // $postoutvalue4=$postvaluesArray[3]; //Past Medical & Surgery
  // $postoutvalue5=$postvaluesArray[4]; //Family History
  // $postoutvalue6=$postvaluesArray[5]; //Personal History
  // $postoutvalue7=$postvaluesArray[6]; //Diagnosis
  // $postoutvalue8=$postvaluesArray[7]; //Medicine
  // $postoutvalue9=$postvaluesArray[8]; //Advice
  // $postoutvalue10=$postvaluesArray[9]; //Permorbid Personality
  // $postoutvalue11=$postvaluesArray[10]; //Medical Status Examination
  // $postoutvalue12=$postvaluesArray[11]; //Review Date
         $showdata='';
         $data['gender']=$age; 
         $data['ageyy']=$patient_details->ageyy; 
         $data['agemm']=$patient_details->agemm; 
         $title_id=$patient_details->title; 
         $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;
          $showdata.='<button style="float:right;" type="button" style="float: right;" onclick="printpsy('.$printpsyid.')" class="btn btn-info btn-glow"><i class="la la-print"></i></button>';
                if($informant)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk1" id="popupchk1"   value="1" >
                                    <h5 style="font-weight: bold;">Informant:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->informant).'</div></div>';
                }
                if($printpsyid_master->cheif_complaints)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk2" id="popupchk2"   value="1" >
                                    <h5 style="font-weight: bold;">Cheif Complaints:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->cheif_complaints).'</div></div>';
                }
                if($printpsyid_master->past_psychiatrist_illness)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk3" id="popupchk3"   value="1" >
                                    <h5 style="font-weight: bold;">Past Psychiatrist Illness:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->past_psychiatrist_illness).'</div></div>';
                }
                if($printpsyid_master->past_medical_surgery)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk4" id="popupchk4"   value="1" >
                                    <h5 style="font-weight: bold;">Past Medical & Surgery:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->past_medical_surgery).'</div></div>';
                }
                if($printpsyid_master->family_history)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk5" id="popupchk5"   value="1" >
                                    <h5 style="font-weight: bold;">Family History:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->family_history).'</div></div>';
                }
                if($printpsyid_master->personal_history)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk6" id="popupchk6"   value="1" >
                                    <h5 style="font-weight: bold;">Personal History:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->personal_history).'</div></div>';
                }
                if($printpsyid_master->diagnosis)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk7" id="popupchk7"   value="1" >
                                    <h5 style="font-weight: bold;">Diagnosis:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->diagnosis).'</div></div>';
                }
                $var_array=array($printpsyid_master->psychiatrist_process_id,$this->session->userdata('office_id'));
                $getdoctorprescription=$this->Psychiatrist_model->getdoctormedicinemodels($var_array);
                if($getdoctorprescription)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk8" id="popupchk8"   value="1" >
                                    <h5 style="font-weight: bold;">Medicine:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">
                                     <table  style="width:100%;margin-top:25px;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1"><thead><tr><th style="width:5%;">SL NO</th style="width:10%;"><th style="width:20%;">Drug Name</th><th style="width:20%;">Instruction</th><th style="width:20%;">No Of Days</th><th style="width:20%;">Qty</th><th style="width:5%;">Eye</th></tr></thead><tbody>';
                                     $sgl=0;
                           foreach($getdoctorprescription as $datame)
                           {
                                $sgl++;
                                if($datame['med_action']==0)
                                {
                                    $drugname=$datame['drugname'];
                                }
                                else
                                {
                                    $drugname=$datame['med_name'];
                                }
                              $showdata.='<tr><td>'.$sgl.'</td><td>'.$drugname.'</td><td>'.$datame['instruction'].'</td><td>'.$datame['nodays'].'</td><td>'.$datame['qty'].'</td><td>'.$datame['med_eye'].'</td></tr>';
                           }
                            $showdata.='</tbody></table></div></div>';
                }
                if($printpsyid_master->advice)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk9" id="popupchk9"   value="1" >
                                    <h5 style="font-weight: bold;">Advice:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->advice).'</div></div>';
                }
                if($printpsyid_master->permorbid_personality)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk10" id="popupchk10"   value="1" >
                                    <h5 style="font-weight: bold;">Permorbid Personality:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->permorbid_personality).'</div></div>';
                }
                if($printpsyid_master->medical_status_examination)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk11" id="popupchk11"   value="1" >
                                    <h5 style="font-weight: bold;">Medical Status Examination:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.nl2br($printpsyid_master->medical_status_examination).'</div></div>';
                }
                if($printpsyid_master->review_date)
                {
                    $showdata.='<div class="row">
                                    <div class="col-md-3">
                                    <input type="checkbox" name="popupchk12" id="popupchk12"   value="1" >
                                    <h5 style="font-weight: bold;">Review Date:</h4>
                                </div>
                                <div style="margin-top: 3%;" class="col-md-3">'.$printpsyid_master->review_date.'</div></div>';
                }
             echo json_encode(array('msg'=>'data','showdata'=>$showdata,'error'=>'','error_message' =>''));
       }
       else
       {
         log_message('info',  'examination');
         echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));

       }
    }

}
