
<form method="POST" action="index.php?report/issuances" >
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

<h4 class="dataLabel">1. VENEER PLANT OPRN.</h4>
<h4 class="dataLabel">1.1 LATHE OPRN./VENEER PLANT</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Qty Issued</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">10' Log Charger</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">395 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">771 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">739 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">100 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">46 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">778 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">92 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">42 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">40 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">156 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">190 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">12 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">54 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">135 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">125 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b"><b>Total : </b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>3,172 Pcs</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>

<h4 class="dataLabel">1.2 JOINTER/SPLICER</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Qty Issued</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">FL-5 Splicer</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">600 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">23 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">15 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">94 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">266 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">40 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b"><b>Total : </b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>638 Pcs</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
             <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
	</tr>
</tbody>
</table>
<h4 class="dataLabel">1.3 SANDING/GRADING</h4>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap width="300">Description</td>
		<td scope="col" class="listViewThS1" nowrap width="100"><div align="right">Qty Issued</div></td>
		<td scope="col" class="listViewThS1" nowrap width="100">&nbsp;</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">D/E Veneer Grading</span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">406 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b">137 Pcs</span></td>
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
            align="right" valign="top"><span sugar="sugar0b"><b>Total : </b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b"><b>543 Pcs</b></span></td>
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
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