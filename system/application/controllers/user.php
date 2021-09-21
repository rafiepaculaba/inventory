<?php

class User extends Controller 
{
	var $common_menu;
	var $data;

	function User()
	{
		parent::Controller();	
		$this->load->model('user_model');
		
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
		$this->data['title']   = "Users";
		
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
		    //get all user groups
		    $data['groups'] = $this->db->get('usergroups');

			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Admin/users/tabs', $data);
			$this->load->view('modules/Admin/users/create', $data);
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
			if ($this->input->post('userName')) {
				$this->user_model->userID	  	= md5(trim($this->input->post('userName')));
				$this->user_model->idno 	  	= trim($this->input->post('idno'));
				$this->user_model->userName  	= trim($this->input->post('userName'));
				$this->user_model->userPswd 	= md5(trim($this->input->post('userPswd')));
				$this->user_model->lastName 	= trim($this->input->post('lastName'));
				$this->user_model->firstName 	= trim($this->input->post('firstName'));
				$this->user_model->middleName 	= trim($this->input->post('middleName'));
				$this->user_model->dateEntered 	= date("Y-m-d H:i:s",time());
				$this->user_model->groupID 		= trim($this->input->post('groupID'));
				$this->user_model->theme 		= trim($this->input->post('theme'));
				
				if ($this->input->post('isAdmin')!="" && $this->input->post('isAdmin')=="1" )
					$this->user_model->isAdmin 		= 1;
				else
					$this->user_model->isAdmin 		= 0;
				
				$this->user_model->preferences = "";	
				if (count($this->input->post('modules'))) {
					$ctr=0;
					foreach ($this->input->post('modules') as $tab)	 {
						if ($ctr) 
							$this->user_model->preferences .= ",".$tab;					
						else
							$this->user_model->preferences .= $tab;		
							
						$ctr++;			
					}
				}
				
				
				if ($this->user_model->saveRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "User successfully saved.";
					$data["urlredirect"] = "index.php?user/view/".$this->user_model->userID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the user!";
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
				$this->user_model->userID 		= trim($this->input->post('userID'));
				$this->user_model->idno 		= trim($this->input->post('idno'));
				$this->user_model->lastName 	= trim($this->input->post('lastName'));
				$this->user_model->firstName 	= trim($this->input->post('firstName'));
				$this->user_model->middleName 	= trim($this->input->post('middleName'));
				$this->user_model->groupID 		= trim($this->input->post('groupID'));
				$this->user_model->rstatus 		= trim($this->input->post('rstatus'));
				$this->user_model->theme 		= trim($this->input->post('theme'));
				
				if ($this->input->post('isAdmin')!="" && $this->input->post('isAdmin')=="1" )
					$this->user_model->isAdmin 		= 1;
				else
					$this->user_model->isAdmin 		= 0;
					
				$this->user_model->preferences = "";
				$mods = $this->input->post('modules');	
				if ($mods) {
					$ctr=0;
					foreach ($mods as $tab)	 {
						if ($ctr) 
							$this->user_model->preferences .= ",".$tab;					
						else
							$this->user_model->preferences .= $tab;		
							
						$ctr++;			
					}
				}
					
				if ($this->user_model->updateRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] = "notificationbox";
					$data["msg"] = "User successfully updated.";
					$data["urlredirect"] = "index.php?user/view/".$this->user_model->userID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] = "errorbox";
					$data["msg"] = "Error in updating the user!";
					$data["urlredirect"] = "index.php?user/view/".$this->user_model->userID;
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
	
	function update_profile()
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
		
		if ($this->input->post('cmdSave')) {
			$this->user_model->userID 		= $this->session->userdata('current_userID');
			$this->user_model->lastName 	= trim($this->input->post('lastName'));
			$this->user_model->firstName 	= trim($this->input->post('firstName'));
			$this->user_model->middleName 	= trim($this->input->post('middleName'));
			$this->user_model->theme	 	= trim($this->input->post('theme'));

			if ($this->user_model->updateRecordProfile()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "User successfully updated.";
				$data["urlredirect"] = "index.php?user/profile";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the user!";
				$data["urlredirect"] = "index.php?user/profile";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			}
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
			$this->load->model('userrole_model');
			
			$userID = $this->input->post('userID');
			$add	= $this->input->post('chkAdd');
			$view	= $this->input->post('chkView');
			$edit	= $this->input->post('chkEdit');
			$delete	= $this->input->post('chkDelete');
			$approve= $this->input->post('chkApprove');
			
			// delete existing set of roles
			$this->db->where('userID',$userID);
			$this->db->delete('userroles');
			
			// add roles
			if (!empty($add)) {
				foreach($add as $roleID) {
					$this->userrole_model->userID = $userID;
					$this->userrole_model->roleID = $roleID;
					$this->userrole_model->saveRecord();
				}
			}
			
			// view roles
			if (!empty($view)) {
				foreach($view as $roleID) {
					$this->userrole_model->userID = $userID;
					$this->userrole_model->roleID = $roleID;
					$this->userrole_model->saveRecord();
				}
			}
			
			// edit roles
			if (!empty($edit)) {
				foreach($edit as $roleID) {
					$this->userrole_model->userID = $userID;
					$this->userrole_model->roleID = $roleID;
					$this->userrole_model->saveRecord();
				}
			}
			
			// delete roles
			if (!empty($delete)) {
				foreach($delete as $roleID) {
					$this->userrole_model->userID = $userID;
					$this->userrole_model->roleID = $roleID;
					$this->userrole_model->saveRecord();
				}
			}
			
			// approve roles
			if (!empty($approve)) {
				foreach($approve as $roleID) {
					$this->userrole_model->userID = $userID;
					$this->userrole_model->roleID = $roleID;
					$this->userrole_model->saveRecord();
				}
			}
			
			// successful
			$data["display"] = "block";
			$data["class"] = "notificationbox";
			$data["msg"] = "User Roles successfully updated.";
			$data["urlredirect"] = "index.php?user/view/".$userID;
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
	
	
	function view($userID = 0)
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
		
		$this->user_model->userID = $userID; 
		$this->user_model->getRecord();
		$data['rec'] = $this->user_model;

		// get all userroles
		$data['userroles'] = $this->user_model->roles;

		$taken_roles = array();
		if ($data['userroles']->num_rows()) {
			$taken_roles = array();
			foreach($data['userroles']->result() as $role) {
				$taken_roles[] = $role->roleID;
			}
		}
		
		// get all roles
		$this->load->model('role_model');
		if (!empty($taken_roles))
			$this->db->where_not_in('roleID',$taken_roles);
			
		$data['roles'] = $this->role_model->getAll();
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/users/tabs', $data);
		$this->load->view('modules/Admin/users/view', $data);
		$this->load->view('footer');
	}
	
	function profile()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "My Profile";
		//************** end general settings *******************
		$userID = $this->session->userdata('current_userID');
		
		$this->user_model->userID = $userID; 
		$this->user_model->getRecord();
		$data['rec'] = $this->user_model;
		
		// get all usergrouproles
		$data['userroles'] = $this->user_model->roles;

		$taken_roles = array();
		if ($data['userroles']->num_rows()) {
			$taken_roles = array();
			foreach($data['userroles']->result() as $role) {
				$taken_roles[] = $role->roleID;
			}
		}
		
		// get all roles
		$this->load->model('role_model');
		if (!empty($taken_roles))
			$this->db->where_not_in('roleID',$taken_roles);
			
		$data['roles'] = $this->role_model->getAll();
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/users/profile', $data);
		$this->load->view('footer');
	}
	
	function edit($userID = 0)
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
		    //get all user groups
		    $data['groups'] = $this->db->get('usergroups');
			
			$this->user_model->userID = $userID; 
			$this->user_model->getRecord();
			$data['rec'] = $this->user_model;
	
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Admin/users/tabs', $data);
			$this->load->view('modules/Admin/users/edit', $data);
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
	
	function edit_profile()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "My Profile";
		//************** end general settings *******************
		
	    //get all user groups
	    $data['groups'] = $this->db->get('usergroups');
		
		$this->user_model->userID = $this->session->userdata('current_userID'); 
		$this->user_model->getRecord();
		$data['rec'] = $this->user_model;

		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/users/edit_profile', $data);
		$this->load->view('footer');
	}
	
