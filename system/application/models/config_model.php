<?php

class Config_model extends Model 
{
	var $configID;
	var $name;
	var $value;
	
	function Config_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['name']  = $this->name;
		$data['value'] = $this->value;

		$this->db->insert('config', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->where('configID', $this->configID);
		$query = $this->db->get('config'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->name	   = $record[0]->name;
			$this->value   = $record[0]->value;
		} else {
			$this->name     = "";
			$this->value    = "";
		}
	}
	
	function updateRecord()
	{
		$data['name']  = $this->name;
		$data['value'] = $this->value;
		
	    $this->db->where('configID', $this->configID);
		$this->db->update('config', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('configID', $this->configID);
		$this->db->delete('config'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function getConfig($title) 
	{
		$this->db->where('name',$title);
		$queryResult = $this->db->get('config',1);
		$value = $queryResult->result();
		if ($queryResult->num_rows() > 0)	{
	        if ($value[0]->value) {
	            return $value[0]->value;
	        } else {
	            return "";
	        }
		} else {
			return "";
		}
	}
	
	function setConfig($title) 
	{
		$this->db->where('name',$title);
		$queryResult = $this->db->get('config',1);
		$value = $queryResult->result();
		if ($queryResult->num_rows() > 0)	{
        	$this->configID = $value[0]->configID;
        	$this->name     = $value[0]->name;
        	$this->value    = $value[0]->value;
		} else {
			$this->name     = "";
			$this->value    = "";
		}
	}
	
}
?>