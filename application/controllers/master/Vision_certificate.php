<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision_certificate extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
         $this->load->model('Department_model');
         $this->load->model('Common_model');
    }
	public function index()
	{
      $data['title']='EMR::Vision Certificate';
      $data['activecls']='Vision_certificate';
      $var_array=array($this->session->userdata('office_id'));
	    $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('master/vision_certificate',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}

 

}