	function edit_password($userID = 0)
	{
		//************** general settings *******************
		// global settings
		include('includes/settings.php');
		$this->check_roles();
		//************** end general settings *******************
		
		$this->user_model->userID = $userID; 
		$this->user_model->getRecord();
		$data['rec'] = $this->user_model;
		
		// load views
		$this->load->view('header_popup', $data);
		$this->load->view('modules/Admin/users/edit_password', $data);
		$this->load->view('footer_popup');
	}
	
	function save_password()
	{
		//************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		//************** end general settings *******************
		
		if ($this->input->post('userID')) {
			$this->user_model->userID 	= trim($this->input->post('userID'));
			$this->user_model->userPswd = md5(trim($this->input->post('userPswd')));

			if ($this->user_model->update_password()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Password successfully updated.";
				$data["urlredirect"] = "refresh";
				$this->load->view("header_popup",$data);
				$this->load->view("message",$data);
				$this->load->view("footer_popup");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the password!";
				$data["urlredirect"] = "refresh";
				$this->load->view("header_popup",$data);
				$this->load->view("message",$data);
				$this->load->view("footer_popup");
			}
		}
	}
	
	
	function delete($userID = 0)
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
			$this->user_model->userID = $userID; 
			$this->user_model->getRecord();
			
			if ($this->user_model->userName) {
				if ($this->user_model->deleteRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "User successfully deleted.";
					$data["urlredirect"] = "index.php?user/";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the user!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "User record not found!";
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
			$this->load->model('userrole_model');
			$userID = $this->input->post('userID');
			// add roles
			if (count($this->input->post('chkAdd'))>0) {
				foreach ($this->input->post('chkAdd') as $role) {
					$this->userrole_model->userID = $userID;
					$this->userrole_model->roleID = $role;
					$this->userrole_model->saveRecord();
				}
			}
			
			// redirect to view
			header('location: index.php?user/view/'.$userID);
		}
	}
	
