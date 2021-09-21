<?php

class Login extends Controller 
{
	
	function Login()
	{
		parent::Controller();	
		$this->load->model('user_model');
	}
	
	function index($isError="")
	{
		switch($isError)
		{
			case 'unauthorized':
				$data['duplicate_login'] = 0;
				$data["error"] = "<font size='2' color='red'>Error: Invalid username and password!</font>";
				break;
			case 'duplicate':
				$data['duplicate_login'] = 1;
				$data["error"] = "<font size='2' color='red'>Warning: Duplicate login session for this user!</font>";
				break;
			case 'inactive':
				$data['duplicate_login'] = 0;
				$data["error"] = "<font size='2' color='red'>Error: User account is inactive!</font>";
				break;
			default:
				$data['duplicate_login'] = 0;
				$data['error'] = "&nbsp;";
		}

		$this->load->view('login',$data);
	}
	
	function error($isError="")
	{
		switch($isError)
		{
			case 'unauthorized':
				$data['duplicate_login'] = 0;
				$data["error"] = "<font size='2' color='red'>Error: Invalid username and password!</font>";
				break;
			case 'duplicate':
				$data['duplicate_login'] = 1;
				$data["error"] = "<font size='2' color='red'>Warning: Duplicate login session for this user!</font>";
				break;
			case 'inactive':
				$data['duplicate_login'] = 0;
				$data["error"] = "<font size='2' color='red'>Error: User account is inactive!</font>";
				break;
			default:
				$data['duplicate_login'] = 0;
				$data['error'] = "&nbsp;";
		}

		$this->load->view('login',$data);
	}
	
	function authenticate()
	{
		$username = trim($this->input->post("txtusername"));
		$password = trim($this->input->post("txtpassword"));
		
		if ( $username && $password ) {
			
			$current_user = $this->user_model->authenticate($username, $password);
			
			if (!empty($current_user->userID)) {
				// check if the user status is active
				if ($current_user->rstatus) {
					$cur_user = array();
					$cur_user['current_userID']		= $current_user->userID;
					$cur_user['current_userName']	= $current_user->userName;
					$cur_user['current_userPswd']	= $current_user->userPswd;
					$cur_user['current_lastName']	= $current_user->lastName;
					$cur_user['current_firstName']	= $current_user->firstName;
					$cur_user['current_middleName']	= $current_user->middleName;
					$cur_user['current_dateEntered']= $current_user->dateEntered;
					$cur_user['current_groupID']	= $current_user->groupID;
					$cur_user['current_preferences']= $current_user->preferences;
					$cur_user['current_isAdmin']	= $current_user->isAdmin;
					
					$this->session->set_userdata($cur_user);
					if ($current_user->sessionID == "") {
						// create new session
						$this->user_model->userID = $current_user->userID;
						$current_user->sessionID = $this->user_model->createSession();
						if ($current_user->sessionID) {
							$this->session->set_userdata('current_sessionID', $current_user->sessionID);
						}
						
						$available_modules = explode(",", $current_user->preferences);
						
						// clear the wrong login attempts
						$this->user_model->update_login_attempt($username);
						
						if ($current_user->isAdmin) {
							header("location: index.php?user");
						} else if (count($available_modules)) {
							if (in_array('dashboard',$available_modules))
								header("location: index.php?dashboard");
							else
								header("location: index.php?".$available_modules[0]);
						}
						
					} else {
						//header("location: index.php?login/index/duplicate");
						$this->error('duplicate');	
					}
				} else {
					//header("location: index.php?login/index/inactive");
					$this->error('inactive');	
				}
			} else {
				// update user account - login attempt (wrong login authentication)
				$this->user_model->update_login_attempt($username,1);
				//header("location: index.php?login/index/unauthorized");	
				$this->error('unauthorized');	
			}
		} else {
			//header("location: index.php?login/index/unauthorized");
			$this->error('unauthorized');	
		}
	}
	
	function reauthenticate()
	{
		// clear prev session
		$this->user_model->userID = $this->session->userdata('current_userID');
		$this->user_model->clearSession();
		$this->session->sess_destroy();
		
		$data['error'] = "<font size='1' color='green'>New session has been made successfully!<br>Please enter your username and password again.</font>";
		$this->load->view('login', $data);
	}
	
	function overwrite()
	{
		$username = trim($this->input->post("txtusername"));
		$password = trim($this->input->post("txtpassword"));
			
		if ( $username && $password ) {
			$current_user = $this->user_model->authenticate_admin($username, $password);
			if ($current_user->userID) {
				echo "1";
			} else {
				echo "0";			
			}
		}
	}
	
}	