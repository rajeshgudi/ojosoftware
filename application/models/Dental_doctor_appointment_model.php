<?php
/**
 * Description of department_id_model
 *
 * @author Prabhu @13/08/2023
 */
class Dental_doctor_appointment_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

	
    public function getAppointment($search_date,$doctor_id)
	{
        $doc='';
        if($doctor_id>0)
        {
            $doc=" and patient_appointment.doctor_id=$doctor_id";
        }
		
        $sql = "SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='$search_date' $doc  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}
  public function getcomp($search_date,$doctor_id)
	{
        $doc='';
        if($doctor_id>0)
        {
            $doc=" and examination.doctor_id=$doctor_id";
        }
		
        $sql = "select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date='$search_date' and  dental_eye=2    $doc";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}
    public function geteditdata($var_array)
    {
        $sql = "select * from department where department_id=? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheck($var_array)
	{
		$sql = "select count(*) as cnt from department where department_id!=?  and name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheck($var_array)
	{
		$sql = "select count(*) as cnt from department where department_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function savedata($data)
    {
        if($this->db->insert('department',$data))
        {
             return TRUE;
        }
    }
    public function updatedata($data,$id)
    {
        $this->db->set($data);
        $this->db->where('department_id', $id);
        if($this->db->update('department'))
        {
            return TRUE;
        }
    }
    public function deletedata($id) 
    {
        $this->db->where('department_id', $id);
        if($this->db->delete('department'))
        {
            return TRUE;
        }
    }

       function ajax_call($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'department_id',
      1 =>'name'
     
    );
 
    $this->db->select('name');//s.photo_no,s.photo_name'
    $this->db->from('department');
    $whrcon = array('office_id' => $office_id);
    $result = $this->db->get();
    $totalData = $result->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT department_id,name,description,if(status=1,'Active','Deactive') as status";
    $sql.=" FROM department where office_id=$office_id ";
    // getting records as per search parameters
    $isFilterApply=0;
    if( !empty($requestData['search']['value']) ){   //name
      $sql.="  and (  ";
        $sql.="  OR name LIKE '".$requestData['search']['value']."%'  ";
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
			$department_id=$row[$i]['department_id'];


	     $edit="<button type='button'  onclick=\"editdata('$department_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

      	// $edit='<button  onclick="editdepartment_id('.$department_id_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

      	$delete='<button onclick="deletedata('.$department_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$department_id_id'")) || ($this->auth->lock_up('supplier',"category_id='$department_id_id'")) ||in_array($department_id_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($department_id_id,[1,2,3]))
        //   {
        //       $edit='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
     
        $row[$i]['slno']=$i+1;
        $row[$i]['edit']=$edit;
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