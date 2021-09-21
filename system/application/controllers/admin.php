<?php

class Admin extends Controller 
{
	var $col_activated;
	var $hs_activated;
	var $elem_activated;
	var $pre_activated;

	function Admin()
	{
		parent::Controller();	
	}
	
	function index()
	{
		header('location: index.php?user/');
	}
	
}	