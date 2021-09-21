<div class="tabDivider">
<ul class="tablist">

<?php
if ($activetab==1) {
?>
	<!--default display is listings-->
	<li class="active" id="idList"><a class="current" id="theList" style="cursor:pointer;" onclick="window.location='index.php?role/'"><img src="images/view_inline.gif" align="top" /> Role List</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?role/create'"><img src="images/view_inline.gif" align="top" /> New Role</a></li>	
<?php
} else if ($activetab==2) {
?>
	<!--default display is listings-->
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?role/'"><img src="images/view_inline.gif" align="top" /> Role List</a></li>	
	<li class="active" id="idCreate"><a class="current" id="theCreate" style="cursor:pointer;" onclick="window.location='index.php?role/create'"><img src="images/view_inline.gif" align="top" /> New Role</a></li>	
<?php
} else {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?role/'"><img src="images/view_inline.gif" align="top" /> Role List</a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?role/create'"><img src="images/view_inline.gif" align="top" /> New Role</a></li>	
<?php
}
?>
</ul>
</div>
