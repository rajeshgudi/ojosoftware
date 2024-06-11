<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eye_mapping_segment extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Eye_mapping_segment_model');
        $this->load->model('Common_model');
      
    }
    public function ajax_call()
    {
        $param=$_REQUEST;
        $response=$this->Eye_mapping_segment_model->ajax_call($param);
        echo json_encode($response);
    }
	public function index()
	{
      $data['title']='EMR::Eye Mapping Segement';
      $data['activecls']='Eye_mapping_segment';
      $var_array=array($this->session->userdata('office_id'));
      $content=$this->load->view('master/eye_mapping_segment',$data,true);
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
            'segment_type_id'=>trim($this->input->post('segment_type_id')),
            'eye_segment_id'=>trim($this->input->post('segment_id')),
            'description'=>trim($this->input->post('description')),
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }

    public function savedata()
	{
		$this->form_validation->set_rules('segment_type_id', 'Segment Type ID', 'trim|required|min_length[1]|max_length[200]|numeric');
		$this->form_validation->set_rules('segment_id', 'Segment ID', 'trim|required|min_length[1]|max_length[200]|numeric');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[200]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$var_array=array($name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Eye_mapping_segment_model->checkingval($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Eye_mapping_segment_model->savedata($data);
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
	    	$getdata=$this->Eye_mapping_segment_model->geteditdata($var_array);
	    	if($getdata)
	    	{
	    		$html=$medc='';
	    		$medct=$con1=$con2=$con3='';
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

	    			if($data['segment_type_id']==1)
	    			{
	    				$con1='selected';
	    			}
	    			elseif ($data['segment_type_id']==2)
	    			{
	    				$con2='selected';
	    			}
	    			elseif ($data['segment_type_id']==3) 
	    			{
	    				$con3='selected';
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
							                          <input type="hidden" name="id" id="id" value="'.$data['eye_mapping_segment_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                  <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                          <label for="lastname">Segment Type: <span class="text-danger">*</span></label>
                                           							 <select class="form-control select2" id="segment_type_id" name="segment_type_id" onchange="getsegmentlist1(this.value)">
							                                               <option value="">Select Segment Type</option>
							                                               <option value="1" '.$con1.'>Anterior Segment</option>  
							                                               <option value="2" '.$con2.'>Posterior Segment</option>  
							                                               <option value="3" '.$con3.'>Non Segment</option>  
							                                           </select>
							                                    </div>
							                                </div>
							                                  <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                          <label for="lastname">Segment Type: <span class="text-danger">*</span></label>
                                           							 <select class="form-control select2" id="segment_idd" name="segment_id">
							                                               <option value="">Select Segment Name</option>
							                                            
							                                           </select>
							                                    </div>
							                                </div>
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
							echo json_encode(array('msg'=>$html,'segment_type_id'=>$data['segment_type_id'],'eye_segment_id'=>$data['eye_segment_id'],'error' =>'','error_message' =>''));
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
	public function getsegmentlist()
	{
		$this->form_validation->set_rules('segmenttypeid', 'Segment ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	
	    	$segmenttypeid=trim(htmlentities($this->input->post('segmenttypeid')));
	    	$var_array=array($segmenttypeid,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Eye_mapping_segment_model->getchksegment($var_array);
	    	$hd='<option value="">Select Segment Name List</option>';
	    	if($chk_duplication[0]['CNT']>0)
	    	{
	    		
	    		$getresult=$this->Eye_mapping_segment_model->getchksegmentall($var_array);
	    		if($getresult)
	    		{
	    			foreach($getresult as $data)
	    			{
	    				$hd.='<option value="'.$data['eye_segment_id'].'">'.$data['name'].'</option>';
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
	    		echo json_encode(array('msg'=>'','datas'=>$hd,'error' =>'No Data in this Segment','error_message' =>''));
	    	}
	    }
	    else
	    {
	    echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));
	    }
	}
	public function getsegmentlist1()
	{
		$this->form_validation->set_rules('segmenttypeid', 'Segment ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		//$this->form_validation->set_rules('segmentid', 'Segment ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	
	    	$segmenttypeid=trim(htmlentities($this->input->post('segmenttypeid')));
	    	$segmentid=trim(htmlentities($this->input->post('segmentid')));
	    	$var_array=array($segmenttypeid,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Eye_mapping_segment_model->getchksegment($var_array);
	    	$hd='<option value="">Select Segment Name List</option>';
	    	if($chk_duplication[0]['CNT']>0)
	    	{
	    		
	    		$getresult=$this->Eye_mapping_segment_model->getchksegmentall($var_array);
	    		if($getresult)
	    		{
	    			foreach($getresult as $data)
	    			{
	    				$sel='';
	    				if($segmentid==$data['eye_segment_id'])
	    				{
	    					$sel='selected';
	    				}
	    				$hd.='<option value="'.$data['eye_segment_id'].'" '.$sel.'>'.$data['name'].'</option>';
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
	    		echo json_encode(array('msg'=>'','datas'=>$hd,'error' =>'No Data in this Segment','error_message' =>''));
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
	    	$chk_duplication=$this->Eye_mapping_segment_model->editcheck($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Eye_mapping_segment_model->updatedata($data,$edit_id);
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
	    	$chk_duplication=$this->Eye_mapping_segment_model->deletecheck($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Eye_mapping_segment_model->deletedata($delete_id);
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
