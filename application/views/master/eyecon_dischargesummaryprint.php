<html>
    <body>
        <?php
        $fontsize='14px';
       $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
    if($host_tvm!='nobelemr')
   { ?>
              <table  width="100%" style="line-height:22px;" >
                <tr>
                        <td style="width:10%;">
                            <?=$logo?>
                        </td>
                    <td  style="text-align:center;width:80%" valign="middle">
                        <h3><?=$company_name?></h3>
                        <p><?=$company_address?>   </p>
                        <p>T:<?=$company_land_phone?>|Mob:<?=$company_mobile?></p>
                        <p>E:<?=$company_email?><br/><b><?php if($gstin_no){ ?>GSTIN NO:<?=$gstin_no?> <?php } ?></b></p>
                        <?php if($website){ ?><p>Web:<?=$website?></p><?php } ?>
                        <?php if($facebook){ ?><p>FB:<?=$facebook?></p><?php } ?>
                        <?php if($youtube){ ?><p>Y:<?=$youtube?></p><?php } ?>
                    </td>
                    <?php if($nabh_logo){ ?>
                    <td style="width:10%;">
                        <?=$nabh_logo?>
                    </td>
                <?php } ?>
                </tr>
            </table>
       
   
            <?php }
  
    
    if($host_tvm=='nobelemr')
   {
$fontsize='11px';
    ?>

<br/><br/><br/><br/><br/>
<?php
}
             ?> 
             <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border-top: 1px solid black;border-bottom: 1px solid black">
                <tr>
                    
           <td style="width:27%;line-height:10px;text-align:center;font-weight:bold;">
                    <h4>&nbsp;DISCHARGE SUMMARY</h4>
                   </td>
                    
                </tr>
        </table>
              <table  width="100%" style="line-height:1px;margin-top:0px;font-size: <?php echo $fontsize; ?>;border: 1px solid black"> 
                <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">MRD No</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$mrdno?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Contact Number</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: <?php echo $fontsize; ?>">: <?=$mobileno?>  </td>
                </tr>
         
                <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Patient Name</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?>  Age/Sex: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> / <?=$gender;  ?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;"></td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: <?php echo $fontsize; ?>">  </td>
                </tr>
         </table>
              
               
                <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;border:  1px solid black"> 
                  <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Doctor Name</td>
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">: Dr: <?=$doctorname;  ?></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Discharge Date</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: <?php echo $fontsize; ?>">: <?=$discharge_date?>  </td>
                </tr>
              
               </table>
               <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;border:  1px solid black"> 
                 
                <tr>
                    <td style="line-height:15px;text-align: left;width:20%;">Date of Admission</td>
                    <td colspan="3" style="line-height:15px;text-align: left;width:30%">: <?=$dateofad;  ?></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Surgery Date</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: <?php echo $fontsize; ?>">: <?=$datesur?>  </td>
                </tr>
               </table>
               <br>
            
            <div class="row">
                 <div class="hytclass">
                 <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;"> 
                     <tr>
                         <td class="cls1">Systemic Condition</td>
                         <td class="cls2 cc" >: <?=$medicalhistory?> </td>
                     </tr>
                     <tr>
                         <td  class="cls1">Diagnosis</td>
                         <td class="cls2 cc">: <?=$diagnosis?> </td>
                     </tr>
                     <tr>
                         <td  class="cls1">Surgical Procedure</td>
                         <td class="cls2 cc">: <?=$surgical_procedure?> </td>
                     </tr>
                     <tr>
                         <td  class="cls1">Recovery During Hospital Stay</td>
                         <td class="cls2 cc">: <?=$recovery?> </td>
                     </tr>
                     <tr>
                         <td  class="cls1">Condition at the time of discharge</td>
                         <td class="cls2">: <?=$conditionofthetime?> </td>
                     </tr>
                        <?php
