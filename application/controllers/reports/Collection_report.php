<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_report extends CI_Controller {
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
        $data['title']='EMR::Total Collection Report';
        $data['activecls']='Collection_report';
        $office_id=$this->session->office_id;
        $var_array=array($office_id);
        $content=$this->load->view('reports/collection_report',$data,true);
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
          $html='<table class="table table-striped table-bordered table-hover" id="example_sum"><thead><tr style="background: #a7a7ff;color: #fff;font-size: 15px;"><th style="text-align:center;" colspan="7">EMR</th></tr>
                <tr><th  style="text-align:center;background: aquamarine;" colspan="7"><b>Patient Appointment Screen</b></th></tr>
         </thead><tbody>';
        $html.='</tr>';
        $html.=' <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Appointment Date</th>
                         <th>Appointment type</th>
                         <th>Appointment OPD Charge</th>
                         <th>Print</th>
                     </tr>';
          $getresult=$this->Patient_appointment_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id='',$this->session->userdata('office_id'),$rr='',$pattype='',$area_id1='',$source='');
          if($getresult)
          {
            $sl=1;
            foreach ($getresult as $data) 
             {
                $patient_registration_id=$data['patient_registration_id'];
                $patient_appointment_id=$data['patient_appointment_id'];
                 $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_patientappoitment('.$patient_registration_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';

                $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$data['mrdno'].'</td>
                      <td>'.$data['pname'].'</td>
                      <td>'.$data['appointment_date'].'</td>
                      <td>'.$data['appname'].'</td>
                      <td>'.$data['particular'].' '.$data['grand_total'].'</td>
                      <td>'.$print.'</td>
                    </tr>';
                    $sl++;
                 
             }
          }
          else
          {
            $html.='<tr><td colspan="7" style="text-align:center;">No Data Found</td></tr>';
          }

            $html.='<tr><th  style="text-align:center;background: skyblue;color: #fff;" colspan="7"><b>Billing Screen</b></th></tr>';
                 $html.=' <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Billing Date</th>
                         <th>Invoice No</th>
                         <th>Amount</th>
                         <th>Print</th>
                     </tr>';
        $getresult_billing=$this->Collection_report_model->Get_billing_transaction($sum_fromdate,$sum_todate,$patient_id);
        if($getresult_billing)
        {
            $sl=1;
            foreach($getresult_billing as $databilling)
            {
                 $billing_master_id=$databilling['billing_master_id'];
                 $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_billing('.$billing_master_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
                  $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$databilling['mrdno'].'</td>
                      <td>'.$databilling['pateint_name'].'</td>
                      <td>'.$databilling['billing_date'].'</td>
                      <td>'.$databilling['invoice_number'].'</td>
                      <td>'.$databilling['grand_total'].'</td>
                      <td>'.$print.'</td>
                    </tr>';
                    $sl++;
            }
        }
        else
        {
            $html.='<tr><td colspan="7" style="text-align:center;">No Data Found</td></tr>';
        }

         $html.='<tr><th  style="text-align:center;background: #0097a7;color: #fff;" colspan="7"><b>Insurance Billing Screen</b></th></tr>';
                 $html.=' <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Billing Date</th>
                         <th>Invoice No</th>
                         <th>Amount</th>
                         <th>Print</th>
                     </tr>';
        $getresult_billing=$this->Collection_report_model->Get_INS_billing_transaction($sum_fromdate,$sum_todate,$patient_id);
        if($getresult_billing)
        {
            $sl=1;
            foreach($getresult_billing as $databilling)
            {
                 $billing_master_id=$databilling['billing_master_id'];
                 $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_insbilling('.$billing_master_id.','.$patient_appointment_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
                  $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$databilling['mrdno'].'</td>
                      <td>'.$databilling['pateint_name'].'</td>
                      <td>'.$databilling['billing_date'].'</td>
                      <td>'.$databilling['invoice_number'].'</td>
                      <td>'.$databilling['grand_total'].'</td>
                      <td>'.$print.'</td>
                    </tr>';
                    $sl++;
            }
        }
        else
        {
            $html.='<tr><td colspan="7" style="text-align:center;">No Data Found</td></tr>';
        }

        $html.='<tr><th  style="text-align:center;background: #ab6cc6;color: #fff;" colspan="7"><b>Examination Screen </b></th></tr>';
                 $html.=' <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Examination Date</th>
                         <th>Doctor Name</th>
                         <th></th>
                         <th>Print</th>
                     </tr>';
        $getEx_billing=$this->Collection_report_model->Get_examination_Screen($sum_fromdate,$sum_todate,$patient_id);
        if($getEx_billing)
        {
            $sl=1;
            foreach($getEx_billing as $dataExbilling)
            {
                 $examination_id=$dataExbilling['examination_id'];
                 $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_examination('.$examination_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
                  $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$dataExbilling['mrdno'].'</td>
                      <td>'.$dataExbilling['pateint_name'].'</td>
                      <td>'.$dataExbilling['opthdate'].'</td>
                      <td>'.$dataExbilling['doctorname'].'</td>
                      <td></td>
                      <td>'.$print.'</td>
                    </tr>';
                    $sl++;
            }
        }
        else
        {
            $html.='<tr><td colspan="7" style="text-align:center;">No Data Found</td></tr>';
        }

        $html.='<tr><th  style="text-align:center;background: #7078ff;color: #fff;" colspan="7"><b>OPTICALS</b></th></tr><tr><th  style="text-align:center;background: #ab6cc6;color: #fff;" colspan="7"><b>Sales Screen</b></th></tr>';
                 $html.=' <tr>
                         <th>SL NO</th>
                         <th>Pateint Name</th>
                         <th>Sales Date</th>
                         <th>Invoice No</th>
                         <th>Net amount</th>
                         <th></th>
                         <th>Print</th>
                     </tr>';
        $get_sales_op=$this->Collection_report_model->Get_sales_Screen($sum_fromdate,$sum_todate,$patient_id);
        if($get_sales_op)
        {
            $sl=1;
            foreach($get_sales_op as $dataExbilling)
            {
                 $sales_id=$dataExbilling['sales_id'];
                 $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_salesop('.$sales_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
                  $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$dataExbilling['cusname'].'</td>
                      <td>'.$dataExbilling['sales_date'].'</td>
                      <td>'.$dataExbilling['invoice_number'].'</td>
                      <td>'.$dataExbilling['netamount'].'</td>
                      <td></td>
                      <td>'.$print.'</td>
                    </tr>';
                    $sl++;
            }
        }
        else
        {
            $html.='<tr><td colspan="7" style="text-align:center;">No Data Found</td></tr>';
        }
        $html.='<tr><th  style="text-align:center;background: #28d094;color: #fff;" colspan="7"><b>PHARMACY</b></th></tr><tr><th  style="text-align:center;background: #ab6cc6;color: #fff;" colspan="7"><b>Sales Screen</b></th></tr>';
                 $html.=' <tr>
                         <th>SL NO</th>
                         <th>Pateint Name</th>
                         <th>Sales Date</th>
                         <th>Invoice No</th>
                         <th>Net amount</th>
                         <th></th>
                         <th>Print</th>
                     </tr>';
        $get_sales_ops=$this->Collection_report_model->Get_sales_Screen_ph($sum_fromdate,$sum_todate,$patient_id);
        if($get_sales_ops)
        {
            $sl=1;
            foreach($get_sales_ops as $dataExbilling)
            {
                 $sales_id=$dataExbilling['sales_id'];
                 $print='<button data-toggle="tooltip"  title="Print" onclick="printdata_salesph('.$sales_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';
                  $html.='<tr>
                      <td>'.$sl.'</td>
                      <td>'.$dataExbilling['cusname'].'</td>
                      <td>'.$dataExbilling['sales_date'].'</td>
                      <td>'.$dataExbilling['invoice_number'].'</td>
                      <td>'.$dataExbilling['netamount'].'</td>
                      <td></td>
                      <td>'.$print.'</td>
                    </tr>';
                    $sl++;
            }
        }
        else
        {
            $html.='<tr><td colspan="7" style="text-align:center;">No Data Found</td></tr>';
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
