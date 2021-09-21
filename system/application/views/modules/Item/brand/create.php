<form name="frmEntry" id="frmEntry" method="post" action="index.php?brand/save" >
<input type="hidden" id="theForm" name="theForm" value="createDept" />
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="   Save   " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?brand/show'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Brand</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="150"><slot>Brand Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="brandName" id="brandName" size="35" maxlength="50" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Description </slot></td>
        <td class="dataField"><slot><input type="text" name="brandDesc" id="brandDesc" size="50" maxlength="100" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="    Save    " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?brand/show'" />
    </td>
  </tr>
</table> 
</form>

<script>
addToValidate('frmEntry','brandName', '', true, 'Brand Name');

function save() 
{
	if (check_form('frmEntry')) {
		$.post(base_url+"index.php?brand/check_duplicate", { brandName: $('#brandName').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Brand Name is already exist!");
		    } else {
		    	// no duplicate
				document.getElementById('frmEntry').submit();
		    }
		  }, "text");
	}
}
</script>