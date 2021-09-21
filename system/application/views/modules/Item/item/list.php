<form name="frmFilter" id="frmFilter" method="POST" action="index.php?item/show">
<input type="hidden" id="sortby" name="sortby" value="" />
<input type="hidden" id="sortorder" name="sortorder" value="" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Main Category </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Sub-Cat1 </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Sub-Cat2 </a></td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="#" />Item </a></td>
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" nowrap colspan="5" class="listViewPaginationTdS1">&nbsp; </td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Stores n Supplies</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Cargo Wire</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Hoisting</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Item 1</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Stores n Supplies</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Cargo Wire</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Hoisting</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Item 2</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Stores n Supplies</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Cargo Wire</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Hoisting</a></span></td>
    	
    	<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="#" class="listViewTdLinkS1">Item 3</a></span></td>
    	
    	<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    	align="right" valign="top">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="20" class="listViewHRS1" height="1"></td>
	</tr>
	<tr>
		<td height="20" scope="col" class="listViewThS1" colspan="2" nowrap>
		<?php 
		echo "Total Records: 3";
		?>
		</td>
		
		<td height="20" colspan="3" scope="col" align="right" class="listViewThS1" nowrap>
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
