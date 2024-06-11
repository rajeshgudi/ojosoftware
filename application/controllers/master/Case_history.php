<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Case_history extends CI_Controller {

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
    }
	public function index()
	{
      $data['title']='EMR::Case History';
      $data['activecls']='case_history';
      $cdate=date('Y-m-d');
      $var_array=array($this->session->userdata('office_id'));
      $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('master/case_history',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
}
