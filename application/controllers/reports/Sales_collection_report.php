<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_collection_report extends CI_Controller {
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
        
        $this->load->model('Sales_collection_report_model');
        $this->load->model('Patient_appointment_report_model');
        $this->load->model('Common_model');
    }
  public function index()
  {
    $data['title']='EMR::Collection Report';
    $data['activecls']='Sales_collection_report';
    $office_id=$this->session->office_id;
    $var_array=array($office_id);
    $data['getpatient']=$this->Common_model->getpateintmrdnos($var_array);
    $data['getdoctor']=$this->Common_model->getdoctors($var_array);
    $data['type']=1;
    $data['modeofpays']=$this->Common_model->getmodeofpay($var_array);
    $data['chargeslist']=$this->Common_model->getchargeslist($var_array);
    // $data['getlens']=$this->Common_model->getlensmaster($var_array);
    // $data['getstaff']=$this->Common_model->GetStaffData($var_array);
    $content=$this->load->view('reports/sales_collection_report',$data,true);
    $this->load->view('includes/layout',['content'=>$content]);
  }

  public function modeboxes($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$office_id,$det_modeofpay,$pat_type)
  {
    $modedata=$this->Sales_collection_report_model->getmodemodel($this->session->userdata('office_id'),$det_modeofpay);
    $modedatacnt=  count($modedata);
        $html='';
        $u=1;
        foreach($modedata as $datva)
        {
              $amm=0;$doc='';$doc1='';
              $moden=$datva['name'];
              if($doctor_id>0)
              {
                $doc.=" and doctor_id in (select doctors_registration_id  from doctors_registration where doctors_registration_id=$doctor_id)";
              }
              if($patient_id>0)
              {
                $doc.=" and patient_registration_id in (select patient_registration_id  from patient_registration where patient_registration_id=$patient_id)";
              }

              if($doctor_id>0)
              {
                $doc1.="  and doctor_id in (select doctors_registration_id  from doctors_registration where doctors_registration_id=$doctor_id)";
              }
              if($patient_id>0)
              {
                $doc1.=" and patient_registration_id in (select patient_registration_id  from patient_registration where patient_registration_id=$patient_id)";
              }
              $counter_cn=$this->db->query("select (sum(grand_total)-sum(advanced_amount)) - sum(advanced_amount) as netamount_cn from billing_master   inner join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id where billing_date >= '$sum_fromdate' AND billing_date <= '$sum_todate'  and  modeofpay.name='$moden' $doc")->row();
              if($counter_cn->netamount_cn)
              {
                $amm+=$counter_cn->netamount_cn;
              }

              $counter_cn1=$this->db->query("select sum(pay_amount) as netamount_cn from billing_payment_detail   inner join modeofpay on billing_payment_detail.modeofpay_id=modeofpay.modeofpay_id
              inner join billing_master on billing_master.billing_master_id=billing_payment_detail.billing_master_id
              where pay_date >= '$sum_fromdate' AND pay_date <= '$sum_todate'  and  modeofpay.name='$moden' $doc1")->row();
              if($counter_cn1->netamount_cn)
              {
                $amm+=$counter_cn1->netamount_cn;
              }

              $patapp=$this->db->query("select  sum(opdcharge.amount) as totalamt
              from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
              
              inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
              left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
              where patient_appointment.cancel_flag=0 and billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate'   and  modeofpay.name='$moden'")->row();
              if($patapp->totalamt)
              {
                $amm+=$patapp->totalamt;
              }

              if($u==1)
              {
                 $cli='success';
              }
              elseif ($u==2) {
                 $cli='danger';
              }
              elseif ($u==3) {
                 $cli='info';
              }
              elseif ($u==4) {
                 $cli='primary';
              }
              elseif ($u==5) {
                 $cli='warning';
              }
              elseif ($u==6) {
                 $cli='secondary';
              }
              elseif ($u==7) {
                 $cli='danger';
              }
              else
              {
               $cli='success';
              }

              $html.=' <div class="col-md-3">
              <div class="alert alert-'.$cli.' mb-2" role="alert">
               <h4 style="text-align:center;font-weight:bold;">'.$moden.':'.number_format($amm,2).'</h4>
               </div>
          </div>';
          $u++;
            
        }
             
        return $html;
  }

    public function getsummary()
    {
      error_reporting(0);
      $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('patient_id', 'Patient Name', 'trim|min_length[1]|max_length[20]|numeric');
      $this->form_validation->set_rules('doctor_id', 'Doctor Name', 'trim|min_length[1]|max_length[20]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
        $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
        $patient_id=trim(htmlentities($this->input->post('patient_id')));
        $doctor_id=trim(htmlentities($this->input->post('doctor_id')));
        $pat_type=trim(htmlentities($this->input->post('pat_type')));
        $det_modeofpay=trim(htmlentities($this->input->post('modeofpay_id')));
        $getresult=$this->Sales_collection_report_model->getsummaryreportmodel_nnew($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay,$pat_type);
        // print_r($getresult);exit;
       // $getresult_patient=$this->Patient_appointment_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay,$pat_type);
        //print_r($getresult_patient);exit;
      if($getresult)
      {
          $pat=$doc=$mod=$pat1=$doc1='';    
        if($patient_id>0)
        {
            $pat=' and patient_appointment.patient_registration_id='.$patient_id;
            $pat1=' and billing_master.patient_registration_id='.$patient_id;
        }
        if($doctor_id>0)
        {
            $doc=' and billing_master.doctor_id='.$doctor_id;
            $doc1=' and patient_appointment.doctor_id='.$doctor_id;
        }
        if($det_modeofpay>0)
        {
            $mod=' and billing_master.modeofpay_id='.$det_modeofpay;
        }
$u=1;
$sumcol=0;
$cash=0;
$card=0;
$paytm=0;
$amm=0;
  $moodpayment=$this->modeboxes($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay,$pat_type);
$html='<div class="row"> '.$moodpayment.'';
        $html.='</div><table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
            <thead>
                    <tr>
                        
                         <th>Bill No</th>
                         <th>Bill Date</th>
                         <th>MRD NO</th>
                         <th>Patient Name</th>
                         <th>Doctor Name</th>
                         <th>Mode of Pay</th>
                         <th>Cash</th>
                         <th>Card</th>
                         <th>Paytm</th>
                         <th>Others</th>
                         <th>Insurance Amount</th>
                         <th>Advance Adjustment Modeofpay</th>
                         <th>Balance Amount</th>
                         <th>Advance Adjustment Date</th>
                         <th>Advance Amount</th>
                         <th>Bill Amount</th>
                         <th>Total Collection Amount</th>
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        $sumnetamounts=0;
        $sumnetamoudnts=0;
        $sumnetamount=$sumnetamount_patient='0.00';
        foreach ($getresult as $data) {
          
            

          if($data['typesec']==1){

            $amm=0;
            $adamt1=$data['advanced_amount'];
            $admodname='';
            $adjusted_amount_paid=$data['adjusted_amount_paid'];
            $balamt=$data['bill_amount']-$adjusted_amount_paid;
            if($data['adjusted_modeofpay_id']>0)
            {
              $adjusted_modeofpay_id=$data['adjusted_modeofpay_id'];
              $billdid=$data['billing_master_id'];
                $mdaname=$this->Sales_collection_report_model->getmodemodel($this->session->userdata('office_id'),$data['adjusted_modeofpay_id']);
                if($mdaname)
                {
                    foreach($mdaname as $datamod)
                    {
                        $admodname=$datamod['name'];
                    }
                }
                $adjusted_amount_paid=$data['adjusted_amount_paid']+$data['advanced_amount'];
                $balamt=$data['bill_amount']-$adjusted_amount_paid;

                $counter_cn1=$this->db->query("select sum(pay_amount) as netamount_cn from billing_payment_detail   
              inner join billing_master on billing_master.billing_master_id=billing_payment_detail.billing_master_id
              where pay_date >= '$sum_fromdate' AND pay_date <= '$sum_todate'  and  billing_payment_detail.modeofpay_id='$adjusted_modeofpay_id' and billing_payment_detail.billing_master_id=$billdid")->row();
              if($counter_cn1->netamount_cn)
              {
                $amm=$counter_cn1->netamount_cn;
              }
            }

            
            $adjustment_time_paid=$data['adjustment_time_paid'];

          
            $netamt=$data['bill_amount'];
         
            $tot=$data['grand_total']-$data['advanced_amount'];
            $tot1=$data['advanced_amount']+$amm;
            $balance=($data['bill_amount']-($data['adjusted_amount_paid']+$data['advanced_amount']))-$data['grand_total'];
            if($balance)
            {
              $balance=0;
            }
            else 
            {
              $balance=$balance;
            }
       
            $html.='<tr>
                
                  <td>'.$data['invoice_number'].'</td>
                  <td>'.$data['bill_date'].'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['mode'].'</td>
                  <td>'.$data['cash'].'</td>
                  <td>'.$data['card'].'</td>
                  <td>'.$data['paytm'].'</td>
                  <td>'.$data['others'].'</td>
                  <td>'.$data['insuranceamount'].'</td>
                  <td>'.$admodname.'</td>
                  <td>'.$balance.'</td>
                  <td>'.$adjustment_time_paid.'</td>
                  <td>'.number_format($adjusted_amount_paid,2).'</td>
                  <td>'.number_format($netamt,2).'</td>
                  <td>'.$tot1.'</td>
                </tr>';
                $sl++;
                $sumnetamoudnts+=$balance;
                $sumnetamount+=$netamt;
                $sumnetamounts+=$adjusted_amount_paid;
                $sumcol+=$tot1;
              }
              else
              {

                 $html.='<tr>
                 
                  <td>'.$data['invoice_number'].'</td>
                  <td>'.$data['bill_date'].'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['mode'].'</td>
                   <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>0.00</td>
                  <td>'.number_format($data['grand_total'],2).'</td>
                  <td>'.number_format($data['grand_total'],2).'</td>
                </tr>';
                $sl++;
                $sumnetamount_patient+=$data['grand_total'];
                $sumcol+=$data['grand_total'];
              }
             
        }
       
        $sumnetamount=$sumnetamount+$sumnetamount_patient;
              $html.='</tbody><tfoot><tr>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td><b>'.$sumnetamoudnts.'</b></td>
                    <td></td>
                    <td><b>'.number_format($sumnetamounts,2).'</b></td>
                    <td><b>'.number_format((float)$sumnetamount ,2,'.', '').'</b></td>
                    <td><b>'.number_format((float)$sumcol ,2,'.', '').'</td>
                  </tr>
                  <tfoot>
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

   public function getdetailed()
    {
        error_reporting(0);
      $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      
      if($this->form_validation->run() == TRUE)
      {
        $det_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
        $det_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
        $particular=trim(htmlentities($this->input->post('particular')));
        $patient_id=trim(htmlentities($this->input->post('patient_id')));
        $det_modeofpay=trim(htmlentities($this->input->post('modeofpay_id')));
        $doctor_id=trim(htmlentities($this->input->post('doctor_id')));
        $charge_type_id=trim(htmlentities($this->input->post('charge_type_id')));
     $getresult=$this->Sales_collection_report_model->getdetailedreportmodel($det_fromdate,$det_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$particular,$charge_type_id,$det_modeofpay);
     $getresult_patient=$this->Patient_appointment_report_model->getsummaryreportmodellj($det_fromdate,$det_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$particular,$charge_type_id);
      if($getresult || $getresult_patient)
      {
        $html='<table class="table table-striped table-bordered dataex-html5-selectors" id="example_det">
            <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>Bill No</th>
                         <th>Bill Date</th>
                         <th>MRD NO</th>
                         <th>Patient Name</th>
                         <th>Doctor Name</th>
                         <th>Insurance</th>
                         <th>Mode of Pay</th>
                         <th>Charge Type</th>
                         <th>Particular</th>
                         <th>Qty</th>
                         <th>Rate</th>
                         <th>Discount</th>
                         <th>Amount</th>
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        $sumnetamount=$sumnetamount_patient='0.00';
        foreach ($getresult as $data) {
           $getparticularname=$this->Common_model->getparticularsmodel($data['charge_id'],$data['particulars_id'],$this->session->userdata('office_id'));
           if($data['charge_id']==1)
           {
            $charge="CONSULTATION";
           }
           else if($data['charge_id']==2)
           {
            $charge="INPATIENT";
           }
           if($data['charge_id']==3)
           {
            $charge="LASER";
           }
           if($data['charge_id']==4)
           {
            $charge="INJECTION";
           }
           if($data['charge_id']==5)
           {
            $charge="INVESTIGATION";
           }
          
           
          
            $html.='<tr>
                  <td>'.$sl.'</td>
                  <td>'.$data['invoice_number'].'</td>
                  <td>'.$data['bill_date'].'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['insurance'].'</td>
                  <td>'.$data['mode'].'</td>
                  <td>'.$charge.'</td>
                  <td>'.$getparticularname[0]['name'].'</td>
                  <td>'.$data['qty'].'</td>
                  <td>'.number_format((float)$data['rate'],2,'.', '').'</td>
                  <td>'.number_format((float)$data['disamt'] ,2,'.', '').'</td>
                  <td>'.number_format((float)$data['amount'] ,2,'.', '').'</td>
                </tr>';
                $sl++;
                $sumnetamount+=$data['amount'];
        }
         foreach ($getresult_patient as $data_patient) {
           
          
            $html.='<tr>
                  <td>'.$sl.'</td>
                  <td>'.$data_patient['invoice_number'].'</td>
                  <td>'.$data_patient['appointment_date'].'</td>
                  <td>'.$data_patient['mrdno'].'</td>
                  <td>'.$data_patient['pname'].'</td>
                  <td>'.$data_patient['docname'].'</td>
                  <td>'.$data_patient['insurance'].'</td>
                  <td>'.$data_patient['modename'].'</td>
                  <td></td>
                  <td>'.$data_patient['particular'].'</td>
                  <td>1</td>
                  <td>'.number_format((float)$data_patient['grand_total'],2,'.', '').'</td>
                  <td>0.00</td>
                  <td>'.number_format((float)$data_patient['grand_total'] ,2,'.', '').'</td>
                </tr>';
                $sl++;
                $sumnetamount_patient+=$data_patient['grand_total'];
        }
        $sumnetamount=$sumnetamount+$sumnetamount_patient;
              $html.='
                  
                  <tr>
                    <td>'.$sl.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>'.number_format((float)$sumnetamount ,2,'.', '').'</td>
                  </tr>
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
}
