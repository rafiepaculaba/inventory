<div class="tabDivider">
<ul class="tablist">

<?php
if ($activetab==1) {
?>
	<!--default display is listings-->
	<li class="active" id="idList"><a class="current" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/voters_analysis'"><img src="images/analysis.gif" align="top" /> Target Voters</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/group_analysis'"><img src="images/ageanalysis.gif" align="top" /> Age Group Analysis</a></li>	
	<?php if ($position=='GOVERNOR' || $position=='VICE-GOVERNOR' || $position == 'CONGRESSMAN') {?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/project'"><img src="images/cluster.gif" align="top" /> Project of Precincts</a></li>	
	<?php } ?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/overall_stat'"><img src="images/quickcount.gif" align="top" /> Stat per City/Municipality</a></li>	
	<!--<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct Analysis</a></li>	-->
<?php
} else if ($activetab==2) {
?>
	<!--default display is listings-->
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/voters_analysis'"><img src="images/analysis.gif" align="top" /> Target Voters</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/group_analysis'"><img src="images/ageanalysis.gif" align="top" /> Age Group Analysis</a></li>	
	<?php if ($position=='GOVERNOR' || $position=='VICE-GOVERNOR' || $position == 'CONGRESSMAN') {?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/project'"><img src="images/cluster.gif" align="top" /> Project of Precincts</a></li>	
	<?php } ?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/overall_stat'"><img src="images/quickcount.gif" align="top" /> Stat per City/Municipality</a></li>	
	<!--<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct Analysis</a></li>	-->
<?php
} else if ($activetab==3) {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/voters_analysis'"><img src="images/analysis.gif" align="top" /> Target Voters</a></li>	
	<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/group_analysis'"><img src="images/ageanalysis.gif" align="top" /> Age Group Analysis</a></li>	
	<?php if ($position=='GOVERNOR' || $position=='VICE-GOVERNOR' || $position == 'CONGRESSMAN') {?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/project'"><img src="images/cluster.gif" align="top" /> Project of Precincts</a></li>	
	<?php } ?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/overall_stat'"><img src="images/quickcount.gif" align="top" /> Stat per City/Municipality</a></li>	
	<!--<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct Analysis</a></li>	-->
<?php
} else if ($activetab==4) {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/voters_analysis'"><img src="images/analysis.gif" align="top" /> Target Voters</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/group_analysis'"><img src="images/ageanalysis.gif" align="top" /> Age Group Analysis</a></li>	
	<?php if ($position=='GOVERNOR' || $position=='VICE-GOVERNOR' || $position == 'CONGRESSMAN') {?>
	<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/project'"><img src="images/cluster.gif" align="top" /> Project of Precincts</a></li>	
	<?php } ?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/overall_stat'"><img src="images/quickcount.gif" align="top" /> Stat per City/Municipality</a></li>	
	<!--<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct Analysis</a></li>	-->
<?php
} else if ($activetab==5) {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/voters_analysis'"><img src="images/analysis.gif" align="top" /> Target Voters</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/group_analysis'"><img src="images/ageanalysis.gif" align="top" /> Age Group Analysis</a></li>	
	<?php if ($position=='GOVERNOR' || $position=='VICE-GOVERNOR' || $position == 'CONGRESSMAN') {?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/project'"><img src="images/cluster.gif" align="top" /> Project of Precincts</a></li>	
	<?php } ?>
	<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/overall_stat'"><img src="images/quickcount.gif" align="top" /> Stat per City/Municipality</a></li>	
	<!--<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/city'"><img src="images/voters.gif" align="top" /> Municipality/City</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/barangay'"><img src="images/voters.gif" align="top" /> Barangay</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct</a></li>	
	<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/gender'"><img src="images/voters.gif" align="top" /> Municipality/City by Gender</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/brgy_gender'"><img src="images/voters.gif" align="top" /> Barangay by Gender</a></li>	-->
	<!--<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/results'"><img src="images/voters.gif" align="top" /> Election Results</a></li>-->
<?php
} else if ($activetab==6) {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/city'"><img src="images/voters.gif" align="top" /> Municipality/City</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/barangay'"><img src="images/voters.gif" align="top" /> Barangay</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/gender'"><img src="images/voters.gif" align="top" /> Municipality/City by Gender</a></li>	
	<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/brgy_gender'"><img src="images/voters.gif" align="top" /> Barangay by Gender</a></li>	
	<!--<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/results'"><img src="images/voters.gif" align="top" /> Election Results</a></li>-->
<?php
} else if ($activetab==7) {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?dashboard/'"><img src="images/overall.png" align="top" /> Over All</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/city'"><img src="images/voters.gif" align="top" /> Municipality/City</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/barangay'"><img src="images/voters.gif" align="top" /> Barangay</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/precinct'"><img src="images/precinct.gif" align="top" /> Precinct</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/gender'"><img src="images/voters.gif" align="top" /> Municipality/City by Gender</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/brgy_gender'"><img src="images/voters.gif" align="top" /> Barangay by Gender</a></li>	
	<!--<li class="active" id="idCreate"><a class="current" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?dashboard/results'"><img src="images/voters.gif" align="top" /> Election Results</a></li>-->
<?php
}
?>
</ul>
</div>
