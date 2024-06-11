<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refraction extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Refraction_model');
        $this->load->model('Common_model');
      
    }
    public function ajax_call1(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call1($param);
        echo json_encode($response);
 }
  public function ajax_call2(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call2($param);
        echo json_encode($response);
 }

  public function ajax_call3(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call3($param);
        echo json_encode($response);
 }
 public function ajax_call4(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call4($param);
        echo json_encode($response);
 }

  public function ajax_call5(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call5($param);
        echo json_encode($response);
 }

   public function ajax_call6(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call6($param);
        echo json_encode($response);
 }
  public function ajax_call7(){
        $param=$_REQUEST;
        $response=$this->Refraction_model->ajax_call7($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Refraction';
      $data['activecls']='Refraction';
      $office_id=$this->session->office_id;
      $refraction_type=1;
      $ref_type=1;
      $var_array=array($office_id,$refraction_type,$ref_type);
      $data['refractionleftucdva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();

      $data['refractionrightucdva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();
		$ref_type=2;
       $data['refractionleftucnva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightucnva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();
		$ref_type=0;
		$refraction_type=2;
       $data['refractionleftpinhole']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightpinhole']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();

        $ref_type=3;
		$refraction_type=3;
       $data['refractionleftbcdva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightbcdva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();
$ref_type=4;
       $data['refractionleftbcnva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightbcnva']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();

      	$ref_type=0;
		$refraction_type=4;
       $data['refractionleftsphere']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightsphere']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();

      	$ref_type=0;
		$refraction_type=5;
       $data['refractionleftcylinder']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightcylinder']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();

      $ref_type=0;
		$refraction_type=6;
       $data['refractionleftaxis']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=1")->result();
      
      $data['refractionrightaxis']=$this->db->query("select refraction_master_id,name from refraction_master where  office_id= $office_id and refraction_type=$refraction_type and ref_type = $ref_type and status=1 and eye_type=2")->result();

      $content=$this->load->view('master/refraction',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
    private function fetch_data() 
    {
	    $status=trim(htmlentities($this->input->post('status')));
        if(!$status)
        {
            $status=0;
        }
        $office_id=$this->session->office_id;
    	if($this->input->post('refraction_type')==1 || $this->input->post('refraction_type')==3 || $this->input->post('refraction_type')==7)
    	{
	        return array(
	            'name'=>trim(htmlentities($this->input->post('name'))),
	            'eye_type'=>trim(htmlentities($this->input->post('eye_type'))),
	            'ref_type'=>trim(htmlentities($this->input->post('vis_type'))),
	            'description'=>trim(htmlentities($this->input->post('description'))),
	            'refraction_type '=>$this->input->post('refraction_type'),
	            'status'=>$status,
	            'action'=>trim(htmlentities($this->input->post('action'))),
	            'parent_id'=>$this->session->userdata('parent_id'),
	            'login_id'=>$this->session->userdata('login_id'),
	            'office_id'=> $this->session->userdata('office_id')
	           );
       }
       else if($this->input->post('refraction_type')==2 || $this->input->post('refraction_type')==4 || $this->input->post('refraction_type')==5 || $this->input->post('refraction_type')==6)
       {
	        return array(
	            'name'=>trim(htmlentities($this->input->post('name'))),
	            'eye_type'=>trim(htmlentities($this->input->post('eye_type'))),
	            'ref_type'=>0,
	            'description'=>trim(htmlentities($this->input->post('description'))),
	            'status'=>$status,
	            'action'=>trim(htmlentities($this->input->post('action'))),
	            'refraction_type '=>$this->input->post('refraction_type'),
	            'parent_id'=>$this->session->userdata('parent_id'),
	            'login_id'=>$this->session->userdata('login_id'),
	            'office_id'=> $this->session->userdata('office_id')
	           );
       }
    }

    public function savedata()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('eye_type', 'Eye Type', 'trim|required|min_length[1]|max_length[30]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$eye_type=trim(htmlentities($this->input->post('eye_type')));
	    	
	    	if($this->input->post('refraction_type')==1 || $this->input->post('refraction_type')==3 || $this->input->post('refraction_type')==7)
    		{
    			$vis_type=trim(htmlentities($this->input->post('vis_type')));
    		}
    		else if($this->input->post('refraction_type')==2 || $this->input->post('refraction_type')==4 || $this->input->post('refraction_type')==5 || $this->input->post('refraction_type')==6)
       		{
       			$vis_type=0;
       		}
	    	$var_array=array($name,$eye_type,$vis_type,$this->input->post('refraction_type'),$this->session->userdata('office_id'));
	    	// $chk_duplication=$this->Refraction_model->checkcheckval($var_array);
	    	// if($chk_duplication[0]['cnt']==0)
	    	// {
	    		$data=$this->fetch_data();
	    		$getresult=$this->Refraction_model->savedata($data);
	    		if($getresult)
	    		{
			      echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
	    		}
	    	// }
	    	// else
	    	// {
	     //          echo json_encode(array('msg'=>'','error' =>'Name already Used','error_message' =>''));
	    	// }
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function editrefraction()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		$this->form_validation->set_rules('refraction_type', 'Refraction Type', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->input->post('refraction_type'),$this->session->userdata('office_id'));
	    	$getdata=$this->Refraction_model->geteditdata($var_array);
	    	if($getdata)
	    	{
	    		$html='';
	    		foreach($getdata as $data)
	    		{
	    			$sel1='';
	    			$sel2='';
	    			$v1='';
	    			$v2='';
	    			$v3='';
	    			$v4='';
	    			if($data['status']==1)
	    			{
	    				$sel1='selected';
	    			}
	    			if($data['status']==0)
	    			{
	    				$sel2='selected';
	    			}
	    			$gen1=$gen2=$v11=$v22='';

	    			if($data['eye_type']==1){  $gen1="selected";}
	    			if($data['eye_type']==2){  $gen2="selected";}

	    			if($data['ref_type']==1){  $v1="selected";}
	    			if($data['ref_type']==2){  $v2="selected";}
	    			$opt='<option value="1" '.$v1.'>UCDVA</option><option value="2" '.$v2.'>UCNVA</option>';

	    			if($this->input->post('refraction_type')==3)
	    			{
	    				if($data['ref_type']==3){  $v1="selected";}
	    			    if($data['ref_type']==4){  $v2="selected";}
	    			    $opt='<option value="3" '.$v1.'>BCDVA</option><option value="4" '.$v2.'>BCNVA</option>';
	    			}

	    			if($this->input->post('refraction_type')==7)
	    			{
	    				if($data['ref_type']==5){  $v1="selected";}
	    			    if($data['ref_type']==6){  $v2="selected";}
	    			    if($data['ref_type']==7){  $v3="selected";}
	    			    if($data['ref_type']==8){  $v4="selected";}
	    			    $opt='<option value="5" '.$v1.'>Sphere</option><option value="6" '.$v2.'>Cylinder</option><option value="7" '.$v3.'>Axis</option><option value="8" '.$v4.'>V/A</option>';
	    			}
	    			if($this->input->post('refraction_type')==1 || $this->input->post('refraction_type')==3 || $this->input->post('refraction_type')==7)
	    			{
	    				$sty='';
	    			}
	    			elseif ($this->input->post('refraction_type')==2 || $this->input->post('refraction_type')==4 || $this->input->post('refraction_type')==5 || $this->input->post('refraction_type')==6) 
	    			{
	    				$sty='style="display:none;"';
	    			}
	    			$styt='style="display:none;"';
	    			
	   if ($this->input->post('refraction_type')==4 || $this->input->post('refraction_type')==5 || $this->input->post('refraction_type')==7){
				$styt='';
				if($data['action']==1){  $v11="selected";}
			    if($data['action']==2){  $v22="selected";}
	    	}
	    	if($data['ref_type']==7 || $data['ref_type']==8)
	    	{
	    		$styt='style="display:none;"';
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
					    <input type="hidden" name="refraction_type" id="edit_refraction_type" value="'.$this->input->post('refraction_type').'">
					    <input type="hidden" name="edit_id" id="edit_id" value="'.$data['refraction_master_id'].'">
					    <input type="hidden" name="csrf_test_name" id="csrf_test_name1" value="'.$this->security->get_csrf_hash().'"> 
							                                  <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Name: <span class="text-danger">*</span></label>
							                                         <input type="text" name="name" id="name" class="form-control" value="'.$data['name'].'">
							                                    </div>
							                                </div>
							                               
							                                <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Eye: <span class="text-danger">*</span></label>
						                                            <select class="form-control" name="eye_type" id="edit_eye_type">
						                                                <option value="">Select EYE</option>
						                                                <option value="1" '.$gen1.'>Left</option>
						                                                <option value="2" '.$gen2.'>Right</option>
						                                            </select>
							                                    </div>
							                                </div>
							                                 <div class="row col-md-12" '.$sty.'>
							                                    <div class="col-md-12 form-group">
							                                          <label for="lastname">Vision Type: <span class="text-danger">*</span></label>
							                                            <select class="form-control" name="vis_type" id="edit_vis_type" onchange="changeviss(this.value);">
							                                                <option value="">Select Vision Type</option>
							                                                '.$opt.'
							                                            </select>
							                                    </div>
							                                </div>
							                                 <div class="row col-md-12" '.$styt.' id="editt_action">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Action: <span class="text-danger">*</span></label>
						                                            <select class="form-control" name="action" id="edit_action">
						                                                <option value="">Select Action</option>
						                                                <option value="1" '.$v11.'>-</option>
						                                                <option value="2" '.$v22.'>+</option>
						                                            </select>
							                                    </div>
							                                </div>
							                                  <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Description: </label>
							                                         <textarea class="form-control" name="description" id="edit_description">'.$data['description'].'</textarea>
							                                    </div>
							                                </div>
							                                 <div class="row col-md-12">
							                                     <div class="col-md-12 form-group">
							                                         <label for="lastname">Status: </label>
							                                        <select class="form-control" name="status" id="edit_status">
							                                            <option value="1" '.$sel1.'>Active</option>
							                                            <option value="0" '.$sel2.'>De-Active</option>
							                                        </select>
							                                        </div>
							                                </div>
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		<button id="save" class="btn btn-primary btn-sm" type="button" onclick="updatedataval('.$this->input->post('refraction_type').');"><i class="fas fa-plus-square"></i>Update</button>
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
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('eye_type', 'Eye Type', 'trim|required|min_length[1]|max_length[30]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('edit_id')));
	    	$name=trim(htmlentities($this->input->post('name')));
	    	if($this->input->post('refraction_type')==1 || $this->input->post('refraction_type')==3 || $this->input->post('refraction_type')==7)
    		{
    			$vis_type=trim(htmlentities($this->input->post('vis_type')));
    		}
    		else if($this->input->post('refraction_type')==2 || $this->input->post('refraction_type')==4 || $this->input->post('refraction_type')==5 || $this->input->post('refraction_type')==6)
       		{
       			$vis_type=0;
       		}
	    	$var_array=array($edit_id,$name,$this->input->post('eye_type'),$vis_type,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Refraction_model->editcheckrefraction_master($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Refraction_model->updatedata($data,$edit_id);
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
	    	$chk_duplication=$this->Refraction_model->deletecheckrefraction_master($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Refraction_model->deletedata($delete_id);
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
