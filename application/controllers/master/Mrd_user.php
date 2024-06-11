<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Mrd_user extends CI_Controller
{



	private $msg;

	private $error;

	private $error_message;

	private $randval;

	public function __construct()
	{

		parent::__construct();

		if (!isset($this->session->emr_login)) {

			redirect('login');

		}



		$this->load->model('Mrd_user_model');


	}



	public function index()
	{

		$data['title'] = 'MRD';

		$data['activecls'] = 'MRD User';


		$content = $this->load->view('master/mrd_user', $data, true);

		$this->load->view('includes/layout', ['content' => $content]);




	}



	public function getpatientdetails()
	{

		$this->form_validation->set_rules('getid', 'Patient ID', 'trim|required|min_length[1]|max_length[10000]|numeric');

		if ($this->form_validation->run() == TRUE) {

			$getid = trim(htmlentities($this->input->post('getid')));

			$var_array = array($getid, $this->session->userdata('office_id'));

			$issetcheckval = $this->Mrd_user_model->issetcheckpateintid($var_array);

			if ($issetcheckval[0]['cnt'] > 0) {

				$getmaster = $this->Mrd_user_model->getpatientMasterdetails($var_array);
				$html = ' <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'">  <div style="padding-left:20px;padding-right:10px">
				<div class="row" style="  border: 2px;
						font-size: 50px;
				text-align: center;background-color: lightblue;height:50px;border-radius: 3px;">
				   <div class="col-md-8">
					  <h3  style="margin-top:10px; font-family: Tahoma, Geneva, sans-serif;font-weight: bold;">Patient Name:  ' . $getmaster[0]['fname'] . ' ' . $getmaster[0]['lname'] . '</h3>
				   </div>
				   <div class="col-md-4">
					  <h3 style="margin-top:10px; font-family: Tahoma, Geneva, sans-serif;font-weight: bold;">MRD NO:  ' . $getmaster[0]['mrdno'] . '</h3>
				   </div>
				
				</div>
				</br>
			<div id="fileUploadForm">
				   <div >
					  <input type="file"  id="file_input" name="files[]" multiple accept=".pdf,.jpg,.png,.jpeg"/>
					  <input type="hidden" id="file_patient" name="file_patient" value="' . $getid . '">
				   </div>
				   </br>
				   <div >
				  
					  <button  name="fileSubmit" class="btn mr-1 mb-1 btn-info btn-md" type="submit" onclick="saveFile()"><i class="fas fa-plus-square"></i>Upload</button>
					  <button  name="viewFile" class="btn mr-1 mb-1 btn-info btn-md" type="submit" onclick="viewFile(this)"><i class="fas fa-plus-square"></i>View</button>
					  <button  name="delete" class="btn mr-1 mb-1 btn-info btn-md" type="submit" onclick="deleteFile(this)"><i class="fas fa-plus-square"></i>Delete</button>
				  
					  </div>
			 </div>
						 </div >	';

				echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));
			} else {

				echo json_encode(array('msg' => '', 'error' => 'No Data Found', 'error_message' => ''));

			}
		} else {

			echo json_encode(array('msg' => '', 'error' => '', 'error_message' => $this->form_validation->error_array()));

		}
	}



	function fileSubmit()
	{

		$data = array();
		$errorUploadType = $statusMsg = '';

		$patient_id = $this->input->post("file_patient");

		// If files are selected to upload 
		if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
			$filesCount = count($_FILES['files']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];

				// File upload configuration 
				$uploadPath = 'uploads/files/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
				$new_name = $patient_id . '_' . $_FILES["file"]['name'];
				$config['file_name'] = $new_name;
				// Load and initialize upload library 
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server 
				if ($this->upload->do_upload('file')) {
					// Uploaded file data 
					$fileData = $this->upload->data();

					$uploadData[$i]['file_name'] = $fileData['file_name'];
					$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					$uploadData[$i]['patient_registration_id'] = $patient_id;
				} else {
					$errorUploadType .= $_FILES['file']['name'] . ' | ';
				}
			}

			$errorUploadType = !empty($errorUploadType) ? '<br/>File Type Error: ' . trim($errorUploadType, ' | ') : '';
			if (!empty($uploadData)) {
				//Insert files data into the database 
				$insert = $this->Mrd_user_model->save_Files($uploadData);

				// Upload status message 
				$statusMsg = $insert ? 'Files uploaded successfully!' . $errorUploadType : 'Some problem occurred, please try again.';

				$html = 'uploaded SuccessFully!';

				echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

			} else {
				$statusMsg = "Sorry, there was an error uploading your file." . $errorUploadType;
				echo json_encode(array('msg' => '', 'error' => $statusMsg, 'error_message' => ''));
			}

		} else {

			echo json_encode(array('msg' => '', 'error' => 'Sorry, there was an error uploading your file', 'error_message' => ''));

		}


	}
	function viewFile()
	{

		$patient_id = $this->input->post("getid");

		$files = $this->Mrd_user_model->getFiles($patient_id);

		if ($files) {
			$filename = base_url();


			$html = '
		
	<div >
	<header style="background-color: #0a0a23;
	color: #f5f6f7;
	text-align: center;
	border-bottom: 4px solid lightblue;
	padding: 10px;
	">
  <h2 style="font-weight:bold;color:white">Uploaded Files</h2>
</header>
<style>
.brr{
	border:1px solid black;
}
</style>
		<div class="row">';


			foreach ($files as $data) {

				$ext = pathinfo($data['file_name'], PATHINFO_EXTENSION);
				if ($ext == 'pdf') {
					$html .= '
				
					<div class="col-md-4 brr"><p style="font-weight:bold;font-size:25px;color:green ;text-decoration: underline dotted purple; ">PDF :' . $data['file_name'] . '</p>
					<a href="' . $filename . 'uploads/files/' . $data['file_name'] . '" target="_blank">View File in New Tab</a>
					
					<p>Uploaded On ' . $data['uploaded_on'] . '</p></div>
					
			';
				} else {
					$html .= '
					<div class="col-md-4 brr"><p style="font-weight:bold;font-size:25px;color:green">Image : ' . $data['file_name'] . '</p>
				<img style="width:100%;" src="' . $filename . 'uploads/files/' . $data['file_name'] . '" class="img img-responsive" >
				<p>Uploaded On ' . $data['uploaded_on'] . '</p></div>
				
		';
				}
			}
			$html .= '
		</div></div>';
			echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

		} else {

			echo json_encode(array('msg' => '', 'error' => 'No Files Found', 'error_message' => 'No Files Found'));
		}
	}

	//deleteFile

	function deleteFile()
	{
		$patient_id = $this->input->post("getid");

		$files = $this->Mrd_user_model->getFiles($patient_id);

		if ($files) {
			$html = '<div class="col-sm-2 col-md-3" ><div >';

			$opd = '  <option value="">Choose File</option>';


			foreach ($files as $data) {
				$display = $data['file_name'];

				$opd .= '<option value="' . $data['file_name'] . '">' . $display . '</option>';

			}
			$html .= '
			<input type="hidden" id="file_patient_id" name="file_patient_id" value="' . $patient_id . '">
			<label for="file_delete_name">Select File to delete : <span class="text-danger">*</span></label> <select class="form-control select2" name="file_delete_name" id="file_delete_name"  onchange="getFileName(this.value)">' . $opd . '</select>';

			$html .= '
	<br/></div></div>';
			echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

		} else {

			echo json_encode(array('msg' => '', 'error' => 'No Files Found', 'error_message' => 'No Files Found'));
		}
	}


	function viewdeleteFile()
	{

		$patient_id = $this->input->post("patient_id");
		$file_name = $this->input->post("filename");
		$files = $this->Mrd_user_model->getFileName($patient_id, $file_name);

		if ($files) {
			$filename = base_url();


			$html = '
			<br/>			<div >			<br/>	
			<table>			   <tr>';


			foreach ($files as $data) {

				$ext = pathinfo($data['file_name'], PATHINFO_EXTENSION);
				if ($ext == 'pdf') {
					$html .= '
					<td>
					<p style="font-weight:bold;font-size:25px;color:green ;">PDF :' . $data['file_name'] . '</p>
					<a href="' . $filename . 'uploads/files/' . $data['file_name'] . '" target="_blank">View File in New Tab</a>
					
					<p>Uploaded On ' . $data['uploaded_on'] . '</p>
					</td>
			';
				} else {
					$html .= '
				<td>
				<img   style="border:1px solid gray" src="' . $filename . 'uploads/files/' . $data['file_name'] . '"  height="300", width="400" >
				<p style="padding-left:20px;margin-top:10px" >Uploaded On ' . $data['uploaded_on'] . '</p>
				</td>
		';
				}
			}
			$html .= '
			<td style="float:right" ><input type="hidden" id="delete_patient_id" name="delete_patient_id" value="' . $patient_id . '">
			<input type="hidden" id="delete_file_name" name="delete_file_name" value="' . $file_name . '">
			<button onclick="deletedata(this)" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>
 </td> </tr>
 </table></div>';
			echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

		} else {

			echo json_encode(array('msg' => '', 'error' => 'No Files Found', 'error_message' => 'No Files Found'));
		}
	}
	//deleteData
	function deleteData()
	{

		$patient_id = $this->input->post("patient_id");
		$file_name = $this->input->post("filename");
		$status = $this->Mrd_user_model->deleteData($patient_id, $file_name);

		if ($status) {
			@unlink('uploads/files/' . $file_name);
			$html = 'Deleted Successfully!!';
			echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

		} else {

			echo json_encode(array('msg' => '', 'error' => 'No Files Found', 'error_message' => 'No Files Found'));
		}
	}
}