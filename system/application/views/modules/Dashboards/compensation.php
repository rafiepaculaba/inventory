<br style="height: 5px" />
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td>
		<h4 class="dataLabel">&nbsp;&nbsp;<img src="images/submenu/allowance.gif" alt="Compensation Summary" border="0" align="top" /> Compensation Summary</h4>
	</td>
	<td align="right">
		<input type="button" class="button" value="Print" onclick="popUp('index.php?dashboard/print_compensation');" />
	</td>
</tr>
</table>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr height="20">
	<td scope="col" class="listViewThS1" nowrap width="100" rowspan="2">OFFICE</td>
	<?php 
	$total = array();
	if ($status->num_rows()) {
		foreach($status->result() as $stat) {
			$total[$stat->empStatusID]['basic'] 	= 0;
			$total[$stat->empStatusID]['allowances']= 0;
			$total[$stat->empStatusID]['total'] 	= 0;
			$total['basic'] 	= 0;
			$total['allowances']= 0;
			$total['total'] 	= 0;
			?>
			<td scope="col" class="listViewThS1" nowrap colspan="3"><div align="center"><?php echo strtoupper($stat->type) ?></div></td>
			<?php 
		}
	}
	?>
	<td scope="col" class="listViewThS1" nowrap width="100" colspan="3"><div align="center">TOTAL</div></td>
</tr>
<tr height="20">
	<?php 
	if ($status->num_rows()) {
		foreach($status->result() as $stat) {
			?>
			<td scope="col" class="listViewThS1" nowrap><div align="center">Basic</div></td>
			<td scope="col" class="listViewThS1" nowrap><div align="center">Allowances</div></td>
			<td scope="col" class="listViewThS1" nowrap><div align="center">Total</div></td>
			<?php 
		}
	}
	?>
	<td scope="col" class="listViewThS1" nowrap><div align="center">Basic</div></td>
	<td scope="col" class="listViewThS1" nowrap><div align="center">Allowances</div></td>
	<td scope="col" class="listViewThS1" nowrap><div align="center">Total</div></td>
</tr>
<tr>
	<td colspan="<?php echo (4+(3*$status->num_rows())) ?>" height="1" class="listViewHRS1"></td>
</tr>

<?php 
if (count($compensations)) {
	foreach($compensations as $com) { 
	?>
		<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" bgcolor="#fdfdfd" valign="top"><?php echo $com['office'] ?></td>
		<?php 
			if ($status->num_rows()) {
				foreach($status->result() as $stat) {
					$total[$stat->empStatusID]['basic'] 	+= $com[$stat->empStatusID]['basic'];
					$total[$stat->empStatusID]['allowances']+= $com[$stat->empStatusID]['allowances'];
					$total[$stat->empStatusID]['total'] 	+= $com[$stat->empStatusID]['total'];
					$total['basic'] 	+= $com[$stat->empStatusID]['basic'];
					$total['allowances']+= $com[$stat->empStatusID]['allowances'];
					$total['total'] 	+= $com[$stat->empStatusID]['total'];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><?php echo number_format($com[$stat->empStatusID]['basic'],2) ?></td>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><?php echo number_format($com[$stat->empStatusID]['allowances'],2) ?></td>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><?php echo number_format($com[$stat->empStatusID]['total'],2) ?></td>
					<?php 
				}
			}
			?>
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><?php echo number_format($com['basic'],2) ?></td>
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><?php echo number_format($com['allowances'],2) ?></td>
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><?php echo number_format($com['total'],2) ?></td>
		</tr>
		<tr>
			<td colspan="<?php echo (4+(3*$status->num_rows())) ?>" height="1" class="listViewHRS1"></td>
		</tr>
		<?php 
	}
	?>
		<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" bgcolor="#fdfdfd" valign="top"><b>GRAND TOTAL</b></td>
		<?php 
			if ($status->num_rows()) {
				foreach($status->result() as $stat) {
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b><?php echo number_format($total[$stat->empStatusID]['basic'],2) ?></b></td>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b><?php echo number_format($total[$stat->empStatusID]['allowances'],2) ?></b></td>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b><?php echo number_format($total[$stat->empStatusID]['total'],2) ?></b></td>
					<?php 
				}
			}
			?>
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b><?php echo number_format($total['basic'],2) ?></b></td>
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b><?php echo number_format($total['allowances'],2) ?></b></td>
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b><?php echo number_format($total['total'],2) ?></b></td>
		</tr>
	<?php 
}
?>
</tbody>
</table>

<script>
function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=500,left = 0,top = 0');");
	return false;
}
</script>
