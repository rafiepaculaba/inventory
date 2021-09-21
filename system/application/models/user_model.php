<?php

class User_model extends Model 
{
	var $userID;
	var $sessionID;
	var $userName;
	var $userPswd;
	var $lastName;
	var $firstName;
	var $middleName;
	var $dateEntered;
	var $groupID;
	var $groupName;
	var $isAdmin;
	var $preferences;
	var $loginAttempt;
	var $theme;
	var $lastChatView;
	var $rstatus;
	var $roles;
	
	function User_model()
	{
		parent::Model();
	}
	
	// RECORD MANAGEMENT METHODS
	/**
	 * Method to save users record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function saveRecord()
	{
		$data['userID'] 	= $this->userID;
		$data['userName'] 	= $this->userName;
		$data['userPswd'] 	= $this->userPswd;
		$data['lastName'] 	= $this->lastName;
		$data['firstName'] 	= $this->firstName;
		$data['middleName'] = $this->middleName;
		$data['dateEntered']= $this->dateEntered;
		$data['isAdmin'] 	= $this->isAdmin;
		$data['groupID'] 	= $this->groupID;
		$data['preferences'] = $this->preferences;
		$data['theme'] 		= $this->theme;
		
		$this->db->insert('users', $data); 
		
		$this->saveRoles();
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function saveRoles()
	{
		// get all user group roles
		$this->db->select("usergrouproles.*");
		$this->db->from("usergrouproles");
		$this->db->join('usergroups',"usergrouproles.groupID = usergroups.groupID",'left');
		$this->db->where("usergroups.groupID",$this->groupID);
		$roles = $this->db->get();
		
		if($roles->num_rows())
		{
			foreach($roles->result() as $role) {
				$this->userrole_model->roleID = $role->roleID;		
				$this->userrole_model->userID = $this->userID;	
				$this->userrole_model->saveRecord();
				//$this->userrole_model->rstatus = 1;		
			}
		}
	}
	
	/**
	 * Method to retrieve a record.
	 *
	 */
	function getRecord()
	{
		$this->db->select('users.*');
		$this->db->select('usergroups.groupName');
		$this->db->from('users');
		$this->db->join('usergroups','users.groupID=usergroups.groupID','left');
		$this->db->where('userID', $this->userID);
		$query = $this->db->get();  
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->sessionID	= $record[0]->sessionID;
			$this->userName		= $record[0]->userName;
			$this->userPswd		= $record[0]->userPswd;
			$this->lastName		= $record[0]->lastName;
			$this->firstName	= $record[0]->firstName;
			$this->middleName	= $record[0]->middleName;
			$this->dateEntered	= $record[0]->dateEntered;
			$this->groupID		= $record[0]->groupID;
			$this->groupName	= $record[0]->groupName;
			$this->isAdmin		= $record[0]->isAdmin;
			$this->preferences	= $record[0]->preferences;
			$this->loginAttempt	= $record[0]->loginAttempt;
			$this->theme		= $record[0]->theme;
			$this->rstatus		= $record[0]->rstatus;
			$this->lastChatView	= $record[0]->lastChatView;
			
			// get all user group roles
			$this->db->select('userroles.*');
			$this->db->select('roles.roleName');
			$this->db->select('roles.roleDesc');
			$this->db->from('userroles');
			$this->db->join('roles','userroles.roleID=roles.roleID');
			$this->db->where('userroles.userID',$this->userID);
			$this->db->order_by('roles.roleName','ASC');
			$this->roles = $this->db->get();
			
		} else {
			$this->sessionID	= "";
			$this->userName		= "";
			$this->userPswd		= "";
			$this->lastName		= "";
			$this->firstName	= "";
			$this->middleName	= "";
			$this->dateEntered	= "";
			$this->groupID		= "";
			$this->groupName	= "";
			$this->isAdmin		= "";
			$this->preferences	= "";
			$this->loginAttempt	= "";
			$this->theme		= "";
			$this->lastChatView	= "";
			$this->rstatus		= "";
			$this->branchID		= "";
		}
	}
	
	function setRecord()
	{
		$this->db->where('userName', $this->userName);
		$query = $this->db->get('users',1); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->userID		= $record[0]->userID;
		} else {
			$this->userID		= "";
		}
		
		$this->getRecord();
	}
	
	/**
	 * Method to update users record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function updateRecord()
	{
		$data['lastName'] 	= $this->lastName;
		$data['firstName'] 	= $this->firstName;
		$data['middleName'] = $this->middleName;
		$data['groupID'] 	= $this->groupID;
		$data['isAdmin'] 	= $this->isAdmin;
		$data['preferences'] = $this->preferences;
		$data['theme'] 		= $this->theme;
		$data['rstatus']	= $this->rstatus;
		
	    $this->db->where('userID', $this->userID);
		$this->db->update('users', $data); 
		
		//$this->updateRoles();
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function updateRoles()
	{
		$roles;
		
		// get all user group roles
		$this->db->select("userroles.*");
		$this->db->from("userroles");
		$this->db->where("userroles.userID=",$this->userID);
		$roles = $this->db->get();
		
		if($roles->num_rows())
		{
			foreach($roles->result() as $role) {
				$this->userrole_model->id = $role->id;
				$this->userrole_model->deleteRecord();	
			}
		}
		
		$this->saveRoles();
	}
	
	/**
	 * Method to update users record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function updateRecordProfile()
	{
		$data['lastName'] 	= $this->lastName;
		$data['firstName'] 	= $this->firstName;
		$data['middleName'] = $this->middleName;
		$data['theme']		= $this->theme;
		
	    $this->db->where('userID', $this->userID);
		$this->db->update('users', $data); 
		
		// update session current user vars
		$this->getRecord();
			
		$cur_user = array();
		$cur_user['current_userID']		= $this->userID;
		$cur_user['current_userName']	= $this->userName;
		$cur_user['current_userPswd']	= $this->userPswd;
		$cur_user['current_lastName']	= $this->lastName;
		$cur_user['current_firstName']	= $this->firstName;
		$cur_user['current_middleName']	= $this->middleName;
		$cur_user['current_dateEntered']= $this->dateEntered;
		$cur_user['current_groupID']	= $this->groupID;
		$cur_user['current_isAdmin']	= $this->isAdmin;
		
		$this->session->set_userdata($cur_user);
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function checkSession($userID, $sID)
	{
	    $this->db->where('userID', $userID);
	    $this->db->where('sessionID', $sID);
		$result = $this->db->get('users'); 
		
		if ($result->num_rows())
			return true;
		else
			return false;
	}
	
	function createSession()
	{
		$data['sessionID'] 	= md5("bis".rand(0,100000000).rand(0,999999999).strtotime(date("d M y h:i:s A")));
	    $this->db->where('userID', $this->userID);
		$this->db->update('users', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return $data['sessionID'];
	}
	
	function clearSession()
	{
		$data['sessionID'] 	= "";
	    $this->db->where('userID', $this->userID);
		$this->db->update('users', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function update_password()
	{
		$data['userPswd'] 	= $this->userPswd;

		$this->db->where('userID', $this->userID);
		$this->db->update('users', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	

	function deleteRecord()
	{
		$this->db->where('userID', $this->userID);
		$this->db->delete('users'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function isDuplicate()
	{
		$this->db->where('userName', $this->userName);
		$this->db->limit(1);
		$query = $this->db->get('users'); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function getAll()
	{
		$this->db->order_by("lastName","ASC");
		$query = $this->db->get('users');
		return $query;
	}
	
	function authenticate($userName, $userPswd) 
	{
		$this->db->where('userName', $userName);
		$this->db->where('userPswd', md5($userPswd));
		$this->db->where('rstatus', 1);
		$records = $this->getAll();

		if ($records->num_rows()) {
			$data = $records->result();	
			$this->userID = $data[0]->userID;
			$this->getRecord();
			
			return $this;
		} else {
			return 0;
		}
	}
	
	function authenticate_admin($userName, $userPswd) 
	{
		$this->db->where('userName', $userName);
		$this->db->where('userPswd', md5($userPswd));
		$this->db->where('rstatus', 1);
		$records = $this->getAll();

		if ($records->num_rows()) {
			$data = $records->result();	
			$this->userID = $data[0]->userID;
			$this->getRecord();
			
			return $this;
		} else {
			return 0;
		}
	}
	
	function authenticate_user_session()
	{
		if ((!$this->session->userdata('current_userID') && !$this->session->userdata('current_userName')) || !$this->checkSession($this->session->userdata('current_userID'),$this->session->userdata('current_sessionID'))) {
			// unauthorized user
			header("Location: index.php?login/index/unauthorized");
		}
	}
	
	function update_login_attempt($userName,$wrong_attempt=0) 
	{
		$this->userName = $userName;
		$this->setRecord();

		if ($this->userID) {
			if ($wrong_attempt) {
				$info['loginAttempt'] = $this->loginAttempt+1;
				
				if ($info['loginAttempt']>=$this->config_model->getConfig('Max Login Attempts')) {
					// lock/inactive the account
					$info['rstatus'] = 0;
				}
			} else {
				$info['loginAttempt'] = 0;
			}
			
			$this->db->where('userID', $this->userID);
			$this->db->update('users', $info); 
			
			if ($this->db->_error_message())
				return false;
			else
				return true;	
		}
		
	}
	
	function getTheme($id='') {
		
		if ($id) {
			
			$this->db->where('userID', $id);
			$query = $this->db->get('users'); 
			
			if ($query->num_rows()) {
				$record = $query->result();
				
				if ($record[0]->theme!="")
					return $record[0]->theme;
			}
		}
		
		return strtoupper($this->config_model->getConfig('Theme'));
	}
	
}
?>