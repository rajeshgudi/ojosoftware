SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0017681121826172

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.012270927429199

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0017681121826172

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.012270927429199

select user_id,name from  user where user_type=3 
 Execution Time:0.00045299530029297

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00049901008605957

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.017405986785889

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00071096420288086

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.016333103179932

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00037312507629395

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0011351108551025

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.00063300132751465

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051212310791016

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.00063300132751465

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051212310791016

select user_id,name from  user where user_type=3 
 Execution Time:0.00061702728271484

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00066399574279785

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0012431144714355

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00084996223449707

select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date='2024-04-27' and  dental_eye=2     
 Execution Time:0.00089788436889648

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-27'   and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.25506091117859

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058698654174805

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00048017501831055

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 2 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00075888633728027

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0006248950958252

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00052690505981445

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00052690505981445

select user_id,name from  user where user_type=3 
 Execution Time:0.0026788711547852

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.066785097122192

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.066785097122192

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.031684875488281

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.066785097122192

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.031684875488281

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.066785097122192

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.031684875488281

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.030213832855225

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.066785097122192

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.031684875488281

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.030213832855225

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.038243055343628

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00065302848815918

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.060318946838379

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.047770023345947

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.076892852783203

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.047049045562744

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.066785097122192

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.031684875488281

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058388710021973

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.030213832855225

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select pat_reg_billprint,app_type,pat_mod from  office where  office_id= '1' 
 Execution Time:0.0004420280456543

select modeofpay_id ,name from  modeofpay where  office_id= '1' and status=1 
 Execution Time:0.04272198677063

select count(*) as cnt from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00052905082702637

select count(*) as cnt from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00052905082702637

select gender from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00053095817565918

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00049090385437012

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00049090385437012

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00049090385437012

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00038814544677734

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00049090385437012

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00038814544677734

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.0009920597076416

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00049090385437012

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00038814544677734

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.0009920597076416

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.0020198822021484

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0019171237945557

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0018458366394043

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00068902969360352

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0005180835723877

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0017838478088379

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00049090385437012

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00047802925109863

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00038814544677734

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.0009920597076416

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.0020198822021484

select pat_reg_billprint,app_type,pat_mod from  office where  office_id= '1' 
 Execution Time:0.00056314468383789

select modeofpay_id ,name from  modeofpay where  office_id= '1' and status=1 
 Execution Time:0.00026392936706543

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.00072813034057617

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00038814544677734

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.00072813034057617

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00038814544677734

select user_id,name from  user where user_type=3 
 Execution Time:0.00048303604125977

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0005500316619873

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0013461112976074

select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date='2024-04-30' and  dental_eye=2     and examination.doctor_id=17 
 Execution Time:0.3415699005127

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0011298656463623

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.050195932388306

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.050195932388306

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.044954061508179

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.050195932388306

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.044954061508179

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.044701099395752

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.050195932388306

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.044954061508179

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.044701099395752

select 	typeoflength_id,name from  	typeoflength where  office_id= '1' and status=1 
 Execution Time:0.027009963989258

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.050195932388306

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.044954061508179

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.044701099395752

select 	typeoflength_id,name from  	typeoflength where  office_id= '1' and status=1 
 Execution Time:0.027009963989258

select 	coating_id,name from  	coating where  office_id= '1' and status=1 
 Execution Time:0.031212091445923

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.056736946105957

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.052199125289917

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.067178964614868

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.048286199569702

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.03769588470459

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.050195932388306

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.044954061508179

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.044701099395752

select 	typeoflength_id,name from  	typeoflength where  office_id= '1' and status=1 
 Execution Time:0.027009963989258

select 	coating_id,name from  	coating where  office_id= '1' and status=1 
 Execution Time:0.031212091445923

SELECT *
FROM `patient_registration`
WHERE `patient_registration_id` = 75 
 Execution Time:0.00073695182800293

SELECT *
FROM `patient_appointment`
WHERE `patient_appointment_id` = 75 
 Execution Time:0.00042486190795898

SELECT *
FROM `whitecell`
WHERE `patient_appointment_id` = 75  and `patient_registration_id` = 75 
 Execution Time:0.00034284591674805

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select count(*) as cnt from ipdcharge where  office_id= 1 and status=1 
 Execution Time:0.025789022445679

select count(*) as cnt from investigation where  office_id= 1 and status=1 
 Execution Time:0.044847011566162

select count(*) as cnt from investigation where  office_id= 1 and status=1 
 Execution Time:0.044847011566162

select * from investigation where  office_id= 1 and status=1 
 Execution Time:0.00061297416687012

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='5' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00063705444335938

select a.name as dianame,b.name as deptname from diagnosis a left join department b on a.department_id=b.department_id where a.diagnosis_id='2' and  a.office_id= '1' and a.status=1 
 Execution Time:0.033896923065186

select a.name as dianame,b.name as deptname from diagnosis a left join department b on a.department_id=b.department_id where a.diagnosis_id='4' and  a.office_id= '1' and a.status=1 
 Execution Time:0.00043606758117676

select * from investigation where  investigation_id=33  and office_id= 1 and status=1 
 Execution Time:0.00065088272094727

