<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping_templates extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Mapping_templates_model');
        $this->load->model('Common_model');
      
    }
    public function ajax_call()
    {
        $param=$_REQUEST;
        $response=$this->Mapping_templates_model->ajax_call($param);
        echo json_encode($response);
    }
	public function index()
	{
      $data['title']='EMR::Mapping Templates';
      $data['activecls']='Mapping_templates';
      $var_array=array($this->session->userdata('office_id'));
      $data['getitem'] = $this->Common_model->getitemdata($var_array);
      $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
      $data['getmedins']=$this->Common_model->GetAllmedins($var_array);
      $content=$this->load->view('master/mapping_templates',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
   
 private function fetch_data() 
    {
        $status=trim($this->input->post('status'));
        if(!$this->input->post('status'))
        {
            $status=0;
        }
       
       $return=array(
				"mapping_master"=>array(
					'item_id'=>trim($this->input->post('item_id')),
					'medicine_templates_id'=>trim($this->input->post('medicine_templates_id')),
					'description'=>trim($this->input->post('description')),
					'status'=>$status,
					'cur_date'=>date('Y-m-d'),
					'cur_time'=>date('H:i:s'),
					'login_id'=>$this->session->userdata('login_id'),
					'office_id'=> $this->session->userdata('office_id')
               ),
                "mapping_child"=>array(
                   'medicine_instruction_id'=>$this->input->post('med_ins_id'),
                   'cur_date'=>date('Y-m-d'),
				   'cur_time'=>date('H:i:s')
               ),
             
           );
            return $return;
      }
    public function savedata()
	{
		$this->form_validation->set_rules('item_id', 'Name', 'trim|required|min_length[1]|max_length[30]|numeric');
		$this->form_validation->set_rules('medicine_templates_id', 'Medicine_templates ID', 'trim|required|min_length[1]|max_length[30]|numeric');
		$this->form_validation->set_rules('med_ins_id[]', 'Medicine Instruction Id', 'trim|required|min_length[1]|max_length[30]|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    		$data=$this->fetch_data();
	    		$getresult=$this->Mapping_templates_model->savedata($data);
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
	    	$getdata=$this->Mapping_templates_model->geteditdata($var_array);
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
	    			
	    			$var_array=array($this->session->userdata('office_id'));
			        $getitem = $this->Common_model->getitemdata($var_array);
			        $meditem='<select style="width:100%;" class="form-control select2" name="item_id" >';
			        if($getitem)
			        {
			        	foreach($getitem as $getdataitem)
			        	{
			        		$sel1='';
			        		if($getdataitem['medicine_id']==$data['item_id'])
			        		{
			        			$sel1='selected';
			        		}
			        		$meditem.='<option value="'.$getdataitem['medicine_id'].'" '.$sel1.'>'.$getdataitem['name'].'</option>';
			        	}
			        }
			      $meditem.='</select>';
			      $medtemplates=$this->Common_model->getallmedicinetemplates($var_array);
			      $meditemfn='<select style="width:100%;" class="form-control select2" name="medicine_templates_id" >';
			        if($medtemplates)
			        {
			        	foreach($medtemplates as $medtemp)
			        	{
			        		$sel11='';
			        		if($medtemp['medicine_templates_id']==$data['medicine_templates_id'])
			        		{
			        			$sel11='selected';
			        		}
			        		$meditemfn.='<option value="'.$medtemp['medicine_templates_id'].'" '.$sel11.'>'.$medtemp['name'].'</option>';
			        	}
			        }
			      $meditemfn.='</select>';
			      $getmedins=$this->Common_model->GetAllmedins($var_array);
	    		  $medinss='<select style="width:100%;" class="form-control select2" name="instruction_id" onchange="loadpreop_ins1($(this).val());">';
			        if($medtemplates)
			        {
			        	foreach($getmedins as $getmedinsd)
			        	{
			        		
			        		$medinss.='<option value="'.$getmedinsd['medicine_instruction_id'].'~'.$getmedinsd['name'].'~'.$getmedinsd['days'].'" >'.$getmedinsd['name'].'</option>';
			        	}
			        }
			      $medinss.='</select>';
			      $ttr='';
			      $getdata_child=$this->Mapping_templates_model->getchild_datta($this->input->post('getid'));
			      if($getdata_child)
			      {
			      	foreach($getdata_child as $datavv)
			      	{
			      		$ttr.='<tr><td><input type="hidden"  name="med_ins_id[]" value="'.$datavv['medicine_instruction_id'].'">'.$datavv['name'].'</td><td>'.$datavv['days'].'</td><td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
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
							                          <input type="hidden" name="id" id="id" value="'.$data['medicine_mapping_master_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                <div class="row form-group">
							                                	 <div class="col-md-6">
							                                	    <label>Item: <span class="text-danger">*</span></label>
							                                	    '.$meditem.'
							                                	  </div>
							                                	 <div class="col-md-6">
							                                	    <label for="lastname">Medicine Templates: <span class="text-danger">*</span></label>
							                                	    '.$meditemfn.'
							                                	      </div>
							                                </div>

							                                <div class="row form-group">
							                                	 <div class="col-md-4">
							                                	    <label>Select Instruction</label>
							                                	    '.$medinss.'
							                                	      </div>

							                                	      <div class="col-md-8">
								                                       <table class="table table-striped table-bordered table-hover" id="pro_ins_tab1">
								                                           <thead>
								                                               <tr>
								                                                   <th>Instruction</th>
								                                                   <th>No of Days</th>
								                                                   <th>Remove</th>
								                                               </tr>
								                                           </thead>
								                                           <tbody>
								                                               '.$ttr.'
								                                           </tbody>
								                                       </table>
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
		$this->form_validation->set_rules('item_id', 'Name', 'trim|required|min_length[1]|max_length[30]|numeric');
		$this->form_validation->set_rules('medicine_templates_id', 'Medicine_templates ID', 'trim|required|min_length[1]|max_length[30]|numeric');
		$this->form_validation->set_rules('med_ins_id[]', 'Medicine Instruction Id', 'trim|required|min_length[1]|max_length[30]|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('id')));
	    	
	    		$data=$this->fetch_data();
	    		$getresult=$this->Mapping_templates_model->updatedata($data,$edit_id);
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

	public function deletedata()
	{
		$this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$delete_id=trim(htmlentities($this->input->post('getid')));
	    	
	    		$getresult=$this->Mapping_templates_model->deletedata($delete_id);
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
