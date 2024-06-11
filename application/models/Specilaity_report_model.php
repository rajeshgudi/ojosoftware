<?php
/**
 * Description of Petty_cash_model
 *
 * @author Prabhu @15/07/2022
 */
class Specilaity_report_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

	
    public function pettycashdata($sum_fromdate,$sum_todate,$office_id)
	{
		$sql = "select CONCAT(fname , ' ',  lname ,'') AS pateint_name,specilaity.name,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id inner join specilaity on specilaity.specilaity_id=examination.specilaity_id where examination_date between  '$sum_fromdate'  and  '$sum_todate' and examination.office_id='$office_id' and examination.specilaity_id>0";
	  $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
    $this->logger->save($this->db);
		return $res;
	}
  public function Get_Showdata_Dia($sum_fromdate,$sum_todate,$docid,$office_id)
  {
    $docd='';
    if($docid)
    {
      $docd=" and examination.doctor_id=$docid";
    }
      $sql = "select CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,doctors_registration.name as doctorname,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination_diagnosis.diagnosis_id,diagnosis.name as dianame,department.name as dename,eye,remarks from examination_diagnosis inner join diagnosis on examination_diagnosis.diagnosis_id=diagnosis.diagnosis_id left join department on diagnosis.department_id=department.department_id
      inner join examination on examination.examination_id=examination_diagnosis.examination_id
      inner join doctors_registration on examination.doctor_id=doctors_registration.doctors_registration_id
      inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
      where examination.examination_date between '$sum_fromdate' and '$sum_todate' $docd";
      $result_row=$this->db->query($sql); 
      $res= $result_row->result_array ();
      return $res;
  }
  public function gettreamnetplanmodel($var_array,$docid)
  {
    $do='';
    if($docid)
    {
      $do=" and examination_treatmentplan.doctor_id=$docid";
    }
      $sql = "select examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id 
      inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
      inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
        where examination_treatmentplan.status = ? and examination_treatmentplan.appointment_date between  ? and ? and chargetype_id = ? and   examination_treatmentplan.office_id= ?  $do";
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      $this->logger->save($this->db);
     // echo $this->db->last_query();exit;
      return $res;
  }
  public function gettreamnetplanmodel_inv($var_array,$docid)
  {
    $do='';
    if($docid)
    {
      $do=" and examination_chargesdetails.doctor_id=$docid";
    }
    $sql="select patient_registration.mobileno,examination_chargesdetails.charge_id as chargetype_id,doctors_registration.name as doctorname,DATE_FORMAT(examination_chargesdetails.entry_date,'%d/%m/%Y') AS appointment_date,mrdno,examination_chargesdetails.particulars_id as particular_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name  from examination_chargesdetails 
    inner join patient_registration on patient_registration.patient_registration_id=examination_chargesdetails.patient_registration_id
    inner join doctors_registration on doctors_registration.doctors_registration_id=examination_chargesdetails.doctor_id where examination_chargesdetails.entry_date between ? and ? and examination_chargesdetails.charge_id=? and   doctors_registration.office_id= ?  $do
    ";
     
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      $this->logger->save($this->db);
     // echo $this->db->last_query();exit;
      return $res;
  }
    public function geteditdata($var_array)
    {
        $sql = "select * from petty_cash where petty_cash_id=? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheck($var_array)
	{
		$sql = "select count(*) as cnt from petty_cash where petty_cash_id!=?  and name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheck($var_array)
	{
		$sql = "select count(*) as cnt from petty_cash where petty_cash_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function savedata($data)
    {
        if($this->db->insert('petty_cash',$data))
        {
             return TRUE;
        }
    }
    public function updatedata($data,$id)
    {
        $this->db->set($data);
        $this->db->where('petty_cash_id', $id);
        if($this->db->update('petty_cash'))
        {
            return TRUE;
        }
    }
    public function deletedata($id) 
    {
        $this->db->where('petty_cash_id', $id);
        if($this->db->delete('petty_cash'))
        {
            return TRUE;
        }
    }

       function ajax_call($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'petty_cash_id',
      1 =>'petty_cash_name'
     
    );
 
    $this->db->select('petty_cash_name');//s.photo_no,s.photo_name'
    $this->db->from('petty_cash');
    $whrcon = array('office_id' => $office_id);
    $result = $this->db->get();
    $totalData = $result->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT photo,auth_person,petty_cash_id,petty_cash_name,petty_receipt_no,petty_amount,petty_date,description,if(pay_type=1,'Crdit','Debit') as pay_type";
    $sql.=" FROM petty_cash where office_id=$office_id ";
    // getting records as per search parameters
    $isFilterApply=0;
    if( !empty($requestData['search']['value']) ){   //name
      $sql.="  and (  ";
        $sql.="  OR petty_cash_name LIKE '".$requestData['search']['value']."%'  ";
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
			$petty_cash_id=$row[$i]['petty_cash_id'];

      $photo=$row[$i]['photo'];

      if($photo)
      {
        $bb=base_url();
        $att='<a class="btn btn-icon btn-info mr-1 mb-1" href="'.$bb.'images/pettycash/'.$photo.'" target="_blank">
                 <i class="la la-folder-open"></i>
              </a>';
            $tt='';
      }
      else
      {
        $att="";
        $tt='';
      }
	     $edit="<button type='button'  onclick=\"editdata('$petty_cash_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

      	// $edit='<button  onclick="editpetty_cash_id('.$petty_cash_id_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

      	$delete='<button onclick="deletedata('.$petty_cash_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$petty_cash_id_id'")) || ($this->auth->lock_up('supplier',"category_id='$petty_cash_id_id'")) ||in_array($petty_cash_id_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($petty_cash_id_id,[1,2,3]))
        //   {
        //       $edit='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
     
        $row[$i]['slno']=$i+1;
       // $row[$i]['edit']=$edit;
       $row[$i]['photo']=$att.$tt;
        $row[$i]['delete']=$delete;
        
      }


      $json_data = array(
        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal"    => intval( $totalData ),  // total number of records
        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            =>   $row  // total data array
 
      );
      return $json_data;
 
  }
}