	function delete_roles()
	{
		if ($this->input->post('cmdDeleteRole')) {
			$this->load->model('userrole_model');
			$userID = $this->input->post('userID');
			// add roles
			if (count($this->input->post('chkDelete'))>0) {
				foreach ($this->input->post('chkDelete') as $gr) {
					$this->userrole_model->id = $gr;
					$this->userrole_model->deleteRecord();
				}
			}
			
			// redirect to view
			header('location: index.php?user/view/'.$userID);
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
		
	    //get all user groups
	    $data['groups'] = $this->db->get('usergroups');
		
		// get offset
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	if ($this->input->post('cmdFilter') || $this->input->post('lastName') || $this->input->post('userName') || $this->input->post('groupID') || $this->input->post('isAdmin') || $this->input->post('rstatus') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$lastName	= trim($this->input->post('lastName'));
	    	$userName	= trim($this->input->post('userName'));
	    	$groupID 	= trim($this->input->post('groupID'));
	    	$isAdmin 	= trim($this->input->post('isAdmin'));
	    	$rstatus 	= trim($this->input->post('rstatus'));
	    	$sortby   	= trim($this->input->post('sortby'));
	    	$sortorder 	= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata('user_lastName') || $this->session->userdata('user_userName') || $this->session->userdata('user_groupID') || $this->session->userdata('user_isAdmin') || $this->session->userdata('user_rstatus') || $this->session->userdata('user_sortby') || $this->session->userdata('user_sortorder')) {
			$lastName   = $this->session->userdata('user_lastName');
	    	$userName 	= $this->session->userdata('user_userName');
	    	$groupID 	= $this->session->userdata('user_groupID');
	    	$isAdmin 	= $this->session->userdata('user_isAdmin');
	    	$rstatus 	= $this->session->userdata('user_rstatus');
	    	$sortby 	= $this->session->userdata('user_sortby');
	    	$sortorder 	= $this->session->userdata('user_sortorder');
		} else {
			$lastName 	= "";
			$userName 	= "";
			$groupID 	= "";
			$isAdmin 	= "";
			$rstatus 	= "";
			$sortby 	= "lastName";
			$sortorder 	= "ASC";
		}
		
		if ($this->input->post('limit')) {
			if ($this->input->post('limit')=="All") {
				$limit = "";
			} else{
				$limit = $this->input->post('limit');
			}
		} else if ($this->session->userdata('user_limit')) {
			$limit = $this->session->userdata('user_limit');
		} else {
			$limit = 25; // default limit
		}
		
		$this->session->set_userdata('user_lastName', $lastName);
    	$this->session->set_userdata('user_userName', $userName);
    	$this->session->set_userdata('user_groupID', $groupID);
    	$this->session->set_userdata('user_isAdmin', $isAdmin);
    	$this->session->set_userdata('user_rstatus', $rstatus);
    	$this->session->set_userdata('user_limit', $limit);
    	$this->session->set_userdata('user_sortby', $sortby);
    	$this->session->set_userdata('user_sortorder', $sortorder);
	    	
    	$data['lastName'] 	= $lastName;
    	$data['userName'] 	= $userName;
    	$data['groupID'] 	= $groupID;
    	$data['isAdmin'] 	= $isAdmin;
    	$data['rstatus'] 	= $rstatus;
    	$data['limit'] 		= $limit;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder'] 	= $sortorder;
		
		$this->db->select('users.*');
		$this->db->select('usergroups.groupName');
		$this->db->from('users');
		$this->db->join('usergroups','users.groupID=usergroups.groupID','left');
	    
	    if ($lastName!="")
    		$this->db->like('lastName', $lastName, 'after'); 
    	
    	if ($userName!="")
    		$this->db->like('userName', $userName, 'after'); 
    		
    	if ($groupID!="")
    		$this->db->where('users.groupID', $groupID);
    			
    	if ($isAdmin!="")
    		$this->db->where('isAdmin', $isAdmin);
    	
		if ($rstatus!="")
    		$this->db->where('users.rstatus', $rstatus);
	    
    	
	    $data['ttl_rows'] = $config['total_rows'] = $this->db->count_all_results();
		// set pagination	
		$config['base_url'] = base_url().'index.php?user/show/';
	    $config['per_page'] = $limit;

		$this->pagination->initialize($config);
		
		$this->db->select('users.*');
		$this->db->select('usergroups.groupName');
		$this->db->from('users');
		$this->db->join('usergroups','users.groupID=usergroups.groupID','left');
	    
	    if ($lastName!="")
    		$this->db->like('lastName', $lastName, 'after'); 
    	
    	if ($userName!="")
    		$this->db->like('userName', $userName, 'after'); 
    		
    	if ($groupID!="")
    		$this->db->where('users.groupID', $groupID);
    			
    	if ($isAdmin!="")
    		$this->db->where('isAdmin', $isAdmin);
    	
		if ($rstatus!="")
    		$this->db->where('users.rstatus', $rstatus);
	    
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
		$this->load->view('header', $data);
		$this->load->view('modules/Admin/users/tabs', $data);
		$this->load->view('modules/Admin/users/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

		$lastName   = $this->session->userdata($controller.'_lastName');
    	$userName 	= $this->session->userdata($controller.'_userName');
    	$groupID 	= $this->session->userdata($controller.'_groupID');
    	$isAdmin 	= $this->session->userdata($controller.'_isAdmin');
    	$rstatus 	= $this->session->userdata($controller.'_rstatus');
    	$sortby 	= $this->session->userdata($controller.'_sortby');
    	$sortorder 	= $this->session->userdata($controller.'_sortorder');
    	$limit 		= $this->session->userdata($controller.'_limit');
	
		
		$this->db->select('users.*');
		$this->db->select('usergroups.groupName');
		$this->db->from('users');
		$this->db->join('usergroups','users.groupID=usergroups.groupID','left');
	    
	    if ($lastName!="")
    		$this->db->like('lastName', $lastName, 'after'); 
    	
    	if ($userName!="")
    		$this->db->like('userName', $userName, 'after'); 
    		
    	if ($groupID!="")
    		$this->db->where('users.groupID', $groupID);
    			
    	if ($isAdmin!="")
    		$this->db->where('isAdmin', $isAdmin);
    	
		if ($rstatus!="")
    		$this->db->where('users.rstatus', $rstatus);
	    
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
		$this->load->view('print_page_header');
		$this->load->view('modules/Admin/users/printlist', $data);
		$this->load->view('print_footer');
	}
	
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->user_model->userName = $this->input->post('userName');
		
		if ($this->user_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}

	
}