$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0]; 
if($host_tvm!='eyecon'){ ?>
                      <tr>
                         <td  class="cls1">BP</td>
                         <td class="cls2">: <?=$pp?> ,Sugar:<?=$sugar?></td>
                     </tr>
                     <tr>
                         <td  class="cls1">IOL</td>
                         <td class="cls2">: <?=$iol?> </td>
                     </tr>
                     <tr>
                         <td  class="cls1">K-Reading</td>
                         <td class="cls2">: <?=$kreading?> </td>
                     </tr>
                      <?php } ?>
                     <?php
$host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0]; 
if($host_tvm=='eyecon'){ ?>
                      <tr>
                        <td  class="cls1" style="text-decoration: underline;"><b>Preoperative Vision</b></td>
                       
                     </tr>
                     <tr>
                         <td  class="cls1"></td>
                         <td class="cls2">
<?=$prvis?>
                          </td>
                     </tr>
                   
                      <tr>
                         <td  class="cls1" style="text-decoration: underline;"><b>Preoperative Diagnosis</b></td>
                        
                     </tr>
                      <tr>
                         <td  class="cls1"></td>
                         <td class="cls2">  <?=$prod_eye?> </td>
                     </tr>
                 <?php } ?>
                     <tr>
                         <td  class="cls1">Follow Up Medications:</td>
                     </tr>
                </table>
                <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;border:  1px solid black;border-collapse: collapse;" border="1"> 
                    <tr>
                        <th class="cls3" style="width:35%">Medicine Name</th>
                        <th style="width:60%">Instruction</th>
                       
                        <th style="width:5%">Eye</th>
                        
                    </tr>
                    <tbody>
                        <?php if($medi){
                            foreach($medi as $dataval)
                            {
                                ?>
                                    <tr>
                                        <td valign="top" class="cls5"><?php echo $dataval['name']; ?></td>
                                        <td valign="top" class="cls5"><?php echo nl2br($dataval['instruction']); ?><br/><?php echo nl2br($dataval['description']); ?></td>
                                       <td valign="top" class="cls5"><?php echo $dataval['eye']; ?></td>
                                     
                                    </tr>
                                <?php
                            }
                        }
                       ?>
                    </tbody>
                </table>

                <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;"> 
                     <tr>
                         <td class="cls1"><b>Next Visit Date:<?=$nextvisit_date?> </b></td>
                        
                     </tr>
                    
                </table>
              
                <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;"> 
                     <tr>
                         <td class="cls6"><?=$content?> </td>
                        
                     </tr>
                    
                </table>


               
                <table  width="100%" style="line-height:10px;margin-top:0px;font-size: <?php echo $fontsize; ?>;"> 
                     <tr>
                         <td class="cls41">Doctor Name: <?=$doctorname;  ?></td>
                         <td class="cls42">Date:<?=$tdate?> </td>
                     </tr>
                     <tr>
                         <td class="cls4">Signature of Doctor </td>
                         <td class="cls42">Hospital Seal </td>
                     </tr>
                </table>


                 </div>
            </div>
 
           
            
            
        </div>
    </body>
    <style>
       
        .hytclass
        {
            height:500px;
            border:1px solid black;
        }
        .col-md-4
        {
            width:40%;
        }
        .col-md-8
        {
            width:60%;
        }
        .cc
        {
            line-height:15px;
        }
        .col-md-12
        {
            width:100%;
            display: flex;
            flex-wrap: wrap;
           
        }
        .cls1
        {
            width:40%;
            padding:10px;
        }
        .cls2
        {
            width:60%;
            padding:10px;
        }
        .cls3
        {
            border-right:1px solid black;
            padding:10px;
        }
        .cls4
        {
           
            width:25%;
           
        }
        .cls5
        {
            padding:5px;
            line-height:15px;
            width:25%;
        }
        .cls6
        {
            width:100%;
            line-height:20px;
        }
        .cls41
        {
            padding:10px;
            width:70%;
        }
        .cls42
        {
            padding:10px;
            width:30%;
        }
    </style>
</html>