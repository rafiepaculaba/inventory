<form method="post" name="frmEntry" id="frmEntry" action="index.php?requisition/view" >
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="  Save  " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?requisition/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"> <h4 class="dataLabel"> New Requisition Order </h4> </th>
    </tr>
    <tr>
    	<td class="dataLabel" width="100">Vessel <span class="required">&bull;</span></td>
    	<td class="dataField" width="300">
    	<select name="vesselID">
    	<option>-----------------------</option>
    	</select>
    	</td>
        <td class="dataLabel"><slot>RO Date <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="departureDate" id="departureDate" maxlength="10" size="15" value="<?php echo date("m/d/Y"); ?>" onkeypress="return keyRestrict(event, 18);" />  <img id="jscal_trigger1" align="top" alt="Date" src="images/jscalendar.gif"/></td>
    </tr>
    <tr>
    	<td class="dataLabel">Department <span class="required">&bull;</span></td>
    	<td class="dataField">
    	<select name="deptID">
    	<option>-----------------------</option>
    	</select>
    	</td>
    	<td class="dataLabel"><slot>RO No. <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="prNo" id="prNo" size="15" value="" /></slot></td>
    </tr>
    <tr>
    	<td class="dataLabel">Main Category <span class="required">&bull;</span></td>
    	<td class="dataField">
    	<select name="deptID">
    	<option>-----------------------</option>
    	</select>
    	</td>
    	<td class="dataLabel"><slot>Port of Delivery <span class="required">&bull;</span></slot></td>
        <td class="dataField"><slot><input type="text" name="arrivalPlace" id="arrivalPlace" size="40"/></td>
    </tr>
    <tr>
    	<td class="dataLabel" valign="top"><slot>Remarks <span class="required">&bull;</span></slot></td>
        <td class="dataField" colspan="3"><slot><textarea cols="40" rows="2"></textarea></td>
    </tr>
    </table>
</td></tr>
</table>
</form>

<form method="post" name="frmAdd" id="frmAdd">
<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"> <h4 class="dataLabel"> Add Items </h4> </th>
    </tr>
    <tr>
        <td class="dataField">
        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        	<tr>
		        <td class="dataField">
		        <select name="">
		        <option>--------------------------</option>
		        </select>
		        </td>
		         <td class="dataField">
		        <select name="">
		        <option>---------------------------</option>
		        </select>
		        </td>
		        <td><input type="text" name="rob" id=""rob"" size="8" value="" maxlength="25" onkeypress="return keyRestrict(event, 0);" /></td>
		        <td><input type="text" name="qty" id="qty" size="8" value="" maxlength="25" onkeypress="return keyRestrict(event, 0);" /></td>
		    	<td><input class="button" name="cmdAdd" type="button" id="cmdAdd" value=" Add " onclick="checkQty();" /></td>
		    </tr>
		    <tr>
		    	<td>Sub Category 1<span class="required">&bull;</span></td>
		    	<td>Sub Cat2 - Item<span class="required">&bull;</span></td>
		    	<td>R.O.B<span class="required">&bull;</span></td>
		    	<td>Quantity<span class="required">&bull;</span></td>
		    	<td>&nbsp;</td>
		    </tr>
		    </table>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>
</form>

<div id="divmember">
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Sub Cat</td>
		<td scope="col" class="listViewThS1" nowrap>Code</td>
		<td scope="col" class="listViewThS1" nowrap>Item Description</td>
		<td scope="col" class="listViewThS1" nowrap>ROB</td>
		<td scope="col" class="listViewThS1" nowrap>Rqstd Qty</td>
		<td scope="col" class="listViewThS1" nowrap>Unit</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<?php 
	$total = 0;
	for($i=1; $i<=5; $i++) {
	?>
	<tr height="20">
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
        
        <td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
		align="left" valign="top">&nbsp;</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="left" valign="top">&nbsp;</td>
		
	</tr>
	<tr>
		<td colspan="5" height="1" class="listViewHRS1"></td>
	</tr>
	<?php } ?>
	
</tbody>
</table>
</div>

<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    	<td class="dataLabel" width="100" nowrap>Chief Officer/Engineer <span class="required">&bull;</span></td>
    	<td class="dataField">
    	<select name="vesselID">
    	<option>-----------------------</option>
    	</select>
    	</td>
        <td class="dataLabel"><slot>Noted By <span class="required">&bull;</span></slot></td>
        <td class="dataField"><input type="text" name="notedby" id="notedby" maxlength="100" size="30" /></td>
    </tr>
    </table>
</td></tr>
</table>

<?php
calendarSetup('date', 'jscal_trigger1');
?>

<script>
//addToValidate('frmEntry','date', '', true, 'Date');
//addToValidate('frmEntry','deptID', '', true, 'Departmnet');
//addToValidate('frmEntry','preparedBy', '', true, 'Prepared By');
//addToValidate('frmEntry','approvedBy', '', true, 'Approved By');
//addToValidate('frmEntry','prNo', '', true, 'PR No.');

addToValidate('frmAdd','itemCode', '', true, 'Item');
addToValidate('frmAdd','qty', '', true, 'Quantity');

function setKey(e)
{
	key = getKeyCode(e);
	
	if (key==13) {
		// process searching here
		$.post(base_url+"index.php?receipt/search_products", { keyword: $('#product_keyword').val()},
		  function(data) {
		    	document.getElementById('divSectionList').innerHTML = data;
		  	}
		  , "text");
	}
	
}

