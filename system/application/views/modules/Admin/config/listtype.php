<form method="post" name="frmConfig" id="frmConfig" action="index.php?config/update_listtype" onsubmit="return check_form('frmConfig')" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.close();" />
    </td>
    <td align="right" nowrap="nowrap">Comma separated values ex. Purok, Sectoral</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">List Types</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>List Types <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <input type="text" name="listtype" id="listtype" value="<?php echo $listtype; ?>" size="60" onkeypress="return keyRestrict(event, 6);" />
        </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

</form>
<script>
addToValidate('frmConfig','listtype', '', true, 'List Type');
</script>