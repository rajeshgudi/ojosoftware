<?php
/**
 * Description of patient_category_model
 *
 * @author Prabhu @01/07/2023
 */

class Case_hsitory_preview_model extends CI_Model{
 public function __construct()
	{
		parent::__construct();
	}
      public function checkingval($mrdno)
    {
        $sql = "select patient_registration_id from patient_registration where  mrdno= '$mrdno'";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }
    public function Get_App_ID($regid)
    {
        $sql = "select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= $regid order by patient_appointment_id DESC limit 1";
        $result_row=$this->db->query($sql); 
        $res= $result_row->result_array ();
        $this->logger->save($this->db);
        return $res;
    }

}