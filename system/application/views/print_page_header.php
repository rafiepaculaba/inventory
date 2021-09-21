<table  width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td align="center">
		<slot>
		<h2><?php echo $this->config_model->getConfig('Company') ?></h2>
		<font size="2">
		<?php echo $this->config_model->getConfig('Address') ?>
		<br/>
		<?php echo $this->config_model->getConfig('Capitol contact numbers') ?>
		</font>
		</slot>
	</td>
</tr>
</table>