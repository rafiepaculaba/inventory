
<h4 align="center"><u>User Accounts</u></h4>
<br>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Name</td>
		<td scope="col" class="listViewThS1" nowrap>Username</td>
		<td scope="col" class="listViewThS1" nowrap>User Group</td>
		<td scope="col" class="listViewThS1" nowrap>Administrator</td>
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
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->lastName.", ".$row->firstName." ".$row->middleName ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->userName ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->groupName ?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><span sugar="sugar0b">
    		<?php 
    			if ($row->isAdmin==1)
    				echo "Yes";
    			else
    				echo "No";
    		?></span></td>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b">
    		<?php 
    			if ($row->rstatus==1)
    				echo "Active";
    			else
    				echo "Inactive";
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