<form method="post" name="frmEdit" id="frmEdit" action="index.php?budget/update" onsubmit="return check_form('frmEdit')" >

<input type="hidden" id="theForm" name="theForm" value="editbudget" />
<input type="hidden" name="budgetID" value="<?php echo $rec->budgetID ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value=" Save " />
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
        <th class="dataField" colspan="4" align="left"><h4 class="dataLabel">Edit Budget</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="18%"><slot>Year <span class="required">&bull;</span></slot></td>
        <td class="dataField">
         <slot><input type="text" name="year" id="year" size="15"  maxlength="4" value="<?php echo $rec->year ?>" onkeypress="return keyRestrict(event, 0);"/>
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Expenditure <span class="required">&bull;</span></slot></td>
        <td class="dataField">
         <slot>
        <select id="catID" name="catID" onchange="getParticulars();">
        <option value="">---------------------------------------</option>
        <?php
        	if ($expenditures->num_rows()) {
        		foreach($expenditures->result() as $row) {
        			if($row->catID==$rec->catID)
						echo '<option value="'.$row->catID.'" selected>'.$row->catName.'</option>';
					else        			
						echo '<option value="'.$row->catID.'" >'.$row->catName.'</option>';        			
        		}
        	}
        ?>
        </select>
        <img src="images/sqsWait.gif" align="absmiddle" id="loading" />
        </slot>
        </td>
    </tr>
     <tr>
        <td class="dataLabel"><slot>Particular  <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot>
        <select name="particularID" id="particularID">
		<option value="">---------------------------------------</option>
		<?php
		foreach ($particulars->result() as $particular) {
			if ($rec->particularID==$particular->particularID)
				echo '<option value="'.$particular->particularID.'" selected>'.$particular->particular.'</option>';			
			else 
				echo '<option value="'.$particular->particularID.'">'.$particular->particular.'</option>';			
		}
		?>
		</select>
        </slot></td>
    </tr>
     <tr>
        <td class="dataLabel"><slot>Amount Budget <span class="required">&bull;</span></slot></td>
        <td class="dataField" ><slot>
        <input type="text" name="amount" id="amount" size="15" value="<?php echo $rec->amount ?>" maxlength="20"  onkeypress="return keyRestrict(event, 1);"/></slot>
        </slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value="  Cancel  " onclick="history.back();" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  
</form>

<script>
addToValidate('frmEdit','year', '', true, 'Year');
addToValidate('frmEdit','catID', '', true, 'Expenditure');
addToValidate('frmEdit','particularID', '', true, 'Particular');
addToValidate('frmEdit','amount', '', true, 'Amount Budget');

function getParticulars() 
{
	$('#loading').show();
$.post(base_url+"index.php?particular/getParticulars", { catID: $('#catID').val() },
  function(data){
  	$('#loading').hide();
    initializeCombo('particularID',"---------------------------------------");
		for(c = 0; c < data.length; c++){
	    	var y=document.createElement('option');
	    	
		    y.text=data[c].particular;
	    	
			y.setAttribute('value',data[c].particularID);		
			var x=document.getElementById('particularID');
	
			if (navigator.appName=="Microsoft Internet Explorer") {
				x.add(y); // IE only  
			} else {
				x.add(y,null);
			}
		}
	$('#budgetID').val('');
  }, "json");
}

$('#loading').hide();
</script>