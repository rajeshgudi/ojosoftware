<?php

?>
<!DOCTYPE html>
<html>
<body>
<br/>
<table class="table table-bordered "   style="width:100%;border-collapse: collapse;">
	
	<tr>
		<?php
  $host_tvm = explode('.',$_SERVER['HTTP_HOST'])[0];
  if($host_tvm=='pefemr')
  {
		?>
		<th style="width:20%;"></th>
		<th style="width:80%;text-align:left;line-height:18px;font-size: 15px;" valign="top">
	<br/><br/><br/><br/><br/><br/>
			<h5>&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $fname; ?> <?php echo $lname; ?></h5>
			<h5>&nbsp;&nbsp;&nbsp; MRD NO &nbsp;: <?php echo $mrdno; ?> </h5>
			<h5> &nbsp;&nbsp;&nbsp; Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ageyy; ?>/<?php echo $gender; ?> </h5>
			<h5> &nbsp;&nbsp;&nbsp; Issue Dt &nbsp;&nbsp;: <?php echo date('d/m/Y'); ?> </h5>
			<h5>&nbsp;&nbsp;&nbsp; Address &nbsp;&nbsp; : <?php echo $address; ?> </h5><br/>
			<h5 >&nbsp; <barcode code="<?php echo $mrdno; ?>" type="C128A" height="0.77" text="5" /></h5>

		</th>
	<?php } elseif ($host_tvm=='akg') { ?>

		<th style="width:100%;text-align:left;line-height:17px;font-size: 17px;" valign="top">
	
			<h5>&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $fname; ?> <?php echo $lname; ?></h5>
			<h5>&nbsp;&nbsp;&nbsp; MRD NO &nbsp;: <?php echo $mrdno; ?> </h5>
			<h5> &nbsp;&nbsp;&nbsp; Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ageyy; ?>/<?php echo $gender; ?> </h5>
			<h5> &nbsp;&nbsp;&nbsp; Issue Dt &nbsp;&nbsp;: <?php echo date('d/m/Y'); ?> </h5><br/>
			<h5 >&nbsp;&nbsp;&nbsp; <barcode code="<?php echo $mrdno; ?>" type="C128A" height="0.75" text="5" /></h5>

		</th>

	<?php } else { ?>
		<th style="width:100%;text-align:left;line-height:30px;font-size: 25px;" valign="top">
	
			<h5>&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $fname; ?> <?php echo $lname; ?></h5>
			<h5>&nbsp;&nbsp;&nbsp; MRD NO &nbsp;: <?php echo $mrdno; ?> </h5>
			<h5> &nbsp;&nbsp;&nbsp; Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ageyy; ?>/<?php echo $gender; ?> </h5>
			<h5> &nbsp;&nbsp;&nbsp; Issue Dt &nbsp;&nbsp;: <?php echo date('d/m/Y'); ?> </h5><br/>
			<h5 >&nbsp;&nbsp;&nbsp; <barcode code="<?php echo $mrdno; ?>" type="C128A" height="0.77" text="5" /></h5>

		</th>
		<?php } ?>   
		</div>
	</tr>
</table>

</body>
</html>

