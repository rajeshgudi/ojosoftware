<?php
use SebastianBergmann\Environment\Console;
defined('BASEPATH') OR exit('No direct script access allowed');
class Dental_examination extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!isset($this->session->emr_login))
         {
                redirect('login');
         }
         $this->load->model('Common_model');
         $this->load->model('Dental_examination_model');
        $this->load->model('Mrd_user_model');

    }
    public function index()
   {
      $data['title']='EMR::Dental Examination';
      $data['activecls']='Examination';
      $patient_registration_id=$this->input->post('printpatient_registration_id');
      $pat_app_id=$this->input->post('pat_app_id');
      $var_array=array($this->session->userdata('office_id'));
      $data['diagnosis_v']=$this->Common_model->get_diagnosis_v($var_array);
      $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
      $data['treatmentplankey']= $this->generateRandomString();
      $data['geteyecomp']=$this->Dental_examination_model->getallcomp($var_array);
      $data['getmedins']=$this->Common_model->GetAllmedins($var_array);
      $data['getalldialysis']=$this->Common_model->getalldialsismdl($var_array);
      $data['getallmedicine']=$this->Common_model->getallmedicine($var_array);
      $data['getspecilaity']=$this->Common_model->getspecilaity($var_array);
      $data['Get_usage_ex']=$this->Common_model->Get_usage_ex($var_array);
      $data['Get_Typeoflenth']=$this->Common_model->Get_Typeoflenth($var_array);
      $data['Get_coating']=$this->Common_model->Get_coating($var_array);
      $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$patient_registration_id")->row();
      $patient_apdetails=$this->db->get_where('patient_appointment',"patient_appointment_id=$pat_app_id")->row();
      $data['pname']=$patient_details->fname . $patient_details->lname; 
      $data['mrdno']=$patient_details->mrdno; 
      $data['dob']=date("d-m-Y", strtotime($patient_details->dob));
      $data['address']=$patient_details->address;
      $data['mobileno']=$patient_details->mobileno;
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
      $data['patient_registration_id']=$patient_registration_id;
      $data['patient_appointment_id']=$pat_app_id; 
      $data['lastvisitdate']=date("d-m-Y", strtotime($patient_apdetails->appointment_date));
      $data['doc_examination_id']=trim($this->input->post('doc_examination_id')); 
      $data['actionflag']=trim($this->input->post('actionflag')); 
      $patientwhite_details=$this->db->get_where('whitecell',"patient_appointment_id=$pat_app_id  and patient_registration_id=$patient_registration_id")->row();
      if($this->input->post('doc_examination_id'))
      {
        $data['docc_id']='';
        $data['checkupdoctorname']=$this->Dental_examination_model->getcheckdoctorname($patient_registration_id);
        if($patientwhite_details)
        {
        $data['bp']=$patientwhite_details->bp; 
        $data['sugar']=$patientwhite_details->sugar; 
        $data['temprature']=$patientwhite_details->temprature; 
       }
       else
       {
        $data['sugar']='';
        $data['bp']='';
        $data['temprature']='';
       }
      }
      else
      {
        $data['docc_id']=$patient_apdetails->doctor_id; 
        $data['checkupdoctorname']='';
        $data['sugar']='';
        $data['bp']='';
        $data['temprature']='';
      }
      $var_array=array($this->session->userdata('office_id'));
      $data['doctors']=$this->Common_model->getdoctors($var_array);
      $content=$this->load->view('transaction/dental_examination/insert',$data,true);
      $this->load->view('includes/layout',['content'=>$content]);  
   }

    public function getcompalints(){

        $var_array=array($this->session->userdata('office_id'));
        $his_id=$this->input->post('his_id');
        $response=$this->Dental_examination_model->getcomplaintsdata($var_array);
             $comrem='';
             $medirem='';
             $opthrem='';
        if($his_id){
             $remall=$this->Dental_examination_model->getallrem($his_id);
             $comrem=$remall[0]['gen_comp_remarks'];
             $medirem=$remall[0]['gen_medi_remarks'];
             $opthrem=$remall[0]['gen_opth_remarks'];
         }
        if($response)
        {
                        $html='';
                        $sl=1;
                            foreach ($response as $data) 
                            {
                                $chklefteye='';
                                $chkbeeye=$chkrighteye=$rem='';
                                if($his_id)
                                {
                                    $var_arrayy=array($his_id,$data['complaints_id']);
                                    $responsecomp=$this->Dental_examination_model->alreadysavecompmdl($var_arrayy);
                                    if($responsecomp){
                                    if($responsecomp[0]['complaints_id']==$data['complaints_id'])
                                    {
                                        if($responsecomp[0]['eye_left']==1)
                                        {
                                           $chklefteye='checked'; 
                                        }
                                        if($responsecomp[0]['eye_right']==1)
                                        {
                                           $chkrighteye='checked'; 
                                        }
                                        if($responsecomp[0]['eye_be']==1)
                                        {
                                           $chkbeeye='checked'; 
                                        }

                                        $rem=$responsecomp[0]['remarks'];

                                    }

                                  }

                                    

                                }

                               

                               $left='&nbsp;&nbsp;<input style="display:none;"   type="checkbox"  name="comp_right[]" '.$chkrighteye.'  value="'.$data['complaints_id'].'">&nbsp;&nbsp;<input  style="display:none;"  type="checkbox"  name="comp_be[]" '.$chkbeeye.'  value="'.$data['complaints_id'].'">';

                               $html.='<tr>

                                         <td style="width:10%;">'.$sl.'</td>

                                         <td style="width:60%;"><input type="checkbox" class="compleft" name="comp_left[]" '.$chklefteye.'  value="'.$data['complaints_id'].'">&nbsp;&nbsp;'.$data['name'].'</td>

                                         <td style="display:none;">'.$left.'</td>

                                         <td style="width:30%;">

                                            <input type="text"   class="form-control comprem" id="remarks" name="comp_remrks[]"  value="'.$rem.'">

                                            <input type="hidden"   class="form-control comprem" id="complaints_id" name="complaints_id[]"  value="'.$data['complaints_id'].'">

                                         </td>

                                       </tr>';

                                       $sl++;

                            }

                            $htmlcom='<br/><div class="row"><div class="col-md-12"><label>General Remarks</label><textarea id="gen_comp_remarks" class="form-control" name="gen_comp_remarks">'.$comrem.'</textarea></div></div>';



                           $opthtml='';



                              $medihis=$this->Dental_examination_model->getmedi($var_array);



                               $medhtml='<table class="table table-bordered table-hover" id="medicalhist" style="width:100%;">

                                  <thead>

                                      <tr><th colspan="4" style="text-align:center;">Medical History</th></tr>

                                          <th>Sl No</th>

                                          <th>Name</th>

                                          <th>Remarks</th>

                                      </tr>

                                  </thead>

                                  <tbody>';

                                  $sl=1;

                            foreach ($medihis as $data) 

                            {

                               

                              $chklefteye='';

                                $chkrighteye=$rem='';

                                if($his_id)

                                {

                                    $var_arrayy=array($his_id,$data['medical_history_id']);

                                    $responsemedi=$this->Dental_examination_model->alreadysavemedmdl($var_arrayy);

                                    if($responsemedi){

                                    if($responsemedi[0]['medical_history_id']==$data['medical_history_id'])

                                    {

                                        

                                        $rem=$responsemedi[0]['remarks'];

                                    }

                                  }

                                    

                                }



                               $medhtml.='<tr>

                                         <td>'.$sl.'</td>

                                         <td>'.$data['name'].'</td>

                                         <td>

                                            <input type="text" class="form-control" id="remarks" name="medihis_remrks[]" value="'.$rem.'">

                                             <input type="hidden"   class="form-control comprem" id="medical_history_id" name="medical_history_id[]"  value="'.$data['medical_history_id'].'">

                                         </td>

                                       </tr>';

                                       $sl++;

                            }

                            $medhtml.='</tbody>

                               </table><br/><div class="row"><div class="col-md-12"><label>General Remarks</label><textarea class="form-control" name="gen_medi_remarks" id="gen_medi_remarks">'.$medirem.'</textarea></div></div>
                               <style>
                             
                              
                            
                              
                              .cat{
                              
                                background-color: #104068;
                                border-radius: 4px;
                                border: 1px solid #fff;
                                overflow: hidden;
                                float: left;
                              }
                              
                              .cat label {
                                float: left;
                                line-height: 2em;
                                width: 2em;
                                height: 2em;
                                cursor: pointer;
                              }
                              
                              .cat label span {
                                text-align: center;
                                padding: 3px 0;
                                display: block;
                              }
                              
                              .cat label input {
                                position: absolute;
                                display: none;
                                color: #fff !important;
                              }
                              /* selects all of the text within the input element and changes the color of the text */
                              .cat label input + span{color: #fff;}
                              
                              
                              /* This will declare how a selected input will look giving generic properties */
                              .cat input:checked + span {
                                  color: #ffffff;
                                  text-shadow: 0 0  6px rgba(0, 0, 0, 0.8);
                              }
                              
                              
                           
                              
                              .action input:checked + span{background-color: #F75A1B;}
                            </style>
                               
                               ';







             echo json_encode(array('msg' =>'success','comrem' =>$htmlcom,'getdata' =>$html,'optho' =>$opthtml,'medi' =>$medhtml,'error'=>'','error_message' =>''));

        }

        else

        {

            echo json_encode(array('msg' =>'','error'=>'','error_message' =>''));

        }



        

 }

        

      private function fetch_data() 

       {
      
           $hhg=$this->input->post('patient_appointment_id');
           $doctor_id=$this->db->get_where('patient_appointment',"patient_appointment_id=$hhg")->row()->doctor_id;

           $office_id=$this->session->office_id;

            if(!$this->input->post('comp_left'))

           {

               $comp_left=0;

           }

           if(!$this->input->post('comp_right'))

           {

               $comp_right=0;

           }

           $drop='';

           if($this->input->post('dialysiscon')==2)

           {

             $drop=$this->input->post('dialysis_drops');

           }

           $cflag=0;

           if($this->input->post('doc_examination_id'))

           {

             if($this->input->post('actionflagg')==1)

             {

                $cflag=0;

             }

             else

             {

                $cflag=1;

             }

              

           }

           $return=array(

            "dental_teeth"=>array(
                'teeth'=>$this->input->post('teethchk'),
                'teethdate'=>date('Y-m-d')
            ),
            "dental_treatment_plan"=>array(
                'treatment_date'=>$this->input->post('treatment_date'),
                'treatment_plan'=>$this->input->post('treatmentplansection'),
                'treament_payment'=>$this->input->post('paymentmode')
            ),

              "examination_complaints"=>array(
                   'complaints_id'=>$this->input->post('complaints_id'),
                   'eye'=>$this->input->post('comp_right'),
                   'remarks'=>$this->input->post('comp_remrks'),
               ),
               "examination_medical_history"=>array(
                   'medical_history_id'=>$this->input->post('medical_history_id'),
                   'eye'=>$this->input->post('comp_right'),
                   'remarks'=>$this->input->post('comp_remrks'),
               ),
               "examination_ophthalmic_history"=>array(
                   'ophthalmic_history_id'=>$this->input->post('ophthalmic_history_id'),
                   'eye'=>$this->input->post('comp_right'),
                   'remarks'=>$this->input->post('comp_remrks'),
               ),
             "examination_eye"=>array(
                'eye_complaints_id'=>$this->input->post('eye_complaints_id'),
                'lefteye'=>$this->input->post('lefteye'),
                'righteye'=>$this->input->post('righteye'),
               ),

               "addexamination"=>array(
                  "dialysis_con"=>$this->input->post('dialysiscon'),
                  "dialysis_drop"=>$drop,
                  "confirm_flag"=>$cflag,
                  "dental_eye"=>1,
                  "optho_action"=>$this->input->post('optho_action'),
                  "usage_ex_id"=>$this->input->post('usage_ex'),
                  "typeoflength_id"=>$this->input->post('typeof_le'),
                  "coating_id"=>$this->input->post('coating_id'),
                  "medicine_doc_remarks"=>$this->input->post('medicine_doc_remarks'),
                  "gen_comp_remarks"=>$this->input->post('gen_comp_remarks'),
                  "gen_medi_remarks"=>$this->input->post('gen_medi_remarks'),
                  "gen_opth_remarks"=>$this->input->post('gen_opth_remarks'),
                  "family_history"=>$this->input->post('family_history'),
                  "drug_history"=>$this->input->post('drug_history'),
                  "current_meditation"=>$this->input->post('current_meditation'),
                  "addmedhistory_id"=>$this->input->post('addmedhistory_id'),
                  "history_id"=>$this->input->post('history_id'),
                  "clinical_advisor"=>$this->input->post('clinical_advisor'),
                  "eyepartshistory_id"=>$this->input->post('eyepartshistory_id'),
                  "doc_action"=>$this->input->post('doc_action'),
                  "pre1"=>$this->input->post('pre1'),
                  "pre2"=>$this->input->post('pre2'),
                  "pre3"=>$this->input->post('pre3'),
                  "pre4"=>$this->input->post('pre4'),
                  "pre5"=>$this->input->post('pre5'),
                  "pre6"=>$this->input->post('pre6'),
                  "pre7"=>$this->input->post('pre7'),
                  "pre8"=>$this->input->post('pre8'),
                  "pre9"=>$this->input->post('pre9'),
                  "pre10"=>$this->input->post('pre10'),
                  "pre11"=>$this->input->post('pre11'),
                  "pre12"=>$this->input->post('pre12'),
                  "pre_remarks"=>$this->input->post('pre_remarks'),
                  "vis1"=>$this->input->post('vis1'),
                  "vis2"=>$this->input->post('vis2'),
                  "vis3"=>$this->input->post('vis3'),
                  "vis4"=>$this->input->post('vis4'),
                  "vis5"=>$this->input->post('vis5'),
                  "vis6"=>$this->input->post('vis6'),
                  "vis7"=>$this->input->post('vis7'),
                  "vis8"=>$this->input->post('vis8'),
                  "vis9"=>$this->input->post('vis9'),
                  "vis10"=>$this->input->post('vis10'),
                  "cur1"=>$this->input->post('cur1'),
                  "cur2"=>$this->input->post('cur2'),
                  "cur3"=>$this->input->post('cur3'),
                  "cur4"=>$this->input->post('cur4'),
                  "cur5"=>$this->input->post('cur5'),
                  "cur6"=>$this->input->post('cur6'),
                  "cur8"=>$this->input->post('cur7'),
                  "cur8"=>$this->input->post('cur8'),
                  "cur9"=>$this->input->post('cur9'),
                  "cur10"=>$this->input->post('cur10'),
                  "cur11"=>$this->input->post('cur11'),
                  "cur12"=>$this->input->post('cur12'),
                  "cur13"=>$this->input->post('cur13'),
                  "cur14"=>$this->input->post('cur14'),
                  "cur15"=>$this->input->post('cur15'),
                  "cur16"=>$this->input->post('cur16'),
                  "obj1"=>$this->input->post('obj1'),
                  "obj2"=>$this->input->post('obj2'),
                  "past_dental_remarks"=>$this->input->post('past_dental_remarks'),

                  "obj3"=>$this->input->post('obj3'),

                  "obj4"=>$this->input->post('obj4'),

                  "obj5"=>$this->input->post('obj5'),

                  "obj6"=>$this->input->post('obj6'),

                  "obj7"=>$this->input->post('obj7'),

                  "obj8"=>$this->input->post('obj8'),

                  "obj9"=>$this->input->post('obj9'),

                  "obj10"=>$this->input->post('obj10'),

                  "obj11"=>$this->input->post('obj11'),

                  "obj12"=>$this->input->post('obj12'),

                  "obj13"=>$this->input->post('obj13'),

                  "obj14"=>$this->input->post('obj14'),

                  "obj15"=>$this->input->post('obj15'),

                  "ar1"=>$this->input->post('ar1'),

                  "ar2"=>$this->input->post('ar2'),

                  "ar3"=>$this->input->post('ar3'),

                  "ar4"=>$this->input->post('ar4'),

                  "ar5"=>$this->input->post('ar5'),

                  "ar6"=>$this->input->post('ar6'),

                  "ar7"=>$this->input->post('ar7'),

                  "ar8"=>$this->input->post('ar8'),

                  "ar9"=>$this->input->post('ar9'),

                  "ar10"=>$this->input->post('ar10'),

                  "man1"=>$this->input->post('man1'),

                  "man2"=>$this->input->post('man2'),

                  "man3"=>$this->input->post('man3'),

                  "man4"=>$this->input->post('man4'),

                  "man5"=>$this->input->post('man5'),

                  "man6"=>$this->input->post('man6'),

                  "man7"=>$this->input->post('man7'),

                  "man8"=>$this->input->post('man8'),

                  "man9"=>$this->input->post('man9'),

                  "man10"=>$this->input->post('man10'),

                  "spe1"=>$this->input->post('spe1'),

                  "spe2"=>$this->input->post('spe2'),

                  "spe3"=>$this->input->post('spe3'),

                  "spe4"=>$this->input->post('spe4'),

                  "spe5"=>$this->input->post('spe5'),

                  "spe6"=>$this->input->post('spe6'),

                  "spe7"=>$this->input->post('spe7'),

                  "spe8"=>$this->input->post('spe8'),

                  "spe9"=>$this->input->post('spe9'),

                  "spe10"=>$this->input->post('spe10'),

                  "spe11"=>$this->input->post('spe11'),

                  "spe12"=>$this->input->post('spe12'),

                  "spe13"=>$this->input->post('spe13'),

                  "spe14"=>$this->input->post('spe14'),

                  "spe15"=>$this->input->post('spe15'),

                  "spe16"=>$this->input->post('spe16'),

                  "con1"=>$this->input->post('con1'),

                  "con2"=>$this->input->post('con2'),

                  "con3"=>$this->input->post('con3'),

                  "con4"=>$this->input->post('con4'),

                  "con5"=>$this->input->post('con5'),

                  "con6"=>$this->input->post('con6'),

                  "con7"=>$this->input->post('con7'),

                  "con8"=>$this->input->post('con8'),

                  "con9"=>$this->input->post('con9'),

                  "con10"=>$this->input->post('con10'),

                  "con11"=>$this->input->post('con11'),

                  "con12"=>$this->input->post('con12'),

                  "con13"=>$this->input->post('con13'),

                  "con14"=>$this->input->post('con14'),

                  "con15"=>$this->input->post('con15'),

                  "con16"=>$this->input->post('con16'),

                  "pmt1"=>$this->input->post('pmt1'),

                  "pmt2"=>$this->input->post('pmt2'),

                  "pmt3"=>$this->input->post('pmt3'),

                  "pmt4"=>$this->input->post('pmt4'),

                  "pmt5"=>$this->input->post('pmt5'),

                  "pmt6"=>$this->input->post('pmt6'),

                  "pmt7"=>$this->input->post('pmt7'),

                  "pmt8"=>$this->input->post('pmt8'),

                  "pmt9"=>$this->input->post('pmt9'),

                  "pmt10"=>$this->input->post('pmt10'),

                  "pmt11"=>$this->input->post('pmt11'),

                  "pmt12"=>$this->input->post('pmt12'),

                  "pmt13"=>$this->input->post('pmt13'),

                  "pmt14"=>$this->input->post('pmt14'),

                  "pmt15"=>$this->input->post('pmt15'),

                  "pmt16"=>$this->input->post('pmt16'),

                  "material"=>$this->input->post('material'),

                  "cr"=>$this->input->post('cr'),

                  "usage"=>$this->input->post('usage'),

                  "typev"=>$this->input->post('typev'),

                  "ipd"=>$this->input->post('ipd'),

                  "pdre"=>$this->input->post('pdre'),

                  "le"=>$this->input->post('le'),

                  "segmentre"=>$this->input->post('segmentre'),

                  "lle"=>$this->input->post('lle'),
                  "specilaity_id"=>$this->input->post('specilaity_id'),

                  "followup"=>$this->input->post('followup'),

                  "workup"=>$this->input->post('workup'),

                  "mm"=>$this->input->post('mm'),

                  "www"=>$this->input->post('www'),

                  "dayss"=>$this->input->post('dayss'),

                  "d_date"=>$this->input->post('d_date'),

                  "ant_lefteye"=>$this->input->post('ant_lefteye'),

                  "ant_righteye"=>$this->input->post('ant_righteye'),

                  "bfit"=>$this->input->post('bfit'),

                  "vcontent"=>$this->input->post('vcontent'),
//INR4
                  "vdiagnosis"=>$this->input->post('vdiagnosis'),

                  "sos"=>$this->input->post('sos'),

                  "plan_of_action"=>$this->input->post('plan_of_action'),

                  "opth_user_comments"=>$this->input->post('opth_user_comments'),

                  "patient_registration_id"=>$this->input->post('patient_registration_id'),

                  "patient_appointment_id"=>$this->input->post('patient_appointment_id'),
                  "treatment_plan"=>$this->input->post('treatment_plan'),
                  "instruction"=>$this->input->post('instruction'),

                  "doctor_id"=>$doctor_id,

                  "treatmentplan_ref_id"=>$this->input->post('treatmentplan_refid'),

                  "examination_date"=>$this->input->post('examination_datee'),

                  "login_id"=>$this->session->userdata('login_id'),

                  'office_id'=> $office_id

               )

           );

            return $return;

       }

       public function addfetch_data($key)

       {

          

           $return=array(

              "examination_complaints"=>array(

                   'complaints_id'=>$this->input->post('complaints_id'),

                   'comp_left'=>$this->input->post('comp_left'),

                   'comp_right'=>$this->input->post('comp_right'),

                   'comp_be'=>$this->input->post('comp_be'),

                   'temp_id'=>$key,

                   'remarks'=>$this->input->post('comp_remrks'),

               ),

               "examination_medical_history"=>array(

                   'medical_history_id'=>$this->input->post('medical_history_id'),

                   'temp_id'=>$key,

                   'remarks'=>$this->input->post('medihis_remrks'),

               ),

               "examination_ophthalmic_history"=>array(

                   'ophthalmic_history_id'=>$this->input->post('ophthalmic_history_id'),

                   'opth_left'=>$this->input->post('opth_left'),

                   'opth_right'=>$this->input->post('opth_right'),

                   'opth_be'=>$this->input->post('opth_be'),

                   'temp_id'=>$key,

                   'remarks'=>$this->input->post('opth_remrks'),

               ),

             "examination_eye"=>array(

                'eye_complaints_id'=>$this->input->post('eye_complaints_id'),

                'lefteye'=>$this->input->post('lefteye'),

                'righteye'=>$this->input->post('righteye'),

                'temp_id'=>$key,

               )

            

           );

            return $return;

       }

        public function addmedfetch_data($key)

       {

          

           $return=array(

             "doctor_examination"=>array(

                'medicine_id'=>$this->input->post('medicine_id'),

                'instruction'=>$this->input->post('instruction'),

                'nodays'=>$this->input->post('days'),

                'qty'=>$this->input->post('qty'),

                'sdate'=>$this->input->post('sdate'),

                'tdate'=>$this->input->post('tdate'),

                'med_eye'=>$this->input->post('medeye'),
                "mulframetype"=>$this->input->post('mulframetype'),
                "mulframecolor"=>$this->input->post('mulframecolor'),
                "med_action"=>$this->input->post('med_action'),
                "med_name"=>$this->input->post('med_name'),

                'temp_id'=>$key,

               )

           );

            return $return;

       }

 public function generateRandomString($length = 35) {

    $t=time();

    $characters = '0123456789'.$t.'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}

 public function addhistorysave()

   {

         

            $key= $this->generateRandomString();

            $data=$this->addfetch_data($key);

            $getresult=$this->Dental_examination_model->savehistorymodel($data);

            if($getresult)

            {

               echo json_encode(array('msg' =>'Saved Successfully','key'=>$key,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

            }

        

      

   }



    public function addeyefetch_data($key)

       {

          // INR new

           $return=array(

               "examination_segment_eye"=>array(

                   'eye_mapping_segment_id_ryt'=>$this->input->post('child_segment_ryt'),
                   'eye_mapping_segment_id_lft'=>$this->input->post('child_segment_lft'),
                   'temp_id'=>$key,
                   'general_remarks'=>$this->input->post('general_remarks'),
               )

              

            

           );

            return $return;

       }



   public function addeyepartsave()

   {
   // print_r($_POST);EXIT;
    log_message('error', 'Controller Class Initialized');
            $key= $this->generateRandomString();

            $data=$this->addeyefetch_data($key);
           
            $getresult=$this->Dental_examination_model->saveeyepartsmodel($data);


    

          //  $examination_segment_eyes=$data['examination_segment_eye'];
           // $righteyepartscheckbox=$examination_segment_eyes['righteyepartscheckbox'];
           


            if($getresult)

            {

               echo json_encode(array('msg' =>'Saved Successfully','key'=>$key,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

            }

        

      

   }



    public function addmedhistorysave()

   {

         

            $key= $this->generateRandomString();

            $data=$this->addmedfetch_data($key);

            $getresult=$this->Dental_examination_model->savemedhistorymodel($data);

            if($getresult)

            {

               echo json_encode(array('msg' =>'Saved Successfully','key'=>$key,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

            }

        

      

   }
   public function adddiahistorydetails_fetchdata()
   {
       $return=array(
         "dia_examination"=>array(
            'examination_id'=>$this->input->post('dia_ex_id'),
            'diagnosis_id'=>$this->input->post('diagnosiss_id'),
            'eye'=>$this->input->post('diaeye'),
            'remarks'=>$this->input->post('dia_doc_remarks')
           )
       );
        return $return;

   }
   public function adddiahistorydetails()
   { 
            $data=$this->adddiahistorydetails_fetchdata();
            $getresult=$this->Dental_examination_model->savediahistorymodel($data);
            if($getresult)
            {
               echo json_encode(array('msg' =>'Saved Successfully','key'=>$key,'error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));
            }

   }
   public function Get_Saved_Dia()
   { 
        // if($this->input->post('examination_id')>0)
        // {
            $exid=$this->input->post('examination_id');
            $getresult=$this->Dental_examination_model->Get_Showdata_Dia($this->input->post('examination_id'));
            if($getresult)
            {
                $sl=1;
                $addrowdata='';
                $html='<table class="table table-bordered table-hover"><thead><tr><th colspan="3" style="text-align:center;">Diagnosis</th></tr><tr><th>SL NO</th><th>Diagnosis</th><th>Department</th><th style="display:none;">Eye</th></tr></thead><tbody>';
                    foreach ($getresult as $datadia) 
                    {
                        $bee=$lee=$ree='';
                        if($datadia['eye']=='BE')
                        {
                            $bee='selected';
                        }
                        if($datadia['eye']=='LE')
                        {
                            $lee='selected';
                        }
                        if($datadia['eye']=='RE')
                        {
                            $ree='selected';
                        }
                       $html.='<tr><td>'.$sl.'</td><td>'.$datadia['dianame'].'</td><td>'.$datadia['dename'].'</td><td style="display:none;">'.$datadia['eye'].'</td></tr>'; 
                       $addrowdata.='<tr><td>'.$datadia['dianame'].'</td><td style="display:none;">'.$datadia['dename'].'<input type="hidden" class="form-control" id="diagnosiss_id_'.$sl.'" name="diagnosiss_id[]" value="'.$datadia['diagnosis_id'].'"><input type="hidden" class="form-control" id="dia_ex_id_'.$sl.'" name="dia_ex_id[]" value="'.$exid.'"></td>
                          <td style="display:none;"><select class="form-control" name="diaeye[]" id="diaeye_'.$sl.'"><option value="BE" '.$bee.'>BE</option><option value="LE" '.$lee.'>LE</option><option value="RE" '.$ree.'>RE</option></select></td><td><a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">
                            <button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                       $sl++;
                    }
                $html.='</tbody></table>';

                
                echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$html,'addrowdata'=>$addrowdata,'addsl'=>$sl,'rem'=>$datadia['remarks'],'error'=>'','error_message' =>''));
            }
       // }
   }

   public function getmedicineinstruction()

   {    

            $getresult=$this->Dental_examination_model->getmedicineinstruction($this->input->post('val'),$this->input->post('catid'));

            if($getresult)

            {

                $html='<div class="list-group">';

                $dl=1;

                foreach($getresult as $data)

                {

                    $name=$data['name'];

                    $ytt='';

                    if($dl==1)

                    {

                        $ytt='active';

                    }

                    $html.='<a class="list-group-item list-group-item-action '.$ytt.'" style="cursor:pointer;padding: .2rem .5rem;" onclick="addtextboxvalue('.$this->input->post('sl').','.$dl.')">'.$data['name'].'<input type="hidden" id="strchk'.$dl.'"  value="'.$name.'"></a>';

                    $dl++;

                }

                $html.='</div>';

               echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$html,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

            }

        

      

   }



   public function showhistorydata()

   {

       

            $key=trim(htmlentities($this->input->post('key')));



            $comprem=trim(htmlentities($this->input->post('comprem')));

            $opthrem=trim(htmlentities($this->input->post('opthrem')));

            $medrem=trim(htmlentities($this->input->post('medrem')));



            $current_meditation=trim(htmlentities($this->input->post('current_meditation')));

            $family_history=trim(htmlentities($this->input->post('family_history')));

            $drug_history=trim(htmlentities($this->input->post('drug_history')));

            $var_array=array($key,$this->session->userdata('office_id'));

            $getcomp=$this->Dental_examination_model->expgetcomplaintsdata($var_array);

            $getmed=$this->Dental_examination_model->getmedhis($var_array);

            $getopth=$this->Dental_examination_model->getopth($var_array);

            $getdoctorprescription=$this->Dental_examination_model->getdoctormedicinemodel($var_array);
          //  print_r($getdoctorprescription);exit;

            $opth=$medd=$compprev='';

            if($getcomp!='' || $getdoctorprescription!='')

            { 

               $comp='<tr><td>';

               foreach($getcomp as $data)

               {

                  $comp.=''.$data['name'].'  '.$data['lefteye'].' '.$data['righteye'].'  '.$data['remarks'].'<br/>';

                  $compprev.=''.$data['name'].'  '.$data['lefteye'].' '.$data['righteye'].'  '.$data['remarks'].'<br/>';

               }

               $comp.='Remarks:'.$comprem;

              



              

               foreach($getmed as $datamed)

               {

                  $medd.=''.$datamed['name'].'   '.$datamed['remarks'].'<br/>';

               }

               $medd.='Remarks:'.$medrem;



              

               foreach($getopth as $dasta)

               {

                  $opth.=''.$dasta['name'].'  '.$dasta['lefteye'].' '.$dasta['righteye'].'  '.$dasta['remarks'].'<br/>';

               }



               $opth.='Remarks:'.$opthrem;



               $comp.='</td><td>'.$current_meditation.'</td></tr>';



               

               $otherhistory='<tr><td>'.$opth.'</td><td>'.$medd.'</td><td>'.$family_history.'</td><td>'.$drug_history.'</td></tr>';



               

               $docc='';

               if($getdoctorprescription)

               {

               

                $docc='<button  type="button" onclick="printdata()" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button><div class="table-responsive"><table class="table table-bordered table-hover"><thead><tr><th>SL NO</th><th>Drug Name</th><th>Instruction</th><th>No Of Days</th><th>Qty</th><th style="display:none;">Start Date</th><th style="display:none;">End Date</th><th style="display:none;">Eye</th></tr></thead><tbody>';

                 $sl=0;

                 foreach($getdoctorprescription as $data)

                 {

                    $sl++;
                    if($data['med_action']==0)
                    {
                        $drugname=$data['drugname'];
                    }
                    else
                    {
                        $drugname=$data['med_name'];
                    }

                    $docc.='<tr><td>'.$sl.'</td><td>'.$drugname.'</td><td>'.$data['instruction'].'</td><td>'.$data['nodays'].'</td><td>'.$data['qty'].'</td><td style="display:none;">'.$data['sdate'].'</td><td style="display:none;">'.$data['tdate'].'</td><td style="display:none;">'.$data['med_eye'].'</td></tr>';

                 }



                  $docc.='</tbody></table></div>';

               }



               echo json_encode(array('msg' =>'Saved Successfully','compprev'=>$compprev,'comp'=>$comp,'otherhistory'=>$otherhistory,'docmed'=>$docc,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));

            }

         

       

      

   }



    public function showmedhistorydata()

   {

       

            $key=trim(htmlentities($this->input->post('key')));

            $var_array=array($key,$this->session->userdata('office_id'));



            $getdoctorprescription=$this->Dental_examination_model->getdoctormedicinemodel($var_array);
// print_r($getdoctorprescription);exit;
            $opth=$medd='';

             $sl=0;

            if($getdoctorprescription!='')

            { 

               

               $docc='';

               if($getdoctorprescription)

               {

               

               

                
// print_r($getdoctorprescription);exit;
                 foreach($getdoctorprescription as $data)

                 {

                    $sl++;

                    $be=$le=$re=$na='';

                    if($data['med_eye']=='BE')

                    {

                        $be='selected';

                    }

                    if($data['med_eye']=='LE')

                    {

                        $le='selected';

                    }

                    if($data['med_eye']=='RE')

                    {

                        $re='selected';

                    }

                    if($data['med_eye']=='N/A')

                    {

                        $na='selected';

                    }
                    $medac=$data['med_action'];
                    if($data['med_action']==1)
                    {
                        $med=$data['med_name'];
                    }
                    else
                    {
                         $med=$data['drugname'];
                    }
                    $htmllj='';
                    $var_arrasy=array($this->session->userdata('office_id'));
                    $medinss=$this->Common_model->GetAllmedins($var_arrasy);
                    if($medinss)
                    {
                        foreach ($medinss as $dattamed) {
                            $selmm='';
                            if($dattamed['name']==$data['instruction'])
                            {
                                $selmm='selected';
                            }
                           $htmllj.='<option value="'.$dattamed['name'].'" '.$selmm.'>'.$dattamed['name'].'</option>';
                        }
                    }

                    $docc.='<tr><td>'.$med.'</td>

                                <td>

                                 <input type="hidden" class="form-control" id="medicine_id_'.$sl.'" name="medicine_id[]" value="'.$data['medicine_id'].'">

                                 <select class="form-control" id="instruction_'.$sl.'" name="instruction[]" >'.$htmllj.'</select><span id="search_result'.$sl.'"></span>

                                </td>

                                <td>

                                  <input type="text" class="form-control" id="days_'.$sl.'" name="days[]" value="'.$data['nodays'].'">

                                </td>

                                <td>

                                  <input type="text" class="form-control" id="qty_'.$sl.'" name="qty[]" value="'.$data['qty'].'">

                                </td>

                                <td style="display:none;">

                                  <input type="date" class="form-control" id="sdate_'.$sl.'" name="sdate[]" value="'.$data['ssdate'].'">

                                </td>

                                <td style="display:none;"><input type="date" class="form-control" id="tdate_'.$sl.'" name="tdate[]" value="'.$data['ttdate'].'"></td>

                                <td style="display:none;">

                                <select class="form-control" name="medeye[]" id="medeye_'.$sl.'">

                                    <option value="BE" '.$be.'>BE</option>

                                    <option value="LE" '.$le.'>LE</option>

                                    <option value="RE" '.$re.'>RE</option>

                                    <option value="N/A" '.$na.'>N/A</option>

                                </select></td>

                                <td>

                                    <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">

                                    <button class="btn btn-danger btnDelete btn-sm">

                                       <i class="la la-trash"></i>

                                    </button>

                                    </a>

                                    <a href="#" id="mult_'.$sl.'" class="table-link danger serial_number_setting" data-target="#myModalframe" data-toggle="modal" onclick="pop('.$sl.')"><button class="btn btn-sm btn-success">Add</button></a>
                                    <div  class="multiple_'.$sl.'" style="display:none;">
                                  <input type="hidden" name="mulframetype[]" id="mulframetype_'.$sl.'" class="form-control span2" value="'.$data['ex_ins'].'">
                                  <input type="hidden" name="mulframecolor[]" id="mulframecolor_'.$sl.'" class="form-control span2" value="'.$data['ex_no'].'">
                                   <input type="hidden" name="med_action[]" value="'.$medac.'" id="med_action_'.$sl.'" class="form-control span2">
                <input type="hidden" name="med_name[]"  id="med_name_'.$sl.'" value="' .$med. '" class="form-control span2">
                                </div>

                                </td>

                                </tr>';

                 }

                  

               }



               echo json_encode(array('msg' =>'Saved Successfully','docmed'=>$docc,'rowcnt'=>$sl,'error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'No Data Found','error_message' =>''));

            }

         

       

      

   }

   public function doctorprintmedicineprescription()

   {
error_reporting(0);
       $this->form_validation->set_rules('pid', 'ID', 'trim|required|min_length[1]|max_length[40]|numeric');

       $this->form_validation->set_rules('paid', 'ID', 'trim|required|min_length[1]|max_length[30]|numeric');

       $this->form_validation->set_rules('key', 'ID', 'trim|required|min_length[1]|max_length[40]');

       if($this->form_validation->run() == TRUE)

       {

             $key=$this->input->post('key');

             $pid=$this->input->post('pid');

             $paid=$this->input->post('paid');

             $this->Dental_examination_model->print_billgen($key,$pid,$paid,$this->session->userdata('office_id'));

             

       }

        else

       {

            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

       }



   }

        

   public function getmedinedetails()

   {

        $this->form_validation->set_rules('medid', 'Medicine ID', 'trim|required|min_length[1]|max_length[30]');

       if($this->form_validation->run() == TRUE)

       {

            $var_array=array($this->input->post('medid'),$this->session->userdata('office_id'));

            $getresult=$this->Common_model->getallmedicineind($var_array);

            if($getresult)

            {

               echo json_encode(array('msg' =>'Saved Successfully','getdata'=>$getresult,'error'=>'','error_message' =>''));

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

   public function getalldia_det()
   {
       $this->form_validation->set_rules('diaid', 'Diagnosis ID', 'trim|required|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       {
            $var_array=array($this->input->post('diaid'),$this->session->userdata('office_id'));
            $getresult=$this->Common_model->Get_All_Dia_Dept($var_array);
            if($getresult)
            {
               echo json_encode(array('msg' =>'Saved Successfully','getdata'=>$getresult,'error'=>'','error_message' =>''));
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

   public function treatmentpalnfetch_data()

       {

          

           $return=array(

              "examination_treatmentplan"=>array(

                   'temp_id'=>$this->input->post('treatmentplan_refid'),

                   'eye'=>$this->input->post('eyetreatmentplan'),

                   'chargetype_id'=>$this->input->post('treatmentplan'),

                   'particular_id'=>$this->input->post('particular_treatment'),

                   'doctor_id'=>$this->input->post('treatmentplandoctor_id'),

                   'appointment_date'=>$this->input->post('treatmentplan_appointmentdate'),

                   'counseling_id'=>$this->input->post('treatmentplan_counseling'),

                   'parent_id'=>$this->session->userdata('parent_id'),

                    'login_id'=>$this->session->userdata('login_id'),

                    'office_id'=> $this->session->userdata('office_id')

               )

           );

            return $return;

       }
       public function parti_treatmentpalnfetch_data()
       {

           $return=array(
              "sur_treatmentplan"=>array(
                   'temp_id'=>$this->input->post('com_treatmentplan_refid'),
                   'examination_id'=>$this->input->post('com_exid'),
                   'doctor_id'=>$this->input->post('sur_doctorid'),
                   'appointment_date'=>$this->input->post('sur_date'),
                   'counseling_id'=>$this->input->post('sur_coun'),
                   'sur_checking'=>$this->input->post('sur_checking'),
                   'parent_id'=>$this->session->userdata('parent_id'),
                    'login_id'=>$this->session->userdata('login_id'),
                    'office_id'=> $this->session->userdata('office_id')
              ),
              "las_treatmentplan"=>array(
                'temp_id'=>$this->input->post('com_treatmentplan_refid'),
                'examination_id'=>$this->input->post('com_exid'),
                'doctor_id'=>$this->input->post('las_doctorid'),
                'appointment_date'=>$this->input->post('las_date'),
                'counseling_id'=>$this->input->post('las_coun'),
                'las_checking'=>$this->input->post('las_checking'),
                'parent_id'=>$this->session->userdata('parent_id'),
                 'login_id'=>$this->session->userdata('login_id'),
                 'office_id'=> $this->session->userdata('office_id')
           ),
           "inj_treatmentplan"=>array(
            'temp_id'=>$this->input->post('com_treatmentplan_refid'),
            'examination_id'=>$this->input->post('com_exid'),
            'doctor_id'=>$this->input->post('inj_doctorid'),
            'appointment_date'=>$this->input->post('inj_date'),
            'counseling_id'=>$this->input->post('inj_coun'),
            'inj_checking'=>$this->input->post('inj_checking'),
            'parent_id'=>$this->session->userdata('parent_id'),
             'login_id'=>$this->session->userdata('login_id'),
             'office_id'=> $this->session->userdata('office_id')
       ),
       "examination_investigation"=>array(
        "charge_id"=>5,
        'patient_registration_id'=>$this->input->post('inv_pat_regid'),
        'patient_appointment_id'=>$this->input->post('inv_pat_appid'),
        'examination_id'=>$this->input->post('com_exid'),
        'doctor_id'=>$this->input->post('inv_doctorid'),
        "particulars_id"=>$this->input->post('particularsid'),
        "rate"=>$this->input->post('rate'),
        "calrow_id"=>$this->input->post('calrow_id')
   ),
           );

            return $return;

       }
       public function addpartisave()
       {
       
          $this->form_validation->set_rules('com_treatmentplan_refid', 'Treatment Plan Reference ID', 'trim|required|min_length[1]|max_length[40]');
          if($this->form_validation->run() == TRUE)
           {
                $data=$this->parti_treatmentpalnfetch_data();
                $getresult=$this->Dental_examination_model->com_savetreatmentplanmdl($data);
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

    public function savetreatmentplan()

   {

      $this->form_validation->set_rules('treatmentplan_refid', 'Treatment Plan Reference ID', 'trim|required|min_length[1]|max_length[40]');

      $this->form_validation->set_rules('eyetreatmentplan', 'Patient Appointment ID', 'trim|required|numeric');

      $this->form_validation->set_rules('particular_treatment', 'Particulars', 'trim|required|numeric');

      $this->form_validation->set_rules('treatmentplandoctor_id', 'Doctor   ID', 'trim|required|numeric');

       if($this->form_validation->run() == TRUE)

       {

            $data=$this->treatmentpalnfetch_data();

            $getresult=$this->Dental_examination_model->savetreatmentplanmdl($data);

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

  public function savedata()

   {
      
      
      $this->form_validation->set_rules('patient_registration_id', 'Patient Registration ID', 'trim|required|min_length[1]|max_length[30]');

      $this->form_validation->set_rules('patient_appointment_id', 'Patient Appointment ID', 'trim|required|numeric');

      $this->form_validation->set_rules('doctor_id', 'Doctor   ID', 'trim|required|numeric');

       if($this->form_validation->run() == TRUE)

       {

         // $key=trim(htmlentities($this->input->post('key')));

         // $var_array=array($key,$this->session->userdata('office_id'));

         // $chk_duplication=$this->Category_model->checkingval($var_array);

         // if($chk_duplication[0]['cnt']==0)

         // {

            

            $data=$this->fetch_data();

            $getresult=$this->Dental_examination_model->saveexaminationmodel($data);

            if($getresult)

            {



               echo json_encode(array('msg' =>'Saved Successfully','error'=>'','error_message' =>''));

            }

            else

            {

                 echo json_encode(array('msg' =>'','error'=> 'Failed to save','error_message' =>''));

            }

         // }

         // else

         // {

         //         echo json_encode(array('msg'=>'','error' =>'Name already Used','error_message' =>''));

         // }

       }

       else

       {

            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

       }

   }



    private function folfetch_data() 

    {

        

        $office_id=$this->session->office_id;

        return array(

            'patient_registration_id'=>trim($this->input->post('patient_registration_id')),

            'patient_followup_date'=>trim($this->input->post('d_date')),

            'parent_id'=>$this->session->userdata('parent_id'),

            'login_id'=>$this->session->userdata('login_id'),

            'office_id'=> $this->session->userdata('office_id')

           );

    }


    public function getfrontscreensegment()

    {
 
           error_reporting(0);
 
           $var_array=array($this->input->post('key'));
 
           $getresult=$this->Dental_examination_model->getallsegmentlistdatamdlnew($var_array);
 
          
           if($getresult)
 
           {
            $i=1;
            $examination_segment_eyes=$getresult['examination_segment_eye'];
            $righteyepartscheckbox=$examination_segment_eyes['righteyepartscheckbox'];
 
             $html='';
 
             $sl=1;
 
             $html='<div class="table-responsive"><table class="table table-bordered table-hover"><thead><tr><th>Group</th><th>Segment</th><th>Content</th><th>Right</th><th>Left</th></tr></thead><tbody>';
 
             foreach($getresult as $data)
 
             {
              //eyepart changes for adding segment_name & remove sl no  
 
              $group= $data['segment_type_id'];
                          // INR New
              $checkedright_Vaule="0";
              $checkedrleft_Vaule="0";
               $checkedright = 'unchecked';
               $checkedrleft = 'unchecked';
               $righteyepartscheckbox = $data['righteyepartscheckbox'];
               $righteyepartscheckbox1 = $righteyepartscheckbox[$i];
               $lefteyepartscheckbox = $data['lefteyepartscheckbox'];
               
         
if (($righteyepartscheckbox == "1") ||($righteyepartscheckbox == "on" ))
{
    $checkedright ="checked";
    $checkedright_Vaule="1";
}
else{
    $checkedright ="unchecked";
    $checkedright_Vaule="0";
}
 if (( $lefteyepartscheckbox == "1") || ($lefteyepartscheckbox == "on" ))
{
    $checkedrleft = "checked";
     $checkedrleft_Vaule="1";
}else{
    $checkedrleft = "unchecked";
    $checkedrleft_Vaule="0";
}

           
                  if($group == 1)
                  {
                     $GroupSegment= "Anterior Segment ";
                  }
                  else if($group == 2) {
                     $GroupSegment= "Posterior Segment";
                  }
                  else{
                     $GroupSegment= "Non Segment";
                  }
 // INR new
                 $html.='<tr><td>'.$GroupSegment.'</td><td>'.$data['segment_name'].'</td><td>'.$data['name'].'</td><td><input type="checkbox"   name="righteyepartscheckbox[]" value='.$checkedright_Vaule.' '.$checkedright.' >'.$data['righteyeparts'].'</td><td><input   type="checkbox" name ="lefteyepartscheckbox[]" value='.$checkedrleft_Vaule.' '.$checkedrleft.'>'.$data['lefteyeparts'].'</td></tr>';
 
                $i++;
                
             }
 
             $html.='</tbody></table>';
 
            
 
 
 
             echo json_encode(array('msg'=>$html,'error'=> '','error_message' =>''));
 
           }
 
           else
 
           {
 
             echo json_encode(array('msg'=>'','error'=> 'No Data Found','error_message' =>''));
 
           }
 
    }

// Added mew method
public function getfrontscreensegment_normal()

{

       error_reporting(0);

       $var_array=array($this->input->post('key'));

       $getresult=$this->Dental_examination_model->getallsegmentlistdatamdlnormal($var_array);

       $group = array();
       $general_remarks=array();
       foreach($getresult as $data)

       {
      
        $group[]= $data['segment_type_id'];
        $general_remarks[] =$data['general_remarks'];
        log_message('info',  'Ramay1');
        log_message('info',  $general_remarks[0]);
        log_message('info',  $general_remarks[1]);
       }

       if($getresult)

       {
        // $general_remarks[] =$getresult['$general_remarks'];
         log_message('info',  $general_remarks);

         $html='';

         $sl=1;

         $html='<div class="table-responsive"><table class="table table-bordered table-hover"><thead><tr><th>Group</th><th>Segment</th><th>Normal</th></tr></thead><tbody>';


          $AllSegment="All Segments";
          
          log_message('info',  $AllSegment);
          log_message('info',  $group);
      
    
            $one =true;
            $two = true;
            $three = true;

          if (in_array(1, $group))
          {
             $one =false;
          }
          if (in_array(2, $group))
          {
             $two = false;
          }
          if (in_array(3, $group))
          {
             $three = false;
          }
         if($one)
           $html.='<tr><td>Anterior Segment</td><td>'.$AllSegment.'</td><td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td></tr>';
          if($two)
          $html.='<tr><td>Posterior Segment</td><td>'.$AllSegment.'</td><td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td></tr>';
          if($three)
          $html.='<tr><td>Non Segment</td><td>'.$AllSegment.'</td><td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td></tr>';

            
        

         $html.='</tbody></table>';

        // INR new
         $html.='<br/>
         <div class="col-md-12">
         <label style="font-weight:bold">General Remarks</label>
         <textarea class="form-control" name="general_remarks" id="vcontent" > '.$general_remarks[0].'</textarea>
         </div>
         ';



         echo json_encode(array('msg'=>$html,'error'=> '','error_message' =>''));

       }

       else

       {

         $AllSegment="All Segments";
         $html='<div class="table-responsive"><table class="table table-bordered table-hover"><thead><tr><th>Group</th><th>Segment</th><th>Normal</th></tr></thead><tbody>';

         $html.='<tr><td>Anterior Segment</td><td>'.$AllSegment.'</td><td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td></tr>';

         $html.='<tr><td>Posterior Segment</td><td>'.$AllSegment.'</td><td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td></tr>';
      
         $html.='<tr><td>Non Segment</td><td>'.$AllSegment.'</td><td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td></tr>';

            
        

        $html.='</tbody></table>';
         // INR new
        //  $html.='<br/>
        //  <div class="col-md-12">
        //  <label style="font-weight:bold">General Remarks</label>
        //  <textarea class="form-control" name="general_remarks" id="vcontent" > '.$general_remarks[0].'</textarea>
        //  </div>
        //  ';
        echo json_encode(array('msg'=>$html,'error'=> '','error_message' =>''));


       }

}



     public function getallsegmentlistdata()

   {

          error_reporting(0);

          $var_array=array($this->input->post('key'));

          $getresult=$this->Dental_examination_model->getallsegmentlistdatamdl($var_array);

          if($getresult)

          {

            
            $html='';

            $sl=0;
          
            foreach($getresult as $data)

            {
                //I5

                // $html.='<tr class="eyeparcon'.$data['eye_segment_id'].'"><td><input type="hidden" id="eye_mapping_segment_id'.$sl.'" name="eye_mapping_segment_id[]" value="'.$data['eye_mapping_segment_id'].'" >'.$data['name'].'</td><td><input  type="text"  name="righteyeparts[]"  value="'.$data['righteyeparts'].'" class="form-control" id="righteyeparts'.$sl.'"></td><td><input  type="text" value="'.$data['lefteyeparts'].'"  name="lefteyeparts[]"   class="form-control" id="lefteyeparts'.$sl.'"></td></tr>';

                // $sl++;

                       $checkedright = 'unchecked';
                       $checkedright_Vaule="0";
                       $checkedrleft_Vaule="0";
               $checkedrleft = 'unchecked';
               $righteyepartscheckbox = $data['righteyepartscheckbox'];
               $lefteyepartscheckbox = $data['lefteyepartscheckbox'];
if(($righteyepartscheckbox == "1" ) || ($righteyepartscheckbox == "on"  ))
{
    $checkedright ="checked";
     $checkedright_Vaule="1";
}

else{
    $checkedright ="unchecked";
    $checkedright_Vaule="0";
}

 if( ($lefteyepartscheckbox == "1") || ($lefteyepartscheckbox == "on" ) )
{
    $checkedrleft = "checked";
    $checkedrleft_Vaule="1";
}
else{
    $checkedrleft = "unchecked";
    $checkedrleft_Vaule="0";
}
                
                $html.='<tr class="eyeparcon'.$data['eye_segment_id'].'"><td><input type="hidden" id="eye_mapping_segment_id'.$sl.'" name="eye_mapping_segment_id[]" value="'.$data['eye_mapping_segment_id'].'" >'.$data['name'].'</td><td><input type="checkbox"   value='.$checkedright_Vaule.' '.$checkedright.' ><input type="hidden" name="righteyepartscheckbox[]"   value='.$checkedright_Vaule.' id="righteyepartscheckbox' .$sl. '" >&nbsp<input  type="text"  name="righteyeparts[]"  value="'.$data['righteyeparts'].'" id="righteyeparts'.$sl.'"></td><td><input   type="checkbox"  value='.$checkedrleft_Vaule.' '.$checkedrleft.'><input type="hidden" name="lefteyepartscheckbox[]"   value='.$checkedrleft_Vaule.'  id="lefteyepartscheckbox' .$sl.'" >&nbsp<input  type="text" value="'.$data['lefteyeparts'].'"  name="lefteyeparts[]"   id="lefteyeparts'.$sl.'"></td></tr>';

             //   $html.='<tr class="eyeparcon'.$data['eye_segment_id'].'"><td><input type="hidden" id="eye_mapping_segment_id'.$sl.'" name="eye_mapping_segment_id[]" value="'.$data['eye_mapping_segment_id'].'" >'.$data['name'].'</td><td><input type="checkbox"   name="righteyepartscheckbox[]" value='.$checkedright_Vaule.' '.$checkedright.' >&nbsp<input  type="text"  name="righteyeparts[]"  value="'.$data['righteyeparts'].'" id="righteyeparts'.$sl.'"></td><td><input   type="checkbox" name ="lefteyepartscheckbox[]" value='.$checkedrleft_Vaule.' '.$checkedrleft.'>&nbsp<input  type="text" value="'.$data['lefteyeparts'].'"  name="lefteyeparts[]"   id="lefteyeparts'.$sl.'"></td></tr>';

                $sl++;

            }

            



            echo json_encode(array('msg'=>$html,'error'=> '','error_message' =>''));

          }

          else

          {

            echo json_encode(array('msg'=>'','error'=> 'No Data Found','error_message' =>''));

          }

   }

  //   added document View 

   public function viewFile()
    {
        log_message('info',  "************");
       
        $patient_id = $this->input->post("patient_registration_id");
        log_message('info',  "************");
        log_message('info',  $patient_id);

        $files = $this->Mrd_user_model->getFiles($patient_id);

        if ($files) {
            $filename = base_url();


            $html = '
        
    <div >
    <header style="background-color: #0a0a23;
    color: #f5f6f7;
    text-align: center;
    border-bottom: 4px solid lightblue;
    padding: 10px;
    ">
  <h2 style="font-weight:bold;color:white">Uploaded Files</h2>
</header>
        <div style="display: flex;
        flex-direction: column;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        margin: 20px 0;
        gap: 7px;">';


            foreach ($files as $data) {

                $ext = pathinfo($data['file_name'], PATHINFO_EXTENSION);
                if ($ext == 'pdf') {
                    $html .= '
                
                    <p style="font-weight:bold;font-size:25px;color:green ;text-decoration: underline dotted purple; ">PDF :' . $data['file_name'] . '</p>
                    <a href="' . $filename . 'uploads/files/' . $data['file_name'] . '" target="_blank">View File in New Tab</a>
                    
                    <p>Uploaded On ' . $data['uploaded_on'] . '</p>
                    
            ';
                } else {
                    $html .= '
                    <p style="font-weight:bold;font-size:25px;color:green">Image : ' . $data['file_name'] . '</p>
                <img src="' . $filename . 'uploads/files/' . $data['file_name'] . '" class="img img-responsive" >
                <p>Uploaded On ' . $data['uploaded_on'] . '</p>
                
        ';
                }
            }
            $html .= '
        </div></div>';
            echo json_encode(array('msg' => $html, 'error' => '', 'error_message' => ''));

        } else {

            echo json_encode(array('msg' => '', 'error' => 'No Files Found', 'error_message' => 'No Files Found'));
        }
}

    public function getallsegment()

   {

          $var_array=array($this->session->userdata('office_id'));

          $getsaveddata=$this->Dental_examination_model->getsavesegments($this->input->post('key'));

          $getresult=$this->Dental_examination_model->geteyepartsegments($var_array);

          if($getresult)

          {

            $html='';

            $html.='<div class="table-responsive">

                        <table id="anterior_segment" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                <th>Anterior Segment</th>
                                <th>Right Eye</th>
                                <th>Left Eye</th>
                                </tr>

                            </thead>

                            <tbody >';

                               foreach($getresult as $anti)

                               { 

                                    if($anti['segment_id']==1)

                                    {
                                        
                                        

                                        $selchryt='';
                                        $selchryt='<select style="width:100%;" class="form-control select2" multiple="multiple" name="child_segment_ryt[]"><option value="0">Select</option>';
                                        $selchlft='';
                                        $selchlft='<select style="width:100%;" class="form-control select2" multiple="multiple" name="child_segment_lft[]"><option value="0">Select</option>';
                                        $getresult_child=$this->Dental_examination_model->geteyepartssegmentdetailsmdl($anti['eye_segment_id']);
                                        if($getresult_child)
                                        {
                                          //  $an=''; 
                                            foreach ($getresult_child as $childseg) 
                                            {
                                                $an='';
                        $getsaveddata_res=$this->Dental_examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],1);
                                                if($getsaveddata_res)
                                                {
                                                    $savedid=$getsaveddata_res[0]['eye_mapping_segment_id'];
                                                    $listid=$childseg['eye_mapping_segment_id'];
                                                    if($savedid==$listid)
                                                    {
                                                        $an='selected';
                                                    }
                                                    
                                                }

                                                $an1='';
                                                $getsaveddata_res=$this->Dental_examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],2);
                                                if($getsaveddata_res)
                                                {
                                                    $savedid=$getsaveddata_res[0]['eye_mapping_segment_id'];
                                                    $listid=$childseg['eye_mapping_segment_id'];
                                                    if($savedid==$listid)
                                                    {
                                                        $an1='selected';
                                                    }
                                                    
                                                }
                                              $selchryt.='<option value="'.$childseg['eye_mapping_segment_id'].'" '.$an.'>'.$childseg['name'].'</option>';
                                              $selchlft.='<option value="'.$childseg['eye_mapping_segment_id'].'" '.$an1.'>'.$childseg['name'].'</option>';
                                            }
                                            $selchryt.='</select>';
                                            $selchlft.='</select>';
                                        }

                                        $html.=' <tr>

                                            <td>'.$anti['name'].'</td>
                                            <td>'.$selchryt.'</td>
                                            <td>'.$selchlft.'</td>

                                        </tr>';

                                    }

                               }



                            $html.='</tbody>

                        </table>



                         <table id="posterior_segment_checkbox" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>Posterior Segment</th>
                                    <th>Right Eye</th>
                                    <th>Left Eye</th>
                                </tr>

                            </thead>

                           <tbody>';

                               foreach($getresult as $pos)

                               { 

                                    if($pos['segment_id']==2)

                                    { 
                                        
                                        $selchryt='';
                                        $selchryt='<select style="width:100%;" class="form-control select2" multiple="multiple" name="child_segment_ryt[]"><option value="0">Select</option>';
                                        $selchlft='';
                                        $selchlft='<select style="width:100%;" class="form-control select2" multiple="multiple" name="child_segment_lft[]"><option value="0">Select</option>';
                                        $getresult_child=$this->Dental_examination_model->geteyepartssegmentdetailsmdl($pos['eye_segment_id']);
                                        if($getresult_child)
                                        {
                                            foreach ($getresult_child as $childseg) 
                                            {
                        $an='';
                        $getsaveddata_res=$this->Dental_examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],1);
                        if($getsaveddata_res)
                        {
                            $savedid=$getsaveddata_res[0]['eye_mapping_segment_id'];
                            $listid=$childseg['eye_mapping_segment_id'];
                            if($savedid==$listid)
                            {
                                $an='selected';
                            }
                            
                        }

                        $an1='';
                        $getsaveddata_res=$this->Dental_examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],2);
                        if($getsaveddata_res)
                        {
                            $savedid=$getsaveddata_res[0]['eye_mapping_segment_id'];
                            $listid=$childseg['eye_mapping_segment_id'];
                            if($savedid==$listid)
                            {
                                $an1='selected';
                            }
                            
                        }
                                              $selchryt.='<option value="'.$childseg['eye_mapping_segment_id'].'" '.$an.'>'.$childseg['name'].'</option>';
                                              $selchlft.='<option value="'.$childseg['eye_mapping_segment_id'].'" '.$an1.'>'.$childseg['name'].'</option>';
                                            }
                                            $selchryt.='</select>';
                                            $selchlft.='</select>';
                                        }
                                        $html.=' <tr>
                                            <td>'.$pos['name'].'</td>
                                            <td>'.$selchryt.'</td>
                                            <td>'.$selchlft.'</td>
                                        </tr>';

                                    }

                               }

                                

                            $html.='</tbody>

                        </table>



                        <table  id="non_segment_checkbox" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                <th>Non Segment</th>
                                <th>Right Eye</th>
                                <th>Left Eye</th>
                                </tr>

                            </thead>

                            <tbody>';

                                foreach($getresult as $non)

                               { 

                                    if($non['segment_id']==3)

                                    { 


                                        $html.='<tr>';

                                        $selchryt='';
                                        $selchryt='<select style="width:100%;" class="form-control select2" multiple="multiple" name="child_segment_ryt[]"><option value="0">Select</option>';
                                        $selchlft='';
                                        $selchlft='<select style="width:100%;" class="form-control select2" multiple="multiple" name="child_segment_lft[]"><option value="0">Select</option>';
                                        $getresult_child=$this->Dental_examination_model->geteyepartssegmentdetailsmdl($pos['eye_segment_id']);
                                        if($getresult_child)
                                        {
                                            foreach ($getresult_child as $childseg) 
                                            {
                        $an='';
                        $getsaveddata_res=$this->Dental_examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],1);
                        if($getsaveddata_res)
                        {
                            $savedid=$getsaveddata_res[0]['eye_mapping_segment_id'];
                            $listid=$childseg['eye_mapping_segment_id'];
                            if($savedid==$listid)
                            {
                                $an='selected';
                            }
                            
                        }

                        $an1='';
                        $getsaveddata_res=$this->Dental_examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],2);
                        if($getsaveddata_res)
                        {
                            $savedid=$getsaveddata_res[0]['eye_mapping_segment_id'];
                            $listid=$childseg['eye_mapping_segment_id'];
                            if($savedid==$listid)
                            {
                                $an1='selected';
                            }
                            
                        }
                                              $selchryt.='<option value="'.$childseg['eye_mapping_segment_id'].'" '.$an.'>'.$childseg['name'].'</option>';
                                              $selchlft.='<option value="'.$childseg['eye_mapping_segment_id'].'" '.$an1.'>'.$childseg['name'].'</option>';
                                            }
                                            $selchryt.='</select>';
                                            $selchlft.='</select>';
                                        }
                                        $html.=' <tr>
                                            <td>'.$pos['name'].'</td>
                                            <td>'.$selchryt.'</td>
                                            <td>'.$selchlft.'</td>
                                        </tr>';

                                          

                                      

                                    }

                               }

                             $html.='</tbody>

                        </table>';
// INR New

                        $html.='<br/ >
                        <div class="col-md-12">
                        <label style="font-weight:bold">General Remarks</label>
                        <textarea class="form-control" name="general_remarks" id="vcontent"> </textarea>
                        </div>
                        </div>';

            echo json_encode(array('msg'=>$html,'error'=> '','error_message' =>''));

          }

          else

          {

            echo json_encode(array('msg'=>'','error'=> 'No Data Found','error_message' =>''));

          }

   }



    public function geteyepartssegmentdetails()

   {

       $this->form_validation->set_rules('segmentid', 'Segment ID', 'trim|required|min_length[1]|max_length[30]|numeric');

       if($this->form_validation->run() == TRUE)

       {

          $segmentid=trim(htmlentities($this->input->post('segmentid')));

          $getresult=$this->Dental_examination_model->geteyepartssegmentdetailsmdl($segmentid);

          if($getresult)

          {

            echo json_encode(array('msg'=>'success','getdata'=>$getresult,'error'=> '','error_message' =>''));

          }

          else

          {

            echo json_encode(array('msg'=>'','error'=> 'No Data Found','error_message' =>''));

          }

       

       }

       else

       {

            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));

       }

   }


  


     public function updatedata()
   {
      $this->form_validation->set_rules('patient_registration_id', 'Patient Registration ID', 'trim|required|min_length[1]|max_length[30]');
      $this->form_validation->set_rules('patient_appointment_id', 'Patient Appointment ID', 'trim|required|numeric');
      $this->form_validation->set_rules('doctor_id', 'Doctor   ID', 'trim|required|numeric');
      $this->form_validation->set_rules('examination_id', 'Edit   ID', 'trim|required|numeric');
       if($this->form_validation->run() == TRUE)
       {
            $edit_id=trim(htmlentities($this->input->post('examination_id')));
            $data=$this->fetch_data();
            $getresult=$this->Dental_examination_model->updateexaminationmodel($data,$edit_id);
            if($getresult)
            {
               echo json_encode(array('msg' =>'Updated Successfully','error'=>'','error_message' =>''));
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

    public function getexaminationdatafromdashboard()
   {
            error_reporting(0);
            $did=trim(htmlentities($this->input->post('did')));
            $typeuser=trim(htmlentities($this->input->post('typeuser')));
            if($typeuser==3)
            {
                $flag=0;
                $fl=1;
            }
            else
            {
                $flag=1;
                 $fl=2;
            }
            $doc_exam=0;
            $examination_date=trim(htmlentities($this->input->post('examination_date')));
            $var_array=array($examination_date,$this->session->userdata('office_id'));
            $getresult=$this->Dental_examination_model->getexaminationindividualdatafromdashboard($var_array,$did);

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



                   //$btnfn='<td><button onclick=editdata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td><td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';





                  if($data['confirm_flag']==0)

                  {

                     $btnfn='<td><button  onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.')   type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td>

                      <td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                  }

                  else

                  {

                        $btnfn='<td><button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button></td><td><button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button></td>';

                  }

                  if($flag==1)

                  {

                    $btnfn='<td><button  onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.')   type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td>

                      <td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                  }



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


                    $html.='<tr><td>'.$i.'</td><td>'.$data['examination_date'].'</td><td>'.$data['pateint_name'].''.$dia.' '.$sc.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button  type="button" onclick=examinationprint('.$data['examination_id'].') class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button></td>'.$btnfn.'</tr>';

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

   public function getexaminationdatafromdashboard_dental()
   {
            error_reporting(0);
            $did=trim(htmlentities($this->input->post('did')));
            $typeuser=trim(htmlentities($this->input->post('typeuser')));
            if($typeuser==3)
            {
                $flag=0;
                $fl=1;
            }
            else
            {
                $flag=1;
                 $fl=2;
            }
            $doc_exam=0;
            $examination_date=trim(htmlentities($this->input->post('examination_date')));
            $var_array=array($examination_date,$this->session->userdata('office_id'));
            $getresult=$this->Dental_examination_model->getexaminationindividualdatafromdashboard($var_array,$did);

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



                   //$btnfn='<td><button onclick=editdata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td><td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';





                  if($data['confirm_flag']==0)

                  {

                     $btnfn='<td><button  onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.')   type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td>

                      <td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                  }

                  else

                  {

                        $btnfn='<td><button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button></td><td><button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button></td>';

                  }

                  if($flag==1)

                  {

                    $btnfn='<td><button  onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.')   type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td>

                      <td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                  }



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


                    $html.='<tr><td>'.$i.'</td><td>'.$data['examination_date'].'</td><td>'.$data['pateint_name'].''.$dia.' '.$sc.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button  type="button" onclick=examinationprint('.$data['examination_id'].') class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button></td>'.$btnfn.'</tr>';

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




    public function getexaminationdata()

   {

       

            $doc_exam=trim(htmlentities($this->input->post('doc_exam')));

            $examination_date=trim(htmlentities($this->input->post('examination_date')));

            $patient_registration_id=trim(htmlentities($this->input->post('patient_registration_id')));

            $var_array=array($patient_registration_id,$this->session->userdata('office_id'));

            $getresult=$this->Dental_examination_model->getexaminationindividualdata($var_array);

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

$btnfn='<td><button onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].') type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td><td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';



                    $html.='<tr><td>'.$i.'</td><td>'.$data['examination_date'].'</td><td>'.$data['pateint_name'].''.$dia.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button  type="button" onclick=examinationprint('.$data['examination_id'].') class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button></td>'.$btnfn.'</tr>';

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



    public function getalltempl()

   {

      $this->form_validation->set_rules('sel', 'Select templates ID', 'trim|required|min_length[1]|max_length[200]|numeric');

         if($this->form_validation->run() == TRUE)

       {  

            $sel=trim(htmlentities($this->input->post('sel')));

            $var_array=array($sel,$this->session->userdata('office_id'));

            $getresult=$this->Dental_examination_model->getallmedtemp($var_array);

            if($getresult)

            { 

                $html='';

                foreach($getresult as $data)

                {

                    $html.=$data['medicine_id'].',';

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



    public function getsavedexamionation()

   {
error_reporting(0);
      $this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[200]');

         if($this->form_validation->run() == TRUE)

       { 
        $doc_new_con=0; 
        if(($this->input->post('doctor_id_new')))
        {
            $doc_new_con=$this->input->post('doctor_id_new');
        }
            $examination_date=trim(htmlentities($this->input->post('sdate')));

            $var_array=array($examination_date,$this->session->userdata('office_id'));

            $getresult=$this->Dental_examination_model->getexaminationindividualdatsa($var_array,$doc_new_con);

            if($getresult)

            { 

               $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="tableid"><thead></tr><th>SL No</th><th>Optometrist Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor ID</th><th>Print</th></tr></thead><tbody>';

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

                    $html.='<tr><td>'.$i.'</td><td>'.$data['opthdate'].'</td><td><a target="_blank" onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].',2) >'.$data['pateint_name'].'</a>'.$dia.' '.$sc.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td></tr>';

                    $i++;

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



   public function getsavedexamionationex()

   {

        $this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[200]');

         if($this->form_validation->run() == TRUE)

       {  
        $doc_new_con=0; 
        if(($this->input->post('doctor_id_new')))
        {
            $doc_new_con=$this->input->post('doctor_id_new');
        }

            $examination_date=trim(htmlentities($this->input->post('sdate')));

            $typecond=trim(htmlentities($this->input->post('typecond')));

            $utype=trim(htmlentities($this->input->post('utype')));

            $var_array=array($examination_date,$typecond,$this->session->userdata('office_id'));

            if($utype==2)

            {

                $fl=2;

                 $getresult=$this->Dental_examination_model->getexaminationindividualdatsaexdoc($var_array,$doc_new_con);

            }

            else

            {

                $fl=1;

               $getresult=$this->Dental_examination_model->getexaminationindividualdatsaex($var_array);

             }

            

           

            if($getresult)

            { 

                if($typecond==1)

                {

                    $tab='tablepro';

                }

                else

                {

                    $tab='tablein';

                }

                $nwpr='';

                $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];

                // if($host_tvm=='emr')

                // {

                //     $nwpr='<th>New Print</th>';

                // }

                 $nwpr='<th>New Print</th>';

               $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="'.$tab.'"><thead></tr><th>SL No</th><th>Optometrist Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor ID</th><th>Print</th>'.$nwpr.'<th>Attachment</th><th>Cross Referral</th></tr></thead><tbody>';

               $i=1;

               foreach($getresult as $data)

               {
                $photo='';
                $att='';
                   $exu= $data['examination_id'];
                    $sqll2 = "select photo from examination_chargesdetails  where 

                         examination_id=$exu";

                            $result_row1=$this->db->query($sqll2); 

                            $res1= $result_row1->result_array();
                            if($res1)
                            {
                                  $photo=$res1[0]['photo'];
                            }

                          

    
    if($photo)
    {
      $pp=$photo;
                 $bb=base_url();
                $att='<a class="btn btn-icon btn-info mr-1 mb-1" href="'.$bb.'images/profile/'.$pp.'" target="_blank">
                         <i class="la la-folder-open"></i>
                      </a>';
    }

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

                  $btmn='';

                  if($data['confirm_flag']==1)

                  {

                    $chkvalfd=$data['pateint_name'];

                    $btmn='';

                    if($utype==3){

                        $btmn='<span class="badge badge-danger">Consultant Updated</span>';

                        $chkvalfd=$data['pateint_name'];

                    }

                  }

                  else

                  {

                    $chkvalfd='<a target="_blank" onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.') >'.$data['pateint_name'].'</a>';

                  }

                   $chkvalfd='<a target="_blank" onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.') >'.$data['pateint_name'].'</a>';

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

                            $nwpri='';

                            // if($host_tvm=='emr')

                            // {

                            //     $nwpri='<td><button type="button" class="btn btn-success" onclick="examinationnewprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>';

                            // }

                            $nwpri='<td><button type="button" class="btn btn-success" onclick="examinationnewprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>';

                            $crossreff='<td><button type="button" class="btn btn-warning" onclick="crossrefex('.$data['examination_id'].')"><i class="ft-corner-up-right"></i></button></td>';

                            $socurce=$sc='';
                            $var_array=array($data['patient_registration_id'],$this->session->userdata('office_id'));
                            $getmaster_so=$this->Common_model->Get_Pat_Source($var_array);
                            if($getmaster_so)
                            {
                              $socurce=$getmaster_so[0]['source'];
                              $sc="<y style='color:green;font-weight:bold'>Source:$socurce</y>";
                            }
if($utype==3)
{
    if($typecond==1)
    {
        $html.='<tr><td>'.$i.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$data['pateint_name'].'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'<td>'.$att.'</td><td></td></tr>';
    }
    else
    {
         $html.='<tr><td>'.$i.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$chkvalfd.'  '.$dia.' '.$sc.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'<td>'.$att.'</td><td></td></tr>';
    }

}
else
{
    $html.='<tr><td>'.$i.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$chkvalfd.'  '.$dia.' '.$sc.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'<td>'.$att.'</td>'.$crossreff.'</tr>';
}
                    

                    $i++;

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







   public function getsavedexamionationexvis()

   {

        $this->form_validation->set_rules('sdate', 'Search Date', 'trim|required|min_length[1]|max_length[200]');

         if($this->form_validation->run() == TRUE)

       {  

            $examination_date=trim(htmlentities($this->input->post('sdate')));

            $var_array=array($examination_date,$this->session->userdata('office_id'));

            $getresult=$this->Dental_examination_model->getexaminationindividualdatsaexdocvis($var_array);

            if($getresult)

            { 

               $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="tablepro"><thead></tr><th>SL No</th><th> Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor ID</th><th>Certificate</th></tr></thead><tbody>';

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

                  $btmn='';

                 

                   $chkvalfd='<a target="_blank" onclick=printcertificate('.$data['examination_id'].') >'.$data['pateint_name'].'</a>';



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



                    $html.='<tr><td>'.$i.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$chkvalfd.'  '.$dia.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="printcertificate('.$data['examination_id'].')"><i class="la la-print"></i></button></td></tr>';

                    $i++;

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



   



    public function geteditdata()

   {

      $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');

       if($this->form_validation->run() == TRUE)

       {

            $edit_id=trim(htmlentities($this->input->post('getid')));

            $var_array=array($edit_id,$this->session->userdata('office_id'));

            $var_arrayy=array($this->session->userdata('office_id'));

        

            $getmastertable=$this->Dental_examination_model->getsavedatamodel($var_array);

            $geteyecompdata=$this->Dental_examination_model->getallcomp($var_arrayy);

            $geteyecompsaveddata=$this->Dental_examination_model->geteyecompsaveddatamodel($edit_id);

            if($getmastertable)

            {

                $var_array_child=array($edit_id);

                $getdetailsdata=$this->Dental_examination_model->Getdetailstable($var_array_child);

                if($geteyecompdata)

                {

                  $eyepart='';

                  foreach($geteyecompdata as $datae)

                  {

                     $lefteye='';

                     $righteye='';

                     foreach($geteyecompsaveddata as $dataval)

                     {

                        $eye_complaints_id=$dataval['eye_complaints_id'];

                        

                        if($eye_complaints_id==$datae['eye_complaints_id'])

                        {

                           $lefteye=$dataval['lefteye'];

                           $righteye=$dataval['righteye'];

                        }

                     }

                     $eyepart.=' <tr>

                                   <td>

                                   <input type="hidden" name="eye_complaints_id[]" value="'.$datae['eye_complaints_id'].'" class="form-control">

                                   <input type="text" name="righteye[]" class="form-control" value="'.$righteye.'"></td>

                                   <td style="background: #e0e0e057;">'.$datae['name'].'</td>

                                   <td><input type="text" name="lefteye[]" class="form-control" value="'.$lefteye.'"></td>

                               </tr>';

                  }

                }

                $sl=1;

                 $html='';

                if($getdetailsdata)

                {

                   

                    

                    foreach ($getdetailsdata as $datai) {

                

                $sel1=$sel2=$sel3=$sel4="";

               $getparticularname=$this->Common_model->getparticularsmodel($datai['charge_id'],$datai['particulars_id'],$this->session->userdata('office_id'));

               $html.='<tr>

                         <td><a href="#" onclick="$(this).parent().parent().remove();"><button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td>

                         <td>'.$getparticularname[0]['name'].'</td>

                          <td><input type="text" name="rate[]" id="rate_'.$sl.'" class="form-control grid_table" value="'.$datai['rate'].'" ></td>

                         

                      <td style="display:none;">

            <input type="hidden" name="calrow_id[]" id="calrow_id_'.$sl.'" value="'.$sl.'">

            <input type="hidden" name="particularsid[]" id="particularsid_'.$sl.'" value="'.$datai['particulars_id'].'">

            <input type="hidden" name="chargesid[]" id="chargesid_'.$sl.'" value="'.$datai['charge_id'].'">

                     </td>

                         </tr>';

                         $sl++;

              }

                }

                echo json_encode(array('msg'=>'Deleted Successfully','mastertable'=>$getmastertable,'eyepart'=>$eyepart,'examinationcharges'=>$html,'countchk'=>$sl,'error'=>'','error_message' =>''));

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

    public function getrefractiondataobj()

   {

     $var_array=array(4,$this->session->userdata('office_id'));

     $getdata=$this->Common_model->getrefractionmodel($var_array);

     if($getdata)

     {

        



        $html='<form id="edit_form" action="#" method="post"> 

                             <div id="div_modal" class="modal fade" role="dialog">

                                    <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h4 class="modal-title"></h4>

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <input type="hidden" value="'.$this->input->post('getid').'" id="boxid" >

                                            </div>

                                            <div class="modal-body">';



                                             $html.='<div class="row"><div class="col-md-12">

                    

                            <ul class="nav nav-tabs nav-topline">

                                  <li class="nav-item">

                                    <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21"

                                      aria-expanded="true">Right</a>

                                  </li>

                                  <li class="nav-item">

                                    <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"

                                      aria-expanded="false">Left</a>

                                  </li>

                                </ul>



                                 <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                                        <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">';

                                         $html.='<div class="row"><div class="col-md-6"><span><b>Sphere</b></span></div><div class="col-md-6"><span><b>Sphere</b></span></div></div><div class="row"><div class="col-md-6">

                                         <table class="sphryt table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $dataw)

                                                    {

                                                        if($dataw['eye_type']==2 && $dataw['ref_type']==0 &&  $dataw['action']==1)

                                                        {



                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($dataw['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                     $html.='</tr></tbody></table></div><div class="col-md-6">

                                     <table  class="sphryt table table-bordered" ><tbody><tr>';



                                            $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==2 && $datav['ref_type']==0 &&  $datav['action']==2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>';















                                                 $html.='</div>



                                                 <div role="tabpanel" class="tab-pane" id="tab22" aria-expanded="true" aria-labelledby="base-tab22">';





                                                         $html.='<div class="row"><div class="col-md-6"><span><b>Sphere</b></span></div><div class="col-md-6"><span><b>Sphere</b></span></div></div><div class="row"><div class="col-md-6">

                                         <table class="sphryt table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $dataw)

                                                    {

                                                        if($dataw['eye_type']==1 && $dataw['ref_type']==0 &&  $dataw['action']==1)

                                                        {



                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($dataw['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                     $html.='</tr></tbody></table></div><div class="col-md-6">

                                     <table  class="sphryt table table-bordered" ><tbody><tr>';



                                            $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==1 && $datav['ref_type']==0 &&  $datav['action']==2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>



                                                   

                                                 </div>



                                                 </div></div></div>';

         



                                                $html.='







                                          

                                        </div>

                                        <div class="card-footer ml-auto" id="m_btn_addmedhis">

                                    <button  class="btn btn-primary btn-sm" type="button" ><i class="fas fa-plus-square"></i>Submit</button>

                                    

                                </div>

                                    </div>

                                </div>

                            </form>';

                 echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));



                                               



     }

   }



   public function getrefractiondata()

   {

        $this->form_validation->set_rules('refraction_type', 'Refraction Type', 'trim|required|numeric');

        $this->form_validation->set_rules('ref_type', 'Refraction Type', 'trim|required|numeric');

        $this->form_validation->set_rules('eye_type', 'Refraction Type', 'trim|required|numeric');

        $this->form_validation->set_rules('getid', 'Refraction Type', 'trim|required');

        if($this->form_validation->run() == TRUE)

        {

            $var_array=array($this->input->post('refraction_type'),$this->session->userdata('office_id'));

            $getdata=$this->Common_model->getrefractionmodel($var_array);

            if($getdata)

            {

                if($this->input->post('getid')==1)

                {

                    $na='u';

                    $con1=1;

                    $con2=2;

                }

                elseif($this->input->post('getid')==2)

                {

                    $na='b';

                    $con1=3;

                    $con2=4;

                }

                elseif($this->input->post('getid')==3)

                {

                    $na='c';

                    $con1=0;

                    $con2=0;

                }

                elseif($this->input->post('getid')==4)

                {

                    $na='s';

                    $con1=0;

                    $con2=0;

                }

                elseif($this->input->post('getid')==5)

                {

                    $na='r';

                    $con1=0;

                    $con2=0;

                }

                $html='<form id="edit_form" action="#" method="post"> 

                             <div id="div_modal" class="modal fade" role="dialog">

                                    <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h4 class="modal-title"></h4>

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <input type="hidden" value="'.$this->input->post('getid').'" id="boxid" >

                                            </div>

                                            <div class="modal-body">';

                                            if($this->input->post('getid')==1 || $this->input->post('getid')==2)

                                            {

                                            $html.='<div class="row"><div class="col-md-6"><span><u>Right Eye</u></span></div></div><div class="row"><div class="col-md-6"><span><b>'.$na.'cdva</b></span></div><div class="col-md-6"><span><b>'.$na.'cnva</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="'.$na.'cdvarytval"><table class="table table-bordered" id="'.$na.'cdvaryt"><tbody><tr>';

                                            $i=1;

                                            foreach($getdata as $dataw)

                                            {

                                                if($dataw['eye_type']==2 && $dataw['ref_type']==$con1)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        $name=$dataw['name'];

                                                $onc="'".$name."'";

                                                $oncid="'".$this->input->post('getid')."'";

                                            $html.='<td style="cursor:pointer">'.$dataw['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div><div class="col-md-6"><input type="hidden" id="'.$na.'cnvarytval"><table id="'.$na.'cnvaryt" class="table table-bordered" ><tbody><tr>';

                                            $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==2 && $datav['ref_type']==$con2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        $name=$datav['name'];

                                                $onc="'".$name."'";

                                                $oncid="'".$this->input->post('getid')."'";

                                            $html.='<td style="cursor:pointer">'.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>





                                            <div class="row"><div class="col-md-6"><span><u>Left Eye</u></span></div></div><div class="row"><div class="col-md-6"><span><b>'.$na.'cdva</b></span></div><div class="col-md-6"><span><b>'.$na.'cnva</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="'.$na.'cdvalftval"><table id="'.$na.'cdvalft" class="table table-bordered" ><tbody><tr>';

                                            $i=1;

                                            foreach($getdata as $dataq)

                                            {

                                                if($dataq['eye_type']==1 && $dataq['ref_type']==$con1)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        $name=$dataq['name'];

                                                $onc="'".$name."'";

                                                $oncid="'".$this->input->post('getid')."'";

                                            $html.='<td style="cursor:pointer">'.$dataq['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div><div class="col-md-6"><input type="hidden" id="'.$na.'cnvalftval"><table id="'.$na.'cnvalft" class="table table-bordered" ><tbody><tr>';

                                            $i=1;

                                            foreach($getdata as $datavy)

                                            {

                                                if($datavy['eye_type']==1 && $datavy['ref_type']==$con2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        $name=$datavy['name'];

                                                $onc="'".$name."'";

                                                $oncid="'".$this->input->post('getid')."'";

                                            $html.='<td style="cursor:pointer">'.$datavy['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div>';



                                            }

                                             elseif($this->input->post('getid')==3)

                                             {

                                                $html.='<div class="row"><div class="col-md-6"><span><b>PH Right EYE</b></span></div><div class="col-md-6"><span><b>PH Left EYE</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="phprytval"><table class="table table-bordered" id="phpryt"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $dataw)

                                                    {

                                                        if($dataw['eye_type']==2 && $dataw['ref_type']==$con1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$dataw['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                        $html.='</tr></tbody></table></div><div class="col-md-6"><input type="hidden" id="phplftval"><table id="phplft" class="table table-bordered" ><tbody><tr>';

                                            $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==1 && $datav['ref_type']==$con2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        $name=$datav['name'];

                                                $onc="'".$name."'";

                                                $oncid="'".$this->input->post('getid')."'";

                                            $html.='<td>'.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table>';





                                             }



          elseif($this->input->post('getid')==4)

         {

            $axist=$this->input->post('axis');

            $html.='<div class="row"><div class="col-md-12">

                    

                            <ul class="nav nav-tabs nav-topline">

                                  <li class="nav-item">

                                    <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21"

                                      aria-expanded="true">Right</a>

                                  </li>

                                  <li class="nav-item">

                                    <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"

                                      aria-expanded="false">Left</a>

                                  </li>

                                </ul>



                                 <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                                        <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">';



                                         $html.='<div class="row"><div class="col-md-6"><span><b>Sphere</b></span></div><div class="col-md-6"><span><b>Sphere</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="axist" value="'.$axist.'"><input type="hidden" id="sphrytmin"><input type="hidden" id="sphrytplus"><table class="sphryt table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $dataw)

                                                    {

                                                        if($dataw['eye_type']==2 && $dataw['ref_type']==$con1 &&  $dataw['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($dataw['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                     $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="sphryt table table-bordered" ><tbody><tr>';



                                            $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==2 && $datav['ref_type']==$con2 &&  $datav['action']==2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>';



                                                 $var_array=array(5,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='<div class="row"><div class="col-md-6"><span><b>Cylinder</b></span></div><div class="col-md-6"><span><b>Cylinder</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="cylrytmin"><input type="hidden" id="cylrytplus"><table class="cylryt table table-bordered"><tbody><tr>';

                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==2 && $datawt['ref_type']==$con1 &&  $datawt['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datawt['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="cylryt table table-bordered" ><tbody><tr>';

                                                    $i=1;

                                                    foreach($getdata as $datav)

                                                    {

                                                        if($datav['eye_type']==2 && $datav['ref_type']==$con2 && $datav['action']==2)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                                $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                $html.='</tr></tbody></table></div></div>';



                                                $var_array=array(6,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='<div class="row"><div class="col-md-6"></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><input type="hidden" id="axisrytmin"><input type="hidden" id="axisrytplus"><span><b>Axis</b><table class="axisryt table table-bordered"><tbody><tr>';



                                                  $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==$con1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div></div>';







                                            

                                          $html.='</div>





                                          <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">';



                                             $html.='<div class="row"><div class="col-md-6"><span><b>Sphere</b></span></div><div class="col-md-6"><span><b>Sphere</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="sphlftmin"><input type="hidden" id="sphlftplus"><table class="sprlft table table-bordered"><tbody><tr>';



                                                     $var_array=array(4,$this->session->userdata('office_id'));

                                                     $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                     $i=1;

                                                    foreach($getdata as $dataw)

                                                    {

                                                       

                                                        if($dataw['eye_type']==1 && $dataw['ref_type']==0 && $dataw['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($dataw['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                    $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="sprlft table table-bordered" ><tbody><tr>';





                                                    $i=1;

                                                    foreach($getdata as $datav)

                                                    {

                                                        if($datav['eye_type']==1 && $datav['ref_type']==$con2 && $datav['action']==2)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                                 

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                $html.='</tr></tbody></table></div></div>';





                                                 $var_array=array(5,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='<div class="row"><div class="col-md-6"><span><b>Cylinder</b></span></div><div class="col-md-6"><span><b>Cylinder</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="cylftmin"><input type="hidden" id="cylftplus"><table class="cylft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==$con1 && $datawt['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datawt['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="cylft table table-bordered" ><tbody><tr>';



                                                     $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==1 && $datav['ref_type']==$con2 && $datav['action']==2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>';



                                                 $var_array=array(6,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>Axis</b>

                                                   <input type="hidden" id="laxisll">

                                                   <table class="axislft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==$con1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';







                                                    

                                          $html.='</div>

                                

                     </div>

            </div></div>';

         }







         elseif($this->input->post('getid')==5)

         {

            $axist=$this->input->post('axis');

            $html.='<div class="row"><div class="col-md-12">

                    

                            <ul class="nav nav-tabs nav-topline">

                                  <li class="nav-item">

                                    <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21"

                                      aria-expanded="true">Right</a>

                                  </li>

                                  <li class="nav-item">

                                    <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"

                                      aria-expanded="false">Left</a>

                                  </li>

                                </ul>



                                 <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                                        <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">';



                                         $html.='<div class="row"><div class="col-md-6"><span><b>Sphere</b></span></div><div class="col-md-6"><span><b>Sphere</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="axist" value="'.$axist.'"><input type="hidden" id="sphrytmin"><input type="hidden" id="sphrytplus"><table class="sphryt table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    $con1=5;

                                                    foreach($getdata as $dataw)

                                                    {

                                                        if($dataw['eye_type']==2 && $dataw['ref_type']==$con1 &&  $dataw['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($dataw['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                     $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="sphryt table table-bordered" ><tbody><tr>';



                                            $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==2 && $datav['ref_type']==$con1 &&  $datav['action']==2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>';



                                                 $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $con1=6;

                                                 $html.='<div class="row"><div class="col-md-6"><span><b>Cylinder</b></span></div><div class="col-md-6"><span><b>Cylinder</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="cylrytmin"><input type="hidden" id="cylrytplus"><table class="cylryt table table-bordered"><tbody><tr>';

                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==2 && $datawt['ref_type']==$con1 &&  $datawt['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datawt['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                        $html.='<td>'.$min.''.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="cylryt table table-bordered" ><tbody><tr>';

                                                    $i=1;

                                                    foreach($getdata as $datav)

                                                    {

                                                        if($datav['eye_type']==2 && $datav['ref_type']==$con1 && $datav['action']==2)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                                $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                $html.='</tr></tbody></table></div></div>';

                                                $con1=7;

                                                $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='<div class="row"><div class="col-md-6"></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><input type="hidden" id="axisrytmin"><input type="hidden" id="axisrytplus"><span><b>Axis</b><table class="axisryt table table-bordered"><tbody><tr>';



                                                  $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==$con1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div></div>';



                                                $con1=8;

                                                $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='<div class="row"><div class="col-md-6"></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><input type="hidden" id="varytmin"><input type="hidden" id="varytplus"><span><b>V/A</b><table class="varyt table table-bordered"><tbody><tr>';



                                                  $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==$con1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div></div>';





                                                      $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>Add</b>

                                                   <input type="hidden" id="addr1">

                                                   <table class="addryt table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==9)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';







                                                 $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>N/V</b>

                                                   <input type="hidden" id="nvr1">

                                                   <table class="nvryt table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==10)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';







                                            

                                          $html.='</div>





                                          <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">';



                                             $html.='<div class="row"><div class="col-md-6"><span><b>Sphere</b></span></div><div class="col-md-6"><span><b>Sphere</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="sphlftmin"><input type="hidden" id="sphlftplus"><table class="sprlft table table-bordered"><tbody><tr>';



                                                     $var_array=array(7,$this->session->userdata('office_id'));

                                                     $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                     $i=1;

                                                    foreach($getdata as $dataw)

                                                    {

                                                       

                                                        if($dataw['eye_type']==1 && $dataw['ref_type']==5 && $dataw['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($dataw['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$dataw['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                    $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="sprlft table table-bordered" ><tbody><tr>';





                                                    $i=1;

                                                    foreach($getdata as $datav)

                                                    {

                                                        if($datav['eye_type']==1 && $datav['ref_type']==5 && $datav['action']==2)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                                 

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                $html.='</tr></tbody></table></div></div>';





                                                 $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='<div class="row"><div class="col-md-6"><span><b>Cylinder</b></span></div><div class="col-md-6"><span><b>Cylinder</b></span></div></div><div class="row"><div class="col-md-6"><input type="hidden" id="cylftmin"><input type="hidden" id="cylftplus"><table class="cylft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==6 && $datawt['action']==1)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                if($datawt['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }



                                                     $html.='</tr></tbody></table></div><div class="col-md-6"><table  class="cylft table table-bordered" ><tbody><tr>';



                                                     $i=1;

                                            foreach($getdata as $datav)

                                            {

                                                if($datav['eye_type']==1 && $datav['ref_type']==6 && $datav['action']==2)

                                                {

                                                    $k=0;

                                                    $quantity=1;

                                                    while ($quantity>$k)

                                                    {

                                                        if($datav['action']==1)

                                                                {

                                                                    $min='-';

                                                                }

                                                                else

                                                                {

                                                                    $min='+';

                                                                }

                                                               

                                                                $html.='<td>'.$min.''.$datav['name'].'</td>';

                                                        if($i%5==0)

                                                        {

                                                           $html.='</tr><tr>';

                                                        }

                                                        $i++;

                                                        $k++;

                                                    }  

                                                } 

                                            }

                                                $html.='</tr></tbody></table></div></div>';



                                                 $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>Axis</b>

                                                   <input type="hidden" id="laxisll">

                                                   <table class="axislft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==7)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';



                                                       $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>V/A</b>

                                                   <input type="hidden" id="vall">

                                                   <table class="valft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==8)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';









                                                 $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>Add</b>

                                                   <input type="hidden" id="addlftr">

                                                   <table class="addlft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==9)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';







                                                 $var_array=array(7,$this->session->userdata('office_id'));

                                                 $getdata=$this->Common_model->getrefractionmodel($var_array);

                                                 $html.='

                                                <div class="row"><div class="col-md-6"><span><b></b></span></div><div class="col-md-6"><span></span></div></div><div class="row"><div class="col-md-6"></div><div class="col-md-6"><b>N/V</b>

                                                   <input type="hidden" id="nvlftr">

                                                   <table class="nvlft table table-bordered"><tbody><tr>';



                                                    $i=1;

                                                    foreach($getdata as $datawt)

                                                    {

                                                        if($datawt['eye_type']==1 && $datawt['ref_type']==10)

                                                        {

                                                            $k=0;

                                                            $quantity=1;

                                                            while ($quantity>$k)

                                                            {

                                                                $name=$datawt['name'];

                                                        $onc="'".$name."'";

                                                        $oncid="'".$this->input->post('getid')."'";

                                                    $html.='<td>'.$datawt['name'].'</td>';

                                                                if($i%5==0)

                                                                {

                                                                   $html.='</tr><tr>';

                                                                }

                                                                $i++;

                                                                $k++;

                                                            }  

                                                        } 

                                                    }

                                                     $html.='</tr></tbody></table></div></div>';







                                                    

                                          $html.='</div>

                                

                     </div>

            </div></div>';

         }



                                                $html.='







                                          

                                        </div>

                                        <div class="card-footer ml-auto" id="m_btn_addmedhis">

                                    <button  class="btn btn-primary btn-sm" type="button" onclick="'.$na.'refractionvision()"><i class="fas fa-plus-square"></i>Submit</button>

                                    

                                </div>

                                    </div>

                                </div>

                            </form>';

                 echo json_encode(array('msg'=>$html,'error' =>'','error_message' =>''));

            }

            else

            {

                echo json_encode(array('msg'=>'','error' =>'No data Found','error_message' =>''));

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

        

            $getresult=$this->Dental_examination_model->deletedata($delete_id);

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
   public function opticaladvice()
   {
      $this->form_validation->set_rules('patid', 'Patient Registration ID', 'trim|required|min_length[1]|max_length[100]|numeric');
       if($this->form_validation->run() == TRUE)
       {
            $patid=trim(htmlentities($this->input->post('patid')));
            $updateid=$this->Dental_examination_model->updateopticalexamination($patid);
            if($updateid)
            {
                echo json_encode(array('msg'=>'Optical Advice Successfully','error'=>'','error_message' =>''));
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
    public function examinationnewprint()

    {

       

        $this->Dental_examination_model->printnew_bill($this->input->post('examinationid'),$this->session->userdata('office_id'));

    }

//INR4
    public function examinationprint()

    {

       
        $this->Dental_examination_model->print_bill($this->input->post('examinationid'),$this->input->post('chkcomplaintsout'),$this->input->post('chkopthalmicsout'),$this->input->post('chkmedicalout'),$this->input->post('chkeyepartout'),$this->input->post('addmedicinessout'),$this->input->post('investigationchkout'),$this->input->post('preliminary_exout'),$this->input->post('vsisonreadingsout'),$this->input->post('curspecout'),$this->input->post('objectchkout'),$this->input->post('arkkchkout'),$this->input->post('manchkout'),$this->input->post('specchkout'),$this->input->post('conlchkout'),$this->input->post('pmtchkout'),$this->input->post('getexamination_treatmentplan_c'),$this->input->post('addEyePart_c'),$this->session->userdata('office_id'));
    }
    public function get_teeth_status($doc_examination_id)
    {
        $res='';
        $htmll='';
        $htmlloopteeth1=$htmlloopteeth2=$htmlloopteeth_rev1=$htmlloopteeth_rev2='';
        $k=1;
        $i = 8;
        $chl='';
        $y=0;
        while($i>0) {
          $chl='';
          if($doc_examination_id>0)
          {
              $sql = "select count(*) as cnt from dental_teeth where  examination_id=$doc_examination_id and teeth=$k";
              $result_row=$this->db->query($sql); 
              $res= $result_row->result_array ();
              if($res)
              {
                  $contval=$res[0]['cnt'];
                  if($contval>0)
                  {
                      $chl='checked';
                  }
              }
          }
          $htmlloopteeth_rev1.='<div class="cat action">
                   <label><input type="checkbox" name="teethchk[]" '.$chl.' value="'.$k.'"><span>'.$i.'</span></label>
               </div>';
      
         
         $i--;
         $k++;
         $y++;
       }
       $x=1;
        while($x <= 8) {

          $chl='';
          if($doc_examination_id>0)
          {
              $sql = "select count(*) as cnt from dental_teeth where  examination_id=$doc_examination_id and teeth=$k";
              $result_row=$this->db->query($sql); 
              $res= $result_row->result_array ();
              if($res)
              {
                  $contval=$res[0]['cnt'];
                  if($contval>0)
                  {
                      $chl='checked';
                  }
              }
          }

          $htmlloopteeth1.='<div class="cat action">
                             <label><input type="checkbox" name="teethchk[]" '.$chl.' value="'.$k.'"><span>'.$x.'</span></label>
                         </div>';
         $x++;
         $k++;
       }
       $i = 8;
       while($i>0) {

          $chl='';
          if($doc_examination_id>0)
          {
              $sql = "select count(*) as cnt from dental_teeth where  examination_id=$doc_examination_id and teeth=$k";
              $result_row=$this->db->query($sql); 
              $res= $result_row->result_array ();
              if($res)
              {
                  $contval=$res[0]['cnt'];
                  if($contval>0)
                  {
                      $chl='checked';
                  }
              }
          }

          $htmlloopteeth_rev2.='<div class="cat action">
                             <label><input type="checkbox" name="teethchk[]" '.$chl.' value="'.$k.'"><span>'.$i.'</span></label>
                         </div>';
         $i--;
         $k++;
       }
       $x=1;
        while($x <= 8) {

          $chl='';
          if($doc_examination_id>0)
          {
              $sql = "select count(*) as cnt from dental_teeth where  examination_id=$doc_examination_id and teeth=$k";
              $result_row=$this->db->query($sql); 
              $res= $result_row->result_array ();
              if($res)
              {
                  $contval=$res[0]['cnt'];
                  if($contval>0)
                  {
                      $chl='checked';
                  }
              }
          }

           $htmlloopteeth2.='<div class="cat action">
                              <label><input type="checkbox" name="teethchk[]" '.$chl.' value="'.$k.'"><span>'.$x.'</span></label>
                          </div>';
          $x++;
          $k++;
        }
        $htmll='<div class="row">
        <div class="col-md-2"><h6 style="margin-top: 10%;"><b>Hard tissue</b></h6></div>
        <div class="col-md-10">'.$htmlloopteeth_rev1.' '.$htmlloopteeth1.'</div>
       </div>
       <div class="row">
         <div class="col-md-2"><h6 style="margin-top: 10%;"><b>Hard tissue</b></h6></div>
         <div class="col-md-10">'.$htmlloopteeth_rev2.' '.$htmlloopteeth2.'</div>
      </div>';
       return  $htmll;
    }

    public function examinationprint_preview()

    {

       
        $this->Dental_examination_model->print_bill_preview($this->input->post('examinationid'),$this->input->post('chkcomplaintsout'),$this->input->post('chkopthalmicsout'),$this->input->post('chkmedicalout'),$this->input->post('chkeyepartout'),$this->input->post('addmedicinessout'),$this->input->post('investigationchkout'),$this->input->post('preliminary_exout'),$this->input->post('vsisonreadingsout'),$this->input->post('curspecout'),$this->input->post('objectchkout'),$this->input->post('arkkchkout'),$this->input->post('manchkout'),$this->input->post('specchkout'),$this->input->post('conlchkout'),$this->input->post('pmtchkout'),$this->input->post('getexamination_treatmentplan_c'),$this->input->post('addEyePart_c'),$this->session->userdata('office_id'));
    }

    public function printcertificated()

    {

        $this->Dental_examination_model->printcertificate($this->input->post('examin_id'),$this->session->userdata('office_id'));

    }
    
//getexaminationpreview
// INR4

public function getexaminationpreview()

    {
        log_message('info',  'getexaminationpreview');
      

       $this->form_validation->set_rules('examinationid', 'Examination ID', 'trim|required|min_length[1]|max_length[100]|numeric');

       if($this->form_validation->run() == TRUE)

       {

          $examinationid=$this->input->post('examinationid');
          
          $office_id=$this->session->userdata('office_id');

          $chkcomplaintsout=true;
          $chkopthalmicsout=true;
          $chkmedicalout=true;
          $chkeyepartout=true;
          $addmedicinessout=true;
          $investigationchkout=true;
          $preliminary_exout=true;
//INR4
          $eyePartsout =true;
          $diagnosisout =true;

          $vsisonreadingsout=true;
          $curspecout=true;
          $objectchkout=true;
          $arkkchkout=true;
          $manchkout=true;
          $specchkout=true;
          $conlchkout=true;
          $pmtchkout=true;

          $examination_masters=$this->db->get_where('examination',"examination_id=$examinationid")->row();
            log_message('info', 'INR4');
            log_message('info', $examinationid);
// INR4
 $single_text_value="select family_history as family_history, current_meditation as current_meditation,drug_history as drug_history, vdiagnosis as vdiagnosis ,ant_lefteye as ant_lefteye , ant_righteye as ant_righteye ,bfit as bfit, vcontent as vcontent from examination where examination_id=? ";
 $single_text_value_result=$this->db->query($single_text_value,$examinationid);
 $single_text_value_reading= $single_text_value_result->result_array()[0];
 $single_text_value_readings=$this->Dental_examination_model->checkValid($single_text_value_reading);

$sql = "select treatment_date,treatment_plan,treament_payment from dental_treatment where  examination_id=$examinationid";
$result_row=$this->db->query($sql); 
$res_trementplan= $result_row->result_array ();

$sql = "select count(*) as cnt from dental_teeth where  examination_id=$examinationid";
$result_row=$this->db->query($sql); 
$res_teeth= $result_row->result_array ();

 // Added for removing empty data 
$vision_sql="select  vis1, vis2, vis3, vis4, vis5, vis6, vis7, vis8, vis9, vis10 from examination where examination_id=? ";
 $vision_result=$this->db->query($vision_sql,$examinationid);
 $vision_reading= $vision_result->result_array()[0];
 $vision_readings=$this->Dental_examination_model->checkValid($vision_reading);


$preliminary_sql="select  pre1, pre2, pre3, pre4, pre5, pre6, pre7, pre8, pre9, pre10,pre11,pre12 from examination where examination_id=? ";
 $preliminary_result=$this->db->query($preliminary_sql,$examinationid);
 $preliminary_reading= $preliminary_result->result_array()[0];
 $preliminary_readings=$this->Dental_examination_model->checkValid($preliminary_reading);



$curl_sql="select  cur1, cur2, cur3, cur4, cur5, cur6, cur7, cur8, cur9, cur10,cur11,cur12,cur13,cur14,cur15,cur16 from examination where examination_id=? ";
 $curl_result=$this->db->query($curl_sql,$examinationid);
 $curl_reading= $curl_result->result_array()[0];
 $curl_readings=$this->Dental_examination_model->checkValid($curl_reading);

$obj_sql="select  obj1, obj2, obj3, obj4, obj5, obj6, obj7, obj8, obj9, obj10,obj11,obj12,obj13,obj14,obj15 from examination where examination_id=? ";
$obj_result=$this->db->query($obj_sql,$examinationid);
$obj_reading= $obj_result->result_array()[0];
$obj_readings=$this->Dental_examination_model->checkValid($obj_reading);


$con_sql="select  con1, con2, con3, con4, con5, con6, con7, con8, con9, con10,con11,con12,con13,con14,con15,con16 from examination where examination_id=? ";
 $con_result=$this->db->query($con_sql,$examinationid);
 $con_reading= $con_result->result_array()[0];
 $con_readings=$this->Dental_examination_model->checkValid($con_reading);
//INR4
 $pmt_sql="select  pmt1, pmt2, pmt3, pmt4, pmt5, pmt6, pmt7, pmt8, pmt9, pmt10,pmt11,pmt12,pmt13,pmt14,pmt15,pmt16 from examination where examination_id=? ";
 $pmt_result=$this->db->query($pmt_sql,$examinationid);
 $pmt_reading= $pmt_result->result_array()[0];
 $pmt_readings=$this->Dental_examination_model->checkValid($pmt_reading);


$spe_sql="select  spe1, spe2, spe3, spe4, spe5, spe6, spe7, spe8, spe9, spe10,spe11,spe12,spe13,spe14,spe15 from examination where examination_id=? ";
 $spe_result=$this->db->query($spe_sql,$examinationid);
 $spe_reading= $spe_result->result_array()[0];
 $spe_readings=$this->Dental_examination_model->checkValid($spe_reading);

 

$man_sql="select  man1, man2, man3, man4, man5, man6, man7, man8, man9, man10 from examination where examination_id=? ";
 $man_result=$this->db->query($man_sql,$examinationid);
 $man_reading= $man_result->result_array()[0];
 $man_readings=$this->Dental_examination_model->checkValid($man_reading);


$ar_sql="select  ar1, ar2, ar3, ar4, ar5, ar6, ar7, ar8, ar9, ar10 from examination where examination_id=? ";
 $ar_result=$this->db->query($ar_sql,$examinationid);
 $ar_reading= $ar_result->result_array()[0];
 $ar_readings=$this->Dental_examination_model->checkValid($ar_reading);






    $data['doctorname']=$this->db->get_where('doctors_registration',"doctors_registration_id=$examination_masters->doctor_id")->row()->name;

    $data['username']=$this->db->get_where('user',"user_id=$examination_masters->login_id")->row()->name;



    $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$examination_masters->patient_registration_id")->row();

   

    $data['current_meditation']=$examination_masters->current_meditation;

    $data['family_history']=$examination_masters->family_history;

    $data['drug_history']=$examination_masters->drug_history;

    $data['cur1']=$examination_masters->cur1;

    $data['cur2']=$examination_masters->cur2;

    $data['cur3']=$examination_masters->cur3;

    $data['cur4']=$examination_masters->cur4;

    $data['cur5']=$examination_masters->cur5;

    $data['cur6']=$examination_masters->cur6;

    $data['cur7']=$examination_masters->cur7;

    $data['cur8']=$examination_masters->cur8;

    $data['cur9']=$examination_masters->cur9;

    $data['cur10']=$examination_masters->cur10;

    $data['cur11']=$examination_masters->cur11;

    $data['cur12']=$examination_masters->cur12;

    $data['cur13']=$examination_masters->cur13;

    $data['cur14']=$examination_masters->cur14;

    $data['cur15']=$examination_masters->cur15;

    $data['cur16']=$examination_masters->cur16;

    $data['vis1']=$examination_masters->vis1;

    $data['vis2']=$examination_masters->vis2;

    $data['vis3']=$examination_masters->vis3;

    $data['vis4']=$examination_masters->vis4;

    $data['vis5']=$examination_masters->vis5;

    $data['vis6']=$examination_masters->vis6;

    $data['vis7']=$examination_masters->vis7;

    $data['vis8']=$examination_masters->vis8;

    $data['vis9']=$examination_masters->vis9;

    $data['vis10']=$examination_masters->vis10;

    $data['ar1']=$examination_masters->ar1;

    $data['ar2']=$examination_masters->ar2;

    $data['ar3']=$examination_masters->ar3;

    $data['ar4']=$examination_masters->ar4;

    $data['ar5']=$examination_masters->ar5;

    $data['ar6']=$examination_masters->ar6;

    $data['ar7']=$examination_masters->ar7;

    $data['ar8']=$examination_masters->ar8;

    $data['ar9']=$examination_masters->ar9;

    $data['ar10']=$examination_masters->ar10;

    $data['man1']=$examination_masters->man1;

    $data['man2']=$examination_masters->man2;

    $data['man3']=$examination_masters->man3;

    $data['man4']=$examination_masters->man4;

    $data['man5']=$examination_masters->man5;

    $data['man6']=$examination_masters->man6;

    $data['man7']=$examination_masters->man7;

    $data['man8']=$examination_masters->man8;

    $data['man9']=$examination_masters->man9;

    $data['man10']=$examination_masters->man10;

    $data['spe1']=$examination_masters->spe1;

    $data['spe2']=$examination_masters->spe2;

    $data['spe3']=$examination_masters->spe3;

    $data['spe4']=$examination_masters->spe4;

    $data['spe5']=$examination_masters->spe5;

    $data['spe6']=$examination_masters->spe6;

    $data['spe7']=$examination_masters->spe7;

    $data['spe8']=$examination_masters->spe8;

    $data['spe9']=$examination_masters->spe9;

    $data['spe10']=$examination_masters->spe10;

    $data['spe11']=$examination_masters->spe11;

    $data['spe12']=$examination_masters->spe12;

    $data['spe13']=$examination_masters->spe13;

    $data['spe14']=$examination_masters->spe14;

    $data['spe15']=$examination_masters->spe15;

    $data['spe16']=$examination_masters->spe16;

    $data['con1']=$examination_masters->con1;

    $data['con2']=$examination_masters->con2;

    $data['con3']=$examination_masters->con3;

    $data['con4']=$examination_masters->con4;

    $data['con5']=$examination_masters->con5;

    $data['con6']=$examination_masters->con6;

    $data['con7']=$examination_masters->con7;

    $data['con8']=$examination_masters->con8;

    $data['con9']=$examination_masters->con9;

    $data['con10']=$examination_masters->con10;

    $data['con11']=$examination_masters->con11;

    $data['con12']=$examination_masters->con12;

    $data['con13']=$examination_masters->con13;

    $data['con14']=$examination_masters->con14;

    $data['con15']=$examination_masters->con15;

    $data['con16']=$examination_masters->con16;

    $data['pmt1']=$examination_masters->pmt1;

    $data['pmt2']=$examination_masters->pmt2;

    $data['pmt3']=$examination_masters->pmt3;

    $data['pmt4']=$examination_masters->pmt4;

    $data['pmt5']=$examination_masters->pmt5;

    $data['pmt6']=$examination_masters->pmt6;

    $data['pmt7']=$examination_masters->pmt7;

    $data['pmt8']=$examination_masters->pmt8;

    $data['pmt9']=$examination_masters->pmt9;

    $data['pmt10']=$examination_masters->pmt10;

    $data['pmt11']=$examination_masters->pmt11;

    $data['pmt12']=$examination_masters->pmt12;

    $data['pmt13']=$examination_masters->pmt13;

    $data['pmt14']=$examination_masters->pmt14;

    $data['pmt15']=$examination_masters->pmt15;

    $data['pmt16']=$examination_masters->pmt16;



   $data['fname']=$patient_details->fname; 

   $data['lname']=$patient_details->lname; 

   $data['mrdno']=$patient_details->mrdno; 

   $data['address']=$patient_details->address; 

   $data['mobileno']=$patient_details->mobileno; 
// INR4
   $data['vdiagnosis']=$examination_masters->vdiagnosis;
   $data['ant_lefteye']=$examination_masters->ant_lefteye;
   $data['ant_righteye']=$examination_masters->ant_righteye;
   $data['bfit']=$examination_masters->bfit;
   $data['vcontent']=$examination_masters->vcontent;

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

   $showdata='';

   $getresult_Diag=$this->Dental_examination_model->Get_Showdata_Dia($examination_masters->examination_id);

    $complaints=$this->db->query("select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where examination_id=$examination_masters->examination_id")->result();



     $ophthalmic_history=$this->db->query("select * from examination_ophthalmic_history inner join ophthalmic_history on examination_ophthalmic_history.ophthalmic_history_id=ophthalmic_history.ophthalmic_history_id where examination_id=$examination_masters->examination_id")->result(); 



     $medical_history=$this->db->query("select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where examination_id=$examination_masters->examination_id")->result(); 



     $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examination_masters->examination_id")->result(); 

// INR4

$addEye_Part= $this->db->query("select righteyeparts as righteyeparts ,lefteyeparts as lefteyeparts,righteyepartscheckbox as righteyepartscheckbox,lefteyepartscheckbox as lefteyepartscheckbox,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id as segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name as content,eye_segment.name as segment_name from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.examination_id =$examination_masters->examination_id")->result(); 

$getexamination_treatmentplan =$this->db->query("select examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id as plan ,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id  inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
where examination_treatmentplan.counseling_id = 1 and examination_treatmentplan.examination_id =$examination_masters->examination_id")->result();




     $var_array=array($examination_masters->examination_id,$this->session->userdata('office_id'));

     $getdoctorprescription=$this->Dental_examination_model->getdoctormedicinemodels($var_array);
    // print_r($getdoctorprescription);exit;



     $var_array=array($examination_masters->examination_id);

     $Getdetailstableex=$this->Dental_examination_model->Getdetailstable($var_array);



    //  $showdata.='<div class="row">

    //  <div class="col-md-5">

    //  <input type="checkbox" name="select-all" id="select-all" >   <h5 style="font-weight: bold;">Select All</h5></div></div>';


     if($complaints){

    


   $showdata.='<div class="row">

                <div class="col-md-5">

                <input type="checkbox" name="complaints_c" id="complaints_c"  value="1" >            <h5 style="font-weight: bold;">Presenting Complaint</h4>';

   $showdata.='</div>

                <div class="col-md-7">';

                        if($complaints){ foreach($complaints as $comp){

                        $lefteye='';

                        $righteye='';

                         if($comp->eye_left==1)

                        {

                           $lefteye='<b>Left Eye</b>'.$comp->remarks;

                        }

                        if($comp->eye_right==1)

                        {

                           $righteye='<b>Right Eye</b>'.$comp->remarks;

                        }

                       $showdata.='<span>'.$comp->name.'  </span><br/>'; 

                     } } 

                $showdata.='</div>

               </div>';

                }



           


                 if($medical_history)
                 {
                
                     $showdata.='<div class="row">
                
                     <div class="col-md-5">
                
                     <input type="checkbox" name="medical_history_c" id="medical_history_c"  value="1" >    <h5 style="font-weight: bold;">Medical History</h4>';
                
                $showdata.='</div>
                
                             <div class="col-md-7">';
                
                                 foreach($medical_history as $medi)
                
                                 {
                
                                    $showdata.='<span>'.$medi->name.'  '.$medi->remarks.' <br/></span>'; 
                
                                 }
                
                             $showdata.='</div>
                
                            </div>';
                
                  }

                  
// INR4 !!
                 if($single_text_value_readings)

                 {
                     log_message('info',  'single_text_value_readings');
                     log_message('info',  $single_text_value_readings);
             
 
                            if($examination_masters->family_history)
                            {
                              $showdata.='<div class="row">
                          
                              <div class="col-md-5">
                          
                              <h5 style="font-weight: bold;">Family History</h4>';
                          
                          $showdata.='</div>
                          
                                      <div class="col-md-7">';
                          
                                         
                                     
                                           $showdata.='<span>' .$examination_masters->family_history.'<br/></span>';  
                          
                                        
                          
                                      $showdata.='</div>
                          
                                     </div>';
                            }
 
                            if($examination_masters->drug_history)
                            {
                              $showdata.='<div class="row">
                          
                              <div class="col-md-5">
                          
                              <h5 style="font-weight: bold;">Drug Allergy</h4>';
                          
                          $showdata.='</div>
                          
                                      <div class="col-md-7">';
                          
                                         
                                     
                                           $showdata.='<span>' .$examination_masters->drug_history.'<br/></span>';  
                          
                                        
                          
                                      $showdata.='</div>
                          
                                     </div>';
                            }
 
                            if($examination_masters->current_meditation)
                            {
                              $showdata.='<div class="row">
                          
                              <div class="col-md-5">
                          
                              <h5 style="font-weight: bold;">Current Medication</h4>';
                          
                          $showdata.='</div>
                          
                                      <div class="col-md-7">';
                          
                                         
                                     
                                           $showdata.='<span>' .$examination_masters->current_meditation.'<br/></span>';  
                          
                                        
                          
                                      $showdata.='</div>
                          
                                     </div>';
                            }
 
 
 
                  }

                  
if($res_trementplan)
{
                    $showdata.='<div class="row">

                                    <div class="col-md-5">
                                    <input type="checkbox" name="visionReading" id="visionReading"   value="1" >
                                    <h5 style="font-weight: bold;">Treatment Plan:</h4>

                                </div>

                                <div class="col-md-7">
                                <table class="table table-bordered table-hover" id="treatmentplantable">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Treatment Plan</th>
                                                    <th>Payment</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            foreach ($res_trementplan as $dataexteeth) 
                                            {
                                                    $showdata.='<tr>
                                                                    <td>'.$dataexteeth['treatment_date'].'</td>
                                                                    <td>'.$dataexteeth['treatment_plan'].'</td>
                                                                    <td>'.$dataexteeth['treament_payment'].'</td>
                                                                </tr>';
                                            }
                                                
                                                $showdata.='</tbody>
                                            </table>
                                    

                                </div>

                               </div>';
}

if($res_teeth)
{
  
                  $showdata.='<div class="row">

                                    <div class="col-md-5">
                                    <input type="checkbox" name="pe" id="preExam"  value="1" >
                                    <h5 style="font-weight: bold;">Past Dental History:</h4>

                                </div>

                                <div class="col-md-7">

                                   '.$this->get_teeth_status($examinationid).'
                                </div>

                               </div><br/>';

}


              

                 
// INR4











 if($Getdetailstableex)

 {

  $showdata.='<div class="row">

          <div class="col-md-5">

          <input type="checkbox" name="Getdetailstableex_c" id="Getdetailstableex_c"  value="1" > <h5 style="font-weight: bold;">Investigation Details:</h4>';

     $showdata.='</div>

                  <div class="col-md-7">

                 <table  class="table table-bordered table-hover"><thead><tr><th>Particulars</th></tr></thead><tbody>';

            $sl=1;

       foreach($Getdetailstableex as $datai)

       {

              $getparticularname=$this->Common_model->getparticularsmodel($datai['charge_id'],$datai['particulars_id'],$this->session->userdata('office_id'));



               $showdata.='<tr>

                    <td>'.$getparticularname[0]['name'].'</td>

                 

               </tr>';

               $sl++;



       }

            $showdata.='</tbody></table>

                  </div>

                 </div>';

  }




            
  if($getdoctorprescription)

  {

   $showdata.='<div class="row">

   <div class="col-md-5">

   <input type="checkbox" name="getdoctorprescription_c" id="getdoctorprescription_c"  value="1" >   <h5 style="font-weight: bold;"> Medicine Details:</h4>';

$showdata.='</div>

           <div class="col-md-7">

           <table  class="table table-bordered table-hover"><thead><tr><th style="width:5%;">SL NO</th style="width:10%;"><th style="width:20%;">Drug Name</th><th style="width:20%;">Instruction</th><th style="width:20%;">No Of Days</th><th style="width:20%;">Qty</th><th style="width:5%;display:none;">Eye</th></tr></thead><tbody>';

                $sgl=0;

                foreach($getdoctorprescription as $datame)

                {
                    $medd='';
                    $medind=explode(',',$datame['ex_ins']);
                    foreach ($medind as $key => $value) {
                       if($value)
                       {
                            if($value!='undefined')
                            {
                                $medd.=$value.'<br/>';
                            }
                        
                       }
                    }

                    $meddi='';
                    $medindd=explode(',',$datame['ex_no']);
                    foreach ($medindd as $key => $value) {
                       if($value)
                       {
                            if($value!='undefined')
                            {
                                $meddi.=$value.'<br/>';
                            }
                        
                       }
                    }
                    if($datame['med_action']==0)
                    {
                        $drugname=$datame['drugname'];
                    }
                    else
                    {
                        $drugname=$datame['med_name'];
                    }

                   $sgl++;

                    $showdata.='<tr><td>'.$sgl.'</td><td>'.$drugname.'</td><td>'.$datame['instruction'].'<br/>'.$medd.'</td><td>'.$datame['nodays'].'<br/>'.$meddi.'</td><td>'.$datame['qty'].'</td><td style="display:none;">'.$datame['med_eye'].'</td></tr>';

                }

                 $showdata.='</tbody></table>

           </div>

          </div>';

   }    



                    
                    if($getresult_Diag)
                    {
                     $showdata.='<div class="row">
                     <div class="col-md-5">
                     <input type="checkbox" name="addEyePart_c" id="addEyePart_c"  value="1" >
                       <h5 style="font-weight: bold;">Diagnosis Plan:</h5>';
                $showdata.='</div>
                             <div class="col-md-7">
                             <table class="table table-bordered table-hover"><thead><tr><th>SL NO</th><th>Diagnosis</th><th>Department</th></tr></thead><tbody>';
                                 $sgl=1;
                                  foreach($getresult_Diag as $datadia)
                                  {  
                                     $showdata.='<tr><td>'.$sgl.'</td><td>'.$datadia['dianame'].'</td><td>'.$datadia['dename'].'</td></tr>';
                                     $sgl++;
                                    }
                                   $showdata.='</tbody></table>
                             </div>
 
                            </div>';
 
                     }

if($examination_masters->instruction==0)
{
    $showdata.='<div class="row">
    <div class="col-md-5">
   
      <h5 style="font-weight: bold;">Dental Instruction:</h5>';
$showdata.='</div>
            <div class="col-md-7">
          <b> NO</b>

           </div>';
}
else
{
    $hht='';
    $language_instruc=$this->Dental_examination_model->Dental_instruction(1);
    if($language_instruc)
    {
        $hht.='<h2>Tamil Instruction</h2>';
        foreach($language_instruc as $tamilins)
        {
            $hht.='<li>'.$tamilins['name'].'</li>';
        }
    }
    $language_instruc=$this->Dental_examination_model->Dental_instruction(2);
    if($language_instruc)
    {
        $hht.='<h2>English Instruction</h2>';
        foreach($language_instruc as $tamilins)
        {
            $hht.='<li>'.$tamilins['name'].'</li>';
        }
    }
    $showdata.='<div class="row">
    <div class="col-md-5">
   
      <h5 style="font-weight: bold;">Dental Instructionn:</h5>';
$showdata.='</div>
            <div class="col-md-7">
           <b>Yes</b>
            <br/>
            '.$hht.'
           </div>';
}
   



             echo json_encode(array('msg'=>'data','showdata'=>$showdata,'error'=>'','error_message' =>''));

            

       }

       else

       {
        log_message('info',  'examination');
         echo json_encode(array('msg'=>'','error'=>'','error_message' => $this->form_validation->error_array()));

       }
    }

    private function cross_fetch_data() 
    {
        return array(
            'cross_doctor_id'=>trim($this->input->post('cross_doctor_id')),
            'cross_description'=>trim($this->input->post('cross_description')),
            'cross_date'=>date('Y-m-d'),
            'cross_status'=>1
           );
    }
public function cross_ref_save()
{
    $this->form_validation->set_rules('excross', 'Examination ID', 'trim|required|min_length[1]|max_length[200]');
    $this->form_validation->set_rules('cross_doctor_id', 'Doctor', 'trim|required|min_length[1]|max_length[200]');
    $this->form_validation->set_rules('cross_description', 'Description', 'trim');
    if($this->form_validation->run() == TRUE)
    {
        $getresult_doc=$this->Dental_examination_model->Checking_Samedoc($this->input->post('cross_doctor_id'),$this->input->post('excross'));
        if($getresult_doc)
        {
            $cnt_same_doc=$getresult_doc[0]['cnt'];
            if($cnt_same_doc>0)
            {
                echo json_encode(array('msg' =>'','error'=> 'Same doctor not allowed to Cross Referral','error_message' =>''));exit;
            }
        }
            $data=$this->cross_fetch_data();
            $getresult=$this->Dental_examination_model->savedata_crossref($data,$this->input->post('excross'));
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
public function Get_cross_data()
{
    $ser_date=$this->input->post('corss_search_date');
    if($ser_date)
    {
        $get_result=$this->Dental_examination_model->Getcross_rreddata($ser_date);
        //print_r($get_result);exit;
        if($get_result)
        {
            $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="data_cross"><thead></tr><th>SL No</th><th>Optometrist Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor Name</th><th>Cross Doctor Name</th><th>Description</th><th>Print</th><th>New Print</th></tr></thead><tbody>';
          $sl=1;
            foreach ($get_result as $data) 
            {
                $docname=$this->db->select('name')
                ->from('doctors_registration')
                ->where(array('doctors_registration_id'=>$data['cross_doctor_id']))
                ->get()->row()->name;

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
                  $fl=2;
                  $socurce=$sc='';
                $var_array=array($data['patient_registration_id'],$this->session->userdata('office_id'));
                $getmaster_so=$this->Common_model->Get_Pat_Source($var_array);
                if($getmaster_so)
                {
                    $socurce=$getmaster_so[0]['source'];
                    $sc="<y style='color:green;font-weight:bold'>Source:$socurce</y>";
                }
                  $chkvalfd='<a target="_blank" onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].','.$fl.') >'.$data['pateint_name'].'</a>';
                  $nwpri='<td><button type="button" class="btn btn-success" onclick="examinationnewprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>';
                $html.='<tr><td>'.$sl.'</td><td>'.$data['opthdate'].'</td><td>'.$chkvalfd.'  '.$dia.' '.$sc.'</td><td>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td>'.$docname.'</td><td>'.$data['cross_description'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'</tr>';
            $sl++;
            
            }
            $ssl=$sl-1;
            $crosscnt=$ssl;
            $html.='</tbody></table></div>';
            echo json_encode(array('msg' =>$html,'crosscnt'=>$crosscnt,'error'=>'','error_message' =>''));
        }
        else {
            echo json_encode(array('msg' =>'','error'=>'No data found','error_message' =>''));
        }
    }
}

public function sales_search_stock()
  {
    $this->form_validation->set_rules('product', 'product name', 'trim|required|min_length[1]|max_length[20]');
    if ($this->form_validation->run() == TRUE) {
      $product = trim(htmlentities($this->input->post('product')));
      $var_array = array($product);
      $getresult = $this->Dental_examination_model->getSalesSearchStock($product);
      if ($getresult) {

        $this->msg = 'success';
        $this->error = '';
        $this->error_message = '';
        echo json_encode(array(
          'msg'           => $this->msg,
          'error'         => $this->error,
          'error_message' => $this->error_message,
          'getdata' => $getresult
        ));
        exit;
      } else {
        $this->msg = '';
        $this->error = 'No Data';
        $this->error_message = '';
        echo json_encode(array(
          'msg'           => $this->msg,
          'error'         => $this->error,
          'error_message' => $this->error_message
        ));
        exit;
      }
    } else {
      $this->msg = '';
      $this->error = '';
      $this->error_message = $this->form_validation->error_array();
      echo json_encode(array(
        'msg'           => $this->msg,
        'error'         => $this->error,
        'error_message' => $this->error_message
      ));
      exit;
    }
  }
  public function getpartisave_PARTI()
  {
        $showdata='';
        $Getdetailstableex=$this->Dental_examination_model->Getdetailstablefr($this->input->post('examination_id'));
        if($Getdetailstableex)
        {
            $showdata='<table  class="table table-bordered table-hover"><thead><tr><th>Particulars</th></tr></thead><tbody>';
            $sl=1;
            foreach($Getdetailstableex as $datai)
            {
                $getparticularname=$this->Common_model->getparticularsmodel($datai['charge_id'],$datai['particulars_id'],$this->session->userdata('office_id'));
                $showdata.='<tr>
                              <td>'.$getparticularname[0]['name'].'</td>
                           </tr>';
                   $sl++;
            }
            $showdata.='</tbody></table>';
        }
         echo json_encode(array('showdata'=>$showdata,'error'=>'','error_message' =>''));
  }

  public function Get_new_his_data()
  {
       $doc_examination_id=$this->input->post('key');
                        $comshowdata='';
                         $complaints=$this->db->query("select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where temp_id='$doc_examination_id'")->result();
                         if($complaints)
                         {
                            $comshowdata='<table class="table table-bordered table-hover"><thead><tr><th>complaints</th><th>Remarks</th></tr></thead><tbody>';
                             foreach($complaints as $comp)
                             {
                                $comshowdata.='<tr><td>'.$comp->name.'</td><td>'.$comp->remarks.'</td></tr>';
                             }
                             $comshowdata.='</tbody></table>';
                         }


                       
                        $comshowdatamed='';
                          $medical_history=$this->db->query("select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where temp_id='$doc_examination_id'")->result(); 
                          if($medical_history)
                         {
                            $comshowdatamed='<table class="table table-bordered table-hover"><thead><tr><th>Medical History</th><th>Remarks</th></tr></thead><tbody>';
                             foreach($medical_history as $comps)
                             {
                                $comshowdatamed.='<tr><td>'.$comps->name.'</td><td>'.$comps->remarks.'</td></tr>';
                             }
                             $comshowdatamed.='</tbody></table>';
                         }
                        



                        $hsdhs='';
                          $medical_history_val=$this->db->query("select family_history,drug_history,current_meditation from examination  where history_id='$doc_examination_id'")->result(); 
                          if($medical_history_val)
                         {
                            $hsdhs='<table class="table table-bordered table-hover"><thead><tr><th>History details</th></tr></thead><tbody>';
                           foreach($medical_history_val as $ftt)
                           {
                                if($ftt->family_history)
                                {
                                   $hsdhs.='<tr><td>Family History:'.$ftt->family_history.'</td></tr>'; 
                                }
                                if($ftt->drug_history)
                                {
                                   $hsdhs.='<tr><td>Drug Allergy:'.$ftt->drug_history.'</td></tr>'; 
                                }
                                if($ftt->current_meditation)
                                {
                                   $hsdhs.='<tr><td>Current Meditation:'.$ftt->current_meditation.'</td></tr>'; 
                                }
                           }
                           $hsdhs.='</tbody></table>';
                         }
                     
                         $datavalshow=$comshowdata.''.$comshowdatamed.''.$hsdhs;
         echo json_encode(array('showdata'=>$datavalshow,'error'=>'','error_message' =>''));
  }

 }



 

