<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @10/08/2021
 */
class Sales_collection_report_model extends CI_Model{
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
		
	 	$sql = "select adjusted_amount_paid,DATE_FORMAT(billing_master.adjustment_time_paid,'%d/%m/%Y') AS adjustment_time_paid from 
			billing_master where adjustment_time_paid between  '$sum_fromdate' and  '$sum_todate'  and  billing_master.billing_master_id=$billid ";
		
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
			billing_master where billing_date between  '$sum_fromdate' and  '$sum_todate'  and  billing_master.billing_master_id=$billid ";
		
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
			$pat=' and billing_master.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and billing_master.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and billing_master.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped=' and patient_registration.pat_type='.$pattype;
		}
	 	 $sql = "select billing_master.bill_amount,billing_master.insuranceamount,adjusted_modeofpay_id,billing_master.billing_master_id,billing_date as bdate,adjustment_time_paid as adtime,CONCAT(`fname`,' ', `lname`) AS pname,adjusted_amount_paid,DATE_FORMAT(billing_master.adjustment_time_paid,'%d/%m/%Y') AS adjustment_time_paid,cash,card,paytm,others,doctors_registration.name as docname,DATE_FORMAT(billing_master.billing_date,'%d/%m/%Y') AS bill_date,billing_time,billing_master.invoice_number,modeofpay.name as mode,mrdno,grand_total,advanced_amount from 
			billing_master 
			left join patient_registration on billing_master.patient_registration_id=patient_registration.patient_registration_id  
			left join doctors_registration on doctors_registration.doctors_registration_id=billing_master.doctor_id 
			left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
			where (billing_date between  '$sum_fromdate' and  '$sum_todate' ) or ( adjustment_time_paid between  '$sum_fromdate' and  '$sum_todate' ) and  billing_master.office_id= $office_id   $pat  $doc $mod  $pattyped";
		
	    $result_row=$this->db->query($sql); 
	   // 	echo $this->db->last_query();exit;
		$res= $result_row->result_array ();
