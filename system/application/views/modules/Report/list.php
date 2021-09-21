<form name="frmFilter" id="frmFilter" method="POST" action="index.php?report/show">
<input type="hidden" id="sortby" name="sortby" value="<?php echo $sortby ?>" />
<input type="hidden" id="sortorder" name="sortorder" value="<?php echo $sortorder ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('date');" />Date 
		<?php 
		if ($sortby=="date") {
		?>
			<img 
			<?php 
			if ($sortby=="date") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('date');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('users.lastName');" />Cashier
		<?php 
		if ($sortby=="users.lastName") {
		?>
			<img 
			<?php 
			if ($sortby=="users.lastName") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('users.lastName');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">
		<a class="listViewThLinkS1" href="javascript: sorting('deposits1');" />Cash Deposits
		<?php 
		if ($sortby=="deposits1") {
		?>
			<img 
			<?php 
			if ($sortby=="deposits1") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('deposits1');" /> 
		<?php 
		}
		?>
		</a></div>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">
		<a class="listViewThLinkS1" href="javascript: sorting('checkDeposits');" />Check Deposits
		<?php 
		if ($sortby=="checkDeposits") {
		?>
			<img 
			<?php 
			if ($sortby=="checkDeposits") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('checkDeposits');" /> 
		<?php 
		}
		?>
		</a></div>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">
		<a class="listViewThLinkS1" href="javascript: sorting('ttlLess');" />Total Deposits
		<?php 
		if ($sortby=="ttlLess") {
		?>
			<img 
			<?php 
			if ($sortby=="ttlLess") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('ttlLess');" /> 
		<?php 
		}
		?>
		</a></div>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">
		<a class="listViewThLinkS1" href="javascript: sorting('cashier_reports.rstatus');" />Status
		<?php 
		if ($sortby=="cashier_reports.rstatus") {
		?>
			<img 
			<?php 
			if ($sortby=="cashier_reports.rstatus") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('cashier_reports.rstatus');" /> 
		<?php 
		}
		?>
		</a></div>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">
		<a class="listViewThLinkS1" href="#" />Details</a>
		</div>
		</td>
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<input type="text" name="fromdate" id="fromdate" maxlength="10" size="10" value="<?php if ($fromdate) echo date("m/d/Y",strtotime($fromdate)); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger1" align="top" alt="From Date" src="images/jscalendar.gif"/>
		<input type="text" name="todate" id="todate" maxlength="10" size="10" value="<?php if ($todate) echo date("m/d/Y",strtotime($todate)); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger2" align="top" alt="To Date" src="images/jscalendar.gif"/>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="cashier" id="cashier">
		<option value="">------------------------</option>
		<?php
		foreach ($cashiers->result() as $cashier) {
			if ($cashier == $cashier->userID)
				echo '<option value="'.$cashier->userID.'" selected>'.$cashier->lastName.', '.$cashier->firstName.'</option>';			
			else 
				echo '<option value="'.$cashier->userID.'">'.$cashier->lastName.', '.$cashier->firstName.'</option>';			
		}
		?>
		</select>
		</td>		
		<td scope="row" class="evenListRowS1" nowrap class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1" align="center">
		<select name="rstatus" id="rstatus">
		<option value="">--------------</option>
		<option value="0" <?php if ($rstatus=="0") echo "selected" ?> >Cancelled</option>
		<option value="1" <?php if ($rstatus==1) echo "selected" ?> >Pending</option>
		<option value="2" <?php if ($rstatus==2) echo "selected" ?> >Confirmed</option>
		
		</select>
		</td>	
		<td scope="row" class="evenListRowS1" nowrap class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap class="listViewPaginationTdS1">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	
	if (count($records)) {
		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$checks = 0;
		$totals = 0;
		foreach($records as $row) {
			$totalDeposits = $row['report']->deposits1+$row['report']->deposits2+$row['report']->deposits3+$row['report']->checkDeposits;
			
			$total1 += $row['report']->deposits1;
			$total2 += $row['report']->deposits2;
			$total3 += $row['report']->deposits3;
			$checks += $row['report']->checkDeposits;
			$totals += $totalDeposits;
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	       
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?report/view/<?php echo $row['report']->cashReportID ?>" class="listViewTdLinkS1"><?php echo date("m/d/Y",strtotime($row['report']->date)) ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" valign="top"><span sugar="sugar0b"><a href="index.php?report/view/<?php echo $row['report']->cashReportID ?>" class="listViewTdLinkS1"><?php echo $row['report']->lastName.", ".$row['report']->firstName ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><a href="index.php?report/view/<?php echo $row['report']->cashReportID ?>" class="listViewTdLinkS1"><?php echo number_format($row['report']->deposits1,2) ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><a href="index.php?report/view/<?php echo $row['report']->cashReportID ?>" class="listViewTdLinkS1"><?php echo number_format($row['report']->checkDeposits,2) ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><a href="index.php?report/view/<?php echo $row['report']->cashReportID ?>" class="listViewTdLinkS1"><?php echo number_format($totalDeposits,2) ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff"
    		align="center" valign="top"><span sugar="sugar0b"><a href="index.php?report/view/<?php echo $row['report']->cashReportID ?>" class="listViewTdLinkS1">
    		<?php 
    		if ($row['report']->rstatus==0){
    			echo '<font color="red">Cancelled</font>';
    		} else if ($row['report']->rstatus==1) {
    			echo "Pending";
    		} else if ($row['report']->rstatus==2) {
    			echo "Confirmed";
    		}
    		?>
    		</a></span></td>
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff"
    		align="center" valign="top">
    		<img id="deposit_img_<?php echo $row['report']->cashReportID ?>" src="images/advanced_search.gif" alt="Deposit Details"  style="cursor: pointer;" border="0" onclick="openDeposit('<?php echo $row['report']->cashReportID; ?>');" />
    		</td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff"
    		align="center" valign="top"><span sugar="sugar0b">&nbsp;</span></td>
    	</tr>
    	<tr>
    		<td colspan="8" class="oddListRowS1" align="right">
    			<div id="deposits_<?php echo $row['report']->cashReportID ?>" style="display:none">
    				<h4 class="dataLabel">&nbsp;&nbsp; <img src="images/submenu/account.gif" align="absmiddle" alt="Deposits" />&nbsp;Bank Deposits</h4>
					<table class="listView" border="0" cellpadding="0" cellspacing="0" width="98%" align="center">
					<tbody>
						<tr height="20">
							<td scope="col" class="listViewThS1" nowrap>Date</td>
							<td scope="col" class="listViewThS1" nowrap>No.</td>
							<td scope="col" class="listViewThS1" nowrap>Cut-off</td>
							<td scope="col" class="listViewThS1" nowrap>Type</td>
							<td scope="col" class="listViewThS1" nowrap>Bank</td>
							<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div></td>
						</tr>
						<tr>
							<td colspan="20" height="1" class="listViewHRS1"></td>
						</tr>
						
						<?php
						$totalAmount 	= 0;
						if ($row['deposits']->num_rows()) {
							foreach($row['deposits']->result() as $dep) {
								$totalAmount 	+= $dep->amount;
						?>
							<!-- Start of students Listing -->
					    	<tr height="20">
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo date("m/d/Y",strtotime($dep->date)) ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $dep->depositNo ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $dep->cutoff ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b">
					    		<?php 
					    		if ($dep->type==1)
					    			echo "Cash";
					    		else
					    			echo "Check";
					    		?>
					    		</span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><span sugar="sugar0b"><?php echo $dep->bank ?></span></td>
					    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><span sugar="sugar0b"><?php echo number_format($dep->amount,2) ?></span></td>
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
    			</div>
    		</td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		}
		?>
		<tr height="20">
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" colspan="2"
            align="right" valign="top"><span sugar="sugar0b"><b>TOTAL: </b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($total1,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($checks,2) ?></b></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="right" valign="top"><span sugar="sugar0b"><b><?php echo number_format($totals,2) ?></b></span></td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top">&nbsp;</td>
    		
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top">&nbsp;</td>
    	</tr>
		<?php
	} else {
	?>
    	<tr>
    		<td colspan="8" class="oddListRowS1">
            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tbody>
            	<tr>
            		<td nowrap="nowrap" align="center">
            		<b><i>No results found.</i></b>
            		</td>
            	</tr>
            	</tbody>
            	</table>
    		</td>
    	</tr>
	<?php
	}
	?>
	
	<tr>
		<td colspan="20" class="listViewHRS1"></td>
	</tr>
	<tr>
		<td height="20" scope="col" class="listViewThS1" colspan="2">
		<?php 
		$pagination = $this->pagination->create_links(); 
		
		if ($pagination) {
			echo "Page: ".$pagination."&nbsp;&nbsp;| &nbsp; ";			
		}
		
		echo "Total Records: $ttl_rows";
		?>
		</td>
		
		<td height="20" colspan="6" scope="col" align="right" class="listViewThS1">
		<div align="right">
		Number of Records 
		<select name="limit" id="limit" class="button" onchange="changeDisplay();">
        <option value="25" <?php if ($limit==25) echo "selected"; ?>>25</option>
        <option value="50" <?php if ($limit==50) echo "selected"; ?>>50</option>
        <option value="75" <?php if ($limit==75) echo "selected"; ?>>75</option>
        <option value="100" <?php if ($limit==100) echo "selected"; ?>>100</option>
        <option value="125" <?php if ($limit==125) echo "selected"; ?>>125</option>
        <option value="150" <?php if ($limit==150) echo "selected"; ?>>150</option>
        <option value="200" <?php if ($limit==200) echo "selected"; ?>>200</option>
        <option value="All" <?php if ($limit=="") echo "selected"; ?>>All</option>
        </select> 
		&nbsp;&nbsp;
		<input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Apply Filters"/>
		<input type="reset" class="button" name="cmdClear" id="cmdClear" value="Clear Filters" onclick="resetFilter();"/>	&nbsp;
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png" onclick="return popUp('index.php?report/printlist/<?php echo $this->uri->segment(3); ?>');"/>
		</div>
		</td>
		
		
	</tr>
</tbody>
</table>
</form>

<?php
calendarSetup('fromdate', 'jscal_trigger1');
calendarSetup('todate', 'jscal_trigger2');
?>

<script language="javascript">

function openDeposit(id)
{
    if (document.getElementById("deposit_img_"+id).src == base_url+'images/advanced_search.gif') {
		document.getElementById("deposit_img_"+id).src = 'images/basic_search.gif';	
		$("#deposits_"+id).show("slow");
	} else {
		document.getElementById("deposit_img_"+id).src = 'images/advanced_search.gif';	
		$("#deposits_"+id).hide("slow");
	}
}

function cashcount(id)
{
	URL = 'index.php?report/cashcount/view/'+id;
	popUp(URL);
}

function changeDisplay()
{
	document.getElementById('cmdFilter').value="Apply Filters";
	document.getElementById('frmFilter').submit();
}

function resetFilter()
{
	document.getElementById('fromdate').value	= "";
	document.getElementById('todate').value		= "";
	document.getElementById('cashier').value	= "";
	document.getElementById('rstatus').value	= "";
	document.getElementById('frmFilter').submit();
}

function sorting(fld)
{
	if (document.getElementById('sortby').value==fld) {
		if (document.getElementById('sortorder').value=="ASC") {
			document.getElementById('sortorder').value = "DESC";
		} else {
			document.getElementById('sortorder').value = "ASC";
		}
	} else {
		document.getElementById('sortby').value	   = fld;
		document.getElementById('sortorder').value = "ASC";
	}
	
	document.getElementById('frmFilter').submit();
}


function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=500,left = 0,top = 0');");
	return false;
}

<?php
if ($fromdate || $todate || $branchID || $userID || $rstatus) {
	echo "hideFilters('searchHandle');";	
}
?>

</script>