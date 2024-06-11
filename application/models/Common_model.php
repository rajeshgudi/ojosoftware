<?php

/**

 * Description of patient_category_model

 *

 * @author Prabhu @29/06/2021

 */

class Common_model extends CI_Model
{

	public function __construct()

	{

		parent::__construct();
	}
	function getPat($searchTerm = "", $serv = "", $selectedItems = "")
	{

		// Fetch users
		$this->db->select('*');

		$selectedItemsArr = explode(",", $selectedItems);
		$cond = "";
		for ($i = 0; $i < count($selectedItemsArr); $i++) {
			if (strlen($cond) > 0)
				$cond .= " or ";
			if ($selectedItemsArr[$i] == 1) //MRD
				$cond .= " mrdno like '" . $searchTerm . "%' ";
			if ($selectedItemsArr[$i] == 2) //Phone Nummber
				$cond .= " mobileno like '" . $searchTerm . "%'";
			if ($selectedItemsArr[$i] == 3) //Address
				$cond .= " address like '%" . $searchTerm . "%'";
			if ($selectedItemsArr[$i] == 4) //Barcode
				$cond .= " fname like '%" . $searchTerm . "%'   or lname like '%" . $searchTerm . "%'";
		}

		// $this->db->where("fname like '%" . $searchTerm . "%'   or lname like '%" . $searchTerm . "%'   or mrdno like '%" . $searchTerm . "%'  or address like '%" . $searchTerm . "%'  or mobileno like '%" . $searchTerm . "%'");
		$this->db->where($cond);
		$this->db->limit(20);
		$fetched_records = $this->db->get('patient_registration');
		$users = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach ($users as $user) {
			// if ($serv == 1) {
			// 	$det = $user['fname'] . $user['lname'] . '-' . $user['mrdno'];
			// }
			// if ($serv == 2) {
			// 	$det = $user['fname'] . $user['lname'] . '-' . $user['mobileno'];
			// }
			// if ($serv == 3) {
			// 	$det = $user['fname'] . $user['lname'] . '-' . $user['address'];
			// }
			// if ($serv == 4) {
			// 	$det = $user['fname'] . $user['lname'] . '-' . $user['barcode'];
			// }

			$det = $user['fname'] . $user['lname'] . '-' . $user['mrdno'] . '-' . $user['mobileno'] . '-' . $user['address'] . '-' . $user['barcode'];


			// $det=$user['fname'].' '.$user['lname'].'. / '.$user['mrdno'].'/ '.$user['mobileno'];
			$data[] = array("id" => $user['patient_registration_id'], "text" => $det);
		}
		return $data;
	}
	public function getFiles($var_array)

	{


		$sql = "select file_name, created_date as uploaded_on,attachment_users_id from attachment_users where patient_registration_id=?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;

		//patient_files


	}
	public function getitemdata($var_array)
	{
		$sql = "select medicine_id,name  from medicine where  status=1 and  office_id= ? order by name ASC";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		return $res;
	}


	public function save_Files($var_array)

	{


		//patient_files
		$insert = $this->db->insert_batch('attachment_users', $var_array);
		return $insert ? true : false;
	}

	public function getdepartment($var_array)

