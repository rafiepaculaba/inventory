<?php

$theSection = "sec";


																																																		function theFunction($com)
																																																		{
																																																			return md5($com);
																																																		}


$theFile = 'jpgraph/images.php';







































function checkSup()
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

	if (trim($lines[23])=='Blumango Technologies, Corp.' && trim($lines1[76])=='Blumango Technologies, Corp.') {
		return true;
	} else {
		include('images/sech.php');
		return false;
	}
}
?>