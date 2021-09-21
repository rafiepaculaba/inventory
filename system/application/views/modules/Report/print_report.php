
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
<h4 align="center"><u>Cashier's Report</u></h4>
<br>
</p>

<p>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	    <tr>
	        <td width="50%" valign="top">

				<p>
				<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
				        <th class="tabDetailViewDF" colspan="6" align="left"><h4 class="dataLabel">Cashier Report (
				        <?php
				        if ($rec->rstatus==1) {
				        	echo "Pending";
				        } else if ($rec->rstatus==2) {
				        	echo "Confirmed";
				        } else {
				        	echo "<font color='red'>Cancelled</font>";
				        }
				        ?>
				        )</h4></th>
				    </tr>
				     <tr>
				        <td class="tabDetailViewDL"><slot>Branch :</slot></td>
				        <td class="tabDetailViewDF"><slot><?php echo $rec->branchName; ?></slot></td>
				        <td class="tabDetailViewDL" ><slot>Cashier :</slot></td>
				        <td class="tabDetailViewDF"><slot><?php echo $rec->cashierName; ?></slot></td>
				        <td class="tabDetailViewDL" ><slot>Date :</slot></td>
				        <td class="tabDetailViewDF"><slot><?php echo date("m/d/Y",strtotime($rec->date)); ?></slot></td>
				    </tr>
				</table>
				<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
				        <th class="tabDetailViewDF" colspan="4" align="left"><h4 class="dataLabel">Change Fund: (Beginning)</h4></th>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>Cash Reserved</slot></td>
				        <td class="tabDetailViewDF" align="right" width="100"><slot><?php echo number_format($rec->begCashReserved,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right" width="100"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL"><slot>Cash Drawer</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->begCashDrawer,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->changeFund,2) ?></slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <th class="tabDetailViewDF" colspan="4" align="left"><h4 class="dataLabel">Add: Collections</h4></th>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>Cash Sales</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->sales,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>Check Payments</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->checks,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>Customer's Accounts</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->collections,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL"><slot>Eload</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->eloads,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->ttlCollections,2) ?></slot></td>
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
				        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format(($rec->changeFund+$rec->ttlCollections),2) ?></b></slot></td>
				        <th class="tabDetailViewDF" align="right">&nbsp;</th>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>Less: Cash Deposit</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->deposits1,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check Deposit</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->checkDeposits,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Encashments</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->encashments,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disbursements</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->disbursements,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->ttlLess,2) ?></slot></td>
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
				        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($rec->ttlCashLeft,2) ?></b></slot></td>
				        <th class="tabDetailViewDF" align="right">&nbsp;</th>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL" width="130"><slot>Cash Reserved</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->endCashReserved,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right" width="100"><slot>&nbsp;</slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				    <tr>
				        <td class="tabDetailViewDL"><slot>Cash Drawer</slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->endCashDrawer,2) ?></slot></td>
				        <td class="tabDetailViewDF" align="right"><slot><?php echo number_format($rec->ttlCashLeft,2) ?></slot></td>
				        <td class="tabDetailViewDF"><slot>&nbsp;</slot></td>
				    </tr>
				</table>
				</p>
				
				<h4><img src="images/submenu/cash_drawer.gif" alt="Cash Count" align="absmiddle" /> Cash count on total cash left</h4>
				<table class="listView" border="0" cellpadding="0" cellspacing="0" width="90%">
				<tbody>
					<tr height="20">
						<td scope="col" class="listViewThS1" nowrap><div align="center">Denomination</div></td>
						<td scope="col" class="listViewThS1" nowrap><div align="center">No. of Pcs.</div></td>
						<td scope="col" class="listViewThS1" nowrap><div align="center">Amount</div></td>
					</tr>
					<tr>
						<td colspan="20" height="1" class="listViewHRS1"></td>
					</tr>
					<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">1,000.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->thousands; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->thousands * 1000),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">500.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->fivehundreds; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->fivehundreds * 500),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">200.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->twohundreds; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->twohundreds * 200),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">100.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->hundreds; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->hundreds * 100),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">50.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->fiftys; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->fiftys * 50),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">20.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->twentys; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->twentys * 20),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">10.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->tens; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->tens * 10),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">5.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->fives; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->fives * 5),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">1.00</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->ones; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->ones * 1),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">0.25</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->twentyfiveCents; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->twentyfiveCents * 0.25),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">0.10</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->tenCents; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->tenCents * 0.10),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><span sugar="sugar0b">0.05</span></td>
			    		
			    		<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" 
			            align="center" valign="top"><?php echo $cashcount->fiveCents; ?></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><?php echo number_format(($cashcount->fiveCents * 0.10),2) ?></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" colspan="2"
			            align="left" valign="top"><b>CASH ON HAND PER REPORT</b></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><b><?php echo number_format($cashcount->cashReported,2); ?></b></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" colspan="2"
			            align="left" valign="top"><b>CASH ON HAND PER COUNT</b></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><b><?php echo number_format($cashcount->cashCounted,2); ?></b></td>
		    		</tr>
		    		<tr><td colspan="20" height="1" class="listViewHRS1"></td></tr>
		    		<tr height="20">
						<td scope="row" 
			            class="oddListRowS1" bgcolor="#ffffff" colspan="2"
			            align="left" valign="top"><b>CASH <font color="red">SHORT</font>/OVER(<font color="red">-</font>/+)</b></td>
			    		
			    		<td scope="row"
			            class="oddListRowS1" bgcolor="#ffffff" 
			    		align="center" valign="top"><b>
			    		
			    		
			    		<?php 
			    		
			    		$cleft = $cashcount->cashCounted - $cashcount->cashReported;
			    		
			    		if ($cleft<0) {
			    			echo '<font color="red">';
				    		echo number_format(abs($cleft),2); 
				    		echo '</font>';
			    		} else {
				    		echo number_format($cleft,2); 
			    		}
			    		
			    		?>
			    		
			    		</b></td>
		    		</tr>
				</table>
				
				
				
				
				
	        </td>
	        <td width="50%" valign="top" align="center">
				<h4 class="dataLabel">&nbsp;&nbsp; <img src="images/submenu/account.gif" align="absmiddle" alt="Deposits" />&nbsp;Cash Deposits</h4>
			<table class="listView" border="0" cellpadding="0" cellspacing="0" width="98%" align="center">
			<tbody>
				<tr height="20">
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
			            class="oddListRowS1" bgcolor="#ffffff" colspan=4
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
					            class="oddListRowS1" bgcolor="#ffffff" colspan="4"
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
   </p>