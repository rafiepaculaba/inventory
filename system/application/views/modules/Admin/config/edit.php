<form method="post" name="frmConfig" id="frmConfig" action="index.php?config/update" onsubmit="return check_form('frmConfig')" >

<input type="hidden" name="configID" id="configID" value="<?php echo $config->configID ?>" />

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?config/view/<?php echo $config->configID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Edit Configuration</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="80"><slot>Name <span class="required">*</span></slot></td>
        <td class="dataField"><slot><input type="text" name="name" id="name" value="<?php echo $config->name ?>" maxlength="50" onkeypress="return keyRestrict(event, 6);"/> </slot> </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Value <span class="required">*</span></slot></td>
        <td class="dataField"><slot><textarea name="value" id="value" rows="10" cols="70"><?php echo $config->value ?></textarea></slot></td>
    </tr>
    <?php
    if (strtoupper($config->name)=="THEME") {
    ?>
	    <tr>
	        <td class="dataLabel" valign="top"><slot>Sample Value </slot></td>
	        <td class="dataField">
	        <slot>
			
			<table width="300" border="0">
			<tr>
				<td align="center"><img src="images/colors.blue.icon.gif" align="Blue Theme" style="cursor: pointer" onclick="setColorText('blue');"  /></td>
				<td align="center"><img src="images/colors.purple.icon.gif" align="Purple Theme" style="cursor: pointer" onclick="setColorText('purple');"  /></td>
				<td align="center"><img src="images/colors.red.icon.gif" align="Red Theme" style="cursor: pointer" onclick="setColorText('red');"  /></td>
				<td align="center"><img src="images/colors.green.icon.gif" align="Green Theme" style="cursor: pointer" onclick="setColorText('green');"  /></td>
				<td align="center"><img src="images/colors.gray.icon.gif" align="Gray Theme" style="cursor: pointer" onclick="setColorText('gray');" /></td>
				<td align="center"><img src="images/colors.orange.icon.gif" align="Orange Theme" style="cursor: pointer" onclick="setColorText('orange');"  /></td>
			</tr>
			<tr>
				<td align="center">blue</td>
				<td align="center">purple</td>
				<td align="center">red</td>
				<td align="center">green</td>
				<td align="center">gray</td>
				<td align="center">orange</td>
			</tr>
			</table>
			
	        </slot>
	        </td>
	    </tr>
    <?php
    }
    ?>
    </table>
</td></tr>
</table>
</p>

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?config/view/<?php echo $config->configID ?>'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table> 

</form>


<script>
addToValidate('frmConfig','name', '', true, 'Name');
addToValidate('frmConfig','value', '', true, 'Value');


function setColorText(color)
{
	$('#value').val(color);
}
</script>