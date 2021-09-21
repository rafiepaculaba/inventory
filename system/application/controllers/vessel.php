<?php	

class Vessel extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Vessel()
	{
		parent::Controller();
		$this->load->model("vessel_model");	
		
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
		$this->data['common_menu'] = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Vessels";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		$this->roles['create'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Add Vessel');
		$this->roles['edit'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Edit Existing Vessel');
		$this->roles['delete'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Delete Existing Vessel');
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Vessel');	
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
		if ($this->roles['create']) {
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Vessel/tabs', $data);
			$this->load->view('modules/Vessel/create', $data);
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
		$data['activetab'] = 2;
		//************** end general settings *******************
		
		// check roles
		if ($this->roles['create']) {
				$this->vessel_model->vesselCode = trim($this->input->post('vesselCode'));
				$this->vessel_model->vesselName	= trim($this->input->post('vesselName'));

				if ($this->vessel_model->saveRecord()) {
					$this->vessel_model->setRecord();
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Vessel successfully saved.";
					$data["urlredirect"] = "index.php?vessel/view/".$this->vessel_model->vesselID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the Vessel!";
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
		if ($this->roles['edit']) {
			$this->vessel_model->vesselID	= trim($this->input->post('vesselID'));
			$this->vessel_model->vesselCode	= trim($this->input->post('vesselCode'));
			$this->vessel_model->vesselName	= trim($this->input->post('vesselName'));
			$this->vessel_model->status		= trim($this->input->post('status'));
			
			if ($this->vessel_model->updateRecord()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Vessel successfully updated.";
				$data["urlredirect"] = "index.php?vessel/view/".$this->vessel_model->vesselID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the Vessel!";
				$data["urlredirect"] = "index.php?vessel/view/".$this->vessel_model->vesselID;
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
	
	function view($id = 0)
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
		if ($this->roles['view']) {
			$this->vessel_model->vesselID = $id; 
			$this->vessel_model->getRecord();
			$data['rec'] = $this->vessel_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Vessel/tabs', $data);
			$this->load->view('modules/Vessel/view', $data);
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
	
	function edit($id = 0)
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
		if ($this->roles['edit']) {
	        $this->vessel_model->vesselID = $id; 
			$this->vessel_model->getRecord();
			$data['rec'] = $this->vessel_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Vessel/tabs', $data);
			$this->load->view('modules/Vessel/edit', $data);
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
	
	function delete($id = 0)
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
		if ($this->roles['delete']) {
			$this->vessel_model->vesselID = $id; 
			$this->vessel_model->getRecord();
			
			if ($this->vessel_model->vesselName) {
				if ($this->vessel_model->deleteRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Vessel successfully deleted.";
					$data["urlredirect"] = "index.php?vessel/show";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the Vessel!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Vessel record not found!";
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
		
		$controller = $this->uri->segment(1);
		
		// get offset
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	if ($this->input->post('cmdFilter') || $this->input->post('vesselCode') || $this->input->post('vesselName') || $this->input->post('status') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$vesselCode = trim($this->input->post('vesselCode'));
	    	$vesselName	= trim($this->input->post('vesselName'));
	    	$status		= trim($this->input->post('status'));
			$sortby 	= trim($this->input->post('sortby'));
	    	$sortorder	= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_vesselCode') || $this->session->userdata($controller.'_vesselName') || $this->session->userdata($controller.'_status') || $this->session->userdata($controller.'_sortby') || $this->session->userdata($controller.'_sortorder')) {
	    	$vesselCode	= $this->session->userdata($controller.'_vesselCode');
	    	$vesselName	= $this->session->userdata($controller.'_vesselName');
	    	$status		= $this->session->userdata($controller.'_status');
	    	$sortby 	= $this->session->userdata($controller.'_sortby');
	    	$sortorder	= $this->session->userdata($controller.'_sortorder');
		} else {
	    	$vesselCode	= "";
	    	$vesselName	= "";
	    	$status		= "";
	    	$sortby 	= "vesselName";
	    	$sortorder	= "ASC";
		}
		
		if ($this->input->post('limit')) {
			if ($this->input->post('limit')=="All")
				$limit = "";
			else
				$limit = $this->input->post('limit');
		} else if ($this->session->userdata($controller.'_limit')) {
			$limit = $this->session->userdata($controller.'_limit');
		} else {
			$limit = 25; // default limit
		}

		$this->session->set_userdata($controller.'_vesselCode', $vesselCode);
		$this->session->set_userdata($controller.'_vesselName', $vesselName);
		$this->session->set_userdata($controller.'_status', $status);
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
    	$this->session->set_userdata($controller.'_limit', $limit);
    		
    	$data['vesselCode'] = $vesselCode;
    	$data['vesselName']	= $vesselName;
    	$data['status']		= $status;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder']	= $sortorder;
    	$data['limit'] 		= $limit;

    	if ($vesselCode!="")
    		$this->db->like('vesselCode', $vesselCode,'after');
    		
    	if ($vesselName!="")
    		$this->db->like('vesselName', $vesselName,'after');
    		
    	if ($status!="")
    		$this->db->where('status', $status);
    		
    	$config['total_rows'] = $data['ttl_rows'] = $this->db->count_all_results('vessels');
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?vessel/show/';
	    $config['per_page'] = $limit;
		$this->pagination->initialize($config);
			
		if ($vesselCode!="")
    		$this->db->like('vesselCode', $vesselCode,'after');
    		
    	if ($vesselName!="")
    		$this->db->like('vesselName', $vesselName,'after');
    		
    	if ($status!="")
    		$this->db->where('status', $status);
    		
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    		
    	if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
	    $data['records'] = $this->db->get('vessels');
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Vessel/tabs', $data);
		$this->load->view('modules/Vessel/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$vesselCode	= $this->session->userdata($controller.'_vesselCode');
    	$vesselName	= $this->session->userdata($controller.'_vesselName');
    	$status		= $this->session->userdata($controller.'_status');
    	$sortby 	= $this->session->userdata($controller.'_sortby');
    	$sortorder	= $this->session->userdata($controller.'_sortorder');
    	$limit 		= $this->session->userdata($controller.'_limit');
		
		if ($vesselCode!="")
    		$this->db->like('vesselCode', $vesselCode,'after');
    		
    	if ($vesselName!="")
    		$this->db->like('vesselName', $vesselName,'after');
    		
    	if ($status!="")
    		$this->db->where('status', $status);
    		
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    		
    	if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
	    $data['records'] = $this->db->get('vessels');
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('print_page_header', $data);
		$this->load->view('modules/Vessel/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->vessel_model->vesselName = $this->input->post('vesselName');
		
		if ($this->vessel_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
	
}	