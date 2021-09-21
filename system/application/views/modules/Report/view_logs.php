
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdview" type="button" id="cmdview" value="View Product" onclick="window.location='index.php?product/view/<?php echo $rec->prodCode; ?>';" />
  </tr>
</table> 

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Product</h4></th>
    </tr>
     <tr>
        <td class="tabDetailViewDL" width="100"><slot>Product Code :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->prodCode; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Description :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->prodDesc; ?></slot></td>
    </tr>
</table>
</p>


<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Date</td>
		<td scope="col" class="listViewThS1" nowrap>Time</td>
		<td scope="col" class="listViewThS1" nowrap>Action</td>
		<td scope="col" class="listViewThS1" nowrap>Changes</td>
		<td scope="col" class="listViewThS1" nowrap>User</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		foreach($records->result() as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#fdfdfd', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#fdfdfd', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#fdfdfd', '#DEEFFF', '');" height="20">
    	       
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="left" bgcolor="#fdfdfd" valign="top"><?php if ($row->logDate) echo date("m/d/Y",strtotime($row->logDate)) ?></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" bgcolor="#fdfdfd" valign="top"><?php echo date("h:i A",strtotime($row->logTime)) ?></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" bgcolor="#fdfdfd" valign="top"><?php echo $row->action ?></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" bgcolor="#fdfdfd" valign="top"><?php echo $row->remarks ?></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" bgcolor="#fdfdfd" valign="top">
			<?php 
    			echo "$row->lastName, $row->firstName  $row->middleName";
    		?>    		
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
