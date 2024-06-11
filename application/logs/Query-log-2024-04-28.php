SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.00043201446533203

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.013314008712769

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.00043201446533203

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.013314008712769

select user_id,name from  user where user_type=3 
 Execution Time:0.00028491020202637

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.020862102508545

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.044867992401123

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00636887550354

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00636887550354

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.040627002716064

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00636887550354

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.040627002716064

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.047193050384521

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00636887550354

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.040627002716064

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.047193050384521

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.060894012451172

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00636887550354

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.040627002716064

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.047193050384521

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.060894012451172

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.042577028274536

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.066251993179321

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.028554916381836

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.034970998764038

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00636887550354

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.040627002716064

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.047193050384521

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.060894012451172

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.042577028274536

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0022759437561035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044012069702148

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044012069702148

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044012069702148

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00032901763916016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044012069702148

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00032901763916016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044012069702148

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00032901763916016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.019899129867554

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044012069702148

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00032901763916016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029397010803223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00086092948913574

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00086092948913574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00086092948913574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037217140197754

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00086092948913574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037217140197754

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00069284439086914

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00086092948913574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037217140197754

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00069284439086914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00025200843811035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050711631774902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00075197219848633

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00086092948913574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037217140197754

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00069284439086914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00025200843811035

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00034689903259277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010669231414795

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010669231414795

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00072216987609863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00082015991210938

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063109397888184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010669231414795

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00072216987609863

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0010530948638916

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0010530948638916

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0010530948638916

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0010530948638916

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00088310241699219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0010530948638916

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00088310241699219

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0010530948638916

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00088310241699219

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.047857999801636

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='21' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00089597702026367

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='25' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00059986114501953

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='9' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00052690505981445

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='23' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00050687789916992

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='19' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00059986114501953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026798248291016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026798248291016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026488304138184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026798248291016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026488304138184

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061607360839844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026798248291016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026488304138184

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061607360839844

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026798248291016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026488304138184

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061607360839844

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='25' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00057721138000488

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00055789947509766

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='21' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00052213668823242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036787986755371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036787986755371

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025796890258789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036787986755371

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025796890258789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00082993507385254

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036787986755371

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025796890258789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00082993507385254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051617622375488

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006251335144043

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036787986755371

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025796890258789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00082993507385254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00040316581726074

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0001978874206543

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='25' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00059914588928223

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00080084800720215

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='21' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00051093101501465

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select * from medicine_category where  office_id= '1' and status=1 
 Execution Time:0.59650897979736

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030803680419922

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030803680419922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030803680419922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094413757324219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030803680419922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094413757324219

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00020599365234375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030803680419922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094413757324219

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00020194053649902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00069403648376465

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='6' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00063705444335938

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='7' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00059294700622559

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='11' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00048589706420898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049209594726562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049209594726562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049209594726562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049209594726562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057291984558105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049209594726562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057291984558105

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049018859863281

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049209594726562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057291984558105

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058293342590332

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00037288665771484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073099136352539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073099136352539

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073099136352539

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038385391235352

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073099136352539

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00034618377685547

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065207481384277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065207481384277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.018757820129395

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065207481384277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.018757820129395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080299377441406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065207481384277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.018757820129395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080299377441406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065207481384277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.018757820129395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080299377441406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0007781982421875

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00069308280944824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049185752868652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00064897537231445

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065207481384277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.018757820129395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080299377441406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0007781982421875

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00028491020202637

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.0014841556549072

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='6' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00038599967956543

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='7' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00060296058654785

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='14' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00057196617126465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031685829162598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031685829162598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031685829162598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007171630859375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031685829162598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007171630859375

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031685829162598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007171630859375

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058197975158691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036096572875977

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00031685829162598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007171630859375

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00021004676818848

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.014549970626831

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0010709762573242

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.014549970626831

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0010709762573242

