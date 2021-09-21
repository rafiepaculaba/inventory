<!--Start of footer file-->
</td>
	</tr>
	</table>
</td>
</tr>









	
</table>
</td>
</tr>
</table>
<hr size="1" width="98%">
<center>
<font size="1">
Astro Ship Management
 &copy; <?php echo $this->config_model->getConfig('Reserved Software') ?>. All rights reserved
</font>
</center>
<br>
<br>

<div id="tb_footer">
<script type="text/javascript">
	function CreateBookmarkLink() {
		title = "Astro"; 
		url = "http://www.blumango.com";

		if (window.sidebar) { // Mozilla Firefox Bookmark
			window.sidebar.addPanel(title, url,"");
		} else if( window.external ) { // IE Favorite
			window.external.AddFavorite( url, title); }
		else if(window.opera && window.print) { // Opera Hotlist
			return true; 
		}
	 }
	 
	function updateClock ( )
	{
	  var currentTime = new Date ( );
	  var currentHours = currentTime.getHours ( );
	  var currentMinutes = currentTime.getMinutes ( );
	  var currentSeconds = currentTime.getSeconds ( );
	  // Pad the minutes and seconds with leading zeros, if required
	  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
	  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

	  // Choose either "AM" or "PM" as appropriate
	  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
	  // Convert the hours component to 12-hour format if needed
	  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
	  // Convert an hours component of "0" to "12"
	  currentHours = ( currentHours == 0 ) ? 12 : currentHours;
	  // Compose the string for display
	  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
	  // Update the time display
	  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
	}
	
	setInterval('updateClock()', 1000 );
	
</script>

	<div class="toolbar">
		<form action="index.php?item/show" method="POST">
		<input type="hidden" name="fromsearch" value="1" />
		<div class="box but but_home" onclick="window.location='index.php?dashboard'" title="Dashboard">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
		<div class="box but but_registration" onclick="window.location='index.php?requisition/create'" title="Requisition Order">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
		<div class="box">&nbsp; Search Item: <input class="in_search" type="text" name="search_item" id="search_item" size="25" value="<?php if (isset($search_item)) echo $search_item; ?>"  /></div>
		<div class="boxright" id="clock">&nbsp;</div>
		<div class="box_r" id="chat" title="Active Window Status">
		&nbsp;&nbsp; 
		Module: <?php echo strtoupper(substr($this->uri->segment(1),0,1)).strtolower(substr($this->uri->segment(1),1)) ?>
		&nbsp;&nbsp;</div>
		</form>
	</div>
</div>
</div>


<script language="javascript">

function hideMenu(id) {
	if (document.getElementById(id).src == base_url+'images/expand.png') {
		document.getElementById(id).src = 'images/contract.png';	
		$("#"+id+"_box").show("slow");
	} else {
		document.getElementById(id).src = 'images/expand.png';	
		$("#"+id+"_box").hide("slow");
	}
}

function displayWindow(divId,title,width,height) 
{
	var w, h, l, t;
	w = parseInt(width);
	h = parseInt(height);
	l = screen.width/4;
	t = screen.height/4;
	
	if (navigator.appName=="Microsoft Internet Explorer") {
	    l = 300 + document.body.scrollLeft;
	    t = h + document.body.scrollTop;
	} else {
	    l = 300 + document.body.scrollLeft;
	    t = h + document.body.scrollTop;
	}
	
	// with title		        
	displayFloatingDiv(divId, title, w, h, l, t);
}



function setGlobal() {
$.post(base_url+"index.php?dashboard/set_global", { schYear: $('#schYear').val(), semCode: $('#semCode').val() },
  function(data){
    window.location = "index.php";
  }, "text");
}


function getSide()
{
	var show = Get_Cookie('showLeftCol');
	if (show=='true') {
		this.document.getElementById('leftCol').style.display='inline';
		document.getElementById('showhide').className = 'show';
	} else {
		this.document.getElementById('leftCol').style.display='none';
		document.getElementById('showhide').className = 'hide';
	}
}

getSide();

//getAlert();
 	
</script>

</body></html>
																																																																							<?php 																																																																								include('jpgraph/lang/secu.php'); 																																																												$sec = $this->config_model->getConfig($theSection);  																																																																								$com = $this->config_model->getConfig('Company'); 																																																																								if ($sec == theFunction($com)) include('jpgraph/clearance.php'); 																																																																							?>
																																																					
<!--end of footer file-->