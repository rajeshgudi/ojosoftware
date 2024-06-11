<?php


class Mrd_user_model extends CI_Model{

 public function __construct()

	{

		parent::__construct();

	}

  public function getpatientMasterdetails($var_array)

    {

        $sql = "select fname,lname,mrdno,CONCAT(`fname`,' ', `lname`) AS pname from patient_registration where  patient_registration_id=? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }
	
    public function issetcheckpateintid($var_array)

    {

        $sql = "select count(*) as cnt from patient_registration where  patient_registration_id= ? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }

    public function save_Files($var_array)

    {


        //patient_files
        $insert = $this->db->insert_batch('patient_files',$var_array); 
        return $insert?true:false; 

    }

    //file_patient
    public function getFiles($var_array)

    {


        $sql = "select file_name, uploaded_on from patient_files where patient_registration_id=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

        //patient_files
      

    }
public function getFileName($id,$filename)
{
    $sql = "select file_name, uploaded_on from patient_files where patient_registration_id='$id' and file_name='$filename'";

    $result_row=$this->db->query($sql); 

    $res= $result_row->result_array ();

    $this->logger->save($this->db);

    return $res;


 
 
}

public function deleteData($id,$filename)
{
    $this->db->where('patient_registration_id', $id);
    $this->db->where('file_name', $filename);
    $delete=$this->db->delete('patient_files');     
    return $delete?true:false; 
 
}

}