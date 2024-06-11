<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @10/09/2022
 */
class Discharge_summary_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

    public function savedata($data)
    {
        $this->db->trans_begin();
        $discharge_summarys=$data['discharge_summary'];
        $this->db->insert('discharge_summary',$discharge_summarys);
        $discharge_summary_id=$this->db->insert_id();
        $examination_medical_historys=$data['discharge_summary_medicalhistory'];
        $medical_history_ids=$examination_medical_historys['medical_history_id'];
        $remarkss=$examination_medical_historys['remarks'];
        $i=0;
        foreach ($medical_history_ids as $medical_history_i) 
        {
            
            if($remarkss[$i]){
            $this->db->insert('discharge_summary_medicalhistory',array("medical_history_id"=>$medical_history_i,"remarks"=>$remarkss[$i],"discharge_summary_id"=>$discharge_summary_id));}
            $i++;
        }
           $doctor_examinations=$data['discharge_summary_medicine'];
           $medicine_ids=$doctor_examinations['medicine_id'];
           $instructions=$doctor_examinations['instruction'];
           $nodayss=$doctor_examinations['nodays'];
           $qtys=$doctor_examinations['qty'];
           $sdates=$doctor_examinations['sdate'];
           $tdates=$doctor_examinations['tdate'];
           $descriptions=$doctor_examinations['description'];
           $medeyes=$doctor_examinations['med_eye'];
           $i=0;
           foreach ($medicine_ids as $medicine_idd) 
           {
                   $this->db->insert('discharge_summary_medicine',array(
                                                      "medicine_id"=>$medicine_idd,
                                                      "instruction"=>$instructions[$i],
                                                      "noofdays"=>$nodayss[$i],
                                                      "sdate"=>$sdates[$i],
                                                      "edate"=>$tdates[$i],
                                                      "qty"=>$qtys[$i],
                                                      "eye"=>$medeyes[$i],
                                                      "description"=>$descriptions[$i],
                                                      "discharge_summary_id"=>$discharge_summary_id
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
    public function deletedata($id) 
    {
        $this->db->where('discharge_summary_id', $id);
        if($this->db->delete('discharge_summary'))
        {
            $this->db->where('discharge_summary_id', $id);
            $this->db->delete('discharge_summary_medicalhistory');

            $this->db->where('discharge_summary_id', $id);
            $this->db->delete('discharge_summary_medicine');
            return TRUE;
        }
    }

    function ajax_call($requestData)
    {
      $office_id=$this->session->office_id;
      $columns = array(
        0 =>'discharge_summary_id',
        1 =>'doctor_id'
      );
      $this->db->select('discharge_summary_id');
      $this->db->from('discharge_summary');
      $whrcon = array('office_id' => $office_id);
      $result = $this->db->get();
      $totalData = $result->num_rows();
      $totalFiltered = $totalData; 
  
      $sql = "SELECT discharge_summary_id,DATE_FORMAT(discharge_summary.discharge_date,'%d/%m/%Y') AS discharge_date,CONCAT(fname , '',  lname ,'') AS pateint_name";
      $sql.=" FROM discharge_summary inner join patient_registration on patient_registration.patient_registration_id=discharge_summary.patient_registration_id   where discharge_summary.office_id=$office_id ";
  
    
  
      $isFilterApply=0;
  
      if( !empty($requestData['search']['value']) ){   //name
  
        $sql.="  and (  ";
  
          $sql.="   diagnosis LIKE '".$requestData['search']['value']."%'  ";
  
          $sql.="  OR discharge_summary.patient_registration_id in (select patient_registration_id from patient_registration  where (fname  LIKE '".$requestData['search']['value']."%' or lname  LIKE '".$requestData['search']['value']."%' ) ) ";
          $sql.="  OR discharge_date LIKE '".$requestData['search']['value']."%'  ";
          $sql.="  OR surgical_procedure LIKE '".$requestData['search']['value']."%') ";
          $isFilterApply=1;
        }
        $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  desc     LIMIT ".$requestData['start']." ,".$requestData['length']."   ";  // adding length
        $result1 = $this->db->query($sql);
        if($isFilterApply==1){
          $totalFiltered =  $result1->num_rows(); 
        }
        $row=$result1->result_array();
        for ($i=0; $i < count($row); $i++) {
              $discharge_summary_id=$row[$i]['discharge_summary_id'];
        $edit="<button type='button'  onclick=\"editdata('$discharge_summary_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";
        $print='<button onclick="printdata('.$discharge_summary_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
        $delete='<button onclick="deletedata('.$discharge_summary_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';
        $row[$i]['slno']=$i+1;
        $row[$i]['print']=$print;
        $row[$i]['edit']=$edit;
        $row[$i]['delete']=$delete;
    }
        $json_data = array(
          "draw"            => intval( $requestData['draw'] ), 
          "recordsTotal"    => intval( $totalData ),  
          "recordsFiltered" => intval( $totalFiltered ), 
          "data"            =>   $row 
        );
        return $json_data;
    }
    public function getmasterdata($discharge_summary_id)
    {
        $sql = "select * from discharge_summary where discharge_summary_id=$discharge_summary_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getchild1($discharge_summary_id)
    {
        $sql = "select * from discharge_summary_medicalhistory where discharge_summary_id=$discharge_summary_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getchild2($discharge_summary_id)
    {
        $sql = "select *,discharge_summary_medicine.description from discharge_summary_medicine inner join medicine on discharge_summary_medicine.medicine_id=medicine.medicine_id where discharge_summary_id=$discharge_summary_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getmedicaldetails($discharge_summary_id)
    {
        $sql = "select name,remarks from discharge_summary_medicalhistory inner join medical_history on medical_history.medical_history_id=discharge_summary_medicalhistory.medical_history_id where discharge_summary_medicalhistory.discharge_summary_id=$discharge_summary_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getallmedicines($discharge_summary_id)
    {
        $sql = "select name,instruction,eye,discharge_summary_medicine.description,qty,sdate,edate from discharge_summary_medicine inner join medicine on medicine.medicine_id=discharge_summary_medicine.medicine_id where discharge_summary_medicine.discharge_summary_id=$discharge_summary_id";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function updatedata($data,$id)
    {
        $this->db->trans_begin();
        $discharge_summary_id=$id;
        $this->db->where('discharge_summary_id', $id);
        $this->db->delete('discharge_summary_medicalhistory');
        $this->db->where('discharge_summary_id', $id);
        $this->db->delete('discharge_summary_medicine');
        $examinationmaster=$data['discharge_summary'];
        $this->db->set($examinationmaster);
        $this->db->where('discharge_summary_id', $id);
        $this->db->update('discharge_summary');

        $examination_medical_historys=$data['discharge_summary_medicalhistory'];
        $medical_history_ids=$examination_medical_historys['medical_history_id'];
        $remarkss=$examination_medical_historys['remarks'];
        $i=0;
        foreach ($medical_history_ids as $medical_history_i) 
        {
            
            if($remarkss[$i]){
            $this->db->insert('discharge_summary_medicalhistory',array("medical_history_id"=>$medical_history_i,"remarks"=>$remarkss[$i],"discharge_summary_id"=>$discharge_summary_id));}
            $i++;
        }
           $doctor_examinations=$data['discharge_summary_medicine'];
           $medicine_ids=$doctor_examinations['medicine_id'];
           $instructions=$doctor_examinations['instruction'];
           $nodayss=$doctor_examinations['nodays'];
           $qtys=$doctor_examinations['qty'];
           $descriptions=$doctor_examinations['description'];
           $medeyes=$doctor_examinations['med_eye'];
           $i=0;
           foreach ($medicine_ids as $medicine_idd) 
           {
                   $this->db->insert('discharge_summary_medicine',array(
                                                      "medicine_id"=>$medicine_idd,
                                                      "instruction"=>$instructions[$i],
                                                      "noofdays"=>$nodayss[$i],
                                                      "qty"=>$qtys[$i],
                                                      "eye"=>$medeyes[$i],
                                                      "description"=>$descriptions[$i],
                                                      "discharge_summary_id"=>$discharge_summary_id
                                             )
                                    );
                                    //echo $this->db->last_query();exit;
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

    function discharge_summaryprint($discharge_summary_id,$office_id)
  { 
    error_reporting(0);
    $office=$this->db->get_where('office',"office_id=$office_id")->row();
    $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";
    $data['nabh_logo']=($office->nabh_logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->nabh_logo'>";
    $data['website']=$office->website;
    $data['facebook']=$office->facebook;
    $data['youtube']=$office->youtube;
    $data['company_name']=$office->printable_company_name;
    $data['company_address']=$office->printable_company_address;
    $data['company_mobile']=$office->printable_company_mobile;
    $data['company_land_phone']=$office->printable_company_phone;
    $data['company_email']=$office->printable_emailid;
    $data['company_gst']=$office->license_no;
    $data['print_declaration']=$office->declaration;
    $data['gstin_no']=$office->gstin_no;
    $discharge_summary=$this->db->get_where('discharge_summary',"discharge_summary_id=$discharge_summary_id")->row();
    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$discharge_summary->doctor_id")->row()->name;
    $data['username']=$this->db->get_where('user',"user_id=$discharge_summary->login_id")->row()->name;
    $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$discharge_summary->patient_registration_id")->row();
    $data['discharge_date']=$this->date->dateSql2View($discharge_summary->discharge_date);
    $data['nextvisit_date']=$this->date->dateSql2View($discharge_summary->nextvisit_date);
    $data['diagnosis']=$discharge_summary->diagnosis;
    $data['surgical_procedure']=$discharge_summary->surgical_procedure;
    $data['recovery']=$discharge_summary->recovery;
    $data['conditionofthetime']=$discharge_summary->conditionofthetime;
    $data['investigation']=$discharge_summary->investigation;
    $data['pp']=$discharge_summary->pp;
    $data['iol']=$discharge_summary->iol;
    $data['kreading']=$discharge_summary->kreading;
    $data['content']=$discharge_summary->content;
    $data['sugar']=$discharge_summary->sugar;

    $data['pre1']=$discharge_summary->pre1;
    $data['pre2']=$discharge_summary->pre2;
    $data['pre3']=$discharge_summary->pre3;
    $data['pre7']=$discharge_summary->pre7;
    $data['pre8']=$discharge_summary->pre8;
    $data['pre9']=$discharge_summary->pre9;


    $data['prod_eye']=$discharge_summary->prod_eye;

    $data['dateofad']=$this->date->dateSql2View($discharge_summary->dateofad);
    $data['datesur']=$this->date->dateSql2View($discharge_summary->datesur);
    $data['tdate']=$this->date->dateSql2View($discharge_summary->tdate);
   
    $getallmediciness=$this->getallmedicines($discharge_summary_id);
    if($getallmediciness)
    {
      $data['medi']= $getallmediciness;
    }
    else
    {
      $data['medi']='';
    }
    $getmedicalhistory=$this->getmedicaldetails($discharge_summary_id);
    $condval='';
    if($getmedicalhistory)
    {
        foreach($getmedicalhistory as $datamed)
        {
           $condval.=$datamed['name'].'-'.$datamed['remarks'];
        }
        $data['medicalhistory']=$condval;
    }
    else 
    {
        $data['medicalhistory']='Nil';
    }


   $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
    if($host_tvm=='eyecon')
   {
    $pri='eyecon_dischargesummaryprint';
   }
   else
   {
     $pri='eyecon_dischargesummaryprint';
   }
   // $pri='eyecon_dischargesummaryprint';
   $htmldatapr=' <table  style="width:100%;font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;border:0.6px solid black;" border="1">

                                            <tbody><tr>

                                                <th></th>

                                                <th class="tab_tit">D.V</th>

                                                <th class="tab_tit">N.V</th>

                                                <th class="tab_tit">PH</th>

                                            </tr>

                                             <tr>

                                                <td class="tab_tit">Right Eye</td>

                                                <td style="padding:5px;" align="center">'.$discharge_summary->pre1.'</td>

                                                <td style="padding:5px;" align="center">'.$discharge_summary->pre2.'</td>

                                                <td style="padding:5px;" align="center">'.$discharge_summary->pre3.'</td>

                                             

                                            </tr>

                                             <tr>

                                                <td class="tab_tit">Left Eye</td>

                                                <td style="padding:5px;" align="center">'.$discharge_summary->pre7.'</td>

                                                <td style="padding:5px;" align="center">'.$discharge_summary->pre8.'</td>

                                                <td style="padding:5px;" align="center">'.$discharge_summary->pre9.'</td>

                                            

                                            </tr>
                                            <tr>
                                                <td colspan="4">Remarks:'.$discharge_summary->pre_remarks.'</td>
                                            </tr>

                                        </tbody></table>';
   //$pri='eyecon_dischargesummaryprint';
                                         $data['prvis']=$htmldatapr; 
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


         switch($patient_details->print)
            {
            case 1:$html=$this->load->view("master/".$pri,$data, true); 

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

            case 2:$html=$this->load->view("master/".$pri,$data, true); 

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

           case 3:$html=$this->load->view("master/".$pri,$data, true); 

        

           

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

              case 4:$html=$this->load->view("master/".$pri,$data, true); 

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