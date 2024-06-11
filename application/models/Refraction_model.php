
<?php
/**
 * Description of refraction_master_model
 *
 * @author Prabhu @14/01/2022
 */
class Refraction_model extends CI_Model{
 public function __construct()
{
	parent::__construct();
}

	
    public function checkcheckval($var_array)
	{
		$sql = "select count(*) as cnt from refraction_master where  name = ? and eye_type  = ? and ref_type  = ? AND refraction_type = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
        $this->logger->save($this->db);
		return $res;
	}
    public function geteditdata($var_array)
    {
        $sql = "select * from refraction_master where refraction_master_id=? and refraction_type =? and office_id= ?";
        $result_row=$this->db->query($sql, $var_array); 
        $res= $result_row->result_array ();
        return $res;
    }
	public function editcheckrefraction_master($var_array)
	{
		$sql = "select count(*) as cnt from refraction_master where refraction_master_id!=?  and name = ? and eye_type = ? and ref_type = ? and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function deletecheckrefraction_master($var_array)
	{
		$sql = "select count(*) as cnt from refraction_master where refraction_master_id=?  and office_id= ?";
	    $result_row=$this->db->query($sql, $var_array); 
		$res= $result_row->result_array ();
		return $res;
	}
	public function savedata($data)
    {
        if($this->db->insert('refraction_master',$data))
        {
             return TRUE;
        }
    }
    public function updatedata($data,$id)
    {
        $this->db->set($data);
        $this->db->where('refraction_master_id', $id);
        if($this->db->update('refraction_master'))
        {
            return TRUE;
        }
    }
    public function deletedata($id) 
    {
        $this->db->where('refraction_master_id', $id);
        if($this->db->delete('refraction_master'))
        {
            return TRUE;
        }
    }

       function ajax_call1($requestData)
  {
  
     $ty='';
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 
     $typeid=1;
    $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye,ref_type";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =1";
    // getting records as per search parameters
    $isFilterApply=0;
    if( !empty($requestData['search']['value']) ){   //name
      $sql.="  and (  ";
        $sql.="   name LIKE '".$requestData['search']['value']."%'  ";
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
			$refraction_master_id=$row[$i]['refraction_master_id'];
            $ref_type=$row[$i]['ref_type'];
            if($ref_type==1)
            {
                $ty='ucdva';
            }
            elseif ($ref_type==2)
            {
               $ty='ucnva';
            }


	     $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',1);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

      	// $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

      	$delete='<button onclick="deletedata('.$refraction_master_id.',1)" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $edit='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
     
        $row[$i]['slno']=$i+1;
        $row[$i]['vistype']=$ty;
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
   function ajax_call2($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 
     $typeid=2;
 $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =2";
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
            $refraction_master_id=$row[$i]['refraction_master_id'];


         $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',2);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

        // $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

        $delete='<button onclick="deletedata('.$refraction_master_id.',2)" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
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

  function ajax_call3($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 $ty='';
     $typeid=3;
 $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye,ref_type";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =3";
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
            $refraction_master_id=$row[$i]['refraction_master_id'];
            $ref_type=$row[$i]['ref_type'];
            if($ref_type==3)
            {
                $ty='BCDVA';
            }
            elseif ($ref_type==4)
            {
               $ty='BCNVA';
            }


         $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',3);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

        // $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

        $delete='<button onclick="deletedata('.$refraction_master_id.',3)" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $edit='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
     
        $row[$i]['slno']=$i+1;
        $row[$i]['vistype']=$ty;
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

  function ajax_call4($requestData)
  {
  
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 $ty='';
     $typeid=4;
 $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye,ref_type";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =4";
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
            $refraction_master_id=$row[$i]['refraction_master_id'];
            


         $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',4);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

        // $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

        $delete='<button onclick="deletedata('.$refraction_master_id.',4)" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
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

   function ajax_call5($requestData)
  {
  
    $typeid=5;
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 $ty='';
     $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye,ref_type";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =5";
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
            $refraction_master_id=$row[$i]['refraction_master_id'];
            


         $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',$typeid);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

        // $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

        $delete='<button onclick="deletedata('.$refraction_master_id.','.$typeid.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
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

  function ajax_call6($requestData)
  {
  $typeid=6;
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 $ty='';
   
   
    $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye,ref_type";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =$typeid";
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
            $refraction_master_id=$row[$i]['refraction_master_id'];
            


         $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',$typeid);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

        // $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

        $delete='<button onclick="deletedata('.$refraction_master_id.','.$typeid.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
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

   function ajax_call7($requestData)
  {
  $typeid=7;
    
    $office_id=$this->session->office_id;
    $columns = array(
      // datatable column index  => database column name
      0 =>'refraction_master_id',
      1 =>'name'
     
    );
 $ty='';
   
   
    $this->db->where('office_id',$office_id);
    $this->db->where('refraction_type',$typeid);
    $totalData = $this->db->get('refraction_master')->num_rows();
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
   
 
    $sql = "SELECT refraction_master_id,name,description,if(status=1,'Active','Deactive') as status,if(eye_type =1,'Left','Right') as eye,ref_type";
    $sql.=" FROM refraction_master where office_id=$office_id and refraction_type =$typeid";
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
            $refraction_master_id=$row[$i]['refraction_master_id'];
            $ref_type=$row[$i]['ref_type'];
            if($ref_type==5)
            {
                $ty='Sphere';
            }
            elseif ($ref_type==6)
            {
               $ty='Cylinder';
            }
            elseif ($ref_type==7)
            {
               $ty='Axis';
            }


         $edit="<button type='button'  onclick=\"editdata('$refraction_master_id',$typeid);\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

        // $edit='<button  onclick="editrefraction_master('.$refraction_master_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';

        $delete='<button onclick="deletedata('.$refraction_master_id.','.$typeid.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';

        // if(($this->auth->lock_up('item_master',"category_id='$refraction_master_id'")) || ($this->auth->lock_up('supplier',"category_id='$refraction_master_id'")) ||in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
        //   if(in_array($refraction_master_id,[1,2,3]))
        //   {
        //       $edit='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';
        //   }
     
        $row[$i]['slno']=$i+1;
        $row[$i]['vistype']=$ty;
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