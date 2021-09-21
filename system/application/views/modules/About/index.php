<table class="" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td class=""><slot>
    <img src="images/logo/logo_<?php echo $this->user_model->getTheme($this->session->userdata('current_userID')) ?>.gif" alt="<?php echo $this->config_model->getConfig('Software') ?>" border="0" />
    <p>
    &nbsp;&nbsp;&nbsp;<font size="2">
    <?php echo $this->config_model->getConfig('Software')." ".$this->config_model->getConfig('Software Version') ?><br/>
    <!--
	&nbsp;&nbsp;&nbsp;<?php echo $this->config_model->getConfig('Company') ?> &copy; <?php echo $this->config_model->getConfig('Reserved Software') ?>. All Rights Reserved.
	--></font><p>
    </slot></td>
</tr>
</table>
<hr/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td class="body" style="padding-right: 10px;" valign="top" colfont="4" width="300">
    <h3>BLUMANGO: The Team</h3>
	</td>
</tr>
<tr>
	<td class="body" style="padding-right: 10px;" valign="top">
	<b><u>Developer</u></b>
	</td>
	<td class="body" style="padding-right: 10px;" valign="top">
	<b><u>QA Engineer</u></b>
	</td>
</tr>
<tr>
	<td class="body" style="padding-right: 10px;" valign="top">
	<p><br/>Erwin Dacua<br><font size="1">Team Lead</font></p>
	<p><br/>Bernard Lagumbay<br><font size="1">Developer</font></p>
	<p><br/>Glenn Tabucanon<br><font size="1">Designer</font></p>
	</td>
	<td class="body" style="padding-right: 10px;" valign="top">
	<p><br/>Sheryl Oporto<br><font size="1">QA</font></p>
	<p><br/>Shiela Lecasa<br><font size="1">QA</font></p>
	</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	    <td class="body" style="padding-right: 10px;" valign="top" width="100" >
	    <h3>Office</h3>
		</td>
	</tr>
	<tr>
	    <td class="body" style="padding-right: 10px;" height="25">
		Address :
		</td>
		<td class="body" style="padding-right: 10px;">
		<b>Talamban, Cebu City, Philippines 6000</b>
		</td>
	</tr>
	<tr>
	    <td class="body" style="padding-right: 10px;" height="25">
		Phone :
		</td>
		<td class="body" style="padding-right: 10px;">
		<b>(032) + 272-0236</b>
		</td>
	</tr>
	<tr>
	    <td class="body" style="padding-right: 10px;" height="25">
		E-Mail :
		</td>
		<td class="body" style="padding-right: 10px;">
		<b>
		<a href="mailto: info@blumango.com">info@blumango.com</a><br>
		</b>
		</td>
	</tr>
	</table>
</td>
</tr>
</table>