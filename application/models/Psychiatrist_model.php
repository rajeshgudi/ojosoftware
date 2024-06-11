<?php
/**
 * Description of informant_id_model
 *
 * @author Prabhu @27/04/2024
 */
class Psychiatrist_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

	
    public function getdoctors($patient_registration_id,$pat_app_id)
	{
		$sql = "select name,doctors_registration_id from doctors_registration where doctors_registration_id in (select doctor_id from patient_appointment where patient_appointment_id=$pat_app_id and patient_registration_id=$patient_registration_id)";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
		return $res;
	}
    public function geteditdata($var_array)
    {
        $sql = "select * from informant where informant_id=? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheck($var_array)
	{
		$sql = "select count(*) as cnt from informant where informant_id!=?  and name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheck($var_array)
	{
		$sql = "select count(*) as cnt from informant where informant_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
    public function Already_savedOr_Not($patient_registration_id,$pat_app_id,$doctors_registration_id)
    {
        $sql = "select count(*) as cnt,psychiatrist_process_id from psychiatrist_process where patient_registration_id=$patient_registration_id  and patient_appointment_id= $pat_app_id and doctor_id=$doctors_registration_id order by psychiatrist_process_id desc limit 1";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getdoctormedicinemodel($var_array)
    {
        $sql = "select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id=?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getsavedatamodel($var_array)
    {
        $sql = "select * from psychiatrist_process a 
                inner join patient_registration b on a.patient_registration_id=b.patient_registration_id 
                inner join patient_appointment c on a.patient_appointment_id=c.patient_appointment_id 
                left join doctors_registration d on d.doctors_registration_id=a.doctor_id where psychiatrist_process_id=? and a.office_id=?";
        $result_row=$this->db->query($sql,$var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
	 public function savedata($data)
    {
         error_reporting(0);
       $this->db->trans_begin();
       $psy_main_data=$data['psy_main'];
       $this->db->insert('psychiatrist_process',$psy_main_data);
       $psychiatrist_process_id=$this->db->insert_id();
       $psy_medicine_data=$data['psy_medicine'];
       $medicine_ids=$psy_medicine_data['medicine_id'];
       $instructions=$psy_medicine_data['instruction'];
       $nodayss=$psy_medicine_data['nodays'];
       $qtys=$psy_medicine_data['qty'];
       $sdates=$psy_medicine_data['sdate'];
       $tdates=$psy_medicine_data['tdate'];
       $medeyes=$psy_medicine_data['med_eye'];
       $mulframetypes=$psy_medicine_data['mulframetype'];
       $mulframecolors=$psy_medicine_data['mulframecolor'];
       $med_action=$psy_medicine_data['med_action'];
       $med_name=$psy_medicine_data['med_name'];
       $i=0;
       foreach ($medicine_ids as $medicine_idd) 
       {
            if($mulframetypes[$i])
            {
                $frametype=$mulframetypes[$i];
                $framecolor=$mulframecolors[$i];
            }
            else 
            {
                
                $frametype='';
                $framecolor='';
            }
               $this->db->insert('psychiatrist_medicine_prescription',array(
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
                                                  "psychiatrist_process_id"=>$psychiatrist_process_id
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
                return TRUE;
        }
    }
     public function updatepsy($data,$id)
        {
            error_reporting(0);
            //print_r($data);exit();
            $this->db->trans_begin();
            $this->db->where('psychiatrist_process_id', $id);
            $this->db->delete('psychiatrist_medicine_prescription');
            $psy_main_data=$data['psy_main'];
            $this->db->set($psy_main_data);
            $this->db->where('psychiatrist_process_id', $id);
            $this->db->update('psychiatrist_process');
            //echo $this->db->last_query();exit;
            $psychiatrist_process_id=$id;
            $psy_medicine_data=$data['psy_medicine'];
           $medicine_ids=$psy_medicine_data['medicine_id'];
           $instructions=$psy_medicine_data['instruction'];
           $nodayss=$psy_medicine_data['nodays'];
           $qtys=$psy_medicine_data['qty'];
           $sdates=$psy_medicine_data['sdate'];
           $tdates=$psy_medicine_data['tdate'];
           $medeyes=$psy_medicine_data['med_eye'];
           $mulframetypes=$psy_medicine_data['mulframetype'];
           $mulframecolors=$psy_medicine_data['mulframecolor'];
           $med_action=$psy_medicine_data['med_action'];
           $med_name=$psy_medicine_data['med_name'];
           $i=0;
           foreach ($medicine_ids as $medicine_idd) 
           {
                if($mulframetypes[$i])
                {
                    $frametype=$mulframetypes[$i];
                    $framecolor=$mulframecolors[$i];
                }
                else 
                {
                    
                    $frametype='';
                    $framecolor='';
                }
                   $this->db->insert('psychiatrist_medicine_prescription',array(
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
                                                      "psychiatrist_process_id"=>$psychiatrist_process_id
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
                return TRUE;
        }

     }
      public function getdoctormedicinemodels($var_array)
    {
        $sql = "select med_action,med_name,ex_ins,ex_no,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id=? and 1=?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
     
public  function print_bill_preview($printpsyid,$postvalues,$office_id)
{   
  $postvaluesArray = explode(',', $postvalues);
  $postoutvalue1=$postvaluesArray[0]; //Informant
  $postoutvalue2=$postvaluesArray[1]; //Cheif Complaints
  $postoutvalue3=$postvaluesArray[2]; // Past Psychiatrist Illness
  $postoutvalue4=$postvaluesArray[3]; //Past Medical & Surgery
  $postoutvalue5=$postvaluesArray[4]; //Family History
  $postoutvalue6=$postvaluesArray[5]; //Personal History
  $postoutvalue7=$postvaluesArray[6]; //Diagnosis
  $postoutvalue8=$postvaluesArray[7]; //Medicine
  $postoutvalue9=$postvaluesArray[8]; //Advice
  $postoutvalue10=$postvaluesArray[9]; //Permorbid Personality
  $postoutvalue11=$postvaluesArray[10]; //Medical Status Examination
  $postoutvalue12=$postvaluesArray[11]; //Review Date
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
  $printpsyid_master=$this->db->get_where('psychiatrist_process',"psychiatrist_process_id=$printpsyid")->row();
  $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$printpsyid_master->doctor_id")->row()->name;
  $data['username']=$this->db->get_where('user',"user_id=$printpsyid_master->login_id")->row()->name;
  $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$printpsyid_master->patient_registration_id")->row();
  $data['psychiatrist_date']=date("d-m-Y", strtotime($printpsyid_master->psychiatrist_date));
  $data['review_date']=date("d-m-Y", strtotime($printpsyid_master->review_date));
  $data['informant']=$printpsyid_master->informant;
  $data['cheif_complaints']=$printpsyid_master->cheif_complaints;
  $data['drug_history']=$printpsyid_master->drug_history;
  $data['past_psychiatrist_illness']=$printpsyid_master->past_psychiatrist_illness;
  $data['past_medical_surgery']=$printpsyid_master->past_medical_surgery;
  $data['family_history']=$printpsyid_master->family_history;
  $data['personal_history']=$printpsyid_master->personal_history;
  $data['diagnosis']=$printpsyid_master->diagnosis;
  $data['advice']=$printpsyid_master->advice;
  $data['permorbid_personality']=$printpsyid_master->permorbid_personality;
  $data['medical_status_examination']=$printpsyid_master->medical_status_examination;
  $data['medicine_doc_remarks']=$printpsyid_master->medicine_doc_remarks;
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

                 <td style="text-align: left;" class="tabledivideright">'.$this->date->dateSql2View($printpsyid_master->psychiatrist_date).'</td> 

            </tr>';

            $showdata.='</br>';
          // change order end
            if($postoutvalue1=='true')
            {
                    if($printpsyid_master->informant)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Informant:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->informant).'</td>
                                    </tr>';
                      }
            }
            $showdata.='</br>';
            if($postoutvalue2=='true')
            {
                    if($printpsyid_master->cheif_complaints)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Cheif Complaints:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->cheif_complaints).'</td>
                                    </tr>';
                      }
            }
            $showdata.='</br>';
          //3
           if($postoutvalue3=='true')
            {
                    if($printpsyid_master->past_psychiatrist_illness)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Past Psychiatrist Illness:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->past_psychiatrist_illness).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue4=='true')
            {
                    if($printpsyid_master->past_medical_surgery)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Past Medical & Surgery:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->past_medical_surgery).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue5=='true')
            {
                    if($printpsyid_master->family_history)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Family History:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->family_history).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue6=='true')
            {
                    if($printpsyid_master->personal_history)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Personal History:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->personal_history).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue7=='true')
            {
                    if($printpsyid_master->diagnosis)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Diagnosis:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->diagnosis).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue8=='true')
            {
                  $var_array=array($printpsyid_master->psychiatrist_process_id,$this->session->userdata('office_id'));
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
            if($postoutvalue9=='true')
            {
                    if($printpsyid_master->advice)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Advice:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->advice).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue10=='true')
            {
                    if($printpsyid_master->permorbid_personality)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Permorbid Personality:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->permorbid_personality).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue11=='true')
            {
                    if($printpsyid_master->medical_status_examination)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Medical Status Examination:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.nl2br($printpsyid_master->medical_status_examination).'</td>
                                    </tr>';
                    }
            }
            $showdata.='</br>';
            if($postoutvalue12=='true')
            {
                    if($printpsyid_master->review_date)
                    {
                        $showdata.='<tr>
                                      <td style="text-align: left;"  class="tabledivideleft" valign="top">Review Date:</td>
                                      <td style="text-align: left;" class="tabledivideright">'.$this->date->dateSql2View($printpsyid_master->review_date).'</td>
                                    </tr>';
                    }
            }
                $showdata.='</table>';
        $data['conddata']=$showdata;
       $printdata=1;
       switch($printdata)
          {

          case 1:$html=$this->load->view("transaction/psychiatrist/psyprint",$data, true); 
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