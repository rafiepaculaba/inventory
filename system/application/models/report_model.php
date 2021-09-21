<?php
class Report_model extends Model 
{
	var $emoneyID;
	var $emoney_type;
	var $description;
	
	function Report_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['emoney_type'] = $this->emoney_type;
		$data['description'] = $this->description;
		
		$this->db->insert('emoney', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->where('emoneyID', $this->emoneyID);
		$query = $this->db->get('emoney'); 
	 	
		if ($query->num_rows()) {
			$record 			= $query->result();
			$this->emoney_type  = $record[0]->emoney_type;
			$this->description  = $record[0]->description;
		} else {
			$this->emoney_type  = "";
			$this->description  = "";
		}
	}
	
	function updateRecord()
	{
		$data['emoney_type']= $this->emoney_type;
		$data['description']= $this->description;
		
	    $this->db->where('emoneyID', $this->emoneyID);
		$this->db->update('emoney', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('emoneyID', $this->emoneyID);
		$this->db->delete('emoney'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function setRecord() 
	{
		$this->db->where('emoney_type',$this->emoney_type);
		$queryResult = $this->db->get('emoney',1);
		$value = $queryResult->result();
		if ($queryResult->num_rows() > 0)	{
        	$this->emoneyID 	= $value[0]->emoneyID;
        	$this->description 	= $value[0]->description;
		} else {
			$this->emoneyID		= "";
			$this->emoney_type  = "";
			$this->description  = "";
		}
	}
	
	function isDuplicate()
	{
		$this->db->where('emoney_type', $this->emoney_type);
		$this->db->limit(1);
		$query = $this->db->get('emoney'); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function getAll()
	{
		$query = $this->db->get('emoney');
		return $query;
	}

}
?>