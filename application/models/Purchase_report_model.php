<?php
/**
 * Description of Classification_model
 *
 * @author Prabhu @11/01/2021
 */
class Purchase_report_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('pharmdb', TRUE);
	}

	public function GetGRN($var_array)
	{
		$sql = "select grn,purchase_id from purchase where  office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
    $this->logger->save($this->db);
		return $res;
	}

	 public function getsummaryreportmodel($sum_fromdate,$sum_todate,$sum_supplier,$sum_modeofpay,$officeid,$grn)
	{
		$sup='';
		$grns='';
		if($sum_supplier)
		{
			$sup= ' and purchase.supplier_id='.$sum_supplier;
		}
		$mode='';
		if($sum_modeofpay)
		{
			$mode= ' and purchase.modeofpay_id='.$sum_modeofpay;
		}
		if($grn)
		{
			$grns= ' and purchase.purchase_id='.$grn;
		}
	 	$sql = "select purchase.grn,supplier.name as supname,DATE_FORMAT(purchase_date,'%d/%m/%Y') AS purchase_date,invoice_no,user.username username,modeofpay.name as mode,total_amount,total_qty from purchase inner join supplier on purchase.supplier_id=supplier.supplier_id inner join modeofpay on modeofpay.modeofpay_id=purchase.modeofpay_id inner join user on user.user_id=purchase.login_id where purchase_date >= '$sum_fromdate' AND purchase_date <= '$sum_todate' and purchase.office_id=$officeid  $sup  $mode $grns";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
		return $res;
	}

	public function getdetailedreportmodel($det_fromdate,$det_todate,$det_supplier,$det_modeofpay,$officeid,$det_item)
	{
		$sup='';
		if($det_supplier)
		{
			$sup= ' and purchase.supplier_id='.$det_supplier;
		}
		$mode='';
		if($det_modeofpay)
		{
			$mode= ' and purchase.modeofpay_id='.$det_modeofpay;
		}
		$detitem='';
		if($det_item)
		{
			$detitem= ' and purchase_details.item_id='.$det_item;
		}
		$sql = "select purchase_details.tax_val,purchase_details.quantity,purchase_details.free,purchase_details.cost_price,purchase_details.mrp,purchase_details.tot_amount,purchase_details.batchno,DATE_FORMAT(purchase_details.expirydate,'%m/%Y') AS expirydate,item_master.name as itemname,item_master.code as itemcode,supplier.name as supname,DATE_FORMAT(purchase_date,'%d/%m/%Y') AS purchase_date,invoice_no,user.username username,modeofpay.name as mode,total_amount,total_qty from purchase inner join purchase_details on purchase.purchase_id=purchase_details.purchase_id inner join item_master on  purchase_details.item_id=item_master.item_id inner join supplier on purchase.supplier_id=supplier.supplier_id inner join modeofpay on modeofpay.modeofpay_id=purchase.modeofpay_id inner join user on user.user_id=purchase.login_id where purchase_date >= '$det_fromdate' AND purchase_date <= '$det_todate' and purchase.office_id=$officeid  $sup  $mode  $detitem";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
		return $res;
	}
	
}