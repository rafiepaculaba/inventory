<?php	

class Category extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Category()
	{
		parent::Controller();
		$this->load->model("category_model");	
		
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
		
		$this->load->view("modules/Item/submenu");
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Categories";
		
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
			$this->load->view('modules/Item/category/tabs', $data);
			$this->load->view('modules/Item/category/create', $data);
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
				$this->category_model->catName  	= trim($this->input->post('catName'));
				$this->category_model->catDesc  	= trim($this->input->post('catDesc'));

				if ($this->category_model->saveRecord()) {
					$this->category_model->setRecord();
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Category successfully saved.";
					$data["urlredirect"] = "index.php?category/view/".$this->category_model->catID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the Category!";
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
			$this->category_model->catID		= trim($this->input->post('catID'));
			$this->category_model->catName		= trim($this->input->post('catName'));
			$this->category_model->catDesc		= trim($this->input->post('catDesc'));
			$this->category_model->status		= trim($this->input->post('status'));
			
			if ($this->category_model->updateRecord()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Category successfully updated.";
				$data["urlredirect"] = "index.php?category/view/".$this->category_model->catID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the Category!";
				$data["urlredirect"] = "index.php?category/view/".$this->category_model->catID;
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
			$this->category_model->catID = $id; 
			$this->category_model->getRecord();
			$data['rec'] = $this->category_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/category/tabs', $data);
			$this->load->view('modules/Item/category/view', $data);
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
	        $this->category_model->catID = $id; 
			$this->category_model->getRecord();
			$data['rec'] = $this->category_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/category/tabs', $data);
			$this->load->view('modules/Item/category/edit', $data);
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
			$this->category_model->catID = $id; 
			$this->category_model->getRecord();
			
			// check if any other records referred to this record
			if ($this->category_model->inUsed($id)) {
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Sorry, you can't delete this record!";
				$data["urlredirect"] = "index.php?category/view/$id";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				if ($this->category_model->catName) {
					if ($this->category_model->deleteRecord()) {
						// successful
						$data["display"] = "block";
						$data["class"] 	 = "notificationbox";
						$data["msg"] 	 = "Category successfully deleted.";
						$data["urlredirect"] = "index.php?category/show";
						$this->load->view("header",$data);
						$this->load->view("message",$data);
						$this->load->view("footer");
					} else {
						// error
						$data["display"] = "block";
						$data["class"] 	 = "errorbox";
						$data["msg"] 	 = "Error in deleting the Category!";
						$data["urlredirect"] = "";
						$this->load->view("header",$data);
						$this->load->view("message",$data);
						$this->load->view("footer");
					}
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Category record not found!";
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
		
		$controller = $this->uri->segment(1);
		
		// get offset
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	if ($this->input->post('cmdFilter') || $this->input->post('catID') || $this->input->post('catName') || $this->input->post('catDesc') || $this->input->post('status') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$catID 			= trim($this->input->post('catID'));
	    	$catName 		= trim($this->input->post('catName'));
	    	$catDesc		= trim($this->input->post('catDesc'));
	    	$status			= trim($this->input->post('status'));
			$sortby 		= trim($this->input->post('sortby'));
	    	$sortorder		= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_catID') || $this->session->userdata($controller.'_catName') || $this->session->userdata($controller.'_catDesc') || $this->session->userdata($controller.'_status') || $this->session->userdata($controller.'_sortby') || $this->session->userdata($controller.'_sortorder')) {
	    	$catID			= $this->session->userdata($controller.'_catID');
	    	$catName		= $this->session->userdata($controller.'_catName');
	    	$catDesc		= $this->session->userdata($controller.'_catDesc');
	    	$status			= $this->session->userdata($controller.'_status');
	    	$sortby 		= $this->session->userdata($controller.'_sortby');
	    	$sortorder		= $this->session->userdata($controller.'_sortorder');
		} else {
	    	$catID			= "";
	    	$catName		= "";
	    	$catDesc		= "";
	    	$status			= "";
	    	$sortby 		= "catName";
	    	$sortorder		= "ASC";
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

		$this->session->set_userdata($controller.'_catID', $catID);
		$this->session->set_userdata($controller.'_catName', $catName);
		$this->session->set_userdata($controller.'_catDesc', $catDesc);
		$this->session->set_userdata($controller.'_status', $status);
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
    	$this->session->set_userdata($controller.'_limit', $limit);
    		
    	$data['catID'] 		= $catID;
    	$data['catName'] 	= $catName;
    	$data['catDesc']	= $catDesc;
    	$data['status']		= $status;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder']	= $sortorder;
    	$data['limit'] 		= $limit;

    	if ($catID!="")
    		$this->db->where('catID', $catID);
    		
    	if ($catName!="")
    		$this->db->like('catName', $catName,'after');
    		
    	if ($catDesc!="")
    		$this->db->like('catDesc', $catDesc,'after');
    		
    	if ($status!="")
    		$this->db->where('status', $status);
    		
    	$config['total_rows'] = $data['ttl_rows'] = $this->db->count_all_results('categories');
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?category/show/';
	    $config['per_page'] = $limit;
		$this->pagination->initialize($config);
			
		if ($catID!="")
    		$this->db->where('catID', $catID);
    		
		if ($catName!="")
    		$this->db->like('catName', $catName,'after');
    		
    	if ($catDesc!="")
    		$this->db->like('catDesc', $catDesc,'after');
    		
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
    	
	    $data['records'] = $this->db->get('categories');
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Item/category/tabs', $data);
		$this->load->view('modules/Item/category/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$catID 			= $this->session->userdata($controller.'_catID');
    	$catName 		= $this->session->userdata($controller.'_catName');
    	$catDesc		= $this->session->userdata($controller.'_catDesc');
    	$status			= $this->session->userdata($controller.'_status');
    	$sortby			= $this->session->userdata($controller.'_sortby');
    	$sortorder		= $this->session->userdata($controller.'_sortorder');
    	$limit 			= $this->session->userdata($controller.'_limit');
		
    	if ($catID!="")
    		$this->db->where('catID', $catID);
    		
		if ($catName!="")
    		$this->db->like('catName', $catName,'after');
    		
    	if ($catDesc!="")
    		$this->db->like('catDesc', $catDesc,'after');

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
    	
	    $data['records'] = $this->db->get('categories');
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Item/category/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->category_model->catName = $this->input->post('catName');
		
		if ($this->category_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
	
}	