<?php

// module list
// index format [<tab>/<controller>]
//$modules['dashboard']	= 'Dashboard';
$modules['requisition']	= 'Requisition Orders';
$modules['purchase']	= 'Purchase Orders';
$modules['payment']		= 'Payment Advices';
$modules['item']		= 'Items';
$modules['budget']		= 'Budget';
//$modules['vessel']		= 'Master Records';
$modules['report']		= 'Reports';
$modules['admin']		= 'Admin';
$modules['about']		= 'About';

// controllers that belong to a particular module/tab
//$tabs['dashboard'] 		= array('dashboard');
$tabs['requisition'] 	= array('requisition');
$tabs['purchase'] 		= array('purchase');
$tabs['payment'] 		= array('payment');
$tabs['item'] 			= array('category','sub1','sub2','item');
$tabs['budget'] 		= array('budget');
$tabs['vessel'] 		= array('vessel','department');
$tabs['report'] 		= array('report');
$tabs['admin'] 			= array('user','group','config');
$tabs['about'] 			= array('about');

// label
//$module_label['dashboard'] 	= 'Dashboards';
$module_label['requisition']= 'Employees';
$module_label['purchase']	= 'Contributions';
$module_label['payment']	= 'Loans';
$module_label['item'] 		= 'Allowances';
$module_label['category'] 	= 'Leaves';
$module_label['sub1'] 		= 'Attendance';
$module_label['sub2'] 		= 'Overtime';
$module_label['item'] 		= 'Payroll';
$module_label['budget'] 	= 'Budget';
$module_label['vessel'] 	= 'Payslips';
$module_label['report'] 	= 'Reports';
$module_label['admin'] 	 	= 'Administration';
$module_label['user'] 	 	= 'Users';
$module_label['group'] 		= 'User Groups';
$module_label['role'] 	 	= 'Roles';
$module_label['help'] 		= 'Help';
$module_label['about'] 		= 'About';


$module_privileges = array();
//$module_privileges['Dashboard'] 		= array();
$module_privileges['Requisition Order'] = array();
$module_privileges['Purchase Order'] 	= array('Deduction Type','Withholding','SSS','Philhealth','Pagibig','Loans','Loan Type');
$module_privileges['Payment Advice']	= array('Allowance Type');
$module_privileges['Item'] 				= array('Main Category','Sub Category 1','Sub Category 2');
$module_privileges['Vessel'] 			= array('Department');
$module_privileges['Budget'] 			= array();


$report_privileges = array(
						'Report 1',
						'Report 2',
						'Report 3',
						'Report 4',
					);


//load calendar
$prefs['template'] = '
	
   {table_open}<table cellpadding="0" cellspacing="0" width="100%" id="calendar">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<th>a<a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}"><caption>{heading}</caption></th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td class="bbWeekDays">{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td class="bbTD">{/cal_cell_start}

   {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
   {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="bbToday" id="dateToday" title="{day}">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
';

$this->load->library('calendar', $prefs);
$calendar = $this->data['calendar'] = $this->calendar->generate();

?>