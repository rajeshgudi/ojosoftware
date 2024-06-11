<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discharge_summary extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Department_model');
        $this->load->model('Discharge_summary_model');
         $this->load->model('Common_model');

      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Discharge_summary_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Discharge Summary';
      $data['activecls']='Discharge_summary';
      $var_array=array($this->session->userdata('office_id'));
      $data['mrdnos']=$this->Common_model->getpateintmrdnos($var_array);
	  $data['doctors']=$this->Common_model->getdoctors($var_array);
      $data['getallmedicine']=$this->Common_model->getallmedicine($var_array);
      $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
      $content=$this->load->view('master/discharge_summary',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
    private function fetch_data() 
    {
        $office_id=$this->session->office_id;
        $return=array(
        "discharge_summary"=>array(
            'patient_registration_id'=>trim($this->input->post('patient_registration_id')),
            'doctor_id'=>trim($this->input->post('doctor_id')),
            'discharge_date'=>trim($this->input->post('discharge_date')),
            'diagnosis'=>trim($this->input->post('diagnosis')),
            'surgical_procedure'=>trim($this->input->post('surgical_procedure')),
            'recovery'=>trim($this->input->post('recovery')),
            'conditionofthetime'=>trim($this->input->post('conditionofthetime')),
            'investigation'=>trim($this->input->post('investigation')),
            'pp'=>trim($this->input->post('pp')),
            'sugar'=>trim($this->input->post('sugar')),
            'dateofad'=>trim($this->input->post('dateofad')),
            'datesur'=>trim($this->input->post('datesur')),
            'tdate'=>trim($this->input->post('tdate')),
            'kreading'=>trim($this->input->post('kreading')),
            'iol'=>trim($this->input->post('iol')),
            'nextvisit_date'=>trim($this->input->post('nextvisit_date')),

            'pre1'=>trim($this->input->post('pre1')),
            'pre2'=>trim($this->input->post('pre2')),
            'pre3'=>trim($this->input->post('pre3')),
            'pre7'=>trim($this->input->post('pre7')),
            'pre8'=>trim($this->input->post('pre8')),
            'pre9'=>trim($this->input->post('pre9')),
            'pre_remarks'=>trim($this->input->post('pre_remarks')),
            

            'prod_eye'=>trim($this->input->post('prod_eye')),

            'content'=>trim($this->input->post('content')),
            'description'=>trim($this->input->post('description')),
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
        ),
        "discharge_summary_medicalhistory"=>array(
            'medical_history_id'=>$this->input->post('medical_history_id'),
            'remarks'=>$this->input->post('medihis_remrks'),
        ),
        "discharge_summary_medicine"=>array(
            'medicine_id'=>$this->input->post('medicine_id'),
            'instruction'=>$this->input->post('instruction'),
            'nodays'=>$this->input->post('days'),
            'sdate'=>$this->input->post('sdate'),
            'tdate'=>$this->input->post('etdate'),
            'qty'=>$this->input->post('qty'),
            'med_eye'=>$this->input->post('medeye'),
            'description'=>$this->input->post('descr')
           )
       );
       return $return;
    }

    public function savedata()
	{
		$this->form_validation->set_rules('patient_registration_id', 'Patient Registration ID', 'trim|required|numeric');
        $this->form_validation->set_rules('doctor_id', 'Doctor ID', 'trim|required|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    		$data=$this->fetch_data();
	    		$getresult=$this->Discharge_summary_model->savedata($data);
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
    public function deletedata()
	{
		$this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	    $delete_id=trim(htmlentities($this->input->post('getid')));
	    		$getresult=$this->Discharge_summary_model->deletedata($delete_id);
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
    public function Discharge_summaryprint()
   {
       $this->form_validation->set_rules('discharge_summary_id', 'ID', 'trim|required|min_length[1]|max_length[40]|numeric');
       if($this->form_validation->run() == TRUE)
       {
            $this->Discharge_summary_model->discharge_summaryprint($this->input->post('discharge_summary_id'),$this->session->userdata('office_id'));
       }
        else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
   public function geteditdata()
   {
       $this->form_validation->set_rules('getid', 'Discharge Summary ID', 'trim|required|numeric');
       if($this->form_validation->run() == TRUE)
       {
               
               $getresultmaster=$this->Discharge_summary_model->getmasterdata(trim($this->input->post('getid')));
               $getresultchild1=$this->Discharge_summary_model->getchild1(trim($this->input->post('getid')));
               $getresultchild2=$this->Discharge_summary_model->getchild2(trim($this->input->post('getid')));
               if($getresultmaster)
               {
                 echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>'','masterdata' => $getresultmaster));
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
   public function showhistorydata()
   {
       
            $key=trim(htmlentities($this->input->post('key')));
            $getdoctorprescription=$this->Discharge_summary_model->getchild2($key);
            $opth=$medd=$compprev='';
            if($getdoctorprescription)
            { 
               $docc='';
               if($getdoctorprescription)
               {
                $sl=0;
               
                foreach($getdoctorprescription as $data)
                 {
                    $sl++;
                    $be=$le=$re=$na='';
                    if($data['eye']=='BE')
                    {
                        $be='selected';
                    }
                    if($data['eye']=='LE')
                    {
                        $le='selected';
                    }
                    if($data['eye']=='RE')
                    {
                        $re='selected';
                    }
                    if($data['eye']=='N/A')
                    {
                        $na='selected';
                    }
                    $docc.='<tr><td>'.$data['name'].'</td>
                                <td>
                                 <input type="hidden" class="form-control" id="medicine_id_'.$sl.'" name="medicine_id[]" value="'.$data['medicine_id'].'">
                                 <input type="text" class="form-control" id="instruction_'.$sl.'" name="instruction[]" onkeyup="getlistdescription(this.value,'.$data['category_id'].','.$sl.')" value="'.$data['instruction'].'"><span id="search_result'.$sl.'"></span>
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="days_'.$sl.'" name="days[]" value="'.$data['noofdays'].'">
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="qty_'.$sl.'" name="qty[]" value="'.$data['qty'].'">
                                </td>
                                <td style="display:none;">
                                  <input type="date" class="form-control" id="sdate_'.$sl.'" name="sdate[]" value="">
                                </td>
                                <td style="display:none;"><input type="date" class="form-control" id="tdate_'.$sl.'" name="tdate[]" value=""></td>
                                <td>
                                <select class="form-control" name="medeye[]" id="medeye_'.$sl.'">
                                    <option value="BE" '.$be.'>BE</option>
                                    <option value="LE" '.$le.'>LE</option>
                                    <option value="RE" '.$re.'>RE</option>
                                    <option value="N/A" '.$na.'>N/A</option>
                                </select></td>
                                <td><textarea cols="5" rows="5" name="descr[]" id="descr_'.$sl.'" class="form-control" placeholder="Description">'.$data['description'].'</textarea></td>
                                <td>
                                    <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">
                                    <button class="btn btn-danger btnDelete btn-sm">
                                       <i class="la la-trash"></i>
                                    </button>
                                    </a>
                                </td>
                                </tr>';
                 }
               }

               echo json_encode(array('msg' =>'Saved Successfully','docmed'=>$docc,'error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));
            }
         
       
      
   }
   public function updatedata()
	{
		$this->form_validation->set_rules('discharge_summary_id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('discharge_summary_id')));
            $data=$this->fetch_data();
            $getresult=$this->Discharge_summary_model->updatedata($data,$edit_id);
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
