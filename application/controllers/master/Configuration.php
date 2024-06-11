<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {
	private $msg;
	private $error;
    private $error_message;
    private $randval;
	public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
		 	redirect('login');
         }
        
        $this->load->model('Profile_model');
    }
	public function index()
	{
          $data['title']='EMR::Configuration';
          $data['activecls']='Configuration';
          $var_array=array($this->session->userdata('office_id'));
          $data['getofficedata']=$this->Profile_model->getprofile($var_array);
          $content=$this->load->view('master/configuration',$data,true);
	      $this->load->view('includes/layout',['content'=>$content]);
	}
	public function saveprofile()
	{
	    	$pat_reg_billprint=trim(htmlentities($this->input->post('pat_reg_billprint')));
	    	$app_type=trim(htmlentities($this->input->post('app_type')));
	    	$pat_mod=trim(htmlentities($this->input->post('pat_mod')));

	    	$var_array=array($this->session->userdata('office_id'));
	    	$chk_duplication=$this->Profile_model->checkprofile($var_array);
	    	$data=$this->fetch_data($pat_reg_billprint,$app_type,$pat_mod);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$getresult=$this->Profile_model->savedata($data);
	    		if($getresult)
	    		{
		    		  $this->msg='Saved Successfully';
		    		  $this->error='';
		    		  $this->error_message ='';
			              echo json_encode(array(
					        'msg'           => $this->msg,
					        'error'         => $this->error,
					        'error_message' => $this->error_message
					      ));
			            exit;
	    		}
	    		else
	    		{
	    			  $this->msg='';
		    		  $this->error='Failed to save';
		    		  $this->error_message ='';
			              echo json_encode(array(
					        'msg'           => $this->msg,
					        'error'         => $this->error,
					        'error_message' => $this->error_message
					      ));
			            exit;
	    		}
	    	}
	    	else
	    	{
	    		$getresult=$this->Profile_model->updatedata($data,$this->session->userdata('office_id'));
	    		if($getresult)
	    		{
		    		  $this->msg='Updated Successfully';
		    		  $this->error='';
		    		  $this->error_message ='';
			              echo json_encode(array(
					        'msg'           => $this->msg,
					        'error'         => $this->error,
					        'error_message' => $this->error_message
					      ));
			            exit;
	    		}
	    		else
	    		{
	    			  $this->msg='';
		    		  $this->error='Failed to Update';
		    		  $this->error_message ='';
			              echo json_encode(array(
					        'msg'           => $this->msg,
					        'error'         => $this->error,
					        'error_message' => $this->error_message
					      ));
			            exit;
	    		}
	    	}
	   
	}

	private function fetch_data($pat_reg_billprint,$app_type,$pat_mod) 
    {
    	if($this->input->post('fin_year_settings')==2 || $this->input->post('fin_year_settings')==0)
		{
			$fin_year='';
			$starting_bill_no='';
		}
		else
		{
			$fin_year=$this->input->post('fin_year');
			$starting_bill_no=$this->input->post('starting_bill_no');
		}
        $office_id=$this->session->office_id;
        return array(
            
            'pat_reg_billprint'=>$pat_reg_billprint,
            'app_type'=>$app_type,
            'pat_mod'=>$pat_mod,
            'printable_company_code'=>$this->input->post('printable_company_code'),
            'direct_doctor'=>$this->input->post('direct_doctor'),
            'load_medicine'=>$this->input->post('load_medicine'),
           
            'fin_year' => $fin_year,
		     'fin_year_settings' => $this->input->post('fin_year_settings'),
		     'starting_bill_no' => $starting_bill_no
           );
    }
    private function removeupdate() 
    {
        return array(
            'logo'=>'',
            'login_id'=>$this->session->userdata('login_id')
           );
    }
    public function file_check($parameter){
        
         if(isset($_FILES['logo']['name']))
         {
        $str=$_FILES['logo']['name'];
        $allowed_mime_type_arr = array('image/jpeg','image/jpg','image/png');
        $mime = get_mime_by_extension($str);
        if(isset($str) && $str!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                
                return $this->upload();
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }else{
            if($this->input->post('profile_pic'))
            {
                $this->session->set_flashdata('profile_pic',$this->input->post('profile_pic'));
                return true;
            }
             $this->session->set_flashdata('profile_pic','temp.jpg');
             return true;
        }
         }  else {
             $this->session->set_flashdata('profile_pic','temp.jpg');
             return true;
         }
    }
    private function upload() {
		$host_tvm = 'optical';
        $config['upload_path']   = 'images/profile/'; 
        $config['allowed_types'] = 'jpg|png|jpeg'; 
        $config['max_size']      = 2000; 
        $config['file_name']  = $host_tvm;
        // $config['max_width']     = 1024; 
        // $config['max_height']    = 768;  
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('logo')) {
            //$this->session->set_flashdata('msg',"Image Upload Failed");
           // return $error = array('error' => $this->upload->display_errors()); 
            $this->form_validation->set_message('file_check', $this->upload->display_errors());
            return false;
           }

        else { 
            
              $this->session->set_flashdata('profile_pic',$this->upload->data('file_name'));
            //return $data = $this->upload->data('file_name'); 
            //$this->load->view('upload_success', $data); 
            return TRUE;
}
}

 public function file_check1($parameter){
         if(isset($_FILES['nabh_logo']['name']))
         {
        $str=$_FILES['nabh_logo']['name'];
        $allowed_mime_type_arr = array('image/jpeg','image/jpg','image/png');
        $mime = get_mime_by_extension($str);
        if(isset($str) && $str!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                
                return $this->upload1();
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }else{
            if($this->input->post('nabh_logo_hid'))
            {
                $this->session->set_flashdata('nabh_logo_hid',$this->input->post('nabh_logo_hid'));
                return true;
            }
             $this->session->set_flashdata('nabh_logo_hid','temp.jpg');
             return true;
        }
         }  else {
             $this->session->set_flashdata('nabh_logo_hid','temp.jpg');
             return true;
         }
    }

      private function upload1() {
		$host_tvm = 'nabhlogo';
        $config['upload_path']   = 'images/profile/'; 
        $config['allowed_types'] = 'jpg|png|jpeg'; 
        $config['max_size']      = 2000; 
        $config['file_name']  = $host_tvm;
        // $config['max_width']     = 1024; 
        // $config['max_height']    = 768;  
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('nabh_logo')) {
            //$this->session->set_flashdata('msg',"Image Upload Failed");
           // return $error = array('error' => $this->upload->display_errors()); 
            $this->form_validation->set_message('file_check', $this->upload->display_errors());
            return false;
           }

        else { 
            
              $this->session->set_flashdata('nabh_logo_hid',$this->upload->data('file_name'));
            //return $data = $this->upload->data('file_name'); 
            //$this->load->view('upload_success', $data); 
            return TRUE;
}
}

