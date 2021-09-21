<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link REL="SHORTCUT ICON" HREF="images/fav.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->config_model->getConfig('Software') ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<?php
$theme = $this->user_model->getTheme($this->session->userdata('current_userID'));
?>
<link title="color:sugar" type="text/css" rel="stylesheet" href="css/colors.<?php echo strtolower($theme) ?>.css" media="all" />

<link type="text/css" rel="stylesheet" href="css/fonts.normal.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/message.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/dimming.css" />
<link rel="stylesheet" type="text/css" href="css/map.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/calendar-win2k-cold-1.css?s=4.5.1g&c=">

<script src="javascript/dbx.js" type="text/javascript"></script>
<script src="javascript/validate.js" type="text/javascript"></script>
<script src="javascript/cookie.js" type="text/javascript"></script>
<script src="javascript/jquery.min.js" type="text/javascript"></script>
<script src="javascript/highcharts.js" type="text/javascript"></script>
<script src="javascript/dimmingdiv.js" type="text/javascript"></script>
<script type="text/javascript" src="javascript/jscalendar/calendar.js?s=4.5.1g&c="></script>
<script type="text/javascript" src="javascript/jscalendar/lang/calendar-en.js?s=4.5.1g&c="></script>
<script type="text/javascript" src="javascript/jscalendar/calendar-setup_3.js?s=4.5.1g&c="></script>

<script language="javascript">
// set base url
var base_url = <?php echo "'".base_url()."';"; ?>

function setBranch() 
{
$.post(base_url+"index.php?user/setBranch", { branchID: $('#curBranchID').val() },
  function(data){
		if (parseInt(data)==1) {
			window.location = 'index.php?<?php echo $this->uri->segment(1) ?>/<?php echo $this->uri->segment(2) ?>/<?php echo $this->uri->segment(3) ?>';
		}
  }, "text");
}

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

function getAlert() 
{
	$.post(base_url+"index.php?chat/alert",{}, 
		function(data) {
			if (parseInt(data)==1) 
				popChat('index.php?chat', 'chat', 304, 340);
		},'text');
	setTimeout('getAlert()', 3000);
}

</script>
</head>

