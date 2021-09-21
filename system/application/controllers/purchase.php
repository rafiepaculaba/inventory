<?php	

class Purchase extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Purchase()
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
		include('includes/calendarSetup.php');
		include('includes/settings.php');
		
		$this->load->view("modules/Purchase/submenu");
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Purchase Orders";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		$this->roles['create'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Add Category');
		$this->roles['edit'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Edit Existing Category');
		$this->roles['delete'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Delete Existing Category');
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Category');
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
			$this->load->view('modules/Purchase/tabs', $data);
			$this->load->view('modules/Purchase/create', $data);
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
		if ($this->roles['manage']) {
				$this->employee_type_model->type  		= trim($this->input->post('type'));
				$this->employee_type_model->description	= trim($this->input->post('description'));

				if ($this->employee_type_model->saveRecord()) {
					$this->employee_type_model->setRecord();
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Employee Type successfully saved.";
					$data["urlredirect"] = "index.php?employee_type/view/".$this->employee_type_model->empStatusID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the Employee Type!";
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
	
	function generate_po()
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
			// successful
			$data["display"] = "block";
			$data["class"] 	 = "notificationbox";
			$data["msg"] 	 = "Purchase Order successfully generated.";
			$data["urlredirect"] = "index.php?purchase/view";
			$this->load->view("header",$data);
			$this->load->view("message",$data);
			$this->load->view("footer");
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
			$this->employee_type_model->empStatusID = trim($this->input->post('empStatusID'));
			$this->employee_type_model->type  		= trim($this->input->post('type'));
			$this->employee_type_model->description	= trim($this->input->post('description'));
			
			if ($this->employee_type_model->updateRecord()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Employee Type successfully updated.";
				$data["urlredirect"] = "index.php?employee_type/view/".$this->employee_type_model->empStatusID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the Employee Type!";
				$data["urlredirect"] = "index.php?employee_type/view/".$this->employee_type_model->empStatusID;
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
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Purchase/tabs', $data);
			if ($id)
				$this->load->view('modules/Purchase/view'.$id, $data);
			else
				$this->load->view('modules/Purchase/view', $data);
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
	
	function view_approved($id = 0)
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
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Purchase/tabs', $data);
			$this->load->view('modules/Purchase/view_approved', $data);
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
		if ($this->roles['manage']) {
	        $this->employee_type_model->empStatusID = $id; 
			$this->employee_type_model->getRecord();
			$data['rec'] = $this->employee_type_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Purchase/tabs', $data);
			$this->load->view('modules/Purchase/edit', $data);
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
		if ($this->roles['manage']) {
			$this->employee_type_model->empStatusID = $id; 
			$this->employee_type_model->getRecord();
			
			// check if any other records referred to this record
			if ($this->employee_type_model->inUsed($id)) {
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Sorry, you can't delete this record!";
				$data["urlredirect"] = "index.php?employee_type/view/$id";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				if ($this->employee_type_model->type) {
					if ($this->employee_type_model->deleteRecord()) {
						// successful
						$data["display"] = "block";
						$data["class"] 	 = "notificationbox";
						$data["msg"] 	 = "Employee Type successfully deleted.";
						$data["urlredirect"] = "index.php?employee_type/show";
						$this->load->view("header",$data);
						$this->load->view("message",$data);
						$this->load->view("footer");
					} else {
						// error
						$data["display"] = "block";
						$data["class"] 	 = "errorbox";
						$data["msg"] 	 = "Error in deleting the Employee Type!";
						$data["urlredirect"] = "";
						$this->load->view("header",$data);
						$this->load->view("message",$data);
						$this->load->view("footer");
					}
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Employee Type record not found!";
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
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Purchase/tabs', $data);
		$this->load->view('modules/Purchase/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$type 		= $this->session->userdata($controller.'_type');
    	$description= $this->session->userdata($controller.'_description');
    	$sortby		= $this->session->userdata($controller.'_sortby');
    	$sortorder	= $this->session->userdata($controller.'_sortorder');
    	$limit 		= $this->session->userdata($controller.'_limit');
		
		if ($type!="")
    		$this->db->like('type', $type,'after');
    		
    	if ($description!="")
    		$this->db->like('description', $description,'after');
    		
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    		
    	if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
	    $data['records'] = $this->db->get('employment_status');
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Purchase/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->employee_type_model->type = $this->input->post('type');
		
		if ($this->employee_type_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
	
}	