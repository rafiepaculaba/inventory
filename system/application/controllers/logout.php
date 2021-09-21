<?php

class Logout extends Controller 
{
	function Logout()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->session->sess_destroy();
		
		// clear prev session
		$this->user_model->userID = $this->session->userdata('current_userID');
		$this->user_model->clearSession();

		header("location: index.php?login");	
	}
	
	function logout_user()
	{
		$userID = trim($this->input->post('userID'));
		if ($userID!="") {
			// destroy the session of the user
			$info['sessionID'] = "";
			$this->db->where('userID',$userID);
			$this->db->update('users',$info);
			
			if ($this->db->_error_message())
				echo "0";
			else 
				echo "1";
		} else {
			echo "0";
		}
	}
}	