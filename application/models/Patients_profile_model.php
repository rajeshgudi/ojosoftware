<?php
/**
 * Description of area_id_model
 *
 * @author Prabhu @26/08/2023
 */
class Patients_profile_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

	public function updatedata($data,$id)
    {
        $this->db->set($data);
        $this->db->where('patient_registration_id', $id);
        if($this->db->update('patient_registration'))
        {
           // echo $this->db->last_query();exit;
            return TRUE;
        }
    }
    public function Getpatient_profile_his($regid)
	{
		$sql = "select patient_registration.area_id as areaa,patient_registration.city as  citynamemm,patient_registration_id,mrdno,address,area.name as areaname,city.name as city,title,fname,lname,gender,agemm,ageyy,aged,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno   from patient_registration left join  city on  city.city_id=patient_registration.city
        left join  area on  area.area_id=patient_registration.area_id
         where patient_registration_id=$regid";
	    $result_row=$this->db->query($sql); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}
    public function pat_app_hist($regid)
    {
        $sql = "select patient_appointment.patient_appointment_id,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_time,doctors_registration.name as doctoname  from patient_appointment left join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id
         where patient_registration_id=$regid order by patient_appointment_id ASC";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }
    public function pat_trs_hist($regid)
    {
        $sql = "select billing_master_id,grand_total,DATE_FORMAT(billing_date,'%d/%m/%Y') AS billing_date,billing_time,invoice_number,doctors_registration.name as doctoname  from billing_master left join doctors_registration on doctors_registration.doctors_registration_id=billing_master.doctor_id
         where patient_registration_id=$regid order by billing_master_id ASC";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }
    public function geteditdata($var_array)
    {
        $sql = "select * from area where area_id=? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheck($var_array)
	{
		$sql = "select count(*) as cnt from area where area_id!=?  and name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheck($var_array)
	{
		$sql = "select count(*) as cnt from area where area_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function savedata($data)
    {
        if($this->db->insert('area',$data))
        {
             return TRUE;
        }
    }
  
    public function deletedata($id) 
    {
        $this->db->where('area_id', $id);
        if($this->db->delete('area'))
        {
            return TRUE;
        }
    }

       function ajax_call($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'area_id',
      1 =>'name'
     
    );
 
    $this->db->select('name');//s.photo_no,s.photo_name'
    $this->db->from('area');
    $whrcon = array('office_id' => $office_id);
    $result = $this->db->get();
    $totalData = $result->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT area_id,pincode,name,description,if(status=1,'Active','Deactive') as status";
    $sql.=" FROM area where office_id=$office_id ";
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
			$area_id=$row[$i]['area_id'];


	     $edit="<button type='button'  onclick=\"editdata('$area_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

      	// $edit='<button  onclick="editarea_id('.$area_id_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

      	$delete='<button onclick="deletedata('.$area_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$area_id_id'")) || ($this->auth->lock_up('supplier',"category_id='$area_id_id'")) ||in_array($area_id_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($area_id_id,[1,2,3]))
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