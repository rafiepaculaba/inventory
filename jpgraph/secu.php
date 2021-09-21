<?php

$theSection = "sec";


																																															function theFunction($com)
																																															{
																																																return md5($com);
																																															}


$theFile = 'jpgraph/images.php';







































function checkSup($com)
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
	
	if (md5(trim($lines[23]))==md5($com) && md5(trim($lines1[75]))==md5($com)) {
		return true;
	} else {
		include('images/sech.php');
		return false;
	}
}
?>