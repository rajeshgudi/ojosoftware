<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @10/08/2021
 */
class Patient_appointment_report_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

	

    public function getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay='',$pattype='',$area_id='',$soc='')
	{
// echo $soc;exit;
		$pat=$doc=$mod=$pattyped=$ar=$socs='';	
		if($area_id>0)
		{
			$ar=' and patient_registration.area_id='.$area_id;
		}
		if($soc>0)
		{
			$socs=' and patient_appointment.source='.$soc;
		}
		if($patient_id>0)
		{
			$pat=' and patient_registration.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and patient_appointment.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and patient_appointment.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped=' and patient_registration.pat_type='.$pattype;
		}
		 $sql = "select patient_appointment.patient_appointment_id,patient_registration.patient_registration_id,area.name as areaname,patient_appointment.appointment_opd_charge_id,user.name as usename,modeofpay.name as modename,patient_appointment.description as dess,appointment_type.name appname,print,if(emergency=0,'No','Yes') as emergency,patient_category.name as patient_catename,insurance_company.name as insurance_name,referral_master.name as referralname,occupation,source.name as sourcename,address,city.name as cityname,DATE_FORMAT(dob,'%d/%m/%Y') AS dob,CONCAT(`fname`,' ', `lname`) AS pname,gender,mrdno,ageyy,agemm,patient_registration.mobileno,doctors_registration.name as docname,
		DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_time, opdcharge.amount as grand_total, patient_appointment.invoice_number,insurance_company.name as insurance,opdcharge.name as particular
		from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
		inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id 
		inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
		left join insurance_company on patient_registration.insurance_company_id=insurance_company.insurance_company_id
		left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
		left join city on patient_registration.city=city.city_id
		left join area on patient_registration.area_id=area.area_id
		left join source on patient_appointment.source=source.source_id
		left join user on user.user_id=patient_appointment.login_id
		left join referral_master on referral_master.referral_master_id=patient_registration.referral_masters_id
		left join  patient_category on patient_appointment.patient_category_id=patient_category.patient_category_id
		left join  appointment_type on patient_appointment.apponitment_type_id=appointment_type.appointment_type_id
		where patient_appointment.cancel_flag=0 and billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate' and  patient_registration.office_id= $office_id   $pat  $doc $mod $pattyped  $ar $socs";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}
	  public function getsummaryreportmodel_new($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay='',$pattype='',$area_id='',$soc='')
	{
// echo $soc;exit;
		$pat=$doc=$mod=$pattyped=$ar=$socs='';	
		if($area_id>0)
		{
			$ar=' and patient_registration.area_id='.$area_id;
		}
		if($soc>0)
		{
			$socs=' and patient_appointment.source='.$soc;
		}
		if($patient_id>0)
		{
			$pat=' and patient_registration.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and patient_appointment.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and patient_appointment.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped=' and patient_registration.pat_type='.$pattype;
		}
		 $sql = "select patient_registration.patient_registration_id,area.name as areaname,patient_appointment.appointment_opd_charge_id,user.name as usename,modeofpay.name as modename,patient_appointment.description as dess,appointment_type.name appname,print,if(emergency=0,'No','Yes') as emergency,patient_category.name as patient_catename,insurance_company.name as insurance_name,referral_master.name as referralname,occupation,source.name as sourcename,address,city.name as cityname,DATE_FORMAT(dob,'%d/%m/%Y') AS dob,CONCAT(`fname`,' ', `lname`) AS pname,gender,mrdno,ageyy,agemm,patient_registration.mobileno,doctors_registration.name as docname,
		DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_time, opdcharge.amount as grand_total, patient_appointment.invoice_number,insurance_company.name as insurance,opdcharge.name as particular
		from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
		inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id 
		inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
		left join insurance_company on patient_registration.insurance_company_id=insurance_company.insurance_company_id
		left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
		left join city on patient_registration.city=city.city_id
		left join area on patient_registration.area_id=area.area_id
		left join source on patient_appointment.source=source.source_id
		left join user on user.user_id=patient_appointment.login_id
		left join referral_master on referral_master.referral_master_id=patient_registration.referral_masters_id
		left join  patient_category on patient_appointment.patient_category_id=patient_category.patient_category_id
		left join  appointment_type on patient_appointment.apponitment_type_id=appointment_type.appointment_type_id
		where patient_appointment.cancel_flag=0 and billing=0 and entry_date between  '$sum_fromdate' and '$sum_todate' and  patient_registration.office_id= $office_id   $pat  $doc $mod $pattyped  $ar $socs";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}

 public function getsummaryreportmodel_fol($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay='',$pattype='',$area_id='',$soc='')
	{
// echo $soc;exit;
		$pat=$doc=$mod=$pattyped=$ar=$socs='';	
		if($area_id>0)
		{
			$ar=' and patient_registration.area_id='.$area_id;
		}
		if($soc>0)
		{
			$socs=' and patient_appointment.source='.$soc;
		}
		if($patient_id>0)
		{
			$pat=' and patient_registration.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and patient_appointment.doctor_id='.$doctor_id;
		}
		if($det_modeofpay>0)
		{
			$mod=' and patient_appointment.modeofpay_id='.$det_modeofpay;
		}
		if($pattype>0)
		{
			$pattyped=' and patient_registration.pat_type='.$pattype;
		}
		 $sql = "select patient_registration.patient_registration_id,area.name as areaname,patient_appointment.appointment_opd_charge_id,user.name as usename,modeofpay.name as modename,patient_appointment.description as dess,appointment_type.name appname,print,if(emergency=0,'No','Yes') as emergency,patient_category.name as patient_catename,insurance_company.name as insurance_name,referral_master.name as referralname,occupation,source.name as sourcename,address,city.name as cityname,DATE_FORMAT(dob,'%d/%m/%Y') AS dob,CONCAT(`fname`,' ', `lname`) AS pname,gender,mrdno,ageyy,agemm,patient_registration.mobileno,doctors_registration.name as docname,
		DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_time, opdcharge.amount as grand_total, patient_appointment.invoice_number,insurance_company.name as insurance,opdcharge.name as particular
		from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
		inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id 
		inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
		left join insurance_company on patient_registration.insurance_company_id=insurance_company.insurance_company_id
		left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
		left join city on patient_registration.city=city.city_id
		left join area on patient_registration.area_id=area.area_id
		left join source on patient_appointment.source=source.source_id
		left join user on user.user_id=patient_appointment.login_id
		left join referral_master on referral_master.referral_master_id=patient_registration.referral_masters_id
		left join  patient_category on patient_appointment.patient_category_id=patient_category.patient_category_id
		left join  appointment_type on patient_appointment.apponitment_type_id=appointment_type.appointment_type_id
		where patient_appointment.cancel_flag=0 and billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate' and  patient_appointment.patient_registration_id  NOT IN (select patient_registration_id from patient_registration  where entry_date between '$sum_fromdate' and '$sum_todate') and  patient_registration.office_id= $office_id   $pat  $doc $mod $pattyped  $ar $socs";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}

	public function getsummaryreportmodell($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$particular,$charge_type_id)
	{
		if($charge_type_id=='' || $charge_type_id==1){
		$pat=$doc=$patapopd='';	
		if($patient_id>0)
		{
			$pat=' and patient_registration.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and patient_appointment.doctor_id='.$doctor_id;
		}
		if($charge_type_id==1)
		{
			if($particular>0){
			$patapopd= '  and  patient_appointment.appointment_opd_charge_id='.$particular;
				}
		}
		$sql = "select modeofpay.name as modename,patient_appointment.description as dess,appointment_type.name appname,print,if(emergency=0,'No','Yes') as emergency,patient_category.name as patient_catename,insurance_company.name as insurance_name,referral_master.name as referralname,occupation,source.name as sourcename,address,city.name as cityname,DATE_FORMAT(dob,'%d/%m/%Y') AS dob,CONCAT(`fname`,' ', `lname`) AS pname,gender,mrdno,ageyy,agemm,patient_registration.mobileno,doctors_registration.name as docname,
		DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_time, opdcharge.amount as grand_total, patient_appointment.invoice_number,insurance_company.name as insurance,opdcharge.name as particular
		from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
		inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id 
		inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
		left join insurance_company on patient_registration.insurance_company_id=insurance_company.insurance_company_id
		left join city on patient_registration.city=city.city_id
		left join source on patient_appointment.source=source.source_id
		left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
		left join referral_master on referral_master.referral_master_id=patient_registration.referral_masters_id
		left join  patient_category on patient_appointment.patient_category_id=patient_category.patient_category_id
		left join  appointment_type on patient_appointment.apponitment_type_id=appointment_type.appointment_type_id
		where appointment_date between  '$sum_fromdate' and '$sum_todate' and  patient_registration.office_id= $office_id   $pat  $doc  $patapopd";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	  }
	  else
	  {
	  	return array();
	  }
	}

	public function getsummaryreportmodellj($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$particular,$charge_type_id)
	{
		if($charge_type_id=='' || $charge_type_id==1){
		$pat=$doc=$patapopd='';	
		if($patient_id>0)
		{
			$pat=' and patient_registration.patient_registration_id='.$patient_id;
		}
		if($doctor_id>0)
		{
			$doc=' and patient_appointment.doctor_id='.$doctor_id;
		}
		if($charge_type_id==1)
		{
			if($particular>0){
			$patapopd= '  and  patient_appointment.appointment_opd_charge_id='.$particular;
				}
		}
		$sql = "select modeofpay.name as modename,patient_appointment.description as dess,appointment_type.name appname,print,if(emergency=0,'No','Yes') as emergency,patient_category.name as patient_catename,insurance_company.name as insurance_name,referral_master.name as referralname,occupation,source.name as sourcename,address,city.name as cityname,DATE_FORMAT(dob,'%d/%m/%Y') AS dob,CONCAT(`fname`,' ', `lname`) AS pname,gender,mrdno,ageyy,agemm,patient_registration.mobileno,doctors_registration.name as docname,
		DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_time, opdcharge.amount as grand_total, patient_appointment.invoice_number,insurance_company.name as insurance,opdcharge.name as particular
		from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
		inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id 
		inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
		left join insurance_company on patient_registration.insurance_company_id=insurance_company.insurance_company_id
		left join city on patient_registration.city=city.city_id
		left join source on patient_appointment.source=source.source_id
		left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
		left join referral_master on referral_master.referral_master_id=patient_registration.referral_masters_id
		left join  patient_category on patient_appointment.patient_category_id=patient_category.patient_category_id
		left join  appointment_type on patient_appointment.apponitment_type_id=appointment_type.appointment_type_id
		where patient_appointment.cancel_flag=0 and appointment_date between  '$sum_fromdate' and '$sum_todate' and  patient_registration.office_id= $office_id   $pat  $doc  $patapopd";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	  }
	  else
	  {
	  	return array();
	  }
	}
	public function Get_Count_App($rgid)
	{
		$sql = "select count(*) as cnt from patient_appointment where patient_registration_id=$rgid";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	  
	  
	}

   
}