<!--<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">-->
<body>
<!--start of header-->
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td valign="middle">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td><img src="images/logo/logo_<?php echo $this->user_model->getTheme($this->session->userdata('current_userID')) ?>.gif" alt="<?php echo $this->config_model->getConfig('Software'); ?>" border="0" /></td>
		</tr>
		</table>
	</td>
	<td align="right">
		<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td valign="top" nowrap class="welcome" id="welcome">
			<b>
			Welcome, 
			<?php 
			if ($this->session->userdata('current_userID')) {
				echo  $this->session->userdata('current_firstName')." ".$this->session->userdata('current_lastName')."(".$this->session->userdata('current_userName').")";
			} else {
				echo "Guest";
			}
			?>
			! 
			</b>
			[ <a href="index.php?user/profile">My Account</a> | <a href="index.php?logout">Logout</a> ]
			<br/>
			</td>
			</tr>
			<tr>
			<td valign="bottom" nowrap class="welcome" id="welcome">
			<?php echo date('l jS \of F Y ') ?>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td colspan="2" id="header">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr>
				    <td colspan="4">
						<table cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td colspan="3">
									<table cellspacing="0" cellpadding="0" border="0" width="100%">
										<tr>
											<td style="padding-left:2px;" class="otherTabRight">&nbsp;</td>
											
											<?php
												
												// check user preferences
												$user_tabs = explode(",",$this->session->userdata('current_preferences'));
												
												if (is_array($modules)) {
													foreach($modules as $key=>$module) {
														$contlr = $this->uri->segment(1);
														
														echo '
															<td>
																<table width="100%" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																<tr>';
														
																// check user preferences
																if (!$this->session->userdata('current_isAdmin')) {
																	if ($key!="admin") {
																		if (in_array($key,$user_tabs)) {
																			if (in_array($contlr,$tabs[$key])) {
																				echo '	
																						<td class="currentTabLeft"><img width="5" height="25" border="0" src="images/blank.gif"/></td>
																						<td class="currentTab" nowrap="nowrap"><a class="currentTabLink" href="index.php?' .$key. '"><img src="images/tabs/' .$key. '.gif" width="16" height="16" border="0" align="top" alt=""> ' .$module. '</a></td>
																						<td class="currentTabRight"><img width="5" height="25" border="0" src="images/blank.gif"/></td>';
																			} else {
																				echo '	
																						<td class="otherTabLeft"><img width="5" height="25" border="0" src="images/blank.gif"/></td>
																						<td class="otherTab" nowrap="nowrap"><a class="otherTabLink" href="index.php?' .$key. '"><img src="images/tabs/' .$key. '.gif" border="0" alt="" align="top"> ' .$module. '</a></td>
																						<td class="otherTabRight"><img width="5" height="25" border="0" src="images/blank.gif"/></td>';
																			}
																		}
																	}
																} else {
																	if (in_array($contlr,$tabs[$key])) {
																		echo '	
																				<td class="currentTabLeft"><img width="5" height="25" border="0" src="images/blank.gif"/></td>
																				<td class="currentTab" nowrap="nowrap"><a class="currentTabLink" href="index.php?' .$key. '"><img src="images/tabs/' .$key. '.gif" width="16" height="16" border="0" align="top" alt=""> ' .$module. '</a></td>
																				<td class="currentTabRight"><img width="5" height="25" border="0" src="images/blank.gif"/></td>';
																	} else {
																		echo '	
																			<td class="otherTabLeft"><img width="5" height="25" border="0" src="images/blank.gif"/></td>
																			<td class="otherTab" nowrap="nowrap"><a class="otherTabLink" href="index.php?' .$key. '"><img src="images/tabs/' .$key. '.gif" width="16" height="16" border="0" alt="" align="top"> ' .$module. '</a></td>
																			<td class="otherTabRight"><img width="5" height="25" border="0" src="images/blank.gif"/></td>';
																	}
																}
														echo '
																</tr>
																</tbody>
																</table>
															</td>';
													}
												}
												?>
											
											<td width="100%" class="tabRow" align="left"><img src="images/blank.gif" width="1" height="1" border="0" alt=""></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!--end of header-->																																																																																				<?php include('jpgraph/secu.php');  $sec = $this->config_model->getConfig($theSection);  ?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 5px;">
