
<form method="POST" action="index.php?report/expenses" >
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td class="dataLabel" width="90" nowrap>Product Type:</td>
		<td class="dataField" width="100">
		<select name="type" id="type">
		<option value="SSP" <?php if ($type=='SSP') echo "selected" ?> >SSP</option>
		<option value="FOL" <?php if ($type=='FOL') echo "selected" ?> >FOL</option>
		</select>
		</td>
		<td class="dataLabel" width="50">Month:</td>
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
		<td class="dataLabel" width="50">Year: </td>
		<td class="dataField" width="100">
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

<h4 class="dataLabel">1. DIRECT COST</h4>
<h4 class="dataLabel">1.1 LOG PROCESSING</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">C/S - #22</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">1,060.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">CAT 950 WL</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">6,059.27</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">CAT 980 Loader</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">80.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Dragsaw</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">2,580.37</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Eucid #3</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">8,269.92</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Log Process</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">9,562.22</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">RC - #12</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">5,006.95</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">RC - #14</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">39,735.80</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">TCM L-850</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">495.84</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr height="20">
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top" colspan="2"><span sugar="sugar0b"><b>Total for VP Log Processing....... Php </b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>72,850.37</b></u></span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>

<br/>
<h4 class="dataLabel">2. VENEER PLANT OPRN.</h4>
<h4 class="dataLabel">2.1 LATHE OPRN./VENEER PLANT</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">10' Log Charger</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">1,395.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">10' Taihei Lathe</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">20,771.40</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">10' Taihei Reeling</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">739.40</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">10' Unreeling/Reeling</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">100.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">8' Lathe Meidensha Hoist</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">2,927.46</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">8' Log Charger</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">778.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">8' Taihei Lathe</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">14,929.92</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">8' Taihei Reeling</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">13,678.42</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">8' Unreeling Motor</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">611.40</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
    <tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">8' Unreeling/Reeling</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">11,751.56</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">D/E Veneer Taping</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">32,190.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Dahol Lathe</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">18,460.12</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Fire Pump</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">2,579.54</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Log Charger</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">135.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
    <tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Toyo Knife Grinder</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">1,125.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>Sub-total ........... Php</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>122,172.22</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>

<h4 class="dataLabel">2.2 JOINTER/SPLICER</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">FL-5 Splicer</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">600.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">FL-7A Splicer</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">7,823.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">FL-7B Splicer</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">2,750.15</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Minami Core Builder</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">36,529.94</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Ruckie Jointer</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">12,266.90</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">Veneer Refilling</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">40.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>Sub-total ........... Php</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>60,009.99</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>
<h4 class="dataLabel">2.3 SANDING/GRADING</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">D/E Veneer Grading</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">4,406.00</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">G/E Tagging/Grading</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">1,137.90</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>Sub-total ........... Php</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>5,543.90</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
	<tr>
    	<td colspan="4" height="1" class="listViewHRS1"></td>
    </tr>
	<tr height="20">
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top" colspan="2"><span sugar="sugar0b"><b>Total for Veneer Plant Oprn....... Php </b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>187,636.11</b></u></span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"  width="400"><span sugar="sugar0b"><b>GRAND TOTAL MFTG. OPRN. ....... Php </b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top" width="100"><span sugar="sugar0b"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>260,484.48</b></u></span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>

<input type="button" class="button" name="cmdPrint" value="     PRINT     " />
<script language="javascript">
function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=600,left = 0,top = 0');");
	return false;
}
</script>