<?php
/**
 * Description of Classification_model
 *
 * @author Prabhu @10/01/2021
 */
class Dashboard_model extends CI_Model{
 public function __construct()
  {
    parent::__construct();
  }
  public function getsalesamount($var_array)
  {
      $sql = "select sum(netamount) as amount  from sales_master where    office_id= ? and sales_date=CURDATE()";
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function getuserdetails_opto($utype,$uname,$loginPaswd)
    {
       $this->optdb = $this->load->database('optdb', TRUE);
      $sql = "select * from user where user_type = ? and username = ? and password= ?";
        $result_row=$this->optdb->query($sql, array($utype,$uname,$loginPaswd)); 
      $res= $result_row->result_array ();
      return $res;
    }
    public function getuserdetails_ph($utype,$uname,$loginPaswd)
    {
       $this->pharmdb = $this->load->database('pharmdb', TRUE);
      $sql = "select * from user where user_type = ? and username = ? and password= ?";
        $result_row=$this->pharmdb->query($sql, array($utype,$uname,$loginPaswd)); 
      $res= $result_row->result_array ();
      return $res;
    }

  public function chklogin_opto($utype,$uname,$loginPaswd)
    {
      $this->optdb = $this->load->database('optdb', TRUE);
      $sql = "select count(*) as cnt from user where user_type = ? and username = ? and password= ?";
      $result_row=$this->optdb->query($sql, array($utype,$uname,$loginPaswd)); 
      $res= $result_row->result_array ();
      return $res;
    }
     public function chklogin_ph($utype,$uname,$loginPaswd)
    {
      $this->pharmdb = $this->load->database('pharmdb', TRUE);
      $sql = "select count(*) as cnt from user where user_type = ? and username = ? and password= ?";
      $result_row=$this->pharmdb->query($sql, array($utype,$uname,$loginPaswd)); 
      $res= $result_row->result_array ();
      return $res;
    }
    public function get_optical_Admin_details()
  {
      $this->optdb = $this->load->database('optdb', TRUE);
      $sql = "select * from user where user_type=1 order by user_id asc limit 1";
      $result_row=$this->optdb->query($sql); 
      $res= $result_row->result_array ();

      return $res;
  }
  public function get_pharmacy_Admin_details()
  {
      $this->pharmdb = $this->load->database('pharmdb', TRUE);
      $sql = "select * from user where user_type=1 order by user_id asc limit 1";
      $result_row=$this->pharmdb->query($sql); 
      $res= $result_row->result_array ();
      
      return $res;
  }
  public function getpendingduebill($var_array)
  {
      $sql = "select count(*) as cnt  from sales_master where    office_id= ? and status=1";
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function get_Admin_details($usertype)
  {
      $sql = "select * from user where user_type=$usertype order by user_id asc limit 1";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function get_Admin_details_Doc($usertype)
  {
      $sql = "select * from user where user_id=$usertype order by user_id asc limit 1";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function Getdoct_user($docid)
  {
      $sql = "select user_id from user where doctor_id=$docid and user_type=2 order by user_id asc limit 1";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function pat_Det_Doc($docid)
  {
    $dte=date('Y-m-d');
       $sql = "SELECT appointment_time,mrdno,patient_appointment.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  where   patient_appointment.doctor_id=$docid and appointment_date='$dte'   order by patient_appointment_id ASC";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function Get_All_Doct_List()
  {
    $sql = "select a.name as docname,a.specialist,a.doctors_registration_id,b.name as spe from doctors_registration a inner join doctor_department b on a.doctor_department_id=b.doctor_department_id  where  a.status=1";
    $result_row=$this->db->query($sql); 
    $res= $result_row->result_array ();
    return $res;
  }
  public function Doctor_App_Status($docid='')
  {
    $wh='';
    if($docid)
    {
      $wh=" where doctors_registration_id=$docid";
    }
      $sql = "select name,doctors_registration_id from doctors_registration  $wh";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
   public function Get_Waiting_opto($docid='')
    {
        $dte=date('Y-m-d');
        $wh='';
      if($docid)
      {
        $wh="  and  doctor_id=$docid";
      }
        $sql = "SELECT count(*) as cnt_status_opto FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='$dte'  $wh  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function Patient_Status_Dash($docid,$curdate,$flag)
    {
     
      $columns="appointment_opd_charge_id,ageyy,rooming,cancel_flag,pat_type,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,token_no,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(status=1,'Active','Deactive') as status,patient_appointment_id";

      $columns1="appointment_opd_charge_id,ageyy,rooming,cancel_flag,pat_type,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,token_no,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(status=1,'Active','Deactive') as status,examination.patient_appointment_id";

        $whr1=" and appointment_date='$curdate'";
        if($docid>0)
        {
          $whr1= " and examination.doctor_id=$docid";
        }
        if($flag==1)
        {
          $whr1=$whr2='';
              if($docid>0)
            {
              $whr1= " and  patient_appointment.doctor_id=$docid";
            }
            if($docid>0)
            {
              $whr2= " and  examination.doctor_id=$docid";
            }
           $sql = "SELECT $columns FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id   where   appointment_date='$curdate'  $whr1  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) union 
           SELECT $columns1 FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id inner join examination on examination.patient_appointment_id=patient_appointment.patient_appointment_id and examination.examination_date=patient_appointment.appointment_date and patient_appointment.patient_registration_id=patient_registration.patient_registration_id  where   appointment_date='$curdate'   and cancel_flag=0 and optho_action=0 and doc_action!=1 and examination_date='$curdate' $whr2";
        }
        if($flag==2)
        {
           $sql = "SELECT $columns1 FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id inner join examination on examination.patient_appointment_id=patient_appointment.patient_appointment_id and examination.examination_date=patient_appointment.appointment_date and patient_appointment.patient_registration_id=patient_registration.patient_registration_id  where   appointment_date='$curdate'   and cancel_flag=0 and optho_action=1 and  confirm_flag=0 and doc_action!=1 and examination_date='$curdate' $whr1";
        }
        if($flag==3)
        {
           $sql = "SELECT $columns1 FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id inner join examination on examination.patient_appointment_id=patient_appointment.patient_appointment_id and examination.examination_date=patient_appointment.appointment_date and patient_appointment.patient_registration_id=patient_registration.patient_registration_id  where   appointment_date='$curdate'   and cancel_flag=0 and optho_action=1 and  confirm_flag=1 and doc_action=0 and examination_date='$curdate' $whr1";
        }
        if($flag==4)
        {
           $sql = "SELECT $columns1 FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id inner join examination on examination.patient_appointment_id=patient_appointment.patient_appointment_id and examination.examination_date=patient_appointment.appointment_date and patient_appointment.patient_registration_id=patient_registration.patient_registration_id  where   appointment_date='$curdate'   and cancel_flag=0 and optho_action=1 and  confirm_flag=1 and doc_action=1 and examination_date='$curdate' $whr1";
        }
        $sql = $sql;
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
  public function Patient_status($userstatus,$staus,$docid='')
  {
      $whr='';
      $whs='';
      if($docid)
      {
        $whs="  and  doctor_id=$docid";
      }
      if($userstatus==1)
      {
        $whr=" and optho_action=$staus and doc_action!=1 and  confirm_flag=0";
      }
      if($userstatus==2)
      {
        $whr=" and optho_action=1 and  confirm_flag=0 and doc_action=1";
      }
      if($userstatus==3)
      {
        $whr=" and optho_action=1 and  confirm_flag=1 and doc_action=$staus";
      }
      $dte=date('Y-m-d');
      $sql = "select count(*) as cnt_patient_status from examination where examination_date='$dte'  $whr  $whs";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function gettotalitem($var_array)
  {
      $sql = "select count(*) as cnt  from item_master where    office_id= ?";
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function gettotalcustomer($var_array)
  {
      $sql = "select count(*) as cnt  from customer where    office_id= ?";
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function crossdocst_cnt_model($cdate)
  {
      $sql = "select count(*) as cnt  from examination where    cross_date= '$cdate'";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function rooming_change_Update($appid)
  {
      $sql = "update patient_appointment set rooming=1 where    patient_appointment_id = $appid";
      $result_row=$this->db->query($sql); 
      return TRUE;
  }
  public function Getcross_rreddata($serdate,$doc)
  {
    $docs='';
    if($doc>0)
    {
      $docs="  and cross_doctor_id=$doc";
    }
      $sql = "select DATE_FORMAT(cross_date,'%d/%m/%Y') AS cross_date,cross_description,cross_doctor_id,examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  cross_date='$serdate' and cross_status=1 $docs";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
}