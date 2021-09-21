 <table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value="Edit" onclick="window.location='index.php?group/edit/<?php echo $rec->groupID; ?>';" />
	<input class="button" name="cmddelete" type="button" id="cmddelete" value="Delete" onclick="deleteRecord('<?php echo $rec->groupID; ?>');" />
  </tr>
</table>  
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View User Group</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="100"><slot>Group :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->groupName; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Description :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->groupDesc; ?> </slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Status :</slot></td>
        <td class="tabDetailViewDF">
        <slot>
        <?php 
        
        if ($rec->rstatus==1)
        	echo "Enabled"; 
        else
        	echo "<font color='red'>Disabled</font>"; 
        
        ?> 
        </slot>
        </td>
    </tr>
</table>
</p>

<!--<br>
<h4 class="dataLabel">&nbsp;&nbsp;<img src="images/check.png" alt="privileges" border="0" />Report Privileges</h4>

<form name="frmFilter" id="frmFilter" method="POST" action="index.php?group/delete_roles">
<input type="hidden" name="groupID" id="groupID" value="<?php echo $rec->groupID ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
		<tr height="20">
    		<td scope="col" class="listViewThS1" width="20" nowrap>&nbsp;</td>
			<td scope="col" class="listViewThS1" nowrap>Reports</td>
    	</tr>
		<tr>
    		<td colspan="2" height="1" class="listViewHRS1"></td>
    	</tr>
	
	<?php
	if ($usergrouproles->num_rows()) {
		$ctr = 0;
		foreach($usergrouproles->result() as $row) {
	?>
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	   <td scope="row" 
	        class="oddListRowS1" bgcolor="#ffffff" 
	        align="left" valign="top"><input type="checkbox" value="<?php echo $row->grID ?>" name="chkDelete[]"/></td>
			
			<td scope="row" 
	        class="oddListRowS1" bgcolor="#ffffff" 
	        align="left" valign="top"><?php echo $row->roleName ?></td>
			
			<td scope="row" colspan="2"
	        class="oddListRowS1" bgcolor="#ffffff" 
			align="left" valign="top"><?php echo $row->roleDesc ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
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
            		<td nowrap="nowrap" align="center"><b><i>-- No roles found. --</i></b> </td>
            	</tr>
            	</tbody>
            	</table>
    		</td>
    	</tr>
	<?php
	}
	?>
</tbody>
</table>
</form>
-->
<h4 class="dataLabel">&nbsp;&nbsp;<img src="images/check.png" alt="privileges" border="0" />Privileges</h4>
<form name="frmPrivileges" id=""frmPrivileges"" method="POST" action="index.php?group/update_roles">
<input type="hidden" name="groupID" id="groupID" value="<?php echo $rec->groupID ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr height="20">
	<td scope="col" class="listViewThS1" width="20" nowrap>&nbsp;</td>
	<td scope="col" class="listViewThS1" nowrap>Management</td>
	<td scope="col" class="listViewThS1" width="50" nowrap><div align="center">Add</div></td>
	<td scope="col" class="listViewThS1" width="50" nowrap><div align="center">View</div></td>
	<td scope="col" class="listViewThS1" width="50" nowrap><div align="center">Edit</div></td>
	<td scope="col" class="listViewThS1" width="50" nowrap><div align="center">Delete</div></td>
	<td scope="col" class="listViewThS1" width="50" nowrap><div align="center">Approve/Assign</div></td>
</tr>
<tr>
	<td colspan="20" height="1" class="listViewHRS1"></td>
</tr>
<?php 
if (!empty($module_privileges)) {
	$ctr = 1000;
	foreach($module_privileges as $key=>$row) {
?>
<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="" id="chkAll_<?php echo $ctr ?>" onclick="checkAll(<?php echo $ctr ?>)" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><b><?php echo $key ?></b></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr ?>" 
    <?php 
    if ($usergrouproles->num_rows()) {
    	foreach ($usergrouproles->result() as $role) {
	    	if ($role->roleID==$ctr) {
	    		echo " checked ";
	    	}
    	}
    }
    ?>
     name="chkAdd[]" id="chk_<?php echo $ctr ?>" /></td>
    
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+1 ?>"  
    <?php 
    if ($usergrouproles->num_rows()) {
    	foreach ($usergrouproles->result() as $role) {
	    	if ($role->roleID==($ctr+1)) {
	    		echo " checked ";
	    	}
    	}
    }
    ?>
     name="chkView[]" id="chk_<?php echo $ctr+1 ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+2 ?>"  
    <?php 
    if ($usergrouproles->num_rows()) {
    	foreach ($usergrouproles->result() as $role) {
	    	if ($role->roleID==($ctr+2)) {
	    		echo " checked ";
	    	}
    	}
    }
    ?>
     name="chkEdit[]" id="chk_<?php echo $ctr+2 ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+3 ?>"  
    <?php 
    if ($usergrouproles->num_rows()) {
    	foreach ($usergrouproles->result() as $role) {
	    	if ($role->roleID==($ctr+3)) {
	    		echo " checked ";
	    	}
    	}
    }
    ?>
     name="chkDelete[]" id="chk_<?php echo $ctr+3 ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+4 ?>"  
    <?php 
    if ($usergrouproles->num_rows()) {
    	foreach ($usergrouproles->result() as $role) {
	    	if ($role->roleID==($ctr+4)) {
	    		echo " checked ";
	    	}
    	}
    }
    ?>
     name="chkApprove[]" id="chk_<?php echo $ctr+4 ?>" /></td>
</tr>
<tr>
    <td colspan="20" height="1" class="listViewHRS1"></td>
</tr>
<?php 
		if (!empty($row)) {
			$i = 10;
			foreach($row as $sub) {
				?>
				<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="" id="chkAll_<?php echo $ctr+$i ?>" onclick="checkAll(<?php echo $ctr+$i ?>)" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;&nbsp;&nbsp;<img src="images/subitem.gif" alt="<?php echo $sub ?>" /> <?php echo $sub ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i ?>" 
				    <?php 
				    if ($usergrouproles->num_rows()) {
				    	foreach ($usergrouproles->result() as $role) {
					    	if ($role->roleID==($ctr+$i)) {
					    		echo " checked ";
					    	}
				    	}
				    }
			    	?>
				     name="chkAdd[]" id="chk_<?php echo $ctr+$i ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+1 ?>" 
				    <?php 
				    if ($usergrouproles->num_rows()) {
				    	foreach ($usergrouproles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+1)) {
					    		echo " checked ";
					    	}
				    	}
				    }
			    	?>
				     name="chkView[]" id="chk_<?php echo $ctr+$i+1 ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+2 ?>" 
				    <?php 
				    if ($usergrouproles->num_rows()) {
				    	foreach ($usergrouproles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+2)) {
					    		echo " checked ";
					    	}
				    	}
				    }
			    	?>
				     name="chkEdit[]" id="chk_<?php echo $ctr+$i+2 ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+3 ?>" 
				    <?php 
				    if ($usergrouproles->num_rows()) {
				    	foreach ($usergrouproles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+3)) {
					    		echo " checked ";
					    	}
				    	}
				    }
			    	?>
				     name="chkDelete[]" id="chk_<?php echo $ctr+$i+3 ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+4 ?>" 
				    <?php 
				    if ($usergrouproles->num_rows()) {
				    	foreach ($usergrouproles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+4)) {
					    		echo " checked ";
					    	}
				    	}
				    }
			    	?>
				     name="chkApprove[]" id="chk_<?php echo $ctr+$i+4 ?>" /></td>
				</tr>
				<tr>
				    <td colspan="20" height="1" class="listViewHRS1"></td>
				</tr>
				<?php
				$i+=10; 
			}
		}
		$ctr+=1000;
	}
}
?>

