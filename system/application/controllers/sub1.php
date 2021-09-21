<?php	

class Brand extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Brand()
	{
		parent::Controller();
		$this->load->model("brand_model");	
		
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
		$this->data['title']   = "Brands";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		$this->roles['create'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Add Brand');
		$this->roles['edit'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Edit Existing Brand');
		$this->roles['delete'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Delete Existing Brand');
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Brand');	
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
			$this->load->view('modules/Item/brand/tabs', $data);
			$this->load->view('modules/Item/brand/create', $data);
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
				$this->brand_model->brandName  	= trim($this->input->post('brandName'));
				$this->brand_model->brandDesc  	= trim($this->input->post('brandDesc'));

				if ($this->brand_model->saveRecord()) {
					$this->brand_model->setRecord();
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Brand successfully saved.";
					$data["urlredirect"] = "index.php?brand/view/".$this->brand_model->brandID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the Brand!";
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
			$this->brand_model->brandID			= trim($this->input->post('brandID'));
			$this->brand_model->brandName		= trim($this->input->post('brandName'));
			$this->brand_model->brandDesc		= trim($this->input->post('brandDesc'));
			$this->brand_model->status			= trim($this->input->post('status'));
			
			if ($this->brand_model->updateRecord()) {
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Brand successfully updated.";
				$data["urlredirect"] = "index.php?brand/view/".$this->brand_model->brandID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the Brand!";
				$data["urlredirect"] = "index.php?brand/view/".$this->brand_model->brandID;
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
			$this->brand_model->brandID = $id; 
			$this->brand_model->getRecord();
			$data['rec'] = $this->brand_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/brand/tabs', $data);
			$this->load->view('modules/Item/brand/view', $data);
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
	        $this->brand_model->brandID = $id; 
			$this->brand_model->getRecord();
			$data['rec'] = $this->brand_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/brand/tabs', $data);
			$this->load->view('modules/Item/brand/edit', $data);
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
			$this->brand_model->brandID = $id; 
			$this->brand_model->getRecord();
			
			// check if any other records referred to this record
			if ($this->brand_model->inUsed($id)) {
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Sorry, you can't delete this record!";
				$data["urlredirect"] = "index.php?brand/view/$id";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				if ($this->brand_model->brandName) {
					if ($this->brand_model->deleteRecord()) {
						// successful
						$data["display"] = "block";
						$data["class"] 	 = "notificationbox";
						$data["msg"] 	 = "Brand successfully deleted.";
						$data["urlredirect"] = "index.php?brand/show";
						$this->load->view("header",$data);
						$this->load->view("message",$data);
						$this->load->view("footer");
					} else {
						// error
						$data["display"] = "block";
						$data["class"] 	 = "errorbox";
						$data["msg"] 	 = "Error in deleting the Brand!";
						$data["urlredirect"] = "";
						$this->load->view("header",$data);
						$this->load->view("message",$data);
						$this->load->view("footer");
					}
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Brand record not found!";
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

    	if ($this->input->post('cmdFilter') || $this->input->post('brandID') || $this->input->post('brandName') || $this->input->post('brandDesc') || $this->input->post('status') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$brandID 		= trim($this->input->post('brandID'));
	    	$brandName 		= trim($this->input->post('brandName'));
	    	$brandDesc		= trim($this->input->post('brandDesc'));
	    	$status			= trim($this->input->post('status'));
			$sortby 		= trim($this->input->post('sortby'));
	    	$sortorder		= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_brandID') || $this->session->userdata($controller.'_brandName') || $this->session->userdata($controller.'_brandDesc') || $this->session->userdata($controller.'_status') || $this->session->userdata($controller.'_sortby') || $this->session->userdata($controller.'_sortorder')) {
	    	$brandID		= $this->session->userdata($controller.'_brandID');
	    	$brandName		= $this->session->userdata($controller.'_brandName');
	    	$brandDesc	= $this->session->userdata($controller.'_brandDesc');
	    	$status			= $this->session->userdata($controller.'_status');
	    	$sortby 		= $this->session->userdata($controller.'_sortby');
	    	$sortorder		= $this->session->userdata($controller.'_sortorder');
		} else {
	    	$brandID		= "";
	    	$brandName		= "";
	    	$brandDesc		= "";
	    	$status			= "";
	    	$sortby 		= "brandName";
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

		$this->session->set_userdata($controller.'_brandID', $brandID);
		$this->session->set_userdata($controller.'_brandName', $brandName);
		$this->session->set_userdata($controller.'_brandDesc', $brandDesc);
		$this->session->set_userdata($controller.'_status', $status);
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
    	$this->session->set_userdata($controller.'_limit', $limit);
    		
    	$data['brandID'] 	= $brandID;
    	$data['brandName'] 	= $brandName;
    	$data['brandDesc']	= $brandDesc;
    	$data['status']		= $status;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder']	= $sortorder;
    	$data['limit'] 		= $limit;

    	if ($brandID!="")
    		$this->db->where('brandID', $brandID);
    		
    	if ($brandName!="")
    		$this->db->like('brandName', $brandName,'after');
    		
    	if ($brandDesc!="")
    		$this->db->like('brandDesc', $brandDesc,'after');
    		
    	if ($status!="")
    		$this->db->where('status', $status);
    		
    	$config['total_rows'] = $data['ttl_rows'] = $this->db->count_all_results('brands');
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?brand/show/';
	    $config['per_page'] = $limit;
		$this->pagination->initialize($config);
			
		if ($brandID!="")
    		$this->db->where('brandID', $brandID);
    		
		if ($brandName!="")
    		$this->db->like('brandName', $brandName,'after');
    		
    	if ($brandDesc!="")
    		$this->db->like('brandDesc', $brandDesc,'after');
    		
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
    	
	    $data['records'] = $this->db->get('brands');
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Item/brand/tabs', $data);
		$this->load->view('modules/Item/brand/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$brandID 		= $this->session->userdata($controller.'_brandID');
    	$brandName 		= $this->session->userdata($controller.'_brandName');
    	$brandDesc		= $this->session->userdata($controller.'_brandDesc');
    	$status			= $this->session->userdata($controller.'_status');
    	$sortby			= $this->session->userdata($controller.'_sortby');
    	$sortorder		= $this->session->userdata($controller.'_sortorder');
    	$limit 			= $this->session->userdata($controller.'_limit');
		
    	if ($brandID!="")
    		$this->db->where('brandID', $brandID);
    		
		if ($brandName!="")
    		$this->db->like('brandName', $brandName,'after');
    		
    	if ($brandDesc!="")
    		$this->db->like('brandDesc', $brandDesc,'after');

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
    	
	    $data['records'] = $this->db->get('brands');
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Item/brand/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->brand_model->brandName = $this->input->post('brandName');
		
		if ($this->brand_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
	
}	