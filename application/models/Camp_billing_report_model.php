<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @10/08/2021
 */
class Camp_billing_report_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}
public function getmodemodel($office_id,$modeid)
  {
  	$mode='';
  	if($modeid>0)
  	{
  		$mode= '  and modeofpay_id='.$modeid;
  	}
      $sql = "select name,modeofpay_id from modeofpay where office_id=$office_id and status=1 and name!='M PAYMENT'  $mode";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }

   public function getbilldatedatemode($billid,$sum_fromdate,$sum_todate)
	{
		
	 	$sql = "select adjusted_amount_paid,DATE_FORMAT(camp_billing_master.adjustment_time_paid,'%d/%m/%Y') AS adjustment_time_paid from 
			camp_billing_master where adjustment_time_paid between  '$sum_fromdate' and  '$sum_todate'  and  camp_billing_master.billing_master_id=$billid ";
		
	    $result_row=$this->db->query($sql); 
	   // 	echo $this->db->last_query();exit;
		$res= $result_row->result_array ();
// 		print_r($res);exit;
        $this->logger->save($this->db);
		return $res;
	}

	public function getbilldatedatemode1($billid,$sum_fromdate,$sum_todate)
	{
		
	 	$sql = "select advanced_amount from 
			camp_billing_master where billing_date between  '$sum_fromdate' and  '$sum_todate'  and  camp_billing_master.billing_master_id=$billid ";
		
	    $result_row=$this->db->query($sql); 
	   // 	echo $this->db->last_query();exit;
		$res= $result_row->result_array ();
// 		print_r($res);exit;
        $this->logger->save($this->db);
		return $res;
	}
	
    public function getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay,$pattype='')
	{
		//echo $pattype;exit;
		$pat=$doc=$mod=$pattyped='';	
		if($patient_id>0)
		{
			$pat=' and camp_billing_master.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and camp_billing_master.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and camp_billing_master.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped=' and  camp_deh.pat_type='.$pattype;
		}
	 	 $sql = "select camp_billing_master.insuranceamount,adjusted_modeofpay_id,camp_billing_master.billing_master_id,billing_date as bdate,adjustment_time_paid as adtime,namecamp AS pname,adjusted_amount_paid,DATE_FORMAT(camp_billing_master.adjustment_time_paid,'%d/%m/%Y') AS adjustment_time_paid,cash,camp_billing_master.card,paytm,others,doctors_registration.name as docname,DATE_FORMAT(camp_billing_master.billing_date,'%d/%m/%Y') AS bill_date,billing_time,camp_billing_master.invoice_number,modeofpay.name as mode,mrdno,grand_total,advanced_amount from 
			camp_billing_master 
			left join camp_deh on camp_billing_master.patient_registration_id= camp_deh.camp_deh_id  
			left join doctors_registration on doctors_registration.doctors_registration_id=camp_billing_master.doctor_id 
			left join modeofpay on camp_billing_master.modeofpay_id=modeofpay.modeofpay_id
			where (billing_date between  '$sum_fromdate' and  '$sum_todate' ) or ( adjustment_time_paid between  '$sum_fromdate' and  '$sum_todate' ) and  camp_billing_master.office_id= $office_id   $pat  $doc $mod  $pattyped";
		
	    $result_row=$this->db->query($sql); 
	   // 	echo $this->db->last_query();exit;
		$res= $result_row->result_array ();
// 		print_r($res);exit;
        $this->logger->save($this->db);
		return $res;
	}
	public function getdetailedreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$particular,$charge_type_id,$det_modeofpay)
	{
		$pat=$doc=$par=$mod=$char='';	
		if($patient_id>0)
		{
			$pat=' and camp_billing_master.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and camp_billing_master.doctor_id='.$doctor_id;
		}
		if($particular>0)
		{
			$par=' and camp_billing_detail.particulars_id='.$particular;
		}
		if($charge_type_id>0)
		{
			$char=' and camp_billing_detail.charge_id='.$charge_type_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and camp_billing_master.modeofpay_id='.$det_modeofpay;
		}
		
	 	$sql = "select namecamp AS pname,doctors_registration.name as docname,DATE_FORMAT(billing_date,'%d/%m/%Y') AS bill_date,billing_time,camp_billing_master.invoice_number,modeofpay.name as mode,mrdno,qty,rate,disamt,amount,particulars_id,camp_billing_detail.charge_id,insurance_company.name as insurance from 
			camp_billing_detail
			inner join camp_billing_master on camp_billing_detail.billing_master_id=camp_billing_master.billing_master_id 
			inner join camp_deh on camp_billing_master.patient_registration_id= camp_deh.camp_deh_id 
			inner join doctors_registration on doctors_registration.doctors_registration_id=camp_billing_master.doctor_id 
			inner join modeofpay on camp_billing_master.modeofpay_id=modeofpay.modeofpay_id
			left join insurance_company on camp_billing_master.insurance_company_id=insurance_company.insurance_company_id
			where billing_date between  '$sum_fromdate' and '$sum_todate' and  camp_billing_master.office_id= $office_id   $pat  $doc $par $char $mod";
		//	echo $sql;exit;
			
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}

   
}