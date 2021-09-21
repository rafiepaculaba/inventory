
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
	<h4 align="center"><u>Sales Report</u></h4>
	<br>
	</p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="tabDetailViewDL"><slot>Branch :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $branchName; ?> &nbsp;</b></slot></td>
        <td class="tabDetailViewDL"><slot>Period :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $startDate." &nbsp;&nbsp; to &nbsp;&nbsp; ".$endDate; ?> </b>&nbsp;</slot></td>
    </tr>
</table>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Date </td>
		<td scope="col" class="listViewThS1" nowrap>Type</td>
		<td scope="col" class="listViewThS1" nowrap>Ref No.</td>
		<td scope="col" class="listViewThS1" nowrap>Staff</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div> </td>
	</tr>
	
	<?php
	$total = 0;
	if (!empty($result)) {
		foreach($result as $row) {
			$total += $row['amount'];
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row['date'] ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row['type'] ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row['refno'] ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row['staff'] ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row['amount'],2) ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		}
		?>
		<tr height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top" colspan="4"><b>TOTAL: </b></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b><?php echo number_format($total,2) ?></b></td>
    	</tr>
		<?php 
	}
	?>
	
	<tr>
		<td colspan="20" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>
