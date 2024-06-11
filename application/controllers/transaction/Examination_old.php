<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') OR exit('No direct script access allowed');


class Examination extends CI_Controller {



    public function __construct() {

        parent::__construct();

        if (!isset($this->session->emr_login))

         {

                redirect('login');

         }

         $this->load->model('Common_model');

         $this->load->model('Examination_model');
          $this->load->model('Mrd_user_model');

    }



    public function index()

   {

      $data['title']='EMR::Examination';

      $data['activecls']='Examination';

      $patient_registration_id=$this->input->post('printpatient_registration_id');

      $pat_app_id=$this->input->post('pat_app_id');

      $var_array=array($this->session->userdata('office_id'));
      $data['Get_staff_det']=$this->Common_model->Get_Staff();
      $data['diagnosis_v']=$this->Common_model->get_diagnosis_v($var_array);
      $data['medtemplates']=$this->Common_model->getallmedicinetemplates($var_array);
      $data['departments']=$this->Common_model->getdepartment($var_array);
      $data['treatmentplankey']= $this->generateRandomString();
      $data['medtemplates_pharmacy']=$this->Examination_model->getallmedicinetemplates_pharmacy();
      $data['geteyecomp']=$this->Examination_model->getallcomp($var_array);
      $data['getmedins']=$this->Common_model->GetAllmedins($var_array);
      $data['getofficedata']=$this->Common_model->get_conf_data($var_array);
      $data['getalldialysis']=$this->Common_model->getalldialsismdl($var_array);
	  $data['left_eye']=$this->Common_model->Geteyeparticular_com(1,$this->session->userdata('office_id'));
     
	  $data['right_eye']=$this->Common_model->Geteyeparticular_com(2,$this->session->userdata('office_id'));
      $data['getallmedicine']=$this->Common_model->getallmedicine($var_array);
      $data['getspecilaity']=$this->Common_model->getspecilaity($var_array);
      $data['Get_usage_ex']=$this->Common_model->Get_usage_ex($var_array);
      $data['Get_Typeoflenth']=$this->Common_model->Get_Typeoflenth($var_array);
      $data['Get_coating']=$this->Common_model->Get_coating($var_array);


      $patient_details=$this->db->get_where('patient_registration',"patient_registration_id=$patient_registration_id")->row();

      $patient_apdetails=$this->db->get_where('patient_appointment',"patient_appointment_id=$pat_app_id")->row();

     if($patient_apdetails->description)
     {
        $data['p_n_description']='<y class="p_blinks"><b>Description:</b><r style="font-weight: bold;">'.$patient_apdetails->description.'</r></y>';
     }
     else {
        $data['p_n_description']='';
     }

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

      // $patientwhite_details=$this->db->get_where('whitecell',"patient_appointment_id=$pat_app_id  and patient_registration_id=$patient_registration_id ")->row();
      $patientwhite_details=$this->Examination_model->whitecellmdl($pat_app_id,$patient_registration_id);

      if($this->input->post('doc_examination_id'))

      {

        $data['docc_id']='';

        $data['checkupdoctorname']=$this->Examination_model->getcheckdoctorname($patient_registration_id);

        if($patientwhite_details)

        {

        $data['bp']=$patientwhite_details[0]['bp']; 

        $data['sugar']=$patientwhite_details[0]['sugar']; 

        $data['temprature']=$patientwhite_details[0]['temprature']; 

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

     

      $content=$this->load->view('transaction/examination/insert',$data,true);

      $this->load->view('includes/layout',['content'=>$content]);  

   }

    public function getcompalints(){

        $var_array=array($this->session->userdata('office_id'));

        $his_id=$this->input->post('his_id');

        $response=$this->Examination_model->getcomplaintsdata($var_array);

             $comrem='';

             $medirem='';

             $opthrem='';

        if($his_id){

             $remall=$this->Examination_model->getallrem($his_id);



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

                                    $responsecomp=$this->Examination_model->alreadysavecompmdl($var_arrayy);

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

                               

                               $left='L<input type="checkbox" class="compleft" name="comp_left[]" '.$chklefteye.'  value="'.$data['complaints_id'].'">&nbsp;&nbsp;R<input   type="checkbox"  name="comp_right[]" '.$chkrighteye.'  value="'.$data['complaints_id'].'">&nbsp;&nbsp;BE<input   type="checkbox"  name="comp_be[]" '.$chkbeeye.'  value="'.$data['complaints_id'].'">';

                               $html.='<tr>

                                         <td>'.$sl.'</td>

                                         <td>'.$data['name'].'</td>

                                         <td>'.$left.'</td>

                                         <td>

                                            <input type="text"   class="form-control comprem" id="remarks" name="comp_remrks[]"  value="'.$rem.'">

                                            <input type="hidden"   class="form-control comprem" id="complaints_id" name="complaints_id[]"  value="'.$data['complaints_id'].'">

                                         </td>

                                       </tr>';

                                       $sl++;

                            }

                            $htmlcom='<br/><div class="row"><div class="col-md-12"><label>General Remarks</label><textarea id="gen_comp_remarks" class="form-control" name="gen_comp_remarks">'.$comrem.'</textarea></div></div>';



                              $opth=$this->Examination_model->getoptho($var_array);



                               $opthtml='<table class="table table-bordered table-hover" id="opthold" style="width:100%;">

                                  <thead>

                                      <tr><th colspan="4" style="text-align:center;">Ophthalmic History</th></tr>

                                          <th>Sl No</th>

                                          <th>Name</th>

                                          <th>EYE</th>

                                          <th>Remarks</th>

                                      </tr>

                                  </thead>

                                  <tbody>';

                                  $sl=1;

                            foreach ($opth as $data) 

                            {



                                $chklefteye='';

                                $chkbeeye=$chkrighteye=$rem='';

                                if($his_id)

                                {

                                    $var_arrayy=array($his_id,$data['ophthalmic_history_id']);

                                    $responseopth=$this->Examination_model->alreadysaveopthmdl($var_arrayy);

                                    if($responseopth){

                                    if($responseopth[0]['ophthalmic_history_id']==$data['ophthalmic_history_id'])

                                    {

                                        if($responseopth[0]['eye_left']==1)

                                        {

                                           $chklefteye='checked'; 

                                        }



                                        if($responseopth[0]['eye_right']==1)

                                        {

                                           $chkrighteye='checked'; 

                                        }

                                         if($responseopth[0]['eye_be']==1)

                                        {

                                           $chkbeeye='checked'; 

                                        }

                                        $rem=$responseopth[0]['remarks'];

                                    }

                                  }

                                    

                                }



                               

                               $left='L<input type="checkbox"  name="opth_left[]" '.$chklefteye.'   value="'.$data['ophthalmic_history_id'].'">&nbsp;&nbsp;R<input type="checkbox"  name="opth_right[]" '.$chkrighteye.' value="'.$data['ophthalmic_history_id'].'">&nbsp;&nbsp;BE<input   type="checkbox"  name="opth_be[]" '.$chkbeeye.'  value="'.$data['ophthalmic_history_id'].'">';

                               $opthtml.='<tr>

                                         <td>'.$sl.'</td>

                                         <td>'.$data['name'].'</td>

                                         <td>'.$left.'</td>

                                         <td>

                                            <input type="text" class="form-control" id="remarks" name="opth_remrks[]" value="'.$rem.'">

                                             <input type="hidden"   class="form-control comprem" id="ophthalmic_history_id" name="ophthalmic_history_id[]"  value="'.$data['ophthalmic_history_id'].'">

                                         </td>

                                       </tr>';

                                       $sl++;

                            }

                            $opthtml.='</tbody>

                               </table><br/><div class="row"><div class="col-md-12"><label>General Remarks</label><textarea class="form-control" name="gen_opth_remarks" id="gen_opth_remarks">'.$opthrem.'</textarea></div></div>';



                              $medihis=$this->Examination_model->getmedi($var_array);



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

                                    $responsemedi=$this->Examination_model->alreadysavemedmdl($var_arrayy);

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

                               </table><br/><div class="row"><div class="col-md-12"><label>General Remarks</label><textarea class="form-control" name="gen_medi_remarks" id="gen_medi_remarks">'.$medirem.'</textarea></div></div>';







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

              "whitecellsave"=>array(

                'bp'=>$this->input->post('white_bp'),

                'sugar'=>$this->input->post('white_sugar'),

                'temprature'=>$this->input->post('white_temprature'),
                 "patient_registration_id"=>$this->input->post('patient_registration_id'),

                "patient_appointment_id"=>$this->input->post('patient_appointment_id'),

               ),

               "examination_next_part"=>array(
                "cur1_csp2"=>$this->input->post('cur1_csp2'),
                "cur2_csp2"=>$this->input->post('cur2_csp2'),
                "cur3_csp2"=>$this->input->post('cur3_csp2'),
                "cur4_csp2"=>$this->input->post('cur4_csp2'),
                "cur5_csp2"=>$this->input->post('cur5_csp2'),
                "cur6_csp2"=>$this->input->post('cur6_csp2'),
                "cur7_csp2"=>$this->input->post('cur7_csp2'),
                "cur8_csp2"=>$this->input->post('cur8_csp2'),
                "cur9_csp2"=>$this->input->post('cur9_csp2'),
                "cur10_csp2"=>$this->input->post('cur10_csp2'),
                "cur11_csp2"=>$this->input->post('cur11_csp2'),
                "cur12_csp2"=>$this->input->post('cur12_csp2'),
                "cur13_csp2"=>$this->input->post('cur13_csp2'),
                "cur14_csp2"=>$this->input->post('cur14_csp2'),
                "cur15_csp2"=>$this->input->post('cur15_csp2'),
                "cur16_csp2"=>$this->input->post('cur16_csp2'),
                "cur1_csp3"=>$this->input->post('cur1_csp3'),
                "cur2_csp3"=>$this->input->post('cur2_csp3'),
                "cur3_csp3"=>$this->input->post('cur3_csp3'),
                "cur4_csp3"=>$this->input->post('cur4_csp3'),
                "cur5_csp3"=>$this->input->post('cur5_csp3'),
                "cur6_csp3"=>$this->input->post('cur6_csp3'),
                "cur7_csp3"=>$this->input->post('cur7_csp3'),
                "cur8_csp3"=>$this->input->post('cur8_csp3'),
                "cur9_csp3"=>$this->input->post('cur9_csp3'),
                "cur10_csp3"=>$this->input->post('cur10_csp3'),
                "cur11_csp3"=>$this->input->post('cur11_csp3'),
                "cur12_csp3"=>$this->input->post('cur12_csp3'),
                "cur13_csp3"=>$this->input->post('cur13_csp3'),
                "cur14_csp3"=>$this->input->post('cur14_csp3'),
                "cur15_csp3"=>$this->input->post('cur15_csp3'),
                "cur16_csp3"=>$this->input->post('cur16_csp3'),
                "redscope_remarks"=>$this->input->post('redscope_remarks'),
                "csp1_remarks"=>$this->input->post('csp1_remarks'),
                "csp2_remarks"=>$this->input->post('csp2_remarks'),
                "csp3_remarks"=>$this->input->post('csp3_remarks'),
                "entered_by"=>$this->input->post('entered_by'),
                "obj1_cp"=>$this->input->post('obj1_cp'),
                "obj2_cp"=>$this->input->post('obj2_cp'),
                "obj3_cp"=>$this->input->post('obj3_cp'),
                "obj4_cp"=>$this->input->post('obj4_cp'),
                "obj5_cp"=>$this->input->post('obj5_cp'),
                "obj6_cp"=>$this->input->post('obj6_cp'),
                "obj7_cp"=>$this->input->post('obj7_cp'),
                "obj8_cp"=>$this->input->post('obj8_cp'),
                "obj9_cp"=>$this->input->post('obj9_cp'),
                "obj10_cp"=>$this->input->post('obj10_cp'),
                "obj11_cp"=>$this->input->post('obj11_cp'),
                "obj12_cp"=>$this->input->post('obj12_cp')
               ),

               "addexamination"=>array(

                  "dialysis_con"=>$this->input->post('dialysiscon'),

                  "dialysis_drop"=>$drop,

                  "confirm_flag"=>$cflag,
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

                  "fspe1"=>$this->input->post('fspe1'),

                  "fspe2"=>$this->input->post('fspe2'),

                  "fspe3"=>$this->input->post('fspe3'),

                  "fspe4"=>$this->input->post('fspe4'),

                  "fspe5"=>$this->input->post('fspe5'),

                  "fspe6"=>$this->input->post('fspe6'),

                  "fspe7"=>$this->input->post('fspe7'),

                  "fspe8"=>$this->input->post('fspe8'),

                  "fspe9"=>$this->input->post('fspe9'),

                  "fspe10"=>$this->input->post('fspe10'),

                  "fspe11"=>$this->input->post('fspe11'),

                  "fspe12"=>$this->input->post('fspe12'),

                  "fspe13"=>$this->input->post('fspe13'),

                  "fspe14"=>$this->input->post('fspe14'),

                  "fspe15"=>$this->input->post('fspe15'),

                  "fspe16"=>$this->input->post('fspe16'),

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

            $getresult=$this->Examination_model->savehistorymodel($data);

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
           
            $getresult=$this->Examination_model->saveeyepartsmodel($data);


    

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

            $getresult=$this->Examination_model->savemedhistorymodel($data);

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
            $getresult=$this->Examination_model->savediahistorymodel($data);
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
        if($this->input->post('examination_id')>0)
        {
            $exid=$this->input->post('examination_id');
            $getresult=$this->Examination_model->Get_Showdata_Dia($this->input->post('examination_id'));
            if($getresult)
            {
                $sl=1;
                $addrowdata='';
                $html='<table class="table table-bordered table-hover"><thead><tr><th>SL NO</th><th>Diagnosis</th><th>Department</th><th>Eye</th></tr></thead><tbody>';
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
                       $html.='<tr><td>'.$sl.'</td><td>'.$datadia['dianame'].'</td><td>'.$datadia['dename'].'</td><td>'.$datadia['eye'].'</td></tr>'; 
                       $addrowdata.='<tr><td>'.$datadia['dianame'].'</td><td style="display:none;">'.$datadia['dename'].'<input type="hidden" class="form-control" id="diagnosiss_id_'.$sl.'" name="diagnosiss_id[]" value="'.$datadia['diagnosis_id'].'"><input type="hidden" class="form-control" id="dia_ex_id_'.$sl.'" name="dia_ex_id[]" value="'.$exid.'"></td>
                          <td><select class="form-control" name="diaeye[]" id="diaeye_'.$sl.'"><option value="BE" '.$bee.'>BE</option><option value="LE" '.$lee.'>LE</option><option value="RE" '.$ree.'>RE</option></select></td><td><a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">
                            <button class="btn btn-danger btnDelete btn-sm"><i class="la la-trash"></i></button></a></td></tr>';
                       $sl++;
                    }
                $html.='</tbody></table>';

                
                echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$html,'addrowdata'=>$addrowdata,'addsl'=>$sl,'rem'=>$datadia['remarks'],'error'=>'','error_message' =>''));
            }
        }
   }