<?php 
if (!empty($report_privileges)) {
	?>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="" id="chkAll_Reports" onclick="checkAllReports()" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><b>View Reports</b></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
	    <td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<?php 
	$ctr = 1;
	foreach($report_privileges as $row) {
	?>
	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;&nbsp;&nbsp;<img src="images/subitem.gif" alt="<?php echo $row ?>" /> <?php echo $row ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr ?>"  
    <?php 
    if ($usergrouproles->num_rows()) {
    	foreach ($usergrouproles->result() as $role) {
	    	if ($role->roleID==$ctr) {
	    		echo " checked ";
	    	}
    	}
    }
    ?>
     name="chkView[]" id="chk_<?php echo $ctr ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
	    <td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
<?php 
	$ctr++;
	}
}
?>
</tbody>
</table>
<br/>
<input id="cmdUpdate" class="button" type="submit" value=" Submit Updated Privileges " name="cmdUpdate"/>
</form>

<!--<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<?php 
if (!empty($module_privileges)) {
	$ctr = 1000;
	foreach($module_privileges as $key=>$row) {
?>
<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Add $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Add New $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+1 ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "View $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "View $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+2 ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Edit $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Edit Existing $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+3 ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Delete $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Delete Existing $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+4 ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Approve $key" ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Approve $key" ?></td>
</tr>
<tr>
    <td colspan="20" height="1" class="listViewHRS1"></td>
</tr>
<?php 
		if (!empty($row)) {
			$i = 10;
			foreach($row as $sub) {
				?>
				<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+$i ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Add $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Add New $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+$i+1 ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "View $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "View $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+$i+2 ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Edit $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Edit Existing $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+$i+3 ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Delete $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Delete Existing $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo $ctr+$i+4 ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Approve $sub" ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><?php echo "Approve $sub" ?></td>
				</tr>
				<tr>
				    <td colspan="20" height="1" class="listViewHRS1"></td>
				</tr>
				<?php
				$i+=10; 
			}
		}
		
		$ctr+=1000;
	}
}
?>
</tbody>
</table>
-->

<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete User Group \"<?php echo $rec->groupName ?>\"?");
    
    if (reply==true)
        window.location='index.php?group/delete/'+id;
}

function checkAll(id)
{
	if ($('#chkAll_'+id).is(':checked')) {
		// check all member
		$('#chk_'+id).attr('checked', true);
		$('#chk_'+(id+1)).attr('checked', true);
		$('#chk_'+(id+2)).attr('checked', true);
		$('#chk_'+(id+3)).attr('checked', true);
		$('#chk_'+(id+4)).attr('checked', true);
	} else {
		// uncheck all member
		$('#chk_'+id).attr('checked', false);
		$('#chk_'+(id+1)).attr('checked', false);
		$('#chk_'+(id+2)).attr('checked', false);
		$('#chk_'+(id+3)).attr('checked', false);
		$('#chk_'+(id+4)).attr('checked', false);
	}
}

function checkAllReports()
{
	if ($('#chkAll_Reports').is(':checked')) {
		// check all member
		<?php 
		$ctr = 1;
		if (!empty($report_privileges)) {
			foreach($report_privileges as $row) {
				echo "$('#chk_$ctr').attr('checked', true);\n";
				$ctr++;		
			}
		}
		?>	
	} else {
		// uncheck all member
		<?php 
		$ctr = 1;
		if (!empty($report_privileges)) {
			foreach($report_privileges as $row) {
				echo "$('#chk_$ctr').attr('checked', false);\n";
				$ctr++;		
			}
		}
		?>
	}
}
</script>