function putPLU(plu)
{
	$('#itemCode').val(plu);
	hiddenFloatingDiv('windowcontent');
	
//	if (plu!="") {
//		getProduct();
//	}
}

function addItem()
{
	$.post(base_url+"index.php?receipt/add", { prodCode: $('#prodCode').val(), qty: $('#qty').val(), price: $('#price').val(), discount: $('#discount').val() },
	  function(data) {
	  	if (data=="0") {
	  		alert("Duplicate entry!");
	  		document.getElementById('prodCode').focus();
	  	} else {
	    	document.getElementById('divmember').innerHTML = data;
	    	
	    	// clear fields
	    	$('#prodCode').val('');
	    	$('#prodDesc').val('');
	    	$('#qty').val('');
	    	$('#price').val('');
	    	$('#discount').val('');
	    	
	    	document.getElementById('prodCode').focus();
	  	}
	  }, "text");
}

function checkQty()
{
	if (check_form('frmAdd')) {
		order_qty = parseFloat($('#qty').val());
		
		$.post(base_url+"index.php?receipt/getQty", { prodCode: $('#prodCode').val(), branchID: $('#branchID').val() },
		  function(data) {
		  	if (order_qty <= parseFloat(data)) {
		  		addItem();
		  	} else {
		    	alert("Insuffecient qty on hand!\nQty on Hand: "+data+"\nOrdered Qty: "+order_qty);
		    	document.getElementById('qty').focus();
		  	}
		  }, "text");
	}
}

function getPrice()
{
	$.post(base_url+"index.php?receipt/getPrice", { prodCode: $('#prodCode').val() },
	  function(data) {
	  	$('#price').val(data);
	  }, "text");
}

function getProduct()
{
	$.post(base_url+"index.php?receipt/getProduct", { prodCode: $('#prodCode').val() },
	  function(data) {
	  	if (data.prodDesc!="") {
		  	$('#price').val(data.unitPrice);
		  	$('#prodDesc').val(data.prodDesc);
		  	document.getElementById('qty').focus();
	  	} else {
	  		$('#price').val("");
		  	$('#prodDesc').val("");
		  	$('#qty').val("");
	  	}
	  }, "json");
}


function deleteItem(code, product, quantity, unit, unitcost, discount)
{
	if (product) {
		$.post(base_url+"index.php?receipt/del", {prodCode: code, prodDesc: product, qty: quantity, umsr: unit, price: unitcost, discount: discount },
		  function(data) {
		    	document.getElementById('divmember').innerHTML = data;
		    	document.getElementById('prodCode').focus();
		  }, "text");
	}
}

function save()
{
  	if (check_form('frmEntry')) {
		$.post(base_url+"index.php?receipt/check_entry", { orNo: $('#orNo').val() },
		  function(data){
		    if (parseInt(data)) {
		    	check_duplicate();
		    } else {
		    	alert("Warning: Can't save empty list!");
		    }
		  }, "text");
  	}
}

function check_duplicate()
{
	$.post(base_url+"index.php?receipt/check_duplicate", { orNo: $('#orNo').val() },
	  function(data){
	    if (parseInt(data)) {
	    	// duplicate
	    	alert("Error: OR No is already exist!");
	    } else {
	    	// no duplicate
	    	document.getElementById('frmEntry').submit();
	    }
	  }, "text");
}

$("#orMethod").change
	(
		function()
		{
			if($("#orMethod").val() =="cc") {
				$("#displayCredit").css({display:"block"});
				$("#displayCheck").css({display:"none"});
				
				// add to validation
				addToValidate('frmEntry','ccNo', '', true, 'Credit Card No.');
				addToValidate('frmEntry','ccName', '', true, 'Card Holder');
				addToValidate('frmEntry','ccType', '', true, 'Card Type');
				addToValidate('frmEntry','ccExpiryDate', '', true, 'Expiry Date');
				
				// remove from validation
				removeFromValidate('frmEntry','checkNo');
				removeFromValidate('frmEntry','ccName2');
				removeFromValidate('frmEntry','bank');
				
			} else if($("#orMethod").val() =="Check") {
				$("#displayCheck").css({display:"block"});
				$("#displayCredit").css({display:"none"});
				
				// add to validation
				addToValidate('frmEntry','checkNo', '', true, 'Check No.');
				addToValidate('frmEntry','ccName2', '', true, 'Account Name');
				addToValidate('frmEntry','bank', '', true, 'Bank Name');
				
				// remove from validation
				removeFromValidate('frmEntry','ccNo');
				removeFromValidate('frmEntry','ccName');
				removeFromValidate('frmEntry','ccType');
				removeFromValidate('frmEntry','ccExpiryDate');
				
			} else {
				$("#displayCredit").css({display:"none"});
				$("#displayCheck").css({display:"none"});
				
				// remove from validation
				removeFromValidate('frmEntry','checkNo');
				removeFromValidate('frmEntry','ccName2');
				removeFromValidate('frmEntry','bank');
				removeFromValidate('frmEntry','ccNo');
				removeFromValidate('frmEntry','ccName');
				removeFromValidate('frmEntry','ccType');
				removeFromValidate('frmEntry','ccExpiryDate');
			}
			
		}
	);
	
</script>