<?php

class Dashboard extends Controller 
{
	var $common_menu;

	function Dashboard()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->main();
	}
	
	function submenu()
	{
		$this->load->view("modules/Dashboards/submenu");
	}	
	
	function main()
	{
		// check user session
		$this->user_model->authenticate_user_session();

		// global settings
		include('includes/settings.php');

		// load tabs/modules
		require_once('includes/modules.php');
		$data['calendar']= $calendar;
		$data['modules'] = $modules;
		$data['tabs'] 	 = $tabs;
		$data['labels']  = $module_label;
		$data['title']   = "Dashboard";
		$data['activetab'] = 1;
	
		// load submenu
		$this->submenu();
		$data['common_menu'] 	 = $this->common_menu;
		
		// get all employement status
		$data['status'] = $status = $this->db->get('employment_status');
		
		// get the offices
		$this->db->order_by('office','asc');
		$offices = $this->db->get('offices');
		
		$ctr = 0;
		$results = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$results[$ctr]['office'] = $office->office;
				$results[$ctr]['total']  = 0;
				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						$this->db->where('empStatusID', $type->empStatusID);
						$this->db->where('officeID', $office->officeID);
						$this->db->where('status', 1);
						$results[$ctr][$type->empStatusID] = $this->db->count_all_results('employees');
						$results[$ctr]['total']  += $results[$ctr][$type->empStatusID];
					}
				}
				$ctr++;
			}
		}
		

		$cat = "";
		$cat_stat = "";
		if ($status->num_rows()) {
			foreach($status->result() as $type) {
				if ($cat)
					$cat .=",'".$type->type."'";
				else
					$cat .="'".$type->type."'";
					
				$this->db->where('empStatusID', $type->empStatusID);
				$this->db->where('status', 1);
				$cat_statistic = $this->db->count_all_results('employees');
				
				if ($cat_stat!="")
					$cat_stat .= ",$cat_statistic";
				else
					$cat_stat .= "$cat_statistic";
			}
		}
		
		// get all members who's bday is this month
		$res = $this->db->query("SELECT employees.*, offices.office FROM employees LEFT JOIN offices ON employees.officeID=offices.officeID WHERE MONTH(bday)=".date("m")." AND employees.status=1 order by lname asc");
		$data['bdays'] = $res;
		
		
		// compensation summary
		$ctr = 0;
		$compensations = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$compensations[$ctr]['office'] 		= $office->office;
				$compensations[$ctr]['basic'] 		= 0;
				$compensations[$ctr]['allowances']	= 0;
				$compensations[$ctr]['total']		= 0;
				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						// basic
						$this->db->select_sum('salary');
						$this->db->where('empStatusID', $type->empStatusID);
						$this->db->where('officeID', $office->officeID);
						$this->db->where('status', 1);
						$basic = $this->db->get('employees');
						$salary = $basic->result();
						$compensations[$ctr][$type->empStatusID]['basic'] = $salary[0]->salary;
						
						// allowances
						$this->db->select_sum('allowances.amount');
						$this->db->from('employees');
						$this->db->join('allowances','employees.empID=allowances.empID','left');
						$this->db->where('employees.empStatusID', $type->empStatusID);
						$this->db->where('employees.officeID', $office->officeID);
						$this->db->where('employees.status', 1);
						$allowances = $this->db->get();
						$allowance = $allowances->result();
						$compensations[$ctr][$type->empStatusID]['allowances'] = $allowance[0]->amount;
						
						// total
						$compensations[$ctr][$type->empStatusID]['total'] = $compensations[$ctr][$type->empStatusID]['basic'] + $compensations[$ctr][$type->empStatusID]['allowances'];
						
						// for totals
						$compensations[$ctr]['basic'] 		+= $compensations[$ctr][$type->empStatusID]['basic'];
						$compensations[$ctr]['allowances']	+= $compensations[$ctr][$type->empStatusID]['allowances'];
						$compensations[$ctr]['total']		+= $compensations[$ctr][$type->empStatusID]['total'];
					}
				}
				$ctr++;
			}
		}
		$data['compensations'] 	= $compensations;
		
		// political tag
		
		$data['offices'] 	= $offices;
		$data['cats'] 		= $cat;
		$data['cat_stat'] 	= $cat_stat;
		$data['statistics'] = $results;
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Dashboards/dashboard', $data);
		$this->load->view('footer');
	}
	
	function compensation()
	{
		// check user session
		$this->user_model->authenticate_user_session();

		// global settings
		include('includes/settings.php');

		// load tabs/modules
		require_once('includes/modules.php');
		$data['calendar']= $calendar;
		$data['modules'] = $modules;
		$data['tabs'] 	 = $tabs;
		$data['labels']  = $module_label;
		$data['title']   = "Dashboard";
		$data['activetab'] = 1;
	
		// load submenu
		$this->submenu();
		$data['common_menu'] 	 = $this->common_menu;
		
		// get all employement status
		$data['status'] = $status = $this->db->get('employment_status');
		
		// get the offices
		$this->db->order_by('office','asc');
		$offices = $this->db->get('offices');
		
		// compensation summary
		$ctr = 0;
		$compensations = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$compensations[$ctr]['office'] 		= $office->office;
				$compensations[$ctr]['basic'] 		= 0;
				$compensations[$ctr]['allowances']	= 0;
				$compensations[$ctr]['total']		= 0;
				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						// basic
						$this->db->select_sum('salary');
						$this->db->where('empStatusID', $type->empStatusID);
						$this->db->where('officeID', $office->officeID);
						$this->db->where('status', 1);
						$basic = $this->db->get('employees');
						$salary = $basic->result();
						$compensations[$ctr][$type->empStatusID]['basic'] = $salary[0]->salary;
						
						// allowances
						$this->db->select_sum('allowances.amount');
						$this->db->from('employees');
						$this->db->join('allowances','employees.empID=allowances.empID','left');
						$this->db->where('employees.empStatusID', $type->empStatusID);
						$this->db->where('employees.officeID', $office->officeID);
						$this->db->where('employees.status', 1);
						$allowances = $this->db->get();
						$allowance = $allowances->result();
						$compensations[$ctr][$type->empStatusID]['allowances'] = $allowance[0]->amount;
						
						// total
						$compensations[$ctr][$type->empStatusID]['total'] = $compensations[$ctr][$type->empStatusID]['basic'] + $compensations[$ctr][$type->empStatusID]['allowances'];
						
						// for totals
						$compensations[$ctr]['basic'] 		+= $compensations[$ctr][$type->empStatusID]['basic'];
						$compensations[$ctr]['allowances']	+= $compensations[$ctr][$type->empStatusID]['allowances'];
						$compensations[$ctr]['total']		+= $compensations[$ctr][$type->empStatusID]['total'];
					}
				}
				$ctr++;
			}
		}
		$data['compensations'] 	= $compensations;
		
		$data['offices'] 	= $offices;
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Dashboards/compensation', $data);
		$this->load->view('footer');
	}
	
	function political()
	{
		// check user session
		$this->user_model->authenticate_user_session();

		// global settings
		include('includes/settings.php');

		// load tabs/modules
		require_once('includes/modules.php');
		$data['calendar']= $calendar;
		$data['modules'] = $modules;
		$data['tabs'] 	 = $tabs;
		$data['labels']  = $module_label;
		$data['title']   = "Dashboard";
		$data['activetab'] = 1;
	
		// load submenu
		$this->submenu();
		$data['common_menu'] 	 = $this->common_menu;
		
		// get all employement status
		$data['status'] = $status = $this->db->get('employment_status');
		
		// get the offices
		$this->db->order_by('office','asc');
		$offices = $this->db->get('offices');
		
		// configuration
		$administrationParty = $this->config_model->getConfig('Administration Party');
		$neutralEmployee 	 = $this->config_model->getConfig('Neutral Employee');
		$parties 		 	 = explode(",",$this->config_model->getConfig('Political Party'));
		
		// compensation summary
		$ctr = 0;
		$political = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$political[$ctr]['office'] 		= $office->office;
				
				if (count($parties)) {
					foreach($parties as $party) {
						$political[$ctr]['total'][trim($party)] = 0;
					}
				}

				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						if (count($parties)) {
							foreach($parties as $party) {
								$this->db->where('empStatusID', $type->empStatusID);
								$this->db->where('officeID', $office->officeID);
								$this->db->where('politicalTag', trim($party));
								$this->db->where('status', 1);
								$political[$ctr][$type->empStatusID][trim($party)] = $this->db->count_all_results('employees');
		
								// for totals
								$political[$ctr]['total'][trim($party)]	+= $political[$ctr][$type->empStatusID][trim($party)];
							}
						}
					}
				}
				$ctr++;
			}
		}
		$data['political'] 	= $political;
		
		// load views
		$this->load->view('header', $data);
		$this->load->view('modules/Dashboards/political', $data);
		$this->load->view('footer');
	}
	
	
	// printing
	function print_statistics()
	{
		// check user session
		$this->user_model->authenticate_user_session();
		
		// get all employement status
		$data['status'] = $status = $this->db->get('employment_status');
		
		// get the offices
		$this->db->order_by('office','asc');
		$offices = $this->db->get('offices');
		
		$ctr = 0;
		$results = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$results[$ctr]['office'] = $office->office;
				$results[$ctr]['total']  = 0;
				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						$this->db->where('empStatusID', $type->empStatusID);
						$this->db->where('officeID', $office->officeID);
						$this->db->where('status', 1);
						$results[$ctr][$type->empStatusID] = $this->db->count_all_results('employees');
						$results[$ctr]['total']  += $results[$ctr][$type->empStatusID];
					}
				}
				$ctr++;
			}
		}
		

		$cat = "";
		$cat_stat = "";
		if ($status->num_rows()) {
			foreach($status->result() as $type) {
				if ($cat)
					$cat .=",'".$type->type."'";
				else
					$cat .="'".$type->type."'";
					
				$this->db->where('empStatusID', $type->empStatusID);
				$this->db->where('status', 1);
				$cat_statistic = $this->db->count_all_results('employees');
				
				if ($cat_stat!="")
					$cat_stat .= ",$cat_statistic";
				else
					$cat_stat .= "$cat_statistic";
			}
		}
		
		$data['offices'] 	= $offices;
		$data['cats'] 		= $cat;
		$data['cat_stat'] 	= $cat_stat;
		$data['statistics'] = $results;
		
		// load views
		$this->load->view('print_header');
		$this->load->view('print_page_header');
		$this->load->view('modules/Dashboards/print_statistics', $data);
		$this->load->view('print_footer');
	}
	
	function print_birthday()
	{
		// check user session
		$this->user_model->authenticate_user_session();

		// get all members who's bday is this month
		$res = $this->db->query("SELECT employees.*, offices.office FROM employees LEFT JOIN offices ON employees.officeID=offices.officeID WHERE MONTH(bday)=".date("m")." AND employees.status=1 order by lname asc");
		$data['bdays'] = $res;
		
		// load views
		$this->load->view('print_header');
		$this->load->view('print_page_header');
		$this->load->view('modules/Dashboards/print_birthday', $data);
		$this->load->view('print_footer');
	}
	
	function print_compensation()
	{
		// check user session
		$this->user_model->authenticate_user_session();

		// get all employement status
		$data['status'] = $status = $this->db->get('employment_status');
		
		// get the offices
		$this->db->order_by('office','asc');
		$offices = $this->db->get('offices');
		
		// compensation summary
		$ctr = 0;
		$compensations = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$compensations[$ctr]['office'] 		= $office->office;
				$compensations[$ctr]['basic'] 		= 0;
				$compensations[$ctr]['allowances']	= 0;
				$compensations[$ctr]['total']		= 0;
				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						// basic
						$this->db->select_sum('salary');
						$this->db->where('empStatusID', $type->empStatusID);
						$this->db->where('officeID', $office->officeID);
						$this->db->where('status', 1);
						$basic = $this->db->get('employees');
						$salary = $basic->result();
						$compensations[$ctr][$type->empStatusID]['basic'] = $salary[0]->salary;
						
						// allowances
						$this->db->select_sum('allowances.amount');
						$this->db->from('employees');
						$this->db->join('allowances','employees.empID=allowances.empID','left');
						$this->db->where('employees.empStatusID', $type->empStatusID);
						$this->db->where('employees.officeID', $office->officeID);
						$this->db->where('employees.status', 1);
						$allowances = $this->db->get();
						$allowance = $allowances->result();
						$compensations[$ctr][$type->empStatusID]['allowances'] = $allowance[0]->amount;
						
						// total
						$compensations[$ctr][$type->empStatusID]['total'] = $compensations[$ctr][$type->empStatusID]['basic'] + $compensations[$ctr][$type->empStatusID]['allowances'];
						
						// for totals
						$compensations[$ctr]['basic'] 		+= $compensations[$ctr][$type->empStatusID]['basic'];
						$compensations[$ctr]['allowances']	+= $compensations[$ctr][$type->empStatusID]['allowances'];
						$compensations[$ctr]['total']		+= $compensations[$ctr][$type->empStatusID]['total'];
					}
				}
				$ctr++;
			}
		}
		$data['compensations'] 	= $compensations;
		
		// load views
		$this->load->view('print_header');
		$this->load->view('print_page_header');
		$this->load->view('modules/Dashboards/print_compensation', $data);
		$this->load->view('print_footer');
	}
	
	function print_political()
	{
		// check user session
		$this->user_model->authenticate_user_session();

		// get all employement status
		$data['status'] = $status = $this->db->get('employment_status');
		
		// get the offices
		$this->db->order_by('office','asc');
		$offices = $this->db->get('offices');
		
		// configuration
		$administrationParty = $this->config_model->getConfig('Administration Party');
		$neutralEmployee 	 = $this->config_model->getConfig('Neutral Employee');
		$parties 		 	 = explode(",",$this->config_model->getConfig('Political Party'));
		
		// compensation summary
		$ctr = 0;
		$political = array();
		if ($offices->num_rows()) {
			foreach($offices->result() as $office) {
				$political[$ctr]['office'] 		= $office->office;
				
				if (count($parties)) {
					foreach($parties as $party) {
						$political[$ctr]['total'][trim($party)] = 0;
					}
				}

				if ($status->num_rows()) {
					foreach($status->result() as $type) {
						if (count($parties)) {
							foreach($parties as $party) {
								$this->db->where('empStatusID', $type->empStatusID);
								$this->db->where('officeID', $office->officeID);
								$this->db->where('politicalTag', trim($party));
								$this->db->where('status', 1);
								$political[$ctr][$type->empStatusID][trim($party)] = $this->db->count_all_results('employees');
		
								// for totals
								$political[$ctr]['total'][trim($party)]	+= $political[$ctr][$type->empStatusID][trim($party)];
							}
						}
					}
				}
				$ctr++;
			}
		}
		$data['political'] 	= $political;
		
		// load views
		$this->load->view('print_header');
		$this->load->view('print_page_header');
		$this->load->view('modules/Dashboards/print_political', $data);
		$this->load->view('print_footer');
	}
}	