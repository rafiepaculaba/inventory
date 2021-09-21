<form method="post" name="frmEntry" id="frmEntry" action="index.php?report/save" >
<input type="hidden" value="<?php echo $datefrom ?>" name="datefrom" />
<input type="hidden" value="<?php echo $this->session->userdata('curBranchID') ?>" name="branchID2"  id="branchID2" />
<input type="hidden" value="0" name="deposits2"  id="deposits2" />
<input type="hidden" value="0" name="deposits3"  id="deposits3" />
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" tabindex="5" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" tabindex="6" type="button" id="cmdCancel" value=" Cancel " onClick="window.location='index.php?report/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td>
	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
	    <tr>
	        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">New Cashier Report</h4></th>
	    </tr>
	    <tr>
	       <td class="dataLabel" width="130"><slot>Cashier <span class="required">&bull;</span></slot></td>
	        <td class="dataField">
	        <slot>
	        <select name="userID" id="userID" onchange="displayReport();">
			<option value="">-----------------------------</option>
			<?php
			foreach ($cashiers->result() as $cashier) {
				if ($userID == $cashier->userID)
					echo '<option value="'.$cashier->userID.'" selected>'.$cashier->lastName.', '.$cashier->firstName.'</option>';			
				else 
					echo '<option value="'.$cashier->userID.'">'.$cashier->lastName.', '.$cashier->firstName.'</option>';			
			}
			?>
			</select>
	        </slot>
	        </td>
	        <tr>
	    </tr>
	    </table>
	</td>
</tr>
</table>
</p>

