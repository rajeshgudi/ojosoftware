<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createuser extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Createuser_model');
		$this->load->model('Common_model');
      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Createuser_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Createuser';
      $data['activecls']='Createuser';
	  $var_array=array($this->session->userdata('office_id'));
	  $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('master/createuser',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
    private function fetch_data() 
    {
    	$status=trim($this->input->post('status'));
        if(!$this->input->post('status'))
        {
            $status=0;
        }
		$doctor_id='';
		if(trim($this->input->post('role'))==2)
		{
			$doctor_id=trim($this->input->post('doctor_id'));
		}
		
        $office_id=$this->session->office_id;
        return array(
            'user_type'=>trim($this->input->post('role')),
            'name'=>trim($this->input->post('username')),
            'password'=>trim($this->input->post('password')),
            'description'=>trim($this->input->post('description')),
			'doctor_id'=>$doctor_id,
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }

    public function savedata()
	{
		$this->form_validation->set_rules('role', 'Role', 'trim|required|min_length[1]|max_length[2]|numeric');
		$this->form_validation->set_rules('username', 'Usernmae', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[30]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$username=trim(htmlentities($this->input->post('username')));
	    	$password=trim(htmlentities($this->input->post('password')));
	    	$var_array=array($username,$password,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Createuser_model->checkingval($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Createuser_model->savedata($data);
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
	              echo json_encode(array('msg'=>'','error' =>'Username and Password already Used','error_message' =>''));
	    	}
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function editdata()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$getdata=$this->Createuser_model->geteditdata($var_array);
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
					$showdoc='style="display:none;';
	    			$role2=$role3=$role4=$role5=$role6=$role7='';
	    			if($data['user_type']==2) {$role2='selected'; $showdoc='style="display:block;"';}
	    			if($data['user_type']==3) {$role3='selected';}
	    			if($data['user_type']==4) {$role4='selected';}
	    			if($data['user_type']==5) {$role5='selected';}
	    			if($data['user_type']==6) {$role6='selected';}
	    			if($data['user_type']==7) {$role7='selected';}
	    			
					$doc='';
					$var_array=array($this->session->userdata('office_id'));
					$getdoctors=$this->Common_model->getdoctors($var_array);
					if($getdoctors)
					{
						foreach ($getdoctors as $datadoc) {
							$selv='';
							if($data['user_type']==2)
							{
								if($datadoc['doctors_registration_id']==$data['doctor_id'])
								{
									$selv='selected';
								}
							}
							$doc.='<option value="'.$datadoc['doctors_registration_id'].'" '.$selv.'>'.$datadoc['name'].'</option>';
						}
						
					}
	    			
	    			$html='<form id="edit_form" action="#" method="post"> 
							 <div id="div_modal" class="modal fade" role="dialog">
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
							                          <input type="hidden" name="id" id="id" value="'.$data['user_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-4 form-group">
							                                         <label for="lastname">Role: <span class="text-danger">*</span></label>
							                                          <select class="form-control" name="role" id="role" onchange="getchangeedit()">
							                                                <option value="" >Select Role</option>
							                                                <option value="2" '.$role2.'>Consultant</option>
							                                                <option value="3" '.$role3.'>Optometrist</option>
							                                                <option value="4" '.$role4.'>Reception</option>
							                                                <option value="5" '.$role5.'>IPD</option>
							                                                <option value="6" '.$role6.'>Counselor</option>
							                                                <option value="7" '.$role7.'>Branch Manager</option>
							                                            </select>
							                                    </div>
							                                    <div class="col-md-4 form-group">
							                                         <label for="lastname">Username: <span class="text-danger">*</span></label>
							                                         <input type="text" name="username" id="username" class="form-control" value="'.$data['name'].'">
							                                    </div>
							                                    <div class="col-md-4 form-group">
							                                         <label for="lastname">Password: <span class="text-danger">*</span></label>
							                                         <input type="password" name="password" id="password" class="form-control" value="'.$data['password'].'">
							                                    </div>
							                                </div>
														
															<div class=" col-md-12 form-group" id="editt_doc" '.$showdoc.'>
																 
																	   <label for="lastname">Select Doctor: <span class="text-danger">*</span></label>
																	   <select class="form-control select2" name="doctor_id" id="doctor_id">
																		   <option value="">Select Doctor</option>
																			'.$doc.'
																	   </select>
																  
																</div>
													  
							                                 
							                                
							                                  <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Description: </label>
							                                         <textarea class="form-control" name="description" id="description">'.$data['description'].'</textarea>
							                                    </div>
							                                </div>
							                                 <div class="row col-md-12">
							                                     <div class="col-md-12 form-group">
							                                         <label for="lastname">Status: </label>
							                                        <select class="form-control" name="status" id="status">
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
		$this->form_validation->set_rules('id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		$this->form_validation->set_rules('role', 'Role', 'trim|required|min_length[1]|max_length[1]|numeric');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[30]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('id')));
	    	$role=trim(htmlentities($this->input->post('role')));
	    	$username=trim(htmlentities($this->input->post('username')));
	    	$password=trim(htmlentities($this->input->post('password')));
	    	$description=trim(htmlentities($this->input->post('description')));
	    	$status=trim(htmlentities($this->input->post('status')));
	    	$var_array=array($edit_id,$username,$password,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Createuser_model->editcheck($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Createuser_model->updatedata($data,$edit_id);
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
	    		echo json_encode(array('msg'=>'','error' =>'Username password already Used','error_message' =>''));
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
	    	$chk_duplication=$this->Createuser_model->deletecheck($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Createuser_model->deletedata($delete_id);
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
