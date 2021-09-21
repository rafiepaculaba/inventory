<form method="post" name="frmEdit" id="frmEdit" action="index.php?item/update" onsubmit="return check_form('frmEdit')" >
<input type="hidden" id="theForm" name="theForm" value="editForm" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="   Save   " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="  Cancel  " onclick="history.back();" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Item</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Item Code </slot></td>
        <td class="dataField"><slot><input type="text" name="itemCode" id="itemCode" size="35" value="<?php echo $rec->itemCode ?>" maxlength="10" onkeypress="return keyRestrict(event,18);"/><span class="readonly"> readonly</span></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Account Code </slot></td>
        <td class="dataField"><slot><input type="text" name="accountCode" id="accountCode" size="35" value="<?php echo $rec->accountCode ?>" maxlength="10" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Type <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="type" id="type">
        <option value="SSP" <?php if ($rec->type == "SSP") echo "selected"; ?> >SSP</option>
        <option value="FOL" <?php if ($rec->type == "FOL") echo "selected"; ?>>FOL</option>
        </select>
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Category <span class="required">&bull;</span></slot></td>
        <td class="dataField">
         <select id="catID" name="catID">
         <option value="">-------------------------------</option>
        <?php
        	if ($categories->num_rows()) {
        		foreach($categories->result() as $row) {
        			if ($row->catID == $rec->catID)
						echo '<option value="'.$row->catID.'" selected>'.$row->catName.'</option>';        			
					else
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
         <option value="">-------------------------------</option>
        <?php
        	if ($brands->num_rows()) {
        		foreach($brands->result() as $row) {
        			if ($row->brandID == $rec->brandID)
						echo '<option value="'.$row->brandID.'" selected>'.$row->brandName.'</option>';        			
					else
						echo '<option value="'.$row->brandID.'">'.$row->brandName.'</option>';        			
        		}
        	}
        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Item <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="item" type="text" maxlength="50" size="60" value="<?php echo $rec->item ?>" name="item" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Description <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="description" type="text" maxlength="100" size="60" value="<?php echo $rec->description ?>" name="description" onkeypress="return keyRestrict(event,6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Unit Cost <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="unitCost1" type="text" onkeypress="return keyRestrict(event, 1);"  value="<?php echo $rec->unitCost1 ?>" size="20" maxlength="20" name="unitCost1"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Unit of Msr <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input id="umsr" type="text" size="20" maxlength="20" name="umsr" value="<?php echo $rec->umsr ?>" onkeypress="return keyRestrict(event, 6);"/></slot></td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Status <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="status" id="status">
        <option value="1" <?php if ($rec->status == "1") echo "selected"; ?> >Active</option>
        <option value="0" <?php if ($rec->status == "0") echo "selected"; ?>>Inactive</option>
        </select>
        </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="   Save   " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="  Cancel  " onclick="history.back();" />
    </td>
  </tr>
</table>  
</form>

<script>
addToValidate('frmEdit','type', '', true, 'Type');
addToValidate('frmEdit','catID', '', true, 'Category');
addToValidate('frmEdit','brandID', '', true, 'Brand');
addToValidate('frmEdit','item', '', true, 'Item');
addToValidate('frmEdit','description', '', true, 'Description');
addToValidate('frmEdit','unitCost1', '', true, 'Unit Cost');
addToValidate('frmEdit','umsr', '', true, 'Unit of Msr');
</script>