<form name="frmEntry" id="frmEntry" method="post" action="index.php?category/save" >
<input type="hidden" id="theForm" name="theForm" value="createDept" />
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="   Save   " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?category/show'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Category</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="150"><slot>Category Name <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="catName" id="catName" size="35" maxlength="50" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Description </slot></td>
        <td class="dataField"><slot><input type="text" name="catDesc" id="catDesc" size="50" maxlength="100" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="    Save    " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?category/show'" />
    </td>
  </tr>
</table> 
</form>

<script>
addToValidate('frmEntry','catName', '', true, 'Category Name');

function save() 
{
	if (check_form('frmEntry')) {
		$.post(base_url+"index.php?category/check_duplicate", { catName: $('#catName').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Category Name is already exist!");
		    } else {
		    	// no duplicate
				document.getElementById('frmEntry').submit();
		    }
		  }, "text");
	}
}
</script>