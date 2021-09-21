
<h4 align="center"><u>Political Tags</u></h4>
<br>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr height="20">
	<td scope="col" class="listViewThS1" nowrap width="100" rowspan="2">OFFICE</td>
	<?php 
	$parties = explode(",",$this->config_model->getConfig('Political Party'));
	$total 	 = array();
	
	if ($status->num_rows()) {
		foreach($status->result() as $stat) {
			if (count($parties)) {
				foreach($parties as $party) {
					$total[$stat->empStatusID][trim($party)] = 0;
					$total['total'][trim($party)] = 0;
				}
			}
			?>
			<td scope="col" class="listViewThS1" nowrap colspan="<?php echo (count($parties)) ?>"><div align="center"><?php echo strtoupper($stat->type) ?></div></td>
			<?php 
		}
	}
	?>
	<td scope="col" class="listViewThS1" nowrap width="100" colspan="<?php echo (count($parties)) ?>"><div align="center">TOTAL</div></td>
</tr>
<tr height="20">
	<?php 
	$administrationParty = $this->config_model->getConfig('Administration Party');
	$neutralEmployee 	 = $this->config_model->getConfig('Neutral Employee');
	
	if ($status->num_rows()) {
		foreach($status->result() as $stat) {
			if (count($parties)) {
				foreach($parties as $party) {
			?>
				<td scope="col" class="listViewThS1" nowrap><div align="center">
				<?php if ($party==$administrationParty) { ?>
			    	<font color="green"><?php echo strtoupper(trim($party)) ?></font>
			    <?php } elseif ($party==$neutralEmployee) { ?>	
			    	<font color="black"><?php echo strtoupper(trim($party)) ?></font>
				<?php } else { ?>
					<font color="red"><?php echo strtoupper(trim($party)) ?></font>
				<?php } ?>
				</div></td>
			<?php
				}
			} 
		}
	}
	?>
	
	<?php 
	if (count($parties)) {
		foreach($parties as $party) {
	?>
		<td scope="col" class="listViewThS1" nowrap><div align="center">
		<?php if ($party==$administrationParty) { ?>
	    	<font color="green"><?php echo strtoupper(trim($party)) ?></font>
	    <?php } elseif ($party==$neutralEmployee) { ?>	
	    	<font color="black"><?php echo strtoupper(trim($party)) ?></font>
		<?php } else { ?>
			<font color="red"><?php echo strtoupper(trim($party)) ?></font>
		<?php } ?>
		</div></td>
	<?php
		}
	} 
	?>
</tr>
<tr>
	<td colspan="<?php echo (4+(count($parties) * $status->num_rows())) ?>" height="1" class="listViewHRS1"></td>
</tr>

<?php 
if (count($political)) {
	foreach($political as $pol) { 
	?>
		<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" bgcolor="#fdfdfd" valign="top"><?php echo $pol['office'] ?></td>
		<?php 
			if ($status->num_rows()) {
				foreach($status->result() as $stat) {
					if (count($parties)) {
						foreach($parties as $party) {
							?>							
							<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top">
							<?php if ($party==$administrationParty) { ?>
						    	<font color="green"><?php echo number_format($pol[$stat->empStatusID][trim($party)],0) ?></font>
						    <?php } elseif ($party==$neutralEmployee) { ?>	
						    	<font color="black"><?php echo number_format($pol[$stat->empStatusID][trim($party)],0) ?></font>
							<?php } else { ?>
								<font color="red"><?php echo number_format($pol[$stat->empStatusID][trim($party)],0) ?></font>
							<?php } ?>
							</td>
							<?php 
							$total[$stat->empStatusID][trim($party)] += $pol[$stat->empStatusID][trim($party)];
							$total['total'][trim($party)] += $pol[$stat->empStatusID][trim($party)];
						}
					}
				}
			}
			
			if (count($parties)) {
				foreach($parties as $party) {
			?>
				<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top">
				<?php if ($party==$administrationParty) { ?>
			    	<font color="green"><?php echo number_format($pol['total'][trim($party)],0) ?></font>
			    <?php } elseif ($party==$neutralEmployee) { ?>	
			    	<font color="black"><?php echo number_format($pol['total'][trim($party)],0) ?></font>
				<?php } else { ?>
					<font color="red"><?php echo number_format($pol['total'][trim($party)],0) ?></font>
				<?php } ?>
				</td>
			<?php
				}
			} 
			?>
		</tr>
		<tr>
			<td colspan="<?php echo (4+(3*$status->num_rows())) ?>" height="1" class="listViewHRS1"></td>
		</tr>
		<?php 
	}
	?>
		<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
			<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" bgcolor="#fdfdfd" valign="top"><b>GRAND TOTAL</b></td>
			<?php 
			if ($status->num_rows()) {
				foreach($status->result() as $stat) {
					if (count($parties)) {
						foreach($parties as $party) {
					?>
						<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b>
						
						<?php if ($party==$administrationParty) { ?>
					    	<font color="green"><?php echo number_format($total[$stat->empStatusID][trim($party)],0) ?></font>
					    <?php } elseif ($party==$neutralEmployee) { ?>	
					    	<font color="black"><?php echo number_format($total[$stat->empStatusID][trim($party)],0) ?></font>
						<?php } else { ?>
							<font color="red"><?php echo number_format($total[$stat->empStatusID][trim($party)],0) ?></font>
						<?php } ?>
						
						</b></td>
					<?php
						}
					} 
				}
			}
			
			if (count($parties)) {
				foreach($parties as $party) {
			?>
				<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" bgcolor="#fdfdfd" valign="top"><b>
				<?php if ($party==$administrationParty) { ?>
			    	<font color="green"><?php echo number_format($total['total'][trim($party)],0) ?></font>
			    <?php } elseif ($party==$neutralEmployee) { ?>	
			    	<font color="black"><?php echo number_format($total['total'][trim($party)],0) ?></font>
				<?php } else { ?>
					<font color="red"><?php echo number_format($total['total'][trim($party)],0) ?></font>
				<?php } ?>
				</b></td>
				<?php 
				}
			}
			?>
		</tr>
	<?php 
}
?>

</tbody>
</table>