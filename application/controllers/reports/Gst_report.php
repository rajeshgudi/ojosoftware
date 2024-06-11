<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gst_report extends CI_Controller {
	private $msg;
	private $error;
	private $error_message;
	private $randval;
	public function __construct() {
    error_reporting(0);
        parent::__construct();
        if (!isset($this->session->optical_login))
         {
		    	redirect('login');
         }
        
        
    }
	public function index()
	{
		$data['title']='Optical::GST Report';
		$data['activecls']='Gst_report';
		$office_id=$this->session->office_id;
		$var_array=array($office_id);
		$content=$this->load->view('reports/gst_report',$data,true);
		$this->load->view('includes/layout',['content'=>$content]);
	}

	public function getgstreport()   // summary 
     {
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
        $qry="select sales_master.*,customer.name as name,sales_master.sales_id,sum(sales_details.total_amount) as amount,sales_master.other_charge,sales_master.discount_amount";
        $qry.=" from sales_master";
        $qry.=" inner join customer on sales_master.customer_id=customer.customer_id";
        $qry.=" inner join sales_details on sales_master.sales_id=sales_details.sales_id";
        $qry.=" where sales_master.status=2 and sales_master.sales_date>='$frmdate' and sales_master.sales_date<='$todate'  and sales_master.office_id=".$office_id." group by sales_details.sales_id";
     
        $result=$this->db->query($qry)->result();

        
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

}