<?php
if ($branchID && $userID) {
?>
	<p>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="50%">
			<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
			        <th class="tabDetailViewDF" colspan="4" align="left"><h4 class="dataLabel">Change Fund: (Beginning)</h4></th>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>Cash Reserved</slot></td>
			        <td class="tabDetailViewDF" align="right" width="100"><slot><input type="text" id="begCashReserved" name="begCashReserved" class="number_fld" value="<?php echo number_format($begCashReserved,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right" width="100"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL"><slot>Cash Drawer</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="begCashDrawer" name="begCashDrawer" class="number_fld" value="<?php echo number_format($begCashDrawer,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="changeFund" name="changeFund" class="number_fld" value="<?php echo number_format($changeFund,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <th class="tabDetailViewDF" colspan="4" align="left"><h4 class="dataLabel">Add: Collections</h4></th>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="150"><slot>Cash Sales</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="sales" name="sales" class="number_fld" value="<?php echo number_format($sales,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>Customer's Accounts</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="collections" name="collections" class="number_fld" value="<?php echo number_format($collections,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL"><slot>Eload</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="eloads" name="eloads" class="number_fld" value="<?php echo number_format($eloads,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
					<td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>			        
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>Personal Drawings Pymt</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="personal_drawings_pymt" name="personal_drawings_pymt" class="number_fld" value="<?php echo number_format($personal_drawings_pymt,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>Check Payments</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="checks" name="checks" class="number_fld" value="<?php echo number_format($checks,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCollections" name="ttlCollections" class="number_fld" value="<?php echo number_format($ttlCollections,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
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
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCash" name="ttlCash" class="number_fld" value="<?php echo number_format(($changeFund+$ttlCollections),2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <th class="tabDetailViewDF" align="right">&nbsp;</th>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="150"><slot>Less: Cash Deposit</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="deposits1" name="deposits1" class="number_fld" value="<?php echo number_format($deposits1,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate();" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <!--<tr>
			        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2nd Deposit</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="deposits2" name="deposits2" class="number_fld" value="<?php echo number_format($deposits2,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate();" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3rd Deposit</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="deposits3" name="deposits3" class="number_fld" value="<?php echo number_format($deposits3,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate();" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>-->
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check Deposit</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="checkDeposits" name="checkDeposits" class="number_fld" value="<?php echo number_format($checks,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate();" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Encashments</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="encashments" name="encashments" class="number_fld" value="<?php echo number_format($encashments,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disbursements</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="disbursements" name="disbursements" class="number_fld" value="<?php echo number_format($disbursements,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>Carry Over Personal Drawings Bal</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="personal_drawings" name="personal_drawings" class="number_fld" value="<?php echo number_format($personal_drawings,2,".","") ?>" readonly size="10" onkeypress="return keyRestrict(event, 1);" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlLess" name="ttlLess" class="number_fld" value="<?php echo number_format($ttlLess,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 18);" /></slot></td>
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
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCashLeft" name="ttlCashLeft" class="number_fld" value="<?php echo number_format($ttlCashLeft,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 18);" /></slot></td>
			        <th class="tabDetailViewDF" align="right">&nbsp;</th>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL" width="130"><slot>Cash Reserved</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="endCashReserved" name="endCashReserved" class="number_fld" value="<?php echo number_format($endCashReserved,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate_cashDrawer();" /></slot></td>
			        <td class="tabDetailViewDF" align="right" width="100"><slot>&nbsp;</slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			    <tr>
			        <td class="tabDetailViewDL"><slot>Cash Drawer</slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="endCashDrawer" name="endCashDrawer" class="number_fld" value="<?php echo number_format($endCashDrawer,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 1);" onchange="calculate_cashReserved();" /></slot></td>
			        <td class="tabDetailViewDF" align="right"><slot><input type="text" id="ttlCashLeft1" name="ttlCashLeft1" class="number_fld" value="<?php echo number_format($ttlCashLeft,2,".","") ?>" size="10" onkeypress="return keyRestrict(event, 18);" /></slot></td>
			        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
			    </tr>
			</table>	
		</td>
		<td width="50%" valign="top">
			<h4 class="dataLabel">&nbsp;&nbsp; <img src="images/submenu/account.gif" align="absmiddle" alt="Deposits" />&nbsp;Cash Deposits</h4>
			<table class="listView" border="0" cellpadding="0" cellspacing="0" width="98%" align="center">
			<tbody>
				<tr height="20">
					<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
					<td scope="col" class="listViewThS1" nowrap>Date</td>
					<td scope="col" class="listViewThS1" nowrap>No.</td>
					<td scope="col" class="listViewThS1" nowrap>Cut-off</td>
					<td scope="col" class="listViewThS1" nowrap>Bank</td>
					<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div></td>
				</tr>
				<tr>
					<td colspan="20" height="1" class="listViewHRS1"></td>
				</tr>
				
				<?php
				$totalAmount 	= 0;
				if ($all_cash_deposits->num_rows()) {
					foreach($all_cash_deposits->result() as $row) {
						$totalAmount 	+= $row->amount;
				?>
					<!-- Start of students Listing -->
			    	<tr height="20">
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">
						<input type="checkbox" name="selectedDeposits[]" value="<?php echo $row->depositID ?>" checked>
			    		</td>
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo date("m/d/Y",strtotime($row->date)) ?></span></td>
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->depositNo ?></span></td>
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->cutoff ?></span></td>
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->bank ?></span></td>
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->amount,2) ?></span></td>
			    	</tr>
			    	<tr>
			    		<td colspan="20" height="1" class="listViewHRS1"></td>
			    	</tr>
			    	<!-- End of student Listing -->
				<?php
					}
				} 
				?>
			    	<tr height="20">
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" colspan="5"
			            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL: </b></span></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($totalAmount,2) ?></b></span></td>
			    		
			    	</tr>
				
				<tr>
					<td colspan="20" class="listViewHRS1"></td>
				</tr>
			</tbody>
			</table>
			
			<h4 class="dataLabel">&nbsp;&nbsp; <img src="images/submenu/account.gif" align="absmiddle" alt="Deposits" />&nbsp; Check Deposits</h4>
			<table class="listView" border="0" cellpadding="0" cellspacing="0" width="98%" align="center">
				<tbody>
						<tr height="20">
							<td scope="col" class="listViewThS1" nowrap>&nbsp;</td>
							<td scope="col" class="listViewThS1" nowrap>Date</td>
							<td scope="col" class="listViewThS1" nowrap>No.</td>
							<td scope="col" class="listViewThS1" nowrap>Cut-off</td>
							<td scope="col" class="listViewThS1" nowrap>Bank</td>
							<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div></td>
						</tr>
						<tr>
							<td colspan="20" height="1" class="listViewHRS1"></td>
						</tr>
						
						<?php
						$totalAmount 	= 0;
						if ($all_check_deposits->num_rows()) {
							foreach($all_check_deposits->result() as $row) {
								$totalAmount 	+= $row->amount;
						?>
							<!-- Start of students Listing -->
					    	<tr height="20">
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">
								<input type="checkbox" name="selectedDeposits[]" value="<?php echo $row->depositID ?>" checked>
					    		</td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo date("m/d/Y",strtotime($row->date)) ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->depositNo ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->cutoff ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $row->bank ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($row->amount,2) ?></span></td>
					    	</tr>
					    	<tr>
					    		<td colspan="20" height="1" class="listViewHRS1"></td>
					    	</tr>
					    	<!-- End of student Listing -->
						<?php
							}
						} 
						?>
					    	<tr height="20">
					    		<td scope="row" 
					            class="oddListRowS1" bgcolor="#ffffff" colspan="5"
					            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL: </b></span></td>
					    		
					    		<td scope="row"
					            class="oddListRowS1" bgcolor="#ffffff" 
					    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($totalAmount,2) ?></b></span></td>
					    		
					    	</tr>
						<tr>
							<td colspan="20" class="listViewHRS1"></td>
						</tr>
					</tbody>
					</table>
				
				</td>
			</tr>
			</table>
		
		</td>
	</tr>
	</table>
	</p>
<?php
}
?>
</form>

<script>

//addToValidate('frmEntry','branchID', '', true, 'Branch');
addToValidate('frmEntry','userID', '', true, 'Cashier');

function save()
{
	if (check_form('frmEntry')) {
		document.getElementById('frmEntry').submit();
	}
}

function displayReport()
{
	if ($('#branchID2').val() && $('#userID').val()) {
		window.location="index.php?report/create/"+$('#branchID2').val()+"/"+$('#userID').val();
	}
}

function calculate()
{
	ttlCash = $('#ttlCash').val();
	ttlLess = parseFloat($('#deposits1').val())+parseFloat($('#deposits2').val())+parseFloat($('#deposits3').val())+parseFloat($('#checkDeposits').val())+parseFloat($('#encashments').val())+parseFloat($('#disbursements').val());
	ttlCashLeft = ttlCash - ttlLess;
	$('#ttlLess').val(ttlLess.toFixed(2));
	$('#ttlCashLeft').val(ttlCashLeft.toFixed(2));
	
	//endCashReserved = endCashDrawer = ttlCashLeft/2;
	endCashReserved = parseFloat($('#begCashReserved').val());
	endCashDrawer 	= ttlCashLeft - endCashReserved;
	
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