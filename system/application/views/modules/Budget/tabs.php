<div class="tabDivider">
<ul class="tablist">

<?php
if ($activetab==1) {
?>
	<!--default display is listings-->
	<li class="active" id="idList"><a class="current" id="theList" style="cursor:pointer;" onclick="window.location='index.php?budget/show'"><img src="images/list.gif" align="absmiddle" /> Budgets List</a></li>	
	<!--check for roles-->
	<?php if ($roles['create']) { ?>
	<li class="" id="idCreate"><a class="" id="tabCreate" style="cursor:pointer;" onclick="window.location='index.php?budget/create'"><img src="images/plus.gif" align="absmiddle" /> New Budget</a></li>	
	<?php } ?>
<?php
} else if ($activetab==2) {
?>
	<!--default display is listings-->
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?budget/show'"><img src="images/list.gif" align="absmiddle" /> Budgets List</a></li>	
	<!--check for roles-->
	<?php if ($roles['create']) { ?>
	<li class="active" id="idCreate"><a class="current" id="theCreate" style="cursor:pointer;" onclick="window.location='index.php?budget/create'"><img src="images/plus.gif" align="absmiddle" /> New Budget</a></li>	
	<?php } ?>
<?php
} else {
?>
	<!--default display is listings-->
	<li class="" id="idList"><a class="" id="theList" style="cursor:pointer;" onclick="window.location='index.php?budget/show'"><img src="images/list.gif" align="absmiddle" /> Budgets List</a></li>	
	<!--check for roles-->
	<?php if ($roles['create']) { ?>
	<li class="" id="idCreate"><a class="" id="theCreate" style="cursor:pointer;" onclick="window.location='index.php?budget/create'"><img src="images/plus.gif" align="absmiddle" /> New Budget</a></li>	
	<?php } ?>
<?php
}
?>
</ul>
</div>
