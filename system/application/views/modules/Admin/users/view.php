 <table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value="Edit" onclick="window.location='index.php?user/edit/<?php echo $rec->userID; ?>';" />
	<input class="button" name="cmdeditpswd" type="button" id="cmddelete" value="Change Password"  onclick="popUp('index.php?user/edit_password/<?php echo $rec->userID; ?>');"/>
  </tr>
</table>  
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">User Profile</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="100"><slot>Name</slot></td>
        <td class="tabDetailViewDF">
        	<table border="0" cellpadding="0" cellspacing="0" width="460">
            <tr>
                <td width="160"><font size="2"><?php echo $rec->lastName ?></font></td>
                <td width="150"><font size="2"><?php echo $rec->firstName ?></font></td>
                <td width="150"><font size="2"><?php echo $rec->middleName ?></font></td>
            </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">
        	<table border="0" cellpadding="0" cellspacing="0" width="460">
            <tr>
                <td width="160"><font size="1">Last Name</font></td>
                <td width="150"><font size="1">First Name</font></td>
                <td width="150"><font size="1">Middle Name</font></td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td width="100%" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">User Account</h4></th>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">Module Preferences</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="100"><slot>Username</slot></td>
        <td class="tabDetailViewDF"><?php echo $rec->userName ?></td>
        <td class="tabDetailViewDF" colspan="2" rowspan="5" valign="top">
         Module Tabs 
        <br>
        <select name="modules[]" id="modules[]" multiple size="6" disabled>
		<?php 
		if ($rec->preferences) {
			$my_tabs = explode(",",$rec->preferences);
			foreach ($my_tabs as $row) {
				echo "<option value='$row' selected>".$modules[$row]."</option>";
			}
		}
		?>
		</select>
        </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">User Group</td>
        <td class="tabDetailViewDF"><?php echo $rec->groupName ?></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>User Admin</slot></td>
        <td class="tabDetailViewDF"><slot><input type="checkbox" name="isAdmin" id="isAdmin" value="1" disabled <?php if ($rec->isAdmin=="1") echo "checked" ?>/></slot></td>
    </tr>
     <tr>
        <td class="tabDetailViewDL" valign="top"><slot>Status</slot></td>
        <td class="tabDetailViewDF">
        <?php 
        if ($rec->rstatus==1)
        	echo "Active"; 
        else
        	echo "<font color='red'>Inactive</font>"; 
        ?> 
        </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Theme</slot></td>
        <td class="tabDetailViewDF"><slot>
        <?php 
        if($rec->theme=="gray"){
        	echo "<img src='images/colors.gray.icon.gif'/>";
        } if($rec->theme=="green"){
        	echo "<img src='images/colors.green.icon.gif'/>";
        } if($rec->theme=="orange"){
        	echo "<img src='images/colors.orange.icon.gif'/>";
        } if($rec->theme=="purple"){
        	echo "<img src='images/colors.purple.icon.gif'/>";
        } if($rec->theme=="red"){
        	echo "<img src='images/colors.red.icon.gif'/>";
        }if($rec->theme=="blue"){
        	echo "<img src='images/colors.blue.icon.gif'/>";
        }
        
        ?>
        </slot></td>
    </tr>
    </table>
</td>
</tr>
</table>
</p>

<!--<br>
<hr><h4 class="tabDetailViewDL">&nbsp;&nbsp;User Privileges</h4>

