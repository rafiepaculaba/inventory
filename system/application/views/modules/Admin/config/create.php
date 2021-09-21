<form method="post" name="frmConfig" id="frmConfig" action="index.php?config/save" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?config/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Configuration</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="80"><slot>Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="name" id="name" maxlength="50" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Value <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><textarea name="value" id="value" rows="10" cols="70"></textarea> </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?config/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>

</form>

<script>
addToValidate('frmConfig','name', '', true, 'Name');
addToValidate('frmConfig','value', '', true, 'Value');


function save() 
{
$.post(base_url+"index.php?config/check_duplicate", { name: $('#name').val() },
  function(data){
    if (parseInt(data)) {
    	// duplicate
    	alert("Error: Config name is already exist!");
    } else {
    	// no duplicate
    	if (check_form('frmConfig'))
    		document.getElementById('frmConfig').submit();
    }
  }, "text");
}
</script>