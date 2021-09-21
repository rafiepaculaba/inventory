
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
<h4 align="center"><u>Official Receipts List</u></h4>
<br>
</p>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Date</td>
		<td scope="col" class="listViewThS1" nowrap>OR No.</td>
		<td scope="col" class="listViewThS1" nowrap>Branch</td>
		<td scope="col" class="listViewThS1" nowrap>Customer</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Discount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Total Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Status</div></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		$amount = 0;
		$discount = 0;
		$totalAmount = 0;
		foreach($records->result() as $row) {
			$amount += $row->amount;
			$discount += $row->discount;
			$totalAmount += $row->totalAmount;
	?>
		<!-- Start of students Listing -->
    	<tr height="20">
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo date("m/d/Y",strtotime($row->orDate)) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php  echo $row->orNo; ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b">
    		<?php echo $this->config_model->getConfig('Branch '.$row->branchID) 
    		?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->name ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->amount,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->discount,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->totalAmount,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><span sugar="sugar0b">

    		<?php if($row->rstatus==0) {
    			echo '<font color="red">Void</font>';
    		} elseif ($row->rstatus==1)
    			echo "Active";
    		
    		?></span></td>
    		
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
            class="oddListRowS1" bgcolor="#ffffff" colspan="4"
            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL: </b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($amount,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($discount,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($totalAmount,2) ?></b></span></td>
    		
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

