<form method="post" name="frmEntry" id="frmEntry" action="index.php?receipt/update" onsubmit="return check_form('frmEntry')" >
<input type="hidden" name="orID" id="orID" value="<?php echo $rec->orID ?>" />
<input type="hidden" id="branchID" name="branchID" value="<?php echo $this->session->userdata('curBranchID') ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="  Save  " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?receipt/view/<?php echo $rec->orID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"> <h4 class="dataLabel"> Edit Official Receipt </h4> </th>
    </tr>
	<tr>
        <td class="dataLabel" width="150"><slot>Customer <span class="required">&bull;</span></slot></td>
        <td class="dataField" width="40%"><slot>
        <select name="custNo" id="custNo" disabled>
		<option value="">-----------------------------</option>
		<?php
		foreach ($customers->result() as $customer) {
			if ($rec->custNo==$customer->custNo)
				echo '<option value="'.$customer->custNo.'" selected>'.$customer->name.'</option>';	
			else 
				echo '<option value="'.$customer->custNo.'">'.$customer->name.'</option>';	
		}
		?>
		</select>
        </slot></td>
        
        <td class="dataLabel" width="150"><slot>Delivery Instruction </slot></td>
        <td class="dataField" rowspan="2"><slot><textarea name="deliveryInstruction" id="deliveryInstruction" rows="2" cols="25"><?php echo $rec->deliveryInstruction; ?></textarea></slot></td>
	</tr>
    <tr>
    	<td class="dataLabel"><slot>OR Method </slot></td>
    	<td class="dataField">
    	<slot>
        <select name="orMethod" id="orMethod" disabled>
        <option value="cash"
        <?php 
        	if ($rec->orMethod=="cash") echo " selected";
        ?>
        >Cash</option>
        <option value="cc"
        <?php 
        	if ($rec->orMethod=="cc") echo " selected";
        ?>
        >Credit Card</option>
        </select>
        </slot>
    	</td>
    </tr>
    </table>
</td></tr>
</table>

<?php if($rec->ccNo) { ?>

<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="dataLabel" width="12%"><slot>Credit Card No. <span class="required">&bull;</span></slot></td>
        <td class="dataField" colspan="3">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="15%"><slot><input type="text" name="ccNo" id="ccNo" size="20" maxlength="25" value="<?php echo $rec->ccNo;  ?>"/></slot></td>
                
                <td class="dataLabel" width="12%"><slot>Card Holder <span class="required">&bull;</span></slot></td>
                <td width="15%"><slot><input type="text" name="ccName" id="ccName" size="20" maxlength="25" value="<?php echo $rec->ccName;  ?>"/></slot></td>
                
                <td class="dataLabel" width="12%"><slot>Card Type <span class="required">&bull;</span></slot></td>
                <td width="15%">
                <slot>
		        <select name="ccType" id="ccType">
		        <option value="">-------------------------</option>
		        <option value="Master"
		        <?php 
		        	if ($rec->ccType=="Master") echo " selected";
		        ?>
		        >Master Card</option>
		        <option value="Visa"
		        <?php 
		        	if ($rec->ccType=="Visa") echo " selected";
		        ?>
		        >Visa</option>
		        <option value="HSBC"
		        <?php
		        	if ($rec->ccType=="HSBC") echo " selected";
		        ?>
		        >HSBC</option>
		        </select>
		        </slot>
                </td>
                
                <td class="dataLabel" width="12%"><slot>Expiry Date <span class="required">&bull;</span></slot></td>
                <td><input type="text" name="ccExpiryDate" id="ccExpiryDate" maxlength="10" size="12"  onkeypress="return keyRestrict(event, 10);" value="<?php echo date("m/d/Y",strtotime($rec->ccExpiryDate)) ?>"/> <img id="jscal_trigger1" align="top" alt="Expiry Date" src="images/jscalendar.gif"/></td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
</td></tr>
</table>

<?php } ?>

