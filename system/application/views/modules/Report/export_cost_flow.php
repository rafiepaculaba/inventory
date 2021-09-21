<br>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Category</td>
		<td scope="col" class="listViewThS1" nowrap>PLU</td>
		<td scope="col" class="listViewThS1" nowrap>Brand</td>
		<td scope="col" class="listViewThS1" nowrap>Description</td>
		<td scope="col" class="listViewThS1" nowrap>Unit of Msr</td>
		<td scope="col" class="listViewThS1" nowrap>Qty(Beginning)</td>
		<td scope="col" class="listViewThS1" nowrap>Ave Cost/Unit</td>
		<td scope="col" class="listViewThS1" nowrap>Beginning Inventory</td>
		<td scope="col" class="listViewThS1" nowrap>Purchases</td>
		<td scope="col" class="listViewThS1" nowrap>Ttl Purchases Cost</td>
		<td scope="col" class="listViewThS1" nowrap>Purchase Returns</td>
		<td scope="col" class="listViewThS1" nowrap>Ttl Returns Cost</td>
		<td scope="col" class="listViewThS1" nowrap>Goods Available</td>
		<td scope="col" class="listViewThS1" nowrap>Goods Available Cost</td>
		<td scope="col" class="listViewThS1" nowrap>Goods Available Cost</td>
		<td scope="col" class="listViewThS1" nowrap>Goods Sold</td>
		<td scope="col" class="listViewThS1" nowrap>Goods Sold Cost</td>
		<td scope="col" class="listViewThS1" nowrap>Qty(Ending)</td>
		<td scope="col" class="listViewThS1" nowrap>Ending Inventory</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		foreach($records as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" nowrap
            align="left" valign="top"><span sugar="sugar0b"><?php echo $row['category'] ?></span></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" nowrap
            align="left" valign="top"><span sugar="sugar0b"><?php echo $row['plu'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="left" valign="top"><span sugar="sugar0b"><?php echo $row['brand'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="left" valign="top"><span sugar="sugar0b"><?php echo $row['desc'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="left" valign="top"><span sugar="sugar0b"><?php echo $row['umsr'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo $row['qty_on_hand'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['cost'],2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['beg_inventory_cost'],2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo $row['purchases'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['purchases_cost'],2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo $row['returns'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['returns_cost'],2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo $row['goods_available'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['goods_available_cost'],2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo $row['goods_sold'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['goods_sold_cost'],2) ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo $row['end_balance'] ?></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" nowrap
    		align="center" valign="top"><span sugar="sugar0b"><?php echo number_format($row['end_balance_cost'],2) ?></span></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		}
	} else {
	?>
    	<tr>
    		<td colspan="20" class="oddListRowS1">
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
		<td colspan="20" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>

<script language="javascript">

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=500,left = 0,top = 0');");
	return false;
}

</script>