select * from investigation where  investigation_id=34  and office_id= 1 and status=1 
 Execution Time:0.00051403045654297

select * from examination_chargesdetails where  examination_id=0 order by  examination_chargesdetails_id desc 
 Execution Time:0.014048099517822

select * from examination_chargesdetails where  examination_id=0 order by  examination_chargesdetails_id desc 
 Execution Time:0.014048099517822

select * from investigation where  investigation_id=34  and office_id= 1 and status=1 
 Execution Time:0.00054597854614258

select * from examination_chargesdetails where  examination_id=0 order by  examination_chargesdetails_id desc 
 Execution Time:0.014048099517822

select * from investigation where  investigation_id=34  and office_id= 1 and status=1 
 Execution Time:0.00054597854614258

select * from investigation where  investigation_id=33  and office_id= 1 and status=1 
 Execution Time:0.00051999092102051

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00042200088500977

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00091004371643066

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0011250972747803

select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date='2024-04-30' and  dental_eye=2     and examination.doctor_id=17 
 Execution Time:0.00072002410888672

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051498413085938

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00096297264099121

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'   and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0011601448059082

select examination.doc_action as confirm_flag,examination.patient_registration_id,examination.patient_appointment_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS opthdate,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination_date='2024-04-30' and  dental_eye=2     and examination.doctor_id=17 
 Execution Time:0.0023682117462158

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058889389038086

select examination.patient_appointment_id,examination.patient_registration_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination.confirm_flag,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination.examination_date= '2024-04-30'  and   examination.office_id= '1'   and  examination.doctor_id=17 order by examination_id DESC 
 Execution Time:0.0012130737304688

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=75 
 Execution Time:0.00053095817565918

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='75' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00060296058654785

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00056791305541992

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 3 order by patient_appointment_id DESC limit 1 
 Execution Time:0.0006709098815918

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00049781799316406

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0009000301361084

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00047898292541504

select examination.patient_appointment_id,examination.patient_registration_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination.confirm_flag,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination.examination_date= '2024-04-30'  and   examination.office_id= '1'   order by examination_id DESC 
 Execution Time:0.00095510482788086

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=75 
 Execution Time:0.00039196014404297

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='75' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00030398368835449

SELECT *
FROM `office`
WHERE `office_id` = 1 
 Execution Time:0.00083398818969727

SELECT *
FROM `examination`
WHERE `examination_id` = 25 
 Execution Time:0.00081300735473633

SELECT *
FROM `doctors_registration`
WHERE `doctors_registration_id` = 17 
 Execution Time:0.00032401084899902

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.00024008750915527

SELECT *
FROM `patient_registration`
WHERE `patient_registration_id` = 75 
 Execution Time:0.00037217140197754

select examination_diagnosis.diagnosis_id,diagnosis.name as dianame,department.name as dename,eye,remarks from examination_diagnosis inner join diagnosis on examination_diagnosis.diagnosis_id=diagnosis.diagnosis_id left join department on diagnosis.department_id=department.department_id where examination_diagnosis.examination_id=25 
 Execution Time:0.00057411193847656

SELECT *
FROM `patient_title`
WHERE `patient_title_id` = 22 
 Execution Time:0.00029206275939941

select treatment_date,treatment_plan,treament_payment from dental_treatment where  examination_id=25 
 Execution Time:0.00024795532226562

select count(*) as cnt from dental_teeth where  examination_id=25 
 Execution Time:0.00022315979003906

select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where examination_id=25 
 Execution Time:0.00036311149597168

select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where examination_id=25 
 Execution Time:0.00065803527832031

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=1 
 Execution Time:0.00025606155395508

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=2 
 Execution Time:0.00020408630371094

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=3 
 Execution Time:0.00015997886657715

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=4 
 Execution Time:0.00018191337585449

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=5 
 Execution Time:0.00015711784362793

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=6 
 Execution Time:0.00018501281738281

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=7 
 Execution Time:0.00016212463378906

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=8 
 Execution Time:0.0001680850982666

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=9 
 Execution Time:0.00021004676818848

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=10 
 Execution Time:0.00021195411682129

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=11 
 Execution Time:0.0001990795135498

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=12 
 Execution Time:0.00011610984802246

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=13 
 Execution Time:0.00023508071899414

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=14 
 Execution Time:0.00020694732666016

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=15 
 Execution Time:0.00021219253540039

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=16 
 Execution Time:0.00021600723266602

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=17 
 Execution Time:0.00020599365234375

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=18 
 Execution Time:0.00021719932556152

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=19 
 Execution Time:0.00020885467529297

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=20 
 Execution Time:0.0002131462097168

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=21 
 Execution Time:0.00020790100097656

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=22 
 Execution Time:0.00018310546875

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=23 
 Execution Time:0.00010800361633301

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=24 
 Execution Time:0.00016283988952637

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=25 
 Execution Time:0.00016283988952637

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=26 
 Execution Time:0.00016903877258301

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=27 
 Execution Time:9.5129013061523E-5

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=28 
 Execution Time:8.2969665527344E-5

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=29 
 Execution Time:7.8201293945312E-5

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=30 
 Execution Time:7.7962875366211E-5

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=31 
 Execution Time:7.9154968261719E-5

