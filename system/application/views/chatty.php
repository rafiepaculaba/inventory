<html>
<head>
	<title>Messenger</title>
	<link rel="shortcut icon" href="images/chat.ico">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<?php
	$theme = $this->user_model->getTheme($this->session->userdata('current_userID'));
	?>
	<link title="color:sugar" type="text/css" rel="stylesheet" href="css/colors.<?php echo $theme ?>.css" media="all" />
	<link type="text/css" rel="stylesheet" href="css/fonts.normal.css" media="all" />

	<script type="text/javascript" src="javascript/jquery-1.2.6.js"></script>
	<script type="text/javascript">
	// set base url
	var base_url = <?php echo "'".base_url()."';"; ?>
	</script>
	
	<script type="text/javascript">
	var timestamp = 0;
		$(document).ready(function(){
			timestamp = 0;
			updateMsg();
			hideLoading();
			$("form#chatform").submit(function(){
					showLoading();								
					$.post(base_url+"index.php?chat/backend",{
								message: $("#content").val(),
								name: $("#name").val(),
								action: "postmsg",
								time: timestamp
							},
						function(xml) {
							addMessages(xml);
							$("#content").val("");
							$("#content").focus();
						},'json'
					);	
					
					hideLoading();	
				return false;
			});
		});
		function rmContent(){
			
		}
		function showLoading(){
			$("#contentLoading").show();
			$("#txt").hide();
		}
		function hideLoading(){
			$("#contentLoading").hide();
			$("#txt").show();
		}
		function addMessages(xml) {
			for(c = 0; c < xml.length; c++){
			    msg = "<b>"+xml[c].author + "[" + xml[c].msg_time + "]" +"</b>: "+xml[c].text + "<br />";
			    timestamp = xml[c].time;
			    document.getElementById('messagewindow').innerHTML = document.getElementById('messagewindow').innerHTML + msg;
			}
			
			document.getElementById('messagewindow').scrollTop = document.getElementById('messagewindow').scrollHeight;
			
			hideLoading();
		}
		function updateMsg() {
			$.post(base_url+"index.php?chat/backend",{ time: timestamp }, 
				function(xml) {
					$("#loading").remove();				
					addMessages(xml);
				},'json');
			setTimeout('updateMsg()', 3000);
		}
		
	</script>
	<style type="text/css">
		#messagewindow {
			height: 250px;
			border: 1px solid #cccccc;
			padding: 5px;
			overflow: auto;
		}
		#wrapper {
			margin: auto;
			width: 300px;
		}
	</style>
</head>
<body>
	<table border="0" cellpadding="0" cellspacing="0" width="304">
    <tr>
        <th class="dataField" align="left">
        <img src="images/chat.png" title="AIMS Messenger" alt="AIMS Messenger Icon"  />
        <font size="4">Chat Conference</font>
        </th>
        <th width="16">
        <div id="contentLoading" class="contentLoading">  
		<img src="images/blueloading.gif" alt="Loading data, please wait...">  
		</div>
        </th>
    </tr>
    <tr>
    	<td colspan="2">
    		<div id="wrapper">
			<p id="messagewindow"><span id="loading">&nbsp;</span></p>
			<form id="chatform">
			<input type="hidden" name="name" id="name" value="<?php echo $this->session->userdata('current_userName'); ?>" />
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
		    <tr>
		        <td class="dataLabel"><slot><input type="text" name="content" id="content" size="42" /></slot></td>
		        <td class="dataLabel"><slot><input type="submit" class="button" value="Send" /></slot></td>
		    </tr>
		    <tr>
		 	</table>
			</form>
			</div>
    	</td>
    </tr>
    <tr>
    </table>
	
</body>
<script language="javascript">
$('#content').focus();
</script>
</html>