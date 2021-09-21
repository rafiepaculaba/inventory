<?php

class Group extends Controller 
{
	var $common_menu;
	var $data;

	function Group()
	{
		parent::Controller();	
		$this->load->model('usergroup_model');
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
		$this->data['module_privileges'] = $module_privileges;
		$this->data['report_privileges'] = $report_privileges;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "User Groups";
		
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
			$this->load->view('modules/Admin/groups/tabs', $data);
			$this->load->view('modules/Admin/groups/create', $data);
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
			if ($this->input->post('groupName')) {
				$this->usergroup_model->groupName  	= trim($this->input->post('groupName'));
				$this->usergroup_model->groupDesc 	= trim($this->input->post('groupDesc'));
				
				if ($this->usergroup_model->saveRecord()) {
					$this->usergroup_model->groupDesc = $this->usergroup_model->setGroup($this->usergroup_model->groupName);
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "User Group successfully saved.";
					$data["urlredirect"] = "index.php?group/view/".$this->usergroup_model->groupID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the user group!";
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
				$this->usergroup_model->groupID 	= $this->input->post('groupID');
				$this->usergroup_model->groupDesc 	= $this->input->post('groupDesc');
				$this->usergroup_model->rstatus 	= $this->input->post('rstatus');
				
				if ($this->usergroup_model->updateRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] = "notificationbox";
					$data["msg"] = "User Group successfully updated.";
					$data["urlredirect"] = "index.php?group/view/".$this->usergroup_model->groupID;
					$this->load->view("header.php",$data);
					$this->load->view("message.php",$data);
					$this->load->view("footer.php");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] = "errorbox";
					$data["msg"] = "Error in updating the user group!";
					$data["urlredirect"] = "index.php?group/view/".$this->usergroup_model->groupID;
					$this->load->view("header.php",$data);
					$this->load->view("message.php",$data);
					$this->load->view("footer.php");
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
	
	function update_roles()
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
			$this->load->model('usergrouprole_model');
			
			$groupID= $this->input->post('groupID');
			$add	= $this->input->post('chkAdd');
			$view	= $this->input->post('chkView');
			$edit	= $this->input->post('chkEdit');
			$delete	= $this->input->post('chkDelete');
			$approve= $this->input->post('chkApprove');
			
			// delete existing set of roles
			$this->db->where('groupID',$groupID);
			$this->db->delete('usergrouproles');
			
			// add roles
			if (!empty($add)) {
				foreach($add as $roleID) {
					$this->usergrouprole_model->groupID = $groupID;
					$this->usergrouprole_model->roleID 	= $roleID;
					$this->usergrouprole_model->saveRecord();
				}
			}
			
			// view roles
			if (!empty($view)) {
				foreach($view as $roleID) {
					$this->usergrouprole_model->groupID = $groupID;
					$this->usergrouprole_model->roleID 	= $roleID;
					$this->usergrouprole_model->saveRecord();
				}
			}
			
			// edit roles
			if (!empty($edit)) {
				foreach($edit as $roleID) {
					$this->usergrouprole_model->groupID = $groupID;
					$this->usergrouprole_model->roleID 	= $roleID;
					$this->usergrouprole_model->saveRecord();
				}
			}
			
			// delete roles
			if (!empty($delete)) {
				foreach($delete as $roleID) {
					$this->usergrouprole_model->groupID = $groupID;
					$this->usergrouprole_model->roleID 	= $roleID;
					$this->usergrouprole_model->saveRecord();
				}
			}
			
			// approve roles
			if (!empty($approve)) {
				foreach($approve as $roleID) {
					$this->usergrouprole_model->groupID = $groupID;
					$this->usergrouprole_model->roleID 	= $roleID;
					$this->usergrouprole_model->saveRecord();
				}
			}
			
			// successful
			$data["display"] = "block";
			$data["class"] = "notificationbox";
			$data["msg"] = "User Group successfully updated.";
			$data["urlredirect"] = "index.php?group/view/".$groupID;
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
	
	
	function view($groupID = 0)
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
		
		$this->usergroup_model->groupID = $groupID; 
		$this->usergroup_model->getRecord();
		$data['rec'] = $this->usergroup_model;
		
		// get all usergrouproles
		$data['usergrouproles'] = $this->usergroup_model->roles;

		// empty the roles table
		$this->load->model('role_model');
		$this->db->query('truncate roles');
		if (!empty($data['module_privileges'])) {
			$ctr = 1000;
			foreach($data['module_privileges'] as $key=>$row) {
				// add privilege
				$this->role_model->roleID = $ctr;
				$this->role_model->module = $key;
				$this->role_model->roleName = "Add $key";
				$this->role_model->roleDesc = "Add New $key";
				$this->role_model->saveRecord();
				
				// view privilege
				$this->role_model->roleID = $ctr+1;
				$this->role_model->module = $key;
				$this->role_model->roleName = "View $key";
				$this->role_model->roleDesc = "View $key";
				$this->role_model->saveRecord();
				
				// edit privilege
				$this->role_model->roleID = $ctr+2;
				$this->role_model->module = $key;
				$this->role_model->roleName = "Edit Existing $key";
				$this->role_model->roleDesc = "Edit Existing $key";
				$this->role_model->saveRecord();
				
				// delete privilege
				$this->role_model->roleID = $ctr+3;
				$this->role_model->module = $key;
				$this->role_model->roleName = "Delete Existing $key";
				$this->role_model->roleDesc = "Delete Existing $key";
				$this->role_model->saveRecord();
				
				// approve privilege
				$this->role_model->roleID = $ctr+4;
				$this->role_model->module = $key;
				$this->role_model->roleName = "Approve $key";
				$this->role_model->roleDesc = "Approve $key";
				$this->role_model->saveRecord();
				
				if (!empty($row)) {
					$i = 10;
					foreach($row as $sub) {
						
						// add privilege
						$this->role_model->roleID = $ctr+$i;
						$this->role_model->module = $sub;
						$this->role_model->roleName = "Add $sub";
						$this->role_model->roleDesc = "Add New $sub";
						$this->role_model->saveRecord();
						
						// view privilege
						$this->role_model->roleID = $ctr+$i+1;
						$this->role_model->module = $sub;
						$this->role_model->roleName = "View $sub";
						$this->role_model->roleDesc = "View $sub";
						$this->role_model->saveRecord();
						
						// edit privilege
						$this->role_model->roleID = $ctr+$i+2;
						$this->role_model->module = $sub;
						$this->role_model->roleName = "Edit Existing $sub";
						$this->role_model->roleDesc = "Edit Existing $sub";
						$this->role_model->saveRecord();
						
						// delete privilege
						$this->role_model->roleID = $ctr+$i+3;
						$this->role_model->module = $sub;
						$this->role_model->roleName = "Delete Existing $sub";
						$this->role_model->roleDesc = "Delete Existing $sub";
						$this->role_model->saveRecord();
						
						// approve privilege
						$this->role_model->roleID = $ctr+$i+4;
						$this->role_model->module = $sub;
						$this->role_model->roleName = "Approve $sub";
						$this->role_model->roleDesc = "Approve $sub";
						$this->role_model->saveRecord();
						
						$i+=10; 
					}
				}
				$ctr+=1000;
			}
		}
		
		if (!empty($data['report_privileges'])) {
			$ctr = 1;
			foreach($data['report_privileges'] as $row) {
				// report privilege
				$this->role_model->roleID = $ctr;
				$this->role_model->module = 'Report';
				$this->role_model->roleName = "View $row";
				$this->role_model->roleDesc = "View $row";
				$this->role_model->saveRecord();
				
				$ctr++;
			}
		}

		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/groups/tabs', $data);
		$this->load->view('modules/Admin/groups/view', $data);
		$this->load->view('footer');
	}
	
	function edit($groupID = 0)
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
			$this->usergroup_model->groupID = $groupID; 
			$this->usergroup_model->getRecord();
			$data['rec'] = $this->usergroup_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Admin/groups/tabs', $data);
			$this->load->view('modules/Admin/groups/edit', $data);
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
	
	
	function delete($groupID = 0)
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
			$this->usergroup_model->groupID = $groupID; 
			$this->usergroup_model->getRecord();
			
			if ($this->usergroup_model->groupName) {
				if ($this->usergroup_model->deleteRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "User Group successfully deleted.";
					$data["urlredirect"] = "index.php?group/";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the user group!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "User Group record not found!";
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
	
	function add_roles()
	{
		if ($this->input->post('cmdAddRole')) {
			$this->load->model('usergrouprole_model');
			$groupID = $this->input->post('groupID');
			// add roles
			if (count($this->input->post('chkAdd'))>0) {
				foreach ($this->input->post('chkAdd') as $role) {
					$this->usergrouprole_model->groupID = $groupID;
					$this->usergrouprole_model->roleID 	= $role;
					$this->usergrouprole_model->saveRecord();
				}
			}
			
			// redirect to view
			header('location: index.php?group/view/'.$groupID);
		}
	}
	
	function delete_roles()
	{
		if ($this->input->post('cmdDeleteRole')) {
			$this->load->model('usergrouprole_model');
			$groupID = $this->input->post('groupID');
			// add roles
			if (count($this->input->post('chkDelete'))>0) {
				foreach ($this->input->post('chkDelete') as $gr) {
					$this->usergrouprole_model->grID = $gr;
					$this->usergrouprole_model->deleteRecord();
				}
			}
			
			// redirect to view
			header('location: index.php?group/view/'.$groupID);
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
		
		// get offset
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	if ($this->input->post('cmdFilter') || $this->input->post('groupName') || $this->input->post('groupDesc') || $this->input->post('rstatus') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$groupName	= trim($this->input->post('groupName'));
	    	$groupDesc 	= trim($this->input->post('groupDesc'));
	    	$rstatus 	= trim($this->input->post('rstatus'));
	    	$sortby   	= trim($this->input->post('sortby'));
	    	$sortorder 	= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata('group_groupName') || $this->session->userdata('group_groupDesc') || $this->session->userdata('group_rstatus') || $this->session->userdata('group_sortby') || $this->session->userdata('group_sortorder')) {
			$groupName  = $this->session->userdata('group_groupName');
	    	$groupDesc 	= $this->session->userdata('group_groupDesc');
	    	$rstatus 	= $this->session->userdata('group_rstatus');
	    	$sortby 	= $this->session->userdata('group_sortby');
	    	$sortorder 	= $this->session->userdata('group_sortorder');
		} else {
			$groupName 	  = "";
			$groupDesc 	  = "";
			$rstatus 	  = "";
			$sortby 	  = "groupName";
			$sortorder = "ASC";
		}
		
		if ($this->input->post('limit')) {
			if ($this->input->post('limit')=="All") {
				$limit = "";
			} else{
				$limit = $this->input->post('limit');
			}
		} else if ($this->session->userdata('group_limit')) {
			$limit = $this->session->userdata('group_limit');
		} else {
			$limit = 25; // default limit
		}
		
		$this->session->set_userdata('group_groupName', $groupName);
    	$this->session->set_userdata('group_groupDesc', $groupDesc);
    	$this->session->set_userdata('group_rstatus', $rstatus);
    	$this->session->set_userdata('group_limit', $limit);
    	$this->session->set_userdata('group_sortby', $sortby);
    	$this->session->set_userdata('group_sortorder', $sortorder);
	    	
    	$data['groupName'] 	= $groupName;
    	$data['groupDesc'] 	= $groupDesc;
    	$data['rstatus'] 	= $rstatus;
    	$data['limit'] 		= $limit;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder'] 	= $sortorder;
    	
		$this->db->from('usergroups');
	    if ($groupName!="")
    		$this->db->like('groupName', $groupName, 'after'); 
    	
    	if ($groupDesc!="")
    		$this->db->like('groupDesc', $groupDesc, 'after'); 
    		
    	if ($rstatus!="")
    		$this->db->where('rstatus', $rstatus);
	    
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
	    
	    $data['ttl_rows'] = $config['total_rows'] = $data['records']->num_rows();
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?group/show/';
	    $config['per_page'] = $limit;

		$this->pagination->initialize($config);
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/groups/tabs', $data);
		$this->load->view('modules/Admin/groups/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;
	    	
		$groupName  = $this->session->userdata($controller.'_groupName');
    	$groupDesc 	= $this->session->userdata($controller.'_groupDesc');
    	$rstatus 	= $this->session->userdata($controller.'_rstatus');
    	$sortby 	= $this->session->userdata($controller.'_sortby');
    	$sortorder 	= $this->session->userdata($controller.'_sortorder');
		$limit 		= $this->session->userdata($controller.'_limit');
		
		$this->db->select('usergroups.*');
		$this->db->from('usergroups');
	
	    if ($groupName!="")
    		$this->db->like('groupName', $groupName, 'after'); 
    	
    	if ($groupDesc!="")
    		$this->db->like('groupDesc', $groupDesc, 'after'); 
    		
    	if ($rstatus!="")
    		$this->db->where('rstatus', $rstatus);
	    
	     if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    	
    	$queryResult = $this->db->get();
	    $data['records'] = $queryResult;
		
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('print_page_header', $data);
		$this->load->view('modules/Admin/groups/printlist', $data);
		$this->load->view('print_footer');
	}
	
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->usergroup_model->groupName = $this->input->post('groupName');
		
		if ($this->usergroup_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
}