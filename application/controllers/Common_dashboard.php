<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_dashboard extends CI_Controller {

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
        
        $this->load->model('Dashboard_model');
        $this->load->model('Common_model');
        $this->load->model('Login_model');

    }
	public function index()
	{
      $data['title']='OJO::Common Dashboard';
      $data['activecls']='Dashboard';
      $cdate=date('Y-m-d');
      $this->load->view('com_dashboard',$data);
     
	}
    public function gotodasboard()
    {
         $host_tvm = $_SERVER['HTTP_HOST'];
        if($this->input->post('apps')>0)
        {
           if($this->input->post('apps')==1) //EMR 
           {
              if($this->input->post('docid')>0)
              {
                $getres=$this->Dashboard_model->get_Admin_details_Doc($this->input->post('docid')); 
              }
              else
              {
                $getres=$this->Dashboard_model->get_Admin_details($this->input->post('usertype')); 
              }
               
               if($getres)
               {
                 $utype=1;
                 $uname=$getres[0]['name'];
                 $loginPaswd=$getres[0]['password'];
                 $get_Res=$this->Go_To_Login($utype,$uname,$loginPaswd);
                 if($get_Res)
                 {
                    echo json_encode(array(
                        'msg'           => 'success',
                        'error'         => '',
                        'url'         => base_url().'master/Dashboard',
                        'error_message' => ''
                      ));
                 }
               }
           }

           if($this->input->post('apps')==2) //Optical 
           {
                $op_db_name = $this->load->database('optdb', TRUE);
                $database_name = $op_db_name->database;

                $new_domain = preg_replace('/^[^.]+/', $database_name, $host_tvm);
                echo json_encode(array(
                'msg'           => 'success',
                'error'         => '',
                'url'         => 'https://'.$new_domain.'/Cloginredirect',
                'error_message' => ''
                ));
           }

           if($this->input->post('apps')==3) //Pharmacy 
           {
               $op_db_name = $this->load->database('pharmdb', TRUE);
               $database_name = $op_db_name->database;

                $new_domain = preg_replace('/^[^.]+/', $database_name, $host_tvm);
                echo json_encode(array(
                    'msg'           => 'success',
                    'error'         => '',
                    'url'         => 'https://'.$new_domain.'/Cloginredirect',
                    'error_message' => ''
                  ));
           }
        }
    }
    public function Go_To_Login($utype,$uname,$loginPaswd)
    {
        $ip=$this->input->ip_address();
        $logintime=date("Y-m-d h:i:s");
        $data=array(
                    'name'=>$uname,
                    'password'=>$loginPaswd
                );
         $result_data=$this->Login_model->getuserdetails($uname,$loginPaswd);
         if($result_data)
         {
            $this->session->set_userdata('username', $result_data[0]['name']); //get username
            $this->session->set_userdata('office_id', $result_data[0]['office_id']); 
            $this->session->set_userdata('login_id', $result_data[0]['user_id']); 
            $this->session->set_userdata('user_type', $result_data[0]['user_type']); 
            $this->session->set_userdata('set_superadmin_lo', 1);
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
                    $getuserdesgn=  $this->db->get_where("office","office_id=".$user['office_id'])->row_array();
                    $this->session->set_userdata('parent_id', $getuserdesgn['parent_id']); //get user headoffice or branch
                    $this->session->set_userdata('officename', $getuserdesgn['company_name']); //get user headoffice or branch
                    $var_array=array($this->session->userdata('login_id'),$utype,$uname,$loginPaswd,$ip,$logintime,$this->session->userdata('office_id'));
                    $result_data=$this->Login_model->savelog($var_array);
                    $this->session->set_userdata("emr_login",true); 
                    return true;
         }
         else
         {
            return false;
         }
         
    }
    public function getalldoc()
    {
        $html='';
        $get_All_Doct=$this->Dashboard_model->Get_All_Doct_List();
        if($get_All_Doct)
        {
            foreach($get_All_Doct as $data)
            {
                $user_id=0;
                $getuser_ID=$this->Dashboard_model->Getdoct_user($data['doctors_registration_id']);
                if($getuser_ID)
                {
                    $user_id=$getuser_ID[0]['user_id'];
                }
                $html.=' <div class="col-md-4">
                            <div class="card">
                                <img src="'.base_url().'template1/app-assets/images/backgrounds/doc.png" alt="" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                <div class="card-body">
                                    <h6 style="font-size: 14px !important;" class="card-title font-large-1 mb-0 text-center">'.$data['docname'].'</h6>
                                    <p style="font-size: 11px !important;" class="card-text card font-medium-1 text-center mb-0">'.$data['specialist'].'</p>
                                    <br/>
                                    <p class="font-small-3 text-center"><i class="ft-briefcase"></i> '.$data['spe'].'</p>

                                </div>
                                <div class="card-footer mx-auto">
                                    <a onclick="clickgotodashboard(1,2,'.$user_id.')" class="btn btn-outline-danger btn-sm">GO TO DASHBOARD</a>
                                </div>
                            </div>
                        </div>';
            }
        }


       
         echo json_encode(array(
                    'msg'           => 'success',
                    'datadoc'           => $html,
                    'error'         => '',
                    'error_message' => ''
                  ));
    }
    // public function optical_login_goto($utype,$uname,$loginPaswd)
    // {
       
    //         $utype=$utype;
    //         $uname=$uname;
    //         $loginPaswd=$loginPaswd;
    //         $result=$this->Dashboard_model->chklogin_opto($utype,$uname,$loginPaswd);
    //         //print_r($result);exit;
    //         $cnt=$result[0]['cnt'];
    //         if($cnt>0)
    //         {
    //             $result_data=$this->Dashboard_model->getuserdetails_opto($utype,$uname,$loginPaswd);
    //             $this->session->set_userdata('username', $result_data[0]['name']); //get username
    //             $this->session->set_userdata('office_id', $result_data[0]['office_id']); 
    //             $this->session->set_userdata('login_id', $result_data[0]['user_id']); 
    //             $this->session->set_userdata('user_type', $result_data[0]['user_type']); 
                
    //              if($this->input->post("remember")=='1')  
    //              {
    //                 setcookie ("utype",$utype,time()+ (10 * 365 * 24 * 60 * 60),"/");
    //                 setcookie ("name",$uname,time()+ (10 * 365 * 24 * 60 * 60),"/");
    //                 setcookie ("password",$loginPaswd,time()+ (10 * 365 * 24 * 60 * 60),"/");  
    //               } else 
    //               {
    //                 if(isset($_COOKIE["name"])) {
    //                  setcookie ("name","");
    //                 }
    //                 if(isset($_COOKIE["password"])) {
    //                 setcookie ("password","");
    //                 }
    //                  if(isset($_COOKIE["utype"])) {
    //                 setcookie ("utype","");
    //                 }  
    //                }
    //                 $utype=$this->input->post('select_login_type');
    //                 $uname=$this->input->post('text_login_username');
    //                 $pwd=$this->input->post('text_login_password');
    //                 $ip=$this->input->ip_address();
    //                 $logintime=date("Y-m-d h:i:s");
    //                 $var_array=array($this->session->userdata('login_id'),$utype,$uname,$loginPaswd,$ip,$logintime,$this->session->userdata('office_id'));
    //                 //$result_data=$this->Dashboard_model->savelog($var_array);
    //                 $this->session->set_userdata("optical_login",true);  
    //                return true;

    //         }
    //         else
    //         {
    //            return false;
    //         }
    // }
    // public function pharmacy_login_goto($utype,$uname,$loginPaswd)
    // {
       
    //         $utype=$utype;
    //         $uname=$uname;
    //         $loginPaswd=$loginPaswd;
    //         $result=$this->Dashboard_model->chklogin_ph($utype,$uname,$loginPaswd);
    //         //print_r($result);exit;
    //         $cnt=$result[0]['cnt'];
    //         if($cnt>0)
    //         {
    //             $result_data=$this->Dashboard_model->getuserdetails_ph($utype,$uname,$loginPaswd);

    //             $this->session->set_userdata('username', $result_data[0]['name']); //get username
    //             $this->session->set_userdata('office_id', $result_data[0]['office_id']); 
    //             $this->session->set_userdata('login_id', $result_data[0]['user_id']); 
    //             $this->session->set_userdata('user_type', $result_data[0]['user_type']); 
                
    //              if($this->input->post("remember")=='1')  
    //              {
    //                 setcookie ("utype",$utype,time()+ (10 * 365 * 24 * 60 * 60),"/");
    //                 setcookie ("name",$uname,time()+ (10 * 365 * 24 * 60 * 60),"/");
    //                 setcookie ("password",$loginPaswd,time()+ (10 * 365 * 24 * 60 * 60),"/");  
    //               } else 
    //               {
    //                 if(isset($_COOKIE["name"])) {
    //                  setcookie ("name","");
    //                 }
    //                 if(isset($_COOKIE["password"])) {
    //                 setcookie ("password","");
    //                 }
    //                  if(isset($_COOKIE["utype"])) {
    //                 setcookie ("utype","");
    //                 }  
    //                }
    //                 $utype=$this->input->post('select_login_type');
    //                 $uname=$this->input->post('text_login_username');
    //                 $pwd=$this->input->post('text_login_password');
    //                 $ip=$this->input->ip_address();
    //                 $logintime=date("Y-m-d h:i:s");
    //                 $var_array=array($this->session->userdata('login_id'),$utype,$uname,$loginPaswd,$ip,$logintime,$this->session->userdata('office_id'));
    //                 //$result_data=$this->Dashboard_model->savelog($var_array);
    //                 $this->session->set_userdata("optical_login",true);  
    //                return true;

    //         }
    //         else
    //         {
    //            return false;
    //         }
    // }
    public  function logout()
    {
        $this->session->sess_destroy();
        echo json_encode(array(
                        'msg'           => 'success',
                        'error'         => '',
                        'url'         => base_url().'Clogin',
                        'error_message' => ''
                      ));
        

    }

}
