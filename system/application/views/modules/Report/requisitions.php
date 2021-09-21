
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td class="dataLabel" width="100">Vessel:</td>
		<td class="dataField" width="300">
			<select name="type" id="type">
			<option>-----------------------------------------</option>
			</select>
		</td>
		<td class="dataLabel" width="100" nowrap>RO No.:</td>
		<td class="dataField">
			<input type="text" name="rono" size="33" />
		</td>
	</tr>
	<tr height="20">
		<td class="dataLabel">Category:</td>
		<td class="dataField">
			<select name="type" id="type">
			<option>-----------------------------------------</option>
			</select>
		</td>
		<td class="dataLabel">Sub Category:</td>
		<td class="dataField">
			<select name="type" id="type">
			<option>-----------------------------------------</option>
			</select>
		</td>
	</tr>
	<tr height="20">
		<td class="dataLabel">Item:</td>
		<td class="dataField"><input type="text" name="rono" size="33" /></td>
		<td class="dataLabel">Period:</td>
		<td class="dataField">
			<input type="text" name="startDate" id="startDate" maxlength="10" size="10" value="<?php echo date("m/d/Y"); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger1" align="top" alt="Date Filed" src="images/jscalendar.gif"/>
			<input type="text" name="endDate" id="endDate" maxlength="10" size="10" value="<?php echo date("m/d/Y"); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger2" align="top" alt="To Date" src="images/jscalendar.gif"/>
		</td>
	</tr>
	<tr height="30">
		<td class="dataField" colspan="4"><input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Apply Filters" /></td>
	</tr>
</tbody>
</table>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>RO Date</td>
		<td scope="col" class="listViewThS1" nowrap>RO No.</td>
		<td scope="col" class="listViewThS1" nowrap>Category</td>
		<td scope="col" class="listViewThS1" nowrap>Sub-Cat</td>
		<td scope="col" class="listViewThS1" nowrap>Item</td>
		<td scope="col" class="listViewThS1" nowrap>Particular</td>
		<td scope="col" class="listViewThS1" nowrap>Rqstd Qty</td>
		<td scope="col" class="listViewThS1" nowrap>Due Date</td>
		<td scope="col" class="listViewThS1" nowrap>PO No.</td>
		<td scope="col" class="listViewThS1" nowrap>Supplier</td>
		<td scope="col" class="listViewThS1" nowrap>Est. Delivery Date</td>
		<td scope="col" class="listViewThS1" nowrap>Delivery Place</td>
		<td scope="col" class="listViewThS1" nowrap>Actual Delivery Date</td>
		<td scope="col" class="listViewThS1" nowrap>Remarks</td>
	</tr>
	<?php 
	for($i=1; $i<=10; $i++) {
	?>
	<tr height="20">
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;</td> 
	</tr>
	<tr>
		<td colspan="14" height="1" class="listViewHRS1"></td>
	</tr>
	<?php } ?>
</tbody>
</table>


<input type="button" class="button" name="cmdPrint" value="     PRINT     " />
