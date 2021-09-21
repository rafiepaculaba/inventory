<?php

class Config extends Controller 
{
	var $common_menu;
	var $roles;

	function Config()
	{
		parent::Controller();	
		// check user session
		$this->user_model->authenticate_user_session();
	}
	
	function index()
	{
		$this->show();
	}
	
	function submenu()
	{
		// global settings
		include('includes/settings.php');
		
		$this->load->view("modules/Admin/submenu");
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Configuration";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}	
	
	function check_roles()
	{
		// check roles
		$this->roles['manage'] 	= $this->session->userdata('current_isAdmin');
	}
	
	function create()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 2;
		//************** end general settings *******************
		// check roles
		if ($this->roles['manage']) {
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Admin/config/tabs', $data);
			$this->load->view('modules/Admin/config/create', $data);
			$this->load->view('footer');
		
		} else {
			
			$data["display"] = "block";
			$data["class"] 	 = "errorbox";
			$data["msg"] 	 = "Sorry, you don't have access to this page!";
			$data["urlredirect"] = "";
			$this->load->view("header",$data);
			$this->load->view("message",$data);
			$this->load->view("footer");
		}
	}
	
	
	function save()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 0;
		//************** end general settings *******************
		
		// check roles
		if ($this->roles['manage']) {
		if ($this->input->post('name')) {
			$this->config_model->name  = trim($this->input->post('name'));
			$this->config_model->value = trim($this->input->post('value'));
			
			if ($this->config_model->saveRecord()) {
				$this->config_model->value = $this->config_model->setConfig($this->config_model->name);
				// successful
				$data["display"] = "block";
				$data["class"] 	 = "notificationbox";
				$data["msg"] 	 = "Config successfully saved.";
				$data["urlredirect"] = "index.php?config/view/".$this->config_model->configID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Error in saving the config!";
				$data["urlredirect"] = "";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			}
		}
		
		} else {
			// error
			$data["display"] = "block";
			$data["class"] 	 = "errorbox";
			$data["msg"] 	 = "Sorry, you don't have access to this page!";
			$data["urlredirect"] = "";
			$this->load->view("header",$data);
			$this->load->view("message",$data);
			$this->load->view("footer");
		}
	}
	
	function update()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 0;
		//************** end general settings *******************
		
		// check roles
		if ($this->roles['manage']) {
			if ($this->input->post('cmdSave')) {
				$this->config_model->configID = $this->input->post('configID');
				$this->config_model->name 	  = $this->input->post('name');
				$this->config_model->value 	  = $this->input->post('value');
				
				if ($this->config_model->updateRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] = "notificationbox";
					$data["msg"] = "Config successfully updated.";
					$data["urlredirect"] = "index.php?config/view/".$this->config_model->configID;
					$this->load->view("header.php",$data);
					$this->load->view("message.php",$data);
					$this->load->view("footer.php");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] = "errorbox";
					$data["msg"] = "Error in updating the config!";
					$data["urlredirect"] = "index.php?config/view/".$this->config_model->configID;
					$this->load->view("header.php",$data);
					$this->load->view("message.php",$data);
					$this->load->view("footer.php");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the config!";
				$data["urlredirect"] = "index.php?config/view/".$this->config_model->configID;
				$this->load->view("header.php",$data);
				$this->load->view("message.php",$data);
				$this->load->view("footer.php");
			}
		} else {
			// error
			$data["display"] = "block";
			$data["class"] 	 = "errorbox";
			$data["msg"] 	 = "Sorry, you don't have access to this page!";
			$data["urlredirect"] = "";
			$this->load->view("header",$data);
			$this->load->view("message",$data);
			$this->load->view("footer");
		}
	}
	
	
	function view($configID = 0)
	{
		
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 0;
		//************** end general settings *******************
		
		$this->config_model->configID = $configID; 
		$this->config_model->getRecord();
		$data['config'] = $this->config_model;
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/config/tabs', $data);
		$this->load->view('modules/Admin/config/view', $data);
		$this->load->view('footer');
	}
	
	function listtype()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 2;
		//************** end general settings *******************

		$data['listtype'] 	= $this->config_model->getConfig('List Type');
		// load views 
		$this->load->view('header_popup', $data);
		$this->load->view('modules/Admin/config/listtype', $data);
		$this->load->view('footer_popup');
	}
	
	
	function update_listtype()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		//************** end general settings *******************		
		if ($this->input->post('cmdSave')) {
			// list type
			$this->config_model->setConfig('List Type');
			$this->config_model->value = $this->input->post('listtype');
			$this->config_model->updateRecord();
			
			// successful
			$data["display"] = "block";
			$data["class"] = "notificationbox";
			$data["msg"] = "General Settings successfully updated.";
			$data["urlredirect"] = "refresh";
			$this->load->view("header_popup",$data);
			$this->load->view("message",$data);
			$this->load->view("footer_popup");
		}
	}
	
	
	function edit($configID = 0)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 0;
		//************** end general settings *******************	
		
		// check roles
		if ($this->roles['manage']) {
			$this->config_model->configID = $configID; 
			$this->config_model->getRecord();
			$data['config'] = $this->config_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Admin/config/tabs', $data);
			$this->load->view('modules/Admin/config/edit', $data);
			$this->load->view('footer');
			
		} else {
			// error
			$data["display"] = "block";
			$data["class"] 	 = "errorbox";
			$data["msg"] 	 = "Sorry, you don't have access to this page!";
			$data["urlredirect"] = "";
			$this->load->view("header",$data);
			$this->load->view("message",$data);
			$this->load->view("footer");
		}
	}
	
	
	function delete($configID = 0)
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 0;
		//************** end general settings *******************	
		
		// check roles
		if ($this->roles['manage']) {
		
		$this->config_model->configID = $configID; 
		$this->config_model->getRecord();
		
		if ($this->config_model->name) {
				if ($this->config_model->deleteRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Config successfully deleted.";
					$data["urlredirect"] = "index.php?config/";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the config!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Config record not found!";
				$data["urlredirect"] = "";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			}
		
		} else {
			// error
			$data["display"] = "block";
			$data["class"] 	 = "errorbox";
			$data["msg"] 	 = "Sorry, you don't have access to this page!";
			$data["urlredirect"] = "";
			$this->load->view("header",$data);
			$this->load->view("message",$data);
			$this->load->view("footer");
		}
	}
	
	function show()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
	    // current tab
		// 0 : no selected tab
		// 1 : listings
		// 2 : new
		$data['activetab'] = 1;
		//************** end general settings *******************	
		
		// set controler
	    $controller = $this->uri->segment(1);
		
		// get offset
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	if ($this->input->post('cmdFilter') || $this->input->post('txtname') || $this->input->post('txtvalue') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$name 		= trim($this->input->post('txtname'));
	    	$value 		= trim($this->input->post('txtvalue'));
	    	$sortby 	= trim($this->input->post('sortby'));
	    	$sortorder 	= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_name') || $this->session->userdata($controller.'_value') || $this->session->userdata($controller.'_sortby') || $this->session->userdata('config_sortorder')) {
			$name  		= $this->session->userdata($controller.'_name');
	    	$value 		= $this->session->userdata($controller.'_value');
	    	$sortby 	= $this->session->userdata($controller.'_sortby');
	    	$sortorder 	= $this->session->userdata($controller.'_sortorder');
		} else {
			$name 	  	= "";
			$value 	  	= "";
			$sortby 	= "name";
			$sortorder 	= "ASC";
		}
		
		
		if ($this->input->post('limit')) {
			if ($this->input->post('limit')=="All") {
				$limit = "";
			} else {
				$limit = $this->input->post('limit');
			}
		} else if ($this->session->userdata($controller.'_limit')) {
			$limit = $this->session->userdata($controller.'_limit');
		} else {
			$limit = 25; // default limit
		}
		
		$this->session->set_userdata($controller.'_name', $name);
    	$this->session->set_userdata($controller.'_value', $value);
    	$this->session->set_userdata($controller.'_limit', $limit);
    	
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
	    	
    	$data['name'] 		= $name;
    	$data['value'] 		= $value;
    	$data['limit'] 		= $limit;
    	
    	$data['sortby'] 	= $sortby;
    	$data['sortorder'] 	= $sortorder;
		
		if ($name!="")
    		$this->db->like('name', $name, 'after'); 
    	
    	if ($value!="")
    		$this->db->like('value', $value, 'after'); 
    		
    	$data['ttl_rows'] = $config['total_rows'] = $this->db->count_all_results('config') - 1;
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?config/show/';
	    $config['per_page'] = $limit;

		$this->pagination->initialize($config);
    		
    		
    	if ($name!="")
    		$this->db->like('name', $name, 'after'); 
    	
    	if ($value!="")
    		$this->db->like('value', $value, 'after'); 
	    
	    if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    	
	    $data['records'] = $this->db->get('config');
	    
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/config/tabs', $data);
		$this->load->view('modules/Admin/config/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;
		
		$name  	    = $this->session->userdata('config_name');
    	$value 	    = $this->session->userdata('config_value');
    	$sortby 	= $this->session->userdata('config_sortby');
    	$sortorder  = $this->session->userdata('config_sortorder');
    	$limit 		= $this->session->userdata('config_limit');
	    	
		$this->db->select('config.*');
		$this->db->from('config');
	    
	    if ($name!="")
    		$this->db->like('name', $name, 'after'); 
    	
    	if ($value!="")
    		$this->db->like('value', $value, 'after'); 
	    
	     if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    	
	    $data['records'] = $this->db->get();
		
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('print_page_header', $data);
		$this->load->view('modules/Admin/config/printlist', $data);
		$this->load->view('print_footer');
	}
	
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$name = $this->input->post('name');
		$this->config_model->setConfig($name);
		
		if ($this->config_model->configID && ($this->config_model->value!=""))
			echo "1"; // duplicate
		else 
			echo "0";
	}
}