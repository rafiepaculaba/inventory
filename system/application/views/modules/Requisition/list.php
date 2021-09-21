<form name="frmFilter" id="frmFilter" method="POST" action="index.php?requisition/show">
<input type="hidden" id="sortby" name="sortby" value="" />
<input type="hidden" id="sortorder" name="sortorder" value="" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />RO No. </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Date </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Vessel </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Category </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Sub Category 1 </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" /><div align="center">SI</div></a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" /><div align="center">Tech Mgr</div></a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" /><div align="center">GM</div></a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" /><div align="center">COO</div></a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" /><div align="center">PO</div></a></td>
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="ROno" id="ROno" value="" size="10" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<input type="text" name="startDate" id="startDate" maxlength="10" size="10" value="<?php echo date("m/d/Y"); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger1" align="top" alt="Date Filed" src="images/jscalendar.gif"/>
		<input type="text" name="endDate" id="endDate" maxlength="10" size="10" value="<?php echo date("m/d/Y"); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger2" align="top" alt="To Date" src="images/jscalendar.gif"/>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="prNo" id="prNo" value="" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="category">
		<option>----------------</option>
		</select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="category">
		<option>----------------</option>
		</select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1" align="center">
		<select name="status" id="status">
		<option value="">----------</option>
        <option value="1">Pending</option>
        <option value="2">Approved</option>
        <option value="0">Cancelled</option>
        </select>
		</td>	
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1" align="center">
		<select name="status" id="status">
		<option value="">----------</option>
        <option value="1">Pending</option>
        <option value="2">Approved</option>
        <option value="0">Cancelled</option>
        </select>
		</td>	
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1" align="center">
		<select name="status" id="status">
		<option value="">----------</option>
        <option value="1">Pending</option>
        <option value="2">Approved</option>
        <option value="0">Cancelled</option>
        </select>
		</td>	
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1" align="center">
		<select name="status" id="status">
		<option value="">----------</option>
        <option value="1">Pending</option>
        <option value="2">Approved</option>
        <option value="0">Cancelled</option>
        </select>
		</td>	
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp; </td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp; </td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
    <tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">1003   </a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">10/28/2010</a></span></td>
            
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">MV HOEGH SYDNEY   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Store & Supplies   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Paint   </a></span></td>
    
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Pending</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Pending</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Pending</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Pending</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?purchase/view" class="listViewTdLinkS1">&nbsp;</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="20" class="listViewHRS1" height="1"></td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">1002   </a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">09/20/2010</a></span></td>
            
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">MV HOEGH SYDNEY   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Store & Supplies   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Cargo Wire   </a></span></td>
    
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1"><font color="green">Approved</font></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1"><font color="green">Approved</font></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1"><font color="green">Approved</font></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">N/A</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?purchase/view" class="listViewTdLinkS1"><img border="0" src="images/tabs/purchase.gif" alt="Purchase Order" title="Purchase Order"/></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="20" class="listViewHRS1" height="1"></td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">1001   </a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">09/09/2010</a></span></td>
            
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">MV HOEGH SYDNEY   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Store & Supplies   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">Cargo Wire   </a></span></td>
    
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1"><font color="green">Approved</font></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1"><font color="green">Approved</font></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1"><font color="green">Approved</font></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?requisition/view" class="listViewTdLinkS1">N/A</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="center" valign="top"><span sugar="sugar0b"><a href="index.php?purchase/view" class="listViewTdLinkS1"><img border="0" src="images/tabs/purchase.gif" alt="Purchase Order" title="Purchase Order"/></a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="20" class="listViewHRS1" height="1"></td>
	</tr>
	<tr>
		<td height="20" scope="col" class="listViewThS1" colspan="3" nowrap>
		<?php 
		echo "Total Records: 3";
		?>
		</td>
		
		<td height="20" colspan="8" scope="col" align="right" class="listViewThS1" nowrap>
		<div align="right">
		Number of Records 
		<select name="limit" id="limit" class="button" onchange="changeDisplay();">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="75">75</option>
        <option value="100">100</option>
        <option value="125">125</option>
        <option value="150">150</option>
        <option value="200">200</option>
        <option value="All">All</option>
        </select> 
		&nbsp;&nbsp;
		<input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Apply Filters"/>
		<input type="reset" class="button" name="cmdClear" id="cmdClear" value="Clear Filters" onclick="resetFilter();"/>	&nbsp;
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png" />
		</div>
		</td>
	</tr>
</tbody>
</table>
</form>

<?php
calendarSetup('orDate', 'jscal_trigger1');
calendarSetup('todate', 'jscal_trigger2');
?>

<script language="javascript">
function changeDisplay()
{
	document.getElementById('cmdFilter').value="Apply Filters";
	document.getElementById('frmFilter').submit();
}

function resetFilter()
{
//	document.getElementById('startDate').value		= "";
//	document.getElementById('endDate').value		= "";
//	document.getElementById('prNo').value		= "";
//	document.getElementById('deptID').value	  	= "";
//	document.getElementById('status').value	= "";
	document.getElementById('frmFilter').submit();
}

function sorting(fld)
{
	if (document.getElementById('sortby').value==fld) {
		if (document.getElementById('sortorder').value=="ASC") {
			document.getElementById('sortorder').value = "DESC";
		} else {
			document.getElementById('sortorder').value = "ASC";
		}
	} else {
		document.getElementById('sortby').value	   = fld;
		document.getElementById('sortorder').value = "ASC";
	}
	
	document.getElementById('frmFilter').submit();
}


function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=500,left = 0,top = 0');");
	return false;
}

<?php
//if ($orDate || $custNo || $orNo || $rstatus || $rstatus=="0") {
//	echo "hideFilters('searchHandle');";	
//}
?>

</script>