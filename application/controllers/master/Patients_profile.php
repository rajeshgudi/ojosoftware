<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_profile extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Patients_profile_model');
        $this->load->model('Common_model');
		$this->load->model('Examination_model');
      
    }
    
	public function index()
	{
      $data['title']='EMR::Patients_profile';
      $data['activecls']='Patients_profile';
      $var_array=array($this->session->userdata('office_id'));
	  $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('master/patients_profile',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
   
    public function getpatientdetails()
	{
		$this->form_validation->set_rules('patient_registration_id', 'Patient ID', 'trim|required|min_length[1]|max_length[200]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$getpatient_personal_details=$this->Patients_profile_model->Getpatient_profile_his($this->input->post('patient_registration_id'));

	    	$pat_app_hist=$this->Patients_profile_model->pat_app_hist($this->input->post('patient_registration_id'));
	    	$pat_trs_hist=$this->Patients_profile_model->pat_trs_hist($this->input->post('patient_registration_id'));
			$checkupdoctorname=$this->Examination_model->getcheckdoctorname($this->input->post('patient_registration_id'));
	    	$ddt='';$ddtu='';$sl=1;$sst='';
			if($checkupdoctorname)
			{
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
	    	if($getpatient_personal_details)
	    	{
	    		$titlename='';
	    		$title_id=$getpatient_personal_details[0]['title']; 
	    		if($title_id)
	    		{
	    			error_reporting(0);
	    			$titlename=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;
	    			//echo $this->db->last_query();exit;
	    			if($titlename)
	    			{
	    				$titlename=$titlename;
	    			}
	    		}
	    		
   			    

   			    if($getpatient_personal_details[0]['gender']==1)
				{
					$ge='Male';
				}
				elseif ($getpatient_personal_details[0]['gender']==2) 
				{
					$ge='Female';
				}
				else 
				{
					$ge='Transgender';
				}
	    	}
	    	$htmldata='<div class="row">
                                            <div class="col-md-4 bor_cls">
                                                <h3 class="tit_hd">Patient Details 
                    <a onclick="patgetprint('.$getpatient_personal_details[0]['patient_registration_id'].')" style="float: right;" href="#" class="btn btn-social-icon mr-1 mb-1 btn-primary"><span class="la la-cc-diners-club font-medium-3"></span></a>

                    <a onclick="editpat_det_hist('.$getpatient_personal_details[0]['patient_registration_id'].')" style="float: right;" href="#" class="btn btn-social-icon mr-1 mb-1 btn-google"><span class="ft-edit font-medium-3"></span></a>

                        


                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <h6 class="tit_clas_pro"><b>MRD</b></h6>
                                                            <h6 class="tit_clas_pro">Tittle</h6>
                                                            <h6 class="tit_clas_pro">F.Name</h6>
                                                            <h6 class="tit_clas_pro">L.Name</h6>
                                                            <h6 class="tit_clas_pro">Gender</h6>
                                                            <h6 class="tit_clas_pro" style="font-size: 16px;">Age DD/MM/YY</h6>
                                                            <h6 class="tit_clas_pro">Date of birth</h6>
                                                            <h6 class="tit_clas_pro">Mobile</h6>
                                                            <h6 class="tit_clas_pro">City</h6>
                                                            <h6 class="tit_clas_pro">Area</h6>
                                                            <h6 class="tit_clas_pro">Address</h6>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h6 class="tit_clas_pro"><b>: '.$getpatient_personal_details[0]['mrdno'].'</b></h6>
                                                             <h6 class="tit_clas_pro">: '.$titlename.'</h6>
                                                             <h6 class="tit_clas_pro">: '.$getpatient_personal_details[0]['fname'].'</h6>
                                                             <h6 class="tit_clas_pro">: '.$getpatient_personal_details[0]['lname'].'</h6>
                                                             <h6 class="tit_clas_pro">: '.$ge.'</h6>
                                                             <h6 class="tit_clas_pro">: '.$getpatient_personal_details[0]['aged'].' '.$getpatient_personal_details[0]['agemm'].' '.$getpatient_personal_details[0]['ageyy'].'</h6>
                                                             <h6 class="tit_clas_pro">:'.$getpatient_personal_details[0]['dateofbirth'].'</h6>
                                                             <h6 class="tit_clas_pro">:'.$getpatient_personal_details[0]['mobileno'].'</h6>
                                                             <h6 class="tit_clas_pro">:'.$getpatient_personal_details[0]['city'].'</h6>
                                                             <h6 class="tit_clas_pro">: '.$getpatient_personal_details[0]['areaname'].'</h6>
                                                             <h6 class="tit_clas_pro">: '.$getpatient_personal_details[0]['address'].'</h6>

                                                        </div>
                                                    </div>
                                            </div> 

                                             <div class="col-md-8">
                                                  <h3 class="tit_hd">Patient Appointment History</h3>
                                                  <table class="table table-bordered table-hover"> 
                                                    <thead>
                                                        <tr>
                                                            <th>SL NO</th>
                                                            <th>Appointment Date</th>
                                                            <th>Appointment Time</th>
                                                            <th>Doctor Name</th>
                                                            <th>Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                    if($pat_app_hist)
                                                    {
                                                    	$sl=1;
                                                    	foreach($pat_app_hist as $dataapp)
                                                    	{
                                                    		$patient_appointment_id=$dataapp['patient_appointment_id'];
                                                    		  $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_con('.$this->input->post('patient_registration_id').','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';

                                                    		$htmldata.='<tr><td>'.$sl.'</td><td>'.$dataapp['appointment_date'].'</td><td>'.$dataapp['appointment_time'].'</td><td>'.$dataapp['doctoname'].'</td><td>'.$print.'</td></tr>';
                                                    		$sl++;
                                                    	}
                                                    }
                                                        
                                                    $htmldata.='</tbody>
                                                  </table>

                                                   <h3 class="tit_hd">Transaction History</h3>
                                                  <table class="table table-bordered table-hover"> 
                                                    <thead>
                                                        <tr>
                                                            <th>SL NO</th>
                                                            <th>Billing Date & time</th>
                                                           
                                                            <th>Invoice Number</th>
                                                            <th>Doctor Name</th>
                                                            <th>Total Amount</th>
                                                            <th>Print</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>';
                                                    if($pat_trs_hist)
                                                    {
                                                    	$sl=1;
                                                    	foreach($pat_trs_hist as $trsa)
                                                    	{
                                                    		$billing_master_id=$trsa['billing_master_id'];
                                                $print='<button onclick="printdata('.$billing_master_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
                                                    		$htmldata.='<tr><td>'.$sl.'</td><td>'.$trsa['billing_date'].' & '.$trsa['billing_time'].'</td><td>'.$trsa['invoice_number'].'</td><td>'.$trsa['doctoname'].'</td><td>'.number_format($trsa['grand_total'],2).'</td><td>'.$print.'</td></tr>';
                                                    		$sl++;
                                                    	}
                                                    }
                                                        
                                                    $htmldata.='</tbody>
                                                  </table>

                                             </div>
                                        </div><hr/>
                                        <div class="row">
                                          	<div class="col-md-12">
                                        	 <h3 class="tit_hd">Case History</h3>
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
	    	echo json_encode(array('msg'=>'success','msg'=>'success','htmldata'=>$htmldata,'error'=> '','error_message' =>''));
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
public function getpatdet()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
			$getpatient_personal_details=$this->Patients_profile_model->Getpatient_profile_his($this->input->post('getid'));
			if($getpatient_personal_details)
			{
			$patit='';
			$var_array=array($this->session->userdata('office_id'));
			$patient_titles=$this->Common_model->getpatient_titles($var_array);
			if($patient_titles)
			{
				error_reporting(0);
				foreach($patient_titles as $pattit)
				{
					$sel1='';
					
					
					if($pattit['patient_title_id']==$getpatient_personal_details[0]['title'])
					{
						$sel1='selected';
					}
					$tto=$pattit['patient_title_id'];
					$patit.='<option '.$sel1.' value="'.$tto.'" >'.$pattit['name'].'</option>';
				}
			}
			$citt='';
			 $citys=$this->Common_model->getcity($var_array);
			 if($citys)
			 {
			 	foreach($citys as $citysdata)
				{
					$sel1='';
					$title_id='';
					$citynamemm='';
					if($getpatient_personal_details[0]['citynamemm'])
					{
						$citynamemm=$getpatient_personal_details[0]['citynamemm']; 
					}
					
					if($citysdata['city_id']==$citynamemm)
					{
						$sel1='selected';
					}
					$citt.='<option value="'.$citysdata['city_id'].'" '.$sel1.'>'.$citysdata['name'].'</option>';
				}
			 }
			 $congender1=$congender2=$congender3='';
if($getpatient_personal_details[0]['gender']==1)
{
	$congender1='selected';
}
if($getpatient_personal_details[0]['gender']==2)
{
	$congender2='selected';
}
if($getpatient_personal_details[0]['gender']==3)
{
	$congender3='selected';
}

			$aree='';
		  $area=$this->Common_model->Get_Area($var_array);
		  if($area)
			 {
			 	foreach($area as $areadata)
				{
					$sel1='';
					
					$areaaname='';
					if($getpatient_personal_details[0]['areaa'])
					{
						$areaaname=$getpatient_personal_details[0]['areaa']; 
					}
					
					if($areadata['area_id']==$areaaname)
					{
						$sel1='selected';
					}
					$aree.='<option value="'.$areadata['area_id'].'" '.$sel1.'>'.$areadata['name'].'</option>';
				}
			 }

				$html='<form id="followupd_form" action="#" method="post"> 
							 <div id="div_modalf" class="modal fade" role="dialog">
							        <div class="modal-dialog modal-lg">
							        <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"></h4>
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                </div>
							                <div class="modal-body">
							                    <div class="row">
							                        <div class="col-lg-12 col-md-12" >
	<input type="hidden" name="pat_reg_idd" id="pat_reg_idd" value="'.$getpatient_personal_details[0]['patient_registration_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                             <div class="row form-group">
							                             	<div class="col-md-3">
							                             		<label>Title<span class="text-danger">*</span></label>
							                             		<select class="form-control select2" name="pat_pro_tit" id="pat_pro_tit">
							                             			<option value="">Select Patient Title</option>
							                             			'.$patit.'
							                             		</select>
							                             	</div>

							                             	<div class="col-md-5">
							                             		<label>First Name<span class="text-danger">*</span></label>
							                             		<input type="text" name="pat_fname" id="pat_fname" class="form-control" value="'.$getpatient_personal_details[0]['fname'].'">
							                             	</div>

							                             	<div class="col-md-4">
							                             		<label>Last Name<span class="text-danger">*</span></label>
							                             		<input type="text" name="pat_lname" id="pat_lname" class="form-control" value="'.$getpatient_personal_details[0]['lname'].'">
							                             	</div>

							                             </div>    
							                               
							                                <div class="row form-group">
							                                  <div class="col-md-3">
							                                  	<label>Gender<span class="text-danger">*</span></label>
							                                  	<select class="form-control" name="gender_pro" id="gender_pro">
							                                  	<option value="">Select Gender</option>
							                                  	<option value="1" '.$congender1.'>Male</option>
							                                  	<option value="2" '.$congender2.'>Female</option>
							                                  	<option value="3" '.$congender3.'>Transgender</option>
							                                  	</select>
							                                  </div>

							                                  <div class="col-md-3">
				                                                    <div class="form-group">
				                                                        <label for="lastname">Age: <span class="text-danger">*</span></label>
				                                                        <div class="row">
				                                                            <div class="col-md-4 p-0">
				                                                                <input type="text" onkeyup="ageChanged()" class="form-control" id="agey" name="agey" placeholder="YY" value="'.$getpatient_personal_details[0]['ageyy'].'">
				                                                            </div>
				                                                            <div class="col-md-4 p-0">
				                                                                <input type="text" onkeyup="ageChanged()" class="form-control" id="agem" name="agem" placeholder="MM" value="'.$getpatient_personal_details[0]['agemm'].'">
				                                                            </div>
																			<div class="col-md-4 p-0">
				                                                                <input type="text" onkeyup="ageChanged()" class="form-control" id="aged" name="aged" placeholder="DD" value="'.$getpatient_personal_details[0]['aged'].'">
				                                                            </div>
				                                                        </div>
				                                                        
				                                                    </div>
				                                                 </div>


				                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="lastname">Date Of Birth: <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="dob" name="dob">
                                                    </div>
                                                 </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="lastname">Mobile No: <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control phone-inputmask" id="mobileno" name="mobileno" autocomplete="off" value="'.$getpatient_personal_details[0]['mobileno'].'">
                                                    </div>
                                                 </div>


							                                </div>  



		                                  <div class="row form-group">
		                             	<div class="col-md-3">
		                             		<label>City<span class="text-danger">*</span></label>
		                             		<select class="form-control select2" name="pat_city" id="pat_city">
		                             			<option value="">Select City</option>
		                             			'.$citt.'
		                             		</select>
		                             	</div>


		                             	<div class="col-md-3">
		                             		<label>Area<span class="text-danger">*</span></label>
		                             		<select class="form-control select2" name="pat_area" id="pat_area">
		                             			<option value="">Select Area</option>
		                             			'.$aree.'
		                             		</select>
		                             	</div>


		                             	<div class="col-md-6">
		                             		<label>Address<span class="text-danger">*</span></label>
		                             		<textarea class="form-control" name="address_t" id="address_t">'.$getpatient_personal_details[0]['address'].'</textarea>
		                             	</div>


		                             </div>

							                               
							                                 
							                                
							                               
							                                
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		    <button id="save" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" type="button" onclick="updatepat()"><i class="fas fa-plus-square"></i>Update</button>
			<button type="button" id="mclose" class="mmclld btn btn-info btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal">Close</button>
							                </div>
							            </div>
							        </div>
							    </div>
							</form>  <script src="'.base_url().'template1/app-assets/js/inputmast.js"></script>';
							echo json_encode(array('msg'=>$html,'yearpat'=>$getpatient_personal_details[0]['ageyy'],'error' =>'','error_message' =>''));
	    	
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'','error' =>'No data Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
 private function fetch_data() 
    {
        return array(
            'title'=>trim($this->input->post('pat_pro_tit')),
            'fname'=>trim($this->input->post('pat_fname')),
            'lname'=>trim($this->input->post('pat_lname')),
            'gender'=>trim($this->input->post('gender_pro')),
            'ageyy'=>trim($this->input->post('agey')),
            'agemm'=>trim($this->input->post('agem')),
            'aged'=>trim($this->input->post('aged')),
            'dob'=>trim($this->input->post('dob')),
            'city'=>trim($this->input->post('pat_city')),
            'area_id'=>trim($this->input->post('pat_area')),
            'mobileno'=>trim($this->input->post('mobileno')),
            'address'=>trim($this->input->post('address_t'))
           );
    }

public function updatedata()
	{
		$this->form_validation->set_rules('pat_reg_idd', 'Patient ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		$this->form_validation->set_rules('pat_pro_tit', 'Title', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('pat_fname', 'First Name', 'trim|required|min_length[1]|max_length[40]');
		$this->form_validation->set_rules('gender_pro', 'Gender', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('agey', 'Age Year', 'trim|required|min_length[1]|max_length[4]|numeric');
		$this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
		$this->form_validation->set_rules('pat_city', 'City', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('mobileno', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('address_t', 'Address', 'trim|min_length[1]|max_length[100]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('pat_reg_idd')));
    		$data=$this->fetch_data();
    		$getresult=$this->Patients_profile_model->updatedata($data,$edit_id);
    		if($getresult)
    		{
	    		echo json_encode(array('msg'=>'Updated Successfully','error' =>'','error_message' =>''));
    		}
    		else
    		{
    			echo json_encode(array('msg'=>'','error' =>'Failed to Update','error_message' =>''));
    		}
	    	
	    }
	    else
	    {
	    echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));
	    }
	}
}
