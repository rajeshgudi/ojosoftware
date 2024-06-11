<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Total_combined_report extends CI_Controller {
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
        
        $this->load->model('Total_combined_report_model');
        $this->load->model('Common_model');
         $this->load->model('Sales_collection_report_model');
    }
    public function index()
    {
        $data['title']='EMR::Total Combined Report';
        $data['activecls']='Total_combined_report';
        $office_id=$this->session->office_id;
        $var_array=array($office_id);
        $content=$this->load->view('reports/total_combined_report',$data,true);
        $this->load->view('includes/layout',['content'=>$content]);
    }

    public function getsummary()
    {
        error_reporting(0);
      $office_id=$this->session->office_id;
      $this->optdb = $this->load->database('optdb', TRUE);
      $this->pharmdb = $this->load->database('pharmdb', TRUE);
      $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      if($this->form_validation->run() == TRUE)
      {
        $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
        $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
        $opticalmodedata=$this->Total_combined_report_model->getopticalmodel($this->session->userdata('office_id'));
        $pharmmodedata=$this->Total_combined_report_model->getpharmacymodel($this->session->userdata('office_id'));
        $emrmodedata=$this->Total_combined_report_model->getemrmodel($this->session->userdata('office_id'));
        // $getresult=$this->Sales_return_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$sum_customer,$sum_modeofpay,$this->session->userdata('office_id'));
     $datmode='';
     $modenc='';
     $datmode1='';
     $modencdep='';
     $sumoptot=0;
     $sumoptots=0;
     $datmodep='';
     $modencp='';
     $sumoptotp=0;
      $cashtot=0;
       $rescounter= $this->modeofcountersales($sum_fromdate,$sum_todate);
        $res_insuranceamount= $this->Totalinsuranceamount($sum_fromdate,$sum_todate);
       $rescounter_tot= $this->modeofcountersales_total($sum_fromdate,$sum_todate);
     if($opticalmodedata)
     {
      foreach($opticalmodedata as $dataopticalmode)
      {
      
        $moden=$dataopticalmode['name'];
        $datmode.='<th>'.$dataopticalmode['name'].'</th>';
         $advancecashamount=$this->optdb->query("select sum(payment_details.advanced_amount) as advanced_amount from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate' and  modeofpay.name='$moden'")->row();

          $counter_tot=0;
        
        if($moden=='CASH')
        {
            $counter_tot=0;
          $totcash=$this->optdb->query("select sum(payment_details.cash) as totcasht from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'")->row();

           $counter_cash=0;

           $cash+= $totcash->totcasht;
        }
        else
        {
          $cash=0;
        }

        if($moden=='CARD')
        {

             $counter_tot=0;
          $totcard=$this->optdb->query("select sum(payment_details.card) as totcardt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'")->row();

           $counter_card=0;

           $card+= $totcard->totcardt;
        }
        else
        {
          $card=0;
        }

        if($moden=='PAYTM')
        {
             $counter_tot=0;
          $totpaytm=$this->optdb->query("select sum(payment_details.paytm) as totpaytmt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'")->row();

          $counter_paytm=0;

           $paytm+= $totpaytm->totpaytmt;
        }
        else
        {
          $paytm=0;
        }

         $modenc.='<td>'.number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm,2,'.', '').'</td>';
         $sumoptot+=number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm,2,'.', '');
         if($moden=='CASH')
         {
          $cashtot+=$advancecashamount->advanced_amount;
         }
         
      }
     }
// $datmode.='<th>Counter Sales</th>';
//     $cnamt=0;
//     $sql_k = "select sum(netamount) as cntamt from counter_sales_master where sales_date>= '$sum_fromdate' AND sales_date <='$sum_todate'";
//     $result_rosw=$this->optdb->query($sql_k); 
//     $resd= $result_rosw->result_array ();
//     if($resd)
//     {
//         $cnamt=$resd[0]['cntamt'];
//     }
// $modenc.='<td>'.$cnamt.'</td>';
$cash=0;
$card=0;
$paytm=0;
$sumoptot+=$cnamt;
      if($pharmmodedata)
     {
      foreach($pharmmodedata as $datapharmmode)
      {
        $moden=$datapharmmode['name'];
        $datmodep.='<th>'.$datapharmmode['name'].'</th>';
         $advancecashamount=$this->pharmdb->query("select sum(sales_master.netamount) as advanced_amount from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' and  modeofpay.name='$moden'")->row();

        if($moden=='CASH')
        {
          $totcash=$this->pharmdb->query("select sum(cash) as totcasht from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'")->row();
           $cash= $totcash->totcasht;
        }
        else
        {
          $cash=0;
        }

        if($moden=='CARD')
        {
          $totcard=$this->pharmdb->query("select sum(card) as totcardt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'")->row();
           $card= $totcard->totcardt;
        }
        else
        {
           $card=0;
        }

        if($moden=='PAYTM')
        {
          $totpaytm=$this->pharmdb->query("select sum(paytm) as totpaytmt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'")->row();
           $paytm= $totpaytm->totpaytmt;
        }
        else
        {
           $paytm=0;
        }

         $modencp.='<td>'.number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm,2,'.', '').'</td>';
         $sumoptotp+=number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm,2,'.', '');
          if($moden=='CASH')
         {
          $cashtot+=$advancecashamount->advanced_amount;
         }
      }
     }
