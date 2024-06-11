<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_title extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Patient_title_model');
      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Patient_title_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Patient Title';
      $data['activecls']='Patient_title';
      $content=$this->load->view('master/patient_title',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
    private function fetch_data($name,$gender,$description,$status) 
    {
        if(!$status)
        {
            $status=0;
        }
        $office_id=$this->session->office_id;
        return array(
            'name'=>$name,
            'gender'=>$gender,
            'description'=>$description,
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }

    public function savepatienttitle()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
    	$this->form_validation->set_rules('gender', 'Gender', 'trim|required|min_length[1]|max_length[1]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$description=trim(htmlentities($this->input->post('description')));
	    	$gender=trim(htmlentities($this->input->post('gender')));
	    	$status=trim(htmlentities($this->input->post('status')));
	    	$var_array=array($name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Patient_title_model->checkpatient_title($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data($name,$gender,$description,$status);
	    		$getresult=$this->Patient_title_model->savedata($data);
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
	              echo json_encode(array('msg'=>'','error' =>'Name already Used','error_message' =>''));
	    	}
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function editpatienttitle()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$getdata=$this->Patient_title_model->geteditdata($var_array);
	    	if($getdata)
	    	{
	    		$html='';
	    		foreach($getdata as $data)
	    		{
	    			$sel1='';
	    			$sel2='';
	    			if($data['status']==1)
	    			{
	    				$sel1='selected';
	    			}
	    			if($data['status']==0)
	    			{
	    				$sel2='selected';
	    			}
	    			$gen1=$gen2=$gen3='';
	    			if($data['gender']==1){  $gen1="selected";}
	    			if($data['gender']==2){  $gen2="selected";}
	    			if($data['gender']==3){  $gen3="selected";}
	    			$html='<form id="edit_form" action="#" method="post"> 
							 <div id="div_modal" class="modal fade" role="dialog">
							        <div class="modal-dialog modal-sm">
							        <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"></h4>
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                </div>
							                <div class="modal-body">
							                    <div class="row">
							                        <div class="col-lg-12 col-md-12" >
							                          <input type="hidden" name="edit_id" id="edit_id" value="'.$data['patient_title_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name1" value="'.$this->security->get_csrf_hash().'"> 
							                                  <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Name: <span class="text-danger">*</span></label>
							                                         <input type="text" name="edit_name" id="edit_name" class="form-control" value="'.$data['name'].'">
							                                    </div>
							                                </div>
							                                <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Gender: <span class="text-danger">*</span></label>
							                                        <select class="form-control" name="edit_gender" id="edit_gender">
							                                        <option value="">Select Gender</option>
							                                        <option value="1" '.$gen1.'>Male</option>
							                                        <option value="2" '.$gen2.'>Female</option>
							                                        <option value="3" '.$gen3.'>Transgender</option>
							                                        </select>
							                                    </div>
							                                </div>
							                                  <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Description: </label>
							                                         <textarea class="form-control" name="edit_description" id="edit_description">'.$data['description'].'</textarea>
							                                    </div>
							                                </div>
							                                 <div class="row col-md-12">
							                                     <div class="col-md-12 form-group">
							                                         <label for="lastname">Status: </label>
							                                        <select class="form-control" name="edit_status" id="edit_status">
							                                            <option value="1" '.$sel1.'>Active</option>
							                                            <option value="0" '.$sel2.'>De-Active</option>
							                                        </select>
							                                        </div>
							                                </div>
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		<button id="save" class="btn btn-primary btn-sm" type="button" onclick="updatedataval();"><i class="fas fa-plus-square"></i>Update</button>
			<button type="button" id="mclose" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
							                </div>
							            </div>
							        </div>
							    </div>
							</form>';
							echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function updatedata()
	{
		$this->form_validation->set_rules('edit_id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		$this->form_validation->set_rules('edit_name', 'Name', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('edit_gender', 'Gender', 'trim|required|min_length[1]|max_length[30]|numeric');
    	$this->form_validation->set_rules('edit_description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('edit_id')));
	    	$name=trim(htmlentities($this->input->post('edit_name')));
	    	$gender=trim(htmlentities($this->input->post('edit_gender')));
	    	$description=trim(htmlentities($this->input->post('edit_description')));
	    	$status=trim(htmlentities($this->input->post('edit_status')));
	    	$var_array=array($edit_id,$name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Patient_title_model->editcheckpatient_title($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data($name,$gender,$description,$status);
	    		$getresult=$this->Patient_title_model->updatedata($data,$edit_id);
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
	    		echo json_encode(array('msg'=>'','error' =>'Name already Used','error_message' =>''));
	    	}
	    }
	    else
	    {
	    echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));
	    }
	}

	public function deletedata()
	{
		$this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$delete_id=trim(htmlentities($this->input->post('getid')));
	    	$var_array=array($delete_id,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Patient_title_model->deletecheckpatient_title($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Patient_title_model->deletedata($delete_id);
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
	            echo json_encode(array('msg'=> '', 'error'=> 'Delete ID Not Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	      echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
	    }
	}

}
