<?php
class Userrole_model extends Model 
{
	var $id;
	var $roleID;
	var $userID;
	var $rstatus;
	
	function Userrole_model()
	{
		parent::Model();
		$this->load->model('role_model');
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
		$data['userID']	= $this->userID;
		$data['roleID']	= $this->roleID;
		
		$this->db->insert('userroles', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('id', $this->id);
		$this->db->delete('userroles'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function has_access($userID, $roleName) 
	{
		if ($this->session->userdata('current_isAdmin')) {
			// admin can always access to all pages
			return 1;
		} else {
			$this->role_model->setRole($roleName);
			
			if ($this->role_model->roleID) {
				$this->db->from('userroles');
				$this->db->where('userID', $userID);
				$this->db->where('roleID', $this->role_model->roleID);
				return $this->db->count_all_results();	
			} else {
				return 0;
			}
		}
	}
	
}
?>