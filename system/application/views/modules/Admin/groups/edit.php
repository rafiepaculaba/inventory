<form method="post" name="frmEdit" id="frmEdit" action="index.php?group/update" onsubmit="return check_form('frmEdit')" >

<input type="hidden" name="groupID" id="groupID" value="<?php echo $rec->groupID ?>" />
<input type="hidden" name="rstatus" id="rstatus" value="<?php echo $rec->rstatus ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" tabindex="5" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" tabindex="6" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?group/view/<?php echo $rec->groupID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit User Group</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="18%"><slot>Group </slot></td>
        <td class="dataField" width="80%"><slot><input type="text" tabindex="1" name="groupName" id="groupName" readonly value="<?php echo $rec->groupName ?>" maxlength="20" /> <span class="readonly">readonly</span> </slot> </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Description <span class="required">*</span></slot></td>
        <td class="dataField"><slot><textarea name="groupDesc" id="groupDesc" tabindex="2" rows="2" cols="70"><?php echo $rec->groupDesc ?></textarea></slot></td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Status <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="rstatus">
        <option value="1" <?php if ($rec->rstatus==1) echo "selected"; ?> >Enabled</option>
        <option value="0" <?php if ($rec->rstatus==0) echo "selected"; ?> >Disabled</option>
        </select>
        </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" tabindex="5" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" tabindex="6" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?group/view/<?php echo $rec->groupID ?>'" />
    </td>
  </tr>
</table>
</form>

<script>
addToValidate('frmEdit','groupDesc', '', true, 'Description');
</script>