<form method="post" name="frmEdit" id="frmEdit" action="index.php?vessel/update"  >

<input type="hidden" name="vesselID" id="vesselID" value="<?php echo $rec->vesselID ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value=" Save " onclick="save();"  />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?vessel/view/<?php echo $rec->vesselID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Vessel</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Vessel Code <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="vesselCode" id="vesselCode" value="<?php echo $rec->vesselCode ?>" size="20" maxlength="20" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Vessel Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="vesselName" id=vesselName value="<?php echo $rec->vesselName ?>" maxlength="100" size="100" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Status <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot>
		<select name="status" id="status">
		<option value="">-------</option>		
		<option value="1" <?php if ($rec->status=="1") echo "selected" ?> >Active</option>		
		<option value="0" <?php if ($rec->status=="0") echo "selected" ?> >Inactive</option>		
		</select>
		</slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value=" Save " onclick="save();"  />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?vessel/view/<?php echo $rec->vesselID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table> 
</form>

<script>
addToValidate('frmEdit','vesselCode', '', true, 'Vessel Code');
addToValidate('frmEdit','vesselName', '', true, 'Vessel Name');

function save() 
{
	if (check_form('frmEdit')) {	
    	document.getElementById('frmEdit').submit();
	}
}
</script>