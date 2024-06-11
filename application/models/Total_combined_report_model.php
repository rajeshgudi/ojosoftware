<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @16/07/2022
 */
class Total_combined_report_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}
	public function getsummaryreportmodel_op($sum_fromdate,$sum_todate,$sum_customer,$sum_modeofpay,$officeid,$staff,$status,$supplier_id)
  {
	$this->db = $this->load->database('optdb', TRUE);
    $sup='';
    if($supplier_id)
    {
      $sup= ' and sales_master.supplier_id='.$supplier_id;
    }
    $cus='';
    if($sum_customer)
    {
      $cus= ' and sales_master.customer_id='.$sum_customer;
    }
    $mode='';
    if($sum_modeofpay)
    {
      $mode= ' and sales_master.modeofpay_id='.$sum_modeofpay;
    }
$staffcond='';
     if($staff)
    {
      $staffcond= ' and  staff.staff_id='.$staff;
    }
$stacond='';
     if($status)
    {
      $stacond= ' and sales_master.status='.$status;
    }
    $dte=" and payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'";
      if($status==2)
      {
        $dte= " and payment_details.payment_date>= '$sum_fromdate' AND payment_details.payment_date <='$sum_todate'";
      }
    $sql = "select payment_details.cash,payment_details.card,payment_details.paytm,payment_details.others,sales_master.advanced_amount,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,sales_master.status as sts,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where  sales_master.office_id=$officeid  $cus  $mode  $staffcond  $stacond $dte $sup  group by payment_details.sales_id";
      $result_row=$this->db->query($sql); 
    //  echo $this->db->last_query();exit;
    $res= $result_row->result_array ();
    return $res;
  }
   public function getincomemdl_counter($sum_fromdate,$sum_todate)
  {
      $this->db = $this->load->database('optdb', TRUE);
      $sql = "select user.name as usernamef,staff.name as staffname,invoice_number,counter_sales_id,netamount,DATE_FORMAT(sales_date,'%d/%m/%Y') AS payment_date,modeofpay.name as  mode,customer.name as cusname from counter_sales_master inner join customer on counter_sales_master.customer_id=customer.customer_id 
left join staff on counter_sales_master.staff_id=staff.staff_id
inner join user on user.user_id=counter_sales_master.login_id
      inner join modeofpay on modeofpay.modeofpay_id=counter_sales_master.modeofpay_id where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' ";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function getcountofpayment($sales_id)
  {
	$this->db = $this->load->database('optdb', TRUE);
      $sql = "select count(*) as CNT from payment_details where sales_id=$sales_id";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function getmodedata($sum_fromdate,$sum_todate,$sales_id)
  {
	$this->db = $this->load->database('optdb', TRUE);
      $sql = "select modeofpay.name,advanced_amount from payment_details inner join modeofpay on modeofpay.modeofpay_id=payment_details.mode_id where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate' and sales_id='$sales_id'";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
public function getopticalmodel($office_id,$modeid='')
  {
  	$this->optdb = $this->load->database('optdb', TRUE);
  	$mode='';
  	if($modeid>0)
  	{
  		$mode= '  and modeofpay_id='.$modeid;
  	}
      $sql = "select name,modeofpay_id from modeofpay where office_id=$office_id and status=1 and name!='M PAYMENT'  $mode";
      $result_row=$this->optdb->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function getsummaryreportmodel_ph($sum_fromdate,$sum_todate,$sum_customer,$sum_modeofpay,$officeid,$staff,$status,$supplier_id)
  {
	$this->db = $this->load->database('pharmdb', TRUE);
    $sup='';
    if($supplier_id)
    {
      $sup= ' and sales_master.supplier_id='.$supplier_id;
    }
    $cus='';
    if($sum_customer)
    {
      $cus= ' and sales_master.customer_id='.$sum_customer;
    }
    $mode='';
    if($sum_modeofpay)
    {
      $mode= ' and sales_master.modeofpay_id='.$sum_modeofpay;
    }
$staffcond='';
     if($staff)
    {
      $staffcond= ' and  staff.staff_id='.$staff;
    }
$stacond='';
     if($status)
    {
      $stacond= ' and sales_master.status='.$status;
    }
    $dte=" and sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'";
      if($status==2)
      {
        $dte= " and payment_details.payment_date>= '$sum_fromdate' AND payment_details.payment_date <='$sum_todate'";
      }
    $sql = "select credit_bill_payment,cash,card,paytm,others,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master  inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where  sales_master.office_id=$officeid  $cus  $mode  $staffcond  $stacond $dte $sup ";
      $result_row=$this->db->query($sql); 
    //  echo $this->db->last_query();exit;
    $res= $result_row->result_array ();
    return $res;
  }

  public function getpharmacymodel($office_id,$modeid='')
  {
  	$this->pharmdb = $this->load->database('pharmdb', TRUE);
  	$mode='';
  	if($modeid>0)
  	{
  		$mode= '  and modeofpay_id='.$modeid;
  	}
      $sql = "select name,modeofpay_id from modeofpay where office_id=$office_id and status=1 and name!='M PAYMENT'  $mode";
      $result_row=$this->pharmdb->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function getemrmodel($office_id,$modeid='')
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
	
    public function getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay)
	{
		$pat=$doc=$mod='';	
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
	 	$sql = "select CONCAT(`fname`,' ', `lname`) AS pname,adjusted_amount_paid,DATE_FORMAT(billing_master.adjustment_time_paid,'%d/%m/%Y') AS adjustment_time_paid,cash,card,paytm,others,doctors_registration.name as docname,DATE_FORMAT(billing_master.billing_date,'%d/%m/%Y') AS bill_date,billing_time,billing_master.invoice_number,modeofpay.name as mode,mrdno,grand_total,advanced_amount from 
			billing_master 
			left join patient_registration on billing_master.patient_registration_id=patient_registration.patient_registration_id  
			left join doctors_registration on doctors_registration.doctors_registration_id=billing_master.doctor_id 
			left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
			where billing_date between  '$sum_fromdate' and  '$sum_todate' and  billing_master.office_id= $office_id   $pat  $doc $mod ";
		
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