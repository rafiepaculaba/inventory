<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link REL="SHORTCUT ICON" HREF="images/landslide.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->config_model->getConfig('Software') ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"  />
<script src="javascript/jquery.min.js" type="text/javascript"></script>
<script src="javascript/highcharts.js" type="text/javascript"></script>

<?php
$theme = $this->config_model->getConfig('Theme');
?>

<link title="color:sugar" type="text/css" rel="stylesheet" href="css/colors.<?php echo strtolower($theme) ?>.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/map.css" />
<link type="text/css" rel="stylesheet" href="css/fonts.normal.css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="all" />
</head>

<!--<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">-->
<body>
<!--start of header-->