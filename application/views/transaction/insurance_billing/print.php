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
                    <h4>&nbsp; BREAKUP BILL</h4>
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
                    <td style="line-height:15px;text-align: left;width:45%">: <strong><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?>  Age/Sex: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> / <?=$gender;  ?></strong></td> 
                    <td style="line-height:15px;text-align: center;width:17%;">Patient Address</td>
                    <td style="line-height:15px;text-align: left;width:23%;font-size: 12px">: <?=$address?> </td>
                </tr>
         </table>
              
               
                <table  width="100%" style="line-height:25px;margin-top:0px;font-size: 13;border:  1px solid black"> 
                  <tr>
                    <td style="line-height:15px;text-align: left;width:15%;">Doctor Name</td>
                    <td  style="line-height:15px;text-align: left;width:45%">:  <?=$doctorname;  ?></td> 
                    <td  style="line-height:15px;text-align: left;width:15%"> <b> Claim No</b></td> 
                    <td  style="line-height:15px;text-align: left;width:25%"><b>:  <?=$claimno;  ?></b></td> 
                </tr>

                
                
                
               </table>
               <table  width="100%" style="line-height:25px;margin-top:0px;font-size: 13;border:  1px solid black"> 
                  <tr>
                    <td style="line-height:15px;text-align: left;width:20%;"><b>Insurance Name</b></td>
                    <td  style="line-height:15px;text-align: left;width:80%"><b>:  <?=$ins_name;  ?></b></td> 
                  
                </tr>
                
                
               </table>
               <br>
               <table border="1"  width="100%" style="border-collapse: collapse;line-height:20px;font-size: 12;height: 100%;" >
                <tr>
                    <td style="border-bottom:1px solid black;width:10%;border-right:  1px solid black">Sl NO</td>  
                    <td style="border-bottom:1px solid black;width:60%;border-right:  1px solid black">Particular</td> 
                    <td style="border-bottom:1px solid black;width:10%;border-right:  1px solid black;text-align: right;">Rate</td> 
                    <td style="border-bottom:1px solid black;text-align: right;">Amount</td>
                </tr>
                    <tbody>
                        <?php
                          $htmldata='';
                          $sl=1;
  $data_group=$this->db->query("select package_master.name,insurance_billing_detail.package_id from insurance_billing_detail left join package_master on package_master.package_master_id=insurance_billing_detail.package_id where billing_master_id=$billid group by insurance_billing_detail.package_id")->result(); 
//  echo $this->db->last_query();exit;
  if($data_group)
  {
    foreach ($data_group as $data_package) 
    {
                   $htmldata.='<tr>
                            <td colspan="4" style="text-align:center;"><b>'.$data_package->name.'</b></td>
                       </tr>';

        $data_ind=$this->db->query("select * from insurance_billing_detail left join package_master on package_master.package_master_id=insurance_billing_detail.package_id where billing_master_id=$billid and insurance_billing_detail.package_id=$data_package->package_id")->result(); 
        if($data_ind)
        {
               
                  foreach ($data_ind as $data) 
                {
                    $charges='ipdcharge';
                    $id="ipdcharge_id";
                    $particularid=$data->particulars_id;
                    $name=$this->db->get_where($charges,"$id=$particularid")->row()->name;
                    $htmldata.='<tr>
                                 <td >'.$sl.'</td>
                                 <td >'.$name.'</td>
                                 <td align="right">'.number_format($data->rate,2).'</td>
                                 <td align="right">'.number_format($data->amount,2).'</td>
                        </tr>';
                        $sl++;
                }
        }
    }
  }
  echo $htmldata;
                        ?>
                    </tbody>
                    </table>
            
          

 <br>
            <table style="width:100%;font-size: 14px;">
                <tr>
                    <td style="width: 60%;text-align:right;">
                        <B>Total  Amount: <?=number_format($grand_total,2)?><br>
                        <?=$net_amount_in_words?></B>
                      
                    </td>
                 </tr>
            </table>
         
            <table style="width:100%;font-size: 14px;">
                <tr>
                    <td style="width: 60%;text-align:left;">
                     
                         Account Holder Name: <?=$acc_holdername?> <br/>
                         Bank  Name: <?=$bank_name?><br/>
                         Account Number: <?=$acc_no?><br/>
                         IFS Code: <?=$ifs_code?><br/>
                      
                      
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