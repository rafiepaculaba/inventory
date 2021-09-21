<?php	

class Budget extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Budget()
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
		
		$this->load->view("modules/Budget/submenu");
		
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Budgets";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
		
	}

	function check_roles()
	{
		// check roles
		$this->roles['create'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Add Annual Budget');
		$this->roles['view'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Annual Budget');
		$this->roles['edit'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Edit Existing Annual Budget');
		$this->roles['delete'] 	= $this->userrole_model->has_access($this->session->userdata('current_userID'),'Delete Existing Annual Budget');
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
			// get all courses
			$this->load->model('expenditure_model');
			$this->db->order_by('catName','ASC');
			$queryResult = $this->expenditure_model->getAll();
			$data['expenditures'] = $queryResult;
			
			// particulars
		    $queryResult = $this->particular_model->getAll();
		    $data['particulars'] = $queryResult;
			
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Accounting/budget/tabs', $data);
			$this->load->view('modules/Accounting/budget/create', $data);
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
			if ($this->input->post('year')) {
				$this->budget_model->year 			= trim($this->input->post('year'));
				$this->budget_model->catID 			= trim($this->input->post('catID'));
				$this->budget_model->particularID	= trim($this->input->post('particularID'));
				$this->budget_model->amount			= trim($this->input->post('amount'));
				$this->budget_model->balance		= trim($this->input->post('amount'));
				$this->budget_model->sup_amount		= trim($this->input->post('sup_amount'));
				
				if ($this->budget_model->saveRecord()) {
					$this->budget_model->setRecord();
						
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Budget successfully saved.";
					$data["urlredirect"] = "index.php?budget/view/".$this->budget_model->budgetID;
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in saving the budget!";
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
		if ($this->roles['edit']) {
			$this->budget_model->budgetID 		= trim($this->input->post('budgetID'));
			$this->budget_model->year 			= trim($this->input->post('year'));
			$this->budget_model->catID 			= trim($this->input->post('catID'));
			$this->budget_model->particularID	= trim($this->input->post('particularID'));
			$this->budget_model->amount			= trim($this->input->post('amount'));
			$this->budget_model->sup_amount		= trim($this->input->post('sup_amount'));
			
			$diff 	 = $this->input->post('orig_amount') - $this->input->post('amount');
			$balance = trim($this->input->post('balance')) - $diff;	
			$this->budget_model->balance = $balance;
			
			if ($this->budget_model->updateRecord()) {
				
				// successful
				$data["display"] = "block";
				$data["class"] = "notificationbox";
				$data["msg"] = "Budget successfully updated.";
				$data["urlredirect"] = "index.php?budget/view/".$this->budget_model->budgetID;
				$this->load->view("header",$data);
				$this->load->view("message",$data);
				$this->load->view("footer");
			} else {
				// error
				$data["display"] = "block";
				$data["class"] = "errorbox";
				$data["msg"] = "Error in updating the budget!";
				$data["urlredirect"] = "index.php?budget/view/".$this->budget_model->budgetID;
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
		
		$this->budget_model->budgetID = $id; 
		$this->budget_model->getRecord();
		$data['rec'] 	= $this->budget_model;
		
		// get all courses
		$this->load->model('expenditure_model');
		$queryResult = $this->expenditure_model->getAll();
		$data['category'] = $queryResult;
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Accounting/budget/tabs', $data);
		$this->load->view('modules/Accounting/budget/view', $data);
		$this->load->view('footer');
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
	        $this->budget_model->budgetID = $id; 
			$this->budget_model->getRecord();
			$data['rec'] 	= $this->budget_model;
			
			// get all courses
			$this->load->model('expenditure_model');
			$this->db->order_by('catName','ASC');
			$queryResult = $this->expenditure_model->getAll();
			$data['expenditures'] = $queryResult;
			
			// particulars
			$this->db->order_by('particular','ASC');
		    $queryResult = $this->particular_model->getAll();
		    $data['particulars'] = $queryResult;
		    
			// load views
			$this->load->view('header', $data);
			$this->load->view('modules/Accounting/budget/tabs', $data);
			$this->load->view('modules/Accounting/budget/edit', $data);
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
			$this->budget_model->budgetID = $id; 
			$this->budget_model->getRecord();
			
			if ($this->budget_model->year) {
				if ($this->budget_model->deleteRecord()) {
					
					// successful
					$data["display"] = "block";
					$data["class"] 	 = "notificationbox";
					$data["msg"] 	 = "Budget successfully deleted.";
					$data["urlredirect"] = "index.php?budget/show";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				} else {
					// error
					$data["display"] = "block";
					$data["class"] 	 = "errorbox";
					$data["msg"] 	 = "Error in deleting the budget!";
					$data["urlredirect"] = "";
					$this->load->view("header",$data);
					$this->load->view("message",$data);
					$this->load->view("footer");
				}
			} else {
				// error
				$data["display"] = "block";
				$data["class"] 	 = "errorbox";
				$data["msg"] 	 = "Budget record not found!";
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
		
		// load views
		$this->load->view('header', $data);
//		$this->load->view('modules/Accounting/budget/tabs', $data);
//		$this->load->view('modules/Accounting/budget/list', $data);
		$this->load->view('footer');
	}
	
	function printlist()
	{
		$controller = $this->uri->segment(1);
		
		if ($this->uri->segment(3))
	    	$offset = $this->uri->segment(3);
	    else
	    	$offset = 0;

    	$year			= $this->session->userdata($controller.'_year');
    	$catID			= $this->session->userdata($controller.'_catID');
    	$particularID	= $this->session->userdata($controller.'_particularID');
    	$amount			= $this->session->userdata($controller.'_amount');
    	$balance		= $this->session->userdata($controller.'_balance');
    	$sup_amount		= $this->session->userdata($controller.'_sup_amount');
    	$sortby 		= $this->session->userdata($controller.'_sortby');
    	$sortorder		= $this->session->userdata($controller.'_sortorder');
    	$limit 			= $this->session->userdata($controller.'_limit');
		
		// query building
		$this->db->select('budgets.*');
		$this->db->select('particulars.particular');
		$this->db->select('expenditures.catID');
		$this->db->from('budgets');
		$this->db->from('expenditures');
		$this->db->from('particulars');
		$this->db->where('budgets.particularID=particulars.particularID');
		$this->db->where('budgets.catID=expenditures.catID');
		
		if ($year!="")
    		$this->db->where('year', $year);
		
    	if ($catID!="")
    		$this->db->where('budgets.catID', $catID); 
		
		if ($particularID!="")
    		$this->db->where('budgets.particularID', $particularID); 
    	
    	if ($amount!="")
    		$this->db->where('amount', $amount);
    		
    	if ($balance!="")
    		$this->db->where('balance', $balance);
    		
    	if ($sup_amount!="")
    		$this->db->where('sup_amount', $sup_amount);
    		
    	if ($sortby && $sortorder)
    		$this->db->order_by($sortby, $sortorder); 
    		
    	if ($limit) {
    		if ($offset) {
    			$this->db->limit($limit,$offset); 
    		} else {
    			$this->db->limit($limit); 
    		}
    	}
    	
	    $queryResult = $this->db->get();
	    $data['records'] = $queryResult;
	    
	    // particulars
	    $queryResult = $this->particular_model->getAll();
	    $data['particulars'] = $queryResult;
	    
	    // category
	    $queryResult = $this->expenditure_model->getAll();
	    $data['expenditures'] = $queryResult;
	    
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('print_page_header');
		$this->load->view('modules/Accounting/budget/printlist', $data);
		$this->load->view('print_footer');
	}
	
	// AJAX HANDLER FUNCTIONS
	function check_duplicate()
	{
		
		$this->budget_model->year	 		= $this->input->post('year');
		$this->budget_model->particularID	= $this->input->post('particularID');

		if ($this->budget_model->isDuplicate())
			echo "1"; // duplicate
		else 
			echo "0";
	}
	
	function getBudget()
	{
		$catID 			= $this->input->post('catID');
		$particularID 	= $this->input->post('particularID');
		$year = date('Y');
		$this->db->where('catID',$catID);
		$this->db->where('particularID',$particularID);
		$this->db->where('year',$year);
		$records = $this->db->get('budgets');

		$balance  = 0;
		if ($records->num_rows()) {
			$data = $records->result();
			$balance  = $data[0]->balance;
		}
	    echo number_format($balance,2);
	}
	
	function getBudget1()
	{
		$catID 			= $this->input->post('catID');
		$particularID 	= $this->input->post('particularID');
		
		$year = date('Y');
		$this->db->where('catID',$catID);
		$this->db->where('particularID',$particularID);
		$this->db->where('year',$year);
		$records = $this->db->get('budgets');

		if ($records->num_rows()) {
			$data = $records->result();
			$budgetID = $data[0]->budgetID;
		}
	    echo $budgetID;
	}
	
	function getAmount()
	{
		$catID 			= $this->input->post('catID');
		$particularID 	= $this->input->post('particularID');
		
		$year = date('Y');
		$this->db->where('catID',$catID);
		$this->db->where('particularID',$particularID);
		$this->db->where('year',$year);
		$records = $this->db->get('budgets');

		$balance  = 0;
		if ($records->num_rows()) {
			$data = $records->result();
			$balance  = $data[0]->balance;
			$amount_bud  = $data[0]->amount + $data[0]->sup_amount;
		}
		
		$amount	= $this->input->post('amount');
	    if($amount>$balance){
	    	if($balance==0){
				echo $data="Not enough budget for this section, you have"." ".$balance." amount balance";
	    	} else { 
	    		echo $data="You have reached the maximum budget which is"." ".$amount_bud; 
	    	}
	    }else{
			//data is empty	
	    }
	}
	
	function getAmount1()
	{
		$catID 			= $this->input->post('catID');
		$particularID 	= $this->input->post('particularID');
		
		$year = date('Y');
		$this->db->where('catID',$catID);
		$this->db->where('particularID',$particularID);
		$this->db->where('year',$year);
		$records = $this->db->get('budgets');

		$balance  = 0;
		if ($records->num_rows()) {
			$data = $records->result();
			$balance  = $data[0]->balance;
			$amount	  = $data[0]->amount;
		}
		$new_amount	= $this->input->post('amount');
		$old_amount	= $this->input->post('orig_amount');
		$diff=$old_amount-$new_amount;
		
		if(($balance+$diff)<0){
			echo $data="You have reached the maximum budget which is"." ".$amount;
		}else{
			//data is empty	
		}
	   
	}

}	