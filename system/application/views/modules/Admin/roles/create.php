<form method="post" name="frmRole" id="frmRole" action="index.php?role/save" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" tabindex="5" type="button" id="cmdSave" value=" Save " onclick="save();" />
    <input class="button" name="cmdCancel" tabindex="6" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?role/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Role</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="18%"><slot>Name <span class="required">*</span></slot></td>
        <td class="dataField" width="80%"><slot><input type="text" tabindex="1" name="roleName" id="roleName" maxlength="20" /></slot></td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Description <span class="required">*</span></slot></td>
        <td class="dataField"><slot><textarea name="roleDesc" id="roleDesc" tabindex="2" rows="2" cols="70"></textarea> </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>
</form>

<script>
addToValidate('frmRole','roleName', '', true, 'Name');
addToValidate('frmRole','roleDesc', '', true, 'Description');


function save() 
{
$.post(base_url+"index.php?config/check_duplicate", { name: $('#roleName').val() },
  function(data){
    if (parseInt(data)) {
    	// duplicate
    	alert("Error: Role name is already exist!");
    } else {
    	// no duplicate
    	if (check_form('frmRole'))
    		document.getElementById('frmRole').submit();
    }
  }, "text");
}
</script>