
	<form method="POST" action="index.php?report/sales_report" >
	<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr height="20">
			<td class="dataLabel">Date From </td>
			<td class="dataField"><input type="text" name="startDate" id="startDate" size="12" value="<?php echo $startDate ?>" /> <img id="jscal_trigger1" align="top" alt="Start Date" src="images/jscalendar.gif"/></td>
			<td class="dataLabel">to </td>
			<td class="dataField"><input type="text" name="endDate" id="endDate" size="12" value="<?php echo $endDate ?>" />  <img id="jscal_trigger2" align="top" alt="End Date" src="images/jscalendar.gif"/></td>
			<td class="dataField"><input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Display Report" /></td>
		</tr>
	</tbody>
	</table>
	</form>

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
<br>

<div id="printer_div">
<?php
if (count($result)>0) {
?>
<input type="button" class="button" value="Print Now" onclick="return popUp('index.php?report/print_sales_report/<?php echo strtotime($startDate); ?>/<?php echo strtotime($endDate); ?>');" />
<?php
}
?>
</div>

<?php

calendarSetup('startDate', 'jscal_trigger1');
calendarSetup('endDate', 'jscal_trigger2');

?>

<script language="javascript">
function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=600,left = 0,top = 0');");
	return false;
}


</script>