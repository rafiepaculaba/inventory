<?php
// set global session data
if (!$this->session->userdata('schYear')) {
	// get the default school year
    $schYear = $this->config_model->getConfig('School Year');
	$this->session->set_userdata('schYear', $schYear);
} else {
	$schYear = $this->session->userdata('schYear');
}

if (!$this->session->userdata('semCode')) {
    // get the default semester
    $semCode = $this->config_model->getConfig('Semester');
	$this->session->set_userdata('semCode', $semCode);
} else {
	$semCode = $this->session->userdata('semCode');
}

// get the total semesters
$totalSemester = $this->config_model->getConfig('Total Semesters');

// get the total semesters
$implementation_year = $this->config_model->getConfig('Implementation Year');


$schYear_range = explode('-',$this->config_model->getConfig('School Year'));
$schYears = array();
$ctr = $schYear_range[0];
while ($ctr >= $implementation_year ) {
	$schYears[] = $ctr."-".($ctr+1);
	$ctr--;
}
$data['sch_years'] = $schYears;

// set semesters
$ctr = 1;
$semesters=array();
while($ctr <= $totalSemester) {
	switch($ctr) {
		case 1:
			$semesters[1] = "1st Semester";
			break;
		case 2:
			$semesters[2] = "2nd Semester";
			break;
		case 3:
			$semesters[3] = "3rd Semester";
			break;
	}
	
	$ctr++;
	if ($ctr>3)
		break;
}
$semesters[4] = "Summer";
$data['semesters'] = $semesters;



?>