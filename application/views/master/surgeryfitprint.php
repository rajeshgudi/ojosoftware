
<html>
    <body>
       <?php if($headerprint==1){ ?>
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
       <?php } ?>
       <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border-top: 1px solid black;border-bottom: 1px solid black">
                <tr>
                    
           <td style="width:27%;line-height:10px;text-align:center;font-weight:bold;">
                    <h4>&nbsp;SURGERY FITNESS REQUEST</h4>
                   </td>
                    
                </tr>
        </table>
             
         <table   width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
          <tr>
                    <td style="line-height:15px;text-align: left;width:10%;">MRD No</td>
                    <td style="line-height:15px;text-align: left;width:40%">: <strong><?=$mrdno?></strong></td> 
                     <td style="line-height:15px;text-align: center;width:20%;">Surgery Fitness Date</td>
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
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">: Dr: <?=$doctorname;  ?></td> 
                </tr>
               </table>
               <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
                
                </table>
                
               <br>
            <p>To,<br/><?=$to_form;  ?></p>
            <p>Respected Sir,</p>
             <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sending herewith <b><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?> </b>for fitness for  <?=$eyeid;  ?> <?=$deptname;  ?> <?=$ipdname;  ?> Surgery Under <?=$surgeryunder;  ?> He/She is a known case of <?=$case_desc;  ?> Kindly do the needful and oblige.</p>
             <p>Suggested Investigations:-</p>

<?=$datatablehtml;  ?>
 
          
            
               <br/><br/><br/><br/>
             <table style="width:100%;font-size: 12px;">
              <tr>
                 <td colspan="10" align="right">
                       <br>
                       Authorised Signatory
                    </td>
              </tr>
             </table>
        </div>
    </body>
</html>