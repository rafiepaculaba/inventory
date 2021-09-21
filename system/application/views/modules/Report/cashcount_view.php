<form method="post" name="frmEntry" id="frmEntry" action="index.php?report/confirm_cashcount/<?php echo $cashcount->cashCountID ?>" >
<table width="100%" border="0">
  <tr>
    <td>
     <?php
        if ($rec->rstatus==1) {
        	?>
		    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Confirm  " onclick="save();" />
    <?php
        }
    ?>
		    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Close " onClick="window.close();" />
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
        } else if ($rec->rstatus==2) {
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
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->thousands; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="thousands_product"><?php echo number_format(($cashcount->thousands * 1000),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">500.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->fivehundreds; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fivehundreds_product"><?php echo number_format(($cashcount->fivehundreds * 500),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">200.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->twohundreds; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="twohundreds_product"><?php echo number_format(($cashcount->twohundreds * 200),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">100.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->hundreds; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="hundreds_product"><?php echo number_format(($cashcount->hundreds * 100),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">50.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->fiftys; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fiftys_product"><?php echo number_format(($cashcount->fiftys * 50),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">20.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->twentys; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="twentys_product"><?php echo number_format(($cashcount->twentys * 20),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">10.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->tens; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="tens_product"><?php echo number_format(($cashcount->tens * 10),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">5.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->fives; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fives_product"><?php echo number_format(($cashcount->fives * 5),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">1.00</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->ones; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="ones_product"><?php echo number_format(($cashcount->ones * 1),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">0.25</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->twentyfiveCents; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="twentyfiveCents_product"><?php echo number_format(($cashcount->twentyfiveCents * 0.25),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">0.10</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->tenCents; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="tenCents_product"><?php echo number_format(($cashcount->tenCents * 0.10),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">0.05</td>
        <td class="tabDetailViewDF" align="center"><slot><?php echo $cashcount->fiveCents; ?></slot></td>
        <td class="tabDetailViewDF" align="right"><div id="fiveCents_product"><?php echo number_format(($cashcount->fiveCents * 0.05),2) ?></div></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center"><b>TOTAL</b></td>
        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
        <td class="tabDetailViewDF" align="right"><?php echo number_format($cashcount->totalAmount,2); ?></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">&nbsp;</td>
        <td class="tabDetailViewDF" align="center">&nbsp;</td>
        <td class="tabDetailViewDF" align="right">&nbsp;</td>
    </tr>
    <?php
    if ($rec->rstatus == 1) {
    ?>
	   
	    <tr>
	        <td class="tabDetailViewDL" align="center"><b>CASH ON HAND PER REPORT</b></td>
	        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF" align="right"><input type="text" id="cashReported" name="cashReported" value="<?php echo number_format($rec->ttlCashLeft,2,".",""); ?>" size="10" onkeypress="return keyRestrict(event, 18);"/></td>
	    </tr>
	     <tr>
	        <td class="tabDetailViewDL" align="center"><b>CASH ON HAND PER COUNT<span class="required">&bull;</span></b></td>
	        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF" align="right"><input type="text" id="cashCounted" name="cashCounted" value="" size="10" onkeypress="return keyRestrict(event, 1);" onchange="recalc();"/></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" align="center"><b>CASH SHORT/OVER(-/+)</b></td>
	        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF" align="right"><input type="text" id="cashShortOver" name="cashShortOver" value="" size="10" onkeypress="return keyRestrict(event, 1);"/></td>
	    </tr>
    <?php
    } else if ($rec->rstatus == 2) {
    	?>
    	
	    <tr>
	        <td class="tabDetailViewDL" align="center"><b>CASH ON HAND PER REPORT</b></td>
	        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF" align="right"><input type="text" id="cashReported" name="cashReported" readonly value="<?php echo number_format($cashcount->cashReported,2); ?>" size="10" onkeypress="return keyRestrict(event, 1);"/></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" align="center"><b>CASH ON HAND PER COUNT</b></td>
	        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF" align="right"><input type="text" id="cashCounted" name="cashCounted" readonly value="<?php echo number_format($cashcount->cashCounted,2); ?>" size="10" onkeypress="return keyRestrict(event, 1);"/></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" align="center"><b>CASH SHORT/OVER(-/+)</b></td>
	        <td class="tabDetailViewDF" align="center"><slot>&nbsp;</slot></td>
	        <td class="tabDetailViewDF" align="right"><input type="text" id="cashShortOver" name="cashShortOver" readonly value="<?php echo number_format($cashcount->cashReported-$cashcount->cashCounted,2); ?>" size="10" onkeypress="return keyRestrict(event, 1);"/></td>
	    </tr>
    	<?php
    }
    ?>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
     <?php
        if ($rec->rstatus==1) {
        	?>
		    <input class="button" name="cmdSave" type="button" id="cmdSave" value="  Confirm  " onclick="save();" />
    <?php
        }
    ?>
		    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Close " onClick="window.close();" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Indicates required field</td>
  </tr>
</table> 

</form>

<script>

addToValidate('frmEntry','cashCounted', '', true, 'Cash on hand per count');

function recalc()
{
	cashReported = parseFloat($('#cashReported').val());
	cashCounted  = parseFloat($('#cashCounted').val());
	
	if (cashReported>0)
		cashShortOver =  cashCounted - cashReported;
	else
		cashShortOver =  cashCounted + cashReported;
	
	$('#cashShortOver').val(cashShortOver.toFixed(2))
}

function save()
{
	if (check_form('frmEntry')) {
		if (parseFloat($('#cashCounted').val())>0) {
			document.getElementById('frmEntry').submit();
		} else {
			reply=confirm("Confirm with zero(0) cash left!\nDo you want to continue?");
		    if (reply==true) {
		    	document.getElementById('frmEntry').submit();
		    } else {
		    	document.getElementById('cashCounted').focus();
		    }
		}
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