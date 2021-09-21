<div class="tabDivider">
<ul class="tablist">

<?php
if ($activetab==1) {
?>
	<li class="active" id="idList"><a class="current" id="theList" style="cursor:pointer;" onclick="window.location='index.php?item/show'"><img src="images/list.gif" align="absmiddle" /> Items</a></li>	
	<?php if ($roles['create']) { ?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?item/create'"><img src="images/plus.gif" align="absmiddle" /> New Item</a></li>	
	<?php } ?>
<?php
} else if ($activetab==2) {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?item/show'"><img src="images/list.gif" align="absmiddle" /> Items</a></li>	
	<?php if ($roles['create']) { ?>
	<li class="active" id="idCreate"><a class="current" id="theCreate" style="cursor:pointer;" onclick="window.location='index.php?item/create'"><img src="images/plus.gif" align="absmiddle" /> New Item</a></li>	
	<?php } ?>
<?php
} else {
?>
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?item/show'"><img src="images/list.gif" align="absmiddle" /> Items</a></li>	
	<?php if ($roles['create']) { ?>
	<li class="" id="idCreate"><a class="" id="theCreate" style="cursor:pointer;" onclick="window.location='index.php?item/create'"><img src="images/plus.gif" align="absmiddle" /> New Item</a></li>	
	<?php } ?>
<?php
}
?>

</ul>
</div>