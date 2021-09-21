<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link REL="SHORTCUT ICON" HREF="images/fav.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->config_model->getConfig('Software') ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="javascript/jquery.min.js" type="text/javascript"></script>
<script src="javascript/highcharts.js" type="text/javascript"></script>

<?php
$theme = $this->config_model->getConfig('Theme');
?>

<link title="color:sugar" type="text/css" rel="stylesheet" href="css/colors.<?php echo strtolower($theme) ?>.css" media="all" />

<link type="text/css" rel="stylesheet" href="css/fonts.normal.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/message.css" media="all" />
<link rel="stylesheet" type="text/css" media="all" href="css/calendar-win2k-cold-1.css?s=4.5.1g&c=">

<script src="javascript/menu.js" type="text/javascript"></script>
<script src="javascript/dbx.js" type="text/javascript"></script>
<script src="javascript/validate.js" type="text/javascript"></script>
<script src="javascript/cpd.js" type="text/javascript"></script>
<script src="javascript/cookie.js" type="text/javascript"></script>
<!--<script src="javascript/jquery-1.2.6.js" type="text/javascript"></script>-->
<script src="javascript/jquery.min.js" type="text/javascript"></script>
<script src="javascript/highcharts.js" type="text/javascript"></script>
<script src="javascript/validate.js" type="text/javascript"></script>

<script type="text/javascript" src="javascript/jscalendar/calendar.js?s=4.5.1g&c="></script>
<script type="text/javascript" src="javascript/jscalendar/lang/calendar-en.js?s=4.5.1g&c="></script>
<script type="text/javascript" src="javascript/jscalendar/calendar-setup_3.js?s=4.5.1g&c="></script>


<script language="javascript">
// set base url
var base_url = <?php echo "'".base_url()."';"; ?>

function hideFilters(id) {
	if (document.getElementById(id).src == base_url+'images/advanced_search.gif') {
		document.getElementById(id).src = 'images/basic_search.gif';	
		document.getElementById(id).alt = 'Basic Search';	
		$("#filters").show();
	} else {
		document.getElementById(id).src = 'images/advanced_search.gif';	
		document.getElementById(id).alt = 'Advanced Search';	
		$("#filters").hide();
	}
}

</script>
</head>

<!--<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">-->
<body>
