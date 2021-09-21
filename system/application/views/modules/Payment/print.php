
<p>
<table  width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="center" colspan="6">
		<slot>
		<font size="2"><b><?php echo $company ?></b></font>
		<br/>
		<?php echo $address ?>
		</slot>
	</td>
</tr>
</table>
<h4 align="center"><u>Official Receipt</u></h4>
<br>
</p>

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <td class="tabDetailViewDL" width="100"><slot>Branch :</slot></td>
        <td class="tabDetailViewDF" width="40%"><slot><b>
        <?php
        	echo $this->config_model->getConfig("Branch ".$rec->branchID);
        ?></b>
        </slot></td>
        
        <td class="tabDetailViewDL" width="150"><slot>OR No :</slot></td>
        <td class="tabDetailViewDF">
        <slot><b><?php echo $rec->orNo; ?></b> </slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Customer :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $rec->name; ?></b></slot></td>
        
        <td class="tabDetailViewDL"><slot>Date :</slot></td>
		<td class="tabDetailViewDF"><slot><b><?php echo date("m/d/Y g:i:s A",strtotime($rec->orDate)); ?></b> </slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>OR Method :</slot></td>
        <td class="tabDetailViewDF"><slot><b>
        <?php if ($rec->orMethod=="Check") {
        	echo "Check";
        } elseif ($rec->orMethod=="cc") {
        	echo "Credit Card";
        } else {
        	echo "Cash";
        }
        
        ?>
        </b></slot></td>
        
        <td class="tabDetailViewDL"><slot>Sales Rep :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $rec->staffname; ?></b></slot></td>
    </tr>
</table>
</p>

<?php if ($rec->orMethod=="cc") { ?>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
		 <tr>
		     <th class="tabDetailViewDL" colspan="8" align="left"><h4 class="dataLabel">Credit Card Details </h4></th>
		 </tr>
     	<tr>
	        <td class="tabDetailViewDL" width="12%"><slot>Credit Card No :</slot></td>
	        <td class="tabDetailViewDF" width="14%"><slot><?php echo $rec->ccNo; ?></slot></td>
	        
	        <td class="tabDetailViewDL" width="12%"><slot>Card Holder :</slot></td>
	        <td class="tabDetailViewDF" width="14%"><slot><?php echo $rec->ccName; ?></slot></td>
	        
	        <td class="tabDetailViewDL" width="12%"><slot>Card Type :</slot></td>
	        <td class="tabDetailViewDF" width="14%"><slot>
	        <?php if ($rec->ccType=="Master"){
	        	echo "Master Card";
	        } elseif ($rec->ccType=="Visa") {
	        	echo "Visa";
	        } elseif ($rec->ccType=="HSBC") {
	        	echo "HSBC";
	        }
	        ?></slot></td>
	        
	        <td class="tabDetailViewDL" width="12%"><slot>Expiry Date :</slot></td>
	        <td class="tabDetailViewDF"><?php echo date("m/d/Y",strtotime($rec->ccExpiryDate)) ?> &nbsp;</td>
	    </tr>
</table>
<?php } else if ($rec->orMethod=="Check") { ?>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	 <tr>
		     <th class="tabDetailViewDL" colspan="6" align="left"><h4 class="dataLabel">Check Details </h4></th>
		 </tr>
     	<tr>
	        <td class="tabDetailViewDL" width="120"><slot>Check No. :</slot></td>
	        <td class="tabDetailViewDF"><slot><?php echo $rec->checkNo; ?></slot></td>
	        
	        <td class="tabDetailViewDL" width="120"><slot>Account Name :</slot></td>
	        <td class="tabDetailViewDF"><slot><?php echo $rec->ccName; ?></slot></td>
	        
	      	<td class="tabDetailViewDL" width="120"><slot>Bank Name :</slot></td>
	        <td class="tabDetailViewDF"><slot><?php echo $rec->bank; ?></slot></td>
	    </tr>
</table>
<?php } ?>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>Code</td>
		<td scope="col" class="listViewThS1" nowrap>Description</td>
		<td scope="col" class="listViewThS1" nowrap>Quantity</td>
		<td scope="col" class="listViewThS1" nowrap>Unit</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Price</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Discount</div></td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">Net</div></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	$total = 0;
	$discount = 0;
	$total_net = 0;
	if (!empty($rec->details)) {
		$ctr = 0;
		foreach($rec->details->result() as $row) {
			$amount = $row->qty * $row->price;
			$net = $amount - $row->discount;
			$total_net += $net;
			$discount += $row->discount;
			$total += $amount;
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    		
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $row->prodCode ?></td>
    		
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $row->prodDesc ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $row->qty ?></td>
            
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><?php echo $row->umsr ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><?php echo number_format($row->price,2) ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><?php echo number_format($amount,2) ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><?php echo number_format($row->discount,2) ?></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="right" valign="top"><?php echo number_format($net,2) ?></td>
    		
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
		<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
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
        align="right" valign="top"><b>TOTAL</b></td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="right" valign="top"><b><?php echo number_format($total,2); ?></b></td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="right" valign="top"><b><?php echo number_format($discount,2); ?></b></td>
		
		<td scope="row" 
        class="oddListRowS1" bgcolor="#ffffff" 
        align="right" valign="top"><b><?php echo number_format($total_net,2); ?></b></td>
		   
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
</tbody>
</table>

<br>
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<?php if ($rec->rstatus ==1) { ?>
	 <tr>
        <td class="tabDetailViewDL" width="100"><slot>Encoded By :</slot></td>
        <td class="tabDetailViewDF" width="40%"><slot><b><?php echo $rec->encodedName; ?></b></slot></td>
   
 		<td class="tabDetailViewDL" width="100"><slot>Confirmed By :</slot></td>
        <td class="tabDetailViewDF"><slot>_____________________</slot></td>
     <?php } ?>
     </tr>
    
     <?php if ($rec->rstatus ==0) { ?>
      <tr>
        <td class="tabDetailViewDL" width="100"><slot>Void By :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $rec->voidName; ?></b></slot></td>
        
        <td class="tabDetailViewDL" width="40%"><slot>Date Void :</slot></td>
		<td class="tabDetailViewDF"><slot><b><?php echo date("m/d/Y g:i:s A",strtotime($rec->dateVoid)); ?></b> </slot></td>
	</tr> 
	<tr>		
        <td class="tabDetailViewDL"><slot>Void Reason :</slot></td>
        <td class="tabDetailViewDF" colspan="3"><slot><b><?php echo $rec->voidReason; ?></b></slot></td>
	</tr>
    <?php } ?>
    
</table>
</p>
<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete this delivery receipt?");
    
    if (reply==true)
        window.location='index.php?dr/delete/'+id;
}

function confirmRecord(id)
{
    reply=confirm("Do you really want to confirm this delivery receipt?");
    
    if (reply==true)
        window.location='index.php?dr/confirm/'+id;
}

function cancelRecord(id)
{
    reply=confirm("Do you really want to cancel this delivery receipt?");
    
    if (reply==true)
        window.location='index.php?dr/cancel/'+id;
}

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=500,left = 0,top = 0');");
	return false;
}

</script>