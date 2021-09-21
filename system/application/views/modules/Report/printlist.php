
<p>
<table  width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="center" colspan="6">
		<slot>
		<font size="2"><b><?php echo $company ?></b></font>
		<br/>
		<?php echo $address ?>
		</slot>
	</td>
</tr>
</table>
<h4 align="center"><u>Cashier Reports</u></h4>
<br>
</p>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Date</td>
		<td scope="col" class="listViewThS1" nowrap>Branch</td>
		<td scope="col" class="listViewThS1" nowrap>Cashier</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Cash Deposits</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Check Deposits</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Total Deposits</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Status</div></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		$ttl1 = 0;
		$ttl2 = 0;
		$ttlDeposits  = 0;
		foreach($records->result() as $row) {
			$ttl = $row->deposits1 + $row->checkDeposits;;
			$ttl1 += $row->deposits1;
			$ttl2 += $row->checkDeposits;
			$ttlDeposits  += $ttl;
	?>
		<!-- Start of students Listing -->
    	<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo date("m/d/Y",strtotime($row->date)) ?></span></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo $row->branchName ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" valign="top"><span sugar="sugar0b"><?php echo $row->lastName.", ".$row->firstName ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->deposits1,2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->checkDeposits,2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($ttl,2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff"
    		align="center" valign="top"><span sugar="sugar0b">
    		<?php 
    		if ($row->rstatus==0){
    			echo '<font color="red">Cancelled</font>';
    		} else if ($row->rstatus==1) {
    			echo "Pending";
    		} else if ($row->rstatus==2) {
    			echo "Confirmed";
    		}
    		?>
    		</span></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		}
		?>
		<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="3"
            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL: </b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl1,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl2,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttlDeposits,2) ?></b></span></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top">&nbsp;</td>
    	</tr>
		<?php
	} else {
	?>
    	<tr>
    		<td colspan="20" class="oddListRowS1">
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
		<td colspan="20" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>