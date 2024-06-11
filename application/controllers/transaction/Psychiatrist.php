<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psychiatrist extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Psychiatrist_model');
         $this->load->model('Examination_model');
         $this->load->model('Common_model');

      
    }
    
	public function index()
	{
		$data['title']='EMR::Psychiatrist';
		$data['activecls']='Psychiatrist';
		$var_array=array($this->session->userdata('office_id'));
		$patient_registration_id=$this->input->post('printpatient_registration_id');
		$pat_app_id=$this->input->post('pat_app_id');
		$var_array=array($this->session->userdata('office_id'));
        $data['getofficedata']=$this->Common_model->get_conf_data($var_array);
        $data['cheif_comp']=$this->Common_model->get_cheif_comp($var_array);
        $data['past_psy']=$this->Common_model->get_past_psy($var_array);
        $data['past_med_sur']=$this->Common_model->get_past_med_sur($var_array);
        $data['fam_hist']=$this->Common_model->get_fam_hist($var_array);
        $data['infor']=$this->Common_model->get_infor($var_array);
        $data['advice']=$this->Common_model->get_advice($var_array);
        $data['fam_rel']=$this->Common_model->get_fam_rel($var_array);
        $data['per_hist']=$this->Common_model->get_per_hist($var_array);
        $data['diagnosis_v']=$this->Common_model->get_diagnosis_v($var_array);
        $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
        $data['getallmedicine']=$this->Common_model->getallmedicine($var_array);
        $data['medtemplates_pharmacy']=$this->Examination_model->getallmedicinetemplates_pharmacy();
        $data['getmedins']=$this->Common_model->GetAllmedins($var_array);
		$doctornamelist=$this->Psychiatrist_model->getdoctors($patient_registration_id,$pat_app_id);
		$patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$patient_registration_id")->row();
		$patient_apdetails=$this->db->get_where('patient_appointment',"patient_appointment_id=$pat_app_id")->row();
		$data['pname']=$patient_details->fname . $patient_details->lname; 
		$data['mrdno']=$patient_details->mrdno;
		$data['dob']=date("d-m-Y", strtotime($patient_details->dob));
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
		if($doctornamelist)
		{
			$data['doc_name']=$doctornamelist[0]['name']; 
			$doctors_registration_id=$doctornamelist[0]['doctors_registration_id'];
		}
		else
		{
			$data['doc_name']='';
			$doctors_registration_id='';
		}
		$Already_savedOr_Not=$this->Psychiatrist_model->Already_savedOr_Not($patient_registration_id,$pat_app_id,$doctors_registration_id);
		if($Already_savedOr_Not)
		{
			$data['psychiatrist_process_id']=$Already_savedOr_Not[0]['psychiatrist_process_id'];
		}
		else
		{
			$data['psychiatrist_process_id']=0;
		}
		$data['gender']=$age; 
		$data['ageyy']=$patient_details->ageyy; 
		$data['agemm']=$patient_details->agemm; 
		$data['patient_registration_id']=$patient_registration_id; 
		$data['patient_appointment_id']=$pat_app_id; 
		$data['doctor_id']=$doctors_registration_id; 
		$content=$this->load->view('transaction/psychiatrist/insert',$data,true);
		$this->load->view('includes/layout',['content'=>$content]);  
	}
	    private function fetch_data() 
       {
           $return=array(
              "psy_main"=>array(
					'patient_registration_id'=>trim($this->input->post('patient_registration_id')),
		            'patient_appointment_id'=>trim($this->input->post('patient_appointment_id')),
		            'doctor_id'=>trim($this->input->post('doctor_id')),
		            'informant'=>trim($this->input->post('textarea1')),
		            'cheif_complaints'=>trim($this->input->post('textarea2')),
		            'past_psychiatrist_illness'=>trim($this->input->post('textarea3')),
		            'past_medical_surgery'=>trim($this->input->post('textarea4')),
		            'family_history'=>trim($this->input->post('textarea5')),
		            'personal_history'=>trim($this->input->post('textarea6')),
		            'psychiatrist_date'=>date('Y-m-d'),
		            'psychiatrist_time'=>date('H:i:s'),
		            'diagnosis'=>trim($this->input->post('textarea7')),
		            'advice'=>trim($this->input->post('textarea8')),
		            'permorbid_personality'=>trim($this->input->post('textarea9')),
		            'medical_status_examination'=>trim($this->input->post('textarea10')),
		            'medicine_doc_remarks'=>trim($this->input->post('medicine_doc_remarks')),
		            'review_date'=>trim($this->input->post('review_date')),
		            'parent_id'=>$this->session->userdata('parent_id'),
		            'login_id'=>$this->session->userdata('login_id'),
		            'office_id'=> $this->session->userdata('office_id')
               ),
               "psy_medicine"=>array(
                'medicine_id'=>$this->input->post('medicine_id'),
                'instruction'=>$this->input->post('instruction'),
                'nodays'=>$this->input->post('days'),
                'qty'=>$this->input->post('qty'),
                'sdate'=>$this->input->post('sdate'),
                'tdate'=>$this->input->post('tdate'),
                'med_eye'=>$this->input->post('medeye'),
                "mulframetype"=>$this->input->post('mulframetype'),
                "mulframecolor"=>$this->input->post('mulframecolor'),
                "med_action"=>$this->input->post('med_action'),
                "med_name"=>$this->input->post('med_name')
               )
              
           );
            return $return;
       }
	public function savedata()
	{
		$this->form_validation->set_rules('patient_registration_id', 'Patient ID', 'trim|required|min_length[1]|max_length[200]|numeric');
		$this->form_validation->set_rules('patient_appointment_id', 'Patient Appointment ID', 'trim|required|min_length[1]|max_length[200]|numeric');
		$this->form_validation->set_rules('doctor_id', 'Doctor ID', 'trim|required|min_length[1]|max_length[200]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
    		$data=$this->fetch_data();
    		$getresult=$this->Psychiatrist_model->savedata($data);
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
	public function geteditdata()
   {
       $this->form_validation->set_rules('getid', 'Edit ID', 'trim|required|min_length[1]|max_length[100]|numeric');
       if($this->form_validation->run() == TRUE)
       {
            $edit_id=trim(htmlentities($this->input->post('getid')));
            $var_array=array($edit_id,$this->session->userdata('office_id'));
            $getmastertable=$this->Psychiatrist_model->getsavedatamodel($var_array);
            if($getmastertable)
            {
                echo json_encode(array('msg'=>'success','mastertable'=>$getmastertable,'error'=>'','error_message' =>''));
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
   public function showhistorydata()
   {
            $key=trim(htmlentities($this->input->post('key')));
            $var_array=array($key);
            $getdoctorprescription=$this->Psychiatrist_model->getdoctormedicinemodel($var_array);
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
                         $htmllj.='<select class="form-control" id="instruction_'.$sl.'" name="instruction[]" >';
                        foreach ($medinss as $dattamed) {
                            $selmm='';
                            if($dattamed['name']==$data['instruction'])
                            {
                                $selmm='selected';
                            }
                           $htmllj.='<option value="'.$dattamed['name'].'" '.$selmm.'>'.$dattamed['name'].'</option>';
                        }
                         $htmllj.='</select>';
                    }
                    if($data['med_action']==1)
                    {
                        $htmllj='<textarea class="form-control" id="instruction_'.$sl.'" name="instruction[]">'.$data['instruction'].'</textarea>';
                    }
                    $docc.='<tr><td>'.$med.'</td>
                                <td>
                                 <input type="hidden" class="form-control" id="medicine_id_'.$sl.'" name="medicine_id[]" value="'.$data['medicine_id'].'">
                                 '.$htmllj.'<span id="search_result'.$sl.'"></span>
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
                                </select>
                                </td>
                                <td>
                                    <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">
                                    <button class="btn btn-danger btnDelete btn-sm">
                                       <i class="la la-trash"></i>
                                    </button>
                                    </a>
                                    <a href="#" id="mult_'.$sl.'" class="table-link danger serial_number_setting" data-target="#myModalframe" data-toggle="modal" onclick="pop('.$sl.')"><button class="btn btn-sm btn-success">Add</button></a>
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
   public function updatedata()
   {
      $this->form_validation->set_rules('patient_registration_id', 'Patient ID', 'trim|required|min_length[1]|max_length[200]|numeric');
	  $this->form_validation->set_rules('patient_appointment_id', 'Patient Appointment ID', 'trim|required|min_length[1]|max_length[200]|numeric');
      if($this->form_validation->run() == TRUE)
      {
            $edit_id=trim(htmlentities($this->input->post('edit_psychiatrist_process_id')));
            $data=$this->fetch_data();
            $getresult=$this->Psychiatrist_model->updatepsy($data,$edit_id);
            if($getresult)
            {
               echo json_encode(array('msg' =>'Updated Successfully','error'=>'','error_message' =>''));
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
   public function printpsy()
    {
    	
        $postvalues = '';
        for ($x = 1; $x <= 12; $x++) {
            $postvalues .= $this->input->post('chkpostout' . $x) . ',';
        }
      $this->Psychiatrist_model->print_bill_preview($this->input->post('printpsyid'), rtrim($postvalues, ','), $this->session->userdata('office_id'));

    }
    
}