select count(*) as cnt from dental_teeth where  examination_id=25 and teeth=32 
 Execution Time:7.8916549682617E-5

select righteyeparts ,lefteyeparts , righteyepartscheckbox as righteyepartscheckbox,lefteyepartscheckbox as lefteyepartscheckbox ,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id as segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name as content,eye_segment.name as segment_name from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.examination_id= '25' 
 Execution Time:0.00024509429931641

select * from examination_chargesdetails where  examination_id= '25' 
 Execution Time:0.0001070499420166

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00055909156799316

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00065398216247559

select examination.patient_appointment_id,examination.patient_registration_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination.confirm_flag,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination.examination_date= '2024-04-30'  and   examination.office_id= '1'   and  examination.doctor_id=17 order by examination_id DESC 
 Execution Time:0.00061702728271484

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=75 
 Execution Time:0.0011410713195801

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='75' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00088977813720703

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051712989807129

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 75 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00039911270141602

SELECT *
FROM `examination`
WHERE `examination_id` = 25 
 Execution Time:0.00095987319946289

select family_history as family_history, current_meditation as current_meditation,drug_history as drug_history, vdiagnosis as vdiagnosis ,ant_lefteye as ant_lefteye , ant_righteye as ant_righteye ,bfit as bfit, vcontent as vcontent from examination where examination_id='25'  
 Execution Time:0.00029587745666504

select treatment_date,treatment_plan,treament_payment from dental_treatment where  examination_id=25 
 Execution Time:0.00023508071899414

select count(*) as cnt from dental_teeth where  examination_id=25 
 Execution Time:0.00022506713867188

select  vis1, vis2, vis3, vis4, vis5, vis6, vis7, vis8, vis9, vis10 from examination where examination_id='25'  
 Execution Time:0.00035500526428223

select  pre1, pre2, pre3, pre4, pre5, pre6, pre7, pre8, pre9, pre10,pre11,pre12 from examination where examination_id='25'  
 Execution Time:0.001255989074707

select  cur1, cur2, cur3, cur4, cur5, cur6, cur7, cur8, cur9, cur10,cur11,cur12,cur13,cur14,cur15,cur16 from examination where examination_id='25'  
 Execution Time:0.00061297416687012

select  obj1, obj2, obj3, obj4, obj5, obj6, obj7, obj8, obj9, obj10,obj11,obj12,obj13,obj14,obj15 from examination where examination_id='25'  
 Execution Time:0.0003199577331543

select  con1, con2, con3, con4, con5, con6, con7, con8, con9, con10,con11,con12,con13,con14,con15,con16 from examination where examination_id='25'  
 Execution Time:0.00040912628173828

select  pmt1, pmt2, pmt3, pmt4, pmt5, pmt6, pmt7, pmt8, pmt9, pmt10,pmt11,pmt12,pmt13,pmt14,pmt15,pmt16 from examination where examination_id='25'  
 Execution Time:0.00042009353637695

select  spe1, spe2, spe3, spe4, spe5, spe6, spe7, spe8, spe9, spe10,spe11,spe12,spe13,spe14,spe15 from examination where examination_id='25'  
 Execution Time:0.00039815902709961

select  man1, man2, man3, man4, man5, man6, man7, man8, man9, man10 from examination where examination_id='25'  
 Execution Time:0.00032496452331543

select  ar1, ar2, ar3, ar4, ar5, ar6, ar7, ar8, ar9, ar10 from examination where examination_id='25'  
 Execution Time:0.00026416778564453

SELECT *
FROM `doctors_registration`
WHERE `doctors_registration_id` = 17 
 Execution Time:0.00029206275939941

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.00030398368835449

SELECT *
FROM `patient_registration`
WHERE `patient_registration_id` = 75 
 Execution Time:0.00031805038452148

SELECT *
FROM `patient_title`
WHERE `patient_title_id` = 22 
 Execution Time:0.00026297569274902

select examination_diagnosis.diagnosis_id,diagnosis.name as dianame,department.name as dename,eye,remarks from examination_diagnosis inner join diagnosis on examination_diagnosis.diagnosis_id=diagnosis.diagnosis_id left join department on diagnosis.department_id=department.department_id where examination_diagnosis.examination_id=25 
 Execution Time:0.00031590461730957

select * from examination_complaints inner join complaints on examination_complaints.complaints_id=complaints.complaints_id where examination_id=25 
 Execution Time:0.00039792060852051

select * from examination_ophthalmic_history inner join ophthalmic_history on examination_ophthalmic_history.ophthalmic_history_id=ophthalmic_history.ophthalmic_history_id where examination_id=25 
 Execution Time:0.00057291984558105

select * from examination_medical_history inner join medical_history on examination_medical_history.medical_history_id=medical_history.medical_history_id where examination_id=25 
 Execution Time:0.0005488395690918

select * from examination_eye inner join eye_complaints on eye_complaints.eye_complaints_id=examination_eye.eye_complaints_id where examination_id=25 
 Execution Time:0.18456411361694

