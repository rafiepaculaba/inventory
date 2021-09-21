 <table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value="Edit" onclick="window.location='index.php?config/edit/<?php echo $config->configID; ?>';" />
	<input class="button" name="cmddelete" type="button" id="cmddelete" value="Delete" onclick="deleteConfig('<?php echo $config->configID; ?>');" />
  </tr>
</table>  
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Configuration</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="80"><slot>Name :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $config->name; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Value :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $config->value; ?> </slot></td>
    </tr>
    <?php
    if (strtoupper($config->name)=="THEME") {
    ?>
	    <tr>
	        <td class="tabDetailViewDL"><slot>Sample Value :</slot></td>
	        <td class="tabDetailViewDF">
	        <slot>
	        <table width="300" border="0">
			<tr>
				<td align="center"><img src="images/colors.blue.icon.gif" align="Blue Theme" /></td>
				<td align="center"><img src="images/colors.purple.icon.gif" align="Purple Theme" /></td>
				<td align="center"><img src="images/colors.red.icon.gif" align="Red Theme" /></td>
				<td align="center"><img src="images/colors.green.icon.gif" align="Green Theme" /></td>
				<td align="center"><img src="images/colors.gray.icon.gif" align="Gray Theme" /></td>
				<td align="center"><img src="images/colors.orange.icon.gif" align="Orange Theme" /></td>
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
</p>


<script language="javascript">
function deleteConfig(configID)
{
    reply=confirm("Do you really want to delete this configuration?");
    
    if (reply==true)
        window.location='index.php?config/delete/'+configID;
}
</script>