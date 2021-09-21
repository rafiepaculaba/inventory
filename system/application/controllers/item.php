<?php	

class Item extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Item()
	{
		parent::Controller();
		$this->load->model("item_model");	
//		$this->load->model("inventory_model");	
		
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
		$this->data['title']   = "Items";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		$this->roles['create'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Add Item');
		$this->roles['edit'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Edit Existing Item');
		$this->roles['delete'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Delete Existing Item');
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Item');	
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
			
			//get all brands
			$this->db->order_by('brandName','ASC');
			$data['brands'] 	= $this->db->get('brands');
			
			//get all categories
			$this->db->order_by('catName','ASC');
			$data['categories'] = $this->db->get('categories');
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/item/tabs', $data);
			$this->load->view('modules/Item/item/create', $data);
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
				$this->item_model->itemCode  	= trim($this->input->post('itemCode'));
				$this->item_model->accountCode  = trim($this->input->post('accountCode'));
				$this->item_model->type  		= trim($this->input->post('type'));
				$this->item_model->catID  		= trim($this->input->post('catID'));
				$this->item_model->brandID  	= trim($this->input->post('brandID'));
				$this->item_model->item  		= trim($this->input->post('item'));
				$this->item_model->description  = trim($this->input->post('description'));
				$this->item_model->unitCost1  	= trim($this->input->post('unitCost1'));
				$this->item_model->unitCost2  	= trim($this->input->post('unitCost2'));
				$this->item_model->unitCost3  	= trim($this->input->post('unitCost3'));
				$this->item_model->umsr  		= trim($this->input->post('umsr'));

				if ($this->item_model->saveRecord()) {
					$this->item_model->setRecord();
					
					$this->inventory_model->itemCode  		= trim($this->input->post('itemCode'));
					$this->inventory_model->location  		= trim($this->input->post('location'));
					$this->inventory_model->reorderLevel  	= 0;
					$this->inventory_model->qty			  	= 0;
					$this->inventory_model->saveRecord();
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Item successfully saved.";
					$data["urlredirect"] = "index.php?item/view/".$this->item_model->itemCode;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the Item!";
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
			$this->item_model->itemCode  	= trim($this->input->post('itemCode'));
			$this->item_model->accountCode  = trim($this->input->post('accountCode'));
			$this->item_model->type  		= trim($this->input->post('type'));
			$this->item_model->catID  		= trim($this->input->post('catID'));
			$this->item_model->brandID  	= trim($this->input->post('brandID'));
			$this->item_model->item  		= trim($this->input->post('item'));
			$this->item_model->description  = trim($this->input->post('description'));
			$this->item_model->unitCost1  	= trim($this->input->post('unitCost1'));
			$this->item_model->unitCost2  	= trim($this->input->post('unitCost2'));
			$this->item_model->unitCost3  	= trim($this->input->post('unitCost3'));
			$this->item_model->umsr  		= trim($this->input->post('umsr'));
			$this->item_model->status		= trim($this->input->post('status'));
			
			if ($this->item_model->updateRecord()) {
				
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Item successfully updated.";
				$data["urlredirect"] = "index.php?item/view/".$this->item_model->itemCode;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the Item!";
				$data["urlredirect"] = "index.php?item/view/".$this->item_model->itemCode;
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
			$this->item_model->itemCode = $id; 
			$this->item_model->getRecord();
			$data['rec'] = $this->item_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/item/tabs', $data);
			$this->load->view('modules/Item/item/view', $data);
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
	        $this->item_model->itemCode = $id; 
			$this->item_model->getRecord();
			$data['rec'] = $this->item_model;

			//get all brands
			$this->db->order_by('brandName','ASC');
			$data['brands'] 	= $this->db->get('brands');
			
			//get all categories
			$this->db->order_by('catName','ASC');
			$data['categories'] = $this->db->get('categories');
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Item/item/tabs', $data);
			$this->load->view('modules/Item/item/edit', $data);
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
			$this->item_model->itemCode = $id; 
			$this->item_model->getRecord();
			
		if ($this->item_model->itemCode) {
				if ($this->item_model->deleteRecord()) {
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Item successfully deleted.";
					$data["urlredirect"] = "index.php?item/show";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the Item!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Item record not found!";
				$data["urlredirect"] = "";
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			}
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

    	if ($this->input->post('cmdFilter') || $this->input->post('itemCode') || $this->input->post('type') || $this->input->post('catID') || $this->input->post('brandID') || $this->input->post('item') || $this->input->post('status') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$itemCode 		= trim($this->input->post('itemCode'));
	    	$type 			= trim($this->input->post('type'));
	    	$catID			= trim($this->input->post('catID'));
	    	$brandID		= trim($this->input->post('brandID'));
	    	$item			= trim($this->input->post('item'));
	    	$status			= trim($this->input->post('status'));
			$sortby 		= trim($this->input->post('sortby'));
	    	$sortorder		= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_itemCode') || $this->session->userdata($controller.'_type') || $this->session->userdata($controller.'_catID') || $this->session->userdata($controller.'_brandID') || $this->session->userdata($controller.'_item') || $this->session->userdata($controller.'_status') || $this->session->userdata($controller.'_sortby') || $this->session->userdata($controller.'_sortorder')) {
	    	$itemCode		= $this->session->userdata($controller.'_itemCode');
	    	$type			= $this->session->userdata($controller.'_type');
	    	$catID			= $this->session->userdata($controller.'_catID');
	    	$brandID		= $this->session->userdata($controller.'_brandID');
	    	$item			= $this->session->userdata($controller.'_item');
	    	$status			= $this->session->userdata($controller.'_status');
	    	$sortby 		= $this->session->userdata($controller.'_sortby');
	    	$sortorder		= $this->session->userdata($controller.'_sortorder');
		} else {
	    	$itemCode		= "";
	    	$type			= "";
	    	$catID			= "";
	    	$brandID		= "";
	    	$item			= "";
	    	$status			= "";
	    	$sortby 		= "item";
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

		$this->session->set_userdata($controller.'_itemCode', $itemCode);
		$this->session->set_userdata($controller.'_type', $type);
		$this->session->set_userdata($controller.'_catID', $catID);
		$this->session->set_userdata($controller.'_brandID', $brandID);
		$this->session->set_userdata($controller.'_item', $item);
		$this->session->set_userdata($controller.'_status', $status);
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
    	$this->session->set_userdata($controller.'_limit', $limit);
    		
    	$data['itemCode'] 	= $itemCode;
    	$data['type'] 		= $type;
    	$data['catID']		= $catID;
    	$data['brandID']	= $brandID;
    	$data['item']		= $item;
    	$data['status']		= $status;
    	$data['sortby'] 	= $sortby;
    	$data['sortorder']	= $sortorder;
    	$data['limit'] 		= $limit;

    	$this->db->select('i.*');
		$this->db->select('b.brandName');
		$this->db->select('c.catName');
		$this->db->from('items i');
		$this->db->join('brands b','i.brandID=b.brandID','left');
		$this->db->join('categories c','i.catID=c.catID','left');
		
    	if ($itemCode!="")
    		$this->db->where('itemCode', $itemCode);
    		
    	if ($type!="")
    		$this->db->where('type', $type);
    		
    	if ($catID!="")
    		$this->db->where('i.catID', $catID);
    		
    	if ($brandID!="")
    		$this->db->where('i.brandID', $brandID);
    		
    	if ($item!="")
    		$this->db->like('item', $item,'after');
    		
    	if ($status!="")
    		$this->db->where('i.status', $status);
    		
    	$config['total_rows'] = $data['ttl_rows'] = $this->db->count_all_results();
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?item/show/';
	    $config['per_page'] = $limit;
		$this->pagination->initialize($config);
			
		$this->db->select('i.*');
		$this->db->select('b.brandName');
		$this->db->select('c.catName');
		$this->db->from('items i');
		$this->db->join('brands b','i.brandID=b.brandID','left');
		$this->db->join('categories c','i.catID=c.catID','left');
		
    	if ($itemCode!="")
    		$this->db->where('itemCode', $itemCode);
    		
    	if ($type!="")
    		$this->db->where('type', $type);
    		
    	if ($catID!="")
    		$this->db->where('i.catID', $catID);
    		
    	if ($brandID!="")
    		$this->db->where('i.brandID', $brandID);
    		
    	if ($item!="")
    		$this->db->like('item', $item,'after');
    		
    	if ($status!="")
    		$this->db->where('i.status', $status);
    		
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    		
    	if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
	    $data['records'] = $this->db->get();
		
	    //get all brands
		$this->db->order_by('brandName','ASC');
		$data['brands'] 	= $this->db->get('brands');
		
		//get all categories
		$this->db->order_by('catName','ASC');
		$data['categories'] = $this->db->get('categories');
			
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Item/item/tabs', $data);
		$this->load->view('modules/Item/item/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$itemCode		= $this->session->userdata($controller.'_itemCode');
    	$type			= $this->session->userdata($controller.'_type');
    	$catID			= $this->session->userdata($controller.'_catID');
    	$brandID		= $this->session->userdata($controller.'_brandID');
    	$item			= $this->session->userdata($controller.'_item');
    	$status			= $this->session->userdata($controller.'_status');
    	$sortby			= $this->session->userdata($controller.'_sortby');
    	$sortorder		= $this->session->userdata($controller.'_sortorder');
    	$limit 			= $this->session->userdata($controller.'_limit');
		
    	$this->db->select('i.*');
		$this->db->select('b.brandName');
		$this->db->select('c.catName');
		$this->db->from('items i');
		$this->db->join('brands b','i.brandID=b.brandID','left');
		$this->db->join('categories c','i.catID=c.catID','left');
		
    	if ($itemCode!="")
    		$this->db->where('itemCode', $itemCode);
    		
    	if ($type!="")
    		$this->db->where('type', $type);
    		
    	if ($catID!="")
    		$this->db->where('i.catID', $catID);
    		
    	if ($brandID!="")
    		$this->db->where('i.brandID', $brandID);
    		
    	if ($item!="")
    		$this->db->like('item', $item,'after');
    		
    	if ($status!="")
    		$this->db->where('i.status', $status);
    		
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    		
    	if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
	    $data['records'] = $this->db->get();
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Item/item/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		$this->item_model->itemCode = $this->input->post('itemCode');
		
		if ($this->item_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
	
}	