<?php	

class Inventory extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Inventory()
	{
		parent::Controller();
		$this->load->model("inventory_model");	
		
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
		
		$this->load->view("modules/Inventory/submenu");
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Inventory";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Inventory');
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
			$this->load->view('modules/Item/employee_type/tabs', $data);
			$this->load->view('modules/Item/employee_type/create', $data);
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
			$this->inventory_model->invID = $id; 
			$this->inventory_model->getRecord();
			$data['rec'] = $this->inventory_model;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Inventory/inventory/tabs', $data);
			$this->load->view('modules/Inventory/inventory/view', $data);
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
			$this->load->view('modules/Item/employee_type/tabs', $data);
			$this->load->view('modules/Item/employee_type/edit', $data);
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
		
		$controller = $this->uri->segment(1);
		
		// get offset
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	if ($this->input->post('cmdFilter') || $this->input->post('itemCode') || $this->input->post('description') || $this->input->post('location') || $this->input->post('qty') || $this->input->post('umsr') || $this->input->post('reorderLevel') || $this->input->post('sortby') || $this->input->post('sortorder')) {
	    	$itemCode 		= trim($this->input->post('itemCode'));
	    	$description	= trim($this->input->post('description'));
	    	$location 		= trim($this->input->post('location'));
	    	$qty			= trim($this->input->post('qty'));
	    	$umsr			= trim($this->input->post('umsr'));
	    	$reorderLevel	= trim($this->input->post('reorderLevel'));
			$sortby 		= trim($this->input->post('sortby'));
	    	$sortorder		= trim($this->input->post('sortorder'));
		} else if ($this->session->userdata($controller.'_itemCode') || $this->session->userdata($controller.'_description') || $this->session->userdata($controller.'_location') || $this->session->userdata($controller.'_qty') || $this->session->userdata($controller.'_umsr') || $this->session->userdata($controller.'_reorderLevel') || $this->session->userdata($controller.'_sortby') || $this->session->userdata($controller.'_sortorder')) {
	    	$itemCode		= $this->session->userdata($controller.'_itemCode');
	    	$description	= $this->session->userdata($controller.'_description');
	    	$location		= $this->session->userdata($controller.'_location');
	    	$qty			= $this->session->userdata($controller.'_qty');
	    	$umsr			= $this->session->userdata($controller.'_umsr');
	    	$reorderLevel	= $this->session->userdata($controller.'_reorderLevel');
	    	$sortby 		= $this->session->userdata($controller.'_sortby');
	    	$sortorder		= $this->session->userdata($controller.'_sortorder');
		} else {
	    	$itemCode		= "";
	    	$description	= "";
	    	$location		= "";
	    	$qty			= "";
	    	$umsr			= "";
	    	$reorderLevel	= "";
	    	$sortby 		= "itemCode";
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
		$this->session->set_userdata($controller.'_description', $description);
		$this->session->set_userdata($controller.'_location', $location);
		$this->session->set_userdata($controller.'_qty', $qty);
		$this->session->set_userdata($controller.'_umsr', $umsr);
		$this->session->set_userdata($controller.'_reorderLevel', $reorderLevel);
    	$this->session->set_userdata($controller.'_sortby', $sortby);
    	$this->session->set_userdata($controller.'_sortorder', $sortorder);
    	$this->session->set_userdata($controller.'_limit', $limit);
    		
    	$data['itemCode'] 		= $itemCode;
    	$data['description'] 	= $description;
    	$data['location'] 		= $location;
    	$data['qty']			= $qty;
    	$data['umsr']			= $umsr;
    	$data['reorderLevel']	= $reorderLevel;
    	$data['sortby'] 		= $sortby;
    	$data['sortorder']		= $sortorder;
    	$data['limit'] 			= $limit;

    	$this->db->select('i.*');
		$this->db->select('items.description');
		$this->db->select('items.umsr');
		$this->db->from('inventory i');
		$this->db->join('items','i.itemCode=items.itemCode','left');
		
    	if ($itemCode!="")
    		$this->db->where('i.itemCode', $itemCode);
    		
    	if ($description!="")
    		$this->db->like('description', $description,'after');
    		
    	if ($location!="")
    		$this->db->like('location', $location,'after');
    		
    	if ($qty!="")
    		$this->db->like('qty', $qty,'after');
    		
    	if ($umsr!="")
    		$this->db->like('umsr', $umsr,'after');
    		
    	if ($reorderLevel!="")
    		$this->db->where('reorderLevel', $reorderLevel);
    		
    	$config['total_rows'] = $data['ttl_rows'] = $this->db->count_all_results();
		
		// set pagination	
		$config['base_url'] = base_url().'index.php?inventory/show/';
	    $config['per_page'] = $limit;
		$this->pagination->initialize($config);
			
		$this->db->select('i.*');
		$this->db->select('items.description');
		$this->db->select('items.umsr');
		$this->db->from('inventory i');
		$this->db->join('items','i.itemCode=items.itemCode','left');
		
    	if ($itemCode!="")
    		$this->db->where('i.itemCode', $itemCode);
    		
    	if ($description!="")
    		$this->db->like('description', $description,'after');
    		
    	if ($location!="")
    		$this->db->like('location', $location,'after');
    		
    	if ($qty!="")
    		$this->db->like('qty', $qty,'after');
    		
    	if ($umsr!="")
    		$this->db->like('umsr', $umsr,'after');
    		
    	if ($reorderLevel!="")
    		$this->db->where('reorderLevel', $reorderLevel);
    		
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
		$this->load->view('header', $data);
		$this->load->view('modules/Inventory/inventory/tabs', $data);
		$this->load->view('modules/Inventory/inventory/list', $data);
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
    	$description	= $this->session->userdata($controller.'_description');
    	$location		= $this->session->userdata($controller.'_location');
    	$qty			= $this->session->userdata($controller.'_qty');
    	$umsr			= $this->session->userdata($controller.'_umsr');
    	$reorderLevel	= $this->session->userdata($controller.'_reorderLevel');
    	$sortby			= $this->session->userdata($controller.'_sortby');
    	$sortorder		= $this->session->userdata($controller.'_sortorder');
    	$limit 			= $this->session->userdata($controller.'_limit');
		
		$this->db->select('i.*');
		$this->db->select('items.description');
		$this->db->select('items.umsr');
		$this->db->from('inventory i');
		$this->db->join('items','i.itemCode=items.itemCode','left');
		
    	if ($itemCode!="")
    		$this->db->where('i.itemCode', $itemCode);
    		
    	if ($description!="")
    		$this->db->like('description', $description,'after');
    		
    	if ($location!="")
    		$this->db->like('location', $location,'after');
    		
    	if ($qty!="")
    		$this->db->like('qty', $qty,'after');
    		
    	if ($umsr!="")
    		$this->db->like('umsr', $umsr,'after');
    		
    	if ($reorderLevel!="")
    		$this->db->where('reorderLevel', $reorderLevel);
    		
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
		$this->load->view('modules/Inventory/inventory/printlist', $data);
		$this->load->view('print_footer');
	}
	
	function outofstock($type = 'SSP')
	{
		$this->db->select('items.item');
		$this->db->select('inventory.*');
		$this->db->select('categories.catName');
		$this->db->from('inventory');
		$this->db->join('items','inventory.itemCode=items.itemCode','left');
		$this->db->join('categories','items.catID=categories.catID','left');
		$this->db->where('`inventory`.`qty` <= `inventory`.`reorderLevel`');
		$this->db->where('items.type',$type);
		$this->db->where('items.status',1);
		$data['records'] = $this->db->get();
		
		$data['type'] = $type;
		
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Inventory/inventory/print_outofstock', $data);
		$this->load->view('print_footer');
	}
	
	function stock_card()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Stock Card";
		// ************** end global settings ****************
		
		$this->load->model('item_model');
		$this->load->model('transaction_model');
		
		if ($this->input->post('cmdFilter')!="") {
			$itemCode	= $this->input->post('itemCode');
			$startDate 	= $this->input->post('startDate');
			$endDate	= $this->input->post('endDate');
			
			$this->db->where('itemCode',$itemCode);
			$this->db->where('date >= ',date("Y-m-d 00:00:01",strtotime($startDate)));
			$this->db->where('date <= ',date("Y-m-d 23:59:59",strtotime($endDate)));
			$this->db->order_by("invID", "ASC");
			$productResult = $this->transaction_model->getAll();
			$data['records'] = $productResult;
			$data['totalIssued'] = 0;
			$data['totalReceived'] = 0;
			if ($productResult) {
				foreach ($productResult->result() as $row) {
					if ($row->tranType==1)
						$data['totalIssued'] += $row->qty;
					else
						$data['totalReceived'] += $row->qty;
				}
			}
			
			$data['itemCode'] 	= $itemCode;
			$data['startDate'] 	= $startDate;
			$data['endDate'] 	= $endDate;
		} else {
			$data['records'] 	= "";
			$data['itemCode'] 	= "";
			$data['startDate'] 	= "";
			$data['endDate'] 	= "";
		}
		
		$this->db->where('status',1);
		$this->db->order_by('description','ASC');
		$products = $this->db->get('items');
		$data['products'] 	= $products;
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Inventory/sc/stockcard', $data);
		$this->load->view('footer');
	}
	
	function print_stockcard($itemCode, $startDate, $endDate)
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['company'] = $this->config_model->getConfig("company");
		$data['address'] = $this->config_model->getConfig("address".$this->session->userdata('curBranchID'));
		
		// ************** end global settings ****************
		
		$this->load->model('item_model');
		$this->load->model('transaction_model');
		
		$startDate 	= date("m/d/Y",$startDate);
		$endDate	= date("m/d/Y",$endDate);
		
		$this->item_model->itemCode = $itemCode;
		$this->item_model->setRecord($itemCode);
		$data['rec']=$this->item_model;
		
		$this->db->where('itemCode',$itemCode);
		$this->db->where('date >= ',date("Y-m-d 00:00:01",strtotime($startDate)));
		$this->db->where('date <= ',date("Y-m-d 23:59:59",strtotime($endDate)));
		$this->db->order_by("invID", "ASC");
		$productResult = $this->transaction_model->getAll();
		$data['records'] = $productResult;
		$data['totalIssued'] = 0;
		$data['totalReceived'] = 0;
		if ($productResult) {
			foreach ($productResult->result() as $row) {
				if ($row->tranType==1)
					$data['totalIssued'] += $row->qty;
				else
					$data['totalReceived'] += $row->qty;
			}
		}
		
		$data['startDate'] 	= $startDate;
		$data['endDate'] 	= $endDate;
		
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Inventory/sc/print_stockcard', $data);
		$this->load->view('print_footer');
	}
	
}	