$adamtt=0;
     if($emrmodedata)
     {
      foreach($emrmodedata as $modd)
      {
        $moden=$modd['name'];
        $modeofpay_idd=$modd['modeofpay_id'];
        $datmode1.='<th>'.$modd['name'].'</th>';

      $patient_id=$doctor_id=$det_modeofpay='';
 $getresultd=$this->Sales_collection_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay);
                    $sumnetamoudnts1=0;
                    $sumnetamount1=0;
                    $sumnetamounts1=0;
              if($getresultd)
              {
                foreach($getresultd as $datavall)
                {
                  if($datavall['adjusted_modeofpay_id']=='')
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
               }
               else
               {
                   if($modeofpay_idd==$datavall['adjusted_modeofpay_id'])
                    {
                       // echo 1;exit;
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

      // $advancecashamount=$this->db->query("select sum(billing_master.grand_total) as total from billing_master  left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
      //   where billing_date >= '$sum_fromdate' AND billing_date <= '$sum_todate' and  billing_master.modeofpay_id='$modeofpay_idd'")->row();

      //    $advancecashamountp=$this->db->query("select sum(billing_master.advanced_amount) as totalp from billing_master  left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id
      //   where  adjustment_time_paid >= '$sum_fromdate' AND adjustment_time_paid <= '$sum_todate' and  billing_master.modeofpay_id='$modeofpay_idd'")->row();

      $patapp=$this->db->query("select  sum(opdcharge.amount) as totalamt
    from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
    
    inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
    left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
    where billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate'  and patient_appointment.modeofpay_id='$modeofpay_idd'")->row();

      $modencdep.='<td>'.number_format((float)$sumnetamounts1+$sumnetamount1+$sumnetamoudnts1+$patapp->totalamt+$cash+$card+$paytm
            ,2,'.', '').'</td>';
      $sumoptots+=number_format((float)$sumnetamounts1+$sumnetamount1+$sumnetamoudnts1+$patapp->totalamt,2,'.', '');

      }
     }

      $pettycashcr=$this->db->query("select sum(petty_amount) as pettycashcr from petty_cash  where petty_date between '$sum_fromdate' and '$sum_todate' and pay_type=1 and office_id='$office_id'")->row()->pettycashcr;

       $pettycashdr=$this->db->query("select sum(petty_amount) as pettycashdr from petty_cash  where petty_date between '$sum_fromdate' and '$sum_todate' and pay_type=2 and office_id='$office_id'")->row()->pettycashdr;


       /////////////////////////totall///////////////
        $getalllmodepay=$this->allpaymode($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$det_modeofpay);

   
      
       ///////////////////end total/////////

         
            $html=' 
'.$rescounter.'
            '.$htmll.'<table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
                    <thead>
            <tr>
            <th>SL NO</th>
            <th>EMR</th>
            '.$datmode1.'
            <th>Petty Cash (Cr)</th>
            <th>Petty Cash (Dr)</th>
             <th>Total</th>
           </tr>
                   

                     </thead>
                   <tbody>';
            
                                $html.='
                  <tr>
                  <td>1</td>
                  <td>EMR</td>
                  '.$modencdep.'
                  
                  <td>'.$pettycashcr.'</td>
                  
                  <td>'.$pettycashdr.'</td>
                  <td>'.number_format((float)($sumoptots+$pettycashcr-$pettycashdr),2,'.', '').'</td>
                </tr>
                   
                     
                     <tr>
                         <th>2</th>
                         <th>Pharmacy</th>
                         '.$datmodep.'
                         <th>Total</th>
                         <th></th>
                     </tr>
                       <tr>
                        <td>3</td>
                        <td>Pharmacy</td>
                        '.$modencp.'
                        <td>'.number_format((float)$sumoptotp,2,'.', '').'</td>
                        <td></td>

                    </tr>
                 


                    <tr>
                    <th>4</th>
                    <th>Optical</th>
                    '.$datmode.'
                    <th>Total</th>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>

                <tr>
                <td>5</td>
                <td>Optical</td>
                '.$modenc.'
                <td>'.number_format((float)$sumoptot,2,'.', '').'</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
               
                    
                  </tbody>
                 
                                </table>';
            
$html.='<h3 style="float:right;color:red;font-weight: bold;">Total :'.number_format((float)$sumoptotp+$sumoptots+$sumoptot+$rescounter_tot+$pettycashcr-$pettycashdr+$res_insuranceamount,2,'.', '').' </h3><br/><b style="color:#c2185b;float:right;">Note:Total amount inclusive of insurance amount</b>';
              $this->msg='success';
              $this->error='';
              $this->error_message ='';
                    echo json_encode(array(
                  'msg'           => $this->msg,
                  'error'         => $this->error,
                  'error_message' => $this->error_message,
                  'getdata' => $html,
                  'almod' => $getalllmodepay
                ));
                  exit;
          
        
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
  public function allpaymode($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$det_modeofpay)
  {
    $u=1;
$cash=0;
$card=0;
$paytm=0;

    $modedata=$this->Sales_collection_report_model->getmodemodel($this->session->userdata('office_id'),$det_modeofpay);
$html='<div class="row">';
 // 
    foreach($modedata as $datva)
       {

           $moden=$datva['name'];
           $modeofpay_idd=$datva['modeofpay_id'];
     $getresultd=$this->Sales_collection_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay);

               if($getresultd)
              {
                 $sumnetamoudnts1=0;
                    $sumnetamount1=0;
                    $sumnetamounts1=0;
                foreach($getresultd as $datavall)
                {
                if($datavall['adjusted_modeofpay_id']=='')
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

    $patapp=$this->db->query("select  sum(opdcharge.amount) as totalamt
    from patient_registration inner join patient_appointment on patient_appointment.patient_registration_id=patient_registration.patient_registration_id 
    
    inner join  opdcharge on patient_appointment.appointment_opd_charge_id=opdcharge.opdcharge_id
    left join modeofpay on patient_appointment.modeofpay_id=modeofpay.modeofpay_id
    where patient_appointment.cancel_flag=0 and billing=0 and appointment_date between  '$sum_fromdate' and '$sum_todate'  and patient_appointment.modeofpay_id='$modeofpay_idd'   ")->row();

        $this->optdb = $this->load->database('optdb', TRUE);
        $this->pharmdb = $this->load->database('pharmdb', TRUE);

        $advancecashamountopt=$this->optdb->query("select sum(payment_details.advanced_amount) as advanced_amount from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate' and  modeofpay.name='$moden'")->row();

        if($moden=='CASH')
        {
          $totcash=$this->optdb->query("select sum(payment_details.cash) as totcasht from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'")->row();

           

           $cash+= $totcash->totcasht;
        }
        else
        {
          $cash+=0;
        }

        if($moden=='CARD')
        {
          $totcard=$this->optdb->query("select sum(payment_details.card) as totcardt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'")->row();
           $card+= $totcard->totcardt;
        }
        else
        {
          $card+=0;
        }

        if($moden=='PAYTM')
        {
          $totpaytm=$this->optdb->query("select sum(payment_details.paytm) as totpaytmt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'")->row();
           $paytm+= $totpaytm->totpaytmt;
        }
        else
        {
          $paytm+=0;
        }


            $advancecashamount=$this->pharmdb->query("select sum(netamount) as advanced_amount from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' and  modeofpay.name='$moden'")->row();

        if($moden=='CASH')
        {
          $totcash=$this->pharmdb->query("select sum(cash) as totcasht from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
           $cash+= $totcash->totcasht;
        }
        else
        {
          $cash+=0;
        }

        if($moden=='CARD')
        {
          $totcard=$this->pharmdb->query("select sum(card) as totcardt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
           $card+= $totcard->totcardt;
        }
        else
        {
           $card+=0;
        }

        if($moden=='paytm')
        {
          $totpaytm=$this->pharmdb->query("select sum(paytm) as totpaytmt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
          left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
           $paytm+= $totpaytm->totpaytmt;
        }
        else
        {
           $paytm+=0;
        }


        //  $counter_tot=$this->optdb->query("select sum(netamount) as m_counter from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  and  modeofpay.name='$moden'")->row();
        
        // if($moden=='CASH')
        // {
        //    // $counter_tot=0;
          

        //    $counter_cash=$this->optdb->query("select sum(netamount) as m_cash from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' and  modeofpay.name='$moden'")->row();

        //    $cash+= $counter_cash->m_cash;
        // }
        // else
        // {
        //   $cash+=0;
        // }

        // if($moden=='CARD')
        // {

        //      //$counter_tot=0;
         

        //    $counter_card=$this->optdb->query("select sum(netamount) as m_card from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' and  modeofpay.name='$moden'")->row();

        //    $card+= $counter_card->m_card;
        // }
        // else
        // {
        //   $card+=0;
        // }

        // if($moden=='PAYTM')
        // {
        //      //$counter_tot=0;
        

        //   $counter_paytm=$this->optdb->query("select sum(netamount) as m_paytm from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'")->row();

        //    $paytm+= $counter_paytm->m_paytm;
        // }
        // else
        // {
        //   $paytm+=0;
        // }

       
         
      

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
                       <h4 style="text-align:center;font-weight:bold;">'.$moden.':'.number_format((float)$sumnetamounts1+$sumnetamount1+$sumnetamoudnts1+$patapp->totalamt+$cash+$card+$paytm+$advancecashamount->advanced_amount+$advancecashamountopt->advanced_amount
            ,2,'.', '').'</h4>
                       </div>
                  </div>
                  ';
                  $u++;
  }
  
$off=$this->session->userdata('office_id');
  $today_insurance_collection = $this->db->query("SELECT sum(insuranceamount) as insuranceamount FROM  billing_master where  billing_date between '$sum_fromdate' and '$sum_todate'   and office_id='$off'")->row()->insuranceamount;
       
  $html.='<div class="col-md-4">
  <div class="alert alert-info mb-2" role="alert">
   <h4 style="text-align:center;font-weight:bold;">Insurance Amount:'.number_format($today_insurance_collection,2).'</h4>
   </div>
  </div>';

return $html;

  }

   public function getdetailed()
    {
      $this->form_validation->set_rules('det_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('det_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('det_item', 'Item', 'trim|min_length[1]|max_length[20]|numeric');
      $this->form_validation->set_rules('det_lens', 'Lens', 'trim|min_length[1]|max_length[20]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $det_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('det_fromdate')))));
        $det_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('det_todate')))));
        $det_customer=trim(htmlentities($this->input->post('det_customer')));
        $det_modeofpay=trim(htmlentities($this->input->post('det_modeofpay')));
        $det_item=trim(htmlentities($this->input->post('det_item')));
        $det_lens=trim(htmlentities($this->input->post('det_lens')));
         $getresult=$this->Sales_return_report_model->getdetailedreportmodel($det_fromdate,$det_todate,$det_customer,$det_modeofpay,$this->session->userdata('office_id'),$det_item,$det_lens);
          if($getresult)
          {
            $html='<table class="table table-striped table-bordered dataex-html5-selectors" id="example_det">
                    <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>Customer Name</th>
                         <th>Date</th>
                         <th>Invoice No</th>
                         <th>Item Code</th>
                         <th>Item Name</th>
                         <th>Quantity</th>
                         <th>Rate</th>
                         <th>Total</th>
                         <th>Item Type</th>
                         <th>Frame Type</th>
                         <th>Frame Color</th>
                         <th>Frame Size</th>
                         <th>Frame Model</th>
                         <th>Lens Type</th>
                         <th>Lens Coating</th>
                     </tr>
                     </thead>
                   <tbody>';
            $sl=1;
            $sumnetamount='0.00';
            foreach ($getresult as $data) {
            if($data['product_type']==0)
            {
              $protype="Frame";
              $frametype_array=array($data['frame_type'],$this->session->userdata('office_id'));
              $frame_type=$this->Common_model->GetframeclassficationData($frametype_array);
              $frame_type=$frame_type[0]['name'];
              $framecolor_array=array($data['frame_color'],$this->session->userdata('office_id'));
              $frame_color=$this->Common_model->GetframeclassficationData($framecolor_array);
              $frame_color=$frame_color[0]['name'];
              $framesize_array=array($data['frame_size'],$this->session->userdata('office_id'));
              $frame_size=$this->Common_model->GetframeclassficationData($framesize_array);
              $frame_size=$frame_size[0]['name'];
              $getresultlenscoating='';
              $getresultlenstype='';
              $itemcode=$data['itemcode'];
              $itemname=$data['itemname'];
              $framemodel=$data['frame_model'];
            }
            else if($data['product_type']==1)
            {
              $frame_type='';
              $frame_color='';
              $frame_size='';
              $framemodel='';
              $protype="Lens";
              $lens_array=array($data['stock_id'],$this->session->userdata('office_id'));
              $getresultlenstype=$this->Common_model->GetLenstypeData($lens_array);
              $getresultlenstype=$getresultlenstype[0]['lenstype'];
              $getresultlenscoating=$this->Common_model->GetLenscoatingData($lens_array);
              $getresultlenscoating=$getresultlenscoating[0]['lenscoating'];
              $getresultlens=$this->Common_model->GetLensData($lens_array);
              $itemcode=$getresultlens[0]['code'];
              $itemname=$getresultlens[0]['name'];
            }
            else
            {
             $protype="Other"; 
            }
                
                    $html.='<tr>
                                <td>'.$sl.'</td>
                                <td>'.$data['cusname'].'</td>
                                <td>'.$data['sales_return_date'].'</td>
                                <td>'.$data['bill_number'].'</td>
                                <td>'.$itemcode.'</td>
                                <td>'.$itemname.'</td>
                                <td>'.$data['quantity'].'</td>
                                <td>'.$data['rate'].'</td>
                                <td>'.number_format((float)$data['total_amount'] ,2,'.', '').'</td>
                                <td>'.$protype.'</td>
                                <td>'.$frame_type.'</td>
                                <td>'.$frame_color.'</td>
                                <td>'.$frame_size.'</td>
                                <td>'.$framemodel.'</td>
                  <td>'.$getresultlenstype.'</td>
                  <td>'.$getresultlenscoating.'</td>
                            </tr>';
                            $sl++;
                            $sumnetamount+=$data['total_amount'];
            }
                        $html.='
                                
                                <tr>
                                    <th>'.$sl.'</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    
                                    <th>Total</th>
                                    <th>'.number_format((float)$sumnetamount ,2,'.', '').'</th>
                                    <th></th>
                    <th></th>
                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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
  public function modeofcountersales($sum_fromdate,$sum_todate)
  {
     $this->dbd = $this->load->database('optdb', TRUE);
      $modedata=$this->Total_combined_report_model->getopticalmodel($this->session->userdata('office_id'));
    $modedatacnt=  count($modedata);
      $html='<div class="table-responsive"><table class="table table-striped table-bordered table-hover">
            <thead>
            <tr style="background: aliceblue;"><th style="text-align:center;" colspan="'.$modedatacnt.'">Counter Sales Payment Mode</th></tr>
                <tr>';
                        foreach($modedata as $datva)
                        {
                            $amm=0;
                             $moden=$datva['name'];
                             $counter_cn=$this->dbd->query("select sum(netamount) as netamount_cn from counter_sales_master   inner join modeofpay on counter_sales_master.modeofpay_id=modeofpay.modeofpay_id where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  and  modeofpay.name='$moden'")->row();
                             if($counter_cn->netamount_cn)
                             {
                                $amm=$counter_cn->netamount_cn;
                             }
                             $html.='<th>'.$moden.'  =  '.number_format($amm,2).'</th>';
                        }
               $html.='</tr>
            </thead>
        </table></div>';
        return $html;
  }
  public function Totalinsuranceamount($sum_fromdate,$sum_todate)
  {
     $amm=0;
     $counter_cn=$this->db->query("select sum(insuranceamount) as netamount_cn from billing_master    where billing_date >= '$sum_fromdate' AND billing_date <= '$sum_todate'")->row();
     if($counter_cn->netamount_cn)
     {
        $amm+=$counter_cn->netamount_cn;
     }
                       
            
        return $amm;
  }

  public function modeofcountersales_total($sum_fromdate,$sum_todate)
  {
     $amm=0;
     $this->dbd = $this->load->database('optdb', TRUE);
     $counter_cn=$this->dbd->query("select sum(netamount) as netamount_cn from counter_sales_master    where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'")->row();
     if($counter_cn->netamount_cn)
     {
        $amm+=$counter_cn->netamount_cn;
     }
                       
            
        return $amm;
  }

  public function op_getsummary()
  {
    error_reporting(0);
    $cdate_cn=date('Y-m-d');
    $this->db = $this->load->database('optdb', TRUE);
    $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
    $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
    if($this->form_validation->run() == TRUE)
    {
      $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
      $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
      $sum_customer=trim(htmlentities($this->input->post('sum_customer')));
      $sum_modeofpay=trim(htmlentities($this->input->post('sum_modeofpay')));
      $staff=trim(htmlentities($this->input->post('staff')));
      $status=trim(htmlentities($this->input->post('status')));
      $supplier_id=trim(htmlentities($this->input->post('supplier_id')));
      
$getresult_counter=$this->Total_combined_report_model->getincomemdl_counter($sum_fromdate,$sum_todate);
      $getresult=$this->Total_combined_report_model->getsummaryreportmodel_op($sum_fromdate,$sum_todate,$sum_customer,$sum_modeofpay,$this->session->userdata('office_id'),$staff,$status,$supplier_id);
    if($getresult!='' || $getresult_counter!='')
    {
       

      $staffcond='';
      $cus='';
      if($sum_customer)
  {
    $cus= ' and sales_master.customer_id='.$sum_customer;
  }
     if($staff)
    {
      $staffcond= ' and  staff.staff_id='.$staff;
    }
    $stacond='';
     if($status)
    {
      $stacond= ' and sales_master.status='.$status;
    }
     $dte=" and sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'";
    if($status==2)
    {
      $dte= " and payment_details.payment_date>= '$sum_fromdate' AND payment_details.payment_date <='$sum_todate'";
    }

     $modedata=$this->Total_combined_report_model->getopticalmodel($this->session->userdata('office_id'));

     $url='Sales_report/print/'.$sum_fromdate.'/'.$sum_todate;
      $rescounter= $this->modeofcountersales($sum_fromdate,$sum_todate);
     $html='<div class="row">
        '.$rescounter.'
     ';
     $u=1;
     $cli='';
    $cash=0;
    $card=0;
    $paytm=0;
     foreach($modedata as $datva)
     {
         $moden=$datva['name'];
         $advancecashamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
      left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate' and  modeofpay.name='$moden' $staffcond  $stacond  $cus")->row();

          $counter_cn=0;

      if($moden=='CASH')
      {
        $counter_cn=0;
        $totcash=$this->db->query("select sum(payment_details.cash) as totcasht from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'  $staffcond  $stacond  $cus")->row();

        $counter_cash=0;

         $cash= $totcash->totcasht;
      }
      else
      {
        $cash=0;
      }

      if($moden=='CARD')
      {
        $counter_cn=0;
        $totcard=$this->db->query("select sum(payment_details.card) as totcardt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'  $staffcond  $stacond  $cus")->row();

        $counter_card=0;

         $card= $totcard->totcardt;
      }
      else
      {
        $card=0;
      }

      if($moden=='PAYTM')
      {
        $counter_cn=0;
        $totpaytm=$this->db->query("select sum(payment_details.paytm) as totpaytmt from sales_master inner join payment_details on sales_master.sales_id=payment_details.sales_id  inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id
        left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate'  $staffcond  $stacond  $cus")->row();

        $counter_paytm=0;


         $paytm= $totpaytm->totpaytmt;
      }
      else
      {
        $paytm=0;
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
            $cli='light';
         }
         else
         {
          $cli='success';
         }

           $html.='
                <div class="col-md-4">
                    <div class="alert alert-'.$cli.' mb-2" role="alert">
                     <h4 style="text-align:center;font-weight:bold;">'.$moden.':'.number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm
          ,2,'.', '').'</h4>
                     </div>
                </div>
                ';
                $u++;

     }

    



     // $advancecardamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount  from payment_details inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id inner join sales_master on payment_details.sales_id=sales_master.sales_id left join staff on sales_master.staff_id=staff.staff_id  where 1=1  and   $staffcond  $stacond  $dte  $cus")->row();

     // $advancecreditamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount  from payment_details inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id inner join sales_master on payment_details.sales_id=sales_master.sales_id left join staff on sales_master.staff_id=staff.staff_id  where payment_date >= '$sum_fromdate' AND payment_date <= '$sum_todate' and   modeofpay.name='CREDIT' $staffcond  $stacond  $cus")->row();
     


     $html.='</div><table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
          <thead>
                  <tr>
                       <th>SL NO</th>
                       <th>Staff</th>
                       <th>Customer Name</th>
                       <th>Supplier Name</th>
                       <th>Date</th>
                       <th>Invoice No</th>
                       <th>User Name</th>
                       <th>Modeofpay</th>
                       <th>CASH</th>
                       <th>CARD</th>
                       <th>PAYTM</th>
                       <th>OTHERS</th>
                       <th>Total Qty</th>
                       <th>Discount Amount</th>
                       <th>Advanced Amount</th>
                       <th>Delivery Amount</th>
                       <th>Balanced Amount</th>
                       <th>Net Amount</th>
                       <th>Status</th>
                   </tr>
                   </thead>
                 <tbody>';
      $sl=1;
      $sumnetamount='0.00';
      $sumadamount='0.00';
      $sumbalamount='0.00';
      $sumdelamt='0.00';
      foreach ($getresult as $data) {
          $sales_id= $data['sales_id'];
          $advanced_amount=0;
          $delamt=0;
          $bal=0;
          if($data['status']=='Inprogress')
          {
              $getcntval=$this->Total_combined_report_model->getcountofpayment($data['sales_id']);
              if($getcntval[0]['CNT']==1)
              {
                  if($data['advanced_amount'])
                  {
                      $bal=$data['netamount']-$data['advanced_amount'];
                      $advanced_amount=$data['advanced_amount'];
                      $delamt=0;
                  }
                  else
                  {
                      $bal=$data['netamount'];
                  }
                  
              }
              else
              {
                  $advancecreditamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount  from payment_details inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id inner join sales_master on payment_details.sales_id=sales_master.sales_id   where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' and payment_details.sales_id=$sales_id   $cus ")->row();



                  if($advancecreditamount->advanced_amount)
                  {
                      $bal=0;
                      $advanced_amount=$data['advanced_amount'];
                      $delamt=$advancecreditamount->advanced_amount-$data['advanced_amount'];
                  }
                  else
                  {
                      $bal=0;
                      $advanced_amount=0;
                      $delamt=$data['netamount'];
                  }
              }
          }
          else
          {
              $getcntval=$this->Total_combined_report_model->getcountofpayment($data['sales_id']);
              if($getcntval[0]['CNT']==1)
              {
                  if($data['advanced_amount'])
                  {
                      $bal=0;
                      $advanced_amount=$data['advanced_amount'];
                      $delamt=0;
                  }
                  else
                  {
                      $bal=$data['netamount'];
                  }
                  
              }
              else
              {
                  $advancecreditamount=$this->db->query("select sum(payment_details.advanced_amount) as advanced_amount  from payment_details inner join modeofpay on payment_details.mode_id=modeofpay.modeofpay_id inner join sales_master on payment_details.sales_id=sales_master.sales_id   where payment_details.sales_id=$sales_id   $cus ")->row();
                 

                  if($advancecreditamount->advanced_amount)
                  {
                      $bal=0;
                      $advanced_amount=$advancecreditamount->advanced_amount;
                      $delamt=$advancecreditamount->advanced_amount-$advanced_amount;
                  }
                  else
                  {
                      $bal=0;
                      $advanced_amount=0;
                      $delamt=$data['netamount'];
                  }
              }
              
          }

           $getresultmode=$this->Total_combined_report_model->getmodedata($sum_fromdate,$sum_todate,$sales_id);
          $modeam='';
       foreach($getresultmode as $datamode)
       {
          if($datamode['advanced_amount'])
          {
              $adamt=$datamode['advanced_amount'];
          }
          else
          {
              $adamt=$data['netamount'];
          }
        
          $modeam.=$datamode['name'].'='.$adamt;
       }

          if($data['sts']==1)
          {
              $st1='Inprogress';
          }
          elseif($data['sts']==3)
          {
              $st1='Ready';
          }
          else
          {
              $st1='Delivered';
          }
     

       
          $html.='<tr '.$clr.'>
                <td>'.$sl.'</td>
                <td>'.$data['staffname'].'</td>
                <td>'.$data['cusname'].'</td>
                <td>'.$data['supname'].'</td>
                <td>'.$data['sales_date'].'</td>
                <td>'.$data['invoice_number'].'</td>
                <td>'.$data['username'].'</td>
                <td>'.$modeam.'</td>
                <td>'.number_format((float)$data['cash']
                ,2,'.', '').'</td>
                <td>'.number_format((float)$data['card']
                ,2,'.', '').'</td>
                <td>'.number_format((float)$data['paytm']
                ,2,'.', '').'</td>
                <td>'.number_format((float)$data['others']
                ,2,'.', '').'</td>
                <td>'.$data['total_qty'].'</td>
                <td>'.number_format((float)$data['discount_amount']
          ,2,'.', '').'</td>
                <td>'.abs(number_format((float)$advanced_amount
          ,2,'.', '')).'</td>
                 <td>'.number_format((float)$delamt
          ,2,'.', '').'</td>
                <td>'.number_format((float)$bal
          ,2,'.', '').'</td>
                <td>'.number_format((float)$data['netamount']
          ,2,'.', '').'</td>
                <td>'.$st1.'</td>
              </tr>';
              $sl++;
              $sumnetamount+=$data['netamount'];
              $sumadamount+=$advanced_amount;
              $sumdelamt+=$delamt;
              $sumbalamount+=$bal;
      }

       $sumcoin=0;
        foreach ($getresult_counter as $data) {
         
            $html.='<tr style="background: blanchedalmond;">
                  <td>'.$sl.'</td>
                  <td>'.$data['staffname'].'</td>
                  <td>'.$data['cusname'].'</td>
                  <td></td>

                  <td>'.$data['payment_date'].'</td>
                  <td>'.$data['invoice_number'].'</td>
                  <td>'.$data['usernamef'].'</td>
                  <td>'.$data['mode'].'</td>
                  <td style="display:none;">0</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                 
                 

                  <td style="display:none;"></td>
                  <td></td>
                  <td>'.number_format((float)$data['netamount'],2,'.', '').'</td>
                  <td></td>
                </tr>';
                $sl++;
                $sumnetamount+=$data['netamount'];
              
        }

            $html.='
                
                <tr>
                  <th>'.$sl.'</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th>'.number_format((float)$sumadamount
          ,2,'.', '').'</th>
                  <th>'.number_format((float)$sumdelamt
          ,2,'.', '').'</th>
                  <th>'.number_format((float)$sumbalamount
          ,2,'.', '').'</th>
                  <th>'.number_format((float)$sumnetamount
          ,2,'.', '').'</th>
                  <th></th>
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