select righteyeparts as righteyeparts ,lefteyeparts as lefteyeparts,righteyepartscheckbox as righteyepartscheckbox,lefteyepartscheckbox as lefteyepartscheckbox,examination_eye_segment.eye_mapping_segment_id,eye_mapping_segment.segment_type_id as segment_type_id,eye_mapping_segment.eye_segment_id,eye_mapping_segment.name as content,eye_segment.name as segment_name from examination_eye_segment inner join eye_mapping_segment on examination_eye_segment.eye_mapping_segment_id=eye_mapping_segment.eye_mapping_segment_id inner join eye_segment on eye_segment.eye_segment_id=eye_mapping_segment.eye_segment_id where examination_eye_segment.examination_id =25 
 Execution Time:0.00046491622924805

select examination_treatmentplan.examination_treatmentplan_id,patient_registration.mobileno,examination_treatmentplan.chargetype_id as plan ,doctors_registration.name as doctorname,DATE_FORMAT(examination_treatmentplan.appointment_date,'%d/%m/%Y') AS appointment_date,examination_treatmentplan.doctor_id,mrdno,examination_treatmentplan.particular_id,eye eye,if(counseling_id=1,'Yes','No') as status,examination.patient_registration_id,CONCAT(fname , ' ',  lname ,'') AS pateint_name from examination_treatmentplan inner join examination on examination.examination_id=examination_treatmentplan.examination_id  inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id
inner join doctors_registration on doctors_registration.doctors_registration_id=examination_treatmentplan.doctor_id
where examination_treatmentplan.counseling_id = 1 and examination_treatmentplan.examination_id =25 
 Execution Time:0.00037693977355957

select medicine_prescription.med_action,medicine_prescription.med_name,ex_ins,ex_no,medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from medicine_prescription left join medicine on medicine_prescription.medicine_id=medicine.medicine_id where medicine_prescription.examination_id='25' and 1='1' 
 Execution Time:0.00032401084899902

select * from examination_chargesdetails where  examination_id= '25' 
 Execution Time:0.00026607513427734

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 19 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00071811676025391

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 20 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00045394897460938

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00045108795166016

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.004241943359375

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 19 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00066304206848145

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00056219100952148

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00066089630126953

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0010371208190918

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.00054597854614258

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.00054597854614258

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select user_id,name from  user where user_type=3 
 Execution Time:0.00047802925109863

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00079607963562012

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0018360614776611

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00098919868469238

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00084710121154785

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0010769367218018

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00073814392089844

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00073695182800293

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00086402893066406

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.0005040168762207

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046420097351074

SELECT *
FROM `user`
WHERE `user_id` = 131 
 Execution Time:0.0005040168762207

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046420097351074

select user_id,name from  user where user_type=3 
 Execution Time:0.00047087669372559

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00050091743469238

select examination.patient_appointment_id,examination.patient_registration_id,DATE_FORMAT(examination_date,'%d/%m/%Y') AS examination_date,examination.confirm_flag,examination.dialysis_con,examination.examination_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,examination.doctor_id  from examination inner join patient_registration on patient_registration.patient_registration_id=examination.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=examination.doctor_id where  examination.examination_date= '2024-04-30'  and   examination.office_id= '1'   and  examination.doctor_id=17 order by examination_id DESC 
 Execution Time:0.00070691108703613

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=75 
 Execution Time:0.00034713745117188

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='75' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.0023269653320312

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00047922134399414

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   order by psychiatrist_process_id DESC 
 Execution Time:0.00073909759521484

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00041604042053223

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00033402442932129

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00055098533630371

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0012340545654297

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00065207481384277

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-29'  and patient_appointment.doctor_id=17  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00077414512634277

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=2  where   appointment_date='2024-04-29'   and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00087618827819824

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.00060796737670898

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.00060796737670898

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00039911270141602

