<form method="post" name="frmEdit" id="frmEdit" action="index.php?category/update" onsubmit="return check_form('frmEdit')" >
<input type="hidden" id="theForm" name="theForm" value="editForm" />
<input type="hidden" id="catID" name="catID" value="<?php echo $rec->catID; ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="   Save   " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="  Cancel  " onclick="history.back();" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Category</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="150"><slot>Category Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="catName" id="catName" size="35" value="<?php echo $rec->catName ?>" /></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Description </slot></td>
        <td class="dataField"><slot><input type="text" name="catDesc" id="catDesc" size="50" value="<?php echo $rec->catDesc ?>" maxlength="100" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Status <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="status">
        <option value="1" <?php if ($rec->status == "1") echo "selected"; ?> >Active</option>
        <option value="0" <?php if ($rec->status == "0") echo "selected"; ?>>Inactive</option>
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
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="   Save   " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="  Cancel  " onclick="history.back();" />
    </td>
  </tr>
</table>  
</form>

<script>
addToValidate('frmEdit','catName', '', true, 'Category Name');
</script>