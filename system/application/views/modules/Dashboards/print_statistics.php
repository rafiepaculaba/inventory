<script type="text/javascript">
		$(document).ready(function() {
      			var chart = new Highcharts.Chart({
			   chart: {
			      renderTo: 'container',
			      inverted: true,
			      defaultSeriesType: 'bar'
			   },
			   title: {
			      text: 'Employee Statistics'
			   },
			   subtitle: {
			      text: ''
			   },
			   xAxis: {
			      categories: [<?php echo $cats ?>],
			      title: {
			         text: null
			      }
			   },
			   yAxis: {
			      min: 0,
			      title: {
			         text: '',
			         align: 'high'
			      }
			   },
			   tooltip: {
			      formatter: function() {
			         return '<b>'+ this.x +'</b><br/>'+
			             this.series.name +': '+ this.y +' millions';
			      }
			   },
			   plotOptions: {
			      bar: {
			         dataLabels: {
			            enabled: true,
			            color: 'auto'
			         }
			      }
			   },
			   legend: {
			      layout: 'vertical',
			      style: {
			         left: 'auto',
			         bottom: 'auto',
			         right: '70px',
			         top: '-100px'
			      },
			      borderWidth: 1,
			      backgroundColor: '#FFFFFF'
			   },
			   credits: {
			      enabled: false
			   },
			        series: [{
			      name: 'Employees',
			      data: [<?php echo $cat_stat ?>]
			   }]
			});
			
			
		});
</script>


<h4 align="center"><u>Employee Statistics</u></h4>
<br>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="59%" valign="top">
		<br style="height: 5px" />
			
		<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		<tr height="20">
			<td scope="col" class="listViewThS1" nowrap width="100">Office</td>
			<?php 
			$total = array();
			if ($status->num_rows()) {
				foreach($status->result() as $stat) {
					$total[$stat->empStatusID] = 0;
					?>
					<td scope="col" class="listViewThS1" nowrap width="50"><div align="center"><?php echo $stat->type ?></div></td>
					<?php 
				}
			}
			?>
			<td scope="col" class="listViewThS1" nowrap width="100"><div align="center">Total</div></td>
		</tr>
		<tr>
			<td colspan="<?php echo (2+$status->num_rows()); ?>" height="1" class="listViewHRS1"></td>
		</tr>
		<?php 
		if (!empty($statistics)) {
			foreach($statistics as $row) {
		?>
			<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
			    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="100" nowrap><?php echo $row['office'] ?></td>
			    <?php
				if ($status->num_rows()) {
					foreach($status->result() as $stat) {
						$total[$stat->empStatusID] += $row[$stat->empStatusID];
						?>
			    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="50" nowrap><?php echo $row[$stat->empStatusID] ?></td>
			    		<?php 
					}
				}
			    ?>
			    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="100" nowrap><?php echo $row['total'] ?></td>
			</tr>
			<tr>
				<td colspan="<?php echo (2+$status->num_rows()); ?>" height="1" class="listViewHRS1"></td>
			</tr>
		<?php }
			if (!empty($statistics)) { 
				?>
				<tr height="20">
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="100" nowrap><b>Grand Total </b></td>
				    <?php
				    $grand_total = 0;
					if ($status->num_rows()) {
						foreach($status->result() as $stat) {
							$grand_total += $total[$stat->empStatusID];
							?>
				    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="50" nowrap><b><?php echo number_format($total[$stat->empStatusID],0); ?></b></td>
				    		<?php 
						}
					}
				    ?>
				    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="100" nowrap><b><?php echo number_format($grand_total,0); ?></b></td>
				</tr>
				<?php 
			}
		}
		?>
		</tbody>
		</table>
	</td>
	<td width="2%">&nbsp;</td>
	<td width="39%" valign="top">
		<div id="container" style="width: 400px; height: 250px"></div>
	</td>
</tr>
</table>