select user_id,name from  user where user_type=3 
 Execution Time:0.00036907196044922

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00062894821166992

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0033299922943115

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.40231013298035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007939338684082

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007939338684082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007939338684082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00047111511230469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038480758666992

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007939338684082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00047111511230469

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005640983581543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005640983581543

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043702125549316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005640983581543

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043702125549316

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072908401489258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005640983581543

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043702125549316

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072908401489258

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005640983581543

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043702125549316

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072908401489258

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047707557678223

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031709671020508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031089782714844

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.55958604812622

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005640983581543

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043702125549316

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00072908401489258

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00053596496582031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00053596496582031

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010960102081299

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00053596496582031

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010960102081299

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00053596496582031

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010960102081299

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005638599395752

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056290626525879

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00053596496582031

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010960102081299

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005638599395752

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033116340637207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095009803771973

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095009803771973

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095009803771973

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00082302093505859

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095009803771973

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044488906860352

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044488906860352

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00034999847412109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00028586387634277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00070810317993164

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044488906860352

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00034999847412109

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00023603439331055

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041699409484863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041699409484863

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003809928894043

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041699409484863

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003809928894043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00087189674377441

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041699409484863

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003809928894043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00087189674377441

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041699409484863

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003809928894043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00087189674377441

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056195259094238

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040507316589355

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00095605850219727

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041699409484863

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003809928894043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00087189674377441

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00037789344787598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095510482788086

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095510482788086

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095510482788086

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031018257141113

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037407875061035

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054383277893066

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00095510482788086

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076889991760254

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076889991760254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076889991760254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076889991760254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029587745666504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029587745666504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029587745666504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090289115905762

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029587745666504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090289115905762

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029587745666504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090289115905762

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023913383483887

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029587745666504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090289115905762

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00025796890258789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097298622131348

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097298622131348

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00042891502380371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097298622131348

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00042891502380371

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003349781036377

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097298622131348

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00042891502380371

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00038719177246094

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00066590309143066

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00066590309143066

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00066590309143066

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075387954711914

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00066590309143066

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075387954711914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057697296142578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00066590309143066

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075387954711914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057697296142578

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.000579833984375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019791126251221

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0015521049499512

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082182884216309

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00075697898864746

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00066590309143066

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075387954711914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057697296142578

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.000579833984375

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081586837768555

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081586837768555

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081586837768555

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050902366638184

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074219703674316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081586837768555

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00059318542480469

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00044918060302734

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012481212615967

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012481212615967

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012481212615967

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004570484161377

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034904479980469

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012481212615967

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00022006034851074

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044488906860352

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044488906860352

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00052309036254883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048518180847168

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00030994415283203

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044488906860352

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00052309036254883

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00017404556274414

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083780288696289

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083780288696289

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083780288696289

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002291202545166

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083780288696289

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043392181396484

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00022315979003906

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084495544433594

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084495544433594

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084495544433594

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0027260780334473

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059294700622559

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00034308433532715

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084495544433594

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0027260780334473

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093913078308105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093913078308105

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00052309036254883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093913078308105

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00052309036254883

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060486793518066

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093913078308105

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00052309036254883

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00026202201843262

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00053286552429199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00053286552429199

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00053286552429199

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0017650127410889

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00053286552429199

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0017650127410889

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00053286552429199

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0017650127410889

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00130295753479

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0016410350799561

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00053286552429199

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0017650127410889

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0007929801940918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059795379638672

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059795379638672

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058507919311523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059795379638672

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058507919311523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084400177001953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059795379638672

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058507919311523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084400177001953

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059795379638672

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058507919311523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084400177001953

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00053715705871582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051307678222656

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00067782402038574

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059795379638672

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058507919311523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084400177001953

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00053715705871582

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029087066650391

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00090694427490234

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00090694427490234

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00090694427490234

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012538433074951

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00090694427490234

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012538433074951

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049281120300293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00090694427490234

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012538433074951

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049281120300293

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043916702270508

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042605400085449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00090694427490234

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012538433074951

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049281120300293

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039792060852051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039792060852051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00039505958557129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039792060852051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00039505958557129

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094199180603027

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039792060852051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00039505958557129

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094199180603027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039792060852051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00039505958557129

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094199180603027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056982040405273

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044798851013184

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046300888061523

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039792060852051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00039505958557129

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00094199180603027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00041890144348145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00077700614929199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00077700614929199

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00068187713623047

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00077700614929199

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00068187713623047

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032496452331543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036406517028809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00077700614929199

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00068187713623047

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00025200843811035

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0016598701477051

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0016598701477051

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select user_id,name from  user where user_type=3 
 Execution Time:0.00035190582275391

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00057816505432129

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.026171922683716

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0027768611907959

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083684921264648

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083684921264648

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083684921264648

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083684921264648

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0005040168762207

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00071620941162109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00071620941162109

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084090232849121

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00071620941162109

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084090232849121

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00071620941162109

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084090232849121

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057482719421387

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00035786628723145

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00071620941162109

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084090232849121

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057482719421387

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013370513916016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013370513916016

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049710273742676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013370513916016

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049710273742676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00092601776123047

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013370513916016

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049710273742676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003509521484375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047183036804199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047183036804199

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008540153503418

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047183036804199

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008540153503418

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047183036804199

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008540153503418

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00048112869262695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00056910514831543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047183036804199

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008540153503418

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041007995605469

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00048112869262695

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029993057250977

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='5' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00062108039855957

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='7' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.0014708042144775

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='12' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00042200088500977

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='20' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00040912628173828

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='26' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00037693977355957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0024468898773193

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0024468898773193

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0018270015716553

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0024468898773193

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0018270015716553

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0024468898773193

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0018270015716553

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00059199333190918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0019729137420654

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0026509761810303

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00092697143554688

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0010230541229248

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0024468898773193

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0018270015716553

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00059199333190918

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089097023010254

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089097023010254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057792663574219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089097023010254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057792663574219

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058102607727051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00080680847167969

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076103210449219

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089097023010254

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00057792663574219

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058102607727051

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00088787078857422

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078105926513672

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078105926513672

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041484832763672

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078105926513672

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041484832763672

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055480003356934

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00058412551879883

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00059890747070312

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078105926513672

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00041484832763672

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033187866210938

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00049710273742676

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='5' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.0004580020904541

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='10' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00065517425537109

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='20' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00047016143798828

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='23' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.0003819465637207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013620853424072

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013620853424072

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013620853424072

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00069904327392578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0025248527526855

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063705444335938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057220458984375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00086784362792969

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0013899803161621

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0013620853424072

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00069904327392578

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='5' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00063991546630859

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050783157348633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050783157348633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050783157348633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010218620300293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050783157348633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010218620300293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050783157348633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010218620300293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00045204162597656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00071597099304199

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.036056041717529

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00050783157348633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010218620300293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0014779567718506

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00095915794372559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00095915794372559

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00095915794372559

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010690689086914

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00095915794372559

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010690689086914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00095915794372559

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010690689086914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00075602531433105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0033512115478516

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0045528411865234

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00093197822570801

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0013458728790283

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011999607086182

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019421577453613

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00095915794372559

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010690689086914

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00075602531433105

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00057482719421387

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0021679401397705

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00031113624572754

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0021679401397705

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00031113624572754

