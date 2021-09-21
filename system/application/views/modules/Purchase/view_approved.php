<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdcancel" type="button" id="cmdcancel" value="SI Approve" />
    <input class="button" name="cmdcancel" type="button" id="cmdcancel" value="Mgr Approve" />
    <input class="button" name="cmdcancel" type="button" id="cmdcancel" value="GM Approve" />
    <input class="button" name="cmdcancel" type="button" id="cmdcancel" value="COO Approve" />
    <input class="button" name="cmdcancel" type="button" id="cmdcancel" value=" Edit " />
    <input class="button" name="cmdcancel" type="button" id="cmdcancel" value=" Cancel " />
    <input class="button" name="cmdprint" type="button" id="cmdprint" value="   Print   "/>
    </td>
  </tr>
</table> 

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
     <tr>
	     <th class="tabDetailViewDL" colspan="4" align="left"><h4 class="dataLabel">Requisition Orders </h4></th>
	 </tr>
    <tr>
        <td class="tabDetailViewDL" width="100"><slot>Vessel :</slot></td>
        <td class="tabDetailViewDF"><slot> MV HOEGH SYDNEY</slot></td>
        <td class="tabDetailViewDL" width="100"><slot>RO No. :</slot></td>
        <td class="tabDetailViewDF"><slot> 	1003</slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Department :</slot></td>
        <td class="tabDetailViewDF"><slot> Deck Department</slot></td>
        <td class="tabDetailViewDL"><slot>Date :</slot></td>
        <td class="tabDetailViewDF"><slot> 	10/20/2010</slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Main Category :</slot></td>
        <td class="tabDetailViewDF"><slot> Store and Supplies</slot></td>
        <td class="tabDetailViewDL"><slot>Port of Delivery :</slot></td>
        <td class="tabDetailViewDF"><slot> 	Japan</slot></td>
    </tr>
</table>
</p>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Code</td>
		<td scope="col" class="listViewThS1" nowrap>Item Description</td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">ROB</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">Rqstd Qty</div></td>
		<td scope="col" class="listViewThS1" nowrap>Unit</td>
		<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="left" valign="top">1234</td>
		
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="left" valign="top">#6001 ZZ Ball Bearing "SKF"</td>
		
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="center" valign="top">1</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="center" valign="top">10</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">Pcs</td>
        
        <td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top"><img border="0" src="images/final.png" alt="Purchase Order" title="Purchase Order"/></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="left" valign="top">4344</td>
		
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="left" valign="top">Lock Washer</td>
		
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="center" valign="top">10</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="center" valign="top">60</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">Pcs</td>
        
        <td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top"><img border="0" src="images/final.png" alt="Purchase Order" title="Purchase Order"/></td>
	</tr>
	<tr>
		<td colspan="6" height="1" class="listViewHRS1"></td>
	</tr>
	<?php 
	for($i=1; $i<=5; $i++) {
	?>
	<tr height="20">
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
        
        <td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
        
        <td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="left" valign="top">&nbsp;</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
		
	</tr>
	<tr>
		<td colspan="6" height="1" class="listViewHRS1"></td>
	</tr>
	<?php } ?>
</tbody>
</table>

<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	 <tr>
        <td class="tabDetailViewDL" width="100"><slot>Remarks :</slot></td>
        <td class="tabDetailViewDF" colspan="3"><slot>For Engine Dept Request</b></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" nowrap><slot>Chief Officer/Engineer :</slot></td>
        <td class="tabDetailViewDF"><slot>Chief Officer Nicanor B. Cunado</b></slot></td>
        <td class="tabDetailViewDL" width="100"><slot>Noted By :</slot></td>
        <td class="tabDetailViewDF"><slot>Capt. Antonio D. Lat</b></slot></td>
    </tr>
</table>

<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete this official receipt?");
    
    if (reply==true)
        window.location='index.php?receipt/delete/'+id;
}

function voidRecord(id)
{
    reply=confirm("Do you really want to void this official receipt?");
    
    if (reply==true)
        window.location='index.php?receipt/void/'+id;
}

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=720,height=600,left = 0,top = 0');");
	return false;
}

function popUp3(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=150,left = 0,top = 0');");
}

</script>