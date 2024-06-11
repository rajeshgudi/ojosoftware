
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
                    <h4>&nbsp;CONSULTATION BILL</h4>
                   </td>
                    
                </tr>
        </table>
             
         <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
          <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">MRD No</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$mrdno?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Time</td>
                    <td style="line-height:15px;text-align: left;width:23%;">:<?=date('h:i:s A', strtotime($appointment_time));?></td>
                </tr> 
                 <tr>
                     <td style="line-height:15px;text-align: left;width:15%;"><strong>Bill No</strong></td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$invoice_number?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Bill Date</td>
                    <td style="line-height:15px;text-align: left;width:23%">: <?=$appointment_date?></td> 
                    
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
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">: Dr: <?=$doctorname;  ?></td> 
                </tr>
               </table>
               <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
                
                </table>
                
               <br>
            
             <table  width="100%" style="line-height:15px;font-size: 12;height: 100%;border-left: 1px solid black;border-right:  1px solid black;border-top: 1px solid black" >
                <tr>
                    <td style="border-bottom:1px solid black;width:10%;border-right:  1px solid black">Sl NO</td>  
                    <td style="border-bottom:1px solid black;width:70%;border-right:  1px solid black">Particular</td> 
                    <td style="border-bottom:1px solid black;text-align: right;">Amount</td>
                   
                </tr>
              
                 <tr>
            <td align="left" style="border-bottom: 1px solid black;border-right:  1px solid black">1.</td>
            <td style="border-bottom: 1px solid black;border-right:  1px solid black"><?=$opdcharge?></td>
            <td style="border-bottom: 1px solid black;text-align: right;"><?=number_format($amount,2)?></td>
        </tr>
                
            


        
     
                 </table>
 <br>
            <table style="width:100%;font-size: 14px;">
                <tr>
                    <td style="width: 60%">
                        Total Package Amount: <?=number_format($amount,2)?><br>
                        Amount Paid by Patient: <?=number_format($amount,2)?><br>
                        <?=$mode?>: <?=number_format($amount,2)?><br>
                        Terms and Conditions:NB: <?=number_format($amount,2)?>/-(<?=$net_amount_in_words?>) was directly collected from patient.
                    </td>
                 </tr>
            </table>
            <br/><br/><br/><br/>
             <table style="width:100%;font-size: 12px;">
              <tr>
                 <td colspan="10">
                       <?=$username;  ?><br>
                       Authorised Signatory
                    </td>
              </tr>
             </table>
            
            
        </div>
    </body>
</html>