   public function getmedicineinstruction()

   {    

            $getresult=$this->Examination_model->getmedicineinstruction($this->input->post('val'),$this->input->post('catid'));

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

            $getcomp=$this->Examination_model->expgetcomplaintsdata($var_array);

            $getmed=$this->Examination_model->getmedhis($var_array);

            $getopth=$this->Examination_model->getopth($var_array);

            $getdoctorprescription=$this->Examination_model->getdoctormedicinemodel($var_array);
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

               

                $docc='<button  type="button" onclick="printdata()" class="btn btn-icon btn-info mr-1 mb-1"><i class="la la-print"></i></button><div class="table-responsive"><table class="table table-bordered table-hover"><thead><tr><th>SL NO</th><th>Drug Name</th><th>Instruction</th><th>No Of Days</th><th>Qty</th><th style="display:none;">Start Date</th><th style="display:none;">End Date</th><th>Eye</th></tr></thead><tbody>';

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

                    $docc.='<tr><td>'.$sl.'</td><td>'.$drugname.'</td><td>'.$data['instruction'].'</td><td>'.$data['nodays'].'</td><td>'.$data['qty'].'</td><td style="display:none;">'.$data['sdate'].'</td><td style="display:none;">'.$data['tdate'].'</td><td>'.$data['med_eye'].'</td></tr>';

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



            $getdoctorprescription=$this->Examination_model->getdoctormedicinemodel($var_array);
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
                         $htmllj.='<select class="form-control" id="instruction_'.$sl.'" name="instruction[]" >';
                        foreach ($medinss as $dattamed) {
                            $selmm='';
                            if($dattamed['name']==$data['instruction'])
                            {
                                $selmm='selected';
                            }
                           $htmllj.='<option value="'.$dattamed['name'].'" '.$selmm.'>'.$dattamed['name'].'</option>';
                        }
                         $htmllj.='</select>';
                    }

                    if($data['med_action']==1)
                    {
                        $htmllj='<textarea class="form-control" id="instruction_'.$sl.'" name="instruction[]">'.$data['instruction'].'</textarea>';
                    }

                    $docc.='<tr><td>'.$med.'</td>

                                <td>

                                 <input type="hidden" class="form-control" id="medicine_id_'.$sl.'" name="medicine_id[]" value="'.$data['medicine_id'].'">

                                 '.$htmllj.'<span id="search_result'.$sl.'"></span>

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

                                <td>

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

             $this->Examination_model->print_billgen($key,$pid,$paid,$this->session->userdata('office_id'));

             

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
                   'date_on'=>$this->input->post('sur_date'),
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
                'date_on'=>$this->input->post('las_date'),
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
            'date_on'=>$this->input->post('inj_date'),
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
                $getresult=$this->Examination_model->com_savetreatmentplanmdl($data);
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

            $getresult=$this->Examination_model->savetreatmentplanmdl($data);

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
      $checkingpat=$this->Examination_model->checkingalreadysaved_Pat($this->input->post('patient_registration_id'));
      if($checkingpat)
      {
        $count_pa=$checkingpat[0]['cnt'];
        if($count_pa>0)
        {
            echo json_encode(array('msg' =>'','error'=> 'This Patient Already Updated in optometry Login.Please go to back','error_message' =>''));exit;
        }
      }
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

            $getresult=$this->Examination_model->saveexaminationmodel($data);

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
 
           $getresult=$this->Examination_model->getallsegmentlistdatamdlnew($var_array);
 
          
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

       $getresult=$this->Examination_model->getallsegmentlistdatamdlnormal($var_array);

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

          $getresult=$this->Examination_model->getallsegmentlistdatamdl($var_array);

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

          $getsaveddata=$this->Examination_model->getsavesegments($this->input->post('key'));