select user_id,name from  user where user_type=3 
 Execution Time:0.00061511993408203

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00096607208251953

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0012979507446289

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.61167120933533

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0017719268798828

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0018529891967773

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0035400390625

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052714347839355

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052714347839355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00099611282348633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052714347839355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00099611282348633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0015130043029785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052714347839355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00099611282348633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0015130043029785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00060582160949707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052714347839355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00099611282348633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0015130043029785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00060582160949707

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00069713592529297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0022239685058594

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.012687921524048

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00096893310546875

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0034220218658447

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0031418800354004

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052714347839355

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00099611282348633

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0015130043029785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00060582160949707

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00069713592529297

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0005950927734375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0010368824005127

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0010368824005127

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011510848999023

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0010368824005127

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011510848999023

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014960765838623

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0010368824005127

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011510848999023

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014960765838623

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00095796585083008

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0010368824005127

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011510848999023

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014960765838623

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00095796585083008

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0007631778717041

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.022265911102295

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00211501121521

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00091195106506348

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00077486038208008

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.001802921295166

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0019168853759766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0010368824005127

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011510848999023

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014960765838623

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00095796585083008

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0007631778717041

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.000640869140625

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.000640869140625

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.000640869140625

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089716911315918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.000640869140625

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089716911315918

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.000640869140625

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089716911315918

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0013298988342285

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010180473327637

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042486190795898

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00052881240844727

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.000640869140625

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089716911315918

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0013298988342285

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011980533599854

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011980533599854

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011980533599854

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053882598876953

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011980533599854

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00056004524230957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011241436004639

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011241436004639

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011389255523682

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011241436004639

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011389255523682

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049495697021484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011241436004639

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011389255523682

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049495697021484

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00071096420288086

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00060796737670898

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011241436004639

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011389255523682

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049495697021484

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0028131008148193

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.032418012619019

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0050950050354004

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00060606002807617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00060606002807617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0016939640045166

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00060606002807617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0016939640045166

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00060606002807617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0016939640045166

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00066804885864258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00059986114501953

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00066614151000977

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00063586235046387

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00059103965759277

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00060606002807617

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0016939640045166

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00066804885864258

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00079894065856934

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00091695785522461

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00088596343994141

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010800361633301

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010800361633301

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010800361633301

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00060701370239258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00054717063903809

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055599212646484

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010800361633301

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00060701370239258

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014970302581787

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014970302581787

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014970302581787

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00085616111755371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00064492225646973

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0011169910430908

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00066208839416504

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00042104721069336

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014970302581787

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00085616111755371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007011890411377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007011890411377

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007011890411377

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00038504600524902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0007021427154541

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00074601173400879

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007011890411377

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00025081634521484

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.098716974258423

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.098716974258423

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0003201961517334

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0003199577331543

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037980079650879

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046992301940918

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042009353637695

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043487548828125

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062990188598633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00050592422485352

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014679431915283

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.098716974258423

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0003201961517334

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00037789344787598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065708160400391

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065708160400391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065708160400391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012679100036621

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065708160400391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012679100036621

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0007328987121582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065708160400391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012679100036621

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0007328987121582

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00063896179199219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029492378234863

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060296058654785

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050806999206543

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00045394897460938

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00065708160400391

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012679100036621

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0007328987121582

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00063896179199219

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003809928894043

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00074505805969238

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00068783760070801

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0011148452758789

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0029160976409912

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0006718635559082

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0006718635559082

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096511840820312

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0006718635559082

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096511840820312

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053811073303223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0006718635559082

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096511840820312

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053811073303223

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00069189071655273

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00053191184997559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041317939758301

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00051403045654297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046205520629883

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0006718635559082

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096511840820312

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053811073303223

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00069189071655273

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029182434082031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00093889236450195

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00093889236450195

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00072693824768066

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00093889236450195

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00072693824768066

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085687637329102

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00093889236450195

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00072693824768066

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085687637329102

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0006248950958252

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00093889236450195

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00072693824768066

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085687637329102

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0006248950958252

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00072598457336426

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0081210136413574

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0010700225830078

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00098109245300293

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0013649463653564

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0018048286437988

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00093889236450195

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00072693824768066

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085687637329102

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0006248950958252

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00072598457336426

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00095200538635254

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00068020820617676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00068020820617676

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00068020820617676

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008690357208252

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00068020820617676

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008690357208252

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00068020820617676

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008690357208252

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0006260871887207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063991546630859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00058984756469727

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00068020820617676

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008690357208252

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0006260871887207

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010380744934082

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010380744934082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010380744934082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057792663574219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00025606155395508

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00050997734069824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00049090385437012

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004880428314209

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010380744934082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004580020904541

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057792663574219

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033307075500488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011739730834961

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011739730834961

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011739730834961

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0010619163513184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011739730834961

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0010619163513184

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058317184448242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0062811374664307

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.001507043838501

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00081396102905273

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.001101016998291

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0007469654083252

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.001298189163208

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0011739730834961

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0010619163513184

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058317184448242

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00078892707824707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00023317337036133

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00023317337036133

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00020813941955566

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00023317337036133

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00020813941955566

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093793869018555

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00023317337036133

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00020813941955566

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093793869018555

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00024914741516113

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00023317337036133

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00020813941955566

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093793869018555

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00024914741516113

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00024986267089844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003058910369873

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035619735717773

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00023317337036133

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00020813941955566

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093793869018555

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00024914741516113

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00024986267089844

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0026671886444092

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032210350036621

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00093698501586914

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081205368041992

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00056815147399902

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0003359317779541

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029897689819336