select user_id,name from  user where user_type=3 
 Execution Time:0.0003821849822998

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00040793418884277

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0019960403442383

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.005018949508667

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00084495544433594

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0006411075592041

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00067710876464844

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00037097930908203

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00036501884460449

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00049591064453125

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0006401538848877

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00089311599731445

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00086808204650879

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0010838508605957

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00086688995361328

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00089693069458008

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00054001808166504

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00070405006408691

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.0007479190826416

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00052094459533691

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00047206878662109

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00074005126953125

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-28'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00072407722473145

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00091409683227539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.034553050994873

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.034553050994873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068306922912598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.034553050994873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068306922912598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00092291831970215

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.034553050994873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068306922912598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00092291831970215

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.034553050994873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068306922912598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00092291831970215

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00118088722229

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.34808707237244

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0016739368438721

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00057315826416016

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0015509128570557

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.28129720687866

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.045300006866455

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.034553050994873

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00068306922912598

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00092291831970215

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00118088722229

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0017631053924561

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00065398216247559

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00030088424682617

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00065398216247559

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00030088424682617

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00027990341186523

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051999092102051

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00039100646972656

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00065708160400391

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00030899047851562

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00026798248291016

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00058197975158691

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00026607513427734

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00020909309387207

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00052189826965332

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00037789344787598

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00030112266540527

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0003659725189209

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00082111358642578

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-29'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00069284439086914

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0012130737304688

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0009300708770752

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00057506561279297

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00072884559631348

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00034284591674805

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00026798248291016

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00076103210449219

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00040507316589355

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00031590461730957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0020430088043213

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0020430088043213

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0020430088043213

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0012168884277344

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00072288513183594

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043988227844238

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00082802772521973

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00087404251098633

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0020430088043213

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00061893463134766

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00045919418334961

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00060081481933594

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00025391578674316

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00026583671569824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00032401084899902

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00028300285339355

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00038599967956543

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00037193298339844

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00038290023803711

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035905838012695

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071501731872559

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00040602684020996

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0004119873046875

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00038909912109375

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00035214424133301

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.0018589496612549

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.0002598762512207

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00016593933105469

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00058317184448242

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00035500526428223

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.0002739429473877

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00037693977355957

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00037693977355957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.0005338191986084

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043201446533203

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00055289268493652

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00046086311340332

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00054693222045898

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040006637573242

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0007479190826416

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00037693977355957

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00044703483581543

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00057697296142578

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0005800724029541

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00033998489379883

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0010190010070801

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00087904930114746

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00081300735473633

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00064706802368164

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00033998489379883

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00029206275939941

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045418739318848

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045418739318848

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068807601928711

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045418739318848

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068807601928711

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045418739318848

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068807601928711

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00051689147949219

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00036001205444336

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0003669261932373

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00041604042053223

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0003819465637207

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00030303001403809

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00045418739318848

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00068807601928711

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00039005279541016

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029706954956055

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00054502487182617

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00028800964355469

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='5' 
 Execution Time:0.00054502487182617

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00028800964355469

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00028204917907715

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0005638599395752

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00089478492736816

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00062298774719238

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00028395652770996

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00073719024658203

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00043296813964844

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00020790100097656

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00066804885864258

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-29'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00068306922912598

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00049614906311035

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00049591064453125

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.010939121246338

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0020821094512939

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.010939121246338

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0020821094512939

select user_id,name from  user where user_type=3 
 Execution Time:0.00047802925109863

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00050187110900879

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.005094051361084

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0078489780426025

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.050112962722778

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.050112962722778

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039483070373535

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.050112962722778

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039483070373535

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.005450963973999

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.050112962722778

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039483070373535

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.005450963973999

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.092959880828857

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.050112962722778

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039483070373535

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.005450963973999

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.092959880828857

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.025107860565186

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.039145946502686

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0087838172912598

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.023725986480713

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.014168977737427

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.023382902145386

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.025094985961914

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.050112962722778

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.039483070373535

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.005450963973999

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.092959880828857

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.025107860565186

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.019804000854492

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='4' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00068092346191406

select medicine.category_id,medicine.name as drugname,medicine_instruction.name as instruction,days from  medicine inner join medicine_instruction on medicine.medicine_instruction_id=medicine_instruction.medicine_instruction_id where medicine_id='14' and  medicine.office_id= '1' and medicine.status=1 
 Execution Time:0.00043177604675293

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00056314468383789

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00083398818969727

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00058579444885254

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-30'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.002626895904541

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00038003921508789

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.011861085891724

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075888633728027

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075888633728027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043678283691406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075888633728027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043678283691406

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00055313110351562

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00042295455932617

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00055789947509766

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00053215026855469

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0004429817199707

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00075888633728027

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00043678283691406

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00040888786315918

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00021791458129883

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0007328987121582

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0007328987121582

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033020973205566

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00033283233642578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044417381286621

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044417381286621

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071287155151367

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044417381286621

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071287155151367

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044417381286621

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071287155151367

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00059604644775391

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00063395500183105

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00036716461181641

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0004420280456543

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00044417381286621

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00071287155151367

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00047397613525391

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00074100494384766

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.00058889389038086

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.00058889389038086

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00031304359436035

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0002140998840332

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0006859302520752

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00071215629577637

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00056695938110352

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00084590911865234

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00089383125305176

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097894668579102

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097894668579102

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097894668579102

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00048685073852539

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00043892860412598

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00048613548278809

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00035691261291504

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00097894668579102

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00049996376037598

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00057196617126465

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00043106079101562

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.00078606605529785

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.00078606605529785

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032806396484375

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00026512145996094

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055885314941406

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055885314941406

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055885314941406

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038790702819824

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055885314941406

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038790702819824

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046014785766602

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00050115585327148

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00043296813964844

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00039982795715332

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00046110153198242

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00043582916259766

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00055885314941406

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0006871223449707

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00038790702819824

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00046014785766602

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00023388862609863

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0006709098815918

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0007319450378418

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0006709098815918

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0007319450378418

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00032305717468262

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078606605529785

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078606605529785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078606605529785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00047993659973145

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00030899047851562

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00043511390686035

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.00040292739868164

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.00032591819763184

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00036501884460449

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00047016143798828

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00078606605529785

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00045299530029297

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00043082237243652

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00029301643371582

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0006859302520752

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046896934509277

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0006859302520752

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00046896934509277

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00034093856811523

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0004270076751709

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-30'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00067019462585449

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00036883354187012

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00029301643371582

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00041294097900391

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 2 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00056982040405273

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 2 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00059103965759277

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0003969669342041

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-30'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.00067806243896484

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.00035691261291504

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00031304359436035

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00060892105102539

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.0010199546813965

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00055694580078125

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.0005338191986084

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00057101249694824

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00049901008605957

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00049805641174316

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00052523612976074

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00048208236694336

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00060415267944336

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046896934509277

