<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counseling_viewdetails extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
             redirect('login');
         }
        $this->load->model('Counseling_viewmodel');
        $this->load->model('Common_model');
      
    }
    public function ajax_call(){
        $param=$_REQUEST;
        $response=$this->Counseling_viewmodel->ajax_call($param);
        echo json_encode($response);
 }
	public function index()
	{
      $data['title']='EMR::Counseling View Details';
      $data['activecls']='Counseling_viewdetails';
      $var_array=array($this->session->userdata('office_id'));
      $data['mrdnos']=$this->Common_model->getpateintmrdnos($var_array);
      $data['departments']=$this->Common_model->getdepartment($var_array);
      $data['insurancecompanys']=$this->Common_model->getinsurance_company($var_array);
      $var_arraysf=array(2,$this->session->userdata('office_id'));
      $data['surgeon']=$this->Common_model->getdoctorval($var_arraysf);
      $var_arraysf=array(3,$this->session->userdata('office_id'));
      $data['anthes']=$this->Common_model->getdoctorval($var_arraysf);
      $content=$this->load->view('master/counseling_view',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
    private function fetch_data() 
    {
    	$status=trim($this->input->post('status'));
        if(!$this->input->post('status'))
        {
            $status=0;
        }
        $office_id=$this->session->office_id;
        return array(
            'name'=>trim($this->input->post('name')),
            'amount'=>trim($this->input->post('amount')),
            'description'=>trim($this->input->post('description')),
            'department_id'=>trim($this->input->post('department_id')),
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
           );
    }

    public function savedata()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[1]|max_length[30]|numeric');
    	$this->form_validation->set_rules('description', 'Description', 'trim');
	    if($this->form_validation->run() == TRUE)
	    {
	    	$name=trim(htmlentities($this->input->post('name')));
	    	$description=trim(htmlentities($this->input->post('description')));
	    	$status=trim(htmlentities($this->input->post('status')));
	    	$var_array=array($name,$this->session->userdata('office_id'));
	    	$chk_duplication=$this->Counseling_viewmodel->checkingval($var_array);
	    	if($chk_duplication[0]['cnt']==0)
	    	{
	    		$data=$this->fetch_data();
	    		$getresult=$this->Counseling_viewmodel->savedata($data);
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
	              echo json_encode(array('msg'=>'','error' =>'Name already Used','error_message' =>''));
	    	}
	    }
	    else
	    {
	         echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}

	public function getallapp()
	{
		error_reporting(0);
		$this->form_validation->set_rules('getid', 'Get ID', 'trim|required|numeric');
		if($this->form_validation->run() == TRUE)
	    {
	    	   $chargeid=$this->input->post('getid');
	    		if($this->input->post('getid')==2)
	    		{
	    			$idname='sur';
	    			$opname='Surgery';
	    			$clsname="style='display:black;'";
	    		}
	    		elseif($this->input->post('getid')==3)
	    		{
	    			$idname='las';
	    			$opname='las';
	    			$clsname="style='display:mone;'";
	    		}
	    		elseif($this->input->post('getid')==4)
	    		{
	    			$idname='inj';
	    			$opname='inj';
	    			$clsname="style='display:mone;'";
	    		}
	    		$datt=$this->input->post($idname.'_date0');
	    	$var_array=array($this->input->post('getid'),$this->input->post($idname.'_date0'),$this->input->post($idname.'_date'),$this->session->userdata('office_id'));
	    	$getdata=$this->Counseling_viewmodel->getallappmodesl($var_array);
	    	if($getdata)
	    	{
	    		$url='Counseling_viewdetails/printdata/'.$chargeid.'/'.$datt;
	    		
	    		 $html='<div style="float:Right"><a href="'.$url.'" target="_blank"><button type="button" class="btn btn-danger"><i class="la la-print"></i></button></a></div><div class="table-responsive"><table id="'.$idname.'_datatable" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>MRD NO</th>
                                    <th>Gender/Age</th>
                                    <th>Mobile No</th>
                                   
                                    <th>Particulars</th>
                                    <th>EYE</th>
                                    <th>A Date</th>
                                    <th '.$clsname.'>Operating surgeon</th>
                                    <th>Anesthesia Name</th>
                                    <th>Cancel</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead><tbody>';
            	$sl=1;
            	$opnn=$anthesia='';
	    		foreach ($getdata as $data) 
	    		{
	    			if($data['gender']==1)
	    			{
	    				$gen='Male';
	    			}
	    			elseif ($data['gender']==2) {
	    				$gen='Female';
	    			}
	    			else
	    			{
	    				$gen='Transgender';
	    			}
	    			if($data['operating_surgon'])
	    			{
		    			 $sqll = "select doctors_registration.name as doctorname from doctors_registration where doctors_registration_id=".$data['operating_surgon'];
					            $result_row=$this->db->query($sqll); 
					            $res= $result_row->result_array ();
					            if($res)
					            {
					            	$opsurname=$res[0]['doctorname'];
					            }
					            else
					            {
					            	$opsurname='';
					            }
				    }
					    if($data['typeof_anthesia'])
					    {
				             $sqll = "select doctors_registration.name as doctorname from doctors_registration where doctors_registration_id=".$data['typeof_anthesia'];
				            $result_row=$this->db->query($sqll); 
				            $res= $result_row->result_array ();
				            if($res)
				            {
				            	$anthesia=$res[0]['doctorname'];
				            }
				            else
				            {
				            	$anthesia='';
				            }
				        }
				        
				            if($this->input->post('getid')==2)
				            {
				            	if($data['typeof_anthesia'])
				            	{
					            	$sqll = "select name  from doctors_registration where doctors_registration_id=".$data['typeof_anthesia'];
					            	$result_row=$this->db->query($sqll); 
						            $res= $result_row->result_array ();
						            if($res)
						            {
						            	$opnn=$res[0]['name'];
						            }
						            else
						            {
						            	$opnn='';
						            }
					            }
				            }
				$getparti=$this->Counseling_viewmodel->getdatasurgerymdl($data['typeof_surgery_id'],$this->input->post('getid'),$data['particular_type'],$this->session->userdata('office_id'));
				 
                  if($getparti)
                  {
	                  $parname=$getparti[0]['name'];
	                  $amt=$getparti[0]['amount'];
	              }
	              else
	              {
	              	$parname='';
	              	$amt='';
	              }
	              if($data['eye']==1)
	              {
	              	$eyee='Left';
	              }
	              elseif($data['eye']==2)
	              {
	              	$eyee='Right';
	              }
	              elseif($data['eye']==3)
	              {
	              	$eyee='Both';
	              }

	    			$html.='<tr>
	    						<td>'.$sl.'</td>
	    						<td>'.$data['pateint_name'].'</td>
	    						<td>'.$data['mrdno'].'</td>
	    						<td>'.$gen.' /'.$data['ageyy'].'</td>
	    						<td>'.$data['mobileno'].'</td>
	    					
	    						<td>'.$parname.' - '.$amt.'</td>
	    						<td>'.$eyee.'</td>
	    						<td>'.$data['admission_date'].'</td>
	    						<td '.$clsname.'>'.$opnn.'</td>
	    						<td>'.$anthesia.'</td>
	    						<td><button type="button" class="btn btn-warning" onclick="cancel('.$data['preoperative_appointment_id'].')"><i class="la ft-x"></i></button></td>
	    						<td><button type="button" class="btn btn-danger" onclick="deletedata('.$data['preoperative_appointment_id'].')"><i class="la ft-trash"></i></button></td>
	    			        </tr>';
	    			        $sl++;
	    		}
	    		$html.='</tbody></table></div>';
	    		echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));
	    	}
	    	else
	    	{
	    		echo json_encode(array('msg'=>'No Data Found','error' =>'','error_message' =>''));
	    	}
	    	
			
	    		
	    	
	    }
	    else
	    {
	    	echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
	    }
	}
	public function gettreatmentplan()
  {
      $this->form_validation->set_rules('pre_date0', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
      $this->form_validation->set_rules('pre_date', 'Search Date', 'trim|required|min_length[1]|max_length[16]');
      if($this->form_validation->run() == TRUE)
      {
        $surgical_date_st=trim(htmlentities($this->input->post('pre_date0')));
        $surgical_date=trim(htmlentities($this->input->post('pre_date')));
        $chargetype_id=2;
           $var_array=array($surgical_date_st,$surgical_date,$chargetype_id,$this->session->userdata('office_id'));
          $getresult=$this->Counseling_viewmodel->gettreamnetplanmodel($var_array);
         // print_r($getresult);exit;
          $flag=$this->input->post('flag');
          if($getresult)
          {
            $tdd='';$tdd1='';
            if($chargetype_id==2)
            {
              if($flag==1)
              {
                $idname='sur_open';
                $tdd='<th>Delete</th>';
              }
              elseif($flag==2)
              {
                $idname='sur_pending';
              }
              elseif($flag==3)
              {
                $idname='sur_completed';
              }
              elseif($flag==4)
              {
                $idname='sur_cancel';
              }
              
              
            }
            elseif($chargetype_id==3)
            {
              if($flag==1)
              {
                $idname='las_open';
                $tdd='<th>Delete</th>';
               
              }
              elseif($flag==2)
              {
                $idname='las_pending';
              }
              elseif($flag==3)
              {
                $idname='las_completed';
              }
              elseif($flag==4)
              {
                $idname='las_cancel';
              }
            }
               elseif($chargetype_id==4)
            {
              if($flag==1)
              {
                $idname='inj_open';
                $tdd='<th>Delete</th>';
               
              }
              elseif($flag==2)
              {
                $idname='inj_pending';
              }
              elseif($flag==3)
              {
                $idname='inj_completed';
              }
              elseif($flag==4)
              {
                $idname='inj_cancel';
              }
            }
            $html='<div class="table-responsive"><table id="idname_datatable" class="table table-striped table-bordered opticaltable-list" style="width: 100%;">
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
                                    <th>Action</th>
                                  </tr>
                                </thead><tbody>';
            $sl=1;
            foreach($getresult as $data)
            { 
               $examination_id=$data['examination_id'];
            if($flag==1)
              {
                
                
                $tdd1='<td><button class="btn btn-danger" onclick="deletedata('.$data['examination_treatmentplan_id'].','.$this->input->post('flag').')"><i class="la la-trash"></i></button></td>';
              } 
               $parti=$partiidlis='';
              //  if($data['particular_id'])
              // {
             
                if($examination_id)
                {
                  $getparid=$this->Common_model->get_Each_particularsmodel($examination_id,$chargetype_id);
                  if($getparid)
                  {
                    
                    foreach($getparid as $dataparti)
                    {
                       $npartid=$dataparti['particular_id'];
                       if($npartid)
                       {
                         $getparticularname=$this->Common_model->getparticularsmodel($data['chargetype_id'],$npartid,$this->session->userdata('office_id')); 
                          $parti.= $getparticularname[0]['name'].',';
                          $partiidlis.=$npartid.',';
                       }
                    }
                  }
                }

                 // $par= explode(",",$getresult[0]['particular_id']);
                 // if($par)
                 // {
                 //  $parti='';
                 //   foreach($par as $pardata)
                 //   {
                 //    if($pardata){
                 //     $getparticularname=$this->Common_model->getparticularsmodel($data['chargetype_id'],$pardata,$this->session->userdata('office_id')); 
                 //     }
                 //     $parti.= $getparticularname[0]['name'].',';
                 //   }
                 // }
              //}
              $partiy=substr($parti, 0, -1);
              $partiidlisdata=substr($partiidlis, 0, -1);
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
             $newtextbox='<input type="hidden" id="datalistparti_'.$examination_id.'" value="'.$partiidlisdata.'">';
              $html.='<tr>
                    <td>'.$sl.'</td>
                    <td>'.$data['pateint_name'].'</td>
                    <td>'.$data['mrdno'].'</td>
                    <td>'.$data['mobileno'].'</td>
                    <td>'.$data['doctorname'].'</td>
                    <td>'.$partiy.'</td>
                    <td>'.$eye.'</td>
                    <td>'.$data['appointment_date'].'</td>
                   <td><button onclick="actionpop('.$data['examination_treatmentplan_id'].')" type="button" class="btn-sm btn-info"><i class="ft-cpu"></i></button></td>
                    
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
  public function Getpopup_eye()
  {
  	  $this->form_validation->set_rules('examination_treatment_plan_id', 'Treatment Plan ID', 'trim|required|min_length[1]|max_length[100]|numeric');
      if($this->form_validation->run() == TRUE)
      {
      				$investigation='';
      		$systemic='';
      		$fir1='';
      		$fir2='';
      		$fir3='';
      		$fir4='';
      		$fir5='';
      		$fir6='';
      		$fir7='';
      		$k1r1='';
      		$k1l1='';
      		$k2r1='';
      		$k2l1='';
      		$ax1='';
      		$ax2='';
      		$acd1='';
      		$acd2='';
      		$lt1='';
      		$lt2='';
      		$formula='';
      		$re='';
      		$fir_resec1='';
      		$fir_resec2='';
      		$fir_resec3='';
      		$iol1='';
      		$iol2='';
      		$iol3='';
      		$iol4='';
      		$iol5='';
      		$iol6='';
      		$iol7='';
      		$iol8='';
      		$iol9='';
      		$iol10='';
      		$iol11='';
      		$iol12='';
      		$iol13='';
      		$iol14='';
      		$iol15='';
      		$iol16='';
      		$iol17='';
      		$iol18='';
      		$le='';
      		$sec_resec1='';
      		$sec_resec2='';
      		$sec_resec3='';
      		$liol1='';
      		$liol2='';
      		$liol3='';
      		$liol4='';
      		$liol5='';
      		$liol6='';
      		$liol7='';
      		$liol8='';
      		$liol9='';
      		$liol10='';
      		$liol11='';
      		$liol12='';
      		$liol13='';
      		$liol14='';
      		$liol15='';
      		$liol16='';
      		$liol17='';
      		$liol18='';
      		$counselling_preoperative_investigation_id='';
      	$getparid=$this->Counseling_viewmodel->Get_saved_values_fromt($this->input->post('examination_treatment_plan_id'));
      	if($getparid)
      	{
      		$counselling_preoperative_investigation_id=$getparid[0]['counselling_preoperative_investigation_id'];
      		$investigation=$getparid[0]['investigation'];
      		$systemic=$getparid[0]['systemic'];
      		$fir1=$getparid[0]['fir1'];
      		$fir2=$getparid[0]['fir2'];
      		$fir3=$getparid[0]['fir3'];
      		$fir4=$getparid[0]['fir4'];
      		$fir5=$getparid[0]['fir5'];
      		$fir6=$getparid[0]['fir6'];
      		$fir7=$getparid[0]['fir7'];
      		$k1r1=$getparid[0]['k1r1'];
      		$k1l1=$getparid[0]['k1l1'];
      		$k2r1=$getparid[0]['k2r1'];
      		$k2l1=$getparid[0]['k2l1'];
      		$ax1=$getparid[0]['ax1'];
      		$ax2=$getparid[0]['ax2'];
      		$acd1=$getparid[0]['acd1'];
      		$acd2=$getparid[0]['acd2'];
      		$lt1=$getparid[0]['lt1'];
      		$lt2=$getparid[0]['lt2'];
      		$formula=$getparid[0]['formula'];
      		$re=$getparid[0]['re'];
      		$fir_resec1=$getparid[0]['fir_resec1'];
      		$fir_resec2=$getparid[0]['fir_resec2'];
      		$fir_resec3=$getparid[0]['fir_resec3'];
      		$iol1=$getparid[0]['iol1'];
      		$iol2=$getparid[0]['iol2'];
      		$iol3=$getparid[0]['iol3'];
      		$iol4=$getparid[0]['iol4'];
      		$iol5=$getparid[0]['iol5'];
      		$iol6=$getparid[0]['iol6'];
      		$iol7=$getparid[0]['iol7'];
      		$iol8=$getparid[0]['iol8'];
      		$iol9=$getparid[0]['iol9'];
      		$iol10=$getparid[0]['iol10'];
      		$iol11=$getparid[0]['iol11'];
      		$iol12=$getparid[0]['iol12'];
      		$iol13=$getparid[0]['iol13'];
      		$iol14=$getparid[0]['iol14'];
      		$iol15=$getparid[0]['iol15'];
      		$iol16=$getparid[0]['iol16'];
      		$iol17=$getparid[0]['iol17'];
      		$iol18=$getparid[0]['iol18'];
      		$le=$getparid[0]['le'];
      		$sec_resec1=$getparid[0]['sec_resec1'];
      		$sec_resec2=$getparid[0]['sec_resec2'];
      		$sec_resec3=$getparid[0]['sec_resec3'];
      		$liol1=$getparid[0]['liol1'];
      		$liol2=$getparid[0]['liol2'];
      		$liol3=$getparid[0]['liol3'];
      		$liol4=$getparid[0]['liol4'];
      		$liol5=$getparid[0]['liol5'];
      		$liol6=$getparid[0]['liol6'];
      		$liol7=$getparid[0]['liol7'];
      		$liol8=$getparid[0]['liol8'];
      		$liol9=$getparid[0]['liol9'];
      		$liol10=$getparid[0]['liol10'];
      		$liol11=$getparid[0]['liol11'];
      		$liol12=$getparid[0]['liol12'];
      		$liol13=$getparid[0]['liol13'];
      		$liol14=$getparid[0]['liol14'];
      		$liol15=$getparid[0]['liol15'];
      		$liol16=$getparid[0]['liol16'];
      		$liol17=$getparid[0]['liol17'];
      		$liol18=$getparid[0]['liol18'];
      		
      	}
      	$htmldata='';
      	 if($counselling_preoperative_investigation_id>0)
          {
           $htmldata.='<div class="row form-group">
                    
                    <div class="col-md-12">
                       <button style="float: right;" onclick="printseqrate('.$counselling_preoperative_investigation_id.')" type="button" class="btn btn-primary"><i class="la la-print"></i></button>
                    </div>
               </div>';
          }
        $htmldata.='<div class="row">
                      <div class="col-md-6">
                      	<div class="form-group">
                      			<label>Investigation</label>
                      			<input type="hidden" class="form-control" name="examination_treatmentplan_id" id="examination_treatmentplan_id" value="'.$this->input->post('examination_treatment_plan_id').'">
                      			<input type="text" class="form-control" name="investigation" id="investigation" value="'.$investigation.'">
                      	</div>
                      </div>
                      <div class="col-md-6">
                      	<div class="form-group">
                      			<label>Systemic</label>
                      			<input type="text" class="form-control" name="systemic" id="systemic" value="'.$systemic.'">
                      	</div>
                      </div>
        					 </div>';

					 $htmldata.='<div class="row">
              <div class="col-md-12">
              	<div class="form-group">
              			<table class="table table-striped table-bordered table-hover">
              					<thead class="preparcls">
              						<tr>
              								<th>EYE</th>
              								<th>VISION</th>
              								<th>IOP</th>
              								<th>DUCT</th>
              								<th>BP</th>
              						</tr>
              					</thead>
              					<tbody>
              						<tr>
              							<td>RE</td>
              							<td><input type="text" class="form-control" name="fir1" id="fir1" value="'.$fir1.'"></td>
              							<td><input type="text" class="form-control" name="fir2" id="fir2" value="'.$fir2.'"></td>
              							<td><input type="text" class="form-control" name="fir3" id="fir3" value="'.$fir3.'"></td>
              							<td rowspan="2" colspan="1" valign="middle"><input style="margin-top: 20%;" type="text" class="form-control" name="fir7" id="fir7" value="'.$fir7.'"></td>

              						</tr>
              						<tr>
              							<td>LE</td>
              							<td><input type="text" class="form-control" name="fir4" id="fir4" value="'.$fir4.'"></td>
              							<td><input type="text" class="form-control" name="fir5" id="fir5" value="'.$fir5.'"></td>
              							<td><input type="text" class="form-control" name="fir6" id="fir6" value="'.$fir6.'"></td>
              						</tr>
              					</tbody>
              			</table>
              	</div>
              </div>


               <div class="col-md-12">
              	<div class="form-group">
              			<table class="table table-striped table-bordered table-hover">
              					<thead class="preparcls">
              					<tr>
              						<th colspan="3" style="text-align:center;">A-SCAN BIOMETRY REPORT</th>
              					</tr>
              						<tr>
              								<th></th>
              								<th>RE</th>
              								<th>LE</th>
              						</tr>
              					</thead>
              					<tbody>
              						<tr>
              							<td>K1</td>
              							<td><input type="text" class="form-control" name="k1r1" id="k1r1" value="'.$k1r1.'"></td>
              							<td><input type="text" class="form-control" name="k1l1" id="k1l1" value="'.$k1l1.'"></td>
              						</tr>
              						<tr>
              							<td>K2</td>
              							<td><input type="text" class="form-control" name="k2r1" id="k2r1" value="'.$k2r1.'"></td>
              							<td><input type="text" class="form-control" name="k2l1" id="k2l1" value="'.$k2l1.'"></td>
              						</tr>
              						<tr>
              							<td>AXL/SD</td>
              							<td><input type="text" class="form-control" name="ax1" id="ax1" value="'.$ax1.'"></td>
              							<td><input type="text" class="form-control" name="ax2" id="ax2" value="'.$ax2.'"></td>
              						</tr>
              						<tr>
              							<td>ACD/SD</td>
              							<td><input type="text" class="form-control" name="acd1" id="acd1" value="'.$acd1.'"></td>
              							<td><input type="text" class="form-control" name="acd2" id="acd2" value="'.$acd2.'"></td>
              						</tr>
              						<tr>
              							<td>LT</td>
              							<td><input type="text" class="form-control" name="lt1" id="lt1" value="'.$lt1.'"></td>
              							<td><input type="text" class="form-control" name="lt2" id="lt2" value="'.$lt2.'"></td>
              						</tr>
              					</tbody>
              			</table>
              	</div>
              </div>
             
					 </div>';

					  $htmldata.='<div class="row">
                      <div class="col-md-6">
                      	<div class="form-group">
                      			<label>FORMULA:</label>
                      			<input type="text" class="form-control" name="formula" id="formula" value="'.$formula.'">
                      	</div>
                      </div>
                     
        					 </div>';

        					  $htmldata.='<div class="row">
                      <div class="col-md-6">
                      	<div class="form-group">
                      			<label>RE:</label>
                      			<input type="text" class="form-control" name="re" id="re" value="'.$re.'">
                      	</div>
                      </div>
                     
        					 </div>';


        					  $htmldata.='<div class="row">
                      <div class="col-md-4">
                      	<div class="form-group">
                      			<table class="table table-striped table-bordered table-hover">
                      			  <thead class="preparcls">
                      					<tr>
                      						<th colspan="2" style="text-align:center;"><input type="text" class="form-control" name="fir_resec1" id="fir_resec1" value="'.$fir_resec1.'"></th>
                      					</tr>
                      					<tr>
                      						<th>IOL</th>
                      						<th>REF</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol1" id="iol1" value="'.$iol1.'"></td>
                      						<td><input type="text" class="form-control" name="iol2" id="iol2" value="'.$iol2.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol3" id="iol3" value="'.$iol3.'"></td>
                      						<td><input type="text" class="form-control" name="iol4" id="iol4" value="'.$iol4.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol5" id="iol5" value="'.$iol5.'"></td>
                      						<td><input type="text" class="form-control" name="iol6" id="iol6" value="'.$iol6.'"></td>
                      					</tr>
                      				</tbody>
                      			</table>
                      	</div>
                      </div>

                       <div class="col-md-4">
                      	<div class="form-group">
                      			<table class="table table-striped table-bordered table-hover">
                      				<thead class="preparcls">
                      					<tr>
                      						<th colspan="2" style="text-align:center;"><input type="text" class="form-control" name="fir_resec2" id="fir_resec2" value="'.$fir_resec2.'"></th>
                      					</tr>
                      					<tr>
                      						<th>IOL</th>
                      						<th>REF</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol7" id="iol7" value="'.$iol7.'"></td>
                      						<td><input type="text" class="form-control" name="iol8" id="iol8" value="'.$iol8.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol9" id="iol9" value="'.$iol9.'"></td>
                      						<td><input type="text" class="form-control" name="iol10" id="iol10" value="'.$iol10.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol11" id="iol11" value="'.$iol11.'"></td>
                      						<td><input type="text" class="form-control" name="iol12" id="iol12" value="'.$iol12.'"></td>
                      					</tr>
                      				</tbody>
                      			</table>
                      	</div>
                      </div>

                       <div class="col-md-4">
                      	<div class="form-group">
                      			<table class="table table-striped table-bordered table-hover">
                      				<thead class="preparcls">
                      					<tr>
                      						<th colspan="2" style="text-align:center;"><input type="text" class="form-control" name="fir_resec3" id="fir_resec3" value="'.$fir_resec3.'"></th>
                      					</tr>
                      					<tr>
                      						<th>IOL</th>
                      						<th>REF</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol13" id="iol13" value="'.$iol13.'"></td>
                      						<td><input type="text" class="form-control" name="iol14" id="iol14" value="'.$iol14.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol15" id="iol15" value="'.$iol15.'"></td>
                      						<td><input type="text" class="form-control" name="iol16" id="iol16" value="'.$iol16.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="iol17" id="iol17" value="'.$iol17.'"></td>
                      						<td><input type="text" class="form-control" name="iol18" id="iol18" value="'.$iol18.'"></td>
                      					</tr>
                      				</tbody>
                      			</table>
                      	</div>
                      </div>
                     
        					 </div>';


        					   $htmldata.='<div class="row">
                      <div class="col-md-6">
                      	<div class="form-group">
                      			<label>LE:</label>
                      			<input type="text" class="form-control" name="le" id="le" value="'.$le.'">
                      	</div>
                      </div>
                     
        					 </div>';


        					  $htmldata.='<div class="row">
                      <div class="col-md-4">
                      	<div class="form-group">
                      			<table class="table table-striped table-bordered table-hover">
                      				<thead class="preparcls">
                      					<tr>
                      						<th colspan="2" style="text-align:center;"><input type="text" class="form-control" name="sec_resec1" id="sec_resec1" value="'.$sec_resec1.'"></th>
                      					</tr>
                      					<tr>
                      						<th>IOL</th>
                      						<th>REF</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol1" id="liol1" value="'.$liol1.'"></td>
                      						<td><input type="text" class="form-control" name="liol2" id="liol2" value="'.$liol2.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol3" id="liol3" value="'.$liol3.'"></td>
                      						<td><input type="text" class="form-control" name="liol4" id="liol4" value="'.$liol4.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol5" id="liol5" value="'.$liol5.'"></td>
                      						<td><input type="text" class="form-control" name="liol6" id="liol6" value="'.$liol6.'"></td>
                      					</tr>
                      				</tbody>
                      			</table>
                      	</div>
                      </div>

                       <div class="col-md-4">
                      	<div class="form-group">
                      			<table class="table table-striped table-bordered table-hover">
                      				<thead class="preparcls">
                      					<tr>
                      						<th colspan="2" style="text-align:center;"><input type="text" class="form-control" value="'.$sec_resec2.'" name="sec_resec2" id="sec_resec2"></th>
                      					</tr>
                      					<tr>
                      						<th>IOL</th>
                      						<th>REF</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol7" id="liol7" value="'.$liol7.'"></td>
                      						<td><input type="text" class="form-control" name="liol8" id="liol8" value="'.$liol8.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol9" id="liol9" value="'.$liol9.'"></td>
                      						<td><input type="text" class="form-control" name="liol10" id="liol10" value="'.$liol10.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol11" id="liol11" value="'.$liol11.'"></td>
                      						<td><input type="text" class="form-control" name="liol12" id="liol12" value="'.$liol12.'"></td>
                      					</tr>
                      				</tbody>
                      			</table>
                      	</div>
                      </div>

                       <div class="col-md-4">
                      	<div class="form-group">
                      			<table class="table table-striped table-bordered table-hover">
                      				<thead class="preparcls">
                      					<tr>
                      						<th colspan="2" style="text-align:center;"><input type="text" class="form-control" name="sec_resec3" id="sec_resec3" value="'.$sec_resec3.'"></th>
                      					</tr>
                      					<tr>
                      						<th>IOL</th>
                      						<th>REF</th>
                      					</tr>
                      				</thead>
                      				<tbody>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol13" id="liol13" value="'.$liol13.'"></td>
                      						<td><input type="text" class="form-control" name="liol14" id="liol14" value="'.$liol14.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol15" id="liol15" value="'.$liol15.'"></td>
                      						<td><input type="text" class="form-control" name="liol16" id="liol16" value="'.$liol16.'"></td>
                      					</tr>
                      					<tr>
                      						<td><input type="text" class="form-control" name="liol17" id="liol17" value="'.$liol17.'"></td>
                      						<td><input type="text" class="form-control" name="liol18" id="liol18" value="'.$liol18.'"></td>
                      					</tr>
                      				</tbody>
                      			</table>
                      	</div>
                      </div>
                     
        					 </div>';

					  $htmldata.='<style>
.table th, .table td {
     padding: 1rem 1rem; 
}
#com_sec2 input {
    border: 1px solid black;
}
					 </style>';
        echo json_encode(array('msg'=>'Cancel Successfully','htmldata'=>$htmldata,'error'=>'','error_message' =>''));
       
      }
      else
      {
        echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
      }
  }

	 public function canceldata()
  {
    $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $cancel_id=trim(htmlentities($this->input->post('getid')));
        $var_array=array($cancel_id,$this->session->userdata('office_id'));
          $getresult=$this->Counseling_viewmodel->canceldata($cancel_id);
          if($getresult)
          {
             echo json_encode(array('msg'=>'Cancel Successfully','error'=>'','error_message' =>''));
          }
          else
          {
            echo json_encode(array('msg'=>'','error'=>'Failed to Delete','error_message' =>''));
          }
       
      }
      else
      {
        echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
      }
  }

   public function deletedata()
  {
    $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
      if($this->form_validation->run() == TRUE)
      {
        $delete_id=trim(htmlentities($this->input->post('getid')));
        $var_array=array($delete_id,$this->session->userdata('office_id'));
          $getresult=$this->Counseling_viewmodel->deletedata($delete_id);
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
        echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
      }
  }

   public function printdata($chargeid,$sum_todate)
  {
	$datt='';
	    		if($chargeid==2)
	    		{
	    			$idname='sur';
	    			$opname='Surgery';
	    			$clsname="style='display:black;'";
	    		}
	    		
	    	$var_array=array($chargeid,$sum_todate,$this->session->userdata('office_id'));
	    	$getdata=$this->Counseling_viewmodel->getallappmodel($var_array);
	    	$htmld='';
	    	if($getdata)
	    	{
	    		$url='Counseling_viewdetails/printdata/'.$chargeid.'/'.$datt;
	    		
	    		 $htmld='<div class="table-responsive"><table style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:0.6px solid black;" border="1">
                                <thead>
                                  <tr>
                                    <th>Sl No</th>
                                    <th>Patient Name</th>
                                    <th>MRD NO</th>
                                    <th>Gender/Age</th>
                                    <th>Mobile No</th>
                                    <th>Type Of '.$opname.'</th>
                                    <th>Particulars</th>
                                    <th>EYE</th>
                                    <th>A Date</th>
                                    <th '.$clsname.'>Operating surgeon</th>
                                    <th>Anesthesia Name</th>
                                  
                                  </tr>
                                </thead><tbody>';
            	$sl=1;
            	$opnn=$anthesia='';
	    		foreach ($getdata as $data) 
	    		{
	    			if($data['gender']==1)
	    			{
	    				$gen='Male';
	    			}
	    			elseif ($data['gender']==2) {
	    				$gen='Female';
	    			}
	    			else
	    			{
	    				$gen='Transgender';
	    			}
	    			if($data['operating_surgon'])
	    			{
		    			 $sqll = "select doctors_registration.name as doctorname from doctors_registration where doctors_registration_id=".$data['operating_surgon'];
					            $result_row=$this->db->query($sqll); 
					            $res= $result_row->result_array ();
					            if($res)
					            {
					            	$opsurname=$res[0]['doctorname'];
					            }
					            else
					            {
					            	$opsurname='';
					            }
				    }
					    if($data['typeof_anthesia'])
					    {
				             $sqll = "select doctors_registration.name as doctorname from doctors_registration where doctors_registration_id=".$data['typeof_anthesia'];
				            $result_row=$this->db->query($sqll); 
				            $res= $result_row->result_array ();
				            if($res)
				            {
				            	$anthesia=$res[0]['doctorname'];
				            }
				            else
				            {
				            	$anthesia='';
				            }
				        }
				        
				            if($chargeid==2)
				            {
				            	if($data['typeof_anthesia'])
				            	{
					            	$sqll = "select name  from doctors_registration where doctors_registration_id=".$data['typeof_anthesia'];
					            	$result_row=$this->db->query($sqll); 
						            $res= $result_row->result_array ();
						            if($res)
						            {
						            	$opnn=$res[0]['name'];
						            }
						            else
						            {
						            	$opnn='';
						            }
					            }
				            }
				$getparti=$this->Counseling_viewmodel->getdatasurgerymdl($data['typeof_surgery_id'],$chargeid,$data['particular_type'],$this->session->userdata('office_id'));
				 
                  if($getparti)
                  {
	                  $parname=$getparti[0]['name'];
	                  $amt=$getparti[0]['amount'];
	              }
	              else
	              {
	              	$parname='';
	              	$amt='';
	              }
	              if($data['eye']==1)
	              {
	              	$eyee='Left';
	              }
	              elseif($data['eye']==2)
	              {
	              	$eyee='Right';
	              }
	              elseif($data['eye']==3)
	              {
	              	$eyee='Both';
	              }

	    			$htmld.='<tr>
	    						<td>'.$sl.'</td>
	    						<td>'.$data['pateint_name'].'</td>
	    						<td>'.$data['mrdno'].'</td>
	    						<td>'.$gen.' /'.$data['ageyy'].'</td>
	    						<td>'.$data['mobileno'].'</td>
	    						<td>'.$data['opname'].'</td>
	    						<td>'.$parname.' - '.$amt.'</td>
	    						<td>'.$eyee.'</td>
	    						<td>'.$data['admission_date'].'</td>
	    						<td '.$clsname.'>'.$opnn.'</td>
	    						<td>'.$anthesia.'</td>
	    						
	    			        </tr>';
	    			        $sl++;
	    		}
	    		$htmld.='</tbody></table></div>';
	    	}

  
     $data['htmldata']=$htmld;

     $html=$this->load->view("master/couselingreport",$data, true); 
                   $print_config=[
                                    'format' => 'A4',
                                    'margin_left' => 10,
                                    'margin_right' => 10,
                                    'margin_top' => 10,
                                    'margin_bottom' => 10,
                                    'margin_header' => 0,
                                    'margin_footer' => 0,
                                ];

            $mpdf = new \Mpdf\Mpdf($print_config);
            $pdfFilePath ="print-".time().".pdf"; 
            $labName='';
            $mpdf->SetWatermarkText($labName,0.03);
            $mpdf->showWatermarkText = true;
            $mpdf -> SetDisplayMode('fullpage');
            $mpdf->WriteHTML($html);
            $mpdf->Output();
  }
  public function Preoperativeinsprint() 
  {
      $this->Counseling_viewmodel->Preoperativeinsprint_data($this->input->post('printid'),$this->session->userdata('office_id'));
  }
  private function prefetch_data() 
    {      
        $office_id=$this->session->office_id;
        
          return array(
              'examination_treatmentplan_id'=>$this->input->post('examination_treatmentplan_id'),
              'investigation'=>trim(htmlentities($this->input->post('investigation'))),
              'systemic'=>trim(htmlentities($this->input->post('systemic'))),
              'fir1'=>trim(htmlentities($this->input->post('fir1'))),
              'fir2'=>$this->input->post('fir2'),
              'fir3'=>$this->input->post('fir3'),
              'fir4'=>$this->input->post('fir4'),
              'fir5'=>$this->input->post('fir5'),
              'fir6'=>$this->input->post('fir6'),
              'fir7'=>trim(htmlentities($this->input->post('fir7'))),
              'k1r1'=>trim(htmlentities($this->input->post('k1r1'))),
              'k1l1'=>trim(htmlentities($this->input->post('k1l1'))),
              'k2r1'=>trim(htmlentities($this->input->post('k2r1'))),
              'k2l1'=>trim(htmlentities($this->input->post('k2l1'))),
              'ax1'=>trim(htmlentities($this->input->post('ax1'))),
              'ax2'=>trim(htmlentities($this->input->post('ax2'))),
              'acd1'=>trim(htmlentities($this->input->post('acd1'))),
              'acd2'=>trim(htmlentities($this->input->post('acd2'))),
              'lt1'=>trim(htmlentities($this->input->post('lt1'))),
              'lt2'=>trim(htmlentities($this->input->post('lt2'))),
              'formula'=>trim(htmlentities($this->input->post('formula'))),
              're'=>trim(htmlentities($this->input->post('re'))),
              'fir_resec1'=>trim(htmlentities($this->input->post('fir_resec1'))),
              'fir_resec2'=>trim(htmlentities($this->input->post('fir_resec2'))),
              'fir_resec3'=>trim(htmlentities($this->input->post('fir_resec3'))),
              'iol1'=>trim(htmlentities($this->input->post('iol1'))),
              'iol2'=>trim(htmlentities($this->input->post('iol2'))),
              'iol3'=>$this->input->post('iol3'),
              'iol4'=>$this->input->post('iol4'),
              'iol5'=>$this->input->post('iol5'),
              'iol6'=>$this->input->post('iol6'),
              'iol7'=>$this->input->post('iol7'),
              'iol8'=>$this->input->post('iol8'),
              'iol9'=>$this->input->post('iol9'),
              'iol10'=>$this->input->post('iol10'),
              'iol11'=>$this->input->post('iol11'),
              'iol12'=>$this->input->post('iol12'),
              'iol13'=>$this->input->post('iol13'),
              'iol14'=>$this->input->post('iol14'),
              'iol15'=>$this->input->post('iol15'),
              'iol16'=>$this->input->post('iol16'),
              'iol17'=>$this->input->post('iol17'),
              'iol18'=>$this->input->post('iol18'),
              'le'=>$this->input->post('le'),
              'sec_resec1'=>$this->input->post('sec_resec1'),
              'sec_resec2'=>$this->input->post('sec_resec2'),
              'sec_resec3'=>$this->input->post('sec_resec3'),
              'liol1'=>$this->input->post('liol1'),
              'liol2'=>$this->input->post('liol2'),
              'liol3'=>$this->input->post('liol3'),
              'liol4'=>$this->input->post('liol4'),
              'liol5'=>$this->input->post('liol5'),
              'liol6'=>$this->input->post('liol6'),
              'liol7'=>$this->input->post('liol7'),
              'liol8'=>$this->input->post('liol8'),
              'liol9'=>$this->input->post('liol9'),
              'liol10'=>$this->input->post('liol10'),
              'liol11'=>$this->input->post('liol11'),
              'liol12'=>$this->input->post('liol12'),
              'liol13'=>$this->input->post('liol13'),
              'liol14'=>$this->input->post('liol14'),
              'liol15'=>$this->input->post('liol15'),
              'liol16'=>$this->input->post('liol16'),
              'liol17'=>$this->input->post('liol17'),
              'liol18'=>$this->input->post('liol18'),
              'cur_date'=>date('Y-m-d'),
              'cur_time'=>date('H:i:s')
             );
    }
  public  function saveinv()
  {
  	$this->form_validation->set_rules('examination_treatmentplan_id', 'Treatment ID', 'trim|required|min_length[1]|max_length[100]|numeric');
      if($this->form_validation->run() == TRUE)
      {
            $data=$this->prefetch_data();
            $getresult=$this->Counseling_viewmodel->saveproperativedata($data,$this->input->post('examination_treatmentplan_id'));
            if($getresult)
            {
               echo json_encode(array('msg' =>'Saved Successfully','sur_fit_id'=>$getresult,'error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
            }
       
      }
      else
      {
        echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));
      }
  }


}
