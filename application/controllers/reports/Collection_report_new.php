<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_report_new extends CI_Controller {
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
        
        $this->load->model('Collection_report_model');
        $this->load->model('Common_model');
        $this->load->model('Sales_collection_report_model');
        $this->load->model('Patient_appointment_report_model');
    }
    public function index()
    {
        $data['title']='EMR::Collection Report';
        $data['activecls']='Collection_report_new';
        $office_id=$this->session->office_id;
        $var_array=array($office_id);
        $content=$this->load->view('reports/collection_report_new',$data,true);
        $this->load->view('includes/layout',['content'=>$content]);
    }

    public function getsummary()
    {

       $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
       $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
       if($this->form_validation->run() == TRUE)
       {
            $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
            $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
            $patient_id=$this->input->post('patient_registration_id');
            if($patient_id)
            {
                $patient_id=$patient_id;
            }
            else
            {
                $patient_id='';
            }
              $html='<table class="table table-striped table-bordered table-hover" id="example_sum">
                      <thead>
                         <tr>
                            <th>SL</th>
                            <th>Patient Name</th>
                            <th>MRD NO</th>
                            <th>Screen Name</th> 
                            <th>Date</th>
                            <th>Amount</th>

                            <th>Screen Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Amount</th>

                            <th>Screen Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Amount</th>

                            <th>Screen Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Total</th>
                          
                         </tr>
                     </thead>
                     <tbody>';
        $getresult=$this->Patient_appointment_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id='',$this->session->userdata('office_id'),$rr='',$pattype='',$area_id1='',$source='');
        if($getresult)
          {
            $sl=1;
            foreach ($getresult as $data) 
             {
                $tot=0;
                $billtr='';
                $patient_registration_id=$data['patient_registration_id'];
                $patient_appointment_id=$data['patient_appointment_id'];

                 $getresult_billing=$this->Collection_report_model->Get_billing_transaction_IND($sum_fromdate,$sum_todate,$patient_id,$patient_registration_id);
                 $sumbil=0;
                 if($getresult_billing)
                 {
                    $billnno=$dbilling_date='';
                    
                    foreach($getresult_billing as $databilling)
                    {
                          $billnno.=$databilling['invoice_number'].'<br/>';
                          $dbilling_date.=$databilling['billing_date'].',';
                          $sumbil+=$databilling['grand_total'];
                    }
                    $billnno = rtrim($billnno, '<br/>');
                   
                    $billing_dates_array = explode(',', $dbilling_date);

                    // Remove duplicates
                    $unique_billing_dates = array_unique($billing_dates_array);

                    // Convert back to a comma-separated string
                    $dbilling_date = implode(',', $unique_billing_dates);
                     $dbilling_date = rtrim($dbilling_date, ',');
                    $billtr.='<td>'.$billnno.'</td><td>'.$dbilling_date.'</td><td>'.$sumbil.'</td>';
                 }
                 else
                 {
                    $billtr.='<td></td><td></td><td></td>';
                 }
         $opbill='';
         $op_amt=0;
         $getresult_Sal_billing=$this->Collection_report_model->Get_sales_Screen_IND($sum_fromdate,$sum_todate,$patient_id,$data['mrdno']);
         if($getresult_Sal_billing)
         {
            $opbill.='<td>'.$getresult_Sal_billing[0]['invoice_number'].'</td><td>'.$getresult_Sal_billing[0]['sales_date'].'</td><td>'.$getresult_Sal_billing[0]['netamount'].'</td>';
            $op_amt=$getresult_Sal_billing[0]['netamount'];
         }
         else
         {
            $opbill.='<td></td><td></td><td></td>';
         }

         $phbill='';$ph_amt=0;
         $getresult_Sal_PH_billing=$this->Collection_report_model->Get_sales_Screen_ph_IND($sum_fromdate,$sum_todate,$patient_id,$data['mrdno']);
         if($getresult_Sal_PH_billing)
         {
            $phbill.='<td>'.$getresult_Sal_PH_billing[0]['invoice_number'].'</td><td>'.$getresult_Sal_PH_billing[0]['sales_date'].'</td><td>'.$getresult_Sal_PH_billing[0]['netamount'].'</td>';
            if($getresult_Sal_PH_billing[0]['netamount'])
            {
                $ph_amt=$getresult_Sal_PH_billing[0]['netamount'];
            }
            
         }
         else
         {
            $phbill.='<td></td><td></td><td></td>';
         }

        

         $tot=$data['grand_total']+$sumbil+$op_amt+$ph_amt;

                 $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$data['pname'].'</td>
                      <td>'.$data['mrdno'].'</td>
                      <td><b>EMR Patient Appointment</b></td>
                      <td>'.$data['appointment_date'].'</td>
                      <td>'.$data['grand_total'].'</td>
                      <td><b>EMR Billing Screen</b></td>
                      '.$billtr.'
                      <td><b>OPTICALS Billing Screen</b></td>
                      '.$opbill.'
                      <td><b>PHARMACY Billing Screen</b></td>
                      '.$phbill.'
                      <td>'.$tot.'</td>
                    </tr>';
                    $sl++;
             }

          }
          $op_mul='';
         $getresult_Sal_billing=$this->Collection_report_model->Get_sales_Screen_MUL($sum_fromdate,$sum_todate,$patient_id);
        // print_r($getresult_Sal_billing);exit;
         if($getresult_Sal_billing)
         {
            
            foreach($getresult_Sal_billing as $dataExbilling)
            {
                $html.='<tr>
                          <td>'.$sl.'</td>
                          <td>'.$dataExbilling['cusname'].'</td>
                          <td>N/A</td>
                          <td><b>EMR Patient Appointment</b></td>
                          
                          <td></td>
                          <td></td>
                          <td><b>EMR Billing Screen</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><b>OPTICALS Billing Screen</b></td>
                          <td>'.$dataExbilling['invoice_number'].'</td>
                          <td>'.$dataExbilling['sales_date'].'</td>
                          
                          <td>'.$dataExbilling['netamount'].'</td>
                          <td><b>PHARMACY Billing Screen</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>'.$dataExbilling['netamount'].'</td>
                          
                        </tr>';
                        $sl++;
            }
         }

         $getresult_Sal_billing_ph=$this->Collection_report_model->Get_sales_Screen_ph_MUL($sum_fromdate,$sum_todate,$patient_id);
        // print_r($getresult_Sal_billing);exit;
         if($getresult_Sal_billing_ph)
         {
            
            foreach($getresult_Sal_billing_ph as $dataExbilling)
            {
                $html.='<tr>
                          <td>'.$sl.'</td>
                          <td>'.$dataExbilling['cusname'].'</td>
                          <td>N/A</td>
                          <td><b>EMR Patient Appointment</b></td>
                        
                          <td></td>
                          <td></td>
                          <td><b>EMR Billing Screen</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><b>OPTICALS Billing Screen</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><b>PHARMACY Billing Screen</b></td>
                          <td>'.$dataExbilling['invoice_number'].'</td>
                          <td>'.$dataExbilling['sales_date'].'</td>
                          <td>'.$dataExbilling['netamount'].'</td>
                          <td>'.$dataExbilling['netamount'].'</td>
                        </tr>';
                        $sl++;
            }
         }
        
          $html.='</tbody></table>';
        
        echo json_encode(array('msg'=> 'success','error'=> $this->error,'error_message'=> $this->error_message,'getdata' => $html));
        exit;
       }
       else
       {
            $this->msg='';$this->error='';$this->error_message = $this->form_validation->error_array();
            echo json_encode(array('msg'=> $this->msg,'error'=> $this->error,'error_message'=>$this->error_message));exit;
       }
    }
    public function print_sales() 
  {
      $this->Collection_report_model->print_bill($this->input->post('data_generatebill'),1);
  }
   public function print_sales_ph() 
  {
      $this->Collection_report_model->print_bill_ph($this->input->post('data_generatebill'),1);
  }
  
}
