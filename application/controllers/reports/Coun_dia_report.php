<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coun_dia_report extends CI_Controller {
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
        
        $this->load->model('Specilaity_report_model');
        $this->load->model('Common_model');
    }
	public function index()
	{
		$data['title']='EMR::Coun_dia_report';
		$data['activecls']='Coun_dia_report';
		$office_id=$this->session->office_id;
		$var_array=array($office_id);
        $data['doctors']=$this->Common_model->getdoctors($var_array);
		$content=$this->load->view('reports/coun_dia_report',$data,true);
		$this->load->view('includes/layout',['content'=>$content]);
	}

    public function getsummary()
    {
      $office_id=$this->session->office_id;
      $this->form_validation->set_rules('sum_fromdate', 'From Date', 'trim|required|min_length[1]|max_length[20]');
      $this->form_validation->set_rules('sum_todate', 'To Date', 'trim|required|min_length[1]|max_length[20]');
      if($this->form_validation->run() == TRUE)
      {
        $sum_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_fromdate')))));
        $sum_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('sum_todate')))));
        $docid=$this->input->post('doc_id');
        $pettycash=$this->Specilaity_report_model->Get_Showdata_Dia($sum_fromdate,$sum_todate,$docid,$this->session->userdata('office_id'));
if($pettycash)
{
		  	$html='<table class="table table-bordered table-hover" id="example_sum">
                              <thead>
                              <tr><th>SL NO</th><th>Patient Name</th><th>MRD NO</th><th>Doctor Name</th><th>Date</th><th>Diagnosis</th><th>Eye</th><th>Department</th></tr></thead><tbody>';
                              $sl=1;
              foreach ($pettycash as $datadia) 
              {
                 $html.='<tr>
                              <td>'.$sl.'</td>
                              <td>'.$datadia['pateint_name'].'</td>
                              <td>'.$datadia['mrdno'].'</td>
                              <td>'.$datadia['doctorname'].'</td>
                              <td>'.$datadia['examination_date'].'</td>
                              <td>'.$datadia['dianame'].'</td>
                              <td>'.$datadia['eye'].'</td>
                              <td>'.$datadia['dename'].'</td></tr>'; 
                 $sl++;
              }
          $html.='</tbody></table>';

		  	

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
    $this->msg='Failed';
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
      $this->form_validation->set_rules('coun_doc_id', 'Doctor', 'trim|min_length[1]|max_length[20]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $det_fromdate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('det_fromdate')))));
        $det_todate=trim(htmlentities(date('Y-m-d',strtotime($this->input->post('det_todate')))));
        $coun_doc_id=trim(htmlentities($this->input->post('coun_doc_id')));
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
  public function gettreatmentplan()
  {
    error_reporting(0);
      $this->form_validation->set_rules('surgical_date', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
      $this->form_validation->set_rules('chargetype_id', 'Charge Type ID', 'trim|required|min_length[1]|max_length[16]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $surgical_date_st=trim(htmlentities($this->input->post('surgical_date_st')));
        $surgical_date=trim(htmlentities($this->input->post('surgical_date')));
        $chargetype_id=trim(htmlentities($this->input->post('chargetype_id')));
        $coun_doc_id=trim(htmlentities($this->input->post('coun_doc_id')));
        $fl=$this->input->post('flag')-1;

           $var_array=array($fl,$surgical_date_st,$surgical_date,$chargetype_id,$this->session->userdata('office_id'));
          if($chargetype_id!=5)
          {
            $getresult=$this->Specilaity_report_model->gettreamnetplanmodel($var_array,$coun_doc_id);
          }
          else {
            $var_array=array($surgical_date_st,$surgical_date,$chargetype_id,$this->session->userdata('office_id'));
            $getresult=$this->Specilaity_report_model->gettreamnetplanmodel_inv($var_array,$coun_doc_id);
          }
          
         // print_r($getresult);exit;
          $flag=$this->input->post('flag');
          if($getresult)
          {
            
            $html='<div class="table-responsive"><table id="det_datatable" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>MRD NO</th>
                                    <th>Mobile No</th>
                                    <th>Doctor Name</th>
                                    <th>Particulars</th>
                                    <th>EYE</th>
                                    <th>A Date</th>
                                  </tr>
                                </thead><tbody>';
            $sl=1;
            foreach($getresult as $data)
            { 
              
                $getparticularname=$this->Common_model->getparticularsmodel($data['chargetype_id'],$data['particular_id'],$this->session->userdata('office_id')); 
                $parti= $getparticularname[0]['name'];

            //    if($data['particular_id'])
            //   {
            //      $par= explode(",",$getresult[0]['particular_id']);
            //      if($par)
            //      {
            //        foreach($par as $pardata)
            //        {
            //          if($pardata)
            //          {
            //            $parti='';
                       
            //          }
            //        }
            //      }
            //   }
              $partiy=$parti;
              if($chargetype_id!=5)
              {
              if($data['eye']==1)
              {
                $eye='Left eye';
              }         
              elseif ($data['eye']==2) 
              {
                $eye='Right Eye';
              }
              else
              {
                $eye='Both Eye';
              }
            }
            else {
                $eye='N/A';
            }
             
              $html.='<tr>
                    <td>'.$sl.'</td>
                    <td>'.$data['pateint_name'].'</td>
                    <td>'.$data['mrdno'].'</td>
                    <td>'.$data['mobileno'].'</td>
                    <td>'.$data['doctorname'].'</td>
                    <td>'.$partiy.'</td>
                    <td>'.$eye.'</td>
                    <td>'.$data['appointment_date'].'</td>
                  </tr>';
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
}
