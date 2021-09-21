<form method="POST" name="frmCreate" id="frmCreate" action="index.php?report/general_payroll" onsubmit="return check_form('frmCreate');" >
	<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		 <tr>
	        <th class="dataField" colspan="5" align="left"><h4 class="dataLabel">General Payroll</h4></th>
	    </tr>
		<tr height="20">
			<td class="dataLabel" width="100">Payroll Period </td>
			<td class="dataField" width="200">
			<select name="payrollID" id="payrollID">
			<?php 
			if ($periods->num_rows()) {
				foreach($periods->result() as $row) {
					if ($payrollID == $row->payrollID)
						echo '<option value="'.$row->payrollID.'" selected>'.$row->period.'</option>';
					else
						echo '<option value="'.$row->payrollID.'">'.$row->period.'</option>';
				}				
			}
			?>
			</select>
			</td>
			<td class="dataLabel" width="50">Office </td>
			<td class="dataField" width="100" nowrap>
			<select name="officeID" id="officeID">
			<option value="">---------------</option>
			<?php 
			if ($offices->num_rows()) {
				foreach($offices->result() as $row) {
					if ($officeID == $row->officeID)
						echo '<option value="'.$row->officeID.'" selected>'.$row->office.'</option>';
					else
						echo '<option value="'.$row->officeID.'">'.$row->office.'</option>';
				}				
			}
			?>
			</select>
			</td>
			<td class="dataField"><input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Display Payroll" /></td>
		</tr>
	</tbody>
	</table>
</form>

<?php if ($records->num_rows()) {?>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><?php echo $type ?> Payroll</td>
		<td scope="col" class="listViewThS1" nowrap>Emp No.</td>
		<td scope="col" class="listViewThS1" nowrap>Employee's Name</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Gross Pay</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Deductions</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Net Pay</div></td>
	</tr>
	<tr>
		<td colspan="6" height="1" class="listViewHRS1"></td>
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
    	</tr>
    	<tr>
    		<td colspan="6" height="1" class="listViewHRS1"></td>
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
    	</tr>
    	<tr>
    		<td colspan="6" height="1" class="listViewHRS1"></td>
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

<input type="button" class="button" name="cmdPrint" id="cmdPrint" value="   Print   " onclick="popUp('index.php?report/print_general_payroll/<?php echo $payrollID ?>/<?php echo $officeID ?>');" />
<!--<input type="button" class="button" name="cmdExport" id="cmdExport" value="Export Data" onclick="popUp('index.php?report/export_general_payroll/<?php echo $payrollID ?>/<?php echo $officeID ?>');"  />-->

<?php } ?>
<script>
addToValidate('frmCreate','periodID', '', true, 'Payroll Period');
addToValidate('frmCreate','officeID', '', true, 'Office');
</script>

<script language="javascript">

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=600,left = 0,top = 0');");
	//return false;
}

</script>