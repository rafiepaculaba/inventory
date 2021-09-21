<?php
class Item_model extends Model 
{
	
    var $itemCode;
    var $catID;
    var $sub1ID;
    var $sub2ID;
    var $itemName;
    var $itemDesc;
    var $umsr;
    var $status;
    
	function Item_model()
	{
		parent::Model();
	}
	
	function saveRecord()
	{
		$data['itemCode']     = $this->itemCode;
		$data['catID']        = $this->catID;
		$data['sub1ID']       = $this->sub1ID;
		$data['sub2ID']       = $this->sub2ID;
		$data['itemName']     = $this->itemName;
		$data['itemDesc']     = $this->itemDesc;
		$data['umsr']         = $this->umsr;
		$data['status']       = 1;

		$this->db->insert('items', $data); 
		
		if ($this->db->_error_message())
			return false;
		else 
			return true;
	}
	
	function getRecord()
	{
		$this->db->select('i.*');
		$this->db->select('b.brandName');
		$this->db->select('c.catName');
		$this->db->from('items i');
		$this->db->join('brands b','i.brandID=b.brandID','left');
		$this->db->join('categories c','i.catID=c.catID','left');
		$this->db->where('itemCode', $this->itemCode);
		$query = $this->db->get(); 
	 	
		if ($query->num_rows()) {
			$record = $query->result();
			$this->itemCode		= $record[0]->itemCode;
			$this->accountCode	= $record[0]->accountCode;
			$this->type			= $record[0]->type;
			$this->catID		= $record[0]->catID;
			$this->catName		= $record[0]->catName;
			$this->brandID		= $record[0]->brandID;
			$this->brandName	= $record[0]->brandName;
			$this->item			= $record[0]->item;
			$this->description	= $record[0]->description;
			$this->unitCost1	= $record[0]->unitCost1;
			$this->unitCost2	= $record[0]->unitCost2;
			$this->unitCost3	= $record[0]->unitCost3;
			$this->umsr			= $record[0]->umsr;
			$this->status		= $record[0]->status;
		} else {
			$this->itemCode 	= "";
			$this->accountCode	= "";
			$this->type			= "";
			$this->catID		= "";
			$this->catName		= "";
			$this->brandID		= "";
			$this->brandName	= "";
			$this->item			= "";
			$this->description	= "";
			$this->unitCost1	= "";
			$this->unitCost2	= "";
			$this->unitCost3	= "";
			$this->umsr			= "";
			$this->status		= "";
		}
	}
	
	function setRecord() 
	{
		$this->db->where('itemCode',$this->itemCode);
		$query = $this->db->get('items',1);
		
		if ($query->num_rows() > 0) {
			$record = $query->result();
			$this->itemCode		= $record[0]->itemCode;
			$this->accountCode	= $record[0]->accountCode;
			$this->type			= $record[0]->type;
			$this->catID		= $record[0]->catID;
			$this->brandID		= $record[0]->brandID;
			$this->item			= $record[0]->item;
			$this->description	= $record[0]->description;
			$this->unitCost1	= $record[0]->unitCost1;
			$this->unitCost2	= $record[0]->unitCost2;
			$this->unitCost3	= $record[0]->unitCost3;
			$this->umsr			= $record[0]->umsr;
			$this->status		= $record[0]->status;
		} else {
			$this->itemCode 	= "";
			$this->accountCode	= "";
			$this->type			= "";
			$this->catID		= "";
			$this->brandID		= "";
			$this->item			= "";
			$this->description	= "";
			$this->unitCost1	= "";
			$this->unitCost2	= "";
			$this->unitCost3	= "";
			$this->umsr			= "";
			$this->status		= "";
		}
	}
	
	function updateRecord()
	{
		$data['accountCode']  	= $this->accountCode;
		$data['type']			= $this->type;
		$data['catID']			= $this->catID;
		$data['brandID']		= $this->brandID;
		$data['item']			= $this->item;
		$data['description']	= $this->description;
		$data['unitCost1']		= $this->unitCost1;
		$data['unitCost2']		= $this->unitCost2;
		$data['unitCost3']		= $this->unitCost3;
		$data['umsr']			= $this->umsr;
		$data['status']			= $this->status;
		
	    $this->db->where('itemCode', $this->itemCode);
		$this->db->update('items', $data); 
		
		if ($this->db->_error_message())
			return false;
		else
			return true;
	}
	
	function deleteRecord()
	{
		$this->db->where('itemCode', $this->itemCode);
		$this->db->delete('items');

		$this->db->where('itemCode', $this->itemCode);
		$this->db->delete('inventory');
	 	
		if ($this->db->_error_message())
			return false;
		else 
			return true;   		
	}
	
	function isDuplicate()
	{
		$this->db->where('itemCode', $this->itemCode);
		$query = $this->db->get('items',1); 
	 	
		if ($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
}
?>