<form name="frmFilter" id="frmFilter" method="POST" action="index.php?user/delete_roles">
<input type="hidden" name="userID" id="userID" value="<?php echo $rec->userID ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
		<tr height="20">
    		<td scope="col" class="listViewThS1" width="20%" nowrap>
    		<input id="cmdDelete" class="button" type="submit" value="(-) Del" name="cmdDeleteRole"/> 
    		<input id="cmdBlock" class="button" type="button" onclick="displayWindow('windowcontent','Add Privileges','500','250')" value="(+) Add" name="cmdBlock"/>
    		</td>
    		<td scope="col" class="listViewThS1" width="40%" nowrap>Privilege</td>
    		<td scope="col" class="listViewThS1" width="40%" nowrap>Description</td>
    	</tr>
		<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
	
	<?php
	if ($userroles->num_rows()) {
		$ctr = 0;
		foreach($userroles->result() as $row) {
	?>
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	   <td scope="row" 
	        class="oddListRowS1" bgcolor="#ffffff" 
	        align="left" valign="top"><input type="checkbox" value="<?php echo $row->id ?>" name="chkDelete[]"/></td>
			
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

<h4 class="dataLabel">&nbsp;&nbsp;<img src="images/check.png" alt="privileges" border="0" />User Privileges</h4>
<form name="frmPrivileges" id=""frmPrivileges"" method="POST" action="index.php?user/update_roles">
<input type="hidden" name="userID" id="userID" value="<?php echo $rec->userID ?>" />
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
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">
    <input type="checkbox" value="" id="chkAll_<?php echo $ctr ?>" onclick="checkAll(<?php echo $ctr ?>)" />
    </td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><b><?php echo $key ?></b></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr ?>" 
    <?php 
    if ($userroles->num_rows()) {
    	foreach ($userroles->result() as $role) {
	    	if ($role->roleID==$ctr) {
	    		echo " checked ";
	    	}
    	}
    }
    
    ?>
     name="chkAdd[]" id="chk_<?php echo $ctr ?>" /></td>
    
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+1 ?>"  
    <?php 
    if ($userroles->num_rows()) {
    	foreach ($userroles->result() as $role) {
	    	if ($role->roleID==($ctr+1)) {
	    		echo " checked ";
	    	}
    	}
    }
    
    ?>
     name="chkView[]" id="chk_<?php echo $ctr+1 ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+2 ?>"  
    <?php 
    if ($userroles->num_rows()) {
    	foreach ($userroles->result() as $role) {
	    	if ($role->roleID==($ctr+2)) {
	    		echo " checked ";
	    	}
    	}
    }
    
    ?>
     name="chkEdit[]" id="chk_<?php echo $ctr+2 ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+3 ?>"  
    <?php 
    if ($userroles->num_rows()) {
    	foreach ($userroles->result() as $role) {
	    	if ($role->roleID==($ctr+3)) {
	    		echo " checked ";
	    	}
    	}
    }
    
    ?>
     name="chkDelete[]" id="chk_<?php echo $ctr+3 ?>" /></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+4 ?>"  
    <?php 
    if ($userroles->num_rows()) {
    	foreach ($userroles->result() as $role) {
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
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top">
				    <?php if ($this->session->userdata('current_isAdmin')) {?>
				    <input type="checkbox" value="" id="chkAll_<?php echo $ctr+$i ?>" onclick="checkAll(<?php echo $ctr+$i ?>)" />
				    <?php } else {
				    	echo "&nbsp;";
				    } ?>
				    </td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">&nbsp;&nbsp;&nbsp;<img src="images/subitem.gif" alt="<?php echo $sub ?>" /> <?php echo $sub ?></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i ?>" 
				    <?php 
				    if ($userroles->num_rows()) {
				    	foreach ($userroles->result() as $role) {
					    	if ($role->roleID==($ctr+$i)) {
					    		echo " checked ";
					    	}
				    	}
				    }
				    
			    	?>
				     name="chkAdd[]" id="chk_<?php echo $ctr+$i ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+1 ?>" 
				    <?php 
				    if ($userroles->num_rows()) {
				    	foreach ($userroles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+1)) {
					    		echo " checked ";
					    	}
				    	}
				    }
				    
			    	?>
				     name="chkView[]" id="chk_<?php echo $ctr+$i+1 ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+2 ?>" 
				    <?php 
				    if ($userroles->num_rows()) {
				    	foreach ($userroles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+2)) {
					    		echo " checked ";
					    	}
				    	}
				    }
				    
			    	?>
				     name="chkEdit[]" id="chk_<?php echo $ctr+$i+2 ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+3 ?>" 
				    <?php 
				    if ($userroles->num_rows()) {
				    	foreach ($userroles->result() as $role) {
					    	if ($role->roleID==($ctr+$i+3)) {
					    		echo " checked ";
					    	}
				    	}
				    }
				    
			    	?>
				     name="chkDelete[]" id="chk_<?php echo $ctr+$i+3 ?>" /></td>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top"><input type="checkbox" value="<?php echo $ctr+$i+4 ?>" 
				    <?php 
				    if ($userroles->num_rows()) {
				    	foreach ($userroles->result() as $role) {
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
    if ($userroles->num_rows()) {
    	foreach ($userroles->result() as $role) {
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

<form method="post" name="frmRole" id="frmRole" action="index.php?user/add_roles" >

<input type="hidden" name="userID" id="userID" value="<?php echo $rec->userID ?>" />
<!--popup:block section here-->
<div style="width: 500px; height: 300px; visibility:hidden; display:none;" id="windowcontent">
	<table width="100%" border="0" cellpadding="1" cellspacing="0">
        <tr>
	        <td>
	           <div style="width: 100%; height:180px; overflow: auto;" id="divSectionList">
                <table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                	<tr height="20">
                		<td scope="col" class="listViewThS1" width="10%" nowrap>&nbsp;</td>
                		<td scope="col" class="listViewThS1" width="40%" nowrap>Privilege</td>
                		<td scope="col" class="listViewThS1" width="50%" nowrap>Description</td>
                	</tr>
            		<tr>
			    		<td colspan="20" height="1" class="listViewHRS1"></td>
			    	</tr>
                	<?php
                	if (!empty($roles)) {
						$ctr = 0;
						foreach($roles->result() as $row) {
					?>
						<!-- Start of students Listing -->
				    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
				    		<td scope="row" 
				            class="oddListRowS1" bgcolor="#ffffff" 
				            align="left" valign="top"><input type="checkbox" value="<?php echo $row->roleID ?>" name="chkAdd[]"/></td>
				    		
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
				            		<td nowrap="nowrap" align="center"><b><i>No roles found.</i></b></td>
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
                
                </div>
	        </td>
        </tr>
        <tr>
	        <td>
	        <hr>
	        <input id="cmdOk" class="button" type="submit" value=" OK " name="cmdAddRole"/>&nbsp;
	        <input class="button" type="button" name="cmdCancel" id="cmdCancel" value="Close" onclick="hiddenFloatingDiv('windowcontent');"/>
	     	</td>
        </tr>
        </table>
</div>
<!--end of popup block section-->
</form>


<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete User user \"<?php echo $rec->userName ?>\"?");
    
    if (reply==true)
        window.location='index.php?user/delete/'+id;
}


function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=400,height=200,left = 0,top = 0');");
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

</script>