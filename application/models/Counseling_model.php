<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @26/01/2022
 */
class Counseling_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

    public function gettreamnetplanmodel($var_array)
    {
        $sql = "select examination_treatmentplan.emailid,examination_treatmentplan.examination_id,examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id 
        inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
        inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
          where examination_treatmentplan.status = ? and examination_treatmentplan.date_on between  ? and ? and chargetype_id = ? and   examination_treatmentplan.office_id= ? group by examination_treatmentplan.examination_id";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
       // echo $this->db->last_query();exit;
        return $res;
    }
       public function getpatientdetails_examin($examination_id)
    {
      
        $sql = "select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_id=$examination_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function Get_fitnesssaved($examination_id,$chargetype_id,$patient_registration_id)
    {
      
        $sql = "select * from surgery_fitness_request where examination_id=$examination_id and chargetype_id=$chargetype_id and patient_registration_id=$patient_registration_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }

     public function getsaved_preoperativedata($examination_id)
    {
      
        $sql = "select * from counselling_preoperative_directions where examination_id=$examination_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getmedi_data($examination_id)
    {
        $sql = "select counselling_medical_history.medical_hsitory_id,medical_history.name,counselling_medical_history.remarks from counselling_medical_history left join medical_history on counselling_medical_history.medical_hsitory_id=medical_history.medical_history_id where  examination_id= $examination_id";
        $result_row=$this->db->query($sql); 
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
     public function Get_fitnesssaved1($examination_id,$chargetype_id,$patient_registration_id)
    {
      
        $sql = "select * from counselling_order_diagnostics_master where examination_id=$examination_id and chargetype_id=$chargetype_id and patient_registration_id=$patient_registration_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function iol_lenspower($var_arrays)
    {
      
        $sql = "select * from iol_lens where office_id=?";
        $result_row=$this->db->query($sql,$var_arrays); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getFiles($examination_id)
    {
        $sql = "select id,file_name, uploaded_on from patient_files where examination_id=$examination_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
     
    }
     public function deletedata_files($id) 
    {
        $this->db->where('id', $id);
        if($this->db->delete('patient_files'))
        {
            return TRUE;
        }
    }
    public function getpatientdetailsproceduremdl($var_array)
    {
        $sql = "select examination_treatmentplan.followup_date,examination_treatmentplan.uhid,examination_treatmentplan.coname,examination_treatmentplan.society,examination_treatmentplan.tpaname,examination_treatmentplan.receiptno,examination_treatmentplan.other_eye,examination_treatmentplan.date_on,examination_treatmentplan.sur_date,examination_treatmentplan.grade_box,examination_treatmentplan.iol_power,examination_treatmentplan.pre_op_direction,examination_treatmentplan.other_remarks,examination_treatmentplan.emailid,examination_treatmentplan.examination_id,examination_treatmentplan.iol_lens_id,examination_treatmentplan.insurancename,examination_treatmentplan.bedno,examination_treatmentplan.referredby,examination_treatmentplan.roomno,patient_registration.mobileno,examination_treatmentplan.open_remarks,pending_remarks,completed_remarks,cancel_remarks,examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id 
        inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
        inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
          where examination_treatmentplan_id=? and examination_treatmentplan.office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }


    public function saveexaminationmodel($data,$id)
    {
        

        $masdata=$data['masterdata'];
        $this->db->set($masdata);
        $this->db->where('examination_treatmentplan_id', $id);
        if($this->db->update('examination_treatmentplan'))
        {
            //echo $this->db->last_query();exit;
           $examination_id=$this->db->get_where('examination_treatmentplan',"examination_treatmentplan_id=$id")->row()->examination_id;
           $this->db->where('examination_id', $examination_id);
           $this->db->delete('counselling_medical_history');

            $partdatas=$data['partdata'];
            $partdatas_ids=$partdatas['particular_id'];
             if($partdatas_ids)
            {
                foreach($partdatas_ids as $datra)
                {
                      $sql = "update examination_treatmentplan set particular_id=$datra where examination_treatmentplan_id=$id";
                      $result_row=$this->db->query($sql); 
                }
            }

           

           $medhistorydatas=$data['medhist_data'];
           $medical_hsitory_ids=$medhistorydatas['medical_hsitory_id'];
           $remarkss=$medhistorydatas['remarks'];
           $chargetype_ids=$medhistorydatas['chargetype_id'];
           $i=0;
           if($medical_hsitory_ids){
            foreach ($medical_hsitory_ids as $daramed) 
            {
                   $this->db->insert('counselling_medical_history',array(
                                                "examination_id"=>$examination_id,
                                                "medical_hsitory_id"=>$daramed,
                                                "chargetype_id"=>2,
                                                "remarks"=>$remarkss[$i],
                                                "med_date"=>date('Y-m-d'),
                                                "med_time"=>date('H:i')
                                    )
               );
                   $i++;
            }
          }
            return true;
        }
        
    }
    public function deletedata($id) 
    {
        $this->db->where('examination_treatmentplan_id', $id);
        if($this->db->delete('examination_treatmentplan'))
        {
            return TRUE;
        }
    }
    public function saveproperativedata($data,$examination_treatmentplain_id)
    {
        $this->db->where('examination_treatmentplan_id', $examination_treatmentplain_id);
        $this->db->delete('preoperative_appointment');
        if($this->db->insert('preoperative_appointment',$data))
        {
             return TRUE;
        }
    }
    public function getdatasurgerymdl($surid,$charid,$officeid)
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
        $sql = "select $idname , name,amount from  $tabname where department_id=$surid and office_id=$officeid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }

     public function savedata_surgeryfitness($data)
    {
        $this->db->trans_begin();
        $surgery_fitness_requestdata=$data['surgery_fitness_request'];

        $this->db->where('examination_id', $surgery_fitness_requestdata['examination_id']);
        $this->db->delete('surgery_fitness_request');

        $this->db->where('examination_id', $surgery_fitness_requestdata['examination_id']);
        $this->db->delete('surgery_fitness_investigation');

        $this->db->insert('surgery_fitness_request',$surgery_fitness_requestdata);
        $surgery_fitness_request_id=$this->db->insert_id();

        $surgery_fitness_investigation_data=$data['surgery_fitness_investigation'];
        $order_diagnostics_ids=$surgery_fitness_investigation_data['order_diagnostics_id'];
        foreach ($order_diagnostics_ids as $dataid) 
        {
               $this->db->insert('surgery_fitness_investigation',array(
                                            "surgery_fitness_request_id"=>$surgery_fitness_request_id,
                                            "examination_id"=>$surgery_fitness_requestdata['examination_id'],
                                            "order_diagnostics_id"=>$dataid,
                                            "date_cur"=>date('Y-m-d'),
                                            "time_cur"=>date('H:i')
                                )
           );
        }
        

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return FALSE;
        }
        else
        {
                $this->db->trans_commit();
                return $surgery_fitness_request_id;
        }
    }
    public function savedata_surgeryfitness1($data)
    {
        $this->db->trans_begin();
        $surgery_fitness_requestdata=$data['surgery_fitness_request'];
        $this->db->where('examination_id', $surgery_fitness_requestdata['examination_id']);
        $this->db->delete('counselling_order_diagnostics_master');

        $this->db->where('examination_id', $surgery_fitness_requestdata['examination_id']);
        $this->db->delete('counselling_order_diagnostics_child');

        $this->db->insert('counselling_order_diagnostics_master',$surgery_fitness_requestdata);
        $surgery_fitness_request_id=$this->db->insert_id();

        $surgery_fitness_investigation_data=$data['surgery_fitness_investigation'];
        $order_diagnostics_ids=$surgery_fitness_investigation_data['order_diagnostics_id'];
        $remarks=$surgery_fitness_investigation_data['remarks'];
        $i=0;
        foreach ($order_diagnostics_ids as $dataid) 
        {
            $rem='';
            if($remarks[$i])
            {
                $rem=$remarks[$i];
            }
               $this->db->insert('counselling_order_diagnostics_child',array(
                                            "counselling_order_diagnostics_master_id"=>$surgery_fitness_request_id,
                                            "examination_id"=>$surgery_fitness_requestdata['examination_id'],
                                            "order_diagnostics_id"=>$dataid,
                                            "remarks"=>$rem,
                                            "date_cur"=>date('Y-m-d'),
                                            "date_time"=>date('H:i')
                                )
            
           );
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
                return $surgery_fitness_request_id;
        }
    }
   function print_surgery($surid,$office_id)
  {
     error_reporting(0);
    $surgery_fitness_request=$this->db->get_where('surgery_fitness_request',"surgery_fitness_request_id=$surid")->row();
    $patient_registration_id=$surgery_fitness_request->patient_registration_id;
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
   $data['appointment_date']=$this->date->dateSql2View($surgery_fitness_request->surgery_fitness_date);
   $data['to_form']=$surgery_fitness_request->to_form;
   $data['case_desc']=$surgery_fitness_request->case_desc;
   $data['headerprint']=$surgery_fitness_request->headerprint;
   $data['surgeryunder']=$surgery_fitness_request->surgeryunder;
   $data['eyeid']=$surgery_fitness_request->eyeid;
   $data['deptname']=$this->db->get_where('department',"department_id=$surgery_fitness_request->department_id")->row()->name;
   $data['ipdname']=$this->db->get_where('ipdcharge',"ipdcharge_id=$surgery_fitness_request->ipdcharge_id")->row()->name;
$htmldatatable='';
   $surinvdata=$this->Get_surinvestigation($surid);
   if($surinvdata)
   {
     $htmldatatable='<table border="1" style="border-collapse: collapse;" class="table table-bordered table-hover"><thead><tr><th>Investigations</th></tr></thead><tbody>';
     foreach ($surinvdata as $datainv) 
     {
        $htmldatatable.='<tr><td>'.$datainv['name'].'</td></tr>';
     }
     $htmldatatable.='</tbody></table>';
   }
      $data['datatablehtml']=$htmldatatable;              

   
   
   
   
   // $data['appointment_time']=1;
      $where_array = array(
               'examination_id' =>$surgery_fitness_request->examination_id,
               'chargetype_id'=>$surgery_fitness_request->chargetype_id
              );

    $doctor_id=$this->db->get_where('examination_treatmentplan',$where_array)->row()->doctor_id;

    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$doctor_id")->row()->name;
   // $data['username']=$this->db->get_where('user',"user_id=$patient_appointment->login_id")->row()->name;
   // $data['token_no']=$patient_appointment->token_no; 
   // $data['appointment_date']=$this->date->dateSql2View($patient_appointment->appointment_date);
   // $data['opdcharge']=$this->db->get_where('opdcharge',"opdcharge_id=$patient_appointment->appointment_opd_charge_id")->row()->name;
   // $data['amount']=$grand_total=$this->db->get_where('opdcharge',"opdcharge_id=$patient_appointment->appointment_opd_charge_id")->row()->amount;
   // $data['net_amount_in_words']= $this->numberTowords($grand_total);
  
  
   
         $html=$this->load->view("master/surgeryfitprint",$data, true); 
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

    function print_surgery1($surid,$office_id)
  {
     error_reporting(0);
    $surgery_fitness_request=$this->db->get_where('counselling_order_diagnostics_master',"counselling_order_diagnostics_master_id=$surid")->row();
    $patient_registration_id=$surgery_fitness_request->patient_registration_id;
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
   $data['appointment_date']=$this->date->dateSql2View($surgery_fitness_request->order_dia_date);
   
   $data['headerprint']=$surgery_fitness_request->headerprint;
   
   $htmldatatable='';
   $surinvdata=$this->Get_surinvestigation1($surid);
   if($surinvdata)
   {
     $htmldatatable='<table border="1" style="border-collapse: collapse;" class="table table-bordered table-hover"><thead><tr><th>Investigations</th><th>Remarks</th></tr></thead><tbody>';
     foreach ($surinvdata as $datainv) 
     {
        $htmldatatable.='<tr><td>'.$datainv['name'].'</td><td>'.$datainv['remarks'].'</td></tr>';
     }
     $htmldatatable.='</tbody></table>';
   }
      $data['datatablehtml']=$htmldatatable;              

   
   
   
   
   // $data['appointment_time']=1;
      $where_array = array(
               'examination_id' =>$surgery_fitness_request->examination_id,
               'chargetype_id'=>$surgery_fitness_request->chargetype_id
              );

    $doctor_id=$this->db->get_where('examination_treatmentplan',$where_array)->row()->doctor_id;

    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$doctor_id")->row()->name;

  
  
   
         $html=$this->load->view("master/order_diagnostics_print",$data, true); 
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
  public function Get_surinvestigation($surid)
    {
      
        $sql = "select order_diagnostics.name,surgery_fitness_investigation.order_diagnostics_id from surgery_fitness_investigation inner join order_diagnostics on surgery_fitness_investigation.order_diagnostics_id=order_diagnostics.order_diagnostics_id where surgery_fitness_request_id=$surid group by surgery_fitness_investigation.order_diagnostics_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
  public function Get_surinvestigation1($surid)
    {
      
        $sql = "select order_diagnostics.name,counselling_order_diagnostics_child.order_diagnostics_id,counselling_order_diagnostics_child.remarks from counselling_order_diagnostics_child inner join order_diagnostics on counselling_order_diagnostics_child.order_diagnostics_id=order_diagnostics.order_diagnostics_id where counselling_order_diagnostics_master_id=$surid group by counselling_order_diagnostics_child.order_diagnostics_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
     public function Get_Preoperative_INS()
    {
      
        $sql = "select name,preoperative_instruction_id from preoperative_instruction where status=1";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function savedata_preoperative($data)
    {
        $this->db->trans_begin();
        $counselling_preoperative_directions_m=$data['counselling_preoperative_directions'];

        $this->db->where('examination_id', $counselling_preoperative_directions_m['examination_id']);
        $this->db->delete('counselling_preoperative_directions');

        $this->db->where('examination_id', $counselling_preoperative_directions_m['examination_id']);
        $this->db->delete('counselling_preoperative_directions_operation');

        $this->db->where('examination_id', $counselling_preoperative_directions_m['examination_id']);
        $this->db->delete('counselling_medicine_prescription');

        $this->db->where('examination_id', $counselling_preoperative_directions_m['examination_id']);
        $this->db->delete('counselling_preoperative_instruction');

        $this->db->insert('counselling_preoperative_directions',$counselling_preoperative_directions_m);
        $counselling_preoperative_directions_id=$this->db->insert_id();

        $counselling_preoperative_directions_operation_m=$data['counselling_preoperative_directions_operation'];
        $particulars_ids=$counselling_preoperative_directions_operation_m['particulars_id'];
        $chagetype_ids=$counselling_preoperative_directions_operation_m['chagetype_id'];
        if($particulars_ids)
        {
           foreach ($particulars_ids as $particularsdata) 
            {
                   $this->db->insert('counselling_preoperative_directions_operation',array(
                                                "counselling_preoperative_directions_id"=>$counselling_preoperative_directions_id,
                                                "examination_id"=>$counselling_preoperative_directions_m['examination_id'],
                                                "chagetype_id"=>$counselling_preoperative_directions_m['chargetype_id'],
                                                "particulars_id"=>$particularsdata
                                    )
               );
            } 
        }
        
       
       $doctor_examinations=$data['counselling_medicine_prescription'];
       $examination_ids=$doctor_examinations['examination_id'];
       $medicine_ids=$doctor_examinations['medicine_id'];
       $instructions=$doctor_examinations['instruction'];
       $nodayss=$doctor_examinations['nodays'];
       $qtys=$doctor_examinations['qty'];
       $sdates=$doctor_examinations['sdate'];
       $tdates=$doctor_examinations['tdate'];
       $medeyes=$doctor_examinations['med_eye'];
       $med_action=$doctor_examinations['med_action'];
       $med_name=$doctor_examinations['med_name'];
       $i=0;
        if($medicine_ids)
        {
           foreach ($medicine_ids as $medicine_idd) 
            {
                   $this->db->insert('counselling_medicine_prescription',array(
                                                      "medicine_id"=>$medicine_idd,
                                                      "counselling_preoperative_directions_id"=>$counselling_preoperative_directions_id,
                                                      "examination_id"=>$counselling_preoperative_directions_m['examination_id'],
                                                      "instruction"=>$instructions[$i],
                                                      "nodays"=>$nodayss[$i],
                                                      "qty"=>$qtys[$i],
                                                      "sdate"=>$sdates[$i],
                                                      "tdate"=>$tdates[$i],
                                                      "med_action"=>$med_action[$i],
                                                      "med_name"=>$med_name[$i],
                                                      "med_eye"=>$medeyes[$i]
                                             )

                                    );
                   $i++;
            } 
        }

        $counselling_preoperative_instruction_m=$data['counselling_preoperative_instruction'];
        $remarks_id=$counselling_preoperative_instruction_m['remarks_id'];
        if($remarks_id)
        {
           foreach ($remarks_id as $remarks_idsa) 
            {
                   $this->db->insert('counselling_preoperative_instruction',array(
                                                "counselling_preoperative_directions_id"=>$counselling_preoperative_directions_id,
                                                "examination_id"=>$counselling_preoperative_directions_m['examination_id'],
                                                "remarks_id"=>$remarks_idsa,
                                                "ins_date"=>date('Y-m-d'),
                                                "ins_time"=>date('H:i')
                                    )
               );
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
                return $counselling_preoperative_directions_id;
        }
    }

    function Preoperativeinsprint_data($surid,$office_id)
  {
     error_reporting(0);
    $surgery_fitness_request=$this->db->get_where('counselling_preoperative_directions',"counselling_preoperative_directions_id=$surid")->row();
    $patient_registration_id=$surgery_fitness_request->patient_registration_id;
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
   $data['appointment_date']=$this->date->dateSql2View($surgery_fitness_request->preopertive_date);
   $data['dateof_operation']=$this->date->dateSql2View($surgery_fitness_request->dateof_operation);
   $data['timeof_admission']= date ('h:i A',strtotime($surgery_fitness_request->timeof_admission));
   $data['eyeid']=$surgery_fitness_request->eyeid;
   
   $data['headerprint']=$surgery_fitness_request->headerprint;

   
  $parti='';
   $surinvdata=$this->Get_operationdata($surid);
   if($surinvdata)
   {
      foreach($surinvdata as $dataval)
      {
          $partidate=$dataval['particulars_id'];
          $chagetype_id=$surgery_fitness_request->chargetype_id;
          $getparticularname=$this->getparticularsmodel($chagetype_id,$partidate,$this->session->userdata('office_id')); 
          $parti.= $getparticularname[0]['name'].',';
      }
   }
    $partiy=substr($parti, 0, -1);
      $data['partdata']=$partiy;              

    $data['medicinedetails']= $this->db->query("select med_action,med_name,ex_ins,ex_no,medicine.name as drugname,instruction,nodays,qty,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,med_eye from counselling_medicine_prescription left join medicine on counselling_medicine_prescription.medicine_id=medicine.medicine_id where counselling_medicine_prescription.counselling_preoperative_directions_id='$surid'")->result();

    $data['instr_preop']= $this->db->query("select preoperative_instruction.name as insdata from counselling_preoperative_instruction inner join preoperative_instruction on preoperative_instruction.preoperative_instruction_id=counselling_preoperative_instruction.remarks_id where counselling_preoperative_instruction.counselling_preoperative_directions_id=$surid")->result();
   
   
   
   // $data['appointment_time']=1;
      $where_array = array(
               'examination_id' =>$surgery_fitness_request->examination_id,
               'chargetype_id'=>$surgery_fitness_request->chargetype_id
              );

    $doctor_id=$this->db->get_where('examination_treatmentplan',$where_array)->row()->doctor_id;

    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$doctor_id")->row()->name;

  
  
   
         $html=$this->load->view("master/preoperativeprintdata",$data, true); 
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
  public function getdoctormedicinemodel($var_array)

    {

        $sql = "select counselling_medicine_prescription.med_action,counselling_medicine_prescription.med_name,counselling_medicine_prescription.ex_ins,counselling_medicine_prescription.ex_no,medicine.category_id,counselling_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from counselling_medicine_prescription left join medicine on counselling_medicine_prescription.medicine_id=medicine.medicine_id where counselling_medicine_prescription.counselling_preoperative_directions_id=?  and 1=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }
  public function Get_operationdata($surid)
    {
      
        $sql = "select particulars_id,chagetype_id from counselling_preoperative_directions_operation where counselling_preoperative_directions_id=$surid";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getparticularsmodel($idval,$particular_id,$office_id)

    {
// echo $particular_id;exit;
        if($idval==1){

            $charges='opdcharge';

            $id="opdcharge_id";

        }

        elseif($idval==2){

            $charges='ipdcharge';

            $id="ipdcharge_id";

        }

        elseif($idval==3){

            $charges='laser';

            $id="laser_id";

        }

        elseif($idval==4){

            $charges='injection';

            $id="injection_id";

        }

        elseif($idval==5){

            $charges='investigation';

            $id="investigation_id";

        }

        $sql = "select * from $charges where  $id=$particular_id  and office_id= $office_id and status=1";

        $result_row=$this->db->query($sql); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }
}