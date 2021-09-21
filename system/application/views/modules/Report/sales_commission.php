
<form method="POST" action="index.php?report/sales_commission" >
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td class="dataLabel" width="50">Month</td>
		<td class="dataField" width="100">
		<select id="month" name="month">
		<option value="01" <?php if ($month=='01') echo "selected"; ?> >January</option>
		<option value="02" <?php if ($month=='02') echo "selected"; ?> >February</option>
		<option value="03" <?php if ($month=='03') echo "selected"; ?> >March</option>
		<option value="04" <?php if ($month=='04') echo "selected"; ?> >April</option>
		<option value="05" <?php if ($month=='05') echo "selected"; ?> >May</option>
		<option value="06" <?php if ($month=='06') echo "selected"; ?> >June</option>
		<option value="07" <?php if ($month=='07') echo "selected"; ?> >July</option>
		<option value="08" <?php if ($month=='08') echo "selected"; ?> >August</option>
		<option value="09" <?php if ($month=='09') echo "selected"; ?> >September</option>
		<option value="10" <?php if ($month=='10') echo "selected"; ?> >October</option>
		<option value="11" <?php if ($month=='11') echo "selected"; ?> >November</option>
		<option value="12" <?php if ($month=='12') echo "selected"; ?> >December</option>
		</select>
		</td>
		<td class="dataLabel" width="50">Year </td>
		<td class="dataField" width="50">
		<select id="year" name="year">
		<?php 
		for($yr=2010; $yr<=(date("Y")+1); $yr++) {
			if ($year==$yr)
				echo '<option value="'.$yr.'" selected>'.$yr.'</option>';
			else
				echo '<option value="'.$yr.'">'.$yr.'</option>';
		}
		?>
		</select>
		</td>
		<td class="dataField"><input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Display Report" /></td>
	</tr>
</tbody>
</table>
</form>

<?php if (!empty($result)) {?>
	<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr height="20">
			<td scope="col" class="listViewThS1" nowrap>&nbsp; </td>
			<?php 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					echo '<td scope="col" class="listViewThS1" nowrap><div align="right">';
					if ($staff->gender=='M')
						echo "MR. ";
					else
						echo "MS. ";
					echo strtoupper($staff->fname).'</div></td>';
				}
				
			}
			
			?>
			<td scope="col" class="listViewThS1" nowrap><div align="right">TOTAL</div> </td>
		</tr>
		
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">GROSS TAKINGS</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['gross'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['gross'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Less: 12% VAT</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['vat'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['vat'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">NET GROSS TAKINGS</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['net_gross'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['net_gross'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Less: Salon Share(20%)</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['share'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['share'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
		
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">NET TAKINGS</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['net_takings'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['net_takings'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Less: Two(2) Month Salary</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['salary'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['salary'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">BASIS FOR COMMISSION</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['basis'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['basis'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Rate of Commission</td>
    		<?php
    		 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['rate'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['rate'][$staff->staffID],1); ?>%</td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top">&nbsp;</td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><b>COMMISSION</b></td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['commission'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['commission'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	
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
	<input type="button" class="button" value="Print Now" onclick="return popUp('index.php?report/print_sales_commission/<?php echo $month; ?>/<?php echo $year; ?>');" />
	<?php
	}
	?>
	</div>

<?php
}
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