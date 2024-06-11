<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_list extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Package_model');
         $this->load->model('Common_model');

      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Package_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Package List';
      $data['activecls']='Package_list';
      $var_array=array(2,$this->session->userdata('office_id'));
	  $data['pakagelist_ipd']=$this->Common_model->getopdpanelmodel(2,$this->session->userdata('office_id'));
      $content=$this->load->view('master/package_list',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
  
    private function fetch_data() 
    {
		$status=1;
        $return=array(
            "package_master"=>array(
                "name"=>$this->input->post('name'),
                "description"=>$this->input->post('description'),
				"total_amount"=>$this->input->post('amount_tot'),
                "status"=>$status,
                'pakage_date'=>date('Y-m-d'),
                'parent_id'=>$this->session->userdata('parent_id'),
                'login_id'=>$this->session->userdata('login_id'),
                'office_id'=> $this->session->userdata('office_id')
            ),
          "package_details"=>array(
              "particulars_id"=>$this->input->post('particularsid'),
              'pakage_date'=>date('Y-m-d'),
              "calrow_id"=>$this->input->post('calrow_id')
          )
        );

         return $return;
    }

    public function savedata()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('particularsid[]', 'Please select IPD', 'trim|required|min_length[1]|max_length[200]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	
	    		$data=$this->fetch_data();
	    		$getresult=$this->Package_model->savedata($data);
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
	    	$getdata=$this->Package_model->geteditdata($var_array);
			$getdata_child=$this->Package_model->geteditdata_child($this->input->post('getid'));
	    	if($getdata)
	    	{
				$html='';
				if($getdata_child)
				{
					$sl=1;
					foreach ($getdata_child as $dataval) 
					{
						$html.='<tr>
						<td>
							  <a href="#" onclick="$(this).parent().parent().remove();calcnet();checkgridcount();" class="input_column">
							  <button class="btn btn-danger btnDelete btn-sm">
								 <i class="la la-trash"></i>
							  </button>
							  </a>
						   </td><td>'.$dataval['name'].'-'.$dataval['amount'].'</td>
						   <td style="display:none;">
		<input type="hidden" id="calrow_id_'.$sl.'" name="calrow_id[]" value="'.$sl.'" >
		<input type="hidden" id="particularsid_'.$sl.'" name="particularsid[]" value="'.$dataval['ipd_package_id'].'" >
						 </td>
						   </tr>';
						   $sl++;
					}
				}
	    		echo json_encode(array('msg'=>$getdata,'child'=>$html,'error' =>'','error_message' =>''));
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
		$this->form_validation->set_rules('pakage_id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		$this->form_validation->set_rules('particularsid[]', 'Please select IPD', 'trim|required|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[200]');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    		$data=$this->fetch_data();
	    		$getresult=$this->Package_model->updatedata($data,$this->input->post('pakage_id'));
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
			$getresult=$this->Package_model->deletedata($delete_id);
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
