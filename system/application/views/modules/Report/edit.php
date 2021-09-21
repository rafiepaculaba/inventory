<form method="post" name="frmEdit" id="frmEdit" action="index.php?report/update" onsubmit="return check_form('frmEdit')" >

<input type="hidden" name="cashReportID" id="cashReportID" value="<?php echo $rec->cashReportID ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" tabindex="5" type="submit" id="cmdSave" value="  Save  " />
    <input class="button" name="cmdCancel" tabindex="6" type="button" id="cmdCancel" value="  Cancel  " onClick="window.location='index.php?report/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  
				
<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Product</h4></th>
    </tr>
   <tr>
        <td class="dataLabel" width="15%"><slot>Branch <span class="required">&bull;</span></slot></td>
        <td class="dataField">
         <select id="branchID" name="branchID" onchange="displayReport();">
         <option value="">-------------------------------</option>
        <?php
        	if ($branches->num_rows()) {
        		foreach($branches->result() as $row) {
        			if ($row->branchID == $rec->branchID)
						echo '<option value="'.$row->branchID.'" selected>'.$row->branchName.'</option>';        			
					else
						echo '<option value="'.$row->branchID.'">'.$row->branchName.'</option>';        			
        		}
        	}
        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" width="15%"><slot>Cashier <span class="required">&bull;</span></slot></td>
        <td class="dataField">
         <select id="userID" name="userID">
         <option value="">-------------------------------</option>
        <?php
        	if ($cashiers->num_rows()) {
        		foreach($cashiers->result() as $row) {
        			if ($row->userID == $rec->userID)
						echo '<option value="'.$row->userID.'" selected>'.$row->lastName.', '.$row->firstName.'</option>';        			
					else
						echo '<option value="'.$row->userID.'">'.$row->lastName.', '.$row->firstName.'</option>';        			
        		}
        	}
        ?>
        </select>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

<?php
if ($branchID && $userID) {
?>
	<p>
	<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
	        <th class="tabDetailViewDF" colspan="4" align="left"><h4 class="dataLabel">Change Fund: (Beginning)</h4></th>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>Cash Reserved</slot></td>
	        <td class="tabDetailViewDF" align="right" width="100"><slot><input type="text" id="begCashReserved" name="begCashReserved" value="<?php echo number_format($begCashReserved,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right" width="100"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL"><slot>Cash Drawer</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="begCashDrawer" name="begCashDrawer" value="<?php echo number_format($begCashDrawer,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="changeFund" name="changeFund" value="<?php echo number_format($changeFund,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <th class="tabDetailViewDF" colspan="4" align="left"><h4 class="dataLabel">Add: Collections</h4></th>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>Cash Sales</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="sales" name="sales" value="<?php echo number_format($sales,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>Customer's Accounts</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="collections" name="collections" value="<?php echo number_format($collections,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL"><slot>Eload</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="eloads" name="eloads" value="<?php echo number_format($eloads,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCollections" name="ttlCollections" value="<?php echo number_format($ttlCollections,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>--------------------------</slot></td>
	        <td class="tabDetailViewDF"><slot>--------------------------</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">Total Cash During The Day</h4></th>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCash" name="ttlCash" value="<?php echo number_format(($changeFund+$ttlCollections),2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <th class="tabDetailViewDF" align="right">&nbsp;</th>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>Less: Deposits</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="deposits" name="deposits" value="<?php echo number_format($deposits,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate();" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Encashments</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="encashments" name="encashments" value="<?php echo number_format($encashments,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disbursements</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="disbursements" name="disbursements" value="<?php echo number_format($disbursements,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlLess" name="ttlLess" value="<?php echo number_format($ttlLess,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 18);" /></slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>===============</slot></td>
	        <td class="tabDetailViewDF"><slot>===============</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">Cash Left on Hand</h4></th>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCashLeft" name="ttlCashLeft" value="<?php echo number_format($ttlCashLeft,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 18);" /></slot></td>
	        <th class="tabDetailViewDF" align="right">&nbsp;</th>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="130"><slot>Cash Reserved</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="endCashReserved" name="endCashReserved" value="<?php echo number_format($endCashReserved,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate_cashDrawer();" /></slot></td>
	        <td class="tabDetailViewDF" align="right" width="100"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL"><slot>Cash Drawer</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="endCashDrawer" name="endCashDrawer" value="<?php echo number_format($endCashDrawer,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate_cashReserved();" /></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCashLeft1" name="ttlCashLeft1" value="<?php echo number_format($ttlCashLeft,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 18);" /></slot></td>
	        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
	    </tr>
	</table>
	</p>
<?php
}
?>
</form>

<script>
addToValidate('frmEdit','branchID', '', true, 'Branch');
addToValidate('frmEdit','userID', '', true, 'Cashier');


function save()
{
	if (check_form('frmEdit')) {
		document.getElementById('frmEdit').submit();
	}
}

function displayReport()
{
	if ($('#branchID').val() && $('#userID').val()) {
		window.location="index.php?report/create/"+$('#branchID').val()+"/"+$('#userID').val();
	}
}

function calculate()
{
	ttlCash = $('#ttlCash').val();
	ttlLess = parseFloat($('#deposits').val())+parseFloat($('#encashments').val())+parseFloat($('#disbursements').val());
	ttlCashLeft = ttlCash - ttlLess;
	$('#ttlLess').val(ttlLess.toFixed(2));
	$('#ttlCashLeft').val(ttlCashLeft.toFixed(2));
	
	endCashReserved = endCashDrawer = ttlCashLeft/2;
	
	$('#ttlCashLeft1').val(ttlCashLeft.toFixed(2));
	$('#endCashReserved').val(endCashReserved.toFixed(2));
	$('#endCashDrawer').val(endCashDrawer.toFixed(2));
}

function calculate_cashReserved()
{
	ttlCashLeft	    = parseFloat($('#ttlCashLeft').val());
	endCashDrawer 	= parseFloat($('#endCashDrawer').val());
	endCashReserved = ttlCashLeft - endCashDrawer;
	$('#endCashReserved').val(endCashReserved.toFixed(2));
}

function calculate_cashDrawer()
{
	ttlCashLeft	    = parseFloat($('#ttlCashLeft').val());
	endCashReserved = parseFloat($('#endCashReserved').val());
	endCashDrawer = ttlCashLeft - endCashReserved;
	$('#endCashDrawer').val(endCashDrawer.toFixed(2));
}

</script>