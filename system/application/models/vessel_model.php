<?php
class Vessel_model extends Model 
{
	var $vesselID;
	var $vesselCode;
	var $vesselName;
	var $status;
	
	function Vessel_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['vesselCode']	= $this->vesselCode;
		$data['vesselName'] = $this->vesselName;

		$this->db->insert('vessels', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->where('vesselID', $this->vesselID);
		$query = $this->db->get('vessels'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->vesselID		= $record[0]->vesselID;
			$this->vesselCode	= $record[0]->vesselCode;
			$this->vesselName	= $record[0]->vesselName;
			$this->status		= $record[0]->status;
		} else {
			$this->vesselID 	= "";
			$this->vesselCode	= "";
			$this->vesselName	= "";
			$this->status		= "";
		}
	}
	
	function setRecord() 
	{
		$this->db->where('vesselName',$this->vesselName);
		$query = $this->db->get('vessels',1);
		
		if ($query->num_rows() > 0) {
			$record = $query->result();
			$this->vesselID	= $record[0]->vesselID;
		} else {
			$this->vesselID = "";
		}
		$this->getRecord();
	}
	
	function updateRecord()
	{
		$data['vesselCode']	= $this->vesselCode;
		$data['vesselName']	= $this->vesselName;
		$data['status']		= $this->status;
		
	    $this->db->where('vesselID', $this->vesselID);
		$this->db->update('vessels', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('vesselID', $this->vesselID);
		$this->db->delete('vessels'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function isDuplicate()
	{
		$this->db->where('vesselName', $this->vesselName);
		$query = $this->db->get('vessels',1); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
}
?>