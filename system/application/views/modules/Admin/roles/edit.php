<form method="post" name="frmRecord" id="frmRecord" action="index.php?role/update" onsubmit="return check_form('frmRecord')" >

<input type="hidden" name="roleID" id="roleID" value="<?php echo $role->roleID ?>" />
<input type="hidden" name="rstatus" id="rstatus" value="<?php echo $role->rstatus ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" tabindex="5" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" tabindex="6" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?role/view/<?php echo $role->roleID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Role</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="18%"><slot>Name <span class="required">*</span></slot></td>
        <td class="dataField" width="80%"><slot><input type="text" tabindex="1" name="roleName" id="roleName" value="<?php echo $role->roleName ?>" maxlength="20" /> </slot> </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Description <span class="required">*</span></slot></td>
        <td class="dataField"><slot><textarea name="roleDesc" id="roleDesc" tabindex="2" rows="10" cols="70"><?php echo $role->roleDesc ?></textarea></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

</form>


<script>
addToValidate('frmRecord','roleName', '', true, 'Name');
addToValidate('frmRecord','roleDesc', '', true, 'Description');
</script>