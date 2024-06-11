<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @17/07/2022
 */
class Petty_cash_report_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}
 public function pettycashdata($sum_fromdate,$sum_todate,$petty_cash_name,$office_id)
	{
	 	$sql = "select * from petty_cash where petty_date between  '$sum_fromdate' and  '$sum_todate' and office_id= $office_id and petty_cash_name LIKE '%$petty_cash_name%'";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
    $this->logger->save($this->db);
		return $res;
	}

   
}