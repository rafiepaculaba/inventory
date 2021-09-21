<form method="post" name="frmCreate" id="frmCreate" action="index.php?department/save" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?department/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Department</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="150"><slot>Department Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="deptName" id="deptName" size="20" maxlength="20" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Department Description <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="deptDesc" id="deptDesc" maxlength="100" size="100" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?department/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>

</form>

<script>
addToValidate('frmCreate','deptName', '', true, 'Department Name');
addToValidate('frmCreate','deptDesc', '', true, 'Department Description');

function save() 
{
	if (check_form('frmCreate')) {	
		$.post(base_url+"index.php?department/check_duplicate", { deptName: $('#deptName').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Department Name is already exist!");
		    } else {
		    	// no duplicate
	    		document.getElementById('frmCreate').submit();
		    }
		  }, "text");
	}
}
</script>