          $getresult=$this->Examination_model->geteyepartsegments($var_array);

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
                                        $getresult_child=$this->Examination_model->geteyepartssegmentdetailsmdl($anti['eye_segment_id']);
                                        if($getresult_child)
                                        {
                                          //  $an=''; 
                                            foreach ($getresult_child as $childseg) 
                                            {
                                                $an='';
                        $getsaveddata_res=$this->Examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],1);
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
                                                $getsaveddata_res=$this->Examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],2);
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
                                        $getresult_child=$this->Examination_model->geteyepartssegmentdetailsmdl($pos['eye_segment_id']);
                                        if($getresult_child)
                                        {
                                            foreach ($getresult_child as $childseg) 
                                            {
                        $an='';
                        $getsaveddata_res=$this->Examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],1);
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
                        $getsaveddata_res=$this->Examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],2);
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
                                        $getresult_child=$this->Examination_model->geteyepartssegmentdetailsmdl($pos['eye_segment_id']);
                                        if($getresult_child)
                                        {
                                            foreach ($getresult_child as $childseg) 
                                            {
                        $an='';
                        $getsaveddata_res=$this->Examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],1);
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
                        $getsaveddata_res=$this->Examination_model->getsavesegments_new_Module($this->input->post('key'),$childseg['eye_mapping_segment_id'],2);
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

          $getresult=$this->Examination_model->geteyepartssegmentdetailsmdl($segmentid);

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

         // $var_array=array($key,$this->session->userdata('office_id'));

         // $chk_duplication=$this->Category_model->checkingval($var_array);

         // if($chk_duplication[0]['cnt']==0)

         // {

            

            $data=$this->fetch_data();

            if($this->input->post('doc_examination_id'))

           {

             if($this->input->post('actionflagg')==1)

             {

                

             }

             else

             {

                if($this->input->post('followup'))

                {

                    $d_date=$this->input->post('d_date');

                    $this->load->model('Patients_registration_model');

                    $datfa=$this->folfetch_data();

                    $this->Patients_registration_model->savefoldata($datfa);

                 }

             }

              

           }

            $getresult=$this->Examination_model->updateexaminationmodel($data,$edit_id);

            if($getresult)

            {
                if($this->input->post('doc_action')==1)
                {
                    $getresult_doctcom=$this->Examination_model->checkingalreadyupdatedornot($edit_id);
                    if($getresult_doctcom)
                    {
                        if($getresult_doctcom[0]['doctor_completed_datetime'])
                        {

                        }
                        else 
                        {
                            $this->Examination_model->updatedcomcomdatetime($edit_id);
                        }
                    }
                    else 
                    {
                        $this->Examination_model->updatedcomcomdatetime($edit_id);
                    }
                }


               echo json_encode(array('msg' =>'Updated Successfully','error'=>'','error_message' =>''));

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

            $getresult=$this->Examination_model->getexaminationindividualdatafromdashboard($var_array,$did);



           

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

            $getresult=$this->Examination_model->getexaminationindividualdata($var_array);

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





                  if($data['confirm_flag']==0)

                  {

                    $btnfn='<td><button onclick=editdata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td><td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                  }

                  else

                  {

                    $btnfn='<td><button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button></td><td><button type="button" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-lock"></i></button></td>';

                  }

                   if($doc_exam>0)

                   {

                    $btnfn='<td><button onclick=editdata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="la la-pencil"></i></button></td><td><button onclick=deletedata('.$data['examination_id'].')  type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="la la-trash"></i></button></td>';

                   }



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

            $getresult=$this->Examination_model->getallmedtemp($var_array);

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

            $getresult=$this->Examination_model->getexaminationindividualdatsa($var_array,$doc_new_con);

            if($getresult)

            { 

               $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="tableid"><thead></tr><th>SL No</th><th>Token No</th><th>Optometrist Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor ID</th><th>Print</th></tr></thead><tbody>';

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
                    $docref='';
                  
                    $sql = "select doc_ref_name,doc_mob from patient_registration where  patient_registration_id = $patient_registration_id";
                    $result_row=$this->db->query($sql); 
                    $res= $result_row->result_array ();
                    if($res)
                    {
                        $docreft=$res[0]['doc_ref_name'];
                        $doc_mob=$res[0]['doc_mob'];
                        if($docreft)
                        {
                         $docref="<br/><r style='color:#ff9149;'>Doctor Referral Name:$docreft ,Doctor Referral  Contact No:$doc_mob</r>";
                        }
                    }
                       
                    $p_description=$this->db->select('description')
                         ->from('patient_appointment')
                         ->where(array('patient_appointment_id'=>$data['patient_appointment_id']))
                         ->get()->row()->description;

                         $des_sec_con='';
						
						if($p_description)
						{
							$des_sec_con='<marquee onmouseover="this.stop();" onmouseout="this.start();"><p style="color:#c2185b;font-weight: bold;">'.$p_description.'</p></marquee>';
						}

                       
                    $token_no=$this->db->select('token_no')
                         ->from('patient_appointment')
                         ->where(array('patient_appointment_id'=>$data['patient_appointment_id']))
                         ->get()->row()->token_no;

                    $html.='<tr><td>'.$i.'</td><td>'.$token_no.'</td><td>'.$data['opthdate'].'</td><td><a target="_blank" onclick=printdataexamination('.$data['patient_registration_id'].','.$data['patient_appointment_id'].','.$data['examination_id'].',2) >'.$data['pateint_name'].'</a>'.$dia.' '.$sc.' '.$docref.' '.$des_sec_con.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td></tr>';

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

                 $getresult=$this->Examination_model->getexaminationindividualdatsaexdoc($var_array,$doc_new_con);

            }

            else

            {

                $fl=1;

               $getresult=$this->Examination_model->getexaminationindividualdatsaex($var_array);

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

               $html='<div class="table-responsive"><table class="table table-bordered table-hover" id="'.$tab.'"><thead></tr><th>SL No</th><th>Preview</th><th>Token No</th><th>Optometrist Date</th><th>Patient Name</th><th>MRD NO</th><th>Age/YY MM</th><th>Mobile No</th><th>Doctor ID</th><th>Print</th>'.$nwpr.'<th>Attachment</th><th>Cross Referral</th></tr></thead><tbody>';

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

                            $token_no=$this->db->select('token_no')
                         ->from('patient_appointment')
                         ->where(array('patient_appointment_id'=>$data['patient_appointment_id']))
                         ->get()->row()->token_no;

                         $p_description=$this->db->select('description')
                         ->from('patient_appointment')
                         ->where(array('patient_appointment_id'=>$data['patient_appointment_id']))
                         ->get()->row()->description;

                         $des_sec_con='';
						
						if($p_description)
						{
							$des_sec_con='<marquee onmouseover="this.stop();" onmouseout="this.start();"><p style="color:#c2185b;font-weight: bold;">'.$p_description.'</p></marquee>';
						}
$mrrd=$data['mrdno'];
                        $previewbtn="<button type='button'  onclick=\"search_patientsheet('$mrrd');\" class='btn btn-primary'><i class='la la-eye'></i></button>";
                       
if($utype==3)
{
    if($typecond==1)
    {
                          $patne=$data['pateint_name'];
                          $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
                         if($host_tvm=='sriganapathi' || $host_tvm=='akg' || $host_tvm=='pefkemr')
                         {
                            $patne=$chkvalfd;
                         }
        $html.='<tr><td>'.$i.'</td><td>'.$previewbtn.'</td><td>'.$token_no.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$patne.' '.$des_sec_con.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'<td>'.$att.'</td><td></td></tr>';
    }
    else
    {
         $html.='<tr><td>'.$i.'</td><td>'.$previewbtn.'</td><td>'.$token_no.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$chkvalfd.'  '.$dia.' '.$sc.' '.$des_sec_con.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'<td>'.$att.'</td><td></td></tr>';
    }

}
else
{
    $html.='<tr><td>'.$i.'</td><td>'.$previewbtn.'</td><td>'.$token_no.'</td><td>'.$data['opthdate'].'  '.$btmn.'</td><td>'.$chkvalfd.'  '.$dia.' '.$sc.' '.$des_sec_con.'</td><td '.$newclr.'>'.$data['mrdno'].'</td><td>'.$gen.''.$data['ageyy'].''.$data['agemm'].'</td><td>'.$data['mobileno'].'</td><td>'.$data['doctorname'].'</td><td><button type="button" class="btn btn-danger" onclick="examinationprint('.$data['examination_id'].')"><i class="la la-print"></i></button></td>'.$nwpri.'<td>'.$att.'</td>'.$crossreff.'</tr>';
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

            $getresult=$this->Examination_model->getexaminationindividualdatsaexdocvis($var_array);

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
 $eyepart='';
      $this->form_validation->set_rules('getid', 'Delete ID', 'trim|required|min_length[1]|max_length[100]|numeric');

       if($this->form_validation->run() == TRUE)

       {

            $edit_id=trim(htmlentities($this->input->post('getid')));

            $var_array=array($edit_id,$this->session->userdata('office_id'));

            $var_arrayy=array($this->session->userdata('office_id'));

        

            $getmastertable=$this->Examination_model->getsavedatamodel($var_array);
            $getmastertable2=$this->Examination_model->examination_next_part($edit_id);

            $geteyecompdata=$this->Examination_model->getallcomp($var_arrayy);

            $geteyecompsaveddata=$this->Examination_model->geteyecompsaveddatamodel($edit_id);

            $var_array_eye=array(1,$this->session->userdata('office_id'));
	        $dataleft_eye=$this->Common_model->Geteyeparticular($var_array_eye);
          
	        $dataright_eye=$this->Common_model->Geteyeparticular_com(2,$this->session->userdata('office_id'));

            if($getmastertable)

            {

                $var_array_child=array($edit_id);

                $getdetailsdata=$this->Examination_model->Getdetailstable($var_array_child);

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

                     $dataright_eye=$this->Common_model->Geteyeparticular_com_con(2,$datae['eye_complaints_id'],$this->session->userdata('office_id'));
                   
                     $opryt='';
                     if($dataright_eye)
                     {
                        foreach ($dataright_eye as $dataryt)
                        {
                             $selrytt='';
                            $geteyecompsaveddata_new=$this->Examination_model->geteyecompsaveddatamodel_neweyeparti($edit_id,$datae['eye_complaints_id'],$dataryt['eye_details_id'],1);
                            if($geteyecompsaveddata_new)
                            {
                                if($geteyecompsaveddata_new[0]['righteye']==$dataryt['eye_details_id'])
                                {
                                    $selrytt='selected';
                                }
                            }
                            $opryt.='<option value="'.$dataryt['eye_particular_id'].'"  '.$selrytt.'>'.$dataryt['name'].'</option>';
                        }
                     }

                     $oplft='';
                     $dataleft_eye=$this->Common_model->Geteyeparticular_com_con(1,$datae['eye_complaints_id'],$this->session->userdata('office_id'));
                     if($dataleft_eye)
                     {
                        foreach ($dataleft_eye as $datalyt)
                        {
                           
                            $selrytt='';
                            $geteyecompsaveddata_new=$this->Examination_model->geteyecompsaveddatamodel_neweyeparti($edit_id,$datae['eye_complaints_id'],$datalyt['eye_details_id'],2);
                            if($geteyecompsaveddata_new)
                            {
                                if($geteyecompsaveddata_new[0]['lefteye']==$datalyt['eye_details_id'])
                                {
                                    $selrytt='selected';
                                }
                            }
                            $oplft.='<option value="'.$datalyt['eye_particular_id'].'"  '.$selrytt.'>'.$datalyt['name'].'</option>';
                        }
                     }

                     


                     $eyepart.=' <tr>

                                   <td style="display:flex;">

                                   <input type="hidden" name="eye_complaints_id[]" value="'.$datae['eye_complaints_id'].'" class="form-control">
                                   <select style="width:100%;" class="form-control select2" multiple="multiple" name="righteye[]" id="ryteye_'.$datae['eye_complaints_id'].'">
                                   '.$opryt.'</select>
                                  
                                   <span onclick="getmodaladdparticular('.$datae['eye_complaints_id'].',2)" style="padding: 6px;height: 28px;margin-top: 8px;cursor:pointer;" class="badge badge badge-success float-right"><i  class="la la-plus-circle"></i></span></td>

                                   <td style="background: #e0e0e057;">'.$datae['name'].'</td>

                                   <td style="display:flex;">
                                   <select style="width:100%;" class="form-control select2" multiple="multiple" name="lefteye[]" id="lfteye_'.$datae['eye_complaints_id'].'">
                                   '.$oplft.'</select> <span onclick="getmodaladdparticular('.$datae['eye_complaints_id'].',1)" style="padding: 6px;height: 28px;margin-top: 8px;cursor:pointer;" class="badge badge badge-success float-right"><i  class="la la-plus-circle"></i></span>
                              </td>

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

                echo json_encode(array('msg'=>'Deleted Successfully','mastertable'=>$getmastertable,'mastertable2'=>$getmastertable2,'eyepart'=>$eyepart,'examinationcharges'=>$html,'countchk'=>$sl,'error'=>'','error_message' =>''));

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

        

            $getresult=$this->Examination_model->deletedata($delete_id);

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
            $doc_examination_id=trim(htmlentities($this->input->post('doc_examination_id')));
            $op_advice=trim(htmlentities($this->input->post('op_advice')));
            $updateid=$this->Examination_model->updateopticalexamination($patid);
            if($updateid)
            {
                $this->Examination_model->update_op_advice_newcol($doc_examination_id,$op_advice);
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
   public function Geteyeparticulardet()
   {
       $doc_examination_id=$this->input->post('doc_examination_id');
       
   }
    public function examinationnewprint()

    {

       

        $this->Examination_model->printnew_bill($this->input->post('examinationid'),$this->session->userdata('office_id'));

    }

//INR4
    public function examinationprint()

    {

       
        $this->Examination_model->print_bill($this->input->post('examinationid'),$this->input->post('chkcomplaintsout'),$this->input->post('chkopthalmicsout'),$this->input->post('chkmedicalout'),$this->input->post('chkeyepartout'),$this->input->post('addmedicinessout'),$this->input->post('investigationchkout'),$this->input->post('preliminary_exout'),$this->input->post('vsisonreadingsout'),$this->input->post('curspecout'),$this->input->post('objectchkout'),$this->input->post('arkkchkout'),$this->input->post('manchkout'),$this->input->post('specchkout'),$this->input->post('fspecchkout'),$this->input->post('conlchkout'),$this->input->post('pmtchkout'),$this->input->post('getexamination_treatmentplan_c'),$this->input->post('addEyePart_c'),$this->session->userdata('office_id'));
    }
    public function examinationprint_opad()

    {

       
        $this->Examination_model->print_bill_opad($this->input->post('examinationid'),$this->session->userdata('office_id'));
    }

    public function examinationprint_preview()
    {
        $postvalues = '';
        for ($x = 1; $x <= 22; $x++) {
            $postvalues .= $this->input->post('chkpostout' . $x) . ',';
        }
       
      $this->Examination_model->print_bill_preview($this->input->post('examinationid'), rtrim($postvalues, ','), $this->session->userdata('office_id'));

    }

    public function printcertificated()

    {

        $this->Examination_model->printcertificate($this->input->post('examin_id'),$this->session->userdata('office_id'));

    }
    
//getexaminationpreview
// INR4

public function getexaminationpreview()

    {
        error_reporting(0);
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
          $examination_masters2=$this->db->get_where('examination_next_part',"examination_id=$examinationid")->row();
            log_message('info', 'INR4');
            log_message('info', $examinationid);
// INR4
 $single_text_value="select family_history as family_history, current_meditation as current_meditation,drug_history as drug_history, vdiagnosis as vdiagnosis ,ant_lefteye as ant_lefteye , ant_righteye as ant_righteye ,bfit as bfit, vcontent as vcontent from examination where examination_id=? ";
 $single_text_value_result=$this->db->query($single_text_value,$examinationid);
 $single_text_value_reading= $single_text_value_result->result_array()[0];
 $single_text_value_readings=$this->Examination_model->checkValid($single_text_value_reading);

 // Added for removing empty data 
$vision_sql="select  vis1, vis2, vis3, vis4, vis5, vis6, vis7, vis8, vis9, vis10 from examination where examination_id=? ";
 $vision_result=$this->db->query($vision_sql,$examinationid);
 $vision_reading= $vision_result->result_array()[0];
 $vision_readings=$this->Examination_model->checkValid($vision_reading);


$preliminary_sql="select  pre1, pre2, pre3, pre4, pre5, pre6, pre7, pre8, pre9, pre10,pre11,pre12 from examination where examination_id=? ";
 $preliminary_result=$this->db->query($preliminary_sql,$examinationid);
 $preliminary_reading= $preliminary_result->result_array()[0];
 $preliminary_readings=$this->Examination_model->checkValid($preliminary_reading);



$curl_sql="select  cur1, cur2, cur3, cur4, cur5, cur6, cur7, cur8, cur9, cur10,cur11,cur12,cur13,cur14,cur15,cur16 from examination where examination_id=? ";
 $curl_result=$this->db->query($curl_sql,$examinationid);
 $curl_reading= $curl_result->result_array()[0];
 $curl_readings=$this->Examination_model->checkValid($curl_reading);

 $curl_sql="select  cur1_csp2, cur2_csp2, cur3_csp2, cur4_csp2, cur5_csp2, cur6_csp2, cur7_csp2, cur8_csp2, cur9_csp2, cur10_csp2,cur11_csp2,cur12_csp2,cur13_csp2,cur14_csp2,cur15_csp2,cur16_csp2 from examination_next_part where examination_id=? ";
 $curl_result=$this->db->query($curl_sql,$examinationid);
 $curl_reading= $curl_result->result_array()[0];
 $curl_readings2=$this->Examination_model->checkValid($curl_reading);

 $curl_sql="select  cur1_csp3, cur2_csp3, cur3_csp3, cur4_csp3, cur5_csp3, cur6_csp3, cur7_csp3, cur8_csp3, cur9_csp3, cur10_csp3,cur11_csp3,cur12_csp3,cur13_csp3,cur14_csp3,cur15_csp3,cur16_csp3 from examination_next_part where examination_id=? ";
 $curl_result=$this->db->query($curl_sql,$examinationid);
 $curl_reading= $curl_result->result_array()[0];
 $curl_readings3=$this->Examination_model->checkValid($curl_reading);

$obj_sql="select  obj1, obj2, obj3, obj4, obj5, obj6, obj7, obj8, obj9, obj10,obj11,obj12,obj13,obj14,obj15 from examination where examination_id=? ";
$obj_result=$this->db->query($obj_sql,$examinationid);
$obj_reading= $obj_result->result_array()[0];
$obj_readings=$this->Examination_model->checkValid($obj_reading);

$obj_sql="select  obj1_cp, obj2_cp, obj3_cp, obj4_cp, obj5_cp, obj6_cp, obj7_cp, obj8_cp, obj9_cp, obj10_cp,obj11_cp,obj12_cp from examination_next_part where examination_id=? ";
$obj_result=$this->db->query($obj_sql,$examinationid);
$obj_reading= $obj_result->result_array()[0];
$obj_readings1=$this->Examination_model->checkValid($obj_reading);


$con_sql="select  con1, con2, con3, con4, con5, con6, con7, con8, con9, con10,con11,con12,con13,con14,con15,con16 from examination where examination_id=? ";
 $con_result=$this->db->query($con_sql,$examinationid);
 $con_reading= $con_result->result_array()[0];
 $con_readings=$this->Examination_model->checkValid($con_reading);
//INR4
 $pmt_sql="select  pmt1, pmt2, pmt3, pmt4, pmt5, pmt6, pmt7, pmt8, pmt9, pmt10,pmt11,pmt12,pmt13,pmt14,pmt15,pmt16 from examination where examination_id=? ";
 $pmt_result=$this->db->query($pmt_sql,$examinationid);
 $pmt_reading= $pmt_result->result_array()[0];
 $pmt_readings=$this->Examination_model->checkValid($pmt_reading);


$spe_sql="select  spe1, spe2, spe3, spe4, spe5, spe6, spe7, spe8, spe9, spe10,spe11,spe12,spe13,spe14,spe15 from examination where examination_id=? ";
 $spe_result=$this->db->query($spe_sql,$examinationid);
 $spe_reading= $spe_result->result_array()[0];
 $spe_readings=$this->Examination_model->checkValid($spe_reading);

 $fspe_sql="select  fspe1, fspe2, fspe3, fspe4, fspe5, fspe6, fspe7, fspe8, fspe9, fspe10,fspe11,fspe12,fspe13,fspe14,fspe15,fspe16 from examination where examination_id=? ";
 $fspe_result=$this->db->query($fspe_sql,$examinationid);
 $fspe_reading= $fspe_result->result_array()[0];
 $fspe_readings=$this->Examination_model->checkValid($fspe_reading);

 

$man_sql="select  man1, man2, man3, man4, man5, man6, man7, man8, man9, man10 from examination where examination_id=? ";
 $man_result=$this->db->query($man_sql,$examinationid);
 $man_reading= $man_result->result_array()[0];
 $man_readings=$this->Examination_model->checkValid($man_reading);


$ar_sql="select  ar1, ar2, ar3, ar4, ar5, ar6, ar7, ar8, ar9, ar10 from examination where examination_id=? ";
 $ar_result=$this->db->query($ar_sql,$examinationid);
 $ar_reading= $ar_result->result_array()[0];
 $ar_readings=$this->Examination_model->checkValid($ar_reading);






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

   $getresult_Diag=$this->Examination_model->Get_Showdata_Dia($examination_masters->examination_id);

    $complaints=$this->db->query("select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where examination_id=$examination_masters->examination_id")->result();



     $ophthalmic_history=$this->db->query("select * from examination_ophthalmic_history inner join ophthalmic_history on examination_ophthalmic_history.ophthalmic_history_id=ophthalmic_history.ophthalmic_history_id where examination_id=$examination_masters->examination_id")->result(); 



     $medical_history=$this->db->query("select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where examination_id=$examination_masters->examination_id")->result(); 



     $eye_comp=$this->db->query("select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=$examination_masters->examination_id group by eye_complaints.eye_complaints_id")->result(); 

// INR4

$addEye_Part= $this->db->query("select righteyeparts as righteyeparts ,lefteyeparts as lefteyeparts,righteyepartscheckbox as righteyepartscheckbox,lefteyepartscheckbox as lefteyepartscheckbox,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id as segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name as content,eye_segment.name as segment_name from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.examination_id =$examination_masters->examination_id")->result(); 

$getexamination_treatmentplan =$this->db->query("select examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id as plan ,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id  inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
where examination_treatmentplan.counseling_id = 1 and examination_treatmentplan.examination_id =$examination_masters->examination_id")->result();

     $var_array=array($examination_masters->examination_id,$this->session->userdata('office_id'));
     $getdoctorprescription=$this->Examination_model->getdoctormedicinemodels($var_array);
     $var_array=array($examination_masters->examination_id);
     $Getdetailstableex=$this->Examination_model->Getdetailstable($var_array);
     $family_history='N/A';
     if($examination_masters->family_history)
     {
        $family_history=$examination_masters->family_history;
     }
     $drug_alergy='N/A';
     if($examination_masters->drug_history)
     {
        $drug_alergy=$examination_masters->drug_history;
     }
     $current_meditation='N/A';
     if($examination_masters->current_meditation)
     {
        $current_meditation=$examination_masters->current_meditation;
     }
     $pdre='N/A';
     if($examination_masters->pdre)
     {
        $pdre=$examination_masters->pdre;
     }
     $le='N/A';
     if($examination_masters->le)
     {
        $le=$examination_masters->le;
     }

     $usage_ex_id='N/A';
     if($examination_masters->usage_ex_id)
     {
        $usage_ex_id=$this->db->get_where('usage_ex',"usage_ex_id=$examination_masters->usage_ex_id")->row()->name;
     }
     $typeoflength_id='N/A';
     if($examination_masters->typeoflength_id)
     {
        $typeoflength_id=$this->db->get_where('typeoflength',"typeoflength_id=$examination_masters->typeoflength_id")->row()->name;
     }
     $coating_id='N/A';
     if($examination_masters->coating_id)
     {
        $coating_id=$this->db->get_where('coating',"coating_id=$examination_masters->coating_id")->row()->name;
     }
     $mm='N/A';
     if($examination_masters->mm)
     {
        $mm=$examination_masters->mm;
     }
     $www='N/A';
     if($examination_masters->www)
     {
        $www=$examination_masters->www;
     }
     $dayss='N/A';
     if($examination_masters->dayss)
     {
        $dayss=$examination_masters->dayss;
     }
     $d_date='N/A';
     if($examination_masters->d_date)
     {
        $d_date=date("d-m-Y", strtotime($examination_masters->d_date));
     }
     $sos='Yes';
     if($examination_masters->sos)
     {
        $sos=$examination_masters->sos;
     }
    if($sos==1)
    {
        $sos='NO';
    }
    $opth_user_comments='N/A';
     if($examination_masters->opth_user_comments)
     {
        $opth_user_comments=$examination_masters->opth_user_comments;
     }
     $clinical_advisor='N/A';
     if($examination_masters->clinical_advisor)
     {
        $clinical_advisor=$examination_masters->clinical_advisor;
     }
     $dialysis_cond='Yes';
     if($examination_masters->dialysis_con)
     {
        $dialysis_con=$examination_masters->dialysis_con;
     }
    if($dialysis_con==1)
    {
        $dialysis_cond='NO';
    }
    $dialysis='N/A';
    if($dialysis_con==2)
    {
        if($examination_masters->dialysis_drop)
        {
            $dialysis=$this->db->get_where('dialysis',"dialysis_id=$examination_masters->dialysis_drop")->row()->name;
        }
        
    }
     $vdiagnosis='N/A';
     if($examination_masters->vdiagnosis)
     {
        $vdiagnosis=$examination_masters->vdiagnosis;
     }
     $gen_comp_remarks='N/A';
     if($examination_masters->gen_comp_remarks)
     {
        $gen_comp_remarks=$examination_masters->gen_comp_remarks;
     }
     $gen_opth_remarks='N/A';
     if($examination_masters->gen_opth_remarks)
     {
        $gen_opth_remarks=$examination_masters->gen_opth_remarks;
     }
     $gen_medi_remarks='N/A';
     if($examination_masters->gen_medi_remarks)
     {
        $gen_medi_remarks=$examination_masters->gen_medi_remarks;
     }
     $ant_righteye='N/A';
     if($examination_masters->ant_righteye)
     {
        $ant_righteye=$examination_masters->ant_righteye;
     }
     $ant_lefteye='N/A';
     if($examination_masters->ant_lefteye)
     {
        $ant_lefteye=$examination_masters->ant_lefteye;
     }
     $bfits='No';
     if($examination_masters->bfit)
     {
        $bfit=$examination_masters->bfit;
     }
    if($bfit==1)
    {
        $bfits='Yes';
    }
    $vcontent='N/A';
     if($examination_masters->vcontent)
     {
        $vcontent=$examination_masters->vcontent;
     }
     $specilaity_id='N/A';
     if($examination_masters->specilaity_id)
     {
        $specilaity_id=$this->db->get_where('specilaity',"specilaity_id=$examination_masters->specilaity_id")->row()->name;
     }
    
     $entered_by='N/A';
     if($examination_masters2->entered_by)
     {
        $entered_by=$this->db->get_where('staff',"staff_id=$examination_masters2->entered_by")->row()->name;
     }
     $p_descriptions='N/A';
     $p_description=$this->db->get_where('patient_appointment',"patient_appointment_id=$examination_masters->patient_appointment_id")->row()->description;
     if($p_description)
     {
        $p_descriptions=$p_description;
     }
    

        $showdata='';
        $showdata.='<div class="row powline">';
            $showdata.='<div class="col-md-4">';
                $showdata.='<b><i class="la la-circle text-danger"></i> Patient Description : '.$p_descriptions.'</b><br/>';
                $showdata.='<b><i class="la la-circle text-danger"></i> Consultant : '.$data['doctorname'].'</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Date   : '.date("d-m-Y", strtotime($examination_masters->examination_date)).'</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Family History   : ' . $family_history . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Drug Allergy   : ' . $drug_alergy . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Current Meditation   : ' . $current_meditation . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Opthalmic User Comments   : ' . $opth_user_comments . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Diagnosis   : ' . $vdiagnosis . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Complaints Remarks   : ' . $gen_comp_remarks . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Ophthalmic  Remarks   : ' . $gen_opth_remarks . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Medical Remarks   : ' . $gen_medi_remarks . '</b><br/>';
            $showdata.='</div>';

            $showdata.='<div class="col-md-4">';
                $showdata.='<b><i class="la la-circle text-danger"></i> PD RE : '.$pdre.'</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> LE   : '.$le.'</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Usage   : ' . $family_history . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Type Of Lens   : ' . $typeoflength_id . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Coating   : ' . $coating_id . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Clinical Advise   : ' . $clinical_advisor . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Anterior Segment left eye   : ' . $ant_lefteye . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Anterior Segment Right eye   : ' . $ant_righteye . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Fit   : ' . $bfits . '<b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Specilaity Opinion   : ' . $specilaity_id . '</b><br/>';
            $showdata.='</div>';

            $showdata.='<div class="col-md-4">';
                $showdata.='<b><i class="la la-circle text-danger"></i> Follow Up MM : '.$mm.'</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Follow Up www   : '.$www.'</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Follow Up Days   : ' . $dayss . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Follow Date   : ' . $d_date . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> SOS   : ' . $sos . '<b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Dilation   : ' . $dialysis_cond . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Dilation Drops   : ' . $dialysis . '</b><br/>';
                $showdata.='<b> <i class="la la-circle text-danger"></i> Vision Print Content   : ' . $vcontent . '</b><br/>';
                $showdata.='<b style="color:blue;"> <i class="la la-circle text-danger"></i> Entered By   : ' . $entered_by . '</b><br/>';
               
            $showdata.='</div>';

        $showdata.='</div><hr/>';

        $showdata.='<div class="row powline">';
            if($complaints)  //1st  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="1sec_chk" id="1sec_chk"  value="1" > Presenting Complaint</h4>';
                $showdata.='<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Complaints</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach($complaints as $comp)
                                {
                                    $lefteye='';
                                    $righteye='';
                                    if($comp->eye_left==1)
                                    {
                                      $lefteye='<b>Left Eye</b> '.$comp->remarks;
                                    }
                                    if($comp->eye_right==1)
                                    {
                                       $righteye='<b>Right Eye</b> '.$comp->remarks;
                                    }
                                    $showdata.='<tr><td>'.$comp->name.'</td><td>'.$lefteye.' '.$righteye.'</td></tr>';
                                }
                    $showdata.='</tbody>
                            </table>';
                $showdata.='</div>';
            } //1st  section end

            if($ophthalmic_history)  //2nd  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="2sec_chk" id="2sec_chk"  value="1" > Ophthalmic History</h4>';
                $showdata.='<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach($ophthalmic_history as $opth)
                                {
                                    $lefteye='';
                                    $righteye='';
                                    if($opth->eye_left==1)
                                    {
                                      $lefteye='<b>Left Eye</b> '.$opth->remarks;
                                    }
                                    if($opth->eye_right==1)
                                    {
                                       $righteye='<b>Right Eye</b> '.$opth->remarks;
                                    }
                                    $showdata.='<tr><td>'.$opth->name.'</td><td>'.$lefteye.' '.$righteye.'</td></tr>';
                                }
                    $showdata.='</tbody>
                            </table>';
                $showdata.='</div>';
            } //2nd  section end
            if($medical_history)  //3rd  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="3sec_chk" id="3sec_chk"  value="1" > Medical History</h4>';
                $showdata.='<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach($medical_history as $medi)
                                {
                                    $showdata.='<tr><td>'.$medi->name.'</td><td>'.$medi->remarks.'</td></tr>';
                                }
                    $showdata.='</tbody>
                            </table>';
                $showdata.='</div>';
            } //3rd  section end
            if($preliminary_readings)  //4th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="4sec_chk" id="4sec_chk"  value="1" > Preliminary Examination</h4>';
                $showdata.=' <table  class="table table-bordered table-hover">
                            <tbody><tr><th>Date</th><th class="tab_tit">NCT</th><th class="tab_tit">GAT</th><th class="tab_tit">CCT</th><th class="tab_tit">Angle</th>
                        <th class="tab_tit">Color Vision</th> <th class="tab_tit">Pupil</th></tr><tr><td class="tab_tit">Right Eye</td><td style="padding:5px;" align="center">'.$examination_masters->pre1.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre2.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre3.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre4.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre5.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre6.'</td></tr><tr><td class="tab_tit">Left Eye</td>
<td style="padding:5px;" align="center">'.$examination_masters->pre7.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre8.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre9.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre10.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre11.'</td><td style="padding:5px;" align="center">'.$examination_masters->pre12.'</td></tr><tr><td colspan="7">Remarks:'.$examination_masters->pre_remarks.'</td></tr>
            </tbody></table>';
                $showdata.='</div>';
            } //4th  section end
            if($vision_readings)  //5th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="5sec_chk" id="5sec_chk"  value="1" > Vision Readings</h4>';
                $showdata.='<table  class="table table-bordered table-hover"><tbody><tr><th></th><th colspan="2" align="center">UCVA</th><th>PH</th><th colspan="2" align="center">BCVA</th>
                </tr><tr><td></td><td>UCDVA</td><td>UCNVA</td><td>PH</td><td>UCDVA</td><td>UCNVA</td></tr><tr><td>Right Eye</td><td style="padding:5px;" align="center">'.$examination_masters->vis1.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->vis2.'</td><td style="padding:5px;" align="center">'.$examination_masters->vis3.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->vis4.'</td><td style="padding:5px;" align="center">'.$examination_masters->vis5.'</td></tr><tr>
                <td>Left Eye</td><td style="padding:5px;" align="center">'.$examination_masters->vis6.'</td><td style="padding:5px;" align="center">'.$examination_masters->vis7.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->vis8.'</td><td style="padding:5px;" align="center">'.$examination_masters->vis9.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->vis10.'</td></tr></tbody></table>';
                $showdata.='</div>';
            } //5th  section end
            if($curl_readings)  //6th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="6sec_chk" id="6sec_chk"  value="1" > Current Spectacle Prescription 1</h4>';
                $showdata.='<table class="table table-bordered table-hover"><tbody><tr><th align="center" class="tab_tit">RE</th>
                <th align="center" class="tab_tit">LE</th></tr><tr><td style="padding: 0px;"><table class="table table-bordered table-hover"><tbody><tr><td></td><td class="tab_tit">SPH</td>
                <td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td  align="center">'.$examination_masters->cur1.'</td>
                <td  align="center">'.$examination_masters->cur2.'</td><td  align="center">'.$examination_masters->cur3.'</td><td  align="center">'.$examination_masters->cur4.'</td>
                </tr><tr><td class="tab_tit">N.V</td><td  align="center">'.$examination_masters->cur5.'</td><td  align="center">'.$examination_masters->cur6.'</td><td align="center">'.$examination_masters->cur7.'</td>
                <td  align="center">'.$examination_masters->cur8.'</td></tr></tbody></table></td><td style="padding: 0px;"><table class="table table-bordered table-hover">
                <tbody style="border-top: 2px solid #fff;"><tr><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td align="center">'.$examination_masters->cur9.' .</td>
                <td  align="center">'.$examination_masters->cur10.'</td><td  align="center">'.$examination_masters->cur11.'</td><td  align="center">'.$examination_masters->cur12.'</td>
                </tr><tr><td  align="center">'.$examination_masters->cur13.' .</td><td  align="center">'.$examination_masters->cur14.'</td><td  align="center">'.$examination_masters->cur15.'</td>
                <td  align="center">'.$examination_masters->cur16.'</td></tr></tbody></table></td></tr></tbody><tbody style="border-top: 2px solid #fff;">
                <tr><td colspan="8" align="center" class="tab_tit">Remarks:'.$examination_masters2->csp1_remarks.'</td>
                </tr></tbody>
                </table>';
                $showdata.='</div>';
            } //6th  section end

            if($curl_readings2)  //7h  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="7sec_chk" id="7sec_chk"  value="1" > Current Spectacle Prescription 2</h4>';
                $showdata.='<table class="table table-bordered table-hover"><tbody><tr><th align="center" class="tab_tit">RE</th>
                <th align="center" class="tab_tit">LE</th></tr><tr><td style="padding: 0px;"><table class="table table-bordered table-hover"><tbody><tr><td></td><td class="tab_tit">SPH</td>
                <td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td  align="center">'.$examination_masters2->cur1_csp2.'</td>
                <td  align="center">'.$examination_masters2->cur2_csp2.'</td><td  align="center">'.$examination_masters2->cur3_csp2.'</td><td  align="center">'.$examination_masters2->cur4_csp2.'</td>
                </tr><tr><td class="tab_tit">N.V</td><td  align="center">'.$examination_masters2->cur5_csp2.'</td><td  align="center">'.$examination_masters2->cur6_csp2.'</td><td align="center">'.$examination_masters2->cur7_csp2.'</td>
                <td  align="center">'.$examination_masters2->cur8_csp2.'</td></tr></tbody></table></td><td style="padding: 0px;"><table class="table table-bordered table-hover">
                <tbody style="border-top: 2px solid #fff;"><tr><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td align="center">'.$examination_masters2->cur9_csp2.' .</td>
                <td  align="center">'.$examination_masters2->cur10_csp2.'</td><td  align="center">'.$examination_masters2->cur11_csp2.'</td><td  align="center">'.$examination_masters2->cur12_csp2.'</td>
                </tr><tr><td  align="center">'.$examination_masters2->cur13_csp2.' .</td><td  align="center">'.$examination_masters2->cur14_csp2.'</td><td  align="center">'.$examination_masters2->cur15_csp2.'</td>
                <td  align="center">'.$examination_masters2->cur16_csp2.'</td></tr></tbody></table></td></tr></tbody><tbody style="border-top: 2px solid #fff;">
                <tr><td colspan="8" align="center" class="tab_tit">Remarks:'.$examination_masters2->csp2_remarks.'</td>
                </tr></tbody>
                </table>';
                $showdata.='</div>';
            } //7h  section end
            if($curl_readings3)  //8th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="8sec_chk" id="8sec_chk"  value="1" > Current Spectacle Prescription 3</h4>';
                $showdata.='<table class="table table-bordered table-hover"><tbody><tr><th align="center" class="tab_tit">RE</th>
                <th align="center" class="tab_tit">LE</th></tr><tr><td style="padding: 0px;"><table class="table table-bordered table-hover"><tbody><tr><td></td><td class="tab_tit">SPH</td>
                <td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td  align="center">'.$examination_masters2->cur1_csp3.'</td>
                <td  align="center">'.$examination_masters2->cur2_csp3.'</td><td  align="center">'.$examination_masters2->cur3_csp3.'</td><td  align="center">'.$examination_masters2->cur4_csp3.'</td>
                </tr><tr><td class="tab_tit">N.V</td><td  align="center">'.$examination_masters2->cur5_csp3.'</td><td  align="center">'.$examination_masters2->cur6_csp3.'</td><td align="center">'.$examination_masters2->cur7_csp3.'</td>
                <td  align="center">'.$examination_masters2->cur8_csp3.'</td></tr></tbody></table></td><td style="padding: 0px;"><table class="table table-bordered table-hover">
                <tbody style="border-top: 2px solid #fff;"><tr><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td align="center">'.$examination_masters2->cur9_csp3.' .</td>
                <td  align="center">'.$examination_masters2->cur10_csp3.'</td><td  align="center">'.$examination_masters2->cur11_csp3.'</td><td  align="center">'.$examination_masters2->cur12_csp3.'</td>
                </tr><tr><td  align="center">'.$examination_masters2->cur13_csp3.' .</td><td  align="center">'.$examination_masters2->cur14_csp3.'</td><td  align="center">'.$examination_masters2->cur15_csp3.'</td>
                <td  align="center">'.$examination_masters2->cur16_csp3.'</td></tr></tbody></table></td></tr><tbody style="border-top: 2px solid #fff;">
                <tr><td colspan="8" align="center" class="tab_tit">Remarks:'.$examination_masters2->csp3_remarks.'</td>
                </tr></tbody>
                </table>';
                $showdata.='</div>';
            } //8th  section end
            if($obj_readings)  //9th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="9sec_chk" id="9sec_chk"  value="1" > Objective Refraction</h4>';
                $showdata.='<table  class="table table-bordered table-hover"><tbody><tr><th>UD</th><th>SPH</th><th>CYL</th>
                <th>AXIS</th><th>CP</th><th>SPH</th><th>CYL</th><th>AXIS</th></tr><tr><td>RE</td><td style="padding:5px;" align="center">'.$examination_masters->obj1.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->obj2.'</td><td style="padding:5px;" align="center">'.$examination_masters->obj3.'</td><td >RE</td>
                <td style="padding:5px;" align="center">'.$examination_masters->obj4.'</td><td style="padding:5px;" align="center">'.$examination_masters->obj5.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->obj6.'</td></tr><tr><td>LE</td><td style="padding:5px;" align="center">'.$examination_masters->obj7.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->obj8.'</td><td style="padding:5px;" align="center">'.$examination_masters->obj9.'</td>
                <td >LE</td><td style="padding:5px;" align="center">'.$examination_masters->obj10.'</td><td style="padding:5px;" align="center">'.$examination_masters->obj11.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->obj12.'</td></tr><tr><td>IPD</td><td style="padding:5px;" align="center">'.$examination_masters->obj13.'</td>
                <td>PD RE</td><td style="padding:5px;" align="center">'.$examination_masters->obj14.'</td><td>PD LE</td><td style="padding:5px;" align="center">'.$examination_masters->obj15.'</td>
                <td></td><td></td></tr></tbody></table>';
                $showdata.='</div>';
            } //9th  section end
            if($obj_readings1)  //10th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="10sec_chk" id="10sec_chk"  value="1" > Retina Scope</h4>';
                $showdata.='<table  class="table table-bordered table-hover"><tbody><tr><th>DRY</th><th>SPH</th><th>CYL</th>
                <th>AXIS</th><th>WET</th><th>SPH</th><th>CYL</th><th>AXIS</th></tr><tr><td>RE</td><td style="padding:5px;" align="center">'.$examination_masters2->obj1_cp.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters2->obj2_cp.'</td><td style="padding:5px;" align="center">'.$examination_masters2->obj3_cp.'</td><td >RE</td>
                <td style="padding:5px;" align="center">'.$examination_masters2->obj4_cp.'</td><td style="padding:5px;" align="center">'.$examination_masters2->obj5_cp.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters2->obj6_cp.'</td></tr><tr><td>LE</td><td style="padding:5px;" align="center">'.$examination_masters2->obj7_cp.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters2->obj8_cp.'</td><td style="padding:5px;" align="center">'.$examination_masters2->obj9_cp.'</td>
                <td >LE</td><td style="padding:5px;" align="center">'.$examination_masters2->obj10_cp.'</td><td style="padding:5px;" align="center">'.$examination_masters2->obj11_cp.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters2->obj12_cp.'</td></tr><tr>
                <td style="background: #e0e0e057;" class="tab_tit">Remarks</td>
                <td style="padding:5px;" colspan="7">'.$examination_masters2->redscope_remarks.'</td></tr></tbody></table>';
                $showdata.='</div>';
            } //10th  section end
            if($ar_readings)  //11th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="11sec_chk" id="11sec_chk"  value="1" > AR Kerotometry </h4>';
                $showdata.='   <table  class="table table-bordered table-hover"><tbody><tr><th>ARK</th><th>K1</th><th>AXIS</th><th>K2</th>
                <th>AXIS</th></tr><tr><td>RE</td><td style="padding:5px;" align="center">'.$examination_masters->ar1.'</td><td style="padding:5px;" align="center">'.$examination_masters->ar2.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->ar3.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->ar5.'</td></tr><tr>
                <td>LE</td><td style="padding:5px;" align="center">'.$examination_masters->ar6.'</td><td style="padding:5px;" align="center">'.$examination_masters->ar7.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->ar8.'</td><td style="padding:5px;" align="center">'.$examination_masters->ar10.'</td>
                </tr></tbody></table>';
                $showdata.='</div>';
            } //11th   section end
            if($man_readings)  //12th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="12sec_chk" id="12sec_chk"  value="1" > Manual Kerotometry </h4>';
                $showdata.='<table  class="table table-bordered table-hover"><tbody><tr><th>ARK</th><th>K1</th><th>AXIS</th><th>K2</th><th>AXIS</th>
                <th>CYL</th><th>AXIS</th></tr><tr><td>RE</td><td style="padding:5px;" align="center">'.$examination_masters->man1.'</td><td style="padding:5px;" align="center">'.$examination_masters->man2.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->man3.'</td><td>RE</td><td style="padding:5px;" align="center">'.$examination_masters->man4.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->man5.'</td></tr> <tr><td>LE</td><td style="padding:5px;" align="center">'.$examination_masters->man6.'</td>
                <td style="padding:5px;" align="center">'.$examination_masters->man7.'</td><td style="padding:5px;" align="center">'.$examination_masters->man8.'</td>
                <td>LE</td><td style="padding:5px;" align="center">'.$examination_masters->man9.'</td><td style="padding:5px;" align="center">'.$examination_masters->man10.'</td>
                </tr></tbody></table>';
                $showdata.='</div>';
            } //12th   section end
            if($spe_readings)  //13th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="13sec_chk" id="13sec_chk"  value="1" > Undilated Correction </h4>';
                $showdata.='<table class="table table-bordered table-hover"><tr><th colspan="1"></th><th colspan="4">RE</th><th colspan="4">LE</th></tr><tr><td></th><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td>
                <td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td style="padding:5px;" align="center">'.$examination_masters->spe1.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe2.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe3.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->spe4.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe9.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->spe10.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe11.'</td>
               <td style="padding:5px;" align="center">'.$examination_masters->spe12.'</td></tr><tr><td  class="tab_tit">N.V</td><td style="padding:5px;" align="center">'.$examination_masters->spe5.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe6.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe7.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe8.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe13.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe14.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe15.'</td><td style="padding:5px;" align="center">'.$examination_masters->spe16.'</td></tr></table>';
                $showdata.='</div>';
            } //13th   section end
            if($con_readings)  //14th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="14sec_chk" id="14sec_chk"  value="1" > Cyclopedia Correction </h4>';
                $showdata.='<table class="table table-bordered table-hover"><tr><th colspan="1"></th><th colspan="4">RE</th><th colspan="4">LE</th></tr><tr><td></th><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td>
                <td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td style="padding:5px;" align="center">'.$examination_masters->con1.'</td><td style="padding:5px;" align="center">'.$examination_masters->con2.'</td><td style="padding:5px;" align="center">'.$examination_masters->con3.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->con4.'</td><td style="padding:5px;" align="center">'.$examination_masters->con9.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->con10.'</td><td style="padding:5px;" align="center">'.$examination_masters->con11.'</td>
               <td style="padding:5px;" align="center">'.$examination_masters->con12.'</td></tr><tr><td  class="tab_tit">N.V</td><td style="padding:5px;" align="center">'.$examination_masters->con5.'</td><td style="padding:5px;" align="center">'.$examination_masters->con6.'</td><td style="padding:5px;" align="center">'.$examination_masters->con7.'</td><td style="padding:5px;" align="center">'.$examination_masters->con8.'</td><td style="padding:5px;" align="center">'.$examination_masters->con13.'</td><td style="padding:5px;" align="center">'.$examination_masters->con14.'</td><td style="padding:5px;" align="center">'.$examination_masters->con15.'</td><td style="padding:5px;" align="center">'.$examination_masters->con16.'</td></tr></table>';
                $showdata.='</div>';
            } //14th   section end

            if($pmt_readings)  //15th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="15sec_chk" id="15sec_chk"  value="1" > PMT Correction </h4>';
                $showdata.='<table class="table table-bordered table-hover"><tr><th colspan="1"></th><th colspan="4">RE</th><th colspan="4">LE</th></tr><tr><td></th><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td>
                <td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td style="padding:5px;" align="center">'.$examination_masters->pmt1.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt2.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt3.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->pmt4.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt9.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->pmt10.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt11.'</td>
               <td style="padding:5px;" align="center">'.$examination_masters->pmt12.'</td></tr><tr><td  class="tab_tit">N.V</td><td style="padding:5px;" align="center">'.$examination_masters->pmt5.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt6.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt7.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt8.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt13.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt14.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt15.'</td><td style="padding:5px;" align="center">'.$examination_masters->pmt16.'</td></tr></table>';
                $showdata.='</div>';
            } //15th   section end
            if($fspe_readings)  //16th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="16sec_chk" id="16sec_chk"  value="1" > Final Glass Prescription </h4>';
                $showdata.='<table class="table table-bordered table-hover"><tr><th colspan="1"></th><th colspan="4">RE</th><th colspan="4">LE</th></tr><tr><td></th><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td><td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td><td class="tab_tit">SPH</td><td class="tab_tit">CYL</td>
                <td class="tab_tit">AXIS</td><td class="tab_tit">V/A</td></tr><tr><td class="tab_tit">D.V</td><td style="padding:5px;" align="center">'.$examination_masters->fspe1.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe2.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe3.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->fspe4.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe9.'</td>
                 <td style="padding:5px;" align="center">'.$examination_masters->fspe10.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe11.'</td>
               <td style="padding:5px;" align="center">'.$examination_masters->fspe12.'</td></tr><tr><td  class="tab_tit">N.V</td><td style="padding:5px;" align="center">'.$examination_masters->fspe5.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe6.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe7.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe8.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe13.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe14.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe15.'</td><td style="padding:5px;" align="center">'.$examination_masters->fspe16.'</td></tr></table>';
                $showdata.='</div>';
            } //16th   section end
            if($getdoctorprescription)  //17th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="17sec_chk" id="17sec_chk"  value="1" > Medicine Details </h4>';
                $showdata.='<table  class="table table-bordered table-hover"><thead><tr><th style="width:5%;">SL NO</th style="width:10%;"><th style="width:20%;">Drug Name</th><th style="width:20%;">Instruction</th><th style="width:20%;">No Of Days</th><th style="width:20%;">Qty</th><th style="width:5%;">Eye</th></tr></thead><tbody>';
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

                   $sgl++;

                   if($datame['med_action']==0)
                    {
                        $drugname=$datame['drugname'];
                    }
                    else
                    {
                        $drugname=$datame['med_name'];
                    }

                    $showdata.='<tr><td>'.$sgl.'</td><td>'.$drugname.'</td><td>'.$datame['instruction'].'<br/>'.$medd.'</td><td>'.$datame['nodays'].'<br/>'.$meddi.'</td><td>'.$datame['qty'].'</td><td>'.$datame['med_eye'].'</td></tr>';

                }

                 $showdata.='</tbody></table>';
                $showdata.='</div>';
            } //17th   section end
            if($getresult_Diag)  //18th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="18sec_chk" id="18sec_chk"  value="1" > Diagnosis Plan </h4>';
                $showdata.='<table class="table table-bordered table-hover"><thead><tr><th>SL NO</th><th>Diagnosis</th><th>Department</th><th>Eye</th></tr></thead><tbody>';
                $sgl=1;
                                  foreach($getresult_Diag as $datadia)
                                  {  
                                     $showdata.='<tr><td>'.$sgl.'</td><td>'.$datadia['dianame'].'</td><td>'.$datadia['dename'].'</td><td>'.$datadia['eye'].'</td></tr>';
                                     $sgl++;
                                  }
                 $showdata.='</tbody></table>';
                $showdata.='</div>';
            } //18th   section end
            if($eye_comp)  //19th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="19sec_chk" id="19sec_chk"  value="1" > Eye Details </h4>';
                $showdata.='<table class="table table-bordered table-hover" style="width:100%;"><thead><tr><th>Right Eye</th><th>Particulars</th><th>Left Eye</th></tr>
