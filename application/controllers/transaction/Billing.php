<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Billing extends CI_Controller {



    public function __construct() {

        parent::__construct();

        if (!isset($this->session->emr_login))

         {

                redirect('login');

         }

         $this->load->model('Common_model');

         $this->load->model('Billing_model');
       
            }

     public function ajax_call(){

        $param=$_REQUEST;

        $response=$this->Billing_model->ajax_call($param);

        echo json_encode($response);

 }

    public function index()

    {

      $data['title']='EMR::Billing';

      $data['activecls']='Billing';

      $data['pat_id']=$this->input->post('printpatient_registration_id');

      $var_array=array($this->session->userdata('office_id'));

     // $data['mrdnos']=$this->Common_model->getpateintmrdnosa($var_array);

      $data['doctors']=$this->Common_model->getdoctors($var_array);
      $data['packagelist']=$this->Common_model->Get_packagelists($var_array);

      $data['modeofpays']=$this->Common_model->getmodeofpay($var_array);

      $data['insurancecompanys']=$this->Common_model->getinsurance_company($var_array);
      $data['advancebilling']=$this->Billing_model->Get_advancebilling($var_array);

      $data['chargeslist']=$this->Common_model->getchargeslist($var_array);

      $content=$this->load->view('transaction/billing/insert',$data,true);

      $this->load->view('includes/layout',['content'=>$content]);  

    }



     public function getparticularsdetails()

  {

     $this->form_validation->set_rules('getid', 'Particulars', 'trim|required|min_length[1]|max_length[100000]|numeric');

     $this->form_validation->set_rules('chargetype_id', 'Charge Type', 'trim|required|min_length[1]|max_length[100000]|numeric');

      if($this->form_validation->run() == TRUE)

      {

        $particular_id=trim(htmlentities($this->input->post('getid')));

        $chargetype_id=trim(htmlentities($this->input->post('chargetype_id')));

          $getresult=$this->Common_model->getparticularsmodel($chargetype_id,$particular_id,$this->session->userdata('office_id'));

          if($getresult)

          {

            //$getdis=$this->Common_model->getDiscountmodel($chargetype_id,$this->session->userdata('office_id'));

            echo json_encode(array('msg' =>$getresult,'error'=>'','error_message' =>''));

          }

          else

          {

              echo json_encode(array('msg' =>'','error'=> 'Failed to get data','error_message' =>''));

          }

        

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }

     private function fetch_data() 

    {

       

       $return=array(

               "billing_master"=>array(

                   "patient_registration_id"=>$this->input->post('patient_registration_id'),

                   "billing_date"=>date('Y-m-d',strtotime($this->input->post('bill_date'))),

                   "billing_time"=>($this->input->post('bill_time'))?$this->input->post('bill_time'):date('H:i:s'),

                   "insurance_company_id"=>$this->input->post('insurance_company_id'),
                   "billing_type"=>$this->input->post('billing_type'),

                   "doctor_id"=>$this->input->post('doctor_id'),

                   'bill_amount'=>$this->input->post('billamount'),

                   'advanced_amount'=>$this->input->post('advancedamount'),
                   'insuranceamount'=>$this->input->post('insuranceamt'),

                   'modeofpay_id'=>$this->input->post('modeofpay_id'),

                   'grand_total'=>$this->input->post('net_amount'),
                   'cash'=>$this->input->post('cash_billing'),

                   'card'=>$this->input->post('card_billing'),

                   'paytm'=>$this->input->post('paytm_billing'),

                   'others'=>$this->input->post('others_billing'),
                   'parent_id'=>$this->session->userdata('parent_id'),

                   'login_id'=>$this->session->userdata('login_id'),

                   'office_id'=> $this->session->userdata('office_id')

                  

               ),

               "bill_number"=>array(

                   'type'=>1,

                   'office_id'=> $this->session->userdata('office_id')

                   ),

             "billing_detail"=>array(

                 "charge_id"=>$this->input->post('chargesid'),

                 "particulars_id"=>$this->input->post('particularsid'),

                 "qty"=>$this->input->post('quantity'),

                 "eye"=>$this->input->post('eye'),

                 "rate"=>$this->input->post('rate'),
                 "package_id"=>$this->input->post('packageid'),

                 "disamt"=>$this->input->post('disamt'),

                 "disper"=>$this->input->post('disper'),

                 "amount"=>$this->input->post('amount'),

                 "calrow_id"=>$this->input->post('calrow_id')

             )

           

           );

            return $return;

    }


    private function fetch_data_adjust() 

    {

       

       $return=array(

               "billing_master"=>array(

                  
                   'adjusted_amount_paid'=>$this->input->post('advancedamounta'),

                   'adjusted_modeofpay_id'=>$this->input->post('modeofpay_id'),

                   'grand_total'=>$this->input->post('net_amounta'),

                   'parent_id'=>$this->session->userdata('parent_id'),

                   'login_id'=>$this->session->userdata('login_id'),

                   'office_id'=> $this->session->userdata('office_id'),

                   'adjustment_time_paid'=>$this->input->post('adjustment_time_paid'),

                  

               ),

               "bill_number"=>array(

                   'type'=>1,

                   'office_id'=> $this->session->userdata('office_id')

                   ),

             "billing_detail"=>array(

                 "charge_id"=>$this->input->post('chargesid'),

                 "particulars_id"=>$this->input->post('particularsid'),

                 "qty"=>$this->input->post('quantity'),

                 "eye"=>$this->input->post('eye'),

                 "rate"=>$this->input->post('rate'),

                 "disamt"=>$this->input->post('disamt'),

                 "disper"=>$this->input->post('disper'),

                 "amount"=>$this->input->post('amount'),

                 "calrow_id"=>$this->input->post('calrow_id')

                 )

           

                );
     
                 return $return;

    }


  public function savedata()

  {

    error_reporting(0);

      $this->form_validation->set_rules('patient_registration_id', 'Select Patient', 'trim|required|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('insurance_company_id', 'Insurance Company', 'trim|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('doctor_id', 'Dotors', 'trim|required|min_length[1]|max_length[30]|numeric');

      // $this->form_validation->set_rules('particularsid[]', 'Particular', 'trim|required|min_length[1]|max_length[30]|numeric');

      // $this->form_validation->set_rules('chargesid[]', 'Charge Type', 'trim|required|min_length[1]|max_length[30]|numeric');

      // $this->form_validation->set_rules('quantity[]', 'Quantity', 'trim|required|min_length[1]|max_length[30]|greater_than[0]');

      // $this->form_validation->set_rules('rate[]', 'Rate', 'trim|required|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('disamt[]', 'Discount Amount', 'trim|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('disper[]', 'Discount Percentage', 'trim|min_length[1]|max_length[30]');

      // $this->form_validation->set_rules('amount[]', 'Amount', 'trim|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('modeofpay_id', 'Modeofpay', 'trim|required|min_length[1]|max_length[30]|numeric');

      if($this->form_validation->run() == TRUE)

      {

          $data=$this->fetch_data();

          $getresult=$this->Billing_model->savedata($data);

          if($getresult)

          {

               $sales_id=$this->db->select('max(billing_master_id) as billing_master_id')

                         ->from('billing_master')

                         ->where(array('office_id'=>$this->session->office_id))

                         ->get()->row()->billing_master_id;

                if($sales_id>0)

                {

                    $sales_id=$sales_id;

                } else {

                    $sales_id= $sales_id;

                   

                }

            echo json_encode(array('msg' =>'Saved Successfully','sales_id'=>$sales_id,'error'=>'','error_message' =>''));

          }

          else

          {

              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

          }

        

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }



  public function getsavedata()

  {

      $this->form_validation->set_rules('getid', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');

      if($this->form_validation->run() == TRUE)

      {

        $getid=trim(htmlentities($this->input->post('getid')));

        $var_array=array($getid,$this->session->userdata('office_id'));

        $chk_duplication=$this->Billing_model->editcheckbillingentry($var_array);

        if($chk_duplication[0]['cnt']==1)

        {

          $html='';

          $var_array_child=array($getid);

          $getmasterdata=$this->Billing_model->Getmastertable($var_array);

          $getdetailsdata=$this->Billing_model->Getdetailstable($var_array_child);

          $sl=1;

          if($getdetailsdata)

          {

              foreach ($getdetailsdata as $data) {

                

                $sel1=$sel2=$sel3=$sel4="";

               $getparticularname=$this->Common_model->getparticularsmodel($data['charge_id'],$data['particulars_id'],$this->session->userdata('office_id'));

                if($data['eye']==0)

                {

                    $sel1="selected";

                }

                else if($data['eye']==1)

                {

                    $sel2="selected";

                }

                else if($data['eye']==2)

                {

                    $sel3="selected";

                }

                else

                {

                    $sel4="selected";

                }

                $html.='<tr>

                         <td><a href="#" onclick="$(this).parent().parent().remove();calcnet();chkcount();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>

                         <td>'.$getparticularname[0]['name'].'</td>

                        <td><input type="number" step="any" name="quantity[]" id="quantity_'.$sl.'" class="form-control grid_table" value="'.$data['qty'].'"  onKeyUp="calcrow('.$sl.')"  onkeydown="changefocus(event,$(this))" onkeypress="return isFloat(event)"  required  autocomplete="off"></td>

                        <td><select  step="any" name="eye[]" id="eye_'.$sl.'" class="form-control grid_table"  autocomplete="off">

                            <option value="0"  '.$sel1.'>Select</option>

                            <option value="1" '.$sel2.'>Left</option>

                            <option value="2" '.$sel3.'>Right</option>

                            <option value="3" '.$sel4.'>Both</option></select></td>\n\

                          <td><input type="text" name="rate[]" id="rate_'.$sl.'" class="form-control grid_table" value="'.$data['rate'].'" onKeyUp="calcrow('.$sl.')" onkeypress="isFloat(event)" onkeydown="changefocus(event,$(this))" ></td>

                          <td><input type="text" name="disamt[]" id="disamt_'.$sl.'" class="form-control grid_table" value="'.$data['disamt'].'" onKeyUp="calcrow('.$sl.')" onkeypress="isFloat(event)" onkeydown="changefocus(event,$(this))" ></td>

                          <td><input type="text" name="disper[]" id="disper_'.$sl.'" class="form-control grid_table" value="'.$data['disper'].'" onKeyUp="calcrow('.$sl.')" onkeypress="isFloat(event)" onkeydown="changefocus(event,$(this))" ></td> 


                      <td>

            <input name="amount[]" id="amount_'.$sl.'" class="form-control grid_table" value="'.$data['amount'].'" readonly="">

            <input type="hidden" name="calrow_id[]" id="calrow_id_'.$sl.'" value="'.$sl.'">

            <input type="hidden" name="particularsid[]" id="particularsid_'.$sl.'" value="'.$data['particulars_id'].'">

            <input type="hidden" name="chargesid[]" id="chargesid_'.$sl.'" value="'.$data['charge_id'].'">
            <input type="hidden" id="packageid_'.$sl.'" name="packageid[]" value="'.$data['package_id'].'" >

                     </td>

                         </tr>';

                         $sl++;

              }

            }

             

          

            

          

          if($getmasterdata)

          {

             echo json_encode(array('msg'=>$getmasterdata,'error' =>'','error_message' =>'','getchilddata'=> $html));

          }

          else

          {

              echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));

          }

        }

        else

        {

           echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));

        }

      }

      else

      {

           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

      }

  }



  public function updatedata()

  {

      $this->form_validation->set_rules('edit_billing_master_id', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');

      $this->form_validation->set_rules('patient_registration_id', 'Select Patient', 'trim|required|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('insurance_company_id', 'Insurance Company', 'trim|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('doctor_id', 'Dotors', 'trim|required|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('particularsid[]', 'Particular', 'trim|required|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('chargesid[]', 'Charge Type', 'trim|required|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('quantity[]', 'Quantity', 'trim|required|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('rate[]', 'Rate', 'trim|required|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('disamt[]', 'Discount Amount', 'trim|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('disper[]', 'Discount Percentage', 'trim|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('amount[]', 'Amount', 'trim|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('modeofpay_id', 'Modeofpay', 'trim|required|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('description', 'Description', 'trim');
    

      if($this->form_validation->run() == TRUE)

      {

        $edit_id=trim(htmlentities($this->input->post('edit_billing_master_id')));

        $data=$this->fetch_data();

        $getresult=$this->Billing_model->updatedata($data,$edit_id);

          if($getresult)

          {

            echo json_encode(array('msg'=>'Updated Successfully','error' =>'','error_message' =>''));

          }

          else

          {

            echo json_encode(array('msg'=>'','error' =>'Failed to Update','error_message' =>''));

          }

        }

      else

      {

       echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));

      }

  }



  public function updatedataadjust()

  {

      $this->form_validation->set_rules('edit_billing_master_ida', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');

      $this->form_validation->set_rules('patient_registration_ida', 'Select Patient', 'trim|required|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('insurance_company_id', 'Insurance Company', 'trim|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('doctor_ida', 'Dotors', 'trim|required|min_length[1]|max_length[30]|numeric');

      //$this->form_validation->set_rules('particularsida[]', 'Particular', 'trim|required|min_length[1]|max_length[30]|numeric');

      //$this->form_validation->set_rules('chargesid[]', 'Charge Type', 'trim|required|min_length[1]|max_length[30]|numeric');

      //$this->form_validation->set_rules('quantity[]', 'Quantity', 'trim|required|min_length[1]|max_length[30]|greater_than[0]');

      //$this->form_validation->set_rules('rate[]', 'Rate', 'trim|required|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('disamt[]', 'Discount Amount', 'trim|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('disper[]', 'Discount Percentage', 'trim|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('amount[]', 'Amount', 'trim|min_length[1]|max_length[30]|greater_than[0]');

      $this->form_validation->set_rules('modeofpay_id', 'Modeofpay', 'trim|required|min_length[1]|max_length[30]|numeric');

      $this->form_validation->set_rules('description', 'Description', 'trim');
      
      $this->form_validation->set_rules('adjustment_time_paid', 'Date', 'trim|min_length[1]|max_length[10]');
      if($this->form_validation->run() == TRUE)

      {

        $edit_id=trim(htmlentities($this->input->post('edit_billing_master_ida')));

        $data=$this->fetch_data_adjust();

        //print_r($edit_id);
        //exit;

        $getresult=$this->Billing_model->updatedataAdjust($data,$edit_id);

     


          if($getresult)

          {

            echo json_encode(array('msg'=>'Updated Successfully','error' =>'','error_message' =>''));

          }

          else

          {

            echo json_encode(array('msg'=>'','error' =>'Failed to Update','error_message' =>''));

          }

      }

      else

      {

       echo json_encode(array('msg'=>'','error' =>'','error_message' =>$this->form_validation->error_array()));

      }

  }

  public function Get_Package_List_particulars()
  {
       $this->form_validation->set_rules('sel', 'Select Package ID', 'trim|required|min_length[1]|max_length[200]|numeric');
      if($this->form_validation->run() == TRUE)
      {  
           $sel=trim(htmlentities($this->input->post('sel')));
           $var_array=array($sel);
           $getresult=$this->Billing_model->Get_all_package($var_array);
           if($getresult)
           { 
               $html='';
               foreach($getresult as $data)
               {
                   $html.=$data['ipd_package_id'].',';
               }
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
  public function deletedata()

  {

    $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');

      if($this->form_validation->run() == TRUE)

      {

          $delete_id=trim(htmlentities($this->input->post('getid')));

          $var_array=array($delete_id,$this->session->userdata('office_id'));

          $getresult=$this->Billing_model->deletedata($delete_id);

          if($getresult)

          {

             echo json_encode(array('msg'=>'Deleted Successfully','error'=>'','error_message' =>''));

          }

          else

          {

            echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));

          }

        }

        else

        {

              echo json_encode(array('msg'=> '', 'error'=> 'Delete ID Not Found','error_message' =>''));

        }

     

  }

    public function print_billing() 

  {

      $this->Billing_model->print_bill($this->input->post('billing_id'),$this->session->userdata('office_id'));

  }



  public function getsavedataAdjust()
  {
      $this->form_validation->set_rules('getid', 'Edit ID', 'trim|required|min_length[1]|max_length[1000]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $getid=trim(htmlentities($this->input->post('getid')));
        $var_array=array($getid,$this->session->userdata('office_id'));
        $chk_duplication=$this->Billing_model->editcheckbillingentry($var_array);
        if($chk_duplication[0]['cnt']==1)
        {
          $html='';
          $var_array_child=array($getid);
          $getmasterdata=$this->Billing_model->Getmastertable($var_array);
          $getdetailsdata=$this->Billing_model->Getdetailstable($getid);
          $sl=1;
          if($getdetailsdata)
          {
              foreach ($getdetailsdata as $data) {
                
                $sel1=$sel2=$sel3=$sel4="";
               $getparticularname=$this->Common_model->getparticularsmodel($data['charge_id'],$data['particulars_id'],$this->session->userdata('office_id'));
                if($data['eye']==0)
                {
                    $sel1="selected";
                }
                else if($data['eye']==1)
                {
                    $sel2="selected";
                }
                else if($data['eye']==2)
                {
                    $sel3="selected";
                }
                else
                {
                    $sel4="selected";
                }
                $html.='<tr>
                         <td><a disabled href="#" onclick="$(this).parent().parent().remove();calcnet();chkcount();"><button disabled class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>
                         <td>'.$getparticularname[0]['name'].'</td>
                        <td><input type="number" disabled step="any" name="quantity[]" id="quantity_'.$sl.'" class="form-control grid_table" value="'.$data['qty'].'"  onKeyUp="calcrow('.$sl.')"  onkeydown="changefocus(event,$(this))" onkeypress="return isFloat(event)"  required  autocomplete="off"></td>
                        <td><select disabled  step="any" name="eye[]" id="eye_'.$sl.'" class="form-control grid_table"  autocomplete="off">
                            <option value="0"  '.$sel1.'>Select</option>
                            <option value="1" '.$sel2.'>Left</option>
                            <option value="2" '.$sel3.'>Right</option>
                            <option value="3" '.$sel4.'>Both</option></select></td>\n\
                          <td><input disabled type="text" name="rate[]" id="rate_'.$sl.'" class="form-control grid_table" value="'.$data['rate'].'" onKeyUp="calcrow('.$sl.')" onkeypress="isFloat(event)" onkeydown="changefocus(event,$(this))" ></td>
                          <td><input disabled type="text" name="disamt[]" id="disamt_'.$sl.'" class="form-control grid_table" value="'.$data['disamt'].'" onKeyUp="calcrow('.$sl.')" onkeypress="isFloat(event)" onkeydown="changefocus(event,$(this))" ></td>

                           <td><input disabled type="text" name="disper[]" id="disper_'.$sl.'" class="form-control grid_table" value="'.$data['disper'].'" onKeyUp="calcrow('.$sl.')" onkeypress="isFloat(event)" onkeydown="changefocus(event,$(this))" ></td> 
                      <td>
            <input disabled name="amount[]" id="amount_'.$sl.'" class="form-control grid_table" value="'.$data['amount'].'" readonly="">
            <input disabled type="hidden" name="calrow_id[]" id="calrow_id_'.$sl.'" value="'.$sl.'">
            <input disabled type="hidden" name="particularsid[]" id="particularsid_'.$sl.'" value="'.$data['particulars_id'].'">
            <input disabled type="hidden" name="chargesid[]" id="chargesid_'.$sl.'" value="'.$data['charge_id'].'">
                     </td>
                         </tr>';
                         $sl++;
              }
            }
             
          
            
          
          if($getmasterdata)
          {
             echo json_encode(array('msg'=>$getmasterdata,'error' =>'','error_message' =>'','getchilddata'=> $html));
          }
          else
          {
              echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));
          }
        }
        else
        {
           echo json_encode(array('msg'=>'','error' =>'Name data Found','error_message' =>''));
        }
      }
      else
      {
           echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
      }
  }
public function getbillinvoicedetails()
{
   $html='';
   $bill_id=$this->input->post('getid');
   if($bill_id>0)
   {
      $billing_masters=$this->db->get_where('billing_master',"billing_master_id=$bill_id")->row();
      if($billing_masters)
      {
        $office_id=$this->session->userdata('office_id');
        $office=$this->db->get_where('office',"office_id=$office_id")->row();
        $company_name=$office->printable_company_name;
        $company_address=$office->printable_company_address;
        $company_mobile=$office->printable_company_mobile;

        $invoice_number=$billing_masters->invoice_number;
        $advanced_amount=$billing_masters->advanced_amount;
        $grand_total=$billing_masters->grand_total;
        $bill_date=$this->date->dateSql2View($billing_masters->billing_date);
        $balance=($billing_masters->bill_amount-($billing_masters->adjusted_amount_paid+$billing_masters->advanced_amount));
        $tot=$billing_masters->grand_total-$billing_masters->advanced_amount;
        $tot1=$tot-$billing_masters->advanced_amount;
        $grndtot=$billing_masters->bill_amount;

        $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$billing_masters->patient_registration_id")->row();
        $fname=$patient_details->fname; 
        $lname=$patient_details->lname; 
        $mrdno=$patient_details->mrdno; 
        $address=$patient_details->address; 
        $mobileno=$patient_details->mobileno; 

        $particulars_details=$this->db->query("select * from billing_detail left join package_master on package_master.package_master_id=billing_detail.package_id where billing_master_id=$bill_id")->result();   
       // print_r($particulars_details);exit;

        $yyyg='';
        $j=0;
        $packagename='';
        $sl=1; foreach($particulars_details as $data)
        {
             $idval=$data->charge_id;
             $package_id=$data->package_id;
             $particularid=$data->particulars_id;
            

              if($idval==1){
                $charges='opdcharge';
                $id="opdcharge_id";
            }
            elseif($idval==2){
                $charges='ipdcharge';
                $id="ipdcharge_id";
            }
            elseif($idval==3){
                $charges='laser';
                $id="laser_id";
            }
            elseif($idval==4){
                $charges='injection';
                $id="injection_id";
            }
            elseif($idval==5){
                $charges='investigation';
                $id="investigation_id";
            }
            $name=$this->db->get_where($charges,"$id=$particularid")->row()->name;

            $yyyg.='<tr>
            <td>'.$sl.'</td>
            <td>'.$name.'</td>
            <td class="text-right">'.number_format($data->rate,2).'</td>
             <td class="text-right">'.number_format($data->disamt,2).'</td>
            <td class="text-right">'.number_format($data->amount,2).'</td>
        </tr>';
        $sl++;
        }
      

           $var_array=array($office_id);
            $modeofpay=$this->Common_model->getmodeofpay($var_array);
            if($modeofpay)
            {
              $sv='<select class="form-control" name="pay_mode" id="pay_mode">';
              foreach ($modeofpay as $data) {
                $sv.='<option value="'.$data['modeofpay_id'].'">'.$data['name'].'</option>';
              }
              $sv.='</select>';
            }

        $logo=($office->logo=='')?'':"<img style='width:100%;' alt='company logo' class='mb-1 mb-sm-0' src='". base_url('images/profile/')."$office->logo'>";
       $html.='<div id="invoice-template" class="card-body p-4">
       <input type="hidden" id="bill_m_id" id="bill_m_id" value="'.$billing_masters->billing_master_id.'">
       <input type="hidden" id="gran" id="gran" value="'.number_format($grndtot,2).'">
         <!-- Invoice Company Details -->
         <div id="invoice-company-details" class="row">
           <div class="col-sm-6 col-12 text-center text-sm-left">
             <div class="media row">
               <div class="col-12 col-sm-3 col-xl-2">
                 '.$logo.'
               </div>
               <div class="col-12 col-sm-9 col-xl-10">
                 <div class="media-body">
                   <ul class="ml-2 px-0 list-unstyled">
                     <li class="text-bold-800">'.$company_name.'</li>
                     <li>'.$company_address.',</li>
                    
                     <li>'.$company_mobile.'</li>
                   </ul>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-sm-6 col-12 text-center text-sm-right">
             <h2>INVOICE</h2>
             <p class="pb-sm-3"><b># '.$invoice_number.'</b></p>
             <ul class="px-0 list-unstyled">
               <li>Balance Due</li>
               <li class="lead text-bold-800"><i class="la la-inr"></i>  '.number_format($balance,2).'</li>
             </ul>
           </div>
         </div>
         <!-- Invoice Company Details -->
     
         <!-- Invoice Customer Details -->
         <div id="invoice-customer-details" class="row pt-2">
           <div class="col-12 text-center text-sm-left">
             <p class="text-muted">Bill To</p>
           </div>
           <div class="col-sm-6 col-12 text-center text-sm-left">
             <ul class="px-0 list-unstyled">
           <li class="text-bold-800"> <b>'.$fname.' '.$lname.'</b></li>
               <li>MRD NO:'.$mrdno.',</li>
               <li>'.$address.',</li>
               <li>'.$mobileno.'</li>
             </ul>
           </div>
           <div class="col-sm-6 col-12 text-center text-sm-right">
             <p><span class="text-muted"><b>Invoice Date :</span> '.$bill_date.'</b></p>
            
           </div>
         </div>
         <!-- Invoice Customer Details -->
     
         <!-- Invoice Items Details -->
         <div id="invoice-items-details" class="pt-2">
           <div class="row">
             <div class="table-responsive col-12">
               <table class="table">
                 <thead>
                   <tr>
                     <th>#</th>
                     <th>Particular</th>
                     <th class="text-right">Rate</th>
                     <th class="text-right">Discount</th>
                     <th class="text-right">Amount</th>
                   </tr>
                 </thead>
                 <tbody>
                  '.$yyyg.'
                 </tbody>
               </table>
             </div>
           </div>
           <div class="row">
             <div class="col-sm-7 col-12 text-center text-sm-left">
               <p class="lead"></p>
               <div class="row">
                 <div class="col-sm-8">
                  
                 </div>
               </div>
             </div>
             <div class="col-sm-5 col-12">
               <p class="lead">Total due</p>
               <div class="table-responsive">
                 <table class="table">
                   <tbody>
                     <tr>
                       <td>Grand Total</td>
                       <td class="text-right"><i class="la la-inr"></i> '.number_format($grndtot,2).'</td>
                     </tr>
                    
                    
                     <tr>
                       <td>Payment Made</td>
                       <td class="pink text-right">(-) <i class="la la-inr"></i> '.number_format($tot1,2).'</td>
                     </tr>
                     <tr class="bg-grey bg-lighten-4">
                       <td class="text-bold-800">Balance Due</td>
                       <td class="text-bold-800 text-right"><i class="la la-inr"></i> '.number_format($balance,2).'</td>
                     </tr>
                     <tr class="bg-grey bg-lighten-4">
                     <td class="text-bold-800">Dis Amt</td>
                     <td class="text-bold-800 text-right"><input type="text" class="form-control" name="st_dis_amt" id="st_dis_amt"></td>
                   </tr>
                   <tr class="bg-grey bg-lighten-4">
                   <td class="text-bold-800">Pay Due</td>
                   <td class="text-bold-800 text-right"><input type="text" class="form-control" name="st_paydue" id="st_paydue" value="'.$balance.'"></td>
                 </tr>
                 <tr class="bg-grey bg-lighten-4">
                 <td class="text-bold-800">Mode</td>
                 <td class="text-bold-800 text-right">'.$sv.'</td>
               </tr>
               </tr>
               <tr class="bg-grey bg-lighten-4">
               <td class="text-bold-800"></td>
               <td class="text-bold-800 text-right"><button class="btn mr-1 mb-1 btn-danger" style="float: right;" onclick="payamount()">Pay Amount</button></td>
             </tr>
                   </tbody>
                 </table>
               </div>
             
             </div>
           </div>
         </div>
     
       
     
       </div>';
         echo json_encode(array('error' =>'','error_message' =>'','getinvicedetails'=> $html));
      }
   }
}
private function pay_fetch_data() 
    {
      return array(
            "billing_master_id"=>$this->input->post('bill_m_id'),
            "dis_amt"=>$this->input->post('st_dis_amt'),
            "pay_amount"=>$this->input->post('st_paydue'),
            "modeofpay_id"=>$this->input->post('pay_mode'),
            "grand_total"=>$this->input->post('gran'),
            "pay_date"=>date('Y-m-d')
       );
    }

public function payamount()
{
    $this->form_validation->set_rules('bill_m_id', 'Bill ID', 'trim|required|min_length[1]|max_length[30]|numeric');
    $this->form_validation->set_rules('st_dis_amt', 'Discount Amount', 'trim|min_length[1]|max_length[30]|numeric');
    $this->form_validation->set_rules('st_paydue', 'Pay Amount', 'trim|required|min_length[1]|max_length[30]');
    $this->form_validation->set_rules('pay_mode', 'Payment Mode', 'trim|min_length[1]|max_length[30]|numeric');
    $this->form_validation->set_rules('gran', 'Grand Total', 'trim|min_length[1]|max_length[30]');
    if($this->form_validation->run() == TRUE)
    {
          $data=$this->pay_fetch_data();
          $getresult=$this->Billing_model->paydueamt($data,$this->input->post('bill_m_id'),$this->input->post('pay_mode'),$this->input->post('st_paydue'),date('Y-m-d'));
          if($getresult)
          {
            echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));
          }
          else
          {
              echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
          }
    }
    else
    {
          echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
    }
}

}

