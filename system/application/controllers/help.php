<?php

class Help extends Controller 
{
	var $common_menu;
	
	var $data;
	
	function Help()
	{
		parent::Controller();
		
		// check user session
		$this->user_model->authenticate_user_session();
	}
	
	
	function submenu()
	{
		// global settings
		include('includes/settings.php');
		
		$this->data['sch_years'] = $schYears;
		$this->data['semesters'] = $semesters;
		
		$this->data['schYear']  = $schYear;
	    $this->data['semCode']  = $semCode;
	    
		$this->load->view("modules/About/submenu");
		
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Help Topics";
		
		
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
		$this->load->view('modules/Help/index', $data);
		$this->load->view('footer');
	}
	
	
	function introduction($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/introduction/'.$page, $data);
		$this->load->view('footer');
	}
	
	function setup($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/setup/'.$page, $data);
		$this->load->view('footer');
	}
	
	function video($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/video/'.$page, $data);
		$this->load->view('footer');
	}
	
	function general($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/general/'.$page, $data);
		$this->load->view('footer');
	}
	
	function process($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/process/'.$page, $data);
		$this->load->view('footer');
	}
	
	function how_to($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/how_to/'.$page, $data);
		$this->load->view('footer');
	}
	
	function administration($page=1)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		// ******************* end global settings *********************************
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Help/index', $data);
		$this->load->view('modules/Help/administration/'.$page, $data);
		$this->load->view('footer');
	}
}	