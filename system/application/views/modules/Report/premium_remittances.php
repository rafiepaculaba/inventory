<form method="POST" name="frmCreate" id="frmCreate" action="index.php?report/premium_remittances" onsubmit="return check_form('frmCreate');" >
	<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="600">
	<tbody>
		 <tr>
	        <th class="dataField" colspan="5" align="left"><h4 class="dataLabel">Premium Remittances</h4></th>
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
			<td class="dataLabel" width="50">Remittance </td>
			<td class="dataField" width="100" nowrap>
			<select name="deductionCode" id="deductionCode">
			<option value="">---------------</option>
			<?php 
			if ($deductions->num_rows()) {
				foreach($deductions->result() as $row) {
					if ($deductionCode== $row->deductionCode)
						echo '<option value="'.$row->deductionCode.'" selected>'.$row->description.'</option>';
					else
						echo '<option value="'.$row->deductionCode.'">'.$row->description.'</option>';
				}				
			}
			?>
			</select>
			</td>
			<td class="dataField"><input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="   Go   " /></td>
		</tr>
	</tbody>
	</table>
</form>

<?php if ($records->num_rows()) {?>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="600">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Account No.</td>
		<td scope="col" class="listViewThS1" nowrap>Name</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Employee Share</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Employer Share</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Total Contribution</div></td>
	</tr>
	<tr>
		<td colspan="5" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	$ttl_net = 0;
	if ($records->num_rows()) {
		foreach($records->result() as $row) {
			$ttl_net += $row->contribution;
	?>
    	<tr height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->$idno ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->lname.", ".$row->fname." ".$row->mname ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->employee_share,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->employer_share,2) ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->contribution,2) ?></span></td>
    	</tr>
    	<tr>
    		<td colspan="5" height="1" class="listViewHRS1"></td>
    	</tr>
	<?php
		}
		?>
		<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="4"
            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL :</b></span></td>
            
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($ttl_net,2) ?></b></span></td>
    		
    	</tr>
    	<tr>
    		<td colspan="5" height="1" class="listViewHRS1"></td>
    	</tr>
		<?php 
	} else {
	?>
    	<tr>
    		<td colspan="5" class="oddListRowS1">
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
		<td colspan="5" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>

<input type="button" class="button" name="cmdPrint" id="cmdPrint" value="   Print   " onclick="popUp('index.php?report/print_premium_remittances/<?php echo $payrollID ?>/<?php echo $deductionCode ?>');" />
<!--<input type="button" class="button" name="cmdExport" id="cmdExport" value="Export Data" onclick="popUp('index.php?report/export_premium_remittances/<?php echo $payrollID ?>/<?php echo $deductionCode ?>');"  />-->

<?php } ?>
<script>
addToValidate('frmCreate','periodID', '', true, 'Payroll Period');
addToValidate('frmCreate','deductionCode', '', true, 'Remittance');
</script>

<script language="javascript">

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=600,left = 0,top = 0');");
	//return false;
}

</script>