public function removelogo()
	{
		$this->form_validation->set_rules('id', 'Remove Logo', 'trim|required|min_length[1]|max_length[100]');
		
	    if($this->form_validation->run() == TRUE)
	    {
	    	$id=trim(htmlentities($this->input->post('id')));
	    	$var_array=array($this->session->userdata('office_id'));
	    	if($id==$this->session->userdata('office_id')){
	    	$chk_duplication=$this->Profile_model->checkprofile($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		
	    		$data=$this->removeupdate();
	    		$getresult=$this->Profile_model->removelogo($data,$id);
	    		if($getresult)
	    		{
		    		  $this->msg='Removed Logo Successfully';
		    		  $this->error='';
		    		  $this->error_message ='';
			              echo json_encode(array(
					        'msg'           => $this->msg,
					        'error'         => $this->error,
					        'error_message' => $this->error_message
					      ));
			            exit;
	    		}
	    		else
	    		{
	    			  $this->msg='';
		    		  $this->error='Failed to Remove Logo';
		    		  $this->error_message ='';
			              echo json_encode(array(
					        'msg'           => $this->msg,
					        'error'         => $this->error,
					        'error_message' => $this->error_message
					      ));
			            exit;
	    		}
	    	}
	    	else
	    	{
	    		 $this->msg='';
	    		  $this->error='';
	    		  $this->error_message = 'Removed ID Not Found.please refresh page';
	              echo json_encode(array(
			        'msg'           => $this->msg,
			        'error'         => $this->error,
			        'error_message' => $this->error_message
			      ));
	            exit;
	    	}
	    }
	    else
	    {
	    	      $this->msg='';
	    		  $this->error='';
	    		  $this->error_message = 'Removed ID Not Found.please refresh page';
	              echo json_encode(array(
			        'msg'           => $this->msg,
			        'error'         => $this->error,
			        'error_message' => $this->error_message
			      ));
	            exit;
	    }
	    }
	    else
	    {
	    		  $this->msg='';
	    		  $this->error='';
	    		  $this->error_message = $this->form_validation->error_array();
	              echo json_encode(array(
			        'msg'           => $this->msg,
			        'error'         => $this->error,
			        'error_message' => $this->error_message
			      ));
	            exit;
	    }
	}

}
