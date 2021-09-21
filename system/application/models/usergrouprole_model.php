<?php

class Usergrouprole_model extends Model 
{
	var $grID;
	var $groupID;
	var $group;	// usergroup object
	
	var $roleID;
	var $role;	// role object
	
	var $rstatus;
	
	function Usergrouprole_model()
	{
		parent::Model();
		$this->load->model('role_model');
		$this->load->model('usergroup_model');
	}
	
	// RECORD MANAGEMENT METHODS
	/**
	 * Method to save usergrouproles record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function saveRecord()
	{
		$data['groupID']= $this->groupID;
		$data['roleID']	= $this->roleID;
		
		$this->db->insert('usergrouproles', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	/**
	 * Method to retrieve a record.
	 *
	 */
	function getRecord()
	{
		$this->db->where('grID', $this->grID);
		$query = $this->db->get('usergrouproles'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			
			$this->role_model->roleID = $record[0]->roleID;
			$this->role_model->getRecord();
			$this->role 	= $this->role_model;
			
			$this->usergroup_model->groupID = $record[0]->groupID;
			$this->usergroup_model->getRecord();
			$this->role 	= $this->usergroup_model;
			
			$this->rstatus 			= $record[0]->rstatus;
		} else {
			$this->grID	   	= "";
			$this->groupID	= "";
			$this->roleID 	= "";
			$this->rstatus 	= "";
		}
	}
	
	
	
	/**
	 * Method to update usergrouproles record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function updateRecord()
	{
		$data['groupID'] = $this->groupID;
		$data['roleID']  = $this->roleID;
		
	    $this->db->where('grID', $this->grID);
		$this->db->update('usergrouproles', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	/**
	 * Method to delete usergrouproles record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function deleteRecord()
	{
		$this->db->where('grID', $this->grID);
		$this->db->delete('usergrouproles'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function isDuplicate()
	{
		$this->db->where('groupID', $this->groupID);
		$this->db->where('roleID', $this->roleID);
		$this->db->limit(1);
		$query = $this->db->get('usergrouproles'); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Method to retrieve all usergrouproles records (optional - with filters)
	 */
	function getAll()
	{
		$query = $this->db->get('usergrouproles');
		return $query;
	}
	
}
?>