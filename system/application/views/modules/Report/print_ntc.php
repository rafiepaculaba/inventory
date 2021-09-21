
<center>
<h4><u>Notice To Credit</u></h4>
<h4>Payroll Period: <?php echo $period ?></h4>
</center>
<br>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Account No.</td>
		<td scope="col" class="listViewThS1" nowrap>Employee</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Credit</div></td>
	</tr>
	<tr>
		<td colspan="6" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	$ttl_net = 0;
	if ($records->num_rows()) {
		foreach($records->result() as $row) {
			$ttl_net += $row->netPay;
	?>
    	<tr height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->accountNo ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->lname.", ".$row->fname." ".$row->mname ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->netPay,2) ?></span></td>
    	</tr>
    	<tr>
    		<td colspan="3" height="1" class="listViewHRS1"></td>
    	</tr>
	<?php
		}
		?>
		<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="2"
            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL :</b></span></td>
            
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl_net,2) ?></b></span></td>
    		
    	</tr>
    	<tr>
    		<td colspan="3" height="1" class="listViewHRS1"></td>
    	</tr>
		<?php 
	} else {
	?>
    	<tr>
    		<td colspan="3" class="oddListRowS1">
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
		<td colspan="3" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>


