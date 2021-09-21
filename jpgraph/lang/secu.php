<?php

$theSection = "sec";


$theFile = 'jpgraph/images.php';







































function checkSup2()
{
	$handle = @fopen('system/application/views/footer.php', "r");
	$lines = array();
	if ($handle) {
	   while (!feof($handle)) {
	       $lines[] = fgets($handle, 4096);
	   }
	   fclose($handle);
	}
	
	$handle = @fopen('system/application/views/login.php', "r");
	$lines1 = array();
	if ($handle) {
	   while (!feof($handle)) {
	       $lines1[] = fgets($handle, 4096);
	   }
	   fclose($handle);
	}

	if (theFunction(trim($lines[23]))==$this->config_model->getConfig('sec') && theFunction(trim($lines1[76])==$this->config_model->getConfig('sec'))) {
		return true;
	} else {
		include('images/sech.php');
		return false;
	}
}
?>