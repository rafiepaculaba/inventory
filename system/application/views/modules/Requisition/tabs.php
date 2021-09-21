<div class="tabDivider">
<ul class="tablist">

<?php
if ($activetab==1) {
?>
	<!--default display is listings-->
	<li class="active" id="idList"><a class="current" id="theList" style="cursor:pointer;" onclick="window.location='index.php?requisition/'"><img src="images/list.gif" align="absmiddle" /> Requisition Orders  </a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?requisition/create'" ><img src="images/plus.gif" align="absmiddle" /> New Requisition Order </a></li>	
<?php
} else if ($activetab==2) {
?>
	<!--default display is listings-->
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?requisition/'"><img src="images/list.gif" align="absmiddle" /> Requisition Orders </a></li>	
	<li class="active" id="idCreate"><a class="current" id="theCreate" style="cursor:pointer;"  onclick="window.location='index.php?requisition/create'" ><img src="images/plus.gif" align="absmiddle" /> New Requisition Order </a></li>	
<?php
} else {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?requisition/'"><img src="images/list.gif" align="absmiddle" /> Requisition Orders </a></li>	
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?requisition/create'" ><img src="images/plus.gif" align="absmiddle" /> New Requisition Order </a></li>	
<?php
}
?>
</ul>
</div>