select psychiatrist_process.patient_appointment_id,psychiatrist_process.patient_registration_id,DATE_FORMAT(psychiatrist_date,'%d/%m/%Y') AS psychiatrist_date,psychiatrist_process.psychiatrist_process_id,doctors_registration.name as doctorname,CONCAT(fname , ' ',  lname ,'') AS pateint_name,mrdno,gender,ageyy,agemm,patient_registration.mobileno,psychiatrist_process.doctor_id  from psychiatrist_process inner join patient_registration on patient_registration.patient_registration_id=psychiatrist_process.patient_registration_id left join doctors_registration on doctors_registration.doctors_registration_id=psychiatrist_process.doctor_id where  psychiatrist_process.psychiatrist_date= '2024-04-30'  and   psychiatrist_process.office_id= '1'   and  psychiatrist_process.doctor_id=18 order by psychiatrist_process_id DESC 
 Execution Time:0.0022709369659424

select count(*) as cnt from patient_appointment  where 

                         patient_registration_id=74 
 Execution Time:0.0003361701965332

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='74' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00083208084106445

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00094199180603027

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00055789947509766

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00038313865661621

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00042390823364258

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00053882598876953

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00055694580078125

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00038290023803711

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0004420280456543

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0004420280456543

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046586990356445

select user_id,name from  user where user_type=3 
 Execution Time:0.00022697448730469

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00054788589477539

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00071191787719727

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00050497055053711

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00029706954956055

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00069808959960938

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-27'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0010969638824463

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0011310577392578

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0011310577392578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00098299980163574

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0011310577392578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00098299980163574

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012519359588623

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0011310577392578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00098299980163574

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012519359588623

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0011310577392578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00098299980163574

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012519359588623

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00068998336791992

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.0003049373626709

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00076413154602051

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0011520385742188

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0010330677032471

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.0011727809906006

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.0011310577392578

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.00098299980163574

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.0012519359588623

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00048184394836426

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00060009956359863

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00063920021057129

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0006711483001709

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003511905670166

select psychiatrist_medicine_prescription.med_action,psychiatrist_medicine_prescription.med_name,psychiatrist_medicine_prescription.ex_ins,psychiatrist_medicine_prescription.ex_no,medicine.category_id,psychiatrist_medicine_prescription.medicine_id,medicine.name as drugname,instruction,nodays,qty,sdate as ssdate,DATE_FORMAT(sdate,'%d/%m/%Y') AS sdate,DATE_FORMAT(tdate,'%d/%m/%Y') AS tdate,tdate as ttdate,med_eye from psychiatrist_medicine_prescription left join medicine on psychiatrist_medicine_prescription.medicine_id=medicine.medicine_id where psychiatrist_medicine_prescription.psychiatrist_process_id='1' 
 Execution Time:0.0006711483001709

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.0003511905670166

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00024509429931641

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00048089027404785

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00083804130554199

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00051784515380859

select appointment_date,patient_appointment_id from patient_appointment where  patient_registration_id= 74 order by patient_appointment_id DESC limit 1 
 Execution Time:0.00044393539428711

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0010581016540527

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00078606605529785

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.0010581016540527

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00078606605529785

select user_id,name from  user where user_type=3 
 Execution Time:0.00055193901062012

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00069403648376465

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0022931098937988

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00041794776916504

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00040984153747559

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00033116340637207

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00033116340637207

select user_id,name from  user where user_type=3 
 Execution Time:0.00027990341186523

select * from doctor_department where  office_id= '1' and status=1 
 Execution Time:0.0046131610870361

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0022070407867432

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0022070407867432

select user_id,name from  user where user_type=3 
 Execution Time:0.00043296813964844

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.0053131580352783

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.0053131580352783

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.0053131580352783

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.0053131580352783

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.001690149307251

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.0053131580352783

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.001690149307251

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.0008699893951416

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.0022389888763428

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036883354187012

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.0017349720001221

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.0010437965393066

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0013470649719238

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.0019218921661377

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.0053131580352783

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00064301490783691

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00037002563476562

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.001690149307251

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.0008699893951416

select pat_reg_billprint,app_type,pat_mod from  office where  office_id= '1' 
 Execution Time:0.00051593780517578

select modeofpay_id ,name from  modeofpay where  office_id= '1' and status=1 
 Execution Time:0.010036945343018

select count(*) as cnt from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00054597854614258

select count(*) as cnt from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00054597854614258

select gender from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00033092498779297

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00037002563476562

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00037002563476562

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00037002563476562

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00037002563476562

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00057101249694824

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00037002563476562

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00057101249694824

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00044584274291992

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.0010108947753906

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00096797943115234

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00039291381835938

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00044608116149902

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00039410591125488

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00037002563476562

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.0005791187286377

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00040197372436523

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00057101249694824

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00063514709472656

