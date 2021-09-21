<?php
// col submenu
$this->common_menu[] = array('url' => 'index.php?dashboard/main', 'name' => 'Dashboards', 'image' => 'submenu/dashboard');
$this->common_menu[] = array('url' => 'index.php?dashboard/compensation', 'name' => 'Compensation', 'image' => 'submenu/allowance');

if ($this->userrole_model->has_access($this->session->userdata('current_userID'),'View Political Tagging')) {
	$this->common_menu[] = array('url' => 'index.php?dashboard/political', 'name' => 'Political Tags', 'image' => 'submenu/politicalTag');
}
?>