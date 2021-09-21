<form method="post" name="frmCreate" id="frmCreate" action="index.php?vessel/save" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?vessel/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Vessel</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Vessel Code <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="vesselCode" id="vesselCode" size="20" maxlength="20" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Vessel Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="vesselName" id=vesselName maxlength="100" size="100" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?vessel/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>

</form>

<script>
addToValidate('frmCreate','vesselCode', '', true, 'Vessel Code');
addToValidate('frmCreate','vesselName', '', true, 'Vessel Name');

function save() 
{
	if (check_form('frmCreate')) {	
		$.post(base_url+"index.php?vessel/check_duplicate", { vesselName: $('#vesselName').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Vessel Name is already exist!");
		    } else {
		    	// no duplicate
	    		document.getElementById('frmCreate').submit();
		    }
		  }, "text");
	}
}
</script>