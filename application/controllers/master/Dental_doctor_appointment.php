<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dental_doctor_appointment extends CI_Controller {

	private $msg;
	private $error;
	private $error_message;
	private $randval;
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        
        
        $this->load->model('Common_model');
        $this->load->model('Dental_doctor_appointment_model');
      
    }
	public function index()
	{
      $data['title']='EMR::Dashboard';
      $data['activecls']='Pateint_tracking';
      $cdate=date('Y-m-d');
      $office_id=$this->session->userdata('office_id');
      $var_array_ne=array($this->session->userdata('office_id'));
      $data['doctors']=$this->Common_model->getdoctors($var_array_ne);
      $content=$this->load->view('master/dental_doctor_appointment',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
  public function Get_Dental_appointmentdata()
  {
    $search_date=$this->input->post('search_date');
    $doctor_id=$this->input->post('doctor_id');
    if($search_date)
    {
        $html='';
        $sl=1;
        $getresult=$this->Dental_doctor_appointment_model->getAppointment($search_date,$doctor_id);
        if($getresult)
        {
            foreach ($getresult as $datadept) 
            {
                $pname=$datadept['pateint_name'];
                $patient_registration_id=$datadept['patient_registration_id'];
                $patient_appointment_id=$datadept['patient_appointment_id'];
                $doctorname=$datadept['doctorname'];
                $appointment_date=$datadept['appointment_date'];
                $mrdno=$datadept['mrdno'];
                $gender=$datadept['gender'];
                if($gender==1)
                {
                    $gen='M';
                }
                if($gender==2)
                {
                    $gen='F';
                }
                if($gender==3)
                {
                    $gen='T';
                }
                $ageyy=$datadept['ageyy'];
                $mobileno=$datadept['mobileno'];
               $html.='<tr>
                            <td>'.$sl.'</td>
                            <td>'.$appointment_date.'</td>
                            <td><a style="color:blue;text-decoration: underline;"  onclick="printdataexamination('.$patient_registration_id.','.$patient_appointment_id.')">'.$pname.'</a></td>
                            <td>'.$mrdno.'</td>
                            <td>'.$gen.'/'.$ageyy.'</td>
                            <td>'.$mobileno.'</td>
                            <td>'.$doctorname.'</td>
                            <td>'.$mobileno.'</td>
                      </tr>';
               $sl++;
            }
            echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));
        }
        else 
        {
            echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));
        }
        
    }
    else 
    {
        echo json_encode(array('msg'=>'','error' =>'Search Date field is required','error_message' =>''));
    }
  }
  public function Get_Dental_comp()
  {
    $search_date=$this->input->post('search_date');
    $doctor_id=$this->input->post('doctor_id');
    if($search_date)
    {
        $html='';
        $i=1;
        $getresult=$this->Dental_doctor_appointment_model->getcomp($search_date,$doctor_id);
        if($getresult)
        {
        foreach($getresult as $data)
        {
            $exu= $data['examination_id'];
           if($data['gender']==1)
           {
              $gen='Male';
           }
           elseif($data['gender']==2)
           {
              $gen='Female';
           }
           else
           {
              $gen='Transgender';
           }

            $chkvalfd='<a style="    color: blue;
            text-decoration: underline;" target="_blank" onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].') >'.$data['pateint_name'].'</a>';
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
                     $nwpri='';
                     $nwpri='<td><button type="button" class="btn btn-success" onclick="examinationnewprint('.$data['examination_id'].')"><i class="la la-print"></i>     </button></td>';
            $html.='<tr>
                    <td>'.$i.'</td>
                    <td>'.$data['opthdate'].'  </td>
                    <td>'.$chkvalfd.' </td>
                    <td '.$newclr.'>'.$data['mrdno'].'</td>
                    <td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td>
                    <td>'.$data['mobileno'].'</td>
                    <td>'.$data['doctorname'].'</td>
                    <td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>    
                  </tr>';  
                
             

             $i++;

        }
        echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));
      }
        else 
        {
            echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));
        }
        
    }
    else 
    {
        echo json_encode(array('msg'=>'','error' =>'Search Date field is required','error_message' =>''));
    }
  }
  public function patview_status()
  {
    $sl1=0;
    $sl2=0;
    $sl3=0;
    $sl4=0;
    $html1='';$html2='';$html3='';$html4='';
    $docid=$this->input->post('doc_id');
    $curdate=$this->input->post('curdate');
    $type=$this->input->post('type');
    if($type==0)
    {
        $Response1 =$this->Dashboard_model->Patient_Status_Dash($docid,$curdate,1);
        if($Response1)
        {
            $sl1=1;
            
            $waiting_time=0;
	    			foreach($Response1 as $data)
	    			{
              $checkTime = strtotime($data['appointment_time']);
              $mrdno = strtotime($data['mrdno']);
              $patient_appointment_id=$data['patient_appointment_id'];
              $checkTime =date('H:i:s', $checkTime);
              $loginTime = strtotime($data['appointment_time']);
              $time1 = new DateTime($data['appointment_time']);
              $time2 = new DateTime(date('H:i:s'));
              $interval = $time1->diff($time2);
              $diff= $interval->format('%s second(s)');
              $patient_registration_id=$data['patient_registration_id'];
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

                       

                        $html1.='<tr>
                                <td>'.$sl1.'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td>'.$stat.'</td>
                              </tr>';
                          $sl1++;
                         
            }
            if($sl1>0)
            {
              $sl1=$sl1-1;
            }

            
        }
        $Response2 =$this->Dashboard_model->Patient_Status_Dash($docid,$curdate,2);
        if($Response2)
        {
            $sl2=1;
            
            $waiting_time=0;
	    			foreach($Response2 as $data)
	    			{
              $checkTime = strtotime($data['appointment_time']);
              $mrdno = strtotime($data['mrdno']);
              $patient_appointment_id=$data['patient_appointment_id'];
              $checkTime =date('H:i:s', $checkTime);
              $loginTime = strtotime($data['appointment_time']);
              $time1 = new DateTime($data['appointment_time']);
              $time2 = new DateTime(date('H:i:s'));
              $interval = $time1->diff($time2);
              $diff= $interval->format('%s second(s)');
              $patient_registration_id=$data['patient_registration_id'];
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

                       

                        $html2.='<tr>
                                <td>'.$sl2.'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td>'.$stat.'</td>
                              </tr>';
                          $sl2++;
                         
            }
            if($sl2>0)
            {
              $sl2=$sl2-1;
            }

            
        }
        $Response3 =$this->Dashboard_model->Patient_Status_Dash($docid,$curdate,3);
        if($Response3)
        {
            $sl3=1;
            
            $waiting_time=0;
	    			foreach($Response3 as $data)
	    			{
              $checkTime = strtotime($data['appointment_time']);
              $mrdno = strtotime($data['mrdno']);
              $patient_appointment_id=$data['patient_appointment_id'];
              $checkTime =date('H:i:s', $checkTime);
              $loginTime = strtotime($data['appointment_time']);
              $time1 = new DateTime($data['appointment_time']);
              $time2 = new DateTime(date('H:i:s'));
              $interval = $time1->diff($time2);
              $diff= $interval->format('%s second(s)');
              $patient_registration_id=$data['patient_registration_id'];
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

                       

                        $html3.='<tr>
                                <td>'.$sl3.'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td>'.$stat.'</td>
                              </tr>';
                          $sl3++;
                         
            }
            if($sl3>0)
            {
              $sl3=$sl3-1;
            }
        }
        $Response4 =$this->Dashboard_model->Patient_Status_Dash($docid,$curdate,4);
        if($Response4)
        {
            $sl4=1;
            
            $waiting_time=0;
	    			foreach($Response4 as $data)
	    			{
              $checkTime = strtotime($data['appointment_time']);
              $mrdno = strtotime($data['mrdno']);
              $patient_appointment_id=$data['patient_appointment_id'];
              $checkTime =date('H:i:s', $checkTime);
              $loginTime = strtotime($data['appointment_time']);
              $time1 = new DateTime($data['appointment_time']);
              $time2 = new DateTime(date('H:i:s'));
              $interval = $time1->diff($time2);
              $diff= $interval->format('%s second(s)');
              $patient_registration_id=$data['patient_registration_id'];
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

                       

                        $html4.='<tr>
                                <td>'.$sl4.'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td>'.$stat.'</td>
                              </tr>';
                          $sl4++;
                         
            }
            if($sl4>0)
            {
              $sl4=$sl4-1;
            }
        }
        echo json_encode(array('msg' =>'success','dataview1'=>$html1,'cnt1'=>$sl1,'dataview2'=>$html2,'cnt2'=>$sl2,'dataview3'=>$html3,'cnt3'=>$sl3,'dataview4'=>$html4,'cnt4'=>$sl4,'error'=>'','error_message' =>''));
    }
    else 
    {
      $Response1 =$this->Dashboard_model->Patient_Status_Dash($docid,$curdate,$type);
    //  print_r($Response1);exit;
      if($Response1)
      {
          $sl1=1;
          
          $waiting_time=0;
          foreach($Response1 as $data)
          {
            $checkTime = strtotime($data['appointment_time']);
            $mrdno = strtotime($data['mrdno']);
            $patient_appointment_id=$data['patient_appointment_id'];
            $checkTime =date('H:i:s', $checkTime);
            $loginTime = strtotime($data['appointment_time']);
            $time1 = new DateTime($data['appointment_time']);
            $time2 = new DateTime(date('H:i:s'));
            $interval = $time1->diff($time2);
            $diff= $interval->format('%s second(s)');
            $patient_registration_id=$data['patient_registration_id'];
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

                     

                      $html1.='<tr>
                              <td>'.$sl1.'</td>
                              <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                              <td>'.$data['mrdno'].'</td>
                              <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                              <td>'.$data['appointment_time'].'</td>
                              <td>'.$opdchargeamt.'</td>
                              <td>'.$doc.'</td>
                              <td>'.$waiting_time.'</td>
                              <td>'.$stat.'</td>
                            </tr>';
                        $sl1++;
                       
          }
          if($sl1>0)
          {
            $sl1=$sl1-1;
          }

          echo json_encode(array('msg' =>'success','dataview1'=>$html1,'cnt1'=>$sl1,'error'=>'','error_message' =>''));
      }
      else {
        
        echo json_encode(array('msg' =>'success','dataview1'=>'','cnt1'=>0,'error'=>'','error_message' =>''));
      }
      
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
}
