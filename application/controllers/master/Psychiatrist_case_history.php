<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psychiatrist_case_history extends CI_Controller {

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
        
        $this->load->model('Psychiatrist_doctor_appointment_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Common_model');
    }
	public function index()
	{
      $data['title']='EMR::Case History';
      $data['activecls']='case_history';
      $cdate=date('Y-m-d');
      $var_array=array($this->session->userdata('office_id'));
      $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('master/psychiatrist_case_history',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);
	}
   public function getdata_savedata()
   {
            error_reporting(0);
            $did=trim(htmlentities($this->input->post('did')));
            $typeuser=trim(htmlentities($this->input->post('typeuser')));
           
            $doc_exam=0;
            $examination_date=trim(htmlentities($this->input->post('examination_date')));
            $var_array=array($examination_date,$this->session->userdata('office_id'));
            $getresult=$this->Psychiatrist_doctor_appointment_model->getexaminationindividualdatafromdashboard($var_array,$did);

            if($getresult)

            { 

               $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="ex_datatable"><thead></tr><th>SL No</th><th>Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor ID</th><th>Print</th><th>Edit</th><th>Delete</th></tr></thead><tbody>';

               $i=1;

               foreach($getresult as $data)

               {

                  if($data['gender']==1)

                  {

                     $gen='Male';

                  }

                  elseif($data['gender']==2)

                  {

                     $gen='Female';

                  }

                  else

                  {

                     $gen='Transgender';

                  }

                  $dia='';

                  if($data['dialysis_con']==2)

                  {

                    $dia='<span class="badge badge-success">Dilation</span>';

                  }







                  $btnfn='<td><button  onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['doctor_id'].')   type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td><td><button onclick=deletedatapsy('.$data['psychiatrist_process_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                 


                  $patient_registration_id=$data['patient_registration_id'];



                  $sqll2 = "select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=$patient_registration_id";

                            $result_row1=$this->db->query($sqll2); 

                            $res1= $result_row1->result_array();

                            $cnt=$res1[0]['cnt'];

                            $new='';

                            if($cnt==1)

                            {

                                $new='<span class="badge badge-danger">New</span>';

                                $newclr="style='font-weight:bold;color:red;'";

                            }

                            else

                            {

                                $newclr="style='font-weight:bold;color:blue;'";

                            }

                   
                            $socurce=$sc='';
                            $var_array=array($patient_registration_id,$this->session->userdata('office_id'));
                            $getmaster_so=$this->Common_model->Get_Pat_Source($var_array);
                            if($getmaster_so)
                            {
                              $socurce=$getmaster_so[0]['source'];
                              $sc="<br/><y style='color:green;font-weight:bold'>Source:$socurce</y>";
                            }


                    $html.='<tr><td>'.$i.'</td><td>'.$data['psychiatrist_date'].'</td><td>'.$data['pateint_name'].''.$dia.' '.$sc.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button  type="button" onclick=printpsy('.$data['psychiatrist_process_id'].') class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button></td>'.$btnfn.'</tr>';

                    $i++;

               }

               $html.='</tbody></table></div>';



               

               

               

               echo json_encode(array('msg' =>'Saved Successfully','dataexam'=>$html,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));

            }

         

      

      

   }

    public function deletedata()
   {
       $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');
       if($this->form_validation->run() == TRUE)
       {
         $delete_id=trim(htmlentities($this->input->post('getid')));
         $var_array=array($delete_id,$this->session->userdata('office_id'));
         $getresult=$this->Psychiatrist_doctor_appointment_model->deletedata($delete_id);
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
}
