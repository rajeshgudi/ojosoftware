<?php
/**
 * Description of coating_id_model
 *
 * @author Prabhu @22/07/2023
 */
class Package_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}

	
    public function checkingval($var_array)
	{
		$sql = "select count(*) as cnt from coating where  name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
    $this->logger->save($this->db);
		return $res;
	}
    public function geteditdata($var_array)
    {
        $sql = "select * from package_master where package_master_id=? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function geteditdata_child($var_array)
    {
        $sql = "select ipd_package_id,ipdcharge.name,ipdcharge.amount from package_master_detail inner join ipdcharge on ipdcharge.ipdcharge_id=package_master_detail.ipd_package_id where package_master_id=$var_array";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheck($var_array)
	{
		$sql = "select count(*) as cnt from coating where coating_id!=?  and name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheck($var_array)
	{
		$sql = "select count(*) as cnt from coating where coating_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
    public function savedata($data)
    {
       $this->db->trans_begin();
       $package_masters=$data['package_master'];
       $this->db->insert('package_master',$package_masters);
       $package_master_id=$this->db->insert_id();
       $office_id=$this->session->userdata('office_id');
       $login_id=$this->session->userdata('login_id');
       $package_detailss=$data['package_details'];
       $particulars_ids=$package_detailss['particulars_id'];
       $calrow_ids=$package_detailss['calrow_id'];
       $i=0;
       foreach ($calrow_ids as $calrow_id) 
       {
                $this->db->insert('package_master_detail',array(
                                                      "package_master_id"=>$package_master_id,
                                                      "ipd_package_id"=>$particulars_ids[$i],
                                                      "pakage_date"=>date('Y-m-d')
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
    
    public function updatedata($data,$id)
    {
      $this->db->trans_begin();
      $office_id=$this->session->userdata('office_id');
      $login_id=$this->session->userdata('login_id');
      $this->db->where('package_master_id',$id);
      $this->db->delete('package_master_detail');
      $billing_masters=$data['package_master'];
      $this->db->set($billing_masters);
      $this->db->where('package_master_id', $id);
      $this->db->update('package_master');
      $billing_master_id=$id;
      $package_detailss=$data['package_details'];
      $particulars_ids=$package_detailss['particulars_id'];
      $calrow_ids=$package_detailss['calrow_id'];
      $i=0;
      foreach ($calrow_ids as $calrow_id) 
      {
               $this->db->insert('package_master_detail',array(
                                                     "package_master_id"=>$billing_master_id,
                                                     "ipd_package_id"=>$particulars_ids[$i],
                                                     "pakage_date"=>date('Y-m-d')
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
        $this->db->where('package_master_id', $id);
        if($this->db->delete('package_master'))
        {
            $this->db->where('package_master_id',$id);
            $this->db->delete('package_master_detail');
            return TRUE;
        }
    }

       function ajax_call($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'package_master_id',
      1 =>'name'
     
    );
 
    $this->db->select('name');//s.photo_no,s.photo_name'
    $this->db->from('package_master');
    $whrcon = array('office_id' => $office_id);
    $result = $this->db->get();
    $totalData = $result->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT package_master_id,name,description,total_amount as amount,if(status=1,'Active','Deactive') as status";
    $sql.=" FROM package_master where office_id=$office_id ";
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
			$coating_id=$row[$i]['package_master_id'];


	     $edit="<button type='button'  onclick=\"editdata('$coating_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

      

      	$delete='<button onclick="deletedata('.$coating_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

      
     
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