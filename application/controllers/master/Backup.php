<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        
      
    }
	public function index()
	{
      $data['title']='EMR::backup';
      $data['activecls']='backup';
      $cdate=date('Y-m-d');
      $content=$this->load->view('master/backup',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);

      // $this->load->dbutil();
      // $DATABASE=$this->db->database;
      // $db_format=array('format'=>'zip','filename'=>$DATABASE);
      // $backup=& $this->dbutil->backup($db_format);
      // $dbname='backup-on-'.date('Y-m-d').'.zip';
      // $save='documents/'.$dbname;
      // write_file($save,$backup);
      // force_download($dbname,$backup);

	}
}
