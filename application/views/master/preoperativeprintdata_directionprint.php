
<html>

    <body>
     
             <table  width="100%" style="line-height:22px;" >
                <tr>
                        <td style="width:5%;">
                            <?=$logo?>
                        </td>
                    <td  style="text-align:center;width:95%" valign="middle">
                        <h3><?=$company_name?></h3>
                        <p><?=nl2br($company_address)?>   </p>
                        <p>T:<?=$company_land_phone?>|Mob:<?=$company_mobile?></p>
                        <p>E:<?=$company_email?><br/><b><?php if($gstin_no){ ?>GSTIN NO:<?=$gstin_no?> <?php } ?></b></p>
                        <?php if($website){ ?><p>Web:<?=$website?></p><?php } ?>
                        <?php if($facebook){ ?><p>FB:<?=$facebook?></p><?php } ?>
                        <?php if($youtube){ ?><p>Y:<?=$youtube?></p><?php } ?>
                    </td>
                   
                </tr>
            </table>
    
       <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border-top: 1px solid black;border-bottom: 1px solid black">
                <tr>
                    
           <td style="width:27%;line-height:10px;text-align:center;font-weight:bold;">
                    <h4>&nbsp;PREOPERATIVE APPOINTMENT</h4>
                   </td>
                    
                </tr>
        </table>
             
         <table   width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
          <tr>
                    <td style="line-height:15px;text-align: left;width:10%;">MRD No</td>
                    <td style="line-height:15px;text-align: left;width:40%">: <strong><?=$mrdno?></strong></td> 
                     <td style="line-height:15px;text-align: center;width:20%;">Preoperative Date</td>
                    <td style="line-height:15px;text-align: left;width:25%">: <?=$appointment_date?></td> 
                </tr> 
                
              </table>
              <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
                <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Patient Name</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?>  Age/Sex: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> / <?=$gender;  ?></strong></td>
                    <td style="line-height:15px;text-align: center;width:17%;">Contact Number</td>
                    <td style="line-height:15px;text-align: left;width:23%;">: <?=$mobileno?>  </td>
                </tr>
         
                <tr>
                     
                    <td style="line-height:15px;text-align: left;width:15%;">Patient Address</td>
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">: <?=$address?> </td>
                </tr>
         </table>
              <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border:  1px solid black"> 
                  <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Doctor Name</td>
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">:  <?=$doctorname;  ?></td> 
                </tr>
               </table>
                <br/>
               <table  width="100%" style="line-height:20px;margin-top:0px;font-size: 16;"> 
                        <tr>
                            <td style="width:15%;">INVESTIGATION:</td>
                            <td style="width:35%;"> <?=$investigation;  ?></td>
                            <td style="width:15%;">SYSTEMIC:</td>
                            <td style="width:35%;"> <?=$systemic;  ?></td>
                        </tr>
                </table>
               
  <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
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
                            <td><?=$fir1;  ?></td>
                            <td><?=$fir2;  ?></td>
                            <td><?=$fir3;  ?></td>
                            <td rowspan="2" colspan="1"><?=$fir7;  ?></td>
                        </tr>
                         <tr>
                            <td>LE</td>
                            <td><?=$fir4;  ?></td>
                            <td><?=$fir5;  ?></td>
                            <td><?=$fir6;  ?></td>
                           
                        </tr>
                    </tbody>
                </table>
                <h4>A-SCAN BIOMETRY REPORT</h4>
                 <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;"></th>
                             <th style="padding: 0.5%;">RE</th>
                             <th style="padding: 0.5%;">LE</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td style="padding: 0.5%;">K1</td>
                            <td><?=$k1r1;  ?></td>
                            <td><?=$k1l1;  ?></td>
                        </tr>
                         <tr>
                            <td style="padding: 0.5%;">K2</td>
                            <td><?=$k2r1;  ?></td>
                            <td><?=$k2l1;  ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5%;">AXL/SD</td>
                            <td><?=$ax1;  ?></td>
                            <td><?=$ax2;  ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5%;">ACD/SD</td>
                            <td><?=$acd1;  ?></td>
                            <td><?=$acd2;  ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5%;">LT</td>
                            <td><?=$lt1;  ?></td>
                            <td><?=$lt2;  ?></td>
                        </tr>
                    </tbody>
                </table>
             <h4>FORMULA:&nbsp;&nbsp;<?=$formula;  ?></h4>
             <h4>RE:&nbsp;&nbsp;<?=$re;  ?></h4>
            <table width="100%">
            <tr>
                <td style="width: 33.33%;">
                      <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                        <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;" colspan="2"><?=$fir_resec1;  ?></th>
                         </tr>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;">IOL</th>
                             <th style="padding: 0.5%;">REF</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td><?=$iol1;  ?></td>
                            <td><?=$iol2;  ?></td>
                        </tr>
                         <tr>
                            <td><?=$iol3;  ?></td>
                            <td><?=$iol4;  ?></td>
                        </tr>
                        <tr>
                            <td><?=$iol5;  ?></td>
                            <td><?=$iol6;  ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                </td>
                <td style="width: 33.33%;">
                    <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                        <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;" colspan="2"><?=$fir_resec2;  ?></th>
                         </tr>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;">IOL</th>
                             <th style="padding: 0.5%;">REF</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td><?=$iol7;  ?></td>
                            <td><?=$iol8;  ?></td>
                        </tr>
                         <tr>
                            <td><?=$iol9;  ?></td>
                            <td><?=$iol10;  ?></td>
                        </tr>
                        <tr>
                            <td><?=$iol11;  ?></td>
                            <td><?=$iol12;  ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                </td>
                <td style="width: 33.33%;">
                       <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                        <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;" colspan="2"><?=$fir_resec3;  ?></th>
                         </tr>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;">IOL</th>
                             <th style="padding: 0.5%;">REF</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td><?=$iol13;  ?></td>
                            <td><?=$iol14;  ?></td>
                        </tr>
                         <tr>
                            <td><?=$iol15;  ?></td>
                            <td><?=$iol16;  ?></td>
                        </tr>
                        <tr>
                            <td><?=$iol17;  ?></td>
                            <td><?=$iol18;  ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                </td>
            </tr>
        </table>
         <h4>LE:&nbsp;&nbsp;<?=$le;  ?></h4>
            <table width="100%">
            <tr>
                <td style="width: 33.33%;">
                      <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                        <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;" colspan="2"><?=$sec_resec1;  ?></th>
                         </tr>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;">IOL</th>
                             <th style="padding: 0.5%;">REF</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td><?=$liol1;  ?></td>
                            <td><?=$liol2;  ?></td>
                        </tr>
                         <tr>
                            <td><?=$liol3;  ?></td>
                            <td><?=$liol4;  ?></td>
                        </tr>
                        <tr>
                            <td><?=$liol5;  ?></td>
                            <td><?=$liol6;  ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                </td>
                <td style="width: 33.33%;">
                    <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                        <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;" colspan="2"><?=$sec_resec2;  ?></th>
                         </tr>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;">IOL</th>
                             <th style="padding: 0.5%;">REF</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td><?=$liol7;  ?></td>
                            <td><?=$liol8;  ?></td>
                        </tr>
                         <tr>
                            <td><?=$liol9;  ?></td>
                            <td><?=$liol10;  ?></td>
                        </tr>
                        <tr>
                            <td><?=$liol11;  ?></td>
                            <td><?=$liol12;  ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                </td>
                <td style="width: 33.33%;">
                       <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                        <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;" colspan="2"><?=$sec_resec3;  ?></th>
                         </tr>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="padding: 0.5%;">IOL</th>
                             <th style="padding: 0.5%;">REF</th>
                         </tr>
                     </thead>
                    <tbody>
                        <tr >
                            <td><?=$liol13;  ?></td>
                            <td><?=$liol14;  ?></td>
                        </tr>
                         <tr>
                            <td><?=$liol15;  ?></td>
                            <td><?=$liol16;  ?></td>
                        </tr>
                        <tr>
                            <td><?=$liol17;  ?></td>
                            <td><?=$liol18;  ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                </td>
            </tr>
        </table>
               <br/><br/><br/><br/>
             <table style="width:100%;font-size: 12px;">
              <tr>
                 <td colspan="10" align="right">
                       <br>
                       Authorised Signatory
                    </td>
              </tr>
             </table>
             <br/>


        </div>
    </body>

</html>