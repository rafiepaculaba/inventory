<?php

class About extends Controller 
{
	var $common_menu;
	
	var $data;
	
	function About()
	{
		parent::Controller();
		
		// check user session
		$this->user_model->authenticate_user_session();
	}
	
	
	function submenu()
	{
		// global settings
		include('includes/settings.php');
		
		$this->load->view("modules/About/submenu");
		
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "About the Team";
		
		
	}
	
	function index()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/About/index', $data);
		$this->load->view('footer');
	}
	
}	