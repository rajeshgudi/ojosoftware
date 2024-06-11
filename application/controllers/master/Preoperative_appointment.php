<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preoperative_appointment extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Preoperative_appointment_model');
        $this->load->model('Common_model');
        $this->load->model('Counseling_viewmodel');
      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Preoperative_appointment_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Preoperative_appointment';
      $data['activecls']='Preoperative_appointment';
      $var_array=array($this->session->userdata('office_id'));
      $data['mrdnos']=$this->Common_model->getpateintmrdnos($var_array);
      $data['departments']=$this->Common_model->getdepartment($var_array);
      $data['insurancecompanys']=$this->Common_model->getinsurance_company($var_array);
      $var_arraysf=array(2,$this->session->userdata('office_id'));
      $data['surgeon']=$this->Common_model->getdoctorval($var_arraysf);
      $var_arraysf=array(3,$this->session->userdata('office_id'));
      $data['anthes']=$this->Common_model->getdoctorval($var_arraysf);
      $content=$this->load->view('master/preappointment',$data,true);
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
            'amount'=>trim($this->input->post('amount')),
            'description'=>trim($this->input->post('description')),
            'department_id'=>trim($this->input->post('department_id')),
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }

    public function getallapp()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	    $chargeid=$this->input->post('getid');
	    		if($this->input->post('getid')==2)
	    		{
	    			$idname='sur';
	    			$opname='Surgery';
	    			$clsname="style='display:black;'";
	    		}
	    		elseif($this->input->post('getid')==3)
	    		{
	    			$idname='las';
	    			$opname='las';
	    			$clsname="style='display:mone;'";
	    		}
	    		elseif($this->input->post('getid')==4)
	    		{
	    			$idname='inj';
	    			$opname='inj';
	    			$clsname="style='display:mone;'";
	    		}
	    		$datt=$this->input->post($idname.'_date');
	    	$var_array=array($this->input->post('getid'),$this->input->post('ser_date'),$this->session->userdata('office_id'));
	    	$getdata=$this->Counseling_viewmodel->getallappmodel($var_array);
	    	if($getdata)
	    	{
	    		
	    		 $html='<div class="table-responsive"><table id="app_datatable" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>MRD NO</th>
                                    <th>Gender/Age</th>
                                    <th>Mobile No</th>
                                    <th>Type Of '.$opname.'</th>
                                    <th>Particulars</th>
                                    <th>EYE</th>
                                    <th>A Date</th>
                                    <th '.$clsname.'>Operating surgeon</th>
                                    <th>Anesthesia Name</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead><tbody>';
            	$sl=1;
            	$opnn=$anthesia='';
	    		foreach ($getdata as $data) 
	    		{
	    			if($data['gender']==1)
	    			{
	    				$gen='Male';
	    			}
	    			elseif ($data['gender']==2) {
	    				$gen='Female';
	    			}
	    			else
	    			{
	    				$gen='Transgender';
	    			}
	    			if($data['operating_surgon'])
	    			{
		    			 $sqll = "select doctors_registration.name as doctorname from doctors_registration where doctors_registration_id=".$data['operating_surgon'];
					            $result_row=$this->db->query($sqll); 
					            $res= $result_row->result_array ();
					            if($res)
					            {
					            	$opsurname=$res[0]['doctorname'];
					            }
					            else
					            {
					            	$opsurname='';
					            }
				    }
					    if($data['typeof_anthesia'])
					    {
				             $sqll = "select doctors_registration.name as doctorname from doctors_registration where doctors_registration_id=".$data['typeof_anthesia'];
				            $result_row=$this->db->query($sqll); 
				            $res= $result_row->result_array ();
				            if($res)
				            {
				            	$anthesia=$res[0]['doctorname'];
				            }
				            else
				            {
				            	$anthesia='';
				            }
				        }
				        
				            if($this->input->post('getid')==2)
				            {
				            	if($data['typeof_anthesia'])
				            	{
					            	$sqll = "select name  from doctors_registration where doctors_registration_id=".$data['operating_surgon'];
					            	$result_row=$this->db->query($sqll); 
						            $res= $result_row->result_array ();
						            if($res)
						            {
						            	$opnn=$res[0]['name'];
						            }
						            else
						            {
						            	$opnn='';
						            }
					            }
				            }
				$getparti=$this->Counseling_viewmodel->getdatasurgerymdl($data['typeof_surgery_id'],$this->input->post('getid'),$data['particular_type'],$this->session->userdata('office_id'));
				 
                  if($getparti)
                  {
	                  $parname=$getparti[0]['name'];
	                  $amt=$getparti[0]['amount'];
	              }
	              else
	              {
	              	$parname='';
	              	$amt='';
	              }
	              if($data['eye']==1)
	              {
	              	$eyee='Left';
	              }
	              elseif($data['eye']==2)
	              {
	              	$eyee='Right';
	              }
	              elseif($data['eye']==3)
	              {
	              	$eyee='Both';
	              }

	    			$html.='<tr>
	    						<td>'.$sl.'</td>
	    						<td>'.$data['pateint_name'].'</td>
	    						<td>'.$data['mrdno'].'</td>
	    						<td>'.$gen.' /'.$data['ageyy'].'</td>
	    						<td>'.$data['mobileno'].'</td>
	    						<td>'.$data['opname'].'</td>
	    						<td>'.$parname.' - '.$amt.'</td>
	    						<td>'.$eyee.'</td>
	    						<td>'.$data['admission_date'].'</td>
	    						<td '.$clsname.'>'.$opnn.'</td>
	    						<td>'.$anthesia.'</td>
	    						<td><button type="button" class="btn btn-danger" onclick="deletedata('.$data['preoperative_appointment_id'].')"><i class="la ft-trash"></i></button></td>
	    			        </tr>';
	    			        $sl++;
	    		}
	    		$html.='</tbody></table></div>';
	    		echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'No Data Found','error' =>'','error_message' =>''));
	    	}
	    	
			
	    		
	    	
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

    public function savedata()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[1]|max_length[30]|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$description=trim(htmlentities($this->input->post('description')));
	    	$status=trim(htmlentities($this->input->post('status')));
	    	$var_array=array($name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Preoperative_appointment_model->checkingval($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Preoperative_appointment_model->savedata($data);
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
	    	$getdata=$this->Preoperative_appointment_model->geteditdata($var_array);
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
      				$departments=$this->Common_model->getdepartment($var_array);
      				if($departments)
      				{   
      					$dept='';
      					foreach($departments as $dep)
      					{
      						$depsel='';
      						 if($dep['department_id']==$data['department_id'])
      						 {
      						 	$depsel='selected';
      						 }
      						$dept.='<option value="'.$dep['department_id'].'" '.$depsel.'>'.$dep['name'].'</option>';
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
							                          <input type="hidden" name="id" id="id" value="'.$data['injection_id'].'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Name: <span class="text-danger">*</span></label>
							                                         <input type="text" name="name" id="name" class="form-control" value="'.$data['name'].'">
							                                    </div>
							                                </div>

							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Amount: <span class="text-danger">*</span></label>
							                                         <input type="text" name="amount" id="amount" class="form-control" value="'.$data['amount'].'">
							                                    </div>
							                                </div>
							                                  <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Department: <span class="text-danger">*</span></label>
							                                         <select class="form-control select2" name="department_id" id="department_id">
							                                         	<option value="">Select Department</option>
							                                         	'.$dept.'
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
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[1]|max_length[30]|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('id')));
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$description=trim(htmlentities($this->input->post('description')));
	    	$status=trim(htmlentities($this->input->post('status')));
	    	$var_array=array($edit_id,$name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Preoperative_appointment_model->editcheck($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Preoperative_appointment_model->updatedata($data,$edit_id);
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
	    	$chk_duplication=$this->Preoperative_appointment_model->deletecheck($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Preoperative_appointment_model->deletedata($delete_id);
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
