SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0014400482177734

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.003201961517334

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0014400482177734

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.003201961517334

select user_id,name from  user where user_type=3 
 Execution Time:0.0003659725189209

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00055098533630371

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-29'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0041439533233643

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.028116941452026

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.039721012115479

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.039721012115479

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.033452987670898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.039721012115479

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.033452987670898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.022511005401611

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.039721012115479

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.033452987670898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.022511005401611

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.019246101379395

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.039721012115479

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.033452987670898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.022511005401611

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.019246101379395

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.025527000427246

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.067486047744751

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.031200885772705

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.026700973510742

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.013024091720581

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023779153823853

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.020282983779907

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.039721012115479

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.033452987670898

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.022511005401611

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.019246101379395

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.025527000427246

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.013291835784912

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025105476379395

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025105476379395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025105476379395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00025200843811035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025105476379395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00025200843811035

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00025391578674316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00073504447937012

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044512748718262

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0003211498260498

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031590461730957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00026917457580566

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00025105476379395

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00025200843811035

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00025391578674316

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00075292587280273

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00040698051452637

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003960132598877

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00033903121948242

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00039196014404297

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011029243469238

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00017714500427246

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00017714500427246

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076508522033691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00017714500427246

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076508522033691

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00033187866210938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00017714500427246

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076508522033691

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00033187866210938

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043606758117676

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003361701965332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00017714500427246

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076508522033691

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00033187866210938

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00031900405883789

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00039315223693848

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073790550231934

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073790550231934

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00027704238891602

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073790550231934

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00027704238891602

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00029897689819336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053691864013672

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030612945556641

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036811828613281

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044989585876465

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00073790550231934

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00027704238891602

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00029897689819336

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029706954956055

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.069088935852051

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033283233642578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010569095611572

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010569095611572

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010569095611572

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00022792816162109

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00032711029052734

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044894218444824

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00037097930908203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010569095611572

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046491622924805

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00075101852416992

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026392936706543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026392936706543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085186958312988

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026392936706543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085186958312988

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00031280517578125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026392936706543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085186958312988

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00031280517578125

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00036191940307617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00040388107299805

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00038313865661621

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00026392936706543

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085186958312988

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00031280517578125

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00036191940307617

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00020194053649902

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00053691864013672

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035500526428223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010340213775635

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010340213775635

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00029993057250977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010340213775635

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00029993057250977

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00062203407287598

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031614303588867

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00063204765319824

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00033688545227051

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0010340213775635

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00029993057250977

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00059604644775391

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003659725189209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00067305564880371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00067305564880371

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00034880638122559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00067305564880371

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00034880638122559

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00057005882263184

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00024104118347168

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0006868839263916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031495094299316

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00028610229492188

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00067305564880371

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00034880638122559

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00038790702819824

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00061297416687012

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00048279762268066

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='7' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00055813789367676

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='15' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00057792663574219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056886672973633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056886672973633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045990943908691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056886672973633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045990943908691

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089788436889648

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056886672973633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045990943908691

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089788436889648

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056886672973633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045990943908691

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089788436889648

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049686431884766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00067496299743652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040411949157715

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00061798095703125

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00056886672973633

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045990943908691

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00089788436889648

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00049686431884766

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033092498779297

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00051116943359375

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00034499168395996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0009160041809082

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0009160041809082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0009160041809082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030684471130371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0004417896270752

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041079521179199

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0009160041809082

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00046515464782715

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032305717468262

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00060009956359863

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00037598609924316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075411796569824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075411796569824

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075411796569824

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00032615661621094

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00041818618774414

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00051593780517578

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057601928710938

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045084953308105

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00031518936157227

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047492980957031

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00045490264892578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045514106750488

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075411796569824

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00032615661621094

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00031805038452148

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00059700012207031

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='5' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00053882598876953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058603286743164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033402442932129

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0005948543548584

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00042986869812012

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00044107437133789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00035405158996582

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049304962158203

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00083589553833008

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00054097175598145

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00058603286743164

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0011661052703857

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00078797340393066

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0011661052703857

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00078797340393066

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00090312957763672

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00053095817565918

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-29'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00086188316345215

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0010838508605957

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00069189071655273

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-29'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00071883201599121

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0020358562469482

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0030479431152344

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0020358562469482

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0030479431152344

