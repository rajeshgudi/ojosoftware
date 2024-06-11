<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        
        $this->load->model('Dashboard_model');
        $this->load->model('Total_combined_report_model');
         $this->load->model('Sales_collection_report_model');
        $this->load->model('Patient_appointment_report_model');
        $this->load->model('Common_model');
        $this->load->model('Patients_registration_model');
    }
	public function index()
	{
      $cind_doc='';
      $doctor_id_new_cond='';
      $cind_doc_ap='';
      if($this->session->userdata('user_type')==2)
      {
         $ll=$this->session->userdata('login_id');
         $doctor_id_new_cond=$this->db->get_where('user',"user_id=$ll")->row()->doctor_id;
         if($doctor_id_new_cond)
         {
           $cind_doc=" and doctor_id=$doctor_id_new_cond";
           $cind_doc_ap=" and patient_registration_id in (select patient_registration_id from patient_appointment where doctor_id=$doctor_id_new_cond)";
         }
      } 
      
      $data['title']='EMR::Dashboard';
      $data['activecls']='Dashboard';
      $cdate=date('Y-m-d');
      $office_id=$this->session->userdata('office_id');
      $var_array_ne=array($this->session->userdata('office_id'));
      $opto_user=3;
      $data['doctors']=$this->Common_model->getdoctors($var_array_ne);
      $data['user_data']=$this->Common_model->getallusercounseler($opto_user);
      $data['crossdocst_cnt'] =$this->Dashboard_model->crossdocst_cnt_model($cdate);
      $data['doctorapp'] =$this->Dashboard_model->Doctor_App_Status($doctor_id_new_cond);
      $data['Opto_waiting'] =$this->Dashboard_model->Get_Waiting_opto($doctor_id_new_cond);
      $data['Opto_inprogress'] =$this->Dashboard_model->Patient_status(1,0,$doctor_id_new_cond);
      $data['Opto_completed'] =$this->Dashboard_model->Patient_status(1,1,$doctor_id_new_cond);
      $data['Doc_wating'] =$this->Dashboard_model->Patient_status(2,0,$doctor_id_new_cond);
      $data['Doc_inprocess'] =$this->Dashboard_model->Patient_status(3,0,$doctor_id_new_cond);
      $data['Doc_comp'] =$this->Dashboard_model->Patient_status(3,1,$doctor_id_new_cond);
      $data['todaynew_patient'] = $this->db->query('SELECT count(*) as newcount FROM patient_registration where entry_date="'.$cdate.'" '.$cind_doc_ap.' ')->row()->newcount;
      $data['todaynewfol_patient'] = $this->db->query('SELECT count(*) as folcount FROM patient_appointment where appointment_date="'.$cdate.'"  '.$cind_doc.'  and  patient_registration_id NOT IN (select patient_registration_id from patient_registration  where entry_date="'.$cdate.'") ')->row()->folcount;
     // echo $this->db->last_query();exit;
      $data['today_patient'] = $this->db->query('SELECT count(*) as tcount FROM patient_appointment where appointment_date="'.$cdate.'" '.$cind_doc.' ')->row()->tcount;
      $today_collection = $this->db->query('SELECT sum(grand_total) as net_amount FROM billing_master where  billing_date="'.$cdate.'"  and office_id="'.$office_id.'" ')->row()->net_amount;


          


      $advancepatientcashamount=$this->db->query("select sum(opdcharge.amount) as total from patient_appointment  left join opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
        where appointment_date = '$cdate' and opdcharge.office_id='$office_id'    ")->row()->total;

       $pettycashcr=$this->db->query("select sum(petty_amount) as pettycashcr from petty_cash  where petty_date = '$cdate' and pay_type=1 and office_id='$office_id'")->row()->pettycashcr;
       $pettycashdr=$this->db->query("select sum(petty_amount) as pettycashdr from petty_cash  where petty_date = '$cdate' and pay_type=2 and office_id='$office_id'")->row()->pettycashdr;

      $today_collections=$today_collection+$advancepatientcashamount+$pettycashcr-$pettycashdr;
      
      $data['today_collection']=number_format($today_collections, 2);
      $data['petty_cashcr']=number_format($pettycashcr, 2);
      $data['pettycashdr']=number_format($pettycashdr, 2);
      $data['total_patient'] = $this->db->query('SELECT count(*) as tcount FROM patient_registration where office_id="'.$office_id.'" ')->row()->tcount;
      $data['total_doctors'] = $this->db->query('SELECT count(*) as tcount FROM doctors_registration where office_id="'.$office_id.'" ')->row()->tcount;
      if($this->session->userdata('user_type')==0)
      {
        $this->optdb = $this->load->database('optdb', TRUE);
        $this->pharmdb = $this->load->database('pharmdb', TRUE);
        $data['today_collection']=number_format($today_collections, 2);
        $today_optical_collection = $this->optdb->query('SELECT sum(advanced_amount) as advanced_amount FROM payment_details where  payment_date="'.$cdate.'"  and office_id="'.$office_id.'" ')->row()->advanced_amount;
        $data['today_optical_collection']=number_format($today_optical_collection, 2);

        $today_insurance_collection = $this->db->query('SELECT sum(insuranceamount) as insuranceamount FROM  billing_master where  billing_date="'.$cdate.'"  and office_id="'.$office_id.'" ')->row()->insuranceamount;
        $data['today_insurance_collection']=number_format($today_insurance_collection, 2);

        //$data['tot_col']=number_format($today_optical_collection+$today_collections, 2);
        $emrmodedata=$this->Total_combined_report_model->getemrmodel($this->session->userdata('office_id'));
        $opticalmodedata=$this->Total_combined_report_model->getopticalmodel($this->session->userdata('office_id'));
        $pharamcymodedata=$this->Total_combined_report_model->getpharmacymodel($this->session->userdata('office_id'));
 $datmode1='';
 $sumoptots=0;
 $cash=0;
$card=0;
$paytm=0;
error_reporting(0);
        if($emrmodedata)
     {

      foreach($emrmodedata as $modd)
      {
        $moden=$modd['name'];
        $modeofpay_idd=$modd['modeofpay_id'];
       $sum_fromdate=$sum_todate=date('Y-m-d');$patient_id=$doctor_id=$det_modeofpay='';
 $getresultd=$this->Sales_collection_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay);
                    $sumnetamoudnts1=0;
                    $sumnetamount1=0;
                    $sumnetamounts1=0;
              if($getresultd)
              {
                foreach($getresultd as $datavall)
                {
                    if($moden==$datavall['mode'])
                    {
                        $fffffd=$this->Sales_collection_report_model->getbilldatedatemode($datavall['billing_master_id'],$sum_fromdate,$sum_todate);
                        if($fffffd)
                        {
                             foreach ($fffffd as $datsdda) {
                             $adamtt=$datsdda['adjusted_amount_paid'];
                             
                            }
                        }
                        else
                        {
                            $adamtt=0;
                        }

                        $ffffd1f=$this->Sales_collection_report_model->getbilldatedatemode1($datavall['billing_master_id'],$sum_fromdate,$sum_todate);
                        if($ffffd1f)
                        {
                             foreach ($ffffd1f as $datsddda) 
                             {
                                 $adamtt1=$datsddda['advanced_amount'];
                             }
                        }
                        else
                        {
                            $adamtt1=0;
                        }

                        if($adamtt1>0 || $adamtt>0)
                        {
                            $netamtt=0;
                        }
                        else
                        {
                            $netamtt=$datavall['grand_total'];
                        }

                    $sumnetamoudnts1+=$adamtt;
                    $sumnetamount1+=$netamtt;
                    $sumnetamounts1+=$adamtt1;
                  }
                                 if($moden=='CASH')
                                {
                                    if($datavall['cash'])
                                    {
                                        $cash+=number_format($datavall['cash']);
                                    }
                                }
                                else
                                {
                                    $cash=0;
                                }
                                if($moden=='CARD')
                                {
                                    if($datavall['card'])
                                    {
                                         $card+=number_format($datavall['card']);
                                    }
                                }
                                else
                                {
                                    $card=0;
                                }

                                if($moden=='PAYTM')
                                {
                                    if($datavall['paytm'])
                                    {
                                         $paytm+=number_format($datavall['paytm']);
                                    }
                                }
                                else
                                {
                                    $paytm=0;
                                }
                }
              }

    //   $advancecashamount=$this->db->query("select sum(billing_master.grand_total) as total from billing_master  left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
    //     where  billing_date = '$cdate' and  billing_master.modeofpay_id='$modeofpay_idd'")->row();

    //    $advancecashamountp=$this->db->query("select sum(billing_master.advanced_amount) as totalp from billing_master  left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
    //     where  adjustment_time_paid = '$cdate' and  billing_master.modeofpay_id='$modeofpay_idd'")->row();

      $patapp=$this->db->query("select  sum(opdcharge.amount) as totalamt
    from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
    
    inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
    left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
    where billing=0 and appointment_date =  '$cdate'   and patient_appointment.modeofpay_id='$modeofpay_idd'")->row();

                              


      $datmode1.='<tr><td>'.$modd['name'].'</td><td>'.number_format((float)$sumnetamounts1+$sumnetamount1+$sumnetamoudnts1+$patapp->totalamt+$cash+$card+$paytm
            ,2,'.', '').'</td></tr>';
      $sumoptots+=number_format((float)$sumnetamounts1+$sumnetamount1+$sumnetamoudnts1+$patapp->totalamt,2,'.', '');

      }
     }
      $modenc='';
      $sumoptot=0;
      if($opticalmodedata)
     {
      foreach($opticalmodedata as $dataopticalmode)
      {
        $moden=$dataopticalmode['name'];
        
         $advancecashamount=$this->optdb->query("select sum(payment_details.advanced_amount) as advanced_amount from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where payment_date = '$cdate'  and  modeofpay.name='$moden'")->row();

           $counter_cn=$this->optdb->query("select sum(netamount) as netamount_cn from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date = '$cdate'  and  modeofpay.name='$moden'")->row();

        if($moden=='CASH')
        {
            $counter_cn=0;
          $totcash=$this->optdb->query("select sum(payment_details.cash) as totcasht from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'  $staffcond  $stacond  $cus")->row();

            $counter_cash=$this->optdb->query("select sum(netamount) as netamount_cn from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date = '$cdate' and  modeofpay.name='$moden'")->row();

           $cash= $totcash->totcasht+$counter_cash->netamount_cn;
        }
        else
        {
          $cash=0;
        }

        if($moden=='CARD')
        {
             $counter_cn=0;
          $totcard=$this->optdb->query("select sum(payment_details.card) as totcardt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'  $staffcond  $stacond  $cus")->row();

          $counter_card=$this->optdb->query("select sum(netamount) as netamount_cn from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date = '$cdate' and  modeofpay.name='$moden'")->row();

           $card= $totcard->totcardt+$counter_card->netamount_cn;
        }
        else
        {
          $card=0;
        }

        if($moden=='PAYTM')
        {
             $counter_cn=0;
          $totpaytm=$this->optdb->query("select sum(payment_details.paytm) as totpaytmt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'  $staffcond  $stacond  $cus")->row();

          $counter_paytm=$this->optdb->query("select sum(netamount) as netamount_cn from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date = '$cdate' and  modeofpay.name='$moden'")->row();

           $paytm= $totpaytm->totpaytmt+$counter_paytm->netamount_cn;
        }
        else
        {
          $paytm=0;
        }

         
         $modenc.='<tr><td>'.$dataopticalmode['name'].'</td><td>'.number_format((float)$advancecashamount->advanced_amount+$counter_cn->netamount_cn+$cash+$card+$paytm,2,'.', '').'</td></tr>';
         $sumoptot+=number_format((float)$advancecashamount->advanced_amount+$counter_cn->netamount_cn+$cash+$card+$paytm,2,'.', '');

      }
     }
       
     $modencp='';
      $sumoptotp=0;
      if($pharamcymodedata)
     {
      foreach($pharamcymodedata as $datapharmcymode)
      {
        $moden=$datapharmcymode['name'];
        
         $advancecashamount=$this->pharmdb->query("select sum(netamount) as advanced_amount from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
        where sales_date = '$cdate'  and  modeofpay.name='$moden'")->row();

        if($moden=='CASH')
        {
          $totcash=$this->pharmdb->query("select sum(cash) as totcasht from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
           $cash= $totcash->totcasht;
        }
        else
        {
          $cash=0;
        }

        if($moden=='CARD')
        {
          $totcard=$this->pharmdb->query("select sum(card) as totcardt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
           $card= $totcard->totcardt;
        }
        else
        {
           $card=0;
        }

        if($moden=='PAYTM')
        {
          $totpaytm=$this->pharmdb->query("select sum(paytm) as totpaytmt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
           $paytm= $totpaytm->totpaytmt;
        }
        else
        {
           $paytm=0;
        }

         
         $modencp.='<tr><td>'.$datapharmcymode['name'].'</td><td>'.number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm,2,'.', '').'</td></tr>';
         $sumoptotp+=number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm,2,'.', '');

      }
     }
     $data['emrmodedata']=$datmode1;
     $data['emrtotmodedata']=number_format($sumoptots+$pettycashcr-$pettycashdr,2);
$cnamt=0;
    $sql_k = "select sum(netamount) as cntamt from counter_sales_master where sales_date>= '$sum_fromdate' AND sales_date <='$sum_todate'";
    $result_rosw=$this->optdb->query($sql_k); 
    $resd= $result_rosw->result_array ();
    if($resd)
    {
        $cnamt=$resd[0]['cntamt'];
    }
     $data['cnammt']=$cnamt;
     //$modenc.='<tr><td>Counter Sales</td><td>'.$cnamt.'</td></tr>';
     $data['opticalmodedata']=$modenc;
     $data['opticaltotmodedata']=number_format($sumoptot,2);

     $data['pharmmodedata']=$modencp;
     $data['pharmtotmodedata']=number_format($sumoptotp,2);
     $data['tot_col']=number_format($sumoptotp+$sumoptot+$sumoptots+$pettycashcr-$pettycashdr,2);

      }
      $content=$this->load->view('master/dashboard',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
  public function pat_view()
  {
    
    $doctor_id=$this->input->post('docid');
    if($doctor_id>0)
    {
       $pat_Det_Doc =$this->Dashboard_model->pat_Det_Doc($doctor_id);
      // print_R($pat_Det_Doc);exit;
       if($pat_Det_Doc)
       {
        $html='<table id="pp_pat" class="table table-bordered table-hover"><thead><tr><th>SL NO</th><th>Patient Name</th><th>Appointment Time</th><th>Status</th></tr></thead><tbody>';
        $sl=1;
        $stat='';
          foreach ($pat_Det_Doc as $datadoc) 
          {
              $pateint_name=$datadoc['pateint_name'];
              $patient_registration_id=$datadoc['patient_registration_id'];
              $patient_appointment_id=$datadoc['patient_appointment_id'];
              $mrdno=$datadoc['mrdno'];
              $appointment_time=$datadoc['appointment_time'];
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
				            			$stat='<p style="color:red;">Optometry inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:green;">Optometry Completed</p>';
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

                    $html.='<tr>
                        <td>'.$sl.'</td> 
                        <td>'.$pateint_name.'</td> 
                        <td>'.$appointment_time.'</td> 
                        <td>'.$stat.'</td> 
                    </tr>';
                    $sl++;

          }
          $html.='</tbody></table>';
          echo json_encode(array('msg' =>$html,'error'=>'','error_message' =>''));
       }
       else {
          echo json_encode(array('msg' =>'','error'=> 'No Appointment','error_message' =>''));
       }
    }
  }
  public function patview_status()
  {
    error_reporting(0);
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
              $rooming=$data['rooming'];
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
                    $stat='<p style="color:#fff;">Nill</p>';
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
				            			$stat='<p style="color:#fff;">Optometry inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Optometry Completed</p>';
				            		}
				            	}

				            	if($confirm_flag==1)
				            	{
				            		$doc_action=$res1[0]['doc_action'];
				            		if($doc_action==0)
				            		{
				            			$stat='<p style="color:#fff;">Consultant Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Consultant Completed</p>';
				            		}
				            	}
				            }
                    $classn='bgsts';
                    if($rooming==1)
                    {
                      $classn='';
                      $stat='<a class="buttonbl" href="#">IN</a>';
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

                       

                        $html1.='<tr>
                                <td>'.$data['token_no'].'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td class="'.$classn.'">'.$stat.'</td>
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
                    $stat='<p style="color:#fff;">Nill</p>';
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
				            			$stat='<p style="color:#fff;">Optometry inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Optometry Completed</p>';
				            		}
				            	}

				            	if($confirm_flag==1)
				            	{
				            		$doc_action=$res1[0]['doc_action'];
				            		if($doc_action==0)
				            		{
				            			$stat='<p style="color:#fff;">Consultant Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Consultant Completed</p>';
				            		}
				            	}
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

                       

                        $html2.='<tr>
                                <td>'.$data['token_no'].'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td class="bgsts">'.$stat.'</td>
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
                    $stat='<p style="color:#fff;">Nill</p>';
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
				            			$stat='<p style="color:#fff;">Optometry inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Optometry Completed</p>';
				            		}
				            	}

				            	if($confirm_flag==1)
				            	{
				            		$doc_action=$res1[0]['doc_action'];
				            		if($doc_action==0)
				            		{
				            			$stat='<p style="color:#fff;">Consultant Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Consultant Completed</p>';
				            		}
				            	}
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

                       

                        $html3.='<tr>
                                <td>'.$data['token_no'].'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td class="bgsts">'.$stat.'</td>
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
                    $stat='<p style="color:#fff;">Nill</p>';
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
				            			$stat='<p style="color:#fff;">Optometry inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Optometry Completed</p>';
				            		}
				            	}

				            	if($confirm_flag==1)
				            	{
				            		$doc_action=$res1[0]['doc_action'];
				            		if($doc_action==0)
				            		{
				            			$stat='<p style="color:#fff;">Consultant Inprogress</p>';
				            		}
				            		else
				            		{
				            			$stat='<p style="color:#fff;">Consultant Completed</p>';
				            		}
				            	}
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

                       

                        $html4.='<tr>
                                <td>'.$data['token_no'].'</td>
                                <td><c>'.$data['pateint_name'].' '.$new.'</c></td>
                                <td>'.$data['mrdno'].'</td>
                                <td>'.$data['dateofbirth'].' & '.$data['ageyy'].'</td>
                                <td>'.$data['appointment_time'].'</td>
                                <td>'.$opdchargeamt.'</td>
                                <td>'.$doc.'</td>
                                <td>'.$waiting_time.'</td>
                                <td class="bgsts">'.$stat.'</td>
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
                        $stat='<p style="color:red;">Optometry inprogress</p>';
                      }
                      else
                      {
                        $stat='<p style="color:green;">Optometry Completed</p>';
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

                     

                      $html1.='<tr>
                              <td>'.$data['token_no'].'</td>
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
 public function Get_cross_data()
{
    $doc_id=$this->input->post('doc_id');
    $cross_date_pic=$this->input->post('cross_date_pic');
    if($cross_date_pic)
    {
        $get_result=$this->Dashboard_model->Getcross_rreddata($cross_date_pic,$doc_id);
        //print_r($get_result);exit;
        if($get_result)
        {
            $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="data_cross"><thead></tr><th>SL No</th><th>Optometrist Date</th><th>Cross Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor Name</th><th>Cross Doctor Name</th><th>Description</th></tr></thead><tbody>';
          $sl=1;
            foreach ($get_result as $data) 
            {
                $docname=$this->db->select('name')
                ->from('doctors_registration')
                ->where(array('doctors_registration_id'=>$data['cross_doctor_id']))
                ->get()->row()->name;

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
                  $dia='';
                  if($data['dialysis_con']==2)
                  {
                    $dia='<span class="badge badge-success">Dilation</span>';
                  }
                  $fl=2;
                  $socurce=$sc='';
                $var_array=array($data['patient_registration_id'],$this->session->userdata('office_id'));
                $getmaster_so=$this->Common_model->Get_Pat_Source($var_array);
                if($getmaster_so)
                {
                    $socurce=$getmaster_so[0]['source'];
                    $sc="<y style='color:green;font-weight:bold'>Source:$socurce</y>";
                }
                  $chkvalfd=$data['pateint_name'];
                  $nwpri='<td><button type="button" class="btn btn-success" onclick="examinationnewprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>';
                $html.='<tr><td>'.$sl.'</td><td>'.$data['opthdate'].'</td><td>'.$data['cross_date'].'</td><td>'.$chkvalfd.'  '.$dia.' '.$sc.'</td><td>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td>'.$docname.'</td><td>'.$data['cross_description'].'</td></tr>';
            $sl++;
            
            }
            $ssl=$sl-1;
            $crosscnt=$ssl;
            $html.='</tbody></table></div>';
            echo json_encode(array('msg' =>$html,'crosscnt'=>$crosscnt,'error'=>'','error_message' =>''));
        }
        else {
            echo json_encode(array('msg' =>'','error'=>'No data found','error_message' =>''));
        }
    }
}
}
