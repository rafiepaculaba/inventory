<form enctype="multipart/form-data" name="frmEntry" id="frmEntry" method="post" action="index.php?budget/save" >
<input type="hidden" id="theForm" name="theForm" value="createbudget" />
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value=" Save " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?budget/show'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="4" align="left"><h4 class="dataLabel">Create Budget</h4></th>
    </tr>
     <tr>
        <td class="dataLabel" width="100"><slot>Year <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <!--<input type="text" name="year" id="year" size="15"  maxlength="4" onkeypress="return keyRestrict(event, 0);"/>-->
        <select name="year" id="year" style="width: 100px">
        <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
        <option value="<?php echo date('Y')+1 ?>"><?php echo date('Y')+1 ?></option>
        </select>
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Expenditures <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select id="catID" name="catID" onchange="getParticulars();">
        <option value="">-------------------------------------------------------</option>
        <?php
        	if ($expenditures->num_rows()) {
        		foreach($expenditures->result() as $row) {
					echo '<option value="'.$row->catID.'">'.$row->catName.'</option>';        			
        		}
        	}
        ?>
        </select>
        <img src="images/sqsWait.gif" align="absmiddle" id="loading" />
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" width="100"><slot>Particular <span class="required">&bull;</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="particularID" id="particularID">
		<option value="">-------------------------------------------------------</option>
		<?php
		foreach ($particulars->result() as $particular) {
			echo '<option value="'.$particular->particularID.'">'.$particular->particular.'</option>';			
		}
		?>
		</select>
        </slot>
        </td>
    </tr>
     <tr>
        <td class="dataLabel" width="18%"><slot>Amount Budget <span class="required">&bull;</span></slot></td>
        <td class="dataField" colspan="3"><slot><input type="text" name="amount" id="amount" size="15"  maxlength="50" onkeypress="return keyRestrict(event, 1);"/></slot></td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value=" Save " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?budget/show'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Required field</td>
  </tr>
</table>  
</form>

<script>
addToValidate('frmEntry','year', '', true, 'Year');
addToValidate('frmEntry','catID', '', true, 'Category');
addToValidate('frmEntry','particularID', '', true, 'Particular');
addToValidate('frmEntry','amount', '', true, 'Amount Budget');
</script>

<script language="javascript">

function save() 
{
	if (check_form('frmEntry')) {
		$.post(base_url+"index.php?budget/check_duplicate", { year: $('#year').val(), particularID: $('#particularID').val() },
		  function(data){
		    if (parseInt(data)) {
		    	// duplicate
		    	alert("Error: Budget is already exist!");
		    } else {
		    	// no duplicate
				document.getElementById('frmEntry').submit();
		    }
		  }, "text");
	}
}

function getParticulars() 
{
$('#loading').show();
$.post(base_url+"index.php?particular/getParticulars", { catID: $('#catID').val() },
  function(data){
  	$('#loading').hide();
    initializeCombo('particularID',"-------------------------------------------------------");
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