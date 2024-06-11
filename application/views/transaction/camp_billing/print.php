<?php
if($charge_id==1)
{
$charge="OPD";}
else if($charge_id==2)
{
$charge="IPD";}
else if($charge_id==3)
{
$charge="LASER";}
else if($charge_id==4)
{
$charge="INJECTION";}
else if($charge_id==5)
{
$charge="INVESTIGATION";}
$charge_id=$charge_id;
?>
<html>
    <body>
       
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
       
       <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border-top: 1px solid black;border-bottom: 1px solid black">
                <tr>
                    
           <td style="width:27%;line-height:10px;text-align:center;font-weight:bold;">
                    <h4>&nbsp;<?=$charge?> BILL</h4>
                   </td>
                    
                </tr>
        </table>
             
         <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border: 1px solid black"> 
          <tr>
                    <td style="line-height:15px;text-align: left;width:15%;"><strong>Bill No</strong></td>
                    <td style="line-height:15px;text-align: left;width:45%">: <?=$invoice_number;  ?></td> 
                    <td style="display: none;line-height:15px;text-align: center;width:17%;"></td>
                    <td style="display: none;line-height:15px;text-align: left;width:23%;"></td>
                </tr> 
                 <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Bill Date & Time</td>
                    <td style="line-height:15px;text-align: left;width:45%">: <?=$bill_date;  ?> & <?=$bill_time;  ?></td> 
                    <td style="line-height:15px;text-align: center;width:17%"><?php if($charge_id==2){?>Date of Surgery<?php }?></td>
                    <td style="line-height:15px;text-align: left;width:23%"><?php if($charge_id==2){?>:<?php }?><strong> </strong></td>
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
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?>  Age: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> </strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Patient Address</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: 12px">: <?=$address?> </td>
                </tr>
         </table>
              
               
                <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border:  1px solid black"> 
                  <tr>
                    <td style="line-height:15px;text-align: left;width:15%;"><?php if($charge_id==2){?>Surgeon<?php }else {?>Doctor<?php }?> Name</td>
                    <td colspan="3" style="line-height:15px;text-align: left;width:85%">: Dr: <?=$doctorname;  ?></td> 
                </tr>
               </table>
               <br>
            
             <table  width="100%" style="line-height:15px;font-size: 12;height: 100%;border-left: 1px solid black;border-right:  1px solid black;border-top: 1px solid black" >
                <tr>
                    <td style="border-bottom:1px solid black;width:10%;border-right:  1px solid black">Sl NO</td>  
                    <td style="border-bottom:1px solid black;width:60%;border-right:  1px solid black">Particular</td> 
                    <td style="border-bottom:1px solid black;width:10%;border-right:  1px solid black;text-align: right;">Rate</td> 
                    <td style="border-bottom:1px solid black;width:10%;border-right:  1px solid black;text-align: right;">Discount</td> 
                    <td style="border-bottom:1px solid black;text-align: right;">Amount</td>
                   
                </tr>
              <?php
              $j=0;
              $packagename='';
              $sl=1; foreach($particulars_details as $data){
        $idval=$data->charge_id;
        $package_id=$data->package_id;
        if($package_id>0)
        {
           
           if($j==0)
           {

           
            ?>
                <tr>
                   <td colspan="5" style="border-bottom: 1px solid black;text-align: center;"><b><?= $data->name; ?></b></td>
              </tr>
            <?php
           }
            $j++;
        }
        $particularid=$data->particulars_id;
        if($idval==1){
            $charges='opdcharge';
            $id="opdcharge_id";
        }
        elseif($idval==2){
            $charges='ipdcharge';
            $id="ipdcharge_id";
        }
        elseif($idval==3){
            $charges='laser';
            $id="laser_id";
        }
        elseif($idval==4){
            $charges='injection';
            $id="injection_id";
        }
        elseif($idval==5){
            $charges='investigation';
            $id="investigation_id";
        }
        $name=$this->db->get_where($charges,"$id=$particularid")->row()->name;
        $eye=$data->eye;
        if($eye==1)
        {
            $eye="(Left Eye)";
        }
        else if($eye==2)
        {
            $eye="(Right Eye)";
        }
        else if($eye==3)
        {
            $eye="(Both Eyes)";
        }
        else
        {
            $eye="";
        }
     ?>
                 <tr>
            <td align="left" style="border-bottom: 1px solid black;border-right:  1px solid black"><?= $sl; ?></td>
            <td style="border-bottom: 1px solid black;border-right:  1px solid black"><?= $name.' '.$eye ?></td>
            <td style="border-bottom: 1px solid black;text-align: right;border-right:  1px solid black"><?= number_format($data->rate,2); ?></td>
             <td style="border-bottom: 1px solid black;text-align: right;border-right:  1px solid black"><?= number_format($data->disamt,2); ?></td>
            <td style="border-bottom: 1px solid black;text-align: right;"><?= number_format($data->amount,2); ?></td>
        </tr>
                
            


         <?php
          $savename=$pname;
         $sl++;    }
         $tot=$grand_total-$advanced_amount;
         $tot1=$tot-$advanced_amount;
         $hh='';
         if($dpaymentm)
         {
            $hh='<br/>';
         }
      //   error_reporting(0);
      if($grand_total)
      {
        
      }
      else {
        
        $grand_total=0;
      }
      if($advanced_amount)
      {
        
      }
      else {
        
        $advanced_amount=0;
      }
      if($insuranceamount)
      {
        
      }
      else {
        
        $insuranceamount=0;
      }
         ?>
     
                 </table>
 <br>
            <table style="width:100%;font-size: 14px;">
                <tr>
                    <td style="width: 60%">
                        Total  Amount: <?=number_format($grand_total-($advanced_amount-$insuranceamount),2)?><br>
                        Insurance  Amount: <?=number_format($insuranceamount,2)?><br>
                        Advance Amount: <?=number_format($advanced_amount,2)?><br>
                        Amount Paid by Patient: <?=number_format($tot1,2)?><br>
                        <?=$mode?>: <?=number_format($tot1,2)?><br>
                        <?=$dpaymentm?> <?php echo $hh; ?>
                        Terms and Conditions:NB: <?=number_format($tot1,2)?>/-(<?=$net_amount_in_words?>) was directly collected from patient.
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