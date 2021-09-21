<form method="post" name="frmEntry" id="frmEntry" action="index.php?user/save" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="   Cancel   " onClick="window.location='index.php?user/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<hr>
<h4 class="dataLabel">&nbsp;&nbsp;New User</h4>
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
                <td width="160"><slot><input type="text" name="lastName" id="lastName" maxlength="25" value="" onkeypress="return keyRestrict(event, 12);" /></slot>&nbsp;,</td>
                <td width="150"><slot><input type="text" name="firstName" id="firstName" maxlength="25" value="" onkeypress="return keyRestrict(event, 12);" /></slot></td>
                <td width="150"><slot><input type="text" name="middleName" id="middleName" maxlength="25" value="" onkeypress="return keyRestrict(event, 12);" /></slot></td>
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
        <td class="dataLabel" width="100"><slot>Username <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="userName" id="userName" maxlength="20"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Password <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="password" name="userPswd" id="userPswd" maxlength="20"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Re-Password <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="password" name="rePswd" id="rePswd" maxlength="20"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel">User Group <span class="required">&bull;</span></td>
        <td class="dataField">
    	<select name="groupID" id="groupID">
		<option value="">------------------------</option>>
		<?php 
		foreach ($groups->result() as $row) {
			echo "<option value='$row->groupID'>$row->groupName</option>";
		}
		?>
		</select>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>User Admin</slot></td>
        <td class="dataField"><slot><input type="checkbox" name="isAdmin" id="isAdmin" value="1"/></slot></td>
    </tr>
     <tr>
        <td class="dataLabel" valign="top"><slot>Status <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="rstatus">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
        </select>
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Theme </slot></td>
        <td class="dataField">
        <slot>
        <select name="theme">
        <option value="blue">Blue&nbsp;</option>
        <option value="purple">Purple&nbsp;</option>
        <option value="red">Red&nbsp;</option>
        <option value="green">Green&nbsp;</option>
        <option value="gray">Gray&nbsp;</option>
        <option value="orange">Orange&nbsp;</option>
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
		foreach ($modules as $key=>$row) {
			echo "<option value='$key' selected>$row</option>";
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
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="   Cancel   " onClick="window.location='index.php?user/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  
</p>

</form>

<script>
addToValidate('frmEntry','lastName', '', true, 'Last Name');
addToValidate('frmEntry','firstName', '', true, 'First Name');
addToValidate('frmEntry','middleName', '', true, 'Middle Name');
addToValidate('frmEntry','userName', '', true, 'Username');
addToValidate('frmEntry','userPswd', '', true, 'Password');
addToValidate('frmEntry','rePswd', '', true, 'Re-Password');
addToValidate('frmEntry','groupID', '', true, 'User Group');



function save() 
{
	
	if (check_form('frmEntry')) {
		// check password
		if ($('#userPswd').val() == $('#rePswd').val()) {
			$.post(base_url+"index.php?user/check_duplicate", { userName: $('#userName').val() },
			  function(data){
			    if (parseInt(data)) {
			    	// duplicate
			    	alert("Error: Username is already exist!");
			    } else {
			    	// no duplicate
					document.getElementById('frmEntry').submit();
			    }
			  }, "text");
		} else {
			alert("Passwords does not matched!");
		}
	}
	
}
</script>