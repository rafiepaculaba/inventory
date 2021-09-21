<form method="post" name="frmEdit" id="frmEdit" action="index.php?user/update" onsubmit="return check_form('frmEdit')" >

<input type="hidden" name="userID" id="userID" value="<?php echo $rec->userID ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="  Save  "/>
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?user/view/<?php echo $rec->userID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<hr>
<h4 class="dataLabel">&nbsp;&nbsp;Edit User</h4>
<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">User Profile</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Name <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        	<table border="0" cellpadding="0" cellspacing="0" width="460">
            <tr>
                <td width="160"><slot><input type="text" name="lastName" id="lastName" size="25" maxlength="25" value="<?php echo $rec->lastName ?>" onkeypress="return keyRestrict(event, 12);" /></slot>&nbsp;,</td>
                <td width="150"><slot><input type="text" name="firstName" id="firstName" size="25" maxlength="25" value="<?php echo $rec->firstName ?>" onkeypress="return keyRestrict(event, 12);" /></slot></td>
                <td width="150"><slot><input type="text" name="middleName" id="middleName" size="25" maxlength="25" value="<?php echo $rec->middleName ?>" onkeypress="return keyRestrict(event, 12);" /></slot></td>
            </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataField">
        	<table border="0" cellpadding="0" cellspacing="0" width="460">
            <tr>
                <td width="160">Last Name</td>
                <td width="150">First Name</td>
                <td width="150">Middle Name</td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td width="50%">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">User Account</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Username</slot></td>
        <td class="dataField"><slot><input type="text" name="userName" id="userName" value="<?php echo $rec->userName ?>" maxlength="20" readonly/><span class="readonly">(readonly)</span></slot></td>
    </tr>
    <tr>
        <td class="dataLabel">User Group <span class="required">&bull;</span></td>
        <td class="dataField">
    	<select name="groupID" id="groupID">
		<option value="">------------------------</option>>
		<?php 
		foreach ($groups->result() as $row) {
			if ($rec->groupID == $row->groupID)
				echo "<option value='$row->groupID' selected>$row->groupName</option>";
			else
				echo "<option value='$row->groupID'>$row->groupName</option>";
		}
		?>
		</select>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>User Admin</slot></td>
        <td class="dataField"><slot><input type="checkbox" name="isAdmin" id="isAdmin" value="1" <?php if ($rec->isAdmin=="1") echo "checked" ?>/></slot></td>
    </tr>
     <tr>
        <td class="dataLabel" valign="top"><slot>Status <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="rstatus">
        <option value="1" <?php if ($rec->rstatus == "1") echo "selected"; ?> >Active</option>
        <option value="0" <?php if ($rec->rstatus == "0") echo "selected"; ?>>Inactive</option>
        </select>
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Theme </slot></td>
        <td class="dataField">
        <slot>
        <select name="theme">
        <option value="">---------</option>
        <option value="blue" <?php if ($rec->theme == "blue") echo "selected"; ?>>Blue&nbsp;</option>
        <option value="purple" <?php if ($rec->theme == "purple") echo "selected"; ?>>Purple&nbsp;</option>
        <option value="red" <?php if ($rec->theme == "red") echo "selected"; ?>>Red&nbsp;</option>
        <option value="green" <?php if ($rec->theme == "green") echo "selected"; ?>>Green&nbsp;</option>
        <option value="gray" <?php if ($rec->theme == "gray") echo "selected"; ?>>Gray&nbsp;</option>
        <option value="orange" <?php if ($rec->theme == "orange") echo "selected"; ?>>Orange&nbsp;</option>
        
        
        
        </select>
        </slot>
        </td>
    </tr>
    </table>
</td>
<td width="50%">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" align="left"><h4 class="dataLabel">Module Preferences</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" valign="top">
        Module Tabs 
        <br>
        <select name="modules[]" id="modules[]" multiple size="9">
		<?php 
		$user_tabs = explode(",",$rec->preferences);
		foreach ($modules as $key=>$row) {
			if (in_array($key,$user_tabs))
				echo "<option value='$key' selected>$row</option>";
			else
				echo "<option value='$key'>$row</option>";
		}
		?>
		</select>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<p>
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="  Save  "/>
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?user/view/<?php echo $rec->userID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  
</p>
</form>

<script>
addToValidate('frmEdit','lastName', '', true, 'Last Name');
addToValidate('frmEdit','firstName', '', true, 'First Name');
addToValidate('frmEdit','middleName', '', true, 'Middle Name');
addToValidate('frmEdit','userName', '', true, 'Username');
addToValidate('frmEdit','groupID', '', true, 'User Group');
</script>