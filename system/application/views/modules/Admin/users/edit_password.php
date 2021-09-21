<form method="post" name="frmChangePassword" id="frmChangePassword" action="index.php?user/save_password" >
<input type="hidden" name="userID" id="userID" value="<?php echo $rec->userID ?>" />
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td width="100%">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Change Password</h4></th>
    </tr>
    <tr>
        <td class="dataLabel"><slot>New Password <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="password" name="userPswd" id="userPswd" maxlength="20"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Re-Password <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="password" name="rePswd" id="rePswd" maxlength="20"/></slot></td>
    </tr>
    </table>
</td></tr>
<tr>
    <td>
    <hr>
    <input id="cmdSave" class="button" type="button" value="Change Now" name="cmdSave" onclick="save();"/>&nbsp;
    <input type="button" name="cmdClose" value="Close" onclick="window.close();" class="button" />
 	</td>
</tr>
</table>
</form>


<script>
addToValidate('frmChangePassword','userPswd', '', true, 'Password');
addToValidate('frmChangePassword','rePswd', '', true, 'Re-Password');


function save() 
{
	if (check_form('frmChangePassword')) {
		// check password
		if ($('#userPswd').val() == $('#rePswd').val()) {
			document.getElementById('frmChangePassword').submit();
		} else {
			alert("Passwords does not matched!");
		}
	}
	
}
</script>