</p>
<div id="divmember">
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Code</td>
		<td scope="col" class="listViewThS1" nowrap>Description</td>
		<td scope="col" class="listViewThS1" nowrap>Quantity</td>
		<td scope="col" class="listViewThS1" nowrap>Unit </td>
		<td scope="col" class="listViewThS1" nowrap>Price</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Discount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Net</div></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	<?php
	$total = 0;
	$net = 0;
	$discount = 0;
	$total_net = 0;
	if (!empty($_SESSION['members'])) {
		$ctr = 0;
		foreach($_SESSION['members'] as $mem) {
			$amount = $mem['qty'] * $mem['price'];
			$net = $amount - $mem['discount'];
			$total += $amount;
			$discount +=$mem['discount'];
			$total_net += $net;
	?>
		<!-- Start of students Listing -->
    	<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $mem['prodCode'] ?></td>	
    	
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $mem['prodDesc'] ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top">
    		<input type="text" size="8" name="qty_<?php echo $mem['orDetailID']; ?>" id="qty_<?php echo $mem['orDetailID']; ?>" value="<?php echo $mem['qty'] ?>" onchange="recalculate('<?php echo $mem['orDetailID']; ?>');" onkeypress="return keyRestrict(event, 1);" />
    		</td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $mem['umsr'] ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top">
    		<input type="hidden" size="8" name="price_<?php echo $mem['orDetailID']; ?>" id="price_<?php echo $mem['orDetailID']; ?>" value="<?php echo $mem['price'] ?>" />
    		<input type="hidden" size="8" name="amount_<?php echo $mem['orDetailID']; ?>" id="amount_<?php echo $mem['orDetailID']; ?>" value="<?php echo $amount ?>" />
    		<input type="hidden" size="8" name="net_<?php echo $mem['orDetailID']; ?>" id="net_<?php echo $mem['orDetailID']; ?>" value="<?php echo $net ?>" />
    		<?php echo number_format($mem['price'],2) ?>
    		</td>
    		
    		<td scope="row" id="txtamount_<?php echo $mem['orDetailID']; ?>"
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top">
    		<?php echo number_format($amount,2) ?>
    		</td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top">
    		<input type="hidden" size="8" name="discount_<?php echo $mem['orDetailID']; ?>" id="discount_<?php echo $mem['orDetailID']; ?>" value="<?php echo $mem['discount'] ?>" />
			<?php echo number_format($mem['discount'],2) ?>
    		</td>
    		
    		<td scope="row" id="txtnet_<?php echo $mem['orDetailID']; ?>"
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top">
    		<?php echo number_format($net,2) ?>
    		</td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		$ctr++;
		}
		for($i=$ctr; $i<10; $i++) {
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
			<td colspan="20" height="1" class="listViewHRS1"></td>
		</tr>
	<?php
		}
	}
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
        align="left" valign="top"><b>TOTAL</b></td>
		
		<td scope="row" id="gtotal"
        class="oddListRowS1" bgcolor="#ffffff" 
        align="right" valign="top"><b><?php echo number_format($total,2); ?></b></td>
		
		<td scope="row"
        class="oddListRowS1" bgcolor="#ffffff" 
        align="right" valign="top"><b><?php echo number_format($discount,2); ?></b></td>
		
		<td scope="row" id="gtotal_net"
        class="oddListRowS1" bgcolor="#ffffff" 
        align="right" valign="top"><b><?php echo number_format($total_net,2); ?></b></td>
		   
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>
</div>
</form>

<?php
calendarSetup('ccExpiryDate', 'jscal_trigger1');
?>

<script>
addToValidate('frmEntry','custNo', '', true, 'Customer');
addToValidate('frmEntry',"qty_<?php echo $mem['orDetailID']; ?>", '', true, 'Quantity');

function recalculate(id)
{
	qty    = parseFloat($('#qty_'+id).val());
	price  = parseFloat($('#price_'+id).val());
	discount  = parseFloat($('#discount_'+id).val());
	
	amount = qty * price;
	net = amount - discount;
	
	$('#amount_'+id).val(amount);
	document.getElementById('txtamount_'+id).innerHTML = amount.toFixed(2);
	
	$('#net_'+id).val(net);
	document.getElementById('txtnet_'+id).innerHTML = net.toFixed(2);
	
	gtotal = 0;
	gtotal_net = 0;
	// update total
	<?php
	if (!empty($_SESSION['members'])) {
		foreach($_SESSION['members'] as $mem) {
			echo "gtotal += parseFloat($('#amount_".$mem['orDetailID']."').val()); \n";
			echo "gtotal_net += parseFloat($('#net_".$mem['orDetailID']."').val()); \n";
		}
	}
	?>
	
	document.getElementById('gtotal').innerHTML = gtotal.toFixed(2);
	document.getElementById('gtotal_net').innerHTML = gtotal_net.toFixed(2);
}

function addItem()
{
	if (check_form('frmAdd')) {
		$.post(base_url+"index.php?receipt/add", { prodCode: $('#prodCode').val(), qty: $('#qty').val(), price: $('#price').val() },
		  function(data) {
		  	if (data=="0") {
		  		alert("Duplicate entry!");
		  		document.getElementById('prodCode').focus();
		  	} else {
		    	document.getElementById('divmember').innerHTML = data;
		    	
		    	// clear fields
		    	$('#prodCode').val('');
		    	$('#qty').val('');
		    	$('#price').val('');
		    	
		    	document.getElementById('prodCode').focus();
		  	}
		  }, "text");
	}
}

function deleteItem(code, product, quantity, unit, unitcost)
{
	if (product) {
		$.post(base_url+"index.php?receipt/del", {prodCode: code, prodDesc: product, qty: quantity, umsr: unit, price: unitcost },
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

</script>