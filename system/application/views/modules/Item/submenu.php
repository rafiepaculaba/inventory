<?php
// col submenu
if ($this->userrole_model->has_access($this->session->userdata('current_userID'),'View Item'))
	$this->common_menu[] = array('url' => 'index.php?item/show', 'name' => 'Items', 'image' => 'submenu/item');
	
if ($this->userrole_model->has_access($this->session->userdata('current_userID'),'View Category'))
	$this->common_menu[] = array('url' => 'index.php?category/show', 'name' => 'Main Categories', 'image' => 'submenu/category');
	
?>