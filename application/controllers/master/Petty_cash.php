<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petty_cash extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Petty_cash_model');
      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Petty_cash_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Petty Cash';
      $data['activecls']='Petty_cash';
      $content=$this->load->view('master/petty_cash',$data,true);
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
            'pay_type'=>trim($this->input->post('pay_type')),
            'petty_receipt_no'=>trim($this->input->post('petty_receipt_no')),
            'petty_cash_name'=>trim($this->input->post('petty_cash_name')),
            'petty_amount'=>trim($this->input->post('petty_amount')),
			'auth_person'=>trim($this->input->post('auth_person')),
            'petty_date'=>trim($this->input->post('petty_date')),
            'description'=>trim($this->input->post('description')),
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
			'photo'=>$this->session->flashdata('profile_pic'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }
	public function file_check($parameter)
	{
		 
		  if(isset($_FILES['photo']['name']))
		  {
			 $str=$_FILES['photo']['name'];
			 if(isset($str) && $str!="")
			 {
				return $this->upload();
			 }
			 else
			 {
				 $this->form_validation->set_message('file_check', 'Please Choose File');
				 return false;
			 }
		  
		  }  
	 }
	 private function upload() 
	 {
		$curd=date('ymd');
		 $host_tvm = 'accounts'.$curd .date('h:i:s');
		 $config['upload_path']   = 'images/pettycash/'; 
		 $config['allowed_types'] = '*'; 
		// $config['max_size']      = 2000; 
		 $config['file_name']  = $host_tvm;
		 $this->load->library('upload');
		 $this->upload->initialize($config);
		 
		 if ( ! $this->upload->do_upload('photo'))
		   {
			 $this->form_validation->set_message('file_check', $this->upload->display_errors());
			 return false;
			}
		 else 
		 { 
			   $this->session->set_flashdata('profile_pic',$this->upload->data('file_name'));
			   return TRUE;
		  }
	}

    public function savedata()
	{
		$this->form_validation->set_rules('petty_cash_name', 'Name', 'trim|required|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('petty_receipt_no', 'Receipt No', 'trim|required|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('petty_amount', 'Amount', 'trim|required|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
		$this->form_validation->set_rules('photo','Attachment','callback_file_check');
	    if($this->form_validation->run() == TRUE)
	    {
	    	
	    		$data=$this->fetch_data();
	    		$getresult=$this->Petty_cash_model->savedata($data);
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

	public function editdata()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$getdata=$this->City_model->geteditdata($var_array);
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
							                          <input type="hidden" name="id" id="id" value="'.$data['petty_cash_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Name: <span class="text-danger">*</span></label>
							                                         <input type="text" name="name" id="name" class="form-control" value="'.$data['name'].'">
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
	    	$chk_duplication=$this->City_model->editcheck($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->City_model->updatedata($data,$edit_id);
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
	    	
	    		$getresult=$this->Petty_cash_model->deletedata($delete_id);
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

}
