<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {
	private $msg;
	private $error;
    private $error_message;
    private $randval;

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	function random_name($length=5) 
	{       
		   $charArray = array();       
		   $upper = range('A','Z');
		   $lower = range('a','z');
		   $num = range(0,9);
		   $special = array('~','!','@','#','$','%','^','&','*','(',')','-');
		   $charArray = array_merge($charArray, $upper, $lower, $num);
		   /* Do we need to seed the random number generator? */
		   if (version_compare(PHP_VERSION, '7.2.0') == -1){
		       mt_srand((double)microtime() * 1234567);
		   }
		   shuffle($charArray);
		   $pass = '';
		   for($x=0; $x<$length; $x++) {
		       $pass .= $charArray[mt_rand(0, (sizeof($charArray)-1))];
		   }
		   return $pass;
    }
	public function index()
	{
		
		$data=array();
		$salt_str=$this->random_name();  
		$this->session->set_userdata('salt',$salt_str);
		$data['salt']=$salt_str;
		 if(isset($this->session->optical_login))
        {
            redirect('master/Dashboard');
        } else {
          	$this->load->view('clogin',$data); 
        }
         
		
	}

	public function checklogin()
	{
		
		$this->form_validation->set_rules('select_login_type', 'Login type', 'trim|required|min_length[1]|max_length[1]|numeric');
		$this->form_validation->set_rules('text_login_username', 'Username', 'trim|required|min_length[1]|max_length[30]|alpha_numeric');
    	$this->form_validation->set_rules('text_login_password', 'Password', 'trim|required');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$utype=$this->input->post('select_login_type');
	    	$uname=$this->input->post('text_login_username');
	    	$loginPaswd=$this->input->post('text_login_password');
	        $result=$this->Login_model->chklogin_com($uname,$loginPaswd);
	        $cnt=$result[0]['cnt'];
	        if($cnt>0)
	        {
				$result_data=$this->Login_model->getuserdetails_com($uname,$loginPaswd);
				$this->session->set_userdata('username', $result_data[0]['name']); //get username
				$this->session->set_userdata('office_id', $result_data[0]['office_id']); 
				$this->session->set_userdata('login_id', $result_data[0]['user_id']); 
				$this->session->set_userdata('user_type', $result_data[0]['user_type']); 
				
				 if($this->input->post("remember")=='1')  
                 {
                    setcookie ("utype_com",$utype,time()+ (10 * 365 * 24 * 60 * 60),"/");
                    setcookie ("name_com",$uname,time()+ (10 * 365 * 24 * 60 * 60),"/");
                    setcookie ("password_com",$loginPaswd,time()+ (10 * 365 * 24 * 60 * 60),"/");  
                  } else 
                  {
                    if(isset($_COOKIE["name_com"])) {
                     setcookie ("name_com","");
                    }
                    if(isset($_COOKIE["password_com"])) {
                    setcookie ("password_com","");
                    }
                     if(isset($_COOKIE["utype_com"])) {
                    setcookie ("utype_com","");
                    }  
                   }
                    $utype=$this->input->post('select_login_type');
                    $uname=$this->input->post('text_login_username');
                    $pwd=$this->input->post('text_login_password');
                    $ip=$this->input->ip_address();
                    $logintime=date("Y-m-d h:i:s");
					$data=array(
								'name'=>$this->input->post('text_login_username'),
							'password'=>$this->input->post('text_login_password')
				 		    );

					$ll=$result_data[0]['doctor_id'];
					
					if($ll)
					{
						$doctor_department_id=0;
						$getdoc_reg_dent=  $this->db->get_where("doctors_registration","doctors_registration_id=".$ll)->row_array();
						if($getdoc_reg_dent)
						{
							$doctor_department_id=$getdoc_reg_dent['doctor_department_id'];
						}
						if($doctor_department_id>0)
						{
							$this->session->set_userdata('doctor_department_id', $doctor_department_id); //Which doctor identify
						}
						else
						{
							$this->session->set_userdata('doctor_department_id', 0); //get dental doctor or not
						}
						
					}
					else 
					{
						$this->session->set_userdata('doctor_department_id', 0); //get dental doctor or not
					}
					$user=$this->db->get_where('user',$data)->row_array();
					$utype=$user['user_type'];
					// $getuserdesgn=  $this->db->get_where("office","office_id=".$user['office_id'])->row_array();
					// $this->session->set_userdata('parent_id', $getuserdesgn['parent_id']); //get user headoffice or branch
                    // $this->session->set_userdata('officename', $getuserdesgn['company_name']); //get user headoffice or branch
                    $var_array=array($this->session->userdata('login_id'),$utype,$uname,$pwd,$ip,$logintime,-1);
                    $result_data=$this->Login_model->savelog($var_array);
                    $this->session->set_userdata("emr_login",true);  
                   	$this->msg='success';
		        	 echo json_encode(array(
				        'msg'           => $this->msg,
				        'error'         => $this->error,
				        'url'         => base_url().'Common_dashboard',
				        'error_message' => $this->error_message
				      ));
		            exit;

	        }
	        else
	        {
	        	$this->error_message='Invalid login details';
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
      	 	$this->error_message = $this->form_validation->error_array();
	              echo json_encode(array(
			        'msg'           => $this->msg,
			        'error'         => $this->error,
			        'error_message' => $this->error_message
			      ));
	            exit;
      }
	}

	public function logout() {
       
        $lotime=date("h:i:s");
        // $logout_time=$this->session->userdata('time');
        // $this->db->query("update log_book set logout_time='$lotime' where time='$logout_time'");
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
