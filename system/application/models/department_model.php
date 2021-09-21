<?php
class Department_model extends Model 
{
	var $deptID;
	var $deptName;
	var $deptDesc;
	var $status;
	
	function Department_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['deptName']  	= $this->deptName;
		$data['deptDesc']	= $this->deptDesc;
		$data['status']		= 1;

		$this->db->insert('departments', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->where('deptID', $this->deptID);
		$query = $this->db->get('departments'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->deptID		= $record[0]->deptID;
			$this->deptName		= $record[0]->deptName;
			$this->deptDesc		= $record[0]->deptDesc;
			$this->status		= $record[0]->status;
		} else {
			$this->deptID 		= "";
			$this->deptName		= "";
			$this->location		= "";
			$this->status		= "";
		}
	}
	
	function setRecord()
	{
		$this->db->where('deptName',$this->deptName);
		$query = $this->db->get('departments',1);
		
		if ($query->num_rows() > 0) {
			$record = $query->result();
			$this->deptID	= $record[0]->deptID;
		} else {
			$this->deptID = "";
		}
		$this->getRecord();
	}
	
	function updateRecord()
	{
		$data['deptName']	= $this->deptName;
		$data['deptDesc']	= $this->deptDesc;
		$data['status']		= $this->status;
		
	    $this->db->where('deptID', $this->deptID);
		$this->db->update('departments', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('deptID', $this->deptID);
		$this->db->delete('departments'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   	
	}
	
	function isDuplicate()
	{
		$this->db->where('deptName', $this->deptName);
		$query = $this->db->get('departments',1); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
}
?>