select user_id,name from  user where user_type=3 
 Execution Time:0.00040411949157715

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00057888031005859

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-29'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0039219856262207

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.16549110412598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.027631044387817

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.027631044387817

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039281129837036

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.027631044387817

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039281129837036

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.033452033996582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.027631044387817

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039281129837036

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.033452033996582

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.030474901199341

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.027631044387817

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039281129837036

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.033452033996582

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.030474901199341

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.025826215744019

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.052592992782593

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.068984985351562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.025290012359619

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.038876056671143

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.030766010284424

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025840997695923

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.027631044387817

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039281129837036

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.033452033996582

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.030474901199341

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.025826215744019

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.020750999450684

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.064927101135254

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00041890144348145

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.064927101135254

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00041890144348145

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093507766723633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093507766723633

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093507766723633

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061488151550293

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00081515312194824

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00031399726867676

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00050210952758789

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00093507766723633

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00053310394287109

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046706199645996

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00063204765319824

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00024199485778809

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00063204765319824

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00024199485778809

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096583366394043

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096583366394043

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096583366394043

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00051093101501465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0002899169921875

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00078296661376953

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00027894973754883

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00057411193847656

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00070500373840332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045180320739746

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00096583366394043

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00090813636779785

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00051093101501465

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035190582275391

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00062918663024902

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032782554626465

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00062918663024902

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032782554626465

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0002288818359375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041985511779785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041985511779785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011069774627686

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041985511779785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011069774627686

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00050497055053711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041985511779785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011069774627686

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00050497055053711

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055503845214844

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00023579597473145

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00085115432739258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00039386749267578

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00099396705627441

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00052595138549805

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00041103363037109

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00041985511779785

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0011069774627686

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00050497055053711

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00036311149597168

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00061416625976562

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00061416625976562

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00021719932556152

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00080513954162598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00080513954162598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00080513954162598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00080513954162598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00061392784118652

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00041413307189941

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046181678771973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054597854614258

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00080513954162598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00081992149353027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00038886070251465

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0018448829650879

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0018448829650879

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00054216384887695

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0016632080078125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012941360473633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012941360473633

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012941360473633

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0006859302520752

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00029802322387695

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0022139549255371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040817260742188

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012941360473633

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0006859302520752

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029397010803223

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00078487396240234

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00078487396240234

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014669895172119

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014669895172119

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014669895172119

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00074505805969238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00091791152954102

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00083708763122559

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00072503089904785

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00060391426086426

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00068092346191406

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00044393539428711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00049400329589844

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0014669895172119

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00074505805969238

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0010600090026855

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00054192543029785

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029206275939941

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00054192543029785

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029206275939941

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00023698806762695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085592269897461

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085592269897461

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085592269897461

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056600570678711

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072002410888672

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00062084197998047

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00085592269897461

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00052285194396973

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0010170936584473

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0010170936584473

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0012378692626953

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0012378692626953

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00062012672424316

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043797492980957

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00052404403686523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00086402893066406

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0012378692626953

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005028247833252

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00081586837768555

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00081586837768555

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00031805038452148

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036287307739258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036287307739258

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040221214294434

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036287307739258

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040221214294434

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080704689025879

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036287307739258

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040221214294434

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080704689025879

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036287307739258

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040221214294434

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080704689025879

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00053000450134277

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00032997131347656

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038695335388184

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00036287307739258

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040221214294434

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00080704689025879

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038003921508789

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00059700012207031

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00028491020202637

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00053095817565918

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00053095817565918

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00026202201843262

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039887428283691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039887428283691

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0012080669403076

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039887428283691

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0012080669403076

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039887428283691

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0012080669403076

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039887428283691

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0012080669403076

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00033807754516602

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00047612190246582

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00037813186645508

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00039887428283691

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0012080669403076

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00076389312744141

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0004730224609375

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00034213066101074

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0011320114135742

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.0011320114135742

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00052094459533691

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008997917175293

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008997917175293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008997917175293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00052809715270996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048494338989258

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.0008089542388916

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00098395347595215

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00051188468933105

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0008997917175293

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00052809715270996

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00027298927307129

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00058698654174805

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00087189674377441

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00058698654174805

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00087189674377441

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00086283683776855

