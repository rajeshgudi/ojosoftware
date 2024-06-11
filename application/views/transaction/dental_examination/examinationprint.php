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

       

      

            <table  width="100%" style="line-height:10px;margin-top:0px;font-size: 13;border-top: 1px solid black;border-bottom: none">
                <tr>
                   

           <td style="width:27%;line-height:10px;text-align:center;font-weight:bold;">
           <br/>

                    <h4>&nbsp;Case Sheet</h4>
                  

                   </td>

                    

                </tr>

        </table>
        <br/>
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

         <table  width="100%" style="line-height:10px;margin-top:10px;font-size: 14;" > 

<tr>

     <td style="text-align: left;" class="tabledivideleft">Consultant:</td>

     <td  style="text-align: left;" class="tabledivideright"> <?=$doctorname;  ?></td>
     
</tr>

                

               </table>

           



                <?=$conddata;  ?>