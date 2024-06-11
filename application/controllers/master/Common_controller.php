<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Common_controller extends CI_Controller {

  public function __construct() {

        parent::__construct();

        if (!isset($this->session->emr_login))

         {

             redirect('login');

         }

        

        $this->load->model('Common_model');

      

    }



    public function getsearchval()

  {

    $this->form_validation->set_rules('getid', 'Patient Search Details', 'trim|required|min_length[1]|max_length[1]|numeric');

      if($this->form_validation->run() == TRUE)

      {

        $getid=trim(htmlentities($this->input->post('getid')));

        $var_array=array($this->session->userdata('office_id'));

        $issetcheckval=$this->Common_model->issetcheckval($var_array);

        if($issetcheckval[0]['cnt']>0)

        {

          $getresult=$this->Common_model->getpatientdetailssearch($getid,$this->session->userdata('office_id'));

          if($getresult)

          {

            $id=$getid;

            $selbox='<option value="">Select Details</option>';

            if($id==1){$chk='mrdno';}elseif ($id==2){$chk='mobileno';}elseif ($id==3){$chk='address';}elseif ($id==4){$chk='barcode';}

            

             foreach($getresult as $data)

             {

              $selbox.='<option value="'.$data['patient_registration_id'].'">'.$data[$chk].'  - '.$data['pateint_name'].'</option>';

             }

            echo json_encode(array('msg' =>$selbox,'error'=>'','error_message' =>''));

          }

          else

          {

              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

          }

        }

        else

        {

                echo json_encode(array('msg'=>'','error' =>'No Data Found','error_message' =>''));

        }

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }

  public function searchclient_pat()
  {
      $searchTerm = $this->input->post('searchTerm');
      $serpat_v = $this->input->post('serpat_v');
      $response = $this->Common_model->getPat($searchTerm,$serpat_v);
      echo json_encode($response);
  }

  public function getparticulars()

  {

    $this->form_validation->set_rules('getid', 'Charge Type', 'trim|required|min_length[1]|max_length[100000]|numeric');

      if($this->form_validation->run() == TRUE)

      {

        $getid=trim(htmlentities($this->input->post('getid')));

        $var_array=array($getid,$this->session->userdata('office_id'));

        $issetcheckval=$this->Common_model->getcheckingchargeslist($getid,$this->session->userdata('office_id'));

        if($issetcheckval[0]['cnt']>0)

        {

          $getresult=$this->Common_model->getopdpanelmodel($getid,$this->session->userdata('office_id'));

          if($getresult)

          {

            $idval=$getid;

            $selbox='<option value="">Select Particulars</option>';

            if($idval==1){

                $charges='opdcharge_id';

              }

              elseif($idval==2){

                $charges='ipdcharge_id';

              }

              elseif($idval==3){

                $charges='laser_id';

              }

              elseif($idval==4){

                $charges='injection_id';

              }

              elseif($idval==5){

                $charges='investigation_id';

              }

            

             foreach($getresult as $data)

             {

              $selbox.='<option value="'.$data[$charges].'">'.$data['name'].'  '.$data['amount'].'</option>';

             }

            echo json_encode(array('msg' =>$selbox,'error'=>'','error_message' =>''));

          }

          else

          {

              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

          }

        }

        else

        {

                echo json_encode(array('msg'=>'','error' =>'No Data Found','error_message' =>''));

        }

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }

  public function getparticularsnewlisting()
  {
                        

        $sugerytable='';
        $lasertable='';
        $injectiontable='';
        $getid=trim(htmlentities($this->input->post('examination_id')));

        $var_array=array($getid,$this->session->userdata('office_id'));

        $Surgery=$this->Common_model->getcheckingchargeslist(2,$this->session->userdata('office_id'));
        $Laser=$this->Common_model->getcheckingchargeslist(3,$this->session->userdata('office_id'));
        $Injection=$this->Common_model->getcheckingchargeslist(4,$this->session->userdata('office_id'));
        if($Surgery)
        {
           $sur_doctor_id='';
              $sur_appointment_date=date('Y-m-d');
              $sur_counseling_id='1';
           $idval=2;
           $getresult_Surgery=$this->Common_model->getopdpanelmodel($idval,$this->session->userdata('office_id'));
           if($getresult_Surgery)
           {
              
              $sl=1;
              $charges='ipdcharge_id';
              $chekval='sur';
             
              foreach ($getresult_Surgery as $data_Surgery) 
              {
                $checkboxsel='';
                $le='';
                $re='';
                $be='';
                if($getid)
                {
                  $getresult_Surgery_ex_Data=$this->Common_model->Get_Savedexmainationplain($getid,$idval,$data_Surgery[$charges],$this->session->userdata('office_id'));
                  if($getresult_Surgery_ex_Data)
                  {
                         $Listingid=$getresult_Surgery_ex_Data[0]['particular_id'];
                         if(trim($Listingid)==trim($data_Surgery[$charges]))
                         {
                            $checkboxsel='checked';
                            $eye_saved=$getresult_Surgery_ex_Data[0]['eye'];
                            if($eye_saved==1)
                            {
                              $le='checked';
                            }
                            if($eye_saved==2)
                            {
                              $re='checked';
                            }
                            if($eye_saved==3)
                            {
                              $be='checked';
                            }
                         }
                         
                         $sur_doctor_id=$getresult_Surgery_ex_Data[0]['doctor_id'];
                         $sur_appointment_date=$getresult_Surgery_ex_Data[0]['appointment_date'];
                         $sur_counseling_id=$getresult_Surgery_ex_Data[0]['counseling_id'];
                    
                  }
                 
                }
                
                 $sugerytable.='<tr>
                                   <td><input type="checkbox" name="'.$chekval.'_checking[]" '.$checkboxsel.' value="'.$data_Surgery[$charges].'_'.$sl.'"></td>
                                   <td>'.$data_Surgery['name'].'</td>
                                   <td>'.$data_Surgery['amount'].'</td>
                                   <td>
                                    <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'"  '.$le.'  value="1">LE
                                    <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$re.'  value="2">RE
                                    <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$be.' value="3">BE
                                  </td>
                                </tr>';
                 $sl++;
              }
           }
        }
        if($Laser)
        {
           $idval=3;
          $las_doctor_id='';
          $las_appointment_date=date('Y-m-d');
              $las_counseling_id='1';
           $getresult_Laser=$this->Common_model->getopdpanelmodel($idval,$this->session->userdata('office_id'));
           if($getresult_Laser)
           {
              
              $sl=1;
              $chekval='las';
              $charges='laser_id';
              foreach ($getresult_Laser as $data_Surgery) 
              {
                $checkboxsel='';
                $le='';
                $re='';
                $be='';
                if($getid)
                {
                  $getresult_Laser_ex_Data=$this->Common_model->Get_Savedexmainationplain($getid,$idval,$data_Surgery[$charges],$this->session->userdata('office_id'));
                  if($getresult_Laser_ex_Data)
                  {
                         $Listingid=$getresult_Laser_ex_Data[0]['particular_id'];
                         if(trim($Listingid)==trim($data_Surgery[$charges]))
                         {
                            $checkboxsel='checked';
                            $eye_saved=$getresult_Laser_ex_Data[0]['eye'];
                            if($eye_saved==1)
                            {
                              $le='checked';
                            }
                            if($eye_saved==2)
                            {
                              $re='checked';
                            }
                            if($eye_saved==3)
                            {
                              $be='checked';
                            }
                         }
                         
                         $las_doctor_id=$getresult_Laser_ex_Data[0]['doctor_id'];
                         $las_appointment_date=$getresult_Laser_ex_Data[0]['appointment_date'];
                         $las_counseling_id=$getresult_Laser_ex_Data[0]['counseling_id'];
                    
                  }
                }

                 $lasertable.='<tr>
                                <td><input type="checkbox" name="'.$chekval.'_checking[]" '.$checkboxsel.' value="'.$data_Surgery[$charges].'_'.$sl.'"></td>
                                <td>'.$data_Surgery['name'].'</td>
                                <td>'.$data_Surgery['amount'].'</td>
                                <td>
                                  <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$le.'  value="1">LE
                                  <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$re.' value="2">RE
                                  <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$be.' value="3">BE
                                </td>
                                </tr>';
                 $sl++;
              }
           }
        }
        if($Injection)
        {
          $inj_doctor_id='';
          $inj_appointment_date=date('Y-m-d');
              $inj_counseling_id='1';
           $idval=4;
           $getresult_injection=$this->Common_model->getopdpanelmodel($idval,$this->session->userdata('office_id'));
           if($getresult_injection)
           {
              
              $sl=1;
              $chekval='inj';
              $charges='injection_id';
              foreach ($getresult_injection as $data_Surgery) 
              {
                $checkboxsel='';
                $le='';
                $re='';
                $be='';
                if($getid)
                {
                  $getresult_Injection_ex_Data=$this->Common_model->Get_Savedexmainationplain($getid,$idval,$data_Surgery[$charges],$this->session->userdata('office_id'));
                  if($getresult_Injection_ex_Data)
                  {
                         $Listingid=$getresult_Injection_ex_Data[0]['particular_id'];
                         if(trim($Listingid)==trim($data_Surgery[$charges]))
                         {
                            $checkboxsel='checked';
                            $eye_saved=$getresult_Injection_ex_Data[0]['eye'];
                            if($eye_saved==1)
                            {
                              $le='checked';
                            }
                            if($eye_saved==2)
                            {
                              $re='checked';
                            }
                            if($eye_saved==3)
                            {
                              $be='checked';
                            }
                         }
                         
                         $inj_doctor_id=$getresult_Injection_ex_Data[0]['doctor_id'];
                         $inj_appointment_date=$getresult_Injection_ex_Data[0]['appointment_date'];
                         $inj_counseling_id=$getresult_Injection_ex_Data[0]['counseling_id'];
                    
                  }
                }
                
                 $injectiontable.='<tr>
                                  <td><input type="checkbox" name="'.$chekval.'_checking[]" '.$checkboxsel.' value="'.$data_Surgery[$charges].'_'.$sl.'"></td>
                                  <td>'.$data_Surgery['name'].'</td>
                                  <td>'.$data_Surgery['amount'].'</td>
                                  <td>
                                    <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$le.'  value="1">LE
                                    <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$re.' value="2">RE
                                    <input type="radio" name="'.$chekval.'_eyetreatmentplan_'.$sl.'" '.$be.' value="3">BE
                                    </td>
                                </tr>';
                 $sl++;
              }
           }
        }

       

          echo json_encode(array('msg' =>'success',
          'surgical' =>$sugerytable,
          'sur_doctor_id' =>$sur_doctor_id,
          'sur_appointment_date' =>$sur_appointment_date,
          'sur_counseling_id' =>$sur_counseling_id,
          'laser' =>$lasertable,
          'las_doctor_id' =>$las_doctor_id,
          'las_appointment_date' =>$las_appointment_date,
          'las_counseling_id' =>$las_counseling_id,
          'inj_doctor_id' =>$inj_doctor_id,
          'inj_appointment_date' =>$inj_appointment_date,
          'inj_counseling_id' =>$inj_counseling_id,
          'injection' =>$injectiontable,
          'error'=>'',
          'error_message' =>''));
        // if($issetcheckval[0]['cnt']>0)

        // {

        //   $getresult=$this->Common_model->getopdpanelmodel($getid,$this->session->userdata('office_id'));

        //   if($getresult)

        //   {

        //     $idval=$getid;

        //     $selbox='<option value="">Select Particulars</option>';

        //     if($idval==1){

        //         $charges='opdcharge_id';

        //       }

        //       elseif($idval==2){

        //         $charges='ipdcharge_id';

        //       }

        //       elseif($idval==3){

        //         $charges='laser_id';

        //       }

        //       elseif($idval==4){

        //         $charges='injection_id';

        //       }

        //       elseif($idval==5){

        //         $charges='investigation_id';

        //       }

            

        //      foreach($getresult as $data)

        //      {

        //       $selbox.='<option value="'.$data[$charges].'">'.$data['name'].'  '.$data['amount'].'</option>';

        //      }

  }




  public function getpatientdetails()

  {

      $this->form_validation->set_rules('getid', 'Patient ID', 'trim|required|min_length[1]|max_length[10000]|numeric');

      if($this->form_validation->run() == TRUE)

      {

        $getid=trim(htmlentities($this->input->post('getid')));

        $var_array=array($getid,$this->session->userdata('office_id'));

        $issetcheckval=$this->Common_model->issetcheckpateintid($var_array);

        if($issetcheckval[0]['cnt']>0)

        {

          $getresult=$this->Common_model->getpatapphistorydetails($getid,$this->session->userdata('office_id'));
         // print_R($getresult);exit;

          $getresultbil_patient=$this->Common_model->gethistorybillingtable($getid,$this->session->userdata('office_id'));

          if($getresult || $getresultbil_patient)

          {

            $sl=1;
            $socurce=$sc='';
            $getmaster=$this->Common_model->getpatientMasterdetails($var_array);
            $getmaster_so=$this->Common_model->Get_Pat_Source($var_array);
            if($getmaster_so)
            {
              $socurce=$getmaster_so[0]['source'];
              $sc=",<y style='color:blue;font-weight:bold'>Source:$socurce</y>";
            }

            $html='<div class="row">

                          <div class="col-md-6">

                              <h3 class="text-danger" style="font-weight: bold;">Patient Name:'.$getmaster[0]['fname'].' '.$getmaster[0]['lname'].' '.$sc.'</h3>

                          </div>



                          <div class="col-md-6">

                              <h3 class="text-danger" style="font-weight: bold;float: right;">MRD NO:'.$getmaster[0]['mrdno'].'</h3>

                          </div>

                      </div><div class="row accordion" id="accordion"  style="cursor: pointer;">

 <div class="collapsed" data-toggle="collapse" href="#collapseOne" style="background: #28d094;text-align: center;color: #fff;    width: 100%;">

                                                    <a class="card-title">Patient History</a>

                              </div>

                              <div class="table-responsive collapse" id="collapseOne">

                      

                              <table class="table table-border" >

                                  <tr>

                                  <tr>

                                      <th>Sl No</th>

                                      <th>Doctor Name</th>

                                      <th>Date</th>

                                      <th>No of Days</th>

                                      <th>Reason</th>

                                      <th>Bill No</th>

                                      <th>Total Amount</th>

                                  </tr>

                                  <tbody>';

             foreach($getresult as $data)

             {

               $adate=$data['appointment_date'];

               $cancel_flag=$data['cancel_flag'];

               $cdate=date('Y-m-d');

               $date1=date_create($adate);

                $date2=date_create($cdate);

                $diff=date_diff($date1,$date2);

                $no_of_days=$diff->format("%a days");

              $spanclg='';

                if($cancel_flag==1){

                   $spanclg='<span class="notification-tag badge badge-danger m-0">Cancelled</span>';

                 }


		
         $opdchargeamt=$data['particular'];      

               $html.='<tr>

                        <td>'.$sl.'</td>

                        <td class="align-middle border-top-0">'.$data['docname'].'</td>

                        <td class="align-middle border-top-0">

                            <i class="la la-calendar-check-o text-warning"></i> '.$data['adate'].' '.$spanclg.'

                        </td>

                        <td>'.$no_of_days.'</td>

                        <td class="align-middle border-top-0">

                            <i class="la la-circle text-danger"></i> '.$data['dess'].'

                        </td>

                      
						<td><c data-toggle="tooltip"  title="'.$opdchargeamt.'">'.$data['invoice_number'].'</c></td>
                        <td>'.number_format($data['grand_total'],2).'</td>

                    </tr>';

                $sl++;

             }







              foreach($getresultbil_patient as $data)

             {

               $adate=$data['billing_date'];

              // $cancel_flag=$data['cancel_flag'];

               $cdate=date('Y-m-d');

               $date1=date_create($adate);

                $date2=date_create($cdate);

                $diff=date_diff($date1,$date2);

                $no_of_days=$diff->format("%a days");

              $spanclg='';

                // if($cancel_flag==1){

                //    $spanclg='<span class="notification-tag badge badge-danger m-0">Cancelled</span>';

                //  }



               

               $html.='<tr>

                        <td>'.$sl.'</td>

                        <td class="align-middle border-top-0">'.$data['docname'].'</td>

                        <td class="align-middle border-top-0">

                            <i class="la la-calendar-check-o text-warning"></i> '.$data['bill_date'].' '.$spanclg.'

                        </td>

                        <td>'.$no_of_days.'</td>

                        <td class="align-middle border-top-0">

                            <i class="la la-circle text-danger"></i> 

                        </td>

                        <td>'.$data['invoice_number'].'</td>

                        <td>'.number_format($data['grand_total'],2).'</td>

                    </tr>';

                $sl++;

             }

             $html.='</tbody></table></div></div>';

            echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));

          }

          else

          {

              echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));

          }

        }

        else

        {

                echo json_encode(array('msg'=>'','error' =>'No Data Found','error_message' =>''));

        }

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }





  public function getallinvestigation()

  {

      $this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[10000]');

      if($this->form_validation->run() == TRUE)

      {

        $sdate=trim(htmlentities($this->input->post('sdate')));

        $var_array=array($sdate);

         

          $getresult=$this->Common_model->getallinvestigationmdl($var_array);

          if($getresult)

          {

            $sl=1;

            $html='<div class="table-responsive"><table id="tableid" class="table table-bordered table-hover"><thead><tr><th>Sl No</th><th>Patient Name</th><th>Date</th><th>Doctor Name</th><th align="center">Total Charges Count</th><th>Action</th><th>File Upload</th></tr></thead><tbody>';

            foreach($getresult as $data)

            {
              $photo=$data['photo'];
              $sales_id=$data['examination_chargesdetails_id'];
              $patient_registration_id=$data['patient_registration_id'];
              if($photo)
              {
                
                $bb=base_url();
                $att='<a class="btn btn-icon btn-info mr-1 mb-1" href="'.$bb.'images/profile/'.$photo.'" target="_blank">
                         <i class="la la-folder-open"></i>
                      </a>';
                    $tt='<button onclick="deletefile('.$sales_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';
              }
              else
              {
                $att="<button type='button'  onclick=\"uploadattachment('$patient_registration_id');\" class='btn btn-icon btn-info mr-1 mb-1'><i class='la la-file'></i></button>";
                $tt='';
              }

                $html.='<tr><td><input type="hidden" id="'.$sl.'" value="'.$data['created_date'].'">'.$sl.'</td><td>'.$data['pname'].'</td><td>'.$data['invesdate'].'</td><td>'.$data['docname'].'</td><td>'.$data['cnt'].'</td><td><button onclick="addinvest('.$sl.','.$data['patient_registration_id'].')" class="btn btn-success"><i class="la la-eye"></i></button></td><td>'.$att.''.$tt.'</td></tr>';

                $sl++;

            }

            $html.='</tbody></table></div>';

            echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));

          }

          else

          {

              echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));

          }

       

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }

 private function att_fetch_data() 
    {
    
        return array(
            'photo'=>$this->session->flashdata('profile_pic'),
            
           );
    }
     public function file_check($parameter)
   {
        
         if(isset($_FILES['photo']['name']))
         {
            $str=$_FILES['photo']['name'];
            if(isset($str) && $str!="")
            {
               return $this->upload();
            }
            else
            {
                $this->form_validation->set_message('file_check', 'Please Choose File');
                return false;
            }
         
         }  
    }
    function viewFile()
	{

		$patient_id = $this->input->post("getid");

		$files = $this->Common_model->getFiles($patient_id);

		if ($files) {
			$filename = base_url();


			$html = '
		
	<div class="container">
	
<style>
.brr{
	border:1px solid black;
}
</style>
		<div class="row">';

$deletefilebtn='';
			foreach ($files as $data) {
        $att_id=$data['attachment_users_id'];
        if($this->session->userdata('user_type')==8)
        {
          $deletefilebtn='<button type="button" class="btn btn-danger btn-sm cls" onclick="deletefile('.$att_id.')">Delete File</button>';
        }
       
				$ext = pathinfo($data['file_name'], PATHINFO_EXTENSION);
				if ($ext == 'pdf') {
					$html .= '
				
					<div class="col-md-4 brr"><p style="font-weight:bold;font-size:25px;color:green ;text-decoration: underline dotted purple; ">PDF :' . $data['file_name'] . '</p>
					<a href="' . $filename . 'uploads/files/' . $data['file_name'] . '" target="_blank">View File in New Tab</a>
					
					<p>Uploaded On ' . $data['uploaded_on'] . '</p>&nbsp; '.$deletefilebtn.'</div>
					
			';
				} else {
					$html .= '
					<div class="col-md-4 brr"><p style="font-weight:bold;font-size:25px;color:green">Image : ' . $data['file_name'] . '</p>
				<img style="width:100%;" src="' . $filename . 'uploads/files/' . $data['file_name'] . '" class="img img-responsive" >
				<p>Uploaded On ' . $data['uploaded_on'] . '</p><a href="' . $filename . 'uploads/files/' . $data['file_name'] . '" target="_blank">View File in New Tab</a>&nbsp; '.$deletefilebtn.'</div>
				
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
 public function saveatt()
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
					$uploadData[$i]['created_date'] = date("Y-m-d");
          $uploadData[$i]['login_user'] = 1;
					$uploadData[$i]['patient_registration_id'] = $patient_id;
				} else {
					$errorUploadType .= $_FILES['file']['name'] . ' | ';
				}
			}

			$errorUploadType = !empty($errorUploadType) ? '<br/>File Type Error: ' . trim($errorUploadType, ' | ') : '';
			if (!empty($uploadData)) {
				//Insert files data into the database 
				$insert = $this->Common_model->save_Files($uploadData);

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
   private function upload() 
    {
       $curd=date('ymd');
        $host_tvm = 'emr'.$curd .date('h:i:s');
        $config['upload_path']   = 'images/profile/'; 
        $config['allowed_types'] = '*'; 
       // $config['max_size']      = 2000; 
        $config['file_name']  = $host_tvm;
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('photo'))
          {
            $this->form_validation->set_message('file_check', $this->upload->display_errors());
            return false;
           }
        else 
        { 
              $this->session->set_flashdata('profile_pic',$this->upload->data('file_name'));
              return TRUE;
         }
   }
   private function removeupdate() 
    {
        return array(
            'file_name'=>'',
           );
    }

public function deletefile()
  {
    $this->form_validation->set_rules('id', 'Remove File', 'trim|required|min_length[1]|max_length[100]');
    
      if($this->form_validation->run() == TRUE)
      {
          $id=trim(htmlentities($this->input->post('id')));
          $data=$this->removeupdate();
          $getresult=$this->Common_model->removelogo($data,$id);
          if($getresult)
          {
              $this->msg='Removed File Successfully';
              $this->error='';
              $this->error_message ='';
                    echo json_encode(array(
                  'msg'           => $this->msg,
                  'error'         => $this->error,
                  'error_message' => $this->error_message
                ));
                  exit;
          }
          else
          {
              $this->msg='';
              $this->error='Failed to Remove File';
              $this->error_message ='';
                    echo json_encode(array(
                  'msg'           => $this->msg,
                  'error'         => $this->error,
                  'error_message' => $this->error_message
                ));
                  exit;
          }
        
     
      }
      else
      {
            $this->msg='';
            $this->error='';
            $this->error_message = $this->form_validation->error_array();
                echo json_encode(array(
              'msg'           => $this->msg,
              'error'         => $this->error,
              'error_message' => $this->error_message
            ));
              exit;
      }
  }
  public function addinvest()

  {

    $this->form_validation->set_rules('patid', 'Patient ID', 'trim|required|numeric');

    if($this->form_validation->run() == TRUE)

      {

        $var_array=array($this->input->post('patid'),$this->input->post('dte'),$this->session->userdata('office_id'));

        $getdata=$this->Common_model->getinvestdetails($var_array);

        if($getdata)

        {

           $html='<form id="edit_form" action="#" method="post"> 

               <div id="div_modal" class="modal fade" role="dialog">

                      <div class="modal-dialog modal-lg">

                      <!-- Modal content-->

                          <div class="modal-content">

                              <div class="modal-header">

                                  <h4 class="modal-title"></h4>

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                              </div>

                              <div class="modal-body">

                               <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 

                                  <div class="shadow-lg p-3 mb-5 bg-white rounded" style="box-shadow: 0 0px 3px 1px #5e5f67 !important;padding:8px !important;background: #f6f6f6ba !important;color: #0b0b0b !important;margin-bottom: 1rem !important;">

                               <div class="row" style="font-family: sans-serif;">

                                          <div class="col-md-4">

                                              <p>Patient Name:<t style="color:red;">'.$getdata[0]['pname'].'</t></p>

                                          </div>

                                          <div class="col-md-4">

                                              <p>Date:<t style="color:red;">'.$getdata[0]['invesdate'].'</t></p>

                                          </div>

                                          <div class="col-md-4">

                                              <p>Doctor Name:<t style="color:red;">'.$getdata[0]['docname'].'</t></p>

                                          </div>

                                 </div>

                                 

                                   <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">

                                            <span>Investigation Charges details</span>

                                          </div><table class="table table-bordered table-hover"><thead><tr><th>Sl No</th><th>Charges</th><th>Amount</th></tr><tbody>

                                  ';

                                  $sl=1;

                            foreach($getdata as $data)

                            {

                                 $getparticularname=$this->Common_model->getparticularsmodel($data['charge_id'],$data['particulars_id'],$this->session->userdata('office_id'));

                                  $html.='<tr><td>'.$sl.'</td><td>'.$getparticularname[0]['name'].'</td><td>'.$getparticularname[0]['amount'].'</td></tr>';



                               $sl++;

                            }



                        $html.='</table></div>

                              </div>

                              <div class="modal-footer">

    <button style="display:none;" id="save" class="btn btn-primary btn-sm" type="button" onclick="updatedataval();"><i class="fas fa-plus-square"></i>Update</button>

      <button type="button" id="mclose" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>

                              </div>

                          </div>

                      </div>

                  </div>

              </form>';

              echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));

          

        }

        else

        {

          echo json_encode(array('msg'=>'','error' =>'No data Found','error_message' =>''));

        }

      }

      else

      {

        echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }


  public function getsearchvaldata()
  {
    $this->form_validation->set_rules('getid', 'Patient Search Details', 'trim|required|min_length[1]|max_length[1]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $getid=trim(htmlentities($this->input->post('getid')));
        $var_array=array($this->session->userdata('office_id'));
        $issetcheckval=$this->Common_model->issetcheckval($var_array);
        if($issetcheckval[0]['cnt']>0)
        {
          $getresult=$this->Common_model->getpatientdetailssearchdata($getid,$this->session->userdata('office_id'));

          //print_r($getresult);
         // exit;
          if($getresult)
          {
            $id=$getid;
            $selbox='<option value="">Select Details</option>';
            if($id==1){$chk='mrdno';}elseif ($id==2){$chk='mobileno';}elseif ($id==3){$chk='address';}elseif ($id==4){$chk='barcode';}
            
             foreach($getresult as $data)
             {
              $selbox.='<option value="'.$data['billing_master_id'].'">'.$data[$chk].'  - '.$data['pateint_name'].'</option>';
             }
            echo json_encode(array('msg' =>$selbox,'error'=>'','error_message' =>''));
          }
          else
          {
              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
        }
        else
        {
                echo json_encode(array('msg'=>'','error' =>'No Data Found','error_message' =>''));
        }
      }
      else
      {
           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
      }
  }

   



 }