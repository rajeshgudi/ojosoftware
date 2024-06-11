<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$company_name;  ?></title>
</head>
<body>
    <?php
    $ttcond='';
     $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
     
   if($host_tvm!='queens')
   { ?>
  <table width="100%" style="font-size:14px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:1px solid;" border="0">
    <tr>
     
    <td style="width:5%;">
                            <?=$logo?>
                        </td>
     <td style="width:95%;text-align:center;padding:10px;" valign="middle">
        <b style="font-size:20px;font-family:TIMES NEW ROMAN;"><?=$company_name?></b> <br>
        <p style="font-size:13px"><?=$company_address?><br/>
       Pho: <?=$company_land_phone?>  Mob: <?=$company_mobile?>
        Email: <?=$company_email?><br/><b>GSTIN NO:<?=$gstin_no?></b></p> 
         <b style="margin-top:12px;font-size:14px;"><br>
     </td>
    </tr>
</table>

<?php } ?>

<?php if($host_tvm=='queens')
{ ?>
<br/><br/><br/><br/>
 <table width="100%" style="font-size:11px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse; black;" border="0">
    <tr>
         <td style="width:40%;" valign="top">
        </td>
         <td style="width:30%;text-align:left;padding:10px;">
            <p><b><?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?><br/>  Age/Sex: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> / <?=$gender;  ?><br/> Address:<?=$address;  ?><br/>Mobile No:<?=$mobileno;  ?></b></p>
        </td>

        <td style="width:30%;text-align:left;padding:10px;" valign="top">
          <p><b>Dr: <?=$doctorname;  ?><br/><?=$specialist;  ?><br/>Appointment Date:<?=$appointment_date."  ".$appointment_time?><br/>MR No:<?=$mrdno;  ?></b></p>
        </td>
       
  </tr>
</table>
<?php } else { ?>

     <table width="100%" style="font-size:11px;font-family:Verdana, Arial, Helvetica, sans-serif;margin-top:0%;border-collapse: collapse;border:1px solid; black;" border="0">
    <tr>
         <td style="width:65%;text-align:left;padding:10px;border:0.6px solid black;">
            <p><b>Name: <?=$titlename;  ?> <?=$fname;  ?> <?=$lname;  ?>  Age/Sex: <?php if($ageyy) echo $ageyy.'Y'; ?>  <?php if($agemm) echo $agemm.'M'; ?> / <?=$gender;  ?><br/>MR No:<?=$mrdno;  ?><br/>Mobile No:<?=$mobileno;  ?><br/>Address:<?=$address;  ?></b></p>
        </td>

        <td style="width:35%;text-align:left;padding:10px;border:0.6px solid black;" valign="top">
          <p><b>Dr: <?=$doctorname;  ?><br/>Appointment Date:<?=$appointment_date."  ".$appointment_time?></b></p>
        </td>
  </tr>
</table>

    <?php } ?>
  <?php
     $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
   if($host_tvm!='queens')
   { ?>
 <?php if($typeprint==1)

{
    $imgt='newp1.jpg';
}
elseif ($typeprint==2) {
    $imgt='rev1.jpg';
 }

   
  ?>
<br/>
<?php
if($host_tvm!='pefemr')
   { 
    if($host_tvm=='akg')
    {
        $imgt='akg.png';
    }
    ?> 
<img src="<?php echo base_url() ?>/images/<?php echo $imgt; ?>">
<?php } ?>


<br/><br/><br/>
<p style="text-align: left;display:none">Billed by : <?=$username;  ?> Printed Time:<?php echo date('d F, Y (l) g:i:s A ', strtotime($created_date)); ?></p>
<?php } ?>
</body>
</html>