// 		print_r($res);exit;
        $this->logger->save($this->db);
		return $res;
	}

	 public function getsummaryreportmodel_nnew($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay,$pattype='')
	{
		//echo $pattype;exit;
		$pat=$doc=$mod=$pattyped='';	
		if($patient_id>0)
		{
			$pat=' and billing_master.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and billing_master.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and billing_master.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped=' and patient_registration.pat_type='.$pattype;
		}

		$pat1=$doc1=$mod1=$pattyped1=$ar1=$socs1='';	
		
		
		if($patient_id>0)
		{
			$pat1=' and patient_registration.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc1=' and patient_appointment.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod1=' and patient_appointment.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped1=' and patient_registration.pat_type='.$pattype;
		}
		$sql = "
SELECT 
    billing_master.bill_amount,
    billing_master.insuranceamount,
    adjusted_modeofpay_id,
    billing_master.billing_master_id,
    billing_date AS bdate,
    adjustment_time_paid AS adtime,
    CONCAT(`fname`, ' ', `lname`) AS pname,
    adjusted_amount_paid,
    DATE_FORMAT(billing_master.adjustment_time_paid, '%d/%m/%Y') AS adjustment_time_paid,
    cash,
    card,
    paytm,
    others,
    doctors_registration.name AS docname,
    DATE_FORMAT(billing_master.billing_date, '%d/%m/%Y') AS bill_date,
    billing_time,
    billing_master.invoice_number,
    modeofpay.name AS mode,
    mrdno,
    grand_total,
    advanced_amount,
    1 as typesec  
FROM 
    billing_master 
    LEFT JOIN patient_registration ON billing_master.patient_registration_id = patient_registration.patient_registration_id  
    LEFT JOIN doctors_registration ON doctors_registration.doctors_registration_id = billing_master.doctor_id 
    LEFT JOIN modeofpay ON billing_master.modeofpay_id = modeofpay.modeofpay_id
    where (billing_date between  '$sum_fromdate' and  '$sum_todate' ) or ( adjustment_time_paid between  '$sum_fromdate' and  '$sum_todate' ) and  billing_master.office_id= $office_id   $pat  $doc $mod  $pattyped 
-- WHERE 
--     (
--         billing_date BETWEEN '2023-10-01' AND '2023-11-08'
--         OR adjustment_time_paid BETWEEN '2023-10-01' AND '2023-11-08'
--     )
--     AND billing_master.office_id = 1    

UNION

SELECT 
    opdcharge.amount AS bill_amount,
    NULL AS insuranceamount,
    NULL AS adjusted_modeofpay_id,
    NULL AS billing_master_id,
    DATE_FORMAT(appointment_date, '%d/%m/%Y') AS bdate,
    appointment_time AS adtime,
    CONCAT(`fname`, ' ', `lname`) AS pname,
    NULL AS adjusted_amount_paid,
    NULL AS adjustment_time_paid,
    NULL AS cash,
    NULL AS card,
    NULL AS paytm,
    NULL AS others,
    doctors_registration.name AS docname,
    DATE_FORMAT(appointment_date, '%d/%m/%Y') AS bill_date,
    appointment_time AS billing_time,
    patient_appointment.invoice_number,
    modeofpay.name AS mode,
    mrdno,
    opdcharge.amount AS grand_total,
    NULL AS advanced_amount,
    2 as typesec  
FROM 
    patient_registration
    INNER JOIN patient_appointment ON patient_appointment.patient_registration_id = patient_registration.patient_registration_id 
    INNER JOIN doctors_registration ON doctors_registration.doctors_registration_id = patient_appointment.doctor_id
    INNER JOIN opdcharge ON patient_appointment.appointment_opd_charge_id = opdcharge.opdcharge_id
    LEFT JOIN modeofpay ON patient_appointment.modeofpay_id = modeofpay.modeofpay_id
where patient_appointment.cancel_flag=0 and billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate' and  patient_registration.office_id= $office_id   $pat1  $doc1 $mod1 $pattyped1 
ORDER BY CAST(SUBSTRING(invoice_number, LOCATE('-', invoice_number) + 1) AS SIGNED) ASC
";
// 	 	 $sql = "select billing_master.bill_amount,billing_master.insuranceamount,adjusted_modeofpay_id,billing_master.billing_master_id,billing_date as bdate,adjustment_time_paid as adtime,CONCAT(`fname`,' ', `lname`) AS pname,adjusted_amount_paid,DATE_FORMAT(billing_master.adjustment_time_paid,'%d/%m/%Y') AS adjustment_time_paid,cash,card,paytm,others,doctors_registration.name as docname,DATE_FORMAT(billing_master.billing_date,'%d/%m/%Y') AS bill_date,billing_time,billing_master.invoice_number,modeofpay.name as mode,mrdno,grand_total,advanced_amount,1 as typesec from 
// 			billing_master 
// 			left join patient_registration on billing_master.patient_registration_id=patient_registration.patient_registration_id  
// 			left join doctors_registration on doctors_registration.doctors_registration_id=billing_master.doctor_id 
// 			left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
// 			where (billing_date between  '$sum_fromdate' and  '$sum_todate' ) or ( adjustment_time_paid between  '$sum_fromdate' and  '$sum_todate' ) and  billing_master.office_id= $office_id   $pat  $doc $mod  $pattyped union 

// 	select opdcharge.amount as bill_amount,NULL AS insuranceamount,NULL AS adjusted_modeofpay_id,NULL AS billing_master_id,
// DATE_FORMAT(appointment_date,'%d/%m/%Y') AS bdate,appointment_time as adtime,CONCAT(`fname`,' ', `lname`) AS pname,NULL as adjusted_amount_paid,NULL as adjustment_time_paid,NULL as cash,NULL as card,NULL as paytm,NULL as others,NULL as cash,doctors_registration.name as docname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS bill_date,appointment_time as billing_time,patient_appointment.invoice_number,modeofpay.name as mode,mrdno,opdcharge.amount as grand_total,NULL AS advanced_amount,2 as typesec  
// 		 from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
// 		inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id
// 		inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
// 		left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
// 		where patient_appointment.cancel_flag=0 and billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate' and  patient_registration.office_id= $office_id   $pat1  $doc1 $mod1 $pattyped1   

// 			";
		//echo "324324";exit;
	    $result_row=$this->db->query($sql); 
	 	//echo $this->db->last_query();exit;
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
			$pat=' and billing_master.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and billing_master.doctor_id='.$doctor_id;
		}
		if($particular>0)
		{
			$par=' and billing_detail.particulars_id='.$particular;
		}
		if($charge_type_id>0)
		{
			$char=' and billing_detail.charge_id='.$charge_type_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and billing_master.modeofpay_id='.$det_modeofpay;
		}
		
	 	$sql = "select CONCAT(`fname`,' ', `lname`) AS pname,doctors_registration.name as docname,DATE_FORMAT(billing_date,'%d/%m/%Y') AS bill_date,billing_time,billing_master.invoice_number,modeofpay.name as mode,mrdno,qty,rate,disamt,amount,particulars_id,billing_detail.charge_id,insurance_company.name as insurance from 
			billing_detail
			inner join billing_master on billing_detail.billing_master_id=billing_master.billing_master_id 
			inner join patient_registration on billing_master.patient_registration_id=patient_registration.patient_registration_id 
			inner join doctors_registration on doctors_registration.doctors_registration_id=billing_master.doctor_id 
			inner join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
			left join insurance_company on billing_master.insurance_company_id=insurance_company.insurance_company_id
			where billing_date between  '$sum_fromdate' and '$sum_todate' and  billing_master.office_id= $office_id   $pat  $doc $par $char $mod";
		//	echo $sql;exit;
			
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}

   
}