<?php

/**

 * Description of patient_category_model

 *

 * @author Prabhu @03/07/2021

 */

class Billing_model extends CI_Model{

 public function __construct()

    {

        parent::__construct();

    }





        public function savedata($data)

        {

           $this->db->trans_begin();

           $billing_masters=$data['billing_master'];

           $sql_off = "select * from office limit 1";
       $result_rows=$this->db->query($sql_off); 
       $ress= $result_rows->result_array ();
       if($ress[0]['fin_year_settings']==1)
       {
             $fin_year=$ress[0]['fin_year'];
            $last_invoice_number=$this->db->select('max(bill_number) as last_invoice_number')
                         ->from('bill_number')
                         ->where(array('fin_year'=>$fin_year))
                         ->get()->row()->last_invoice_number;
            if($last_invoice_number>0){$invoice_number=$last_invoice_number;} else { $invoice_number= '0';}
           // Convert the starting bill number to integer
            $startBillNo = intval($last_invoice_number);

            // Increment the bill number
            $nextBillNo = $startBillNo + 1;

            // Format the bill number with leading zeros
            $newBillNo = sprintf('%04d', $nextBillNo);



          $billnocode='OJO';
          if($ress[0]['printable_company_code'])
          {
            $billnocode='';
            $billnocode.=$ress[0]['printable_company_code'];
          }
          if($ress[0]['apps_code'])
          {
            $billnocode.='-'.$ress[0]['apps_code'];
          }
          else
          {
            $billnocode.='-A';
          }

           $billnocodev=$billnocode.'-'.$newBillNo.'/'.$fin_year;
           $bill_number=$newBillNo;
           $invoice_number=$billnocodev;


        $bill_number=$newBillNo;
        $invoice_number=$billnocodev;

       }
       else
       {
$fin_year='23-24'; 
           $bill_setting_qry=$this->db->select('*')

                                              ->where(array('office_id'=>$this->session->office_id))

                                              ->get('bill_settings');

       $bill_setting=$bill_setting_qry->row();

       $last_invoice_number=$this->db->select('max(bill_number) as last_invoice_number')

                         ->from('bill_number')

                         ->where(array('office_id'=>$this->session->office_id))

                         ->get()->row()->last_invoice_number;

                if($last_invoice_number>0)

                {

                    $invoice_number=$last_invoice_number+1;

                } else {

                    $invoice_number= $bill_setting->starting_billno;

                   

                }

         $bill_number=$invoice_number;

         $invoice_number=$bill_setting->prefix.str_pad($invoice_number, strlen($bill_setting->padding),$bill_setting->padding,STR_PAD_LEFT);
      }
          

           $billing_masters['bill_number']=$bill_number;

           $billing_masters['invoice_number']=$invoice_number;

           $this->db->insert('billing_master',$billing_masters);

           $billing_master_id=$this->db->insert_id();

           $office_id=$this->session->userdata('office_id');

           $login_id=$this->session->userdata('login_id');

           $bill_numbers=$data['bill_number'];

           $bill_numbers['bill_number']=$bill_number;
            $bill_numbers['fin_year']=$fin_year;
           $bill_numbers['master_id']=$billing_master_id;

           $this->db->insert('bill_number',$bill_numbers);

           $billing_details=$data['billing_detail'];

           $charge_ids=$billing_details['charge_id'];

           $particulars_ids=$billing_details['particulars_id'];

           $qtys=$billing_details['qty'];
           $package_ids=$billing_details['package_id'];

           $eyes=$billing_details['eye'];

           $rates=$billing_details['rate'];

           $disamts=$billing_details['disamt'];

           $dispers=$billing_details['disper'];

           $amounts=$billing_details['amount'];

           $calrow_ids=$billing_details['calrow_id'];

           $i=0;

           foreach ($calrow_ids as $calrow_id) 

           {

                    $this->db->insert('billing_detail',array(

                                                          "billing_master_id"=>$billing_master_id,

                                                          "charge_id"=>$charge_ids[$i],

                                                          "particulars_id"=>$particulars_ids[$i],

                                                          "qty"=>$qtys[$i],

                                                          "eye"=>$eyes[$i],

                                                          "rate"=>$rates[$i],
                                                          "package_id"=>$package_ids[$i],

                                                          "disamt"=>$disamts[$i],

                                                          "disper"=>$dispers[$i],

                                                          "amount"=>$amounts[$i]

                                                          )

                                    );

               

                

               $i++;

           }

           if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    //$this->session->set_flashdata('sales_id',$sales_id);

                    return TRUE;

            }

        }





         function ajax_call($requestData)

  {

  

    

    $office_id=$this->session->office_id;

    $columns = array(

      // datatable column index  => database column name

      0 =>'billing_master_id',

      1 =>'grand_total'

     

    );

 

    $this->db->select('grand_total');//s.photo_no,s.photo_name'

    $this->db->from('billing_master');

    $whrcon = array('office_id' => $office_id);

    $result = $this->db->get();

    $totalData = $result->num_rows();

    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

   

 

    $sql = "SELECT billing_master_id,billing_master.invoice_number,CONCAT(fname , '',  lname ,'') AS pateint_name,billing_date,bill_amount,advanced_amount,(bill_amount-(adjusted_amount_paid+advanced_amount)) as pending,grand_total,modeofpay.name as mode";

    $sql.=" FROM billing_master left join patient_registration on patient_registration.patient_registration_id=billing_master.patient_registration_id left join modeofpay on billing_master.modeofpay_id=modeofpay.modeofpay_id  where billing_master.office_id=$office_id ";

    // getting records as per search parameters

    $isFilterApply=0;

    if( !empty($requestData['search']['value']) ){   //name

      $sql.="  and (  ";

        $sql.="   invoice_number LIKE '".$requestData['search']['value']."%'  ";

        $sql.="  OR billing_master.patient_registration_id in (select patient_registration_id from patient_registration  where (fname  LIKE '".$requestData['search']['value']."%' or lname  LIKE '".$requestData['search']['value']."%' ) ) ";

        $sql.="  OR billing_date LIKE '".$requestData['search']['value']."%'  ";

        $sql.="  OR grand_total LIKE '".$requestData['search']['value']."%') ";

        $isFilterApply=1;

      }

 

 

      $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."  desc     LIMIT ".$requestData['start']." ,".$requestData['length']."   ";  // adding length

      $result1 = $this->db->query($sql);

      

      if($isFilterApply==1){

        $totalFiltered =  $result1->num_rows(); 

      }



       // when there is a search parameter then we have to modify total number filtered rows as per search result.

      $row=$result1->result_array();



      for ($i=0; $i < count($row); $i++) {

            $billing_master_id=$row[$i]['billing_master_id'];





         $edit="<button type='button'  onclick=\"editdata('$billing_master_id');\" class='btn btn-icon btn-warning mr-1 mb-1'><i class='la la-edit'></i></button>";

 $print='<button onclick="printdata('.$billing_master_id.')" type="button" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button>';

        // $edit='<button  onclick="editdepartment_id('.$department_id_id.',1,$(this),'.$code.','.$name.','.$description.','.$status.')" type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-edit"></i></button>';



        $delete='<button onclick="deletedata('.$billing_master_id.')" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button>';



        // if(($this->auth->lock_up('item_master',"category_id='$department_id_id'")) || ($this->auth->lock_up('supplier',"category_id='$department_id_id'")) ||in_array($department_id_id,[1,2,3]))

        //   {

        //       $delete='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';

        //   }

        //   if(in_array($department_id_id,[1,2,3]))

        //   {

        //       $edit='<button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button>';

        //   }

     

        $row[$i]['slno']=$i+1;

        $row[$i]['print']=$print;

        $row[$i]['edit']=$edit;



        

        $row[$i]['delete']=$delete;

        

      }





      $json_data = array(

        "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.

        "recordsTotal"    => intval( $totalData ),  // total number of records

        "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData

        "data"            =>   $row  // total data array

 

      );

      return $json_data;

 

  }

  public function Get_advancebilling($var_array)
  {
      $sql = "select CONCAT(fname , '',  lname ,'') AS pateint_name,invoice_number,mrdno,a.patient_registration_id,billing_master_id from billing_master a  inner join patient_registration b  on a.patient_registration_id=b.patient_registration_id
       where  billing_type= 1 and  a.office_id= ? and adjustment_time_paid IS NULL";
      $result_row=$this->db->query($sql, $var_array); 
      $res= $result_row->result_array ();
      $this->logger->save($this->db);
      return $res;
  }
  public function editcheckbillingentry($var_array)

    {

        $sql = "select count(*) as cnt from billing_master where  billing_master_id= ? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }

    public function Getmastertable($var_array)

    {

        $sql = "select * from billing_master where  billing_master_id= ? and  office_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }

    public function Getdetailstable($var_array)

    {

        $sql = "select * from billing_detail where  billing_master_id= ?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        $this->logger->save($this->db);

        return $res;

    }
    public function Get_all_package($var_array)

    {

        $sql = "select ipd_package_id  from package_master_detail  where package_master_id=?";

        $result_row=$this->db->query($sql, $var_array); 

        $res= $result_row->result_array ();

        return $res;

    }


     public function updatedata($data,$id)

        {



            $this->db->trans_begin();

            $office_id=$this->session->userdata('office_id');

            $login_id=$this->session->userdata('login_id');

            

            $this->db->where('billing_master_id',$id);

            $this->db->delete('billing_detail');

           

            $billing_masters=$data['billing_master'];

            $this->db->set($billing_masters);

            $this->db->where('billing_master_id', $id);

            $this->db->update('billing_master');

            $billing_master_id=$id;



          

           $office_id=$this->session->userdata('office_id');

           $login_id=$this->session->userdata('login_id');

           $billing_details=$data['billing_detail'];

           $charge_ids=$billing_details['charge_id'];

           $particulars_ids=$billing_details['particulars_id'];

           $qtys=$billing_details['qty'];

           $eyes=$billing_details['eye'];

           $rates=$billing_details['rate'];

           $disamts=$billing_details['disamt'];

           $dispers=$billing_details['disper'];

           $amounts=$billing_details['amount'];

           $calrow_ids=$billing_details['calrow_id'];

           $i=0;

           foreach ($calrow_ids as $calrow_id) 

           {

                    $this->db->insert('billing_detail',array(

                                                          "billing_master_id"=>$billing_master_id,

                                                          "charge_id"=>$charge_ids[$i],

                                                          "particulars_id"=>$particulars_ids[$i],

                                                          "qty"=>$qtys[$i],

                                                          "eye"=>$eyes[$i],

                                                          "rate"=>$rates[$i],

                                                          "disamt"=>$disamts[$i],

                                                          "disper"=>$dispers[$i],

                                                          "amount"=>$amounts[$i]

                                                          )

                                    );

               

                

               $i++;

           }

          

            if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    return TRUE;

            }

        }




        public function updatedataAdjust($data,$id)

        {



            $this->db->trans_begin();

            $office_id=$this->session->userdata('office_id');

            $login_id=$this->session->userdata('login_id');

            

            $this->db->where('billing_master_id',$id);

            //$this->db->delete('billing_detail');

           

            $billing_masters=$data['billing_master'];

            $this->db->set($billing_masters);

            $this->db->where('billing_master_id', $id);

            $this->db->update('billing_master');

            $billing_master_id=$id;



          

           $office_id=$this->session->userdata('office_id');

           $login_id=$this->session->userdata('login_id');

           $billing_details=$data['billing_detail'];

           $charge_ids=$billing_details['charge_id'];

           $particulars_ids=$billing_details['particulars_id'];

           $qtys=$billing_details['qty'];

           $eyes=$billing_details['eye'];

           $rates=$billing_details['rate'];

           $disamts=0;

           $dispers=0;

           $amounts=$billing_details['amount'];

           $calrow_ids=$billing_details['calrow_id'];

           $i=0;

        //    foreach ($calrow_ids as $calrow_id) 

        //    {

        //             $this->db->insert('billing_detail',array(

        //                                                   "billing_master_id"=>$billing_master_id,

        //                                                   "charge_id"=>$charge_ids[$i],

        //                                                   "particulars_id"=>$particulars_ids[$i],

        //                                                   "qty"=>$qtys[$i],

        //                                                   "eye"=>$eyes[$i],

        //                                                   "rate"=>$rates[$i],

        //                                                   "disamt"=>0,

        //                                                   "disper"=>0,

        //                                                   "amount"=>$amounts[$i]

        //                                                   )

        //                             );

               

                

        //        $i++;

        //    }

          

            if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    return TRUE;

            }

        }



         public function deletedata($id) 

        {

            $this->db->trans_begin();

           

            $this->db->where('billing_master_id',"$id");

            $this->db->delete('billing_detail');

            $this->db->where('billing_master_id',"$id");

            $this->db->delete('billing_master');

           if ($this->db->trans_status() === FALSE)

            {

                    $this->db->trans_rollback();

                    return FALSE;

            }

            else

            {

                    $this->db->trans_commit();

                    

                    return TRUE;

            }

        }



    function print_bill($billing_id,$office_id)

  { error_reporting(0);

                        

    $office=$this->db->get_where('office',"office_id=$office_id")->row();

    $data['logo']=($office->logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->logo'>";

    $data['nabh_logo']=($office->nabh_logo=='')?'':"<img style='width:100%;max-height:100px' src='". base_url('images/profile/')."$office->nabh_logo'>";
     $data['nabh_logo_que']=$office->nabh_logo;

    $data['website']=$office->website;

    $data['facebook']=$office->facebook;

    $data['youtube']=$office->youtube;



    $data['company_name']=$office->printable_company_name."<br/><t style='font-size:11px;'>$office->registered_name</t>";

    $data['company_address']=$office->printable_company_address;

    $data['company_mobile']=$office->printable_company_mobile;

    $data['company_land_phone']=$office->printable_company_phone;

    $data['company_email']=$office->printable_emailid;

    $data['company_gst']=$office->license_no;

    $data['print_declaration']=$office->declaration;

    $data['gstin_no']=$office->gstin_no;



    $billing_masters=$this->db->get_where('billing_master',"billing_master_id=$billing_id")->row();

    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$billing_masters->doctor_id")->row()->name;

   $data['username']=$this->db->get_where('user',"user_id=$billing_masters->login_id")->row()->name;



   $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$billing_masters->patient_registration_id")->row();

   $data['grand_total']=$billing_masters->grand_total;
   $data['bill_amount']=$billing_masters->bill_amount;

   $data['invoice_number']=$billing_masters->invoice_number;

   $data['advanced_amount']=$billing_masters->advanced_amount;
   $data['insuranceamount']=$billing_masters->insuranceamount;


   $tot=$billing_masters->grand_total-$billing_masters->advanced_amount;

   $tot1=$tot-$billing_masters->advanced_amount;
   $adamt=$billing_masters->bill_amount;
   if($billing_masters->advanced_amount)
   {
     $adamt=$billing_masters->advanced_amount;
   }

   $data['net_amount_in_words']= $this->numberTowords($adamt);

   $charge_id=$this->db->get_where('billing_detail',"billing_master_id=$billing_id")->row()->charge_id;

   $data['charge']=$this->db->get_where('charge_type',"charge_id=$charge_id")->row()->name;



   $data['bill_date']=$this->date->dateSql2View($billing_masters->billing_date);
   $data['bill_time']=date("h:i a", strtotime($billing_masters->billing_time));
   $data['adjustamount_date']=$this->date->dateSql2View($billing_masters->adjustment_time_paid);
   $data['adjust_amount']=$billing_masters->adjusted_amount_paid;
   $data['balance']=($billing_masters->bill_amount-($billing_masters->adjusted_amount_paid+$billing_masters->advanced_amount));


   $data['mode']=$this->db->get_where('modeofpay',"modeofpay_id=$billing_masters->modeofpay_id")->row()->name;

   if($billing_masters->adjusted_amount_paid>0)
   {
    $pri='print3';
   }
   else
   {
    $pri='print';
   }
   $paymentmo='';
   if($billing_masters->cash)
   {
     $paymentmo.=' Cash: '.number_format($billing_masters->cash,2) ;
   }
   if($billing_masters->card)
   {
     $paymentmo.=' Card: '.number_format($billing_masters->card,2) ;
   }
   if($billing_masters->paytm)
   {
     $paymentmo.=' Paytm: '.number_format($billing_masters->paytm,2) ;
   }
    if($billing_masters->others)
   {
     $paymentmo.=' Others: '.number_format($billing_masters->others,2) ;
   }

$data['dpaymentm']=$paymentmo; 

   $data['fname']=$patient_details->fname; 

   $data['lname']=$patient_details->lname; 

   $data['mrdno']=$patient_details->mrdno; 

   $data['address']=$patient_details->address; 

    $data['mobileno']=$patient_details->mobileno; 
    $adjusted_modeofpay_id=$billing_masters->adjusted_modeofpay_id;
    if($adjusted_modeofpay_id)
    {
      $data['mode_pay2nd']=$this->db->get_where('modeofpay',"modeofpay_id=$adjusted_modeofpay_id")->row()->name;
    }
    else {
      $data['mode_pay2nd']='';
    }
    

   $data['date_of_admission']=$this->date->dateSql2View($this->db->get_where('patient_appointment',"patient_registration_id=$patient_details->patient_registration_id")->row()->appointment_date);

   if($patient_details->gender==1)

   {

    $age='Male';

   }

   elseif($patient_details->gender==2)

   {

    $age="Female";

   }

   else

   {

    $age='Transgender';

   }

   $data['gender']=$age; 

   $data['ageyy']=$patient_details->ageyy; 

   $data['agemm']=$patient_details->agemm; 

   $title_id=$patient_details->title; 

   $data['titlename']=$this->db->get_where('patient_title',"patient_title_id=$title_id")->row()->name;

   if($billing_masters->updated_date)

    {

        $data['created_date']=$billing_masters->updated_date; 

    }

    else

    {

        $data['created_date']=$billing_masters->created_date; 

    }

    //print_r($data);exit;

   



  $data['particulars_details']=$this->db->query("select * from billing_detail left join package_master on package_master.package_master_id=billing_detail.package_id where billing_master_id=$billing_id")->result();                


$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
   if($host_tvm=='queens')
   {

        $html=$this->load->view("transaction/billing/queensbill",$data, true); 
                   $print_config=[
                                    'format' => [100,200],
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 10,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];
                              // echo $html;exit;
   }
     elseif($host_tvm=='pefemr')
   {
                 $html=$this->load->view("transaction/billing/".$pri,$data, true); 
               
                   $print_config=[
                                    'format' => 'A5',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 10,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];
                              
   }
   else
   {
   

   

   

         switch($patient_details->print)

            {

            case 1:$html=$this->load->view("transaction/billing/".$pri,$data, true); 

                   $print_config=[

                                    'format' => 'A4',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 10,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

            case 2:$html=$this->load->view("transaction/billing/".$pri,$data, true); 

                   $print_config=[

                                    'format' => 'A4-L',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 5,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

           case 3:$html=$this->load->view("transaction/billing/".$pri,$data, true); 

        

           

                   $print_config=[

                                    'format' => 'A5',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 5,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

              case 4:$html=$this->load->view("transaction/billing/".$pri,$data, true); 

                   $print_config=[

                                    'format' => 'A5-L',

                                    'margin_left' => 10,

                                    'margin_right' => 10,

                                    'margin_top' => 10,

                                    'margin_bottom' => 10,

                                    'margin_header' => 0,

                                    'margin_footer' => 0,

                                ];

                                break;

            }
        }


            $mpdf = new \Mpdf\Mpdf($print_config);

            $pdfFilePath ="print-".time().".pdf"; 

            $labName='';

            $mpdf->SetWatermarkText($labName,0.03);

            $mpdf->showWatermarkText = true;

            $mpdf -> SetDisplayMode('fullpage');

            $mpdf->WriteHTML($html);

            $mpdf->Output();

           

  }
  
      public function paydueamt($data,$billmast_id,$mode,$st_paydue,$curd)
    {
        if($this->db->insert('billing_payment_detail',$data))
        {
            $sql = "update billing_master set adjusted_amount_paid='$st_paydue',adjustment_time_paid='$curd',adjusted_modeofpay_id=$mode where billing_master_id=$billmast_id";
            $result_row=$this->db->query($sql); 
             return TRUE;
        }
    }
function numberTowords($number)

{



    $decimal = round($number - ($no = floor($number)), 2) * 100;

    $hundred = null;

    $digits_length = strlen($no);

    $i = 0;

    $str = array();

    $words = array(0 => '', 1 => 'One', 2 => 'Two',

        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',

        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',

        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',

        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',

        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',

        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',

        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',

        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');

    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');

    while( $i < $digits_length ) {

        $divider = ($i == 2) ? 10 : 100;

        $number = floor($no % $divider);

        $no = floor($no / $divider);

        $i += $divider == 10 ? 1 : 2;

        if ($number) {

            $plural = (($counter = count($str)) && $number > 9) ? '' : null;

            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;

            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;

        } else $str[] = null;

    }

    $Rupees = implode('', array_reverse($str));

    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';

    return ($Rupees ? $Rupees . ' ' : '') . $paise. " Only";



}



}