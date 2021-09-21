<form name="frmFilter" id="frmFilter" method="POST" action="index.php?payment/show">
<input type="hidden" id="sortby" name="sortby" value="" />
<input type="hidden" id="sortorder" name="sortorder" value="" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Advice No. </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Date </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />PO No. </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Invoice No. </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Invoice Date </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Place of Delivery </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Payee </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Category </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Sub-Category </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" /><div align="right">Total Amount</div></a></td>
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" colspan="12" nowrap  class="listViewPaginationTdS1">&nbsp; </td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
    <tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">PA1000   </a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">10/28/2010</a></span></td>
          
         <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">1001   </a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">012334-IN   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">11/05/2010   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">Jackson Vil LE, FL, USA   </a></span></td>
    
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">DATREX, INC</a></span></td>
    
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">Store & Sup</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">Paint</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top"><span sugar="sugar0b"><a href="index.php?payment/view" class="listViewTdLinkS1">400.00</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="20" class="listViewHRS1" height="1"></td>
	</tr>
	<tr>
		<td height="20" scope="col" class="listViewThS1" colspan="5" nowrap>
		<?php 
		echo "Total Records: 1";
		?>
		</td>
		
		<td height="20" colspan="6" scope="col" align="right" class="listViewThS1" nowrap>
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