<form method="post" name="frmEntry" id="frmEntry" action="index.php?group/save" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="   Save   " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?group/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New User Group</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="18%"><slot>Group <span class="required">&bull;</span></slot></td>
        <td class="dataField" width="80%"><slot><input type="text" name="groupName" id="groupName" maxlength="20"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Description <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><textarea name="groupDesc" id="groupDesc" rows="2" cols="70"></textarea> </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="   Save   " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?group/'" />
    </td>
  </tr>
</table>
</form>

<script>
addToValidate('frmEntry','groupName', '', true, 'Group');
addToValidate('frmEntry','groupDesc', '', true, 'Description');


function save() 
{
	
	if (check_form('frmEntry')) {
		$.post(base_url+"index.php?group/check_duplicate", { groupName: $('#groupName').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Group name is already exist!");
		    } else {
		    	// no duplicate
				document.getElementById('frmEntry').submit();
		    }
		  }, "text");

	}
	
}
</script>