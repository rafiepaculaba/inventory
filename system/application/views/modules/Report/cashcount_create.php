<form method="post" name="frmEntry" id="frmEntry" action="index.php?report/save_cashcount" >
<input type="hidden" name="cashReportID" value="<?php echo $rec->cashReportID ?>" />
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Save  " onclick="save();" />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onClick="window.close();" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table>  

<p><h4 class="dataLabel">Cash Count</h4>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="6" align="left">
        <h4 class="dataLabel">Cashier Report (
        <?php
        if ($rec->rstatus==1) {
        	echo "Pending";
        } else if ($rec->rstatus==1) {
        	echo "Confirmed";
        } else {
        	echo "<font color='red'>Cancelled</font>";
        }
        ?>
        )</h4>
        </th>
    </tr>
     <tr>
        <td class="tabDetailViewDL"><slot>Branch :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->branchName; ?></slot></td>
        <td class="tabDetailViewDL" ><slot>Date :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo date("m/d/Y",strtotime($rec->date)); ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" ><slot>Cashier :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->cashierName; ?></slot></td>
        <td class="tabDetailViewDL" ><slot>Cash Deposits :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->deposits1,2) ?></slot></td>
    </tr>
    <!--<tr>
        <td class="tabDetailViewDL" ><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDL" ><slot>2nd Deposits :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->deposits2,2) ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" ><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDL" ><slot>3rd Deposits :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->deposits3,2) ?></slot></td>
    </tr>-->
    <tr>
        <td class="tabDetailViewDL" ><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDL" ><slot>Check Deposits :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->checkDeposits,2) ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" ><slot>Cash Left on Hand :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo number_format($rec->ttlCashLeft,2) ?></b></slot></td>
        <td class="tabDetailViewDL" ><slot>Total Deposits :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo number_format($rec->deposits1+$rec->deposits2+$rec->deposits3+$rec->checkDeposits,2) ?></b></slot></td>
    </tr>
</table>
</p>

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="tabDetailViewDL" width="40%" align="center"><b>Denomination</b></td>
        <td class="tabDetailViewDF" width="30%" align="center"><b>No. of Pcs.</b></td>
        <td class="tabDetailViewDF" width="30%" align="right"><b>Amount</b></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">1,000.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="thousands" name="thousands" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('thousands');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="thousands_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">500.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="fivehundreds" name="fivehundreds" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('fivehundreds');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fivehundreds_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">200.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="twohundreds" name="twohundreds" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('twohundreds');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="twohundreds_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">100.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="hundreds" name="hundreds" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('hundreds');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="hundreds_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">50.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="fiftys" name="fiftys" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('fiftys');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fiftys_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">20.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="twentys" name="twentys" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('twentys');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="twentys_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">10.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="tens" name="tens" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('tens');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="tens_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">5.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="fives" name="fives" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('fives');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fives_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">1.00</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="ones" name="ones" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('ones');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="ones_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">0.25</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="twentyfiveCents" name="twentyfiveCents" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('twentyfiveCents');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="twentyfiveCents_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">0.10</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="tenCents" name="tenCents" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('tenCents');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="tenCents_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">0.05</td>
        <td class="tabDetailViewDF" align="center"><slot><input type="text" id="fiveCents" name="fiveCents" value="0" size="10" onkeypress="return keyRestrict(event, 1);" onchange="goCalc('fiveCents');" /></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fiveCents_product"></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center"><b>TOTAL</b></td>
        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDF" align="right"><input type="text" id="totalAmount" name="totalAmount" class="number_fld" value="0" size="10" onkeypress="return keyRestrict(event, 18);"/></td>
    </tr>
</table>
</p>
</form>

<script>

function save()
{
	if (check_form('frmEntry')) {
		document.getElementById('frmEntry').submit();
	}
}

function goCalc(source)
{
	if (source=="thousands")
		multiplier = 1000;
	else if (source=="fivehundreds")
		multiplier = 500;
	else if (source=="twohundreds")
		multiplier = 200;
	else if (source=="hundreds")
		multiplier = 100;
	else if (source=="fiftys")
		multiplier = 50;
	else if (source=="twentys")
		multiplier = 20;
	else if (source=="tens")
		multiplier = 10;
	else if (source=="fives")
		multiplier = 5;
	else if (source=="ones")
		multiplier = 1;
	else if (source=="twentyfiveCents")
		multiplier = 0.25;
	else if (source=="tenCents")
		multiplier = 0.10;
	else if (source=="fiveCents")
		multiplier = 0.05;
		
	pcs = parseFloat($('#'+source).val());
	
	product = pcs * multiplier;
	document.getElementById(source+'_product').innerHTML = product.toFixed(2);
	
	// get the total amount
	totalAmount = 0;
	// thousands
	if ($('#thousands').val()) {
		totalAmount += parseFloat($('#thousands').val()) * 1000;
	}
	
	// fivehundreds
	if ($('#fivehundreds').val()) {
		totalAmount += parseFloat($('#fivehundreds').val()) * 500;
	}
	
	// fivehundreds
	if ($('#twohundreds').val()) {
		totalAmount += parseFloat($('#twohundreds').val()) * 200;
	}
	
	// hundreds
	if ($('#hundreds').val()) {
		totalAmount += parseFloat($('#hundreds').val()) * 100;
	}
	
	// fiftys
	if ($('#fiftys').val()) {
		totalAmount += parseFloat($('#fiftys').val()) * 50;
	}
	
	// twentys
	if ($('#twentys').val()) {
		totalAmount += parseFloat($('#twentys').val()) * 20;
	}
	
	// tens
	if ($('#tens').val()) {
		totalAmount += parseFloat($('#tens').val()) * 10;
	}
	
	// fives
	if ($('#fives').val()) {
		totalAmount += parseFloat($('#fives').val()) * 5;
	}
	
	// ones
	if ($('#ones').val()) {
		totalAmount += parseFloat($('#ones').val()) * 1;
	}
	
	// twentyfiveCents
	if ($('#twentyfiveCents').val()) {
		totalAmount += parseFloat($('#twentyfiveCents').val()) * 0.25;
	}
	
	// tenCents
	if ($('#tenCents').val()) {
		totalAmount += parseFloat($('#tenCents').val()) * 0.10;
	}
	
	// fiveCents
	if ($('#fiveCents').val()) {
		totalAmount += parseFloat($('#fiveCents').val()) * 0.05;
	}
	
	$('#totalAmount').val(totalAmount.toFixed(2));
}

</script>