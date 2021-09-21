
<center>
<h4><u>General Payroll</u></h4>
<h4>Payroll Period: <?php echo $period ?></h4>
</center>
<br>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><?php echo $type ?> Payroll</td>
		<td scope="col" class="listViewThS1" nowrap>Emp No.</td>
		<td scope="col" class="listViewThS1" nowrap>Employee's Name</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Gross Pay</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Deductions</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Net Pay</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Signature</div></td>
	</tr>
	<tr>
		<td colspan="7" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	$ttl_gross 		= 0;
	$ttl_deductions = 0;
	$ttl_net 		= 0;
	if ($records->num_rows()) {
		foreach($records->result() as $row) {
			$ttl_gross		+= $row->grossPay;
			$ttl_deductions += $row->deductions;
			$ttl_net 		+= $row->netPay;
	?>
    	<tr height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b">
    		<?php
    		echo $row->period;
    		?>
    		</span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->empID ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->lname.", ".$row->fname." ".$row->mname ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->grossPay,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->deductions,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->netPay,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><span sugar="sugar0b">__________</span></td>
    	</tr>
    	<tr>
    		<td colspan="7" height="1" class="listViewHRS1"></td>
    	</tr>
	<?php
		}
		?>
		<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="3"
            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL :</b></span></td>
            
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl_gross,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl_deductions,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl_net,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
    		
    	</tr>
    	<tr>
    		<td colspan="7" height="1" class="listViewHRS1"></td>
    	</tr>
		<?php 
	} else {
	?>
    	<tr>
    		<td colspan="6" class="oddListRowS1">
            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tbody>
            	<tr>
            		<td nowrap="nowrap" align="center"><b><i>No results found.</i></b></td>
            	</tr>
            	</tbody>
            	</table>
    		</td>
    	</tr>
	<?php
	}
	?>
	
	<tr>
		<td colspan="8" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>

<br/><br/><br/><br/><br/><br/>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="35%" align="center">
	<u>
		<font size="2"><b>
		<?php 
		if (strlen($office->headOfOffice)<20)
			$spaces = (20 - strlen($office->headOfOffice)/2); 
		
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		
		echo $office->headOfOffice;
	
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		?>
		</b></font>
	</u>
	</td>
	<td width="30%">&nbsp;</td>
	<td width="35%" align="center">
	<u>
	<font size="2"><b>
		<?php 
		$accounting = $this->config_model->getConfig('Accounting Head');
		if (strlen($accounting)<20)
			$spaces = (20 - strlen($accounting)/2); 
		
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		
		echo $accounting;
	
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		?>
	</b></font>
	</u>
	</td>
</tr>
<tr>
	<td align="center"><b><?php echo $office->office." Head" ?></b></td>
	<td>&nbsp;</td>
	<td align="center"><b><?php echo "Accounting Head" ?></b></td>
</tr>
</table>

<br/><br/><br/><br/><br/><br/>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="35%" align="center">
	<u>
		<font size="2"><b>
		<?php 
		$pto = $this->config_model->getConfig('PTO Head');
		if (strlen($pto)<20)
			$spaces = (20 - strlen($pto)/2); 
		
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		
		echo $pto;
	
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		?>
		</b></font>
	</u>
	</td>
	<td width="30%">&nbsp;</td>
	<td width="35%" align="center">
	<u>
	<font size="2"><b>
		<?php 
		$approval = $this->config_model->getConfig('Payroll Approval Chief');
		if (strlen($approval)<20)
			$spaces = (20 - strlen($approval)/2); 
		
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		
		echo $approval;
	
		for($i=0; $i < $spaces; $i++) {
			echo "&nbsp;";
		}
		?>
	</b></font>
	</u>
	</td>
</tr>
<tr>
	<td align="center"><b><?php echo "PTO Head" ?></b></td>
	<td>&nbsp;</td>
	<td align="center"><b><?php echo $this->config_model->getConfig('Payroll Approval Chief Position') ?></b></td>
</tr>
</table>


