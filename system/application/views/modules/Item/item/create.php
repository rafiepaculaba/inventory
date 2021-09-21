<form name="frmEntry" id="frmEntry" method="post" action="index.php?item/save" >
<input type="hidden" id="theForm" name="theForm" value="createEntry" />
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="   Save   " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?item/show'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Item</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Item Code <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="itemCode" id="itemCode" size="35" maxlength="10" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Account Code </slot></td>
        <td class="dataField"><slot><input type="text" name="accountCode" id="accountCode" size="35" maxlength="10" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Type <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="type">
        <option value="">-----------</option>
        <option value="SSP">SSP</option>
        <option value="FOL">FOL</option>
        </select>
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Category <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <select id="catID" name="catID">
        <option value="">-------------------------------------------</option>
        <?php
        	if ($categories->num_rows()) {
        		foreach($categories->result() as $row) {
					echo '<option value="'.$row->catID.'">'.$row->catName.'</option>';        			
        		}
        	}
        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Brand <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <select id="brandID" name="brandID">
        <option value="">-------------------------------------------</option>
        <?php
        	if ($brands->num_rows()) {
        		foreach($brands->result() as $row) {
					echo '<option value="'.$row->brandID.'">'.$row->brandName.'</option>';        			
        		}
        	}
        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Item <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="item" type="text" maxlength="50" size="60" name="item" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Description <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="description" type="text" maxlength="100" size="60" name="description" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Unit Cost <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="unitCost1" type="text" onkeypress="return keyRestrict(event, 1);" size="20" maxlength="20" name="unitCost1"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Unit of Msr <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="umsr" type="text" size="20" maxlength="20" name="umsr" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Location <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="location" id="location" size="60" maxlength="100" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="    Save    " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?item/show'" />
    </td>
  </tr>
</table> 
</form>

<script>
addToValidate('frmEntry','itemCode', '', true, 'Item Code');
addToValidate('frmEntry','type', '', true, 'Type');
addToValidate('frmEntry','catID', '', true, 'Category');
addToValidate('frmEntry','brandID', '', true, 'Brand');
addToValidate('frmEntry','item', '', true, 'Item');
addToValidate('frmEntry','description', '', true, 'Description');
addToValidate('frmEntry','unitCost1', '', true, 'Unit Cost');
addToValidate('frmEntry','umsr', '', true, 'Unit of Msr');
addToValidate('frmEntry','location', '', true, 'Location');

function save() 
{
	if (check_form('frmEntry')) {
		$.post(base_url+"index.php?item/check_duplicate", { itemCode: $('#itemCode').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Item Code is already exist!");
		    } else {
		    	// no duplicate
				document.getElementById('frmEntry').submit();
		    }
		  }, "text");
	}
}
</script>