	{

		$sql = "select department_id,name from department where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function Get_Staff()
	{
		$sql = "select staff_id,name from staff where   status=1";
		$result_row = $this->db->query($sql);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}



	public function getrefractionv($var_array)

	{

		$sql = "select refraction_master_id,name,eye_type,ref_type from refraction_master where  office_id= ? and refraction_type=?  and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	//Need to remove it later
	public function getrefractionmodel($var_array)

	{

		$sql = "select name,eye_type,ref_type,action from refraction_master where refraction_type=?   and office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		return $res;
	}

	public function getrefractionsinputdata($var_array)

	{

		$sql = "select name,eye_type,ref_type,action from refraction_master where office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		return $res;
	}



	public function getappointmenttype($var_array)

	{

		$sql = "select appointment_type_id,name from appointment_type where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function getcomplaints($var_array)

	{

		$sql = "select name,complaints_id from complaints where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}


	public function getpatient_titles($var_array)

	{

		$sql = "select patient_title_id,name from patient_title where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function GetAllmedins($var_array)

	{

		$sql = "select medicine_instruction_id,name,days from  medicine_instruction where   office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getinstructioncommon($var_array)

	{

		$sql = "select medicine_instruction_id,name,days from  medicine_instruction where category_id=? and  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getallmedicine($var_array)

	{

		$sql = "select medicine_id,name from  medicine where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function get_conf_data($var_array)
	{
		$sql = "select pat_reg_billprint,app_type,pat_mod,load_medicine from  office where  office_id= ?";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		return $res;
	}

	public function getspecilaity($var_array)

	{

		$sql = "select specilaity_id,name from  specilaity where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_usage_ex($var_array)

	{

		$sql = "select 	usage_ex_id,name from  	usage_ex where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_Typeoflenth($var_array)

	{

		$sql = "select 	typeoflength_id,name from  	typeoflength where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_coating($var_array)

	{

		$sql = "select 	coating_id,name from  	coating where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_Area($var_array)

	{

		$sql = "select 	name,pincode,area_id from  	area where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function get_diagnosis_v($var_array)

	{

		$sql = "select diagnosis_id,name from  diagnosis   where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_All_Dia_Dept($var_array)

	{

		$sql = "select a.name as dianame,b.name as deptname from diagnosis a left join department b on a.department_id=b.department_id where a.diagnosis_id=? and  a.office_id= ? and a.status=1";

		$result_row = $this->db->query($sql, $var_array);
		// echo $this->db->last_query();exit;
		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getallmedicinetemplates($var_array)

	{

		$sql = "select medicine_templates_id,name from  medicine_templates where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getallmedicineind($var_array)

	{

		$sql = "select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id=? and  medicine.office_id= ? and medicine.status=1
UNION 

SELECT 
    medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days
FROM 
  medicine_mapping_master inner join medicine_mapping_child on medicine_mapping_master.medicine_mapping_master_id=medicine_mapping_child.medicine_mapping_master_id inner join medicine on medicine.medicine_id=medicine_mapping_master.item_id
  inner join medicine_instruction on medicine_mapping_child.medicine_instruction_id=medicine_instruction.medicine_instruction_id
where medicine_id='$var_array[0]'    and medicine.status=1
		";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getalldialsismdl($var_array)

	{

		$sql = "select dialysis_id,name from dialysis where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getcity($var_array)

	{

		$sql = "select city_id,name from city where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getsource($var_array)

	{

		$sql = "select source_id,name from source where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getrefferalmaster($var_array)

	{

		$sql = "select referral_master_id,name from referral_master where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getopdinsurancecompany($var_array)

	{

		$sql = "select insurance_company_id,name from insurance_company where  office_id= ? and status=1 and charge_id in (1,2)";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getpateintcategory($var_array)

	{

		$sql = "select patient_category_id,name from  patient_category where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function Get_packagelists($var_array)
	{
		$sql = "select name,package_master_id from  package_master where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_cheif_comp($var_array)
	{
		$sql = "select name from  cheif_complaints where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_past_psy($var_array)
	{
		$sql = "select name from  past_psychiatrist_illness where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_past_med_sur($var_array)
	{
		$sql = "select name from  past_medical_surgery where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_fam_hist($var_array)
	{
		$sql = "select name from  family_history_disease where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_fam_rel($var_array)
	{
		$sql = "select name from  family_relation where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_per_hist($var_array)
	{
		$sql = "select name from  personal_history where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_infor($var_array)
	{
		$sql = "select name from  informant where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}
	public function get_advice($var_array)
	{
		$sql = "select name from  advice where  office_id= ? and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}

	public function getdoctors($var_array)

	{

		$sql = "select doctors_registration_id,name from doctors_registration where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getappointmenttypeopd($var_array)

	{

		$sql = "select appointment_type_id,name from appointment_type where  office_id= ? and status=1 and appointment_type_id in (select appointment_type_id from opdcharge)";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getpateintmrdnos($var_array)

	{

		$sql = "select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}


	public function getpateintmrdnosa($var_array)

	{

		$sql = "select CONCAT(patient_registration.fname , ' ',  patient_registration.lname) AS pateint_name,patient_registration.patient_registration_id, patient_registration.mrdno, billing_master.billing_master_id from  patient_registration left join billing_master on patient_registration.patient_registration_id=billing_master.patient_registration_id where  patient_registration.office_id= ? and patient_registration.status=1";


		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function issetcheckval($var_array)

	{

		$sql = "select count(*) as cnt from patient_registration where  office_id= ?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getpatientdetailssearch($id, $office_id)

	{

		if ($id == 1) {
			$chk = 'mrdno';
		} elseif ($id == 2) {
			$chk = 'mobileno';
		} elseif ($id == 3) {
			$chk = 'address';
		} elseif ($id == 4) {
			$chk = 'barcode';
		}

		$sql = "select CONCAT(fname , ' ',  lname ,'') AS pateint_name,patient_registration_id,$chk from  patient_registration where  office_id= $office_id and status=1";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getpatientdetailssearchdata($id, $office_id)
	{
		if ($id == 1) {
			$chk = 'mrdno';
		} elseif ($id == 2) {
			$chk = 'mobileno';
		} elseif ($id == 3) {
			$chk = 'address';
		} elseif ($id == 4) {
			$chk = 'barcode';
		}
		$sql = "select CONCAT(patient_registration.fname , ' ',  patient_registration.lname) AS pateint_name,patient_registration.patient_registration_id, patient_registration.$chk, billing_master.billing_master_id from  patient_registration join billing_master on patient_registration.patient_registration_id=billing_master.patient_registration_id where  patient_registration.office_id= $office_id and patient_registration.status=1";
		$result_row = $this->db->query($sql);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}

	public function issetcheckpateintid($var_array)

	{

		$sql = "select count(*) as cnt from patient_registration where patient_registration_id= ? and  office_id= ?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getmedcategory($var_array)

	{

		$sql = "select * from medicine_category where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function get_Denatl_department($var_array)

	{

		$sql = "select * from doctor_department where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Geteyeparticular($var_array)
	{
		$sql = "select name,eye_type,eye_details_id from eye_details where   eye_type=?  and office_id= ?  and status=1";
		$result_row = $this->db->query($sql, $var_array);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		//echo $this->db->last_query();
		return $res;
	}
	public function Geteyeparticular_com($whicheye, $office_id)
	{

		if ($whicheye == 1) {
			$sql = "select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=$whicheye and eye_particular.status=1 and eye_details.status=1";
		}
		if ($whicheye == 2) {
			$sql = "select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=$whicheye and eye_particular.status=1 and eye_details.status=1";
		}

		$result_row = $this->db->query($sql);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}

	public function Geteyeparticular_com_con($whicheye, $eyecomid, $office_id)
	{

		if ($whicheye == 1) {
			$sql = "select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id,eye_details.eye_details_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=$whicheye and eye_particular.status=1 and eye_details.status=1 and eye_complaints_id=$eyecomid";
		}
		if ($whicheye == 2) {
			$sql = "select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id,eye_details.eye_details_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=$whicheye and eye_particular.status=1 and eye_details.status=1 and eye_complaints_id=$eyecomid";
		}

		$result_row = $this->db->query($sql);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}

	public function getpatientAppoinmentdetails($var_array)

	{

		$sql = "select DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_dated,appointment_date as adate,doctors_registration.name,patient_appointment.description,cancel_flag from patient_appointment left join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id   where  patient_registration_id=? and  doctors_registration.office_id= ?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getpatientMasterdetails($var_array)

	{

		$sql = "select fname,lname,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,ageyy,address,dob from patient_registration where  patient_registration_id=? and  office_id= ?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_Pat_Source($var_array)

	{

		$sql = "select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id=? and  office_id= ? order by a.patient_appointment_id ASC limit 1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getmodeofpay($var_array)

	{

		$sql = "select modeofpay_id ,name from  modeofpay where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getinsurance_company($var_array)

	{

		$sql = "select insurance_company_id,name from insurance_company where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function getchargeslist($var_array)

	{

		$sql = "select charge_id,name from charge_type where  office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getcheckingchargeslist($idval, $office_id)

	{

		if ($idval == 1) {

			$charges = 'opdcharge';
		} elseif ($idval == 2) {

			$charges = 'ipdcharge';
		} elseif ($idval == 3) {

			$charges = 'laser';
		} elseif ($idval == 4) {

			$charges = 'injection';
		} elseif ($idval == 5) {

			$charges = 'investigation';
		}

		$sql = "select count(*) as cnt from $charges where  office_id= $office_id and status=1";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}





	public function getopdpanelmodel($idval, $office_id)

	{

		if ($idval == 1) {

			$charges = 'opdcharge';
		} elseif ($idval == 2) {

			$charges = 'ipdcharge';
		} elseif ($idval == 3) {

			$charges = 'laser';
		} elseif ($idval == 4) {

			$charges = 'injection';
		} elseif ($idval == 5) {

			$charges = 'investigation';
		}

		$sql = "select * from $charges where  office_id= $office_id and status=1";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function Get_Savedexmainationplain($exid, $idval, $partid, $office_id)

	{

		$sql = "select particular_id,doctor_id,eye,counseling_id,appointment_date from examination_treatmentplan where particular_id=$partid and  office_id= $office_id and chargetype_id=$idval and examination_id=$exid";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function Get_IPDfn($var_array)
	{

		$sql = "select * from ipdcharge where status=1 and office_id=?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function Get_orderdiagnostics($var_array)
	{

		$sql = "select * from order_diagnostics where status=1 and office_id=?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}


	public function getparticularsmodel($idval, $particular_id, $office_id)

	{

		if ($idval == 1) {

			$charges = 'opdcharge';

			$id = "opdcharge_id";
		} elseif ($idval == 2) {

			$charges = 'ipdcharge';

			$id = "ipdcharge_id";
		} elseif ($idval == 3) {

			$charges = 'laser';

			$id = "laser_id";
		} elseif ($idval == 4) {

			$charges = 'injection';

			$id = "injection_id";
		} elseif ($idval == 5) {

			$charges = 'investigation';

			$id = "investigation_id";
		}

		$sql = "select * from $charges where  $id=$particular_id  and office_id= $office_id and status=1";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}

	public function get_Each_particularsmodel($examination_id, $chargetype_id)
	{
		$sql = "select particular_id from  examination_treatmentplan where examination_id=$examination_id and chargetype_id=$chargetype_id";
		$result_row = $this->db->query($sql);
		$res = $result_row->result_array();
		$this->logger->save($this->db);
		return $res;
	}

	public function getallusercounseler($val)

	{

		$sql = "select user_id,name from  user where user_type=$val";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getdoctorval($var_array)

	{

		$sql = "select doctors_registration_id,name from doctors_registration where designation=? and   office_id= ? and status=1";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function gethistorybillingtable($patient_id, $office_id)

	{

		$pat = ' and billing_master.patient_registration_id=' . $patient_id;

		$sql = "select CONCAT(`fname`,' ', `lname`) AS pname,doctors_registration.name as docname,billing_date,DATE_FORMAT(billing_master.billing_date,'%d/%m/%Y') AS bill_date,billing_time,billing_master.invoice_number,modeofpay.name as mode,mrdno,grand_total,advanced_amount from 

			billing_master 

			left join patient_registration on billing_master.patient_registration_id=patient_registration.patient_registration_id  

			left join doctors_registration on doctors_registration.doctors_registration_id=billing_master.doctor_id 

			left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id

			where   billing_master.office_id= $office_id   $pat order by billing_date DESC ";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getpatapphistorydetails($patient_id, $office_id)

	{



		$pat = ' and patient_registration.patient_registration_id=' . $patient_id;

		$sql = "select patient_appointment_id,cancel_flag,patient_appointment.description as dess,appointment_type.name appname,print,if(emergency=0,'No','Yes') as emergency,patient_category.name as patient_catename,insurance_company.name as insurance_name,referral_master.name as referralname,occupation,source.name as sourcename,address,city.name as cityname,DATE_FORMAT(dob,'%d/%m/%Y') AS dob,CONCAT(`fname`,' ', `lname`) AS pname,gender,mrdno,ageyy,agemm,patient_registration.mobileno,doctors_registration.name as docname,appointment_date,

		DATE_FORMAT(appointment_date,'%d/%m/%Y') AS adate,appointment_time, opdcharge.amount as grand_total, patient_appointment.invoice_number,insurance_company.name as insurance,opdcharge.name as particular

		from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 

		left join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id 

		left join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id

		left join insurance_company on patient_registration.insurance_company_id=insurance_company.insurance_company_id

		left join city on patient_registration.city=city.city_id

		left join source on patient_appointment.source=source.source_id

		left join referral_master on referral_master.referral_master_id=patient_registration.referral_masters_id

		left join  patient_category on patient_appointment.patient_category_id=patient_category.patient_category_id

		left join  appointment_type on patient_appointment.apponitment_type_id=appointment_type.appointment_type_id

		where billing=0  and  patient_registration.office_id= $office_id   $pat  order by appointment_date DESC";

		$result_row = $this->db->query($sql);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
	public function removelogo($var_array, $id)
	{
		$this->db->where('attachment_users_id', $id);
		$delete = $this->db->delete('attachment_users');
		return $delete ? true : false;
	}
	public function updatedataat($data, $id)
	{
		$this->db->set($data);
		$this->db->where('examination_chargesdetails_id', $id);
		if ($this->db->update('examination_chargesdetails')) {
			// echo $this->db->last_query();exit;
			$this->logger->save($this->db);
			return TRUE;
		}
	}

	public function getallinvestigationmdl($var_array)

	{

		$sql = "select examination_chargesdetails.photo,examination_chargesdetails.examination_chargesdetails_id,examination_chargesdetails.patient_registration_id,examination_chargesdetails.created_date,count(*) as cnt,doctors_registration.name as docname,CONCAT(`fname`,' ', `lname`) AS pname,DATE_FORMAT(date(examination_chargesdetails.created_date),'%d/%m/%Y') AS invesdate from examination_chargesdetails left join patient_registration on patient_registration.patient_registration_id=examination_chargesdetails.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination_chargesdetails.doctor_id where examination_chargesdetails.entry_date=? group by examination_chargesdetails.created_date";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}



	public function getinvestdetails($var_array)

	{

		$sql = "select examination_chargesdetails.charge_id,examination_chargesdetails.particulars_id,examination_chargesdetails.patient_registration_id,examination_chargesdetails.created_date,doctors_registration.name as docname,CONCAT(`fname`,' ', `lname`) AS pname,DATE_FORMAT(date(examination_chargesdetails.created_date),'%d/%m/%Y') AS invesdate from examination_chargesdetails left join patient_registration on patient_registration.patient_registration_id=examination_chargesdetails.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination_chargesdetails.doctor_id where examination_chargesdetails.patient_registration_id = ?  and examination_chargesdetails.created_date=? and patient_registration.office_id=?";

		$result_row = $this->db->query($sql, $var_array);

		$res = $result_row->result_array();

		$this->logger->save($this->db);

		return $res;
	}
}
