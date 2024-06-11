<?php
/**
 * Description of medicine_instruction_id_model
 *
 * @author Prabhu @19/05/2024
 */
class Mapping_templates_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}
    public function checkingval($var_array)
	{
		$sql = "select count(*) as cnt from medicine_instruction where  name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
    $this->logger->save($this->db);
		return $res;
	}
       
    public function geteditdata($var_array)
    {
        $sql = "select * from medicine_mapping_master where medicine_mapping_master_id=? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
    public function getchild_datta($editd)
    {
        $sql = "select b.name,b.days,a.medicine_instruction_id from medicine_mapping_child a inner join medicine_instruction b on a.medicine_instruction_id=b.medicine_instruction_id where medicine_mapping_master_id=$editd";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheck($var_array)
	{
		$sql = "select count(*) as cnt from medicine_instruction where medicine_instruction_id!=?  and name = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheck($var_array)
	{
		$sql = "select count(*) as cnt from medicine_instruction where medicine_instruction_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function savedata($data)
    {
        $this->db->trans_begin();
        $mapping_masters=$data['mapping_master'];
        $this->db->insert('medicine_mapping_master',$mapping_masters);
        $medicine_mapping_master_id=$this->db->insert_id();
        $mapping_childs=$data['mapping_child'];
        $medicine_instruction_ids=$mapping_childs['medicine_instruction_id'];
        if($medicine_instruction_ids)
        {
           foreach ($medicine_instruction_ids as $particularsdata) 
            {
                   $this->db->insert('medicine_mapping_child',array(
                                                "medicine_mapping_master_id"=>$medicine_mapping_master_id,
                                                "medicine_instruction_id"=>$particularsdata,
                                                "cur_date"=>date('Y-m-d'),
                                                "cur_time"=>date('H:i:s'),
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
                return true;
        }
    }
    public function updatedata($data,$id)
    {
        $this->db->where('medicine_mapping_master_id', $id);
        $this->db->delete('medicine_mapping_child');
        $mapping_masters=$data['mapping_master'];
        $this->db->set($mapping_masters);
        $this->db->where('medicine_mapping_master_id', $id);
        if($this->db->update('medicine_mapping_master'))
        {
            $mapping_childs=$data['mapping_child'];
            $medicine_instruction_ids=$mapping_childs['medicine_instruction_id'];
            if($medicine_instruction_ids)
            {
               foreach ($medicine_instruction_ids as $particularsdata) 
                {
                       $this->db->insert('medicine_mapping_child',array(
                                                    "medicine_mapping_master_id"=>$id,
                                                    "medicine_instruction_id"=>$particularsdata,
                                                    "cur_date"=>date('Y-m-d'),
                                                    "cur_time"=>date('H:i:s'),
                                        )
                   );
                } 
            }
            return TRUE;
        }
    }
    public function deletedata($id) 
    {
        $this->db->where('medicine_mapping_master_id', $id);
        if($this->db->delete('medicine_mapping_master'))
        {
            $this->db->where('medicine_mapping_master_id', $id);
            $this->db->delete('medicine_mapping_child');
            return TRUE;
        }
    }

       function ajax_call($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'medicine_mapping_master_id',
      1 =>'item_id'
     
    );
 
    $this->db->select('item_id');//s.photo_no,s.photo_name'
    $this->db->from('medicine_mapping_master');
    $whrcon = array('office_id' => $office_id);
    $result = $this->db->get();
    $totalData = $result->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT medicine_mapping_master_id,b.name,a.description,if(a.status=1,'Active','Deactive') as status";
    $sql.=" FROM medicine_mapping_master a inner join medicine b on a.item_id=b.medicine_id where a.office_id=$office_id ";
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
			$medicine_mapping_master_id=$row[$i]['medicine_mapping_master_id'];


	     $edit="<button type='button'  onclick=\"editdata('$medicine_mapping_master_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

      	// $edit='<button  onclick="editmedicine_instruction_id('.$medicine_instruction_id_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

      	$delete='<button onclick="deletedata('.$medicine_mapping_master_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$medicine_instruction_id_id'")) || ($this->auth->lock_up('supplier',"category_id='$medicine_instruction_id_id'")) ||in_array($medicine_instruction_id_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($medicine_instruction_id_id,[1,2,3]))
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