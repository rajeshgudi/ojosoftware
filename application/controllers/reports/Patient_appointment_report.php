<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_appointment_report extends CI_Controller {
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
        
        $this->load->model('Patient_appointment_report_model');
        $this->load->model('Common_model');
    }
  public function index()
  {
    $data['title']='EMR::Patient Appointment Report';
    $data['activecls']='Patient_appointment_report';
    $office_id=$this->session->office_id;
    $var_array=array($office_id);
    $data['area']=$this->Common_model->Get_Area($var_array);
    //$data['getpatient']=$this->Common_model->getpateintmrdnos($var_array);
    $data['getdoctor']=$this->Common_model->getdoctors($var_array);
     $data['sources']=$this->Common_model->getsource($var_array);
    // $data['getmodeofpay']=$this->Common_model->GetModeofpayData($var_array);
    // $data['getcategory']=$this->Common_model->getcategory($var_array);
    // $data['getlens']=$this->Common_model->getlensmaster($var_array);
    // $data['getstaff']=$this->Common_model->GetStaffData($var_array);
    $content=$this->load->view('reports/patient_appointment_report',$data,true);
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
        $area_id1=trim(htmlentities($this->input->post('area_id1')));
        $doctor_id=trim(htmlentities($this->input->post('doctor_id')));
        $source=trim(htmlentities($this->input->post('source')));
        $getresult=$this->Patient_appointment_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$rr='',$pattype='',$area_id1,$source);
      if($getresult)
      {
        

        $html='<table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
            <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Gender & Age</th>
                         <th>Date of Birth</th>
                         <th>Mobile No</th>
                         <th>Doctor Name</th>
                         <th>Appointment Date</th>
                         <th>Appointment Time</th>
                         <th>City</th>
                         <th>Area</th>
                         <th>Address</th>
                         <th>Source</th>
                         <th>Occupation</th>
                         <th>Referral name</th>
                         <th>OPD Insurance Name</th>
                         <th>Patient Category</th>
                         <th>Emergency</th>
                         <th>Print</th>
                         <th>Appointment type</th>
                         <th>Appointment OPD Charge</th>
                         <th>Description</th>
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        
        foreach ($getresult as $data) {
        if($data['gender']==1)
          {$gen='M';}elseif ($data['gender']==2) {$gen='F';}else{$gen='T';}
        if($data['print']==1)
          {$pri='A4 Print';}elseif ($data['print']==2) {$pri='A4 Landscape';} elseif ($data['print']==3){$pri='A5 Print';} else{$pri='A5 Landscape';}
            $html.='<tr>
                  <td>'.$sl.'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$gen.' '.$data['ageyy'].'YY '.$data['agemm'].' MM</td>
                  <td>'.$data['dob'].'</td>
                  <td>'.$data['mobileno'].'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['appointment_date'].'</td>
                  <td>'.date ('h:i a',strtotime($data['appointment_time'])).'</td>
                  <td>'.$data['cityname'].'</td>
                  <td>'.$data['areaname'].'</td>
                  <td>'.$data['address'].'</td>
                  <td>'.$data['sourcename'].'</td>
                  <td>'.$data['occupation'].'</td>
                  <td>'.$data['referralname'].'</td>
                  <td>'.$data['insurance'].'</td>
                  <td>'.$data['patient_catename'].'</td>
                  <td>'.$data['emergency'].'</td>
                  <td>'.$pri.'</td>
                  <td>'.$data['appname'].'</td>
                  <td>'.$data['particular'].' '.$data['grand_total'].'</td>
                  <td>'.$data['dess'].'</td>
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

   public function getsummary1()
    {
      $this->form_validation->set_rules('sum_fromdate1', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate1', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('patient_id', 'Patient Name', 'trim|min_length[1]|max_length[20]|numeric');
      $this->form_validation->set_rules('doctor_id', 'Doctor Name', 'trim|min_length[1]|max_length[20]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate1')))));
        $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate1')))));
        $patient_id=trim(htmlentities($this->input->post('patient_id')));
        $doctor_id=trim(htmlentities($this->input->post('doctor_id')));
        $area_id1=trim(htmlentities($this->input->post('area_id2')));
        $source=trim(htmlentities($this->input->post('source')));

       
        $getresult=$this->Patient_appointment_report_model->getsummaryreportmodel($sum_fromdate,$sum_todate,$patient_id,$doctor_id,$this->session->userdata('office_id'),$det_modeofpay='',$pattype='',$area_id1,$source);
      if($getresult)
      {
        

        $html='<table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum1">
            <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Area</th>
                         <th>Gender & Age</th>
                         <th>particular</th>
                         <th>Amount</th>
                         <th>Doctor Name</th>
                         <th>Appointment Date</th>
                         <th>Appointment Time</th>
                         <th>Login Name</th>
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        
        foreach ($getresult as $data) {

              $opd=$data['appointment_opd_charge_id'];
       $opdcharge=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->name;
       $amount=$grand_total=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->amount;

        if($data['gender']==1)
          {$gen='M';}elseif ($data['gender']==2) {$gen='F';}else{$gen='T';}
        if($data['print']==1)
          {$pri='A4 Print';}elseif ($data['print']==2) {$pri='A4 Landscape';} elseif ($data['print']==3){$pri='A5 Print';} else{$pri='A5 Landscape';}
            $html.='<tr>
                  <td>'.$sl.'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$data['areaname'].'</td>
                  <td>'.$gen.' '.$data['ageyy'].'YY '.$data['agemm'].' MM</td>
                  <td>'.$opdcharge.'</td>
                  <td>'.$amount.'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['appointment_date'].'</td>
                  <td>'.date ('h:i a',strtotime($data['appointment_time'])).'</td>
                   <td>'.$data['usename'].'</td>
                 
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
   public function getsummary_new()
    {
      $this->form_validation->set_rules('sum_fromdate_new', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate_new', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('patient_id', 'Patient Name', 'trim|min_length[1]|max_length[20]|numeric');
      $this->form_validation->set_rules('doctor_id', 'Doctor Name', 'trim|min_length[1]|max_length[20]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate_new')))));
        $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate_new')))));
       
        $area_id1=trim(htmlentities($this->input->post('area_id_new')));
        $source=trim(htmlentities($this->input->post('source_new')));

       
        $getresult=$this->Patient_appointment_report_model->getsummaryreportmodel_new($sum_fromdate,$sum_todate,$patient_id='',$doctor_id='',$this->session->userdata('office_id'),$det_modeofpay='',$pattype='',$area_id1,$source);
      if($getresult)
      {
        

        $html='<table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum_new">
            <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Area</th>
                         <th>Gender & Age</th>
                         <th>particular</th>
                         <th>Amount</th>
                         <th>Doctor Name</th>
                         <th>Appointment Date</th>
                         <th>Appointment Time</th>
                         <th>Login Name</th>
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        
        foreach ($getresult as $data) {
          $cntchk=1;
        $getcnt=$this->Patient_appointment_report_model->Get_Count_App($data['patient_registration_id']);
        if($getcnt)
        {
          $cntchk=$getcnt[0]['cnt'];
        }
        if($cntchk==1)
        {
           $opd=$data['appointment_opd_charge_id'];
       $opdcharge=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->name;
       $amount=$grand_total=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->amount;

        if($data['gender']==1)
          {$gen='M';}elseif ($data['gender']==2) {$gen='F';}else{$gen='T';}
        if($data['print']==1)
          {$pri='A4 Print';}elseif ($data['print']==2) {$pri='A4 Landscape';} elseif ($data['print']==3){$pri='A5 Print';} else{$pri='A5 Landscape';}
            $html.='<tr>
                  <td>'.$sl.'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$data['areaname'].'</td>
                  <td>'.$gen.' '.$data['ageyy'].'YY '.$data['agemm'].' MM</td>
                  <td>'.$opdcharge.'</td>
                  <td>'.$amount.'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['appointment_date'].'</td>
                  <td>'.date ('h:i a',strtotime($data['appointment_time'])).'</td>
                   <td>'.$data['usename'].'</td>
                 
                </tr>';
                $sl++;
        }
             
             
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

 public function getsummary_fol()
    {
      $this->form_validation->set_rules('sum_fromdate_fol', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate_fol', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('patient_id', 'Patient Name', 'trim|min_length[1]|max_length[20]|numeric');
      $this->form_validation->set_rules('doctor_id', 'Doctor Name', 'trim|min_length[1]|max_length[20]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate_fol')))));
        $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate_fol')))));
       
        $area_id1=trim(htmlentities($this->input->post('area_id_fol')));
        $source=trim(htmlentities($this->input->post('source_fol')));

       
        $getresult=$this->Patient_appointment_report_model->getsummaryreportmodel_fol($sum_fromdate,$sum_todate,$patient_id='',$doctor_id='',$this->session->userdata('office_id'),$det_modeofpay='',$pattype='',$area_id1,$source);
      if($getresult)
      {
        

        $html='<table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum_fol">
            <thead>
                    <tr>
                         <th>SL NO</th>
                         <th>MRD NO</th>
                         <th>Pateint Name</th>
                         <th>Area</th>
                         <th>Gender & Age</th>
                         <th>particular</th>
                         <th>Amount</th>
                         <th>Doctor Name</th>
                         <th>Appointment Date</th>
                         <th>Appointment Time</th>
                         <th>Login Name</th>
                     </tr>
                     </thead>
                   <tbody>';
        $sl=1;
        
        foreach ($getresult as $data) {
          $cntchk=1;
        $getcnt=$this->Patient_appointment_report_model->Get_Count_App($data['patient_registration_id']);
        if($getcnt)
        {
          $cntchk=$getcnt[0]['cnt'];
        }
        // if($cntchk==2)
        // {
           $opd=$data['appointment_opd_charge_id'];
       $opdcharge=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->name;
       $amount=$grand_total=$this->db->get_where('opdcharge',"opdcharge_id=$opd")->row()->amount;

        if($data['gender']==1)
          {$gen='M';}elseif ($data['gender']==2) {$gen='F';}else{$gen='T';}
        if($data['print']==1)
          {$pri='A4 Print';}elseif ($data['print']==2) {$pri='A4 Landscape';} elseif ($data['print']==3){$pri='A5 Print';} else{$pri='A5 Landscape';}
            $html.='<tr>
                  <td>'.$sl.'</td>
                  <td>'.$data['mrdno'].'</td>
                  <td>'.$data['pname'].'</td>
                  <td>'.$data['areaname'].'</td>
                  <td>'.$gen.' '.$data['ageyy'].'YY '.$data['agemm'].' MM</td>
                  <td>'.$opdcharge.'</td>
                  <td>'.$amount.'</td>
                  <td>'.$data['docname'].'</td>
                  <td>'.$data['appointment_date'].'</td>
                  <td>'.date ('h:i a',strtotime($data['appointment_time'])).'</td>
                   <td>'.$data['usename'].'</td>
                 
                </tr>';
                $sl++;
        //}
             
             
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
     $getresult=$this->Sales_report_model->getdetailedreportmodel($det_fromdate,$det_todate,$det_customer,$det_modeofpay,$this->session->userdata('office_id'),$det_item,$det_lens);
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
                  <td>'.$data['sales_date'].'</td>
                  <td>'.$data['invoice_number'].'</td>
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
}