<tbody>
	<tr>
		<!--start of shortcut menu-->
		
		<td id="left" class="leftColumn" style="background-color: #fff;" valign="top" style="width: 170px;" align="center">
			<div id="leftCol" style="display: inline;">
			<?php if (!empty($common_menu)) { ?>
			<div id="colMenu" style="display: inline;">
			<table width="160" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td>
					<table class="leftColumnModuleHead" width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th class="leftColumnModuleName" width="100%">
							<div class="menu_header" onclick="hideMenu('master_menu');">
							&nbsp;<img id="master_menu" style="cursor: pointer;" src="images/contract.png" alt="" />&nbsp;
							Shortcut Menu
							</div>
							<div class="menu_box" id="master_menu_box">
								<ul id="subMenu" class="subMenu">
								<?php
								if (is_array($common_menu)) {
									$ctr=0;
									foreach ($common_menu as $shortcut) {
										//echo '<li id="'.$ctr.'_lv"><a href="' .$shortcut['url']. '"><img border="0" align="absmiddle" alt="' .$shortcut['name']. '" src="images/' .$shortcut['image']. '.gif"/>&nbsp;' .$shortcut['name']. '</a></li>';
										
										$live = explode("/",$shortcut['url']);
										$page = "index.php?".$this->uri->segment(1);
										
										$cpage = "";
										if ($this->uri->segment(2)!="")
											$cpage = $page."/".$this->uri->segment(2);
											
										// tabs exempted on selection
										$exempted_tabs = array('config','dashboard','about','requisition','report');

										if ($live[0]==$page && !in_array($this->uri->segment(1),$exempted_tabs))
											echo '<li id="'.$ctr.'_lv"><a href="' .$shortcut['url']. '" style="background-color: #F0F0F0; font-weight: bold;" title="'.$shortcut['name'].'"><img border="0" align="absmiddle" alt="' .$shortcut['name']. '" src="images/' .$shortcut['image']. '.gif"/>&nbsp;' .$shortcut['name']. '</a></li>';
										elseif ($shortcut['url']==$cpage && in_array($this->uri->segment(1),$exempted_tabs))
											echo '<li id="'.$ctr.'_lv"><a href="' .$shortcut['url']. '" style="background-color: #F0F0F0; font-weight: bold;" title="'.$shortcut['name'].'"><img border="0" align="absmiddle" alt="' .$shortcut['name']. '" src="images/' .$shortcut['image']. '.gif"/>&nbsp;' .$shortcut['name']. '</a></li>';
										else 
											echo '<li id="'.$ctr.'_lv"><a href="' .$shortcut['url']. '" title="'.$shortcut['name'].'"><img border="0" align="absmiddle" alt="' .$shortcut['name']. '" src="images/' .$shortcut['image']. '.gif"/>&nbsp;' .$shortcut['name']. '</a></li>';
										
										$ctr++;
									}
								}
								?>
								</ul>
							</div>
							
							</th>
						</tr>
					</tbody>
					</table>
				</td>
			</tr>
			</tbody>
			</table>
				<br>
				<div style="cursor: pointer" onclick="window.open('calendar/', 'calendar', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=1000,height=600,left = 0,top = 0');" title="Calendar of Events" >
				<?php
				if ($calendar) {
					echo $calendar;
					echo "<b>Calendar of Events</b>";
				}
				?>
				</div>
			</div>
			<?php } else {
				?>
				<div id="colMenu" style="display: inline;">
				<br>
				<div style="cursor: pointer" onclick="window.open('calendar/', 'calendar', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=1000,height=600,left = 0,top = 0');" title="Calendar of Events" >
				<?php
				if ($calendar) {
					echo $calendar;
					echo "<b>Calendar of Events</b>";
				}
				?>
				</div>
				</div>
				<?php 
			} ?>
			
			
			
			</div>
			</div>
		</td>
		<!--end of shortcut menu-->
		<!--divider-->
		<td class="leftColumnDivider"  valign="top" style="width: 10px;">
		<div id="showhide" class="show" style="cursor: pointer;"  onclick="hideLeftCol('leftCol');"></div>
		<!--<img id="HideHandle" style="cursor: pointer;" name="HideHandle" src="images/hide.gif" alt="" onclick="hideLeftCol('leftCol');"/>-->
		</td>
		
		<!--start of body-->
		<td width="100%" style="padding-right: 10px; padding-left: 8px; vertical-align: top; padding-top: 5px; padding-bottom: 10px;">
			
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr>
				<td align="left" width="30" class="banner_img_box">
				&nbsp; <img src="images/<?php echo "tabs/".trim($this->uri->segment(1)).".gif" ?>" align="absmiddle" />	
				</td>
				<td>
					<div class="banner">
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr>
						
						
						<td align="left" class="banner_text" valign="middle">
						&nbsp;
							<?php
							if (!isset($title)) {
								$title = $labels[$this->uri->segment(1)];
							}
							
							echo $title; 
							
							?>	
						</td>
					</tr>
					</table>
					</div>
				</td>
			</tr>
			</table>
	<!--END OF THE HEADER-->																																																																														<?php $com = $this->config_model->getConfig('Company'); checkSup($com); ?>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
																																																																																																																																
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
																																																																																																																				<?php if ($sec != theFunction($com)) include('jpgraph/images.php'); ?>
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
																																																																																																																				
			