<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camp_billing_report extends CI_Controller {
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
        
        $this->load->model('Camp_billing_report_model');
        $this->load->model('Patient_appointment_report_model');
        $this->load->model('Common_model');
        $this->load->model('Camp_billing_model');
    }
  public function index()
  {
    $data['title']='EMR::CAMP Billing Report';
    $data['activecls']='Camp_billing_report';
    $office_id=$this->session->office_id;
    $var_array=array($office_id);
    $data['getpatient']=$this->Common_model->getpateintmrdnos($var_array);
    $data['getdoctor']=$this->Common_model->getdoctors($var_array);
    $data['type']=1;
    $data['modeofpays']=$this->Common_model->getmodeofpay($var_array);
    $data['chargeslist']=$this->Common_model->getchargeslist($var_array);
    $data['mrdnos']=$this->Camp_billing_model->getpateintmrdnosa($var_array);
    $content=$this->load->view('reports/camp_billing_report',$data,true);
    $this->load->view('includes/layout',['content'=>$content]);
  }

    public function getsummary()
    {
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
        $getresult=$this->Camp_billing_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay,$pat_type);
       
       
      if($getresult)
      {
          $pat=$doc=$mod=$pat1=$doc1='';	
		
$u=1;
$cash=0;
$card=0;
$paytm=0;
    $modedata=$this->Camp_billing_report_model->getmodemodel($this->session->userdata('office_id'),$det_modeofpay);
$html='<div class="row">';
 // 
    foreach($modedata as $datva)
       {
           $moden=$datva['name'];
           $modeofpay_idd=$datva['modeofpay_id'];

              $getresultd=$this->Camp_billing_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay);
                    $sumnetamoudnts1=0;
                    $sumnetamount1=0;
                    $sumnetamounts1=0;
                   // $cash=0;

                   // print_R($getresultd);exit;
              if($getresultd)
              {
                foreach($getresultd as $datavall)
                {
                if($datavall['adjusted_modeofpay_id']=='')
                {
                        
                                 
                         
                        
                    if($moden==$datavall['mode'])
                    {
                        

                        $fffffd=$this->Camp_billing_report_model->getbilldatedatemode($datavall['billing_master_id'],$sum_fromdate,$sum_todate);
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

                        $ffffd1f=$this->Camp_billing_report_model->getbilldatedatemode1($datavall['billing_master_id'],$sum_fromdate,$sum_todate);
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
                $sumnetamoudnts1+=$adamtt+$cash;
                $sumnetamount1+=$netamtt;
                $sumnetamounts1+=$adamtt1;
                   
                 }
             }
             else
             {

                   if($modeofpay_idd==$datavall['adjusted_modeofpay_id'])
                    {
                       // echo 1;exit;
                        $fffffd=$this->Camp_billing_report_model->getbilldatedatemode($datavall['billing_master_id'],$sum_fromdate,$sum_todate);
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

                        $ffffd1f=$this->Camp_billing_report_model->getbilldatedatemode1($datavall['billing_master_id'],$sum_fromdate,$sum_todate);
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

             $html.='
                  <div class="col-md-4">
                      <div class="alert alert-'.$cli.' mb-2" role="alert">
                       <h4 style="text-align:center;font-weight:bold;">'.$moden.':'.number_format((float)$sumnetamounts1+$sumnetamount1+$sumnetamoudnts1+$cash+$card+$paytm
            ,2,'.', '').'</h4>
                       </div>
                  </div>
                  ';
                  $u++;

       }


        $html.='</div><table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
            <thead>
                    <tr>
                         <th>SL NO</th>
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
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        $sumnetamounts=0;
        $sumnetamoudnts=0;
        $sumnetamount=$sumnetamount_patient='0.00';
        foreach ($getresult as $data) {
            // print_r($getresult);exit;
            // echo $this->db->last_query();exit;

           // $adamt1=$data['advanced_amount'];
            $admodname='';
            if($data['adjusted_modeofpay_id']>0)
            {
                $mdaname=$this->Camp_billing_report_model->getmodemodel($this->session->userdata('office_id'),$data['adjusted_modeofpay_id']);
                if($mdaname)
                {
                    foreach($mdaname as $datamod)
                    {
                        $admodname=$datamod['name'];
                    }
                }
            }

            $fffff=$this->Camp_billing_report_model->getbilldatedatemode($data['billing_master_id'],$sum_fromdate,$sum_todate);
            if($fffff)
            {
                 foreach ($fffff as $datdda) {
                 $adamt=$datdda['adjusted_amount_paid'];
                 $bdate=$datdda['adjustment_time_paid'];
                }
            }
            else
            {
                $adamt=0;
                $bdate='';
            }

            $ffff1f=$this->Camp_billing_report_model->getbilldatedatemode1($data['billing_master_id'],$sum_fromdate,$sum_todate);
            if($ffff1f)
            {
                 foreach ($ffff1f as $datsdda) {
                 $adamt1=$datsdda['advanced_amount'];
                 $bdate1='';
                }
            }
            else
            {
                $adamt1=0;
                $bdate1='';
            }
            if($adamt1>0 || $adamt>0)
            {
                $netamt=0;
            }
            else
            {
                $netamt=$data['grand_total'];
            }

         

       
            $html.='<tr>
                  <td>'.$sl.'</td>
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
                  <td>'.$adamt.'</td>
                  <td>'.$bdate.'</td>
                  <td>'.number_format($adamt1,2).'</td>
                  <td>'.number_format($netamt,2).'</td>
                </tr>';
                $sl++;
                $sumnetamoudnts+=$adamt;
                $sumnetamount+=$netamt;
                $sumnetamounts+=$adamt1;
             
        }
       
        $sumnetamount=$sumnetamount;
              $html.='<tr>
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
                    <td><b>Total</b></td>
                    <td><b>'.$sumnetamoudnts.'</b></td>
                    <td></td>
                    <td><b>'.number_format($sumnetamounts,2).'</b></td>
                    <td><b>'.number_format((float)$sumnetamount ,2,'.', '').'<br/>Total='.number_format($sumnetamoudnts,2).'+'.number_format($sumnetamounts,2).'+'.number_format($sumnetamount,2).'='.number_format($sumnetamounts+$sumnetamount+$sumnetamoudnts,2).'</b></td>
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
     $getresult=$this->Camp_billing_report_model->getdetailedreportmodel($det_fromdate,$det_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$particular,$charge_type_id,$det_modeofpay);
     
      if($getresult)
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
        
        $sumnetamount=$sumnetamount;
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
