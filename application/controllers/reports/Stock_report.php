<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_report extends CI_Controller {
	private $msg;
	private $error;
	private $error_message;
	private $randval;
	public function __construct() {
        parent::__construct();
        if (!isset($this->session->optical_login))
         {
		    	redirect('login');
         }
        
        $this->load->model('Stock_report_model');
        $this->load->model('Common_model');
    }
	public function index()
	{
		$data['title']='Optical::Stock Report';
		$data['activecls']='Stock_report';
		$office_id=$this->session->office_id;
		$var_array=array($office_id);
		$data['getitem']=$this->Common_model->getitemdata($var_array);
   // $data['getcategory']=$this->Common_model->getcategory($var_array);
    //$data['getlens']=$this->Common_model->getlensmaster($var_array);
		$content=$this->load->view('reports/Stock_report',$data,true);
		$this->load->view('includes/layout',['content'=>$content]);
	}

    public function getsummary()
    {
      $this->form_validation->set_rules('sum_productname', 'Item Name', 'trim|min_length[1]|max_length[20]');
      if($this->form_validation->run() == TRUE)
      {
        
        $itemname=trim(htmlentities($this->input->post('sum_productname')));
	 	 $getresult=$this->Stock_report_model->getsummaryreportmodel($itemname,$this->session->userdata('office_id'));
		  if($getresult)
		  {

        $stockqty=$this->db->query("select sum(quantity) as qtys  from stock ")->row();

		  	$html='<div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-success mb-2" role="alert">
                       <h4 style="text-align:center;font-weight:bold;">TOTAL STOCK:'.number_format((float)$stockqty->qtys
            ,2,'.', '').'</h4>
                       </div>
                  </div>
                  </div>
                  <table class="table table-striped table-bordered dataex-html5-selectors" id="example_sum">
		  			<thead>
                    <tr>
                         <th>SL NO</th>
                         <th>Item Name</th>
                         <th>Stock</th>
                     </tr>
                     </thead>
                   <tbody>';
		  	$sl=1;
		  	$sumnetamount='0.00';
        
		  	foreach ($getresult as $data) {
          $stock=0;
		  		if($data['stock'])
          {
            $stock=$data['stock'];
          }
		  			$html.='<tr>
			  					<td>'.$sl.'</td>
			  					<td>'.$data['name'].'</td>
			  					<td>'.$stock.'</td>
		  					</tr>';
		  					$sl++;
		  					$sumnetamount+=$data['stock'];
          
		  	}
		  				$html.='
		  						
		  						<tr>
				  					<th>'.$sl.'</th>
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
