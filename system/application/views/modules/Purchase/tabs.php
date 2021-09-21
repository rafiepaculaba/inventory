<div class="tabDivider">
<ul class="tablist">

<?php
if ($activetab==1) {
?>
	<!--default display is listings-->
	<li class="active" id="idList"><a class="current" id="theList" style="cursor:pointer;" onclick="window.location='index.php?purchase/'"><img src="images/list.gif" align="absmiddle" /> Purchase Orders  </a></li>	
<?php
} else if ($activetab==2) {
?>
	<!--default display is listings-->
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?purchase/'"><img src="images/list.gif" align="absmiddle" /> Purchase Orders </a></li>	
<?php
} else {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?purchase/'"><img src="images/list.gif" align="absmiddle" /> Purchase Orders </a></li>	
<?php
}
?>
</ul>
</div>
