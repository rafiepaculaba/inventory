<?php

class Usergroup_model extends Model 
{
	var $groupID;
	var $groupName;
	var $groupDesc;
	var $rstatus;
	
	var $roles;
	
	function Usergroup_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['groupName'] 	= $this->groupName;
		$data['groupDesc'] 	= $this->groupDesc;
		
		$this->db->insert('usergroups', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->where('groupID', $this->groupID);
		$query = $this->db->get('usergroups'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->groupName	= $record[0]->groupName;
			$this->groupDesc	= $record[0]->groupDesc;
			$this->rstatus		= $record[0]->rstatus;
			
			// get all user group roles
			$this->db->select("usergrouproles.*");
			$this->db->select("roles.roleName");
			$this->db->select("roles.roleDesc");
			$this->db->select("roles.rstatus");
			$this->db->from("usergrouproles");
			$this->db->join('roles',"usergrouproles.roleID=roles.roleID",'left');
			$this->db->where("usergrouproles.groupID",$this->groupID);
			$this->db->order_by("roles.roleName","ASC");
			$this->roles = $this->db->get();
			
		} else {
			$this->groupName	= "";
			$this->groupDesc	= "";
			$this->rstatus		= "";
			$this->roles		= "";
		}
	}
	
	function updateRecord()
	{
		$data['groupDesc'] 	= $this->groupDesc;
		$data['rstatus'] 	= $this->rstatus;
		
	    $this->db->where('groupID', $this->groupID);
		$this->db->update('usergroups', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('groupID', $this->groupID);
		$this->db->delete('usergroups'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function isDuplicate()
	{
		$this->db->where('groupName', $this->groupName);
		$this->db->limit(1);
		$query = $this->db->get('usergroups'); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function setGroup($name) 
	{
		$this->db->where('groupName',$name);
		$queryResult = $this->db->get('usergroups',1);
		$value = $queryResult->result();
		if ($queryResult->num_rows() > 0)	{
        	$this->groupID 	  	= $value[0]->groupID;
        	$this->groupName  	= $value[0]->groupName;
        	$this->groupDesc 	= $value[0]->groupDesc;
        	$this->rstatus    	= $value[0]->rstatus;
		} else {
			$this->groupID     	= "";
			$this->groupName    = "";
			$this->groupDesc    = "";
			$this->rstatus  	= "";
		}
	}
	
}
?>