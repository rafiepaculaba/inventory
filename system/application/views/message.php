<br>
<div class="<?php echo $class; ?>" style="display:<?php echo $display; ?>;" id="bigcontainer">
        <div class="boxcontent" id="msgcontainer"><strong><?php echo $msg; ?></strong></div>
</div>

<script type='text/javascript'>
function redirect(url) 
{
    window.location=url;
}

function clearError()
{
	$("#bigcontainer").fadeOut("slow");
	setTimeout("redirect('"+redirect_url+"')",500);
}

function redirect_delay() 
{
	redirect_url="<?php echo $urlredirect ?>";
	setTimeout("clearError()",1000);		
}

function reloadIt() 
{ 
  window.opener.location.reload(); 
  
  return true;
} 
function closeThis()
{ 
  window.close() 
} 
function doIt() 
{ 
  reloadIt();
  closeThis();
} 


<?php
if ($urlredirect=="refresh") {
?>
	setTimeout("doIt()",1000);		
<?php
} else if ($urlredirect) {
?>
	redirect_delay();
<?php
}
?>


</script>	