select pat_reg_billprint,app_type,pat_mod from  office where  office_id= '1' 
 Execution Time:0.00044393539428711

select modeofpay_id ,name from  modeofpay where  office_id= '1' and status=1 
 Execution Time:0.00098204612731934

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0004279613494873

select user_id,name from  user where user_type=3 
 Execution Time:0.00026798248291016

SELECT patient_appointment.description,token_no,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='2024-04-30'  and  patient_registration.office_id= '1' and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00080204010009766

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=76 
 Execution Time:0.00049304962158203

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=76  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00036501884460449

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='76' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00032401084899902

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00054192543029785

select user_id,name from  user where user_type=3 
 Execution Time:0.0003199577331543

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00042414665222168

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00042414665222168

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00042414665222168

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00042414665222168

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00061607360839844

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00042414665222168

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00061607360839844

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00048708915710449

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00024294853210449

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00037503242492676

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00046610832214355

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.00048303604125977

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00055408477783203

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00042414665222168

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00046801567077637

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00046396255493164

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00061607360839844

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00075101852416992

select pat_reg_billprint,app_type,pat_mod from  office where  office_id= '1' 
 Execution Time:0.0004279613494873

select modeofpay_id ,name from  modeofpay where  office_id= '1' and status=1 
 Execution Time:0.00020885467529297

select count(*) as cnt from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00034999847412109

select count(*) as cnt from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00034999847412109

select gender from patient_title where  patient_title_id = '22' and office_id= '1' 
 Execution Time:0.00031709671020508

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00056910514831543

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00056910514831543

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00056910514831543

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00056910514831543

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00055313110351562

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00056910514831543

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00055313110351562

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00064206123352051

select patient_title_id,name from patient_title where  office_id= '1' and status=1 
 Execution Time:0.00059413909912109

select name,complaints_id from complaints where  office_id= '1' and status=1 
 Execution Time:0.00036907196044922

select city_id,name from city where  office_id= '1' and status=1 
 Execution Time:0.00043010711669922

select source_id,name from source where  office_id= '1' and status=1 
 Execution Time:0.00052905082702637

select 	name,pincode,area_id from  	area where  office_id= '1' and status=1 
 Execution Time:0.0015878677368164

select referral_master_id,name from referral_master where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select insurance_company_id,name from insurance_company where  office_id= '1' and status=1 and charge_id in (1,2) 
 Execution Time:0.00056910514831543

select patient_category_id,name from  patient_category where  office_id= '1' and status=1 
 Execution Time:0.00048995018005371

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00045585632324219

select appointment_type_id,name from appointment_type where  office_id= '1' and status=1 and appointment_type_id in (select appointment_type_id from opdcharge) 
 Execution Time:0.00055313110351562

select patient_registration_id,mrdno,CONCAT(`fname`,' ', `lname`) AS pname,mobileno,address from  patient_registration where  office_id= '1' and status=1 
 Execution Time:0.00064206123352051

select pat_reg_billprint,app_type,pat_mod from  office where  office_id= '1' 
 Execution Time:0.00053501129150391

select modeofpay_id ,name from  modeofpay where  office_id= '1' and status=1 
 Execution Time:0.0011749267578125

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select user_id,name from  user where user_type=3 
 Execution Time:0.00027704238891602

SELECT patient_appointment.description,token_no,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='2024-04-30'  and  patient_registration.office_id= '1' and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00090599060058594

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=77 
 Execution Time:0.00044798851013184

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=77  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00035691261291504

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='77' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00030708312988281

SELECT patient_appointment.description,token_no,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='2024-04-30'  and  patient_registration.office_id= '1' and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00090599060058594

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=77 
 Execution Time:0.00044798851013184

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=77  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00035691261291504

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='77' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00030708312988281

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=76 
 Execution Time:0.00020194053649902

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=76  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00026297569274902

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='76' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00028395652770996

SELECT patient_appointment.description,token_no,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='2024-04-30'  and  patient_registration.office_id= '1' and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00088810920715332

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=77 
 Execution Time:0.00039911270141602

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=77  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00033402442932129

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='77' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00029897689819336

SELECT patient_appointment.description,token_no,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id where   appointment_date='2024-04-30'  and  patient_registration.office_id= '1' and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.00088810920715332

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=77 
 Execution Time:0.00039911270141602

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=77  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00033402442932129

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='77' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.00029897689819336

select count(*) as cnt from patient_appointment  where 
	    				 patient_registration_id=76 
 Execution Time:0.00023913383483887

select doctors_registration.name as doctorname,doctor_department_id from patient_appointment inner join doctors_registration on patient_appointment.doctor_id=doctors_registration.doctors_registration_id where 
	    				 patient_registration_id=76  order by patient_appointment.patient_appointment_id DESC 
 Execution Time:0.00038790702819824

select b.name as source from patient_appointment a inner join source b on a.source=b.source_id  where  patient_registration_id='76' and  office_id= '1' order by a.patient_appointment_id ASC limit 1 
 Execution Time:0.0003669261932373

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select 	typeoflength_id,name from  	typeoflength where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select 	typeoflength_id,name from  	typeoflength where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select 	coating_id,name from  	coating where  office_id= '1' and status=1 
 Execution Time:0.00084900856018066

