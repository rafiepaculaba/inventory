<form method="post" name="frmEdit" id="frmEdit" action="index.php?department/update">

<input type="hidden" name="deptID" id="deptID" value="<?php echo $rec->deptID ?>"/>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value=" Save " onclick="save();"  />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?department/view/<?php echo $rec->deptID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Department</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Department Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="deptName" id="deptName" value="<?php echo $rec->deptName ?>" size="20" maxlength="20" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Department Description<span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="deptDesc" id="deptDesc" value="<?php echo $rec->deptDesc ?>" maxlength="100" size="100" onkeypress="return keyRestrict(event, 6);"/></slot></td>
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
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?department/view/<?php echo $rec->deptID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table> 
</form>

<script>
addToValidate('frmEdit','deptName', '', true, 'Department Name');
addToValidate('frmEdit','deptDesc', '', true, 'Department Description');

function save() 
{
	if (check_form('frmEdit')) {	
    	document.getElementById('frmEdit').submit();
	}
}
</script>