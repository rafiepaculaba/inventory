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
			             this.series.name +': '+ this.y ;
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


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="59%" valign="top">
		<br style="height: 5px" />
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<h4 class="dataLabel">&nbsp;&nbsp;<img src="images/submenu/statistics.gif" alt="Employee Statistics" border="0" align="top" /> Employee Statistics</h4>
			</td>
			<td align="right">
				<input type="button" class="button" value="Print" onclick="popUp('index.php?dashboard/print_statistics');"  />
			</td>
		</tr>
		</table>
			
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

<br/><br/>

<table border="0" cellpadding="0" cellspacing="0" width="59%">
<tr>
	<td>
		<h4 class="dataLabel">&nbsp;&nbsp;<img src="images/bday.gif" alt="Birthday Celebrants" border="0" align="top" /> Birthday Celebrants for the Month of <?php echo date('F') ?> [<?php echo number_format($bdays->num_rows(),0) ?>]</h4>
	</td>
	<td align="right">
		<input type="button" class="button" value="Print"  onclick="popUp('index.php?dashboard/print_birthday');" />
	</td>
</tr>
</table>
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="59%">
<tbody>
<tr height="20">
	<td scope="col" class="listViewThS1" width="5%" nowrap>&nbsp;</td>
	<td scope="col" class="listViewThS1" width="20%" nowrap>Birthday</td>
	<td scope="col" class="listViewThS1" width="40%" nowrap>Celebrant</td>
	<td scope="col" class="listViewThS1" width="20%" nowrap><div align="center">Office</div></td>
	<td scope="col" class="listViewThS1" width="15%" nowrap><div align="center">Age</div></td>
</tr>
</tbody>
</table>

<div style="overflow: auto; height:300px; width: 59%">
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<?php 
// check for roles in viewing employee records
$isViewable = $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Employees');

if ($bdays->num_rows()) {
	$ctr = 1;
	foreach($bdays->result() as $celebrant) {
?>
<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="5%" nowrap><?php echo $ctr ?>.</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="20%" nowrap><?php echo date("m/d/Y", strtotime($celebrant->bday)) ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="40%" nowrap>
    <?php if ($isViewable) { ?>
    <a href="index.php?employee/view/<?php echo $celebrant->empID ?>" class="listViewTdLinkS1">
	<?php echo $celebrant->lname.", ".$celebrant->fname." ".$celebrant->mname ?>
	</a>
	<?php } else { 
		echo $celebrant->lname.", ".$celebrant->fname." ".$celebrant->mname ;
	} ?>
	</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="20%" nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $celebrant->office ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="15%" nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("Y") - date("Y",strtotime($celebrant->bday)) ?></td>
</tr>
<tr>
	<td colspan="5" height="1" class="listViewHRS1"></td>
</tr>
<?php 
	$ctr++;
	}
}
?>
</tbody>
</table>
</div>

<script>
function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=500,left = 0,top = 0');");
	return false;
}
</script>
