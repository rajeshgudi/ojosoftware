<?php
/**
 * Description of department_id_model
 *
 * @author Prabhu @10/02/2021
 */
class Counseling_viewmodel extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

    public function saveproperativedata($data,$examination_treatmentplain_id)
    {
        $this->db->where('examination_treatmentplan_id', $examination_treatmentplain_id);
        $this->db->delete('counselling_preoperative_investigation');
        if($this->db->insert('counselling_preoperative_investigation',$data))
        {
              return $this->db->insert_id();
        }
    }

	  public function gettreamnetplanmodel($var_array)
    {
        $sql = "select examination_treatmentplan.emailid,examination_treatmentplan.examination_id,examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id 
        inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
        inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
          where   examination_treatmentplan.appointment_date between  ? and ? and chargetype_id = ? and   examination_treatmentplan.office_id= ? group by examination_treatmentplan.examination_id";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
       // echo $this->db->last_query();exit;
        return $res;
    }
     public function getallappmodesl($var_array)
    {
        
        $sql = "select preoperative_appointment_id,DATE_FORMAT(preoperative_appointment.admission_date,'%d/%m/%Y') AS admission_date,department.name as opname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,mobileno,operating_surgon,typeof_anthesia,typeof_surgery_id,particular_type,eye from preoperative_appointment inner join patient_registration on patient_registration.patient_registration_id=preoperative_appointment.patient_registration_id left join department on department.department_id=preoperative_appointment.typeof_surgery_id where charge_id=? and admission_date between ? and ? and preoperative_appointment.office_id=? and preoperative_appointment.cancel_flag=0";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
       // echo $this->db->last_query();exit;
        $this->logger->save($this->db);
        return $res;
    }
    public function getallappmodel($var_array)
	{
        $dateVal=date('Y-m-d');
        $todate=date('Y-m-d', strtotime($dateVal. ' + 3 days'));
		$sql = "select preoperative_appointment_id,DATE_FORMAT(preoperative_appointment.admission_date,'%d/%m/%Y') AS admission_date,department.name as opname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,mobileno,operating_surgon,typeof_anthesia,typeof_surgery_id,particular_type,eye from preoperative_appointment inner join patient_registration on patient_registration.patient_registration_id=preoperative_appointment.patient_registration_id left join department on department.department_id=preoperative_appointment.typeof_surgery_id where charge_id=? and admission_date between ? and '$todate' and preoperative_appointment.office_id=? and preoperative_appointment.cancel_flag=0";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
       // echo $this->db->last_query();exit;
        $this->logger->save($this->db);
		return $res;
	}
     public function getdatasurgerymdl($surid,$charid,$partid,$officeid)
    {
        if($charid==2)
        {
            $tabname='ipdcharge';
            $idname='ipdcharge_id';
        }
        elseif ($charid==3) {
            $tabname='laser';
            $idname='laser_id';
        }
        elseif ($charid==4) {
            $tabname='injection';
            $idname='injection_id';
        }
        $sql = "select $idname , name,amount from  $tabname where  $idname=$partid and office_id=$officeid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        //echo $this->db->last_query();exit;
        $this->logger->save($this->db);
        return $res;
    }
    public function Get_saved_values_fromt($trplanid)
    {
       
        $sql = "select * from counselling_preoperative_investigation where examination_treatmentplan_id=$trplanid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }

    public function canceldata($cancel_id)
    {
        $sql = "update preoperative_appointment set cancel_flag=1 where preoperative_appointment_id=$cancel_id";
        $result_row=$this->db->query($sql); 
        return $result_row;
    }
    public function deletedata($id) 
    {
        $this->db->where('preoperative_appointment_id', $id);
        if($this->db->delete('preoperative_appointment'))
        {
            return TRUE;
        }
    }
     function Preoperativeinsprint_data($surid,$office_id)
  {
     error_reporting(0);
    $surgery_fitness_request=$this->db->get_where('counselling_preoperative_investigation',"counselling_preoperative_investigation_id=$surid")->row();
     $examination_id=$this->db->get_where('examination_treatmentplan',"examination_treatmentplan_id=$surgery_fitness_request->examination_treatmentplan_id")->row()->examination_id;
    $patient_registration_id=$this->db->get_where('examination',"examination_id=$examination_id")->row()->patient_registration_id;
    $office=$this->db->get_where('office',"office_id=$office_id")->row();
    $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";
    $data['nabh_logo']=($office->nabh_logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->nabh_logo'>";
    
    $data['company_name']=$office->printable_company_name;
    $data['company_address']=$office->printable_company_address;
    $data['company_mobile']=$office->printable_company_mobile;
    $data['company_land_phone']=$office->printable_company_phone;
    $data['company_email']=$office->printable_emailid;
    $data['company_gst']=$office->license_no;
    $data['print_declaration']=$office->declaration;
    $data['gstin_no']=$office->gstin_no;

    $data['website']=$office->website;
    $data['facebook']=$office->facebook;
    $data['youtube']=$office->youtube;

   $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$patient_registration_id")->row();
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
   $data['invoice_number']=11;
   $data['appointment_date']=$this->date->dateSql2View($surgery_fitness_request->cur_date);
   $data['investigation']=$surgery_fitness_request->investigation;
   $data['systemic']=$surgery_fitness_request->systemic;
   $data['fir1']=$surgery_fitness_request->fir1;
   $data['fir2']=$surgery_fitness_request->fir2;
   $data['fir3']=$surgery_fitness_request->fir3;
   $data['fir4']=$surgery_fitness_request->fir4;
   $data['fir5']=$surgery_fitness_request->fir5;
   $data['fir6']=$surgery_fitness_request->fir6;
   $data['fir7']=$surgery_fitness_request->fir7;
   $data['k1r1']=$surgery_fitness_request->k1r1;
   $data['k1l1']=$surgery_fitness_request->k1l1;
   $data['k2r1']=$surgery_fitness_request->k2r1;
   $data['k2l1']=$surgery_fitness_request->k2l1;
   $data['ax1']=$surgery_fitness_request->ax1;
   $data['ax2']=$surgery_fitness_request->ax2;
   $data['acd1']=$surgery_fitness_request->acd1;
   $data['acd2']=$surgery_fitness_request->acd2;
   $data['lt1']=$surgery_fitness_request->lt1;
   $data['lt2']=$surgery_fitness_request->lt2;
   $data['formula']=$surgery_fitness_request->formula;
   $data['re']=$surgery_fitness_request->re;
   $data['fir_resec1']=$surgery_fitness_request->fir_resec1;
   $data['fir_resec2']=$surgery_fitness_request->fir_resec2;
   $data['fir_resec3']=$surgery_fitness_request->fir_resec3;
   $data['iol1']=$surgery_fitness_request->iol1;
   $data['iol2']=$surgery_fitness_request->iol2;
   $data['iol3']=$surgery_fitness_request->iol3;
   $data['iol4']=$surgery_fitness_request->iol4;
   $data['iol5']=$surgery_fitness_request->iol5;
   $data['iol6']=$surgery_fitness_request->iol6;
   $data['iol7']=$surgery_fitness_request->iol7;
   $data['iol8']=$surgery_fitness_request->iol8;
   $data['iol9']=$surgery_fitness_request->iol9;
   $data['iol10']=$surgery_fitness_request->iol10;
   $data['iol11']=$surgery_fitness_request->iol11;
   $data['iol12']=$surgery_fitness_request->iol12;
   $data['iol13']=$surgery_fitness_request->iol13;
   $data['iol14']=$surgery_fitness_request->iol14;
   $data['iol15']=$surgery_fitness_request->iol15;
   $data['iol16']=$surgery_fitness_request->iol16;
   $data['iol17']=$surgery_fitness_request->iol17;
   $data['iol18']=$surgery_fitness_request->iol18;
   $data['le']=$surgery_fitness_request->le;
   $data['sec_resec1']=$surgery_fitness_request->sec_resec1;
   $data['sec_resec2']=$surgery_fitness_request->sec_resec2;
   $data['sec_resec3']=$surgery_fitness_request->sec_resec3;
   $data['liol1']=$surgery_fitness_request->liol1;
   $data['liol2']=$surgery_fitness_request->liol2;
   $data['liol3']=$surgery_fitness_request->liol3;
   $data['liol4']=$surgery_fitness_request->liol4;
   $data['liol5']=$surgery_fitness_request->liol5;
   $data['liol6']=$surgery_fitness_request->liol6;
   $data['liol7']=$surgery_fitness_request->liol7;
   $data['liol8']=$surgery_fitness_request->liol8;
   $data['liol9']=$surgery_fitness_request->liol9;
   $data['liol10']=$surgery_fitness_request->liol10;
   $data['liol11']=$surgery_fitness_request->liol11;
   $data['liol12']=$surgery_fitness_request->liol12;
   $data['liol13']=$surgery_fitness_request->liol13;
   $data['liol14']=$surgery_fitness_request->liol14;
   $data['liol15']=$surgery_fitness_request->liol15;
   $data['liol16']=$surgery_fitness_request->liol16;
   $data['liol17']=$surgery_fitness_request->liol17;
   $data['liol18']=$surgery_fitness_request->liol18;
   
  

   

   
   
   
   // $data['appointment_time']=1;
      $where_array = array(
               'examination_id' =>$examination_id,
               'chargetype_id'=>2
              );

    $doctor_id=$this->db->get_where('examination_treatmentplan',$where_array)->row()->doctor_id;
    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$doctor_id")->row()->name;

  
  
   
         $html=$this->load->view("master/preoperativeprintdata_directionprint",$data, true); 
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
    
   
}