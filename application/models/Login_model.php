<?php
class Login_model extends CI_Model {
  public function __construct() {
    // Call the Model constructor
    parent::__construct();
    
  }

		public function chklogin($uname,$loginPaswd)
		{
			$sql = "select count(*) as cnt from user where  name = ? and password= ?";
		    $result_row=$this->db->query($sql, array($uname,$loginPaswd)); 
			$res= $result_row->result_array ();
			return $res;
		}
		public function chklogin_com($uname,$loginPaswd)
		{
			$sql = "select count(*) as cnt from user where  name = ? and password= ? and user_type='-1'";
		    $result_row=$this->db->query($sql, array($uname,$loginPaswd)); 
			$res= $result_row->result_array ();
			return $res;
		}
		public function getuserdetails($uname,$loginPaswd)
		{
			$sql = "select * from user where  name = ? and password= ?";
		    $result_row=$this->db->query($sql, array($uname,$loginPaswd)); 
			$res= $result_row->result_array ();
			return $res;
		}
		public function getuserdetails_com($uname,$loginPaswd)
		{
			$sql = "select * from user where  name = ? and password= ? and user_type='-1'";
		    $result_row=$this->db->query($sql, array($uname,$loginPaswd)); 
			$res= $result_row->result_array ();
			return $res;
		}

		public function savelog($var_array)
		{
			$sql = "insert into  user_log_book(user_id,usertype,username,password,ipaddress,logintime,office_id)values(?,?,?,?,?,?,?)";
		    $result_row=$this->db->query($sql, $var_array);
			return true;
		}
}