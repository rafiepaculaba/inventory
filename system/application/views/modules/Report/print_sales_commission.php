
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
	<h4 align="center"><u>Sales Commission</u></h4>
	<br>
	</p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="tabDetailViewDL"><slot>Branch :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php echo $branchName; ?> &nbsp;</b></slot></td>
        <td class="tabDetailViewDL"><slot>Period :</slot></td>
        <td class="tabDetailViewDF"><slot><b><?php 
		switch($month) {
			case '01':
				echo "January";
				break;
			case '02':
				echo "February";
				break;
			case '03':
				echo "March";
				break;
			case '04':
				echo "April";
				break;
			case '05':
				echo "May";
				break;
			case '06':
				echo "June";
				break;
			case '07':
				echo "July";
				break;
			case '08':
				echo "August";
				break;
			case '09':
				echo "September";
				break;
			case '10':
				echo "October";
				break;
			case '11':
				echo "November";
				break;
			case '12':
				echo "December";
				break;
		}
		
			echo ", $year";
        ?> </b>&nbsp;</slot></td>
    </tr>
</table>

<?php if (!empty($result)) {?>
	<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr height="20">
			<td scope="col" class="listViewThS1" nowrap>&nbsp; </td>
			<?php 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					echo '<td scope="col" class="listViewThS1" nowrap><div align="right">';
					if ($staff->gender=='M')
						echo "MR. ";
					else
						echo "MS. ";
					echo strtoupper($staff->fname).'</div></td>';
				}
				
			}
			
			?>
			<td scope="col" class="listViewThS1" nowrap><div align="right">TOTAL</div> </td>
		</tr>
		
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">GROSS TAKINGS</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['gross'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['gross'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Less: 12% VAT</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['vat'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['vat'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">NET GROSS TAKINGS</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['net_gross'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['net_gross'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Less: Salon Share(20%)</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['share'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['share'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
		
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">NET TAKINGS</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['net_takings'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['net_takings'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Less: Two(2) Month Salary</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['salary'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['salary'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">BASIS FOR COMMISSION</td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['basis'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['basis'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top">Rate of Commission</td>
    		<?php
    		 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['rate'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['rate'][$staff->staffID],1); ?>%</td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top">&nbsp;</td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
    	
    	<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top"><b>COMMISSION</b></td>
    		<?php
    		$total = 0; 
			if ($staffs->num_rows()) {
				foreach($staffs->result() as $staff) {
					$total += $result['commission'][$staff->staffID];
					?>
					<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($result['commission'][$staff->staffID],2); ?></td>
					<?php 
				}
			}
			?>
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="right" valign="top"><?php echo number_format($total,2); ?></td>
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	
		<tr>
			<td colspan="20" class="listViewHRS1"></td>
		</tr>
	</tbody>
	</table>
	<br>
<?php
}
?>