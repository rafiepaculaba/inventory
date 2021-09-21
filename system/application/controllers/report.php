<?php	

class Report extends Controller 
{
	var $common_menu;
	
	var $roles;
	var $data;
	
	function Report()
	{
		parent::Controller();

		// check user session
		$this->user_model->authenticate_user_session();
	}
	
	function index()
	{
		header('location: index.php?report/requisitions');
	}
	
	function submenu()
	{
		// global settings
		include('includes/calendarSetup.php');
		include('includes/settings.php');
		
		$this->load->view("modules/Report/submenu");
		
		$this->data['common_menu'] 	 	 = $this->common_menu;
		
		// load tabs/modules/title
		require_once('includes/modules.php');
		$this->data['modules'] = $modules;
		$this->data['tabs']    = $tabs;
		$this->data['labels']  = $module_label;
		$this->data['title']   = "Reports";
		
		// check roles
		$this->check_roles();
		$this->data['roles']   = $this->roles;
	}

	function check_roles()
	{
		// check roles
		$this->roles['expenses'] 		= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Monthly Expenses');
		$this->roles['issuances'] 		= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Monthly Issuances');
		$this->roles['receipts'] 		= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Monthly Receipts');
		$this->roles['inventory'] 		= $this->userrole_model->has_access($this->session->userdata('current_userID'),'View Inventory Reports');
		$this->roles['ssp_consumption'] = $this->userrole_model->has_access($this->session->userdata('current_userID'),'View SSP Consumptions');
		$this->roles['fol_consumption'] = $this->userrole_model->has_access($this->session->userdata('current_userID'),'View FOL Consumptions');
	}
	
	
	function requisitions()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Requisition Order Reports";
		// ************** end global settings ****************
		
		$this->load->view('header', $data);
		$this->load->view('modules/Report/requisitions', $data);
		$this->load->view('footer');
	}
	
	function purchases()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Purchase Order Reports";
		// ************** end global settings ****************
		
		$this->load->view('header', $data);
		$this->load->view('modules/Report/purchases', $data);
		$this->load->view('footer');
	}
		
	function payments()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Billing and Payment Reports";
		// ************** end global settings ****************
		
		$this->load->view('header', $data);
		$this->load->view('modules/Report/payments', $data);
		$this->load->view('footer');
	}
	
	function expenses()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Monthly Expenses";
		// ************** end global settings ****************
		
		if ($this->input->post('cmdFilter')!="") {
			$type 	= $this->input->post('type');
			$month 	= $this->input->post('month');
			$year 	= $this->input->post('year');
		
			
			$data['type'] 	= $type;
			$data['month'] 	= $month;
			$data['year'] 	= $year;
		} else {
			$data['type'] 	= "";
			$data['month'] 	= date("n");
			$data['year'] 	= date("Y");
		}

		// load views
		$this->load->view('header', $data);
//		$this->load->view('modules/Report/expenses', $data);
		$this->load->view('footer');
	}
	
	function issuances()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Monthly Issuances";
		// ************** end global settings ****************
		
		if ($this->input->post('cmdFilter')!="") {
			$type 	= $this->input->post('type');
			$month 	= $this->input->post('month');
			$year 	= $this->input->post('year');
		
			
			$data['type'] 	= $type;
			$data['month'] 	= $month;
			$data['year'] 	= $year;
		} else {
			$data['type'] 	= "";
			$data['month'] 	= date("n");
			$data['year'] 	= date("Y");
		}

		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Report/issuances', $data);
		$this->load->view('footer');
	}
	
	function receipts()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Monthly Receipts";
		// ************** end global settings ****************
		
		if ($this->input->post('cmdFilter')!="") {
			$type 	= $this->input->post('type');
			$month 	= $this->input->post('month');
			$year 	= $this->input->post('year');
		
			
			$data['type'] 	= $type;
			$data['month'] 	= $month;
			$data['year'] 	= $year;
		} else {
			$data['type'] 	= "";
			$data['month'] 	= date("n");
			$data['year'] 	= date("Y");
		}

		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Report/receipts', $data);
		$this->load->view('footer');
	}
	
	
	function inventory()
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['title'] = "Inventory Reports";
		// ************** end global settings ****************
		
		if ($this->input->post('cmdFilter')!="") {
			$type 	= $this->input->post('type');
			$startDate 	= $this->input->post('startDate');
			$endDate 	= $this->input->post('endDate');
			
			$data['type'] 		= $type;
			$data['startDate'] 	= $startDate;
			$data['endDate'] 	= $endDate;
		} else {
			$data['type'] 		= "";
			$data['startDate'] 	= date("m/d/Y");
			$data['endDate'] 	= date("m/d/Y");
		}

		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Report/inventory', $data);
		$this->load->view('footer');
	}
	
	function print_sales_commission($month, $year)
	{
		// ************** general settings *******************
		// load submenu
		$this->submenu();
		$data = $this->data;
		
		$data['company'] = $this->config_model->getConfig("company");
		$data['address'] = $this->config_model->getConfig("address".$this->session->userdata('curBranchID'));
	
		// ************** end global settings ****************
		$this->db->order_by('lname','ASC');
		$this->db->order_by('fname','ASC');
		$this->db->where('employement_status',1);
		$this->db->where('status',1);
	    $data['staffs'] = $this->db->get('staffs');
	    
		$result = array();
		if ($data['staffs']->num_rows()) {
			foreach($data['staffs']->result() as $staff) {
				// get gross takings
				$this->db->select('sum(amount) as ttl');
				$this->db->where('staffID', $staff->staffID);
				$this->db->like('date', $year."-".$month,'after');
				$this->db->where('status!=0');
				$takings = $this->db->get('daquet_headers_'.$this->session->userdata('curBranchID'));
				$taking = $takings->result();
				
				// gross takings
				$result['gross'][$staff->staffID] = $taking[0]->ttl;
				
				// 12% vat
				$result['vat'][$staff->staffID]   = $result['gross'][$staff->staffID] / 1.12 * 0.12;
				
				// net gross takings
				$result['net_gross'][$staff->staffID]   = $result['gross'][$staff->staffID] -  $result['vat'][$staff->staffID];
				
				// less: salon share(20%)
				$result['share'][$staff->staffID] = $result['net_gross'][$staff->staffID] * 0.2;
				
				// net takings
				$result['net_takings'][$staff->staffID] = $result['net_gross'][$staff->staffID] - $result['share'][$staff->staffID];
				
				// less: two(2) months salary
				$result['salary'][$staff->staffID] = $staff->salary * 2;
				
				// basis for commission
				$result['basis'][$staff->staffID] = $result['net_takings'][$staff->staffID] - $result['salary'][$staff->staffID];
				
				// rate of commission
				$result['rate'][$staff->staffID]  = $this->config_model->getConfig('Commission Rate');
				
				// commission
				$result['commission'][$staff->staffID]  = $result['basis'][$staff->staffID] * ($result['rate'][$staff->staffID]/100);
			}
		}
		
		$data['result'] 	= $result;
		
		$data['month'] 		= $month;
		$data['year'] 		= $year;
		
		if ($this->session->userdata('curBranchID')==1)
			$data['branchName'] = "SURIGAO";
		else
			$data['branchName'] = "BUTUAN";
			
		// load views
		$this->load->view('print_header', $data);
		$this->load->view('modules/Report/print_sales_commission', $data);
		$this->load->view('print_footer');
	}
}