<?php
if ($this->session->userdata('current_isAdmin')) {
	// common submenu
	$this->common_menu[] = array('url' => 'index.php?user/show', 'name' => 'Users', 'image' => 'submenu/users');
	$this->common_menu[] = array('url' => 'index.php?group/show', 'name' => 'User Groups', 'image' => 'submenu/groups');
	$this->common_menu[] = array('url' => 'index.php?config/show', 'name' => 'Configuration', 'image' => 'submenu/config');
	$this->common_menu[] = array('url' => 'index.php?vessel/show', 'name' => 'Vessels', 'image' => 'submenu/vessel');
	$this->common_menu[] = array('url' => 'index.php?department/show', 'name' => 'Department', 'image' => 'submenu/department');
} else {
	$this->common_menu[] = array('url' => 'index.php?user/profile', 'name' => 'My profile', 'image' => 'submenu/profile');
}
?>