select staff_id,name from staff where   status=1 
 Execution Time:0.002241849899292

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.002856969833374

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00058913230895996

select department_id,name from department where  office_id= '1' and status=1 
 Execution Time:0.0018031597137451

select name,eye_complaints_id,if(status=1,'Active','Deactive') as status from eye_complaints where  office_id= '1' and status=1 
 Execution Time:0.00079512596130371

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00035810470581055

select dialysis_id,name from dialysis where  office_id= '1' and status=1 
 Execution Time:0.00034403800964355

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.left_eye=eye_details.eye_details_id WHERE eye_type=1 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00091791152954102

select eye_details.name,eye_particular.eye_particular_id,eye_complaints_id from eye_particular INNER JOIN eye_details on eye_particular.right_eye=eye_details.eye_details_id WHERE eye_type=2 and eye_particular.status=1 and eye_details.status=1 
 Execution Time:0.00037503242492676

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.0005650520324707

select specilaity_id,name from  specilaity where  office_id= '1' and status=1 
 Execution Time:0.00053906440734863

select 	usage_ex_id,name from  	usage_ex where  office_id= '1' and status=1 
 Execution Time:0.0005490779876709

select 	typeoflength_id,name from  	typeoflength where  office_id= '1' and status=1 
 Execution Time:0.00048589706420898

select 	coating_id,name from  	coating where  office_id= '1' and status=1 
 Execution Time:0.00084900856018066

SELECT *
FROM `patient_registration`
WHERE `patient_registration_id` = 76 
 Execution Time:0.00045108795166016

SELECT *
FROM `patient_appointment`
WHERE `patient_appointment_id` = 76 
 Execution Time:0.00022983551025391

select bp,sugar,temprature from whitecell where  patient_appointment_id=76  and patient_registration_id=76 order by whitecell_id desc limit 1 
 Execution Time:0.00063800811767578

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00019097328186035

select count(*) as cnt from ipdcharge where  office_id= 1 and status=1 
 Execution Time:0.00093293190002441

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.021056890487671

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00057578086853027

SELECT *
FROM `user`
WHERE `user_id` = 128 
 Execution Time:0.021056890487671

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00057578086853027

select user_id,name from  user where user_type=3 
 Execution Time:0.00038599967956543

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.00073695182800293

SELECT gender,doctors_registration.name as doctorname,rooming,ageyy,complaints.name as compname,DATE_FORMAT(appointment_date,'%d/%m/%Y') AS appointment_date,appointment_date as adate,appointment_time,mrdno,patient_appointment.patient_registration_id,title,CONCAT(fname , ' ',  lname ,'') AS pateint_name,DATE_FORMAT(dob,'%d/%m/%Y') AS dateofbirth,patient_registration.mobileno,if(patient_registration.status=1,'Active','Deactive') as status,patient_appointment_id FROM patient_registration inner join  patient_appointment on  patient_registration.patient_registration_id=patient_appointment.patient_registration_id  left join complaints on patient_appointment.complaints_id=complaints.complaints_id inner join doctors_registration on doctors_registration.doctors_registration_id=patient_appointment.doctor_id and doctor_department_id=3  where   appointment_date='2024-04-30'  and patient_appointment.doctor_id=18  and cancel_flag=0 and patient_appointment_id not in (select patient_appointment_id from examination) order by patient_appointment_id DESC 
 Execution Time:0.0011889934539795

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062298774719238

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062298774719238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062298774719238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084280967712402

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062298774719238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084280967712402

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062298774719238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084280967712402

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  cheif_complaints where  office_id= '1' and status=1 
 Execution Time:0.00065803527832031

select name from  past_psychiatrist_illness where  office_id= '1' and status=1 
 Execution Time:0.00077581405639648

select name from  past_medical_surgery where  office_id= '1' and status=1 
 Execution Time:0.00052499771118164

select name from  family_history_disease where  office_id= '1' and status=1 
 Execution Time:0.0006101131439209

select name from  informant where  office_id= '1' and status=1 
 Execution Time:0.0011579990386963

select name from  advice where  office_id= '1' and status=1 
 Execution Time:0.00054502487182617

select name from  family_relation where  office_id= '1' and status=1 
 Execution Time:0.00062298774719238

select name from  personal_history where  office_id= '1' and status=1 
 Execution Time:0.0005030632019043

select diagnosis_id,name from  diagnosis   where  office_id= '1' and status=1 
 Execution Time:0.00084280967712402

select medicine_templates_id,name from  medicine_templates where  office_id= '1' and status=1 
 Execution Time:0.00050687789916992

select medicine_id,name from  medicine where  office_id= '1' and status=1 
 Execution Time:0.00056099891662598

select name from  medicine_instruction where   office_id= '1' and status=1 
 Execution Time:0.00041508674621582

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0014748573303223

select doctors_registration_id,name from doctors_registration where  office_id= '1' and status=1 
 Execution Time:0.0014748573303223

select user_id,name from  user where user_type=3 
 Execution Time:0.00063800811767578

