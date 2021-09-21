
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
	<h4 align="center"><u>Sales Commissions</u></h4>
	<br>
	</p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="tabDetailViewDL"><slot>Branch :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $branchName; ?> &nbsp;</slot></td>
        <td class="tabDetailViewDL"><slot>Period :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo date("m/d/Y",strtotime($startDate))." &nbsp;&nbsp; to &nbsp;&nbsp; ".date("m/d/Y",strtotime($endDate)); ?> &nbsp;</slot></td>
    </tr>
</table>


<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Branch </td>
		<td scope="col" class="listViewThS1" nowrap>Sales Representative</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Total Sales</div> </td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">&nbsp;</div> </td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Item Commission</div> </td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Total Loads</div> </td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">&nbsp;</div> </td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Load Commission</div> </td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Total Commission</div> </td>
	</tr>
	
	<?php
	if ($result) {
		$t_item_sales = 0;
		$t_load_sales = 0;
		$t_item_comm = 0;
		$t_load_comm = 0;
		$gtotal 	 = 0;
		foreach($result as $row) {
			$t_item_sales += $row['item_sales'];
			$t_item_comm  += $row['item_comm'];
			$t_load_sales += $row['load_sales'];
			$t_load_comm  += $row['load_comm'];
			$gtotal 	  += $row['total'];
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row['branch'] ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row['rep'] ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row['item_sales'],2) ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo number_format($row['item_per'],1) ?>%</td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row['item_comm'],2) ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row['load_sales'],2) ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo number_format($row['load_per'],1) ?>%</td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row['load_comm'],2) ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row['total'],2) ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		}
	?>
	
	<tr>
		<td colspan="20" class="listViewHRS1"></td>
	</tr>
	<tr height="20">
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp; </td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b>Total :</b></td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b><?php echo number_format($t_item_sales,2) ?></b></td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b>&nbsp;</b></td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b><?php echo number_format($t_item_comm,2) ?></b></td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b><?php echo number_format($t_load_sales,2) ?></b> </td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b>&nbsp;</b> </td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b><?php echo number_format($t_load_comm,2) ?></b> </td>
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><b><?php echo number_format($gtotal,2) ?></b></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>