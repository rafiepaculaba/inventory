<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link REL="SHORTCUT ICON" HREF="images/fav.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $this->config_model->getConfig('Software') ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
$theme = $this->config_model->getConfig('Theme');
?>

<link title="color:sugar" type="text/css" rel="stylesheet" href="css/colors.<?php echo $theme ?>.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/fonts.normal.css" />

<script src="javascript/sugar_3.js" type="text/javascript"></script>
<script src="javascript/style.js" type="text/javascript"></script>
<script src="javascript/cookie.js" type="text/javascript"></script>
<script src="javascript/jquery-1.2.6.js" type="text/javascript"></script>
<script language="javascript">
<?php if ($duplicate_login) { ?>
	msg = confirm("It seems you are already logged in from another system, which did not completely logout.\nDo you wish to proceed and discard all transactions made from the old session?\nClick YES to proceed, otherwise CANCEL."); 
	if(msg) { 
		window.location ='index.php?login/reauthenticate'; 
	}
	
<?php } ?>

$(document).ready(function() {
	$('#txtusername').focus();
});
</script>
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" style="background-image: url(images/login/bg.gif)">
<br><br><br><br><br><br><br><br><br><br><br><br>
<!--start of login-->
<table width="373" cellspacing="0" cellpadding="0" border="0" align="center">
<tr>
	<td colspan="2"><img src="images/login/img_01_<?php echo $this->config_model->getConfig('Theme') ?>.gif"></td>
</tr>
<tr>
	<td><img src="images/login/img_02.gif"></td>
	<td style="background-image: url(images/login/img_03.gif)" align="center" width="262">
		<table cellspacing="0" cellpadding="0" border="0" align="center"  width="100%">
				<form method="POST"	action="index.php?login/authenticate" name="frmLogin" id="frmLogin">
				<tr>
					<td class="dataLabel" colspan="2"><font color="red"><?php if ($error){ echo $error; } ?></font></td>
				</tr>
				<tr>
					<td class="dataLabel" width="30%">Username</td>
					<td width="70%" class="dataField">
						<input type="text" name="txtusername" id="txtusername" value="admin" size="20" maxlength="30"/>
					</td>
				</tr>
				<tr>
					<td class="dataLabel">Password</td>
					<td class="dataField">
						<input type="password" name="txtpassword" id="txtpassword" value="admin" size="20" maxlength="30"/>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" name="cmdLogin" id="cmdLogin" value="Login" class="button">																
					</td>
				</tr>
				</form>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2"><img src="images/login/img_04.gif"></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<font size="1">&nbsp;&nbsp;
Astro Ship Management
 &copy; <?php echo $this->config_model->getConfig('Reserved Software') ?>. All rights reserved
	</font>
	</td>
</tr>
</table>
<!--end of login-->
</body></html>