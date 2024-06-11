<html>
    <body>
        <style>
            .tabledivideleft
            {
                width: 30%;
                line-height: 25px;
                font-weight: bold;
            }
             .tabledivideright
            {
                width: 70%;
                line-height: 25px;
            }
        </style>
       
             <table  width="100%" style="line-height:22px;" >
                <tr>
                    
                    <td style="width:10%;">
                            <?=$logo?>
                        </td>
                    <td  style="text-align:center;width:90%" valign="middle">
                        <h3><?=$company_name?></h3>
                        <p><?=$company_address?>   </p>
                        <p>Telephone:<?=$company_land_phone?>|Mobile:<?=$company_mobile?></p>
                        <p>Email:<?=$company_email?><br/><b>GSTIN NO:<?=$gstin_no?></b></p>
                    </td>
<!--                 <td style="text-align:center;font-weight:bold;width:20%"><p style="width:20%">&nbsp;</p>
                    <barcode type="QR" code="" class="barcode" size="1.0" error="M" />
                    </td>  -->
                </tr>
            </table>
       
      

        <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
                <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">MRD No</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$mrdno?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Contact Number</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: 12px">: <?=$mobileno?>  </td>
                </tr>
         
                <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Patient Name</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?>  Age/Sex: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> / <?=$gender;  ?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Patient Address</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: 12px">: <?=$address?> </td>
                </tr>
         </table>
              <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border:  1px solid black"> 
                  <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Consultant</td>
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">: Dr: <?=$doctorname;  ?></td> 
                     <td style="line-height:15px;text-align: center;width:17%;">Date</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: 12px">: <?=$examination_date?> </td>
                </tr>
               </table>
              
 <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;">
                <tr>
                    
           <td style="width:27%;line-height:4px;text-align:center;font-weight:bold;">
                    <h4>&nbsp;OPTHALMIC REPORT</h4>
                   </td>
                    
                </tr>
        </table>
        <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                    
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;On Examination</h4>
                   </td>
                    
                </tr>
        </table>

           <table class="border-collapse"  width="100%" style="border: 1px solid black;border-collapse: collapse;font-size: 12px;" border="1">
              <tr>
                  <th></th>
                  <th align="Left">Right Eye</th>
                  <th align="Left">Left Eye</th>
              </tr>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">UVA</th>
                  <td style="width:40%;" align="Left">UCVA-<?=$vis1;  ?> <?=$vis2;  ?></td>
                  <td style="width:40%;" align="Left">UCVA-<?=$vis6;  ?> <?=$vis7;  ?></td>
              </tr>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">BCVA</th>
                  <td align="Left">BCVA-<?=$vis4;  ?> <?=$vis5;  ?></td>
                  <td align="Left">BCVA-<?=$vis9;  ?> <?=$vis10;  ?></td>
              </tr>
              
           </table>
 <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Preliminary Examination</h4>
                   </td>
                    
                </tr>
        </table>

           <table class="border-collapse"  width="100%" style="border: 1px solid black;border-collapse: collapse;font-size: 12px;" border="1">
              <tr>
                  <th></th>
                  <th align="Left">Right Eye</th>
                  <th align="Left">Left Eye</th>
              </tr>
              <?php if($pre1!='' || $pre7!=''){ ?>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">NCT</th>
                  <td style="width:40%;" align="Left">NCT-<?=$pre1;  ?> </td>
                  <td style="width:40%;" align="Left">NCT-<?=$pre7;  ?> </td>
              </tr>
              <?php } ?>

               <?php if($pre2!='' || $pre8!=''){ ?>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">GAT</th>
                  <td style="width:40%;" align="Left">GAT-<?=$pre2;  ?> </td>
                  <td style="width:40%;" align="Left">GAT-<?=$pre8;  ?> </td>
              </tr>
              <?php } ?>

               <?php if($pre3!='' || $pre9!=''){ ?>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">CCT</th>
                  <td style="width:40%;" align="Left">CCT-<?=$pre3;  ?> </td>
                  <td style="width:40%;" align="Left">CCT-<?=$pre9;  ?> </td>
              </tr>
              <?php } ?>

               <?php if($pre4!='' || $pre10!=''){ ?>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">Angle</th>
                  <td style="width:40%;" align="Left">Angle-<?=$pre4;  ?> </td>
                  <td style="width:40%;" align="Left">Angle-<?=$pre10;  ?> </td>
              </tr>
              <?php } ?>

               <?php if($pre5!='' || $pre11!=''){ ?>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">Color Vision</th>
                  <td style="width:40%;" align="Left">Color Vision-<?=$pre5;  ?> </td>
                  <td style="width:40%;" align="Left">Color Vision-<?=$pre11;  ?> </td>
              </tr>
              <?php } ?>

               <?php if($pre6!='' || $pre12!=''){ ?>
              <tr>
                  <th style="width:20%;padding: 5px;" align="Left">Pupil</th>
                  <td style="width:40%;" align="Left">Pupil-<?=$pre6;  ?> </td>
                  <td style="width:40%;" align="Left">Pupil-<?=$pre12;  ?> </td>
              </tr>
              <?php } ?>
             
           </table>
           <br/>
              <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Fields & Fundus</h4>
                   </td>
                    
                </tr>
          </table>
           <br/>
           <table class="border-collapse"  width="100%" style="border: 1px solid black;border-collapse: collapse;font-size: 12px;" border="1">
              <tr>
                  <th></th>
                  <th align="Left">Right Eye</th>
                  <th align="Left">Left Eye</th>
              </tr>
                <tr>
                       <td align="left">Field of Vision(Confrontation)</td>
                       <td align="left"><?=$Fieldr;  ?></td>
                       <td align="left"><?=$Fieldl;  ?></td>
                   </tr>
  <tr>
                       <td align="left">Fundus</td>
                       <td align="left"><?=$Fundusr;  ?></td>
                       <td align="left"><?=$Fundusr;  ?></td>
                   </tr>
           </table>

            <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Anterior Segment</h4>
                   </td>
                    
                </tr>
          </table>
          
          <?=$anteriaseg;  ?>

            <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Diagnosis</h4>
                   </td>
                    
                </tr>
          </table>

           <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$vdiagnosis;  ?></p>
                   </td>
                    
                </tr>
          </table>

            <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Investigation Advice</h4>
                   </td>
                    
                </tr>
          </table>

          <p>&nbsp;&nbsp;<?=$investigation;  ?></p>


           <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Medicine</h4>
                   </td>
                    
                </tr>
          </table>
  <br/>   
        <?=$medicine;  ?>


            <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Clinical Advice</h4>
                   </td>
                    
                </tr>
          </table>

        
          <p>&nbsp;&nbsp;<?=$couns;  ?></p>

        <br/>     <br/>     <br/>   
             <table  width="100%" style="line-height:10px;margin-top:5px;font-size: 13;border-bottom: 1px solid black">
                <tr>
                
           <td style="width:27%;line-height:4px;text-align:left;font-weight:bold;">
                    <h4>&nbsp;Advice:</h4>
                   </td>
                    
                </tr>
          </table>

            <p>&nbsp;&nbsp;<?=$clinical_advisor;  ?><br>follow up date:<?=$d_date;  ?></p>

              