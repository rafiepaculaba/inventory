
<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
<tr>
    <td align="left" valign="top">
		<h3><img src="images/candidates.gif" alt="Political Party" border="0" align="top">&nbsp;&nbsp;<?php echo $this->config_model->getConfig('Political Party'); ?> Lineup</h3>
		<table border="0" cellpadding="0" cellspacing="0"  width="95%">
		<tr>
		    <td>
			    <table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td scope="col" class="listViewThS1" nowrap>Candidate</td>
						<td scope="col" class="listViewThS1" nowrap>Position</td>
					</tr>
					<tr>
						<td colspan="20" height="1" class="listViewHRS1"></td>
					</tr>
					<?php
					if ($lineup->num_rows()) {
						$no_major_candidates = $this->config_model->getConfig('Major Candidates');
						foreach($lineup->result() as $row) {
					?>
						<tr>
							<?php
							if ($row->postID<=$no_major_candidates) {
							?>
					    		<td scope="row" 
					            class="oddListRowS1" bgcolor="#ffffff" 
					            align="left" valign="top"><b><?php echo $row->name ?></b></td>
					    		
					    		<td scope="row" 
					            class="oddListRowS1" bgcolor="#ffffff" 
					            align="left" valign="top"><b><?php echo $row->position ?></b></td>
				    		<?php
							} else {
							?>
								<td scope="row" 
					            class="oddListRowS1" bgcolor="#ffffff" 
					            align="left" valign="top"><?php echo $row->name ?></td>
					    		
					    		<td scope="row" 
					            class="oddListRowS1" bgcolor="#ffffff" 
					            align="left" valign="top"><?php echo $row->position ?></td>
							<?php
							}
							?>
			    		</tr>
			    		<tr>
							<td colspan="20" height="1" class="listViewHRS1"></td>
						</tr>
					<?php
						}
					}
					?>
				</tbody>
				</table>    
			    
				<h3><img src="images/politics.gif" alt="Politics" border="0" align="top">&nbsp;&nbsp;No. of Candidates/Position</h3>
			    <table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td scope="col" class="listViewThS1" nowrap>Position</td>
						<td scope="col" class="listViewThS1" nowrap><div align="center">No. of Candidates</div></td>
					</tr>
					<tr>
						<td colspan="20" height="1" class="listViewHRS1"></td>
					</tr>
					<?php
					if (count($position_candidates)) {
						foreach($position_candidates as $row) {
					?>
						<tr>
				    		<td scope="row" 
				            class="oddListRowS1" bgcolor="#ffffff" 
				            align="left" valign="top"><?php echo $row['position'] ?></td>
				    		
				    		<td scope="row" 
				            class="oddListRowS1" bgcolor="#ffffff" 
				            align="center" valign="top"><?php echo $row['count'] ?></td>
			    		</tr>
			    		<tr>
							<td colspan="20" height="1" class="listViewHRS1"></td>
						</tr>
					<?php
						}
					}
					?>
				</tbody>
				</table>
				
				<!--age groupings-->
				<h3><img src="images/precinct.gif" alt="Statistics" border="0" align="top">&nbsp;Breakdown by Age Grouping</h3>
		        <table class="tabDetailView" border="0" cellpadding="0" cellspacing="0"  width="100%">
		        <?php
		        if (count($agegroups)) {
					foreach ($agegroups as $group) {
		        ?>
			        <tr>
			            <td class="tabDetailViewDL" width="180">Total Reg. Voters Ages <?php echo $group['group'] ?>:  </td>
			            <td class="tabDetailViewDF"><slot><b><?php echo number_format($group['voters'],0) ?></b></slot></td>
				        </tr>
		        <?php
					}
		        }
				?>
		        </table>
		        <table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
				<tr><td>
				<iframe frameborder="0" height="200" width="100%" src="index.php?dashboard/showGrouping" scrolling="No"></iframe>
				</td></tr>
				</tbody>
				</table>
				  
		    </td>
		</tr>
		</table>
	</td>
	<td align="left" valign="top">
		<h3><img src="images/demographic.gif" alt="Statistics" border="0" align="top">&nbsp;Political Location</h3>
    	<?php
    	switch (trim($this->config_model->getConfig('Political Position'))) {
    		case 'GOVERNOR':
    			?>
    			<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0"  width="95%">
		        <tr>
		            <td class="tabDetailViewDL" width="200">Province :  </td>
		            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo strtoupper($this->config_model->getConfig('Province')); ?></b></slot></td>
		        </tr>
		        </table>
    			<?php
    			break;
    		case 'CONGRESSMAN':
    			?>
    			<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0"  width="95%">
		        <tr>
		            <td class="tabDetailViewDL" width="200">District :  </td>
		            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo strtoupper($this->config_model->getConfig('Political Area').", ".$this->config_model->getConfig('Province')); ?></b></slot></td>
		        </tr>
		        </table>
    			<?php
    			break;
    		default:
    			?>
    			<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0"  width="95%">
		        <tr>
		            <td class="tabDetailViewDL" width="200">City/Municipal :  </td>
		            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo strtoupper($this->config_model->getConfig('Political Area').", ".$this->config_model->getConfig('Province')); ?></b></slot></td>
		        </tr>
		        </table>
    			<?php
    			break;
    	}
    	?>
    	
    	<!--<table width="90%" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="left"><h3><img src="images/reports.png" alt="Statistics" border="0" align="top">&nbsp;Overall Statistics</h3></td>
			<td align="right"><img src="images/printer.png" align="Printing" align="bottom" style="cursor: pointer" /></td>
		</tr>
		</table>-->
		<h3><img src="images/reports.png" alt="Statistics" border="0" align="top">&nbsp;Overall Statistics</h3>
        <table class="tabDetailView" border="0" cellpadding="0" cellspacing="0"  width="90%">
        <tr>
            <td class="tabDetailViewDL" width="200">Total Reg. Voters :  </td>
            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo number_format($total_voters,0) ?></b></slot></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>Est. Voters Turnout : </slot> </td>
            <td class="tabDetailViewDF" width="80"><slot>
            <b>
            <?php echo number_format($est_voters_turnout,0) ?> &nbsp;&nbsp;&nbsp;
            </b>
            </slot>
            </td>
            <td class="tabDetailViewDF"><slot>
            <b>
            (<?php echo number_format($turnout_percentage,1) ?>%)
            </b> 
            </slot> 
            </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>Target Votes to Win: </slot> </td>
            <td class="tabDetailViewDF" ><slot><b><?php echo number_format($target_votes,0) ?></b> </slot> </td>
            <td class="tabDetailViewDF" ><slot><b>(<?php echo number_format($target_vote_percentage,1) ?>%)</b> </slot> </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>Total Straight Voters : </slot> </td>
            <td class="tabDetailViewDF"><slot>
            <b>
            <?php echo number_format($voters_inlist,0) ?> &nbsp;&nbsp;&nbsp; 
            </b> 
            </slot> 
            </td>
            <td class="tabDetailViewDF"><slot>
           
            </slot> 
            </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>No. of Barangays: </slot> </td>
            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo number_format($total_brgys,0) ?></b> </slot> </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>No. of Established Precincts: </slot> </td>
            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo number_format($total_established_precincts,0) ?></b> </slot> </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>No. of Merged/Clustered Precincts: </slot> </td>
            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo number_format($total_precincts,0) ?></b> </slot> </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>No. of Polling Places: </slot> </td>
            <td class="tabDetailViewDF" colspan="2"><slot><b><?php echo number_format($total_polling_places,0) ?></b> </slot> </td>
        </tr>
        </table>
        
        <!--gender grouping-->
        <h3><img src="images/voters.gif" alt="Statistics" border="0" align="top">&nbsp;Breakdown by Gender</h3>
        <table class="tabDetailView" border="0" cellpadding="0" cellspacing="0"  width="90%">
        <tr>
            <td class="tabDetailViewDL" width="200">Total Male Reg. Voters :  </td>
            <td class="tabDetailViewDF"><slot><b><?php echo number_format($male_voters,0) ?></b></slot></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"><slot>Total Female Reg. Voters : </slot> </td>
            <td class="tabDetailViewDF"><slot><b><?php echo number_format($female_voters,0) ?></b> </slot> </td>
        </tr>
        </table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		<tr><td>
		<iframe frameborder="0" height="250" width="100%" src="index.php?dashboard/showGender" scrolling="No"></iframe>
		</td></tr>
		</tbody>
		</table>
	</td>
</tr>
</table>