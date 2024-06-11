<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Case_history_preview extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Case_hsitory_preview_model');
         $this->load->model('Common_model');
         $this->load->model('Examination_model');

      
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
      $content=$this->load->view('master/case_history_preview',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
     public function Get_MRD_Details()
	{
		$this->form_validation->set_rules('mrd', 'MRD NO', 'trim|required|min_length[1]|max_length[200]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$MRD=trim(htmlentities($this->input->post('mrd')));
	    	$Get_MRD_Details=$this->Case_hsitory_preview_model->checkingval($MRD);
	    	if($Get_MRD_Details)
	    	{
	    		$patient_registration_id=$Get_MRD_Details[0]['patient_registration_id'];
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
				$checkupdoctorname=$this->Examination_model->getcheckdoctorname($patient_registration_id);
				$ddt='';$ddtu='';$sl=1;$sst='';
				if($checkupdoctorname)
				{
					foreach ($checkupdoctorname as $datad) {
					    $ddt.='<li>'.$datad['name'].'<span class="float-right">'.$datad['examination_date'].'</span></li>';
					}


                    foreach ($checkupdoctorname as $data) 
                    {
                    	$hhh=$data['examination_id'];
                    	$hhhd="'showdata$sl'";
                        $ddtu.='<li class="nav-item">
                            <a class="nav-link" id="base-tab'.$sl.'" data-toggle="tab" aria-controls="tab'.$sl.'" onclick="previewdatewise('.$hhh.','.$hhhd.')" href="#tab'.$sl.'" aria-expanded="true">'.$data['examination_date'].'</a>
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
          <button type="button" style="float: right;" onclick="examinationprintNew()" class="btn btn-info btn-glow"><i class="la la-print"></i></button>
                <input type="hidden" id="examinationIdPreview" name="examinationIdPreview" >
                <input type="hidden" id="preIdvalue" name="preIdvalue" >
                                    </div>
                                      <div class="tab-content px-1 pt-1">
                                                '.$sst.'
                                            </div>
                                    </div>
                                ';
                echo json_encode(array('msg'=>'success','error' =>'No Data Found','error_message' =>'','showdata'=>$html));


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

}
