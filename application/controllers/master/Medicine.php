<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Medicine_model');
        $this->load->model('Common_model');
      
    }
    public function ajax_call()
    {
        $param=$_REQUEST;
        $response=$this->Medicine_model->ajax_call($param);
        echo json_encode($response);
    }
	public function index()
	{
      $data['title']='EMR::Medicine';
      $data['activecls']='Medicine';
      $var_array=array($this->session->userdata('office_id'));
      $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
      $data['category']=$this->Common_model->getmedcategory($var_array);
      $content=$this->load->view('master/medicine',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
    private function fetch_data() 
    {
    	$status=trim($this->input->post('status'));
        if(!$this->input->post('status'))
        {
            $status=0;
        }
        $office_id=$this->session->office_id;
        return array(
            'name'=>trim($this->input->post('name')),
            'category_id'=>trim($this->input->post('medicine_category_id')),
            'medicine_instruction_id'=>trim($this->input->post('medicine_instruction_id')),
            'medicine_templates_id'=>trim($this->input->post('medicine_templates_id')),
            'description'=>trim($this->input->post('description')),
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }

    public function savedata()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[200]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$var_array=array($name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Medicine_model->checkingval($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Medicine_model->savedata($data);
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

	public function editdata()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$vasr_array=array($this->session->userdata('office_id'));
	    	$getdata=$this->Medicine_model->geteditdata($var_array);
	    	if($getdata)
	    	{
	    		$html=$medc='';
	    		$medct='';
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
	    			$cate=$this->Common_model->getmedcategory($vasr_array);
	    			if($cate)
	    			{
	    				foreach($cate as $datva)
	    				{
	    					$sel='';
	    					if($datva['medicine_category_id']==$data['category_id'])
	    					{
	    						$sel='selected';
	    					}
	    					$medc.='<option value="'.$datva['medicine_category_id'].'" '.$sel.'>'.$datva['name'].'</option>';
	    				}
	    			}

	    			$temp=$this->Common_model->getallmedicinetemplates($vasr_array);
	    			if($temp)
	    			{
	    				foreach($temp as $datva)
	    				{
	    					$sel1='';
	    					if($datva['medicine_templates_id']==$data['medicine_templates_id'])
	    					{
	    						$sel1='selected';
	    					}
	    					$medct.='<option value="'.$datva['medicine_templates_id'].'" '.$sel1.'>'.$datva['name'].'</option>';
	    				}
	    			}
	    			
	    			
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
							                          <input type="hidden" name="id" id="id" value="'.$data['medicine_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Name: <span class="text-danger">*</span></label>
							                                         <input type="text" name="name" id="name" class="form-control" value="'.$data['name'].'">
							                                    </div>
							                                </div>
							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                          <label for="lastname">Category: <span class="text-danger">*</span></label>
                                           							<select class="form-control select2" id="medicine_category_id" name="medicine_category_id" onchange="getinstruction(this.value,sel=1)">
                                           							<option>Select Medicine Category</option>
                                           							    '.$medc.'
                                           							</select>
							                                    </div>
							                                </div>
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                          <label for="lastname">Instruction (No Of Days): <span class="text-danger">*</span></label>
                                           							 <select class="form-control select2" name="medicine_instruction_id" id="medicine_instruction_idd" >
							                                                <option value="">Select Medical Instruction</option>
							                                           </select>
							                                    </div>
							                                </div>
							                                   <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                          <label for="lastname">Medicine Templates: <span class="text-danger">*</span></label>
                                           							<select class="form-control select2" id="medicine_templates_id" name="medicine_templates_id">
                                           							<option>Select Medicine Templates</option>
                                           							    '.$medct.'
                                           							</select>
							                                    </div>
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
							echo json_encode(array('msg'=>$html,'medicine_category_id'=>$data['category_id'],'medicine_instruction_id'=>$data['medicine_instruction_id'],'error' =>'','error_message' =>''));
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
	public function getinstruction()
	{
		$this->form_validation->set_rules('medicine_category_id', 'Category ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$hd='<option value="">Select Medicine Instruction</option>';
	    	$medicine_category_id=trim(htmlentities($this->input->post('medicine_category_id')));
	    	$ins=trim(htmlentities($this->input->post('ins')));
	    	$var_array=array($medicine_category_id,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Common_model->getinstructioncommon($var_array);
	    	$hd='<option value="">Select Medicine Instruction</option>';
	    	if($chk_duplication)
	    	{
	    		
	    		$getresult=$this->Common_model->getinstructioncommon($var_array);
	    		if($getresult)
	    		{
	    			
	    			foreach($getresult as $data)
	    			{
	    				$sel='';
	    				if($ins>0)
	    				{
	    					if($data['medicine_instruction_id']==$ins)
	    					{
	    						$sel='selected';
	    					}
	    				}
	    				$hd.='<option value="'.$data['medicine_instruction_id'].'" '.$sel.'>'.$data['name'].' ('.$data['days'].')</option>';
	    			}
		    		echo json_encode(array('msg'=>'Updated Successfully','datas'=>$hd,'error' =>'','error_message' =>''));
	    		}
	    		else
	    		{
	    			echo json_encode(array('msg'=>'','datas'=>$hd,'error' =>'Failed to find data','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'','datas'=>$hd,'error' =>'No Data in this category','error_message' =>''));
	    	}
	    }
	    else
	    {
	    echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));
	    }
	}

	public function updatedata()
	{
		$this->form_validation->set_rules('id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[200]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('id')));
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$charge_id=trim(htmlentities($this->input->post('charge_id')));
	    	$description=trim(htmlentities($this->input->post('description')));
	    	$status=trim(htmlentities($this->input->post('status')));
	    	$var_array=array($edit_id,$name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Medicine_model->editcheck($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Medicine_model->updatedata($data,$edit_id);
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
	    	$chk_duplication=$this->Medicine_model->deletecheck($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Medicine_model->deletedata($delete_id);
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
