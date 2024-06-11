<?php
/**
 * Description of Collection_report_model
 *
 * @author Prabhu @12/11/2023
 */
class Collection_report_model extends CI_Model{
 public function __construct()
  {
    parent::__construct();
  }
  
   public function Get_billing_transaction($fromdate,$todate,$patient_id)
   {
    $pat='';
    if($patient_id>0)
    {
      $pat=' and patient_registration.patient_registration_id='.$patient_id;
    }
   
    $sql = "SELECT mrdno,billing_master_id,billing_master.invoice_number,CONCAT(fname , '',  lname ,'') AS pateint_name,DATE_FORMAT(billing_date,'%d/%m/%Y') AS billing_date,bill_amount,advanced_amount,(bill_amount-(adjusted_amount_paid+advanced_amount)) as pending,grand_total,modeofpay.name as mode FROM billing_master left join patient_registration on patient_registration.patient_registration_id=billing_master.patient_registration_id left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id  where billing_date between  '$fromdate' and '$todate' $pat ";
    $result_row=$this->db->query($sql); 
    $res= $result_row->result_array ();
    $this->logger->save($this->db);
    return $res;
   }
   public function Get_billing_transaction_IND($fromdate,$todate,$patient_id,$pat_reg_id)
   {
    $pat='';
    if($patient_id>0)
    {
      $pat=' and patient_registration.patient_registration_id='.$patient_id;
    }
   
    $sql = "SELECT mrdno,billing_master_id,billing_master.invoice_number,CONCAT(fname , '',  lname ,'') AS pateint_name,DATE_FORMAT(billing_date,'%d/%m/%Y') AS billing_date,bill_amount,advanced_amount,(bill_amount-(adjusted_amount_paid+advanced_amount)) as pending,grand_total,modeofpay.name as mode FROM billing_master left join patient_registration on patient_registration.patient_registration_id=billing_master.patient_registration_id left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id  where  billing_master.patient_registration_id=$pat_reg_id and  billing_date between  '$fromdate' and '$todate' $pat ";
    $result_row=$this->db->query($sql); 
    $res= $result_row->result_array ();
    $this->logger->save($this->db);
    return $res;
   }
    public function Get_INS_billing_transaction($fromdate,$todate,$patient_id)
   {
    $pat='';
    if($patient_id>0)
    {
      $pat=' and patient_registration.patient_registration_id='.$patient_id;
    }
   
    $sql = "SELECT mrdno,insurance_billing_master.insurance_billing_master_id as billing_master_id,insurance_billing_master.invoice_number,CONCAT(fname , '',  lname ,'') AS pateint_name,DATE_FORMAT(billing_date,'%d/%m/%Y') AS billing_date,bill_amount,advanced_amount,(bill_amount-(adjusted_amount_paid+advanced_amount)) as pending,grand_total,modeofpay.name as mode FROM insurance_billing_master left join patient_registration on patient_registration.patient_registration_id=insurance_billing_master.patient_registration_id left join modeofpay on insurance_billing_master.modeofpay_id=modeofpay.modeofpay_id  where billing_date between  '$fromdate' and '$todate' $pat ";
    $result_row=$this->db->query($sql); 
    $res= $result_row->result_array ();
    $this->logger->save($this->db);
    return $res;
   }
    public function Get_examination_Screen($fromdate,$todate,$patient_id)
    {
        $pat='';
        if($patient_id>0)
        {
          $pat=' and patient_registration.patient_registration_id='.$patient_id;
        }
        $sql = "select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where examination_date between  '$fromdate' and '$todate' $pat";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function Get_sales_Screen($fromdate,$todate,$patient_id)
    {
      $this->opt = $this->load->database('optdb', TRUE);
        $pat='';
        if($patient_id>0)
        {
          $getmrnoval=$this->Get_mrdno($patient_id);
          if($getmrnoval)
          {
            $mrdno=$getmrnoval[0]['mrdno'];
            $pat=" and customer.mrd='$mrdno'";
          }
        }
         $sql = "select sales_master.description,payment_details.cash,payment_details.card,payment_details.paytm,payment_details.others,sales_master.advanced_amount,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,sales_master.status as sts,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where   payment_details.payment_date>= '$fromdate' AND payment_details.payment_date <='$todate'  $pat  group by payment_details.sales_id";
        $result_row=$this->opt->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
     public function Get_sales_Screen_MUL($fromdate,$todate,$patient_id)
    {
      $this->opt = $this->load->database('optdb', TRUE);
        $pat='';
        if($patient_id>0)
        {
          $getmrnoval=$this->Get_mrdno($patient_id);
          if($getmrnoval)
          {
            $mrdno=$getmrnoval[0]['mrdno'];
            $pat=" and customer.mrd='$mrdno'";
          }
        }
         $sql = "select sales_master.description,payment_details.cash,payment_details.card,payment_details.paytm,payment_details.others,sales_master.advanced_amount,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,sales_master.status as sts,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where   payment_details.payment_date>= '$fromdate' AND payment_details.payment_date <='$todate'  $pat and customer.mrd ='' group by payment_details.sales_id";
        $result_row=$this->opt->query($sql); 
       // echo $this->opt->last_query();exit;
        $res= $result_row->result_array ();
        return $res;
    }
     public function Get_sales_Screen_IND($fromdate,$todate,$patient_id,$mrdno)
    {
      $this->opt = $this->load->database('optdb', TRUE);
        $pat='';
         $pat=" and customer.mrd='$mrdno'";
         $sql = "select sales_master.description,payment_details.cash,payment_details.card,payment_details.paytm,payment_details.others,sales_master.advanced_amount,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,sales_master.status as sts,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where   payment_details.payment_date>= '$fromdate' AND payment_details.payment_date <='$todate'  $pat  group by payment_details.sales_id";
        $result_row=$this->opt->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
     public function Get_sales_Screen_ph($fromdate,$todate,$patient_id)
    {
      $this->ph = $this->load->database('pharmdb', TRUE);
        $pat='';
        if($patient_id>0)
        {
          $getmrnoval=$this->Get_mrdno($patient_id);
          if($getmrnoval)
          {
            $mrdno=$getmrnoval[0]['mrdno'];
            $pat=" and customer.mrd='$mrdno'";
          }
        }
         $dte = " and sales_date >= '$fromdate' AND sales_date <= '$todate'";
          $sql = "select sales_master.doctor_id,sales_master.sales_entry_description, credit_bill_payment,cash,card,paytm,others,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master  inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where  1=1  $dte $pat";
        $result_row=$this->ph->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
     public function Get_sales_Screen_ph_MUL($fromdate,$todate,$patient_id)
    {
      $this->ph = $this->load->database('pharmdb', TRUE);
        $pat='';
        if($patient_id>0)
        {
          $getmrnoval=$this->Get_mrdno($patient_id);
          if($getmrnoval)
          {
            $mrdno=$getmrnoval[0]['mrdno'];
            $pat=" and customer.mrd='$mrdno'";
          }
        }
         $dte = " and sales_date >= '$fromdate' AND sales_date <= '$todate'";
          $sql = "select sales_master.doctor_id,sales_master.sales_entry_description, credit_bill_payment,cash,card,paytm,others,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master  inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where  1=1  $dte $pat and customer.mrd =''";
        $result_row=$this->ph->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
     public function Get_sales_Screen_ph_IND($fromdate,$todate,$patient_id,$mrdno)
    {
      $this->ph = $this->load->database('pharmdb', TRUE);
        $pat='';
       
        $pat=" and customer.mrd='$mrdno'";
         $dte = " and sales_date >= '$fromdate' AND sales_date <= '$todate'";
          $sql = "select sales_master.doctor_id,sales_master.sales_entry_description, credit_bill_payment,cash,card,paytm,others,supplier.name as supname,staff.name as staffname,if(sales_master.status=1,'Inprogress','Delivered') as status,customer.name as cusname,DATE_FORMAT(sales_date,'%d/%m/%Y') AS sales_date,invoice_number,user.username username,modeofpay.name as mode,netamount,total_qty,sales_master.discount_amount,sales_master.sales_id from sales_master  inner join customer on sales_master.customer_id=customer.customer_id inner join modeofpay on modeofpay.modeofpay_id=sales_master.modeofpay_id inner join user on user.user_id=sales_master.login_id left join staff on sales_master.staff_id=staff.staff_id left join supplier on supplier.supplier_id=sales_master.supplier_id where  1=1  $dte $pat";
        $result_row=$this->ph->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    function Get_mrdno($patient_id)
    {

        $sql = "select mrdno from patient_registration where patient_registration_id=$patient_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function GetData($var_array)
  {
     $this->db = $this->load->database('optdb', TRUE);
    $sql = "select * from customer where    customer_id=? and  office_id= ?";
    $result_row=$this->db->query($sql, $var_array); 
    $res= $result_row->result_array ();
    return $res;
  }
     function print_bill($sales_id,$office_id,$supplier_id='')
  {
    $this->db = $this->load->database('optdb', TRUE);
    $sales=$this->db->get_where('sales_master',"sales_id=$sales_id")->row();
    $data['logo'] = "";
    $office_id=$sales->office_id;
    $office=$this->db->get_where('office',"office_id=$office_id")->row();
    $data['logo']=($office->logo=='')?'':"<img style='width:10%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";
     $data['rvlogo']=($office->logo=='')?'':"<img style='width:15%;' src='". base_url('images/profile/')."$office->logo'>";
    
    $data['company_name']=$office->printable_company_name;
    $data['regname']=$office->registered_name;
    $data['company_address']=$office->printable_company_address;
    $data['company_mobile']=$office->printable_company_mobile;
    $data['company_land_phone']=$office->printable_company_phone;
    $data['company_email']=$office->printable_emailid;
    $data['company_gst']=$office->license_no;
    $data['print_declaration']=$office->declaration;
    $data['gstin_no']=$office->gstin_no;
    // $data['acc_holder_name']=$office->acc_holder_name;
    // $data['acc_no']=$office->acc_no;
    // $data['ifsc_code']=$office->ifsc_code;
    // $data['branch_name']=$office->branch_name;
    // $data['bank_name']=$office->bank_name;

    $customer=$this->db->get_where('customer',"customer_id in (select customer_id from sales_master where sales_id=$sales_id)")->row();
    $data['customer_name']=$customer->name;
    $data['customer_address']=$customer->address;
    $data['customer_email']=$customer->email_id;
    
    $data['mrd']=$customer->mrd;

    $sales=$this->db->get_where('sales_master',"sales_id=$sales_id")->row();
    $data['paying_amount']=$sales->advanced_amount;
    $data['balance_amount']=$sales->balance_amount;
    if($sales->description)
    {
      $data['customer_land_phone']=$customer->mobile.'<br/> <b>Description:'.$sales->description.'</b>';
    }
    else {
      $data['customer_land_phone']=$customer->mobile;
    }
  
    $data['sales']=$sales;

    $mode_id=$sales->modeofpay_id;
    $data['mode']=$this->db->get_where('modeofpay',"modeofpay_id=$mode_id")->row()->name;
    if($sales->supplier_id>0)
    {
     $data['suppliername']=$this->db->get_where('supplier',"supplier_id=$sales->supplier_id")->row()->name;
    }
    else
    {
      $data['suppliername']='';
    }

    $data['invoice_number']=$sales->invoice_number;
    $sdate=date_create($sales->sales_date);
    if($sales->credit_name)
    {
      $data['sales_date']=date_format($sdate,"d/m/Y").'<br/><b>Credit Name:'.$sales->credit_name.'</b>';
    }
    else {
      $data['sales_date']=date_format($sdate,"d/m/Y");
    }
    

    $data['other_charge']=$sales->other_charge; 
    $data['description']=$sales->description; 
    $data['total_amount']=$sales->total_amount;
    $data['total_cgst']=$sales->total_cgst;
    $data['total_sgst']=$sales->total_sgst;
    $data['total_discount']=$sales->discount_amount;
    $data['total_gst']=$sales->total_cgst+$sales->total_sgst;
    $data['net_amount']=$sales->netamount;
    $data['net_amount_in_words']= $this->numberTowords($sales->netamount);
    $company_name=$office->printable_company_name;
    $data['round_off']= $sales->roundoff;
    $staff_id=$sales->staff_id;

    $data['staffname']=$this->db->get_where('staff',"staff_id=$staff_id")->row()->name;
    $sdate=date_create($sales->expected_del_date);

   $paymentnoss=$this->db->query("select count(payment_details.sales_id) as paymentnos,sales_master.expected_del_date,sales_master.status  from payment_details  inner join sales_master on payment_details.sales_id=sales_master.sales_id where payment_details.sales_id=$sales_id")->row();
   if($paymentnoss->paymentnos==1){
     $new_date ='';
      
      $sdate=date_create($paymentnoss->expected_del_date);
      $dtee=date_format($sdate,"d/m/Y");
      if($sales->status==2){
        $new_date = date('h:i A', strtotime($sales->sales_time));
        $new_date=$new_date;
      }
      $data['expected_del_date']="".$dtee." ". $new_date;
    }
    else
    {
      $new_date ='';
      date_default_timezone_set("Asia/Calcutta"); 
      $sdatess=$this->db->query("select payment_details.payment_time,payment_details.payment_date  from payment_details  inner join sales_master on payment_details.sales_id=sales_master.sales_id where payment_details.sales_id=$sales_id order by payment_details.payment_id DESC limit 1")->row();
     if($sdatess->payment_time){
      $new_date = date('h:i a', strtotime($sdatess->payment_time));
      }
     $sdate=date_create($sdatess->payment_date);
     $dtee=date_format($sdate,"d/m/Y");
      $data['expected_del_date']="".$dtee."  ". $new_date;
    }
    
    $var_array=array($customer->customer_id,1);
    $getresult=$this->GetData($var_array);
    
    if($getresult[0]['resph1'])
    {
      $val=$getresult[0]['resph1'];
      $clr1='';
    }
    else
    {
      $val='.';
      $clr1="color:#fff;";

    }

    if($getresult[0]['resph2'])
    {
      $val2=$getresult[0]['resph2'];
       $clr2='';
    }
    else
    {
      $val2='.';
      $clr2="color:#fff;";
    }

    if($getresult[0]['resph3'])
    {
      $val3=$getresult[0]['resph3'];
      $clr3='';
    }
    else
    {
      $val3='.';
      $clr3="color:#fff;";
    }
    if($getresult[0]['resph4'])
    {
      $val4=$getresult[0]['resph4'];
      $clr4='';
    }
    else
    {
      $val4='.';
      $clr4="color:#fff;";
    }
    $data['customer_eye']=' <table width="100%" style="font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">
                                        <tr>
                                            <td align="center" class="tab_tit">RE</td>
                                            <td align="center" class="tab_tit">LE</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px;">
                                                <table border="1" width="100%">
                                                    <tr style="padding: 0px;">
                                                        <td></td>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit" >D.V</td>
                                                        <td style="padding:5px;'.$clr1.'" align="center">'.$val.'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['recyl1'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reaxis1'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reva1'].'</td>
                                                    </tr>
                                                     <tr>
                                                        <td  class="tab_tit">N.V</td>
                                                        <td style="padding:5px;'.$clr2.'" align="center">'.$val2.'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['recyl2'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reaxis2'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reva2'].'</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="padding: 0px;">
                                                <table class="" border="1" width="100%">
                                                    <tr style="padding: 0px;">
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;'.$clr3.'" align="center">'.$val3.'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['recyl3'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reaxis3'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reva3'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;'.$clr4.'" align="center">'.$val4.'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['recyl4'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reaxis4'].'</td>
                                                        <td style="padding:5px;" align="center">'.$getresult[0]['reva4'].'</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>';
    $data['sales_details']=$this->db->query("select sales_details.*,stock.mrp as stockmrp,item_master.hsn_code,item_master.category_id,if(sales_details.product_type=0,item_master.name,lens_master.name) as itemname,(sales_details.cgst+sales_details.sgst) as tax_value,if((item_master.tax>0),tax_master.name,0) as taxv ,product_type,stock.frame_model
      from sales_details
       inner join stock on sales_details.stock_id=stock.stock_id
        left join item_master on sales_details.item_id=item_master.item_id and sales_details.product_type=0
        left join lens_master on sales_details.item_id=lens_master.lens_master_id and sales_details.product_type=1
         left join tax_master on item_master.tax=tax_master.tax_id 
         where sales_details.sales_id=$sales_id order by sales_details.sales_details_id ASC")->result();

     $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
    if($host_tvm=='abyopticals' || $host_tvm=='sriganapathiopticals')
    {
      $data['sales_details']=$this->db->query("select sales_details.*,stock.mrp as stockmrp,item_master.hsn_code,item_master.category_id,if(sales_details.product_type=0,item_master.name,lens_master.name) as itemname,(sales_details.cgst+sales_details.sgst) as tax_value,if((item_master.tax>0),tax_master.name,0) as taxv ,product_type,stock.frame_model
      from sales_details
       left join stock on sales_details.stock_id=stock.stock_id
        left join item_master on sales_details.item_id=item_master.item_id and sales_details.product_type=0
        left join lens_master on sales_details.item_id=lens_master.lens_master_id and sales_details.product_type=1
         left join tax_master on item_master.tax=tax_master.tax_id 
         where sales_details.sales_id=$sales_id order by sales_details.sales_details_id ASC")->result();
    }
    else
    {
       $data['sales_details']=$this->db->query("select sales_details.*,stock.mrp as stockmrp,item_master.hsn_code,item_master.category_id,if(sales_details.product_type=0,item_master.name,lens_master.name) as itemname,(sales_details.cgst+sales_details.sgst) as tax_value,if((item_master.tax>0),tax_master.name,0) as taxv ,product_type,stock.frame_model
      from sales_details
       inner join stock on sales_details.stock_id=stock.stock_id
        left join item_master on sales_details.item_id=item_master.item_id and sales_details.product_type=0
        left join lens_master on sales_details.item_id=lens_master.lens_master_id and sales_details.product_type=1
         left join tax_master on item_master.tax=tax_master.tax_id 
         where sales_details.sales_id=$sales_id order by sales_details.sales_details_id ASC")->result();
    }

    $advanceamount=$this->db->query("select sum(advanced_amount) as advanced_amount  from payment_details where  sales_id=$sales_id and office_id= $office_id")->row();
    if($advanceamount->advanced_amount>0)
    {
      $addamnt=$advanceamount->advanced_amount;
    }
    else
    {
      $addamnt=0;
    }
    $data['adamount']=$addamnt;

    $lastpaidamount=$this->db->query("select  advanced_amount  from payment_details where  sales_id=$sales_id and office_id= $office_id order by payment_id DESC limit 1")->row();
    
    if($lastpaidamount->advanced_amount>0)
    {
      $paidamnt=$lastpaidamount->advanced_amount;
    }
    else
    {
      $paidamnt=0;
    }
    $data['paidamnt']=$paidamnt;
error_reporting(0);
$this->load->model('Sales_report_model');
    ////new 
    $data['advanced_amount']=0;
            $data['delamt']=0;
            $data['bal']=0;
            if($sales->status==1 || $sales->status==3)
            {
                $getcntval=$this->Sales_report_model->getcountofpayment($sales->sales_id);
                if($getcntval[0]['CNT']==1)
                {
                    if($sales->advanced_amount)
                    {
                        $data['bal']=$sales->netamount-$sales->advanced_amount;
                        $data['advanced_amount']=$sales->advanced_amount;
                        $data['delamt']=0;
                    }
                    else
                    {
                        $data['bal']=$sales->netamount;
                    }
                    
                }
                else
                {
                    $advancecreditamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount  from payment_details inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id inner join sales_master on payment_details.sales_id=sales_master.sales_id   where  payment_details.sales_id=$sales_id  ")->row();



                    if($advancecreditamount->advanced_amount)
                    {
                        $data['bal']=0;
                        $data['advanced_amount']=$sales->advanced_amount;
                        $data['delamt']=$advancecreditamount->advanced_amount-$sales->advanced_amount;
                    }
                    else
                    {
                        $data['bal']=0;
                        $data['advanced_amount']=0;
                        $data['delamt']=$sales->netamount;
                    }
                }
            }
            else
            {
                $getcntval=$this->Sales_report_model->getcountofpayment($sales->sales_id);
                if($getcntval[0]['CNT']==1)
                {
                    if($sales->advanced_amount)
                    {
                        $data['bal']=0;
                        $data['advanced_amount']=$sales->advanced_amount;
                        $data['delamt']=0;
                    }
                    else
                    {
                        $data['bal']=$sales->netamount;

                    }
                    
                }
                else
                {
                    $advancecreditamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount  from payment_details inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id inner join sales_master on payment_details.sales_id=sales_master.sales_id   where payment_details.sales_id=$sales_id  ")->row();

                    if($advancecreditamount->advanced_amount)
                    {
                        $data['bal']=0;
                        $data['advanced_amount']=$sales->advanced_amount;
                        $data['delamt']=$advancecreditamount->advanced_amount-$sales->advanced_amount;
                    }
                    else
                    {
                        $data['bal']=0;
                        $data['advanced_amount']=0;
                        $data['delamt']=$sales->netamount;
                    }
                }
                
            }

   

    $printpage='dehopticalprint';
    $html=$this->load->view("transaction/sales/$printpage",$data, true); 
                   $print_config=[
                                    'format' => 'A4',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 10,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];


            $mpdf = new \Mpdf\Mpdf($print_config);

            $pdfFilePath ="print-".time().".pdf"; 

            $labName='';

            $mpdf->SetWatermarkText($labName,0.03);

            $mpdf->showWatermarkText = true;

            $mpdf -> SetDisplayMode('fullpage');

            $mpdf->WriteHTML($html);

            $mpdf->Output();
           
            
  }
  function print_bill_ph($sales_id, $office_id, $supplier_id = '')
  {
    $this->db = $this->load->database('pharmdb', TRUE);
    $sales = $this->db->get_where('sales_master', "sales_id=$sales_id")->row();
    $data['logo'] = "";
    $office_id = $sales->office_id;
    $office = $this->db->get_where('office', "office_id=$office_id")->row();
    $data['logo'] = ($office->logo == '') ? '' : "<img style='width:50%;max-height:100px' src='" . base_url('images/profile/') . "$office->logo'>";
    $data['qulogo'] = $office->logo;
    $data['rvlogo']=($office->logo=='')?'':"<img style='width:15%;' src='". base_url('images/profile/')."$office->logo'>";
    $data['company_name'] = $office->printable_company_name;
    $data['regname'] = $office->registered_name;
    $data['company_address'] = $office->printable_company_address;
    $data['company_mobile'] = $office->printable_company_mobile;
    $data['company_land_phone'] = $office->printable_company_phone;
    $data['company_email'] = $office->printable_emailid;
    $data['company_gst'] = $office->license_no;
    $data['print_declaration'] = $office->declaration;
    $data['gstin_no'] = $office->gstin_no;
    $data['drug_license_no1'] = $office->drug_license_no1;
    $data['drug_license_no2'] = $office->drug_license_no2;
    // $data['acc_holder_name']=$office->acc_holder_name;
    // $data['acc_no']=$office->acc_no;
    // $data['ifsc_code']=$office->ifsc_code;
    // $data['branch_name']=$office->branch_name;
    // $data['bank_name']=$office->bank_name;

    $customer = $this->db->get_where('customer', "customer_id in (select customer_id from sales_master where sales_id=$sales_id)")->row();
    $data['customer_name'] = $customer->name;
    $data['customer_address'] = $customer->address;
    $data['customer_email'] = $customer->email_id;
    $data['customer_land_phone'] = $customer->mobile;
    $data['mrd'] = $customer->mrd;

    $sales = $this->db->get_where('sales_master', "sales_id=$sales_id")->row();
    $data['paying_amount'] = $sales->advanced_amount;
    $data['balance_amount'] = $sales->balance_amount;
    $data['sales'] = $sales;

    $data['credit_company_name'] = $this->db->get_where('sales_master', "sales_id=$sales_id")->row()->credit_company;

    $mode_id = $sales->modeofpay_id;
    $data['mode'] = $this->db->get_where('modeofpay', "modeofpay_id=$mode_id")->row()->name;
    if ($sales->supplier_id > 0) {
      $data['suppliername'] = $this->db->get_where('supplier', "supplier_id=$sales->supplier_id")->row()->name;
    } else {
      $data['suppliername'] = '';
    }
    $data['doctorname'] = $this->db->get_where('staff', "staff_id=$sales->doctor_id")->row()->name;
    $data['invoice_number'] = $sales->invoice_number;
    $sdate = date_create($sales->sales_date);
    $data['sales_date'] = date_format($sdate, "d/m/Y");
    $data['mode'] = $this->db->get_where('modeofpay', "modeofpay_id=$sales->modeofpay_id")->row()->name;
    $data['other_charge'] = $sales->other_charge;
    $data['total_amount'] = $sales->total_amount;
    $data['total_cgst'] = $sales->total_cgst;
    $data['total_sgst'] = $sales->total_sgst;
    $data['total_discount'] = $sales->discount_amount;
    $data['total_gst'] = $sales->total_cgst + $sales->total_sgst;
    $data['net_amount'] = $sales->netamount;
    $data['net_amount_in_words'] = $this->numberTowords($sales->netamount);
    $company_name = $office->printable_company_name;
    $data['round_off'] = $sales->roundoff;
    $staff_id = $sales->staff_id;
    $doctor_id = $sales->doctor_id;
    if ($doctor_id > 0) {
      $data['docname'] = $this->db->get_where('staff', "staff_id=$doctor_id")->row()->name;
    } else {
      $data['docname'] = '';
    }

    $data['staffname'] = $this->db->get_where('staff', "staff_id=$staff_id")->row()->name;
    $sdate = date_create($sales->expected_del_date);


    $data['sales_details'] = $this->db->query("select item_master.hsn_master_id,stock.batchno,item_master.name as itemname,sales_details.*,stock.mrp as stockmrp,(sales_details.cgst+sales_details.sgst) as tax_value,if((item_master.tax>0),tax_master.name,0) as taxv ,DATE_FORMAT(stock.expirydate,'%m/%Y') AS expirydate
      from sales_details
       inner join stock on sales_details.stock_id=stock.stock_id
        left join item_master on sales_details.item_id=item_master.item_id
         left join tax_master on item_master.tax=tax_master.tax_id 
         where sales_details.sales_id=$sales_id order by sales_details.sales_details_id ASC")->result();

   $printpage = 'dehpharmprint';

    $html = $this->load->view("transaction/sales/$printpage", $data, true);
     $print_config = [
        'format' => 'A5',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 10,
        'margin_bottom' => 10,
        'margin_header' => 0,
        'margin_footer' => 0,
      ];

   

    $mpdf = new \Mpdf\Mpdf($print_config);
    $pdfFilePath = "print-" . time() . ".pdf";
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
   $mpdf->Output();
    
  }

  function numberTowords($number)
{

    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? '' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . ' ' : '') . $paise. " Only";

}  

}