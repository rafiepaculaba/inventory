<?php
/**
 * Role Class
 * Object model for roles
 * 
 * @author Erwin Dacua <erwindacua@gmail.com>
 * @version 1.0
 * @package Administration
 * 
 */

class Role_model extends Model 
{
	/**
	 * Role ID
	 *
	 * @var integer
	 */
	var $roleID;
	
	/**
	 * Role Name
	 *
	 * @var string
	 */
	var $roleName;
	
	var $module;
	
	/**
	 * Role Description
	 *
	 * @var string
	 */
	var $roleDesc;
	
	/**
	 * Role record status
	 *
	 * @var integer
	 */
	var $rstatus;
	
	
	/**
	 * Call parent constructor
	 */
	function Role_model()
	{
		parent::Model();
	}
	
	// RECORD MANAGEMENT METHODS
	/**
	 * Method to save role record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function saveRecord()
	{
		$data['roleID']    = $this->roleID;
		$data['module']    = $this->module;
		$data['roleName']  = $this->roleName;
		$data['roleDesc']  = $this->roleDesc;
		
		$this->db->insert('roles', $data); 
		
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
		$this->db->where('roleID', $this->roleID);
		$query = $this->db->get('roles'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->roleName	= $record[0]->roleName;
			$this->roleDesc = $record[0]->roleDesc;
			$this->rstatus 	= $record[0]->rstatus;
		} else {
			$this->roleName = "";
			$this->roleDesc = "";
			$this->rstatus  = "";
		}
	}
	
	/**
	 * Method to update role record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function updateRecord()
	{
		$data['roleName']  = $this->roleName;
		$data['roleDesc']  = $this->roleDesc;
		
	    $this->db->where('roleID', $this->roleID);
		$this->db->update('roles', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	/**
	 * Method to delete role record
	 * Returns true if successful otherwise false
	 *
	 * @return boolean
	 */
	function deleteRecord()
	{
		$this->db->where('roleID', $this->roleID);
		$this->db->delete('roles'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	/**
	 * Method to retrieve all Role records (optional - with filters)
	 */
	function getAll()
	{
		$this->db->order_by("roleName","ASC");
		$query = $this->db->get('roles');
		return $query;
	}
	
	
	/**
	 * Method that will set active record
	 *
	 * @param string $title
	 */
	function setRole($name) 
	{
		$this->db->where('roleName',$name);
		$queryResult = $this->db->get('roles',1);
		$value = $queryResult->result();
		if ($queryResult->num_rows() > 0)	{
        	$this->roleID 	= $value[0]->roleID;
        	$this->roleName = $value[0]->roleName;
        	$this->roleDesc = $value[0]->roleDesc;
        	$this->rstatus  = $value[0]->rstatus;
		} else {
			$this->roleID 	= "";
        	$this->roleName = "";
        	$this->roleDesc = "";
        	$this->rstatus  = "";
		}
	}
	
	
	
}
?>