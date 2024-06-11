<?php

use SebastianBergmann\Environment\Console;

/**

 * Description of patient_category_model

 *

 * @author Prabhu @29/09/2021

 */

class Examination_model extends CI_Model{

 public function __construct()

    {

        parent::__construct();

    }

    public function getSalesSearchStock($product)
  {
    $this->pharmdb = $this->load->database('pharmdb', TRUE);
    $sql = "select  DATEDIFF(stock.expirydate, CURDATE())
         AS days,stock.expirydate as extd,stock.stock_id,stock.item_id,gst_type,tax_master.name as taxval,stock.batchno,DATE_FORMAT(stock.expirydate,'%m/%Y') AS expirydate,item_master.name as name,item_master.code,stock.mrp,stock.selling_price/purchase_details.pack as selling_price,stock.quantity  from item_master inner join stock on item_master.item_id=stock.item_id 
left join composition on composition.composition_id=item_master.composition_id
          left join tax_master on item_master.tax=tax_master.tax_id left join purchase_details on stock.item_id=purchase_details.item_id and purchase_details.batchno=stock.batchno and purchase_details.expirydate=stock.expirydate where stock.quantity>0 and   (item_master.name like '%$product%' or composition.name like '%$product%')  group by stock.item_id,stock.mrp,stock.selling_price,stock.batchno,stock.expirydate";
    $result_row = $this->pharmdb->query($sql);
    $res = $result_row->result_array();
    return $res;
  }
   public function Get_selected_Items($stockid)
  {
    $this->pharmdb = $this->load->database('pharmdb', TRUE);
    $sql = "select  DATEDIFF(stock.expirydate, CURDATE())
         AS days,stock.expirydate as extd,stock.stock_id,stock.item_id,gst_type,tax_master.name as taxval,stock.batchno,DATE_FORMAT(stock.expirydate,'%m/%Y') AS expirydate,item_master.name as name,item_master.code,stock.mrp,stock.selling_price/purchase_details.pack as selling_price,stock.quantity  from item_master inner join stock on item_master.item_id=stock.item_id  left join tax_master on item_master.tax=tax_master.tax_id left join purchase_details on stock.item_id=purchase_details.item_id and purchase_details.batchno=stock.batchno and purchase_details.expirydate=stock.expirydate where stock.quantity>0 and   stock.stock_id = '$stockid'  group by stock.item_id,stock.mrp,stock.selling_price,stock.batchno,stock.expirydate";
    $result_row = $this->pharmdb->query($sql);
    $res = $result_row->result_array();
    return $res;
  }
   public function getallmedicinetemplates_pharmacy()
  {
        $this->pharmdb = $this->load->database('pharmdb', TRUE);
        $sql = "select medicine_templates_id,name from  medicine_templates where   status=1";
        $result_row=$this->pharmdb->query($sql); 
        $res= $result_row->result_array ();
        return $res;
  }
  public function Get_med_temp_name($id)
  {
        $this->pharmdb = $this->load->database('pharmdb', TRUE);
        $sql = "select medicine_templates_id,name from  medicine_templates where   medicine_templates_id=$id";
        $result_row=$this->pharmdb->query($sql); 
        $res= $result_row->result_array ();
        return $res;
  }
   public function Get_selected_Items_Ins($med_ph_temp_iid,$item_id)
  {
        $this->pharmdb = $this->load->database('pharmdb', TRUE);
        $sql = "select c.name,c.days from medicine_mapping_master a inner join medicine_mapping_child b on a.medicine_mapping_master_id=b.medicine_mapping_master_id inner join medicine_instruction c on c.medicine_instruction_id=b.medicine_instruction_id where a.item_id=$item_id and a.medicine_templates_id=$med_ph_temp_iid";
        $result_row=$this->pharmdb->query($sql); 
        $res= $result_row->result_array ();
        return $res;
  }
   public function Get_medicine_details_ph($id)
  {
        $this->pharmdb = $this->load->database('pharmdb', TRUE);
        $sql = "select medicine_instruction_id,c.name as itemname from  medicine_mapping_master a inner join medicine_mapping_child b on a.medicine_mapping_master_id=b.medicine_mapping_master_id  inner join item_master c on c.item_id=a.item_id where   medicine_templates_id=$id group by a.item_id";
        $result_row=$this->pharmdb->query($sql); 
        $res= $result_row->result_array ();
        return $res;
  }
    public function checkingalreadysaved_Pat($patid)
    {
        $datee=date('Y-m-d');
        $sql = "select count(*) as cnt from examination where  examination_date='$datee' and patient_registration_id=$patid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function checkingalreadyupdatedornot($examination_id)
    {
        $datee=date('Y-m-d');
        $sql = "select doctor_completed_datetime from examination where  examination_id=$examination_id and confirm_flag=1 and doc_action=1";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function save_dia($data)
    {
        if($this->db->insert('diagnosis',$data))
        {
            return $this->db->insert_id();
        }
    }
    public function updatedcomcomdatetime($examination_id)
    {
        $datee=date('Y-m-d H:i:s');
        $sql = "update   examination set  doctor_completed_datetime='$datee' where  examination_id=$examination_id and confirm_flag=1 and doc_action=1";
        $result_row=$this->db->query($sql); 
        return true;
    }
    public function whitecellmdl($pat_app_id,$patient_registration_id)
    {
        
        $sql = "select bp,sugar,temprature from whitecell where  patient_appointment_id=$pat_app_id  and patient_registration_id=$patient_registration_id order by whitecell_id desc limit 1";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
     public function getcomplaintsdata($var_array)

    {

        $sql = "select name,complaints_id,if(status=1,'Active','Deactive') as status from complaints where  office_id= ? and status=1";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }
    public function Get_Showdata_Dia($exid)
    {
        $sql = "select examination_diagnosis.diagnosis_id,diagnosis.name as dianame,department.name as dename,eye,remarks from examination_diagnosis inner join diagnosis on examination_diagnosis.diagnosis_id=diagnosis.diagnosis_id left join department on diagnosis.department_id=department.department_id where examination_diagnosis.examination_id=$exid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }

    public function geteyepartsegments($var_array)

    {

        $sql = "select  segment_id,eye_segment_id,name from eye_segment where  office_id= ? and status=1";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getallsegmentlistdatamdlpri($var_array)

    {

        $sql = "select  righteyeparts,lefteyeparts,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name from  examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id where  examination_eye_segment.examination_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }
//INR4
    public function getEyePartdetails($var_array)

    {

//         $sql = "select righteyeparts ,lefteyeparts ,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id as segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name as content,eye_segment.name as segment_name
// from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner
// join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.examination_id= ?";

$sql = "select righteyeparts ,lefteyeparts , righteyepartscheckbox as righteyepartscheckbox,lefteyepartscheckbox as lefteyepartscheckbox ,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id as segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name as content,eye_segment.name as segment_name from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.examination_id= ?";
        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getallsegmentlistdatamdl($var_array)

    {

        $sql = "select  righteyeparts,lefteyeparts,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name from  examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id where  examination_eye_segment.temp_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getallsegmentlistdatamdlnew($var_array)

    {
// INR New
        //eyepart changes for adding segment_name
        $sql = "select righteyeparts,lefteyeparts,righteyepartscheckbox,lefteyepartscheckbox,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name,eye_segment.name as segment_name from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.temp_id= ?";
        
        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }
    // INR2
    public function checkValid($array_val)
    {
    
      $new_arr = array_values($array_val);  
      $bool=true;
      foreach($new_arr as $k => $val) {
         if($val == "") 
             unset($new_arr[$k]);    
      }
     
     if(sizeof($new_arr ) == 0) 
        $bool=false; 
     
     return  $bool;
    }

// Added new methods
    public function getallsegmentlistdatamdlnormal($var_array)

    {
// INR new
        //eyepart changes for adding segment_name
        $sql = "select  eye_mapping_segment.segment_type_id ,examination_eye_segment.general_remarks from  examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id  inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where   examination_eye_segment.temp_id= ?";
       
        $result_row=$this->db->query($sql, $var_array);

        $res= $result_row->result_array ();

        return $res;

    }



     public function getsavesegments($key)

    {

        $sql = "select  eye_mapping_segment.eye_segment_id from  examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id where  examination_eye_segment.temp_id='$key'";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }
    public function getsavesegments_new_Module($key,$segid,$eye)
    {
        $whe1='';
        $whe2='';
        if($eye==1)
        {
            $whe1=" and righteyepartscheckbox='on'";
        }
        if($eye==2)
        {
            $whe2=" and lefteyepartscheckbox='on'";
        }
        $sql = "select  eye_mapping_segment_id from  examination_eye_segment  where  examination_eye_segment.temp_id='$key' and examination_eye_segment.eye_mapping_segment_id=$segid  $whe1  $whe2";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }

    public function geteyepartssegmentdetailsmdl($segmentid)

    {

        $sql = "select  eye_mapping_segment_id,eye_segment_id,name from eye_mapping_segment where   eye_segment_id=$segmentid";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }

  
    public function geteyecompsaveddatamodel($examinationid)

    {

        $sql = "select eye_complaints_id,lefteye,righteye from  examination_eye where  examination_id= $examinationid";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function geteyecompsaveddatamodel_neweyeparti($examinationid,$compid,$eyedetid,$whicheye)

    {
        $whr='';
        if($whicheye==1)
        {
            $whr.=" and righteye=$eyedetid";
        }
        if($whicheye==2)
        {
            $whr.=" and lefteye=$eyedetid";
        }

        $sql = "select eye_complaints_id,lefteye,righteye from  examination_eye where  examination_id= $examinationid and eye_complaints_id=$compid  $whr";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getcheckdoctorname($patient_registration_id)

    {

        $sql = "select  examination_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,doctors_registration.name from  examination inner join doctors_registration on examination.doctor_id=doctors_registration.doctors_registration_id where  examination.patient_registration_id= $patient_registration_id";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }
     public function getcheckdoctorname_psy($patient_registration_id)

    {

        $sql = "select  psychiatrist_process_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,doctors_registration.name from  psychiatrist_process inner join doctors_registration on psychiatrist_process.doctor_id=doctors_registration.doctors_registration_id where  psychiatrist_process.patient_registration_id= $patient_registration_id";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }



    public function getoptho($var_array)

    {

        $sql = "select name,ophthalmic_history_id,if(status=1,'Active','Deactive') as status from ophthalmic_history where  office_id= ? and status=1";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

     public function getallcomp($var_array)

    {

        $sql = "select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= ? and status=1";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }



     public function getmedi($var_array)

    {

        $sql = "select name,medical_history_id,if(status=1,'Active','Deactive') as status from medical_history where  office_id= ? and status=1";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getsavedatamodel($var_array)

    {

        $sql = "select * from examination where examination_id= ? and   office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }
    public function examination_next_part($exid)

    {

        $sql = "select * from examination_next_part where examination_id= $exid";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }

     public function getexaminationindividualdatafromdashboard($var_array,$doid)

    {
        $wh='';
        if($doid)
        {
            $wh= " and  examination.doctor_id=$doid";
        }
        $sql = "select examination.patient_appointment_id,examination.patient_registration_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination.confirm_flag,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination.examination_date= ?  and   examination.office_id= ?  $wh order by examination_id DESC";

        $result_row=$this->db->query($sql, $var_array); 

       // echo $this->db->last_query();exit;

        $res= $result_row->result_array ();

        return $res;

    }

     public function getexaminationindividualdata($var_array)

    {

        $sql = "select DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination.confirm_flag,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination.patient_registration_id= ?  and   examination.office_id= ? order by examination_id DESC";

        $result_row=$this->db->query($sql, $var_array); 

       // echo $this->db->last_query();exit;

        $res= $result_row->result_array ();

        return $res;

    }

    public function getexaminationindividualdatsa($var_array,$doc=0)

    {
        $wh='';
        if($doc)
        {
            $wh= " and  examination.doctor_id=$doc";
        }

        $sql = "select examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date=?   and   examination.office_id= ? and optho_action=1 and confirm_flag=0 $wh";

        $result_row=$this->db->query($sql, $var_array); 

       // echo $this->db->last_query();exit;

        $res= $result_row->result_array ();

        return $res;

    }

     public function getexaminationindividualdatsaex($var_array)

    {

        //print_r($var_array);exit;

        $sql = "select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date=? and optho_action=?  and   examination.office_id= ? and dental_eye=0";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

     public function getexaminationindividualdatsaexdoc($var_array,$doc=0)

    {
        $wh='';
        if($doc)
        {
            $wh= " and  examination.doctor_id=$doc";
        }

        //print_r($var_array);exit;

        $sql = "select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date=? and doc_action=?  and   examination.office_id= ? and confirm_flag=1 and dental_eye=0 $wh";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }



    public function getexaminationindividualdatsaexdocvis($var_array)

    {

        //print_r($var_array);exit;

        $sql = "select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date=?  and   examination.office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function alreadysavecompmdl($var_array)

    {

        $sql = "select eye_left,eye_right,eye_be,remarks,complaints_id  from examination_complaints  where temp_id=? and complaints_id=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getallrem($his_id)

    {

        $sql = "select gen_comp_remarks,gen_medi_remarks,gen_opth_remarks  from examination  where history_id='$his_id'";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function alreadysaveopthmdl($var_array)

    {

        $sql = "select eye_left,eye_right,eye_be,remarks,ophthalmic_history_id  from examination_ophthalmic_history  where temp_id=? and ophthalmic_history_id=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function savedata_crossref($data,$id)
    {
        $this->db->set($data);
        $this->db->where('examination_id', $id);
        if($this->db->update('examination'))
        {
            return TRUE;
        }
    }
    public function Checking_Samedoc($docid,$exid)
    {
        $sql = "select count(*) as cnt from examination where examination_id=$exid and doctor_id=$docid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }

    public function Getcross_rreddata($serdate)
    {
        $sql = "select cross_description,cross_doctor_id,examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date='$serdate' and cross_status=1";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }

    public function alreadysavemedmdl($var_array)

    {

        $sql = "select remarks,medical_history_id  from examination_medical_history  where temp_id=? and medical_history_id=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getallmedtemp($var_array)

    {

        $sql = "select medicine_id  from medicine  where medicine_templates_id=? and office_id=? order by updated_date ASC";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }



    public function expgetcomplaintsdata($var_array)

    {

        $sql = "select complaints.name,remarks,if(eye_left=1,'Left Eye','') as lefteye,if(eye_right=1,'Right Eye','') as righteye  from examination_complaints inner join complaints on complaints.complaints_id=examination_complaints.complaints_id where temp_id=? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }



    public function getopth($var_array)

    {

        $sql = "select ophthalmic_history.name,remarks,if(eye_left=1,'Left Eye','') as lefteye,if(eye_right=1,'Right Eye','') as righteye  from examination_ophthalmic_history inner join ophthalmic_history on ophthalmic_history.ophthalmic_history_id=examination_ophthalmic_history.ophthalmic_history_id where temp_id=? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }

    public function getdoctormedicinemodel($var_array)

    {

        $sql = "select medicine_prescription.med_action,medicine_prescription.med_name,medicine_prescription.ex_ins,medicine_prescription.ex_no,medicine.category_id,medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from medicine_prescription left join medicine on medicine_prescription.medicine_id=medicine.medicine_id where medicine_prescription.temp_id=?  and 1=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }





    public function getdoctormedicinemodelpri($var_array)

    {

        $sql = "select medicine.category_id,medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from medicine_prescription inner join medicine on medicine_prescription.medicine_id=medicine.medicine_id where medicine_prescription.examination_id=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }



    public function getmedicineinstruction($val,$catid)

    {

        $sql = "select name from medicine_instruction where category_id=$catid";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        return $res;

    }



    public function getdoctormedicinemodels($var_array)

    {

        $sql = "select med_action,med_name,ex_ins,ex_no,medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from medicine_prescription left join medicine on medicine_prescription.medicine_id=medicine.medicine_id where medicine_prescription.examination_id=? and 1=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();
// echo $this->db->last_query();exit;
        return $res;

    }



    public function getmedhis($var_array)

    {

        $sql = "select medical_history.name,remarks  from examination_medical_history inner join medical_history on medical_history.medical_history_id=examination_medical_history.medical_history_id where temp_id=? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

      //  echo $this->db->last_query();exit;

        $res= $result_row->result_array ();

        return $res;

    }

    public function deletedata($id) 

    {

        $this->db->where('examination_id', $id);

        if($this->db->delete('examination_complaints'))

        {

            $this->db->where('examination_id', $id);

            $this->db->delete('examination_eye');



            $this->db->where('examination_id', $id);

            $this->db->delete('examination_medical_history');



            $this->db->where('examination_id', $id);

            $this->db->delete('examination_ophthalmic_history');



            $this->db->where('examination_id', $id);

            $this->db->delete('examination');



            

            return TRUE;

        }

    }



    function qgetcomplaintsdata($requestData)

  {

    $office_id=$this->session->office_id;

    $columns = array(

      // datatable column index  => database column name

      0 =>'complaints_id ',

      1 =>'name',

      2 =>'name',

      3 =>'name'

     

    );

 

    $this->db->select('complaints_id');//s.photo_no,s.photo_name'

    $this->db->from('complaints');

    $whrcon = array('office_id' => $office_id);

    $result = $this->db->get();

    $totalData = $result->num_rows();

    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

   

 

    $sql = "SELECT name,complaints_id,if(status=1,'Active','Deactive') as status";

    $sql.=" FROM complaints where office_id=$office_id ";

    // getting records as per search parameters

    $isFilterApply=0;

    if( !empty($requestData['search']['value']) ){   //name

      $sql.="  and (   name LIKE '".$requestData['search']['value']."%'  ";

       // $sql.="  OR lname LIKE '".$requestData['search']['value']."%'  ";

        $sql.="  OR description LIKE '".$requestData['search']['value']."%') ";

        $isFilterApply=1;

      }

 

 

      $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  desc     LIMIT ".$requestData['start']." ,".$requestData['length']."   ";  // adding length

      $result1 = $this->db->query($sql);

      

      if($isFilterApply==1){

        $totalFiltered =  $result1->num_rows(); 

      }



       // when there is a search parameter then we have to modify total number filtered rows as per search result.

      $row=$result1->result_array();



      for ($i=0; $i < count($row); $i++) {



        $left='L<input type="checkbox">&nbsp;&nbsp;R<input type="checkbox">';

          

        $row[$i]['slno']=$i+1;

        $row[$i]['rem']='<input type="text" class="form-control" id="remarks" name="remrks[]">';

        $row[$i]['lef']=$left;



        // $row[$i]['print']=$print;

        // $row[$i]['edit']=$edit;

        // $row[$i]['delete']=$delete;

        

      }





      $json_data = array(

        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.

        "recordsTotal"    => intval( $totalData ),  // total number of records

        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData

        "data"            =>   $row  // total data array

 

      );

      return $json_data;

 

  }



        public function savetreatmentplanmdl($data)

        {

           $this->db->trans_begin();

           $examination_complaintss=$data['examination_treatmentplan'];

           $this->db->insert('examination_treatmentplan',$examination_complaintss);

          

           if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    return TRUE;

            }

        }
        public function com_savetreatmentplanmdl($data)
        {
          // $this->db->trans_begin();
           error_reporting();
           $ch='sur';
           $chty='2';
           $treatmentplan=$data[$ch.'_treatmentplan'];
           $temp_id=$treatmentplan['temp_id'];
           $doctor_id=$treatmentplan['doctor_id'];
           $examination_id=$treatmentplan['examination_id'];
           $appointment_date=$treatmentplan['appointment_date'];
           $counseling_id=$treatmentplan['counseling_id'];
           $sur_check=$treatmentplan[$ch.'_checking'];
           //print_r($sur_check);exit;

           $this->db->where('examination_id', $examination_id);
           $this->db->delete('examination_treatmentplan');

           $this->db->where('examination_id', $examination_id);
           $this->db->delete('examination_chargesdetails');

           if($sur_check)
           {
                foreach ($sur_check as $key => $value) 
                {
                    $suridlisting=explode('_',$value);
                    $surid= $suridlisting[0];
                    $surid_radio=$this->input->post($ch.'_eyetreatmentplan_'.$suridlisting[1]);
    
                                        $this->db->insert('examination_treatmentplan',array(
                                            "examination_id"=>$examination_id,
                                            "chargetype_id"=>$chty,
                                            "particular_id"=>$surid,
                                            "eye"=>$surid_radio,
                                            "doctor_id"=>$doctor_id,
                                            "appointment_date"=>$appointment_date,
                                            "date_on"=>$appointment_date,
                                            "counseling_id"=>$counseling_id,
                                            "temp_id"=>$temp_id,
                                            "parent_id"=>$this->session->userdata('parent_id'),
                                            "login_id"=>$this->session->userdata('login_id'),
                                            "office_id"=>$this->session->userdata('office_id')
                                )
                        );
                }
           }
           

           $ch='las';
           $chty='3';
           $treatmentplan=$data[$ch.'_treatmentplan'];
           $temp_id=$treatmentplan['temp_id'];
           $doctor_id=$treatmentplan['doctor_id'];
           $examination_id=$treatmentplan['examination_id'];
           $appointment_date=$treatmentplan['appointment_date'];
           $counseling_id=$treatmentplan['counseling_id'];
           $sur_check=$treatmentplan[$ch.'_checking'];
          // print_r($sur_check);exit;
           if($sur_check)
           {
           foreach ($sur_check as $key => $value) 
           {
                $suridlisting=explode('_',$value);
                $surid= $suridlisting[0];
                $surid_radio=$this->input->post($ch.'_eyetreatmentplan_'.$suridlisting[1]);

                                    $this->db->insert('examination_treatmentplan',array(
                                        "examination_id"=>$examination_id,
                                        "chargetype_id"=>$chty,
                                        "particular_id"=>$surid,
                                        "eye"=>$surid_radio,
                                        "doctor_id"=>$doctor_id,
                                        "appointment_date"=>$appointment_date,
                                        "date_on"=>$appointment_date,
                                        "counseling_id"=>$counseling_id,
                                        "temp_id"=>$temp_id,
                                        "parent_id"=>$this->session->userdata('parent_id'),
                                        "login_id"=>$this->session->userdata('login_id'),
                                        "office_id"=>$this->session->userdata('office_id')
                             )
                    );
           }
         } 

           $ch='inj';
           $chty='4';
           $treatmentplan=$data[$ch.'_treatmentplan'];
           $temp_id=$treatmentplan['temp_id'];
           $doctor_id=$treatmentplan['doctor_id'];
           $examination_id=$treatmentplan['examination_id'];
           $appointment_date=$treatmentplan['appointment_date'];
           $counseling_id=$treatmentplan['counseling_id'];
           $sur_check=$treatmentplan[$ch.'_checking'];
           if($sur_check)
           {
           foreach ($sur_check as $key => $value) 
           {
                $suridlisting=explode('_',$value);
                $surid= $suridlisting[0];
                $surid_radio=$this->input->post($ch.'_eyetreatmentplan_'.$suridlisting[1]);

                                    $this->db->insert('examination_treatmentplan',array(
                                        "examination_id"=>$examination_id,
                                        "chargetype_id"=>$chty,
                                        "particular_id"=>$surid,
                                        "eye"=>$surid_radio,
                                        "doctor_id"=>$doctor_id,
                                        "appointment_date"=>$appointment_date,
                                        "date_on"=>$appointment_date,
                                        "counseling_id"=>$counseling_id,
                                        "temp_id"=>$temp_id,
                                        "parent_id"=>$this->session->userdata('parent_id'),
                                        "login_id"=>$this->session->userdata('login_id'),
                                        "office_id"=>$this->session->userdata('office_id')
                             )
                    );
           }
          }

          $billing_details=$data['examination_investigation'];
          $charge_ids=$billing_details['charge_id'];
          $particulars_ids=$billing_details['particulars_id'];
          $rates=$billing_details['rate'];
          $calrow_ids=$billing_details['calrow_id'];
          $patient_registration_id=$billing_details['patient_registration_id'];
          $patient_appointment_id=$billing_details['patient_appointment_id'];
          $doctor_id=$billing_details['doctor_id'];
          $examination_id=$billing_details['examination_id'];
          if($calrow_ids){
            $ij=0;
            foreach ($calrow_ids as $calrow_id) 
            {
                                    $this->db->insert('examination_chargesdetails',array(
                                        "examination_id"=>$examination_id,
                                        "charge_id"=>5,
                                        "particulars_id"=>$particulars_ids[$ij],
                                        "patient_registration_id"=>$patient_registration_id,
                                        "patient_appointment_id"=>$patient_appointment_id,
                                        "doctor_id"=>$doctor_id,
                                        "entry_date"=>date('Y-m-d'),
                                        "rate"=>$rates[$ij]
                                        )

                    );
                    $ij++;
                    //echo $this->db->last_query();exit;
            }
          }
// 
            return TRUE;
        }


        public function saveeyepartsmodel($data)
        {
            $this->db->trans_begin();
            $examination_segment_eyes=$data['examination_segment_eye'];
            $examination_segment_eyes_ryt=$examination_segment_eyes['eye_mapping_segment_id_ryt'];
            $eye_mapping_segment_id_lft=$examination_segment_eyes['eye_mapping_segment_id_lft'];
            $temp_ids=$examination_segment_eyes['temp_id'];
            //print_r($examination_segment_eyes);exit;
            $general_remarks =$examination_segment_eyes['general_remarks'];
            if($examination_segment_eyes_ryt)
            {
                foreach ($examination_segment_eyes_ryt as $datasegment) 
                {
                    $this->db->insert('examination_eye_segment',array("eye_mapping_segment_id"=>$datasegment,"righteyeparts"=>'',"lefteyeparts"=>'',"temp_id"=>$temp_ids,"righteyepartscheckbox"=>'on',"lefteyepartscheckbox"=>'',"general_remarks"=>$general_remarks));
                   // echo $this->db->last_query();
                }
            }
            if($eye_mapping_segment_id_lft)
            {
                foreach ($eye_mapping_segment_id_lft as $datasegmentlft) 
                {
                    $savelft=$this->getsavesegments_new_Module($temp_ids,$datasegmentlft,1);
                   // print_r($savelft);exit;
                    if($savelft)
                    {
                        $sql = "update examination_eye_segment set lefteyepartscheckbox='on' where temp_id='$temp_ids' and eye_mapping_segment_id=$datasegmentlft";
                        $result_row=$this->db->query($sql); 
                       
                    }
                    else 
                    {
                        $this->db->insert('examination_eye_segment',array("eye_mapping_segment_id"=>$datasegmentlft,"righteyeparts"=>'',"lefteyeparts"=>'',"temp_id"=>$temp_ids,"righteyepartscheckbox"=>'',"lefteyepartscheckbox"=>'on',"general_remarks"=>$general_remarks));
                    }
                 
                }
            }
            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    return FALSE;
            }
            else
            {
                    $this->db->trans_commit();
                    return TRUE;
            }
           
            
//            $eye_mapping_segment_ids=$examination_segment_eyes['eye_mapping_segment_id']
            //  log_message('info', $data);
//             error_reporting(0);
//            $this->db->trans_begin();
//            $examination_segment_eyes=$data['examination_segment_eye'];
//            $eye_mapping_segment_ids=$examination_segment_eyes['eye_mapping_segment_id'];
//            print_r($examination_segment_eyes);exit;
//            $temp_ids=$examination_segment_eyes['temp_id'];
//            $righteyepartss=$examination_segment_eyes['righteyeparts'];
//            $lefteyepartss=$examination_segment_eyes['lefteyeparts'];
// // INR New
//            $righteyepartscheckbox=$examination_segment_eyes['righteyepartscheckbox'];
//            $lefteyepartscheckbox=$examination_segment_eyes['lefteyepartscheckbox'];
//            $general_remarks =$examination_segment_eyes['general_remarks'];
           
//            log_message('info',  "hi");
//            $string=implode(",",$examination_segment_eyes);
//              log_message('info',  $string);

//              $string1=implode(",",$eye_mapping_segment_ids);
//              log_message('info',  $string1);
//              $string2=implode(",",$righteyepartss);
//              log_message('info',  $string2);
//              $string3=implode(",",$righteyepartscheckbox);
//              log_message('info',  $string3);

//         //    log_message('info',  $righteyepartscheckbox);
//         //    log_message('info',  $lefteyepartscheckbox);
//         //    log_message('info',  $general_remarks);
          

//            $i=0;
//            foreach ($eye_mapping_segment_ids as $medical_history_i) 
//            {

//             log_message('info',$examination_segment_eyes[$i]);
//             log_message('info',$eye_mapping_segment_ids[$i]);
//            // $j=$i;
//             log_message('info',  $righteyepartss[$i]);
//             log_message('info',$righteyepartscheckbox[$i]);
//          //   INR  New


//             //   if($righteyepartscheckbox[$i] ||  $lefteyepartscheckbox[$i]){
//                 log_message('info','if condi');
//                 log_message('info',$eye_mapping_segment_ids[$i]);
//                $this->db->insert('examination_eye_segment',array("eye_mapping_segment_id"=>$medical_history_i,"righteyeparts"=>$righteyepartss[$i],"lefteyeparts"=>$lefteyepartss[$i],"temp_id"=>$temp_ids,"righteyepartscheckbox"=>$righteyepartscheckbox[$i],"lefteyepartscheckbox"=>$lefteyepartscheckbox[$i],"general_remarks"=>$general_remarks));
//             // }
//               $i++;
//            }
          
//            if ($this->db->trans_status() === FALSE)
//             {
//                     $this->db->trans_rollback();
//                     return FALSE;
//             }
//             else
//             {
//                     $this->db->trans_commit();
//                     return TRUE;
//             }
        }



       public function savehistorymodel($data)

        {

            error_reporting(0);

           $this->db->trans_begin();

           $examination_complaintss=$data['examination_complaints'];

           $complaints_ids=$examination_complaintss['complaints_id'];

           $comp_lefts=$examination_complaintss['comp_left'];
          // print_R($comp_lefts);exit;

           $comp_rights=$examination_complaintss['comp_right'];

           $comp_bes=$examination_complaintss['comp_be'];

           $temp_ids=$examination_complaintss['temp_id'];

           $remarkss=$examination_complaintss['remarks'];

           $i=0;
// print_r($complaints_ids);exit;
           foreach ($complaints_ids as $complaints_if) 

           {

              $combe=$coml=$comr=0;

             if(in_array($complaints_if,$comp_lefts))
             {
               // echo 131;exit;

                     $coml=1;

                    }

            // if(is_array($complaints_if))

            // {

                if(in_array($complaints_if,$comp_rights)){

                $comr=1;}

           // }

              

            //    if(is_array($complaints_if))

            // {



                if(in_array($complaints_if,$comp_bes)){

                $combe=1;}

           // }

        

             if(($coml>0)||($comr>0)||($combe>0)||($remarkss[$i]!=""))

             {

               $this->db->insert('examination_complaints',array("complaints_id"=>$complaints_ids[$i],"eye_left"=>$coml,"eye_right"=>$comr,"eye_be"=>$combe,"remarks"=>$remarkss[$i],"temp_id"=>$temp_ids));

             }

             

              $i++;

           }

// echo $this->db->last_query();exit;



           $examination_medical_historys=$data['examination_medical_history'];

           $medical_history_ids=$examination_medical_historys['medical_history_id'];

           $temp_ids=$examination_medical_historys['temp_id'];

           $remarkss=$examination_medical_historys['remarks'];

           $i=0;

           foreach ($medical_history_ids as $medical_history_i) 

           {

              

              if($remarkss[$i]){

               $this->db->insert('examination_medical_history',array("medical_history_id"=>$medical_history_i,"remarks"=>$remarkss[$i],"temp_id"=>$temp_ids));}

              $i++;

           }





           $examination_ophthalmic_historys=$data['examination_ophthalmic_history'];

           $complaints_idsg=$examination_ophthalmic_historys['ophthalmic_history_id'];

           $comp_lefts=$examination_ophthalmic_historys['opth_left'];

           $comp_rights=$examination_ophthalmic_historys['opth_right'];

           $comp_bes=$examination_ophthalmic_historys['opth_be'];

           $temp_ids=$examination_ophthalmic_historys['temp_id'];

           $remarkss=$examination_ophthalmic_historys['remarks'];

           $it=0;

           foreach ($complaints_idsg as $complaints_iff) 

           {

              $combe=$coml=$comr=0;



              if($comp_lefts)

              {

                if(in_array($complaints_iff,$comp_lefts)){

                $coml=1;

                }

              }



              if($comp_rights)

              {

              

              if(in_array($complaints_iff,$comp_rights)){

                $comr=1;}

            }



 if($comp_bes)

              {

                 if(in_array($complaints_iff,$comp_bes)){

                $combe=1;}

            }

        

             if(($coml>0)||($comr>0)||($combe>0)||($remarkss[$it]!=""))

             {

               $this->db->insert('examination_ophthalmic_history',array("ophthalmic_history_id"=>$complaints_idsg[$it],"eye_left"=>$coml,"eye_right"=>$comr,"eye_be"=>$combe,"remarks"=>$remarkss[$it],"temp_id"=>$temp_ids));

              }

             

              $it++;



           }

          

          

           if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    return TRUE;

            }

        }



          public function savemedhistorymodel($data)

        {

            error_reporting(0);

           $this->db->trans_begin();

           $doctor_examinations=$data['doctor_examination'];

           $medicine_ids=$doctor_examinations['medicine_id'];

           $instructions=$doctor_examinations['instruction'];

           $nodayss=$doctor_examinations['nodays'];

           $qtys=$doctor_examinations['qty'];

           $sdates=$doctor_examinations['sdate'];

           $tdates=$doctor_examinations['tdate'];

           $medeyes=$doctor_examinations['med_eye'];

           $temp_ids=$doctor_examinations['temp_id'];
           $mulframetypes=$doctor_examinations['mulframetype'];
           $mulframecolors=$doctor_examinations['mulframecolor'];
           $med_action=$doctor_examinations['med_action'];
           $med_name=$doctor_examinations['med_name'];

           $i=0;

           foreach ($medicine_ids as $medicine_idd) 

           {
                if($mulframetypes[$i])
                {
                    $frametype=$mulframetypes[$i];
                    $framecolor=$mulframecolors[$i];
                }
                else {
                    
                    $frametype='';
                    $framecolor='';
                }
                    

                   $this->db->insert('medicine_prescription',array(

                                                      "medicine_id"=>$medicine_idd,

                                                      "instruction"=>$instructions[$i],

                                                      "nodays"=>$nodayss[$i],

                                                      "qty"=>$qtys[$i],

                                                      "sdate"=>$sdates[$i],

                                                      "tdate"=>$tdates[$i],
                                                      "med_action"=>$med_action[$i],
                                                      "med_name"=>$med_name[$i],
                                                      "ex_ins"=>$frametype,

                                                      "ex_no"=>$framecolor,

                                                      "med_eye"=>$medeyes[$i],

                                                      "temp_id"=>$temp_ids

                                             )

                                    );

                    // $x = 1;
                    // $b=0;
                    // $mulframetype=explode(',',$mulframetypes[$i]);
                    // $mulframecolor=explode(',',$mulframecolors[$i]);
                    // $prsid=$this->db->insert_id();
                    // while($x <= 10) 
                    // {
                    //     if($mulframetype[$b])
                    //     {
                    //         $this->db->insert('examination_medicine_instruction',array(
                    //             "medicine_prescription_id"=>$prsid,
                    //             "examination_id"=>0,
                    //             "medicine_id"=>$medicine_idd,
                    //             "instruction"=>$mulframetype[$b],
                    //             "nodays"=>$mulframecolor[$b],
                    //             "temp_id"=>$temp_ids
                    //             ));
                        
                    //     }

                    //     $x++;
                    //     $b++;
                    // }
                   $i++;

           }









          

          

           if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    return TRUE;

            }

        }
        public function savediahistorymodel($data)
        {
           error_reporting(0);
           $this->db->trans_begin();
           $dia_examination=$data['dia_examination'];
           $examination_id=$dia_examination['examination_id'];
           $this->db->where('examination_id', $examination_id[0]);
           $this->db->delete('examination_diagnosis');
           $diagnosis_id=$dia_examination['diagnosis_id'];
           $eye=$dia_examination['eye'];
           $remarks=$dia_examination['remarks'];
           
           $i=0;
           foreach ($diagnosis_id as $medicine_idd) 
           {   
                   $this->db->insert('examination_diagnosis',array(
                                                      "examination_id"=>$examination_id[$i],
                                                      "diagnosis_id"=>$diagnosis_id[$i],
                                                      "eye"=>$eye[$i],
                                                      "remarks"=>$remarks
                                             )
                                    );
                  
                   $i++;
                  // echo $this->db->last_query();exit;
           }
          
           if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    return FALSE;
            }
            else
            {
                    $this->db->trans_commit();
                    return TRUE;
            }
        }
        public function saveexaminationmodel($data)

        {

           $this->db->trans_begin();

           $examinationmaster=$data['addexamination'];

           $this->db->insert('examination',$examinationmaster);

           $historyids=$examinationmaster['history_id'];

           $eyepartshistory_ids=$examinationmaster['eyepartshistory_id'];

           $treatmentplan_ref_ids=$examinationmaster['treatmentplan_ref_id'];

           $addmedhistory_ids=$examinationmaster['addmedhistory_id'];

           $examination_id=$this->db->insert_id();

           $datahis = array( 

                'examination_id'      => $examination_id, 

            );

           $this->db->where('temp_id', $historyids);

           $this->db->update('examination_complaints',$datahis);

           $this->db->where('temp_id', $historyids);

           $this->db->update('examination_ophthalmic_history',$datahis);

           $this->db->where('temp_id', $historyids);

           $this->db->update('examination_medical_history',$datahis);

           $this->db->where('temp_id', $addmedhistory_ids);

           $this->db->update('medicine_prescription',$datahis);

           $this->db->where('temp_id', $treatmentplan_ref_ids);

           $this->db->update('examination_treatmentplan',$datahis);

           $this->db->where('temp_id', $eyepartshistory_ids);

           $this->db->update('examination_eye_segment',$datahis);





           $examination_eyes=$data['examination_eye'];
           $eye_complaints_id=$examination_eyes['eye_complaints_id'];
           $lefteye=$examination_eyes['lefteye'];
           $righteye=$examination_eyes['righteye'];
           $i=0;
           if($lefteye)
           {
              foreach ($lefteye as $dataleft) 
              {
               
                   $eye_complaints_id=$this->db->get_where('eye_particular',"eye_particular_id=$dataleft")->row()->eye_complaints_id;
                    $left_eye=$this->db->get_where('eye_particular',"eye_particular_id=$dataleft")->row()->left_eye;
                
                
                   $this->db->insert('examination_eye',array("examination_id"=>$examination_id,"eye_complaints_id"=>$eye_complaints_id,"lefteye"=>$left_eye,"temp_id"=>$historyids));
              }
           }
        




           if($righteye)
           {
              foreach ($righteye as $dataryt) 
              {
                   $eye_complaints_id=$this->db->get_where('eye_particular',"eye_particular_id=$dataryt")->row()->eye_complaints_id;
                   $right_eye=$this->db->get_where('eye_particular',"eye_particular_id=$dataryt")->row()->right_eye;
                   $this->db->insert('examination_eye',array("examination_id"=>$examination_id,"eye_complaints_id"=>$eye_complaints_id,"righteye"=>$right_eye,"temp_id"=>$historyids));
              }
           }
        //    if($eye_complaints_id)
        //    {
        //     foreach ($eye_complaints_id as $complaints_if) 
        //    {

              

        //       if($lefteye[$i]!='' || $righteye[$i]!=''){

        //       $this->db->insert('examination_eye',array("examination_id"=>$examination_id,"eye_complaints_id"=>$eye_complaints_id[$i],"lefteye"=>$lefteye[$i],"righteye"=>$righteye[$i],"temp_id"=>$historyids));}

        //       $i++;

        //    }
        //    }
           

             $whitecellsave_examin=$data['whitecellsave'];
             $bp=$whitecellsave_examin['bp'];
             if($bp)
             {
                 $this->db->insert('whitecell',$whitecellsave_examin);
             }

             $examina_next_sec=$data['examination_next_part'];
             $examina_next_sec['examination_id']=$examination_id;
             $examina_next_sec['cur_date']=date('Y-m-d');
             $examina_next_sec['cur_time']=date('H:i:s');
             $this->db->insert('examination_next_part',$examina_next_sec);
           

            if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    //$this->session->set_flashdata('sales_id',$sales_id);

                    return TRUE;

            }

        }



          public function updateexaminationmodel($data,$id)

        {
            
error_reporting(0);
            $this->db->trans_begin();

            $this->db->where('examination_id', $id);

            $this->db->delete('examination_eye_segment');

            $this->db->where('examination_id', $id);

            $this->db->delete('examination_next_part');

            //$this->db->where('examination_id', $id);

            //$this->db->delete('examination_chargesdetails');

            $this->db->where('examination_id', $id);

            $this->db->delete('examination_eye');

            $examinationmaster=$data['addexamination'];

            $this->db->set($examinationmaster);

            $this->db->where('examination_id', $id);

            $this->db->update('examination');

            $examination_id=$id;

            $historyids=$examinationmaster['history_id'];

            $eyepartshistory_ids=$examinationmaster['eyepartshistory_id'];

            $treatmentplan_ref_ids=$examinationmaster['treatmentplan_ref_id'];

            $patient_registration_id=$examinationmaster['patient_registration_id'];

            $patient_appointment_id=$examinationmaster['patient_appointment_id'];

            $doctor_id=$examinationmaster['doctor_id'];

            $addmedhistory_ids=$examinationmaster['addmedhistory_id'];

            $datahis = array( 

                'examination_id'      => $examination_id, 

            );

           $this->db->where('temp_id', $historyids);

           $this->db->update('examination_complaints',$datahis);

           $this->db->where('temp_id', $historyids);

           $this->db->update('examination_ophthalmic_history',$datahis);

           $this->db->where('temp_id', $historyids);

           $this->db->update('examination_medical_history',$datahis);

           $this->db->where('temp_id', $addmedhistory_ids);

           $this->db->update('medicine_prescription',$datahis);

           // $this->db->where('temp_id', $addmedhistory_ids);

           // $this->db->update('examination_medicine_instruction',$datahis);

           $this->db->where('temp_id', $treatmentplan_ref_ids);

           $this->db->update('examination_treatmentplan',$datahis);

           $this->db->where('temp_id', $eyepartshistory_ids);

           $this->db->update('examination_eye_segment',$datahis);



           $examination_eyes=$data['examination_eye'];
         //  print_r($examination_eyes);exit;

           $eye_complaints_id=$examination_eyes['eye_complaints_id'];

           $lefteye=$examination_eyes['lefteye'];

           $righteye=$examination_eyes['righteye'];

           $i=0;
        //    if($eye_complaints_id)
        //    {
        //     foreach ($eye_complaints_id as $complaints_if) 

        //    {

              if($lefteye)
              {
                 foreach ($lefteye as $dataleft) 
                 {
                  
                      $eye_complaints_id=$this->db->get_where('eye_particular',"eye_particular_id=$dataleft")->row()->eye_complaints_id;
                       $left_eye=$this->db->get_where('eye_particular',"eye_particular_id=$dataleft")->row()->left_eye;
                   
                   
                      $this->db->insert('examination_eye',array("examination_id"=>$examination_id,"eye_complaints_id"=>$eye_complaints_id,"lefteye"=>$left_eye,"temp_id"=>$historyids));
                 }
              }
           




              if($righteye)
              {
                 foreach ($righteye as $dataryt) 
                 {
                      $eye_complaints_id=$this->db->get_where('eye_particular',"eye_particular_id=$dataryt")->row()->eye_complaints_id;
                      $right_eye=$this->db->get_where('eye_particular',"eye_particular_id=$dataryt")->row()->right_eye;
                      $this->db->insert('examination_eye',array("examination_id"=>$examination_id,"eye_complaints_id"=>$eye_complaints_id,"righteye"=>$right_eye,"temp_id"=>$historyids));
                 }
              }

            //   if($lefteye[$i]!='' || $righteye[$i]!=''){

            //   $this->db->insert('examination_eye',array("examination_id"=>$examination_id,"eye_complaints_id"=>$eye_complaints_id[$i],"lefteye"=>$lefteye[$i],"righteye"=>$righteye[$i],"temp_id"=>$historyids));}

              $i++;

          // }

          // }
           


           

        //    $billing_details=$data['examination_investigation'];

        //    $charge_ids=$billing_details['charge_id'];

        //    $particulars_ids=$billing_details['particulars_id'];

        //    $rates=$billing_details['rate'];

        //    $calrow_ids=$billing_details['calrow_id'];

        //    if($calrow_ids){

        //    $ij=0;

        //    foreach ($calrow_ids as $calrow_id) 

        //    {

        //             $this->db->insert('examination_chargesdetails',array(

        //                                                   "examination_id"=>$examination_id,

        //                                                   "charge_id"=>$charge_ids[$ij],

        //                                                   "particulars_id"=>$particulars_ids[$ij],

        //                                                   "patient_registration_id"=>$patient_registration_id,

        //                                                   "patient_appointment_id"=>$patient_appointment_id,

        //                                                   "doctor_id"=>$doctor_id,

        //                                                   "rate"=>$rates[$ij]

                                                        

        //                                                   )

        //                             );

               

                

        //        $ij++;

        //    }

        // }

         
             $examina_next_sec=$data['examination_next_part'];
             $examina_next_sec['examination_id']=$examination_id;
             $examina_next_sec['cur_date']=date('Y-m-d');
             $examina_next_sec['cur_time']=date('H:i:s');
             $this->db->insert('examination_next_part',$examina_next_sec);
       

            $whitecellsave_examin=$data['whitecellsave'];
             $bp=$whitecellsave_examin['bp'];
             if($bp)
             {
                 $this->db->insert('whitecell',$whitecellsave_examin);
             }

            if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    //$this->session->set_flashdata('sales_id',$sales_id);

                    return TRUE;

            }

        }
        public function saveaddparticular_eyemodel($data,$eyecompid,$eyetype,$neweye)
        {
            
            $parent_id=$this->session->userdata('parent_id');
            $login_id=$this->session->userdata('login_id');
            $office_id= $this->session->userdata('office_id');
             $this->db->insert('eye_details',$data);
             $eye_details_id=$this->db->insert_id();

             if($neweye==1)
             {
                $colname='left_eye';
             }
             if($neweye==2)
             {
                $colname='right_eye';
             }
            
             $sql = "insert into eye_particular ($colname,eye_complaints_id,status,office_id,login_id,parent_id)values($eye_details_id,$eyecompid,1,$office_id,$login_id,$parent_id)";
             $result_row=$this->db->query($sql); 
             if($result_row)
             {
                return $this->db->insert_id();
             }
            
        }

         public function Getdetailstable($var_array)

    {

        $sql = "select * from examination_chargesdetails where  examination_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }



     public  function printcertificate($examinationid,$office_id)

  {

        error_reporting(0);    

    $office=$this->db->get_where('office',"office_id=$office_id")->row();

    $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";

    

    $data['company_name']=$office->printable_company_name;

    $data['company_address']=$office->printable_company_address;

    $data['company_mobile']=$office->printable_company_mobile;

    $data['company_land_phone']=$office->printable_company_phone;

    $data['company_email']=$office->printable_emailid;

    $data['company_gst']=$office->license_no;

    $data['print_declaration']=$office->declaration;

    $data['gstin_no']=$office->gstin_no;



    $examination_masters=$this->db->get_where('examination',"examination_id=$examinationid")->row();

    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->name;

    $data['username']=$this->db->get_where('user',"user_id=$examination_masters->login_id")->row()->name;



    $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$examination_masters->patient_registration_id")->row();

    $data['fname']=$patient_details->fname; 

   $data['lname']=$patient_details->lname; 

   $data['mrdno']=$patient_details->mrdno; 

   $data['address']=$patient_details->address; 

   $data['mobileno']=$patient_details->mobileno; 

  

   if($patient_details->gender==1)

   {

    $age='Male';

   }

   elseif($patient_details->gender==2)

   {

    $age="Female";

   }

   else

   {

    $age='Transgender';

   }

   $data['gender']=$age; 

   $data['ageyy']=$patient_details->ageyy; 

   $data['agemm']=$patient_details->agemm; 

   $title_id=$patient_details->title; 



   $data['vis1']=$examination_masters->vis1;

   $data['vis6']=$examination_masters->vis6;

   $data['vis4']=$examination_masters->vis4;

   $data['vis9']=$examination_masters->vis9;



   $data['vis2']=$examination_masters->vis2;

   $data['vis7']=$examination_masters->vis7;

   $data['vis5']=$examination_masters->vis5;

   $data['vis10']=$examination_masters->vis10;

   $data['pre5']=$examination_masters->pre5;

   $data['pre11']=$examination_masters->pre11;



    $data['pre1']=$examination_masters->pre1;

   $data['pre7']=$examination_masters->pre7;



   $data['ant_lefteye']=$examination_masters->ant_lefteye;

   $data['ant_righteye']=$examination_masters->ant_righteye;

   $data['bfit']=$examination_masters->bfit;

   $data['vcontent']=$examination_masters->vcontent;



     $data['Fundusr']='';

     $data['Fundusl']='';

     $data['Fieldr']='';

     $data['Fieldl']='';



   

   $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examination_masters->examination_id and  name='Fundus'")->result(); 

                   if($eye_comp){

                                 foreach ($eye_comp as $datab) 

                                 {

                                     $data['Fundusr']=$datab->righteye;

                                     $data['Fundusl']=$datab->lefteye;

                                  } 

                                        

                      }



                      $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examination_masters->examination_id and   name='Fields' ")->result(); 

                   if($eye_comp)

                   {

                             foreach ($eye_comp as $datab) {

                                 $data['Fieldr']=$datab->righteye;

                                 $data['Fieldl']=$datab->lefteye;

                                  }    

                    }

   

   

         $printdata=1;

         switch($printdata)

            {

            case 1:$html=$this->load->view("master/visionprint",$data, true); 

                   $print_config=[

                                    'format' => 'A4',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 10,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

            case 2:$html=$this->load->view("master/visionprint",$data, true); 

                   $print_config=[

                                    'format' => 'A4-L',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 5,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

           case 3:$html=$this->load->view("master/visionprint",$data, true); 

        

           

                   $print_config=[

                                    'format' => 'A5',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 5,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

              case 4:$html=$this->load->view("master/visionprint",$data, true); 

                   $print_config=[

                                    'format' => 'A5-L',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 10,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

            }



            $mpdf = new \Mpdf\Mpdf($print_config);

            $pdfFilePath ="print-".time().".pdf"; 

            $labName='';

            $mpdf->SetWatermarkText($labName,0.03);

            $mpdf->showWatermarkText = true;

            $mpdf -> SetDisplayMode('fullpage');

            $mpdf->WriteHTML($html);

            $mpdf->Output();

           





  }

   public function gettreamnetplanmodel($var_array)

    {

        $sql = "select examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id 

        inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id

        inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id

          where examination_treatmentplan.counseling_id = 1 and examination_treatmentplan.examination_id = ?  ";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }

   public  function printnew_bill($examinationid,$office_id)

  { 

      error_reporting(0);                  

    $office=$this->db->get_where('office',"office_id=$office_id")->row();

    $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";

    

    $data['company_name']=$office->printable_company_name;

    $data['company_address']=$office->printable_company_address;

    $data['company_mobile']=$office->printable_company_mobile;

    $data['company_land_phone']=$office->printable_company_phone;

    $data['company_email']=$office->printable_emailid;

    $data['company_gst']=$office->license_no;

    $data['print_declaration']=$office->declaration;

    $data['gstin_no']=$office->gstin_no;



    $examination_masters=$this->db->get_where('examination',"examination_id=$examinationid")->row();

    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->name;

    $data['username']=$this->db->get_where('user',"user_id=$examination_masters->login_id")->row()->name;



    $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$examination_masters->patient_registration_id")->row();

   

    $data['current_meditation']=$examination_masters->current_meditation;

    $data['family_history']=$examination_masters->family_history;

    $data['drug_history']=$examination_masters->drug_history;

    $data['examination_date']=date("d-m-Y", strtotime($examination_masters->examination_date));

    $data['cur1']=$examination_masters->cur1;

    $data['cur2']=$examination_masters->cur2;

    $data['cur3']=$examination_masters->cur3;

    $data['cur4']=$examination_masters->cur4;

    $data['cur5']=$examination_masters->cur5;

    $data['cur6']=$examination_masters->cur6;

    $data['cur7']=$examination_masters->cur7;

    $data['cur8']=$examination_masters->cur8;

    $data['cur9']=$examination_masters->cur9;

    $data['cur10']=$examination_masters->cur10;

    $data['cur11']=$examination_masters->cur11;

    $data['cur12']=$examination_masters->cur12;

    $data['cur13']=$examination_masters->cur13;

    $data['cur14']=$examination_masters->cur14;

    $data['cur15']=$examination_masters->cur15;

    $data['cur16']=$examination_masters->cur16;

    $data['vis1']=$examination_masters->vis1;

    $data['vis2']=$examination_masters->vis2;

    $data['vis3']=$examination_masters->vis3;

    $data['vis4']=$examination_masters->vis4;

    $data['vis5']=$examination_masters->vis5;

    $data['vis6']=$examination_masters->vis6;

    $data['vis7']=$examination_masters->vis7;

    $data['vis8']=$examination_masters->vis8;

    $data['vis9']=$examination_masters->vis9;

    $data['vis10']=$examination_masters->vis10;

    $data['ar1']=$examination_masters->ar1;

    $data['ar2']=$examination_masters->ar2;

    $data['ar3']=$examination_masters->ar3;

    $data['ar4']=$examination_masters->ar4;

    $data['ar5']=$examination_masters->ar5;

    $data['ar6']=$examination_masters->ar6;

    $data['ar7']=$examination_masters->ar7;

    $data['ar8']=$examination_masters->ar8;

    $data['ar9']=$examination_masters->ar9;

    $data['ar10']=$examination_masters->ar10;

    $data['man1']=$examination_masters->man1;

    $data['man2']=$examination_masters->man2;

    $data['man3']=$examination_masters->man3;

    $data['man4']=$examination_masters->man4;

    $data['man5']=$examination_masters->man5;

    $data['man6']=$examination_masters->man6;

    $data['man7']=$examination_masters->man7;

    $data['man8']=$examination_masters->man8;

    $data['man9']=$examination_masters->man9;

    $data['man10']=$examination_masters->man10;

    $data['spe1']=$examination_masters->spe1;

    $data['spe2']=$examination_masters->spe2;

    $data['spe3']=$examination_masters->spe3;

    $data['spe4']=$examination_masters->spe4;

    $data['spe5']=$examination_masters->spe5;

    $data['spe6']=$examination_masters->spe6;

    $data['spe7']=$examination_masters->spe7;

    $data['spe8']=$examination_masters->spe8;

    $data['spe9']=$examination_masters->spe9;

    $data['spe10']=$examination_masters->spe10;

    $data['spe11']=$examination_masters->spe11;

    $data['spe12']=$examination_masters->spe12;

    $data['spe13']=$examination_masters->spe13;

    $data['spe14']=$examination_masters->spe14;

    $data['spe15']=$examination_masters->spe15;

    $data['spe16']=$examination_masters->spe16;

    $data['con1']=$examination_masters->con1;

    $data['con2']=$examination_masters->con2;

    $data['con3']=$examination_masters->con3;

    $data['con4']=$examination_masters->con4;

    $data['con5']=$examination_masters->con5;

    $data['con6']=$examination_masters->con6;

    $data['con7']=$examination_masters->con7;

    $data['con8']=$examination_masters->con8;

    $data['con9']=$examination_masters->con9;

    $data['con10']=$examination_masters->con10;

    $data['con11']=$examination_masters->con11;

    $data['con12']=$examination_masters->con12;

    $data['con13']=$examination_masters->con13;

    $data['con14']=$examination_masters->con14;

    $data['con15']=$examination_masters->con15;

    $data['con16']=$examination_masters->con16;

    $data['pmt1']=$examination_masters->pmt1;

    $data['pmt2']=$examination_masters->pmt2;

    $data['pmt3']=$examination_masters->pmt3;

    $data['pmt4']=$examination_masters->pmt4;

    $data['pmt5']=$examination_masters->pmt5;

    $data['pmt6']=$examination_masters->pmt6;

    $data['pmt7']=$examination_masters->pmt7;

    $data['pmt8']=$examination_masters->pmt8;

    $data['pmt9']=$examination_masters->pmt9;

    $data['pmt10']=$examination_masters->pmt10;

    $data['pmt11']=$examination_masters->pmt11;

    $data['pmt12']=$examination_masters->pmt12;

    $data['pmt13']=$examination_masters->pmt13;

    $data['pmt14']=$examination_masters->pmt14;

    $data['pmt15']=$examination_masters->pmt15;

    $data['pmt16']=$examination_masters->pmt16;



    $data['pre1']=$examination_masters->pre1;

    $data['pre2']=$examination_masters->pre2;

    $data['pre3']=$examination_masters->pre3;

    $data['pre4']=$examination_masters->pre4;

    $data['pre5']=$examination_masters->pre5;

    $data['pre6']=$examination_masters->pre6;

    $data['pre7']=$examination_masters->pre7;

    $data['pre8']=$examination_masters->pre8;

    $data['pre9']=$examination_masters->pre9;

    $data['pre10']=$examination_masters->pre10;

    $data['pre11']=$examination_masters->pre11;

    $data['pre12']=$examination_masters->pre12;
//INR4
    $data['vdiagnosis']=$examination_masters->vdiagnosis;

    $data['clinical_advisor']=$examination_masters->clinical_advisor;

    $data['d_date']=date("d-m-Y", strtotime($examination_masters->d_date));







     $data['Fieldr']='';

     $data['Fieldl']='';



   

   $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examinationid and  name='Fundus'")->result(); 

       if($eye_comp){

                     foreach ($eye_comp as $datab) 

                     {

                         $data['Fundusr']=$datab->righteye;

                         $data['Fundusl']=$datab->lefteye;

                      } 

                            

          }



          $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examinationid and   name='Fields' ")->result(); 

       if($eye_comp)

       {

                 foreach ($eye_comp as $datab) {

                     $data['Fieldr']=$datab->righteye;

                     $data['Fieldl']=$datab->lefteye;

                      }    

        }





    $var_array_chilsd=array($examinationid);

    $v3='';

    $getdetailsdata=$this->Getdetailstable($var_array_chilsd);

     if($getdetailsdata)

        {

            $this->load->model('Common_model');

            $v3='';

            $sl=1;

             foreach ($getdetailsdata as $datai) 

             {

                    $getparticularname=$this->Common_model->getparticularsmodel($datai['charge_id'],$datai['particulars_id'],$this->session->userdata('office_id'));

                    $v3.=  '&nbsp;'.$sl .'.'. $getparticularname[0]['name'] ;

                    $sl++;

             }

        }



  $getdoctorprescription=$this->getdoctormedicinemodelpri($var_array_chilsd);

   $docc='';

   if($getdoctorprescription)

   {

         $sl=0;

           $docc=' <table class="border-collapse"  width="100%" style="border: 1px solid black;border-collapse: collapse;font-size: 12px;" border="1"><thead><tr><th style="width:5%;">SL NO</th><th style="width:15%;">Drug Name</th><th style="width:20%;">Instruction</th><th style="width:20%;">No Of Days</th><th style="width:10%;">Qty</th><th style="width:10%;">Eye</th></tr></thead><tbody>';

         foreach($getdoctorprescription as $datad)

         {

            $sl++;

            $docc.='<tr><td>'.$sl.'</td><td>'.$datad['drugname'].'</td><td>'.$datad['instruction'].'</td><td>'.$datad['nodays'].'</td><td>'.$datad['qty'].'</td><td>'.$datad['med_eye'].'</td></tr>';

         }

          $docc.='</tbody></table>';

   }



   $data['investigation']=$v3; 

   $data['medicine']=$docc; 

$v4='';

    $getdetailsdatacoun=$this->gettreamnetplanmodel($var_array_chilsd);

   // print_r($getdetailsdatacoun);exit;

    if($getdetailsdatacoun){

        $skl=1;

        $eyec='';$parti='';

     foreach($getdetailsdatacoun as $datacoun)

    

    {

              if($datacoun['eye']==1)

              {

                $eyec='Left eye';

              }         

              elseif ($datacoun['eye']==2) 

              {

                $eyec='Right Eye';

              }

              else

              {

                $eyec='Both Eye';

              }



              if($datacoun['particular_id'])

              {

                 $par= explode(",",$datacoun['particular_id']);

                 if($par)

                 {

                  

                   foreach($par as $pardata)

                   {

                    if($pardata){

                     $getparticularname=$this->Common_model->getparticularsmodel($datacoun['chargetype_id'],$pardata,$this->session->userdata('office_id')); 

                     }

                      $parti.= $getparticularname[0]['name'].'-'.$eyec.',';

                   }

                 }

              }



              //$partiy=substr($parti, 0, -1);

              

              $skl++;

    }





    $v4.=  '&nbsp;'.$parti; 



    }

    $data['couns']=$v4; 



   $data['fname']=$patient_details->fname; 

   $data['lname']=$patient_details->lname; 

   $data['mrdno']=$patient_details->mrdno; 

   $data['address']=$patient_details->address; 

   $data['mobileno']=$patient_details->mobileno; 





          $var_arrayf=array($this->input->post('examinationid'));

          $getresult=$this->getallsegmentlistdatamdlpri($var_arrayf);

          if($getresult)

          {

            $htmldj='';

            $sl=1;

            $htmldj='<table class="border-collapse"  width="100%" style="border: 1px solid black;border-collapse: collapse;font-size: 12px;" border="1"><thead><tr><th>Sl No</th><th>Content</th><th>Right</th><th>Left</th></tr></thead><tbody>';

            foreach($getresult as $dadta)

            {

                $htmldj.='<tr><td>'.$sl.'</td><td>'.$dadta['name'].'</td><td>'.$dadta['righteyeparts'].'</td><td>'.$dadta['lefteyeparts'].'</td></tr>';

                $sl++;

            }

            $htmldj.='</tbody></table>';

            

             $data['anteriaseg']=$htmldj; 

            

          }

          else

          {

            $data['anteriaseg']='';

          }

          

  

   if($patient_details->gender==1)

   {

    $age='Male';

   }

   elseif($patient_details->gender==2)

   {

    $age="Female";

   }

   else

   {

    $age='Transgender';

   }

   $data['gender']=$age; 

   $data['ageyy']=$patient_details->ageyy; 

   $data['agemm']=$patient_details->agemm; 

   $title_id=$patient_details->title; 

   $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;

  





 



   



  



    

     





   

   

         $printdata=1;

         switch($printdata)

            {

            case 1:$html=$this->load->view("transaction/examination/examinationnewprint",$data, true); 

                   $print_config=[

                                    'format' => 'A4',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 10,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

            case 2:$html=$this->load->view("transaction/billing/print",$data, true); 

                   $print_config=[

                                    'format' => 'A4-L',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 5,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

           case 3:$html=$this->load->view("transaction/billing/print",$data, true); 

        

           

                   $print_config=[

                                    'format' => 'A5',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 5,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

              case 4:$html=$this->load->view("transaction/billing/print",$data, true); 

                   $print_config=[

                                    'format' => 'A5-L',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 10,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

            }



            $mpdf = new \Mpdf\Mpdf($print_config);

            $pdfFilePath ="print-".time().".pdf"; 

            $labName='';

            $mpdf->SetWatermarkText($labName,0.03);

            $mpdf->showWatermarkText = true;

            $mpdf -> SetDisplayMode('fullpage');

            $mpdf->WriteHTML($html);

            $mpdf->Output();

           

  }
  public function updateopticalexamination($patid)
  {
      $ddte=date('Y-m-d');
      $sql = "update patient_registration set   optical_advice=1,opticaladvice_date='$ddte' where patient_registration_id=$patid";
      $result_row=$this->db->query($sql); 
      return $result_row;
  }
   public function update_op_advice_newcol($exid,$opcolid)
  {
      $sql = "update examination set   op_advice_col=$opcolid where examination_id=$exid";
      $result_row=$this->db->query($sql); 
      return $result_row;
  }
  public  function print_bill($examinationid,$chkcomplaintsout,$chkopthalmicsout,$chkmedicalout,$chkeyepartout,$addmedicinessout,$investigationchkout,$preliminary_exout,$vsisonreadingsout,$curspecout,$objectchkout,$arkkchkout,$manchkout,$specchkout,$fspecchkout,$conlchkout,$pmtchkout,$office_id)
  { 
      error_reporting(0);    
      $office_id=$this->session->userdata('office_id');              
    $office=$this->db->get_where('office',"office_id=$office_id")->row();
    $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";
    
    $data['company_name']=$office->printable_company_name;
    $data['company_address']=$office->printable_company_address;
    $data['company_mobile']=$office->printable_company_mobile;
    $data['company_land_phone']=$office->printable_company_phone;
    $data['company_email']=$office->printable_emailid;
    $data['company_gst']=$office->license_no;
    $data['print_declaration']=$office->declaration;
    $data['gstin_no']=$office->gstin_no;

    $examination_masters=$this->db->get_where('examination',"examination_id=$examinationid")->row();
    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->name;
    $data['sign_doc']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->sign;
    $data['username']=$this->db->get_where('user',"user_id=$examination_masters->login_id")->row()->name;

    $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$examination_masters->patient_registration_id")->row();
   
    $data['current_meditation']=$examination_masters->current_meditation;
    $data['family_history']=$examination_masters->family_history;
    $data['drug_history']=$examination_masters->drug_history;
    $data['cur1']=$examination_masters->cur1;
    $data['cur2']=$examination_masters->cur2;
    $data['cur3']=$examination_masters->cur3;
    $data['cur4']=$examination_masters->cur4;
    $data['cur5']=$examination_masters->cur5;
    $data['cur6']=$examination_masters->cur6;
    $data['cur7']=$examination_masters->cur7;
    $data['cur8']=$examination_masters->cur8;
    $data['cur9']=$examination_masters->cur9;
    $data['cur10']=$examination_masters->cur10;
    $data['cur11']=$examination_masters->cur11;
    $data['cur12']=$examination_masters->cur12;
    $data['cur13']=$examination_masters->cur13;
    $data['cur14']=$examination_masters->cur14;
    $data['cur15']=$examination_masters->cur15;
    $data['cur16']=$examination_masters->cur16;
    $data['vis1']=$examination_masters->vis1;
    $data['vis2']=$examination_masters->vis2;
    $data['vis3']=$examination_masters->vis3;
    $data['vis4']=$examination_masters->vis4;
    $data['vis5']=$examination_masters->vis5;
    $data['vis6']=$examination_masters->vis6;
    $data['vis7']=$examination_masters->vis7;
    $data['vis8']=$examination_masters->vis8;
    $data['vis9']=$examination_masters->vis9;
    $data['vis10']=$examination_masters->vis10;
    $data['ar1']=$examination_masters->ar1;
    $data['ar2']=$examination_masters->ar2;
    $data['ar3']=$examination_masters->ar3;
    $data['ar4']=$examination_masters->ar4;
    $data['ar5']=$examination_masters->ar5;
    $data['ar6']=$examination_masters->ar6;
    $data['ar7']=$examination_masters->ar7;
    $data['ar8']=$examination_masters->ar8;
    $data['ar9']=$examination_masters->ar9;
    $data['ar10']=$examination_masters->ar10;
    $data['man1']=$examination_masters->man1;
    $data['man2']=$examination_masters->man2;
    $data['man3']=$examination_masters->man3;
    $data['man4']=$examination_masters->man4;
    $data['man5']=$examination_masters->man5;
    $data['man6']=$examination_masters->man6;
    $data['man7']=$examination_masters->man7;
    $data['man8']=$examination_masters->man8;
    $data['man9']=$examination_masters->man9;
    $data['man10']=$examination_masters->man10;
    $data['spe1']=$examination_masters->spe1;
    $data['spe2']=$examination_masters->spe2;
    $data['spe3']=$examination_masters->spe3;
    $data['spe4']=$examination_masters->spe4;
    $data['spe5']=$examination_masters->spe5;
    $data['spe6']=$examination_masters->spe6;
    $data['spe7']=$examination_masters->spe7;
    $data['spe8']=$examination_masters->spe8;
    $data['spe9']=$examination_masters->spe9;
    $data['spe10']=$examination_masters->spe10;
    $data['spe11']=$examination_masters->spe11;
    $data['spe12']=$examination_masters->spe12;
    $data['spe13']=$examination_masters->spe13;
    $data['spe14']=$examination_masters->spe14;
    $data['spe15']=$examination_masters->spe15;
    $data['spe16']=$examination_masters->spe16;
    $data['con1']=$examination_masters->con1;
    $data['con2']=$examination_masters->con2;
    $data['con3']=$examination_masters->con3;
    $data['con4']=$examination_masters->con4;
    $data['con5']=$examination_masters->con5;
    $data['con6']=$examination_masters->con6;
    $data['con7']=$examination_masters->con7;
    $data['con8']=$examination_masters->con8;
    $data['con9']=$examination_masters->con9;
    $data['con10']=$examination_masters->con10;
    $data['con11']=$examination_masters->con11;
    $data['con12']=$examination_masters->con12;
    $data['con13']=$examination_masters->con13;
    $data['con14']=$examination_masters->con14;
    $data['con15']=$examination_masters->con15;
    $data['con16']=$examination_masters->con16;
    $data['pmt1']=$examination_masters->pmt1;
    $data['pmt2']=$examination_masters->pmt2;
    $data['pmt3']=$examination_masters->pmt3;
    $data['pmt4']=$examination_masters->pmt4;
    $data['pmt5']=$examination_masters->pmt5;
    $data['pmt6']=$examination_masters->pmt6;
    $data['pmt7']=$examination_masters->pmt7;
    $data['pmt8']=$examination_masters->pmt8;
    $data['pmt9']=$examination_masters->pmt9;
    $data['pmt10']=$examination_masters->pmt10;
    $data['pmt11']=$examination_masters->pmt11;
    $data['pmt12']=$examination_masters->pmt12;
    $data['pmt13']=$examination_masters->pmt13;
    $data['pmt14']=$examination_masters->pmt14;
    $data['pmt15']=$examination_masters->pmt15;
    $data['pmt16']=$examination_masters->pmt16;

   $data['fname']=$patient_details->fname; 
   $data['lname']=$patient_details->lname; 
   $data['mrdno']=$patient_details->mrdno; 
   $data['address']=$patient_details->address; 
   $data['mobileno']=$patient_details->mobileno; 
  
   if($patient_details->gender==1)
   {
    $age='Male';
   }
   elseif($patient_details->gender==2)
   {
    $age="Female";
   }
   else
   {
    $age='Transgender';
   }
   $data['gender']=$age; 
   $data['ageyy']=$patient_details->ageyy; 
   $data['agemm']=$patient_details->agemm; 
   $title_id=$patient_details->title; 
   $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;
   $showdata='<table  width="100%" style="line-height:10px;margin-top:0px;font-size: 14;"> 
              <tr>
                   <td style="text-align: left;" class="tabledivideleft">Date:</td>
                   <td style="text-align: left;" class="tabledivideright">'.$this->date->dateSql2View($examination_masters->examination_date).'</td> 
              </tr>';

              if($chkcomplaintsout=='true')
              {
                  
                  $complaints=$this->db->query("select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where examination_id=$examination_masters->examination_id")->result(); 
                   if($complaints){
                  $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Presenting Complaint:</td>
                               <td style="text-align: left;" class="tabledivideright">';
                                    if($complaints){ foreach($complaints as $comp){
                                        $lefteye='';
                                        $righteye='';
                                         if($comp->eye_left==1)
                                        {
                                           $lefteye='<b>Left Eye</b>'.$comp->remarks;
                                        }
                                        if($comp->eye_right==1)
                                        {
                                           $righteye='<b>Right Eye</b>'.$comp->remarks;
                                        }
                                     $showdata.='<span>'.$comp->name.'   '.$lefteye.'  '.$righteye.'<br/>

                                    </span>';  
                                } }
                               $showdata.='</td> 
                          </tr>';
                      }

              }

              if($chkopthalmicsout=='true')
              {
                 $ophthalmic_history=$this->db->query("select * from examination_ophthalmic_history inner join ophthalmic_history on examination_ophthalmic_history.ophthalmic_history_id=ophthalmic_history.ophthalmic_history_id where examination_id=$examination_masters->examination_id")->result(); 
if($ophthalmic_history){ 
                  $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Ophthalmic History:</td>
                               <td style="text-align: left;" class="tabledivideright">';
                                    if($ophthalmic_history){ foreach($ophthalmic_history as $opth){
                                        $lefteye='';
                                        $righteye='';
                                         if($opth->eye_left==1)
                                        {
                                           $lefteye='<b>Left Eye</b>'.$opth->remarks;
                                        }
                                        if($opth->eye_right==1)
                                        {
                                           $righteye='<b>Right Eye</b>'.$opth->remarks;
                                        }
                                     $showdata.='<span>'.$opth->name.'   '.$lefteye.'  '.$righteye.'<br/>

                                    </span>';  
                                } }
                               $showdata.='</td> 
                          </tr>';
                      }

              }

                if($chkmedicalout=='true')
              {
                  $medical_history=$this->db->query("select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where examination_id=$examination_masters->examination_id")->result(); 
                  if($medical_history){
                  $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Medical History:</td>
                               <td style="text-align: left;" class="tabledivideright">';
                                    if($medical_history){ foreach($medical_history as $medi){
                                     $showdata.='<span>'.$medi->name.'<br/>
                                    </span>';  
                                } }
                               $showdata.='</td> 
                          </tr>';
                      }
              }

              if($chkeyepartout=='true')
              {
                $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examination_masters->examination_id group by eye_complaints.eye_complaints_id")->result(); 
                   if($eye_comp){
                  $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Eye Details:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                     
                                         <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">
                                          <thead>
                                             <tr>
                                               <th>Right Eye</th>
                                               <th>Particulars</th>
                                               <th>Left Eye</th>
                                            </tr>
                                            </thead>
                                            <tbody id="showdataeyecomp">';
                                             foreach ($eye_comp as $datab) { 

                                                $lefteyedet='';
                                                $eye_comp_left=$this->db->query("select eye_details.name from examination_eye inner join eye_details on examination_eye.lefteye=eye_details.eye_details_id where eye_complaints_id=$datab->eye_complaints_id and examination_id=$examination_masters->examination_id")->result(); 
                                                if($eye_comp_left)
                                                {
                                                    foreach ($eye_comp_left as $dataleft) 
                                                    {
                                                        $lefteyedet.=$dataleft->name.',';
                                                    }
                                                   $lefteyedet= rtrim($lefteyedet, ',');
                                                }
                            
                                                $righteyel='';
                                                $eye_comp_right=$this->db->query("select eye_details.name from examination_eye inner join eye_details on examination_eye.righteye=eye_details.eye_details_id where eye_complaints_id=$datab->eye_complaints_id and examination_id=$examination_masters->examination_id")->result(); 
                                                if($eye_comp_right)
                                                {
                                                    foreach ($eye_comp_right as $dataright) 
                                                    {
                                                        $righteyel.=$dataright->name.',';
                                                    }
                                                   $righteyel= rtrim($righteyel, ',');
                                                }
            

                                                
                                        $showdata.='<tr>
                                                        <td>'.$righteyel.'</td>

                                                        <td>'.$datab->name.'</td>

                                                        <td>'.$lefteyedet.'</td>
                                                </tr>';
                                              } 
                                          $showdata.='</tbody></table>
                                            </td> 
                                     
                                </tr>';
                      }
              }

              if($addmedicinessout=='true')
              {
                    $var_array=array($examination_masters->examination_id,$this->session->userdata('office_id'));
                    $getdoctorprescription=$this->getdoctormedicinemodels($var_array);
                   
                   if($getdoctorprescription)
                   {
                   
                    $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Medicine Details:</td>
                               <td style="text-align: left;" class="tabledivideright">
<br/>
                               <table  style="width:100%;margin-top:25px;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1"><thead><tr><th style="width:5%;">SL NO</th style="width:10%;"><th style="width:20%;">Drug Name</th><th style="width:20%;">Instruction</th><th style="width:20%;">No Of Days</th><th style="width:20%;">Qty</th><th style="width:5%;">Eye</th></tr></thead><tbody>';
                     $sgl=0;
                     foreach($getdoctorprescription as $datame)
                     {
                        $sgl++;
                        $showdata.='<tr><td>'.$sgl.'</td><td>'.$datame['drugname'].'</td><td>'.$datame['instruction'].'</td><td>'.$datame['nodays'].'</td><td>'.$datame['qty'].'</td><td>'.$datame['med_eye'].'</td></tr>';
                     }
                      $showdata.='</tbody></table></td></tr>';
                   }
              }

               if($investigationchkout=='true')
              {
                    $var_array=array($examination_masters->examination_id);
                    $Getdetailstableex=$this->Getdetailstable($var_array);
                   
                   if($Getdetailstableex)
                   {
                   
                    $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Investigation Details:</td>
                               <td style="text-align: left;" class="tabledivideright">

                               <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1"><thead><tr><th>Particulars</th><th>Rate</th></tr></thead><tbody>';
                     $sl=1;
                      $this->load->model('Common_model');
                     foreach($Getdetailstableex as $datai)
                     {
                        $getparticularname=$this->Common_model->getparticularsmodel($datai['charge_id'],$datai['particulars_id'],$this->session->userdata('office_id'));

                         $showdata.='<tr>
                              <td>'.$getparticularname[0]['name'].'</td>
                              <td>'.$datai['rate'].'</td>
                         </tr>';
                         $sl++;

                     }
                      $showdata.='</tbody></table></td></tr>';
                   }
              }

              if($preliminary_exout=='true')
              {
                         $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Preliminary  Examination:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                  <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                <tbody><tr>
                                                    <th>Date</th>
                                                    <th class="tab_tit">NCT</th>
                                                    <th class="tab_tit">GAT</th>
                                                    <th class="tab_tit">CCT</th>
                                                    <th class="tab_tit">Angle</th>
                                                    <th class="tab_tit">Color Vision</th>
                                                    <th class="tab_tit">Pupil</th>
                                                </tr>
                                                 <tr>
                                                    <td class="tab_tit">Right Eye</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre1.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre2.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre3.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre4.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre5.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre6.'</td>
                                                </tr>
                                                 <tr>
                                                    <td class="tab_tit">Left Eye</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre7.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre8.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre9.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre10.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre11.'</td>
                                                    <td style="padding:5px;" align="center">'.$examination_masters->pre12.'</td>
                                                </tr>
                                            </tbody></table>
                                            </td>
                                            </tr>';
              }

               if($vsisonreadingsout=='true')
              {
                         $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Vision Readings:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                  <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                          <tbody><tr>
                                                            <th></th>
                                                            <th colspan="2" align="center">UCVA</th>
                                                            <th>PH</th>
                                                            <th colspan="2" align="center">BCVA</th>
                                                          </tr>
                                                          <tr>
                                                            <td></td>
                                                            <td>UCDVA</td>
                                                            <td>UCNVA</td>
                                                            <td>PH</td>
                                                            <td>UCDVA</td>
                                                            <td>UCNVA</td>
                                                          </tr>
                                                           <tr>
                                                              <td>Right Eye</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis1.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis2.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis3.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis4.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis5.'</td>
                                                          </tr>
                                                          <tr>
                                                              <td>Left Eye</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis6.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis7.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis8.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis9.'</td>
                                                              <td style="padding:5px;" align="center">'.$examination_masters->vis10.'</td>
                                                          </tr>
                                                      </tbody></table>
                                            </td>
                                            </tr>';
              }


                  if($curspecout=='true')
              {
                         $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Current Spectacle Prescription:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                  <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                        <tbody><tr>
                                            <th align="center" class="tab_tit">RE</th>
                                            <th align="center" class="tab_tit">LE</th>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px;">
                                               <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                    <tbody><tr>
                                                        <td>
                                                        </td><td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit">D.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur1.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur2.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur3.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur4.'</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit">N.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur5.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur6.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur7.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur8.'</td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td style="padding: 0px;">
                                               <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                    <tbody><tr>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur9.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur10.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur11.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur12.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur13.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur14.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur15.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->cur16.'</td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                            </td>
                                            </tr>';
              }
             
                  if($objectchkout=='true')
              {
                         $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top"> Objective Refraction:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                         <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                          <tbody><tr>
                                                            <th>UD</th>
                                                            <th>SPH</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                            <th>CP</th>
                                                            <th>SPH</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                          </tr>
                                                          <tr>
                                                             <td>RE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj1.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj2.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj3.'</td>
                                                             <td >RE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj4.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj5.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj6.'</td>
                                                          </tr>
                                                           <tr>
                                                             <td>LE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj7.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj8.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj9.'</td>
                                                             <td >LE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj10.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj11.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->obj12.'</td>
                                                          </tr>
                                                          <tr>
                                                            <td>IPD</td>
                                                            <td style="padding:5px;" align="center">'.$examination_masters->obj13.'</td>
                                                            <td>PD RE</td>
                                                            <td style="padding:5px;" align="center">'.$examination_masters->obj14.'</td>
                                                            <td>PD LE</td>
                                                            <td style="padding:5px;" align="center">'.$examination_masters->obj15.'</td>
                                                          </tr>
                                                      </tbody></table>
                                </td>
                                </tr>';
              }

                 if($arkkchkout=='true')
              {
                         $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">AR Kerotometry:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                         <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                          <tbody><tr>
                                                            <th>ARK</th>
                                                            <th>K1</th>
                                                            <th>AXIS</th>
                                                            <th>K2</th>
                                                            <th>AXIS</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                          </tr>
                                                          <tr>
                                                             <td>RE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar1.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar2.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar3.'</td>
                                                             <td>RE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar4.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar5.'</td>
                                                            
                                                          </tr>
                                                           <tr>
                                                             <td>LE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar6.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar7.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar8.'</td>
                                                             <td>LE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar9.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->ar10.'</td>
                                                          </tr>
                                                      </tbody></table>
                                </td>
                                </tr>';
              }


               if($manchkout=='true')
              {
                         $showdata.='<br/><tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Manual Kerotometry:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                         <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">
                                                          <tbody><tr>
                                                            <th>ARK</th>
                                                            <th>K1</th>
                                                            <th>AXIS</th>
                                                            <th>K2</th>
                                                            <th>AXIS</th>
                                                            <th>CYL</th>
                                                            <th>AXIS</th>
                                                          </tr>
                                                          <tr>
                                                             <td>RE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man1.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man2.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man3.'</td>
                                                             <td>RE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man4.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man5.'</td>
                                                            
                                                          </tr>
                                                           <tr>
                                                             <td>LE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man6.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man7.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man8.'</td>
                                                             <td>LE</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man9.'</td>
                                                             <td style="padding:5px;" align="center">'.$examination_masters->man10.'</td>
                                                          </tr>
                                                      </tbody></table>
                                </td>
                                </tr>';
              }


                  if($specchkout=='true')
              {
                         $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Spectacle Correction:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                      <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">
                                                    <tr>
                                                        <th colspan="1"></th>
                                                        <th colspan="4">RE</th>
                                                        <th colspan="4">LE</th>
                                                    </tr>
                                                    <tr>
                                                        <td></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit">D.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe1.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe2.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe3.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe4.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe9.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe10.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe11.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe12.'</td>
                                                    </tr>
                                                     <tr>
                                                        <td  class="tab_tit">N.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe5.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe6.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe7.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe8.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe13.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe14.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe15.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->spe16.'</td>
                                                    </tr>
                                                </table>
                                </td>
                                </tr>';
              }

               if($conlchkout=='true')
              {
                         $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Contact Lens Correction:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                      <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">
                                                    <tr>
                                                        <th colspan="1"></th>
                                                        <th colspan="4">RE</th>
                                                        <th colspan="4">LE</th>
                                                    </tr>
                                                    <tr>
                                                        <td></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit">D.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con1.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con2.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con3.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con4.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con9.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con10.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con11.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con12.'</td>
                                                    </tr>
                                                     <tr>
                                                        <td  class="tab_tit">N.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con5.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con6.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con7.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con8.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con13.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con14.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con15.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->con16.'</td>
                                                    </tr>
                                                </table>
                                </td>
                                </tr>';
              }

              if($fspecchkout=='true')
              {
                         $showdata.='<tr>
                               <td style="text-align: left;"  class="tabledivideleft" valign="top">Final Glass Correction:</td>
                               <td style="text-align: left;" class="tabledivideright">
                                      <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">
                                                    <tr>
                                                        <th colspan="1"></th>
                                                        <th colspan="4">RE</th>
                                                        <th colspan="4">LE</th>
                                                    </tr>
                                                    <tr>
                                                        <td></th>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                        <td class="tab_tit">SPH</td>
                                                        <td class="tab_tit">CYL</td>
                                                        <td class="tab_tit">AXIS</td>
                                                        <td class="tab_tit">V/A</td>
                                                    </tr>
                                                     <tr>
                                                        <td class="tab_tit">D.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe1.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe2.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe3.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe4.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe9.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe10.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe11.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe12.'</td>
                                                    </tr>
                                                     <tr>
                                                        <td  class="tab_tit">N.V</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe5.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe6.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe7.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe8.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe13.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe14.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe15.'</td>
                                                        <td style="padding:5px;" align="center">'.$examination_masters->fspe16.'</td>
                                                    </tr>
                                                </table>
                                </td>
                                </tr>';
              }



    $showdata.='</table>';

   $data['conddata']=$showdata;
 

   

  

    
     


   
   
         $printdata=1;
         switch($printdata)
            {
            case 1:$html=$this->load->view("transaction/examination/examinationprint",$data, true); 
                   $print_config=[
                                    'format' => 'A4',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 10,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];
                                break;
            case 2:$html=$this->load->view("transaction/billing/print",$data, true); 
                   $print_config=[
                                    'format' => 'A4-L',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 5,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];
                                break;
           case 3:$html=$this->load->view("transaction/billing/print",$data, true); 
        
           
                   $print_config=[
                                    'format' => 'A5',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 5,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];
                                break;
              case 4:$html=$this->load->view("transaction/billing/print",$data, true); 
                   $print_config=[
                                    'format' => 'A5-L',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 10,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];
                                break;
            }

            $mpdf = new \Mpdf\Mpdf($print_config);
            $pdfFilePath ="print-".time().".pdf"; 
            $labName='';
            $mpdf->SetWatermarkText($labName,0.03);
            $mpdf->showWatermarkText = true;
            $mpdf -> SetDisplayMode('fullpage');
            $mpdf->WriteHTML($html);
            $mpdf->Output();
           
  }

//INR4

public  function print_bill_preview($examinationid,$postvalues,$office_id)
{   
  
  error_reporting(0);      
  
  $postvaluesArray = explode(',', $postvalues);
  $postoutvalue1=$postvaluesArray[0]; //Presenting Complaint
  $postoutvalue2=$postvaluesArray[1]; //Ophthalmic History
  $postoutvalue3=$postvaluesArray[2]; // Medical History
  $postoutvalue4=$postvaluesArray[3]; //Preliminary Examination
  $postoutvalue5=$postvaluesArray[4]; //Vision Readings
  $postoutvalue6=$postvaluesArray[5]; //Current Spectacle Prescription 1
  $postoutvalue7=$postvaluesArray[6]; //Current Spectacle Prescription 2
  $postoutvalue8=$postvaluesArray[7]; //Current Spectacle Prescription 3
  $postoutvalue9=$postvaluesArray[8]; //Objective Refraction
  $postoutvalue10=$postvaluesArray[9]; //Retina Scope
  $postoutvalue11=$postvaluesArray[10]; //AR Kerotometry
  $postoutvalue12=$postvaluesArray[11]; //Manual Kerotometry
  $postoutvalue13=$postvaluesArray[12]; //Undilated Correction
  $postoutvalue14=$postvaluesArray[13]; //Cyclopedia Correction
  $postoutvalue15=$postvaluesArray[14]; //PMT Correction
  $postoutvalue16=$postvaluesArray[15]; //Final Glass Prescription
  $postoutvalue17=$postvaluesArray[16]; //Medicine Details
  $postoutvalue18=$postvaluesArray[17]; //Diagnosis Plan
  $postoutvalue19=$postvaluesArray[18]; //Eye Details
  $postoutvalue20=$postvaluesArray[19]; //Eye Parts Examination
  $postoutvalue21=$postvaluesArray[20]; //Investigation Details
  $postoutvalue22=$postvaluesArray[21]; //Treatment Plan

  $office=$this->db->get_where('office',"office_id=$office_id")->row();

  $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";

  

  $data['company_name']=$office->printable_company_name;

  $data['company_address']=$office->printable_company_address;

  $data['company_mobile']=$office->printable_company_mobile;

  $data['company_land_phone']=$office->printable_company_phone;

  $data['company_email']=$office->printable_emailid;

  $data['company_gst']=$office->license_no;

  $data['print_declaration']=$office->declaration;

  $data['gstin_no']=$office->gstin_no;



  $examination_masters=$this->db->get_where('examination',"examination_id=$examinationid")->row();
  $examination_masters2=$this->db->get_where('examination_next_part',"examination_id=$examinationid")->row();

  $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->name;

  $data['username']=$this->db->get_where('user',"user_id=$examination_masters->login_id")->row()->name;



  $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$examination_masters->patient_registration_id")->row();

  $data['d_date']=date("d-m-Y", strtotime($examination_masters->d_date));


  $data['current_meditation']=$examination_masters->current_meditation;

  $data['family_history']=$examination_masters->family_history;

  $data['drug_history']=$examination_masters->drug_history;

  $data['cur1']=$examination_masters->cur1;

  $data['cur2']=$examination_masters->cur2;

  $data['cur3']=$examination_masters->cur3;

  $data['cur4']=$examination_masters->cur4;

  $data['cur5']=$examination_masters->cur5;

  $data['cur6']=$examination_masters->cur6;

  $data['cur7']=$examination_masters->cur7;

  $data['cur8']=$examination_masters->cur8;

  $data['cur9']=$examination_masters->cur9;

  $data['cur10']=$examination_masters->cur10;

  $data['cur11']=$examination_masters->cur11;

  $data['cur12']=$examination_masters->cur12;

  $data['cur13']=$examination_masters->cur13;

  $data['cur14']=$examination_masters->cur14;

  $data['cur15']=$examination_masters->cur15;

  $data['cur16']=$examination_masters->cur16;

  $data['vis1']=$examination_masters->vis1;

  $data['vis2']=$examination_masters->vis2;

  $data['vis3']=$examination_masters->vis3;

  $data['vis4']=$examination_masters->vis4;

  $data['vis5']=$examination_masters->vis5;

  $data['vis6']=$examination_masters->vis6;

  $data['vis7']=$examination_masters->vis7;

  $data['vis8']=$examination_masters->vis8;

  $data['vis9']=$examination_masters->vis9;

  $data['vis10']=$examination_masters->vis10;

  $data['ar1']=$examination_masters->ar1;

  $data['ar2']=$examination_masters->ar2;

  $data['ar3']=$examination_masters->ar3;

  $data['ar4']=$examination_masters->ar4;

  $data['ar5']=$examination_masters->ar5;

  $data['ar6']=$examination_masters->ar6;

  $data['ar7']=$examination_masters->ar7;

  $data['ar8']=$examination_masters->ar8;

  $data['ar9']=$examination_masters->ar9;

  $data['ar10']=$examination_masters->ar10;

  $data['man1']=$examination_masters->man1;

  $data['man2']=$examination_masters->man2;

  $data['man3']=$examination_masters->man3;

  $data['man4']=$examination_masters->man4;

  $data['man5']=$examination_masters->man5;

  $data['man6']=$examination_masters->man6;

  $data['man7']=$examination_masters->man7;

  $data['man8']=$examination_masters->man8;

  $data['man9']=$examination_masters->man9;

  $data['man10']=$examination_masters->man10;

  $data['spe1']=$examination_masters->spe1;

  $data['spe2']=$examination_masters->spe2;

  $data['spe3']=$examination_masters->spe3;

  $data['spe4']=$examination_masters->spe4;

  $data['spe5']=$examination_masters->spe5;

  $data['spe6']=$examination_masters->spe6;

  $data['spe7']=$examination_masters->spe7;

  $data['spe8']=$examination_masters->spe8;

  $data['spe9']=$examination_masters->spe9;

  $data['spe10']=$examination_masters->spe10;

  $data['spe11']=$examination_masters->spe11;

  $data['spe12']=$examination_masters->spe12;

  $data['spe13']=$examination_masters->spe13;

  $data['spe14']=$examination_masters->spe14;

  $data['spe15']=$examination_masters->spe15;

  $data['spe16']=$examination_masters->spe16;

  $data['con1']=$examination_masters->con1;

  $data['con2']=$examination_masters->con2;

  $data['con3']=$examination_masters->con3;

  $data['con4']=$examination_masters->con4;

  $data['con5']=$examination_masters->con5;

  $data['con6']=$examination_masters->con6;

  $data['con7']=$examination_masters->con7;

  $data['con8']=$examination_masters->con8;

  $data['con9']=$examination_masters->con9;

  $data['con10']=$examination_masters->con10;

  $data['con11']=$examination_masters->con11;

  $data['con12']=$examination_masters->con12;

  $data['con13']=$examination_masters->con13;

  $data['con14']=$examination_masters->con14;

  $data['con15']=$examination_masters->con15;

  $data['con16']=$examination_masters->con16;

  $data['pmt1']=$examination_masters->pmt1;

  $data['pmt2']=$examination_masters->pmt2;

  $data['pmt3']=$examination_masters->pmt3;

  $data['pmt4']=$examination_masters->pmt4;

  $data['pmt5']=$examination_masters->pmt5;

  $data['pmt6']=$examination_masters->pmt6;

  $data['pmt7']=$examination_masters->pmt7;

  $data['pmt8']=$examination_masters->pmt8;

  $data['pmt9']=$examination_masters->pmt9;

  $data['pmt10']=$examination_masters->pmt10;

  $data['pmt11']=$examination_masters->pmt11;

  $data['pmt12']=$examination_masters->pmt12;

  $data['pmt13']=$examination_masters->pmt13;

  $data['pmt14']=$examination_masters->pmt14;

  $data['pmt15']=$examination_masters->pmt15;

  $data['pmt16']=$examination_masters->pmt16;


  $data['ant_lefteye']=$examination_masters->ant_lefteye;
  $data['ant_righteye']=$examination_masters->ant_righteye;
  $data['bfit']=$examination_masters->bfit;
  $data['vcontent']=$examination_masters->vcontent;
  $data['clinical_advisor']=$examination_masters->clinical_advisor;
  $data['vdiagnosis']=$examination_masters->vdiagnosis;
  $data['plan_of_action']=$examination_masters->plan_of_action;
  

 $data['fname']=$patient_details->fname; 

 $data['lname']=$patient_details->lname; 

 $data['mrdno']=$patient_details->mrdno; 

 $data['address']=$patient_details->address; 

 $data['mobileno']=$patient_details->mobileno; 



 if($patient_details->gender==1)

 {

  $age='Male';

 }

 elseif($patient_details->gender==2)

 {

  $age="Female";

 }

 else

 {

  $age='Transgender';

 }

 $data['gender']=$age; 

 $data['ageyy']=$patient_details->ageyy; 

 $data['agemm']=$patient_details->agemm; 

 $title_id=$patient_details->title; 

 $entered_by='N/A';
 if($examination_masters2->entered_by)
 {
    $entered_by=$this->db->get_where('staff',"staff_id=$examination_masters2->entered_by")->row()->name;
 }

 
 $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;

 $showdata='<table  width="100%" style="line-height:10px;margin-top:0px;font-size: 14;"> 

            <tr>

                 <td style="text-align: left;" class="tabledivideleft">Date:</td>

                 <td style="text-align: left;" class="tabledivideright">'.$this->date->dateSql2View($examination_masters->examination_date).'</td> 

            </tr>';

            $showdata.='</br>';

          // Print Order change
          
             
          // change order end
            if($postoutvalue1=='true')

            {

                

                $complaints=$this->db->query("select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where examination_id=$examination_masters->examination_id")->result(); 

                 if($complaints){

                  $showdata.='<tr>

                  <td style="text-align: left;"  class="tabledivideleft" valign="top">Presenting Complaint:</td>

                  <td style="text-align: left;" class="tabledivideright">

                        

                            <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">

                             <thead>

                                <tr>

                                 

                                  <th>EYE </th>
                          
                                  <th>Compliants</th>
                                  <th>Remarks</th>

                               </tr>

                               </thead>

                               <tbody id="showcomp">';

                               foreach($complaints as $comp) { 
                               
                               $lefteye='';

                           $righteye='';
                           $eyeDetails='';

                         $remarks='';
                            if($comp->eye_left==1)
                           {
                              $lefteye ="Left";
                           }

                           if($comp->eye_right==1)

                           {

                              $righteye="Right";
                           }
                            if($comp->eye_be==1)

                           {
                          $eyeDetails="Both Eye";
                             
                           }
                           if( $eyeDetails=='')
                           {
                           
                        $eyeDetails =  $lefteye.$righteye;
                        }
                        log_message('info','In compliants/.............');
                        log_message('info',$comp->eye_be);
                        log_message('info', $comp->eye_left);
                        log_message('info', $comp->eye_right);
                        
                           $showdata.='<tr>
                           <td> '.$eyeDetails.' </td>
                                       <td>'.$comp->name.'</td>

                                      
                                     
                                       <td>'.$comp->remarks.'</td>

                                   </tr>';
                           
                                 } 

                             $showdata.='</tbody></table>

                               </td> 

                        

                   </tr>';

                              }

            }

      

            if($postoutvalue2=='true')

            {

               $ophthalmic_history=$this->db->query("select * from examination_ophthalmic_history inner join ophthalmic_history on examination_ophthalmic_history.ophthalmic_history_id=ophthalmic_history.ophthalmic_history_id where examination_id=$examination_masters->examination_id")->result(); 

if($ophthalmic_history){ 

                $showdata.='<br/><tr>

                             <td style="text-align: left;"  class="tabledivideleft" valign="top">Ophthalmic History:</td>

                             <td style="text-align: left;" class="tabledivideright">
                             <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">
                             <thead>

                             <tr>

                              

                               <th>EYE </th>
                       
                               <th>Compliants</th>
                               <th>Remarks</th>

                            </tr>

                            </thead>
                            <tbody id="showopt">';
                                  if($ophthalmic_history){ foreach($ophthalmic_history as $opth){

                                    
                               $lefteye='';

                               $righteye='';
  
                             $remarks='';

                                       if($opth->eye_left==1)

                                      {

                                          $lefteye ="LeftEye";

                                          $remarks=$opth->remarks;

                                      }

                                      if($opth->eye_right==1)

                                      {

                                          $righteye="RightEye";

                                          $remarks=$opth->remarks;

                                      }

                                 
                                  
                                   $showdata.='<tr>
                                   <td> '.$lefteye.' '.$righteye.' </td>
                                               <td>'.$opth->name.'</td>
                                               <td>'.$remarks.'</td>
      
                                           </tr>';
                                   

                                 

                              } }

                              $showdata.='</tbody></table>

                              </td> 

                       

                  </tr>';

                    }



            }


      
              


            $showdata.='</br>';
          //3
           if($postoutvalue3=='true')

 {

     $medical_history=$this->db->query("select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where examination_id=$examination_masters->examination_id")->result(); 

     if($medical_history){

     $showdata.='<br/><tr>

                  <td style="text-align: left;"  class="tabledivideleft" valign="top">Medical History:</td>

                  <td style="text-align: left;" class="tabledivideright">';

                       if($medical_history){ foreach($medical_history as $medi){

                        // $showdata.='<span>'.$medi->name.'<br/>
                        $showdata.='<span>'.$medi->name.'  '.$medi->remarks.' <br/></span>';
                       

                   } }

                  $showdata.='</td> 

             </tr>';

         }

 }
 //4
          if($examination_masters->family_history!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Family History</td>

               <td style="text-align: left;" class="tabledivideright">'.$examination_masters->family_history.'</td> 

          </tr>
          
          ';
          }
          //5
           if($examination_masters->drug_history!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Drug Allergy</td>

               <td style="text-align: left;" class="tabledivideright">'.$examination_masters->drug_history.'</td> 

          </tr>
          
          ';
          }
          //6
           if($examination_masters->current_meditation!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Current Medication</td>

               <td style="text-align: left;" class="tabledivideright">'.$examination_masters->current_meditation.'</td> 

          </tr>
          
          ';
          }

          if($postoutvalue4=='true')

          {

                     $showdata.='<br/><tr>

                           <td style="text-align: left;"  class="tabledivideleft" valign="top">Preliminary  Examination:</td>

                           <td style="text-align: left;" class="tabledivideright">

                              <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                            <tbody><tr>

                                                <th>Date</th>

                                                <th class="tab_tit">NCT</th>

                                                <th class="tab_tit">GAT</th>

                                                <th class="tab_tit">CCT</th>

                                                <th class="tab_tit">Angle</th>

                                                <th class="tab_tit">Color Vision</th>

                                                <th class="tab_tit">Pupil</th>

                                            </tr>

                                             <tr>

                                                <td class="tab_tit">Right Eye</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre1.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre2.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre3.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre4.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre5.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre6.'</td>

                                            </tr>

                                             <tr>

                                                <td class="tab_tit">Left Eye</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre7.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre8.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre9.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre10.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre11.'</td>

                                                <td style="padding:5px;" align="center">'.$examination_masters->pre12.'</td>

                                            </tr>
                                            <tr>
                                                <td colspan="7">Remarks:'.$examination_masters->pre_remarks.'</td>
                                            </tr>

                                        </tbody></table>

                                        </td>

                                        </tr>';

          }
          
            if($postoutvalue5=='true')

          {

                     $showdata.='<br/><tr>

                           <td style="text-align: left;"  class="tabledivideleft" valign="top">Vision Readings:</td>

                           <td style="text-align: left;" class="tabledivideright">

                              <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                                      <tbody><tr style="display:none;">

                                                        <th></th>

                                                        <th colspan="2" align="center">UCVA</th>

                                                        <th>PH</th>

                                                        <th colspan="2" align="center">BCVA</th>

                                                      </tr>

                                                    

                                                       <tr>

                                                          <td>Right Eye</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis1.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis2.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis3.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis4.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis5.'</td>

                                                      </tr>

                                                      <tr>

                                                          <td>Left Eye</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis6.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis7.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis8.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis9.'</td>

                                                          <td style="padding:5px;" align="center">'.$examination_masters->vis10.'</td>

                                                      </tr>

                                                  </tbody></table>

                                        </td>

                                        </tr>';

          }

          if($postoutvalue6=='true')

          {

              $showdata.='<br/><tr>

              <td style="text-align: left;"  class="tabledivideleft" valign="top">Current Spectacle Prescription 1:</td>

              <td style="text-align: left;" class="tabledivideright">

                     <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                   <tr>

                                       <th colspan="1"></th>

                                       <th colspan="4">RE</th>

                                       <th colspan="4">LE</th>

                                   </tr>

                                   <tr>

                                       <td></th>

                                       <td class="tab_tit">SPH</td>

                                       <td class="tab_tit">CYL</td>

                                       <td class="tab_tit">AXIS</td>

                                       <td class="tab_tit">V/A</td>

                                       <td class="tab_tit">SPH</td>

                                       <td class="tab_tit">CYL</td>

                                       <td class="tab_tit">AXIS</td>

                                       <td class="tab_tit">V/A</td>

                                   </tr>

                                    <tr>

                                       <td class="tab_tit">D.V</td>

                                      <td style="padding:5px;" align="center">'.$examination_masters->cur1.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur4.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur9.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur10.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur11.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur12.'</td>

                                   </tr>

                                    <tr>

                                       <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->cur5.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur6.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur7.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur8.'</td>

                                     <td style="padding:5px;" align="center">'.$examination_masters->cur13.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur14.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur15.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters->cur16.'</td>

                                   </tr>
                                   <tr>
                                   <td colspan="9">Remarks: '.$examination_masters2->csp1_remarks.'</td>
                               </tr>

                               </table>

               </td>

               </tr>';
          }

          if($postoutvalue7=='true')

          {

              $showdata.='<br/><tr>

              <td style="text-align: left;"  class="tabledivideleft" valign="top">Current Spectacle Prescription 2:</td>

              <td style="text-align: left;" class="tabledivideright">

                     <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                   <tr>

                                       <th colspan="1"></th>

                                       <th colspan="4">RE</th>

                                       <th colspan="4">LE</th>

                                   </tr>

                                   <tr>

                                       <td></th>

                                       <td class="tab_tit">SPH</td>

                                       <td class="tab_tit">CYL</td>

                                       <td class="tab_tit">AXIS</td>

                                       <td class="tab_tit">V/A</td>

                                       <td class="tab_tit">SPH</td>

                                       <td class="tab_tit">CYL</td>

                                       <td class="tab_tit">AXIS</td>

                                       <td class="tab_tit">V/A</td>

                                   </tr>

                                    <tr>

                                       <td class="tab_tit">D.V</td>

                                      <td style="padding:5px;" align="center">'.$examination_masters2->cur1_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur2_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur3_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur4_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur9_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur10_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur11_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur12_csp2.'</td>

                                   </tr>

                                    <tr>

                                       <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters2->cur5_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur6_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur7_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur8_csp2.'</td>

                                     <td style="padding:5px;" align="center">'.$examination_masters2->cur13_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur14_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur15_csp2.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur16_csp2.'</td>

                                   </tr>
                                   <tr>
                                   <td colspan="9">Remarks: '.$examination_masters2->csp2_remarks.'</td>
                               </tr>

                               </table>

               </td>

               </tr>';
          }
          if($postoutvalue8=='true')

          {

              $showdata.='<br/><tr>

              <td style="text-align: left;"  class="tabledivideleft" valign="top">Current Spectacle Prescription 3:</td>

              <td style="text-align: left;" class="tabledivideright">

                     <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                   <tr>

                                       <th colspan="1"></th>

                                       <th colspan="4">RE</th>

                                       <th colspan="4">LE</th>

                                   </tr>

                                   <tr>

                                       <td></th>

                                       <td class="tab_tit">SPH</td>

                                       <td class="tab_tit">CYL</td>

                                       <td class="tab_tit">AXIS</td>

                                       <td class="tab_tit">V/A</td>

                                       <td class="tab_tit">SPH</td>

                                       <td class="tab_tit">CYL</td>

                                       <td class="tab_tit">AXIS</td>

                                       <td class="tab_tit">V/A</td>

                                   </tr>

                                    <tr>

                                       <td class="tab_tit">D.V</td>

                                      <td style="padding:5px;" align="center">'.$examination_masters2->cur1_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur2_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur3_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur4_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur9_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur10_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur11_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur12_csp3.'</td>

                                   </tr>

                                    <tr>

                                       <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters2->cur5_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur6_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur7_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur8_csp3.'</td>

                                     <td style="padding:5px;" align="center">'.$examination_masters2->cur13_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur14_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur15_csp3.'</td>

                                       <td style="padding:5px;" align="center">'.$examination_masters2->cur16_csp3.'</td>

                                   </tr>
                                   <tr>
                                                <td colspan="9">Remarks: '.$examination_masters2->csp3_remarks.'</td>
                                            </tr>

                               </table>

               </td>

               </tr>';
          }

          
if($postoutvalue9=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top"> Objective Refraction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                           <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                            <tbody><tr>

                                              <th>UD</th>

                                              <th>SPH</th>

                                              <th>CYL</th>

                                              <th>AXIS</th>

                                              <th>CP</th>

                                              <th>SPH</th>

                                              <th>CYL</th>

                                              <th>AXIS</th>

                                            </tr>

                                            <tr>

                                               <td>RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj1.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj2.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj3.'</td>

                                               <td >RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj4.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj5.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj6.'</td>

                                            </tr>

                                             <tr>

                                               <td>LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj7.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj8.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj9.'</td>

                                               <td >LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj10.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj11.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->obj12.'</td>

                                            </tr>

                                            <tr>

                                              <td>IPD</td>

                                              <td style="padding:5px;" align="center">'.$examination_masters->obj13.'</td>

                                              <td>PD RE</td>

                                              <td style="padding:5px;" align="center">'.$examination_masters->obj14.'</td>

                                              <td>PD LE</td>

                                              <td style="padding:5px;" align="center">'.$examination_masters->obj15.'</td>

                                            </tr>

                                        </tbody></table>

                  </td>

                  </tr>';

}

if($postoutvalue10=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top"> Retina Scope:</td>

                 <td style="text-align: left;" class="tabledivideright">

                           <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                            <tbody><tr>

                                              <th>DRY</th>

                                              <th>SPH</th>

                                              <th>CYL</th>

                                              <th>AXIS</th>

                                              <th>WET</th>

                                              <th>SPH</th>

                                              <th>CYL</th>

                                              <th>AXIS</th>

                                            </tr>

                                            <tr>

                                               <td>RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj1_cp.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj2_cp.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj3_cp.'</td>

                                               <td >RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj4_cp.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj5_cp.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj6_cp.'</td>

                                            </tr>

                                             <tr>

                                               <td>LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj7.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj8.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj9.'</td>

                                               <td >LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj10_cp.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj11_cp.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters2->obj12_cp.'</td>

                                            </tr>
                                            <tr>
                                                <td colspan="8">Remarks: '.$examination_masters2->redscope_remarks.'</td>
                                            </tr>

                                           

                                        </tbody></table>

                  </td>

                  </tr>';

}
if($postoutvalue11=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">AR Kerotometry:</td>

                 <td style="text-align: left;" class="tabledivideright">

                           <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                            <tbody><tr>

                                              <th>ARK</th>

                                              <th>K1</th>

                                              <th>AXIS</th>

                                              <th>K2</th>

                                              <th>AXIS</th>

                                             
                                            </tr>

                                            <tr>

                                               <td>RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar1.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar2.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar3.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar5.'</td>

                                              
                                              

                                            </tr>

                                             <tr>

                                               <td>LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar6.'</td>

                                              

                                               <td>'.$examination_masters->ar7.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar8.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->ar10.'</td>

                                            </tr>

                                        </tbody></table>

                  </td>

                  </tr>';

}





 if($postoutvalue12=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Manual Kerotometry:</td>

                 <td style="text-align: left;" class="tabledivideright">

                           <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                            <tbody><tr>

                                              <th>ARK</th>

                                              <th>K1</th>

                                              <th>AXIS</th>

                                              <th>K2</th>

                                              <th>AXIS</th>

                                              <th>CYL</th>

                                              <th>AXIS</th>

                                            </tr>

                                            <tr>

                                               <td>RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man1.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man2.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man3.'</td>

                                               <td>RE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man4.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man5.'</td>

                                              

                                            </tr>

                                             <tr>

                                               <td>LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man6.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man7.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man8.'</td>

                                               <td>LE</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man9.'</td>

                                               <td style="padding:5px;" align="center">'.$examination_masters->man10.'</td>

                                            </tr>

                                        </tbody></table>

                  </td>

                  </tr>';

}
if($postoutvalue13=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Undilated Correction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}

//14
 if($postoutvalue14=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Cyclopedia Correction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}


//15

     if($postoutvalue15=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">PMT Correction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}

if($postoutvalue16=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Final Glass Prescription:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}
          
if($postoutvalue17=='true')

{

      $var_array=array($examination_masters->examination_id,$this->session->userdata('office_id'));

      $getdoctorprescription=$this->getdoctormedicinemodels($var_array);

     

     if($getdoctorprescription)

     {

     

      $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Medicine Details:</td>

                 <td style="text-align: left;" class="tabledivideright">


                 <table  style="width:100%;margin-top:25px;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1"><thead><tr><th style="width:5%;">SL NO</th style="width:10%;"><th style="width:20%;">Drug Name</th><th style="width:20%;">Instruction</th><th style="width:20%;">No Of Days</th><th style="width:20%;">Qty</th><th style="width:5%;">Eye</th></tr></thead><tbody>';

       $sgl=0;

       foreach($getdoctorprescription as $datame)

       {

          $sgl++;

           if($datame['med_action']==0)
                    {
                        $drugname=$datame['drugname'];
                    }
                    else
                    {
                        $drugname=$datame['med_name'];
                    }

          $showdata.='<tr><td>'.$sgl.'</td><td>'.$drugname.'</td><td>'.$datame['instruction'].'</td><td>'.$datame['nodays'].'</td><td>'.$datame['qty'].'</td><td>'.$datame['med_eye'].'</td></tr>';

       }

        $showdata.='</tbody></table></td></tr>';

     }

}    

if($postoutvalue18=='true')

{

     

      $getresult_Diag=$this->Get_Showdata_Dia($examination_masters->examination_id);

     

     if($getresult_Diag)

     {

     

      $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Diagnosis Plan:</td>

                 <td style="text-align: left;" class="tabledivideright">


                 <table style="width:100%;margin-top:25px;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1"><thead><tr><th>SL NO</th><th>Diagnosis</th><th>Department</th><th>Eye</th></tr></thead><tbody>';

                 $sgl=1;
                 foreach($getresult_Diag as $datadia)
                 {  
                    $showdata.='<tr><td>'.$sgl.'</td><td>'.$datadia['dianame'].'</td><td>'.$datadia['dename'].'</td><td>'.$datadia['eye'].'</td></tr>';
                    $sgl++;
                 }

        $showdata.='</tbody></table></td></tr>';

     }

}  
                      
           


   if($postoutvalue19=='true')

   {

        $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examination_masters->examination_id group by eye_complaints.eye_complaints_id")->result(); 

        if($eye_comp){

       $showdata.='<br/><tr>

                    <td style="text-align: left;"  class="tabledivideleft" valign="top">Eye Details:</td>

                    <td style="text-align: left;" class="tabledivideright">

                          

                              <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">

                               <thead>

                                  <tr>

                                    <th>Right Eye</th>

                                    <th>Particulars</th>

                                    <th>Left Eye</th>

                                 </tr>

                                 </thead>

                                 <tbody id="showdataeyecomp">';

                                  foreach ($eye_comp as $datab) { 
                                    $lefteyedet='';
                                    $eye_comp_left=$this->db->query("select eye_details.name from examination_eye inner join eye_details on examination_eye.lefteye=eye_details.eye_details_id where eye_complaints_id=$datab->eye_complaints_id and examination_id=$examination_masters->examination_id")->result(); 
                                    if($eye_comp_left)
                                    {
                                        foreach ($eye_comp_left as $dataleft) 
                                        {
                                            $lefteyedet.=$dataleft->name.',';
                                        }
                                       $lefteyedet= rtrim($lefteyedet, ',');
                                    }
                
                                    $righteyel='';
                                    $eye_comp_right=$this->db->query("select eye_details.name from examination_eye inner join eye_details on examination_eye.righteye=eye_details.eye_details_id where eye_complaints_id=$datab->eye_complaints_id and examination_id=$examination_masters->examination_id")->result(); 
                                    if($eye_comp_right)
                                    {
                                        foreach ($eye_comp_right as $dataright) 
                                        {
                                            $righteyel.=$dataright->name.',';
                                        }
                                       $righteyel= rtrim($righteyel, ',');
                                    }
                             $showdata.='<tr>

                                         <td>'.$righteyel.'</td>

                                         <td>'.$datab->name.'</td>

                                         <td>'.$lefteyedet.'</td>

                                     </tr>';

                                   } 

                                   $showdata.='</tbody></table></td></tr>';

           }

   }
          
            if($postoutvalue20=='true')

      {
            $var_arrayf=array($this->input->post('examinationid'));
            log_message('info', '==========');
            log_message('info', $examinationid);
            $getresult=$this->getEyePartdetails($var_arrayf);
           if($getresult){

          $showdata.='<br/><tr>

                       <td style="text-align: left;"  class="tabledivideleft" valign="top">Eye Parts Examination:</td>

                       <td style="text-align: left;" class="tabledivideright">

                             

                                 <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">

                                  <thead>

                                     <tr>
                                   
      
                                       <th></th>

                                       <th></th>

                                       <th>Right</th>

                                       <th>Left</th>

                                    </tr>

                                    </thead>

                                    <tbody id="showdataeyecomp">';

                                     foreach ($getresult as $dadta) { 

                                        $checkedright='';
                                        $checkedleft ='';
                                       
                                       // $gp= $dadta->righteyepartscheckbox;
                                        log_message('info', '+++++++++++');
                                       
                                        if($dadta['righteyepartscheckbox'] == "on")
                                        {
                                         log_message('info', '***********');                                         
                                          $checkedright ="&#10004;";
                                        }
                                     //   $gl= $dadta->lefteyepartscheckbox;

                                        if($dadta['lefteyepartscheckbox'] == "on")
                                        {
                                            $checkedleft ="&#10004;";
                                        }
        

                                $showdata.='<tr>
                        
                                
                                            <td> '.$dadta['segment_name'].'</td>
                                              <td> '.$dadta['content'].'</td>
                                            
                                            <td>'.$checkedright.'  '.$dadta['righteyeparts'].'</td>

                                            <td> '.$checkedleft.'   '.$dadta['lefteyeparts'].'</td>

                                        </tr>';

                                      } 

                                  $showdata.='</tbody></table>

                                    </td> 

                             

                        </tr>';

              }
      }
      
      
        if($postoutvalue21=='true')

          {

                $var_array=array($examination_masters->examination_id);

                $Getdetailstableex=$this->Getdetailstable($var_array);

               

               if($Getdetailstableex)

               {

               

                $showdata.='<br/><tr>

                           <td style="text-align: left;"  class="tabledivideleft" valign="top">Investigation Details:</td>

                           <td style="text-align: left;" class="tabledivideright">



                           <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1"><thead><tr><th>Particulars</th></tr></thead><tbody>';

                 $sl=1;

                  $this->load->model('Common_model');

                 foreach($Getdetailstableex as $datai)

                 {

                    $getparticularname=$this->Common_model->getparticularsmodel($datai['charge_id'],$datai['particulars_id'],$this->session->userdata('office_id'));



                     $showdata.='<tr>

                          <td>'.$getparticularname[0]['name'].'</td>

                        

                     </tr>';

                     $sl++;



                 }

                  $showdata.='</tbody></table></td></tr>';

               }

          }

          if($postoutvalue22=='true')

          {
                $var_arrayf=array($this->input->post('examinationid'));
  
             $getexamination_treatmentplan=$this->gettreamnetplanmodel($var_arrayf);
               if($getexamination_treatmentplan){
  
              $showdata.='<br/><tr>
  
                           <td style="text-align: left;"  class="tabledivideleft" valign="top">Treatment Plan:</td>
  
                           <td style="text-align: left;" class="tabledivideright">
  
                                 
  
                                     <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">
  
                                      <thead>
  
                                         <tr>
                                         <th>Plan</th>
  
                                         <th>Eye</th>
          
                                       
  
                                           <th>Doctor Name</th>
  
                                           <th>Appointment Date</th>
  <th>Counseling</th>
                                        </tr>
  
                                        </thead>
  
                                        <tbody id="showdataeyecomp">';
  
                                         foreach ($getexamination_treatmentplan as $datad) { 
  
  
                                            $planNo='';
  
                                            if($datad['chargetype_id']==2)
                                            {                              
                                              $planNo='Surgery';                              
                                            }       
                              
                                            elseif ($datad['chargetype_id']==3) 
                                                                          {
                              
                                                $planNo='Laser';
                              
                                            }
                              
                                            else
                              
                                            {
                              
                                                $planNo='Injection';
                              
                                            }
  
  
                                            $eyec='';
                                            if($datad['eye']==1)
  
                                            {
                              
                                              $eyec='Left eye';
                              
                                            }         
                              
                                            elseif ($datad['eye']==2) 
                              
                                            {
                              
                                              $eyec='Right Eye';
                              
                                            }
                              
                                            else
                              
                                            {
                              
                                              $eyec='Both Eye';
                              
                                            }
  
                                            $showdata.='<tr><td>'.$planNo.'</td><td>'.$eyec.'</td><td>'.$datad['doctorname'].'</td><td>'.$datad['appointment_date'].'</td><td>'.$datad['status'].'</td></tr>';
  
                                          } 
  
                                      $showdata.='</tbody></table>
  
                                        </td> 
  
                                 
  
                            </tr>';
  
                  }
          }




           


         
           

          





 //12
      



//13
            
               
          
          //$data['d_date']
          
          
       
           


//opth_user_comments
    if($examination_masters->opth_user_comments!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Ophthalmic User Comments</td>

               <td style="text-align: left;" class="tabledivideright">'.$examination_masters->opth_user_comments.'</td> 

          </tr>
          
          ';
          }
            if($examination_masters->clinical_advisor!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Clinical Advise</td>

               <td style="text-align: left;" class="tabledivideright">'.$examination_masters->clinical_advisor.'</td> 

          </tr>
          
          ';
          }
          if($examination_masters->plan_of_action!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Plan Of Action</td>

               <td style="text-align: left;" class="tabledivideright">'.$examination_masters->plan_of_action.'</td> 

          </tr>
          
          ';
          }

       
        
           if($data['d_date']!='')
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Follow Up Date</td>

               <td style="text-align: left;" class="tabledivideright">'.$data['d_date'].'</td> 

          </tr>
          
          ';
          }
          $pdre='N/A';
        if($examination_masters->pdre)
        {
            $pdre=$examination_masters->pdre;
        }
        $le='N/A';
        if($examination_masters->le)
        {
            $le=$examination_masters->le;
        }

        if($examination_masters->pdre)
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">PD RE</td>

               <td style="text-align: left;" class="tabledivideright">'.$pdre.'</td> 

          </tr>
          
          ';
          }

          if($examination_masters->le)
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">LE</td>

               <td style="text-align: left;" class="tabledivideright">'.$le.'</td> 

          </tr>
          
          ';
          }


          $usage_ex_id='N/A';
          if($examination_masters->usage_ex_id)
          {
             $usage_ex_id=$this->db->get_where('usage_ex',"usage_ex_id=$examination_masters->usage_ex_id")->row()->name;
          }
          $typeoflength_id='N/A';
          if($examination_masters->typeoflength_id)
          {
             $typeoflength_id=$this->db->get_where('typeoflength',"typeoflength_id=$examination_masters->typeoflength_id")->row()->name;
          }
          $coating_id='N/A';
          if($examination_masters->coating_id)
          {
             $coating_id=$this->db->get_where('coating',"coating_id=$examination_masters->coating_id")->row()->name;
          }

          if($examination_masters->usage_ex_id)
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Usage</td>

               <td style="text-align: left;" class="tabledivideright">'.$usage_ex_id.'</td> 

          </tr>
          
          ';
          }
          if($examination_masters->typeoflength_id)
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Type Of Lens</td>

               <td style="text-align: left;" class="tabledivideright">'.$typeoflength_id.'</td> 

          </tr>
          
          ';
          }
          if($examination_masters->coating_id)
          {
          $showdata.=    ' <tr>

               <td style="text-align: left;" class="tabledivideleft">Coating</td>

               <td style="text-align: left;" class="tabledivideright">'.$coating_id.'</td> 

          </tr>
          
          ';
          }


        //   $dialysis_cond='Yes';
        // if($examination_masters->dialysis_con)
        // {
        //     $dialysis_con=$examination_masters->dialysis_con;
        // }
        // if($dialysis_con==1)
        // {
        //     $dialysis_cond='NO';
        // }
        // $dialysis='N/A';
        // if($dialysis_con==2)
        // {
        //     if($examination_masters->dialysis_drop)
        //     {
        //         $dialysis=$this->db->get_where('dialysis',"dialysis_id=$examination_masters->dialysis_drop")->row()->name;
        //     }
            
        // }

          

        //   if($dialysis_cond)
        //   {
        //   $showdata.=    ' <tr>

        //        <td style="text-align: left;" class="tabledivideleft">Dilation</td>

        //        <td style="text-align: left;" class="tabledivideright">'.$dialysis_cond.'</td> 

        //   </tr>
          
        //   ';
        //   }

        //   if($dialysis_cond=='Yes')
        //   {
        //   $showdata.=    ' <tr>

        //        <td style="text-align: left;" class="tabledivideleft">Dilation Drops</td>

        //        <td style="text-align: left;" class="tabledivideright">'.$dialysis.'</td> 

        //   </tr>
          
        //   ';
        //   }

          // if($entered_by)
          // {
          // $showdata.=    ' <tr>

          //      <td style="text-align: left;" class="tabledivideleft">Entered By</td>

          //      <td style="text-align: left;" class="tabledivideright">'.$entered_by.'</td> 

          // </tr>
          
          // ';
          // }
          
        $showdata.='</br>';

          /*    if($examination_masters->vdiagnosis!='')
            {
 $showdata.='<tr>

                 <td style="text-align: left;" class="tabledivideleft">Diagnosis</td>

                 <td style="text-align: left;" class="tabledivideright">'.$examination_masters->vdiagnosis.'</td> 

            </tr>';
            }
             if($examination_masters->vcontent!='')
            {
            $showdata.=    ' <tr>

                 <td style="text-align: left;" class="tabledivideleft">Vision Print Content</td>

                 <td style="text-align: left;" class="tabledivideright">'.$examination_masters->vcontent.'</td> 

            </tr>
            
            ';
            }
         if($examination_masters->bfit!='')
            {
              if($examination_masters->bfit==1)                
                  $bfit_v="Yes";                
              else
                  $bfit_v="No";
              
          $showdata.='<tr>

                 <td style="text-align: left;" class="tabledivideleft">Fit</td>

                 <td style="text-align: left;" class="tabledivideright">'.$bfit_v.'</td> 

            </tr>';
            }*/ 



       


  $showdata.='</table>';



 $data['conddata']=$showdata;


       $printdata=1;

       switch($printdata)

          {

          case 1:$html=$this->load->view("transaction/examination/examinationprint",$data, true); 

                 $print_config=[

                                  'format' => 'A4',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 10,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

          case 2:$html=$this->load->view("transaction/billing/print",$data, true); 

                 $print_config=[

                                  'format' => 'A4-L',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 5,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

         case 3:$html=$this->load->view("transaction/billing/print",$data, true); 

      

         

                 $print_config=[

                                  'format' => 'A5',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 5,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

            case 4:$html=$this->load->view("transaction/billing/print",$data, true); 

                 $print_config=[

                                  'format' => 'A5-L',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 10,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

          }



          $mpdf = new \Mpdf\Mpdf($print_config);

          $pdfFilePath ="print-".time().".pdf"; 

          $labName='';

          $mpdf->SetWatermarkText($labName,0.03);

          $mpdf->showWatermarkText = true;

          $mpdf -> SetDisplayMode('fullpage');

          $mpdf->WriteHTML($html);

          $mpdf->Output();

         

}


public  function print_bill_opad($examinationid,$office_id)
{   
  
  error_reporting(0);      
  
 
  
 

  $office=$this->db->get_where('office',"office_id=$office_id")->row();

  $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";

  

  $data['company_name']=$office->printable_company_name;

  $data['company_address']=$office->printable_company_address;

  $data['company_mobile']=$office->printable_company_mobile;

  $data['company_land_phone']=$office->printable_company_phone;

  $data['company_email']=$office->printable_emailid;

  $data['company_gst']=$office->license_no;

  $data['print_declaration']=$office->declaration;

  $data['gstin_no']=$office->gstin_no;



  $examination_masters=$this->db->get_where('examination',"examination_id=$examinationid")->row();
  $examination_masters2=$this->db->get_where('examination_next_part',"examination_id=$examinationid")->row();

  $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->name;

  $data['username']=$this->db->get_where('user',"user_id=$examination_masters->login_id")->row()->name;



  $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$examination_masters->patient_registration_id")->row();

  $data['d_date']=date("d-m-Y", strtotime($examination_masters->d_date));


  $postoutvalue13=false; //Undilated Correction
  $postoutvalue14=false; //Cyclopedia Correction
  $postoutvalue15=false; //PMT Correction
  $postoutvalue16=false; //Final Glass Prescription
  if($examination_masters->op_advice_col==1)
  {
    $postoutvalue13=true;
  }
  if($examination_masters->op_advice_col==2)
  {
    $postoutvalue14=true;
  }
  if($examination_masters->op_advice_col==3)
  {
    $postoutvalue15=true;
  }
  if($examination_masters->op_advice_col==4)
  {
    $postoutvalue16=true;
  }


  $data['current_meditation']=$examination_masters->current_meditation;

  $data['family_history']=$examination_masters->family_history;

  $data['drug_history']=$examination_masters->drug_history;

  $data['cur1']=$examination_masters->cur1;

  $data['cur2']=$examination_masters->cur2;

  $data['cur3']=$examination_masters->cur3;

  $data['cur4']=$examination_masters->cur4;

  $data['cur5']=$examination_masters->cur5;

  $data['cur6']=$examination_masters->cur6;

  $data['cur7']=$examination_masters->cur7;

  $data['cur8']=$examination_masters->cur8;

  $data['cur9']=$examination_masters->cur9;

  $data['cur10']=$examination_masters->cur10;

  $data['cur11']=$examination_masters->cur11;

  $data['cur12']=$examination_masters->cur12;

  $data['cur13']=$examination_masters->cur13;

  $data['cur14']=$examination_masters->cur14;

  $data['cur15']=$examination_masters->cur15;

  $data['cur16']=$examination_masters->cur16;

  $data['vis1']=$examination_masters->vis1;

  $data['vis2']=$examination_masters->vis2;

  $data['vis3']=$examination_masters->vis3;

  $data['vis4']=$examination_masters->vis4;

  $data['vis5']=$examination_masters->vis5;

  $data['vis6']=$examination_masters->vis6;

  $data['vis7']=$examination_masters->vis7;

  $data['vis8']=$examination_masters->vis8;

  $data['vis9']=$examination_masters->vis9;

  $data['vis10']=$examination_masters->vis10;

  $data['ar1']=$examination_masters->ar1;

  $data['ar2']=$examination_masters->ar2;

  $data['ar3']=$examination_masters->ar3;

  $data['ar4']=$examination_masters->ar4;

  $data['ar5']=$examination_masters->ar5;

  $data['ar6']=$examination_masters->ar6;

  $data['ar7']=$examination_masters->ar7;

  $data['ar8']=$examination_masters->ar8;

  $data['ar9']=$examination_masters->ar9;

  $data['ar10']=$examination_masters->ar10;

  $data['man1']=$examination_masters->man1;

  $data['man2']=$examination_masters->man2;

  $data['man3']=$examination_masters->man3;

  $data['man4']=$examination_masters->man4;

  $data['man5']=$examination_masters->man5;

  $data['man6']=$examination_masters->man6;

  $data['man7']=$examination_masters->man7;

  $data['man8']=$examination_masters->man8;

  $data['man9']=$examination_masters->man9;

  $data['man10']=$examination_masters->man10;

  $data['spe1']=$examination_masters->spe1;

  $data['spe2']=$examination_masters->spe2;

  $data['spe3']=$examination_masters->spe3;

  $data['spe4']=$examination_masters->spe4;

  $data['spe5']=$examination_masters->spe5;

  $data['spe6']=$examination_masters->spe6;

  $data['spe7']=$examination_masters->spe7;

  $data['spe8']=$examination_masters->spe8;

  $data['spe9']=$examination_masters->spe9;

  $data['spe10']=$examination_masters->spe10;

  $data['spe11']=$examination_masters->spe11;

  $data['spe12']=$examination_masters->spe12;

  $data['spe13']=$examination_masters->spe13;

  $data['spe14']=$examination_masters->spe14;

  $data['spe15']=$examination_masters->spe15;

  $data['spe16']=$examination_masters->spe16;

  $data['con1']=$examination_masters->con1;

  $data['con2']=$examination_masters->con2;

  $data['con3']=$examination_masters->con3;

  $data['con4']=$examination_masters->con4;

  $data['con5']=$examination_masters->con5;

  $data['con6']=$examination_masters->con6;

  $data['con7']=$examination_masters->con7;

  $data['con8']=$examination_masters->con8;

  $data['con9']=$examination_masters->con9;

  $data['con10']=$examination_masters->con10;

  $data['con11']=$examination_masters->con11;

  $data['con12']=$examination_masters->con12;

  $data['con13']=$examination_masters->con13;

  $data['con14']=$examination_masters->con14;

  $data['con15']=$examination_masters->con15;

  $data['con16']=$examination_masters->con16;

  $data['pmt1']=$examination_masters->pmt1;

  $data['pmt2']=$examination_masters->pmt2;

  $data['pmt3']=$examination_masters->pmt3;

  $data['pmt4']=$examination_masters->pmt4;

  $data['pmt5']=$examination_masters->pmt5;

  $data['pmt6']=$examination_masters->pmt6;

  $data['pmt7']=$examination_masters->pmt7;

  $data['pmt8']=$examination_masters->pmt8;

  $data['pmt9']=$examination_masters->pmt9;

  $data['pmt10']=$examination_masters->pmt10;

  $data['pmt11']=$examination_masters->pmt11;

  $data['pmt12']=$examination_masters->pmt12;

  $data['pmt13']=$examination_masters->pmt13;

  $data['pmt14']=$examination_masters->pmt14;

  $data['pmt15']=$examination_masters->pmt15;

  $data['pmt16']=$examination_masters->pmt16;


  $data['ant_lefteye']=$examination_masters->ant_lefteye;
  $data['ant_righteye']=$examination_masters->ant_righteye;
  $data['bfit']=$examination_masters->bfit;
  $data['vcontent']=$examination_masters->vcontent;
  $data['clinical_advisor']=$examination_masters->clinical_advisor;
  $data['vdiagnosis']=$examination_masters->vdiagnosis;
  $data['plan_of_action']=$examination_masters->plan_of_action;
  

 $data['fname']=$patient_details->fname; 

 $data['lname']=$patient_details->lname; 

 $data['mrdno']=$patient_details->mrdno; 

 $data['address']=$patient_details->address; 

 $data['mobileno']=$patient_details->mobileno; 



 if($patient_details->gender==1)

 {

  $age='Male';

 }

 elseif($patient_details->gender==2)

 {

  $age="Female";

 }

 else

 {

  $age='Transgender';

 }

 $data['gender']=$age; 

 $data['ageyy']=$patient_details->ageyy; 

 $data['agemm']=$patient_details->agemm; 

 $title_id=$patient_details->title; 

 $entered_by='N/A';
 if($examination_masters2->entered_by)
 {
    $entered_by=$this->db->get_where('staff',"staff_id=$examination_masters2->entered_by")->row()->name;
 }

 
 $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;

 $showdata='<table  width="100%" style="line-height:10px;margin-top:0px;font-size: 14;"> 

            <tr>

                 <td style="text-align: left;" class="tabledivideleft">Date:</td>

                 <td style="text-align: left;" class="tabledivideright">'.$this->date->dateSql2View($examination_masters->examination_date).'</td> 

            </tr>';

            $showdata.='</br>';

          // Print Order change
          
             
         
if($postoutvalue13=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Undilated Correction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->spe16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}

//14
 if($postoutvalue14=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Cyclopedia Correction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->con16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}


//15

     if($postoutvalue15=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">PMT Correction:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->pmt16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}

if($postoutvalue16=='true')

{

           $showdata.='<br/><tr>

                 <td style="text-align: left;"  class="tabledivideleft" valign="top">Final Glass Prescription:</td>

                 <td style="text-align: left;" class="tabledivideright">

                        <table width="100%" style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;height:100px;" border="1">

                                      <tr>

                                          <th colspan="1"></th>

                                          <th colspan="4">RE</th>

                                          <th colspan="4">LE</th>

                                      </tr>

                                      <tr>

                                          <td></th>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                          <td class="tab_tit">SPH</td>

                                          <td class="tab_tit">CYL</td>

                                          <td class="tab_tit">AXIS</td>

                                          <td class="tab_tit">V/A</td>

                                      </tr>

                                       <tr>

                                          <td class="tab_tit">D.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe1.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe2.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe3.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe4.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe9.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe10.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe11.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe12.'</td>

                                      </tr>

                                       <tr>

                                          <td  class="tab_tit">N.V</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe5.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe6.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe7.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe8.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe13.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe14.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe15.'</td>

                                          <td style="padding:5px;" align="center">'.$examination_masters->fspe16.'</td>

                                      </tr>

                                  </table>

                  </td>

                  </tr>';

}
 


  $showdata.='</table>';



 $data['conddata']=$showdata;


       $printdata=1;

       switch($printdata)

          {

          case 1:$html=$this->load->view("transaction/examination/examinationprint",$data, true); 

                 $print_config=[

                                  'format' => 'A4',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 10,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

          case 2:$html=$this->load->view("transaction/billing/print",$data, true); 

                 $print_config=[

                                  'format' => 'A4-L',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 5,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

         case 3:$html=$this->load->view("transaction/billing/print",$data, true); 

      

         

                 $print_config=[

                                  'format' => 'A5',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 5,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

            case 4:$html=$this->load->view("transaction/billing/print",$data, true); 

                 $print_config=[

                                  'format' => 'A5-L',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 10,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

          }



          $mpdf = new \Mpdf\Mpdf($print_config);

          $pdfFilePath ="print-".time().".pdf"; 

          $labName='';

          $mpdf->SetWatermarkText($labName,0.03);

          $mpdf->showWatermarkText = true;

          $mpdf -> SetDisplayMode('fullpage');

          $mpdf->WriteHTML($html);

          $mpdf->Output();

         

}


public function Get_Pat_Source($var_array)

    {

        $sql = "select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id=$var_array order by patient_appointment_id desc limit 1";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }
function print_billgen($key,$pid,$paid,$office_id)

{

  $ex_data_fol=$this->db->get_where('examination',"addmedhistory_id='$key'")->row();   
  $data['followup']=$ex_data_fol->followup;
  $date_for=date_create($ex_data_fol->d_date);
  $fordate=date_format($date_for,"d/m/Y");
  $data['d_date']=$fordate;

  $office=$this->db->get_where('office',"office_id=$office_id")->row();

  $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";

  

  $data['company_name']=$office->printable_company_name;

  $data['company_address']=$office->printable_company_address;

  $data['company_mobile']=$office->printable_company_mobile;

  $data['company_land_phone']=$office->printable_company_phone;

  $data['company_email']=$office->printable_emailid;

  $data['company_gst']=$office->license_no;

  $data['print_declaration']=$office->declaration;

  $data['gstin_no']=$office->gstin_no;



 $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$pid")->row();

 $data['fname']=$patient_details->fname; 

 $data['lname']=$patient_details->lname; 

 $data['mrdno']=$patient_details->mrdno; 

 $data['address']=$patient_details->address; 

 if($patient_details->gender==1)

 {

  $age='Male';

 }

 elseif($patient_details->gender==2)

 {

  $age="Female";

 }

 else

 {

  $age='Transgender';

 }

 $data['gender']=$age; 

 $data['ageyy']=$patient_details->ageyy; 

 $data['agemm']=$patient_details->agemm; 

 $data['mobileno']=$patient_details->agemm; 

  $data['mobileno']=$patient_details->mobileno; 



 if($patient_details->gender==1)

 {

  $age='Male';

 }

 elseif($patient_details->gender==2)

 {

  $age="Female";

 }

 else

 {

  $age='Transgender';

 }
 $data['gender']=$age;
  $data['source']='';
$getmaster_so=$this->Get_Pat_Source($pid);
if($getmaster_so)
{
  $socurce=$getmaster_so[0]['source'];
  $sc=$socurce;
  $data['source']=$sc;
}
 

 $data['ageyy']=$patient_details->ageyy; 

 $data['agemm']=$patient_details->agemm; 

 $title_id=$patient_details->title; 

 $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;

 

 



                    



  $patient_appointment=$this->db->get_where('patient_appointment',"patient_appointment_id=$paid")->row();

  if($patient_appointment->updated_date)

  {

      $data['created_date']=$patient_appointment->updated_date; 

  }

  else

  {

      $data['created_date']=$patient_appointment->created_date; 

  }



  $med_prs=$this->db->get_where('medicine_prescription',"temp_id='$key'")->row();

  $data['sdate']=$this->date->dateSql2View($med_prs->sdate);

 

 

 $data['token_no']=$patient_appointment->token_no; 

 $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$patient_appointment->doctor_id")->row()->name;
 $data['sign_doc']=$this->db->get_where('doctors_registration',"doctors_registration_id=$patient_appointment->doctor_id")->row()->sign;

 $data['username']=$this->db->get_where('user',"user_id=$patient_appointment->login_id")->row()->name;

 $data['token_no']=$patient_appointment->token_no; 

 $data['appointment_date']=$this->date->dateSql2View($patient_appointment->appointment_date);

 $data['medicinedetails']= $this->db->query("select med_action,med_name,ex_ins,ex_no,medicine.name as drugname,instruction,nodays,qty,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,med_eye from medicine_prescription left join medicine on medicine_prescription.medicine_id=medicine.medicine_id where medicine_prescription.temp_id='$key'")->result();

 

 

         switch($patient_details->print)

          {

          case 1:$html=$this->load->view("transaction/examination/medicine_prescriptionprint",$data, true); 

                 $print_config=[

                                  'format' => 'A4',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 10,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

          case 2:$html=$this->load->view("transaction/examination/medicine_prescriptionprint",$data, true); 

                 $print_config=[

                                  'format' => 'A4-L',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 5,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

         case 3:$html=$this->load->view("transaction/examination/medicine_prescriptionprint",$data, true); 

      

         

                 $print_config=[

                                  'format' => 'A5',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 5,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

            case 4:$html=$this->load->view("transaction/examination/medicine_prescriptionprint",$data, true); 

                 $print_config=[

                                  'format' => 'A5-L',

                                  'margin_left' => 10,

                                  'margin_right' => 10,

                                  'margin_top' => 10,

                                  'margin_bottom' => 10,

                                  'margin_header' => 0,

                                  'margin_footer' => 0,

                              ];

                              break;

          }



          $mpdf = new \Mpdf\Mpdf($print_config);

          $pdfFilePath ="print-".time().".pdf"; 

          $labName='';

          $mpdf->SetWatermarkText($labName,0.03);

          $mpdf->showWatermarkText = true;

          $mpdf -> SetDisplayMode('fullpage');

          $mpdf->WriteHTML($html);

          $mpdf->Output();

         

}



}
