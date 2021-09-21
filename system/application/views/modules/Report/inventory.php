
<form method="POST" action="index.php?report/inventory" >
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td class="dataLabel" width="90" nowrap>Product Type:</td>
		<td class="dataField" width="100">
		<select name="type" id="type">
		<option value="FOL" <?php if ($type=='FOL') echo "selected" ?> >FOL</option>
		<option value="SSP" <?php if ($type=='SSP') echo "selected" ?> >SSP</option>
		</select>
		</td>
		<td class="dataLabel" width="50">Date :</td>
		<td class="dataField" width="250">
		<input type="text" name="startDate" id="startDate" size="10" value="<?php echo $startDate ?>" /> <img id="jscal_trigger1" align="top" alt="Start Date" src="images/jscalendar.gif"/> 
		to 
		<input type="text" name="endDate" id="endDate" size="10" value="<?php echo $endDate ?>" />  <img id="jscal_trigger2" align="top" alt="End Date" src="images/jscalendar.gif"/>
		</td>
		<td class="dataField"><input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Display Report" /></td>
	</tr>
</tbody>
</table>
</form>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="10">No.</td>
		<td scope="col" class="listViewThS1" nowrap>Item/Description</td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Beg Balance</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Received</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Total</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Consumption</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Ending Bal</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Good for(Days)</div></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
    <tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="8"
            align="left" valign="top"><span sugar="sugar0b"><b>FUEL</b> </span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">1. </span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Auto Diesel Oil</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">19,430</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">-</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">19,430</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,105</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">18,325</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">12.2</span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">2. </span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Regular Gasoline</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">76</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">300</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">376</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">80</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">296</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">3.7</span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
    <tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="8"
            align="left" valign="top"><span sugar="sugar0b"><b>OIL</b> </span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">3. </span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Delo Silver, Sae-10W</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,705</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">-</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,750</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">10</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,740</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">33.9</span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">4. </span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Delo Silver, Sae-30</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,212</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">-</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,212</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">65</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">1,147</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">22.9</span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
    <tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="8"
            align="left" valign="top"><span sugar="sugar0b"><b>LUBRICANTS</b> </span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">5. </span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Marfak Grease</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">122</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">-</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">122</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">-</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">122</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">24</span></td>
	</tr>
	<tr>
    	<td colspan="8" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">6. </span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Brake and Clutch Fluid</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">95</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">-</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">95</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">10</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">85</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b">47.5</span></td>
	</tr>
</tbody>
</table>

<input type="button" class="button" name="cmdPrint" value="     PRINT     " />


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