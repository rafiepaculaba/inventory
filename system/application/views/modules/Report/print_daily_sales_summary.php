
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
	<h4 align="center"><u>Daily Sales Summary</u></h4>
	<br>
	</p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="tabDetailViewDL"><slot>Branch :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $branchName; ?> &nbsp;</b></slot></td>
        <td class="tabDetailViewDL"><slot>Date :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $date; ?></b>&nbsp;</slot></td>
    </tr>
</table>

<?php if (!empty($daquets)) {?>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr height="20">
				<td scope="col" class="listViewThS1" nowrap>&nbsp; </td>
				<?php 
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						echo '<td scope="col" class="listViewThS1" nowrap><div align="center">';
						if ($staff->gender=='M')
							echo "MR. ";
						else
							echo "MS. ";
						echo strtoupper($staff->fname).'</div></td>';
					}
					
				}
				?>
			</tr>
			<tr height="20">
				<td scope="col" class="oddListRowS1" nowrap>&nbsp; </td>
				<?php 
				
				if ($staffs->num_rows()) {
					$total=array();
					$total_charges=array();
					$ttl_r=array();
					$ttl_t=array();
					$ttl_x=array();
					$ttl_clients=array();
					foreach($staffs->result() as $staff) {
						$total[$staff->staffID] = 0;
						$total_charges[$staff->staffID] = 0;
						$ttl_r[$staff->staffID] = 0;
						$ttl_t[$staff->staffID] = 0;
						$ttl_x[$staff->staffID] = 0;
						$ttl_clients[$staff->staffID] = 0;
						echo '<td scope="col" nowrap valign="top">';
						if ($daquets[$staff->staffID]['daquets']->num_rows()) {
							echo '<table  border="0" cellpadding="0" cellspacing="0" width="100%">';
							echo '<tr><td scope="col" class="listViewThS1" nowrap><div align="center">Daquet No.</div></td>
									<td scope="col" class="listViewThS1" nowrap><div align="center">Amount</div></td></tr>';
							foreach($daquets[$staff->staffID]['daquets']->result() as $row) {
								$total[$staff->staffID] += $row->amount;
								$total_charges[$staff->staffID] += $row->charge;
								$ttl_clients[$staff->staffID]++;
								
								switch($row->type) {
									case 'R':
										$ttl_r[$staff->staffID]++;
										break;
									case 'T':
										$ttl_t[$staff->staffID]++;
										break;
									case 'X':
										$ttl_x[$staff->staffID]++;
										break;
								}
								
								echo '<tr onmouseover="setPointer(this, \'0\', \'over\', \'#ffffff\', \'#ebebed\', \'\');" onmouseout="setPointer(this, \'1\', \'out\', \'#ffffff\', \'#ebebed\', \'\');" onmousedown="setPointer(this, \'0\', \'click\', \'#ffffff\', \'#ebebed\', \'\');" height="20">';
								echo '<td scope="row" 
						            class="oddListRowS1" bgcolor="#ffffff" 
						            align="center" valign="top">'.$row->daquetNo.'</td>';
								echo '<td scope="row" 
						            class="oddListRowS1" bgcolor="#ffffff" 
						            align="center" valign="top">'.number_format($row->amount,2).'</td>';
								echo '</tr>';
								echo '
									<tr>
										<td colspan="2" height="1" class="listViewHRS1"></td>
									</tr>
									';
							}
							echo '</table>';
						}
						echo '</td>';
					}
				}
				
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>NET : </b></td>
				<?php 
				$ttl_net = 0;
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						$tax = $total[$staff->staffID]/1.12 * 0.12;
						$net = $total[$staff->staffID] - $tax - $total_charges[$staff->staffID];
						$ttl_net += $net;
						echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($net,2).'</b></td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>TAX : </b></td>
				<?php 
				$ttl_tax = 0;
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						$tax = $total[$staff->staffID]/1.12 * 0.12;
						$ttl_tax += $tax;
						echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($tax,2).'</b></td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>SERVICE CHANGES : </b></td>
				<?php 
				$ttl_sc = 0;
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						$ttl_sc += $total_charges[$staff->staffID];
						echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($total_charges[$staff->staffID],2).'</b></td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>GROSS : </b></td>
				<?php 
				$ttl_gross = 0;
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						$ttl_gross += $total[$staff->staffID];
						echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($total[$staff->staffID],2).'</b></td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" colspan="20" class="oddListRowS1" nowrap></td>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>TOTAL CLIENTS : </b></td>
				<?php 
				$total_clients = 0;
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						$total_clients += $ttl_clients[$staff->staffID];
						echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($ttl_clients[$staff->staffID],0).'</b></td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>Regular :</b></td>
				<?php 
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						if ($ttl_r[$staff->staffID])
							echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($ttl_r[$staff->staffID],0).'</b></td>';
						else
							echo '<td scope="row" class="oddListRowS1" nowrap align="center">&nbsp;</td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>Transfer : </b></td>
				<?php 
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						if ($ttl_t[$staff->staffID])
							echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($ttl_t[$staff->staffID],0).'</b></td>';
						else
							echo '<td scope="row" class="oddListRowS1" nowrap align="center">&nbsp;</td>';
					}
				}
				?>
			</tr>
			<tr>
				<td colspan="20" class="listViewHRS1" height="1"></td>
			</tr>
			<tr height="20">
				<td scope="row" class="oddListRowS1" nowrap><b>New : </b></td>
				<?php 
				if ($staffs->num_rows()) {
					foreach($staffs->result() as $staff) {
						if ($ttl_x[$staff->staffID])
							echo '<td scope="row" class="oddListRowS1" nowrap align="center"><b>'.number_format($ttl_x[$staff->staffID],0).'</b></td>';
						else
							echo '<td scope="row" class="oddListRowS1" nowrap align="center">&nbsp;</td>';
					}
				}
				?>
			</tr>
		</tbody>
		</table>
	</td>
	<td width="50%" valign="top">
		<h4 class="dataLabel"><center>Product Sales </center></h4>
		<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr height="20">
				<td scope="col" class="listViewThS1" nowrap>Product Name</td>
				<td scope="col" class="listViewThS1" nowrap>Qty</td>
				<td scope="col" class="listViewThS1" nowrap><div align="right">Price</div></td>
				<td scope="col" class="listViewThS1" nowrap><div align="right">Amount</div> </td>
				<td scope="col" class="listViewThS1" nowrap><div align="right">C/O</div></td>
			</tr>
		<?php
		if ($otc->num_rows()) {
			$rate = $this->config_model->getConfig('OTC Commission');
			$total_ps = 0;
			$total_co = 0;
		foreach($otc->result() as $row) {
			$total_ps += $row->net;
			$total_co += $row->net * ($rate/100);
		?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	       
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo $row->prodDesc ?></span></td>
            
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo $row->qty ?></span></td>
            
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo number_format($row->price,2) ?></span></td>
            
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo number_format($row->net,2) ?></span></td>
            
            <td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><?php echo number_format($row->net * ($rate/100),2) ?></span></td>
    		
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
	            class="oddListRowS1" bgcolor="#ffffff" 
	            align="left" valign="top" colspan="3"><span sugar="sugar0b"><b>TOTAL : </b></span></td>
	            
	            <td scope="row" 
	            class="oddListRowS1" bgcolor="#ffffff" 
	            align="left" valign="top"><span sugar="sugar0b"><b><?php echo number_format($total_ps,2) ?></b></span></td>
	            
	            <td scope="row" 
	            class="oddListRowS1" bgcolor="#ffffff" 
	            align="left" valign="top"><span sugar="sugar0b"><b><?php echo number_format($total_co,2) ?></b></span></td>
	    		
	    	</tr>
			
			<?php 
			
		}
		?>
		</tbody>
		</table>
		<br></br>
		<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
		     <th class="tabDetailViewDL" colspan="4" align="left"><h4 class="dataLabel">Cash Summary </h4></th>
		</tr>
		<tr>
	        <td class="tabDetailViewDL" width="100"><slot>Total Net </slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($ttl_net,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>Total Tax </slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($ttl_tax,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>Total SC </slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($ttl_sc,2) ?></b></slot></td>
	    </tr>
	     <tr>
	        <td class="tabDetailViewDL" width="100"><slot></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>-------------------------------------</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>Total Gross </slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($ttl_gross,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>Total PS </slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($total_ps,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>-------------------------------------</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="110"><slot><b>Total Gross Sales :</b></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($ttl_gross+$total_ps,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>Less</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>&nbsp;&nbsp;&nbsp;PS Commission</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($total_co,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>&nbsp;&nbsp;&nbsp;Service Charges</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($ttl_sc,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot>&nbsp;&nbsp;&nbsp;Petty Cash</slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($petty,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot><b>Total Less</b></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format($total_co+$ttl_sc+$petty,2) ?></b></slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="100"><slot></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot>=====================</slot></td>
	    </tr>
	    <tr>
	        <td class="tabDetailViewDL" width="110"><slot><b>Total Net Sales :</b></slot></td>
	        <td class="tabDetailViewDF" align="right"><slot><b><?php echo number_format(($ttl_gross+$total_ps)-($total_co+$ttl_sc+$petty),2) ?></slot></td>
	    </tr>
	    </table>
	</td>
</tr>
</table>
<?php
}
?>