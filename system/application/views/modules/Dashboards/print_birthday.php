
<h4 align="center"><u>Birthday Celebrants for the Month of <?php echo date("F") ?></u></h4>
<br>

<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr height="20">
	<td scope="col" class="listViewThS1" width="5%" nowrap>&nbsp;</td>
	<td scope="col" class="listViewThS1" width="20%" nowrap>Birthday</td>
	<td scope="col" class="listViewThS1" width="40%" nowrap>Celebrant</td>
	<td scope="col" class="listViewThS1" width="20%" nowrap><div align="center">Office</div></td>
	<td scope="col" class="listViewThS1" width="15%" nowrap><div align="center">Age</div></td>
</tr>
<?php 
if ($bdays->num_rows()) {
	$ctr = 1;
	foreach($bdays->result() as $celebrant) {
?>
<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="5%" nowrap><?php echo $ctr ?>.</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="20%" nowrap><?php echo date("m/d/Y", strtotime($celebrant->bday)) ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="left" valign="top" width="40%" nowrap>
    <?php 
		echo $celebrant->lname.", ".$celebrant->fname." ".$celebrant->mname ;
	?>
	</td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="20%" nowrap><?php echo $celebrant->office ?></td>
    <td scope="row" class="oddListRowS1" bgcolor="#ffffff" align="center" valign="top" width="15%" nowrap><?php echo date("Y") - date("Y",strtotime($celebrant->bday)) ?></td>
</tr>
<tr>
	<td colspan="5" height="1" class="listViewHRS1"></td>
</tr>
<?php 
	$ctr++;
	}
}
?>
</tbody>
</table>
