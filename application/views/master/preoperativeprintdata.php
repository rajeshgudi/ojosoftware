
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
                    <h4>&nbsp;PREOPERATIVE DIRECTIONS</h4>
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
                <br/><br/>
               <table  width="100%" style="line-height:20px;margin-top:0px;font-size: 16;"> 
                        <tr>
                            <td style="width:30%;">Date Of Operation</td>
                            <td style="width:70%;">: <?=$dateof_operation;  ?></td>
                        </tr>
                         <tr>
                            <td style="width:30%;">Time Of Admission</td>
                            <td style="width:70%;">: <?=$timeof_admission;  ?></td>
                        </tr>
                         <tr>
                            <td style="width:30%;">Eye to be Operated</td>
                            <td style="width:70%;">: <?=$eyeid;  ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%;">Operation</td>
                            <td style="width:70%;">: <?=$partdata;  ?></td>
                        </tr>
                </table>
                <br/>
                <p>Directions:-</p>

                <br/>
                 <table border="1"   style="font-size:13px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border-left: none;
  border-right: none;width:100%;">
                    <thead>
                         <tr style="border:0.6px solid black;background: #f5f5f5;">
                             <th style="width:8%;">SL NO</th>
                             <th style="width:25%;">Drug Name</th>
                             <th style="width:25%;">Instruction</th>
                             <th style="width:5%;">Days</th>
                             <th style="width:5%;">Qty</th>
                            
                             <th style="width:5%;">Eye</th>
                         </tr>
                     </thead>
                    <tbody>
               <?php
                if($medicinedetails)
                {
                    $sl=1;
                   
                    foreach($medicinedetails as $data)
                    {
                       
                        $medd='';
                        $medind=explode(',',$data->ex_ins);
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
                        $medindd=explode(',',$data->ex_no);
                        foreach ($medindd as $key => $value) {
                           if($value)
                           {
                                if($value!='undefined')
                                {
                                    $meddi.=$value.'<br/>';
                                }
                            
                           }
                        }

                        if($data->med_action==0)
                    {
                        $drugname=$data->drugname;
                    }
                    else
                    {
                        $drugname=$data->med_name;
                    }
                     
                    ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $drugname; ?></td>
                            <td><?php echo $data->instruction; ?><br/><?php echo $medd; ?></td>
                            <td><?php echo $data->nodays; ?><br/><?php echo $meddi; ?></td>
                            <td><?php echo $data->qty; ?></td>
                          
                            <td><?php echo $data->med_eye; ?></td>
                        </tr>

                    <?php 
                        $sl++;
                    }
                }
               ?>
           </tbody></table>
           <br/>
           <p>Instructions:-</p>
           <ul>
           <?php
            if($instr_preop)
            {
                foreach($instr_preop as $dataval)
                {
                ?>
                        <li> <?php echo $dataval->insdata; ?></li>
                <?php
                }
            }
           ?>
               </ul> 
             
         
             


 
          
            
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