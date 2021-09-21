
<p>
<table  width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="center" colspan="6">
		<slot>
		<font size="2"><b><?php echo $this->config_model->getConfig("Company"); ?></b></font>
		<br/>
		<?php echo $this->config_model->getConfig("Address"); ?>
		<br/>
		<?php echo $this->config_model->getConfig("Contact Number"); ?>
		</slot>
	</td>
</tr>
</table>
<h4 align="center"><u>Items List</u></h4>
<br>
</p>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Item Code</td>
		<td scope="col" class="listViewThS1" nowrap>Type</td>
		<td scope="col" class="listViewThS1" nowrap>Category</td>
		<td scope="col" class="listViewThS1" nowrap>Brand</td>
		<td scope="col" class="listViewThS1" nowrap>Item</td>
		<td scope="col" class="listViewThS1" nowrap>Status</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		$ctr = 0;
		foreach($records->result() as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->itemCode ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b">
    		<?php if($row->type=="SSP") {
    				echo "SSP"; 
    			} else {
				  	echo "FOL";
    			}
			?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->catName ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->brandName ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->item ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b">
    		<?php if($row->status==1) 
					echo "Active";
				  else
				  	echo "<font color='Red'><b> Inactive </b></font>";
			?></span></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		$ctr++;
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