
<h4 align="center"><u>Barangay Annual Appropriation</u></h4>
<br>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Year </td>
		<td scope="col" class="listViewThS1" nowrap>Expenditure </td>
		<td scope="col" class="listViewThS1" nowrap>Particular</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Appropriation</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Supplemental</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Balance</div></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		$ctr = 0;
		$atotal = 0;
		$etotal = 0;
		$btotal = 0;
		$stotal = 0;
		$dtotal = 0;
		foreach($records->result() as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr height="20">
    	
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row->year ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php
			foreach($expenditures->result() as $cat) {
				if($cat->catID==$row->catID)
				echo $cat->catName;
				}
			?>
			</td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><?php echo $row->particular ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row->amount, 2) ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row->sup_amount, 2) ?></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($row->balance, 2) ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		$ctr++;
		$atotal += $row->amount;
		$btotal += $row->balance;
		$stotal += $row->sup_amount;
		}
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
	<tr>
		<td height="20" class="oddListRowS1" bgcolor="#ffffff"><b>&nbsp;</b>	</td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b>&nbsp;</b></td>
		<td align="center" class="oddListRowS1" bgcolor="#ffffff" ><b>TOTAL :</b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b><?php echo number_format($atotal,2); ?></b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b><?php echo number_format($stotal,2); ?></b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b><?php echo number_format($btotal,2); ?></b></td>
	</tr>
</tbody>
</table>