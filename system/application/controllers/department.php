<?php	

class Department extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Department()
	{
		parent::Controller();
		$this->load->model("department_model");	
		
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
		$this->data['title']   = "Departments";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		$this->roles['create'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Add Department');
		$this->roles['edit'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Edit Existing Department');
		$this->roles['delete'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Delete Existing Department');
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Department');	
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
			$this->load->view('modules/Department/tabs', $data);
			$this->load->view('modules/Department/create', $data);
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
				$this->department_model->deptName = trim($this->input->post('deptName'));
				$this->department_model->deptDesc = trim($this->input->post('deptDesc'));

				if ($this->department_model->saveRecord()) {
					$this->department_model->setRecord();
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Department successfully saved.";
					$data["urlredirect"] = "index.php?department/view/".$this->department_model->deptID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the Department!";
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
			$this->department_model->deptID	    = trim($this->input->post('deptID'));
			$this->department_model->deptName	= trim($this->input->post('deptName'));
			$this->department_model->deptDesc	= trim($this->input->post('deptDesc'));
			$this->department_model->status		= trim($this->input->post('status'));
			
			if ($this->department_model->updateRecord()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Department successfully updated.";
				$data["urlredirect"] = "index.php?department/view/".$this->department_model->deptID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the Department!";
				$data["urlredirect"] = "index.php?department/view/".$this->department_model->deptID;
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
			$this->department_model->deptID = $id; 
			$this->department_model->getRecord();
			$data['rec'] = $this->department_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Department/tabs', $data);
			$this->load->view('modules/Department/view', $data);
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
	        $this->department_model->deptID = $id; 
			$this->department_model->getRecord();
			$data['rec'] = $this->department_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Department/tabs', $data);
			$this->load->view('modules/Department/edit', $data);
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
			$this->department_model->deptID = $id; 
			$this->department_model->getRecord();
			
			if ($this->department_model->deptName) {
				if ($this->department_model->deleteRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Department successfully deleted.";
					$data["urlredirect"] = "index.php?department/show";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the Department!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Department record not found!";
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

    	if ($this->input->post('cmdFilter') || $this->input->post('deptName') || $this->input->post('deptDesc') || $this->input->post('status') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$deptName    = trim($this->input->post('deptName'));
	    	$deptDesc    = trim($this->input->post('deptDesc'));
	    	$status      = trim($this->input->post('status'));
			$sortby      = trim($this->input->post('sortby'));
	    	$sortorder   = trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_deptName') || $this->session->userdata($controller.'_deptDesc') || $this->session->userdata($controller.'_status') || $this->session->userdata($controller.'_sortby') || $this->session->userdata($controller.'_sortorder')) {
	    	$deptName	= $this->session->userdata($controller.'_deptName');
	    	$deptDesc	= $this->session->userdata($controller.'_deptDesc');
	    	$status		= $this->session->userdata($controller.'_status');
	    	$sortby 	= $this->session->userdata($controller.'_sortby');
	    	$sortorder	= $this->session->userdata($controller.'_sortorder');
		} else {
	    	$deptName	= "";
	    	$deptDesc	= "";
	    	$status		= "";
	    	$sortby 	= "deptName";
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

		$this->session->set_userdata($controller.'_deptName', $deptName);
		$this->session->set_userdata($controller.'_deptDesc', $deptDesc);
		$this->session->set_userdata($controller.'_status', $status);
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
    	$this->session->set_userdata($controller.'_limit', $limit);
    		
    	$data['deptName']   = $deptName;
    	$data['deptDesc']	= $deptDesc;
    	$data['status']		= $status;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder']	= $sortorder;
    	$data['limit'] 		= $limit;

    	if ($deptName!="")
    		$this->db->like('deptName', $deptName,'after');
    		
    	if ($deptDesc!="")
    		$this->db->like('deptDesc', $deptDesc,'after');
    		
    	if ($status!="")
    		$this->db->where('status', $status);
    		
    	$config['total_rows'] = $data['ttl_rows'] = $this->db->count_all_results('departments');
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?departments/show/';
	    $config['per_page'] = $limit;
		$this->pagination->initialize($config);
			
		if ($deptName!="")
    		$this->db->like('deptName', $deptName,'after');
    		
    	if ($deptDesc!="")
    		$this->db->like('deptDesc', $deptDesc,'after');
    		
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
    	
	    $data['records'] = $this->db->get('departments');
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Department/tabs', $data);
		$this->load->view('modules/Department/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$deptName	= $this->session->userdata($controller.'_deptName');
    	$deptDesc	= $this->session->userdata($controller.'_deptDesc');
    	$status		= $this->session->userdata($controller.'_status');
    	$sortby 	= $this->session->userdata($controller.'_sortby');
    	$sortorder	= $this->session->userdata($controller.'_sortorder');
    	$limit 		= $this->session->userdata($controller.'_limit');
		
		if ($deptName!="")
    		$this->db->like('deptName', $deptName,'after');
    		
    	if ($deptDesc!="")
    		$this->db->like('deptDesc', $deptDesc,'after');
    		
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
    	
	    $data['records'] = $this->db->get('departments');
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('print_page_header', $data);
		$this->load->view('modules/Department/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->department_model->deptName = $this->input->post('deptName');
		
		if ($this->department_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
}	