</thead><tbody id="showdataeyecomp">';
                foreach ($eye_comp as $datab) 
                { 
                        $lefteyedet='';
                        $eye_comp_left=$this->db->query("select eye_details.name from examination_eye inner join eye_details on examination_eye.lefteye=eye_details.eye_details_id where eye_complaints_id=$datab->eye_complaints_id and examination_id=$examination_masters->examination_id")->result(); 
                        if($eye_comp_left)
                        {
                        foreach ($eye_comp_left as $dataleft) 
                        {
                        $lefteyedet.=$dataleft->name.',';
                        }
                        $lefteyedet= rtrim($lefteyedet, ',');
                        }

                        $righteyel='';
                        $eye_comp_right=$this->db->query("select eye_details.name from examination_eye inner join eye_details on examination_eye.righteye=eye_details.eye_details_id where eye_complaints_id=$datab->eye_complaints_id and examination_id=$examination_masters->examination_id")->result(); 
                        if($eye_comp_right)
                        {
                            foreach ($eye_comp_right as $dataright) 
                            {
                            $righteyel.=$dataright->name.',';
                            }
                            $righteyel= rtrim($righteyel, ',');
                        }
                $showdata.='<tr>

                    <td>'.$righteyel.'</td>

                    <td>'.$datab->name.'</td>

                    <td>'.$lefteyedet.'</td>

                </tr>';

                } 
                 $showdata.='</tbody></table>';
                $showdata.='</div>';
            } //19th   section end
            if($addEye_Part)  //20th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="20sec_chk" id="20sec_chk"  value="1" > Eye Parts Examination </h4>';
                $showdata.=' <table class="table table-bordered table-hover" style="width:100%;"><thead><tr><th></th><th></th><th>Right</th>
                     <th>Left</th></tr></thead><tbody id="showdataeyecomp1">';
                foreach ($addEye_Part as $datab) { 
                      $group= $datab->segment_type_id;
                      $checkedright = 'unchecked';
                      $checkedrleft = 'unchecked';
                      $righteyepartscheckbox = $datab ->righteyepartscheckbox;
                      $lefteyepartscheckbox = $datab->lefteyepartscheckbox;
       
       if($righteyepartscheckbox == "on")
       {
           $checkedright ="checked";
       }
        if( $lefteyepartscheckbox == "on")
       {
           $checkedrleft = "checked";
       }
              $showdata.='<tr><td>'.$datab->segment_name.'</td><td>'.$datab->content.'</td><td><input type="checkbox"   name="righteyepartscheckbox[]" value="1" '.$checkedright.' >                                    
                          '.$datab->righteyeparts.'</td>
                          <td><input   type="checkbox" name ="lefteyepartscheckbox[]" value="1" '.$checkedrleft.'>                              
                          
                          '.$datab->lefteyeparts.'</td>
                      
                       

                      </tr>';

                    } 

       $showdata.='</tbody></table>';
                $showdata.='</div>';
            } //20th   section end

            if($Getdetailstableex)  //21th  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="21sec_chk" id="21sec_chk"  value="1" > Investigation Details </h4>';
                $showdata.='<table  class="table table-bordered table-hover"><thead><tr><th>Particulars</th></tr></thead><tbody>';
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
                $showdata.='</div>';
            } //21th   section end
            if($getexamination_treatmentplan)  //22rd  section start
            {
                $showdata.='<div class="col-md-6">';
                $showdata.='<h4 style="text-decoration: underline;"><input type="checkbox" name="22sec_chk" id="22sec_chk"  value="1" > Treatment Plan: </h4>';
                $showdata.='<table  class="table table-bordered table-hover"><thead><tr><th style="width:20%;">Plan</th><th style="width:20%;">EYE</th><th style="width:20%;">Doctor Name</th><th style="width:5%;">Appointment Date</th>
                <th style="width:5%;">Counseling </th>
                </tr></thead><tbody>';
                    // $sgl=0;
                     foreach($getexamination_treatmentplan as $datame)
                     {           
                             //$sgl++;        .$datab->segment_name.' 
                             
                             $planNo='';

                             if($datame ->plan =2)
                             {                              
                               $planNo='Surgery';                              
                             }       
               
                             elseif ($datame ->plan==3) 
                                                           {
               
                                 $planNo='Laser';
               
                             }
               
                             else
               
                             {
               
                                 $planNo='Injection';
               
                             }  

                             $eyec='';
                             if($datame->eye ==1)        {                           
                               $eyec='Left eye';                           
                             }                                    
                             elseif ($datame->eye ==2)  
                             {                           
                               $eyec='Right Eye';                           
                             }
               
                             else
               
                             {
               
                               $eyec='Both Eye';
               
                             }
                        
                        $showdata.='<tr><td>'.$planNo.'</td><td>'.$eyec.'</td><td>'.$datame->doctorname.'</td><td>'.$datame ->appointment_date.'</td><td>'.$datame->status.'</td></tr>';
                     }
                      $showdata.='</tbody></table>';
                $showdata.='</div>';
            } //22rd   section end
        $showdata.='</div>';

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
        $getresult_doc=$this->Examination_model->Checking_Samedoc($this->input->post('cross_doctor_id'),$this->input->post('excross'));
        if($getresult_doc)
        {
            $cnt_same_doc=$getresult_doc[0]['cnt'];
            if($cnt_same_doc>0)
            {
                echo json_encode(array('msg' =>'','error'=> 'Same doctor not allowed to Cross Referral','error_message' =>''));exit;
            }
        }
            $data=$this->cross_fetch_data();
            $getresult=$this->Examination_model->savedata_crossref($data,$this->input->post('excross'));
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
        $get_result=$this->Examination_model->Getcross_rreddata($ser_date);
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
      $getresult = $this->Examination_model->getSalesSearchStock($product);
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

  private function newparti_fetch_data($neweye,$eyetype) 
  {
        $status=1;
        $office_id=$this->session->office_id;
        return array(
            'eye_type'=>trim($eyetype),
            'name'=>trim($neweye),
            'description'=>'Examination',
            'status'=>$status,
            'parent_id'=>$this->session->userdata('parent_id'),
            'login_id'=>$this->session->userdata('login_id'),
            'office_id'=> $this->session->userdata('office_id')
        );
  }

  public function saveneweyepart()
   {
      $this->form_validation->set_rules('eye_companent_id', 'Eye Complaints ID', 'trim|required|min_length[1]|max_length[30]');
      $this->form_validation->set_rules('add_part_eye', 'Add New Part', 'trim|required');
      $this->form_validation->set_rules('eyetype_newparticular', 'Eye Type', 'trim|required');
       if($this->form_validation->run() == TRUE)
       {
            $data=$this->newparti_fetch_data($this->input->post('add_part_eye'),$this->input->post('eyetype_newparticular'));
            $getresult=$this->Examination_model->saveaddparticular_eyemodel($data,$this->input->post('eye_companent_id'),$this->input->post('add_part_eye'),$this->input->post('eyetype_newparticular'));
            if($getresult)
            {
               
               echo json_encode(array('msg' =>'Saved Successfully','particularidnew'=>$getresult,'error'=>'','error_message' =>''));
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
   private function dia_fetch_data() 
   {
       $status=1;
       $office_id=$this->session->office_id;
       return array(
           'name'=>trim($this->input->post('add_dia_l')),
           'ipd_code_le'=>'',
           'ipd_code_re'=>'',
           'ipd_code_be'=>'',
           'description'=>'Examination',
           'department_id'=>trim($this->input->post('dia_department_id')),
           'status'=>$status,
           'parent_id'=>$this->session->userdata('parent_id'),
           'login_id'=>$this->session->userdata('login_id'),
           'office_id'=> $this->session->userdata('office_id')
          );
   }
   public function addnewdia()
   {
      $this->form_validation->set_rules('add_dia_l', 'Add Diagnosis', 'trim|required|min_length[1]|max_length[30]');
      $this->form_validation->set_rules('dia_department_id', 'Add Department', 'trim|required|min_length[1]|max_length[30]');
       if($this->form_validation->run() == TRUE)
       {
            $data=$this->dia_fetch_data();
            $getresult=$this->Examination_model->save_dia($data);
            if($getresult)
            {
               
               echo json_encode(array('msg' =>'Saved Successfully','particularidnew'=>$getresult,'error'=>'','error_message' =>''));
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
   public function get_pha_temp()
   {
      $htmlitemdata='';
      $this->form_validation->set_rules('getid', 'Pharmacy Medicine Templates ID', 'trim|required|min_length[1]|max_length[30]|numeric');
       if($this->form_validation->run() == TRUE)
       {
            $med_temp_id=trim($this->input->post('getid'));
            $getresult=$this->Examination_model->Get_medicine_details_ph($med_temp_id);
            if($getresult)
            {
                $sl=1;
                foreach($getresult as $datav)
                {
                    $itemname=$datav['itemname'];
                    $htmlitemdata.='<td colspan="7" style="text-align: center;
    background: aquamarine;
    color: darkblue;
    font-size: 18px;
    font-weight: 700;">'.$sl.')  Medicine Name : '.$itemname.'</td>';
                    $getresult_item = $this->Examination_model->getSalesSearchStock($itemname);
                    if($getresult_item)
                    {
                        foreach($getresult_item as $datav)
                        {
                             if ($datav['days'] > 0) 
                             {
                                $st ='<span class="text-danger">Expire  in ' .$datav['days']. ' Days</span>';
                             }
                             else 
                             {
                                $st ='<span class="text-warning">Expired  in ' .$datav['days']. ' Days</span>';
                             }
                           
                             $htmlitemdata.='<tr>
                                        <td><input type="checkbox" name="checkboxNameph" value="'.$datav['stock_id'].'"></td>
                                        <td style="color: #6f42c1;font-weight: 600;">' .$st. '</td>
                                        <td>'. $datav['batchno']. '</td><td>'. $datav['expirydate']. '</td>
                                        <td>'. $datav['mrp']. '</td>
                                        <td>'. $datav['selling_price']. '</td>
                                        <td>'. $datav['quantity']. '</td>
                                    </tr>';
                        }
                    }
                    $sl++;
                }
                
                $getmed_temp_name=$this->Examination_model->Get_med_temp_name($med_temp_id);
               $html='<form id="med_ph_form" action="#" method="post"> 
                             <div id="div_modal_ph" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-xl">
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12" >
                                                    <center><h3 style="
    color: #c90cd1;
    font-size: 18px;
    font-weight: 700;
">Medicine Template Name:'.$getmed_temp_name[0]['name'].'</h3></center>
<input type="hidden" id="med_ph_temp_iid" value="'.$med_temp_id.'">
                                                       <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="'.$this->security->get_csrf_hash().'"> 
                                                          <table class="table table-bquotationed table-bordered table-hover">
                                                            <thead >
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>Item Name</th>
                                                                    <th>Batch No</th>
                                                                    <th>Expiry Date</th>
                                                                    <th>MRP</th>
                                                                    <th>SP</th>
                                                                    <th>Stock</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                '.$htmlitemdata.'
                                                            </tbody>
                                                        </table>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
        <button id="save" class="btn btn-primary btn-sm" type="button" onclick="saved_ph_temp();"><i class="fas fa-plus-square"></i>Submit</button>
            <button type="button" id="mclose" class="btn btn-danger btn-sm lo_ph" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>';
               echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$html,'error'=>'','error_message' =>''));
            }
            else
            {
                 echo json_encode(array('msg' =>'','error'=> 'No data Found','error_message' =>''));
            }
       }
       else
       {
            echo json_encode(array('msg'=>'','error'=> '','error_message' => $this->form_validation->error_array()));
       }
   }
    public function Selected_Item_Store_PH()
   {
      $htmldata='';
      $med_ph_temp_iid=$this->input->post('med_ph_temp_iid');
      $checkvalue_stock=$this->input->post('checkboxValues');
      $row_num=$this->input->post('row_num');
      if($checkvalue_stock)
      {
        $cdays=1;
         foreach($checkvalue_stock as $getid)
         {
            $getresult_item = $this->Examination_model->Get_selected_Items($getid);
            if($getresult_item)
            {
                foreach($getresult_item as $itemsdata)
                {
                    $medins='';
                    $getresult_item_ins = $this->Examination_model->Get_selected_Items_Ins($med_ph_temp_iid,$itemsdata['item_id']);
                    //print_r($getresult_item_ins);exit;
                    if($getresult_item_ins)
                    {
                        foreach($getresult_item_ins as $medis)
                        {
                          $medins.=nl2br($medis['name']);  
                          $cdays=$medis['days'];
                        }
                     $medins = preg_replace("/(@ Night|\d-\d-\d|4 TIMES A DAY|6 Times a day)/", "\n$0", $medins);
                    }

                    $htmldata.='<tr><td>'.$itemsdata['name'].'</td><td><input type="hidden" class="form-control" id="medicine_id_'.$row_num.'" name="medicine_id[]" value="'.$itemsdata['stock_id'].'"><textarea  class="form-control"  id="instruction_'.$row_num.'" name="instruction[]" >'.$medins.'</textarea><span id="search_result'.$row_num.'"></span></td>
                       <td><input type="text" class="form-control" id="days_'.$row_num.'" name="days[]" value="'.$cdays.'"></td>
                        <td><input type="text" class="form-control" id="qty_'.$row_num.'" name="qty[]" value="1"></td>
                        <td style="display:none;"><input type="date" class="form-control std_ph" id="sdate_'.$row_num.'" name="sdate[]"></td>
                         <td style="display:none;"><input type="date" class="form-control std_ph" id="tdate_'.$row_num.'" name="tdate[]"></td>
                          <td><select class="form-control" name="medeye[]" id="medeye_'.$row_num.'"><option value="BE">BE</option><option value="LE">LE</option><option value="RE">RE</option><option value="A/F">A/F</option><option value="B/F">B/F</option></select></td>
                           <td>
                            <a  onclick="$(this).parent().parent().remove();calcnet();" class="input_column">
                            <button class="btn btn-danger btnDelete btn-sm">
                               <i class="la la-trash"></i>
                            </button>
                            </a>
                            <a href="#" id="mult_'.$row_num.'" class="table-link danger serial_number_setting" data-target="#myModalframe" data-toggle="modal" onclick="pop('.$row_num.')"><button class="btn btn-sm btn-success">Add</button></a>
                            <div  class="multiple_'.$row_num.'" style="display:none;">\n\
                          <input type="hidden" name="mulframetype[]" id="mulframetype_'.$row_num.'" class="form-control span2">
                          <input type="hidden" name="mulframecolor[]" id="mulframecolor_'.$row_num.'" class="form-control span2">
                           <input type="hidden" name="med_action[]" value="1" id="med_action_'.$row_num.'" class="form-control span2">
                            <input type="hidden" name="med_name[]"  id="med_name_'.$row_num.'" value="'.$itemsdata['name'].'" class="form-control span2">
                        </div>
                       </td>
                         </tr>';
                         $row_num++;
                }
            }
         }
          echo json_encode(array('msg' =>'Saved Successfully','htmldata'=>$htmldata,'row_num'=>$row_num,'error'=>'','error_message' =>''));
      }
      else
      {
         echo json_encode(array('msg' =>'','error'=> 'Please Select Items','error_message' =>''));
      }
   }
 }



 