public function getsummary_ph()
{
  $this->db = $this->load->database('optdb', TRUE);
  $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
  $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
  if($this->form_validation->run() == TRUE)
  {
    $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
    $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
    $sum_customer=trim(htmlentities($this->input->post('sum_customer')));
    $sum_modeofpay=trim(htmlentities($this->input->post('sum_modeofpay')));
    $staff=trim(htmlentities($this->input->post('staff')));
    $status=trim(htmlentities($this->input->post('status')));
    $supplier_id=trim(htmlentities($this->input->post('supplier_id')));
    $getresult=$this->Total_combined_report_model->getsummaryreportmodel_ph($sum_fromdate,$sum_todate,$sum_customer,$sum_modeofpay,$this->session->userdata('office_id'),$staff,$status,$supplier_id);
  if($getresult)
  {
    $staffcond='';
    $cus='';
    if($sum_customer)
{
  $cus= ' and sales_master.customer_id='.$sum_customer;
}
   if($staff)
  {
    $staffcond= ' and  staff.staff_id='.$staff;
  }

  $modedata=$this->Total_combined_report_model->getpharmacymodel($this->session->userdata('office_id'));
  $u=1;
   $cli='';
   $sst='';
  foreach($modedata as $datva)
   {
       $moden=$datva['name'];

        $advancecashamount=$this->db->query("select sum(netamount) as advanced_amount from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
    left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate' and  modeofpay.name='$moden' $staffcond    $cus")->row();

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
          $cli='light';
       }
       else
       {
        $cli='success';
       }

       if($moden=='CASH')
       {
         $totcash=$this->db->query("select sum(cash) as totcasht from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
         left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
          $cash= $totcash->totcasht;
       }
       else
       {
         $cash=0;
       }

       if($moden=='CARD')
       {
         $totcard=$this->db->query("select sum(card) as totcardt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
         left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
          $card= $totcard->totcardt;
       }
       else
       {
          $card=0;
       }

       if($moden=='PAYTM')
       {
         $totpaytm=$this->db->query("select sum(paytm) as totpaytmt from sales_master   inner join modeofpay on sales_master.modeofpay_id=modeofpay.modeofpay_id
         left join staff on sales_master.staff_id=staff.staff_id  where sales_date >= '$sum_fromdate' AND sales_date <= '$sum_todate'  $staffcond    $cus")->row();
          $paytm= $totpaytm->totpaytmt;
       }
       else
       {
          $paytm=0;
       }


        $sst.='
              <div class="col-md-4">
                  <div class="alert alert-'.$cli.' mb-2" role="alert">
                   <h4 style="text-align:center;font-weight:bold;">'.$moden.':'.number_format((float)$advancecashamount->advanced_amount+$cash+$card+$paytm
        ,2,'.', '').'</h4>
                   </div>
              </div>
              ';
              $u++;


   }
 
  


  

  
$url='Sales_report/print/'.$sum_fromdate.'/'.$sum_todate;

    $html='<div class="row">
             '.$sst.'
              </div>
    </div><table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
        <thead>
                <tr>
                     <th>SL NO</th>
                     <th>Staff</th>
                     <th>Customer Name</th>
                    
                     <th>Date</th>
                     <th>Invoice No</th>
                     <th>User Name</th>
                     <th>Modeofpay</th>
                     <th>CASH</th>
                     <th>CARD</th>
                     <th>PAYTM</th>
                     <th>OTHERS</th>
                     <th>Total Qty</th>
                  
                     <th>Discount Amount</th>
                     
                     <th>Net Amount</th>
                 
                    
                 </tr>
                 </thead>
               <tbody>';
    $sl=1;
    $sumnetamount='0.00';
    $sumadamount='0.00';
    $sumbalamount='0.00';
    foreach ($getresult as $data) {
       $sales_id= $data['sales_id'];
if($data['mode']=='CREDIT')
{
if($data['credit_bill_payment']==1)
{
$cancel='<h6 class="text-success"><b>Payment Done</b></h6>';
}
else 
{
 $cancel='<h6 class="text-danger"><b>Payment Failed</b></h6>';
}
}
else {
$cancel='';
}
      
    
        $html.='<tr>
              <td>'.$sl.'</td>
              <td>'.$data['staffname'].'</td>
              <td>'.$data['cusname'].'</td>
             
              <td>'.$data['sales_date'].'</td>
              <td>'.$data['invoice_number'].'</td>
              <td>'.$data['username'].'</td>
              <td>'.$data['mode'].'</td>
              <td>'.number_format((float)$data['cash']
              ,2,'.', '').'</td>
              <td>'.number_format((float)$data['card']
              ,2,'.', '').'</td>
              <td>'.number_format((float)$data['paytm']
              ,2,'.', '').'</td>
              <td>'.number_format((float)$data['others']
              ,2,'.', '').'</td>
              <td>'.$data['total_qty'].'</td>
              
              <td>'.number_format((float)$data['discount_amount']
        ,2,'.', '').'</td>
              <td>'.number_format((float)$data['netamount']
        ,2,'.', '').'</td>
     
            
            </tr>';
            $sl++;
            $sumnetamount+=$data['netamount'];
           
    }
          $html.='
              
              <tr>
                <th>'.$sl.'</th>
                <th></th>
               
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              <th></th>
                <th></th>
                <th>Total</th>
                <th>'.number_format((float)$sumnetamount
        ,2,'.', '').'</th>
              
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
public function getgstreport_op()   // summary 
     {
        //error_reporting(0);
       $this->db = $this->load->database('optdb', TRUE);
        $discount_sum=0;
        $other_charge_sum=0;
        $roundoff_sum=0;
        $gross_amount_sum=0;
        $is_vat= $this->session->is_vat;
        $office_id=$this->session->office_id;
        $taxs=$this->db->get('tax_master')->result();
        $frmdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
        $todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
        $taxy=$this->input->post('tax');
        $mode=$this->input->post('mode');
        $taxcon=$modecon='';
        if($taxy)
        {
            $taxcon=" and sales_details.tax=".$taxy;
            $taxs= $this->db->get_where('tax_master', array('name =' => $taxy))->result();
            
        }

        $mode=$this->input->post('mode');
         if($mode)
        {
            $modecon=" and sales_master.modeofpay_id=".$mode;
        }
        $qry="select sales_master.*,customer.name as name,sales_master.sales_id,sum(sales_details.total_amount) as amount,sales_master.other_charge,sales_master.discount_amount";
        $qry.=" from sales_master";
        $qry.=" inner join customer on sales_master.customer_id=customer.customer_id";
        $qry.=" inner join sales_details on sales_master.sales_id=sales_details.sales_id";
         $qry.=" where  sales_master.sales_date>='$frmdate' and sales_master.sales_date<='$todate'  and sales_master.office_id=".$office_id."  ".$taxcon."  ".$modecon." group by sales_details.sales_id";
     
        $result=$this->db->query($qry)->result();

         $url='Gst_report/print/'.$frmdate.'/'.$todate.'/'.$taxy.'/'.$mode;
    
       $html='<table class="table table-striped m-b-none table-bordered" id="example_sum"><thead>
                <tr>
                    <th>SL NO</th>
                    <th>Sales Date</th>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Non TAXABLE</th>
                    ';
                    $non_taxable_sum=0;
                    foreach ($taxs as $tax)
                    {
                         $amount_sum="amount_sum_".$tax->tax_id;
                         $$amount_sum=0;
                        $cgst_sum="cgst_sum_".$tax->tax_id;
                        $sgst_sum="sgst_sum_".$tax->tax_id;
                        //$igst_sum="igst_sum_".$tax->tax_id;
                        $$cgst_sum=$$sgst_sum=0;
                         $html.='<th>'.$tax->name.' % TAXABLE</th>
                                <th> CGST '.($tax->name/2).' %</th>
                                <th> SGST '.($tax->name/2).' %</th>';

                    }
                $html.='<th>Discount</th><th>Other Charge</th><th>Round Off</th><th>Gross Amount</th>
                </tr></thead><tbody>';
        $i=1;
        foreach($result as $row)
        {
            $html.='<tr>
                        <td>'.$i.'</td>
                        <td>'.date('d/m/Y', strtotime($row->sales_date)).'</td>
                        <td>'.$row->invoice_number.'</td>
                        <td>'.$row->name.'</td>';
                   
           $qry_tax="select sum(sales_details.total_amount) as  amount
                       from  sales_details
                       inner join item_master on sales_details.item_id=item_master.item_id  and sales_details.sales_id=$row->sales_id";
           $row_tax=$this->db->query($qry_tax)->row();
            $non_taxable_sum+=$row->amount;
            $html.='<td>'.$row_tax->amount.'</td>';
           
        foreach ($taxs as $tax)
        {
             $qry_tax="select sum(sales_details.total_amount) as  amount,sum(sales_details.cgst) as cgst,sum(sales_details.sgst) as sgst
                       from  sales_details
                       inner join item_master on sales_details.item_id=item_master.item_id and sales_details.tax_type>0 and item_master.tax=$tax->tax_id and sales_details.sales_id=$row->sales_id";
               $row_tax=$this->db->query($qry_tax)->row();
                $html.='<td>'.round($row_tax->amount-($row_tax->cgst+$row_tax->sgst),2).'</td>';
           
                
                $cgst_sum="cgst_sum_".$tax->tax_id;
                $sgst_sum="sgst_sum_".$tax->tax_id;
                //$igst_sum="igst_sum_".$tax->tax_id;
                $$cgst_sum+=$row_tax->cgst;
                $$sgst_sum+=$row_tax->sgst;
                //$$igst_sum+=$row_tax->igst;

                $html.='<td>'.round($row_tax->cgst,2).'</td>
                        <td>'.round($row_tax->cgst,2).'</td>
                        ';
               
         
            
        }
         $html.='<td>'.$row->discount_amount.'</td>
                <td>'.$row->other_charge.'</td>
                <td>'.$row->roundoff.'</td>
                <td>'.$row->netamount.'</td></tr>';
       
        
        $discount_sum+=$row->discount_amount;
        $charge=0;
        if($row->other_charge)
        {
            $charge=$row->other_charge;
        }

        $other_charge_sum+=$charge;
        $roundoff_sum+=$row->roundoff;
        $gross_amount_sum+=$row->netamount;
        
           
            $i++;
        }
        $html.='</tbody><tfoot>
                <tr>
                    <td>'.$i.'</td>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    
                    <td>'.round($non_taxable_sum,2).'</td>';

        
        foreach ($taxs as $tax)
        {
             $amount_sum="amount_sum_".$tax->tax_id;
             $html.='<td></td>';
           
           
                $cgst_sum="cgst_sum_".$tax->tax_id;
                $sgst_sum="sgst_sum_".$tax->tax_id;
               
                  $html.='<td>'.round($$cgst_sum,2).'</td>
                          <td>'.round($$sgst_sum,2).'</td>';
              
          
        }
         $html.='<td>'.round($discount_sum,2).'</td>
                <td>'.round($other_charge_sum,2).'</td>
                <td>'.round($roundoff_sum,2).'</td>
                <td>'.round($gross_amount_sum,2).'</td>
              ';
        $html.='</tr>
        </tfoot></table>';

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

    public function getgstreport_ph()   // summary 
     {
        //error_reporting(0);
       $this->db = $this->load->database('pharmdb', TRUE);
         //error_reporting(0);
        $discount_sum=0;
        $other_charge_sum=0;
        $roundoff_sum=0;
        $gross_amount_sum=0;
        $is_vat= $this->session->is_vat;
        $office_id=$this->session->office_id;
        $taxs=$this->db->get('tax_master')->result();
        $frmdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
        $todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
        $taxy=$this->input->post('tax');
        $taxcon=$modecon='';
        if($taxy)
        {
            $taxcon=" and sales_details.tax=".$taxy;
            $taxs= $this->db->get_where('tax_master', array('name =' => $taxy))->result();
            
        }

        $mode=$this->input->post('mode');
         if($mode)
        {
            $modecon=" and sales_master.modeofpay_id=".$mode;
        }
        $url='Gst_report/printdet/'.$frmdate.'/'.$todate.'/'.$taxy.'/'.$mode;
        $qry="select sales_master.*,sales_details.total_amount as amtt,customer.name as name,sales_master.sales_id,sum(sales_details.total_amount) as amount,sales_master.other_charge,sales_master.discount_amount,item_master.name as proname,sales_details_id";
        $qry.=" from sales_master";
        $qry.=" inner join customer on sales_master.customer_id=customer.customer_id";
        $qry.=" inner join sales_details on sales_master.sales_id=sales_details.sales_id";
        $qry.=" inner join item_master on item_master.item_id=sales_details.item_id";
        $qry.=" where  sales_master.sales_date>='$frmdate' and sales_master.sales_date<='$todate'  and sales_master.office_id=".$office_id."  ".$taxcon."  ".$modecon." group by sales_details.sales_details_id";

     
        $result=$this->db->query($qry)->result();

          
       $html='<table class="table table-striped m-b-none table-bordered" id="example_sum"><thead>
                <tr>
                    <th>SL NO</th>
                    <th>Sales Date</th>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Item Name</th>
                    <th>Total Amount</th>
                    ';
                    $non_taxable_sum=0;
                    foreach ($taxs as $tax)
                    {
                         $amount_sum="amount_sum_".$tax->tax_id;
                         $$amount_sum=0;
                        $cgst_sum="cgst_sum_".$tax->tax_id;
                        $sgst_sum="sgst_sum_".$tax->tax_id;
                        //$igst_sum="igst_sum_".$tax->tax_id;
                        $$cgst_sum=$$sgst_sum=0;
                         $html.='<th>'.$tax->name.' % TAXABLE</th>
                                <th> CGST '.($tax->name/2).' %</th>
                                <th> SGST '.($tax->name/2).' %</th>';

                    }
                $html.='<th>Discount</th><th>Other Charge</th><th>Round Off</th><th>Gross Amount</th>
                </tr></thead><tbody>';
        $i=1;
        foreach($result as $row)
        {
            $html.='<tr>
                        <td>'.$i.'</td>
                        <td>'.date('d/m/Y', strtotime($row->sales_date)).'</td>
                        <td>'.$row->invoice_number.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->proname.'</td>';
                   
           $qry_tax="select sales_details.total_amount as  amount
                       from  sales_details
                       inner join item_master on sales_details.item_id=item_master.item_id  and sales_details.sales_details_id=$row->sales_details_id";
           $row_tax=$this->db->query($qry_tax)->row();
            $non_taxable_sum+=$row->amount;
            $html.='<td>'.round($row_tax->amount,2).'</td>';
           
        foreach ($taxs as $tax)
        {
             $qry_tax="select sum(sales_details.total_amount) as  amount,sum(sales_details.cgst) as cgst,sum(sales_details.sgst) as sgst
                       from  sales_details
                       inner join item_master on sales_details.item_id=item_master.item_id and sales_details.tax_type>0 and item_master.tax=$tax->tax_id and sales_details.sales_details_id=$row->sales_details_id";
               $row_tax=$this->db->query($qry_tax)->row();
                $html.='<td>'.round($row_tax->amount-($row_tax->cgst+$row_tax->sgst),2).'</td>';
           
                
                $cgst_sum="cgst_sum_".$tax->tax_id;
                $sgst_sum="sgst_sum_".$tax->tax_id;
                //$igst_sum="igst_sum_".$tax->tax_id;
                $$cgst_sum+=$row_tax->cgst;
                $$sgst_sum+=$row_tax->sgst;
                //$$igst_sum+=$row_tax->igst;

                $html.='<td>'.round($row_tax->cgst,2).'</td>
                        <td>'.round($row_tax->cgst,2).'</td>
                        ';
               
         
            
        }
         $html.='<td>'.$row->discount_amount.'</td>
                <td>'.$row->other_charge.'</td>
                <td>'.$row->roundoff.'</td>
                <td>'.$row->amtt.'</td></tr>';
       
        
        $discount_sum+=$row->discount_amount;
        $charge=0;
        if($row->other_charge)
        {
            $charge=$row->other_charge;
        }

        $other_charge_sum+=$charge;
        $roundoff_sum+=$row->roundoff;
        $gross_amount_sum+=$row->amtt;
        
           
            $i++;
        }
        $html.='</tbody><tfoot>
                <tr>
                    <td>'.$i.'</td>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <td>'.round($non_taxable_sum,2).'</td>';

        
        foreach ($taxs as $tax)
        {
             $amount_sum="amount_sum_".$tax->tax_id;
             $html.='<td></td>';
           
           
                $cgst_sum="cgst_sum_".$tax->tax_id;
                $sgst_sum="sgst_sum_".$tax->tax_id;
               
                  $html.='<td>'.round($$cgst_sum,2).'</td>
                          <td>'.round($$sgst_sum,2).'</td>';
              
          
        }
         $html.='<td>'.round($discount_sum,2).'</td>
                <td>'.round($other_charge_sum,2).'</td>
                <td>'.round($roundoff_sum,2).'</td>
                <td>'.round($gross_amount_sum,2).'</td>
              ';
        $html.='</tr>
        </tfoot></table>';

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


}
