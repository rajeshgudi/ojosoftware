<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_registration extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Patients_registration_model');
        $this->load->model('Common_model');
      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Patients_registration_model->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Patient Registration';
      $data['activecls']='Patients_registration';
      $var_array=array($this->session->userdata('office_id'));
      $data['patient_titles']=$this->Common_model->getpatient_titles($var_array);
	  $data['getcomplaints']=$this->Common_model->getcomplaints($var_array);
      $data['citys']=$this->Common_model->getcity($var_array);
      $data['sources']=$this->Common_model->getsource($var_array);
	  $data['area']=$this->Common_model->Get_Area($var_array);
      $data['referral_masters']=$this->Common_model->getrefferalmaster($var_array);
      $data['opdinsurancecompany']=$this->Common_model->getopdinsurancecompany($var_array);
      $data['pateintcategory']=$this->Common_model->getpateintcategory($var_array);
      $data['doctors']=$this->Common_model->getdoctors($var_array);
      $data['appointmenttypes']=$this->Common_model->getappointmenttypeopd($var_array);
      $data['patient']=$this->Common_model->getpateintmrdnos($var_array);
      $data['conf_settings']=$this->Common_model->get_conf_data($var_array);
	
      $data['modeofpays']=$this->Common_model->getmodeofpay($var_array);
      $content=$this->load->view('master/patients_registration',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
	 public function serchphone_no(){
	   $office_id=$this->session->office_id;
	
	   if(!isset($_POST['searchTerm'])){
			   $sql = "select * from patient_registration where status=1 and office_id= '$office_id' order by patient_registration_id limit 10";
			  
			  $result_row=$this->db->query($sql); 
			  $fetchData= $result_row->result();
		   
		}else{
			$search = $_POST['searchTerm'];
			  $sql = "select * from patient_registration where status=1 and office_id= '$office_id' and (mobileno like '%".$search."%') limit 10";
			  $result_row=$this->db->query($sql); 
			  $fetchData= $result_row->result();
		}
		
		$data11 = array();
		$fetchData = json_decode( json_encode($fetchData), true);
		
		//foreach ($row as $fetchData) {
		foreach ($fetchData as $row) {
			$data11[] = array("id"=>$row['mobileno'], "text"=>$row['mobileno']);
		}
		//print_r($data11);exit;
		echo json_encode($data11);
    }
    private function fetch_data() 
    {
    	//  $this->optdb = $this->load->database('optdb', TRUE);
    	//  $this->pharmdb = $this->load->database('pharmdb', TRUE);
        $status=1;
        if(!$this->input->post('status'))
        {
            $status=0;
        }
        //  $last_code_number=$this->optdb->select('max(code) as last_code_number')
        //                  ->from('customer')
        //                  ->where(array(1=>1))
        //                  ->get()->row()->last_code_number;
        //         if($last_code_number>0)
        //         {
        //             $code=$last_code_number+1;
        //         } else {
        //             $code= $last_code_number+1;
                   
        //         }

        //          $last_code_numberr=$this->pharmdb->select('max(code) as last_code_numberr')
        //                  ->from('customer')
        //                  ->where(array(1=>1))
        //                  ->get()->row()->last_code_numberr;
        //         if($last_code_numberr>0)
        //         {
        //             $codee=$last_code_numberr+1;
        //         } else {
        //             $codee= $last_code_numberr+1;
                   
        //         }
		$codee=$code=1;
       $return=array(
               "patients_registration"=>array(
                   "title"=>$this->input->post('patient_title_id'),
                   "fname"=>$this->input->post('fname'),
                   "lname"=>$this->input->post('lname'),
                   "gender"=>$this->input->post('gender_id'),
                   "ageyy"=>$this->input->post('agey'),
				   "area_id"=>$this->input->post('area_id'),
                   'agemm'=>$this->input->post('agem'),
                   'aged'=>$this->input->post('aged'),
                   'dob'=>$this->input->post('dob'),
				   'drugalergy'=>$this->input->post('drugalergy'),
                   'city'=>$this->input->post('city_id'),
                   'mobileno'=>$this->input->post('mobileno'),
                   'doc_ref_name'=>$this->input->post('doc_ref_name'),
                   'doc_mob'=>$this->input->post('doc_mob'),
                   'address'=>$this->input->post('address'),
                   'gmail'=>$this->input->post('gmail'),
                   'whatsup'=>$this->input->post('whatsapp'),
                   'occupation'=>$this->input->post('occupation'),
                   'insurance_company_id'=>$this->input->post('insurance_company_id'),
                   'print'=>$this->input->post('print'),
                   'referral_masters_id'=>$this->input->post('referral_masters_id'),
                   'pat_type'=>$this->input->post('pat_type'),
                   'status'=>$status,
                   'image'=>$this->session->flashdata('profile_pic'),
                   'parent_id'=>$this->session->userdata('parent_id'),
                   'login_id'=>$this->session->userdata('login_id'),
                   'office_id'=> $this->session->userdata('office_id')
                  
               ),

                "opticals_details"=>array(
                   "code"=>$code,
                   "name"=>$this->input->post('fname').' '.$this->input->post('lname'),
                   "gender"=>$this->input->post('gender_id'),
                   'mobile'=>$this->input->post('mobileno'),
                   'address'=>$this->input->post('address'),
                   'status'=>$status,
                   'office_id'=> 1
               ),

                 "pharm_details"=>array(
                   "code"=>$codee,
                   "name"=>$this->input->post('fname').' '.$this->input->post('lname'),
                   "gender"=>$this->input->post('gender_id'),
                   'mobile'=>$this->input->post('mobileno'),
                   'address'=>$this->input->post('address'),
                   'status'=>$status,
                   'prestype'=>1,
                   'login_id'=>1,
                   'office_id'=> 1
               ),
             "appointment_details"=>array(
                 "appointment_date"=>date('Y-m-d',strtotime($this->input->post('appointment_date'))),
                 "appointment_time"=>($this->input->post('appointment_time'))?$this->input->post('appointment_time'):date('H:i:s'),
                 "patient_category_id"=>$this->input->post('patient_category_id'),
                 "emergency"=>$this->input->post('emergency_id'),
                 "doctor_id"=>$this->input->post('doctor_id'),
                 'modeofpay_id'=>$this->input->post('modeofpay_id'),
                 "apponitment_type_id"=>$this->input->post('appointment_type_id'),
                 "appointment_opd_charge_id"=>$this->input->post('opdcharge_id'),
                 "source"=>$this->input->post('source'),
				 "complaints_id"=>$this->input->post('complaints_id'),
                 "billing"=>$this->input->post('billing'),
				 "campconduct"=>trim($this->input->post('campconduct')),
                 "cardno"=>trim($this->input->post('cardno')),
                 "description"=>$this->input->post('description'),
                 "login_id"=>$this->session->userdata('login_id')
             ),
             "bill_number"=>array(
                   'type'=>0,
                   'office_id'=> $this->session->userdata('office_id')
                   ),
           
           );
            return $return;
    }
     public function getpatientdetails()
	{
		error_reporting(0);
		$this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$sdate=trim(htmlentities($this->input->post('sdate')));
	    	$sur_doctorid=trim(htmlentities($this->input->post('sur_doctorid')));
	    	$var_array=array($sdate,$this->session->userdata('office_id'));
	    	
	    		$getresult=$this->Patients_registration_model->getdatepatientdetails($var_array,$sur_doctorid);
	    		if($getresult)
	    		{
	    			if($this->session->userdata('user_type')==4)
	    			{
	    				$cls='class="receiptioncls"';
	    			}
	    			else
	    			{
	    				$cls='';
	    			}
                    $bigo='';
                    $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0]; 
                    if($host_tvm=='sriganapathi')
                    {
                        $bigo='<th>Go To Billing</th>';
                    }
	    			$html='<table id="tableid" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th data-toggle="tooltip"  title="Token No">Tok NO</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>MRD NO</th>
                                    <th>Age</th>
                                    <th data-toggle="tooltip"  title="Appointment Time">A.Time</th>
                                    <th data-toggle="tooltip"  title="Waiting Time">Wait.T</th>
                                     <th data-toggle="tooltip"  title="Checkout">CO</th>
									 <th data-toggle="tooltip"  title="Header Print" >H.P</th>
                                     <th data-toggle="tooltip"  title="New Print">N.P</th>
                                      <th>Action</th>
                                     <th>Status</th>
                                    '.$bigo.'
                                  </tr>
                                </thead><tbody>';
                     $sl=1;
                     $waiting_time=0;
	    			foreach($getresult as $data)
	    			{
	    				$checkTime = strtotime($data['appointment_time']);
	    				$checkTime =date('H:i:s', $checkTime);
	    				$loginTime = strtotime($data['appointment_time']);
	    				$time1 = new DateTime($data['appointment_time']);
						$time2 = new DateTime(date('H:i:s'));
						$interval = $time1->diff($time2);
						$diff= $interval->format('%s second(s)');
	    				$patient_registration_id=$data['patient_registration_id'];
                        $token_no=$data['token_no'];
	    				$opd=$data['appointment_opd_charge_id'];
	    $opdcharge=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->name;
       $amount=$grand_total=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->amount;
       $opdchargeamt=$opdcharge.'-'.$amount.',';
						$clrrow='';
						if($data['cancel_flag']==1)
						{
							$clrrow=' style="background:yellow"';
						}

	    				   $sqll2 = "select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=$patient_registration_id";
				            $result_row1=$this->db->query($sqll2); 
				            $res1= $result_row1->result_array();
				            $cnt=$res1[0]['cnt'];
				            $new='';
				            if($cnt==1)
				            {
				            	$new='<span class="badge badge-danger">New</span>';
				            	$newclr="style='font-weight:bold;color:red;'";
				            }
				            else
				            {
								$newclr="style='font-weight:bold;color:blue;'";
				            }

	    				 $sqll = "select doctors_registration.name as doctorname from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=$patient_registration_id  order by patient_appointment.patient_appointment_id DESC";
				            $result_row=$this->db->query($sqll); 
				            $res= $result_row->result_array ();
				            if($res)
				            {
				            	$doc=$res[0]['doctorname'];
				            }
				            else
				            {
				            	$doc='';
				            }
                            $patient_appointment_id=$data['patient_appointment_id'];
                            $btnval='';
                            if($data['pat_type']==2)
                            {
                            	$btnval='<span class="notification-tag badge badge-danger m-0">Telephone</span>';
                            }
                            elseif ($data['pat_type']==3) {
                            	$btnval='<span class="notification-tag badge badge-success m-0">VIP</span>';
                            }
                            elseif ($data['pat_type']==4) {
                            	$btnval='<span class="notification-tag badge badge-success m-0">Camp</span>';
                            }

                            $followup="<button type='button'  onclick=\"followupchk('$patient_registration_id');\" class='btn btn-icon btn-danger mr-1 mb-1'><i class='la la-calendar'></i></button>";

                            $whitecell="<button type='button'  onclick=\"whitecell('$patient_registration_id','$patient_appointment_id');\" class='btn btn-icon btn-success mr-1 mb-1'><i class='la la-compass'></i></button>";
                      $chkout="<button data-toggle='tooltip'  title='Check Out' type='button'  onclick=\"chkoutp('$patient_appointment_id','$patient_registration_id');\" class='btn btn-icon btn-success mr-1 mb-1'><i class='ft ft-message-square'></i></button>";

						

	    				 $edit="<button data-toggle='tooltip'  title='Edit'  type='button'  onclick=\"editdata('$patient_registration_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

	    				  $print='<button data-toggle="tooltip"  title="Print" onclick="printdata('.$patient_registration_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';

	    				   $hdprint='<button data-toggle="tooltip"  title="Header Print"  onclick="hdprintdata('.$patient_registration_id.',1)" type="button" class="btn btn-icon btn-success mr-1 mb-1"><i class="la la-print"></i></button>';
	    				   $hdprint1='<button data-toggle="tooltip"  title="New Print" onclick="hdprintdata('.$patient_registration_id.',2)" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-print"></i></button>';

	    				$cancel='<button data-toggle="tooltip"  title="Cancel"  onclick="canceldata('.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la ft-x"></i></button>';

      					 $delete='<button data-toggle="tooltip"  title="Delete"  onclick="deletedata('.$patient_registration_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';
						$stat='Nill';
                         $sqll1 = "select confirm_flag,optho_action,doc_action from examination where patient_appointment_id=$patient_appointment_id and patient_registration_id=$patient_registration_id";
				            $result_row1=$this->db->query($sqll1); 
				            $res1= $result_row1->result_array ();
				            if($res1)
				            {
				            	$confirm_flag=$res1[0]['confirm_flag'];
				            	
				            	$doc_action=$res1[0]['doc_action'];
				            	if($confirm_flag==0)
				            	{
				            		$optho_action=$res1[0]['optho_action'];
				            		if($optho_action==0)
				            		{
				            			$stat='<p style="color:red;">Optometrists Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:green;">Optometrists Completed</p>';
				            		}
				            	}

				            	if($confirm_flag==1)
				            	{
				            		$doc_action=$res1[0]['doc_action'];
				            		if($doc_action==0)
				            		{
				            			$stat='<p style="color:red;">Consultant Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:green;">Consultant Completed</p>';
				            		}
				            	}
				            }

			$idcard='<button data-toggle="tooltip"  title="ID Card" onclick="patgetprint('.$patient_registration_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-cc-diners-club"></i></button>';
                    $bilgo='';
                    if($host_tvm=='sriganapathi')
                    {
                        $bilgo='<td ><button onclick="directbilling('.$patient_registration_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="ft-arrow-right"></i></button></td>';
                    }
					$nedcodcomtime=date('Y-m-d H:i:s');
					$getresult_doctcom=$this->Patients_registration_model->getlastcompdatetime($patient_registration_id,$patient_appointment_id);
                    if($getresult_doctcom)
                    {
                        if($getresult_doctcom[0]['doctor_completed_datetime'])
                        {
							$nedcodcomtime=$getresult_doctcom[0]['doctor_completed_datetime'];
                        }
                    }
                    
							 
                        $billing_time=$data['adate'].' '.$checkTime;
                        $waiting_time= $this->find_date_diff($billing_time,$nedcodcomtime) ;
	    				$html.='<tr '.$clrrow.'>
	    							<!-- <td>'.$sl.'</td> -->
                                    <td>'.$token_no.'</td>
	    							<td><c data-toggle="tooltip"  title="'.$opdchargeamt.'">'.$data['pateint_name'].' '.$new.'  '.$btnval.'</c></td>
	    							<td>'.$doc.'</td>
	    							<td><p '.$newclr.'>'.$data['mrdno'].'</p></td>
	    							<td>'.$data['ageyy'].'</td>
	    							<td>'.$data['appointment_time'].'</td>
	    							<td>'.$waiting_time.'</td>
	    							<td>'.$chkout.' </td>
	    							<!--<td>'.$followup.'</td>-->
									<td>'.$hdprint.'</td>
	    							<td>'.$hdprint1.'</td>
	    							<td style="display: inline-flex;">'.$edit.'<c '.$cls.'></c>'.$cancel.' '.$print.' '.$idcard.' '.$delete.'</td>
	    							<td>'.$stat.'</td>
                                    '.$bilgo.'
	    						</tr>';
	    				$sl++;
	    			}
	    			$html.='</tbody></table>';

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

	public function getcamplist()
	{
		$this->form_validation->set_rules('sdate1', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$sdate1=trim(htmlentities($this->input->post('sdate1')));
			$sdate2=trim(htmlentities($this->input->post('sdate2')));
	    	$var_array=array($sdate1,$sdate2);
	    	
	    		$getresult=$this->Patients_registration_model->getcampspatt($var_array);
	    		if($getresult)
	    		{
	    			
	    			$html='<table id="tablecamp" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
									<th>Description</th>
                                    <th>Date</th>
									<th>Card No</th>
									<th>Card Issued</th>
									<th>Card Usage Count</th>
									<th>Action</th>
                                  </tr>
                                </thead><tbody>';
                     $sl=1;
	    			foreach($getresult as $data)
	    			{
						if($data['issue_card']==1)
						{
							$issue_card='Yes';
						}
						
						else 
						{
							$issue_card='No';
						}

						if($data['gender']==1)
						{
							$ge='Male';
						}
						elseif ($data['gender']==2) 
						{
							$ge='Female';
						}
						else 
						{
							$ge='Transgender';
						}
						if($data['card'])
						{
							$getcheckresult=$this->Patients_registration_model->getcountchecking($data['card']);
							$cardcount=$getcheckresult[0]['cnt'];
						}
						else {
							$cardcount=0;
						}
						
						$camp_deh_id=$data['camp_deh_id'];
	$whitecell="<button type='button'  onclick=\"clickcamps('$camp_deh_id');\" class='btn btn-icon btn-success mr-1 mb-1'><i class='la la-compass'></i></button>";
	    				
	    				$html.='<tr>
	    							<td>'.$sl.'</td>
	    							<td>'.$data['namecamp'].'</td>
	    							<td>'.$data['email'].'</td>
	    							<td>'.$data['mobileno'].'</td>
	    							<td>'.$ge.'</td>
									<td>'.$data['desccamp'].'</td>
	    							<td>'.$data['datev'].'</td>
									<td>'.$data['card'].'</td>
									<td>'.$issue_card.'</td>
									<td>'.$cardcount.'</td>
									<td>'.$whitecell.'</td>
	    						</tr>';
	    				$sl++;
	    			}
	    			$html.='</tbody></table>';

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
	 public function getpatientdetailsall()
	{
		$this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$sdate=trim(htmlentities($this->input->post('sdate')));
	    	$var_array=array($sdate,$this->session->userdata('office_id'));
			$doctor_id_new=trim(htmlentities($this->input->post('doctor_id_new')));
	    	
	    		$getresult=$this->Patients_registration_model->getdatepatientdetails($var_array,$doctor_id_new);
	    		if($getresult)
	    		{
	    			if($this->session->userdata('user_type')==4)
	    			{
	    				$cls='class="receiptioncls"';
	    			}
	    			else
	    			{
	    				$cls='';
	    			}
	    			$html='<table id="tableidall" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>MRD NO</th>
                                    <th>Date Of Birth</th>
                                    <th>Mobile No</th>
                                    <th>A.Time</th>
                                    <th>Waiting time</th>
                                    <th>Status</th>
                                  </tr>
                                </thead><tbody>';
                     $sl=1;
                     $waiting_time=0;
	    			foreach($getresult as $data)
	    			{
	    				$checkTime = strtotime($data['appointment_time']);
	    				$checkTime =date('H:i:s', $checkTime);
	    				$loginTime = strtotime($data['appointment_time']);
	    				$time1 = new DateTime($data['appointment_time']);
						$time2 = new DateTime(date('H:i:s'));
						$interval = $time1->diff($time2);
						$diff= $interval->format('%s second(s)');
	    				$patient_registration_id=$data['patient_registration_id'];

	    				   $sqll2 = "select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=$patient_registration_id";
				            $result_row1=$this->db->query($sqll2); 
				            $res1= $result_row1->result_array();
				            $cnt=$res1[0]['cnt'];
				            $new='';
				            if($cnt==1)
				            {
				            	$new='<span class="badge badge-danger">New</span>';
				            	$newclr="style='font-weight:bold;color:red;'";
				            }
				            else
				            {
								$newclr="style='font-weight:bold;color:blue;'";
				            }

	    				 $sqll = "select doctors_registration.name as doctorname from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=$patient_registration_id  order by patient_appointment.patient_appointment_id DESC";
				            $result_row=$this->db->query($sqll); 
				            $res= $result_row->result_array ();
				            if($res)
				            {
				            	$doc=$res[0]['doctorname'];
				            }
				            else
				            {
				            	$doc='';
				            }
                            $patient_appointment_id=$data['patient_appointment_id'];
                            $btnval='';
                            if($data['pat_type']==2)
                            {
                            	$btnval='<span class="notification-tag badge badge-danger m-0">Telephone</span>';
                            }
                            elseif ($data['pat_type']==3) {
                            	$btnval='<span class="notification-tag badge badge-success m-0">VIP</span>';
                            }

                            $followup="<button type='button'  onclick=\"followupchk('$patient_registration_id');\" class='btn btn-icon btn-danger mr-1 mb-1'><i class='la la-calendar'></i></button>";

                            $whitecell="<button type='button'  onclick=\"whitecell('$patient_registration_id','$patient_appointment_id');\" class='btn btn-icon btn-success mr-1 mb-1'><i class='la la-compass'></i></button>";


	    				 $edit="<button type='button'  onclick=\"editdata('$patient_registration_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

	    				  $print='<button onclick="printdata('.$patient_registration_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';

	    				   $hdprint='<button onclick="hdprintdata('.$patient_registration_id.',1)" type="button" class="btn btn-icon btn-success mr-1 mb-1"><i class="la la-print"></i></button>';
	    				   $hdprint1='<button onclick="hdprintdata('.$patient_registration_id.',2)" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-print"></i></button>';

	    				$cancel='<button onclick="canceldata('.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la ft-x"></i></button>';

      					 $delete='<button onclick="deletedata('.$patient_registration_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';
						$stat='Nill';
                         $sqll1 = "select confirm_flag,optho_action,doc_action from examination where patient_appointment_id=$patient_appointment_id and patient_registration_id=$patient_registration_id";
				            $result_row1=$this->db->query($sqll1); 
				            $res1= $result_row1->result_array ();
				            if($res1)
				            {
				            	$confirm_flag=$res1[0]['confirm_flag'];
				            	
				            	$doc_action=$res1[0]['doc_action'];
				            	if($confirm_flag==0)
				            	{
				            		$optho_action=$res1[0]['optho_action'];
				            		if($optho_action==0)
				            		{
				            			$stat='<p style="color:red;">Optometrists Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:green;">Optometrists Completed</p>';
				            		}
				            	}

				            	if($confirm_flag==1)
				            	{
				            		$doc_action=$res1[0]['doc_action'];
				            		if($doc_action==0)
				            		{
				            			$stat='<p style="color:red;">Consultant Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:green;">Consultant Completed</p>';
				            		}
				            	}
				            }
				           
                        $billing_time=$data['adate'].' '.$checkTime;
                        $waiting_time= $this->find_date_diff($billing_time,date('Y-m-d H:i:s')) ;
	    				$html.='<tr>
	    							<td>'.$sl.'</td>
	    						
                                    <td><a  onclick="printdataexamination('.$patient_registration_id.','.$patient_appointment_id.')">'.$data['pateint_name'].' </a> '.$new.' '.$btnval.'</td>
	    							<td>'.$doc.'</td>
	    							<td><p '.$newclr.'>'.$data['mrdno'].'</p></td>
	    							<td>'.$data['dateofbirth'].'</td>
	    							<td>'.$data['mobileno'].'</td>
	    						
	    							
	    							<td>'.$data['appointment_time'].'</td>
	    							<td>'.$waiting_time.'</td>
	    							
	    						
	    							<td>'.$stat.'</td>
	    						</tr>';
	    				$sl++;
	    			}
	    			$html.='</tbody></table>';

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


	public function getpatientdetailsfol()
	{
		$this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$sdate=trim(htmlentities($this->input->post('sdate')));
	    	$var_array=array($sdate,$this->session->userdata('office_id'));
	    	
	    		$getresult=$this->Patients_registration_model->getdatepatientdetailsfol($var_array);
	    		if($getresult)
	    		{

	    			$html='<table id="tablefolid" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>MRD NO</th>
                                    <th>Mobile No</th>
                                    <th>Follow Up Date</th>
                                    <th>Description</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead><tbody>';
                     $sl=1;
                     $waiting_time=0;
	    			foreach($getresult as $data)
	    			{
	    				$patient_followup_id=$data['patient_followup_id'];
	    				 $delete='<button onclick="foldeletedata('.$patient_followup_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';
	    				
	    				$html.='<tr>
	    							<td>'.$sl.'</td>
	    							<td>'.$data['pateint_name'].'</td>
	    							<td>'.$data['mrdno'].'</td>
	    							<td>'.$data['mobileno'].'</td>
	    							<td>'.$data['patient_followup_date'].'</td>
	    							<td>'.$data['description'].'</td>
	    							<td>'.$delete.'</td>
	    						</tr>';
	    				$sl++;
	    			}
	    			$html.='</tbody></table>';

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


	public function getpatientdetails1()
	{
		$this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$sdate=trim(htmlentities($this->input->post('sdate')));
	    	$var_array=array($sdate,$this->session->userdata('office_id'));
	    	
	    		$getresult=$this->Patients_registration_model->getdatepatientdetailss($var_array);
	    		if($getresult)
	    		{
	    			$html='<table id="tableid" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Token No</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>MRD NO</th>
                                    <th>Age</th>
                                    <th>Mobile No</th>
                                    <th style="display:none;">Appointment Date</th>
                                    <th>App Time</th>
                                    <th>Waiting time</th>
									<th>Complaints</th>
									<th>Rooming</th>
                                     <th style="display:none;">Print</th>
                                     <th style="display:none;">Examination</th>
                                   
                                  </tr>
                                </thead><tbody>';
                     $sl=1;
                     $waiting_time=0;
	    			foreach($getresult as $data)
	    			{
						$des_sec_con='';
						$description=$data['description'];
						if($description)
						{
							$des_sec_con='<marquee onmouseover="this.stop();" onmouseout="this.start();"><p style="color:#c2185b;font-weight: bold;">'.$description.'</p></marquee>';
						}
						$rooming=$data['rooming'];
						if($data['compname'])
						{
							$cmmm=$data['compname'];
						}
						else {
							$cmmm='';
						}
	    				$checkTime = strtotime($data['appointment_time']);
	    				$checkTime =date('H:i:s', $checkTime);
	    				$loginTime = strtotime($data['appointment_time']);
	    				$time1 = new DateTime($data['appointment_time']);
						$time2 = new DateTime(date('H:i:s'));
						$interval = $time1->diff($time2);
						$diff= $interval->format('%s second(s)');
	    				$patient_registration_id=$data['patient_registration_id'];
						$patient_appointment_id=$data['patient_appointment_id'];
						$token_no=$data['token_no'];
	    				 $sqll2 = "select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=$patient_registration_id";
				            $result_row1=$this->db->query($sqll2); 
				            $res1= $result_row1->result_array();
				            $cnt=$res1[0]['cnt'];
				            $new='';
				            if($cnt==1)
				            {
				            	$new='<span class="badge badge-danger">New</span>';
				            }
$doctor_department_id='';
	    				 $sqll = "select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=$patient_registration_id  order by patient_appointment.patient_appointment_id DESC";
				            $result_row=$this->db->query($sqll); 
				            $res= $result_row->result_array ();
				            if($res)
				            {
				            	$doc=$res[0]['doctorname'];
                                $doctor_department_id=$res[0]['doctor_department_id'];
				            }
				            else
				            {
				            	$doc='';
				            }
                            
	    				 $edit="<button type='button'  onclick=\"editdata('$patient_registration_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";
if($rooming==0)
{
	$rooming="<button type='button'  onclick=\"rooming('$patient_appointment_id');\" class='btn btn-icon btn-info mr-1 mb-1'><i class='ft-plus-circle'></i></button>";
}
else {
	$rooming="<button type='button' class='btn btn-icon btn-success mr-1 mb-1'><i class='la la-check-circle'></i></button>";
}
			


	    				  $print='<button onclick="printdata('.$patient_registration_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';

	    				   $hdprint='<button onclick="printdataexamination('.$patient_registration_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-success mr-1 mb-1"><i class="ft-arrow-right"></i></button>';

      					 $delete='<button onclick="deletedata('.$patient_registration_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';
                        $billing_time=$data['adate'].' '.$checkTime;
                        $waiting_time= $this->find_date_diff($billing_time,date('Y-m-d H:i:s')) ;

						$socurce=$sc='';
						$var_array=array($patient_registration_id,$this->session->userdata('office_id'));
						$getmaster_so=$this->Common_model->Get_Pat_Source($var_array);
						if($getmaster_so)
						{
						  $socurce=$getmaster_so[0]['source'];
						  $sc="<br/><y style='color:green;font-weight:bold'>Source:$socurce</y>";
						}
if($doctor_department_id==1)
{
	    				$html.='<tr>
	    							<td>'.$token_no.'</td>
	    							<td><a  onclick="printdataexamination('.$patient_registration_id.','.$patient_appointment_id.')">'.$data['pateint_name'].' '.$sc.'</a> '.$new.' '.$des_sec_con.'</td>
	    							<td>'.$doc.'</td>
	    							<td>'.$data['mrdno'].'</td>
	    							<td>'.$data['ageyy'].'</td>
	    							<td>'.$data['mobileno'].'</td>
	    						
	    							<td style="display:none;">'.$data['appointment_date'].'</td>
	    							<td>'.$data['appointment_time'].'</td>
	    							<td>'.$waiting_time.'</td>
	    							<td>'.$cmmm.'</td>
									<td>'.$rooming.'</td>
	    							<td style="display:none;">'.$print.'</td>
	    							 <td align="center" style="display:none;">'.$hdprint.'</td>
	    						</tr>';
	    				$sl++;
                    }
	    			}
	    			$html.='</tbody></table>';

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

	public function followuunew()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$getdata=$this->Common_model->getpatientMasterdetails($var_array);
	    	if($getdata)
	    	{
	    		$html='';
	    		foreach($getdata as $data)
	    		{
	    			$patid=$this->input->post('getid');
	    			
	    			$html='<form id="followupd_form" action="#" method="post"> 
							 <div id="div_modalf" class="modal fade" role="dialog">
							        <div class="modal-dialog modal-sm">
							        <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"></h4>
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                </div>
							                <div class="modal-body">
							                    <div class="row">
							                        <div class="col-lg-12 col-md-12" >
							                          <input type="hidden" name="patfolid" id="patfolid" value="'.$patid.'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Patient Name: <span class="text-danger">*</span></label>
							                                         <input readonly type="text" class="form-control" value="'.$data['pname'].'">
							                                    </div>
							                                </div>

							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Follow Up Date: <span class="text-danger">*</span></label>
							                                         <input  type="date" name="padate" id="padate" class="form-control fol_date" >
							                                    </div>
							                                </div>
							                                 
							                                
							                                  <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Description: </label>
							                                         <textarea class="form-control" name="foldescription" id="foldescription"></textarea>
							                                    </div>
							                                </div>
							                                
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		    <button id="save" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" type="button" onclick="savefollowupnn()"><i class="fas fa-plus-square"></i>Save</button>
			<button type="button" id="mclose" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal">Close</button>
							                </div>
							            </div>
							        </div>
							    </div>
							</form>';
							echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function clickkcamps()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'));
	    	$getdata=$this->Patients_registration_model->getcamps($var_array);
	    	if($getdata)
	    	{
	    		$html='';
	    		foreach($getdata as $data)
	    		{
	    			$patid=$this->input->post('getid');
	    			
	    			$html='<form id="camp_form" action="#" method="post"> 
							 <div id="camdiv" class="modal fade" role="dialog">
							        <div class="modal-dialog modal-sm">
							        <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"></h4>
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                </div>
							                <div class="modal-body">
							                    <div class="row">
							                        <div class="col-lg-12 col-md-12" >
							                          <input type="hidden" name="campid" id="campid" value="'.$patid.'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Card No: <span class="text-danger">*</span></label>
							                                         <input  type="text" class="form-control" value="'.$data['card'].'" id="card" name="card">
							                                    </div>
							                                </div>

							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname"> Issue Card: <span class="text-danger">*</span></label>
							                                         <select class="form-control" name="issue_card" id="issue_card">
																	 	<option value="1">Yes</option>
																		 <option value="2">No</option>
																	 </select>
							                                    </div>
							                                </div>
							                                 
							                                
							                                  
							                                
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		    <button id="save" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" type="button" onclick="savecamps()"><i class="fas fa-plus-square"></i>Save</button>
			<button type="button" id="mclose" class="btn btn-info btn-min-width btn-glow mr-1 mb-1 gguuu" data-dismiss="modal">Close</button>
							                </div>
							            </div>
							        </div>
							    </div>
							</form>';
							echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}



public function whitecellfn()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$getdata=$this->Common_model->getpatientMasterdetails($var_array);
	    	if($getdata)
	    	{
	    		$html='';
	    		foreach($getdata as $data)
	    		{
	    			$patid=$this->input->post('getid');
	    			$patapt=$this->input->post('patapt');
	    			
	    			$html='<form id="whitecell_form" action="#" method="post"> 
							 <div id="div_modalf" class="modal fade" role="dialog">
							        <div class="modal-dialog modal-sm">
							        <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"></h4>
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                </div>
							                <div class="modal-body">
							                    <div class="row">
							                        <div class="col-lg-12 col-md-12" >
							                          <input type="hidden" name="patreg" id="patreg" value="'.$patid.'">
							                          <input type="hidden" name="patapt" id="patapt" value="'.$patapt.'">
							                           <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
							                                 
							                                 <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Patient Name: <span class="text-danger">*</span></label>
							                                         <input readonly type="text" class="form-control" value="'.$data['pname'].'">
							                                    </div>
							                                </div>

							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">BP: <span class="text-danger">*</span></label>
							                                         <input  type="text" name="bp" id="bp" class="form-control" >
							                                    </div>
							                                </div>

							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Sugar: <span class="text-danger">*</span></label>
							                                         <input  type="text" name="sugar" id="sugar" class="form-control" >
							                                    </div>
							                                </div>

							                                <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">Temprature: <span class="text-danger">*</span></label>
							                                         <input  type="text" name="temprature" id="temprature" class="form-control" >
							                                    </div>
							                                </div>
							                                 
							                                 
							                                
							                                  <div class="row col-md-12">
							                                    <div class="col-md-12 form-group">
							                                         <label for="lastname">Description: </label>
							                                         <textarea class="form-control" name="whitedescription" id="whitedescription"></textarea>
							                                    </div>
							                                </div>
							                                
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		    <button id="save" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" type="button" onclick="savewhitecell()"><i class="fas fa-plus-square"></i>Save</button>
			<button type="button" id="mclose" class="btn btn-info btn-min-width btn-glow mr-1 mb-1" data-dismiss="modal">Close</button>
							                </div>
							            </div>
							        </div>
							    </div>
							</form>';
							echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}


	 public function find_date_diff($fromdate,$todate) 
     {
        $date1=strtotime($fromdate);
        $date2=strtotime($todate);
        // Formulate the Difference between two dates
        $diff = abs($date1 - $date2); 

        $years = floor($diff / (365*60*60*24)); 


        $months = floor(($diff - $years * 365*60*60*24)
                                       / (30*60*60*24)); 

        $days = floor(($diff - $years * 365*60*60*24 - 
                     $months*30*60*60*24)/ (60*60*24));

        $hours = floor(($diff - $years * 365*60*60*24 
               - $months*30*60*60*24 - $days*60*60*24)
                                           / (60*60)); 


        $minutes = floor(($diff - $years * 365*60*60*24 
                 - $months*30*60*60*24 - $days*60*60*24 
                                  - $hours*60*60)/ 60); 

        $seconds = floor(($diff - $years * 365*60*60*24 
                 - $months*30*60*60*24 - $days*60*60*24
                        - $hours*60*60 - $minutes*60)); 
        $return="";
        if($years>0)
        {
           $return.="$years Year,";
        }
        if($months>0)
        {
          $return.="$months Month,"; 
        }
        if($days>0)
        {
          $return.="$days Days,";   
        }
        $hours=$hours;
        $minutes=$minutes;
         $return.="$hours:$minutes";
         return $return;
      
    }
    public function getgender()
	{
		$this->form_validation->set_rules('getid', 'Patient Title', 'trim|required|min_length[1]|max_length[6]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$getid=trim(htmlentities($this->input->post('getid')));
	    	$var_array=array($getid,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Patients_registration_model->checkval($var_array);
	    	if($chk_duplication[0]['cnt']>0)
	    	{
	    		$getresult=$this->Patients_registration_model->getgender($var_array);
	    		if($getresult)
	    		{
			      echo json_encode(array('msg' =>$getresult,'error'=>'','error_message' =>''));
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
	public function getappointmentopd()
	{
		$this->form_validation->set_rules('getid', 'Appointment Type', 'trim|required|min_length[1]|max_length[6]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$getid=trim(htmlentities($this->input->post('getid')));
	    	$sel=trim(htmlentities($this->input->post('sel')));
	    	if($sel==0)
	    	{
	    		$chkv='';
	    	}
	    	else
	    	{
	    		$chkv='1';
	    	}
	    	$var_array=array($getid,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Patients_registration_model->checkappointmentval($var_array);
	    	if($chk_duplication[0]['cnt']>0)
	    	{
	    		$getresult=$this->Patients_registration_model->getappointment($var_array);
	    		if($getresult)
	    		{
	    			$html='';
	    			$opd='';
	    			foreach($getresult as $data)
	    			{
	    				$opd.='<option value="'.$data['opdcharge_id'].'">'.$data['name'].' / '.$data['amount'].'</option>';
	    			}
	    			$html='<div id="div_modal'.$chkv.'" class="modal fade" role="dialog" style="margin-top: 10%;">
							        <div class="modal-dialog modal-sm">
							        <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"></h4>
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                </div>
							                <div class="modal-body">
							                    <div class="row">
							                        <div class="col-lg-12 col-md-12" >
							                               <div class="row col-md-12">
							                                   <div class="col-md-12 form-group">
							                                         <label for="lastname">OPD Charge: <span class="text-danger">*</span></label>
							                                        <select class="form-control select2" name="opdcharge_id" id="opdcharge_id">'.$opd.'</select>
							                                    </div>
							                                </div>
							                        </div>
							                    </div>
							                </div>
							                <div class="modal-footer">
		<button id="save" class="btn btn-primary btn-sm" type="button"   data-dismiss="modal"><i class="fas fa-plus-square"></i>Submit</button>
	    <button type="button" id="mclose" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
							                </div>
							            </div>
							        </div>
							    </div>
							</form>';
			      echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));
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
	 public function appointmentopdvalidity(){
            $patient_registration_id=$_REQUEST['patient_registration_id'];
            $getresult=$this->Patients_registration_model->appointmentopdvalidity($patient_registration_id);
           echo json_encode($getresult);
        }
	public function smsgateway($fname,$lname,$mobileno,$temp_id,$msg)
	{
$apikey='';
		//$url='http://sms.expressad.in/api/smsapi?key=ee5b20348143542fb4a91296ba748d50&route=1&sender=DEYEHP&number='.$mobileno.'&sms='.$msg.'&templateid='.$temp_id.'';
		$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
		     
		if($host_tvm=='nobelemr' || $host_tvm=='queens' || $host_tvm=='emr')
		{
			$apikey='5PyxIMl9PLRJ4NQtkxm3StDOQGArJ7X36pb46ele';
			$senderid='ADEXPR';
		}
		if($host_tvm=='deh'  )
		{
			$apikey='BJpscIwYy17oWb0xZT4jcl2PZb3YoB7Z2ITdb3EZ';
			$senderid='DEYEHP';
		}
		if($apikey)
		{
			$mobileno = str_replace('-', '', $mobileno);
			$url='https://fastsms.expressad.in/api/v1/send-sms?api-key='.$apikey.'&sender-id='.$senderid.'&sms-type=1&mobile='.$mobileno.'&te_id='.$temp_id.'&message='.$msg.'';
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL =>$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			if ($err) {
			//echo "cURL Error #:" . $err;
			} else {
			//echo $response;
			}
	    }
		//exit;
	}
	public function smsgateway_tha($fname,$lname,$mobileno,$temp_id,$msg)
	{
$apikey='';
		//$url='http://sms.expressad.in/api/smsapi?key=ee5b20348143542fb4a91296ba748d50&route=1&sender=DEYEHP&number='.$mobileno.'&sms='.$msg.'&templateid='.$temp_id.'';
		$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
		     
		if($host_tvm=='nobelemr')
		{
			$apikey='5PyxIMl9PLRJ4NQtkxm3StDOQGArJ7X36pb46ele';
			$senderid='ADEXPR';
		}
		if($host_tvm=='deh'  || $host_tvm=='queens')
		{
			$apikey='BJpscIwYy17oWb0xZT4jcl2PZb3YoB7Z2ITdb3EZ';
			$senderid='DEYEHP';
		}
		if($apikey)
		{
			$mobileno = str_replace('-', '', $mobileno);
			$url='https://fastsms.expressad.in/api/v1/send-sms?api-key='.$apikey.'&sender-id='.$senderid.'&sms-type=1&mobile='.$mobileno.'&te_id='.$temp_id.'&message='.$msg.'';
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL =>$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			if ($err) {
			//echo "cURL Error #:" . $err;
			} else {
			//echo $response;
			}
	    }
		//exit;
	}
    public function savedata()
	{
		$var_array_o=array($this->session->userdata('office_id'));
		$conf_settings=$this->Common_model->get_conf_data($var_array_o);
		$this->form_validation->set_rules('patient_title_id', 'Title', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[1]|max_length[40]');
		//$this->form_validation->set_rules('drugalergy', 'Drug Alergy', 'trim|required');
		//$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[1]|max_length[40]');
		if($this->input->post('pat_type')==1)
		{
		$this->form_validation->set_rules('gender_id', 'Gender', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('agey', 'Age Year', 'trim|required|min_length[1]|max_length[4]|numeric');
		//$this->form_validation->set_rules('agem', 'Age Month', 'trim|required|min_length[1]|max_length[2]|numeric');
		$this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
		//$this->form_validation->set_rules('city_id', 'City', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('source', 'Source', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('mobileno', 'Mobile No', 'trim|required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('address', 'Address', 'trim|min_length[1]|max_length[100]');
		//$this->form_validation->set_rules('occupation', 'Occupation', 'trim|min_length[1]|max_length[50]');
		//$this->form_validation->set_rules('referral_masters_id', 'Referral name', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('insurance_company_id', 'OPD Insurance Name', 'trim|required|min_length[1]|max_length[10]|numeric');
	//	$this->form_validation->set_rules('patient_category_id', 'Patient Category', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('emergency_id', 'Emergency', 'trim|required|min_length[1]|max_length[2]|numeric');
		$this->form_validation->set_rules('doctor_id', 'Select Doctor', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('print', 'Print', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('appointment_type_id', 'Appointment Type', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('modeofpay_id', 'Modeofpay', 'trim|required|min_length[1]|max_length[10]|numeric');
   	   }
		if($conf_settings[0]['pat_mod']==1)
		{
			 $this->form_validation->set_rules('modeofpay_id', 'Modeofpay', 'trim|required|min_length[1]|max_length[10]|numeric');
		}
		 
		//$this->form_validation->set_rules('opdcharge_id', 'OPD Charge', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('logo','Patient Image','callback_file_check');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$mobileno=trim(htmlentities($this->input->post('mobileno')));
	    	$doctor_id=trim(htmlentities($this->input->post('doctor_id')));
	    	$var_array=array($mobileno,$this->session->userdata('office_id'));
	    	// $chk_duplication=$this->Patients_registration_model->checkduplicationpatient($var_array);
	    	// if($chk_duplication[0]['cnt']==0)
	    	// {
				$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
				if($host_tvm=='deh')
				{
					$cardno=trim(htmlentities($this->input->post('cardno')));
					//$this->cardchecking($cardno)
					if($cardno)
					{
						$cardavailable=0;
						$chkidentfycard=$this->Patients_registration_model->checkingcamplist($cardno);
						if($chkidentfycard)
						{
							$cardavailable=$chkidentfycard[0]['cnt'];
						}
						if($cardavailable==0)
						{
							echo json_encode(array('msg'=>'','error' =>'This card not available in camp list tab .please check','error_message' =>''));exit;
						}
						if($cardavailable>0)
						{
							$cntcardno12=0;
							$getcheckresultcntt=$this->Patients_registration_model->getcountchecking($cardno);
							//print_r($getcheckresultcntt);exit;
							if($getcheckresultcntt)
							{
								$cntcardno12=$getcheckresultcntt[0]['cnt'];
							}
							if($cntcardno12>12)
							{
								echo json_encode(array('msg'=>'','error' =>'This card usage count is over','error_message' =>''));exit;
							}
							

						}
						
					}
				}
	    		
	    		$data=$this->fetch_data();
	    		$getresult=$this->Patients_registration_model->savedata($data);
	    		if($getresult)
	    		{
	    			$patient_registration_id=$this->db->select('max(patient_registration_id) as patient_registration_id')
                         ->from('patient_registration')
                         ->where(array('office_id'=>$this->session->office_id))
                         ->get()->row()->patient_registration_id;
                if($patient_registration_id>0)
                {
                    $patient_registration_id=$patient_registration_id;
                } else {
                    $patient_registration_id= $patient_registration_id;
                   
                }

                $patient_appointment_id=$this->db->select('max(patient_appointment_id) as patient_appointment_id')
                         ->from('patient_appointment')
                         ->where(array('1'=>1))
                         ->get()->row()->patient_appointment_id;
                if($patient_appointment_id>0)
                {
                    $patient_appointment_id=$patient_appointment_id;
                } else 
                {
                    $patient_appointment_id= $patient_appointment_id;
                   
                }
                $fname=trim(htmlentities($this->input->post('fname')));
                $lname=trim(htmlentities($this->input->post('lname')));
                $tempid='1207164035160750964';
                $office_id=$this->session->office_id;

                $mrdno=$this->db->select('mrdno')
                         ->from('patient_registration')
                         ->where(array('patient_registration_id'=>$patient_registration_id))
                         ->get()->row()->mrdno;

                        

                         $lname.= ' MRD NO-'.$mrdno;

		       $office=$this->db->get_where('office',"office_id=$office_id")->row();
		       $cmbl=$office->printable_company_mobile;
		       $msg=urlencode('வணக்கம், '.$fname.' '.$lname.' அவர்களை இமயம் ஸ்பெசாலிட்டி மருத்துவமனைக்கு வரவேற்கிறோம். எப்பொழுதும் உங்கள் திருப்தியே எங்கள் நோக்கம். எங்களை பார்வையிட்டதற்கு நன்றி.நோயாளி ஐடி மற்றும் பெயரை குறுந்தகவல் அல்லது வாட்ஸ் ஆப் மெசஞ்சர் மூலம் அனுப்பி மருத்துவருடன் அடுத்த சந்திப்பை உறுதிசெய்யலாம்.கைபேசி '.$cmbl.' IMAYAM');
		       $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
		       // if($host_tvm=='emr')
		       // {
               //   //$this->smsgateway($fname,$lname,$mobileno,$tempid,$msg);
               // }
               if($host_tvm=='deh')
		       {
		       	  $docname=$this->db->select('name')
                         ->from('doctors_registration')
                         ->where(array('doctors_registration_id'=>$doctor_id))
                         ->get()->row()->name;
		       	$tempid='1407165571350652066';
		       	$lname=trim(htmlentities($this->input->post('lname')));
		       	$msg=urlencode('Welcome Deepam Eye Hospitals, Urappakkam Dear sir/Madam '.$fname.' '.$lname.' MRD No '.$mrdno.' Your appointment has been scheduled with  '.$docname.' at '.$this->input->post('appointment_date').' DEYEHP');
                 $this->smsgateway($fname,$lname,$mobileno,$tempid,$msg);
               }
			   if($host_tvm=='nobelemr'  || $host_tvm=='sriganapathi')
			   {
                if($host_tvm=='sriganapathi')
                {
                    $docname=$this->db->select('name')
                            ->from('doctors_registration')
                            ->where(array('doctors_registration_id'=>$doctor_id))
                            ->get()->row()->name;
                     $mobileno = str_replace('-', '', $mobileno);
                     $tts=date('d/m/y h:i a');
                    $msg1="Dear Customer, Your appointment has been scheduled with  $docname at $tts – Sriganapathi Hospital";
                     $url='https://amazingitworld.in/api/send?number=91'.$mobileno.'&type=text&message='.urlencode($msg1).'&instance_id=64FC25A1C8D6C&access_token=64fc1de1e5c7d';
                     $this->smsgateway_quc($url);
                    
                }
			   	if($host_tvm=='emry')
			   	{
			   		$docname=$this->db->select('name')
							->from('doctors_registration')
							->where(array('doctors_registration_id'=>$doctor_id))
							->get()->row()->name;
			   		 $mobileno = str_replace('-', '', $mobileno);
			   		 $tts=date('d/m/y h:i a');
			        $msg1="Dear Customer, Your appointment has been scheduled with  $docname at $tts – Queens Health Mall";
			   		 $url='https://amazingitworld.in/api/send?number=91'.$mobileno.'&type=text&message='.urlencode($msg1).'&instance_id=64CA5287279B8&access_token=64ca51a64ecf0';
			   		 $this->smsgateway_quc($url);
			   		
			   	}
				//Welcome Nobel Eye Care, Thiruvanmiyur
// Dear sir/Madam {#var#} {#var#} MRD No {#var#}
// Your appointment has been scheduled with Dr {#var#} at {#var#}
// ADEXPR
					$docname=$this->db->select('name')
							->from('doctors_registration')
							->where(array('doctors_registration_id'=>$doctor_id))
							->get()->row()->name;
					$tempid='1407167032826293903';
					$lname=trim(htmlentities($this->input->post('lname')));
					$msg=urlencode('Welcome Nobel Eye Care, Thiruvanmiyur Dear sir/Madam '.$fname.' '.$lname.' MRD No '.$mrdno.' Your appointment has been scheduled with '.$docname.' at '.$this->input->post('appointment_date').' ADEXPR');
					$this->smsgateway($fname,$lname,$mobileno,$tempid,$msg);
			   }
			   if($host_tvm=='queens')
			   {
			   	$docname=$this->db->select('name')
							->from('doctors_registration')
							->where(array('doctors_registration_id'=>$doctor_id))
							->get()->row()->name;
				$docname=str_replace('Dr.','',$docname);
			   	$fname=trim(htmlentities($this->input->post('fname')));
                $lname=trim(htmlentities($this->input->post('lname')));
			   	 $msg="Dear $fname, Welcome To Queen's health mall. Thanks for contacting us https://qhmdoctors.com/";
			   	 $tempid='1707169054068485472';
			   	 $apikey="20829|f264TQsIYY8jTaegjpL7zJ7bEVnKZ6x76VC9haRA";
				 $mobileno = str_replace('-', '', $mobileno);
				 $sendid='QHLMAL';
			   	 $url='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701169044707230747&template_id='.$tempid.'&message='.urlencode($msg).'';
$tts=date('d/m/y h:i a');
			  $msg1="Dear Customer, Your appointment has been scheduled with Dr. $docname at $tts – Queens Health Mall";
			  $tempid1='1707169054080350948';
			  $url1='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701169044707230747&template_id='.$tempid1.'&message='.urlencode($msg1).'';
$ff=$this->input->post('agey');

			    // $msg2="Dear sir/Madam Name: $fname $lname Age: $ff .Your MRD No is $mrdno – Deepam Eye Hospital";
			   	// $tempid2='1707168812610478444';
			    // $url2='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701169044707230747&template_id='.$tempid2.'&message='.urlencode($msg2).'';

			   	 $this->smsgateway_quc($url);
			   	 $this->smsgateway_quc($url1);
			   //	 $this->smsgateway_quc($url2);

// 			   	$office_com=$this->db->get_where('office',"office_id=$office_id")->row();
// 			   	$com_name=$office_com->printable_company_name;
// 				//Welcome Nobel Eye Care, Thiruvanmiyur
// // Dear sir/Madam {#var#} {#var#} MRD No {#var#}
// // Your appointment has been scheduled with Dr {#var#} at {#var#}
// // ADEXPR
// 					$docname=$this->db->select('name')
// 							->from('doctors_registration')
// 							->where(array('doctors_registration_id'=>$doctor_id))
// 							->get()->row()->name;
// 					$tempid='1407167032826293903';
// 					$lname=trim(htmlentities($this->input->post('lname')));
// 					$msg=urlencode('Welcome '.$com_name.',  Dear sir/Madam '.$fname.' '.$lname.' MRD No '.$mrdno.' Your appointment has been scheduled with '.$docname.' at '.$this->input->post('appointment_date').' ADEXPR');
// 					$this->smsgateway($fname,$lname,$mobileno,$tempid,$msg);
			   }
			   if($host_tvm=='dehavadi' || $host_tvm=='deht')
			   {

			   		$docname=$this->db->select('name')
							->from('doctors_registration')
							->where(array('doctors_registration_id'=>$doctor_id))
							->get()->row()->name;
				$docname=str_replace('Dr.','',$docname);
			   	$fname=trim(htmlentities($this->input->post('fname')));
                $lname=trim(htmlentities($this->input->post('lname')));
			   	 $msg="Dear $fname $lname, Welcome To Deepam Eye Hospitals. Thanks for contacting us – Deepam Eye Hospital";
			   	 $tempid='1707168812618413086';
			   	 $apikey="20782|T8zhzSerOsLRMRpIUy9YXe5WBVimDcauvLYbDxj7";
				 $mobileno = str_replace('-', '', $mobileno);
				 $sendid='DMEYHS';
			   	 $url='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701168803780477066&template_id='.$tempid.'&message='.urlencode($msg).'';
$tts=date('d/m/y h:i a');
			  $msg1="Dear Customer, Your appointment has been scheduled with Dr. $docname at $tts – Deepam Eye Hospital";
			  $tempid1='1707168812595627599';
			  $url1='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701168803780477066&template_id='.$tempid1.'&message='.urlencode($msg1).'';
$ff=$this->input->post('agey');

			    $msg2="Dear sir/Madam Name: $fname $lname Age: $ff .Your MRD No is $mrdno – Deepam Eye Hospital";
			   	$tempid2='1707168812610478444';
			    $url2='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701168803780477066&template_id='.$tempid2.'&message='.urlencode($msg2).'';

			   	 $this->smsgateway_quc($url);
			   	 $this->smsgateway_quc($url1);
			   	 $this->smsgateway_quc($url2);
			   }

                if($host_tvm=='emr' || $host_tvm=='peftemr' || $host_tvm=='pefemr')
               {
                $tts=date('h A');
                   $docname=$this->db->select('name')
                            ->from('doctors_registration')
                            ->where(array('doctors_registration_id'=>$doctor_id))
                            ->get()->row()->name;
                $docname=str_replace('Dr','',$docname);
                $fname=trim(htmlentities($this->input->post('fname')));
                $ageyy=trim(htmlentities($this->input->post('agey')));
                $lname=trim(htmlentities($this->input->post('lname')));
                 //$msg="Dear Customer, Your appointment has been scheduled with $docname at $tts –PAYYANNUR EYE CARE";
                 $msg="Dear Customer, Your appointment has been scheduled with Dr. $docname Sir at $tts - PAYYANNUR EYE CARE";
                 $tempid='1707170002504192513';
                 $mobileno = str_replace('-', '', $mobileno);
                 $sendid='PYNREC';
                  $url2='https://sms.cell24x7.in/smsReceiver/sendSMS?user=ojo_software&pwd=apisoftware&sender='.$sendid.'&mobile='.$mobileno.'&tempid=1707170002504192513&msg='.urlencode($msg).'&mt=0';

                  $msg2="Dear sir/Madam, Name: $fname $lname Age: $ageyy .Your MRD No is $mrdno - PAYYANNUR EYE CARE";

                $url3='https://sms.cell24x7.in/smsReceiver/sendSMS?user=ojo_software&pwd=apisoftware&sender='.$sendid.'&mobile='.$mobileno.'&tempid=1707170002824209711&msg='.urlencode($msg2).'&mt=0';

                $msg3="Dear $fname $lname, Welcome to Payyannur Eye Foundation. Thanks for contacting us - PAYYANNUR EYE CARE";

                $url4='https://sms.cell24x7.in/smsReceiver/sendSMS?user=ojo_software&pwd=apisoftware&sender='.$sendid.'&mobile='.$mobileno.'&tempid=1707170004400123369&msg='.urlencode($msg3).'&mt=0';

                 $this->smsgateway_quc($url2);
                 $this->smsgateway_quc($url3);
                  $this->smsgateway_quc($url4);
               }
                   $this->direct_doctor_patient($patient_registration_id,$patient_appointment_id,$doctor_id);
			      echo json_encode(array('msg' =>'Saved Successfully','patient_registration_id' =>$patient_registration_id,'patient_app_id' =>$patient_appointment_id,'error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
	    		}
	    	// }
	    	// else
	    	// {
	     //          echo json_encode(array('msg'=>'','error' =>'This Mobile No already Used','error_message' =>''));
	    	// }
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
	public function direct_doctor_patient($patient_registration_id,$patient_appointment_id,$doctor_id)
	{
		if($doctor_id)
		{
			$which_doc=$this->Patients_registration_model->Identify_Which_Doctor($doctor_id);
			if($which_doc)
			{
				if($which_doc[0]['doctor_department_id']==1)
				{
					if($this->session->userdata('office_id'))
					{
						$get_office_data=$this->Patients_registration_model->getoffice_direct_access_Doctor($this->session->userdata('office_id'));
						if($get_office_data)
						{
							if($get_office_data[0]['direct_doctor']==1)
							{
								$save_ex=$this->Patients_registration_model->Save_Ex_data($patient_registration_id,$patient_appointment_id,$doctor_id,$this->session->userdata('office_id'),$this->session->userdata('login_id'));
							}
						}
					}
				}	 
			}
	    }
	}
	public function smsgateway_quc_whatsapp($url)
	{
		
			
			//echo $url;exit;
			  $curl = curl_init();
		      curl_setopt_array($curl, array(
		      CURLOPT_URL =>$url,
		      CURLOPT_RETURNTRANSFER => true,
		      CURLOPT_ENCODING => "",
		      CURLOPT_MAXREDIRS => 10,
		      CURLOPT_TIMEOUT => 30,
		      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		      CURLOPT_CUSTOMREQUEST => "POST",
		      ));
		      $response = curl_exec($curl);
		      $err = curl_error($curl);
		      
		      curl_close($curl);
		      if ($err) {
		     // echo "cURL Error #:" . $err;
		      } else {
		    //  echo $response;
		      }
		     // exit;
	    
		//exit;
	}
	public function smsgateway_quc($url)
	{
		
			
			//echo $url;exit;
			  $curl = curl_init();
		      curl_setopt_array($curl, array(
		      CURLOPT_URL =>$url,
		      CURLOPT_RETURNTRANSFER => true,
		      CURLOPT_ENCODING => "",
		      CURLOPT_MAXREDIRS => 10,
		      CURLOPT_TIMEOUT => 30,
		      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		      CURLOPT_CUSTOMREQUEST => "GET",
		      ));
		      $response = curl_exec($curl);
		      $err = curl_error($curl);
		      
		      curl_close($curl);
		      if ($err) {
		     // echo "cURL Error #:" . $err;
		      } else {
		    //  echo $response;
		      }
		     // exit;
	    
		//exit;
	}
	public function updatedata()
	{
		$this->form_validation->set_rules('id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
		$this->form_validation->set_rules('patient_title_id', 'Title', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[1]|max_length[40]');
		//$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[1]|max_length[40]');
		$this->form_validation->set_rules('gender_id', 'Gender', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('agey', 'Age Year', 'trim|required|min_length[1]|max_length[4]|numeric');
		//$this->form_validation->set_rules('agem', 'Age Month', 'trim|required|min_length[1]|max_length[2]|numeric');
		$this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
		//$this->form_validation->set_rules('city_id', 'City', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('mobileno', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|min_length[1]|max_length[100]');
		//$this->form_validation->set_rules('source', 'Source', 'trim|min_length[1]|max_length[50]');
		//$this->form_validation->set_rules('occupation', 'Occupation', 'trim|min_length[1]|max_length[50]');
		//$this->form_validation->set_rules('referral_masters_id', 'Referral name', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('insurance_company_id', 'OPD Insurance Name', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('patient_category_id', 'Patient Category', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('emergency_id', 'Emergency', 'trim|required|min_length[1]|max_length[2]|numeric');
		$this->form_validation->set_rules('doctor_id', 'Select Doctor', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('print', 'Print', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('appointment_type_id', 'Appointment Type', 'trim|required|min_length[1]|max_length[10]|numeric');
		//$this->form_validation->set_rules('opdcharge_id', 'OPD Charge', 'trim|required|min_length[1]|max_length[10]|numeric');
		$this->form_validation->set_rules('logo','Patient Image','callback_file_check');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$edit_id=trim(htmlentities($this->input->post('id')));
	    	$mobileno=trim(htmlentities($this->input->post('mobileno')));
	    	// $var_array=array($edit_id,$mobileno,$this->session->userdata('office_id'));
	    	// $chk_duplication=$this->Patients_registration_model->editcheck($var_array);
	    	// if($chk_duplication[0]['cnt']==0)
	    	// {
	    		$data=$this->fetch_data();
	    		$getresult=$this->Patients_registration_model->updatedata($data,$edit_id);
	    		if($getresult)
	    		{
		    		echo json_encode(array('msg'=>'Updated Successfully','error' =>'','error_message' =>''));
	    		}
	    		else
	    		{
	    			echo json_encode(array('msg'=>'','error' =>'Failed to Update','error_message' =>''));
	    		}
	    	// }
	    	// else
	    	// {
	    	// 	echo json_encode(array('msg'=>'','error' =>'Name already Used','error_message' =>''));
	    	// }
	    }
	    else
	    {
	    echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));
	    }
	}

	public function editdata()
	{
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	$var_array=array($this->input->post('getid'),$this->session->userdata('office_id'));
	    	$getpateintdata=$this->Patients_registration_model->getpatienteditdata($var_array);
	    	//print_r($getpateintdata);exit;
	    	if($getpateintdata)
	    	{
	    		echo json_encode(array('msg'=>$getpateintdata,'error' =>'','error_message' =>''));
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

	 public function file_check($parameter){
        
         if(isset($_FILES['logo']['name']))
         {
        $str=$_FILES['logo']['name'];
        $allowed_mime_type_arr = array('image/jpeg','image/jpg','image/png');
        $mime = get_mime_by_extension($str);
        if(isset($str) && $str!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                
                return $this->upload();
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }else{
            if($this->input->post('profile_pic'))
            {
                $this->session->set_flashdata('profile_pic',$this->input->post('profile_pic'));
                return true;
            }
             $this->session->set_flashdata('profile_pic','temp.jpg');
             return true;
        }
         }  else {
             $this->session->set_flashdata('profile_pic','temp.jpg');
             return true;
         }
    }
    private function upload() {
		$host_tvm = 'erp1';
        $config['upload_path']   = 'images/profile/'; 
        $config['allowed_types'] = 'jpg|png|jpeg'; 
        $config['max_size']      = 2000; 
        $config['file_name']  = $host_tvm;
        // $config['max_width']     = 1024; 
        // $config['max_height']    = 768;  
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('logo')) {
            $this->form_validation->set_message('file_check', $this->upload->display_errors());
            return false;
           }

        else { 
            
              $this->session->set_flashdata('profile_pic',$this->upload->data('file_name'));
             return TRUE;
   }
}

	public function checkout()
	{
		$this->form_validation->set_rules('getid', 'Checkout  ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$chkout_id=trim(htmlentities($this->input->post('getid')));
	    	$patid=trim(htmlentities($this->input->post('patid')));
	    	$var_array=array($chkout_id);
	    	$chk_duplication=$this->Patients_registration_model->chkoutdata($var_array);
	    	if($chk_duplication[0]['checkout']==0)
	    	{
	    		$getresult=$this->Patients_registration_model->updatecheckout($chkout_id);
	    		if($getresult)
	    		{
	    			$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
	    			 if($host_tvm=='deh')
				       {
				       	$mobileno=$this->db->select('mobileno')
                         ->from('patient_registration')
                         ->where(array('patient_registration_id'=>$patid))
                         ->get()->row()->mobileno;
				       	 $fname='';
				       	 $lname='';
				       	$tempid='1407165571368873703';
		$msg=urlencode('Thanks for visiting our hospitals.To post review click on https://g.page/r/CTHAIXCcW8PzEAg/review  DEYEHP');
		                 $this->smsgateway($fname,$lname,$mobileno,$tempid,$msg);
		               }
		                if($host_tvm=='emr')
				       {
				       	$mobileno=$this->db->select('mobileno')
                         ->from('patient_registration')
                         ->where(array('patient_registration_id'=>$patid))
                         ->get()->row()->mobileno;
				       	 $fname='';
				       	 $lname='';
				       	$tempid='1407165571368873703';
		$msg=urlencode('Thanks for visiting our hospitals.To post review click on https://g.page/r/CTHAIXCcW8PzEAg/review  DEYEHP');
		                 $this->smsgateway($fname,$lname,$mobileno,$tempid,$msg);
		               }
		                if($host_tvm=='queens')
			   {
			   	$mobileno=$this->db->select('mobileno')
                         ->from('patient_registration')
                         ->where(array('patient_registration_id'=>$patid))
                         ->get()->row()->mobileno;
			   	$fname=$this->db->select('fname')
                         ->from('patient_registration')
                         ->where(array('patient_registration_id'=>$patid))
                         ->get()->row()->fname;
			   $postrev='https://g.page/r/CYl9hYAe9OnbEBM';
			   	 $msg="Dear $fname, Thanks for visiting our hospitals. To post review click on $postrev – Queens Health Mall";
			   	 $tempid='1707169054084094016';
			   	 $apikey="20829|f264TQsIYY8jTaegjpL7zJ7bEVnKZ6x76VC9haRA";
				 $mobileno = str_replace('-', '', $mobileno);
				 $sendid='QHLMAL';
			   	 $url='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701169044707230747&template_id='.$tempid.'&message='.urlencode($msg).'';

			 

			   	 $this->smsgateway_quc($url);
			   	 
			 
			   }
		//                 if($host_tvm=='queens')
		// 		       {
		// 		       	$mobileno=$this->db->select('mobileno')
        //                  ->from('patient_registration')
        //                  ->where(array('patient_registration_id'=>$patid))
        //                  ->get()->row()->mobileno;
		// 		       	 $fname='';
		// 		       	 $lname='';
		// 		       	$tempid='1407165571368873703';
		// $msg=urlencode('Thanks for visiting our hospitals.To post review click on https://g.co/kgs/ZmPuHd  QUEENS');
		//                  $this->smsgateway_tha($fname,$lname,$mobileno,$tempid,$msg);
		//                }
					   
			       echo json_encode(array('msg'=>'Checkout Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			      echo json_encode(array('msg'=>'','error'=>'Failed to Checkout','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	            echo json_encode(array('msg'=> '', 'error'=> 'This Appointment Already checkouted','error_message' =>''));
	    	}
	    }
	    else
	    {
	      echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
	    }
	}

     public function deletedata()
	{
		$this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$delete_id=trim(htmlentities($this->input->post('getid')));
	    	$var_array=array($delete_id,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Patients_registration_model->deletecheck($var_array);
	    	if($chk_duplication[0]['cnt']==1)
	    	{
	    		$getresult=$this->Patients_registration_model->deletedata($delete_id);
	    		if($getresult)
	    		{
			       echo json_encode(array('msg'=>'Deleted Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			      echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	            echo json_encode(array('msg'=> '', 'error'=> 'Delete ID Not Found','error_message' =>''));
	    	}
	    }
	    else
	    {
	      echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
	    }
	}
	 public function foldeletedata()
	{
		$this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$delete_id=trim(htmlentities($this->input->post('getid')));
	    	$var_array=array($delete_id,$this->session->userdata('office_id'));
	    	
	    		$getresult=$this->Patients_registration_model->foldeletedata($delete_id);
	    		if($getresult)
	    		{
			       echo json_encode(array('msg'=>'Deleted Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			      echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));
	    		}
	    	
	    }
	    else
	    {
	      echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
	    }
	}

	 public function canceldata()
	{
		$this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$delete_id=trim(htmlentities($this->input->post('getid')));
	    	$var_array=array($delete_id,$this->session->userdata('office_id'));
	    	
	    		$getresult=$this->Patients_registration_model->canceldatamodel($delete_id);
	    		if($getresult)
	    		{
			       echo json_encode(array('msg'=>'Appointment Cancel Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			      echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));
	    		}
	    	
	    }
	    else
	    {
	      echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
	    }
	}
    private function fetch_data_followup() 
    {
    	  $return=array(
             "appointment_details"=>array(
                "patient_registration_id"=>$this->input->post('patient_registration_id'),
                "appointment_date"=>date('Y-m-d',strtotime($this->input->post('followup_appointment_date'))),
                 "appointment_time"=>($this->input->post('followup_appointment_time'))?$this->input->post('followup_appointment_time'):date('H:i:s'),
                 "patient_category_id"=>$this->input->post('followup_patient_category_id'),
                 "emergency"=>$this->input->post('followup_emergency_id'),
                 "doctor_id"=>$this->input->post('followup_doctor_id'),
                 "apponitment_type_id"=>$this->input->post('followup_appointment_type_id'),
				 "complaints_id"=>$this->input->post('followup_complaints_id'),
                 "appointment_opd_charge_id"=>$this->input->post('opdcharge_id'),
                 "modeofpay_id"=>$this->input->post('followup_modeofpay_id'),
                 "billing"=>$this->input->post('followup_billing'),
				 "campconduct"=>trim($this->input->post('followup_campconduct')),
                 "cardno"=>trim($this->input->post('followup_cardno')),
                 "source"=>$this->input->post('followup_source'),
                 "description"=>$this->input->post('followup_description'),
                 "login_id"=>$this->session->userdata('login_id')
             ),
             "bill_number"=>array(
                   'type'=>0,
                   'office_id'=> $this->session->userdata('office_id')
                   ),
           
           );
            return $return;
       
    }
	 public function savefollowup()
	{
					
		//print_r($this->input->post());
         $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
		$this->form_validation->set_rules('patient_registration_id', 'Patient ID', 'trim|required|min_length[1]|max_length[100000]|numeric');
		$this->form_validation->set_rules('followup_doctor_id', 'Doctor', 'trim|required|min_length[1]|max_length[40000]|numeric');
		
		// $this->form_validation->set_rules('followup_appointment_type_id', 'Appointment Type', 'trim|required|min_length[1]|max_length[400000]|numeric');
// 		$this->form_validation->set_rules('opdcharge_id', 'Appointment OPD Charge
// ', 'trim|required|min_length[1]|max_length[100000]|numeric');
	//	$this->form_validation->set_rules('followup_emergency_id', 'Emergency', 'trim|required|min_length[1]|max_length[1]|numeric');
		//$this->form_validation->set_rules('followup_modeofpay_id', 'Mode of pay', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('followup_appointment_date', 'Appointment Date', 'trim|required');
		$this->form_validation->set_rules('followup_appointment_time', 'Appointment Time', 'trim|required');
		//$this->form_validation->set_rules('followup_description', 'Description', 'trim|required');
		$getresult_dob=$this->Patients_registration_model->Get_DOB($this->input->post('patient_registration_id'));
                        if($getresult_dob)
                        {
							$date1 = date_create($getresult_dob[0]['dob']);
							$date2 = date_create(date('Y-m-d'));
							
							$diff=date_diff($date1,$date2);
							$months = $diff->format("%m");
							$years = $diff->format("%y");
							$days = $diff->format("%d");
							
                            $getresult=$this->Patients_registration_model->Update_DOB($this->input->post('patient_registration_id'),$years,$months,$days);
                        } 
						
	    if($this->form_validation->run() == TRUE)
	    {
            if($host_tvm!='queens')
            {
    	    	$checkupdate=$this->Patients_registration_model->checkfollowupmodel($this->input->post('patient_registration_id'),$this->input->post('followup_appointment_date'));
                //print_r($checkupdate);exit;
    	    	if($checkupdate[0]['cnt']>0)
    	    	{
                    echo json_encode(array('msg' =>'','error'=> 'Already Saved Appointment same date in this Patient','error_message' =>''));exit;
                }
            }
	    	$mobileno=trim(htmlentities($this->input->post('mobileno')));
	    	$var_array=array($mobileno,$this->session->userdata('office_id'));

			   
				if($host_tvm=='deh')
				{
					$cardno=trim(htmlentities($this->input->post('followup_cardno')));
					//$this->cardchecking($cardno)
					if($cardno)
					{
						$cardavailable=0;
						$chkidentfycard=$this->Patients_registration_model->checkingcamplist($cardno);
						if($chkidentfycard)
						{
							$cardavailable=$chkidentfycard[0]['cnt'];
						}
						if($cardavailable==0)
						{
							echo json_encode(array('msg'=>'','error' =>'This card not available in camp list tab .please check','error_message' =>''));exit;
						}
						if($cardavailable>0)
						{
							$cntcardno12=0;
							$getcheckresultcntt=$this->Patients_registration_model->getcountchecking($cardno);
							if($getcheckresultcntt)
							{
								$cntcardno12=$getcheckresultcntt[0]['cnt'];
							}
							if($cntcardno12>12)
							{
								echo json_encode(array('msg'=>'','error' =>'This card usage count is over','error_message' =>''));exit;
							}
							

						}
						
					}
				}

	    	
	    		$data=$this->fetch_data_followup();
	    		$getresult=$this->Patients_registration_model->savedatafollowup($data);
	    		if($getresult)
	    		{

                    $patient_registration_id=$this->input->post('patient_registration_id');
                    $patient_appointment_id=$this->db->select('max(patient_appointment_id) as patient_appointment_id')
                             ->from('patient_appointment')
                             ->where(array('1'=>1))
                             ->get()->row()->patient_appointment_id;
                    if($patient_appointment_id>0)
                    {
                        $patient_appointment_id=$patient_appointment_id;
                    }
                     else 
                    {
                        $patient_appointment_id= $patient_appointment_id;
                    }
                    // if($host_tvm=='emr')
                    // {
                        $getresult_mrd=$this->Patients_registration_model->Get_MRD_NO($patient_registration_id);
                        if($getresult_mrd)
                        {
                            $getresult=$this->Patients_registration_model->Update_pat_Reg($getresult_mrd[0]['mrdno']);
                        }
						
						
                   // }
                    

					$this->direct_doctor_patient($patient_registration_id,$patient_appointment_id,$this->input->post('followup_doctor_id'));
			      echo json_encode(array('msg' =>'Saved Successfully','patient_registration_id' =>$patient_registration_id,'patient_app_id' =>$patient_appointment_id,'error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
	    		}
	    	
	    	
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	 private function folfetch_data() 
    {
    	
        $office_id=$this->session->office_id;
        return array(
        	'patient_registration_id'=>trim($this->input->post('patfolid')),
        	'patient_followup_date'=>trim($this->input->post('padate')),
            'description'=>trim($this->input->post('foldescription')),
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }
    private function whitecellfetch_data() 
    {
    	
        $office_id=$this->session->office_id;
        return array(
        	'patient_registration_id'=>trim($this->input->post('patreg')),
        	'patient_appointment_id'=>trim($this->input->post('patapt')),
        	'bp'=>trim($this->input->post('bp')),
        	'sugar'=>trim($this->input->post('sugar')),
            'temprature'=>trim($this->input->post('temprature')),
            'description'=>trim($this->input->post('whitedescription')),
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }
	private function camp_fetchdata() 
    {
    	
        $office_id=$this->session->office_id;
        return array(
        	'campid'=>trim($this->input->post('campid')),
        	'card'=>trim($this->input->post('card')),
            'issue_card'=>trim($this->input->post('issue_card')),
           );
    }
	public function savecamps()
	{
		$this->form_validation->set_rules('campid', 'Patient ID', 'trim|required|min_length[1]|max_length[100000]|numeric');
		$this->form_validation->set_rules('card', 'Date', 'trim|required');
		$this->form_validation->set_rules('foldescription', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$campid=trim(htmlentities($this->input->post('campid')));
	    	$card=trim(htmlentities($this->input->post('card')));
			$issue_card=trim(htmlentities($this->input->post('issue_card')));
	    		
	    		$getresult=$this->Patients_registration_model->savecamps($campid,$card,$issue_card);
	    		if($getresult)
	    		{
			      echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
	    		}
	    	
	    	
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function savefollowupnew()
	{
		$this->form_validation->set_rules('patfolid', 'Patient ID', 'trim|required|min_length[1]|max_length[100000]|numeric');
		$this->form_validation->set_rules('padate', 'Date', 'trim|required');
		$this->form_validation->set_rules('foldescription', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$patfolid=trim(htmlentities($this->input->post('patfolid')));
	    	$padate=trim(htmlentities($this->input->post('padate')));
	    	$var_array=array($patfolid,$padate,$this->session->userdata('office_id'));

	    	$chk_duplication=$this->Patients_registration_model->chksavefoldata($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    	
	    		$data=$this->folfetch_data();
	    		$getresult=$this->Patients_registration_model->savefoldata($data);
	    		if($getresult)
	    		{
			      echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		 echo json_encode(array('msg' =>'','error'=> 'Already Saved followup in Same Date','error_message' =>''));
	    	}
	    	
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
	public function savefollowupnewfture()
	{
		$startDate = strtotime(date('Y-m-d', strtotime($this->input->post('padate'))));
    	$currentDate = strtotime(date('Y-m-d'));
    	if($startDate > $currentDate) 
    	{
			$this->form_validation->set_rules('patfolid', 'Patient ID', 'trim|required|min_length[1]|max_length[100000]|numeric');
			$this->form_validation->set_rules('padate', 'Date', 'trim|required');
			$this->form_validation->set_rules('foldescription', 'Description', 'trim');
		    if($this->form_validation->run() == TRUE)
		    {
		    	$patfolid=trim(htmlentities($this->input->post('patfolid')));
		    	$padate=trim(htmlentities($this->input->post('padate')));
		    	$var_array=array($patfolid,$padate,$this->session->userdata('office_id'));

		    	$chk_duplication=$this->Patients_registration_model->chksavefoldata($var_array);
		    	if($chk_duplication[0]['cnt']==0)
		    	{
		    	
		    		$data=$this->folfetch_data();
		    		$getresult=$this->Patients_registration_model->savefoldata($data);
		    		if($getresult)
		    		{
				      echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
		    		}
		    		else
		    		{
				        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
		    		}
		    	}
		    	else
		    	{
		    		 echo json_encode(array('msg' =>'','error'=> 'Already Saved followup in Same Date','error_message' =>''));
		    	}
		    	
		    }
		    else
		    {
		         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
		    }
	 }
	}

	public function savewhitecellnew()
	{
		$this->form_validation->set_rules('patreg', 'Patient ID', 'trim|required|min_length[1]|max_length[100000]|numeric');
		$this->form_validation->set_rules('patapt', 'Date', 'trim|required');
		$this->form_validation->set_rules('bp', 'BP', 'trim|required');
		$this->form_validation->set_rules('sugar', 'sugar', 'trim|required');
		$this->form_validation->set_rules('temprature', 'temprature', 'trim|required');
		$this->form_validation->set_rules('whitedescription', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$patfolid=trim(htmlentities($this->input->post('patreg')));
	    	$patapt=trim(htmlentities($this->input->post('patapt')));
	    	$var_array=array($patfolid,$patapt,$this->session->userdata('office_id'));

	    	$chk_duplication=$this->Patients_registration_model->chksavewhitecell($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    	
	    		$data=$this->whitecellfetch_data();
	    		$getresult=$this->Patients_registration_model->saveehitedata($data);
	    		if($getresult)
	    		{
			      echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
	    		}
	    		else
	    		{
			        echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
	    		}
	    	}
	    	else
	    	{
	    		 echo json_encode(array('msg' =>'','error'=> 'Already Saved Whitecell in Same Appointment','error_message' =>''));
	    	}
	    	
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
	public function print_appointment() 
  {
    //   echo $this->input->post('printpatient_apt_id');exit;
      $this->Patients_registration_model->print_bill($this->input->post('printpatient_registration_id'),$this->session->userdata('office_id'),$this->input->post('printpatient_apt_id'));
  }
  public function print_appointmenthd() 
  {
      $this->Patients_registration_model->print_billhd($this->input->post('printpatient_registration_id'),$this->input->post('typeprint'),$this->session->userdata('office_id'));
  }

  public function rooming_change()
	{
		$this->form_validation->set_rules('appid', 'Patient ID', 'trim|required|min_length[1]|max_length[100000]|numeric');
		
	    if($this->form_validation->run() == TRUE)
	    {
			$this->load->model('Dashboard_model');
	    	$appid=trim(htmlentities($this->input->post('appid')));
			$getresult=$this->Dashboard_model->rooming_change_Update($appid);
			if($getresult)
			{
				echo json_encode(array('msg' =>'Rooming  Updated','error'=>'','error_message' =>''));
			}
			else
			{
				echo json_encode(array('msg' =>'','error'=> 'Failed to Rooming','error_message' =>''));
			}
	    	
	    	
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
	public function Get_Idcard()
	{
		require 'vendor/vendor/autoload.php';
		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		$office_id=$this->session->userdata('office_id');
		$patid=$this->input->post('patid');
		if($patid>0)
		{
			$var_array=array($patid,$office_id);
			$getresult=$this->Common_model->getpatientMasterdetails($var_array);
			if($getresult)
			{
				$office=$this->db->get_where('office',"office_id=$office_id")->row();
				$logo=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";
				$nabh_logo=($office->nabh_logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->nabh_logo'>";
				
				$company_name=$office->printable_company_name;
				$company_address=$office->printable_company_address;
				$company_mobile=$office->printable_company_mobile;
				$company_land_phone=$office->printable_company_phone;
				$company_email=$office->printable_emailid;
				$company_gst=$office->license_no;
				$print_declaration=$office->declaration;
				$gstin_no=$office->gstin_no;
				$html='';
				 $mrd=$getresult[0]['mrdno'];
				
				
		
				
				foreach ($getresult as $data) 
				{
					//echo 223;exit;
				      $html='
					 <div class="row">
					 	<div class="col-md-12">
						    <button style="float:right" onclick="patgetprint('.$patid.')" id="print-element" class="btn btn-success" type="button"><i class="la la-print"></i></button>
						</div>
					 </div> 
					  <div class="row">
					  <div class="col-md-2"></div>
					 			<div class="col-md-4 mainbor">
								  <div class="row" style="background:#e9e9e9;">
								 	 <div class="col-md-12">
									 		<h3 class="fnt" style="text-align:center;margin-top: 2%;">'.$company_name.'</h3>
									 </div> 
								  </div>
								   <hr/>
								   <div class="row form-group">
								 		<div class="col-md-4">
												<img style="width:100%;" src="'.base_url('images/pic.png').'">
										</div> 
										<div class="col-md-8">
											<div class="" style="font-weight:bold;">
												<h5 class="fnt">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;'.$data['pname'].'</h5>
												<h5 class="fnt">MRD NO &nbsp;:&nbsp;&nbsp;'.$data['mrdno'].'</h5>
												<h5 class="fnt">Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;'.$data['ageyy'].'</h5>
												<h4 style="padding: 2%;">'.$generator->getBarcode($mrd, $generator::TYPE_CODE_128).'</h4>
											</div>
										</div> 
								   </div>
								    
								</div> 
								 
							
					  </div><style>.mainbor{border:1px solid black;}.fnt{font-weight:bold;}.fntt{font-weight:bold;font-size:10px;}</style>'; 
				}
				echo json_encode(array('msg' =>$html,'error'=> '','error_message' =>''));
			}
			else 
			{
				echo json_encode(array('msg' =>'','error'=> 'No data Found','error_message' =>''));
			}
			
		}
		else 
		{
			echo json_encode(array('msg' =>'','error'=> 'Patient ID Not Found','error_message' =>''));
		}
	}
public function print_patidcard()
{
	$this->Patients_registration_model->paidcardmpdf($this->input->post('printpatient_registration_id'),$this->session->userdata('office_id'));
}

    private function tele_fetch_data() 
    {
		if($this->input->post('sele_type')==1) //Telephonic
		{
			return array(
				'which_type_pat'=>trim($this->input->post('sele_type')),
				'tele_doctor_id'=>trim($this->input->post('tele_doctor_id')),
				'tele_app_date'=>trim($this->input->post('tele_app_date')),
				'tele_app_time'=>trim($this->input->post('tele_app_time')),
				'tele_name'=>trim($this->input->post('tele_pat')),
				'tele_mobile'=>trim($this->input->post('tele_mobile')),
				'tele_age'=>trim($this->input->post('tele_age')),
				'tele_gender'=>trim($this->input->post('tele_gender')),
				'tele_description'=>trim($this->input->post('tele_description')),
				'send_sms'=>trim($this->input->post('checvall')),
				'tele_date'=>date('Y-m-d'),
				'parent_id'=>$this->session->userdata('parent_id'),
				'login_id'=>$this->session->userdata('login_id'),
				'office_id'=> $this->session->userdata('office_id')
			   );
		}
		if($this->input->post('sele_type')==2) //Review
		{
			$patient_registration_id=$this->input->post('patient_registration_id_review');
			$patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$patient_registration_id")->row();
			$patname=$patient_details->fname.' '.$patient_details->lname;
			$patmobile=$patient_details->mobileno;
			$patage=$patient_details->ageyy;
			$patgen=$patient_details->gender;
			$patmrdno=$patient_details->mrdno;
			
			
			return array(
				'which_type_pat'=>trim($this->input->post('sele_type')),
				'patient_registration_id'=>trim($this->input->post('patient_registration_id_review')),
				'tele_doctor_id'=>trim($this->input->post('rev_doctor_id')),
				'tele_app_date'=>trim($this->input->post('r_app_date')),
				'tele_app_time'=>trim($this->input->post('r_app_time')),
				'tele_name'=>$patname,
				'tele_mobile'=>$patmobile,
				'tele_age'=>$patage,
				'tele_gender'=>$patgen,
				'tele_mrdno'=>$patmrdno,
				'tele_description'=>trim($this->input->post('tele_description')),
				'send_sms'=>trim($this->input->post('checvall')),
				'tele_date'=>date('Y-m-d'),
				'parent_id'=>$this->session->userdata('parent_id'),
				'login_id'=>$this->session->userdata('login_id'),
				'office_id'=> $this->session->userdata('office_id')
			   );
		}
        
    }

public function addtele()
{
	if($this->input->post('sele_type')==1) //Telephonic
	{
        $this->form_validation->set_rules('tele_doctor_id', 'Doctor id', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('tele_pat', 'Name', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('tele_mobile', 'Mobile', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('tele_age', 'Age', 'trim|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('tele_gender', 'Gender', 'trim|required|min_length[1]|max_length[11]');
	}
	else 
	{
		$this->form_validation->set_rules('rev_doctor_id', 'Doctor id', 'trim|required|min_length[1]|max_length[100]');
	}
        $this->form_validation->set_rules('tele_description', 'Description', 'trim|min_length[1]|max_length[11]');
        if($this->form_validation->run() == TRUE)
        {
            $data=$this->tele_fetch_data();
            $getresult=$this->Patients_registration_model->savedata_tele($data);
            if($getresult)
            {
                 if($this->input->post('checvall')==1)
                    {
                $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
                if($host_tvm=='queens' || $host_tvm=='emr')
                {
                ///send sms//
                        $doc='';
                        $tele_app_time=$this->input->post('tele_app_time');
                        $tele_doctor_id=$this->input->post('tele_doctor_id');
                        $tele_app_date=$this->input->post('tele_app_date');
                         $newDate = date("d-m-Y", strtotime($tele_app_date));  
                        if($tele_doctor_id>0)
                        {
                            $sqll = "select name from doctors_registration where doctors_registration_id=$tele_doctor_id";
                            $result_row=$this->db->query($sqll); 
                            $res= $result_row->result_array ();
                            if($res)
                            {
                                $doc=$res[0]['name'];
                            }
                            else
                            {
                                $doc='';
                            } 
                        }

                $tele_pat=$this->input->post('tele_pat');
                $mobileno=$this->input->post('tele_mobile');
                 $msg="പ്രിയ ഉപഭോക്താവേ, $tele_pat Sir / Madam, $doc ന്റെ അപ്പോയിൻമെന്റ് $newDate എന്ന ഡേറ്റിലേക്ക് കൺഫോം ചെയ്തിട്ടുണ്ട് . $tele_app_time ആണ് ഡോക്ടറുടെ ഒപി ആരംഭിക്കുന്നത്. നന്ദി ക്വീൻസ് ഹെൽത്ത് മാൾ https://wa.me/c/917310810863 Web page:https://qhmdoctors.com/";



                 // $msg="പ്രിയ ഉപഭോക്താവേ, $tele_pat Sir / Madam, Doctor name $doc ന്റെ അപ്പോയിൻമെന്റ് $newDate എന്ന ഡേറ്റിലേക്ക് കൺഫോം ചെയ്തിട്ടുണ്ട് .രാവിലെ $tele_app_time ആണ് ഡോക്ടറുടെ ഒപി ആരംഭിക്കുന്നത്. നന്ദി ക്വീൻസ് ഹെൽത്ത് മാൾ https://wa.me/c/917310810863 Web page:https://qhmdoctors.com/";

                 $tempid='1707169452180264824';
                 $apikey="20829|f264TQsIYY8jTaegjpL7zJ7bEVnKZ6x76VC9haRA";
                 $mobileno = str_replace('-', '', $mobileno);
                 $sendid='QHLMAL';
                 $url='http://alerts.qikberry.com/api/v2/sms/send?access_token='.$apikey.'&sender='.$sendid.'&to='.$mobileno.'&service=T&entity_id=1701169044707230747&template_id='.$tempid.'&message='.urlencode($msg).'';
               
				if($mobileno)
				{
					$this->smsgateway_quc($url);
				}
                 
             }
         }

              echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
            }
            else
            {
                echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
            }
           
        }
        else
        {
             echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
        } 
}
public function updatetele()
{
        $this->form_validation->set_rules('edit_tele_id', 'Edit id', 'trim|required|min_length[1]|max_length[100]');
		if($this->input->post('sele_type')==1) //Telephonic
	{
        $this->form_validation->set_rules('tele_doctor_id', 'Doctor id', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('tele_pat', 'Name', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('tele_mobile', 'Mobile', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('tele_age', 'Age', 'trim|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('tele_gender', 'Gender', 'trim|required|min_length[1]|max_length[11]');
	}
	else
	{
		$this->form_validation->set_rules('rev_doctor_id', 'Doctor id', 'trim|required|min_length[1]|max_length[100]');
	}

        $this->form_validation->set_rules('tele_description', 'Description', 'trim|min_length[1]|max_length[11]');
        if($this->form_validation->run() == TRUE)
        {
            $data=$this->tele_fetch_data();
            $getresult=$this->Patients_registration_model->update_tele_pat($data,$this->input->post('edit_tele_id'));
            if($getresult)
            {
              echo json_encode(array('msg' =>'Updated Successfully','error'=>'','error_message' =>''));
            }
            else
            {
                echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
            }
           
        }
        else
        {
             echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
        } 
}
  public function deletetele()
{
    $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
    if($this->form_validation->run() == TRUE)
    {
        $delete_id=trim(htmlentities($this->input->post('getid')));
        $var_array=array($delete_id,$this->session->userdata('office_id'));
        $getresult=$this->Patients_registration_model->deletedata_tele($delete_id);
        if($getresult)
        {
           echo json_encode(array('msg'=>'Deleted Successfully','error'=>'','error_message' =>''));
        }
        else
        {
          echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));
        }
        
    }
    else
    {
      echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
    }
}
	
public function gettelepat_data()
{
       $fromdate=$this->input->post('from_date');
       $to_date=$this->input->post('to_date');
       $tele_fil_doctor_id=$this->input->post('tele_fil_doctor_id');
        $getresult=$this->Patients_registration_model->Get_tele_pat($tele_fil_doctor_id,$fromdate,$to_date);
        if($getresult)
        {
            $html='';
            $sl=1;
            $html='<table class="table table-bordered table-hover" id="tableid_etele"> <thead>
                                                              <tr>
                                                                  <th>Sl No</th>
                                                                  <th>Patient Name</th>
                                                                  <th>Mobile</th>
                                                                  <th>Gender & Age</th>
                                                                  <th>Doctor name</th>
                                                                  <th>Appointment date</th>
                                                                  <th>Edit</th>
                                                                  <th>Delete</th>
                                                                  <th>Go To</th>
                                                              </tr>
                                                          </thead><tbody>';
            foreach($getresult as $datapat)
            {
				$colosec='';
				$badgesec='';
				$which_type_pat=$datapat['which_type_pat'];
				$patdata='';
				if($which_type_pat==2)
				{
					$colosec='style="background:cyan;"';
					$badgesec='<span class="badge badge-danger float-right m-0">Review Patient</span>';

					$patient_registration_id=$datapat['patient_registration_id'];
					$tele_name=$datapat['tele_name'];
					$tele_mrdno=$datapat['tele_mrdno'];
					$patdata=$patient_registration_id.'~'.$tele_name.'-'.$tele_mrdno;
				}
                        if($datapat['tele_gender']==1)
                        {
                            $ge='Male';
                        }
                        elseif ($datapat['tele_gender']==2) 
                        {
                            $ge='Female';
                        }
                        else 
                        {
                            $ge='Transgender';
                        }
                        $doc='';
                        $telephonic_patient_id=$datapat['telephonic_patient_id'];
                        $tele_doctor_id=$datapat['tele_doctor_id'];
                        if($tele_doctor_id>0)
                        {
                            $sqll = "select name from doctors_registration where doctors_registration_id=$tele_doctor_id";
                            $result_row=$this->db->query($sqll); 
                            $res= $result_row->result_array ();
                            if($res)
                            {
                                $doc=$res[0]['name'];
                            }
                            else
                            {
                                $doc='';
                            } 
                        }

                        
                        $tele_app_date=$datapat['tele_app_date'];
                        $tele_app_time=$datapat['tele_app_time'];

                        $namem=$datapat['tele_name'];
                        $tele_mobile=$datapat['tele_mobile'];
                        $tele_age=$datapat['tele_age'];
                        $tele_description=$datapat['tele_description'];
                        $tele_gender=$datapat['tele_gender'];

						

                        $sds='onclick="gotoNode(\''.$namem.'\',\''.$tele_mobile.'\',\''.$tele_age.'\',\''.$tele_gender.'\',\''.$tele_description.'\',\''.$tele_doctor_id.'\',\''.$which_type_pat.'\',\''.$patdata.'\')"';
                        $editic='onclick="edittele(\''.$namem.'\',\''.$tele_mobile.'\',\''.$tele_age.'\',\''.$tele_gender.'\',\''.$tele_description.'\',\''.$tele_doctor_id.'\',\''.$telephonic_patient_id.'\',\''.$tele_app_date.'\',\''.$tele_app_time.'\',\''.$which_type_pat.'\',\''.$patdata.'\')"';

                        $deletei='onclick="deletetele(\''.$telephonic_patient_id.'\')"';

                        $goto='<button type="button" class="btn btn-info" '.$sds.'><i class="ft-arrow-right"></i></button>';

                        $edit='<button type="button" class="btn btn-warning" '.$editic.'><i class="la la-edit"></i></button>';
                        $delete='<button type="button" class="btn btn-danger" '.$deletei.'><i class="la la-trash"></i></button>';
                $html.='<tr '.$colosec.'>
                            <td>'.$sl.'</td>
                            <td>'.$datapat['tele_name'].' '.$badgesec.'</td>
                            <td>'.$datapat['tele_mobile'].'</td>
                            <td>'.$ge.'&'.$datapat['tele_age'].'</td>
                            <td>'.$doc.'</td>
                            <td>'.$datapat['tele_app_date'].'</td>
                           <td>'.$edit.'</td>
                            <td>'.$delete.'</td>
                            <td>'.$goto.'</td>
                        </tr>';
                $sl++;
            } 
            $html.='</tbody></table>';
          echo json_encode(array('msgsdata' =>$html,'error'=>'','error_message' =>''));
        }
        else
        {
            $html='<table class="table table-bordered table-hover" id="tableid_etele">
                                                          <thead>
                                                              <tr>
                                                                  <th>Sl No</th>
                                                                  <th>Patient Name</th>
                                                                  <th>Mobile</th>
                                                                  <th>Gender & Age</th>
                                                                  <th>Doctor Name</th>
                                                                  <th>Appointment Date</th>
                                                                  <th>Action</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody id="tele_data">
                                                              
                                                          </tbody>
                                                      </table>';
            echo json_encode(array('msgsdata' =>$html,'error'=> 'Failed to save','error_message' =>''));
        }
           
      
}
    public function getsummary()
    {
		
	$office_id=$this->session->office_id;
      error_reporting(0);
     
        $patient_name=trim(htmlentities($this->input->post('patient_name')));
        $mobileno=trim(htmlentities($this->input->post('mobile_no')));
        $address=trim(htmlentities($this->input->post('address')));
       
		$getresult=$this->Patients_registration_model->patient_details($patient_name,$mobileno,$address,$this->session->userdata('office_id'));
		
      if($getresult)
      {
			
		$html.='</div><table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
            <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Patient Name</th>
						 <th>AGE</th>
                         <th>Address</th>
						 <th>Mobile No</th>
						 <th>Register Date</th>
                      </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        foreach ($getresult as $data) {

       $html.='<tr '.$clr.'>
                  <td>'.$sl.'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['fname'].'</td>
                  <td>'.$data['ageyy'].'</td>
                  <td>'.$data['address'].'</td>
                  <td>'.$data['mobileno'].'</td>
                  <td>'.$data['created_date'].'</td>
                  
                </tr>';
                $sl++;
              
        }
              $html.='
                  
                  </tbody>
                  </table>';
        
          
              $this->msg='success';
              $this->error='';
              $this->error_message ='';
                    echo json_encode(array(
                  'msg'           => $this->msg,
                  'error'         => $this->error,
                  'error_message' => $this->error_message,
                  'getdata' => $html
                ));
                  exit;
          }
          else
          {
              $this->msg='';
              $this->error='No Data Found';
              $this->error_message ='';
                    echo json_encode(array(
                  'msg'           => $this->msg,
                  'error'         => $this->error,
                  'error_message' => $this->error_message
                ));
                  exit;
          }
        
     
  }
	
}