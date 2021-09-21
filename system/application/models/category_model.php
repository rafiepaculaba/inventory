<?php
class Category_model extends Model 
{
	var $catID;
	var $catName;
	var $catDesc;
	var $status;
	
	function Category_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['catName']  	= $this->catName;
		$data['catDesc']	= $this->catDesc;
		$data['status']		= 1;

		$this->db->insert('categories', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->where('catID', $this->catID);
		$query = $this->db->get('categories'); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->catID		= $record[0]->catID;
			$this->catName		= $record[0]->catName;
			$this->catDesc		= $record[0]->catDesc;
			$this->status		= $record[0]->status;
		} else {
			$this->catID 		= "";
			$this->catName		= "";
			$this->catDesc		= "";
			$this->status		= "";
		}
	}
	
	function setRecord() 
	{
		$this->db->where('catName',$this->catName);
		$this->db->order_by('catID','DESC');
		$query = $this->db->get('categories',1);
		
		if ($query->num_rows() > 0) {
			$record = $query->result();
			$this->catID		= $record[0]->catID;
			$this->catName		= $record[0]->catName;
			$this->catDesc		= $record[0]->catDesc;
			$this->status		= $record[0]->status;
		} else {
			$this->catID 		= "";
			$this->catName		= "";
			$this->catDesc		= "";
			$this->status		= "";
		}
	}
	
	function updateRecord()
	{
		$data['catName']		= $this->catName;
		$data['catDesc']		= $this->catDesc;
		$data['status']			= $this->status;
		
	    $this->db->where('catID', $this->catID);
		$this->db->update('categories', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('catID', $this->catID);
		$this->db->delete('categories'); 
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function isDuplicate()
	{
		$this->db->where('catName', $this->catName);
		$query = $this->db->get('categories',1); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function inUsed($id)
	{
		// search from items
		$this->db->where('catID', $id);
		$query = $this->db->get('items',1); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
}
?>