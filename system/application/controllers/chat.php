<?php

class Chat extends Controller{
	
	function Chat()
	{
		parent::Controller();
		// check user session
		$this->user_model->authenticate_user_session();
	}
	
	function index()
	{		
		$this->load->view('chatty');		
	}
	
	function backend()
	{
		$store_num = 10;
		$display_num = 19;
		
		header("Content-type: text/xml");
		header("Cache-Control: no-cache");
		
		foreach($_POST AS $key => $value) {
		    ${$key} = mysql_real_escape_string($value);
		}				

		if(@$action == "postmsg"){
			if ($message) {
				$message = '<font color="'.$this->user_model->getTheme($this->session->userdata('current_userID')).'">'.$message.'</font>';
				$name = '<font color="'.$this->user_model->getTheme($this->session->userdata('current_userID')).'">'.$name.'</font>';
				$current = time();
				$this->db->query("INSERT INTO messages SET user='$name', msg='$message', time='$current' ");		
				$date_today = strtotime(date("Y-m-d 00:00:00"));
				$this->db->query("DELETE FROM messages WHERE time < $date_today");
			}
		}		
		
		if ($time==0){
			$query = $this->db->get("messages");
			$count = $query->num_rows();
			if ($count>10)
				$offset = $count - $display_num;
			else 
				$offset = 0;
				
			if ($display_num>0)
				$sql = "SELECT * FROM messages ORDER BY id ASC LIMIT $offset, $display_num";
			else
				$sql = "SELECT * FROM messages ORDER BY id ASC";
				
		}else{
			$sql = "SELECT * FROM messages WHERE time > $time ORDER BY id DESC";
		}
		
		$query = $this->db->query("$sql");
		
		if($query->num_rows()==0){
			$status_code = 2;
		}else{
			$status_code = 1;
		}
				
		$the_time = time();
		$messages = array();
		if ($query->num_rows()>0) {
			$ctr = 0;
			foreach($query->result() as $row){				
				$messages[$ctr]['author'] 	= $row->user;
				$messages[$ctr]['text'] 	= $row->msg;
				$messages[$ctr]['msg_time'] = date("H:i",$row->time);
				$messages[$ctr]['time'] 	= $the_time;
				
				$ctr++;
			}
		}
		
		// update the lastChatView of the user
		$info['lastChatView'] = $the_time;
		$this->db->where('userID',$this->session->userdata('current_userID'));
		$this->db->update('users',$info);
		
		$this->load->library('Services_JSON');
		$j = new Services_JSON();
	    $res = $j->encode($messages);
	    echo $res;
	}
	
	function alert()
	{
		$userID = $this->session->userdata('current_userID');
		$this->user_model->userID = $userID;
		$this->user_model->getRecord();
		
		if ( $this->user_model->lastChatView>0 ) {
			$this->db->where('time>', $this->user_model->lastChatView);
			$query = $this->db->get('messages');
		
			if($query->num_rows()==0) {
				echo "0";
			} else {
				echo "1";
			}
		} else {
			echo "0";
		}
		
		// update the lastChatView of the user
		$info['lastChatView'] = time();
		$this->db->where('userID',$this->session->userdata('current_userID'));
		$this->db->update('users',$info);
	}
	
}
?>